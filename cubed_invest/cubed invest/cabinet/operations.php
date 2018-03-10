<?php include ("menu_user.php"); ?>
<div class="panel-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1><?php echo T("Пополнения"); ?></h1>
				<script type="text/javascript" src="js/lists.js"></script>
				<table class="table table-cabinet table tbl-style move-on" >
					<tr class='tr-th'>
						<th class="thead"><?php echo T("Сумма"); ?></th>
						<th class="thead"><?php echo T("Дата"); ?></th>
						<th class="thead"><?php echo T("Плат.система"); ?></th>
						<th class="thead"><?php echo T("Статус"); ?></th>
					</tr>
					<tbody>
						<?php
							#Вывод всех депозитов
							$result_summa = $mysqli->query("SELECT * FROM `invest` WHERE login = '$login'");
							if ($result_summa) {
								while($row = $result_summa->fetch_assoc()) {
									$summa = $row['summa'];
									$date = date("d-m H:i:s", $row['date']);
									$pay_system = $row['pay_system'];
									$status = $row['status'];
									include 'print/print_invest.php';
								}
								$result_summa->free();
							}
						?>
					</tbody>
				</table>
				<br>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
