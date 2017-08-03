<span id="Supplier_Results_Duepayment">

<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

<div class="content_scroll" style="padding:40px 20px 25px 160px">
<h2>Supplier Due List</h2>


    <table class="border" cellspacing="0" cellpadding="0" width="70%">



        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/search_supplier_due', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr bgcolor="#89B03E" style="background:#89B03E;">

            

            <th>Supplier ID</th>

            <th>Supplier Name</th>

            <th>Contact</th>

            <th>Total Purchase</th>

            <th>Paid</th>

            <th>Due</th>

            <th></th>

        </tr>

        <?php $totalpurchase = 0;

        $Totalpaid = 0;



        foreach($record as $record){ 

                $supid = $record['Supplier_SlNo'];

            //if($record['PurchaseMaster_DueAmount'] >0){

                $paid = "";

                $sql = mysql_query("SELECT * FROM tbl_supplier_payment WHERE SPayment_customerID = '".$supid."'");

                while($row = mysql_fetch_array($sql)){

                    $paid = $paid+$row['SPayment_amount'];    

                } 

                $purch = "";

                $sqls = mysql_query("SELECT * FROM tbl_purchasemaster WHERE Supplier_SlNo = '".$supid."'");

                while($rows= mysql_fetch_array($sqls)){

                    $purch = $purch+$rows['PurchaseMaster_SubTotalAmount'];    

                }

                $totalpurchase = $totalpurchase +$purch; 

                $Totalpaid = $Totalpaid +$paid;
                if(($purch-$paid) > 0){

            ?>

        <tr>

            <td><?php echo $record['Supplier_Code'] ?></td>

            <td><?php echo $record['Supplier_Name'] ?></td>

            <td><?php echo $record['Supplier_Mobile'] ?></td>

            <td style="text-align: right;"><?php echo number_format($purch, 2); ?></td>

            <td style="text-align: right;"><?php echo number_format($paid, 2); ?></td>

            <td style="text-align: right;"><?php echo number_format(($purch-$paid), 2); ?></td>

            <td><a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/supplier/supplier_due_payment/<?php echo $supid; ?>">

                <input type="button" name="country_button" value="Due Payment"  class="button" style="padding:7px 10px;font-size:16px;"/>                                

            </a></td>

        </tr>

        <?php } }?>

       <tr>
           <td colspan="3" style="text-align: right;"><strong>Total</strong></td>
           <td style="text-align: right;"><strong><?php echo number_format($totalpurchase, 2); ?></strong></td>
           <td style="text-align: right;"><strong><?php echo number_format($Totalpaid, 2); ?></strong></td>
           <td style="text-align: right;"><strong><?php echo number_format(($totalpurchase-$Totalpaid), 2); ?></strong></td>
           <td style="text-align: right;"><strong></strong></td>
       </tr>

    </table>



</div>

</span>