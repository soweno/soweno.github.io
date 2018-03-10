<?php include ("menu_user.php"); ?>
<div class="panel-content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<h1><?php echo T("Партнерская программа"); ?></h1>
				<table class="table table-cabinet">
					<tr>
						<th><?php echo T("Пользователь"); ?></th>
						<th><?php echo T("Дата регистрации"); ?></th>
						<th><?php echo T("Вклады"); ?></th>
						<th><?php echo T("Рефские"); ?></th>
					</tr>
					<tr><th class="level" colspan="4" align="center"><?php echo T("Уровень"); ?> 1</th></tr>
					<?php
						$list = get_list('users', 'refer = '.escape_db($login));
					?>
					<?php foreach ($list as $row) { ?>
					<tr>
						<td><?php echo $row['login']; ?></td>
						<td><?php echo f_date(login_regdate($row['login'])); ?></td>
						<td><?php echo format_number(login_invest($row['login']),'2','.',' '); ?> <?php echo $valu;?>.</td>
						<td><?php echo format_number(login_invest($row['login']) / 100 * $p_ref,'2','.',' '); ?> <?php echo $valu;?>.</td>
					</tr>
					<?php } ?>
					<tr><th class="level" colspan="4" align="center"><?php echo T("Уровень"); ?> 2</th></tr>
					<?php
						$users = [];
						//1 получим список всех пользователей которых пригласил $login
						$users_1 = get_list('users', 'refer = '.escape_db($login));
						foreach ($users_1 as $user) {
							//2 для каждого пользователя получим список кого пригласил $user['login']
							$list = get_list('users', 'refer = '.escape_db($user['login']));
							//3 составим общий список кого кто пригласил
							$users = array_merge($users, $list);
						}
						//для каждого такого юзера высчитаем сумму вкладов

					?>
					<?php foreach ($users as $row) { ?>
					<tr>
						<td><?php echo $row['login']; ?></td>
						<td><?php echo f_date(login_regdate($row['login'])); ?></td>
						<td><?php echo format_number(login_invest($row['login']),'2','.',' '); ?> <?php echo $valu;?>.</td>
						<td><?php echo format_number(login_invest($row['login']) / 100 * 5,'2','.',' '); ?> <?php echo $valu;?>.</td>
					</tr>
					<?php } ?>
					<tr><th class="level" colspan="4" align="center"><?php echo T("Уровень"); ?> 3</th></tr>
					<?php
						$users = [];
						$users2 = [];
						//1 получим список всех пользователей которых пригласил $login
						$users_1 = get_list('users', 'refer = '.escape_db($login));
						foreach ($users_1 as $user) {
							//2 для каждого пользователя получим список кого пригласил $user['login']
							$list = get_list('users', 'refer = '.escape_db($user['login']));
							//3 составим общий список кого кто пригласил
							$users = array_merge($users, $list);
						}

						foreach ($users as $user) {
							//2 для каждого пользователя получим список кого пригласил $user['login']
							$list = get_list('users', 'refer = '.escape_db($user['login']));
							//3 составим общий список кого кто пригласил
							$users2 = array_merge($users2, $list);
						}

					?>
					<?php foreach ($users2 as $row) { ?>
					<tr>
						<td><?php echo $row['login']; ?></td>
						<td><?php echo f_date(login_regdate($row['login'])); ?></td>
						<td><?php echo format_number(login_invest($row['login']),'2','.',' '); ?> <?php echo $valu;?>.</td>
						<td><?php echo format_number(login_invest($row['login']) / 100 * 2,'2','.',' '); ?> <?php echo $valu;?>.</td>
					</tr>
					<?php } ?>
				</table>
				<div class="clearfix"></div>
				<br/>
			</div>
			<div class="col-md-5">
				<div class="box-place">
					<h3><?php echo T("Pеферальная ссылка"); ?></h3>
					<div class="clearfix"></div>
					<div class="form-styled form-styled-1" style='margin-left: 90px;'>
						<div class="block_form_el  field cfix">
							<i></i>
							<label for=""></label>
							<div class="block_form_el_right">
								<input type="text" style='margin-top:0;' onclick='this.select();' value='https://<?php echo $site;?>/?ref=<?php echo $login;?>'>
							</div>
						</div>
					</div>
					<ul style='margin-top:-10px'>
						<li class='index-3'><a><?php echo T("Вы приглашены"); ?></a> <span><?php if ($_SESSION['refer'] !== $free_referal) { echo $_SESSION['refer'];} else { echo 'N\A';}?></span></li>
					</ul>
					<div class="clearfix"></div>
					<?php /**/ ?>
					<a href="?page=promo" style='float:right;' class="btn btn-2"><?php echo T("Промо материалы"); ?></a>
					
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
