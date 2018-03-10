<?php
	while (is_post()) {
		$mail = new Mail($admin_email);
		if (!(post('email') && post("message") && post("login"))) {
			show_js_alert("Заполните все поля!");
			break;
		}
		$client_mail = escape(post("email"));
		$log = escape(post('login'));
		$topic = escape(post('topic'));
		$rev = escape(post('message'));

		$message = <<<TEXT
<h1>Сообщеие в ТЕХПОДДЕРЖКУ</h1>
<strong>E-mail:</strong>$client_mail<br>
<strong>Логин:</strong>$log<br>
<strong>Тема:</strong>$topic<br>
<strong>Текст</strong><br>
<i>$rev</i>
TEXT;
		$mail->send($admin_email, "Сообщеие в ТЕХПОДДЕРЖКУ", $message);
		show_js_alert("Сообщение отправлено!");
		break;
	}
?>
<section class="about about-bg-1">
	<div class="container">
		<div class="row">
			<center><h2><?php echo T("Контакты"); ?> <span><?php echo $name_project; ?></span></h2></center>
			<div class="col-md-6">
				<div class="block_form">
					<form method="post" class='form-styled support-form'>
						<div class="field">
							<i></i>
							<label for=""><?php echo T("Ваш"); ?> E-Mail</label>
							<input name="email" value=""  type="text">
						</div>
						<div class="field">
							<i></i>
							<label for=""><?php echo T("Ваш"); ?> Login</label>
							<input name="login" value=""  type="text">
						</div>
						<div class="field">
							<i></i>
							<label for=""><?php echo T("Тема сообщения"); ?></label>
							<input name="topic" value="" type="text">
						</div>
						<div class="field filed-textarea">
							<i></i>
							<label><?php echo T("Текст сообщения"); ?>...</label>
							<textarea name="message" wrap="off" ></textarea>
						</div>
						<center>
							<div class="field-submit" style='height: 35px; margin:15px 50px;' >
								<input name="" type="submit" value="<?php echo T("Отправить"); ?>" style='height:35px; line-height:35px'>
							</div>
						</center>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="clearfix"></div>
				<br/>
				<h3><?php echo T("Контактная информация"); ?></h3>
				<hr>
				<p>
					1 Hardwick's Square <br/>London <br/>SW18 4AW<br/>
					<hr>
					<i class="icon icon-phone"></i>&nbsp;&nbsp;<?php echo T("Служба поддержки"); ?>:
					<br/><br/>
					<font style='font-size:17px'>Skype <?php echo $skype; ?></font>
					<br/><br/>
					<i class="icon icon-mail"></i>&nbsp;&nbsp;E-mail:
					<font style='font-size:17px'><?php echo $admin_email; ?></font>
					<hr>
					<!--span class="social-contact">
						<p>мы в соц. сетях:</p>
						<a href="<?php echo $admin_fb;?>" target='_blank'>
							<i class="icon icon-facebook"></i>
						</a>
						<a href="<?php echo $admin_tw;?>" target='_blank'>
							<i class="icon icon-twitter"></i>
						</a>
					</span-->
				</p>
			</div>
			<div class="clearfix"></div>
			<br/>
			<div class="clearfix"></div>
		</div>
	</div>
</section>

<section class="map">
	<div class="block-google-location">
		<div id="map"></div>
	</div>
</section>
