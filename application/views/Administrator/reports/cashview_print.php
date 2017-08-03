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

            <td colspan="2" style="background:#ddd;" align="center"><h2 >Cash View</h2></td>

        </tr>

        <tr>

            <td>

            <!-- Page Body -->

          

              <table class="border" cellspacing="0" cellpadding="0" width="100%">

                <tr >

                  <th>Account Name</th>

                  <th>Description</th>

                  <th>In Amount</th>                      

                  <th>Out Amount</th> 

                </tr>

                <?php

        $in=0;$out=0;

        foreach($record as $row){ 

            $in=$in+$row['In_Amount'];

            $out=$out+$row['Out_Amount'];

            ?>

        <tr>

            <td><?php echo $row['Acc_Name'] ?></td>

            <td><?php echo $row['Tr_Description'] ?></td>

            <td style="text-align: right;"><?php if($row['In_Amount']==0){echo "0.00";}else{ echo number_format($row['In_Amount'], 2);} ?></td>

            <td style="text-align: right;"><?php if($row['Out_Amount']==0){echo "0.00";}else{ echo number_format($row['Out_Amount'], 2);} ?></td>

        </tr>

        <?php } 

        $expence_startdate = $this->session->userdata('expence_startdate');

        $expence_enddate = $this->session->userdata('expence_enddate');

        $purchase = 0;

        $sql = mysql_query("SELECT * FROM tbl_purchasemaster ");

        while($roof = mysql_fetch_array($sql)){

            $purchase =$purchase+$roof['PurchaseMaster_PaidAmount'];

        

        }?>

         <tr>

            <td>Purchase</td>

            <td>Purducts</td>

            <td style="text-align: right;">0.00</td>

            <td style="text-align: right;"><?php echo number_format($purchase, 2); ?></td>

        </tr>

        <?php  

        $expence_startdate = $this->session->userdata('expence_startdate');

        $expence_enddate = $this->session->userdata('expence_enddate');

        $sell = 0;

        $sql = mysql_query("SELECT * FROM tbl_salesmaster");

        while($roof = mysql_fetch_array($sql)){

            $sell =$sell+$roof['SaleMaster_PaidAmount'];

        

        }?>

        <tr>

            <td>Sales</td>

            <td>Purducts</td>

            <td style="text-align: right;"><?php echo number_format($sell, 2); ?></td>

            <td style="text-align: right;">0.00</td>

        </tr>

        <?php $totalreturn = 0;

            $sqlx = mysql_query("SELECT * FROM tbl_salereturn");

            while($rom = mysql_fetch_array($sqlx)){

                $totalreturn = $totalreturn+$rom['SaleReturn_ReturnAmount'];

        }?>

        <tr>

            <td>Sales Return</td>

            <td>Purducts</td>

            <td style="text-align: right;">0.00</td>

            <td style="text-align: right;"><?php echo number_format($totalreturn, 2); ?></td>

        </tr>

        <?php $totalreturnP = 0;

            $sqlx = mysql_query("SELECT * FROM tbl_purchasereturn ");

            while($rom = mysql_fetch_array($sqlx)){

                $totalreturnP = $totalreturnP+$rom['PurchaseReturn_ReturnAmount'];

        }?>

        <tr>

            <td>Pruchase Return</td>

            <td>Purducts</td>

            <td style="text-align: right;"><?php echo number_format($totalreturnP, 2); ?></td>

            <td style="text-align: right;">0.00</td>

        </tr>

        <tr>

            <td colspan="2" align="right"><strong>Total</strong></td>

            <td style="text-align: right;"><strong><?php echo number_format(($sell+$in+$totalreturnP), 2); ?></strong></td>

            <td style="text-align: right;"><strong><?php echo number_format(($purchase+$out+$totalreturn), 2); ?></strong></td>

        </tr>

              </table>

            </td>

            <!-- Page Body end -->

       

    </table></td>

  </tr>

  

</table>



<div class="provied">

  

  <span style="float:left;font-size:11px;">

<i>"THANK YOU FOR YOUR BUSINESS"</i><br>

  Software Provied By Link-Up Technology</span>

</div>



</body>

</html>



