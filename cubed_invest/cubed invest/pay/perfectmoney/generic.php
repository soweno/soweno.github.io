<?php
    session_start();
    
    	/*
		Настроим язык сайта
	*/
	if (isset($_GET["lng"])) {
		define('TRANSLATE_CURRENT_LANGUAGE', $_GET["lng"] ?: 'ru');
		$_SESSION["lng"] = TRANSLATE_CURRENT_LANGUAGE;
	}
	if (isset($_SESSION["lng"]) && !defined("TRANSLATE_CURRENT_LANGUAGE")) {
		define('TRANSLATE_CURRENT_LANGUAGE', $_SESSION["lng"] ?: 'ru');
	}
    
    require_once(__DIR__."/../../conf.php");
    require_once(__DIR__."/../../function.php");
    require_once(__DIR__."/../../function_update.php");

    $login = session('login');
    $refer = "";

    $m_orderid = 0;
    $m_curr = $val;
    $desc = T('Пополнение счета через ').escape(get('system')).T(' пользователем ').$login.T(' на ').format_number($_REQUEST['amount'])." ".$val;
    $m_desc = base64_encode($desc);
    $m_amount = 100;
    $_GET['system'] = "PerfectMoney";

    if (true || post('amount')) {
        header('Content-Type: application/json');
        $summa = $amount = $m_amount = (float)post('amount');
        $data = array();
        $user = get_row_by_field('users', 'login', $login);
        $refer = $user['refer'];

        if ($m_amount < $d_min || $m_amount > $d_max) {
            throw_json_error(T("Введите корректное значение платежа! От ")."$d_min".T(" до ")."$d_max $val.");
        }
        
        $date = time();
        $system = escape(get('system'));
		
		//подбираем план по сумме, если нету подходящего, тогда ничего не выбираем
		$result = $mysqli->query("SELECT * FROM `plans` WHERE min <='$summa' AND max >= '$summa'");
		if($result->num_rows <= 0){ 
			throw_json_error(T("Нету подходящего плана"));
		}
		
		if ($result) {
			while($row = $result->fetch_assoc()) {
				$plan_id = $row['id'];
				$percent = $row['percent'];
				$count = $row['count'];
				$seconds = $row['seconds'];
				$min = $row['min'];
				$max = $row['max'];
			}
			$result->free();
		}

        //подбираем план по сумме, если нету подходящего, тогда ничего не выбираем
        $mysqli->query("LOCK TABLE `invest` WRITE;");
        $result = $mysqli->query("INSERT INTO `invest` (login, summa, date, refer, pay_system, plan_id) VALUES ('$login', '$amount', '$date', '$refer', '$system', '$plan_id')");    
        $m_orderid = $mysqli->insert_id;
        $mysqli->query("UNLOCK TABLES;");

        if (!$m_orderid) {
            throw_json_error(T("Ошибка записи предплатежа!"));
        }


        //$m_amount = bm_convert_rub_2_usd($m_amount);
        $m_amount = format_money($m_amount);


        $form = [
            'PAYEE_ACCOUNT' => $perfect_money_account_number,
            'PAYEE_NAME' => $login,
            'PAYMENT_ID' => $m_orderid,
            'PAYMENT_AMOUNT' => $m_amount,
            'PAYMENT_UNITS' => $perfect_money_val,
            'STATUS_URL' => $perfect_money_status_url,
            'PAYMENT_URL' => $perfect_money_success_url,
            'PAYMENT_URL_METHOD' => "POST",
            'NOPAYMENT_URL' => $perfect_money_fail_url,
            'NOPAYMENT_URL_METHOD' => "POST",
            'BAGGAGE_FIELDS' => "",
            'PAYMENT_METHOD' => 'PerfectMoney account',
            'SUGGESTED_MEMO' => $desc,
        ];

        $data['link'] = "https://perfectmoney.is/api/step1.asp";
        $data['params'] = $form;//http_build_query($form);
        $data['method'] = "POST";

        send_json($data);
    } else {
        throw_json_error(T("Ошибка"));
    }