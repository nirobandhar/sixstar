
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
            $sql = mysql_query("SELECT tbl_purchasemaster.*, tbl_purchasemaster.AddBy as served, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo where tbl_purchasemaster.PurchaseMaster_SlNo = '$id'");
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
                   <th>Product information</th>
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
			$ssqlssize = mysql_query("SELECT * FROM tbl_produsize where Productsize_SlNo = '".$rows['ProductCategory_ID']."'");
           $rowsize = mysql_fetch_array($ssqlssize);
		   echo $rowsize['Productsize_Name'];
			 ?></td>
             <td style="text-align: center;"><?php echo $rows['PurchaseDetails_Unit']; ?></td>
            <td style="text-align: right;"><?php echo number_format($rows['PurchaseDetails_Rate'], 2); ?></td>
            <td style="text-align: center;"><?php echo $rows['totalqty']; ?></td>
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
            <td  style="border:0px"><strong>Previous Due</strong></td>
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
            <td  style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Vat :</strong> </td>
            <td style="border:0px;text-align: right;"><?php echo number_format($vat, 2); ?></td>
        </tr>
        <tr>
            <td style="border:0px"><strong>Current Due</strong></td>
            <td style="border:0px;color:red;text-align: right;"><?php if($CurrenDue==''){echo '0.00';}else{echo number_format($CurrenDue, 2);} ?></td>
            <td style="border:0px" colspan="6"></td>
            <td style="border:0px"><strong>Frieght :</strong> </td>
            <td style="border:0px;text-align: right;"><?php $Frieght = $selse['PurchaseMaster_Freight']; echo number_format($Frieght,2) ?></td>
        </tr>
        <tr>
            <td style="border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;"><strong>Totul Due</strong> </td>
            <td style="color:red;border-top: 1px solid #999;border-left: 0px ;border-right: 0px ;border-bottom: 0px ;text-align: right;"><?php if($previousdue+$CurrenDue==''){echo '0.00';}else{echo number_format(($previousdue+$CurrenDue), 2);} ?></td>
            <td style="border:0px" colspan="6"></td>
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
            <p><strong>Total (in word): </strong><?php 

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
                  echo strtoupper($inword);
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

