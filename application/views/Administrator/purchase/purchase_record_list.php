<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

<div class="content_scroll" style="padding:40px 20px 25px 160px">


<h2>Purchase Record List</h2>
    <table class="border" cellspacing="0" cellpadding="0" width="80%">



        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/search_purchase_record', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr bgcolor="#89B03E" style="background:#89B03E;">
            <th>Date</th>

            <th>Invoice No.</th>

            <th>Supplier ID</th>

            <th>Supplier Name</th>

            <th>Vat</th>

            <th>Freight</th>

            <th>Labour Cost</th>

            <th>Total</th>

            <th>Paid</th>

            <th>Due</th>

            <th>Notes</th>

            <th></th>

        </tr>

        <?php 

        $totalpurchase = 0;
        $Totalpaid = 0;
        $totalvat = 0;
        $totalfreight = 0;
        $totallabourcost = 0;

        foreach($record as $record){ 

            $totalpurchase = $totalpurchase +$record['PurchaseMaster_SubTotalAmount']; 

            $Totalpaid = $Totalpaid +$record['PurchaseMaster_PaidAmount'];
            $vatper = $record['PurchaseMaster_Tax'];
            $vat = (($record['PurchaseMaster_SubTotalAmount']*$vatper)/100);
            $totalvat = $totalvat + $vat;

            $totalfreight = $totalfreight + $record['PurchaseMaster_Freight'];
            $totallabourcost = $totallabourcost + $record['PurchaseMaster_DiscountAmount'];


            ?>

        <tr>
            <td><?php echo $record['PurchaseMaster_OrderDate'] ?></td>

            <td><?php echo $record['PurchaseMaster_InvoiceNo'] ?></td>

            <td><?php echo $record['Supplier_Code'] ?></td>

            <td><?php echo $record['Supplier_Name'] ?></td>

            <td style="text-align: right;"><?php echo number_format($vat, 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_Freight'], 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_DiscountAmount'], 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_SubTotalAmount'], 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_PaidAmount'], 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_DueAmount'], 2); ?></td>

            <td><?php echo $record['PurchaseMaster_Description'] ?></td>
            <td><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/purchase_record_print/<?php echo $record['PurchaseMaster_SlNo'];?>', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></td>
        </tr>

        <?php } ?>
        <tr>
            <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalvat, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalfreight, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totallabourcost, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($Totalpaid, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format(($totalpurchase-$Totalpaid), 2); ?></strong></td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>

        </tr>
       

    </table>



</div>