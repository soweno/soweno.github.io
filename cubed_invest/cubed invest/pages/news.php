<section class="about about-bg-1" >
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<center><h2><?php echo T("Новости"); ?></h2></center>
				<div class="news-list">
					<ul class='news-listing'>
						<?php
							#Вывод новостей
							$result = $mysqli->query("SELECT * FROM `news` ORDER BY id DESC");
							if($result){
								while($row = $result->fetch_assoc()){
									$id = $row['id'];
									$date_d = date("d", $row['date']);
									$date_m = $row['date'];
									$title = $row['title'];
									$news = $row['news'];
									include 'print/news_full.php';
								}
								$result->free();
							}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
