<div id="saveResult">
<div class="content_scroll">
    <div id="page_menu" class="page_menu">
        <ul>
            <li class="active"><a href="">Add Customer</a></li>
           
        </ul>
    </div>
    
    <div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
        <form action=""  method="post" enctype="multipart/form-data">
            <div id="tabs-1">
                <div class="middle_form">
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
                                <input name="cus_name" type="text" id="cus_name" class="required" autofocus="" style="width:160px" />
                                <span id="cus_name_"></span>  
                            </div>
                        </div>
                       <!--  <div class="full clearfix">
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
                                <textarea name="address" rows="3" cols="2" id="address" style="border-color:#C8D3DF;height:70px;width:100%;"></textarea>
                                <span id="address_"></span> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Permanent Address</span>
                            <div class="left">                                      
                                <textarea name="praddress" rows="3" cols="2" id="praddress" style="border-color:#C8D3DF;height:70px;width:100%;"></textarea>
                                <span id="praddress_"></span> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Gurantor Name</span>
                            <div class="left">                                      
                                 <input name="gur_name" type="text" id="gur_name" class="required" autofocus="" style="width:160px" />
                                <span id="gur_name_"></span> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Gurantor Contact</span>
                            <div class="left">                                      
                                <input name="gur_contact" type="text" id="gur_contact" class="required" autofocus="" style="width:160px" />
                                <span id="gur_contact_"></span>
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Gurantor Address</span>
                            <div class="left">                                      
                                <textarea name="gur_address" rows="3" cols="2" id="gur_address" style="border-color:#C8D3DF;height:70px;width:100%;"></textarea>
                                <span id="gur_address_"></span> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>District</span>
                            <div class="left">
                                <div id="Search_Results">
                                <select name="district" id="district" style="width:163px;" required>
                                    <option value=""></option>
                                    <?php $sql1 = mysql_query("SELECT * FROM tbl_district order by District_Name asc ");
                                    while($row1 = mysql_fetch_array($sql1)){ ?>
                                    <option value="<?php echo $row1['District_SlNo'] ?>" <?php if($row1['District_Name']=="Dhaka"){echo "selected";}?>><?php echo $row1['District_Name'] ?></option>
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
                           <input name="mobile" type="text" id="mobile" class="txt" />
                             <span id="mobile_"></span> 
                        </div>
                        <div class="full clearfix">
                            <span>Phone</span>
                                <input name="phone" type="text" id="phone" class="txt" />
                                <span id="address_"></span> 
                        </div>
                        <div class="full clearfix">
                            <span>Email</span>
                            <input name="email" type="email" id="email" class="txt" />
                        </div> 
                        
                        <div class="full clearfix">
                            <span>Web</span>
                            <input name="web" type="text" id="web" class="txt" />
                        </div> 
                        <div class="full clearfix">
                            <span>Credit Limit</span>
                            <input name="credit" type="text" id="credit" class="txt" value="" placeholder="0" />
                        </div> 
                        <div class="full clearfix">
                            <span>Photo</span>
                            <input name="photo" id="photo" type="file" />
                            <img id="photo_preview" style="margin-top: 5px; width:113px;" src="<?php echo base_url('images/No-Image-.jpg') ?>" alt="img preview">
                        </div> 
                        <div class="full clearfix">
                            <span>Biodata</span>
                            <input name="biodata" id="biodata" type="file" />
                        </div> 
                        <div class="full clearfix">
                            <span>Notes</span>
                            <textarea name="notes" rows="3" cols="2" id="notes" style="border-color:#C8D3DF;height:70px;width:100%;"></textarea>
                        </div>  
                        <div class="full clearfix">
                            <span></span>
                            <input type="button" onclick="submit_cus()" value="Save" class="button" />
                        </div>                                                                                                                                                                                
                    </div>
                </div>


            </div>
            </form>
        </div>
    </div>
                    
        <div class="row_section clearfix">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:70%;border-collapse:collapse;">
                <thead>
                    <tr class="header">
                        <th style="width:12%">ID</th>
                        <th style="width:25%">Customer Name</th>
                        <th style="width:25%">Address</th>
                        <th style="width:25%">Contact No</th>
                        <th style="width:13%">Action</th>           
                    </tr>
                </thead>
                <tbody>
                <?php $sql = mysql_query("SELECT * FROM tbl_customer order by Customer_Code asc");
                while($row = mysql_fetch_array($sql)){ ?>
                    <tr>
                        <td style="width:12%"><?php echo $row['Customer_Code'] ?></td>
                        <td style="width:25%"><?php echo $row['Customer_Name'] ?></td>
                        <td style="width:25%"><?php echo $row['Customer_Address'] ?></td>
                        <td style="width:25%"><?php echo $row['Customer_Mobile'] ?></td>
                        <td style="width:13%">
                        <a onclick="customer_edit(<?php echo $row['Customer_SlNo'] ?>)" style="cursor:pointer;color:green;font-size:20px;float:left;left;margin-right: 20px;"><i class="fa fa-pencil"></i></a>
                        <span onclick="deleted(<?php echo $row['Customer_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px"><i class="fa fa-trash-o"></i></span>
                        </td>
                    </tr>  
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>              
</div>
<script type="text/javascript">
    function submit_cus(){
        var Customer_id= $("#Customer_id").val();
		//alert($("#district").val());
        var cus_name= $("#cus_name").val();
        if(cus_name==""){
            $("#cus_name_").html("Required Filed").css("color","red");
            return false;
        }
        var address= $("#address").val();
        if(address==""){
            $("#address_").html("Required Filed").css("color","red");
            return false;
        }
		var praddress= $("#praddress").val();
        if(praddress==""){
            $("#praddress_").html("Required Filed").css("color","red");
            return false;
        }
        var gur_name = $("#gur_name").val();
        var gur_contact = $("#gur_contact").val();
        var gur_address = $("#gur_address").val();
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
        var office_phone= $("#office_phone").val();
        var web= $("#web").val();
        var credit= $("#credit").val();
				//alert('hi');

		   var fd = new FormData();
          fd.append('biodata', $('#biodata')[0].files[0]);
		  fd.append('photo', $('#photo')[0].files[0]);
          fd.append('Customer_id', $("#Customer_id").val());
          fd.append('cus_name', $("#cus_name").val());
          fd.append('address', $("#address").val());
		  fd.append('praddress', $('#praddress').val());
          fd.append('gur_name', $('#gur_name').val());
          fd.append('gur_contact', $('#gur_contact').val());
          fd.append('gur_address', $('#gur_address').val());
		  fd.append('district', $('#district').val());
          fd.append('country', $('#country').val());
          fd.append('phone', $('#phone').val());
          fd.append('mobile', $('#mobile').val());
          fd.append('email', $('#email').val());
          fd.append('web', $('#web').val());
          fd.append('credit', $('#credit').val());
		  fd.append('notes', $('#notes').val());
       
        
        var urldata = "<?php echo base_url();?>Administrator/customer/insert_customer";
        //alert(inputdata);
        $.ajax({
            type: "POST",
            url: urldata,
            data: fd,
            cache:false,
            processData: false, 
            contentType: false,
            success:function(data){
                $("#saveResult").html(data);
                alert("Save Success");
            }
        });
    }
</script>
<script type="text/javascript">
    function customer_edit(id){
        var edit= id;
        var inputdata = 'edit='+edit;
        var urldata = "<?php echo base_url();?>Administrator/customer/customeredit";
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
        var urldata = "<?php echo base_url();?>Administrator/customer/customerdelete";
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

<script>
    //Image preview for landlord
    function readImgURLlnd(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#photo_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#photo").change(function(){
        readImgURLlnd(this);
        console.log('File selected');
    });
    //End image preview
</script>
