<li>
	<span class="date"> <?php echo $date_d; ?>  <small><?php echo date($mdate[date('n',$date_m)-1]); ?></small></span>
	<a href="?page=show&news=<?php echo $id;?>"><?php echo $title; ?></a>
	<div style="min-height: 55px;">
		<?php echo $news; ?>
		<div class="clearfix"></div>
	</div>
	<a href="?page=show&news=<?php echo $id;?>" class="btn btn-3 btn-small" style='margin-top:10px'>
		<span><?php echo T("больше"); ?></span>
	</a>
	<hr>
</li>
