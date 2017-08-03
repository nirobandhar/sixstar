<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:40px 20px 25px 160px">

    <table class="border" cellspacing="0" cellpadding="0" width="80%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/expense_print', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#ccc">
            <th>Tr. ID</th>
            <th>Date</th>
            <th>Tr Account</th>
            <th>Account Name</th>
            <th>Description</th>
            <th>In Amount</th>                      
            <th>Out Amount</th> 
        </tr>
        <?php $totalin='';
		      $totalout='';
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
            <td><?php if($row['In_Amount']=="" ||$row['In_Amount']=="0" ){echo '0';}else{ echo $row['In_Amount'];} ?></td>
            <td><?php if($row['Out_Amount']=="" ||$row['Out_Amount']=="0" ){echo '0';}else{ echo $row['Out_Amount'];} ?></td>
        </tr>
        <?php } ?>
       
    </table>
	 <br>
    <br>
    <table  cellspacing="0" cellpadding="0" width="80%">
        <tr>
            <td ><strong>Total In Amount </strong><input type="text" disabled="" value="<?php echo $totalin; ?>"></td>
            <td> <strong>Total Out Amount </strong> <input type="text" disabled="" value="<?php echo $totalout; ?>"></td>
            <td></td>
        </tr>
    </table>
</div>