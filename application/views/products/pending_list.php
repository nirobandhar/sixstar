       
        
<div class="content_scroll">
        <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:90%;border-collapse:collapse;">
                <thead>
                    <tr class="header">
                        <th style="width:10%">ID</th>
                        <th style="width:30%">Category</th>
                        <th style="width:30%">Product Name</th>                                                               
                        <th style="width:20%">Quantity</th> 
                        <th style="width:10%">Transfer To</th>                                                              
                    </tr>
                </thead>
            </table>                    
        </div> 
        <div class="clearfix moderntabs" style="width:330px;width:90%;max-height:500px;overflow:auto;">
           
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                <tbody>
                <?php  $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_transfer.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID Left Join tbl_transfer ON tbl_transfer.pro_codes=tbl_product.Product_SlNo where tbl_transfer.from_branch='".$this->brunch."' AND tbl_transfer.status='0' order by tbl_transfer.pro_codes desc");
                while($row = mysql_fetch_array($sql)){ ?>
                    <tr>
                        <td style="width:10%"><?php echo $row['Product_Code']; ?></td>
                        <td style="width:30.5%"><?php echo $row['ProductCategory_Name']; ?></td>
                        <td style="width:30.5%"><?php echo $row['Product_Name']; ?></td>
                        <td style="width:20.5%"><?php echo $row['quantity']; ?></td>
                        <td style="width:20.5%"><?php $tobranch = $row['tobranch_id'];
						 $sqlbr = mysql_query("SELECT * FROM tbl_brunch where brunch_id='".$tobranch."'");
                			$rowbr = mysql_fetch_array($sqlbr);
							echo $rowbr['Brunch_name'];
						 ?></td>
                    </tr>
                <?php } ?> 
                </tbody>    
            </table> 
        </div> 
</div>

