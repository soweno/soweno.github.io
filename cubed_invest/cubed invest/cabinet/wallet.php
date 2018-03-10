<?php
	while (post('save')) {
		//добавление кошелька payeer
	    if (post('payeer')) {
            $payeer = post('payeer');
			if(preg_match("#^P[0-9]+$#", post('payeer'))) {
				$result = $mysqli->query("UPDATE `users` SET payeer = ".escape_db($payeer)." WHERE login = '$login'");
				$_SESSION['payeer'] = $payeer;
				$login_payeer = $payeer;
			} else {
				$message = 'Введите корректный номер payeer';
				break;
			}
		}

		//добавление кошелька perfect
		if (post('perfect')) {
            $perfect = post('perfect');
			if(!preg_match("#^U[0-9]+$#", post('perfect'))) {
				$message = 'Введите корректный номер perfect';
				break;
			} else {
				$result = $mysqli->query("UPDATE `users` SET perfect = ".escape_db($perfect)." WHERE login = '$login'");
                $_SESSION['perfect'] = post('perfect');
				$login_perfect = post('perfect');
			}
		}
		break;
	}
?>
<?php include ("menu_user.php"); ?>
<div class="panel-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10">
				<h1><?php echo T("Платежные реквизиты"); ?></h1>
				<p><?php echo T("Ваши платежные реквизиты"); ?>:</p>
				<form method="post" class='form-oper' action="">
					<div class="box-wallets">
						<div class='PM'>
							<label><?php echo T("Номер счета"); ?></label>
							<?php if($login_perfect == "") { ?>
							<input name="perfect" type="text"  placeholder='U1234567'>
							<?php } else { ?>
							<input type="text" disabled value="<?php echo $login_perfect;?>">
							<?php } ?>
						</div>

						<div class='PY'>
							<label><?php echo T("Номер счета"); ?></label>
							<?php if($login_payeer == "") { ?>
							<input name="payeer" type="text"  placeholder='P1234567'>
							<?php } else { ?>
							<input type="text" disabled value="<?php echo $login_payeer;?>">
							<?php } ?>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="submit">
						<div>
							<input name="save" value="<?php echo T("Сохранить"); ?>" type="submit" >
						</div>
					</div>
					<div class="clearfix"></div>
					<br/>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
