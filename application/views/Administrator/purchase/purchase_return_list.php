<div class="content_scroll" style="padding: 50px 20px 25px 160px;">
<?php 
		    $sql2 = mysql_query("SELECT tbl_purchasemaster.*, tbl_purchasemaster.AddBy as served, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo where tbl_purchasemaster.PurchaseMaster_InvoiceNo = '$proinv'");
            $selse = mysql_fetch_array($sql2);
          ?>
              <table  cellspacing="0" cellpadding="0" width="100%" style="margin-bottom:25px;">
                <tr>
                  <td>
                      <table width="40%">
                          <tr>
                              <td><strong>Supplier ID </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Supplier_Code']; ?></td>
                          </tr> 
                          <tr>
                              <td><strong>Supplier Name </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Supplier_Name']; ?></td>
                          </tr> 
                                    
                      </table>
                  </td>
                  <td>
                      <table width="40%">
                          <tr>
                              <td><strong>Supplier Address </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Supplier_Address']; ?></td>
                          </tr>
                          <tr>
                              <td><strong>Contact no </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Supplier_Mobile']; ?></td>
                          </tr>    
                      </table>
                  </td>
              </tr>
              </table>
<table  class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
	<tr>
		<th>Product</th>
		<th>Purchase Rate</th>
		<th>Total Qty</th>
		<th>Total Amount</th>
		<th>Previous Retuned Qty</th>
		<th>Previous Retuned Amount</th>
		<th>Current Retuned Qty</th>
		<th>Current Retuned Amount</th>
	</tr>
	<?php  
	$sql = mysql_query("SELECT tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr, tbl_product.*,tbl_purchasemaster.*,tbl_purchasereturn.*, tbl_purchasereturn.PurchaseMaster_InvoiceNo as invoice FROM tbl_purchasedetails left join tbl_product on tbl_product.Product_SlNo=tbl_purchasedetails.Product_IDNo left join tbl_purchasemaster on tbl_purchasemaster.PurchaseMaster_SlNo=tbl_purchasedetails.PurchaseMaster_IDNo left join tbl_purchasereturn on tbl_purchasereturn.PurchaseMaster_InvoiceNo = tbl_purchasemaster.PurchaseMaster_InvoiceNo WHERE tbl_purchasemaster.PurchaseMaster_InvoiceNo = '$proinv' Group BY tbl_purchasedetails.Product_IDNo");
		while($rox = mysql_fetch_array($sql)){ 
			$PackName = $rox['PackName'];
			$treteun ='';
			$tamount ='';
			
			$sprid = $rox['Product_SlNo'];
			$sprternid = $rox['PurchaseReturn_SlNo'];
			
		$sql22 = mysql_query("SELECT * FROM tbl_purchasereturndetails WHERE PurchaseReturnDetailsProduct_SlNo = '$sprid' AND PurchaseReturn_SlNo='$sprternid'");

		while($rox22 = mysql_fetch_array($sql22)){
			$treteun = $rox22['PurchaseReturnDetails_ReturnQuantity']+$treteun;
			$tamount = $rox22['PurchaseReturnDetails_ReturnAmount']+$tamount ;
		}?>

	 <tr class='wrapper'>
	 	<input type="hidden" name="packname[]" value="<?php echo $PackName ?>">
	 	<input type="hidden" name="productsName[]" value="<?php echo $rox['Product_Name'] ?>">
	 	<input type="hidden" name="productsCodes[]" value="">
		<td><?php echo $rox['Product_Name'];?></td>
		<td><?php echo $rox['PurchaseDetails_Rate'];?></td>
		<td><?php echo $rox['totalqty'];?></td>
		<td><?php echo $rox['PurchaseDetails_Rate']*$rox['totalqty'];?></td>
		<td><input type="text" id="treteun<?php echo $rox['PurchaseDetails_SlNo'];?>"readonly="" value="<?php echo $treteun;?>"></td>
		<td><input type="text" id="totalamount<?php echo $rox['PurchaseDetails_SlNo'];?>" readonly="" value="<?php echo $tamount;?>"></td>
		<td><input type="text" name="returnqty[]" id="reqty<?php echo $rox['PurchaseDetails_SlNo'];?>" onkeyup="qtycheckReturn(<?php echo $rox['PurchaseDetails_SlNo'];?>)" value="0"></td>
		<td><input type="text" name="returnamount[]" id="amount<?php echo $rox['PurchaseDetails_SlNo'];?>" value="0" onkeyup="amountcheckReturn(<?php echo $rox['PurchaseDetails_SlNo'];?>)"></td>
		<input type="hidden" name="invoice" value="<?php echo $proinv; ?>">
		<input type="hidden" name="productID[]" value="<?php echo $rox['Product_SlNo']; ?>">
		<input type="hidden" name="Supplier_No" value="<?php echo $rox['Supplier_SlNo']; ?>">
		<input type="hidden" id="qtyy<?php echo $rox['PurchaseDetails_SlNo'];?>" value="<?php echo $rox['totalqty']; ?>">
		<input type="hidden" id="alredyamount<?php echo $rox['PurchaseDetails_SlNo'];?>" value="<?php echo $rox['PurchaseDetails_Rate']*$rox['totalqty']; ?>">
		
	</tr> 
	 
	<?php }  
 ?>
	<input type="hidden" >
	<tr>
		<td colspan="8"> 
			<table style="order: 1px solid #d8d8d8;">
				<tr>
					<td> Notes </td>
					<td>
						
						<textarea name="Notes" id="Notes" style="width:300px;height:30px "></textarea>
					</td>
					<td  align="right">
					<input type="button" class="buttonAshiqe" onclick="SubmitReturn()" value="Save">
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</div>

