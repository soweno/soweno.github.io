<?php
	if(isset($_POST['cancel'])){
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			
			$payment_cancel = $mysqli->query("UPDATE `payment` SET `transfer` = '', status = '0' WHERE id = '$id'");
			if($payment_cancel){
				$report = "Транзакция успешно отменена";
			}
			else{
				$report = "Ошибка";
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
			<!-- Flot Charts -->
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Отмена выплаты</h2>
				<p class="lead">На этой странице Вы можете отменить выплату</p>
			</div>
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Отмена выплаты</h3>
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
												<th>Дата</th>
												<th>Сумма</th>
												<th>Отмена</th>
											</tr>
										</thead>
										<tbody>
											<?php
												#Вывод всех депозитов
												$result_summa = $mysqli->query("SELECT * FROM `payment` WHERE status = '1'");
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
													<?php echo date("d-m H:i:s", $row['date']); ?>
												</td>
												<td>
													<?php echo $row['summa']; ?>
												</td>
												<td>
													<form action = "" method = "post">
														<input type = "hidden" name = "id" value = "<?php echo $row['id']; ?>">
														<button type="submit" name = "cancel" class="btn btn-default">Отменить</button>
													</form>
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










<!--
			<div class="col-lg-6">
				<form role="form">

					<div class="form-group input-group">
						<span class="input-group-addon">@</span>
						<input type="text" class="form-control" placeholder="Username">
					</div>

					<div class="form-group input-group">
						<input type="text" class="form-control">
						<span class="input-group-addon">.00</span>
					</div>

					<div class="form-group input-group">
						<span class="input-group-addon"><i class="fa fa-eur"></i></span>
						<input type="text" class="form-control" placeholder="Font Awesome Icon">
					</div>

					<div class="form-group input-group">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control">
						<span class="input-group-addon">.00</span>
					</div>

					<div class="form-group input-group">
						<input type="text" class="form-control">
						<span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
					</div>
					
					<div class="form-group">
						<label>Text Input</label>
						<input class="form-control">
						<p class="help-block">Example block-level help text here.</p>
					</div>
					
					<div class="form-group">
						<label>File input</label>
						<input type="file">
					</div>

					<div class="form-group">
						<label>Text area</label>
						<textarea class="form-control" rows="3"></textarea>
					</div>
					
					<button type="reset" class="btn btn-default">Reset Button</button>
				</form>
			</div>
			-->