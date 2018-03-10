<?php
    $report = "";
    if (isset($_POST['save'])) {
        if(isset($_POST['title']) && isset($_POST['news']) && isset($_POST['full_news'])) {
            $title = "'".$mysqli->real_escape_string($_POST['title'])."'";
            $news = "'".$mysqli->real_escape_string($_POST['news'])."'";
            $full_news = "'".$mysqli->real_escape_string($_POST['full_news'])."'";
            $img = "";
       
            if (!DEMO && isset($_FILES['img']['tmp_name'])) {
                // Check MIME Type by yourself.
                $ext = substr(strrchr($_FILES['img']['name'], '.'), 1);
                if (!move_uploaded_file(
                    $_FILES['img']['tmp_name'],
                    sprintf(__DIR__.'/../downloads/%s.%s',
                        md5($_FILES['img']['tmp_name']),
                        $ext
                    )
                )) {
                    $report = "Неудается переместить файл в каталог загрузки! Проверте права на каталок downloads(777)!";
                } else {
                    $img = sprintf('downloads/%s.%s',
                        md5($_FILES['img']['tmp_name']),
                        $ext
                    );
                }
            }
            if (empty($report)) {
                if (!empty($img)) {
                    $img = "'".$mysqli->real_escape_string($img)."'";
                    $res = $mysqli->query("INSERT INTO `news` SET `title` = $title, `news` = $news, `full_news` = $full_news, `img` = $img, `date` = ".time());
                } else {
                    $res = $mysqli->query("INSERT INTO `news` SET `title` = $title, `news` = $news, `full_news` = $full_news, `date` = ".time());
                }
                $report = 'Новость успешно создана!';    
                $_POST['title'] = $_POST['news'] = "";
            }
        } else {
            $report = 'Заполните все поля!';
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
                <h2 class="page-header">Добавить Новость</h2>
            </div>
        </div>
        <!-- /.row -->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Добавить</h3>
                    </div>
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-line-chart">
                                <div>
                                    <p>Добавить Новость</p>
                                    <form enctype="multipart/form-data" action = "" method = "POST">
                                        <input class="form-control" style="width: 400px; " type = "text" name = "title" placeholder = "Название" value="<?php echo isset($_POST['title']) && !empty($_POST['title']) ? htmlspecialchars($_POST['title']) : ""; ?>">
                                        <br>
                                        <textarea class="form-control" style="width: 400px; height: 100px;" type = "text" name = "news" placeholder = "Превью" value="<?php echo isset($_POST['news']) && !empty($_POST['news']) ? htmlspecialchars($_POST['news']) : ""; ?>"></textarea>
                                        <br>
										<textarea class="form-control" style="width: 400px; height: 200px;" type = "text" name = "full_news" placeholder = "Текст новости" value="<?php echo isset($_POST['news']) && !empty($_POST['news']) ? htmlspecialchars($_POST['news']) : ""; ?>"></textarea>
                                        <br>
										<?php include (__DIR__."/demo.php"); ?>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                                        <input style="width: 400px; " type = "file" name = "img" placeholder = "Прикрепить фото">
                                        <br>
                                        <button type="submit" name = "save" class = "btn btn-default">Создать</button>
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
