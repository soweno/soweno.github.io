
<?php if (!in_array($page, $inc_cab)) { ?>
			<section class="paysys-title <?php if($page == "support") echo "other";?>">
				<div class="container">
					<div class="row">
						<center>
							<h2><?php echo T("Мы"); ?>  <span><?php echo T("принимаем"); ?></span></h2>
						</center>
					</div>
				</div>
			</section>

			<section class="paysys-body">
				<div class="container">
					<div class="row">
						<center>
							<ul class="psys-list">
								<!--li class="psys-3"></li-->
								<li class="psys-4" onclick="location.href='https://perfectmoney.is'"></li>
								<li class="psys-6" onclick="location.href='https://payeer.com/ru/'"></li>
							</ul>
						</center>
					</div>
				</div>
			</section>

			<div class="footer" style="overflow:hidden;">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="logo-footer"><a href=""></a></div>
						</div>
						<div class="col-md-9">
							<div class="footer-menu">
								<li>
									<a href="/"><?php echo T("Главная"); ?></a>
								</li>
								<li>
									<a href="?page=about"><?php echo T("О нас"); ?></a>
								</li>
								<li>
									<a href="?page=investments"><?php echo T("Инвесторам"); ?></a>
								</li>
								<li>
									<a href="?page=partnership"><?php echo T("Партнерам"); ?></a>
								</li>
								<li>
									<a href="?page=faq">FAQ</a>
								</li>
								<li>
									<a href="?page=support"><?php echo T("Контакты"); ?></a>
								</li>
							</div>
							<div class="clearfix"></div>
							<span>Copyright © <?php echo date("Y", time());?> <?php echo $name_project;?>. All Rights Reserved. </span>
							<? /*
							<br>
							<span>Made with love by <a href="https://vk.com/blitz_market" target="_blank">Blitz-Corporation</a></span>
							*/ ?>
						</div>
					</div>
				</div>
			</div>

		</div>
		<link rel="stylesheet" href="css/label.css">
		<?php } ?>
	</body>
</html>
<!-- HYIP STUDIO BLITZ-MARKET.RU -->
<!-- HOSTING PROVIDER BLITZ-HOST.COM-->
<!-- QIWI AUTO HYIPONLINE24.RU -->