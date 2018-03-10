<li>
	<span class="date"> <?php echo $date_d; ?>  <small><?php echo date($mdate[date('n',$date_m)-1]); ?></small></span>
	<a href="?page=show&news=<?php echo $id;?>"><?php echo $title; ?></a>
	<div>
		<?php echo $news; ?>
	</div>
	<a href="?page=show&news=<?php echo $id;?>" class="btn btn-3 btn-small"><span><?php echo T("подробнее"); ?></span></a>
</li>
