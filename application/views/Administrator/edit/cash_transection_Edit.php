
        <div class="tabContent">
            <div id="tabs" class="clearfix moderntabs">
            
                <div id="tabs-1">
                    <div class="middle_form">
                        <div class="body">
                            <div class="full clearfix">
                                <span>Transaction ID</span>
                                <div class="left">                                    
                                    <input name="supplier_id" type="text" id="lier_id" class="required" disabled="" value="<?php  echo $selected['Tr_Id']?>" autofocus="" />
                                    <input name="Transaction_id" type="hidden" id="Transaction_id" class="required" value="<?php  echo $selected['Tr_Id']?>" autofocus="" />
                                    <input name="iidd" type="hidden" id="iidd" class="required" value="<?php  echo $selected['Tr_SlNo']?>" autofocus="" />
                                </div>
                            </div>                                
                            <div class="full clearfix">
                                <span>Tr Type</span>
                                <div class="left">                                      
                                    <select name="tr_type" id="tr_type" class="required" style="width:175px" onchange="AutoSelect()">
                                    	<option value=""></option>
                                    	<option value="Cash Receive" <?php if($selected['Tr_Type']=="Cash Receive") echo "selected"; ?>>Cash Receive</option>
                                    	<option value="Cash Payment" <?php if($selected['Tr_Type']=="Cash Payment") echo "selected"; ?>>Cash Payment</option>
                                    	<option value="Deposit To Bank" <?php if($selected['Tr_Type']=="Deposit To Bank") echo "selected"; ?>>Deposit To Bank</option>
                                    	<option value="Withdraw Form Bank" <?php if($selected['Tr_Type']=="Withdraw Form Bank") echo "selected"; ?>>Withdraw Form Bank</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="full clearfix">
                                <span>Account Type</span>
                                <div class="left" id="OfficialSelect">
                                    <select name="acc_type" id="acc_type" class="required" onchange="OnselectAccountType()" style="width:175px">
                                    	<option value=""></option>
                                    	<option value="Customer" <?php if($selected['Tr_account_Type']=="Customer") echo "selected"; ?>>Customer</option>
                                    	<option value="Official" <?php if($selected['Tr_account_Type']=="Official") echo "selected"; ?>>Official</option>
                                    	<option value="Supplier" <?php if($selected['Tr_account_Type']=="Supplier") echo "selected"; ?>>Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <script type="text/javascript">
                                function AutoSelect(){
                                    var tr_type = $("#tr_type").val();
                                    var sent = "AutoSelect";
                                    var inputdata = 'sent='+sent+'&tr_type='+tr_type;
                                    var urldata = "<?php echo base_url();?>Administrator/account/AutoSelect/";
                                    //alert(inputdata);
                                    $.ajax({
                                        type: "POST",
                                        url: urldata,
                                        data: inputdata,
                                        success:function(data){
                                            $("#OfficialSelect").html(data);
                                            //alert("Update Success");
                                        }
                                    });
                                }
                            </script>
                            <div class="full clearfix">
	                            <span>Account Head</span>
	                            <div class="left">
                                    
                                        <select name="account_id" id="account_id" style="width:163px;" required >
                                            <option value="<?php echo $selected['Acc_SlID'];?>">
                                            <?php echo $selected['Acc_Name']; ?></option>
                                            <?php $sql = mysql_query("SELECT * FROM tbl_account order by Acc_Code asc ");
                                            while($row = mysql_fetch_array($sql)){ ?>
                                            <option value="<?php echo $row['Acc_SlNo'] ?>"><?php echo $row['Acc_Name'] ?></option>
                                            <?php } ?>    
                                        </select> 
	                            </div>
	                            <div class="rightElement">
	                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/account/fancybox_add_account">
	                                    <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                
	                                </a> 
	                            </div>
	                        </div>
                           <!--  <div class="full clearfix">
                                        <span>Account Name</span>
                                        <div class="left" id="SelectResultName">                                      
                                            <input name="" type="text" id="" class="required" disabled="" value="" />
                                            <input name="accountName" type="hidden" id="accountName" class="required" value="" />
                                        </div>
                                    </div>           -->         
                           
                            </div>                                                                                                                                                  
                </div>
                </div>
                <div class="right_form">
                    <div class="body">
                       <div class="full clearfix" id="ashiqeCalender">
                            <span>Date</span>
                            <input name="DaTe" id="DaTe" type="text" value="<?php echo $selected['Tr_date'] ?>" class="required" />
                        </div>     
                        <div class="full clearfix">
                            <span></span>
                            
                        </div>
                         <div class="full clearfix">
                            <span></span>
                            
                        </div>
                         <div class="full clearfix">
                            <span></span>
                            
                        </div>
                        <div class="full clearfix">
                            <span>Description</span>
                            <input name="Description" type="text" id="Description" class="txt" value="<?php echo $selected['Tr_Description'] ?>" required/>
                        </div> 
                        <div class="full clearfix">
                            <span>Amount</span>
                            <input name="Amount" type="text" id="Amount" class="txt" value="<?php if($selected['Tr_Type']=="Cash Payment"){echo $selected['Out_Amount'];}if($selected['Tr_Type']=="Deposit To Bank"){echo $selected['In_Amount'];} if($selected['Tr_Type']=="Cash Receive"){echo $selected['In_Amount'];} ?>" required/>
                        </div>                                    
                       
                        <div class="full clearfix">
                            <span></span>
                            <!-- <input type="reset"  value="Reset" class="button" /> -->
                            <input type="button" onclick="TransactionUpdatesubmit()" value="Update" class="button" />
                        </div>                                                                                                                                            
                    </div>
                </div>
            </div>
    
        <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" style="width:70%;border-collapse:collapse;">
                
            </table>                    
        </div>                
        <div class="row_section clearfix">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" style="text-align:left;width:70%;border-collapse:collapse;">
                <thead>
                    <tr class="header">
                        <th style="width:7%">Tr. ID</th>
                        <th style="width:12%">Date</th>
                        <th style="width:20%">Tr Account</th>
                        <th style="width:25%">Description</th>
                        <th style="width:13%">In Amount</th>                      
                        <th style="width:13%">Out Amount</th>                  
                        <th style="width:13%">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $sql = mysql_query("SELECT * FROM tbl_cashtransaction order by Tr_Id asc");
                while($row = mysql_fetch_array($sql)){ ?>
                    <tr>
                        <td style="width:7%"><?php echo $row['Tr_Id'] ?></td>
                        <td style="width:12%"><?php echo $row['Tr_date'] ?></td>
                        <td style="width:20%"><?php echo $row['Tr_Type'] ?></td>
                        <td style="width:25%"><?php echo $row['Tr_Description'] ?></td>
                        <td style="width:13%"><?php echo $row['In_Amount'] ?></td>
                        <td style="width:13%"><?php echo $row['Out_Amount'] ?></td>
                        <td style="width:13%">
                        <a onclick="Edit_transaction(<?php echo $row['Tr_SlNo'] ?>)" style="cursor:pointer;color:green;font-size:20px;float:left" ><i class="fa fa-pencil"></i></a>
                        <span onclick="deleted(<?php echo $row['Tr_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px"><i class="fa fa-trash-o"></i></span>
                        </td>
                    </tr>  
                <?php } ?>                
                </tbody>
            </table>
        </div> 


