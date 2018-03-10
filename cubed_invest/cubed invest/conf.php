<?php
	//установим таймзону
	date_default_timezone_set("Europe/Minsk");

	//КОРЕНЬ САЙТА
	define('ROOT', $_SERVER['DOCUMENT_ROOT']);
	//ЗАПРОс
	define('REQUEST_URI', $_SERVER['REQUEST_URI']);

	//продакшен версия
	define('PRODUCTION', true || $_SERVER['SERVER_NAME'] === 'cubed24.com'); //укажи свой сайт

	//автоактивация демо
	define('DEMO', substr_count($_SERVER['SERVER_NAME'], ".") === 2);

	//версия для тестирования
	define('TESTING', $_SERVER['SERVER_NAME'] === '');

	//версия для дев. серверов
	define('DEVELOPMENT', !PRODUCTION && !TESTING);

	//добавим антикеш для не продакшена
	define('NO_CACHE', !PRODUCTION ? "?nocache=".time() : "");

	//ПРИ УСТАНОВКЕ ЕСЛИ БАЗА С ТАКИМ ИМЕНЕМ СУЩЕСТВУЕТ, ТО БУДЕТ УНИЧТОЖЕНА И АВТОМАТИЧЕСКИ СОЗДАНА НОВАЯ
	switch (true) {
  		case PRODUCTION:
  			//на выкат
  			error_reporting(0); //запрещяем вывод ошибок ошбики
			define('DB_HOST', 'localhost');
			define('DB_USER', 'user115_uzerinvest');
			define('DB_PASS', 'J7dmeWC)T0x1X*5@Fx');
			define('DB_NAME', 'user115_cubedinvest');
			define('DB_CHAR', 'utf8');
	    break;
  		case TESTING:
  			//для тестирования
  		  	error_reporting(E_ALL); //запрещяем вывод ошибок ошбики
            define('DB_HOST', 'localhost');
			define('DB_USER', 'dbuser');
			define('DB_PASS', 'dbpass');
			define('DB_NAME', 'dbname');
			define('DB_CHAR', 'utf8');
        break;
	    case DEVELOPMENT:
	    default:
	    	//локальный
			error_reporting(E_ALL); //выводим все ошбики
			define('DB_HOST', 'localhost');
			define('DB_USER', 'root');
			define('DB_PASS', '');
			define('DB_NAME', 'cubed24');
			define('DB_CHAR', 'utf8');
		break;
	}

	if (preg_match('/.*\/install\/{0,1}/', REQUEST_URI)) {

	} else {

		$mdate = array('Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря');

		//подключаемся
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		/* check connection */
		if ($mysqli->connect_errno) {
		    printf("Соединение не удалось: %s\n", $mysqli->connect_error);
		    exit();
		}
		$mysqli->query("SET character_set_results = '".DB_CHAR."', character_set_client = '".DB_CHAR."', character_set_connection = '".DB_CHAR."', character_set_database = '".DB_CHAR."', character_set_server = '".DB_CHAR."'");
		//получаем настройки системы
		$result = $mysqli->query("SELECT * FROM `data`");

		$row = $result->fetch_assoc();
		$admin_login = $row['admin'];			// админ в проекте
		$name_project = $row['name_project'];	// название проекта
		$free_referal = $row['free_referal'];	// под кого будут падать все свободные рефералы
		$d_min = $row['depozit_min'];			// минимальная сумма пополнения
		$d_max = $row['depozit_max'];			// максимальная сумма пополения
		$d_wmin = $row['payment_min'];			// минимальная сумма на выплаты
		$d_wmax = $row['payment_max'];			// максимальная сумма на выплаты
		$p_ref = $row['percent_referal'];		// реферальный %
		$percent = $row['percent'];				// процент начисления в системе
		$percent_admin = $row['percent_admin'];	// админу %
		$time_hour = $row['time_hour'];			// на сколько часов депозит
		$start_data = $row['start_data'];		// дата старта проекта

		//fake
		$fake_users = $row['fake_users'];		// накрученных пользователей
		$fake_invest = $row['fake_invest'];		// накрученных пополненний
		$fake_payment = $row['fake_payment'];	// накрученных выплат
		$fake_online = $row['fake_online'];	// накрученных онлайн

		$admin_email = $row['admin_email'];		//контактный E-mail администратора

		$admin_vk = $row['group_vk']; //группа в вк
		$admin_fb = $row['group_vk']; //группа в facebook
		$admin_tw = $row['group_vk']; //аккаунт в twitter


                $skype = "cubed24";
		$valu = "$";//Валюта для обозначения на сайте
		$val = "USD";//Валюта для платежных систем

		$inc = array('about', 'partnership', 'investments', 'news', 'faq', 'support', 'rules', 'show'); // внешние страницы
		$inc_cab = array('cabinet', 'invest', 'depozit', 'payment', 'settings', 'wallet', 'operations', 'payments', 'ref', 'promo'); //страницы кабинета

		require_once ("function_update.php");
		require_once ("settings_pay_system.php");
		require_once ("function_payment.php");
		//require_once (__DIR__."/bm_cbr_agent/index.php");
        require_once ("modules/translate/index.php");
	}
?>
