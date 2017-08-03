<div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
            <div id="tabs-1">
                <div class="middle_form">
                    <h2>Add Product</h2>
                    <div class="body">
                        <div class="full clearfix">
                            <span>Product Id</span>
                            <div class="left">                                    
                                <input name="Emp_id" type="text" id="Empr_id" class="required" disabled="" value="<?php   $serial ="P1000"; $sql = mysql_query("SELECT * FROM tbl_product");
                                while ($d = mysql_fetch_array($sql)){
                                    if($d['Product_Code']!=null){$serial = $d['Product_Code'];}
                                } $serial = explode("P",$serial);
                                    $serial=$serial['1']; $autoserial= $serial+1;echo "P".$autoserial;?>" />
                                    <input name="Product_id" type="hidden" id="Product_id" class="required" value="<?php   $serial ="P1000"; $sql = mysql_query("SELECT * FROM tbl_product");
                                while ($d = mysql_fetch_array($sql)){
                                    if($d['Product_Code']!=null){$serial = $d['Product_Code'];}
                                } $serial = explode("P",$serial);
                                    $serial=$serial['1']; $autoserial= $serial+1;echo "P".$autoserial;?>" />
                            </div>
                        </div>                                
                       
                        <div class="full clearfix">
                            <span>Model</span>
                            <div class="left">                                      
                              <div id="Search_Results_category">
                                    <select name="pCategory" id="pCategory" style="width:163px;" required>
                                        <option value="">Select</option>
                                         <?php $sql = mysql_query("SELECT * FROM tbl_productcategory order by ProductCategory_Name asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                        <option value="<?php echo $row['ProductCategory_SlNo'] ?>"><?php echo $row['ProductCategory_Name'] ?></option>
                                        <?php } ?>
                                    </select>  
                                </div>               
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/products/fanceybox_category">
                                <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                
                                </a> 
                            </div>
                            <div id="pCategory_"></div>
                        </div>
                        <div class="full clearfix">
                            <span>Size</span>
                            <div class="left">                                      
                              <div id="Search_Results_size">
                                    <select name="psize" id="psize" style="width:163px;" required>
                                        <option value="">Select</option>
                                         <?php $sql = mysql_query("SELECT * FROM tbl_produsize order by Productsize_Name asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                        <option value="<?php echo $row['Productsize_SlNo'] ?>"><?php echo $row['Productsize_Name'] ?></option>
                                        <?php } ?>
                                    </select>  
                                </div>               
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/products/fanceybox_size">
                                <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                
                                </a> 
                            </div>
                            <div id="psize_"></div>
                        </div>
                        <div class="full clearfix">
                            <span>Name</span>
                            <div class="left">                                    
                                <input name="pro_Name" type="text" id="pro_Name" class="required" required/>
                                <span id="pro_Name_"></span>
                            </div>
                        </div>
                         <div class="full clearfix">
                            <span>Re-Order Level</span>
                            <div class="left">                                    
                                <input name="Re_Order" type="text" id="Re_Order" value="0" class="required" />
                                <input id="product_check" type="hidden" value="Product" checked name="product_check" />
                                <span id="Re_Order_"></span>
                            </div>
                        </div>                                                
                    </div>
                   
                </div>
                <div class="right_form">
                    <div class="body">
                        
                       
                        <div class="full clearfix">
                            <span>Purchase Rate</span>
                            <input name="Purchase_rate" type="text" id="Purchase_rate" value="0" class="txt" required/>
                            <span id="Purchase_rate_"></span>
                        </div>
                        <div class="full clearfix">
                            <span>Wholesales Rate</span>
                            <input name="wholesale_rate" type="text" id="wholesale_rate" value="0" class="txt" required/>
                            <span id="wholesale_rate_"></span>
                        </div> 
                        <div class="full clearfix">
                            <span>Retail Rate</span>
                            <input name="sell_rate" type="text" id="sell_rate" value="0" class="txt" required/>
                            <span id="sell_rate_"></span>
                        </div> 
                        <div class="full clearfix">
                            <span>Installment Rate</span>
                            <input name="Installment_rate" type="text" id="Installment_rate" value="0" class="txt" required/>
                            <span id="installment_rate_"></span>
                        </div> 
                        <div class="full clearfix">
                            <span>Unit</span>
                            <div class="left">                                      
                                <div id="Search_Results">
                                    <select name="product_unit" id="product_unit" style="width:200px;" required>
                                        <option value="">Select</option>
                                        <?php $sql = mysql_query("SELECT * FROM tbl_unit order by Unit_Name asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                        <option value="<?php echo $row['Unit_SlNo'] ?>"><?php echo $row['Unit_Name'] ?></option>
                                        <?php } ?>
                                    </select>  
                                </div>               
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/products/fanceybox_unit">
                                    <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                
                                </a> 
                            </div>
                            <div id="product_unit_"></div>
                        </div>
                        <div class="full clearfix">
                            <span></span>
                            <input type="button" onclick="submit()" name="btnSubmit" value="Save"  title="Save" class="button" />
                        </div> 
                                                                                                                                                                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full clearfix" style="float:right;margin-right:10%">
        <input type="text" id="Searchkey" placeholder="Search Products" required class="txt" onkeypress="productSearch(event)" style="border: 1px solid #c8d3df;
  border-radius: 2px;
  padding: 7px !important;" />
    </div><br>
    <div class="clearfix moderntabs" style="width:330px;width:100%;max-height:500px;overflow:scroll;">
       
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:97%;border-collapse:collapse;">
            <thead>
                <tr class="header">
                    <th style="width:10%">ID</th>
                    <th style="width:15%">Model</th>
                    <th style="width:10%">Size</th>
                    <th style="width:15%">Product Name</th>
                    <th style="width:8%">Purchase Rate</th>
                    <th style="width:8%">Wholesale Rate</th>                                   
                    <th style="width:10%">Retail Rate</th>
                    <th style="width:12%">Installment Rate</th>                       
                    <th style="width:12%">Action</th>                                                                 
                </tr>
            </thead>
            <tbody>
            <?php $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_produsize.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID left join tbl_produsize on tbl_produsize.Productsize_SlNo= tbl_product.sizeId order by tbl_product.Product_Code desc");
            while($row = mysql_fetch_array($sql)){ ?>
                <tr>
                    <td style="width:10%"><?php echo $row['Product_Code'] ?></td>
                    <td style="width:15%"><?php echo $row['ProductCategory_Name'] ?></td>
                    <td style="width:10%"><?php echo $row['Productsize_Name'] ?></td>
                    <td style="width:15%"><?php echo $row['Product_Name'] ?></td>
                    <td style="width:8%"><?php echo $row['Product_Purchase_Rate'] ?></td>
                    <td style="width:8%"><?php echo $row['Product_WholesaleRate'] ?></td>
                    <td style="width:10%"><?php echo $row['Product_SellingPrice'] ?></td>
                    <td style="width:12%"><?php echo $row['Product_InstallmentRate'] ?></td>
                    <td style="width:12%">
                        <span onclick="Edit_product(<?php echo $row['Product_SlNo'] ?>)" style="cursor:pointer;color:green;font-size:20px;float:left; margin-right:20px;"><i class="fa fa-pencil"></i></span>
                        <span  onclick="deleted(<?php echo $row['Product_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px" ><i class="fa fa-trash-o"></i></span>
                        <span style="cursor:pointer;color:red;font-size:20px;float:left;padding:5px" >
                            <a title="Generate Barcode" href="<?php echo base_url()?>Administrator/products/generatebarcode?ID=<?php echo $row['Product_SlNo']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-barcode"></i></a>
                        </span>
                    </td>
                </tr>
            <?php } ?> 
            </tbody>    
        </table> 
    </div>