<?php
    $table = "users";
    $page_title = "Обновить пользователя";
    $fields = ['login'=>"", 'password'=>"", 'refer'=>"", 'email'=>"", 'payeer'=>"", 'perfect'=>"",];
    
	if (!DEMO) {
		$report = form_update($table, $fields);
	}
	
?>

<div id="page-wrapper">
    <?php include(__DIR__."/show_report.php"); ?>
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
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Обновить</h3>
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart">
                                <div>
                                    <form enctype="multipart/form-data" action = "" method = "POST">
                                        <?php input("login", "Логин"); ?>
                                        <br>
                                        <?php input("password", "Пароль"); ?>
                                        <br>
                                        <?php input("refer", "Реферовод"); ?>
                                        <br>
                                        <?php input("email", "Email"); ?>
                                        <br>
                                        <?php input("payeer", "Payeer"); ?>
                                        <br>
                                        <?php input("perfect", "PerfectMoney"); ?>
                                        <br>
                                        <!-- скрытое поле -->
                                        <?php input("id", "", "hidden", "", ""); ?>
                                        <br>
                                        <?php button_update(); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    
</div>
<!-- /#page-wrapper -->
