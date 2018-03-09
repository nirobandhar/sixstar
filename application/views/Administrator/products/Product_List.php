<<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">

    <table class="border" cellspacing="0" cellpadding="0" width="70%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/Product_List', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <thead>
        <tr>
            <td colspan="10" align="center"><h2>Products List</h2></td>
        </tr>
        <tr bgcolor="#ccc">
            <th style="width: 5%">Sl No.</th>
            <th style="width:5%">ID</th>
            <th style="width:15%">Company</th>
            <th style="width:15%">Product Name</th>
            <th style="width:15%">Model</th>
            <th style="width:10%">Size</th>
            <th style="width: 10%">DP</th>
            <!--<th style="width:8%">Purchase Rate</th>-->
            <th style="width:10%">Wholesale Rate</th>
            <th style="width:10%">Retail Rate</th>
            <!--<th style="width:12%">Installment Rate</th>-->
            <!--<th style="width:15%">Action</th>-->
        </tr>
        </thead>
        <tbody>
        <?php $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_produsize.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID left join tbl_produsize on tbl_produsize.Productsize_SlNo= tbl_product.sizeId order by company asc");
        $i=0;
        while($row = mysql_fetch_array($sql)){
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td style="width:5%"><?php echo $row['Product_Code'] ?></td>
                <td style="width:8%"><?php echo $row['company'] ?></td>
                <td style="width:15%"><?php echo $row['Product_Name'] ?></td>
                <td style="width:15%"><?php echo $row['ProductCategory_Name'] ?></td>
                <td style="width:10%"><?php echo $row['Productsize_Name'] ?></td>
                <td style="width: 10%"></td>
                <!--<td style="width:8%"><?php /*echo $row['Product_Purchase_Rate'] */?></td>-->
                <td style="width:8%"><?php echo $row['Product_WholesaleRate'] ?></td>
                <td style="width:10%"><?php echo $row['Product_SellingPrice'] ?></td>
                <!--<td style="width:12%"><?php /*echo $row['Product_InstallmentRate'] */?></td>-->
                <!--<td style="width:15%">
                    <span onclick="Edit_product(<?php /*echo $row['Product_SlNo'] */?>)" style="cursor:pointer;color:green;font-size:20px;float:left; margin:5px;"><i class="fa fa-pencil"></i></span>
                    <span  onclick="deleted(<?php /*echo $row['Product_SlNo'] */?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding:5px" ><i class="fa fa-trash-o"></i></span>
                    <span style="cursor:pointer;color:red;font-size:20px;float:left;padding:5px" >
                            <a title="Generate Barcode" href="<?php /*echo base_url()*/?>Administrator/products/generatebarcode?ID=<?php /*echo $row['Product_SlNo']; */?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-barcode"></i></a>
                        </span>
                </td>-->
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>