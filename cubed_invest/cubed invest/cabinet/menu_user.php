<body>
	<div class="none"></div>
	<div class='wrapper wrapper-account'>
		<div class="panel-bg"></div>
		<div class="panel-left">
			<div class="logo"><a href="/"></a></div>
			<ul class="menu-cabinet">
				<li class="cabinet  current"><a href="?page=cabinet"><i></i><?php echo T("Кабинет"); ?></a></li>
				<li class="balance "><a href="?page=operations"><i></i><?php echo T("Пополнения"); ?></a>
					<ul>
						<li class="balance_operaddCASHIN "><a href="?page=invest"><i></i><?php echo T("пополнить счет"); ?></a></li>
					</ul>
				</li>
				<li class="depo ">
					<a href="?page=payments"><i></i><?php echo T("Выплаты"); ?></a>
					<ul>
						<li class="depo_depoadd "><a href="?page=payment"><i></i><?php echo T("вывод средств"); ?></a></li>
					</ul>
				</li>
				<li class="refsys "><a href="?page=ref"><i></i><?php echo T("Реф. система"); ?></a></li>
				<li class="balance_wallets "><a href="?page=wallet"><i></i><?php echo T("Плат. реквизиты"); ?></a></li>
				<?php if ($login === $admin_login) { ?>
				<li class="account "><a href="adg.php" target="_blank"><i></i>Админка</a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="panel-right">
			<div class="panel-top">
				<div class="user-panel">
					<i><a href='?page=cabinet'><i class="icon icon-cog"></i></a></i>
					<sup><?php echo T("Вы вошли как"); ?>:</sup>
					<a href="logout.php" ><?php echo T("Выход"); ?></a>
					<span><?php echo $login;?></span>
					<small><?php echo $login_email;?></small>
					<?php include ("blocks/lang.php"); ?>
				</div>
			</div>
