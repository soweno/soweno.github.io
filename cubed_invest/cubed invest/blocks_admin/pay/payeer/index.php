<?php
    session_start();
    
    require_once(__DIR__."/../../conf.php");
    require_once(__DIR__."/../../function.php");

    $system = "Payeer";
    if (is_post()) {
        $ar_hash = array(
            post('m_operation_id'),
            post('m_operation_ps'),
            post('m_operation_date'),
            post('m_operation_pay_date'),
            post('m_shop'),
            post('m_orderid'),
            post('m_amount'),
            post('m_curr'),
            post('m_desc'),
            post('m_status'),
            $payeer_secret_key);

        $sign_hash = strtoupper(hash('sha256', implode(':', $ar_hash)));
        if (post('m_sign') === $sign_hash && post('m_status') === 'success') {
            $id = (int)post("m_orderid");
            $m_amount = post("m_amount");
            $m_amount = format_money($m_amount);

            $sql = "SELECT * FROM `invest` WHERE `id` = ".escape_db($id)." AND `summa` = ".escape_db($m_amount)." AND `status` = '0' LIMIT 1;";
            $result = $mysqli->query($sql);
            if ($result->num_rows !== 1) {
                die($_POST['m_orderid'].'|error');
            }
            $row = $result->fetch_assoc();
            if (!$row) {
                die($_POST['m_orderid'].'|error');
            }
            $sql = "UPDATE `invest` SET `status`= '1' WHERE `id` = ".escape_db($id)." LIMIT 1;";
            if (!$mysqli->query($sql)) {
                die($_POST['m_orderid'].'|error');
            }
            $login = $row['login'];
    
	add_depozit_plans($login, $m_amount, $row['plan_id']);

            echo $_POST['m_orderid'].'|success';
            exit(0);
        } else {
            die($_POST['m_orderid'].'|error');
        }

    } else {
        die($_POST['m_orderid'].'|error');
    }