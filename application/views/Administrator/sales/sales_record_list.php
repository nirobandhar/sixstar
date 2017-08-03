<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:40px 20px 25px 160px">
<h2>Sales Record List</h2>
    <table class="border" cellspacing="0" cellpadding="0" width="80%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/search_sales_record', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#89B03E" style="background:#89B03E;">
            <th>Date</th>
            <th>Invoice No.</th>            
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Sales Type</th>
            <th>Vat</th>
            <th>Freight</th>
            <th>Discount</th>
            <th>Reward</th>
            <th>Total Sale</th>
            <th>Paid</th>
            <th>Due</th>
            <th>Notes</th>
            <th></th>
        </tr>
        <?php 
        $totalpurchase = 0;
        $Totalpaid = 0;
        $totaldue = 0;
        $totalvat = 0;
        $totalfreight = 0;
        $totaldiscount = 0;
        $totalreward = 0;
        foreach($record as $record){ 
            $totalpurchase = $totalpurchase +$record['SaleMaster_SubTotalAmount']; 
            $Totalpaid = $Totalpaid +$record['SaleMaster_PaidAmount'];
            $totaldue = $totaldue+$record['SaleMaster_DueAmount'];
            $totalreward = $totalreward+$record['SaleMaster_RewordDiscount'];
            ?>
        <tr>
            <td><?php echo $record['SaleMaster_SaleDate'] ?></td>
            <td><?php echo $record['SaleMaster_InvoiceNo'] ?></td>
            
            <td><?php echo $record['Customer_Code'] ?></td>
            <td><?php echo $record['Customer_Name'] ?></td>
            <td><?php if($record['type']==1){ echo "Retail Sale";}
			if($record['type']==2){ echo "Whole Sale";}
			if($record['type']==3){ echo "Installment Sale";}
			 ?></td>
             <td style="text-align: right;"><?php 
             $tamount = $record['SaleMaster_TotalSaleAmount']; 
             $vatper = $record['SaleMaster_TaxAmount']; 
             $vat = (($tamount*$vatper)/100);
             $totalvat = $totalvat+$vat;
             echo number_format($vat, 2);

             ?></td>
             <td style="text-align: right;"><?php 
            $totalfreight = $totalfreight+$record['SaleMaster_Freight'];
            echo number_format($record['SaleMaster_Freight'], 2); ?></td>
            <td style="text-align: right;"><?php 
            $disper = $record['SaleMaster_TotalDiscountAmount'];
            $discount = (($tamount*$disper)/100);
            $totaldiscount = $totaldiscount+$discount;
            echo number_format($discount, 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($record['SaleMaster_RewordDiscount'], 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($record['SaleMaster_SubTotalAmount'], 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($record['SaleMaster_PaidAmount'], 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($record['SaleMaster_DueAmount'], 2); ?></td>
            <td><?php echo $record['SaleMaster_Description'] ?></td>
            <td><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/sales_record_print/<?php echo $record['SaleMaster_SlNo'];?>', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></td>

        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalvat, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalfreight, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totaldiscount, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalreward, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($Totalpaid, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totaldue, 2); ?></strong></td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
        </tr>
       
    </table>

</div>