<?php $SalesID = $this->session->userdata('SalesIDdd'); ?>
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

            <img src="<?php echo base_url();?>images/address.jpg" alt="Logo" style="width:100%;margin-bottom:20px">

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
        <td colspan="2" style="background:#ddd;" align="center"><h2 >Sales Challan</h2></td>
    </tr>
    <tr>
        <td>
            <!-- Page Body of report-->
            <div class="printArea">

                <?php
                $sql = mysql_query("SELECT tbl_salesmaster.*, tbl_salesmaster.AddBy as served, tbl_salesmaster.Status as state, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo where tbl_salesmaster.SaleMaster_SlNo = '$id'");
                $selse = mysql_fetch_array($sql);
                ?>
                <table  cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                        <td>
                            <table width="100%">
                                <?php
                                $cusID = $selse['SalseCustomer_IDNo'];
                                if($cusID == 0){
                                    ?>
                                    <tr>
                                        <td><strong>Customer ID </strong></td>
                                        <td>:</td>
                                        <td><?php echo '0000'; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Customer Name </strong></td>
                                        <td>:</td>
                                        <td><?php echo $selse['SalseCustomer_Name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Customer Address </strong></td>
                                        <td>:</td>
                                        <td><?php echo $selse['SalseCustomer_Address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contact no </strong></td>
                                        <td>:</td>
                                        <td><?php echo $selse['SalseCustomer_Contact']; ?></td>
                                    </tr>
                                    <?php
                                }else{
                                    ?>
                                    <tr>
                                        <td><strong>Customer ID </strong></td>
                                        <td>:</td>
                                        <td><?php echo $selse['Customer_Code']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Customer Name </strong></td>
                                        <td>:</td>
                                        <td><?php echo $selse['Customer_Name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Customer Address </strong></td>
                                        <td>:</td>
                                        <td><?php echo $selse['Customer_Address']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Contact no </strong></td>
                                        <td>:</td>
                                        <td><?php echo $selse['Customer_Mobile']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </td>
                        <td>
                            <table width="100%">
                                <tr>
                                    <td><strong>Invoice no </strong></td>
                                    <td>:</td>
                                    <td><?php echo $selse['SaleMaster_InvoiceNo']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Sales Date </strong></td>
                                    <td>:</td>
                                    <td><?php echo $selse['SaleMaster_SaleDate']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Served by </strong></td>
                                    <td>:</td>
                                    <td><?php echo $selse['served']; ?></td>
                                </tr>
                                <?php if($selse['state']=='3'){?>
                                    <tr>
                                        <td><strong>Installment Date </strong></td>
                                        <td>:</td>
                                        <td><?php
                                            $sqlins = mysql_query("SELECT * FROM tbl_installment_date where invoiceid = '".$selse['SaleMaster_InvoiceNo']."'");
                                            $selseins = mysql_fetch_array($sqlins);
                                            $originalDate1 = $selseins['fistdate'];
                                            $newDate1 = date("F j, Y", strtotime($originalDate1));
                                            $originalDate2 = $selseins['secondate'];
                                            $newDate2 = date("F j, Y", strtotime($originalDate2));
                                            $originalDate3 = $selseins['thirdate'];
                                            $newDate3 = date("F j, Y", strtotime($originalDate3));
                                            echo $newDate1.", ".$newDate2.", ".$newDate3;
                                            ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr><hr></td>
                        <td colspan="2"><br></td>
                    </tr>
                </table>

                <table class="border" cellspacing="0" cellpadding="0" width="800px">
                    <tr>
                        <th style="width:58px">SI No.</th>
                        <th>Product Name</th>
                        <th>Company</th>
                        <th>Model</th>
                        <th>Size</th>
                        <th style="width:39px">Unit</th>
                        <th>Quantity</th>
                        <th style="width: 340px">Remarks</th>
                    </tr>
                    <?php
                    $i = "";
                    $totalamount = "";
                    $packageName ="";
                    $Ptotalamount = "";
                    $PtotalSaleAmount = "";
                    $ssql = mysql_query("SELECT tbl_saledetails.*, tbl_product.*,  tbl_salesmaster.*  FROM tbl_saledetails left join tbl_product on tbl_product.Product_SlNo = tbl_saledetails.Product_IDNo left join tbl_salesmaster on tbl_salesmaster.SaleMaster_SlNo = tbl_saledetails.SaleMaster_IDNo  where tbl_salesmaster.SaleMaster_SlNo = '$id'");
                    while($rows = mysql_fetch_array($ssql)){
                        $PtotalSaleAmount = $rows['SaleMaster_TotalSaleAmount']; /*After Discount Total amount*/
                        $packageName = $rows['packageName'];
                        if($packageName==""){
                            $amount = $rows['SaleDetails_Rate']*$rows['SaleDetails_TotalQuantity'] ;
                            //$totalamount = $totalamount+$amount;
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['Product_Name'] ?></td>
                                <td><?php
                                    $ssqlsmodel2 = mysql_query("SELECT * FROM tbl_productcategory where ProductCategory_SlNo = '".$rows['ProductCategory_ID']."'");
                                    $rowsmodel2 = mysql_fetch_array($ssqlsmodel2);
                                    echo $rowsmodel2['company'];
                                    ?></td>
                                <td><?php
                                    $ssqlsmodel = mysql_query("SELECT * FROM tbl_productcategory where ProductCategory_SlNo = '".$rows['ProductCategory_ID']."'");
                                    $rowsmodel = mysql_fetch_array($ssqlsmodel);
                                    echo $rowsmodel['ProductCategory_Name'];
                                    ?></td>
                                <td><?php
                                    $ssqlssize = mysql_query("SELECT * FROM tbl_produsize where Productsize_SlNo = '".$rows['sizeId']."'");
                                    $rowsize = mysql_fetch_array($ssqlssize);
                                    echo $rowsize['Productsize_Name'];
                                    ?></td>
                                <td><?php echo $rows['SaleDetails_unit']; ?></td>
                                <td style="text-align: center;"><?php echo $rows['SaleDetails_TotalQuantity'] ?></td>
                                <td></td>
                            </tr>
                        <?php } }
                    $ssqls = mysql_query("SELECT tbl_saledetails.*, tbl_product.*  FROM tbl_saledetails left join tbl_product on tbl_product.Product_SlNo = tbl_saledetails.Product_IDNo where tbl_saledetails.SaleMaster_IDNo = '$SalesID' group by tbl_saledetails.packageName");
                    while($rows = mysql_fetch_array($ssqls)){ $i++;
                        if($rows['packageName']!=""){
                            $Pamount = $rows['packSellPrice']*$rows['SeleDetails_qty'] ;
                            $Ptotalamount = $Ptotalamount+$Pamount;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $rows['packageName'] ?></td>
                                <td><?php echo $rows['SeleDetails_qty'] ?> <?php echo $rows['SaleDetails_unit'] ?></td>
                                <td><?php echo $rows['packSellPrice'] ?></td>
                                <td><?php echo $Pamount; ?></td>
                            </tr>
                        <?php } }?>
                            <!-- Previous Due Customer End -->


            </div>
            <!-- End Page Body of report-->
        </td>
    </tr>
</table>


<style>
    .signature_area{
        position: fixed!important;
        bottom: 70px;
        width: 100%;
        left: 55px;
    }
    .signatureasdf {
        float: left;
        padding: 0px;
        color: black;
        width: 50%;
        font-size: 14px;
        font-family: tahoma;
    }

</style>
<div style="clear: both;"></div>
<div class="signature_area">

    <div class="signatureasdf">
        <span style="border-top:1px solid #000;">Checked & Delivery By</span>
    </div>

    <div class="signatureasdf">
        <span style="border-top:1px solid #000;">Authorized By</span>
    </div>
</div>




</body>
</html>

