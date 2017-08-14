
<!DOCTYPE html>
<html>
<head>
<title> </title>
<meta charset='utf-8'>
    <link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
</head>
<style type="text/css" media="print">
.hide{display:none}

</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";  
}
</script>
<body style="background:none;">
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

      <table width="800px" >
        <tr>
          <td>
            <img src="<?php echo base_url();?>images/bell-bangladesh.png" alt="Logo" style="margin-bottom:-30px">
            <div class="headline">
            <div style="text-align:center" >
             <strong style="font-size:18px">Six Star Electronics & Furniture</strong><br>
             Elahi Complex(5th floor), 274, Jubilee Road, Chittagong,Cell: 01817-741859 Email: jahedu2@gmail.com<br>
          
              </div>
          </div>
          </td>
        </tr>
        <tr>
          <td style="float:right">
            <table width="100%"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="250px" style="text-align:right;"><strong></td>
              </tr>
          </table>
          </td>
        </tr>
        <tr>
            <td colspan="2"><hr><hr></td>
            <td colspan="2"><br></td>
        </tr>
        <tr>
            <td colspan="2" style="background:#ddd;" align="center"><h2 >Sales Record</h2></td>
        </tr>
        <tr>
            <td>
            <!-- Page Body -->
          
              <table class="border" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <th>Invoice No.</th>
                  <th>Date</th>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Sales Type</th>
                  <th>Discount</th>
                  <th>Total</th>
                  <th>Paid</th>
                  <th>Due</th>
                  <th>Notes</th>
              </tr>
             <?php $totalpurchase = "";
              $Totalpaid = "";
              foreach($record as $record){ 
                  $totalpurchase = $totalpurchase +$record['SaleMaster_SubTotalAmount']; 
                  $Totalpaid = $Totalpaid +$record['SaleMaster_PaidAmount'];

                  ?>
              <tr>
                <td><?php echo $record['SaleMaster_InvoiceNo'] ?></td>
                <td><?php echo $record['SaleMaster_SaleDate'] ?></td>
                <td><?php echo $record['Customer_Code'] ?></td>
                <td><?php echo $record['Customer_Name'] ?></td>
                 <td><?php if($record['type']==1){ echo "Retail Sale";}
			if($record['type']==2){ echo "Whole Sale";}
			if($record['type']==3){ echo "Installment Sale";}
			 ?></td>
                <td><?php echo $record['SaleMaster_TotalDiscountAmount'] ?></td>
                <td><?php echo $record['SaleMaster_SubTotalAmount'] ?></td>
                <td><?php echo $record['SaleMaster_PaidAmount'] ?></td>
                <td><?php echo $record['SaleMaster_DueAmount'] ?></td>
                <td><?php echo $record['SaleMaster_Description'] ?></td>
              </tr>
              <?php } ?>
              </table>
            </td>
            
            <!-- Page Body end -->
        </tr>
          <tr>
            <td colspan="2"><br></td>
        </tr>
        <tr>
          <td>
            <table  cellspacing="0" cellpadding="0" width="70%">
              <tr>
                  <td ><strong>Total Sale </strong><input type="text" disabled="" value="<?php echo $totalpurchase; ?>"></td>
                  <td> <strong>Total Paid </strong> <input type="text" disabled="" value="<?php echo $Totalpaid; ?>"></td>
                  <td><strong>Total Due </strong> <input type="text" disabled="" value="<?php echo $totalpurchase - $Totalpaid; ?>"></td>
                  <td></td>
              </tr>
            </table>
          </td>
        </tr>
       
       
    </table></td>
  </tr>
  
</table>

<div class="provied">
  
  <span style="float:left;font-size:11px;">
<i>"THANK YOU FOR YOUR BUSINESS"</i><br>
  Software Provied By Link-Up Technology</span>
</div>
<div class="signature">
<span style="border-top:1px solid #000;">
  Authorize Signature
</span>
</div>
</body>
</html>

