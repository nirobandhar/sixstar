<?php  
$procode = $Product['Product_Code'];
$sqq = mysql_query("SELECT tbl_package_create.*, tbl_package.* FROM tbl_package_create left join tbl_package on tbl_package.package_ProCode = tbl_package_create.create_pacageID WHERE tbl_package_create.create_pacageID = '$procode' group by tbl_package_create.create_ID");
      $packagname = ""; 
      $packagprice = ""; 
    while($rom = mysql_fetch_array($sqq)){
       $pcode = $rom['create_proCode'];
       $packagname = $rom['package_name'];

    }
 $packagprice = trim($packagprice, ",");
?><input type="hidden" id="packagecode" value="<?php echo $procode; ?>">
<input type="hidden" id="packagename" value="<?php echo $packagname; ?>">
<table>
    <tr>
        <td> Name </td>
            <td style="width:150px">
                <div class="full clearfix" >
                    <input type="text" id="productName2" value="<?php echo $Product['Product_Name'] ?>" disabled="" class="inputclass">
                    <input type="hidden" id="productName" value="<?php echo $Product['Product_Name'] ?>" class="inputclass">
					<input type="hidden" id="ProductUnit" value="<?php echo $Product['Unit_Name'];?>" class="inputclass">
                </div>
            </td>
            <td> Quantity </td>
            <td style="width:80px">
                <div class="full clearfix">
                    <input type="text" id="PurchaseQTY" name="PurchaseQTY" value="" selected="1" class="inputclass" placeholder="0" onkeyup="calamount()">
                </div>
            </td>
            <td> Rate </td>
            <td style="width:100px">
                <div class="full clearfix">
                    <input type="text" id="ProductRATE" value="<?php echo $Product['Product_Purchase_Rate'] ?>" class="inputclass" onkeyup="calamount2()">
                    <input type="hidden" id="ProPurchaseRATe" value="<?php echo $Product['Product_Purchase_Rate'] ?>" class="inputclass">
                </div>
            </td>
            <td>Amount </td>
            <td style="width:100px">
                <div class="full clearfix">
                    <input type="text" id="totalant" class="inputclass">
                </div>
            </td>
             <td style="width:80px;padding-left:20px">
                <input class="buttonAshiqe" type="button" onclick="AddToPurchaseCart()" value="Add Cart">
            </td>
    </tr>
</table>