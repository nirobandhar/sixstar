

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

            <td colspan="2" style="background:#ddd;" align="center"><h2 >Sales Stock</h2></td>

        </tr>

        <tr>

            <td>

            <!-- Page Body -->

          

              <table class="border" cellspacing="0" cellpadding="0" width="100%">

                <tr >

                   <th>ID</th>
                  <th>Product Name</th>
                  <th>Model</th>
                  <th>Sales Qty</th>
                  <th>Sales Amount</th>
                  <th>Return Qty</th>
                  <th>Return Amount</th>
                  <th>Rate</th>
                  <th>Unit</th>

                </tr>

               <?php 
                $salesqty = 0;
                $salesamount = 0;
                $returnqty = 0;
                $returnamount = 0;
                $sql = mysql_query("SELECT tbl_saleinventory.*,tbl_product.*,tbl_unit.*,tbl_productcategory.* FROM tbl_saleinventory left join tbl_product on tbl_product.Product_SlNo= tbl_saleinventory.sellProduct_IdNo left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID");

                while($record = mysql_fetch_array($sql)){

                    if($record['SaleInventory_packname']==""){
                        $salesqty += $record['SaleInventory_TotalQuantity'];
                        $salesamount += ($record['SaleInventory_TotalQuantity']*$record['Product_SellingPrice']);
                        $returnqty += $record['SaleInventory_ReturnQuantity'];
                        $returnamount += ($record['SaleInventory_ReturnQuantity']*$record['Product_SellingPrice']);

                ?>

                <tr>

            
                  <td><?php echo $record['Product_Code']; ?></td>
                  <td><?php echo $record['Product_Name']; ?></td>
                  <td><?php echo $record['ProductCategory_Name']; ?></td>
                  <td style="text-align: center;"><?php echo $record['SaleInventory_TotalQuantity']; ?></td>
                  <td style="text-align: right;"><?php echo number_format(($record['SaleInventory_TotalQuantity']*$record['Product_SellingPrice']), 2); ?></td>
                  <td style="text-align: center;"><?php echo $record['SaleInventory_ReturnQuantity']; ?></td>
                  <td style="text-align: right;"><?php echo number_format(($record['SaleInventory_ReturnQuantity']*$record['Product_SellingPrice']), 2); ?></td>
                  <td style="text-align: right;"><?php echo number_format($record['Product_SellingPrice'], 2); ?></td>
                  <td><?php echo $record['Unit_Name']; ?></td>
                  

              </tr>

              <?php }}?>
              <tr>
                  <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
                  <td style="text-align: center;"><strong><?php echo $salesqty; ?></strong></td>
                  <td style="text-align: right;"><strong><?php echo number_format($salesamount, 2); ?></strong></td>
                  <td style="text-align: center;"><strong><?php echo $returnqty; ?></strong></td>
                  <td style="text-align: right;"><strong><?php echo number_format($returnamount, 2); ?></strong></td>
                  <td><strong></strong></td>
                  <td><strong></strong></td>
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



