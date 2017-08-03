

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

            <td colspan="2" style="background:#ddd;" align="center"><h2 >Purchase Record</h2></td>

        </tr>

        <tr>

            <td>

            <!-- Page Body -->

          

              <table class="border" cellspacing="0" cellpadding="0" width="100%">

                <tr >

                  <th>Date</th>

                  <th>Invoice No.</th>

                  <th>Supplier ID</th>

                  <th>Supplier Name</th>

                  <th>Vat</th>

                  <th>Freight</th>

                  <th>Labour Cost</th>

                  <th>Total</th>

                  <th>Paid</th>

                  <th>Due</th>

                  <th>Notes</th>


              </tr>
<?php 

        $totalpurchase = 0;
        $Totalpaid = 0;
        $totalvat = 0;
        $totalfreight = 0;
        $totallabourcost = 0;

        foreach($record as $record){ 

            $totalpurchase = $totalpurchase +$record['PurchaseMaster_SubTotalAmount']; 

            $Totalpaid = $Totalpaid +$record['PurchaseMaster_PaidAmount'];
            $vatper = $record['PurchaseMaster_Tax'];
            $vat = (($record['PurchaseMaster_SubTotalAmount']*$vatper)/100);
            $totalvat = $totalvat + $vat;

            $totalfreight = $totalfreight + $record['PurchaseMaster_Freight'];
            $totallabourcost = $totallabourcost + $record['PurchaseMaster_DiscountAmount'];


            ?>

        <tr>
            <td><?php echo $record['PurchaseMaster_OrderDate'] ?></td>

            <td><?php echo $record['PurchaseMaster_InvoiceNo'] ?></td>

            <td><?php echo $record['Supplier_Code'] ?></td>

            <td><?php echo $record['Supplier_Name'] ?></td>

            <td style="text-align: right;"><?php echo number_format($vat, 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_Freight'], 2); ?></td>
            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_DiscountAmount'], 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_SubTotalAmount'], 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_PaidAmount'], 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($record['PurchaseMaster_DueAmount'], 2); ?></td>

            <td><?php echo $record['PurchaseMaster_Description'] ?></td>

        </tr>

        <?php } ?>
        <tr>
            <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalvat, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalfreight, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totallabourcost, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($Totalpaid, 2); ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format(($totalpurchase-$Totalpaid), 2); ?></strong></td>
            <td style="text-align: right;"><strong></strong></td>
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



