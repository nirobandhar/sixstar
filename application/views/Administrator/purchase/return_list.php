<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">
<h1 align="center">Purchase Return List</h1>
    <table class="border" cellspacing="0" cellpadding="0" width="80%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/purchase_returnlist', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#ccc" style="background:#89B03E !important;">
            <th>Date</th>
            <th>Invoice No.</th>
            <th>Supplier Code</th>
            <th>Supplier Name</th>
            <th>Product Name</th>
            <th>Purchase Price</th>
            <th>Return Qty</th>
            <th>Return Amount</th>
            <th>Notes</th>
        </tr>
        <?php
        $totalpurchase = 0;
        $total = 0;
		$totalqty = 0;
            $sql = mysql_query("SELECT tbl_purchasereturn.*,tbl_purchasemaster.*,tbl_supplier.* FROM tbl_purchasereturn left join tbl_purchasemaster on tbl_purchasemaster.PurchaseMaster_InvoiceNo=tbl_purchasereturn.PurchaseMaster_InvoiceNo left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo Where tbl_purchasereturn.PurchaseReturn_brunchID='".$this->brunch."'");
            while($record = mysql_fetch_array($sql)){
                $total = $total+$record['PurchaseReturn_ReturnAmount'];
				$totalqty =$totalqty +$record['PurchaseReturn_ReturnQuantity'];
				$sqlpr = mysql_query("SELECT tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo,tbl_product.Product_Name,tbl_product.Product_Purchase_Rate FROM tbl_product Left Join tbl_purchasereturndetails ON tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo=tbl_product.Product_SlNo Where tbl_purchasereturndetails.PurchaseReturn_SlNo='".$record['PurchaseReturn_SlNo']."'");
             $recordpr = mysql_fetch_array($sqlpr);
             $totalpurchase = $totalpurchase + $recordpr['Product_Purchase_Rate'];
            ?>
        <tr>
            <td><?php echo $record['PurchaseReturn_ReturnDate'] ?></td>
            <td><?php echo $record['PurchaseMaster_InvoiceNo'] ?></td>
            <td><?php echo $record['Supplier_Code'] ?></td>
            <td><?php echo $record['Supplier_Name'] ?></td>
            <td><?php echo $recordpr['Product_Name'];?></td>
            <td style="text-align: right;"><?php echo number_format($recordpr['Product_Purchase_Rate'], 2);?></td>
            <td style="text-align: center;"><?php echo $record['PurchaseReturn_ReturnQuantity'] ?></td>
            <td style="text-align: right;"><?php echo number_format($record['PurchaseReturn_ReturnAmount'], 2); ?></td>
            <td><?php echo $record['PurchaseReturn_Description'] ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="5" align="right"><strong>Total </strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
            <td style="text-align: center;"><strong><?php echo $totalqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($total, 2); ?></strong></td>
            <td></td>
        </tr>
       
    </table>
   

</div>