<h2>General</h2>
<div class="body">
    <div class="full clearfix">
        <span>Customer Id</span>
        <div class="left">
            <input name="lier_id" type="text" id="ier_id" class="required" disabled="" value="<?php   $serial ="C1000"; $sql = mysql_query("SELECT * FROM tbl_customer");
            while ($d = mysql_fetch_array($sql)){
                if($d['Customer_Code']!=null){$serial = $d['Customer_Code'];}
            } $serial = explode("C",$serial);
            $serial=$serial['1']; $autoserial= $serial+1;echo "C".$autoserial;?>" />
            <input name="Customer_id" type="hidden" id="Customer_id" value="<?php   $serial ="C1000"; $sql = mysql_query("SELECT * FROM tbl_customer");
            while ($d = mysql_fetch_array($sql)){
                if($d['Customer_Code']!=null){$serial = $d['Customer_Code'];}
            } $serial = explode("C",$serial);
            $serial=$serial['1']; $autoserial= $serial+1;echo "C".$autoserial;?>" />
        </div>
    </div>
    <div class="full clearfix">
        <span>Name</span>
        <div class="left">
            <input name="cus_name" type="text" id="cus_name" onkeydown="add()" class="required" autofocus="" style="width:160px" />
            <span id="cus_name_"></span>
        </div>
    </div>

    <div class="full clearfix">
        <span>Address</span>
        <div class="left">
            <input name="address" onkeydown="add()" type="text" id="address" style="width:160px" />
            <span id="address_"></span>
        </div>
    </div>

    <div class="full clearfix">
        <span>District</span>
        <div class="left">
            <div id="Search_Results">
                <select name="district" id="district" style="width:163px;" required>
                    <?php $sql1 = mysql_query("SELECT * FROM tbl_district order by District_Name asc ");
                    while($row1 = mysql_fetch_array($sql1)){ ?>
                        <option value="<?php echo $row1['District_SlNo'] ?>" <?php if($row1['District_Name']=="Dhaka"){echo "selected";}?>><?php echo $row1['District_Name'] ?></option>
                    <?php } ?>

                </select>
            </div>
            <span id="district_"></span>
        </div>
    </div>
    <div class="full clearfix">
        <span>Country</span>
        <div class="left">
            <div id="Search_Results">
                <select name="country" id="country" style="width:163px;" required>
                    <?php $sql = mysql_query("SELECT * FROM tbl_country order by CountryName asc ");
                    while($row = mysql_fetch_array($sql)){ ?>
                        <option value="<?php echo $row['Country_SlNo'] ?>" <?php if($row['CountryName']=="Bangladesh"){echo "selected";}?>><?php echo $row['CountryName'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <span id="country_"></span>
        </div>
    </div>
    <div class="full clearfix">
        <span>Mobile</span>
        <div class="left">
            <input name="mobile" onkeydown="add()" type="text" id="mobile" style="width:160px" />
            <span id="mobile_"></span>
        </div>
    </div>

    <div class="full clearfix">
        <span></span>
        <input type="button" onclick="Submit()" value="Add Customer" class="button">
    </div>
<!--    customer details-->

    <script type="text/javascript">
        function add() {
            var add = event.keyCode;
            if (add == 13) {
                Submit()
            }
        }

        function Submit(){
            var customer_id= $("#Customer_id").val();
            var cus_name= $("#cus_name").val();
            if(cus_name==""){
                $("#cus_name").css("border-color","red");
                return false;
            }
            var address= $("#address").val();
            var mobile= $("#mobile").val();
            var district= $("#district").val();
            var country= $("#country").val();

            var inputdata = 'customer_id='+customer_id+'&cus_name='+cus_name+'&address='+address+'&district='+district+'$country='+country+'&mobile='+mobile;
            var urldata = "<?php echo base_url();?>Administrator/page/customer_insertFanceybox";
            var succes = "";
            if(succes == ""){
                var inputdata = 'customer_id='+customer_id+'&cus_name='+cus_name+'&address='+address+'&district='+district+'$country='+country+'&mobile='+mobile;
                var urldata = "<?php echo base_url();?>Administrator/page/customer_insertFanceybox";
                $.ajax({
                    type: "POST",
                    url: urldata,
                    data: inputdata,
                    success:function(data){
                        $('#success').html('Save Success').css("color","green");
                        $('#SelectResult').html(data);
                        setTimeout(function() {$.fancybox.close()}, 200);
                    }
                });
            }
        }
    </script>

