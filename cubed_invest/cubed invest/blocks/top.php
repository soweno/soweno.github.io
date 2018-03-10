<?php if ($page == "" || $page == "main") { ?>
<body>
	<div class="wrapper">
		<div class="header header-main header-unlogined " style="overflow:hidden;">
			<div class="header-top ">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="logo">
								<a href="/"></a>
							</div>
						</div>
						<div class="col-md-9">
							<ul class="menu">
								<li>
									<a href="/" class="active">
										<?php echo T("Главная"); ?><span><?php echo T("основное"); ?></span>
									</a>
								</li>
								<li>
									<a href="?page=about">
										<?php echo T("О нас"); ?><span><?php echo T("о компании"); ?></span>
									</a>
								</li>
								<li>
									<a href="?page=partnership">
										<?php echo T("Партнерам"); ?><span><?php echo T("реф. система"); ?></span>
									</a>
								</li>
								<li>
									<a href="?page=investments">
										<?php echo T("Инвесторам"); ?><span><?php echo T("мы предлагаем"); ?></span>
									</a>
								</li>
								<li>
									<a href="?page=news">
										<?php echo T("Новости"); ?><span><?php echo T("события"); ?></span>
									</a>
								</li>
								<li>
									<a href="?page=faq">
										Faq<span><?php echo T("вопросы"); ?> </span>
									</a>
								</li>
								<li>
									<a href="?page=support">
										<?php echo T("Контакты"); ?><span><?php echo T("обратная связь"); ?></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="header-login-block">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<?php include ('lang.php');?>
							<?php if(!(isset($_SESSION['login']) && isset($_SESSION['password']))) { ?>
							<div class="fields">
								<form method="post" action="auth.php">
									<div class="field">
										<input name="login" placeholder="<?php echo T("Логин"); ?>" required="" type="text">
									</div>
									<div class="field">
										<input name="password" placeholder="<?php echo T("Пароль"); ?>" required="" type="password">
									</div>
									<div class="field field-submit">
										<input name="auth_button" value="<?php echo T("Вход"); ?>" type="submit">
									</div>
								</form>
							</div>
							<?php } else { ?>
							<div class="fields fields-account">
								<a href="logout.php" style="padding-right:25px" class="btn btn-3 btn-3-left">
									<span><?php echo T("Выход"); ?></span>
								</a>
								<a href="/?page=cabinet" class="btn btn-2 btn-2-left">
									<span><?php echo T("Кабинет"); ?></span>
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>


			<div class="header-middle">
				<div class="container">
					<div class="row">
						<div class="col-md-7" style="padding-left:100px">
							<div class="header-text">
								<h1><small><?php echo T("добро пожаловать в"); ?></small><?php echo $name_project; ?></h1>
								<div class="clearfix"></div>
								<br>
								<p>
									<?php echo $name_project; ?> <?php echo T("является одним из ведущих независимых мировых производителей газа. Добычу сырья ведут в Великобритании, США, Канаде, Азербайджане, Бразилии и в Китае.	Штаб-квартира компании с недавнего времени находится в Лондоне, Великобритания. Компания является законодателем в этой нише, используя новые эффективные и экологически чистые технологии бурения."); ?>
								</p>
								<center>
									<?php if(!(isset($_SESSION['login']) && isset($_SESSION['password']))) { ?>
									<a href="?page=registration" class="btn">
										<span><?php echo T("Регистрация"); ?></span>
									</a>
									<?php } else { ?>
									<a href="?page=cabinet" class="btn">
										<span><?php echo T("Кабинет"); ?></span>
									</a>
									<?php } ?>
								</center>
							</div>
						</div>

						<div class="col-md-5">
						</div>
					</div>
				</div>
			</div>
		</div>
<?php } elseif (in_array($page, $inc) || $page == "login") { ?>
<body>
	<div class="wrapper">
		<div class="header  header-unlogined shot" style="overflow:hidden;">
			<div class="header-top ">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="logo">
								<a href="/"></a>
							</div>
						</div>
						<div class="col-md-9">
							<ul class="menu">
								<li>
									<a href="/"><?php echo T("Главная"); ?><span><?php echo T("основное"); ?></span></a>
								</li>
								<li>
									<a href="?page=about" class="active"><?php echo T("О нас"); ?><span><?php echo T("о компании"); ?></span></a>
								</li>
								<li>
									<a href="?page=partnership"><?php echo T("Партнерам"); ?><span><?php echo T("реф. система"); ?></span></a>
								</li>
								<li>
									<a href="?page=investments"><?php echo T("Инвесторам"); ?><span><?php echo T("мы предлагаем"); ?></span></a>
								</li>
								<li>
									<a href="?page=news"><?php echo T("Новости"); ?><span><?php echo T("события"); ?></span></a>
								</li>
								<li>
									<a href="?page=faq">Faq<span><?php echo T("вопросы"); ?> </span></a>
								</li>
								<li>
									<a href="?page=support"><?php echo T("Контакты"); ?><span><?php echo T("обратная связь"); ?></span></a>
								</li>

							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="header-login-block">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<?php include ("lang.php"); ?>
							<br><br>
							<?php if(!(isset($_SESSION['login']) && isset($_SESSION['password']))) { ?>
							<div class="fields">
								<form method="post" action="auth.php">
									<div class="field">
										<input name="login" placeholder="<?php echo T("Логин"); ?>" required="" type="text">
									</div>
									<div class="field">
										<input name="password" placeholder="<?php echo T("Пароль"); ?>" required="" type="password">
									</div>
									<div class="field field-submit">
										<input name="auth_button" value="<?php echo T("Вход"); ?>" type="submit">
									</div>
								</form>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="header-middle">
				<div class="container">
					<div class="row">
						<div class="col-md-5" style="padding-left:100px">
							<div class="header-text">
								<h1><small><?php echo T("добро пожаловать в"); ?></small><?php echo $name_project; ?></h1>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="special-cabinet">
								<center>
									<?php if(!(isset($_SESSION['login']) && isset($_SESSION['password']))) { ?>
									<a href="?page=registration" class="btn">
										<span><?php echo T("Регистрация"); ?></span>
									</a>
									<?php } else { ?>
									<a href="?page=cabinet" class="btn">
										<span><?php echo T("Кабинет"); ?></span>
									</a>
									<?php } ?>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php } elseif (in_array($page, $inc_cab)) { ?>

<?php } ?>
