<section class="stat">
	<div class="container">
		<div class="row">
			<center>
				<h2><?php echo T("Статистика"); ?>  <span><?php echo T("проекта"); ?></span></h2>
			</center>
			<div class="clearfix"></div>
			<div class="col-md-4">
				<div class="stat-box">
					<div>
						<i></i>
						<span><?php echo T("Всего участников"); ?></span>
						<b><?php echo $count_user; ?><small></small></b>
					</div>
					<div class="stat-icon-2">
						<i></i>
						<span><?php echo T("Инвестировано средств"); ?></span>
						<b><?php echo format_number($balans_invest,2,'.',' '); ?><small><?php echo $valu; ?></small></b>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<center>
					<img src="images/stat-img.png" style="margin-right:-75px" height="289" width="198" alt="">
				</center>
			</div>
			<div class="col-md-5">
				<div class="reviews-list">
					<div class="reviews-list reviews-list-1">
						<ul class=' bxslider'>
							<li>
								<i class='user-2'></i>
								<a><?php echo T("Дейв Холл"); ?></a>
								<p>
									<?php echo T("Раньше у нас был опыт работы с крупными инвесторами, сейчас же нам придется учиться работать с большим количеством мелких инвесторов, и уверенны, что специалисты из"); ?>  <?php echo $name_project; ?> <?php echo T("справятся с поставленной задачей"); ?>…
								</p>
								<small><?php echo T("Президент и главный CEO компании"); ?> <?php echo $name_project; ?></small>
							</li>

							<li>
								<i></i>
								<a><?php echo T("Лари Дейвис"); ?></a>
								<p>
									<?php echo T("Снятие моратория на добычу сланцевого газа должно было когда-нибудь произойти."); ?>
								</p>
								<small><?php echo T("Исполнительный председатель и соучредитель"); ?> <?php echo $name_project; ?></small>
							</li>

							<li>
								<i class='user-3'></i>
								<a><?php echo T("Дэвид Иванс"); ?></a>
								<p>
									<?php echo T("Предоставляя возможность простым людям принимать участие в этом бизнесе, мы выводим нашу компанию на совершенно новый уровень"); ?>
								</p>
								<small><?php echo T("Главный CEO компании"); ?> <?php echo $name_project; ?></small>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<center>
					<h1><?php echo T("компания"); ?><span><?php echo $name_project; ?></span></h1>
				</center>
				<br><br><br>
				<p>
					<?php echo $name_project; ?> <?php echo T("является одним из ведущих независимых мировых производителей газа. Добычу сырья ведут в Великобритании, США, Канаде, Азербайджане, Бразилии и в Китае. Штаб-квартира компании с недавнего времени находится в Лондоне, Великобритания."); ?>
				</p>
				<p>
					<?php echo T("Компания является законодателем в этой нише, используя новые эффективные и экологически чистые технологии бурения."); ?>
				</p>
				<p>
					<?php echo T("В июле 2014 года Великобритания отменила запрет на добычу сланцевого газа в стране, что повлекло за собой стремительное развитие этой индустрии."); ?>
				</p>
				<p>
					<?php echo T("В Великобритании имеются крупные запасы сланцевого газа, которые позволят в течении многих десятилетий полностью обеспечить национальную экономику в энергетических ресурсах"); ?>...
				</p>
				<br><br><br>
				<hr>
				<center>
					<a href="?page=about" style="margin-left:-60px" class="btn">
						<?php echo T("читать подробно"); ?>
					</a>
				</center>
			</div>
			<div class="col-md-5">
				<ul class="stat-list-2">
					<li>
						<span>$19,4 <small><?php echo T("млрд"); ?></small></span>
						<small>О<?php echo T("борот компании по итогам"); ?><br> 2014 <?php echo T("финансового года"); ?>  </small>
					</li>
					<li class="li-2">
						<span>$1,6 <small><?php echo T("млрд"); ?></small></span>
						<small><?php echo T("Чистая прибыль за этот же период"); ?> </small>
					</li>
				</ul>
				<div class="clearfix"></div>
				<a href="?page=registration" class="btn btn-3" style="float:right;">
					<span><?php echo T("Регистрация"); ?></span>
				</a>
			</div>
			<div class="clearfix"></div>
			<br>
		</div>
	</div>
