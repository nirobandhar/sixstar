<div class="content_scroll">
    <div id="page_menu" class="page_menu">
        <ul>
            <li class="active"><a href="add_supplier.php">Edit Customer</a></li>
            <li><a href="supplier.php">Customer List</a></li>
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
                                <input name="lier_id" type="text" id="ier_id" class="required" disabled="" value="<?php echo $selected['Customer_Code'] ?>" />
                                <input name="Customer_id" type="hidden" id="Customer_id" value="<?php echo $selected['Customer_Code'] ?>" />
                                <input name="id" type="hidden" id="id" value="<?php echo $selected['Customer_SlNo'] ?>" />
                            </div>
                        </div>                                
                        <div class="full clearfix">
                            <span>Name</span>
                            <div class="left">                                      
                                <input name="cus_name" type="text" id="cus_name" class="required" value="<?php echo $selected['Customer_Name'] ?>" autofocus="" />
                                <span id="cus_name_"></span>  
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
                                <textarea name="address" rows="2" cols="2" id="address" style="border-color:#C8D3DF;height:70px;width:100%;"><?php echo $selected['Customer_Address'] ?></textarea>
                                <span id="address_"></span> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Permanent Address</span>
                            <div class="left">                                      
                                <textarea name="praddress" rows="3" cols="2" id="praddress" style="border-color:#C8D3DF;height:70px;width:100%;"><?php echo $selected['permanent_address']; ?></textarea>
                                <span id="praddress_"></span> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>District</span>
                            <div class="left">
                                <div id="Search_Results">
                                <select name="district" id="dristric" style="width:163px;" required>
                                    <option value=""></option>
                                    <?php $sql1 = mysql_query("SELECT * FROM tbl_district order by District_Name asc ");
                                    while($row1 = mysql_fetch_array($sql1)){ ?>
                                    <option value="<?php echo $row1['District_SlNo'] ?>" <?php if($selected['Country_SlNo']==$row1['District_SlNo']){echo "selected";}?>><?php echo $row1['District_Name'] ?></option>
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
                                    <option value="<?php echo $selected['Country_SlNo'] ?>"><?php echo $selected['CountryName'] ?></option>
                                    <?php $sql = mysql_query("SELECT * FROM tbl_country order by CountryName asc ");
                                    while($row = mysql_fetch_array($sql)){ ?>
                                    <option value="<?php echo $row['Country_SlNo'] ?>"><?php echo $row['CountryName'] ?></option>
                                    <?php } ?>                                     
                                </select>   
                            </div>   
                            <span id="country_"></span>                                          
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>supplier/supplier_country">
                                    <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                
                                </a> 
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Phone</span>
                            <div class="left">                                      
                                <input name="phone" type="text" id="phone" value="<?php echo $selected['Customer_Phone'] ?>" class="txt" />
                            </div>
                        </div>                                                                                                                                                  
                    </div>
                </div>
                <div class="right_form">
                    <h2 id="personal-info">Contact Information</h2>
                    <div class="body">
                        <div class="full clearfix">
                            <span>Mobile</span>
                            <input name="mobile" type="text" id="mobile" value="<?php echo $selected['Customer_Mobile'] ?>" class="txt" />
                             <span id="mobile_"></span>  
                        </div>
                        <div class="full clearfix">
                            <span>Phone</span>
                                <input name="phone" type="text" id="phone" value="<?php echo $selected['Customer_Phone'] ?>" class="txt" />
                      </div>                                    
                        <div class="full clearfix">
                            <span>Email</span>
                            <input name="email" type="email" id="email" value="<?php echo $selected['Customer_Email'] ?>" class="txt" />
                        </div> 
                        <div class="full clearfix">
                            <span>Web</span>
                            <input name="web" type="text" id="web" value="<?php echo $selected['Customer_Web'] ?>" class="txt" />
                        </div> 
                        <div class="full clearfix">
                            <span>Credit Limit</span>
                            <input name="credit" type="text" id="credit" value="<?php echo $selected['Customer_Credit_Limit'] ?>" class="txt"/>
                        </div>
                        <div class="full clearfix">
                                <span></span>
                               <?php if($selected['customerpic'] !="") {?>
                                <img id="hideid" src="<?php echo base_url().'uploads/Customerbiodata/'.$selected['customerpic'];?>" alt="" style="width:100px" height="100">
                                <?php } else{ ?>
                                <img src="<?php echo base_url();?>images/No-Image-.jpg" alt="" style="width:100px" height="100">
                                <?php } ?>
                            </div> 
                         <div class="full clearfix">
                            <span>Photo</span>
                            <input name="photo" id="photo" type="file" />
                        </div>   
                        <div class="full clearfix">
                                <span></span>
                               <?php echo $selected['biodata'];?>
                      </div> 
                  <div class="full clearfix">
                            <span>Biodata</span>
                            <input name="biodata" id="biodata" type="file" />
                        </div>
                        <div class="full clearfix">
                            <span>Notes</span>
                            <textarea name="notes" rows="3" cols="2" id="notes" style="border-color:#C8D3DF;height:70px;width:100%;"><?php echo $selected['notes'] ?></textarea>
                        </div>  
                        <div class="full clearfix">
                            <span></span>
                            <a href="<?php echo base_url();?>customer" class="button">Cancel</a>
                            <input type="button" onclick="update()" value="Update" class="button" />
                        </div>                                                                                                                                                                                
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
            
</div>
<script type="text/javascript">
    function update(){
        var Customer_id= $("#Customer_id").val();
        var id= $("#id").val();

        var cus_name= $("#cus_name").val();
        if(cus_name==""){
            $("#cus_name_").html("Required Filed").css("color","red");
            return false;
        }
        var type= $("#type").val();
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
		
		 var fd = new FormData();
          fd.append('biodata', $('#biodata')[0].files[0]);
		  fd.append('photo', $('#photo')[0].files[0]);
		  fd.append('id', $("#id").val());
          fd.append('Customer_id', $("#Customer_id").val());
          fd.append('cus_name', $("#cus_name").val());
          fd.append('type', $("#type").val());
          fd.append('address', $("#address").val());
		  fd.append('praddress', $('#praddress').val());
		  fd.append('district', $('#district').val());
          fd.append('country', $('#country').val());
          fd.append('phone', $('#phone').val());
          fd.append('mobile', $('#mobile').val());
          fd.append('email', $('#email').val());
          fd.append('web', $('#web').val());
          fd.append('credit', $('#credit').val());
		  fd.append('notes', $('#notes').val());
       
        
        var urldata = "<?php echo base_url();?>customer/customerupdate";
        //alert(inputdata);
        $.ajax({
            type: "POST",
            url: urldata,
            data: fd,
			enctype: 'multipart/form-data',
            processData: false, 
            contentType: false,
            success:function(data){
                //$("#saveResult").html(data);
                alert("Update Success");
            }
        });
    }
</script>

