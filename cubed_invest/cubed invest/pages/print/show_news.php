<li>
	<a href="show"><?php echo $title; ?></a>
	<span><?php echo date('j '. $mdate[date('n',$date)-1] .' Y, H:i', $date); ?></span>
	<hr>
	<div>
		<?php echo $news; ?><br>
		<?php echo $full_news; ?><br>
		<div>
			<img alt="" src="<?php echo $img; ?>" style="width: 600px; height: 456px;" />
		</div>
		<div style="text-align: center;">&nbsp;</div>
		<div class="clearfix"></div>
	</div>
	<hr>
</li>