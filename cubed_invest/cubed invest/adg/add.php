<?php
	
	/*добавить вклад
	while(isset($_POST['add_transfer'])){
		if(empty($_POST['login'])){
			$report = "Введите логин";
			break;
		}
		$login_r = $_POST['login'];
		
		if(empty($_POST['summa'])){
			$report = "Введите сумму";
			break;
		}
		
		$summa = $_POST['summa'];
		
		if(empty($_POST['transfer'])){
			$report = "Введите номер транзакции";
			break;
		}
		
		$transfer = $_POST['transfer'];

		//проверка пользователя
		$check_login = check_login($login_r);
		if(!$check_login){
			$report = "Такого пользователя не существует";
			break;
		}
		
		$add_transfer = add_transfer($login_r, $transfer, $summa);
		if($add_transfer){
			$report = "Вклад успешно добавлен";
		}
		else{
			$report = "Ошибка";
		}
		
		break;
	}
	*/
	/*добавить депозит
	while(isset($_POST['add_depozit'])){
		if(empty($_POST['login'])){
			$report = "Введите логин";
			break;
		}
		$login = $_POST['login'];
		
		if(empty($_POST['summa'])){
			$report = "Введите сумму";
			break;
		}
		$summa = $_POST['summa'];

		//проверка пользователя
		$check_login = check_login ($login);
		if(!$check_login){
			$report = "Такого пользователя не существует";
			break;
		}
		$add_depozit = add_depozit($login, $summa, $time_depozit, $percent);

		if($add_depozit){
			$report = "Депозит успешно добавлен";
		}
		else{
			$report = "Ошибка";
		}
		break;
	}
	*/
	/*добавить выплату
	while(isset($_POST['add_payment'])){
		if(empty($_POST['login'])){
			$report = "Введите логин";
			break;
		}
		$login = $_POST['login'];
		
		if(empty($_POST['summa'])){
			$report = "Введите сумму";
			break;
		}
		$summa = $_POST['summa'];

		$check_login = check_login ($login);
		if(!$check_login){
			$report = "Такого пользователя не существует";
			break;
		}
		
		$add_payment = add_payment($login, $summa);
		if($add_payment){
			$report = "Выплата успешно добавлена";
		}
		else{
			$report = "Ошибка";
		}
		break;
	}
	*/
	//накртука вкладов
	if (isset($_POST['add_invest_fake'])){
		$fake_invest = $sum = $_POST['sum'];
		$add_invest_fake = $mysqli->query("UPDATE `data` SET fake_invest = '$sum'");
		if($add_invest_fake){
			$report = "Успешно";
		}
		else{
			$report = "Ошибка";
		}
	}
	//накртука выплат
	if (isset($_POST['add_payment_fake'])){
		$fake_payment = $sum = $_POST['sum'];
		$add_payment_fake = $mysqli->query("UPDATE `data` SET fake_payment = '$sum'");
		if($add_payment_fake){
			$report = "Успешно";
		}
		else{
			$report = "Ошибка";
		}
	}
	
	//накртука онлайн
	if (isset($_POST['add_online_fake'])){
		$fake_online = $count = $_POST['count'];
		$add_online_fake = $mysqli->query("UPDATE `data` SET fake_online = '$count'");
		if($add_online_fake){
			$report = "Успешно";
		}
		else{
			$report = "Ошибка";
		}
	}
	//накртука юзеров
	if (isset($_POST['add_users_fake'])){
		$fake_users = $count = $_POST['count'];
		$add_users_fake = $mysqli->query("UPDATE `data` SET fake_users = '$count'");
		if($add_users_fake){
			$report = "Успешно";
		}
		else{
			$report = "Ошибка";
		}
	}
?>

<div id="page-wrapper">
	<?php	if(isset($report) && $report != ''){ ?>
	<div class = "report">
		<?php messageBox($report);  ?>	
	</div>
	<?php } ?>
	
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Накрутить</h3>
					</div>
					<div class="panel-body">
						<div class="flot-chart">
							<div class="flot-chart-content" id="flot-line-chart">
								<table width="100%">
									<tr>
										<td>
											<div>
												<p>Накрутить Вклады</p>
										</td>
										<td>
											<form action = "" method = "POST">
												<input type = "text" name = "sum" value="<?php echo $fake_invest;?>" class = "form-control">
										</td>
										<td>
												<button class="btn btn-default" name = "add_invest_fake">Добавить Вклад</button>
											</form>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											<hr>
										</td>
									</tr>
								
									<tr>
										<td>
											<div>
												<p>Накрутить Выплату</p>
										</td>
										<td>
											<form action = "" method = "POST">
												<input type = "text" name = "sum" value="<?php echo $fake_payment;?>" class = "form-control">
										</td>
										<td>
												<button class="btn btn-default" name = "add_payment_fake">Добавить Выплату</button>
											</form>
											</div>
										</td>
									</tr>
									
									<tr>
										<td colspan="3">
											<hr>
										</td>
									</tr>

									<tr>
										<td>
											<div>
												<p>Накрутить Участников</p>
										</td>
										<td>
											<form action = "" method = "POST">
												<input type = "text" name = "count" value="<?php echo $fake_users;?>" class = "form-control">
										</td>
										<td>
												<button class="btn btn-default" name = "add_users_fake">Добавить Участников</button>
											</form>
											</div>
										</td>
									</tr>
									
									<tr>
										<td colspan="3">
											<hr>
										</td>
									</tr>
									
									<tr>
										<td>
											<div>
												<p>Накрутить Участников онлайн</p>
										</td>
										<td>
											<form action = "" method = "POST">
												<input type = "text" name = "count" value="<?php echo $fake_online;?>" class = "form-control">
										</td>
										<td>
												<button class="btn btn-default" name = "add_online_fake">Добавить</button>
											</form>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->