<?php
	session_start();
	include('conf.php');

	if(!isset($_SESSION['login']) || $_SESSION['login'] != $admin_login){
		//die('Войдите под своим логином на сайте');
		header("HTTP/1.0 404 Not Found");
		exit(0);
	}

	include('function.php');

	include ("adg/forms.php");
	include ("adg/form_handlers.php");

	include('adg/message.php');

	//ip клиента
	$ip = check_ip();

	$time = time();

	$dataq = $mysqli->query("SELECT * FROM data");
	$d = $dataq->fetch_row();

	$depozit = $d[1];		//состояние вкладов
	$invest = $d[2];	//состояние пополнения
	$payment = $d[3];		//состояние выплат

	//сумма всех пополнений пополений
	$balans_invest = 0;
	$balans_invest = balans_invest();

	//сумма всех выплат
	$balans_payment = 0;
	$balans_payment = balans_payment();

	//баланс системы
	$balans_system = $balans_invest - $balans_payment - ($balans_invest * ($percent_admin / 100));
?>

<!--заголовок-->
<?php include 'blocks_admin/head.php';?>
<!--топ меню-->
<?php include 'blocks_admin/top.php';?>

<?php
	if(!empty($_GET['page']) && in_array(
		$_GET['page'],
		['topayment', 'invest', 'payment', 'payment_cancel', 'all_depozit_work', 'add', 'set', 'settings', 'clear', 'plans', 'add_plans', 'news', 'add_news', 'users', 'pay_methods', 'update_users'])) {
		include ('adg/'.$_GET['page'].'.php');
	} else {
		include ('adg/invest.php');
	}
?>
<!--Футер-->
<?php include 'blocks_admin/footer.php';?>
