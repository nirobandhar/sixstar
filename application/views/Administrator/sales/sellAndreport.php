<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">
<a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/sales_invoice', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Invoice</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/sales_challan', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Challan</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo base_url();?>Administrator/sales" title="" class="buttonAshiqe">Back To Sales</a>
<a href="<?php echo base_url();?>Administrator/wholesales" title="" class="buttonAshiqe">Back To Whole Sales</a>

<?php 
  $sql = mysql_query("SELECT tbl_salesmaster.*, tbl_salesmaster.AddBy as served,tbl_salesmaster.Status as state, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo where tbl_salesmaster.SaleMaster_SlNo = '$SalesID'");
  $selse = mysql_fetch_array($sql);
?>
    <table  cellspacing="0" cellpadding="0" width="80%">
        <tr>
            <td colspan="2" style="background:#ddd;" align="center"><h2 >Sales Invoice</h2></td>
        </tr>
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
    
    <table class="border" cellspacing="0" cellpadding="0" width="80%">
        <tr>
           <th>SI No.</th>
            <th>Product Name</th>
            <th>Company</th>
           <th>Model</th>
           <th>Size</th>
           <th>Unit</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Discount</th>
           <th>Amount</th>
        </tr>
        <?php
        $i = "";
        $totalamount = "";
        $packageName ="";
        $Ptotalamount = "";
        $PtotalSaleAmount = "";
        $ssql = mysql_query("SELECT tbl_saledetails.*, tbl_product.*,  tbl_salesmaster.*  FROM tbl_saledetails left join tbl_product on tbl_product.Product_SlNo = tbl_saledetails.Product_IDNo left join tbl_salesmaster on tbl_salesmaster.SaleMaster_SlNo = tbl_saledetails.SaleMaster_IDNo  where tbl_saledetails.SaleMaster_IDNo = '$SalesID'");
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
            <td style="text-align: right;"><?php echo number_format($rows['SaleDetails_Rate'], 2); ?></td>
            <td style="text-align: right;"><?php echo $rows['SaleDetails_Discount']; ?>%</td><!--Discount-->
            <td style="text-align: right;"><?php echo number_format($rows['discount_price'], 2); ?></td> <!--Amount Field-->
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
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Sub Total :</strong> </td>
            <td style="border:0px;text-align: right;"><?php $totalamount = $selse["SaleMaster_TotalSaleAmount"]; echo number_format($totalamount,2); ?></td>
        </tr>
        <tr>
            <td  style="border:0px"><strong>Previous Due</strong></td>
            <td  style="border:0px;color:red;text-align: right;">
                <!-- Previous Due Customer -->
                <?php $cusotomerID = $selse['Customer_SlNo']; 
                    $Customerpaid='';
                    $Customerpurchase='';
                    $sql = mysql_query("SELECT * FROM tbl_customer_payment WHERE CPayment_customerID = '".$cusotomerID."'");
                    while($row = mysql_fetch_array($sql)){
                        $Customerpaid = $Customerpaid+$row['CPayment_amount'];    
                    }
                    $sqls = mysql_query("SELECT * FROM tbl_salesmaster WHERE SalseCustomer_IDNo = '".$cusotomerID."'");
                    while($rows = mysql_fetch_array($sqls)){
                        $Customerpurchase = $Customerpurchase +$rows['SaleMaster_SubTotalAmount']; 
                    }
                    $vat = $selse['SaleMaster_TaxAmount'];  $vat = ($totalamount*$vat)/100;
                    $all = $totalamount-$selse['SaleMaster_TotalDiscountAmount']+ $selse['SaleMaster_Freight']+$vat-$selse['SaleMaster_RewordDiscount'];  $CurrenDue = $all-$selse['SaleMaster_PaidAmount'];
                     $previousdue= $Customerpurchase-$Customerpaid;
                     $previousdue = $previousdue-$CurrenDue;
                    if($previousdue==''){echo'0.00';}else{echo number_format($previousdue, 2);}
                ?>
                <!-- Previous Due Customer End -->
            </td>
            <td  style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Vat :</strong> </td>
            <td style="border:0px;text-align: right;"><?php echo number_format($vat, 2); ?></td>
        </tr>
        <tr>
            <td style="border:0px"><strong>Current Due</strong></td>
            <td style="border:0px;color:red;text-align: right;"><?php if($CurrenDue==''){echo '0.00';}else{echo number_format($CurrenDue, 2);} ?></td>
            <td style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Frieght :</strong> </td>
            <td style="border:0px;text-align: right;"><?php $Frieght = $selse['SaleMaster_Freight']; echo number_format($Frieght,2) ?></td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"><strong>Total Due</strong> </td>
            <td style="color:red;border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;text-align: right;"><?php if($previousdue+$CurrenDue==''){echo '0.00';}else{echo number_format(($previousdue+$CurrenDue), 2);} ?></td>
            <td style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Discount :</strong> </td>
            <td style="border:0px;text-align: right;"><?php $discount = $selse['SaleMaster_TotalDiscountAmount'];  /*$discount = ($totalamount*$discount)/100*/;
			echo number_format($discount,2) ?></td>
        </tr>
        <tr>
            <td style="border:0px"></td>
            <td style="border:0px"></td>
            <td style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Reword-Discount :</strong> </td>
            <td style="border:0px;text-align: right;"><?php $RewordDiscount = $selse['SaleMaster_RewordDiscount'];echo number_format($RewordDiscount,2) ?></td>
        </tr>
         <tr>
            <td colspan="8" style="border:0px"></td>
            <td colspan="2" style="border-top: 2px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"></td>
           
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Total :</strong> </td>
            <td style="border:0px;text-align: right;"><strong><?php $grandtotal = $totalamount-$discount+ $Frieght+$vat-$RewordDiscount; echo number_format($grandtotal,2)?></strong></td>
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Paid :</strong> </td>
            <td style="border:0px;text-align: right;"><?php $paid = $selse['SaleMaster_PaidAmount']; echo number_format($paid,2);?></td>
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td colspan="3" style="border-top: 2px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"></td>
           
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Due :</strong> </td>
            <td style="border:0px;text-align: right;"><?php echo number_format($grandtotal-$paid,2); ?></td>
        </tr>
    </table>
    <p><strong>In Word: </strong><?php

    function convertNumberToWord($num = false){
        $num = str_replace(array(',', ' '), '' , trim($num));
        if(! $num) {
            return false;
        }
        $num = (int) $num;
        $words = array();
        $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
            'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
        );
        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
            'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
            'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
        );
        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ( $tens < 20 ) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
            } else {
                $tens = (int)($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int) ($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        return implode(' ', $words);
    }
    $inword = convertNumberToWord($grandtotal)."Taka Only";
        echo ucwords($inword);
        ?></p><br>
    <p><strong>Notes: </strong> <?php echo $selse['SaleMaster_Description']; ?></p>

</div>