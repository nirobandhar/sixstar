<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

<div class="content_scroll" style="padding:120px 20px 25px 160px">

<h2>Cash View Report</h2>

    <table class="border" cellspacing="0" cellpadding="0" width="80%">



        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>reports/cashview_print', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr bgcolor="#ccc">

            <th>Account Name</th>

            <th>Description</th>

            <th>In Amount</th>                      

            <th>Out Amount</th> 

        </tr>

        <?php

        $in="";$out="";

        foreach($record as $row){ 

            $in=$in+$row['In_Amount'];

            $out=$out+$row['Out_Amount'];

            ?>

        <tr>

            <td><?php echo $row['Acc_Name'] ?></td>

            <td><?php echo $row['Tr_Description'] ?></td>

            <td><?php if($row['In_Amount']==""){echo "0";}else{ echo $row['In_Amount'];} ?></td>

            <td><?php if($row['Out_Amount']==""){echo "0";}else{ echo $row['Out_Amount'];} ?></td>

        </tr>

        <?php } 

        $expence_startdate = $this->session->userdata('expence_startdate');

        $expence_enddate = $this->session->userdata('expence_enddate');

        $purchase = "";

        $sql = mysql_query("SELECT * FROM tbl_purchasemaster");

        while($roof = mysql_fetch_array($sql)){

            $purchase =$purchase+$roof['PurchaseMaster_PaidAmount'];

        

        }?>

         <tr>

            <td>Purchase</td>

            <td>Purducts</td>

            <td>0</td>

            <td><?php echo $purchase; ?></td>

        </tr>

        <?php  

        $expence_startdate = $this->session->userdata('expence_startdate');

        $expence_enddate = $this->session->userdata('expence_enddate');

        $sell = "";

        $sql = mysql_query("SELECT * FROM tbl_salesmaster");

        while($roof = mysql_fetch_array($sql)){

            $sell =$sell+$roof['SaleMaster_PaidAmount'];

        

        }?>

        <tr>

            <td>Sales</td>

            <td>Purducts</td>

            <td><?php echo $sell; ?></td>

            <td>0</td>

        </tr>

        <?php $totalreturn = "";

            $sqlx = mysql_query("SELECT * FROM tbl_salereturn");

            while($rom = mysql_fetch_array($sqlx)){

                $totalreturn = $totalreturn+$rom['SaleReturn_ReturnAmount'];

        }?>

        <tr>

            <td>Sales Return</td>

            <td>Purducts</td>

            <td>0</td>

            <td><?php echo $totalreturn; ?></td>

        </tr>

        <?php $totalreturnP = "";

            $sqlx = mysql_query("SELECT * FROM tbl_purchasereturn");

            while($rom = mysql_fetch_array($sqlx)){

                $totalreturnP = $totalreturnP+$rom['PurchaseReturn_ReturnAmount'];

        }?>

        <tr>

            <td>Pruchase Return</td>

            <td>Purducts</td>

            <td><?php echo $totalreturnP; ?></td>

            <td>0</td>

        </tr>

        <tr>

            <td colspan="2" align="right"><strong>Total</strong></td>

            <td><strong><?php echo $sell+$in+$totalreturnP; ?></strong></td>

            <td><strong><?php echo $purchase+$out+$totalreturn; ?></strong></td>

        </tr>

        

    </table>



</div>

