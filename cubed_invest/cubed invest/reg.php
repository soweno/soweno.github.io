<?php	include ('conf.php');
	include ('function.php');
	session_start();
	$site = $_SERVER['HTTP_HOST'];
	if ((!empty ($_SESSION['login'])) && (!empty ($_SESSION['password']))) {
		header("Location: index.php");
		exit;
	}
	$link = "index.php?page=registration"; //переадресация при ошибке	$time = time();	
	$_SESSION['message'] = '';	$ip = check_ip();
	while (isset($_POST['reg_button'])) {		if(isset($_POST['rules']) && ($_POST['rules'] == 'check')){					} else {			$_SESSION['message'] = "Ознакомьтесь с правилами.";			header("Location: $link");			exit;		}
		//логин
		if(empty($_POST['login'])) {
			$_SESSION['message'] = "Вы не ввели Логин";
			header("Location: $link");
			exit;
		}		
		$login = $_POST['login'];
		$login = preg_replace('#[^a-zA-Z\-\_0-9]+#','', $login);
		$login = trim($login);		
		if(strlen($login) < 3) {
			$_SESSION['message'] = 'Логин не меньше 3 символов!';
			header("Location: $link");
			exit;
		}
		$result_login = $mysqli->query("SELECT login FROM users WHERE login LIKE '$login'");
		if($result_login->num_rows > 0){ 
			$_SESSION['message'] = 'Этот логин занят!';
			header("Location: $link");
			exit;
		}
		$result_ip = $mysqli->query("SELECT id FROM users WHERE ip = '$ip' AND ip <> '';");		if($result_ip->num_rows > 0){ 			$_SESSION['message'] = 'Повторная регистрация не возможна!';			header("Location: $link");			exit;
		}
		//первый пароль
		if(empty($_POST['password'])) {
			$_SESSION['message'] = "Вы не ввели Пароль";
			header("Location: $link");
			exit;
		}		$password = $_POST['password'];
		if(strlen($password) < 4) {
			$_SESSION['message'] = 'Пароль не менее 4 символов';
			header("Location: $link");
			exit;
		}
		//Второй пароль
		if(empty($_POST['password2'])) {
			$_SESSION['message'] = "Вы не ввели Пароль повторно";
			header("Location: $link");
			exit;
		}		$password2 = $_POST['password2'];
		//сравнение паролей
		if($password !== $password2){
			$_SESSION['message'] = "Пароли не совпадают";
			header("Location: $link");
			exit;
		}
		/*емаил юзера*/
		if(empty($_POST['email'])) {
			$_SESSION['message'] = 'Введите E-mail';
			header("Location: $link");
			exit;
		}
		$email = $_POST['email'];
		/*проверка для мыла*/
		$email = trim($email);		
		$result = $mysqli->query("SELECT email FROM `users` WHERE email LIKE '$email'");
		if($result->num_rows > 0){ 
			$_SESSION['message'] = 'Этот E-mail занят!';
			header("Location: $link");
			exit;
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){			
		} else {
			$_SESSION['message'] = "Введите корректный E-mail";
			header("Location: $link");
			exit;
		}
		//определение реферала
		if(!empty($_SESSION['ref_login'])) {
			$refer = $_SESSION['ref_login']; 
		} else {
			$refer = $free_referal;
		}
		$ip = check_ip();
		$sql = "SELECT COUNT(*) as count FROM `users` WHERE ip = '$ip' LIMIT 1";
		$result = $mysqli->query($sql);
		$row = $result->fetch_assoc() ;
		if (!isset($row['count']) || $row['count'] > 0) {
			$_SESSION['message'] = "Запрещена множественная регистрация с одного ip!";
			header("Location: $link");
			exit;
		}
		$result_add_user = $mysqli->query("INSERT INTO users (login, password, date, email, refer, ip) VALUES ('$login', '".md5($password)."', '$time', '$email', '$refer', ".dbEscape($ip).")");
		if ($result_add_user) {
			$_SESSION['message'] = "Поздравляем, Вы успешно зарегистрировались!";
			header("Location: index.php?page=login");
			exit;
		} else {
			$_SESSION['message'] = "Регистрация не удалась, попробуйте повторить действие позже!";
			header("Location: $link");
			exit;
		}
		break;
	}
?>