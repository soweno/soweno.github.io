<?php
	$report = '';
	#Получаем настройки платежный данных
	$result = $mysqli->query("SELECT * FROM `pay_methods`");
	$row = $result->fetch_assoc();
	#QIWI
	$qiwi_phone_invest = $row['qiwi_inv_phone']; //номер Qiwi кошелька для пополнений
	$qiwi_password_invest = $row['qiwi_inv_password']; //Пароль Qiwi кошелька для пополнений
	
	#Payeer
    $payeer_account_number = $row['payeer_account_number']; // номер кошелька Payeer
	# Магазин
	$payeer_shop = $row['payeer_shop']; // номер магазина в системе Payeer
	$payeer_secret_key = $row['payeer_secret_key']; // Секретный ключ к магазину Payeer
    # Api
    $payeer_api_id = $row['payeer_api_id']; // id api кошелька Payeer
    $payeer_api_key = $row['payeer_api_key']; // key api кошелька Payeer
	# Валюта
	$payeer_val = $row['payeer_val']; // Валюта
	
	#PerfectMoney
	$perfect_money_api_id = $row['perfect_money_api_id']; // id кошелька
	$perfect_money_account_number = $row['perfect_money_account_number']; // Номер кошелька
	$perfect_money_api_pass = $row['perfect_money_api_pass']; // Пароль от кошелька
	$perfect_money_alt_phrase = $row['perfect_money_alt_phrase']; // Alt-фраза
    $perfect_money_val = $row['perfect_money_val']; // Валюта


	#изменение данных
	while(isset($_POST['save'])) {
		//проверка на демо
		if (DEMO) {
			$report .= 'Установка параметров в демо-режиме запрещена';
			break;
		}
	
		//изменение кошелька киви проекта
		if(!empty($_POST['qiwi_inv_phone'])){
			$qiwi_inv_phone = $_POST['qiwi_inv_phone'];
			$mysqli->query ("UPDATE `pay_methods` SET `qiwi_inv_phone` = '$qiwi_inv_phone'");
			$report .= "Новый кошелек для пополнений Qiwi: $qiwi_inv_phone<br>";
		}
		
		//изменение пароля кошелька киви проекта
		if(!empty($_POST['qiwi_inv_password'])){
			$qiwi_inv_password = $_POST['qiwi_inv_password'];
			$mysqli->query ("UPDATE `pay_methods` SET `qiwi_inv_password` = '$qiwi_inv_password'");
			$report .= "Новый пароль для кошелька Qiwi: $qiwi_inv_password<br>";
		}

		//изменение кошелька Payeer
		if(!empty($_POST['payeer_account_number'])){
			$payeer_account_number = $_POST['payeer_account_number'];
			$mysqli->query ("UPDATE `pay_methods` SET `payeer_account_number` = '$payeer_account_number'");
			$report .= "Новый Payeer: $payeer_account_number<br>";
		}

		//изменение id магазина Payeer
		if(!empty($_POST['payeer_shop'])){
			$payeer_shop = $_POST['payeer_shop'];
			$mysqli->query ("UPDATE `pay_methods` SET `payeer_shop` = '$payeer_shop'");
			$report .= "Новый id магазина Payeer: $payeer_shop<br>";
		}

		//изменение секретного ключа магазина Payeer
		if(!empty($_POST['payeer_secret_key'])){
			$payeer_secret_key = $_POST['payeer_secret_key'];
			$mysqli->query ("UPDATE `pay_methods` SET `payeer_secret_key` = '$payeer_secret_key'");
			$report .= "Новый секретный ключ магазина Payeer: $payeer_secret_key<br>";
		}

		//изменение id Api Payeer
		if(!empty($_POST['payeer_api_id'])){
			$payeer_api_id = $_POST['payeer_api_id'];
			$mysqli->query ("UPDATE `pay_methods` SET `payeer_api_id` = '$payeer_api_id'");
			$report .= "Новый id Api Payeer: $payeer_api_id<br>";
		}

		//изменение секретного ключа Api Payeer
		if(!empty($_POST['payeer_api_key'])){
			$payeer_api_key = $_POST['payeer_api_key'];
			$mysqli->query ("UPDATE `pay_methods` SET `payeer_api_key` = '$payeer_api_key'");
			$report .= "Новый секретный ключ Api Payeer: $payeer_api_key<br>";
		}

		//изменение валюты Payeer
		if(!empty($_POST['payeer_val'])){
			$payeer_val = $_POST['payeer_val'];
			$mysqli->query ("UPDATE `pay_methods` SET `payeer_val` = '$payeer_val'");
			$report .= "Новая валюта Payeer: $payeer_val<br>";
		}
		
		//изменение id PerfectMoney
		if(!empty($_POST['perfect_money_api_id'])){
			$perfect_money_api_id = $_POST['perfect_money_api_id'];
			$mysqli->query ("UPDATE `pay_methods` SET `perfect_money_api_id` = '$perfect_money_api_id'");
			$report .= "Новый ID PerfectMoney: $perfect_money_api_id<br>";
		}
		
		//изменение кошелька PerfectMoney
		if(!empty($_POST['perfect_money_account_number'])){
			$perfect_money_account_number = $_POST['perfect_money_account_number'];
			$mysqli->query ("UPDATE `pay_methods` SET `perfect_money_account_number` = '$perfect_money_account_number'");
			$report .= "Новый Кошелек PerfectMoney: $perfect_money_account_number<br>";
		}
		
		//изменение Пароля кошелька PerfectMoney
		if(!empty($_POST['perfect_money_api_pass'])){
			$perfect_money_api_pass = $_POST['perfect_money_api_pass'];
			$mysqli->query ("UPDATE `pay_methods` SET `perfect_money_api_pass` = '$perfect_money_api_pass'");
			$report .= "Новый Пароль к Кошельку PerfectMoney: $perfect_money_api_pass<br>";
		}
		
		//изменение Alt-фразы кошелька PerfectMoney
		if(!empty($_POST['perfect_money_alt_phrase'])){
			$perfect_money_alt_phrase = $_POST['perfect_money_alt_phrase'];
			$mysqli->query ("UPDATE `pay_methods` SET `perfect_money_alt_phrase` = '$perfect_money_alt_phrase'");
			$report .= "Новая Alt-фраза PerfectMoney: $perfect_money_alt_phrase<br>";
		}
		
		break;
	}
