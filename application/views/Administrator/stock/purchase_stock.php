<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">
<h2>Purchase Stock</h2>
    <table class="border" cellspacing="0" cellpadding="0" width="80%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/purchase_stock', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#89B03E" style="background:#89B03E;">
            
            <th>ID</th>
            <th>Product Name</th>
            <th>Model</th>
            <th>Purchase Qty</th>
            <th>Purchase Amount</th>
            <th>Return Qty</th>
            <th>Ret. Amount</th>
            <th>Damage Qty</th>
            <th>Dmg. Amount</th>
            <th>Rate</th>
            <th>Unit</th>
            
        </tr>
        <?php 
        $purqty = 0;
        $puramount = 0;
        $returnqty = 0;
        $returnamount = 0;
        $damageqty = 0;
        $damageamount = 0;
        $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*,tbl_unit.*,tbl_productcategory.* FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo= tbl_purchaseinventory.purchProduct_IDNo left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID");
        while($record = mysql_fetch_array($sql)){
            if($record['PurchaseInventory_packname']==""){
             $purqty += $record['PurchaseInventory_TotalQuantity'];
             $puramount += ($record['Product_Purchase_Rate']*$record['PurchaseInventory_TotalQuantity']);
             $returnqty += $record['PurchaseInventory_ReturnQuantity'];
             $returnamount += ($record['PurchaseInventory_ReturnQuantity']*$record['Product_Purchase_Rate']);
             $damageqty += $record['PurchaseInventory_DamageQuantity'];
             $damageamount += ($record['PurchaseInventory_DamageQuantity']*$record['Product_Purchase_Rate']);
 
    ?>
        <tr>
            
            <td style="text-align: center;"><?php echo $record['Product_Code'] ?></td>
            <td><?php echo $record['Product_Name'] ?></td>
            <td><?php echo $record['ProductCategory_Name'] ?></td>
            <td style="text-align: center;"><?php echo $record['PurchaseInventory_TotalQuantity'] ?></td>
            <td style="text-align: right;"><?php echo number_format(($record['Product_Purchase_Rate']*$record['PurchaseInventory_TotalQuantity']), 2); ?></td>
            <td style="text-align: center;"><?php echo $record['PurchaseInventory_ReturnQuantity'] ?></td>
            <td style="text-align: right;"><?php echo number_format(($record['PurchaseInventory_ReturnQuantity']*$record['Product_Purchase_Rate']), 2); ?></td>
            <td style="text-align: center;"><?php echo $record['PurchaseInventory_DamageQuantity'] ?></td>
            <td style="text-align: right;"><?php echo number_format(($record['PurchaseInventory_DamageQuantity']*$record['Product_Purchase_Rate']), 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($record['Product_Purchase_Rate'], 2); ?></td>
            <td><?php echo $record['Unit_Name'] ?></td>
            
        </tr>
        <?php }}?>

        <tr>
            <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
            <td style="text-align: center;"><strong><?php echo $purqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($puramount, 2); ?></strong></td>
            <td style="text-align: center;"><strong><?php echo $returnqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($returnamount, 2); ?></strong></td>
            <td style="text-align: center;"><strong><?php echo $damageqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($damageamount, 2); ?></strong></td>
            <td><strong></strong></td>
            <td><strong></strong></td>
        </tr>
       
    </table>
</div>