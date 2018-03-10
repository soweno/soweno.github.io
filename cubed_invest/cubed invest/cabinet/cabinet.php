<?php include ("menu_user.php"); ?>
	<div class="panel-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-cabinet"  >
						<tr>
							<th><?php echo T("Баланс"); ?>:</th>
							<th><?php echo T("Пополнено"); ?>:</th>
							<th><?php echo T("Активные депозиты"); ?>:</th>
							<th><?php echo T("Реферальные"); ?>:</th>
							<th><?php echo T("Выведено"); ?>:</th>
							<th><?php echo T("Доход"); ?>:</th>
						</tr>
						<tr>
							<td align="center"><?php echo number_format($balans,'2','.',' ');?> <?php echo $valu;?></td>
							<td align="center"><?php echo number_format($login_invest,'2','.',' ');?> <?php echo $valu;?></td>
							<td align="center"><?php echo number_format(activ_depozit($login),'2','.',' ');?> <?php echo $valu;?></td>
							<td align="center"><?php echo number_format($login_referal,'2','.',' ');?> <?php echo $valu;?></td>
							<td align="center"><?php echo number_format($login_payment,'2','.',' ');?> <?php echo $valu;?></td>
							<td align="center"><?php echo number_format($login_profit,'2','.',' ');?> <?php echo $valu;?></td>
						</tr>
					</table>
				</div>

				<div class="col-md-12">
					<br><br>
					<table class="table table-cabinet"  >
						<tr>
							<th><?php echo T("Дата вклада"); ?>:</th>
							<th><?php echo T("Вклад"); ?>:</th>
							<th><?php echo T("Начислено/Всего"); ?>:</th>
							<th><?php echo T("Прибыль"); ?>:</th>
							<th><?php echo T("Статус"); ?>:</th>
						</tr>
						<tr>
							<?php
								#Вывод всех депозитов
								$result_summa = $mysqli->query("SELECT * FROM `depozit` WHERE login = '$login'");
								if ($result_summa) {
									while($row = $result_summa->fetch_assoc()) {
										$id = $row['id'];
										$date = date("d-m H:i:s", $row['date_start']);
										//$date_end = $row['date_end'];
										$summa = $row['summa'];
										$count_dep = count_dep($id);
										$count_dep_all = count_dep_all($id);
										$summa_dep = summa_dep($id);
										$last_profit = last_profit($id);

										include 'print/print_depozit.php';
									}
									$result_summa->free();
								}
							?>
						</tr>
					</table>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
