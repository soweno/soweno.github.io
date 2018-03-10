<?php
    session_start();
    require_once(__DIR__."/../../conf.php");


    $login = session('login');
    $refer = "";

    $m_shop = $payeer_shop;
    $m_orderid = 0;
    $m_curr = $payeer_val;
    $m_key = $payeer_secret_key;
    $desc = 'Пополнение счета через '.escape(get('system')).' пользователем '.$login.' на '.format_number($_REQUEST['amount'])." ".$val;
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

		$h_id = post('h_id');
		if (!$h_id) {
			throw_json_error("Выберите тарифный план.");
		}
		
		//проверить есть ли такой тарифный план
		$result = $mysqli->query("SELECT id FROM `plans` WHERE id = '$h_id'");
		if($result->num_rows <= 0){ 
			throw_json_error("Такого плана не существует.");
		}
		
		//получение суммы по плану
		$result = $mysqli->query("SELECT * FROM `plans` WHERE id = '$h_id'");
		if ($result) {
			while($row = $result->fetch_assoc()) {
				$min = $row['min'];
				$max = $row['max'];
			}
			$result->free();
		}
		
        if ($summa < $min || $summa > $max) {
            throw_json_error("Введите корректное значение платежа! От $min до $max $val.");
        }

        /*if (!get_plans_by_sum($summa)) {
            throw_json_error("Нельзя сделать пополнение на эту сумму!");
        }*/

        $date = time();
        $system = escape(get('system'));
		
		$refback = 0;
		//получаем рефбек
		$result = $mysqli->query("SELECT refback FROM `users` WHERE login = '$refer'");
		if ($result && $row = $result->fetch_assoc()) {
			$refback = $row['refback'];
		}
		
		
        //подбираем план по сумме, если нету подходящего, тогда ничего не выбираем
        $mysqli->query("LOCK TABLE `invest` WRITE;");
		$plan_id = post('h_id');
        $result = $mysqli->query("INSERT INTO `invest` (login, summa, date, refer, pay_sistem, plan_id, refback) VALUES ('$login', '$amount', '$date', '$refer', '$system', '$plan_id', '$refback')");

        $m_orderid = $mysqli->insert_id;
        $mysqli->query("UNLOCK TABLES;");

        if (!$m_orderid) {
            throw_json_error("Ошибка записи предплатежа!");
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
        throw_json_error("Ошибка");
    }