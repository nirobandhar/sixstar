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

      <table width="800px" >
        <tr>
          <td style="text-align: center;">

            <img src="<?php echo base_url();?>images/address.jpg" alt="Logo" style="width:80%;">

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
            <td colspan="2" style="background:#ddd; font-size: 20Px" align="center"><h2 >Products List With Price</h2></td>
        </tr>
        <tr>
            <td>
          </h1>
            <!-- Page Body -->

              <table class="border" cellspacing="0" cellpadding="0" width="100%">
                  <thead>
                  <tr bgcolor="#ccc">
                      <th style="width: 5%">Sl No.</th>
                      <th style="width:5%">ID</th>
                      <th style="width:15%">Company</th>
                      <th style="width:15%">Product Name</th>
                      <th style="width:15%">Model</th>
                      <th style="width:10%">Size</th>
                      <th style="width: 10%">DP</th>
                      <th style="width:10%">Wholesale Rate</th>
                      <th style="width:10%">Retail Rate</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_produsize.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID left join tbl_produsize on tbl_produsize.Productsize_SlNo= tbl_product.sizeId order by company asc");
                  $i=0;
                  while($row = mysql_fetch_array($sql)){
                      $i++;
                      ?>
                      <tr>
                          <td><?php echo $i; ?></td>
                          <td style="width:5%"><?php echo $row['Product_Code'] ?></td>
                          <td style="width:8%"><?php echo $row['company'] ?></td>
                          <td style="width:15%"><?php echo $row['Product_Name'] ?></td>
                          <td style="width:15%"><?php echo $row['ProductCategory_Name'] ?></td>
                          <td style="width:10%"><?php echo $row['Productsize_Name'] ?></td>
                          <td style="width: 10%"></td>
                          <td style="width:8%"><?php echo $row['Product_WholesaleRate'] ?></td>
                          <td style="width:10%"><?php echo $row['Product_SellingPrice'] ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>

            <!-- Page Body end -->
       
    </table>

<style>
    .signature_area{
        top: 2cm;
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

