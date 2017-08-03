

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

            <td colspan="2" style="background:#ddd;" align="center"><h2 >Customer Due</h2></td>

        </tr>

        <tr>

            <td>

            <!-- Page Body -->

          

              <table class="border" cellspacing="0" cellpadding="0" width="100%">

                <tr>

                  <th>Customer ID</th>

                  <th>Customer Name</th>

                  <th>Contact</th>

                  <th>Total</th>

                  <th>Paid</th>

                  <th>Due</th>

              </tr>

             <?php 

        $totalpurchase = "";

        $Totalpaid = "";

        $due = "";

        foreach($record as $record){ 

            //if($record['SaleMaster_DueAmount'] > 0){

            $Custid = $record['SalseCustomer_IDNo'];

            $paid='';

            $sql = mysql_query("SELECT * FROM tbl_customer_payment WHERE CPayment_customerID = '".$Custid."'");

            while($row = mysql_fetch_array($sql)){

                $paid = $paid+$row['CPayment_amount'];    

            }$purchase="";

            $sqls = mysql_query("SELECT * FROM tbl_salesmaster WHERE SalseCustomer_IDNo = '".$Custid."'");

            while($rows = mysql_fetch_array($sqls)){

                $purchase = $purchase +$rows['SaleMaster_SubTotalAmount']; 

            }

            if($purchase- $paid !="0"){

            $totalpurchase = $totalpurchase+$purchase;

            $Totalpaid = $Totalpaid+$paid;

            ?>

        <tr>

          

            <td><?php echo $record['Customer_Code'] ?></td>

            <td><?php echo $record['Customer_Name'] ?></td>

            <td><?php echo $record['Customer_Mobile'] ?></td>

            <td style="text-align: right;"><?php echo number_format($purchase, 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($paid, 2) ?></td>

            <td style="text-align: right;"><?php echo number_format(($purchase- $paid), 2); ?></td>

            

        </tr>



        <?php } }?>
        <tr>
            <td></td>
            <td></td>
            <td style="text-align: right;"><strong>Total</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($Totalpaid, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format(($totalpurchase - $Totalpaid), 2); ?></strong></td>

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



