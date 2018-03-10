<?php
    $table = "users";
    $report = form_delete($table);
	$page_title = "Пользователи"
    /*$
    //обновление (загрузка файла)
    fields = ["img"=>"file",];
    $report = form_update_fields($table, $fields);*/
?>

<div id="page-wrapper">
    <?php   if(isset($report) && $report != ''){ ?>
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
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Логин</th>
                                                <th>Пароль</th>
                                                <th>Реферовод</th>
                                                <th>Email</th>
                                                <th>Payeer</th>
                                                <th>Perfect</th>
                                                <th>Изменить</th>
                                                <th>Удалить</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach (get_list($table, "1 = 1", 'date desc') as $item) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo escape($item['login']); ?>
                                                </td>
                                                <td>
                                                    <?php echo escape($item['password']); ?>
                                                </td>
                                                <td>
                                                    <?php echo escape($item['refer']); ?>
                                                </td>
                                                <td>
                                                    <?php echo escape($item['email']); ?>
                                                </td>
												<td>
                                                    <?php echo escape($item['payeer']); ?>
                                                </td>
												<td>
                                                    <?php echo escape($item['perfect']); ?>
                                                </td>
                                                <td>
                                                    <?php if (!DEMO) { echo button_edit($table, $item['id']); } else { echo "Не досупно в демо";} ?>
                                                </td>
                                                <td>
                                                    <?php if (!DEMO) {  button_delete($item['id']); } else { echo "Не досупно в демо";} ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
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