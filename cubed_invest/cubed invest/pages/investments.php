<section class="about about-bg-1" >
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<center><h2><?php echo T("предложение"); ?>  <span><?php echo T("Инвесторам"); ?></span></h2></center>
				<br/>
				<p>
					<?php echo T("В нашем маркетинге предусмотрено два инвестиционных плана с процентными ставками, от 2.5% до 3% в день, которые  позволяют инвестировать суммы от"); ?> <?php echo $d_min; ?> <?php echo T("до"); ?> <?php echo $d_max; ?> <?php echo $valu; ?>.
				</p>
				<p>
					<?php echo T("Сроки депозитов 60 дней. Время начисления процентов совпадает с моментом открытия депозита."); ?>
				</p>
				<p>
					<?php echo T("Начисление процентов по всем депозитам происходит ежедневно с понедельника по пятницу. Выплаты по депозитам, согласно условиям, происходят с периодичностью один раз в день. Тело депозита возвращается равными долями вместе с процентами в зависимости от выбранного инвестиционного плана.."); ?>
				</p>
				<p>
					<?php echo T("Тело депозита возвращается равными долями вместе с процентами в зависимости от выбранного инвестиционного плана."); ?>
				</p>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<br/><br/>
			<center>
				<h3 style='text-align:center;'><?php echo T("Инвестиционные планы"); ?></h3>
			</center>
			<div class="clearfix"></div>
			<br/>
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-cabinet-invest">
					<tr>
						<th class='th-none'></th>
						<th class='th'><?php echo T("Период"); ?></th>
						<th class='th'><?php echo T("Выплата"); ?></th>
						<th class='th'><?php echo T("Минимальный вклад"); ?></th>
						<th class='th'><?php echo T("Максимальный вклад"); ?></th>
					</tr>
					<tr>
						<th>2.5<small>%</small></th>
						<td class='td-small'><?php echo T("на 60 дней"); ?></td>
						<td class='td-small'><?php echo T("каждые 24 часа"); ?></td>
						<td>10<small>$</small></td>
						<td>999<small>$</small></td>
					</tr>
					<tr>
						<th>3<small>%</small></th>
						<td class='td-small'><?php echo T("на 60 дней"); ?></td>
						<td class='td-small'><?php echo T("каждые 24 часа"); ?></td>
						<td>1000<small>$</small></td>
						<td>10000<small>$</small></td>
					</tr>
					<!--tr>
						<th>5.5<small>%</small></th>
						<td class='td-small'>на 20 дней</td>
						<td class='td-small'>каждые 24 часа</td>
						<td>301<small>$</small></td>
						<td>1000<small>$</small></td>
					</tr>
					<tr>
						<th>6<small>%</small></th>
						<td class='td-small'>на 25 дней</td>
						<td class='td-small'>каждые 24 часа</td>
						<td>1001<small>$</small></td>
						<td>5000<small>$</small></td>
					</tr-->
				</table>
			</div>
		</div>
	</div>
</section>


<?php include ("news_calc.php"); //подключаем новости + калькулятор ?>
