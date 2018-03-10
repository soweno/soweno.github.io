<?php
	session_start();
	include ('conf.php');
	include ('function.php');
	if ((!empty ($_SESSION['login'])) && (!empty ($_SESSION['password']))) {
		header("Location: index.php");
		exit;
	}
	$_SESSION['message'] = '';
	$link = 'index.php?page=login';
	while (isset($_POST['auth_button'])) {
		if (empty($_POST['login'])) {
			$_SESSION['message'] = "Вы не ввели Логин";
			header("Location: $link");
			exit;
		}
		$login = $_POST['login'] = preg_replace("#[^a-z\_\-0-9]+#i", '', $_POST['login']);		if (empty($_POST['password'])) {
			$_SESSION['message'] = "Вы не ввели Пароль";
			header("Location: $link");
			exit;
		}
		$_POST['password']  = preg_replace('#[^a-zA-Z\-\_0-9]+#', '', $_POST['password']);
		$password = md5($_POST['password']);
		$result_auth = $mysqli->query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");
		if ($result_auth && ($user = $result_auth->fetch_assoc())) {
			$_SESSION['id']   = $user['id'];
			$_SESSION['login'] = $user['login'];
			$_SESSION['password']  = $user['password'];
			$_SESSION['date']  = $user['date'];
			$_SESSION['email']  = $user['email'];
			$_SESSION['refer']  = $user['refer'];
			$_SESSION['payeer']  = $user['payeer'];
			$_SESSION['perfect']  = $user['perfect'];			
			header("Location: index.php?page=cabinet");
			exit;
		} else {
			$_SESSION['message'] = "Ваш логин или пароль содержат ошибку. Попробуйте повторно заполнить форму входа. ";
			
			header("Location: $link");
			exit;
		}		break;
	}
?>