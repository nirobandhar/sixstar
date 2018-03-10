<?php $totalsales = "";
$Totalpaid = "";
$paid="";
foreach($record as $record){ 
  //if($record['SaleMaster_DueAmount'] > 0){
  	$Custid = $record['SalseCustomer_IDNo'];
  	$sql = mysql_query("SELECT * FROM tbl_customer_payment WHERE CPayment_customerID = '".$Custid."'");
    while($row = mysql_fetch_array($sql)){
        $paid = $paid+$row['CPayment_amount'];    
    }

    $sqls = mysql_query("SELECT * FROM tbl_salesmaster WHERE SalseCustomer_IDNo = '".$Custid."'");
    while($rows = mysql_fetch_array($sqls)){
        $totalsales = $totalsales +$rows['SaleMaster_SubTotalAmount']; 
    }
  $CName = $record['Customer_Name'];
  $Cid = $record['Customer_Code'];
  $inv = $record['SaleMaster_InvoiceNo'];

  } $due = $totalsales-$paid;//}?>
<table>
	<h2>Customer Due Payment</h2>
	<h4 id="success"></h4>
	<tr>
		<td>Payment Date : </td>
		<td id="ashiqeCalender"><input type="text" value="<?php echo date("Y-m-d") ?>" id="paymentDate" /></td>
	</tr>
	<tr>
		<td>Invoice No: </td>
		<td><input type="text" id="invoice" value="<?php if(isset($inv))echo $inv; ?>" disabled=""></td>
	</tr>
	<tr>
		<td>Customer Code : </td>
		<td><input type="text" id="CustID_" value="<?php if(isset($Cid))echo $Cid; ?>"  disabled="">
		<input type="hidden" id="CustID" value="<?php if(isset($record['Customer_SlNo']))echo $record['Customer_SlNo']; ?>" ></td>
	</tr>
	<tr>
		<td>Customer Name : </td>
		<td><input type="text" value="<?php if(isset($CName))echo $CName; ?>" disabled=""></td>
	</tr>
	<tr>
		<td>Total Due : </td>
		<td><input type="text" id="totaldue" value="<?php if(isset($due)) echo $due;?>" disabled=""></td>
	</tr>
	<tr>
		<td>Paid Amount : </td>
		<td><input type="text"  id="paidAmount" onkeyup="remainddue()" selected>
        <input type="hidden"  id="status" value="<?php if(isset($record['cstatus']))echo $record['cstatus']; ?>">
		<input type="hidden"  id="Paymentby" value="By Cash"></td>
	</tr>
	<tr>
		<td>Remainded Due : </td>
		<td><input type="text" id="remainddue" disabled=""></td>
	</tr><tr>
		<td>Note : </td>
		<td><input type="text" id="Note"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="button" value="Payment" onclick="Submitdata()" id="remainddue"></td>
	</tr>

</table>
<script type="text/javascript">
	function Submitdata(){
		var paymentDate = $('#paymentDate').val();
		var invoice = $('#invoice').val();
		var CustID = $('#CustID').val();
		var status = $("#status").val();
		var Note = $("#Note").val();
		//alert(Note);
		var regex = /^[0-9]+$/;
		var paidAmount = $('#paidAmount').val();

		/*if(paidAmount=="0"){
			$("#paidAmount").css('border-color','red');
            //return false;
		}else{
			if(!regex.test(paidAmount)){
	            $("#paidAmount").css('border-color','red');
	            //return false;
	        }else{
	            $("#paidAmount").css('border-color','gray');
	        }
		}*/

        var Paymentby = $('#Paymentby').val();
        if(Paymentby==""){
            $("#Paymentby").css('border-color','red');
            return false;
        }else{
            $("#Paymentby").css('border-color','gray');
        }
		var succes = "";
		if(succes == ""){
			var inputdata = 'Paymentby='+Paymentby+'&paymentDate='+paymentDate+'&invoice='+invoice+'&CustID='+CustID+'&paidAmount='+paidAmount+'&status='+status+'&Note='+Note;
			//alert(inputdata);
			var urldata = "<?php echo base_url();?>Administrator/customer/custome_PaymentAmount/";
			$.ajax({
				type: "POST",
				url: urldata,
				data: inputdata,
				success:function(data){
					$('#success').html('Payment Success').css("color","green");
					$('#Search_Results_Duepayment').html(data);
					setTimeout(function() {$.fancybox.close()}, 2000);
				}
			});
		}
	}
	function remainddue(){
		var totaldue = $("#totaldue").val();
		var paidAmount = $("#paidAmount").val();
		var Remainded = parseFloat(totaldue) - parseFloat(paidAmount);
		$("#remainddue").val(Remainded);
	}
</script>