<?php	
	# Получаем настройки кошельков
    # Qiwi
	$result_pay = $mysqli->query("SELECT * FROM `pay_methods`");
    $row_pay = $result_pay->fetch_assoc();
    $admin_phone = $admin_qiwi_phone_invest = $row_pay['qiwi_inv_phone']; //номер Qiwi кошелька для пополнений
    $admin_qiwi_password_invest = $row_pay['qiwi_inv_password']; //Пароль Qiwi кошелька для пополнений
    
    #Payeer
    $payeer_account_number = $row_pay['payeer_account_number']; // номер кошелька Payeer
	# Магазин
	$payeer_shop = $row_pay['payeer_shop']; // номер магазина в системе Payeer
	$payeer_secret_key = $row_pay['payeer_secret_key']; // Секретный ключ к магазину Payeer
    # Api
    $payeer_api_id = $row_pay['payeer_api_id']; // id api кошелька Payeer
    $payeer_api_key = $row_pay['payeer_api_key']; // key api кошелька Payeer
	# Валюта
	$payeer_val = $row_pay['payeer_val']; // Валюта
	
	#PerfectMoney
	$perfect_money_api_id = $row_pay['perfect_money_api_id']; // id кошелька
	$perfect_money_account_number = $row_pay['perfect_money_account_number']; // Номер кошелька
	$perfect_money_api_pass = $row_pay['perfect_money_api_pass']; // Пароль от кошелька
	$perfect_money_alt_phrase = $row_pay['perfect_money_alt_phrase']; // Alt-фраза
    $perfect_money_val = $row_pay['perfect_money_val']; // Валюта
	
	/*
	//Qiwi
	$admin_phone = $admin_qiwi_phone_invest = "+7**********";
	$admin_qiwi_password_invest = "******";

    //payeer
	$payeer_account_number = ""; 
	$payeer_api_id = "'"; 
	$payeer_api_key = ""; 
	$payeer_shop = ""; 
	$payeer_secret_key = ""; 
	$payeer_val = "RUB"; 

	$perfect_money_api_id = ""; 
	$perfect_money_account_number = ""; 
	$perfect_money_api_pass = ""; 
	$perfect_money_alt_phrase = "";
    $perfect_money_val = "USD";
	*/
	
	//perfect - Руками не трогать
    $perfect_money_base_url = "https://".$_SERVER['SERVER_NAME']."/pay/perfectmoney/";
    $perfect_money_status_url = $perfect_money_base_url."index.php";
    $perfect_money_success_url = $perfect_money_base_url."success.php";
    $perfect_money_fail_url = $perfect_money_base_url."fail.php";