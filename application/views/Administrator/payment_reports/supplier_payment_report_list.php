<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:40px 20px 25px 160px">
<h2>Supplier Due Payment List</h2>
    <table class="border" cellspacing="0" cellpadding="0" width="70%">
        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/supplier_payment_print', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#89B03E" style="background:#89B03E;">
            <th>Supplier ID</th>
            <th>Date</th>
            <th>Supplier Name</th>
            <th>Contact No</th>
            <th>Payment</th>
            <th>Note</th>
        </tr>
        <?php $grtotal = 0;
        foreach($record as $record){
        $record ['SPayment_amount'];
		$grtotal =$grtotal+$record['SPayment_amount']; ?>
        <tr>
            <td><?php echo $record['Supplier_Code'] ?></td>
            <td><?php echo $record['SPayment_date'] ?></td>
            <td><?php echo $record['Supplier_Name'] ?></td>
            <td><?php echo $record['Supplier_Mobile'] ?></td>
            <td style="text-align: right;"><?php echo number_format($record['SPayment_amount'], 2); ?></td>
            <td><?php echo $record['SPayment_notes'] ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="4" align="right"><strong>Total Payment</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($grtotal, 2); ?></strong></td>
            <td></td>
        </tr>
    </table>

</div>