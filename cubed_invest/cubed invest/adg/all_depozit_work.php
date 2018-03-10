<?php
	$all_summa = 0;
	$result_summa = $mysqli->query("SELECT summa_plus FROM `depozit` WHERE status = '0'");
	if ($result_summa) {
		while($row = $result_summa->fetch_assoc()){
			$all_summa += $row['summa_plus'];
		}
		$result_summa->free();
	}
	$report = "Сумма на выплаты $all_summa РУБ";
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
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Все активные вклады</h3>
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
												<th>refer</th>
												<th>Сумма</th>
												<th>Начислено/Всего</th>
												<th>Начислено(<?php echo $val;?>)</th>
												<th>Дата окончания</th>
												<th>Статус</th>
											</tr>
										</thead>
										<tbody>
											<?php
												#Вывод всех депозитов
												$result_summa = $mysqli->query("SELECT * FROM `depozit` WHERE status = '0' ORDER BY id DESC");
												if ($result_summa) {
													while($row = $result_summa->fetch_assoc()){
														$id = $row['id'];
											?>
														<tr>
															<td>
																<?php echo $row['id']; ?>
															</td>
															<td>
																<?php echo $row['login']; ?>
															</td>
															<td>
																<?php echo referovod_login($row['login']); ?>
															</td>
															<td>
																<?php echo $row['summa']; ?>
															</td>
															<td>
																<?php echo count_dep($id);?>/<?php echo count_dep_all($id);?>
															</td>
															<td>
																<?php echo summa_dep($id);?>
															</td>
															<td>
																<?php echo date("d-m H:i:s", $row['date_end']); ?>
															</td>
															<td>
																<?php echo $row['status'] ? "Закрыт" : "Открыт"; ?>
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