<?php
if($cid == '0'){
?>
<table>
    <tr>
        <td style="width:100px">Name</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="CusName" class="inputclass" autofocus>
            </div>
        </td>
    </tr>
    <tr>
        <td>Contact No</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="CusMobile" class="inputclass" value="">
            </div>
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td style="width:200px">
            <div class="full clearfix">
                <textarea  id="CusAddress" rows="2" class="inputclass"></textarea>
            </div>
        </td>
    </tr>
    
</table>
<?php    
}else{
    $SC = mysql_query("SELECT * FROM tbl_customer WHERE Customer_SlNo = '$cid'");
    $crow = mysql_fetch_array($SC);

    //Privious Due
    $totalpurchase = 0;
    $Totalpaid = 0;
    $due = 0;
    $paid = 0;

    $sql = mysql_query("SELECT * FROM tbl_customer_payment WHERE CPayment_customerID = '$cid'");
    //Paid
    while($row = mysql_fetch_array($sql)){

        $paid = $paid+$row['CPayment_amount'];

    }

    $salesAmnt =0;

    $sqls = mysql_query("SELECT * FROM tbl_salesmaster WHERE SalseCustomer_IDNo = '".$cid."'");
    //Total Sales Amnt
    while($rows = mysql_fetch_array($sqls)){
        $salesAmnt = $salesAmnt +$rows['SaleMaster_SubTotalAmount'];
    }


?>

<table>
    <tr>
        <td style="width:100px">Name</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="CusName" class="inputclass" value="<?php echo $crow['Customer_Name']; ?>" disabled="">
            </div>
        </td>
    </tr>
    <tr>
        <td>Contact No</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="CusMobile" class="inputclass" value="<?php echo $crow['Customer_Mobile']; ?>" disabled="">
            </div>
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td style="width:200px">
            <div class="full clearfix">
                <textarea name="" id="CusAddress" rows="2" class="inputclass" disabled=""><?php echo $crow['Customer_Address']; ?></textarea>
            </div>
        </td>
    </tr>
    <tr>
        <td>Credit Limit</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" id="CreditLimit" class="inputclass" value="<?php echo $crow['Customer_Credit_Limit']; ?>" disabled="">
                <input type="hidden" id="crPreviousDue" class="inputclass" value="<?php echo $salesAmnt - $paid; ?>" disabled="">
            </div>
        </td>
    </tr>
    
</table>
<?php
}
?>
