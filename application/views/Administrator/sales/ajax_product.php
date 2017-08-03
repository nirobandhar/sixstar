
<table>
    <tr>
        <td style="width:100px">Name</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="proName" class="inputclass" value="<?php echo $Product['Product_Name'] ?>">
            </div>
        </td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="proQTY" name="proQTY" autofocus onkeyup="keyUPAmount()" class="inputclass" value="" placeholder="0">
            </div>
        </td>
    </tr>
    <tr>
        <td>Rate</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="ProRATe" onkeyup="keyupamount2()" class="inputclass" value="<?php echo $Product['Product_SellingPrice'] ?>">
                <input type="hidden" id="ProPurchaseRATe" value="<?php echo $Product['Product_Purchase_Rate'] ?>">
            </div>
        </td>
    </tr>
    <tr>
        <td>Amount</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="ProductAmont" class="inputclass" value="" readonly="">
            </div>
        </td>
    </tr>
</table>


<?php $pid = $Product['Product_SlNo'];  
$reordlvl= $Product['Product_ReOrederLevel'];
$sqll = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo = '$pid'");
$rox = mysql_fetch_array($sqll);
$curentstock = $rox['SaleInventory_TotalQuantity'];
$tsaleretqty = $rox['SaleInventory_ReturnQuantity'];
$sqlss = mysql_query("SELECT * FROM tbl_purchaseinventory WHERE purchProduct_IDNo = '$pid'");
$roxx = mysql_fetch_array($sqlss);
$returnQty = $roxx['PurchaseInventory_ReturnQuantity'];
$damageQty = $roxx['PurchaseInventory_DamageQuantity'];

$sqltstock = mysql_query("SELECT *,SUM(total_branchqty) as totalqty FROM tbl_branchwise_product WHERE pro_codes = '$pid'");
$roxstock = mysql_fetch_array($sqltstock);
$perbranchqty = $roxstock['totalqty'];

$curentstock = $curentstock+$returnQty+$damageQty;
$curentstock = ($perbranchqty+$tsaleretqty)-$curentstock;
?>
<center>
<?php if(!empty($packagname)){ ?>
    <input type="hidden" id="STock" value="<?php echo $bulbstock; ?>">
    <?php }else {?>
    <input type="hidden" id="STock" value="<?php if(isset($curentstock)) {echo $curentstock;} ?>">
    <?php } ?>
    <input type="hidden" id="unitPro" value="<?php echo $Product['Unit_Name']; ?>"> 
    <input type="hidden" id="unitPur" value="<?php echo $Product['Product_Purchase_Rate']; ?>"> 
    <input type="hidden" id="reordlvl" value="<?php echo $reordlvl; ?>">  
</center>


