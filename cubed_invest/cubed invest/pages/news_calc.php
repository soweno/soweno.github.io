<section class="calc ">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h3 style='padding-left:15px'><?php echo T("Последние новости"); ?></h3>
				<div class="clearfix"></div>
				<div class="news-list">
					<ul class='bxslider1' style='margin-top:15px;'>
						<?php
							#Вывод новостей
							$result = $mysqli->query("SELECT * FROM `news` ORDER BY id DESC");
							if($result){
								while($row = $result->fetch_assoc()){
									$id = $row['id'];
									$date_d = date("d", $row['date']);
									$date_m = $row['date'];
									$title = $row['title'];
									$news = $row['news'];
									include 'print/news.php';
								}
								$result->free();
							}
						?>
					</ul>
				</div>
			</div>

			<div class="col-md-6 col-md-offset-1" style="padding:0">
				<h3 style="padding-left:30px"><?php echo T("Расчет прибыли"); ?></h3>
				<div class="clearfix"></div>
				<div class="box-calc-label">
					<div class="box-oper-psys">
						<label class="current" data-curr="1" rel="<?php echo $valu; ?>" data-pow="0"><?php echo $valu; ?></label>
					</div>
				</div>
				<div class="calculate-box">
					<ul>
						<li class="calc-select">
							<p><?php echo T("Выбор инвестиционного плана"); ?>:</p>
							<div class="clearfix"></div>
							<a rel="1" class="active">2.5<small>%</small></a>
							<a rel="2">3<small>%</small></a>
							<!--a rel="3">5.5<small>%</small></a>
							<a rel="4">6<small>%</small></a-->
						</li>

						<div class="clearfix"></div>
						<li class="drag-select">
							<div class="selector">
								<div class="p_before animate" style="width:0px;"><span></span></div>
								<div class="p_line"></div>
								<div id="drag" class="drag resize ui-widget-content ui-draggable" style="left: 0;">
									<span>25</span>
								</div>
							</div>
							<div class="min-value"><span>1</span><small class="depo-curr-label"><?php echo $valu; ?></small></div>
							<div class="max-value"><span>999</span><small class="depo-curr-label"><?php echo $valu; ?></small></div>
						</li>
						<li class="calc-amount">
							<label><?php echo T("Вы инвестируете"); ?> (<small class="depo-curr-label"><?php echo $valu; ?></small>):</label>
							<div class="calc-amount-field">
								<input type="text" class="cal-amount-val" value="10">
							</div>
						</li>

						<li class="calc-profit">
							<span class="total"><span></span><small class="depo-curr-label"><?php echo $valu; ?></small></span>
							<small><?php echo T("получите"); ?><br> <?php echo T("через"); ?> <i class="period2" style="font-style:normal; font-size:15px;"></i> <?php echo T("дней"); ?> </small>
							<style>
							.calc-profit:before {
								display:none;
							}
							</style>

						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
