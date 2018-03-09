        <link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
        <div class="content_scroll" style="padding:40px 20px 25px 160px">
        <?php $cmonth;
        $fisrtday= date('Y-m-01', strtotime($cmonth));
        $lastday = date('Y-m-t', strtotime($cmonth));

        $startdate = base64_encode($fisrtday);
        $enddate = base64_encode($lastday);
        //Current summyry
        $totalsale = 0;
        $sqlsale = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SaleDate between  '$fisrtday' and '$lastday' Group BY SaleMaster_InvoiceNo");
        while($row = mysql_fetch_array($sqlsale)){
        $totalsale =$totalsale +$row['SaleMaster_SubTotalAmount'];
        }

        $totalrins = 0;
        $sqlreins = mysql_query("SELECT * FROM tbl_installment WHERE pay_date between  '$fisrtday' and '$lastday'");
        while($rowrins = mysql_fetch_array($sqlreins)){
        $totalrins =$totalrins +$rowrins['payment_amount'];
        }

        $totalins = 0;
        $sqlins = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SaleDate between  '$fisrtday' and '$lastday' AND Status='3'");
        while($rowins = mysql_fetch_array($sqlins)){
        $totalins =$totalins +$rowins['SaleMaster_PaidAmount'];
        }
        $totalcashsale = 0;
        $sqlcash = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SaleDate between  '$fisrtday' and '$lastday' AND Status!='2'");
        while($rowcash = mysql_fetch_array($sqlcash )){
        $totalcashsale =$totalcashsale +$rowcash['SaleMaster_PaidAmount'];
        }
        $totalwholesale = 0;
        $sqlwhole = mysql_query("SELECT * FROM tbl_customer_payment WHERE CPayment_date between  '$fisrtday' and '$lastday' AND status='2'");
        while($rowwhole = mysql_fetch_array($sqlwhole )){
        $totalwholesale =$totalwholesale +$rowwhole['CPayment_amount'];
        }

        $totaloutamount = 0;
        $sqlout = mysql_query("SELECT * FROM tbl_cashtransaction WHERE Tr_date between  '$fisrtday' and '$lastday'");
        while($rowout = mysql_fetch_array($sqlout )){
        $totaloutamount =$totaloutamount +$rowout['Out_Amount'];
        }

        $totalpurchase = 0;
        $sqlpurchase = mysql_query("SELECT * FROM tbl_purchasemaster WHERE PurchaseMaster_OrderDate between  '$fisrtday' and '$lastday'");
        while($rowpurchase = mysql_fetch_array($sqlpurchase )){
        $totalpurchase =$totalpurchase +$rowpurchase['PurchaseMaster_SubTotalAmount'];
        }

        $totalpurreturn = 0;
        $sqlpurret = mysql_query("SELECT tbl_purchasereturndetails.PurchaseReturnDetails_ReturnDate,tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo,tbl_purchasereturndetails.PurchaseReturnDetails_ReturnQuantity,tbl_product.Product_SlNo,tbl_product.Product_Purchase_Rate FROM tbl_purchasereturndetails Left Join tbl_product ON tbl_product.Product_SlNo=tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo WHERE tbl_purchasereturndetails.PurchaseReturnDetails_ReturnDate between  '$fisrtday' and '$lastday'");
        while($rowpurreturn = mysql_fetch_array($sqlpurret )){
        $totalpurreturn =$totalpurreturn + ($rowpurreturn['Product_Purchase_Rate']*$rowpurreturn['PurchaseReturnDetails_ReturnQuantity']);
        }
        $totalsaleitempurchasevalue = 0;
        $sqlsalepur = mysql_query("SELECT tbl_saledetails.SaleDetails_TotalQuantity,tbl_saledetails.Purchase_Rate,tbl_salesmaster.SaleMaster_SaleDate FROM tbl_saledetails Left Join tbl_salesmaster ON tbl_salesmaster.SaleMaster_SlNo=tbl_saledetails.SaleMaster_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$fisrtday' and '$lastday'");
        while($rowsalepur = mysql_fetch_array($sqlsalepur )){
        $totalsaleitempurchasevalue =$totalsaleitempurchasevalue + ($rowsalepur['Purchase_Rate']*$rowsalepur['SaleDetails_TotalQuantity']);
        }
        $totalsumcr = $totalrins+$totalins+$totalcashsale+$totalwholesale+$totaloutamount;
        $restamountcr = $totalsale-$totalsumcr;
        $crstocknow = ($totalpurchase+$totalpurreturn)-$totalsaleitempurchasevalue;
        //previous Summery
         $dateq = strtotime($fisrtday . ' -1 day');

        $psqlsale = mysql_query("SELECT SaleMaster_SaleDate FROM tbl_salesmaster Order by SaleMaster_SlNo ASC Limit 1");
        $prow = mysql_fetch_array($psqlsale);
        $salefdate = $prow['SaleMaster_SaleDate'];

        $ptotalsale = 0;
        $psqlsale = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SaleDate between  '$salefdate' and '$dateq'");
        while($prow = mysql_fetch_array($psqlsale)){
        $ptotalsale =$ptotalsale +$prow['SaleMaster_SubTotalAmount'];
        }

        $psqlsale = mysql_query("SELECT pay_date FROM tbl_installment Order by inspayid ASC Limit 1");
        $prow = mysql_fetch_array($psqlsale);
        $payfdate = $prow['pay_date'];
        $ptotalrins = 0;
        $psqlreins = mysql_query("SELECT * FROM tbl_installment WHERE pay_date between  '$payfdate' and '$dateq'");
        while($prowrins = mysql_fetch_array($psqlreins)){
        $ptotalrins =$ptotalrins +$prowrins['payment_amount'];
        }

        $ptotalins = 0;
        $psqlins = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SaleDate between  '$salefdate' and '$dateq' AND Status='3'");
        while($prowins = mysql_fetch_array($psqlins)){
        $ptotalins =$ptotalins +$prowins['SaleMaster_PaidAmount'];
        }
        $ptotalcashsale = 0;
        $psqlcash = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SaleDate between  '$salefdate' and '$dateq' AND Status!='2'");
        while($prowcash = mysql_fetch_array($psqlcash )){
        $ptotalcashsale =$ptotalcashsale +$prowcash['SaleMaster_PaidAmount'];
        }
        $psqlwsale = mysql_query("SELECT CPayment_date FROM tbl_customer_payment Order by CPayment_id ASC Limit 1");
        $prows = mysql_fetch_array($psqlwsale);
        $pwfdate = $prows['CPayment_date'];

        $ptotalwholesale = 0;
        $psqlwhole = mysql_query("SELECT * FROM tbl_customer_payment WHERE CPayment_date between  '$pwfdate' and '$salefdate' AND status='2' AND CPayment_Paymentby='By Cash'");
        while($prowwhole = mysql_fetch_array($psqlwhole )){
        $ptotalwholesale =$ptotalwholesale +$prowwhole['SaleMaster_PaidAmount'];
        }

        $psqltr = mysql_query("SELECT Tr_date FROM tbl_cashtransaction Order by Tr_SlNo ASC Limit 1");
        $prowtr = mysql_fetch_array($psqltr);
        $trfdate = $prowtr['Tr_date'];

        $ptotaloutamount = 0;
        $psqlout = mysql_query("SELECT * FROM tbl_cashtransaction WHERE Tr_date between  '$trfdate' and '$dateq'");
        while($prowout = mysql_fetch_array($psqlout )){
        $ptotaloutamount =$ptotaloutamount +$prowout['Out_Amount'];
        }

        $psqlpr = mysql_query("SELECT PurchaseMaster_OrderDate FROM tbl_purchasemaster Order by PurchaseMaster_SlNo ASC Limit 1");
        $prowpr = mysql_fetch_array($psqlpr);
        $prfdate = $prowpr['PurchaseMaster_OrderDate'];

        $ptotalpurchase = 0;
        $psqlpurchase = mysql_query("SELECT * FROM tbl_purchasemaster WHERE PurchaseMaster_OrderDate between  '$prfdate' and '$dateq'");
        while($prowpurchase = mysql_fetch_array($psqlpurchase )){
        $ptotalpurchase =$ptotalpurchase +$prowpurchase['PurchaseMaster_SubTotalAmount'];
        }

        $psqlprret = mysql_query("SELECT PurchaseReturnDetails_ReturnDate FROM tbl_purchasereturndetails Order by PurchaseReturnDetails_SlNo ASC Limit 1");
        $prowprret = mysql_fetch_array($psqlprret);
        $pretfdate = $prowprret['PurchaseReturnDetails_ReturnDate'];

        $ptotalpurreturn = 0;
        $psqlpurret = mysql_query("SELECT tbl_purchasereturndetails.PurchaseReturnDetails_ReturnDate,tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo,tbl_purchasereturndetails.PurchaseReturnDetails_ReturnQuantity,tbl_product.Product_SlNo,tbl_product.Product_Purchase_Rate FROM tbl_purchasereturndetails Left Join tbl_product ON tbl_product.Product_SlNo=tbl_purchasereturndetails.PurchaseReturnDetailsProduct_SlNo WHERE tbl_purchasereturndetails.PurchaseReturnDetails_ReturnDate between  '$pretfdate' and '$dateq'");
        while($prowpurreturn = mysql_fetch_array($psqlpurret )){
        $ptotalpurreturn =$ptotalpurreturn + ($prowpurreturn['Product_Purchase_Rate']*$prowpurreturn['PurchaseReturnDetails_ReturnQuantity']);
        }

        $ptotalsaleitempurchasevalue = 0;
        $psqlsalepur = mysql_query("SELECT tbl_saledetails.SaleDetails_TotalQuantity,tbl_saledetails.Purchase_Rate,tbl_salesmaster.SaleMaster_SaleDate FROM tbl_saledetails Left Join tbl_salesmaster ON tbl_salesmaster.SaleMaster_SlNo=tbl_saledetails.SaleMaster_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$salefdate' and '$dateq'");
        while($prowsalepur = mysql_fetch_array($psqlsalepur )){
        $ptotalsaleitempurchasevalue =$ptotalsaleitempurchasevalue + ($prowsalepur['Purchase_Rate']*$prowsalepur['SaleDetails_TotalQuantity']);
        }
        $totalsum = $ptotalrins+$ptotalins+$ptotalcashsale+$ptotalwholesale+$ptotaloutamount;
        $restamount = $ptotalsale-$totalsum;
        $crstock = ($ptotalpurchase+$ptotalpurreturn)-$ptotalsaleitempurchasevalue;
        ?>
        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/monthlysummery?std=<?php echo $startdate;?>&ltd=<?php echo $enddate;?>', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <table class="border" cellspacing="0" cellpadding="0" width="95%">
                <tr bgcolor="#89B03E">
                    <th colspan="2">Calculate Sale</th>
                </tr>
               <tr>
                <td>Previous Sale</td>
                <td style="text-align: right;">+ <?php echo number_format($restamount, 2);?></td>
               </tr>
               <tr>
                <td>Current Sale</td>
                <td style="text-align: right;">+ <?php echo number_format($totalsale, 2);?></td>
               </tr>
               <tr>
                <th>Total</th>
                <th style="text-align: right;"><?php $sumoftsale= $restamount + $totalsale; echo number_format($sumoftsale, 2);?></th>
               </tr>
               <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
               </tr>
               <tr>
                <td>Installment Received</td>
                <td style="text-align: right;">+ <?php echo number_format($totalrins, 2);?></td>
               </tr>
               <tr>
                <td>Retail Sale</td>
                <td style="text-align: right;">+ <?php echo number_format($totalcashsale, 2);?></td>
               </tr>
               <tr>
                <td>Downpayment</td>
                <td style="text-align: right;">+ <?php echo number_format($totalins, 2);?></td>
               </tr>
               <tr>
                <td>WholeSale Received</td>
                <td style="text-align: right;">+ <?php echo number_format($totalwholesale, 2);?></td>
               </tr>
               <tr>
                <td>Others</td>
                <td style="text-align: right;">+ <?php echo number_format($totaloutamount, 2);?></td>
               </tr>
               <tr>
                <th>Total</th>
                <th style="text-align: right;"><?php echo number_format($totalsumcr, 2);?></th>
               </tr>
               <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
               </tr>
                <tr>
                <th>Calculate Sale Amount</th>
                <th style="text-align: right;"><?php echo number_format(($sumoftsale-$totalsumcr), 2);?></th>
               </tr>
                <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
               </tr>
               <tr bgcolor="#89B03E">
                    <th colspan="2">Calculate Stock Value</th>
                </tr>
                <tr>
                <td>Previous Purchase stock value</td>
                <td style="text-align: right;">+ <?php echo number_format($crstock, 2);?></td>
               </tr>
               <tr>
                <td>Current Purchase stock value</td>
                <td style="text-align: right;">+ <?php echo number_format($totalpurchase, 2);?></td>
               </tr>
               <tr>
                <td>Return stock value</td>
                <td style="text-align: right;">+ <?php echo number_format($totalpurreturn, 2);?></td>
               </tr>
               <tr>
                <th>Total</th>
                <th style="text-align: right;"><?php $reststock = $crstock + $totalpurchase+$totalpurreturn;
                echo number_format($reststock, 2);
                ?></th>
               </tr>
               <tr>
                <th>&nbsp;</th>
                <td>&nbsp;</td>
               </tr>
               <tr>
                <td>Purchase rate for Sale product</td>
                <td style="text-align: right;">+ <?php echo number_format($totalsaleitempurchasevalue, 2);?></td>
               </tr>
               <tr>
                <th>Current Stock Value</th>
                <th style="text-align: right;"><?php echo number_format(($reststock-$totalsaleitempurchasevalue), 2);?></th>
               </tr>
            </table>
        </div>
