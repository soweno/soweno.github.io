<tr>
    <td align='center' class='balance'>
        <?php echo $summa;?>
            <?php echo $valu;?>
    </td>
    <td align='center'>
        <?php echo $date;?>
    </td>
    <td align='center' width="240px" class='image'>
        <?php if ($pay_system == "Payeer") { ?> <i><img src="images/p/4.png" height='25'></i><span><?php echo $pay_system;?></span>
            <?php } elseif ($pay_system == "PerfectMoney") { ?> <i><img src="images/p/3.png" height='25'></i><span><?php echo $pay_system;?></span>
                <?php } ?>
    </td>
    <td align='center'>
        <?php if ($status == 0) echo T("В обработке"); else echo T("Принято");?>
    </td>
</tr>
