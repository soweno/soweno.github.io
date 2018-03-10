<?php
	if (!empty($_GET['news'])) { 
		$req = $_GET['news'];
		$req = str_replace('&news=', '', $req);
		$req = (int)$req;
		//echo $req;
		if ($req && $req > 0) {
			$result = $mysqli->query("SELECT id FROM news WHERE id = '$req'");
			if ($result && $result->num_rows > 0) {
				
			} else {
				$error = '<div align="center" style="color:red;">Такой новости не существует!</div>';
			}
		}
	} else {
		$error = '<div align="center" style="color:red;">Такой новости не существует!</div>';
	}
	
?>
<section class="about about-bg-1" >
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<center><h3></h3></center>
				<div class="news-list news-list-show">
					<ul class=''>
						<?php
							#Вывод новостей
							//$id = 3;
							if (!isset($error)) {
								$result = $mysqli->query("SELECT * FROM `news` WHERE id = '$req'");
								if($result){
									while($row = $result->fetch_assoc()){
										$title = $row['title'];
										$date = $row['date'];
										$news = $row['news'];
										$full_news = $row['full_news'];
										$img = $row['img'];
										include 'print/show_news.php';
									}
									$result->free();
								}
							} else { 
								echo $error;
							}
						?>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>