<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

<div class="content_scroll" style="padding:120px 20px 25px 160px">

<h1 align="center">Sales Return List</h1>

    <table class="border" cellspacing="0" cellpadding="0" width="70%">



        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/salesreturnlist', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr bgcolor="#ccc" style="background:#89B03E !important;">

            <th>Date</th>

            <th>Invoice No.</th>            

            <th>Customer Code</th>

            <th>Customer Name</th>
            <th>Product Name</th>
			<th>Sale Price</th>
            <th>Return Qty</th>

            <th>Return Amount</th>

            <th>Notes</th>

        </tr>

        <?php 
            $totalsales = 0;
            $total = 0;
			$totalqty = 0;
            $sql = mysql_query("SELECT tbl_salereturn.*,tbl_salesmaster.*,tbl_customer.* FROM tbl_salereturn left join tbl_salesmaster on tbl_salesmaster.SaleMaster_InvoiceNo=tbl_salereturn.SaleMaster_InvoiceNo left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo where tbl_salereturn.SaleReturn_brunchId = '".$this->session->userdata("BRANCHid")."'");

            while($record = mysql_fetch_array($sql)){
                $total = $total+$record['SaleReturn_ReturnAmount'];
				$totalqty =$totalqty +$record['SaleReturn_ReturnQuantity'];
				$sqlpr = mysql_query("SELECT tbl_salereturndetails.SaleReturnDetailsProduct_SlNo,tbl_product.Product_Name,tbl_product.Product_SellingPrice FROM tbl_product Left Join tbl_salereturndetails ON tbl_salereturndetails.SaleReturnDetailsProduct_SlNo=tbl_product.Product_SlNo Where tbl_salereturndetails.SaleReturn_IdNo='".$record['SaleReturn_SlNo']."'");
             $recordpr = mysql_fetch_array($sqlpr);
             $totalsales = $totalsales+$recordpr['Product_SellingPrice'];
            ?>

        <tr>
            <td><?php echo $record['SaleReturn_ReturnDate'] ?></td>
            <td><?php echo $record['SaleMaster_InvoiceNo'] ?></td>
            <td><?php echo $record['Customer_Code'] ?></td>
            <td><?php echo $record['Customer_Name'] ?></td>
            <td><?php echo $recordpr['Product_Name'] ?></td>
            <td style="text-align: right;"><?php echo number_format($recordpr['Product_SellingPrice'], 2) ?></td>
            <td style="text-align: center;"><?php echo $record['SaleReturn_ReturnQuantity'] ?></td>
            <td style="text-align: right;"><?php echo number_format($record['SaleReturn_ReturnAmount'], 2); ?></td>
            <td><?php echo $record['SaleReturn_Description'] ?></td>
        </tr>

        <?php } ?>

        <tr>

            <td colspan="5" align="right"><strong>Total </strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($totalsales, 2); ?></strong></td>

            <td style="text-align: center;"><strong><?php echo $totalqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($total, 2); ?></strong></td>

            <td></td>

        </tr>

       

    </table>

   



</div>