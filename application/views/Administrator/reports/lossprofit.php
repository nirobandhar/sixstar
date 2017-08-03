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

<?php 

//Current summyry

$totalsale = 0;

$saledue =0;

$sqlsale = mysql_query("SELECT * FROM tbl_salesmaster Group BY SaleMaster_InvoiceNo");

while($row = mysql_fetch_array($sqlsale)){

$totalsale =$totalsale +$row['SaleMaster_SubTotalAmount'];

$saledue =$saledue +$row['SaleMaster_DueAmount'];

}



/*$totalrins = 0;

$sqlreins = mysql_query("SELECT * FROM tbl_installment");

while($rowrins = mysql_fetch_array($sqlreins)){

$totalrins =$totalrins +$rowrins['payment_amount'];

}



$totalins = 0;

$sqlins = mysql_query("SELECT * FROM tbl_salesmaster WHERE Status='3'");

while($rowins = mysql_fetch_array($sqlins)){

$totalins =$totalins +$rowins['SaleMaster_PaidAmount'];

}

$totalcashsale = 0;

$sqlcash = mysql_query("SELECT * FROM tbl_salesmaster WHERE Status!='2'");

while($rowcash = mysql_fetch_array($sqlcash )){

$totalcashsale =$totalcashsale +$rowcash['SaleMaster_PaidAmount'];

}*/



$totalwholesale = 0;

$sqlwhole = mysql_query("SELECT * FROM tbl_customer_payment WHERE CPayment_Paymentby='By Cash'");

while($rowwhole = mysql_fetch_array($sqlwhole )){

$totalwholesale =$totalwholesale +$rowwhole['CPayment_amount'];

}



$totaloutamount = 0;

$totalinamount = 0;

$sqlout = mysql_query("SELECT * FROM tbl_cashtransaction");

while($rowout = mysql_fetch_array($sqlout )){

$totaloutamount =$totaloutamount +$rowout['Out_Amount'];

$totalinamount = $totalinamount +$rowout['In_Amount'];

}



$totalsalereturn = 0;

$sqlsaleret = mysql_query("SELECT tbl_salereturndetails.SaleReturnDetailsProduct_SlNo,tbl_salereturndetails.SaleReturnDetails_SaleQuantity,tbl_product.Product_SlNo,tbl_product.Product_SellingPrice FROM tbl_salereturndetails Left Join tbl_product ON tbl_product.Product_SlNo=tbl_salereturndetails.SaleReturnDetailsProduct_SlNo");

while($rowsalereturn = mysql_fetch_array($sqlsaleret )){

$totalsalereturn =$totalsalereturn + ($rowsalereturn['Product_SellingPrice']*$rowsalereturn['SaleReturnDetails_SaleQuantity']);

}





$totalpurchase = 0;

$totalpurchasedue = 0;

$sqlpurchase = mysql_query("SELECT * FROM tbl_purchasemaster");

while($rowpurchase = mysql_fetch_array($sqlpurchase )){

$totalpurchase =$totalpurchase +$rowpurchase['PurchaseMaster_SubTotalAmount'];

$totalpurchasedue =$totalpurchasedue +$rowpurchase['PurchaseMaster_DueAmount'];

}



$totalprdue = 0;

$sqlwprdue = mysql_query("SELECT * FROM tbl_supplier_payment WHERE SPayment_Paymentby='By Cash'");

while($rowprdue = mysql_fetch_array($sqlwprdue )){

$totalprdue =$totalprdue +$rowprdue['SPayment_amount'];

}



$totalpurreturn = 0;

$sqlpurret = mysql_query("SELECT tbl_purchasereturndetails.PurchaseReturnDetails_ReturnDate,tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo,tbl_purchasereturndetails.PurchaseReturnDetails_ReturnQuantity,tbl_product.Product_SlNo,tbl_product.Product_Purchase_Rate FROM tbl_purchasereturndetails Left Join tbl_product ON tbl_product.Product_SlNo=tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo");

while($rowpurreturn = mysql_fetch_array($sqlpurret )){

$totalpurreturn =$totalpurreturn + ($rowpurreturn['Product_Purchase_Rate']*$rowpurreturn['PurchaseReturnDetails_ReturnQuantity']);

}

$totalsaleitempurchasevalue = 0;