<script type='text/javascript'>
function SubmitReturn(){
	var inputdata = $('input[name="productsCodes[]"],input[name="productsName[]"],input[name="packname[]"],input[name="returnamount[]"],input[name="returnqty[]"],input[name="productID[]"],input[name="salseQTY[]"],textarea[name="Notes"],input[name="return_date"],input[name="invoice"],input[name="Supplier_No"]').serialize();
	var urldata = "<?php echo base_url();?>Administrator/purchase/PurchaseReturnInsert";
	$.ajax({
	type: "POST",
	  url: urldata,
	  data: inputdata,
	  success:function(data){
	  	alert("Retuned Success");
	  	$("#PurchaseReturnList").html(data);
	  }
	});
}
function qtycheckReturn(id){
	var returnqtys = $("#reqty"+id).val();
	var qtyy = $("#qtyy"+id).val();
	var totalamount = $("#alredyamount"+id).val();
	var treteun = $("#treteun"+id).val();
	var unitprice = parseFloat(totalamount) / parseFloat(qtyy);
	
	if(treteun==""){
		if(parseFloat(qtyy) < parseFloat(returnqtys)){
			alert('Return Qty too Large');
			$("#reqty"+id).val("0");
			return false;
		}
	}
	else{
		
		var total = parseFloat(treteun)+parseFloat(returnqtys);
		if(parseFloat(qtyy) < parseFloat(total)){
			alert('Return Qty too Large');
			$("#reqty"+id).val("0");
			return false;
		}
		else{
			//alert($("#amount"+id).val(retprice));
			var retprice = parseFloat(unitprice) * parseFloat(returnqtys);
			$("#amount"+id).val(retprice);
			}
	}
	if(treteun=="0"){
		if(parseFloat(qtyy) < parseFloat(returnqtys)){
			alert('Return Qty too Large');
			$("#reqty"+id).val("0");
			return false;
		}
	}
	else{
		var total = parseFloat(treteun)+parseFloat(returnqtys);
		if(parseFloat(qtyy) < parseFloat(total)){
			alert('Return Qty too Large');
			$("#reqty"+id).val("0");
			return false;
		}
		else{
			var retprice = parseFloat(unitprice) * parseFloat(returnqtys);
			$("#amount"+id).val(retprice);
			}
	}
}
function amountcheckReturn(id){
	var returnqtys = $("#amount"+id).val();
	var alredyamount = $("#alredyamount"+id).val();
	var totalamount = $("#totalamount"+id).val();
	if(totalamount==""){
		if(parseFloat(alredyamount) < parseFloat(returnqtys)){
			alert('Return Amount too Large');
			$("#amount"+id).val("0");
			return false;
		}
	}else{
		var total = parseFloat(totalamount)+parseFloat(returnqtys);
		if(parseFloat(alredyamount) < parseFloat(total)){
			alert('Return Amount too Large');
			$("#amount"+id).val("0");
			return false;
		}
	}
	if(totalamount=="0"){
		if(parseFloat(alredyamount) < parseFloat(returnqtys)){
			alert('Return Amount too Large');
			$("#amount"+id).val("0");
			return false;
		}
	}else{
		var total = parseFloat(totalamount)+parseFloat(returnqtys);
		if(parseFloat(alredyamount) < parseFloat(total)){
			alert('Return Amount too Large');
			$("#amount"+id).val("0");
			return false;
		}
	}
}
    

</script>