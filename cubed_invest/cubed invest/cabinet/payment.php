<?php
	while (is_post()) {
        if (in_array(post('pay_system'), ["Payeer", "PerfectMoney"])) {
            $summa = post('summa');
            $pay_system = post('pay_system');
            if ($summa > $balans) {
                $message = '<div style="color:red;">'.T("Некорректная сумма для выплаты!").'</div>';
                break;
            }
            if ($summa < $d_wmin || $summa > $d_wmax) {
                $message = '<div style="color:red;">'.T("Некорректная сумма для выплаты!").'</div>';
                break;
            }
            $sql = "INSERT INTO payment SET login = ".escape_db($login).", summa = ".escape_db($summa).", pay_system = ".escape_db($pay_system).", date = ".escape_db(time()).";";
            $mysqli->query($sql);
            $message = '<div style="color:green;">'.T("Выплата заказана, дождитесь обработки!").'</div>';
        }
        break;
    }
?>
<?php include ("menu_user.php"); ?>
<div class="panel-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="box-oper">
					<h1><?php echo T("Вывод средств"); ?></h1>
					<div class="clearfix"></div>
					<br/>
					<?php
						if (isset($message)) {
							echo $message.'<br/>';
						}
					?>

					<div class="clearfix"></div>
					<p><?php echo T("Вывод на платежные системы"); ?>:</p>
					<div class="clearfix"></div>
					<?php if($payment == 1 && ($start_time - $time > 0)){ ?>
					<div style="color:red"><?php echo $close;?></div>
					<?php } elseif($payment == 1 && ($start_time - $time < 0)) { ?>
					<div style="color:red"><?php echo T("Работа временно приостановлена"); ?>.</div>
					<?php } else { ?>
					<?php
						if (($login_perfect == "") && ($login_payeer == "")) {
							echo T("Заполните информацию о кошельках");
						} else {
					?>
					<form method="post" class="form-oper closeerr">
						<table class="table form table-oper">
							<tr>
								<td colspan="2" align="center">
									<?php if ($login_perfect !== "") { ?>
									<div class='box-oper-psys'>
										<label class="current" rel='<?php echo $valu; ?>'>
											<input type="radio" name="pay_system" checked="checked"  value="PerfectMoney">
											<img src="/images/psys/4.png">
										</label>
									</div>
									<?php } ?>
									<?php if ($login_payeer !== "") { ?>
									<div class='box-oper-psys'>
										<label  rel='<?php echo $valu; ?>'>
											 <input type="radio" name="pay_system"  value="Payeer">
											 <img src="/images/psys/6.png">
										</label>
									</div>
									<?php } ?>
									<div class="clearfix"></div>
									<br/>
								</td>
							</tr>
							<tr>
								<td align="right" width="0%">
									<label for="add_Sum"><?php echo T("Сумма вывода"); ?>:</label>
								</td>
								<td align="left">
									<p>
										<input name="summa" placeholder="<?php echo T("Сумма"); ?>" value="" size="20"type="text" class="string_small amount-in-cabiner">
									</p>
									<i><span id="ccurr" class="in-account-span"><small><?php echo $valu; ?></small></span></i>
								</td>
							</tr>
						</table>
						<center>
							<div class='submit'>
								<div>
									<input name="add_payment"  value="<?php echo T("Создать"); ?>" type="submit" class="login-btn btn-filled">
								</div>
							</div>&nbsp;&nbsp;
						</center>
					</form>
					<?php } } ?>
				</div>
				<div class="clearfix"></div>
				<br/>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
