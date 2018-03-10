<section class="about about-bg-1">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class='h1-right'><?php echo T("Авторизация"); ?><span><?php echo T("Вход"); ?></span></h1>
				<div class="clearfix"></div>
				<?php if (isset($_SESSION['message'])) { ?>
				<center style="color:red;"><?php echo $_SESSION['message']; ?></center>
				<?php } ?>
				<br>
				<div class="clearfix"></div>
				<form method="post" class='form-styled' action="auth.php">
					<div class="col-md-6">
						<div class="field">
							<i></i>
							<label for=""><?php echo T("Ваш логин"); ?></label>
							<input name="login" required="" type="text" placeholder="<?php echo T("Логин"); ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="field">
							<i></i>
							<label for=""><?php echo T("Ваш пароль"); ?></label>
							<input name="password" required="" placeholder="<?php echo T("Пароль"); ?>" type="password">
						</div>
					</div>
					<div class="clearfix"></div>

					<!--a href="resetpass" class="forgot" >Забыли пароль?</a-->
					<div class="field-submit" style='float:right; margin:15px 50px;' >
						<input name="auth_button" style="float:right;" value="<?php echo T("Вход"); ?>" type="submit">
					</div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</section>
