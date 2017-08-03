
<div class="content_scroll">
<h2>Customer Due</h2>
    <div style="width:100%; float:left;">
        <div style="border:1px solid #ddd">
            <table > 
                <tr>
                	<td><strong>Sales Type</strong></td>
                    <td> 
                        <select id="Salestype" class="inputclass" style="width:200px">
                            <option value="All"> All </option>
                            <option value="2"> Whole Sales </option>
                            <option value="3"> Installment Sales </option>
                        </select>
                    </td>
                    <td><strong>Customer</strong></td>
                   <td> 
                        <select id="searchtype" class="inputclass" style="width:200px" onchange="Selected()">
                            <option value="All"> All </option>
                            <option value="Customer"> By Customer </option>
                        </select>
                    </td>
                    <!-- <td><strong>Date</strong></td>
                    <td id="ashiqeCalender"><input name="Purchase_date" type="text" id="Sales_startdate" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:200px"/></td>
                    <td> To </td>
                    <td id="ashiqeCalender"><input name="Purchase_date" type="text" id="Sales_enddate" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:200px"/></td> -->
                    <td><input type="button" class="buttonAshiqe" onclick="searchforRecord()" value="Search Report"></td>
                </tr>
                <tr>
                    <td colspan="6">
                        <span style="display:none" id="showcustomer">
                            <table>
                            <tr>
                                <td>Select Customer</td>
                                <td id="filtercustomer">
                                    <select name="" id="customerID" class="inputclass" style="width:200px" onchange="Supplierdata()">
                                        <option value="">  </option>
                                        <?php $sql = mysql_query("SELECT * FROM tbl_customer order by Customer_Name asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                        <option value="<?php echo $row['Customer_SlNo']; ?>"><?php echo $row['Customer_Name']; ?> (<?php echo $row['Customer_Code']; ?>)</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<div id="CustomerDue"></div>
<script type="text/javascript">
    function searchforRecord(){
        var searchtype = $("#searchtype").val();
        var Sales_startdate = $("#Sales_startdate").val();
        var Sales_enddate = $("#Sales_enddate").val();
        var customerID = $("#customerID").val();
		var Salestype = $("#Salestype").val();
        
        var inputData = 'searchtype='+searchtype+'&Sales_startdate='+Sales_startdate+'&Sales_enddate='+Sales_enddate+'&customerID='+customerID+'&Salestype='+Salestype;
        var urldata = "<?php echo base_url();?>Administrator/customer/search_customer_due";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputData,
            success:function(data){
                $("#CustomerDue").html(data);
            }
        });
    }
    
</script>
<script type="text/javascript">
    function Selected(){
        var searchtype = $("#searchtype").val();
        if(searchtype == "Customer"){
			$("#customerID_chosen").css({"width":"200px"})
            $("#showcustomer").show();
			var Salestypef = $("#Salestype").val();
			var inputData = 'Salestypef='+Salestypef;
        	var urldata = "<?php echo base_url();?>Administrator/customer/getcustomer";
			$.ajax({
				type: "POST",
				url: urldata,
				data: inputData,
				success:function(data){
					$("#filtercustomer").html(data);
				}
			});
			
        }
        if(searchtype == "All"){
            $("#showcustomer").hide();
        }
    }
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