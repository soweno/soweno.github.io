<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "invest" || !isset($_GET["page"])) { echo 'class="active"'; } ?> >
			<a href="?page=invest"><i class="fa fa-fw fa-bar-chart-o"></i> Пополнения</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "payment") { echo 'class="active"'; } ?> >
			<a href="?page=payment"><i class="fa fa-fw fa-table"></i> Выплаты</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "topayment") { echo 'class="active"'; } ?> >
			<a href="?page=topayment"><i class="fa fa-fw fa-edit"></i> К выплате</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "all_depozit_work") { echo 'class="active"'; } ?> >
			<a href="?page=all_depozit_work"><i class="fa fa-fw fa-desktop"></i> Все активные депозиты</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "add") { echo 'class="active"'; } ?> >
			<a href="?page=add"><i class="fa fa-fw fa-arrows-v"></i> Накрутка статистики</i></a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "set") { echo 'class="active"'; } ?> >
			<a href="?page=set"><i class="fa fa-fw fa-file"></i> Управление платежами</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "users") { echo 'class="active"'; } ?> >
			<a href="?page=users"><i class="fa fa-fw fa-file"></i> Пользователи</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "add_news") { echo 'class="active"'; } ?> >
			<a href="?page=add_news"><i class="fa fa-fw fa-plus"></i> Добавить новость</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "news") { echo 'class="active"'; } ?> >
			<a href="?page=news"><i class="fa fa-fw fa-list"></i> Новости</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "settings") { echo 'class="active"'; } ?> >
			<a href="?page=settings"><i class="fa fa-fw fa-wrench"></i> Настройки</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "pay_methods") { echo 'class="active"'; } ?> >
			<a href="?page=pay_methods"><i class="fa fa-fw fa-wrench"></i> Настройки платежек</a>
		</li>
		<li <?php if (isset($_GET["page"]) && $_GET["page"] === "clear") { echo 'class="active"'; } ?> >
			<a href="?page=clear"><i class="fa fa-fw fa-file"></i> Очистка Таблиц</a>
		</li>
	</ul>
</div>
