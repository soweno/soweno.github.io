<?php
    $page_title = "К выплате";
    $table = 'payment';
    $report = form_delete($table);

    while (is_post()) {
        $payment = get_row_by_id($table, post('id'));
        $user = get_row_by_field('users', 'login', $payment['login']);
        $payment['pay_system'] = strtolower($payment['pay_system']);
		$comment = "Withdraw to ". $user['login'] ." from ".$name_project." - Better way to make money.";
		if ($payment['pay_system'] === 'payeer') {
            if (!payment_payeer($user['payeer'], $payment['summa'], $comment)) {
                $report = "Ошибка!";
                break;
            }
        } else if ($payment['pay_system'] === 'perfect money' || $payment['pay_system'] === 'perfectmoney' || $payment['pay_system'] === 'perfect') {
            if (!payment_perfect($user['perfect'], $payment['summa'], $comment)) {
                $report = "Ошибка!";
                break;
            }
        } else {
            $report = "Ошибка!";
            break;
        }
        $sql = "UPDATE `{$table}` SET `status` = '1'  WHERE `id` = ".dbEscape($payment['id']);
        $mysqli->query($sql);
        $report = "Выплата совершена!";
        break;
    }
?>

<div id="page-wrapper">
	<?php	if(isset($report) && $report != ''){ ?>
	<div class = "report">
		<?php messageBox($report);  ?>
	</div>
	<?php } ?>
    <div class="container-fluid">

        <!-- Flot Charts -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?php echo $page_title; ?></h2>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Список</h3>
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Выплатить</th>
                                                <th>Логин</th>
                                                <th>Сумма</th>
                                                <th>Куда</th>
                                                <th>Payeer</th>
                                                <th>PerfectMoney</th>
                                                <th>Удалить</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach(get_list($table, "status = 0", 'date desc') as $row) {
                                              $user = get_row_by_field('users', 'login', $row['login']);
                                            ?>
                                            <tr>
                                                <td>
                                                    <form method="post">
                                                        <input type="submit" name="send_code" value="Оплачено">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    </form>
                                                </td>
                                                <td>
                                                    <?php echo $row['login']; ?>
                                                </td>
                                                <td>
                                                    <?php echo (float)$row['summa']; ?>
                                                </td>
                                                <td>
                                                    <?php echo escape($row['pay_system']); ?>
                                                </td>
                                                <td <?php if (strtolower($row['pay_system']) === 'payeer') { ?> style="font-weight: bold; "<?php } ?>>
                                                    <?php echo escape($user['payeer']); ?>
                                                </td>
                                                <td <?php if (strtolower($row['pay_system']) === 'perfect money' || strtolower($row['pay_system']) === 'perfectmoney' || strtolower($row['pay_system']) === 'perfect') { ?> style="font-weight: bold; "<?php } ?>>
                                                    <?php echo escape($user['perfect']); ?>
                                                </td>
                                                <td>
                                                    <?php echo button_delete($row['id']); ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        <tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>