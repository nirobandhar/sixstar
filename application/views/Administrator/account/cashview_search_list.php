<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">
<h2>Cash View Report</h2>



    <table class="border" cellspacing="0" cellpadding="0" width="80%">



        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/cashview_print', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr bgcolor="#ccc">

            <th>Account Head</th>

            <th>Description</th>

            <th>In Amount</th>                      

            <th>Out Amount</th> 

        </tr>

        <?php

        $in=0;$out=0;

        foreach($record as $row){ 

            $in=$in+$row['In_Amount'];

            $out=$out+$row['Out_Amount'];

            ?>

        <tr>
            <td><?php echo $row['Acc_Name'] ?></td>

            <td><?php echo $row['Tr_Description'] ?></td>

            <td style="text-align: right;"><?php if($row['In_Amount']==0){echo "0.00";}else{ echo number_format($row['In_Amount'], 2);} ?></td>

            <td style="text-align: right;"><?php if($row['Out_Amount']==0){echo "0.00";}else{ echo number_format($row['Out_Amount'], 2);} ?></td>

        </tr>

        <?php } 

        $expence_startdate = $this->session->userdata('expence_startdate');

        $expence_enddate = $this->session->userdata('expence_enddate');

        $purchase = 0;

        $sql = mysql_query("SELECT * FROM tbl_purchasemaster");

        while($roof = mysql_fetch_array($sql)){

            $purchase =$purchase+$roof['PurchaseMaster_PaidAmount'];

        

        }?>

         <tr>

            <td>Purchase</td>

            <td>Purducts</td>

            <td style="text-align: right;">0.00</td>

            <td style="text-align: right;"><?php echo number_format($purchase, 2); ?></td>

        </tr>

        <?php  

        $expence_startdate = $this->session->userdata('expence_startdate');

        $expence_enddate = $this->session->userdata('expence_enddate');

        $sell = 0;

        $sql = mysql_query("SELECT * FROM tbl_salesmaster");

        while($roof = mysql_fetch_array($sql)){

            $sell =$sell+$roof['SaleMaster_PaidAmount'];

        

        }?>

        <tr>

            <td>Sales</td>

            <td>Purducts</td>

            <td style="text-align: right;"><?php echo number_format($sell, 0); ?></td>

            <td style="text-align: right;">0.00</td>

        </tr>

        <?php $totalreturn = 0;

            $sqlx = mysql_query("SELECT * FROM tbl_salereturn");

            while($rom = mysql_fetch_array($sqlx)){

                $totalreturn = $totalreturn+$rom['SaleReturn_ReturnAmount'];

        }?>

        <tr>

            <td>Sales Return</td>

            <td>Purducts</td>

            <td style="text-align: right;">0.00</td>

            <td style="text-align: right;"><?php echo number_format($totalreturn, 2); ?></td>

        </tr>

        <?php $totalreturnP = 0;

            $sqlx = mysql_query("SELECT * FROM tbl_purchasereturn");

            while($rom = mysql_fetch_array($sqlx)){

                $totalreturnP = $totalreturnP+$rom['PurchaseReturn_ReturnAmount'];

        }?>

        <tr>

            <td>Pruchase Return</td>

            <td>Purducts</td>

            <td style="text-align: right;"><?php echo number_format($totalreturnP, 2); ?></td>

            <td style="text-align: right;">0.00</td>

        </tr>

        <tr>

            <td colspan="2" align="right"><strong>Total</strong></td>

            <td style="text-align: right;"><strong><?php echo number_format(($sell+$in+$totalreturnP), 2); ?></strong></td>

            <td style="text-align: right;"><strong><?php echo number_format(($purchase+$out+$totalreturn), 2); ?></strong></td>

        </tr>

        

    </table>



</div>

