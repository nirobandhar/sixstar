<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:40px 20px 25px 160px">
<h2>Sales Record List</h2>
    <table class="border" cellspacing="0" cellpadding="0" width="70%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/search_sales_record', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#89B03E" style="background:#89B03E;">
            <th>Invoice No.</th>
            <th>Date</th>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Sales Type</th>
            <th>Discount</th>
            <th>Total</th>
            <th>Paid</th>
            <th>Due</th>
            <th>Notes</th>
            <th></th>
        </tr>
        <?php $totalpurchase = "";
        $Totalpaid = "";
        foreach($record as $record){ 
            $totalpurchase = $totalpurchase +$record['SaleMaster_SubTotalAmount']; 
            $Totalpaid = $Totalpaid +$record['SaleMaster_PaidAmount'];

            ?>
        <tr>
            <td><?php echo $record['SaleMaster_InvoiceNo'] ?></td>
            <td><?php echo $record['SaleMaster_SaleDate'] ?></td>
            <td><?php echo $record['Customer_Code'] ?></td>
            <td><?php echo $record['Customer_Name'] ?></td>
             <td><?php if($record['type']==1){ echo "Retail Sale";}
			if($record['type']==2){ echo "Whole Sale";}
			if($record['type']==3){ echo "Installment Sale";}
			 ?></td>
            <td><?php echo $record['SaleMaster_TotalDiscountAmount'] ?></td>
            <td><?php echo $record['SaleMaster_SubTotalAmount'] ?></td>
            <td><?php echo $record['SaleMaster_PaidAmount'] ?></td>
            <td><?php echo $record['SaleMaster_DueAmount'] ?></td>
            <td><?php echo $record['SaleMaster_Description'] ?></td>
            <td><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/sales_record_print/<?php echo $record['SaleMaster_SlNo'];?>', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></td>

        </tr>
        <?php } ?>
       
    </table>
    <br>
    <br>
    <table  cellspacing="0" cellpadding="0" width="70%">
        <tr>
            <td ><strong>Total Sale </strong><input type="text" disabled="" value="<?php echo $totalpurchase; ?>"></td>
            <td> <strong>Total Paid </strong> <input type="text" disabled="" value="<?php echo $Totalpaid; ?>"></td>
            <td><strong>Total Due </strong> <input type="text" disabled="" value="<?php echo $totalpurchase - $Totalpaid; ?>"></td>
            <td></td>
        </tr>
    </table>

</div>