?>

<div id="page-wrapper">
	<?php if(isset($report) && $report != '') { ?>
	<div>
		<div class="alert alert-warning alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $report;?>	
		</div>
	</div>
	<?php } ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Настройки</h3>
					</div>
					<div class="panel-body">
						<div class="flot-chart">
							<div class="flot-chart-content" id="flot-line-chart">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Параметр</th>
												<th>Текущее значение</th>
												<th>Новое значение</th>
											</tr>
										</thead>
										<tbody>
											<form action = "" method = "post" class = "settings">
												<!--tr>
													<td>Qiwi кошелек(пополнения)</td>
													<td><?php echo $qiwi_phone_invest;?></td>
													<td><input name = "qiwi_inv_phone" class = "form-control" placeholder = "+79223453434"></td>
												</tr>
												<tr>
													<td>Пароль Qiwi кошелька(пополнения)</td>
													<td><?php echo $qiwi_password_invest;?></td>
													<td><input name = "qiwi_inv_password" class = "form-control" placeholder = "Пароль"></td>
												</tr-->
												<tr>
													<td colspan="3">Настройки Payeer</td>
												</tr>
												<tr>
													<td>Номер Кошелька Payeer</td>
													<td><?php echo $payeer_account_number;?></td>
													<td><input name = "payeer_account_number" class = "form-control" placeholder = "P121212"></td>
												</tr>
												<tr>
													<td>ID Магазина</td>
													<td><?php echo $payeer_shop;?></td>
													<td><input name = "payeer_shop" class = "form-control" placeholder = "12341423"></td>
												</tr>
												<tr>
													<td>Секретный ключ Магазина</td>
													<td><?php echo $payeer_secret_key;?></td>
													<td><input name = "payeer_secret_key" class = "form-control" placeholder = "*********"></td>
												</tr>

												<tr>
													<td>ID Api</td>
													<td><?php echo $payeer_api_id;?></td>
													<td><input name = "payeer_api_id" class = "form-control" placeholder = "12341423"></td>
												</tr>
												<tr>
													<td>Секретный ключ Api</td>
													<td><?php echo $payeer_api_key;?></td>
													<td><input name = "payeer_api_key" class = "form-control" placeholder = "*********"></td>
												</tr>
												<tr>
													<td>Валюта</td>
													<td><?php echo $payeer_val;?></td>
													<td><input name = "payeer_val" class = "form-control" placeholder = "RUB"></td>
												</tr>
												<tr>
													<td colspan="3">Настройки Perfect Money</td>
												</tr>
												<tr>
													<td>ID кошелька</td>
													<td><?php echo $perfect_money_api_id;?></td>
													<td><input name = "perfect_money_api_id" class = "form-control" placeholder = "ID: 121212"></td>
												</tr>
												<tr>
													<td>Кошелек</td>
													<td><?php echo $perfect_money_account_number;?></td>
													<td><input name = "perfect_money_account_number" class = "form-control" placeholder = "U123456"></td>
												</tr>
												<tr>
													<td>Пароль</td>
													<td><?php echo $perfect_money_api_pass;?></td>
													<td><input name = "perfect_money_api_pass" class = "form-control" placeholder = "******"></td>
												</tr>
												<tr>
													<td>Alt-фраза</td>
													<td><?php echo $perfect_money_alt_phrase;?></td>
													<td><input name = "perfect_money_alt_phrase" class = "form-control" placeholder = "******"></td>
												</tr>
												<tr>
													<td>Валюта</td>
													<td><?php echo $perfect_money_val;?></td>
													<td><input name = "perfect_money_val" class = "form-control" disabled value = "USD"></td>
												</tr>
												<tr>
													<td></td>
													<td><!--button type="reset" name = "save" class = "btn btn-default">Сбросить</button--></td>
													<td><button type="submit" name = "save" class = "btn btn-default">Сохранить</button></td>
												</tr>
											</form>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>