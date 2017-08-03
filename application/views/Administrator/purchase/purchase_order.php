<div id="AllRefresh">
<div class="content_scroll">
<h2>Product Purchase</h2>
    <div style="width:78%; float:left;">
        <div style="border:1px solid #ddd">
            <table width="100%"> 
                <tr>
                    <td>Invoice no</td>
                    <td>
                    <div class="full clearfix">
                        <input type="text" class="inputclass" disabled="" style="width:170px" value="<?php $serial =date("Y-m-d").'0001'; $sql = mysql_query("SELECT * FROM tbl_purchasemaster");
                            while ($d = mysql_fetch_array($sql)){
                                if($d['PurchaseMaster_InvoiceNo']!=null){$serial = $d['PurchaseMaster_InvoiceNo'];}
                            } $serial = explode("-",$serial);
                                $serial=$serial['2']; echo date("Y-m-"). $autoserial= $serial+1;?>">
                        <input type="hidden" id="purchInvoice" value="<?php $serial =date("Y-m-d").'0001'; $sql = mysql_query("SELECT * FROM tbl_purchasemaster");
                            while ($d = mysql_fetch_array($sql)){
                                if($d['PurchaseMaster_InvoiceNo']!=null){$serial = $d['PurchaseMaster_InvoiceNo'];}
                            } $serial = explode("-",$serial);
                                $serial=$serial['2']; echo date("Y-m-"). $autoserial= $serial+1;?>">
                    </div></td>
                    <td>User</td>
                    <td>
                    <div class="full clearfix">
                        <input type="text" disabled="" class="inputclass" value="<?php echo $this->session->userdata("FullName"); ?>" style="width:170px">
                        <input type="hidden" id="purchuser" class="inputclass" value="<?php echo $this->session->userdata("FullName"); ?>" style="width:170px">
                    </div></td>
                    <td>Date</td>
                    <td>
                    <div class="full clearfix" id="ashiqeCalender">
                        <input name="Purchase_date" type="text" id="Purchase_date" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:120px"/>
                    </div></td>
                </tr>
            </table>
        </div><br>
        <div style="width:100%; ">
            <table width="100%" > 
                <tr>
                    <td style="border: 1px solid #ddd;"><!-- Customer area -->
                        <table class="purchestable"> 
                            <tr>
                                <td>Supplier ID</td>
                                <td style="width:170px">
                                    <div class="side-by-side clearfix">
                                        <div>
                                              <select id="SupplierID" data-placeholder="Choose a Supplier..." class="chosen-select" style="width:170px;" tabindex="2" onchange="Supplier()">
                                                     <option value=""></option>
                                                    <?php $sql = mysql_query("SELECT * FROM tbl_supplier order by Supplier_Name asc");
                                                    while($row = mysql_fetch_array($sql)){ ?>
                                                    <option value="<?php echo $row['Supplier_SlNo'] ?>"><?php echo $row['Supplier_Name']; ?> -(<?php echo $row['Supplier_Code']; ?>)</option>
                                                    <?php } ?>
                                              </select>
                                        </div>
                                    </div>
                                </td>
                                <td><span id="SupplierResult">
                                    <table>
                                        <tr>
                                            <td>Address</td>
                                            <td style="width:120px">
                                                <div class="full clearfix">
                                                    <input type="text" class="inputclass" disabled="" value="">
                                                </div>
                                            </td>
                                            <td>Contact No.</td>
                                            <td style="width:120px">
                                                <div class="full clearfix">
                                                    <input type="text" class="inputclass" disabled="" value="">
                                                </div>
                                            </td>
                                        </tr>
                                    </table></span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd;"><!-- Product area -->
                        <table class="purchestable"> 
                            <tr>
                                <td>Product ID</td>
                                <td style="width:150px">
                                    <div class="side-by-side clearfix">
                                        <div>
                                              <select id="ProID" data-placeholder="Choose a Product..." class="chosen-select" style="width:220px;" tabindex="2" onchange="Products()">
                                                     <option value=""></option>
                                                    <?php $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID order by tbl_product.Product_Code asc");
                                                    while($row = mysql_fetch_array($sql)){ 
                                                        $proname = $row['Product_Name'];?>
                                                    <option value="<?php echo $row['Product_SlNo'] ?>"><?php echo $row['Product_Code']." "; ?>_<?php echo $row['ProductCategory_Name']." "; ?>_<?php echo $row['Product_Name']; ?> </option>
                                                    <?php } ?>
                                              </select>
                                        </div>
                                    </div>
                                </td>

                                <td id="ProductsResult">
                                    <table>
                                        <tr>
                                            <td> Name </td>
                                                <td style="width:150px">
                                                    <div class="full clearfix" >
                                                        <input type="text" id="productName" disabled="" class="inputclass">
                                                    </div>
                                                </td>
                                                <td> Quantity </td>
                                                <td style="width:80px"><div class="full clearfix"><input type="text" id="PurchaseQTY" name="PurchaseQTY" value="" selected="1" class="inputclass" placeholder="0" onkeyup="calamount()"></div></td>

                                                <td> Rate </td>
                                                <td style="width:100px">
                                                    <div class="full clearfix">
                                                        <input type="text" id="ProductRATE" class="inputclass" onkeyup="calamount2()">
                                                    </div>
                                                </td>
                                                <td>Amount </td>
                                                <td style="width:100px">
                                                    <div class="full clearfix">
                                                        <input type="text" id="totalant" class="inputclass">
                                                    </div>
                                                </td>
                                                 <td style="width:80px;padding-left:20px">
                                                    <input class="buttonAshiqe" type="button" onclick="AddToPurchaseCart()" value="Add Cart">
                                                </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd;"><!-- Product area -->
                        <table class="purchestable"> 
                          
                            <tr>
                             <?php $k=0;
    							$sqlbr = mysql_query("SELECT * FROM tbl_brunch Order By brunch_id Asc");
    							while($rowbr = mysql_fetch_array($sqlbr)){
								$k++;
		 						?>
                                <td style="float:left;"><div class="full clearfix"><?php echo $rowbr['Brunch_name'];?><input name="<?php echo $rowbr['Brunch_name'];?>" class="test" type="checkbox" value="<?php echo $k;?>" id="godown<?php echo $k;?>" <?php if($k == 1){echo 'checked';} ?> /><input name="geti" id="chkb<?php echo $k;?>" type="hidden" value="<?php echo $rowbr['brunch_id'];?>" /></div></td>
                                <td id="quantibox<?php echo $k;?>" style="float:left; display:none;"><input type="text" id="quantg<?php echo $k;?>" class="inputclass" width="100px;"></td>
                             <?php } ?>
                            </tr>
                          
                            
                        </table>
                    </td>
                </tr>
            </table>
                <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
                    <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:100%;border-collapse:collapse;">
                        <thead>
                            <tr class="header">
                                <th style="width:2%"></th>
                                <th style="width:20%">Model</th>
                                <th style="width:20%">Product Name</th>
                                <th style="width:10%">Unit</th>
                                <th style="width:10%">Rate</th>
                                <th style="width:10%">Qty</th>
                                <th style="width:10%">Total Amount</th>
                                <th style="width:10%"></th>                                                      
                            </tr>
                        </thead>
                    </table>                    
                </div> 
            <span id="ShowcarTProduct">
                <div class="clearfix moderntabs" style="width:330px;width:100%;max-height:150px;min-height:150px;overflow:auto;">
                        
                        <?php  if ($cart = $this->cart->contents()): ?>
                        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                            <tbody>
                            <?php
                                //echo form_open('shopping/update_cart');packagecode
                                $grand_total = 0;
                                $count = "";
                                $i = 1;
                                foreach ($cart as $item):
                                    $count++;
                                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                    echo form_hidden('cart[' . $item['id'] . '][purchaserate]', $item['purchaserate']);
                                    echo form_hidden('cart[' . $item['id'] . '][model]', $item['model']);
									echo form_hidden('cart[' . $item['id'] . '][gqty]', $item['gqty']);
                                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                    echo form_hidden('cart[' . $item['id'] . '][image]', $item['image']); 
                            ?> 
                                <tr>

                                    <td style="width:2%"> <input name="proID[]" type="hidden" value="<?php echo $item['id']; ?>"></td>
                                    <td style="width:20%"><?php echo $item['name']; ?></td>
                                    <td style="width:20%"><?php echo $item['model']; ?></td>
                                    <td style="width:10%"><?php echo $item['image']; ?></td>
                                    <td style="width:10%"><?php echo $item['price']; ?>
                                    </td>
                                    <td style="width:10%"><?php echo $item['qty']; ?></td>
                                    <td style="width:10%"><?php $grand_total = $grand_total + $item['subtotal']; ?> <?php echo number_format($item['subtotal'], 2) ?>
                                    <input type="hidden" id="PriCe_<?php echo $item['rowid'];?>" value="<?php echo $item['subtotal'];?>"></td>
                                    <td style="width:10%">
                                        <span style="cursor:pointer" onclick="cartRemove(a='<?php echo $item['rowid'];?>')">
                                        <input type="hidden" id="rowid<?php echo $item['rowid'];?>" value="<?php echo $item['rowid'];?>">
                                        <img src='<?php echo base_url();?>images/cart_cross.jpg' width='20px' height='15px'></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>    
                        </table> 
                        <?php endif; ?>
                </div>
                <table width="100%">
                    <tr>
                        <td width="40%" >
                            <fieldset style="height:65px">
                                <legend>Notes</legend>
                                 <textarea name="PurchNotes" id="PurchNotes" rows="3" style="width:100%"></textarea>
                            </fieldset>
                        </td>
                        <td width="60%">
                            <fieldset style="height:65px">
                                <legend>Total</legend>
                                <h2>
                                    <span>Total</span>
                                    <div style="float:right">
                                        <span style="color:red"><?php if(isset($grand_total)) {echo $grand_total;}else{echo 0;} ?></span>
                                        <span>tk</span>
                                    </div>
                                </h2>
                            </fieldset>
                        </td>

                    </tr>
                </table> 
            </span> 
        </div>
    </div>
    <div style="width:20%; float:left">
        <fieldset>
            <legend>Amount Details</legend>
            <table width="100%"> 
                <tr>
                    <td>Sub Total<br>
                    <div class="full clearfix">
                        <input type="text" id="subTotalDisabled" disabled="" class="inputclass" value="0">
                        <input type="hidden" id="subTotal"  class="inputclass" value="0">
                    </div></td>
                </tr>
                <tr>
                    <td>Vat<br>
                    <div class="full clearfix">
                        <input type="text" id="vatPersent"  onkeyup="vatonkeyup()" class="inputclass" style="width:50px" value="0"> % 
                        <input type="text" id="purchVat" readonly="" class="inputclass" style="width:86px" value="0">
                    </div></td>
                </tr>
                
                <tr>
                    <td>Freight<br>
                    <div class="full clearfix">
                        <input type="text" class="inputclass" id="purchFreight" onkeyup="Freightonkeyup()" value="0">
                    </div></td>
                </tr>
                <tr>
                    <td>Discount<br>
                    <div class="full clearfix">
                        <input type="text" class="inputclass" id="purchDiscount" onkeyup="Discountonkeyup()" value="0">
                    </div></td>
                </tr>
                <tr>
                    <td>Labour Cost<br>
                    <div class="full clearfix">
                        <input type="text" class="inputclass" id="labourCost" onkeyup="labourCostkeyup()" value="0">
                    </div></td>
                </tr>
                <tr>
                    <td>Total<br>
                    <div class="full clearfix">
                        <input type="text" id="purchTotaldisabled" value="0" disabled="" class="inputclass">
                        <input type="hidden" id="purchTotal" value="" class="inputclass">
                    </div></td>
                </tr>
                <tr>
                    <td>Paid<br>
                     <div class="full clearfix">
                        <input type="text" id="PurchPaid" class="inputclass" value="0" onkeyup="PaidAmount()">
                    </div></td>
                </tr>
                <tr>
                    <td>Due<br>
                    <div class="full clearfix">
                        <input type="text" class="inputclass" value="0" disabled="" id="purchaseDue2">
                        <input type="hidden" id="purchaseDue" class="inputclass" value="0">
                    </div></td>
                </tr>
                <tr>
                    <td><input type="button" class="buttonAshiqe" onclick="ProductPurchase()" value="Purchase">
                    <input type="button" class="buttonAshiqe" onclick="window.location = '<?php echo base_url();?>Administrator/purchase'" value="New Purchase"></td>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>
     
