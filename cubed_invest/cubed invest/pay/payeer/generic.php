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

    $m_shop = $payeer_shop;
    $m_orderid = 0;
    $m_curr = $payeer_val;
    $m_key = $payeer_secret_key;
    $desc = T('Пополнение счета через ').escape(get('system')).T(' пользователем ').$login.T(' на ').format_number($_REQUEST['amount'])." ".$val;
    $m_desc = base64_encode($desc);
    $m_amount = 100;
    $_GET['system'] = "Payeer";

    $m_amount = $_POST['amount'] = post('amount');
    if (true || post('amount')) {
        header('Content-Type: application/json');
        $summa = $amount = $m_amount = (float)post('amount');
        $data = array();
        $user = get_row_by_field('users', 'login', $login);
        $refer = $user['refer'];

        if ($summa < $d_min || $summa > $d_max) {
            throw_json_error(T("Введите корректное значение платежа! От ")."$d_min ".T("до")." $d_max $val.");
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
		
        $mysqli->query("LOCK TABLE `invest` WRITE;");
        $result = $mysqli->query("INSERT INTO `invest` (login, summa, date, plan_id, refer, pay_system) VALUES ('$login', '$amount', '$date', '$plan_id', '$refer', '$system')");
        $m_orderid = $mysqli->insert_id;
        $mysqli->query("UNLOCK TABLES;");

        if (!$m_orderid) {
            throw_json_error(T("Ошибка записи предплатежа!"));
        }

        $m_amount = format_money($m_amount);
        $arHash = array(
            $m_shop,
            $m_orderid,
            $m_amount,
            $m_curr,
            $m_desc,
            $m_key
        );
        $sign = strtoupper(hash('sha256', implode(':', $arHash)));
        $data['link'] = "http://payeer.com/merchant/?m_shop=$m_shop&m_orderid=$m_orderid&m_amount=$m_amount&m_curr=$m_curr&m_desc=$m_desc&m_sign=$sign";
        send_json($data);
    } else {
        throw_json_error(T("Ошибка"));
    }