<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />


<div class="content_scroll" style="padding:120px 20px 25px 160px">
    <!--Search Button-->
    <div style="border:1px solid #ddd">
        <table >
            <tr>
                <td><strong>Sales Type</strong></td>
                <td>
                    <select id="searchtype" class="inputclass" style="width:200px">
                        <option value="" selected="selected" disabled="disabled">Select one</option>
                        <option value="allSelected"> All </option>
                        <option value="companySelected">Company wise</option>
                        <option value="proSelected">Product wise</option>
                    </select>
                </td>

                <!--One td-->
                <td>
                    <span class="searchHide" id="companyList">
                            <table>
                            <tr>
                                <td>Select Company</td>
                                <td style="width:250px" id="filtercustomer">

                                    <select class="inputclass searchtypeval" style="width:200px" >
                                        <option value="" selected="selected" disabled="disabled">Select one</option>
                                        <?php $sql = mysql_query("SELECT * FROM tbl_company order by Company_Name asc");
                                        while($rowCom = mysql_fetch_array($sql)){ ?>
                                            <option value="<?php echo $rowCom['Company_Name'] ?>"> <?php echo $rowCom['Company_Name']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </span>
                </td>
                <!--End One td-->

                <!--three td-->
                <td>
                    <span class="searchHide" id="productList">
                            <table>
                            <tr>
                                <td>Select Product</td>
                                <td style="width:250px" id="filtercustomer">

                                    <select class="inputclass searchtypeval" style="width:200px" >
                                        <option value="" selected="selected" disabled="disabled">Select one</option>
                                        <?php
                                        $dupProName = '';
                                        $sql = mysql_query("SELECT * FROM tbl_product order by Product_Name asc");
                                        while($rowPro = mysql_fetch_array($sql)){
                                            if ($dupProName == $rowPro['Product_Name']){
                                                continue;
                                                ?>
                                        <?php }else{?>
                                                <option value="<?php echo $rowPro['Product_Name'] ?>"> <?php echo $rowPro['Product_Name']; ?> </option>
                                        <?php }
                                            $dupProName = $rowPro['Product_Name'];
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </span>
                </td>
                <!--End three td-->
            </tr>

        </table>
    </div>
    <!--End Search Button-->
    <span id="stockRecord">
        <table class="border" cellspacing="0" cellpadding="0" width="70%">
        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/current_stock', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>

        <tr>
            <td colspan="10" align="center"><h2>Current Stock</h2></td>
        </tr>
        <tr bgcolor="#ccc">
            <th>Sl No.</th>

            <th>
                <a href="?orderBy=Product_Code">Product Code<a/>
            </th>

            <th>
                <a href="?orderBy=company">Company<a/>
            </th>
            <th>
                <a href="?orderBy=Product_Name">Product Name<a/>
            </th>
            <th>
                <a href="?orderBy=ProductCategory_Name">Model<a/>
            </th>
            <th>Size</th>
            <th>Unit</th>
            <th>Qty</th>
            <th width="110px">Purchase Price</th>
            <th width="110px">Total Price</th>
        </tr>
            <?php
            $orderBy = array('Product_Code','company', 'Product_Name', 'ProductCategory_Name');
            $order = 'company';
            if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
                $order = $_GET['orderBy'];
            }



            $totalqty = 0;$sellTOTALqty = 0; $subtotal = 0; $gttotalqty = 0; $gttotalpur = 0;
            //echo "SELECT tbl_purchaseinventory.*,tbl_product.*,tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo";
            $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*, tbl_productcategory.*, tbl_produsize.*, tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo LEFT JOIN tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID LEFT JOIN tbl_produsize ON tbl_produsize.Productsize_SlNo = tbl_product.sizeId left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo order by ".$order."");
            $i=0;
            while($record = mysql_fetch_array($sql)){
                $i++;
                $totalprretqty = $record['PurchaseInventory_ReturnQuantity'];
                $totalprdamqty = $record['PurchaseInventory_DamageQuantity'];

                $totalprlostqty = $totalprretqty+$totalprdamqty;
                $PID = $record['purchProduct_IDNo'];
                $branchwise = $record['PurchaseDetails_branchID'];
                // Sell qty
                $sqq = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo = '$PID'");
                $or = mysql_fetch_array($sqq);
                $sellTOTALqty = $or['SaleInventory_TotalQuantity'];

                $sellTOTALqty = $sellTOTALqty-$or['SaleInventory_DamageQuantity'];
                $totalsaretqty = $or['SaleInventory_ReturnQuantity'];
                //echo "SELECT *, SUM(total_branchqty) as branqty FROM tbl_branchwise_product WHERE pro_codes = '$PID' AND branch_ids='".$branchwise."'";
                $sqltstock = mysql_query("SELECT *, SUM(total_branchqty) as branqty FROM tbl_branchwise_product WHERE pro_codes = '$PID'");
                $roxstock = mysql_fetch_array($sqltstock);
                $perbranchqty = $roxstock['branqty'];

                $totalqty = ($perbranchqty+$totalsaretqty)-($totalprlostqty+$sellTOTALqty);
                if($totalqty > 0){
                    $rate = $totalqty*$record['PurchaseDetails_Rate'];
                    $subtotal = $subtotal+$rate;
                    ?>
                    <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $record['Product_Code'] ?></td>
                    <td><?php echo $record['company'] ?></td>
                    <td><?php echo $record['Product_Name'] ?></td>
                    <td><?php echo $record['ProductCategory_Name'] ?></td>
                    <td><?php echo $record['Productsize_Name'] ?></td>
                    <td><?php if($record['PurchaseDetails_Unit']==""){echo "pcs";} else{echo $record['PurchaseDetails_Unit']; }?></td>
                    <td style="text-align: center;"><?php echo $totalqty;
                        $gttotalqty = $gttotalqty+$totalqty;
                        ?></td>
                    <td style="text-align: right;"><?php echo number_format($record['PurchaseDetails_Rate'], 2);
                        $gttotalpur = $gttotalpur+$record['PurchaseDetails_Rate'];
                        ?></td>
                    <td style="text-align: right;"><?php echo number_format($rate, 2); ?></td>
                </tr>
                <?php } }  ?>
            <tr>
            <td colspan="7" style="text-align: right;"><strong>Sub Total:</strong></td>
            <td style="text-align: center;"><strong><?php echo $gttotalqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($gttotalpur, 2); ?> Tk</strong> </td>
            <td style="text-align: right;"><strong><?php echo number_format($subtotal, 2); ?> Tk</strong></td>
        </tr>

    </table>
    </span>

</div>

<script>
    $(window).load(function () {
        $(".searchHide").hide();
        $('#searchtype').on('change', function () {
            var value = $(this).val();

            if(value == 'companySelected'){
                $("#companyList").show();
            }else{
                $("#companyList").hide();
            }

            if(value == 'proSelected'){
                $("#productList").show();
            }else{
                $("#productList").hide();
            }

           /* if(value == 'allSelected') {
                location.reload(true);
            }*/
        });
    });

    $('.searchtypeval').on('change', function () {
        var searchtypeval = $(this).val();
        var inputData ='searchtypeval='+searchtypeval;
        var urldata = "<?php echo base_url(); ?>Administrator/products/current_stock_ajax";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputData,
            success:function(data){
                $("#stockRecord").html(data);
            }
        });
    });

    $('#searchtype').on('change', function () {
        var searchtypeval = $(this).val();
        if(searchtypeval!='allSelected'){
            return false;
        }
        var inputData ='searchtypeval='+searchtypeval;
        var urldata = "<?php echo base_url(); ?>Administrator/products/current_stock_ajax";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputData,
            success:function(data){
                $("#stockRecord").html(data);
            }
        });
    });

</script>