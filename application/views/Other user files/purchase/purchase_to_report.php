<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">
<a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/Purchase_invoice', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php echo base_url();?>Administrator/purchase" title="" class="buttonAshiqe">Back To Purchase</a>
<br>
<br>
<?php 
  $sql = mysql_query("SELECT tbl_purchasemaster.*, tbl_purchasemaster.AddBy as served, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo where tbl_purchasemaster.PurchaseMaster_SlNo = '$PurchID'");
  $selse = mysql_fetch_array($sql);
?>
    <table  cellspacing="0" cellpadding="0" width="70%">
        <tr>
            <td colspan="2" style="background:#ddd;" align="center"><h2 >Purchase Invoice</h2></td>
        </tr>
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
        <tr>
            <td colspan="2"><hr><hr></td>
            <td colspan="2"><br></td>
        </tr>
    </table>
    
    <table class="border" cellspacing="0" cellpadding="0" width="70%">
        <tr>
           <th>SI No.</th>
           <th>Product Name</th>
           <th>Product Name</th>
           <th>Model</th>
           <th>Company</th>
           <th>Size</th>
           <th>Unit</th>
            <th>Rate</th>
           <th>Quantity</th>
           <th>Amount</th>
        </tr>
        <?php $i = "";
        $totalamount = "";
        $Ptotalamount = "";
        $ssql = mysql_query("SELECT tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr, tbl_product.* FROM tbl_purchasedetails left join tbl_product on tbl_product.Product_SlNo = tbl_purchasedetails.Product_IDNo where tbl_purchasedetails.PurchaseMaster_IDNo = '$PurchID' Group By tbl_purchasedetails.Product_IDNo");
        while($rows = mysql_fetch_array($ssql)){ 
            $PackName = $rows['PackName'];
            if($PackName==""){

            $i++;
            $amount = $rows['PurchaseDetails_Rate']*$rows['totalqty'] ;
            $totalamount = $totalamount+$amount;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $rows['Product_Name']; ?></td>
            <td><?php $pid= $rows['Product_IDNo'];
			$allbranch="";
			$ssqlgodown = mysql_query("SELECT tbl_purchasedetails.PurchaseDetails_branchID,tbl_purchasedetails.PurchaseDetails_TotalQuantity,tbl_brunch.* FROM tbl_purchasedetails left join tbl_brunch on tbl_brunch.brunch_id = tbl_purchasedetails.PurchaseDetails_branchID where tbl_purchasedetails.PurchaseMaster_IDNo = '$PurchID' AND tbl_purchasedetails.Product_IDNo='".$pid."'");
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
			$ssqlssize = mysql_query("SELECT * FROM tbl_produsize where Productsize_SlNo = '".$rows['ProductCategory_ID']."'");
           $rowsize = mysql_fetch_array($ssqlssize);
		   echo $rowsize['Productsize_Name'];
			 ?></td>
             <td><?php echo $rows['PurchaseDetails_Unit']; ?></td>
            <td><?php echo $rows['PurchaseDetails_Rate']; ?></td>
            <td><?php echo $rows['totalqty']; ?></td>
            <td><?php echo $amount; ?></td>
        </tr>
        <?php } }
            $ssqlx = mysql_query("SELECT tbl_purchasedetails.*, tbl_product.* FROM tbl_purchasedetails left join tbl_product on tbl_product.Product_SlNo = tbl_purchasedetails.Product_IDNo where tbl_purchasedetails.PurchaseMaster_IDNo = '$PurchID' group by tbl_purchasedetails.PackName");
            while($rows= mysql_fetch_array($ssqlx)){ 
            if($rows['PackName']!=""){ $i++;   
            $Pamount = $rows['PackPice']*$rows['Pack_qty'] ;
            $Ptotalamount = $Ptotalamount+$Pamount;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $rows['PackName'] ?></td>
            <td><?php echo $rows['Pack_qty']; ?>
            <?php echo $rows['PurchaseDetails_Unit']; ?></td>
            <td><?php echo $rows['PackPice'] ?></td>
            <td><?php echo $Pamount; ?></td>
        </tr>
        <?php } }?>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Sub Total :</strong> </td>
            <td style="border:0px"><?php $totalamount = $Ptotalamount+$totalamount; echo number_format($totalamount,2); ?></td>
        </tr>

        <tr>
            <td  style="border:0px"><strong>Previous Due</strong></td>
            <td  style="border:0px;color:red;">
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
                    $all = $totalamount-$selse['PurchaseMaster_DiscountAmount']+ $selse['PurchaseMaster_Freight']+$vat;  $CurrenDue = $all-$selse['PurchaseMaster_PaidAmount'];
                     $previousdue= $Supplierpurchase-$Supplierpaid;
                     $previousdue = $previousdue-$CurrenDue;
                    if($previousdue==''){echo'0';}echo $previousdue;
                ?>
                <!-- Previous Due Customer End -->
            </td>
            <td  style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Vat :</strong> </td>
            <td style="border:0px"><?php echo $vat ?></td>
        </tr>
        <tr>
            <td style="border:0px"><strong>Current Due</strong></td>
            <td style="border:0px;color:red;"><?php if($CurrenDue==''){echo '0';} echo $CurrenDue ?></td>
            <td style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Frieght :</strong> </td>
            <td style="border:0px"><?php $Frieght = $selse['PurchaseMaster_Freight']; echo number_format($Frieght,2) ?></td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;" ><strong>Total Due</strong> </td>
            <td style="color:red;border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"><?php if($previousdue+$CurrenDue==''){echo '0';} echo $previousdue+$CurrenDue; ?></td>
            <td style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Labour Cost :</strong> </td>
            <td style="border:0px"><?php $discount = $selse['PurchaseMaster_DiscountAmount'];echo number_format($discount,2) ?></td>
        </tr>

       
         <tr>
            <td colspan="8" style="border:0px"></td>
            <td colspan="2" style="border-top: 2px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"></td>
           
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Total :</strong> </td>
            <td style="border:0px"><strong><?php $grandtotal = $totalamount-$discount+ $Frieght+$vat; echo number_format($grandtotal,2)?></strong></td>
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Paid :</strong> </td>
            <td style="border:0px"><?php $paid = $selse['PurchaseMaster_PaidAmount']; echo number_format($paid,2);?></td>
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td colspan="2" style="border-top: 2px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"></td>
           
        </tr>
        <tr>
            <td colspan="8" style="border:0px"></td>
            <td style="border:0px"><strong>Due :</strong> </td>
            <td style="border:0px"><?php echo number_format($grandtotal-$paid,2); ?></td>
        </tr>
    </table>
    <p><strong>In Word: </strong><?php

function convertNumberToWord($num = false) {
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
    <h4>Notes: <?php echo $selse['PurchaseMaster_Description']; ?></h4>

</div>