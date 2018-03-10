<?php
	if(isset($_POST['depozit']) && ($_POST['depozit'] == 0 || $_POST['depozit'] == 1)){
		$mysqli->query("UPDATE data SET depozit = '".$_POST['depozit']."'"); 
		$depozit = $_POST['depozit'];
	}
	
	if(isset($_POST['invest']) && ($_POST['invest'] == 0 || $_POST['invest'] == 1)){
		$mysqli->query("UPDATE data SET invest = '".$_POST['invest']."'");
		$invest = $_POST['invest'];
	}
	
	if(isset($_POST['payment']) && ($_POST['payment'] == 0 || $_POST['payment'] == 1)){
		$mysqli->query("UPDATE data SET payment = '".$_POST['payment']."'");
		$payment = $_POST['payment'];
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
						<h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Управление платежами</h3>
					</div>
					<div class="panel-body">
						<div class="flot-chart">
							<div class="flot-chart-content" id="flot-line-chart">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<tr>
											<td>
												Вклад:
											</td>
											<td>
												<?php
													if($depozit == 0){
														echo '     Открыты    ';
													}else{
														echo '     Закрыты    ';
													}
												?>
											</td>
											<td>
												<?php
													if($depozit == 0){ ?>
														<form action = "" method = "post">
															<button class = "depozit_button" name = "depozit" value = "1">Закрыть</button>
														</form>
													<?php }else{ ?>
														<form action = "" method = "post">
															<button class = "depozit_button" name = "depozit" value = "0">Открыть</button>
														</form>
													<?php } 
												?>
											</td>
										</tr>
										
										<tr>
											<td>Пополнения: </td>
											<td>
												<?php
													if($invest == 0){
														echo '     Открыты    ';
													}else{
														echo '     Закрыты    ';
													}
												?>
											</td>
											<td>
												<?php
													if($invest == 0){ ?>
														<form action = "" method = "post">
															<button class = "depozit_button" name = "invest" value = "1">Закрыть</button>
														</form>
													<?php }else{ ?>
														<form action = "" method = "post">
															<button class = "depozit_button" name = "invest" value = "0">Открыть</button>
														</form>
													<?php } 
												?>
											</td>
										</tr>
										
										<tr>
											<td>Выплаты:</td>
											<td>
												<?php
												if($payment == 0){
													echo '     Открыты    ';
												}else{
													echo '     Закрыты    ';
												}
												?>
											</td>
											<td>
												<?php
													if($payment == 0){ ?>
														<form action = "" method = "post">
															<button class = "depozit_button" name = "payment" value = "1">Закрыть</button>
														</form>
													<?php }else{ ?>
														<form action = "" method = "post">
															<button class = "depozit_button" name = "payment" value = "0">Открыть</button>
														</form>
													<?php } 
												?>
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
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->