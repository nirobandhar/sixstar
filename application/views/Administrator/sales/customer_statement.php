<div class="content_scroll">
<h2>Sales Record</h2>
    <div style="width:100%; float:left;">
        <div style="border:1px solid #ddd">
            <table > 
                <tr>
                    <td>Select Customer</td>
                    <td>
                        <select name="" id="customerID" class="inputclass" style="width:200px" >
                            <option value="">  </option>
                            <?php $sql = mysql_query("SELECT * FROM tbl_customer order by Customer_Name desc");
                            while($row = mysql_fetch_array($sql)){ ?>
                                <option value="<?php echo $row['Customer_SlNo']; ?>"><?php echo $row['Customer_Name']; ?> (<?php echo $row['Customer_Code']; ?>)</option>
                            <?php } ?>
                        </select>
                    </td>

                    <td><strong>Date</strong></td>
                    <td id="ashiqeCalender"><input name="Purchase_date" type="text" id="Sales_startdate" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:200px"/></td>
                    <td> To </td>
                    <td id="ashiqeCalender" ><input name="Purchase_date" type="text" id="Sales_enddate" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:200px"/></td>
                    <td><input type="button" class="buttonAshiqe" onclick="searchforRecord()" value="Search Report"></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<div id="SalesRecord"></div>

<script type="text/javascript">
    function searchforRecord(){
        var Sales_startdate = $("#Sales_startdate").val();
        var Sales_enddate = $("#Sales_enddate").val();
        var customerID = $("#customerID").val();

        var inputData = 'Sales_startdate='+Sales_startdate+'&Sales_enddate='+Sales_enddate+'&customerID='+customerID;
        var urldata = "<?php echo base_url(); ?>Administrator/sales/search_statement";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputData,
            success:function(data){
                $("#SalesRecord").html(data);
            }
        });
    }
    
</script>

<script type="text/javascript">

    function Supplierdata(){
        var customerID = $("#customerID").val();
        var inputData = 'customerID='+customerID;
        var urldata = "<?php echo base_url();?>Administrator/sales/sales_customerName";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputData,
            success:function(data){
                $("#customerName").html(data);
            }
        });
    }

</script>