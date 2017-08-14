<nav>
    <ul>
        <li class="selected">
            <a class="dashboard" href="<?php echo base_url() ?>"><i></i><span>Dashboard</span></a>
        </li>
    </ul>
    <strong>Point of Sale</strong>
    <?php $branchid = $this->session->userdata('userId'); 
    $sql = mysql_query("SELECT * FROM tbl_menuaccess WHERE branch_id= '$branchid'");
    $row = mysql_fetch_array($sql); ?>
    <ul>
        <li>
            <div id='cssmenu'>
                <ul><?php if($row['Product_Sales'] == 1){?>
                    <li class='active'><a href='<?php echo base_url(); ?>sales'><span style="font-weight:bold">Retail Sales</span></a></li>
                    
                    <?php } $selltype = $this->session->userdata('userBrunch'); if($selltype!='2'){ ?>
                    <li class='active'><a href='<?php echo base_url(); ?>wholesales'><span style="font-weight:bold">Whole Sales</span></a></li>
                    <?php } if($row['installment'] == 1){?>
                    <li class='active'><a href='<?php echo base_url(); ?>installment'><span style="font-weight:bold">Installment Salen</span></a></li>
                    <?php }if($row['Sales_Return'] == 1){?>
                    <li class='active'><a href='<?php echo base_url(); ?>sales/salesreturn'><span style="font-weight:bold">Sales Return</span></a></li>
                    <?php } if($row['Purchase_Order'] == 1){?>
                    <li class='active'><a href='<?php echo base_url(); ?>purchase/order'><span style="font-weight:bold">Purchase </span></a></li>
                    <?php } if($row['Purchase_Return'] == 1){?>
                    <li class='active'><a href='<?php echo base_url(); ?>purchase/returns'><span style="font-weight:bold">Purchase Return</span></a></li>
                    <?php } if($row['Current_Stock'] == 1){?>
                    <li class='active'><a href='<?php echo base_url(); ?>products/current_stock'><span style="font-weight:bold">Current Stock</span></a></li>
                    <?php } if($row['Cash_Transaction'] == 1){?>
                    <li class='active'><a href='<?php echo base_url() ?>account/cash_transaction'><span style="font-weight:bold">Cash Transaction</span></a></li>
                    <?php } ?>
                    <li class='active has-sub'><a href='<?php echo base_url() ?>products/transfer'><span style="font-weight:bold">Product Transfer</span></a>
                    	<ul>
                            <li><a href='<?php echo base_url();?>products/pending'><span>Pending Transaction</span></a></li>
                            <li><a href='<?php echo base_url();?>products/sentlist'><span>Sent List</span></a></li>
                            <li ><a href='<?php echo base_url();?>products/transfer_req'><span>Transfer request</span></a></li>
                            <li><a href='<?php echo base_url();?>products/transfer_record'><span>Transfer Record</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>         
        </li>
    </ul>
    <br>
    <strong>Others</strong>
    <ul>
        <?php if($row['Add_Supplier'] == 1){?>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active'><a href='<?php echo base_url(); ?>supplier'><span> Supplier</span></a>
                    </li>
                </ul>
            </div>                      
        </li>
        <?php } if($row['Add_Customer'] == 1){?>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active'><a href='<?php echo base_url(); ?>customer'><span> Customer</span></a></li>
                </ul>
            </div>                      
        </li>  
        <?php } ?>      
        <li>
            <div id='cssmenu'>
                <ul><?php if($row['Purchase'] == 1){?>
                    <li class='active has-sub'><a href='#'><span>Purchase</span></a>
                        <ul><?php if($row['Purchase_Order'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>purchase/order'><span>Purchase Order</span></a></li>
                            <?php } if($row['Purchase_Return'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>purchase/returns'><span>Purchase Return</span></a></li>
                            <?php } if($row['Damage_Entry'] == 1){?>
                            <li ><a href='<?php echo base_url(); ?>purchase/damage_entry'><span>Damage Entry</span></a></li>
                            <?php } if($row['Purchase_Stock'] == 1){?>
                            <li ><a href='<?php echo base_url(); ?>purchase/purchase_stock'><span>Purchase Stock</span></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>                    
        </li>
        <li>
            <div id='cssmenu'>
                <ul><?php if($row['Sales'] == 1){?>
                    <li class='active has-sub'><a href='#'><span>Sales</span></a>
                        <ul><?php if($row['Product_Sales'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>sales'><span>Product Sales</span></a></li>
                            <?php } if($row['Sales_Return'] == 1){?>
                            <li ><a href='<?php echo base_url(); ?>sales/salesreturn'><span>Sales Return</span></a></li>
                            <?php } if($row['Sales_Stock'] == 1){?>
                            <li ><a href='<?php echo base_url(); ?>sales/sales_stock'><span>Sales Stock</span></a></li>
                            <?php  } if($row['installment_record'] == 1){?>
                            <li ><a href='<?php echo base_url(); ?>sales/installmentrpt'><span>Installment Report</span></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }?>
                </ul>
            </div>         
        </li> 
        <li>
              <div id='cssmenu'>
                  <ul><?php if($row['Accounts'] == 1){?>
                      <li class='active has-sub'><a href='#'><span>Accounts</span></a>
                          <ul><?php if($row['Cash_Transaction'] == 1){?>
                              <li><a href='<?php echo base_url() ?>account/cash_transaction'><span>Cash Transaction</span></a></li>
                              <?php }if($row['Add_Account'] == 1){?>
                              <li ><a href='<?php echo base_url() ?>account'><span>Add Account</span></a></li>                           
                              <?php } ?>
                          </ul>
                      </li>
                      <?php } ?>
                  </ul>
              </div>         
          </li>               
        <li>
            <div id='cssmenu'>
                <ul><?php if($row['Employee'] == 1){?>
                    <li class='active has-sub'><a href='#'><span>Employee</span></a>
                        <ul><?php if($row['Add_Employee'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>employee'><span>Add Employee</span></a></li>
                            <?php }if($row['Employee_List'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>employee/emplists'><span>Employee List</span></a></li>
                            <?php }if($row['Add_Designation'] == 1){?>
                            <li ><a href='<?php echo base_url(); ?>employee/designation'><span>Add Designation</span></a></li>
                            <?php }if($row['Add_Department'] == 1){?>
                            <li ><a href='<?php echo base_url(); ?>employee/depertment'><span>Add Department</span></a></li> 
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </div>             
        </li>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Reports</span></a>
                        <ul><?php if($row['Supplier_List'] == 1) { ?>
                            <li class='active'> <a style="cursor:pointer" onclick="window.open('<?php echo base_url(); ?>reports/supplierList', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><span>Supplier List</span></a> </li>
                            <?php }if($row['Customer_List'] == 1) { ?>
                            <li class='active'> <a style="cursor:pointer" onclick="window.open('<?php echo base_url(); ?>reports/customerlist', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><span>Customer List</span></a> </li>
                           
                           <?php }if($row['rpSales'] == 1) { ?>
                            <li class='active has-sub'> <a href='#'><span>Sales</span></a>
                                <ul><?php if($row['Sales_Invoice'] == 1) { ?>
                                    <li> <a href='<?php echo base_url(); ?>sales/sales_invoice'><span>Sales Invoice</span></a> </li>
                                    <?php }if($row['Customer_Due_Report'] == 1) { ?>
                                    <li> <a href='<?php echo base_url(); ?>customer/customer_due'><span>Customer Due Report</span></a> </li>
                                    <?php }if($row['Customer_Payment'] == 1) { ?>
                                    <li> <a href='<?php echo base_url(); ?>customer/customer_payment_report'><span>Customer Payment </span></a> </li>
                                    <?php }if($row['Sales_Record'] == 1) { ?>
                                    <li> <a href='<?php echo base_url(); ?>sales/sales_record'><span>Sales Record</span></a> </li>
                                    <?php }if($row['Sales_Return_List'] == 1) { ?>
                                    <li> <a href='<?php echo base_url(); ?>sales/return_list'><span>Sales Return List</span></a> </li>                                
                                    <?php } ?>
                                </ul>                                 
                            </li> 
                            <?php }if($row['rpPurchase'] == 1) { ?>
                            <li class='active has-sub'>
                                <a href='#'><span>Purchase</span></a>
                                <ul><?php if($row['Purchase_Bill'] == 1){?>
                                    <li> <a href='<?php echo base_url(); ?>purchase/purchase_bill'><span>Purchase Bill</span></a> </li>
                                    <?php }if($row['Supplier_Due_Report'] == 1){?>
                                    <li> <a href='<?php echo base_url(); ?>supplier/supplier_due'><span>Supplier Due Report</span></a> </li>
                                    <?php }if($row['Supplier_Payment'] == 1){?>
                                    <li> <a href='<?php echo base_url(); ?>supplier/supplier_payment_report'><span>Supplier Payment </span></a> </li>
                                    <?php }if($row['Purchase_Record'] == 1){?>
                                    <li> <a href='<?php echo base_url(); ?>purchase/purchase_record'><span>Purchase Record</span></a> </li>
                                    <?php }if($row['Purchase_Return_List'] == 1){?>
                                    <li> <a href='<?php echo base_url(); ?>purchase/returns_list'><span>Purchase Return List</span></a> </li>                                                                                                                
                                    <?php } ?>
                                </ul>                                 
                            </li>
                            <?php } if($row['rpAccounts'] == 1){?>
                            <li class='active has-sub'>
                                <a href='#'><span>Accounts</span></a>
                                <ul><?php if($row['Expense_View'] == 1){?>
                                    <li> <a href='<?php echo base_url(); ?>account/expense'><span>Expense View</span></a> </li>
                                    <?php }if($row['Cash_View'] == 1){?>
                                    <li> <a href='<?php echo base_url(); ?>account/cash_view'><span>Cash View</span></a> </li>
                                    <?php }if($row['monthlysummery'] == 1){?>
                                     <li><a href='<?php echo base_url();?>sales/monthlysummery'><span>Monthly Summery</span></a></li>
                                    <?php }if($row['lossprofit'] == 1){?>
                                    <li> <a href='<?php echo base_url();?>sales/lossprofit'><span>Loss Profit</span></a> </li>
                                    <?php } ?>                                                                                                
                                </ul>                                 
                            </li> 

                            <?php }if($row['Employee_List'] == 1){?>
                            <li class='active'> <a style="cursor:pointer" onclick="window.open('<?php echo base_url(); ?>reports/employeelist', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;">Employee List</a> </li> 
                            <?php } ?>                                                                        
                        </ul>
                    </li>
                </ul>
            </div>             
        </li>
        <li>
            <div id='cssmenu'>
                <ul><?php if($row['Settings'] == 1){?>
                    <li class='active has-sub'><a href='#'><span>Settings</span></a>
                        <ul> <li><a href='<?php echo base_url(); ?>page/add_size'><span>Add size</span></a></li>
							<?php if($row['Add_Category'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>page/add_category'><span>Add Category/Model</span></a></li>
                            <?php }if($row['Add_Product'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>products'><span>Add Product</span></a></li>
                            <?php }if($row['User_Profile'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>user_management'><span>User Profile</span></a></li>
                            <?php }if($row['Add_Unit'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>page/unit'><span>Add Unit</span></a></li> 
                            <?php }if($row['Add_Branch'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>page/brunch'><span>Add Branch</span></a></li> 
                            <?php }if($row['Add_District'] == 1){?>
                            <li><a href='<?php echo base_url(); ?>page/district'><span>Add District</span></a></li>
                            <?php }if($row['Add_Country'] == 1){?> 
                            <li><a href='<?php echo base_url(); ?>page/add_country'><span>Add Country</span></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php }?>
                </ul>
            </div>             
        </li>
        
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Help</span></a>
                        <ul>
                            <li><a href='http://linktechbd.com' target="_blank"><span>Online Support</span></a></li>
                            <li><a href='<?php echo base_url(); ?>page/about_us'><span>About Us</span></a></li>                          
                        </ul>
                    </li>
                </ul>
            </div>             
        </li>                                               
    </ul>
     
</nav>