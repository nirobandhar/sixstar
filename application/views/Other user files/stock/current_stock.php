<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">

    <table class="border" cellspacing="0" cellpadding="0" width="70%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/current_stock', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr>
            <td colspan="5" align="center"><h2>Current Stock</h2></td>
        </tr>
        <tr bgcolor="#ccc">
            <th>Product Name</th>
            <th>Qty</th>
            <th>Purchase Unit Price</th>
            <th>Total Price</th>
            <th>Unit</th>
        </tr>
        <?php $totalqty = "";$sellTOTALqty = ""; $subtotal = ""; $gttotalqty = ""; $gttotalpur = "";
		//echo "SELECT tbl_purchaseinventory.*,tbl_product.*,tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo";
        $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*,tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo");
        while($record = mysql_fetch_array($sql)){
            
                $totalprretqty = $record['PurchaseInventory_ReturnQuantity'];
                $totalprdamqty = $record['PurchaseInventory_DamageQuantity'];
                
				$totalprlostqty = $totalprretqty+$totalprdamqty;
                $PID = $record['purchProduct_IDNo'];
				$branchwise = $record['PurchaseDetails_branchID'];
                // Sell qty
                $sqq = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo = '$PID'");
                $or = mysql_fetch_array($sqq);
                $sellTOTALqty = $or['SaleInventory_TotalQuantity'];
               
                $sellTOTALqty = $sellTOTALqty-$or['SaleInventory_DamageQuantity'];
                $totalsaretqty = $or['SaleInventory_ReturnQuantity'];
				//echo "SELECT *, SUM(total_branchqty) as branqty FROM tbl_branchwise_product WHERE pro_codes = '$PID' AND branch_ids='".$branchwise."'";
				$sqltstock = mysql_query("SELECT *, SUM(total_branchqty) as branqty FROM tbl_branchwise_product WHERE pro_codes = '$PID'");
				$roxstock = mysql_fetch_array($sqltstock);
				 $perbranchqty = $roxstock['branqty'];
				
				 $totalqty = ($perbranchqty+$totalsaretqty)-($totalprlostqty+$sellTOTALqty);
                if($totalqty !="0"){
                    $rate = $totalqty*$record['PurchaseDetails_Rate'];
                    $subtotal = $subtotal+$rate;
                ?>
                <tr>
                    <td><?php echo $record['Product_Name'] ?></td>
                    <td><?php echo $totalqty;
					$gttotalqty = $gttotalqty+$totalqty;
					 ?></td>
                    <td><?php echo $record['PurchaseDetails_Rate']; 
					$gttotalpur = $gttotalpur+$record['PurchaseDetails_Rate'];
					?></td>
                    <td><?php echo $rate ?></td>
                    <td><?php if($record['PurchaseDetails_Unit']==""){echo "pcs";} else{echo $record['PurchaseDetails_Unit']; }?></td>
                </tr>
        <?php } }  ?>
        <tr>
            <td><strong>Sub Total:</strong></td>
            <td><strong><?php echo $gttotalqty; ?> Tk</strong></td>
            <td><strong><?php echo $gttotalpur; ?> Tk</strong> </td>
            <td><strong><?php echo $subtotal; ?> Tk</strong></td>
            <td style="border:0px"></td>
        </tr>
       
    </table>
</div>