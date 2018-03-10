<?php	
	if (isset($_POST['clear_depozit'])){
		$mysqli->query("TRUNCATE TABLE `depozit`");
		$mysqli->query("TRUNCATE TABLE `profit`");
		$report = 'Таблицы "Депозиты & Профиты" успешно очищены';
	}
	
	if (isset($_POST['clear_invest'])){
		$mysqli->query("TRUNCATE TABLE `invest`");
		$report = 'Таблица "Пополнений" успешно очищена';
	}
	
	if (isset($_POST['clear_payment'])){
		$mysqli->query("TRUNCATE TABLE `payment`");
		$report = 'Таблица "Выплаты" успешно очищена';
	}
	
	if (isset($_POST['clear_reviews'])){
		$mysqli->query("TRUNCATE TABLE `reviews`");
		$report = 'Таблица "Отзывы" успешно очищена';
	}
	
	if (isset($_POST['clear_news'])){
		$mysqli->query("TRUNCATE TABLE `news`");
		$report = 'Таблица "Новости" успешно очищена';
	}
	
	if (!DEMO && isset($_POST['clear_data'])){
		$mysqli->query("TRUNCATE TABLE `data`");
		$report = 'Таблица "Данные" успешно очищена';
	}
	
	if (!DEMO && isset($_POST['clear_users'])){
		$mysqli->query("TRUNCATE TABLE `users`");
		$report = 'Таблица "Пользователи" успешно очищена';
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
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Очистка</h3>
					</div>
					<div class="panel-body">
						<div class="flot-chart">
							<div class="flot-chart-content" id="flot-line-chart">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>Таблица</th>
												<th>Очистить</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Таблица Депозитов</td>
												<td>
													<form action = "" method = "post">
														<button type="submit" class = "btn btn-default" name = "clear_depozit">Очистить</button>
													</form>
												</td>
											</tr>
											
											<tr>
												<td>Таблица Пополнений </td>
												<td>
													<form action = "" method = "post">
														<button type="submit" class = "btn btn-default" name = "clear_invest">Очистить</button>
													</form>
												</td>
											</tr>
											
											<tr>
												<td>Таблица Выплат</td>
												<td>
													<form action = "" method = "post">
														<button type="submit" class = "btn btn-default" name = "clear_payment">Очистить</button>
													</form>
												</td>
											</tr>
											
											<tr>
												<td>Таблица Отзывов</td>
												<td>
													<form action = "" method = "post">
														<button type="submit" class = "btn btn-default" name = "clear_reviews">Очистить</button>
													</form>
												</td>
											</tr>
											
											<tr>
												<td>Таблица Новостей</td>
												<td>
													<form action = "" method = "post">
														<button type="submit" class = "btn btn-default" name = "clear_news">Очистить</button>
													</form>
												</td>
											</tr>
											<tr>
												<td>Таблица Данные <?php include (__DIR__."/demo.php"); ?></td>
												<td>
													<form action = "" method = "post">
														<button type="submit" class = "btn btn-default" name = "clear_data">Очистить</button>
													</form>
												</td>
											</tr>
											<tr>
												<td>Таблица Пользователи <?php include (__DIR__."/demo.php"); ?></td>
												<td>
													<form action = "" method = "post">
														<button type="submit" class = "btn btn-default" name = "clear_users">Очистить</button>
													</form>
												</td>
											</tr>
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