<?php
	if(isset($_POST['delete_depozit'])){
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			$delete_result = $mysqli->query("DELETE FROM `invest` WHERE id = '$id'");
			if($delete_result){
				$report = "Успешно!";
			}
			else{
				$report = "Ошибка!";
			}
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
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Пополнения</h3>
					</div>
					<div class="panel-body">
						<div class="flot-chart">
							<div class="flot-chart-content" id="flot-line-chart">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>id</th>
												<th>Сумма</th>
												<th>login</th>
												<th>Дата</th>
												<th>Система</th>
												<th>Статус</th>
												<th>Удалить</th>
											</tr>
										</thead>
										<tbody>
											<?php
												#Вывод всех депозитов
												$result_summa = $mysqli->query("SELECT * FROM `invest` ORDER BY id DESC");
												if ($result_summa) {
													while($row = $result_summa->fetch_assoc()) {
											?>
											<tr>
												<td>
													<?php echo $row['id']; ?>
												</td>
												<td>
													<?php echo $row['summa']; ?>
												</td>
												<td>
													<?php echo $row['login']; ?>
												</td>
												<td>
													<?php echo date("d-m H:i:s", $row['date']); ?>
												</td>
												<td>
													<?php echo $row['pay_system']; ?>
												</td>
												<td>
													<?php echo $row['status'] ? "Успешно" : "Ожидание"; ?>
												</td>
												<td>
													<form action = "" method = "POST">
														<input type = "hidden" name = "id" value = "<?php echo $row['id']; ?>">
														<button type="submit" name = "delete_depozit" class="btn btn-default">Удалить</button>
													</form>
												</td>
											</tr>
											<?php
													}
													$result_summa->free();
												}
											?>
										<tbody>
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