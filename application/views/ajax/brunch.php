<div class="tabContent">
            <div id="tabs" class="clearfix moderntabs">
                <div id="tabs-1">
                   
                        <div class="middle_form">
                            <h2 id="">Add Branch<span style="color:green;float:right"><?php $status = $this->session->userdata('Brunch');if(isset($status))echo $status;$this->session->unset_userdata('Brunch'); ?></span>
                                <span style="color:red;float:right;font-size:15px;"><?php if(isset($exists))echo $exists;?></span>
                            </h2>
                            <div class="body">
                                <div class="full clearfix">
                                    <span>Branch Name</span>
                                    <div class="left">                                      
                                        <input name="Brunchname" type="text" id="Brunchname" class="required" placeholder="" autofocus="" required/>
                                        <span id="msg"></span>
                                    </div>
                                </div>
                                <div class="full clearfix">
                                    <span>Branch Title</span>
                                    <div class="left">                                      
                                        <input name="brunchtitle" type="text" id="brunchtitle" class="required" placeholder="" autofocus="" />
                                    </div>
                                </div>
                                <div class="full clearfix">
                                    <span>Sales Access</span>
                                    <div class="left">                                      
                                        <select name="" id="Access" class="required" style="width:173px">
                                            <option value="2">All</option>
                                            <option value="2">Retail Sales</option>
                                            <option value="1">Whole Sales</option>
                                            <option value="3">Installment Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="full clearfix">
                                    <span>Branch Address</span>
                                    <div class="left"> 
                                        <textarea name="area1" id="brunchaddress" rows="5" class="required"></textarea>
                                    </div>
                                </div>
                                <div class="full clearfix">
                                    <div class="section_right clearfix">
                                        <input type="button" onclick="submit()" name="btnSubmit" value="Add"  title="Save" class="button" />
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
        <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:100%;border-collapse:collapse;">
                <thead>
                    <tr class="header">
                        <th style="width:10px"></th>
                        <th style="width:200px">Branch Name</th>                                                               
                        <th style="width:200px">Sales Access</th>                                                               
                        <th style="width:200px">Branch Title</th>                                                               
                        <th style="width:200px">Branch Address</th>                                                               
                        <th style="width:90px">Action</th>                                                               
                    </tr>
                </thead>
            </table>                    
        </div> 
        <div class="clearfix moderntabs" style="width:330px;width:100%;max-height:300px;overflow:auto;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                <tbody>
                    <?php $i=0;
					$sql = mysql_query("SELECT * FROM tbl_brunch order by Brunch_name asc");
                    while($row = mysql_fetch_array($sql)){ 
					$i++;
					?>
                    <tr>
                        <td style="width:10px"><?php echo $i;?></td>
                        <td style="width:200px"><?php echo $row['Brunch_name'] ?></td>
                        <td style="width:200px"><?php if($row['Brunch_sales']==1){echo "Whole Sales";}else{echo "Retail Sales";} ?></td>
                        <td style="width:200px"><?php echo $row['Brunch_title'] ?></td>
                        <td style="width:200px"><?php echo $row['Brunch_address'] ?></td>
                        <td style="width:80px">
                            <a onclick="Edit_brunch(<?php echo $row['brunch_id'] ?>)"  style="cursor:pointer;color:green;font-size:20px;float:left" title="Eidt" ><i class="fa fa-pencil"></i></a>
                            <!-- <span  style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px" onclick="deleted(<?php echo $row['brunch_id'] ?>)"><i class="fa fa-trash-o"></i></span> -->
                        </td>
                    </tr>
                <?php } ?> 
                </tbody>    
            </table> 
        </div>   