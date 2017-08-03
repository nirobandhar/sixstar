
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
            <td colspan="2" style="background:#ddd;" align="center"><h2 >Current Stock</h2></td>
        </tr>
        <tr>
            <td>
            <!-- Page Body -->
          
              <table class="border" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <th>Product Name</th>
                  <th>Model</th>
                  <th>Size</th>
                  <th>Purchase Price</th>
                  <th>Qty</th>
                  <th>Total Price</th>
                  <th>Unit</th>
                </tr>
              <?php $totalqty = 0;$sellTOTALqty = 0; $subtotal = 0; $gttotalqty = 0; $gttotalpur = 0;
              $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*, tbl_productcategory.*, tbl_produsize.*, tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo LEFT JOIN tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID LEFT JOIN tbl_produsize ON tbl_produsize.Productsize_SlNo = tbl_product.sizeId left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo");
              while($record = mysql_fetch_array($sql)){
            
               $totalprretqty = $record['PurchaseInventory_ReturnQuantity'];
                $totalprdamqty = $record['PurchaseInventory_DamageQuantity'];
                
				$totalprlostqty = $totalprretqty+$totalprdamqty;
                $PID = $record['purchProduct_IDNo'];
				$branchwise = $record['PurchaseDetails_branchID'];
                // Sell qty
                $sqq = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo = '$PID'");
                $or = mysql_fetch_array($sqq);
                if($or['SaleInventory_packname'] ==""){
                $sellTOTALqty = $or['SaleInventory_TotalQuantity'];
               
                $sellTOTALqty = $sellTOTALqty-$or['SaleInventory_DamageQuantity'];
                $totalsaretqty = $or['SaleInventory_ReturnQuantity'];
				
				$sqltstock = mysql_query("SELECT *, SUM(total_branchqty) as branqty FROM tbl_branchwise_product WHERE pro_codes = '$PID'");
				$roxstock = mysql_fetch_array($sqltstock);
				$perbranchqty = $roxstock['branqty'];
				
				 $totalqty = ($perbranchqty+$totalsaretqty)-($totalprlostqty+$sellTOTALqty);
                if($totalqty !="0"){
                    $rate = $totalqty*$record['PurchaseDetails_Rate'];
                    $subtotal = $subtotal+$rate;
                ?>
                <tr>
                    <td><?php echo $record['Product_Name'] ?></td>
                    <td><?php echo $record['ProductCategory_Name'] ?></td>
                    <td><?php echo $record['Productsize_Name'] ?></td>
                    
                    <td style="text-align: right;"><?php echo number_format($record['PurchaseDetails_Rate'], 2); 
          $gttotalpur = $gttotalpur+$record['PurchaseDetails_Rate'];
          ?></td>
                    <td style="text-align: center;"><?php echo $totalqty;
                    $gttotalqty = $gttotalqty+$totalqty;
                     ?></td>
                    <td style="text-align: right;"><?php echo number_format($rate, 2); ?></td>
                    <td><?php if($record['PurchaseDetails_Unit']==""){echo "pcs";} else{echo $record['PurchaseDetails_Unit']; }?></td>
                </tr>
        <?php } } }?>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Sub Total:</strong></td>
            
            <td style="text-align: right;"><strong><?php echo number_format($gttotalpur, 2); ?> Tk</strong> </td>
            <td style="text-align: center;"><strong><?php echo $gttotalqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($subtotal, 2); ?> Tk</strong></td>
            <td></td>
                </tr>
              </table>
            </td>
            <!-- Page Body end -->
       
    </table>
    </td>
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

