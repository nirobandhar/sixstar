<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:40px 20px 25px 160px">

    <table class="border" cellspacing="0" cellpadding="0" width="80%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/expense_print', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#ccc">
            <th>Tr. ID</th>
            <th>Date</th>
            <th>Tr. Type</th>
            <th>Account Head</th>
            <th>Description</th>
            <th>In Amount</th>                      
            <th>Out Amount</th> 
        </tr>
        <?php $totalin=0;
		      $totalout=0;
        foreach($record as $row){
			$totalin=$row['In_Amount']+$totalin;
			$totalout=$row['Out_Amount']+$totalout;
			 ?>
        <tr>
            <td><?php echo $row['Tr_Id'] ?></td>
            <td><?php echo $row['Tr_date'] ?></td>
            <td><?php echo $row['Tr_Type'] ?></td>
            <td><?php echo $row['Acc_Name'] ?></td>
            <td><?php  echo $row['Tr_Description'] ?></td>
            <td style="text-align: right;"><?php if($row['In_Amount']=="" ||$row['In_Amount']=="0" ){echo '0.00';}else{ echo number_format($row['In_Amount'], 2);} ?></td>
            <td style="text-align: right;"><?php if($row['Out_Amount']=="" ||$row['Out_Amount']=="0" ){echo '0.00';}else{ echo number_format($row['Out_Amount'], 2);} ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="5" style="text-align: right;"><strong>Total</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalin, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalout, 2); ?></strong></td>
        </tr>
       
    </table>

</div>