</div> 
</div>
<script type="text/javascript">
$( document ).ready(function() {
    $("#quantibox1").show();
});
$(function(){
    $('.test').click(function() {
        if($(this).is(':checked')){
            var invalue = $(this).val();
			$("#quantibox"+invalue).show();
		}
        else{
            var invalue = $(this).val();
			$("#quantibox"+invalue).hide();
		}
    });
});
function calamount(){
	var qty = $("#PurchaseQTY").val();
	var ProductRATE = $("#ProductRATE").val();
	if(qty!='' || qty>0){
		 total = parseFloat(qty) * parseFloat(ProductRATE);
		 $("#totalant").val(total);
         $("#quantg1").val(qty);
		}
	}
function calamount2(){
	var qty = $("#PurchaseQTY").val();
	var ProductRATE = $("#ProductRATE").val();
	if(ProductRATE!='' || ProductRATE>0){
		 total = parseFloat(qty) * parseFloat(ProductRATE);
		 $("#totalant").val(total);
		}
	}

    function Supplier()   {
        var sid = $("#SupplierID").val();
        var inputdata = 'sid='+sid;
        var urldata = "<?php echo base_url();?>Administrator/purchase/Selectsuplier";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#SupplierResult").html(data);
            }
        });
    }
    function Products()   {
        var ProID = $("#ProID").val();
        var inputdata = 'ProID='+ProID;
        var urldata = "<?php echo base_url();?>Administrator/purchase/SelectPruduct";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#ProductsResult").html(data);
                $('input[name=PurchaseQTY]').focus();
            }
        });
    }
    function AddToPurchaseCart(){
        var id = $("#ProID").val();
        if(id == ""){
            //$("#ProID").css("border-color","red")
            alert("Select Product");
            return false;
        }
		
		var checked = $("input:checked").length > 0;
		if (!checked){
			alert("Please check at least one checkbox");
			return false;
		}
		
		//alert(checkedValues);
		/*if($("#godown1").is(':checked')){
			if($("quantg1").val()==''){
				alert("Please select Quantity for Godown1");
				}
		}
        else{
           alert("Please select Godown");
		}*/
        var qty = $("#PurchaseQTY").val();
        if(qty == ""){
            $("#PurchaseQTY").css("border-color","red")
            return false;
        }
        var name = $("#productName").val();
        var price = $("#ProductRATE").val();
        var image = $("#ProductUnit").val();
		var checkedValues = $('input:checkbox:checked').map(function() {
			var crid = $(this).val();
			var gname = $(this).attr("name");
			var gid = $("#chkb"+crid).val();
			var gqty = $("#quantg"+crid).val();
			if(gqty==""){
				alert("Please select Quantity for "+gname);
				return false;
				}
			else{
			var qtywithgod=gid+"_"+gqty;
			 return qtywithgod;
			}
		}).get();
		if(checkedValues=="false"){
			return false;
			}
		var $cbs = $('input:checkbox:checked');
		var total = 0; //$("#more").val();
    	$cbs.each(function() {
        if ($(this).is(":checked"))
			var crid = $(this).val();
			var gqty = $("#quantg"+crid).val();
            total = parseFloat(total) + parseFloat(gqty);
		});
		if(total>qty){
			alert("Check your total quantity and all godown quantity!!!");
			return false;
			}
		
		var name = encodeURIComponent(name);
        var inputdata = 'id='+id+'&qty='+qty+'&name='+name+'&price='+price+'&image='+image+'&gqty='+checkedValues;
        //alert(inputdata);
        var urldata = "<?php echo base_url();?>Administrator/addcart/purchaseTOcart";

        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#ShowcarTProduct").html(data);
				$("#quantg1").val("");
				$("#quantg2").val("");
				$("#quantg3").val("");
                document.getElementById('ProID').value="";
                document.getElementById('PurchaseQTY').value="";
                document.getElementById('productName').value="";
                document.getElementById('ProductRATE').value="";
                document.getElementById('productName2').value="";
				//$('input:checkbox').removeAttr('checked');
				$("#quantibox1").hide();
				$("#quantibox2").hide();
				$("#quantibox3").hide();
                $('#godown1').attr('checked', true);
                $("#quantibox1").show();
            }
        });
        var TotalPrice = parseFloat(price)*parseFloat(qty);
        var subToTal = $("#subTotalDisabled").val();
        var TotalAmount = parseFloat(TotalPrice)+parseFloat(subToTal);
        var grTotal = $("#subTotalDisabled").val(TotalAmount);
        $("#subTotal").val(TotalAmount);
        //
        var subTotal = $("#subTotal").val();
        var vatPersent = $("#vatPersent").val();
        var vattotal = parseFloat(subTotal) * parseFloat(vatPersent);
        var grtotal = parseFloat(vattotal) / 100;
        $('#purchVat').val(grtotal);
        //
        var purchVat = $("#purchVat").val();
        var purchFreight = $("#purchFreight").val();
        var purchDiscount = $("#purchDiscount").val();
        var labourCost = $("#labourCost").val();
        var totalAmOuNT = parseFloat(TotalAmount)+ parseFloat(purchVat)+ parseFloat(purchFreight)+parseFloat(purchDiscount)+ parseFloat(labourCost);
        $('#purchTotal').val(totalAmOuNT);
        $('#purchTotaldisabled').val(totalAmOuNT);
        $('#PurchPaid').val(totalAmOuNT);
        //due
        var total = $("#purchTotaldisabled").val();
        var PurchPaid = $("#PurchPaid").val();
        var purchaseDue = $("#purchaseDue").val();
        var totalDUE = parseFloat(total)- parseFloat(PurchPaid);
        $('#purchaseDue').val(totalDUE);
        $('#purchaseDue2').val(totalDUE);

    }
    function cartRemove(aid)   {
        var rowid = $("#rowid"+aid).val();
        var RemoveID = $("#PriCe_"+aid).val();

        var inputdata = 'rowid='+rowid;
        var urldata = "<?php echo base_url();?>Administrator/addcart/ajax_cart_remove/";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#ShowcarTProduct").html(data);
            }
        });
        //alert(RemoveID);
        var subToTal = $("#subTotal").val();
        var rastAmount = parseFloat(subToTal)-parseFloat(RemoveID); 
        $("#subTotalDisabled").val(rastAmount);
        $("#subTotal").val(rastAmount);
        //
        var subTotal = $("#subTotal").val();
        var vatPersent = $("#vatPersent").val();
        var vattotal = parseFloat(subTotal) * parseFloat(vatPersent);
        var grtotal = parseFloat(vattotal) / 100;
        $('#purchVat').val(grtotal);
        //
        var purchVat = $("#purchVat").val();
        var purchFreight = $("#purchFreight").val();
        var purchDiscount = $("#purchDiscount").val();
        var labourCost = $("#labourCost").val();
        var totalAmOuNT = parseFloat(subTotal)+ parseFloat(purchVat)+ parseFloat(purchFreight)-parseFloat(purchDiscount)+ parseFloat(labourCost);
        $('#purchTotal').val(totalAmOuNT);
        $('#purchTotaldisabled').val(totalAmOuNT);
        $('#PurchPaid').val(totalAmOuNT);
        //due
        var total = $("#purchTotaldisabled").val();
        var PurchPaid = $("#PurchPaid").val();
        var purchaseDue = $("#purchaseDue").val();
        var totalDUE = parseFloat(total)- parseFloat(PurchPaid);
        $('#purchaseDue').val(totalDUE);
        $('#purchaseDue2').val(totalDUE);
        // Null Value


    }
    function vatonkeyup(){
        var subtotal = $("#subTotal").val();
        var vatPersent = $("#vatPersent").val();
        var vattotal = parseFloat(subtotal) * parseFloat(vatPersent);
        var grtotal = parseFloat(vattotal) / 100;
        $('#purchVat').val(grtotal);
        //
        var purchVat = $("#purchVat").val();
        var purchFreight = $("#purchFreight").val();
        var purchDiscount = $("#purchDiscount").val();
        var labourCost = $("#labourCost").val();
        var totalAmOuNT = parseFloat(subtotal)+ parseFloat(purchVat)+ parseFloat(purchFreight)-parseFloat(purchDiscount)+ parseFloat(labourCost);
        $('#purchTotal').val(totalAmOuNT);
        $('#purchTotaldisabled').val(totalAmOuNT);
        $('#PurchPaid').val(totalAmOuNT);
        //due
        var total = $("#purchTotaldisabled").val();
        var PurchPaid = $("#PurchPaid").val();
        var purchaseDue = $("#purchaseDue").val();
        var totalDUE = parseFloat(total)- parseFloat(PurchPaid);
        $('#purchaseDue').val(totalDUE);
        $('#purchaseDue2').val(totalDUE);
    }
    function Freightonkeyup(){
        var subtotal = $("#subTotal").val();
        var purchVat = $("#purchVat").val();
        var purchFreight = $("#purchFreight").val();
        var purchDiscount = $("#purchDiscount").val();
        var labourCost = $("#labourCost").val();
        var totalAmOuNT = parseFloat(subtotal)+ parseFloat(purchVat)+ parseFloat(purchFreight)-parseFloat(purchDiscount)+ parseFloat(labourCost);
        $('#purchTotal').val(totalAmOuNT);
        $('#purchTotaldisabled').val(totalAmOuNT);
        $('#PurchPaid').val(totalAmOuNT);
        //due
        var total = $("#purchTotaldisabled").val();
        var PurchPaid = $("#PurchPaid").val();
        var purchaseDue = $("#purchaseDue").val();
        var totalDUE = parseFloat(total)- parseFloat(PurchPaid);
        $('#purchaseDue').val(totalDUE);
        $('#purchaseDue2').val(totalDUE);

    }
    function Discountonkeyup(){
        var subtotal = $("#subTotal").val();
        var purchVat = $("#purchVat").val();
        var purchFreight = $("#purchFreight").val();
        var purchDiscount = $("#purchDiscount").val();
        var labourCost = $("#labourCost").val();
        var totalAmOuNT = parseFloat(subtotal)+ parseFloat(purchVat)+ parseFloat(purchFreight)-parseFloat(purchDiscount)+ parseFloat(labourCost);
        $('#purchTotal').val(totalAmOuNT);
        $('#purchTotaldisabled').val(totalAmOuNT);
        $('#PurchPaid').val(totalAmOuNT);
        //due
        var total = $("#purchTotaldisabled").val();
        var PurchPaid = $("#PurchPaid").val();
        var purchaseDue = $("#purchaseDue").val();
        var totalDUE = parseFloat(total)- parseFloat(PurchPaid);
        $('#purchaseDue').val(totalDUE);
        $('#purchaseDue2').val(totalDUE);
    }
    function labourCostkeyup(){
        var subtotal = $("#subTotal").val();
        var purchVat = $("#purchVat").val();
        var purchFreight = $("#purchFreight").val();
        var purchDiscount = $("#purchDiscount").val();
        var labourCost = $("#labourCost").val();
        var totalAmOuNT = parseFloat(subtotal) + parseFloat(purchVat) + parseFloat(purchFreight) - parseFloat(purchDiscount) + parseFloat(labourCost);
        $('#purchTotal').val(totalAmOuNT);
        $('#purchTotaldisabled').val(totalAmOuNT);
        $('#PurchPaid').val(totalAmOuNT);
        //due
        var total = $("#purchTotaldisabled").val();
        var PurchPaid = $("#PurchPaid").val();
        var purchaseDue = $("#purchaseDue").val();
        var totalDUE = parseFloat(total)- parseFloat(PurchPaid);
        $('#purchaseDue').val(totalDUE);
        $('#purchaseDue2').val(totalDUE);
    }
    function PaidAmount(){
        var total = $("#purchTotaldisabled").val();
        var PurchPaid = $("#PurchPaid").val();
        var purchaseDue = $("#purchaseDue").val();
        var totalDUE = parseFloat(total)- parseFloat(PurchPaid);
        $('#purchaseDue').val(totalDUE);
        $('#purchaseDue2').val(totalDUE);
       
    }

