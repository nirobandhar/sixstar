
<div class="content_scroll">
    <div id="page_menu" class="page_menu">
        <ul>
            <li class="active"><a href="<?php echo base_url();?>Administrator/supplier">Add Supplier</a></li>
            <li><a href="<?php echo base_url();?>Administrator/reports/supplierList">Suppliers List</a></li>
        </ul>
    </div>
    <div id="saveResult">
    <div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
            <div id="tabs-1">
                <div class="middle_form">
                    <h2>General</h2>
                    <div class="body">
                        <div class="full clearfix">
                            <span>Supplier Id</span>
                            <div class="left">                                    
                                <input name="supplier_id" type="text" id="lier_id" class="required" disabled="" value="<?php   $serial ="S1000"; $sql = mysql_query("SELECT * FROM tbl_supplier");
                                    while ($d = mysql_fetch_array($sql)){
                                        if($d['Supplier_Code']!=null){$serial = $d['Supplier_Code'];}
                                    } $serial = explode("S",$serial);
                                        $serial=$serial['1']; $autoserial= $serial+1;echo "S".$autoserial;?>" autofocus="" />
                                <input name="supplier_id" type="hidden" id="supplier_id" class="required" value="<?php   $serial ="S1000"; $sql = mysql_query("SELECT * FROM tbl_supplier");
                                    while ($d = mysql_fetch_array($sql)){
                                        if($d['Supplier_Code']!=null){$serial = $d['Supplier_Code'];}
                                    } $serial = explode("S",$serial);
                                        $serial=$serial['1']; $autoserial= $serial+1;echo "S".$autoserial;?>" autofocus="" />

                            </div>
                        </div>                                
                        <div class="full clearfix">
                            <span>Name</span>
                            <div class="left">                                      
                                <input name="sl_name" type="text" id="sl_name" class="required" placeholder="" autofocus="" required/>
                                <span id="sl_name_"></span>
                            </div>
                        </div>
                        <!-- <div class="full clearfix">
                            <span>Type</span>
                            <div class="left">                                      
                                <input name="type" type="radio" id="type" class="required" value="Local" checked="checked" />Local
                                &nbsp; &nbsp;
                                <input name="type" type="radio" id="type" class="required" value="Foreign" />Foreign
                            </div>
                        </div> -->
                        <div class="full clearfix">
                            <span>Address</span>
                            <div class="left">                                      
                                <textarea name="address" rows="5" cols="2" id="address" style="border-color:#C8D3DF;height:80px;width:100%;"></textarea>
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>District</span>
                            <div class="left">
                            <div id="Search_Resultsss">
                                <select name="district" id="district" style="width:163px;" required>
                                    <option value=""></option>
                                    <?php $sql = mysql_query("SELECT * FROM tbl_district order by District_Name asc ");
                                    while($row = mysql_fetch_array($sql)){ ?>
                                    <option value="<?php echo $row['District_SlNo'] ?>" <?php if($row['District_Name']=="Dhaka"){echo "selected";}?>><?php echo $row['District_Name'] ?></option>
                                    <?php } ?>
                                </select>  
                            </div>     
                            <span id="district_"></span>                                   
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/supplier/supplier_district">
                                    <input type="button" name="add_cat" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                
                                </a> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Country</span>
                            <div class="left">
                            <div id="Search_Results">
                                <select name="country" id="country" style="width:163px;" required>
                                    <option value=""></option>
                                    <?php $sql = mysql_query("SELECT * FROM tbl_country order by CountryName asc ");
                                    while($row = mysql_fetch_array($sql)){ ?>
                                    <option value="<?php echo $row['Country_SlNo'] ?>" <?php if($row['CountryName']=="Bangladesh"){echo "selected";}?>><?php echo $row['CountryName'] ?></option>
                                    <?php } ?>                                     
                                </select>   
                            </div>   
                            <span id="country_"></span>                                     
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/supplier/supplier_country">
                                    <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                
                                </a> 
                            </div>
                        </div>                                                                                                                                                  
                    </div>
                </div>
                <div class="right_form">
                    <h2 id="personal-info">Contact Information</h2>
                    <div class="body">
                    	<div class="full clearfix">
                            <span>Mobile</span>
                            <input name="mobile" type="text" id="mobile" class="txt" required/>
                            <span id="mobile_"></span>       
                        </div>
                        <div class="full clearfix">
                            <span>Phone</span>
                            <input name="phone" type="text" id="phone" class="txt" />
                        </div>
                                                            
                        <div class="full clearfix">
                            <span>Email</span>
                            <input name="email" type="text" id="email" class="txt" />
                        </div> 
                        <!--<div class="full clearfix">
                            <span>Office Phone</span>
                            <input name="office_phone" type="text" id="office_phone" class="txt" />
                        </div>-->
                        <div class="full clearfix">
                            <span>Web</span>
                            <input name="web" type="text" id="web" class="txt" />
                        </div> 
                        <div class="full clearfix">
                            <span></span>
                            <input type="button" onclick="submit()" value="Save" class="button" />
                        </div>                                                                                                                                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" style="width:70%;border-collapse:collapse;">
            <thead>
                <tr class="header">
                    <th style="width:12%">ID</th>
                    <th style="width:25%">Supplier Name</th>
                    <th style="width:25%">Address</th>
                    <th style="width:25%">Contact No</th>
                    <th style="width:13%">Action</th>                                              
                </tr>
            </thead>
        </table>                    
    </div>                
    <div class="row_section clearfix" style="height:300px;overflow:auto;">
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" style="text-align:left;width:70%;border-collapse:collapse;">
            <tbody>
            <?php $sql = mysql_query("SELECT * FROM tbl_supplier order by Supplier_Code asc");
            while($row = mysql_fetch_array($sql)){ ?>
                <tr>
                    <td style="width:12%"><?php echo $row['Supplier_Code'] ?></td>
                    <td style="width:25%"><?php echo $row['Supplier_Name'] ?></td>
                    <td style="width:25%"><?php echo $row['Supplier_Address'] ?></td>
                    <td style="width:25%"><?php echo $row['Supplier_Mobile'] ?></td>
                    <td style="width:13%">
                    <a onclick="Edit_supplier(<?php echo $row['Supplier_SlNo'] ?>)" style="cursor:pointer;color:green;font-size:20px;float:left;margin-right: 20px;" ><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span onclick="deleted(<?php echo $row['Supplier_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px"><i class="fa fa-trash-o"></i></span>
                    </td>
                </tr>  
            <?php } ?>                
            </tbody>
        </table>
    </div>              
    </div>
