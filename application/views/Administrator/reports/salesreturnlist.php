

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

            <td colspan="2" style="background:#ddd;" align="center"><h2 >Sales Return List</h2></td>

        </tr>

        <tr>

            <td>

            <!-- Page Body -->

          

              <table class="border" cellspacing="0" cellpadding="0" width="100%">

                <tr >
                  <th>Date</th>

                  <th>Invoice No.</th>                  

                  <th>Customer Code</th>

                  <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Sale Price</th>
                  <th>Return Qty</th>

                  <th>Return Amount</th>

                  <th>Notes</th>

                </tr>

               <?php 
                $totalsales = 0;
                $total = 0;
			   		    $totalqty = 0;

                $sql = mysql_query("SELECT tbl_salereturn.*,tbl_salesmaster.*,tbl_customer.* FROM tbl_salereturn left join tbl_salesmaster on tbl_salesmaster.SaleMaster_InvoiceNo=tbl_salereturn.SaleMaster_InvoiceNo left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo");

                while($record = mysql_fetch_array($sql)){

                    $total = $total+$record['SaleReturn_ReturnAmount'];
					$totalqty =$totalqty +$record['SaleReturn_ReturnQuantity'];
					$sqlpr = mysql_query("SELECT tbl_salereturndetails.SaleReturnDetailsProduct_SlNo,tbl_product.Product_Name,tbl_product.Product_SellingPrice FROM tbl_product Left Join tbl_salereturndetails ON tbl_salereturndetails.SaleReturnDetailsProduct_SlNo=tbl_product.Product_SlNo Where tbl_salereturndetails.SaleReturn_IdNo='".$record['SaleReturn_SlNo']."'");
             $recordpr = mysql_fetch_array($sqlpr);

             $totalsales = $totalsales+$recordpr['Product_SellingPrice'];

                ?>

            <tr>

                <td><?php echo $record['SaleReturn_ReturnDate'] ?></td>

                <td><?php echo $record['SaleMaster_InvoiceNo'] ?></td>        

                <td><?php echo $record['Customer_Code'] ?></td>

                <td><?php echo $record['Customer_Name'] ?></td>
                <td><?php echo $recordpr['Product_Name'] ?></td>
            	<td style="text-align: right;"><?php echo number_format($recordpr['Product_SellingPrice'], 2); ?></td>


                <td style="text-align: center;"><?php echo $record['SaleReturn_ReturnQuantity']; ?></td>

                <td style="text-align: right;"><?php echo number_format($record['SaleReturn_ReturnAmount'], 2); ?></td>

                <td><?php echo $record['SaleReturn_Description']; ?></td>

            </tr>

            <?php } ?>

            <tr>

              <td colspan="5" align="right"><strong>Total </strong></td>
              <td style="text-align: right;"><strong><?php echo number_format($totalsales, 2); ?></strong></td>

              <td style="text-align: center;"><strong><?php echo $totalqty; ?></strong></td>
              <td style="text-align: right;"><strong><?php echo number_format($total, 2); ?></strong></td>

              <td></td>

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

<div class="signature">

<span style="border-top:1px solid #000;">

  Authorize Signature

</span>

</div>

</body>

</html>



