
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
          <td>
            <img src="<?php echo base_url();?>images/bell-bangladesh.png" alt="Logo" style="margin-bottom:-30px">
            <div class="headline">
            <div style="text-align:center" >
             <strong style="font-size:18px">Six Star Electronics & Furniture</strong><br>
             Elahi Complex(5th floor), 274, Jubilee Road, Chittagong,Cell: 01817-741859 Email: jahedu2@gmail.com<br>
          
              </div>
          </div>
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
            <td colspan="2" style="background:#ddd;" align="center"><h2 >Purchase Stock</h2></td>
        </tr>
        <tr>
            <td>
            <!-- Page Body -->
          
              <table class="border" cellspacing="0" cellpadding="0" width="100%">
                <tr >
                    <th>Category</th>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Purchase Qty</th>
                    <th>Return Qty</th>
                    <th>Ret. Amount</th>
                    <th>Damage Qty</th>
                    <th>Dmg. Amount</th>
                    <th>Rate</th>
                    <th>Unit</th>
                    <th>Purchase Amount</th>
                </tr>
               <?php 
                $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*,tbl_unit.*,tbl_productcategory.* FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo= tbl_purchaseinventory.purchProduct_IDNo left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID");
                while($record = mysql_fetch_array($sql)){
                    if($record['PurchaseInventory_packname']==""){?>
                <tr>
                    <td><?php echo $record['ProductCategory_Name'] ?></td>
                    <td><?php echo $record['Product_Code'] ?></td>
                    <td><?php echo $record['Product_Name'] ?></td>
                    <td><?php echo $record['PurchaseInventory_TotalQuantity'] ?></td>
                    <td><?php echo $record['PurchaseInventory_ReturnQuantity'] ?></td>
                    <td><?php echo $record['PurchaseInventory_ReturnQuantity']*$record['Product_Purchase_Rate']; ?></td>
                    <td><?php echo $record['PurchaseInventory_DamageQuantity'] ?></td>
                    <td><?php echo $record['PurchaseInventory_DamageQuantity']*$record['Product_Purchase_Rate']; ?></td>
                    <td><?php echo $record['Product_Purchase_Rate'] ?></td>
                    <td><?php echo $record['Unit_Name'] ?></td>
                    <td><?php echo $record['Product_Purchase_Rate']*$record['PurchaseInventory_TotalQuantity']; ?></td>
                </tr>
                <?php }}?>
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

