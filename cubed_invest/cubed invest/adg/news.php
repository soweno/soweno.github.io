<?php
    if(isset($_POST['cancel'])){
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
            
            $payment_cancel = $mysqli->query("DELETE FROM `news` WHERE id = '".(int)$id."' LIMIT 1;");
            if($payment_cancel){
                $report = "Новость удалена!";
            }
            else{
                $report = "Ошибка";
            }
        }
        else{
            $report = "Ошибка";
        }
    }
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
                <h2 class="page-header">Новости</h2>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Новости</h3>
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="200">Дата</th>
                                                <th>Название</th>
                                                <th>Превью</th>
                                                <th>Контент</th>
                                                <th>Изображение(url)</th>
                                                <th>Удалить</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                #Вывод всех депозитов
                                                $result = $mysqli->query("SELECT * FROM `news` ORDER BY `date` DESC;");
                                                if ($result) {
                                                    while($row = $result->fetch_assoc()) {

                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo date('Y-m-d H:i:s', $row['date']); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['title']); ?>
                                                </td> 
												<td>
                                                    <?php echo htmlspecialchars($row['full_news']); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['news']) ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['img']; ?>
                                                </td>
                                                <td>
                                                    <form action = "" method = "post">
                                                        <input type = "hidden" name = "id" value = "<?php echo $row['id']; ?>">
                                                        <button type="submit" name = "cancel" class="btn btn-default">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                    $result->free();
                                                }
                                            ?>
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
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->