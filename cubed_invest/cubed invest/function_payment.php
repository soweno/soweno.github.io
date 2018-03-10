<?php
    /* подключить в конце конфига*/
    //функция выплат на payeer
    //общий вид paymet_платежная система(номер куда выплатить, сумма, комментарий)
    function payment_payeer($number, $amount, $comment){
        include_once('cpayeer.php');

        global $mysqli;
        global $payeer_account_number;
        global $payeer_api_id;
        global $payeer_api_key;
        global $payeer_val;

        $payeer = new CPayeer($payeer_account_number, $payeer_api_id, $payeer_api_key);

        //Авторизация
        if (!($payeer->isAuth())){
            return false;
        }

        //Проверка кошелька на существование
        if(!($payeer->checkUser(array('user' => $number,)))){
            return false;
        }

        //выплата
        $arTransfer = $payeer->transfer(array(
            'curIn' => $payeer_val,
            'sum' => (float)$amount,
            'curOut' => $payeer_val,
            'to' => $number,
            'comment' => $comment,
        ));

        //проверка истории
        if (empty($arTransfer['historyId'])){
            return false;
        }

        return $arTransfer['historyId'];
    }


    function payment_okpay($to, $sum, $comment="") {
        try {
            global $okpay_ok_receiver;
            global $okpay_ok_api_key;
            global $okpay_ok_api_secret;
            global $okpay_currency;

            $secWord  = $okpay_ok_api_secret; // wallet API password
            $WalletID = $okpay_ok_api_key; // wallet ID

            $datePart = gmdate("Ymd:H");
            $authString = $secWord.":".$datePart;

            $secToken = hash('sha256', $authString);
            $secToken = strtoupper($secToken);


            $client = new SoapClient("https://api.okpay.com/OkPayAPI?wsdl");

            $obj->WalletID = $WalletID;
            $obj->SecurityToken = $secToken;
            $obj->Currency = $okpay_currency;
            $obj->Receiver = $to;
            $obj->Amount = $sum;
            $obj->Comment = $comment;
            $obj->IsReceiverPaysFees = FALSE;
            $webService1 = $client->Send_Money($obj);
            $wsResult1 = $webService1->Send_MoneyResult;
            return $wsResult1;
        } catch (Exception $e) {
            return false;
        }
    }


    function payment_perfect($number, $amount, $comment) {
        global $mysqli;
        global $perfect_money_api_id;
        global $perfect_money_account_number;
        global $perfect_money_api_pass;
        global $perfect_money_val;
        
        $transaction = isset($mysqli, $mysqli->insert_id) && $mysqli->insert_id ? $mysqli->insert_id : time();
        
        $desc = urlencode($comment);

        $f = fopen('https://perfectmoney.is/acct/confirm.asp?AccountID='.$perfect_money_api_id.'&PassPhrase='.$perfect_money_api_pass.'&Payer_Account='.$perfect_money_account_number.'&Payee_Account='.$number.'&Amount='.number_format($amount, 2, '.', '').'&PAY_IN=1&PAYMENT_ID='.$transaction.'&Memo='.$desc, 'rb');

        if($f === false) {
            return false;
        }

        $out = "";
        while(!feof($f)) {
            $out .= fgets($f);
        }

        fclose($f);
        

        if(!preg_match_all("/<input name='(.*)' type='hidden' value='(.*)'>/", $out, $data, PREG_SET_ORDER)) {
            return false;
        }
        
        $result = [];
        foreach($data as $item){
           $result[$item[1]] = $item[2];
        }
        return isset($result['PAYMENT_ID']) && !isset($result['ERROR']) ? $result['PAYMENT_ID'] : false;
    }

