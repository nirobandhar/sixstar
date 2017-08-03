<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">
<h2>Purchase Stock</h2>

    <table class="border" cellspacing="0" cellpadding="0" width="70%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/purchase_stock', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#89B03E" style="background:#89B03E;">
            <th>Category</th>
            <th>ID</th>
            <th>Product Name</th>
            <th>Purchase Qty</th>
            <th>Return Qty</th>
            <th>Ret. Amount</th>
            <th>Damage Qty</th>
            <th>Dmg. Amount</th>
            <th>Rate</th>
            <th>Unit</th>
            <th>Purchase Amount</th>
        </tr>
        <?php 
        $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*,tbl_unit.*,tbl_productcategory.* FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo= tbl_purchaseinventory.purchProduct_IDNo left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID");
        while($record = mysql_fetch_array($sql)){
            if($record['PurchaseInventory_packname']==""){?>
        <tr>
					<td><?php echo $record['ProductCategory_Name'] ?></td>
                    <td><?php echo $record['Product_Code'] ?></td>
                    <td><?php echo $record['Product_Name'] ?></td>
                    <td><?php echo $record['PurchaseInventory_TotalQuantity'] ?></td>
                    <td><?php echo $record['PurchaseInventory_ReturnQuantity'] ?></td>
            		<td><?php echo $record['PurchaseInventory_ReturnQuantity']*$record['Product_Purchase_Rate']; ?></td>
                    <td><?php echo $record['PurchaseInventory_DamageQuantity'] ?></td>
            		<td><?php echo $record['PurchaseInventory_DamageQuantity']*$record['Product_Purchase_Rate']; ?></td>
                    <td><?php echo $record['Product_Purchase_Rate'] ?></td>
                    <td><?php echo $record['Unit_Name'] ?></td>
                    <td><?php echo $record['Product_Purchase_Rate']*$record['PurchaseInventory_TotalQuantity']; ?></td>        
                    </tr>
        <?php }}?>
       
    </table>
</div>