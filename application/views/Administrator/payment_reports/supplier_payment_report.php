
<div class="content_scroll">
<h2>Supplier Payment</h2>
    <div style="width:100%; float:left;">

        <div style="border:1px solid #ddd">

            <table >

                <tr>

                    <td><strong>Supplier</strong></td>

                    <td>

                        <select id="searchtype" class="inputclass" style="width:200px" onchange="Selected()">

                            <option value="All"> All </option>

                            <option value="Supplier"> By Supplier </option>

                        </select>

                    </td>

                      <td><strong>Date</strong></td>

                   <td id="ashiqeCalender"><input name="Purchase_date" type="text" id="Purchase_startdate" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:200px"/></td>

                   <td> To </td>

                   <td id="ashiqeCalender"><input name="Purchase_date" type="text" id="Purchase_enddate" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:200px"/></td>

                    <td><input type="button" class="buttonAshiqe" onclick="searchforRecord()" value="Search Report"></td>

                </tr>

                <tr>

                    <td colspan="6">

                        <span style="display:none" id="showcustomer">

                            <table>

                            <tr>

                                <td>Select Supplier</td>

                                <td>

                                    <select name="" id="Supplierid" class="inputclass" style="width:200px" onchange="Supplierdata()">

                                        <option value="">  </option>

                                        <?php $sql = mysql_query("SELECT * FROM tbl_supplier order by Supplier_Code desc");

                                        while($row = mysql_fetch_array($sql)){ ?>

                                            <option value="<?php echo $row['Supplier_SlNo']; ?>"><?php echo $row['Supplier_Name'];?>(<?php echo $row['Supplier_Code']; ?>)</option>

                                        <?php } ?>

                                    </select>

                                </td>

                                <!--  <td>

                                    <span id="supplierName">

                                        <input type="text" disabled="" class="inputclass" value="">

                                    </span>

                                </td> -->

                            </tr>

                        </table>

                        </span>

                    </td>

                </tr>

            </table>

        </div>

    </div>

</div>
<div id="PurchasePayment"></div>
<script type="text/javascript">
    function searchforRecord(){
        var searchtype = $("#searchtype").val();
        var Purchase_startdate = $("#Purchase_startdate").val();
        var Purchase_enddate = $("#Purchase_enddate").val();
        var Supplierid = $("#Supplierid").val();
        var inputData = 'searchtype='+searchtype+'&Purchase_startdate='+Purchase_startdate+'&Purchase_enddate='+Purchase_enddate+'&Supplierid='+Supplierid;
        var urldata = "<?php echo base_url();?>Administrator/supplier/search_supplier_payments";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputData,
            success:function(data){
                $("#PurchasePayment").html(data);
            }
        });
    }
    
</script>
<script type="text/javascript">

    function Selected(){

        var searchtype = $("#searchtype").val();

        if(searchtype == "Supplier"){

            $("#showcustomer").show();
            $("#Supplierid_chosen").css({"width":"200px"})

        }

        if(searchtype == "All"){

            $("#showcustomer").hide();

        }

    }

    function Supplierdata(){

        var Supplierid = $("#Supplierid").val();

        var inputData = 'Supplierid='+Supplierid;

        var urldata = "<?php echo base_url();?>Administrator/purchase/purchase_supplierName";

        $.ajax({

            type: "POST",

            url: urldata,

            data: inputData,

            success:function(data){

                $("#supplierName").html(data);

            }

        });

    }

</script>