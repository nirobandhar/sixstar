<div class="content_scroll">
    <div id="page_menu" class="page_menu">
        <ul>
            <li class="active"><a href="<?php echo base_url();?>Administrator/customer">Add Customer</a></li>
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
                                <input name="cus_name" type="text" id="cus_name" class="required" autofocus="" style="width:200px" />
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
                                <textarea name="address" rows="2" cols="2" id="address" style="border-color:#C8D3DF;height:70px;width:100%;"></textarea>
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
                                <select name="district" id="dristric" style="width:163px;" required>
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
                            <span>Office Phone</span>
                            <input name="office_phone" type="text" id="office_phone" class="txt" />
                        </div>
                        <div class="full clearfix">
                            <span>Web</span>
                            <input name="web" type="text" id="web" class="txt" />
                        </div> 
                        <div class="full clearfix">
                            <span>Credit Limit</span>
                            <input name="credit" type="text" id="credit" class="txt" value="0" />
                        </div>
                        <div class="full clearfix">
                            <span>Photo</span>
                            <input name="photo" id="photo" type="file" />
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
    
        <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:70%;border-collapse:collapse;">
                <thead>
                    <tr class="header">
                        <th style="width:12%">ID</th>
                        <th style="width:25%">Customer Name</th>
                        <th style="width:25%">Address</th>
                        <th style="width:25%">Contact No</th>
                        <th style="width:13%">Action</th>           
                    </tr>
                </thead>
            </table>                    
        </div>                
        <div class="row_section clearfix" style="height:300px;overflow:auto;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:70%;border-collapse:collapse;">
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

