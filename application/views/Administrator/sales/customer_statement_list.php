<?php
    $openingBalance2 = 0;
    $customerName = '';
    $customerId = '';
    foreach ($openingBAll as $singleOpeB){
        $openingBalance2 = $openingBalance2 + $singleOpeB['SaleMaster_DueAmount'];
        $customerName = $singleOpeB['Customer_Name'];
        $customerId = $singleOpeB['Customer_Code'];
    }
?>
<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:40px 20px 25px 160px">
    <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/customer_statement_print', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
    <h2>Sales Record List</h2>

    <table class="border" cellspacing="0" cellpadding="0" width="80%">
        <tr>
            <td width="125px">Customer ID</td>
            <td><?php echo $customerId ? $customerId : ''; ?></td>
            <td></td>
        </tr>
        <tr>
            <td>Customer Name</td>
            <td><?php echo $customerName ? $customerName : ''; ?></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">Opening Balance</td>
            <td><?php echo $openingBalance?$openingBalance:0; ?></td>
        </tr>

    </table>
    <br></br>
    <div style="clear: both;"></div>
    <table class="border" cellspacing="0" cellpadding="0" width="80%">


        <tr bgcolor="#89B03E" style="background:#89B03E;">
            <th>Date</th>
            <th>Invoice No.</th>
            <th>Sales Type</th>
            <th>Total Sale</th>
            <th>Paid</th>
            <th>Balance</th>
            <th>Notes</th>
            <th>Invoice</th>
        </tr>
        <?php 
            $totalpurchase = 0;
            $Totalpaid = 0;
            $totaldue = 0;
            $totalvat = 0;
            $totalfreight = 0;
            $totaldiscount = 0;
            $totalreward = 0;
            $duplicateFlag = 0;


        foreach($record as $record){
            $openingBalance = ($openingBalance + $record['SaleMaster_SubTotalAmount']) - $record['CPayment_amount'];
            $totalpurchase = $totalpurchase +$record['SaleMaster_SubTotalAmount']; 
            $Totalpaid = $Totalpaid +$record['CPayment_amount'];
            //$totaldue = $totaldue+$record['SaleMaster_DueAmount'];
            $totalreward = $totalreward+$record['SaleMaster_RewordDiscount'];
            ?>
        <tr>
            <td><?php echo $record['CPayment_date'] ?></td>
            <td><?php echo $record['CPayment_invoice'] ?></td>
            <td><?php if($record['type']==1){ echo "Retail Sale";}
			if($record['type']==2){ echo "Whole Sale";}
			if($record['type']==3){ echo "Installment Sale";}
			 ?></td>

            <td style="text-align: right;">
                <?php
                    if($record['CPayment_invoice'] == $record['SaleMaster_InvoiceNo'] and $record['CPayment_Paymentby'] == 'By Cash'){
                        echo '';
                        $openingBalance = $openingBalance - $record['SaleMaster_SubTotalAmount'];
                        $totalpurchase = $totalpurchase - $record['SaleMaster_SubTotalAmount'];
                    }else{
                        echo number_format($record['SaleMaster_SubTotalAmount'], 2);
                    }

                ?>
            </td>

            <td style="text-align: right;"><?php echo number_format($record['CPayment_amount'], 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($openingBalance, 2); ?></td>
            <td><?php echo $record['SaleMaster_Description'] ?></td>
            <td><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/sales_record_print/<?php echo $record['SaleMaster_SlNo'];?>', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></td>

        </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td><strong>Total</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($Totalpaid, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalpurchase-$Totalpaid, 2); ?></strong></td>
            <td colspan="2"></td>
        </tr>
       
    </table>

</div>