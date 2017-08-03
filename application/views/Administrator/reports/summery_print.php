<?php
$startdate = $this->session->userdata('startdate');
$enddate = $this->session->userdata('enddate');

?>
<!DOCTYPE html>

<html>

<head>

<title> </title>

<meta charset='utf-8'>

    <link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

    <link href="<?php echo base_url()?>assets/css/custom-styles.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/print.css">

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

            <td colspan="2" style="background:#ddd;" align="center"><h2 >Cash View</h2></td>

        </tr>
        <tr>

            <td colspan="2">
                <table width="100%">
                    <tr bgcolor="#ccc">
                        <th>Sales</th> 
                        <th>Customer Payment</th> 
                    </tr>
                    <tr>
                        <td style="width: 50%;vertical-align: top;">
                            <table width="100%" class="border">
                                <tr>
                                    <th>S/N</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                </tr>
                                <?php
                                    $i = 0;
                                    $totalSales = 0;
                                    $SQ = mysql_query("SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster LEFT JOIN tbl_customer ON tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate BETWEEN '$startdate' AND '$enddate'");
                                    while ($srow = mysql_fetch_array($SQ)) {
                                        $i++;
                                        $totalSales += $srow['SaleMaster_SubTotalAmount'];
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $i; ?></td>
                                    <td style="text-align: left;"><?php echo $srow['Customer_Name']; ?> - <?php echo $srow['Customer_Code']; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($srow['SaleMaster_SubTotalAmount'], 2); ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                                    <td style="text-align: right;"><strong><?php echo number_format($totalSales, 2); ?></strong></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 50%;vertical-align: top;">
                            <table width="100%" class="border">
                                <tr>
                                    <th>S/N</th>
                                    <th>Custoner</th>
                                    <th>Amount</th>
                                </tr>
                                <?php
                                    $k = 0;
                                    $totalCP = 0;
                                    $SCP = mysql_query("SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment LEFT JOIN tbl_customer ON tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID WHERE tbl_customer_payment.CPayment_date BETWEEN '$startdate' AND '$enddate'");
                                    while ($cprow = mysql_fetch_array($SCP)) {
                                        if($cprow['CPayment_amount'] != 0){
                                            $k++;
                                            $totalCP += $cprow['CPayment_amount'];
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $k; ?></td>
                                    <td style="text-align: left;"><?php echo $cprow['Customer_Name']; ?> - <?php echo $cprow['Customer_Code']; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($cprow['CPayment_amount'], 2); ?></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                                    <td style="text-align: right;"><strong><?php echo number_format($totalCP, 2); ?></strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr bgcolor="#ccc">
                        <th>Purchase</th> 
                        <th>Supplier Payment</th> 
                    </tr>
                    <tr>
                        <td style="width: 50%;vertical-align: top;">

                            <table width="100%" class="border">
                                <tr>
                                    <th>S/N</th>
                                    <th>Supplier</th>
                                    <th>Amount</th>
                                </tr>
                                <?php
                                    $j = 0;
                                    $totalPurchase = 0;
                                    $SP = mysql_query("SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster LEFT JOIN tbl_supplier ON tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.PurchaseMaster_OrderDate BETWEEN '$startdate' AND '$enddate'");
                                    while ($prow = mysql_fetch_array($SP)) {
                                            $j++;
                                            $totalPurchase += $prow['PurchaseMaster_SubTotalAmount'];
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $j; ?></td>
                                    <td style="text-align: left;"><?php echo $prow['Supplier_Name']; ?> - <?php echo $prow['Supplier_Code']; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($prow['PurchaseMaster_SubTotalAmount'], 2); ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                                    <td style="text-align: right;"><strong><?php echo number_format($totalPurchase, 2); ?></strong></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 50%;vertical-align: top;">
                            <table width="100%" class="border">
                                <tr>
                                    <th>S/N</th>
                                    <th>Supplier</th>
                                    <th>Amount</th>
                                </tr>
                                <?php
                                    $l = 0;
                                    $totalSP = 0;
                                    $SSP = mysql_query("SELECT tbl_supplier_payment.*, tbl_supplier.* FROM tbl_supplier_payment LEFT JOIN tbl_supplier ON tbl_supplier.Supplier_SlNo = tbl_supplier_payment.SPayment_customerID WHERE tbl_supplier_payment.SPayment_date BETWEEN '$startdate' AND '$enddate'");
                                    while ($sprow = mysql_fetch_array($SSP)) {
                                        if($sprow['SPayment_amount'] != 0){
                                            $l++;
                                            $totalSP += $sprow['SPayment_amount'];
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $l; ?></td>
                                    <td style="text-align: left;"><?php echo $sprow['Supplier_Name']; ?> - <?php echo $sprow['Supplier_Code']; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($sprow['SPayment_amount'], 2); ?></td>
                                </tr>
                                <?php
                                    }}
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                                    <td style="text-align: right;"><strong><?php echo number_format($totalSP, 2); ?></strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr bgcolor="#ccc">
                        <th>Bank Deposit</th> 
                        <th>Bank Withdraw</th> 
                    </tr>
                    <tr>
                        <td style="width: 50%;vertical-align: top;">
                            <table width="100%" class="border">
                                <tr>
                                    <th>S/N</th>
                                    <th>Account</th>
                                    <th>Amount</th>
                                </tr>
                                <?php 
                                    $m = 0;
                                    $totalBD = 0;
                                    $SBD = mysql_query("SELECT tbl_cashtransaction.*, tbl_account.* FROM tbl_cashtransaction LEFT JOIN   tbl_account ON tbl_account.Acc_SlNo = tbl_cashtransaction.Acc_SlID WHERE tbl_cashtransaction.Tr_Type = 'Deposit To Bank' AND tbl_cashtransaction.Tr_date BETWEEN '$startdate' AND '$enddate'");
                                    while ($bdrow = mysql_fetch_array($SBD)) {
                                        $m++;
                                        $totalBD += $bdrow['In_Amount'];
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $m; ?></td>
                                    <td style="text-align: left;"><?php echo $bdrow['Acc_Name']; ?> - <?php echo $bdrow['Acc_Code']; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($bdrow['In_Amount'], 2); ?></td>
                                </tr>
                                <?php        
                                    }

                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                                    <td style="text-align: right;"><strong><?php echo number_format($totalBD, 2); ?></strong></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 50%;vertical-align: top;">
                            <table width="100%" class="border">
                                <tr>
                                    <th>S/N</th>
                                    <th>Account</th>
                                    <th>Amount</th>
                                </tr>
                                <?php 
                                    $m = 0;
                                    $totalBW = 0;
                                    $SBD = mysql_query("SELECT tbl_cashtransaction.*, tbl_account.* FROM tbl_cashtransaction LEFT JOIN   tbl_account ON tbl_account.Acc_SlNo = tbl_cashtransaction.Acc_SlID WHERE tbl_cashtransaction.Tr_Type = 'Withdraw Form Bank' AND tbl_cashtransaction.Tr_date BETWEEN '$startdate' AND '$enddate'");
                                    while ($bdrow = mysql_fetch_array($SBD)) {
                                        $m++;
                                        $totalBW += $bdrow['Out_Amount'];
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $m; ?></td>
                                    <td style="text-align: left;"><?php echo $bdrow['Acc_Name']; ?> - <?php echo $bdrow['Acc_Code']; ?></td>
                                    <td style="text-align: right;"><?php echo number_format($bdrow['Out_Amount'], 2); ?></td>
                                </tr>
                                <?php        
                                    }

                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: right;"><strong>Total</strong></td>
                                    <td style="text-align: right;"><strong><?php echo number_format($totalBW, 2); ?></strong></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
        

    </table>

</body>
</html>