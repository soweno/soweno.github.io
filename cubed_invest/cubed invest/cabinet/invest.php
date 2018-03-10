<?php include ("menu_user.php"); ?>
<div class="panel-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="box-oper">
					<h1><?php echo T("Пополнить баланс"); ?></h1>
					<br/>
					<p><?php echo T("Выбор платежной системы"); ?>:</p>
					<div class="clearfix"></div>
					<?php if($invest == 1 && ($start_time - $time > 0)){ ?>
					<div style="color:red"><?php echo $close;?></div>
					<?php } elseif($invest == 1 && ($start_time - $time < 0)) { ?>
					<div style="color:red"><?php echo T("Работа временно приостановлена"); ?>.</div>
					<?php } else { ?>
					<form method="post"	 class="form-oper closeerr">
						<table class="table form table-oper">
							<input name="Oper" id="add_Oper" value="CASHIN" type="hidden">
							<tr>
								<td colspan="2" align="center">
									<div class='box-oper-psys'>
										<label class="current" rel='<?php echo $valu;?>'>
											<input type="radio" id="perfect" checked="checked">
											<img src="images/psys/4.png">
										</label>
									</div>
									<div class='box-oper-psys'>
										<label  rel='<?php echo $valu;?>'>
											<input type="radio" id="payeer">
											<img src="images/psys/6.png">
										</label>
									</div>
									<div class="clearfix"></div>
									<br/>
								</td>
							</tr>
							<tr>
								<td align="right" width="0%">
									<label for="add_Sum"><?php echo T("Сумма вклада"); ?>:</label>
								</td>
								<td align="left">
									<p>
										<input placeholder="<?php echo T("Сумма"); ?>" name="amount" value="" size="20" type="text" class="string_small amount-in-cabiner">
									</p>
									<i>
										<span id="ccurr" class="in-account-span"><small><?php echo $valu;?></small></span>
									</i>
								</td>
							</tr>
						</table>
						<center>
							<div class='submit'>
								<div>
									<input name="add_btn" value="<?php echo T("Инвестировать"); ?>" type="submit" class="login-btn btn-filled transfer_button">
								</div>
							</div>
							&nbsp;&nbsp;
						</center>
					</form>
					<?php } ?>
				</div>
			</div>
			<div class="clearfix"></div>
			<br/>
		</div>
	</div>
</div>
