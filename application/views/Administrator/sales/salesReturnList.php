

<div class="content_scroll" style="padding: 50px 20px 25px 160px;">
<?php 
		    $sql2 = mysql_query("SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo where tbl_salesmaster.SaleMaster_InvoiceNo = '$invoices'");
            $selse = mysql_fetch_array($sql2);
          ?>
              <table  cellspacing="0" cellpadding="0" width="100%" style="margin-bottom:25px;">
                <tr>
                  <td>
                      <table width="40%">
                          <tr>
                              <td><strong>Customer ID </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Customer_Code']; ?></td>
                          </tr> 
                          <tr>
                              <td><strong>Customer Name </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Customer_Name']; ?></td>
                          </tr> 
                                    
                      </table>
                  </td>
                  <td>
                      <table width="40%">
                          <tr>
                              <td><strong>Customer Address </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Customer_Address']; ?></td>
                          </tr>
                          <tr>
                              <td><strong>Contact no </strong></td>
                              <td>:</td>
                              <td><?php echo $selse['Customer_Phone']; ?></td>
                          </tr>    
                      </table>
                  </td>
              </tr>
              </table>
<table  class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">

	<tr>

		<th>Product</th>

		<th>Saes Rate</th>

		<th>Total Qty</th>

		<th>Total Amount</th>

		<th>Already Retuned Qty</th>

		<th>Already Retuned Amount</th>

		<th>Retuned Qty</th>

		<th>Retuned Amount</th>

	</tr>



	<?php 

	$sqls = mysql_query("SELECT tbl_saledetails.*, tbl_product.*,tbl_salesmaster.*,tbl_salereturn.*, tbl_salereturn.SaleMaster_InvoiceNo as invoice FROM tbl_saledetails left join tbl_product on tbl_product.Product_SlNo=tbl_saledetails.Product_IDNo left join tbl_salesmaster on tbl_salesmaster.SaleMaster_SlNo=tbl_saledetails.SaleMaster_IDNo left join tbl_salereturn on tbl_salereturn.SaleMaster_InvoiceNo = tbl_salesmaster.SaleMaster_InvoiceNo WHERE tbl_salesmaster.SaleMaster_InvoiceNo = '$invoices'");

	while($rox = mysql_fetch_array($sqls)){ 

			$PackName = $rox['packageName'];

			if($PackName==""){

			$sprid = $rox['Product_SlNo'];

			$sprternid = $rox['SaleReturn_SlNo'];

			$treteun ='';

			$tamount ='';

			$sql22 = mysql_query("SELECT * FROM tbl_salereturndetails WHERE SaleReturnDetailsProduct_SlNo = '$sprid' AND SaleReturn_IdNo='$sprternid'");

			while($rox22 = mysql_fetch_array($sql22)){

			$treteun = $rox22['SaleReturnDetails_ReturnQuantity']+$treteun;

			$tamount = $rox22['SaleReturnDetails_ReturnAmount']+$tamount ;

		}

	?>

		<input type="hidden" name="packname[]" value="<?php echo $PackName ?>">

	 	<input type="hidden" name="productsName[]" value="<?php echo $rox['Product_Name'] ?>">

	 	<input type="hidden" name="productsCodes[]" value="">

	<tr class='wrapper'>

		<td><?php echo $rox['Product_Name'];?></td>

		<td><?php echo $rox['SaleDetails_Rate'];?></td>

		<td><?php echo $rox['SaleDetails_TotalQuantity'];?></td>

		<td><?php echo $rox['SaleDetails_Rate']*$rox['SaleDetails_TotalQuantity'];?></td>

		<td><input type="text" id="treteun<?php echo $rox['SaleDetails_SlNo'];?>" disabled="" value="<?php echo $treteun ?>"></td>

		<td><input type="text" id="totalamount<?php echo $rox['SaleDetails_SlNo'];?>" disabled="" value="<?php echo $tamount ?>"></td>

		<td><input type="text" name="returnqty[]" value="0" id="reqty<?php echo $rox['SaleDetails_SlNo']; ?>" onkeyup="qtycheckReturn(<?php echo $rox['SaleDetails_SlNo']; ?>)"></td>

		<td><input type="text" name="returnamount[]" id="amount<?php echo $rox['SaleDetails_SlNo']; ?>" onkeyup="amountcheckReturn(<?php echo $rox['SaleDetails_SlNo']; ?>)" value="0"></td>

		<input type="hidden" name="invoice" value="<?php echo $invoices; ?>">

		<input type="hidden" name="productID[]" value="<?php echo $rox['Product_SlNo']; ?>">

		<input type="hidden" name="salseQTY[]" id="qtyy<?php echo $rox['SaleDetails_SlNo']; ?>" value="<?php echo $rox['SaleDetails_TotalQuantity']; ?>">

		<input type="hidden" id="alredyamount<?php echo $rox['SaleDetails_SlNo']; ?>" value="<?php echo $rox['SaleDetails_Rate']*$rox['SaleDetails_TotalQuantity']; ?>">

	</tr>

	<?php } }

	$sqls = mysql_query("SELECT tbl_saledetails.*, tbl_product.*,tbl_salesmaster.*,tbl_salereturn.*, tbl_salereturn.SaleMaster_InvoiceNo as invoice FROM tbl_saledetails left join tbl_product on tbl_product.Product_SlNo=tbl_saledetails.Product_IDNo left join tbl_salesmaster on tbl_salesmaster.SaleMaster_SlNo=tbl_saledetails.SaleMaster_IDNo left join tbl_salereturn on tbl_salereturn.SaleMaster_InvoiceNo = tbl_salesmaster.SaleMaster_InvoiceNo WHERE tbl_salesmaster.SaleMaster_InvoiceNo = '$invoices' group by tbl_saledetails.packageName");

	while($rox = mysql_fetch_array($sqls)){ 

			$PackName = $rox['packageName'];

			if($PackName!=""){

			$sprid = $rox['Product_SlNo'];

			$sprternid = $rox['SaleReturn_SlNo'];

			$treteun ='';

			$tamount ='';

			$sql22 = mysql_query("SELECT * FROM tbl_salereturndetails WHERE SaleReturnDetailsProduct_SlNo = '$sprid' AND SaleReturn_IdNo='$sprternid'");

			while($rox22 = mysql_fetch_array($sql22)){

			$treteun = $rox22['SaleReturnDetails_Qty']+$treteun;

			$tamount = $rox22['SaleReturnDetails_ReturnAmount']+$tamount ;

		}

		$sqlx = mysql_query("SELECT * FROM tbl_package WHERE package_name ='$PackName'");

		$rom = mysql_fetch_array($sqlx);

		$sqn = mysql_query("SELECT * FROM tbl_product WHERE Product_Code = '".$rom['package_ProCode']."'");

		$ron = mysql_fetch_array($sqn);

	?>

		<input type="hidden" name="packname[]" value="<?php echo $PackName ?>">

		<input type="hidden" name="productsName[]" value="<?php echo $rox['packageName'] ?>">

		<input type="hidden" name="productsCodes[]" value="<?php echo $rom['package_ProCode'] ?>">

	<tr class='wrapper'>

		<td><?php echo $rox['packageName'];?></td>

		<td><?php echo $rox['SeleDetails_qty'];?></td>

		<td><?php echo $rox['packSellPrice']*$rox['SeleDetails_qty'];?></td>

		<td><input type="text" id="treteun<?php echo $rox['SaleDetails_SlNo'];?>" disabled="" value="<?php echo $treteun ?>"></td>

		<td><input type="text" id="totalamount<?php echo $rox['SaleDetails_SlNo'];?>" disabled="" value="<?php echo $tamount ?>"></td>

		<td><input type="text" name="returnqty[]" value="0" id="reqty<?php echo $rox['SaleDetails_SlNo']; ?>" onkeyup="qtycheckReturn(<?php echo $rox['SaleDetails_SlNo']; ?>)"></td>

		<td><input type="text" name="returnamount[]" id="amount<?php echo $rox['SaleDetails_SlNo']; ?>" onkeyup="amountcheckReturn(<?php echo $rox['SaleDetails_SlNo']; ?>)" value="0"></td>

		<input type="hidden" name="invoice" value="<?php echo $invoices; ?>">

		<input type="hidden" name="productID[]" value="<?php echo $rox['Product_SlNo']; ?>">

		<input type="hidden" name="salseQTY[]" id="qtyy<?php echo $rox['SaleDetails_SlNo']; ?>" value="<?php echo $rox['SeleDetails_qty']; ?>">

		<input type="hidden" id="alredyamount<?php echo $rox['SaleDetails_SlNo']; ?>" value="<?php echo $rox['packSellPrice']*$rox['SeleDetails_qty']; ?>">

	</tr>

	<?php } }?>

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

	

	var inputdata = $('input[name="packname[]"],input[name="productsName[]"],input[name="productsCodes[]"],input[name="returnamount[]"],input[name="returnqty[]"],input[name="productID[]"],input[name="salseQTY[]"],textarea[name="Notes"],input[name="return_date"],input[name="invoice"]').serialize();

	var urldata = "<?php echo base_url();?>Administrator/sales/SalesReturnInsert";

	$.ajax({

	type: "POST",

	  url: urldata,

	  data: inputdata,

	  success:function(data){

	  	alert("Retuned Success");

	  	$("#SalesReturnList").html(data);

	  }

	});

}

function qtycheckReturn(id){

	var returnqtys = $("#reqty"+id).val();

	var qtyy = $("#qtyy"+id).val();

	var treteun = $("#treteun"+id).val();
	var totalamount = $("#alredyamount"+id).val();
	var unitprice = parseFloat(totalamount) / parseFloat(qtyy);

	if(treteun==""){

		if(parseFloat(qtyy) < parseFloat(returnqtys)){

			alert('Return Qty too Large');

			$("#reqty"+id).val("0");

			return false;

		}

	}else{

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

	}else{

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