<?php
	$all_summa = 0;
	$result_summa = $mysqli->query("SELECT summa FROM `payment` WHERE status = '0'");
	if ($result_summa) {
		while($row = $result_summa->fetch_assoc()) {
			$all_summa += $row['summa'];
		}
		$result_summa->free();
	}
	$report = "<br>Сумма на выплаты $all_summa РУБ";
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
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Выплаты</h3>
					</div>
					<div class="panel-body">
						<div class="flot-chart">
							<div class="flot-chart-content" id="flot-line-chart">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th>id</th>
												<th>login</th>
												<th>Сумма</th>
												<th>Дата</th>
												<th>Статус</th>
											</tr>
										</thead>
										<tbody>
											<?php
												#Вывод всех депозитов
												$result_summa = $mysqli->query("SELECT * FROM `payment` ORDER BY id DESC");
												if ($result_summa) {
													while($row = $result_summa->fetch_assoc()) {

											?>
											<tr>
												<td>
													<?php echo $row['id']; ?>
												</td>
												<td>
													<?php echo $row['login']; ?>
												</td>
												<td>
													<?php echo $row['summa']; ?>
												</td>
												<td>
													<?php echo date("d-m H:i:s", $row['date']); ?>
												</td>
												<td>
													<?php echo $row['status'] ? "Успешно" : "Ожидание"; ?>
												</td>
											</tr>

											<?php
													}
													$result_summa->free();
												}
											?>
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