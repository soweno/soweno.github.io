<?php
	$nay = 0;
	if (!empty($_GET['page'])) {
		$req = $_GET['page'];
		$req = str_replace('/?page=', '', $req);
		if (in_array($req, $inc)) {
			$nay = 1;
			include('pages/' . $req . '.php');
		}
		if (isset($_SESSION['login']) && isset($_SESSION['password']) && in_array($req, $inc_cab)){
			$nay = 1;
			include('cabinet/' . $req . '.php');
		}
		
		if (!(isset($_SESSION['login']) && isset($_SESSION['password'])) && $req == 'registration') {
			$nay = 1;
			include('pages/registration.php');
		}
		if (!(isset($_SESSION['login']) && isset($_SESSION['password'])) && $req == 'login') {
			$nay = 1;
			include('pages/login.php');
		}
	}

	if ($nay != 1) {
		include('pages/main.php');
	}
?>				