<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:40px 20px 25px 160px">
<?php $cmonth;
$fisrtday= date('Y-m-01', strtotime($cmonth));
$lastday = date('Y-m-t', strtotime($cmonth));

$startdate = base64_encode($fisrtday);
$enddate = base64_encode($lastday);
?>
<table class="border" cellspacing="0" cellpadding="0" width="95%">
        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/installmentrecord?std=<?php echo $startdate;?>&ltd=<?php echo $enddate;?>', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr bgcolor="#89B03E">
            <th>SI</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Mobile</th>
            <th>Product Name</th>
            <th>Company</th>
            <th>Sale Date</th>
            <th>Price</th>
            <th>Down payment</th>
            <th>Total Inst.</th>
            <th>Inst. Rate</th>
            <th>Cur inst.</th>
            <th>Total Paid</th>
            <th>Due/Advance</th>
            <th>last stability</th>
        </tr>
        <?php $i=0;
		//echo "SELECT tbl_salesmaster.*,tbl_saledetails.Product_IDNo,tbl_product.Product_Name,tbl_productcategory.ProductCategory_Name,tbl_produsize.Productsize_Name, tbl_customer.*,tbl_installment.*,SUM(tbl_installment.payment_amount) as inspay,tbl_installment_date.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo Left Join tbl_installment ON tbl_installment.invoice=tbl_salesmaster.SaleMaster_InvoiceNo Left Join tbl_installment_date ON tbl_installment_date.invoiceid=tbl_salesmaster.SaleMaster_InvoiceNo Left Join tbl_saledetails ON tbl_saledetails.SaleMaster_IDNo=tbl_salesmaster.SaleMaster_SlNo Inner Join tbl_product ON tbl_product.Product_SlNo=tbl_saledetails.Product_IDNo Inner Join tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo=tbl_product.ProductCategory_ID Inner Join tbl_produsize ON tbl_produsize.Productsize_SlNo=tbl_product.sizeId WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$fisrtday' and '$lastday' AND tbl_salesmaster.Status='3' Group BY tbl_salesmaster.SaleMaster_InvoiceNo";
		$sql = mysql_query("SELECT tbl_salesmaster.*, tbl_productcategory.*,tbl_saledetails.Product_IDNo,tbl_product.Product_Name,tbl_productcategory.ProductCategory_Name,tbl_produsize.Productsize_Name, tbl_customer.*,tbl_installment.*,SUM(tbl_installment.payment_amount) as inspay,tbl_installment_date.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo Left Join tbl_installment ON tbl_installment.invoice=tbl_salesmaster.SaleMaster_InvoiceNo Left Join tbl_installment_date ON tbl_installment_date.invoiceid=tbl_salesmaster.SaleMaster_InvoiceNo Left Join tbl_saledetails ON tbl_saledetails.SaleMaster_IDNo=tbl_salesmaster.SaleMaster_SlNo Inner Join tbl_product ON tbl_product.Product_SlNo=tbl_saledetails.Product_IDNo Inner Join tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo=tbl_product.ProductCategory_ID Inner Join tbl_produsize ON tbl_produsize.Productsize_SlNo=tbl_product.sizeId WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$fisrtday' and '$lastday' AND tbl_salesmaster.Status='3' Group BY tbl_salesmaster.SaleMaster_InvoiceNo");
		while($row = mysql_fetch_array($sql)){
			$i++;
		?>
        <tr>
        	<td><?php echo $i;?></td>
            <td><?php echo $row['Customer_Name'];?></td>
            <td><?php echo $row['Customer_Address'];?></td>
            <td><?php echo $row['Customer_Mobile'];?></td>
            <td><?php echo $row['Product_Name'];?></td>
            <td><?php echo $row['company']?> <?php echo $row['ProductCategory_Name']?> <?php echo $row['Productsize_Name'];?></td>
            <td><?php echo $row['SaleMaster_SaleDate'];?></td>
            <td><?php echo $row['SaleMaster_TotalSaleAmount'];?></td>
            <td><?php echo $row['SaleMaster_PaidAmount'];?></td>
            <td><?php echo "3";?></td>
            <td><?php $restamount = $row['SaleMaster_TotalSaleAmount']-$row['SaleMaster_PaidAmount'];
			 echo $restamount/3;
			?></td>
            <td><?php 
			$saledate = $row['SaleMaster_SaleDate'];
			$fstins= $row['fistdate'];
			$sestins= $row['secondate'];
			$tstins= $row['thirdate'];
			if(($fstins>=$saledate) && ($fstins<$sestins)){
				echo "1";
				}
			else if(($sestins>$fstins) && ($sestins<$tstins)){
				echo "2";
				}
			else if($tstins>$sestins){
				echo "3";
				}
			?></td>
            <td><?php echo $row['inspay'];?></td>
            <td><?php echo $restamount - $row['inspay'];?></td>
            <td><?php echo $restamount - $row['inspay'];?></td>
        </tr>
        <?php } ?>
    </table>
</div>
