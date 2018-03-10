<body>
	<div class="header-hidden fixed">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					<div class="logo"><a href="/"></a></div>
				</div>
				<div class="col-md-8">
					<ul class="menu">
						<li><a href="/" ><?php echo T("Главная"); ?><span><?php echo T("основное"); ?></span></a></li>
						<li><a href="?page=about" ><?php echo T("О нас"); ?><span><?php echo T("о компании"); ?></span></a></li>
						<li><a href="?page=partnership" ><?php echo T("Партнерам"); ?><span><?php echo T("реф. система"); ?></span></a></li>
						<li><a href="?page=investments" ><?php echo T("Инвесторам"); ?><span><?php echo T("мы предлагаем"); ?></span></a></li>
						<li><a href="?page=news" ><?php echo T("Новости"); ?><span><?php echo T("события"); ?></span></a></li>
						<li><a href="?page=faq" >Faq<span><?php echo T("вопросы"); ?> </span></a></li>
						<li><a href="?page=support" ><?php echo T("Контакты"); ?><span><?php echo T("обратная связь"); ?></span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class='wrapper'>
		<div class="wrap" style="opacity: 1;">
			<div class="modal_block animated slideInDown  ui-widget-content  ui-draggable" id="draggable" style="width:700px; ">
				<a class="close" href='javascript: window.history.go(-1);'></a>
				<div class="inset ajax_modal">
					<div style='padding:0 100px'>
						<center style='padding-left:90px'>
							<h1><?php echo T("Регистрация"); ?><span> <?php echo T("в проекте"); ?></span></h1>
						</center>
						<div class="clearfix"></div>
						<?php if (isset($_SESSION['message'])) { ?>
						<center style="color:red;"><?php echo $_SESSION['message']; ?></center>
						<?php } ?>
						<br>
						<div>
							<form method="post" class='form-styled' action="reg.php">
								<div class="field">
									<i></i>
									<label for=""><?php echo T("Ваш логин"); ?></label>
									<input name="login" type="text" placeholder="login">
								</div>
								<div class="field">
									<i></i>
									<label for=""><?php echo T("Ваш"); ?> e-mail</label>
									<input name="email" type="text" placeholder="E-mail">
								</div>
								<div class="field">
									<i></i>
									<label for=""><?php echo T("Ваш пароль"); ?></label>
									<input name="password" type="password" placeholder="<?php echo T("Пароль"); ?>" >
								</div>
								<div class="field">
									<i></i>
									<label for=""><?php echo T("Повторите пароль"); ?></label>
									<input name="password2" value="" type="password" placeholder="<?php echo T("Повторите пароль"); ?>">
								</div>
								<div class="field-checkbox">
									<label class="checked">
										<input name="rules" value="check" type="checkbox" checked="checked">
									</label>
									<span><?php echo T("Я согласен с"); ?> <a   href="?page=rules"><?php echo T("условиями"); ?></a> <?php echo T("предоставления услуг"); ?></span>
								</div>
								<div class="clearfix"></div>
								<br>
								<center>
									<div class="field-submit">
										<input type="submit" name="reg_button" value="<?php echo T("Зарегистрироваться"); ?>">
									</div>
								</center>
								<div class="clearfix"></div>
								<br>
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</body>
</html>
