
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
            <td colspan="2" style="background:#ddd;" align="center"><h2 >Purchase Return List</h2></td>
        </tr>
        <tr>
            <td>
            <!-- Page Body -->
          
              <table class="border" cellspacing="0" cellpadding="0" width="100%">
                <tr >
                  <th>Date</th>
                  <th>Invoice No.</th>
                  <th>Supplier Code</th>
                  <th>Supplier Name</th>
                  <th>Product Name</th>
                  <th>Purchase Price</th>
                  <th>Return Qty</th>
                  <th>Return Amount</th>
                  <th>Notes</th>
                </tr>
               <?php 
               $totalpurchase = 0;
               $total = 0;
			         $totalqty = 0;
              $sql = mysql_query("SELECT tbl_purchasereturn.*,tbl_purchasemaster.*,tbl_supplier.* FROM tbl_purchasereturn left join tbl_purchasemaster on tbl_purchasemaster.PurchaseMaster_InvoiceNo=tbl_purchasereturn.PurchaseMaster_InvoiceNo left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo");
              while($record = mysql_fetch_array($sql)){
                $total = $total+$record['PurchaseReturn_ReturnAmount'];
						$totalqty =$totalqty +$record['PurchaseReturn_ReturnQuantity'];
						$sqlpr = mysql_query("SELECT tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo,tbl_product.Product_Name,tbl_product.Product_Purchase_Rate FROM tbl_product Left Join tbl_purchasereturndetails ON tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo=tbl_product.Product_SlNo Where tbl_purchasereturndetails.PurchaseReturn_SlNo='".$record['PurchaseReturn_SlNo']."'");
             $recordpr = mysql_fetch_array($sqlpr);
             $totalpurchase = $totalpurchase+$recordpr['Product_Purchase_Rate'];
                    ?>
                <tr>
                    <td><?php echo $record['PurchaseReturn_ReturnDate'] ?></td>
                    <td><?php echo $record['PurchaseMaster_InvoiceNo'] ?></td>
                    <td><?php echo $record['Supplier_Code'] ?></td>
                    <td><?php echo $record['Supplier_Name'] ?></td>
                     <td><?php echo $recordpr['Product_Name'];?></td>
                     <td style="text-align: right;"><?php echo number_format($recordpr['Product_Purchase_Rate'], 2);?></td>
                    <td style="text-align: center;"><?php echo $record['PurchaseReturn_ReturnQuantity'] ?></td>
                    <td style="text-align: right;"><?php echo number_format($record['PurchaseReturn_ReturnAmount'], 2); ?></td>
                    <td><?php echo $record['PurchaseReturn_Description'] ?></td>
                </tr>
                <?php } ?>
                <tr>
                     <td colspan="5" align="right"><strong>Total </strong></td>
                     <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
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

