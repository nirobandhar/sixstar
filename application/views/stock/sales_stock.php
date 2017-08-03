<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

<div class="content_scroll" style="padding:120px 20px 25px 160px">
<h2>Sales Stock</h2>



    <table class="border" cellspacing="0" cellpadding="0" width="70%">



        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/sales_stock', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr bgcolor="#89B03E" style="background:#89B03E;">
            <th>Category</th>
            <th>ID</th>
            <th>Product Name</th>
            <th>Sales Qty</th>
            <th>Return Qty</th>
            <th>Ret. Amount</th>
            <th>Damage Qty</th>
            <th>Ret. Amount</th>
            <th>Unit</th>
            <th>Purchase Amount</th>

        </tr>

        <?php 

        $sql = mysql_query("SELECT tbl_saleinventory.*,tbl_product.*,tbl_unit.*,tbl_productcategory.* FROM tbl_saleinventory left join tbl_product on tbl_product.Product_SlNo= tbl_saleinventory.sellProduct_IdNo left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID");

        while($record = mysql_fetch_array($sql)){

            if($record['SaleInventory_packname']==""){?>

        <tr>
            <td><?php echo $record['ProductCategory_Name']; ?></td>
            <td><?php echo $record['Product_Code']; ?></td>
            <td><?php echo $record['Product_Name']; ?></td>
            <td><?php echo $record['SaleInventory_TotalQuantity']; ?></td>
            <td><?php echo $record['SaleInventory_ReturnQuantity']; ?></td>
            <td><?php echo $record['SaleInventory_ReturnQuantity']*$record['Product_SellingPrice']; ?></td>
            <td><?php echo $record['SaleInventory_DamageQuantity']; ?></td>
            <td><?php echo $record['SaleInventory_DamageQuantity']*$record['Product_SellingPrice']; ?></td>
            <td><?php echo $record['Unit_Name']; ?></td>
            <td><?php echo $record['SaleInventory_TotalQuantity']*$record['Product_SellingPrice']; ?></td>

        </tr>

        <?php }}?>

       

    </table>

</div>