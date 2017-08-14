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
        <td colspan="2" style="background:#ddd;" align="center"><h2 >Sales Invoice</h2></td>
    </tr>
    <tr>
        <td>
            <!-- Page Body -->
            <div style="border: 1px solid #ddd; padding: 15px; margin-top:10px;">
                <?php
                $sql2 = mysql_query("SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo where tbl_salesmaster.SaleMaster_InvoiceNo = '$invoices'");
                $selse = mysql_fetch_array($sql2);
                ?>
                <table  cellspacing="0" cellpadding="0" width="100%" style="margin-bottom:25px;">
                    <tr>
                        <td>
                            <table width="60%">
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

                            </table>
                        </td>
                        <td>
                            <table width="60%">

                                <tr>
                                    <td><strong>Return Date </strong></td>
                                    <td>:</td>
                                    <td>
                                    <?php $dt = new DateTime("now", new DateTimeZone('Asia/Dhaka'));
                                    echo $dt->format('d/m/Y'); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Customer Address </strong></td>
                                    <td>:</td>
                                    <td><?php echo $selse['Customer_Address']; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Contact no </strong></td>
                                    <td>:</td>
                                    <td><?php echo $selse['Customer_Phone']; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <style>
                    .zebrafff th,.zebrafff td {
                        border: 1px solid #ddd;
                    }
                </style>
                <table  class="zebrafff" style="border: 1px solid #ddd; text-align:left;width:100%;border-collapse:collapse;">

                    <tr>

                        <th>Product</th>

                        <th>Saes Rate</th>

                        <th>Total Qty</th>

                        <th>Total Amount</th>

                        <th>Already Retuned Qty</th>

                        <th>Already Retuned Amount</th>

                        <th>Retuned Qty</th>

                        <th>Retuned Amount</th>

                    </tr>



                    <?php

                    $sqls = mysql_query("SELECT tbl_saledetails.*, tbl_product.*,tbl_salesmaster.*,tbl_salereturn.*, tbl_salereturn.SaleMaster_InvoiceNo as invoice FROM tbl_saledetails left join tbl_product on tbl_product.Product_SlNo=tbl_saledetails.Product_IDNo left join tbl_salesmaster on tbl_salesmaster.SaleMaster_SlNo=tbl_saledetails.SaleMaster_IDNo left join tbl_salereturn on tbl_salereturn.SaleMaster_InvoiceNo = tbl_salesmaster.SaleMaster_InvoiceNo WHERE tbl_salesmaster.SaleMaster_InvoiceNo = '$invoices'");

                    while($rox = mysql_fetch_array($sqls)){

                        $PackName = $rox['packageName'];

                        if($PackName==""){

                            $sprid = $rox['Product_SlNo'];

                            $sprternid = $rox['SaleReturn_SlNo'];

                            $treteun ='';

                            $tamount ='';

                            $sql22 = mysql_query("SELECT * FROM tbl_salereturndetails WHERE SaleReturnDetailsProduct_SlNo = '$sprid' AND SaleReturn_IdNo='$sprternid'");

                            while($rox22 = mysql_fetch_array($sql22)){

                                $treteun = $rox22['SaleReturnDetails_ReturnQuantity']+$treteun;

                                $tamount = $rox22['SaleReturnDetails_ReturnAmount']+$tamount ;

                            }

                            ?>

                            <tr class='wrapper'>

                                <td><?php echo $rox['Product_Name'];?></td>

                                <td><?php echo $rox['SaleDetails_Rate'];?></td>

                                <td><?php echo $rox['SaleDetails_TotalQuantity'];?></td>

                                <td><?php echo $rox['SaleDetails_Rate']*$rox['SaleDetails_TotalQuantity'];?></td>

                                <td><?php echo $rox['SaleDetails_SlNo'];?></td>

                                <td><?php echo $rox['SaleDetails_SlNo'];?></td>

                                <td><?php echo $rox['SaleDetails_SlNo']; ?>/td>

                                <td><?php echo $rox['SaleDetails_SlNo']; ?></td>

                                <!--<td><?php /*echo $invoices; */?></td>
                                <td><?php /*echo $rox['Product_SlNo']; */?></td>
                                <td><?php /*echo $rox['SaleDetails_SlNo']; */?></td>
                                <td><?php /*echo $rox['SaleDetails_TotalQuantity']; */?></td>
                                <td><?php /*echo $rox['SaleDetails_SlNo']; */?></td>-->

                            </tr>

                        <?php } }?>


                </table>

                <?php
                    $sql2f = mysql_query("SELECT * FROM tbl_salereturn where SaleMaster_InvoiceNo = '$invoices'");
                    $selse_return = mysql_fetch_array($sql2f);
                ?>

               <p> <?php echo "<strong>Notes:</strong>".$selse_return['SaleReturn_Description']; ?></p>
            </div>

            <!-- Page Body end -->
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