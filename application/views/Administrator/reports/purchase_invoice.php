
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
        <td colspan="2" style="background:#ddd;" align="center"><h2 >Purchase Invoice</h2></td>
    </tr>
    <tr>
        <td>
            <!-- Page Body -->
            <?php
            $sql = mysql_query("SELECT tbl_purchasemaster.*, tbl_purchasemaster.AddBy as served,tbl_purchasemaster.Status as state, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo where tbl_purchasemaster.PurchaseMaster_SlNo = '$id'");
            $selse = mysql_fetch_array($sql);
            ?>
            <table  cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td>
                        <table width="100%">
                            <tr>
                                <td><strong>Supplier ID </strong></td>
                                <td>:</td>
                                <td><?php echo $selse['Supplier_Code']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Supplier Name </strong></td>
                                <td>:</td>
                                <td><?php echo $selse['Supplier_Name']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Customer Address </strong></td>
                                <td>:</td>
                                <td><?php echo $selse['Supplier_Address']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Contact no </strong></td>
                                <td>:</td>
                                <td><?php echo $selse['Supplier_Mobile']; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td><strong>Invoice no </strong></td>
                                <td>:</td>
                                <td><?php echo $selse['PurchaseMaster_InvoiceNo']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Purchase Date </strong></td>
                                <td>:</td>
                                <td><?php echo $selse['PurchaseMaster_OrderDate']; ?></td>
                            </tr>
                            <tr>
                                <td><strong>Input BY </strong></td>
                                <td>:</td>
                                <td><?php echo $selse['served']; ?></td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </td>

        <!-- Page Body end -->
    </tr>
    <tr>
        <td colspan="2"><br></td>
    </tr>
    <tr>
        <td>
            <table class="border" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <th>SI No.</th>
                    <th>Product Name</th>
                    <th>Product Name</th>
                    <th>Model</th>
                    <th>Company</th>
                    <th>Size</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
                <?php $i = "";
                $totalamount = "";
                $Ptotalamount = "";

                $ssql = mysql_query("SELECT tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr, tbl_product.* FROM tbl_purchasedetails left join tbl_product on tbl_product.Product_SlNo = tbl_purchasedetails.Product_IDNo where tbl_purchasedetails.PurchaseMaster_IDNo = '$id' Group By tbl_purchasedetails.Product_IDNo");
                while($rows = mysql_fetch_array($ssql)){
                    $PackName = $rows['PackName'];
                    if($PackName==""){

                        $i++;
                        $amount = $rows['PurchaseDetails_Rate']*$rows['totalqty'] ;
                        $totalamount = $totalamount+$amount;
                        ?>
                        <tr>
                            <td align="center"><?php echo $i; ?></td>
                            <td><?php echo $rows['Product_Name']; ?></td>
                            <td><?php $pid= $rows['Product_IDNo'];
                                $allbranch="";
                                $ssqlgodown = mysql_query("SELECT tbl_purchasedetails.PurchaseDetails_branchID,tbl_purchasedetails.PurchaseDetails_TotalQuantity,tbl_brunch.* FROM tbl_purchasedetails left join tbl_brunch on tbl_brunch.brunch_id = tbl_purchasedetails.PurchaseDetails_branchID where tbl_purchasedetails.PurchaseMaster_IDNo = '$id' AND tbl_purchasedetails.Product_IDNo='".$pid."'");
                                while($rowsgodown = mysql_fetch_array($ssqlgodown)){
                                    $allbranch .=$rowsgodown['Brunch_name']." - ".$rowsgodown['PurchaseDetails_TotalQuantity'].",";
                                }
                                echo $allbranch;
                                ?></td>
                            <td><?php
                                $ssqlsmodel = mysql_query("SELECT * FROM tbl_productcategory where ProductCategory_SlNo = '".$rows['ProductCategory_ID']."'");
                                $rowsmodel = mysql_fetch_array($ssqlsmodel);
                                echo $rowsmodel['ProductCategory_Name'];
                                ?></td>
                            <td><?php
                                $ssqlsmodel2 = mysql_query("SELECT * FROM tbl_productcategory where ProductCategory_SlNo = '".$rows['ProductCategory_ID']."'");
                                $rowsmodel2 = mysql_fetch_array($ssqlsmodel2);
                                echo $rowsmodel2['company'];
                                ?></td>
                            <td><?php
                                $ssqlssize = mysql_query("SELECT * FROM tbl_produsize where Productsize_SlNo = '".$rows['sizeId']."'");
                                $rowsize = mysql_fetch_array($ssqlssize);
                                echo $rowsize['Productsize_Name'];
                                ?></td>
                            <td style="text-align: center;"><?php echo $rows['PurchaseDetails_Unit']; ?></td>
                            <td style="text-align: center;"><?php echo $rows['totalqty']; ?></td>
                            <td style="text-align: right;"><?php echo number_format($rows['PurchaseDetails_Rate'], 2); ?></td>
                            <td style="text-align: right;"><?php echo number_format($amount, 2); ?></td>
                        </tr>
                    <?php } }
                $ssqlx = mysql_query("SELECT tbl_purchasedetails.*, tbl_product.* FROM tbl_purchasedetails left join tbl_product on tbl_product.Product_SlNo = tbl_purchasedetails.Product_IDNo where tbl_purchasedetails.PurchaseMaster_IDNo = '$id' group by tbl_purchasedetails.PackName");
                while($rows= mysql_fetch_array($ssqlx)){
                    if($rows['PackName']!=""){    $i++;
                        $Pamount = $rows['PackPice']*$rows['Pack_qty'] ;
                        $Ptotalamount = $Ptotalamount+$Pamount;

                        ?>
                        <tr>
                            <td align="center"><?php echo $i; ?></td>
                            <td ><?php echo $rows['PackName'] ?></td>
                            <td align="center"><?php echo $rows['Pack_qty']; ?>
                                <?php echo $rows['PurchaseDetails_Unit']; ?></td>
                            <td align="center"><?php echo $rows['PackPice'] ?></td>
                            <td><?php echo $Pamount; ?></td>
                        </tr>
                    <?php } }?>
                <tr>
                    <td colspan="8" style="border:0px"></td>
                    <td style="border:0px"><strong>Sub Total :</strong> </td>
                    <td style="border:0px;text-align: right;"><?php $totalamount = $Ptotalamount+$totalamount; echo number_format($totalamount,2); ?></td>
                </tr>
                <tr>
                    <td colspan="3"  style="border:0px"><strong>Previous Due</strong></td>
                    <td  style="border:0px;color:red;text-align: right;">
                        <!-- Previous Due Customer -->
                        <?php $SupllierID = $selse['Supplier_SlNo'];
                        $Supplierpaid='';
                        $Supplierpurchase='';
                        $sql = mysql_query("SELECT * FROM tbl_supplier_payment WHERE SPayment_customerID = '".$SupllierID."'");
                        while($row = mysql_fetch_array($sql)){
                            $Supplierpaid = $Supplierpaid+$row['SPayment_amount'];
                        }

                        $sqls = mysql_query("SELECT * FROM tbl_purchasemaster WHERE Supplier_SlNo = '".$SupllierID."'");
                        while($rows= mysql_fetch_array($sqls)){
                            $Supplierpurchase = $Supplierpurchase+$rows['PurchaseMaster_SubTotalAmount'];
                        }
                        $vat = $selse['PurchaseMaster_Tax'];  $vat = ($totalamount*$vat)/100;
                        $all = $totalamount-$selse['PurchaseMaster_DiscountAmount']+ $selse['PurchaseMaster_Freight']+$vat+$selse['PurchaseMaster_LabourCost'];  $CurrenDue = $all-$selse['PurchaseMaster_PaidAmount'];
                        $previousdue= $Supplierpurchase-$Supplierpaid;
                        $previousdue = $previousdue-$CurrenDue;
                        if($previousdue==''){echo'0.00';}else{echo number_format($previousdue, 2);}
                        ?>
                        <!-- Previous Due Customer End -->
                    </td>
                    <td  style="border:0px" colspan="4"></td>
                    <td style="border:0px"><strong>Vat :</strong> </td>
                    <td style="border:0px;text-align: right;"><?php echo number_format($vat, 2); ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="border:0px"><strong>Current Due</strong></td>
                    <td style="border:0px;color:red;text-align: right;"><?php if($CurrenDue==''){echo '0.00';}else{echo number_format($CurrenDue, 2);} ?></td>
                    <td style="border:0px" colspan="4"></td>
                    <td style="border:0px"><strong>Frieght :</strong> </td>
                    <td style="border:0px;text-align: right;"><?php $Frieght = $selse['PurchaseMaster_Freight']; echo number_format($Frieght,2) ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"><strong>Total Due</strong> </td>
                    <td style="color:red;border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;text-align: right;"><?php if($previousdue+$CurrenDue==''){echo '0.00';}else{echo number_format(($previousdue+$CurrenDue), 2);} ?></td>
                    <td style="border:0px" colspan="4"></td>
                    <td style="border:0px"><strong>Discount :</strong> </td>
                    <td style="border:0px;text-align: right;"><?php $discount = $selse['PurchaseMaster_DiscountAmount'];echo number_format($discount,2) ?></td>
                </tr>
                <tr>
                    <td colspan="8" style="border:0px"></td>
                    <td style="border-top: 0px;border-left: 0px ;border-right: 0px ;border-bottom: 2px solid #999;"><strong>Labour Cost</strong></td>
                    <td colspan="2" style="border-top: 0px;border-left: 0px ;border-right: 0px ;border-bottom: 2px solid #999; text-align: right;"><?php $labourcost = $selse['PurchaseMaster_LabourCost'];echo number_format($labourcost,2) ?></td>

                </tr>
                <tr>
                    <td colspan="8" style="border:0px"></td>
                    <td style="border:0px"><strong>Total :</strong> </td>
                    <td style="border:0px;text-align: right;"><strong><?php $grandtotal = $totalamount-$discount+ $Frieght+$vat+$labourcost; echo number_format($grandtotal,2)?></strong></td>
                </tr>
                <tr>
                    <td colspan="8" style="border:0px"></td>
                    <td style="border:0px"><strong>Paid :</strong> </td>
                    <td style="border:0px;text-align: right;"><?php $paid = $selse['PurchaseMaster_PaidAmount']; echo number_format($paid,2);?></td>
                </tr>
                <tr>
                    <td colspan="8" style="border:0px"></td>
                    <td colspan="2" style="border-top: 2px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"></td>

                </tr>
                <tr>
                    <td colspan="8" style="border:0px"></td>
                    <td style="border:0px"><strong>Due :</strong> </td>
                    <td style="border:0px;text-align: right;"><?php echo number_format($grandtotal-$paid,2); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <p><strong>In Word: </strong><?php

                function convertNumberToWord($number=false) {
                    error_reporting(E_ALL & ~E_NOTICE);
                    if(!$number){
                        return false;
                    }
                    $no = round($number);
                    $point = round($number - $no, 2) * 100;
                    $hundred = null;
                    $digits_1 = strlen($no);
                    $i = 0;
                    $str = array();
                    $words = array('0' => '', '1' => 'one', '2' => 'two',
                        '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
                        '7' => 'seven', '8' => 'eight', '9' => 'nine',
                        '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                        '13' => 'thirteen', '14' => 'fourteen',
                        '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                        '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                        '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                        '60' => 'sixty', '70' => 'seventy',
                        '80' => 'eighty', '90' => 'ninety');
                    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                    while ($i < $digits_1) {
                        $divider = ($i == 2) ? 10 : 100;
                        $number = floor($no % $divider);
                        $no = floor($no / $divider);
                        $i += ($divider == 10) ? 1 : 2;
                        if ($number) {
                            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                            $str [] = ($number < 21) ? $words[$number] .
                                //" " . $digits[$counter] . $plural . " " . $hundred
                                " " . $digits[$counter] . " " . $hundred
                                :
                                $words[floor($number / 10) * 10]
                                . " " . $words[$number % 10] . " "
                                //. $digits[$counter] . $plural . " " . $hundred;
                                . $digits[$counter] . " " . $hundred;
                        } else $str[] = null;
                    }
                    $str = array_reverse($str);
                    $result = implode('', $str);
                    $points = ($point) ?
                        "." . $words[$point / 10] . " " .
                        $words[$point = $point % 10] : '';
                    return $result;// . "Taka  " . $points . " Paise";
                }

                $inword = convertNumberToWord($grandtotal)."Taka Only";
                echo ucwords($inword);
                ?></p><br>
            <h4>Notes: <?php echo $selse['PurchaseMaster_Description']; ?></h4>

        </td>
    </tr>

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

