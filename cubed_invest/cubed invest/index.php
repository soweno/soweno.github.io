<?php
	header('Content-Type: text/html; charset=utf-8');
    ob_start();
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
	
	include ('conf.php');
	include 'function.php';

	$site = $_SERVER['HTTP_HOST'];

	$time = time();
	$start_time = strtotime($start_data);
	$work_time = floor(($time-$start_time)/(24*3600));

	//ip клиента
	$ip = check_ip();

	//определение реферала
	if(!empty($_GET['ref'])){
		session_unset();
		$_GET['ref'] = preg_replace("#[^a-z\_\-0-9]+#i",'',$_GET['ref']);
		if($_GET['ref'] != ''){
			$refq = $mysqli->query("SELECT login FROM users WHERE login='".$_GET['ref']."'");
			if($refq && $refq->num_rows > 0){
				$refm = $refq->fetch_row();
				$_SESSION['ref_login'] = $refm[0];
			}
		}
	}

	// получаем данные из таблицы дата
	$depozit = 0; // вклады
	$invest = 0; // пополнения
	$payment = 0; // выплаты

	$dataq = $mysqli->query("SELECT * FROM `data`");
	if ($dataq) {
		$d = $dataq->fetch_row();

		$depozit = $d[1]; // вклады
		$invest = $d[2]; // пополнения
		$payment = $d[3]; // выплаты
	}

	if($start_time - $time > 0){
		$depozit = 1;
		$invest = 1;
		$payment = 1;
		$close = "Запуск системы состоится ".date('j '.$mdate[date('n',$start_time)-1].' Y года в H:i МСК.',$start_time);
	}

	//меняем статус депозита которых время работы вышло
	$time_current = time();
	$mysqli->query("UPDATE `depozit` SET status = '1' WHERE status = '0' AND date_end < '$time_current'");
	$mysqli->query("UPDATE `profit` SET status = '1' WHERE status = '0' AND date_end < '$time_current'");

	//колличество юзеров в системе
	$count_user = 0;
	$count_user = count_user() + $fake_users;

	//сумма всех пополнений пополений
	$balans_invest = 0;
	$balans_invest = balans_invest() + $fake_invest;

	//сумма всех выплат
	$balans_payment = 0;
	$balans_payment = balans_payment() + $fake_payment;

	//баланс системы
	$balans_system = $balans_invest - $balans_payment - ($balans_invest * ($percent_admin / 100));

	//логин пострадавшего
	$login = isset($_SESSION['login']) ? $_SESSION["login"] : "";

	//номер телефона участника
	$login_phone = '';
	$login_phone = login_phone($login);

	//сумма пополений для участника
	$login_invest = 0;
	$login_invest = login_invest($login);

	//сумма выплат для участника
	$login_payment = 0;
	$login_payment = login_payment($login);

	//сумма вкладов которые в работе для участника
	$login_depozit = 0;
	$login_depozit = login_depozit($login);

	//профит с вкладов для участника
	$login_profit = 0;
	$login_profit = login_profit($login);

	//второй уровень
	$ref_level_two = 0;
	$ref_level_two = ref_level_two ($login, 5);

	//третий уровень
	$ref_level_three = 0;
	$ref_level_three = ref_level_three ($login, 2);

	//реферальные для участника
	$login_referal = 0;
	$login_referal = login_referal($login, $p_ref) + $ref_level_two + $ref_level_three;

	//рефералов у участника
	$count_referal = 0;
	$count_referal = count_referal($login);

	//получить email участника
	$login_email = '';
	$login_email = login_email($login);

	//получить payeer участника
	$login_payeer = '';
	$login_payeer = login_payeer($login);

	//получить perfect участника
	$login_perfect = '';
	$login_perfect = login_perfect($login);

	//баланс участника
	$balans = $login_invest - $login_payment - $login_depozit + $login_profit + $login_referal;

	//получение страницы
	$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : "";

	include ('blocks/head.php');
	if($page == "registration") {
		include ('blocks/center.php');
	} else {
		include ('blocks/top.php');
		include ('blocks/center.php');
		include ("blocks/footer.php");
	}

	if (isset($_SESSION['message'])) {
		unset($_SESSION['message']);
	}
?>
