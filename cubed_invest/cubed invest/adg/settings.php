<?php
	$report = '';
	#Получаем настройки системы
	$result = $mysqli->query("SELECT * FROM `data`");
	$row = $result->fetch_assoc();
	$admin_login = $row['admin'];			// админ в проекте
	$name_project = $row['name_project'];	// название проекта
	$free_referal = $row['free_referal'];	// под кого будут падать все свободные рефералы
	$d_min = $row['depozit_min'];			// минимальная сумма пополнения
	$d_max = $row['depozit_max'];			// максимальная сумма пополнения
	$d_wmin = $row['payment_min'];			// минимальная сумма на выплаты 
	$d_wmax = $row['payment_max'];			// максимальная сумма на выплаты
	$p_ref = $row['percent_referal'];		// реферальный %
	$percent = $row['percent'];				// процент начисления в системе
	$percent_admin = $row['percent_admin'];	// админу %
	$time_hour = $row['time_hour'];			// на сколько часов депозит
	$start_data = $row['start_data'];		// дата старта проекта
	$admin_phone = $row['admin_phone'];		// номер для прямых переводов
	$admin_email = $row['admin_email'];		//контактный E-mail администратора
	$group_vk = $row['group_vk'];			//группа проекта в vk
	
	#изменение данных
	if(isset($_POST['save'])){
		
		//изменение админа проекта
		if(!DEMO && !empty($_POST['admin_login'])){
			$admin_login = $_POST['admin_login'];
			$mysqli->query ("UPDATE `data` SET `admin` = '$admin_login'");
			$report .= "Новый админ проекта $admin_login<br>";
		}
		
		//изменение E-mail админа
		if(!empty($_POST['admin_email'])){
			$admin_email = $_POST['admin_email'];
			$mysqli->query ("UPDATE `data` SET `admin_email` = '$admin_email'");
			$report .= "Новый email админ проекта $admin_email<br>";
		}
		
		//изменение названия проекта
		if(!empty($_POST['name_project'])){
			$name_project = $_POST['name_project'];
			$mysqli->query ("UPDATE `data` SET `name_project` = '$name_project'");
			$report .= "Новое название проекта $name_project<br>";
		}
		
		//изменение главного реферовода
		if(!empty($_POST['free_referal'])){
			$free_referal = $_POST['free_referal'];
			$mysqli->query ("UPDATE `data` SET `free_referal` = '$free_referal'");
			$report .= "Новый реферовод $free_referal<br>";
		}
		
		//изменение минимальной суммы пополнения
		if(!empty($_POST['depozit_min'])){
			$depozit_min = $_POST['depozit_min'];
			$mysqli->query ("UPDATE `data` SET `depozit_min` = '$depozit_min'");
			$report .= "Изменение! Минимальная сумма пополнения $depozit_min<br>";
		}
		
		//изменение минимальной суммы пополнения
		if(!empty($_POST['depozit_max'])){
			$depozit_max = $_POST['depozit_max'];
			$mysqli->query ("UPDATE `data` SET `depozit_max` = '$depozit_max'");
			$report .= "Изменение! Максимальная сумма пополнения $depozit_max<br>";
		}
		
		//изменение минимальной суммы выплаты
		if(!empty($_POST['payment_min'])){
			$payment_min = $_POST['payment_min'];
			$mysqli->query ("UPDATE `data` SET `payment_min` = '$payment_min'");
			$report .= "Изменение! Минимальная сумма выплаты $payment_min<br>";
		}
		
		//изменение максимальной суммы выплаты
		if(!empty($_POST['payment_max'])){
			$payment_max = $_POST['payment_max'];
			$mysqli->query ("UPDATE `data` SET `payment_max` = '$payment_max'");
			$report .= "Изменение! Максимальная сумма выплаты $payment_max<br>";
		}
		
		//изменение реферального процента
		if(!empty($_POST['percent_referal'])){
			$percent_referal = $_POST['percent_referal'];
			$mysqli->query ("UPDATE `data` SET `percent_referal` = '$percent_referal'");
			$report .= "Изменение! Реферальный процент $percent_referal<br>";
		}
		
		//изменение вклада под процента 
		if(!empty($_POST['percent'])){
			$percent = $_POST['percent'];
			$mysqli->query ("UPDATE `data` SET `percent` = '$percent'");
			$report .= "Изменение! Процент для вкладов $percent<br>";
		}
		
		//изменение процента для админа
		if(!empty($_POST['percent_admin'])){
			$percent_admin = $_POST['percent_admin'];
			$mysqli->query ("UPDATE `data` SET `percent_admin` = '$percent_admin'");
			$report .= "Изменение! Процент отчисления админу $percent_admin<br>";
		}
		
		//изменение вклада на кол-во часов
		if(!empty($_POST['time_hour'])){
			$time_hour = $_POST['time_hour'];
			$mysqli->query ("UPDATE `data` SET `time_hour` = '$time_hour'");
			$report .= "Изменение! Вклад делается на $time_hour<br>";
		}
		
		//изменение старта проекта
		if(!empty($_POST['start_data'])){
			$start_data = $_POST['start_data'];
			$mysqli->query ("UPDATE `data` SET `start_data` = '$start_data'");
			$report .= "Изменение! Дата старта проекта $start_data<br>";
		}
		
		//изменение номера для переводов
		if(!empty($_POST['admin_phone'])){
			$admin_phone = $_POST['admin_phone'];
			$mysqli->query ("UPDATE `data` SET `admin_phone` = '$admin_phone'");
			$report .= "Изменение! Номер админа $admin_phone<br>";
		}
		
		//изменение группы проекта в vk
		if(!DEMO && !empty($_POST['group_vk'])){
			$group_vk = $_POST['group_vk'];
			$mysqli->query ("UPDATE `data` SET `group_vk` = '$group_vk'");
			$report .= "Изменение! Новая группа проекта $group_vk<br>";
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
												<tr>
													<td>Администратор <?php include (__DIR__."/demo.php"); ?></td>
													<td><?php echo $admin_login;?></td>
													<td><input name = "admin_login" class = "form-control" placeholder = "Логин"></td>
												</tr>
												<tr>
													<td>Admin E-mail</td>
													<td><?php echo $admin_email;?></td>
													<td><input name = "admin_email" class = "form-control" placeholder = "E-mail"></td>
												</tr>
												<tr>
													<td>Название проекта</td>
													<td><?php echo $name_project;?></td>
													<td><input name = "name_project" class = "form-control" placeholder = "Название"></td>
												</tr>
												<tr>
													<td>Логин, под который будет вставать все свободные рефералы</td>
													<td><?php echo $free_referal;?></td>
													<td><input name = "free_referal" class = "form-control" placeholder = "Логин"></td>
												</tr>
												<tr>
													<td>Минимальная сумма пополнения</td>
													<td><?php echo $d_min;?></td>
													<td><input name = "depozit_min" class = "form-control" placeholder = "Сумма"></td>
												</tr>
												<tr>
													<td>Максимальная сумма пополнения</td>
													<td><?php echo $d_max;?></td>
													<td><input name = "depozit_max" class = "form-control" placeholder = "Сумма"></td>
												</tr>
												<tr>
													<td>Минимальная сумма выплаты</td>
													<td><?php echo $d_wmin;?></td>
													<td><input name = "payment_min" class = "form-control" placeholder = "Сумма"></td>
												</tr>
												<tr>
													<td>Максимальная сумма выплаты</td>
													<td><?php echo $d_wmax;?></td>
													<td><input name = "payment_max" class = "form-control" placeholder = "Сумма"></td>
												</tr>
												<tr>
													<td>Админу %</td>
													<td><?php echo $percent_admin;?></td>
													<td><input name = "percent_admin" class = "form-control" placeholder = "Процент"></td>
												</tr>
												<tr>
													<td>Дата старта проекта(Формат: 15.2.2015 17:00)</td>
													<td><?php echo $start_data;?></td>
													<td><input name = "start_data" class = "form-control" placeholder = "5.2.2015 17:00"></td>
												</tr>
												<tr>
													<td>Группа в Vk: <?php include (__DIR__."/demo.php"); ?></td>
													<td><?php echo $group_vk;?></td>
													<td><input name = "group_vk" class = "form-control" placeholder = "https://vk.com/blitz_market"></td>
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
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
