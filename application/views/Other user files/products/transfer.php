       
        
<div class="content_scroll">
        <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:90%;border-collapse:collapse;">
                <thead>
                    <tr class="header">
                        <th style="width:10%">ID</th>
                        <th style="width:30%">Category</th>
                        <th style="width:30%">Product Name</th>                                                               
                        <th style="width:20%">Quantity</th>                                                               
                        <th style="width:10%">Action</th>                                                               
                    </tr>
                </thead>
            </table>                    
        </div> 
        <div class="clearfix moderntabs" style="width:330px;width:90%;max-height:500px;overflow:auto;">
           
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                <tbody>
                <?php $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_branchwise_product.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID Left Join tbl_branchwise_product ON tbl_branchwise_product.pro_codes=tbl_product.Product_SlNo where tbl_branchwise_product.branch_ids ='".$this->brunch."' order by tbl_branchwise_product.pro_codes desc");
                while($row = mysql_fetch_array($sql)){ ?>
                    <tr>
                        <td style="width:10%"><?php echo $row['Product_Code'] ?></td>
                        <td style="width:30.5%"><?php echo $row['ProductCategory_Name'] ?></td>
                        <td style="width:30.5%"><?php echo $row['Product_Name'] ?></td>
                        <td style="width:20.5%"><?php echo $row['total_branchqty'] ?></td>
                        <td style="width:10%">
                            <a class="btn-add fancybox fancybox.ajax" style="cursor:pointer;color:green;font-size:17px;float:left" href="<?php echo base_url();?>Administrator/products/ptransfer?pid=<?php echo $row['Product_SlNo']; ?>&tqty=<?php echo $row['total_branchqty'];?>">
                                          Transfer                      
                                    </a> 
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>    
            </table> 
        </div> 
</div>

