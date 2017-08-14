<span id="ProductsResult">
<div class="content_scroll">
    <div id="page_menu" class="page_menu">
        <ul>
            <li class="active"><a href="damage_entry.php">Damage Entry</a></li>
        </ul>
    </div>
    <div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
            <div id="tabs-1">
                <div class="middle_form">
                    <h2 id="ctl00_ctl00_content_content_h2">Damage Entry</h2>
                    <div class="body">
                        <div class="full clearfix">
                            <span>Damage ID</span>
                            <div class="left">                                    
                                <input type="text" class="required" disabled="" value="<?php $serial ="D1000"; $sql = mysql_query("SELECT * FROM tbl_damage");
                                    while ($d = mysql_fetch_array($sql)){
                                        if($d['Damage_InvoiceNo']!=null){$serial = $d['Damage_InvoiceNo'];}
                                    } $serial = explode("D",$serial);
                                        $serial=$serial['1']; $autoserial= $serial+1;echo "D".$autoserial;?>" />
                                <input type="hidden" id="damage_id" class="required" value="<?php $serial ="D1000"; $sql = mysql_query("SELECT * FROM tbl_damage");
                                    while ($d = mysql_fetch_array($sql)){
                                        if($d['Damage_InvoiceNo']!=null){$serial = $d['Damage_InvoiceNo'];}
                                    } $serial = explode("D",$serial);
                                        $serial=$serial['1']; $autoserial= $serial+1;echo "D".$autoserial;?>" />
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Product Name</span>
                            <div class="left">    
                                <select id="prod_id" class="required" style="width:174px" onchange="Products_select()">
                                    <option value="" selected=""></option>
                                        <?php $sql = mysql_query("SELECT * from tbl_product order by Product_Code asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                    <option value="<?php echo $row['Product_SlNo'] ?>"><?php echo $row['Product_Name']." (".$row['Product_Code'].")"; ?></option>
                                        <?php } ?>
                                </select>                                
                            </div>
                        </div>                                                                 
                    	<div class="full clearfix">
                            <span>Damage Quantity</span>
                            <div class="left">                                      
                                <input name="damage_quantity" type="text" id="damage_quantity" class="txt" placeholder="0" onkeyup="calamount()"/>
                            </div>
                        </div>
                           <div id="unitname" class="body">                                      
                               <div class="full clearfix">
                            <span>Unit Price</span>
                            <div class="left">                                      
                                <input name="unitpr" type="text" id="unitpr" class="txt" placeholder="0"/>
                            </div>
                            
                               
                           </div>
                          </div>
                         <div class="full clearfix">
                            <span>Total Amount</span>
                            <div class="left">                                      
                                <input name="tamount" type="text" id="tamount" class="txt" placeholder="0"/>
                            </div>
                        </div>                                                                                                                                                     
                        <div class="full clearfix">
                            <span>Description</span>
                            <div class="left"> 
                            <textarea name="desc" id="desc" class="required" placeholder="" autofocus="" cols="50" rows="3"></textarea>                                     
                            </div>
                        </div> 
                        <div class="full clearfix">
                            <span></span>
                           <div class="right" style="float:right;">
                                <input type="button" onclick="DamageProducts()" value="Add" class="button" style="margin-left:40px"/>
                            </div>   
                        </div>               
                    </div>
                </div>
       
            </div>
        </div>
    </div>

    <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:60%;border-collapse:collapse;">
            <thead>
                <tr class="header">
                    <th style="width:10%">Product Name</th>
                    <th style="width:10%">Damage Quantity</th>
                    <th style="width:10%">Unit</th>
                    <th style="width:10%">Unit Price</th>
                    <th style="width:10%">Total Amount</th>
                    <th style="width:10%">Description</th>                                                               
                </tr>
            </thead>
        </table>                    
    </div>                
    <div class="row_section clearfix" style="height:300px;overflow:auto;">
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:60%;border-collapse:collapse;">
            <tbody>
            <?php $sql = mysql_query("SELECT tbl_damage.*,tbl_damagedetails.*,tbl_product.*, tbl_unit.* FROM tbl_damage left join tbl_damagedetails on tbl_damagedetails.Damage_SlNo = tbl_damage.Damage_SlNo left join tbl_product on tbl_product.Product_SlNo= tbl_damagedetails.Product_SlNo left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID ORDER BY tbl_damage.Damage_InvoiceNo DESC");
                while($row = mysql_fetch_array($sql)){ ?>
                <tr>
                    <td style="width:10%"><?php echo $row['Product_Name'] ?></td>
                    <td style="width:10%"><?php echo $row['DamageDetails_DamageQuantity'] ?></td>
                    <td style="width:10%"><?php echo $row['Unit_Name'] ?></td>
                    <td style="width:10%"><?php echo $row['Product_Purchase_Rate'] ?></td>
                    <td style="width:10%"><?php echo $row['Product_Purchase_Rate']*$row['DamageDetails_DamageQuantity']; ?></td>
                    <td style="width:10%"><?php echo $row['Damage_Description'] ?></td>
                </tr>
            <?php } ?>                                                                                                                                                                                                                                                                                                                                                                                        
            </tbody>
        </table>
    </div>              
</div>
</div>
</span>
<script type="text/javascript">
function calamount(){
	var qty = $("#damage_quantity").val();
	var ProductRATE = $("#unitpr").val();
	if(qty!='' || qty>0){
		 total = parseFloat(qty) * parseFloat(ProductRATE);
		 $("#tamount").val(total);
		}
	}
    function Products_select()   {
        var prod_id = $("#prod_id").val();
        var inputdata = 'prod_id='+prod_id;
        var urldata = "<?php echo base_url();?>purchase/damage_select_product";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#unitname").html(data);
            }
        });
        
    }
    function DamageProducts()   {
        var damage_id = $("#damage_id").val();
        var prod_id = $("#prod_id").val();
        var damage_quantity = $("#damage_quantity").val();
        var desc = $("#desc").val();
        var unit_name = $("#unit_name").val();

        var inputdata = 'damage_id='+damage_id+'&prod_id='+prod_id+'&damage_quantity='+damage_quantity+'&desc='+desc+'&unit_name='+unit_name;
        var urldata = "<?php echo base_url();?>purchase/damage_product_insert";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#ProductsResult").html(data);
            }
        });
        
    }
</script>