</section>

<?php include ("news_calc.php"); //подключаем новости + калькулятор ?>

<section class="plans">
	<div class="container">
		<div class="row">
			<center>
				<h1><span><?php echo T("Информация"); ?></span><?php echo T("Инвесторам"); ?></h1>
			</center>
			<div class="col-md-4">
				<hr class="special">
				<p style="padding-top:10px">
					<?php echo T("В нашем маркетинге предусмотрено два инвестиционных плана с процентными ставками, от 2.5% до 3% в день, которые  позволяют инвестировать суммы от"); ?> <?php echo $d_min; ?> <?php echo T("до"); ?> <?php echo $d_max; ?> <?php echo $valu; ?>.
				</p>
				<p>
					<?php echo T("Сроки депозитов: 60 дней. Время начисления процентов совпадает с моментом открытия депозита."); ?>
				</p>
				<center>
					<a href="?page=registration" class="btn btn-3">
						<span><?php echo T("Инвестировать"); ?></span>
					</a>
				</center>
			</div>

			<div class="col-md-4 plans-display">
				<div class="bx-wrapper" style="max-width: 100%;">
					<div class="bx-viewport">
						<ul class="plans-list bxslider-plans">
							<li>
								<div>
									<h3>2.5<small>%</small></h3>
									<ul>
										<li><span><?php echo T("Период"); ?></span><b><?php echo T("на 60 дней"); ?></b></li>
										<li><span><?php echo T("выплата"); ?></span><b><?php echo T("Каждые 24 часа"); ?></b></li>
										<li><span><?php echo T("Сумма вклада"); ?></span><b><?php echo T("от 10$ до 999$"); ?></b></li>
									</ul>
								</div>
							</li>
							<li>
								<div>
									<h3>3<small>%</small></h3>
									<ul>
										<li><span><?php echo T("Период"); ?></span><b><?php echo T("на 60 дней"); ?></b></li>
										<li><span><?php echo T("выплата"); ?></span><b><?php echo T("Каждые 24 часа"); ?></b></li>
										<li><span><?php echo T("Сумма вклада"); ?></span><b><?php echo T("от 1000$  до 10000$"); ?></b></li>
									</ul>
								</div>
							</li>
							<!--li>
								<div>
									<h3>5.5<small>%</small></h3>
									<ul>
										<li><span>Период</span><b>на 20 дней</b></li>
										<li><span>выплата</span><b>Каждые 24 часа</b></li>
										<li><span>Сумма вклада</span><b>от 301$  до 1000$</b></li>
									</ul>
								</div>
							</li>
							<li>
								<div>
									<h3>6<small>%</small></h3>
									<ul>
										<li><span>Период</span><b>на 25 дней</b></li>
										<li><span>выплата</span><b>Каждые 24 часа</b></li>
										<li><span>Сумма вклада</span><b>от 1001$  до 5000$</b></li>
									</ul>
								</div>
							</li-->
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-4 block-plans-review">
				<p style="padding-top:0px; margin-top:-20px">
					<?php echo T("Начисление процентов по всем депозитов происходит ежедневно с понедельника по пятницу. Выплаты по депозитам, согласно условиям, происходят с периодичностью от одного раза в день до одного раза в три месяца."); ?>
				</p>
				<hr class="special">
				<div class="clearfix"></div>
				<p style="padding-top:15px;">
					<?php echo T("Тело депозита возвращается равными долями вместе с процентами в зависимости от выбранного инвестиционного плана."); ?>
				</p>
				<a href="?page=investments" class="more"><?php echo T("подробнее"); ?></a>
			</div>
		</div>
	</div>
</section>