</div>
<script type="text/javascript">
    function submit(){
        var supplier_id= $("#supplier_id").val();

        var sl_name= $("#sl_name").val();
        if(sl_name==""){
            $("#sl_name_").html("Required Filed").css("color","red");
            return false;
        }
        var type= $("#type").val();
        var address= $("#address").val();
        var district= $("#district").val();
         if(district==""){
            $("#district_").html("Required Filed").css("color","red");
            return false;
        }
        var country= $("#country").val();
         if(country==""){
            $("#country_").html("Required Filed").css("color","red");
            return false;
        }
        var phone= $("#phone").val();
        var mobile= $("#mobile").val();
         if(mobile==""){
            $("#mobile_").html("Required Filed").css("color","red");
            return false;
        }
        var email= $("#email").val();
        var office_phone= " ";
        var web= $("#web").val();
       
        var inputdata = 'supplier_id='+supplier_id+'&sl_name='+sl_name+'&type='+type+'&address='+address+'&district='+district+'&country='+country+'&phone='+phone+'&mobile='+mobile+'&email='+email+'&office_phone='+office_phone+'&web='+web;
        var urldata = "<?php echo base_url();?>Administrator/supplier/insert_supplier";
        //alert(inputdata);
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
                alert("Save Success");
            }
        });
    }
</script>
<script type="text/javascript">
    function Update_suppliers(){
        var supplier_id= $("#supplier_id").val();
        var id= $("#id").val();

        var sl_name= $("#sl_name").val();
        if(sl_name==""){
            $("#sl_name_").html("Required Filed").css("color","red");
            return false;
        }
        var type= $("#type").val();
        var address= $("#address").val();
        var district= $("#district").val();
         if(district==""){
            $("#district_").html("Required Filed").css("color","red");
            return false;
        }
        var country= $("#country").val();
         if(country==""){
            $("#country_").html("Required Filed").css("color","red");
            return false;
        }
        var phone= $("#phone").val();
        var mobile= $("#mobile").val();
         if(mobile==""){
            $("#mobile_").html("Required Filed").css("color","red");
            return false;
        }
        var email= $("#email").val();
        var office_phone= " ";
        var web= $("#web").val();
       
        var inputdata = 'id='+id+'&supplier_id='+supplier_id+'&sl_name='+sl_name+'&type='+type+'&address='+address+'&district='+district+'&country='+country+'&phone='+phone+'&mobile='+mobile+'&email='+email+'&office_phone='+office_phone+'&web='+web;
        var urldata = "<?php echo base_url();?>Administrator/supplier/supplierupdate";
        //alert(inputdata);
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
                alert("Update Success");
            }
        });
    }
</script>
<script type="text/javascript">
    function Edit_supplier(id){
        var edit= id;
        var inputdata = 'edit='+edit;
        var urldata = "<?php echo base_url();?>Administrator/supplier/supplier_edit";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
            }
        });
    }
</script>
<script type="text/javascript">
    function deleted(id){
        var deletedd= id;
        var inputdata = 'deleted='+deletedd;
        //alert(inputdata);
        var urldata = "<?php echo base_url();?>Administrator/supplier/supplier_delete";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
                alert("Delete Success");
            }
        });
    }
</script>