</script>
<script type="text/javascript">
    function ProductPurchase(){
        var packagename = $("#packagename").val();
        var purchInvoice = $("#purchInvoice").val();
        var Purchase_date = $("#Purchase_date").val();

        var SupplierID = $("#SupplierID").val();
        if(SupplierID==""){
            //$("#SupplierID").css('border-color','red');
            alert("Select Supplier");
            return false;
        }
        //
        var subTotal = $("#subTotal").val();
        if(subTotal==0){
            return false;
        }
        var vatPersent = $("#vatPersent").val();
        if(vatPersent==""){
            $("#vatPersent").css('border-color','red');
            return false;
        }else{
            $("#vatPersent").css('border-color','gray');
        }
        var purchFreight = $("#purchFreight").val();
        if(purchFreight==""){
            $("#purchFreight").css('border-color','red');
            return false;
        }else{
            $("#purchFreight").css('border-color','gray');
        }
        var purchDiscount = $("#purchDiscount").val();
        if(purchDiscount==""){
            $("#purchDiscount").css('border-color','red');
            return false;
        }else{
            $("#purchDiscount").css('border-color','gray');
        }
        var labourCost = $("#labourCost").val();
        var purchTotal = $("#purchTotal").val();

        var PurchPaid = $("#PurchPaid").val();
        
        var purchaseDue = $("#purchaseDue").val();
        var Notes = $("#PurchNotes").val();
        var inputdata = 'packagename='+packagename+'&purchInvoice='+purchInvoice+'&Purchase_date='+Purchase_date+'&SupplierID='+SupplierID+'&subTotal='+subTotal+'&vatPersent='+vatPersent+'&purchFreight='+purchFreight+'&purchDiscount='+purchDiscount+'&labourCost='+labourCost+'&purchTotal='+purchTotal+'&PurchPaid='+PurchPaid+'&purchaseDue='+purchaseDue+'&Notes='+Notes;
        var urldata = "<?php echo base_url();?>Administrator/purchase/Purchase_order";

        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                 var err = data;
                if(err){
                    if(confirm('Show Report')){
                        window.location.href='<?php echo base_url();?>Administrator/purchase/purchase_to_report';
                    }else{
                        $("#AllRefresh").html(data);
                        alert('Purchase Success');
                        return false;
                    }
                }
            }
        });
    }
</script>
