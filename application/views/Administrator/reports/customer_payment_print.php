
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
          <td style="text-align: center;">

            <img src="<?php echo base_url();?>images/address.jpg" alt="Logo" style="width:80%;margin-bottom:0px">

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
            <td colspan="2" style="background:#ddd;" align="center"><h2 >Customer Payment</h2></td>
        </tr>
        <tr>
            <td>
            <!-- Page Body -->
          
              <table class="border" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <th>Date</th>
                  <th>Customer ID</th>
                  <th>Customer Name</th>
                  <th>Contact No</th>
                  <th>Payment</th>
                  <th>Note</th>
              </tr>
              <?php
              $grtotal = 0;
        foreach($record as $record){ 
		$record['CPayment_amount'];
		$grtotal =$grtotal+$record['CPayment_amount']; ?>
              <tr>
                  <td><?php echo $record['CPayment_date'] ?></td>
                  <td><?php echo $record['Customer_Code'] ?></td>
                  <td><?php echo $record['Customer_Name'] ?></td>
                  <td><?php echo $record['Customer_Mobile'] ?></td>
                  <td style="text-align: right;"><?php echo number_format($record['CPayment_amount'], 2); ?></td>
                  <td><?php echo $record['CPayment_notes'] ?></td>
              </tr>
              <?php } ?>
               <tr>
            <td colspan="4" align="right"><strong>Total Payment</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($grtotal, 2); ?></strong></td>
            <td></td>
        </tr>
              </table>
            </td>
            
            <!-- Page Body end -->
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

