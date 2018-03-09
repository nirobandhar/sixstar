<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

<div class="content_scroll" style="padding:120px 20px 25px 160px">

<h2>Sales Stock</h2>

    <table class="border" cellspacing="0" cellpadding="0" width="80%">



        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/sales_stock', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr bgcolor="#89B03E" style="background:#89B03E;">


            <th>ID</th>
            <th>Product Name</th>
            <th>Model</th>
            <th>Unit</th>
            <th>Sales Qty</th>
            <th>Rate</th>
            <th>Sales Amount</th>
            <th>Return Qty</th>
            <th>Return Amount</th>





        </tr>

        <?php
        $salesqty = 0;
        $salesamount = 0;
        $returnqty = 0;
        $returnamount = 0;
        $prate=0;

        $sql = mysql_query("SELECT tbl_saleinventory.*,tbl_product.*,tbl_unit.*,tbl_productcategory.* FROM tbl_saleinventory left join tbl_product on tbl_product.Product_SlNo= tbl_saleinventory.sellProduct_IdNo left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID");

        while($record = mysql_fetch_array($sql)){

            if($record['SaleInventory_packname']==""){
                $salesqty += $record['SaleInventory_TotalQuantity'];
                $prate += $record['Product_SellingPrice'];
                $salesamount += ($record['SaleInventory_TotalQuantity']*$record['Product_SellingPrice']);
                $returnqty += $record['SaleInventory_ReturnQuantity'];
                $returnamount += ($record['SaleInventory_ReturnQuantity']*$record['Product_SellingPrice']);

        ?>

        <tr>


            <td><?php echo $record['Product_Code']; ?></td>
            <td><?php echo $record['Product_Name']; ?></td>
            <td><?php echo $record['ProductCategory_Name']; ?></td>
            <td><?php echo $record['Unit_Name']; ?></td>
            <td style="text-align: center;"><?php echo $record['SaleInventory_TotalQuantity']; ?></td>
            <td style="text-align: right;"><?php echo number_format($record['Product_SellingPrice'], 2); ?></td>
            <td style="text-align: right;"><?php echo number_format(($record['SaleInventory_TotalQuantity']*$record['Product_SellingPrice']), 2); ?></td>
            <td style="text-align: center;"><?php echo $record['SaleInventory_ReturnQuantity']; ?></td>
            <td style="text-align: right;"><?php echo number_format(($record['SaleInventory_ReturnQuantity']*$record['Product_SellingPrice']), 2); ?></td>




        </tr>

        <?php }}?>
        <tr>
            <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
            <td style="text-align: center;"><strong><?php echo $salesqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($prate, 2); ?></td>
            <td style="text-align: right;"><strong><?php echo number_format($salesamount, 2); ?></strong></td>
            <td style="text-align: center;"><strong><?php echo $returnqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($returnamount, 2); ?></strong></td>
        </tr>


    </table>

</div>