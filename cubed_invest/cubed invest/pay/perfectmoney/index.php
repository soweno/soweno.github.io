<?php
    session_start();
    require_once(__DIR__."/../../conf.php");
    require_once(__DIR__."/../../function.php");

    $string = $_REQUEST['PAYMENT_ID'].':'.$_REQUEST['PAYEE_ACCOUNT'].':'.$_REQUEST['PAYMENT_AMOUNT'].':'.$_REQUEST['PAYMENT_UNITS'].':'.$_REQUEST['PAYMENT_BATCH_NUM'].':'.$_REQUEST['PAYER_ACCOUNT'].':'.strtoupper(md5($perfect_money_alt_phrase)).':'.$_REQUEST['TIMESTAMPGMT'];

    $hash = strtoupper(md5($string));
    $system = "PerfectMoney";
    if($hash === $_REQUEST['V2_HASH'] && $_REQUEST['PAYMENT_UNITS'] === 'USD') {

            $id = (int)(isset($_REQUEST['PAYMENT_ID']) ? $_REQUEST['PAYMENT_ID'] : 0);
            $m_amount = isset($_REQUEST['PAYMENT_AMOUNT']) ? $_REQUEST['PAYMENT_AMOUNT'] : 0;
            $m_amount = format_money($m_amount);

            $sql = "SELECT * FROM `invest` WHERE `id` = ".escape_db($id)." AND `summa` = ".escape_db($m_amount)." AND `status` = '0' LIMIT 1;";
            $result = $mysqli->query($sql);
            if ($result->num_rows !== 1) {
                die('ERROR');
            }
            $row = $result->fetch_assoc();
            if (!$row) {
                die('ERROR');
            }
            $sql = "UPDATE `invest` SET `status`= '1' WHERE `id` = ".escape_db($id)." LIMIT 1;";
            if (!$mysqli->query($sql)) {
                die('ERROR');
            }
            $login = $row['login'];
			
			$result = $mysqli->query("SELECT plan_id FROM `invest` WHERE `id` = ".escape_db($id)." LIMIT 1");
			if ($result) {
				while($row = $result->fetch_assoc()) {
					$plan_id = $row['plan_id'];
				}
				$result->free();
			}
			
			//подбираем данные по плану для вклада
			$result = $mysqli->query("SELECT * FROM `plans` WHERE id = '$plan_id'");			
			if ($result) {
				while($row = $result->fetch_assoc()) {
					$percent = $row['percent'];
					$count = $row['count'];
					$seconds = $row['seconds'];
					$min = $row['min'];
					$max = $row['max'];
				}
				$result->free();
			
			
			//$m_amount = bm_convert_usd_2_rub($m_amount);
            add_depozit_plans($login, $m_amount, $seconds, $percent, $count);
            exit(0);
        } else {
            die('ERROR');
        }

    } else {
        die('ERROR');
    }