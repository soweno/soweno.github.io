<tr>
	<td align="center" style="padding-left:10px;color:black;">
		<?php echo $date;?>
	</td>
	<td align="center">
		<?php echo number_format($summa,'2','.',' ');?> <?php echo $valu;?>
	</td>
	<td align="center">
		<?php echo $count_dep ."/". $count_dep_all;?>
	</td>
	<td align="center">
		<?php echo number_format($summa_dep,'2','.',' ');?> <?php echo $valu;?>
	</td>
	<td align="center" class="timer" data-message="<?php echo T("Отработано"); ?>">
		<?php echo $last_profit; ?>
	</td>
</tr>
