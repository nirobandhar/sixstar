<!DOCTYPE html>
<html>
<head>
<title> </title>
<meta charset='utf-8'>
    <link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
</head>
<style type="text/css" media="print">
.hide{display:none}
    th {
    cursor: pointer;
    }

@media print {
    thead {display: table-header-group;}
}
</style>
<script type="text/javascript">
function printpage() {
document.getElementById('printButton').style.visibility="hidden";
window.print();
document.getElementById('printButton').style.visibility="visible";
}
</script>
    <h1>
<body style="background:none;">
<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">

      <table width="800px" style="margin-bottom: 150px;">
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
          </h1>
            <!-- Page Body -->

              <table class="border" cellspacing="0" cellpadding="0" width="100%">
                  <thead>
                  <tr bgcolor="#ccc">
                      <th>Sl No.</th>
                      <th>
                          <a href="?orderBy=Product_Code">Product Code<a/>
                      </th>
                      <th>
                          <a href="?orderBy=company">Company<a/>
                      </th>
                      <th>
                          <a href="?orderBy=Product_Name">Product Name<a/>
                      </th>
                      <th>
                          <a href="?orderBy=ProductCategory_Name">Model<a/>
                      </th>
                      <th>Size</th>
                      <th>Unit</th>
                      <th>Qty</th>
                      <th width="110px">Purchase Price</th>
                      <th width="110px">Total Price</th>
                  </tr>
                  </thead>
                  <?php
                  $orderBy = array('Product_Code','company', 'Product_Name', 'ProductCategory_Name');
                  $order = 'company';
                  if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
                      $order = $_GET['orderBy'];
                  }



                          $totalqty = 0;$sellTOTALqty = 0; $subtotal = 0; $gttotalqty = 0; $gttotalpur = 0;
                  //echo "SELECT tbl_purchaseinventory.*,tbl_product.*,tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo";
                  if($searchtypeval=='allSelected'){
                      $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*, tbl_productcategory.*, tbl_produsize.*, tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo LEFT JOIN tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID LEFT JOIN tbl_produsize ON tbl_produsize.Productsize_SlNo = tbl_product.sizeId left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo");
                  }else{
                      $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*, tbl_productcategory.*, tbl_produsize.*, tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo LEFT JOIN tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID LEFT JOIN tbl_produsize ON tbl_produsize.Productsize_SlNo = tbl_product.sizeId left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo WHERE tbl_productcategory.company = '$searchtypeval' OR tbl_product.Product_Name= '$searchtypeval' group by tbl_purchasedetails.Product_IDNo");
                  }
                  $i=0;
                  while($record = mysql_fetch_array($sql)){
                      $i++;
                      $totalprretqty = $record['PurchaseInventory_ReturnQuantity'];
                      $totalprdamqty = $record['PurchaseInventory_DamageQuantity'];

                      $totalprlostqty = $totalprretqty+$totalprdamqty;
                      $PID = $record['purchProduct_IDNo'];
                      $branchwise = $record['PurchaseDetails_branchID'];
                      // Sell qty
                      $sqq = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo = '$PID'");
                      $or = mysql_fetch_array($sqq);
                      $sellTOTALqty = $or['SaleInventory_TotalQuantity'];

                      $sellTOTALqty = $sellTOTALqty-$or['SaleInventory_DamageQuantity'];
                      $totalsaretqty = $or['SaleInventory_ReturnQuantity'];
                      //echo "SELECT *, SUM(total_branchqty) as branqty FROM tbl_branchwise_product WHERE pro_codes = '$PID' AND branch_ids='".$branchwise."'";
                      $sqltstock = mysql_query("SELECT *, SUM(total_branchqty) as branqty FROM tbl_branchwise_product WHERE pro_codes = '$PID'");
                      $roxstock = mysql_fetch_array($sqltstock);
                      $perbranchqty = $roxstock['branqty'];

                      $totalqty = ($perbranchqty+$totalsaretqty)-($totalprlostqty+$sellTOTALqty);
                      if($totalqty !="0"){
                          $rate = $totalqty*$record['PurchaseDetails_Rate'];
                          $subtotal = $subtotal+$rate;
                          ?>
                          <tbody>
                          <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $record['Product_Code'] ?></td>
                              <td><?php echo $record['company'] ?></td>
                              <td><?php echo $record['Product_Name'] ?></td>
                              <td><?php echo $record['ProductCategory_Name'] ?></td>
                              <td><?php echo $record['Productsize_Name'] ?></td>
                              <td><?php if($record['PurchaseDetails_Unit']==""){echo "pcs";} else{echo $record['PurchaseDetails_Unit']; }?></td>
                              <td style="text-align: center;"><?php echo $totalqty;
                                  $gttotalqty = $gttotalqty+$totalqty;
                                  ?></td>
                              <td style="text-align: right;"><?php echo number_format($record['PurchaseDetails_Rate'], 2);
                                  $gttotalpur = $gttotalpur+$record['PurchaseDetails_Rate'];
                                  ?></td>
                              <td style="text-align: right;"><?php echo number_format($rate, 2); ?></td>
                          </tr>
                          </tbody>
                      <?php } }  ?>
                  <tr>
                      <td colspan="7" style="text-align: right;"><strong>Sub Total:</strong></td>
                      <td style="text-align: center;"><strong><?php echo $gttotalqty; ?></strong></td>
                      <td style="text-align: right;"><strong><?php echo number_format($gttotalpur, 2); ?> Tk</strong> </td>
                      <td style="text-align: right;"><strong><?php echo number_format($subtotal, 2); ?> Tk</strong></td>
                  </tr>
            <!-- Page Body end -->

    </table>
    </td>
  </tr>

</table>
<style>
    .signature_area{
        /*top: 50cm;*/
        position: relative;
        bottom: 0px;
        width: 100%;
        left: 55px;
    }
    .signatureasdf {
        float: left;
        padding: 0px;
        color: black;
        width: 25%;
        font-size: 14px;
        font-family: tahoma;
    }

</style>
<div style="clear: both;"></div>
<div class="signature_area">
    <div class="signatureasdf">
        <span style="border-top:1px solid #000;">Purchased By</span>
    </div>

    <div class="signatureasdf">
        <span style="border-top:1px solid #000;">Cash Received By</span>
    </div>

    <div class="signatureasdf">
        <span style="border-top:1px solid #000;">Checked & Delivery By</span>
    </div>

    <div class="signatureasdf">
        <span style="border-top:1px solid #000;">Authorized By</span>
    </div>
    <div style="clear: both;"></div>
</div>


</body>
</html>