$sqlsalepur = mysql_query("SELECT tbl_saledetails.SaleDetails_TotalQuantity,tbl_saledetails.Purchase_Rate,tbl_salesmaster.SaleMaster_SaleDate FROM tbl_saledetails Left Join tbl_salesmaster ON tbl_salesmaster.SaleMaster_SlNo=tbl_saledetails.SaleMaster_IDNo");

while($rowsalepur = mysql_fetch_array($sqlsalepur )){

$totalsaleitempurchasevalue =$totalsaleitempurchasevalue + ($rowsalepur['Purchase_Rate']*$rowsalepur['SaleDetails_TotalQuantity']);

}



?>

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

            <td colspan="2" style="background:#ddd;" align="center"><h2>Loss/Profit Calculation:</h2></td>

        </tr>

        <tr>

            <td>

            <!-- Page Body -->

          

              <table class="border" cellspacing="0" cellpadding="0" width="95%">

        <tr bgcolor="#89B03E">

            <th colspan="2">Profit And Loss Calculate</th>

        </tr>

       <tr>

        <td>Total Sale</td>

        <td>+ <?php echo $totalsale;?></td>

       </tr>

       <tr>

        <td>Total Sale Return Value</td>

        <td>+ <?php echo $totalsalereturn;?></td>

       </tr>

       <tr>

        <th>Total</th>

        <th><?php echo $totalnitsale = $totalsale+$totalsalereturn;?></th>

       </tr>

       <tr>

        <th>&nbsp;</th>

        <td>&nbsp;</td>

       </tr>

       <tr>

        <td>Purchase rate for Sale product</td>

        <td>+ <?php echo $totalsaleitempurchasevalue;?></td>

       </tr>

       <tr>

        <td>Others Cost</td>

        <td>+ <?php echo $totaloutamount;?></td>

       </tr>

       <tr>

        <td>Return stock value</td>

        <td>+ <?php echo $totalpurreturn;?></td>

       </tr>

       <tr>

        <th>Total</th>

        <th><?php echo $sumoftsale= $totalsaleitempurchasevalue+$totaloutamount+$totalpurreturn;?></th>

       </tr>

        <tr>

        <th>Net Profit</th>

        <th><?php echo $nitprofit= $totalnitsale-$sumoftsale;?></th>

       </tr>

       <tr>

        <th>&nbsp;</th>

        <td>&nbsp;</td>

       </tr>

       <tr bgcolor="#89B03E">

            <th colspan="2">Balance Sheet</th>

        </tr>

        <tr>

        <th>&nbsp;</th>

        <td>&nbsp;</td>

       </tr>

       <tr>

        <th colspan="2">Liabilities</th>

       </tr>

        <tr>

        <td>All Debt Amount</td>

        <td>+ <?php echo $alldebt = $totalpurchasedue-$totalprdue;?></td>

       </tr>

       <tr>

        <td>Rising profits</td>

        <td>+ <?php echo $nitprofit;?></td>

       </tr>

       <tr>

        <th>Total</th>

        <th><?php echo $nitliabiliti = $totalpurchasedue + $nitprofit;?></th>

       </tr>

       <tr>

        <th>&nbsp;</th>

        <td>&nbsp;</td>

       </tr>

       <tr bgcolor="#89B03E">

            <th colspan="2">Assets</th>

        </tr>

       <tr>

        <td>Current Stock Value</td>

        <td>+ <?php echo $crstockval = $totalpurreturn+$totalpurchase-$totalsaleitempurchasevalue;?></td>

       </tr>

       <tr>

        <td>Cash/Bank Amount</td>

        <td>+ <?php echo $totalinamount;?></td>

       </tr>

        <tr>

        <td>All Credit</td>

        <td>+ <?php echo $allcredit = $saledue-$totalwholesale;?></td>

       </tr>

       <tr>

        <th>Total</th>

        <th><?php echo $totalassets = $crstockval+$totalinamount+$allcredit;?></th>

       </tr>

       <tr>

        <th>Current Balance</th>

        <th><?php echo $totalassets-$nitliabiliti;?></th>

       </tr>

    </table>

            </td>

            <!-- Page Body end -->

       

    </table>

    </td>

  </tr>

  

</table>



</body>

</html>



