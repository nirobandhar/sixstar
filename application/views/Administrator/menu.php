<nav>
    <ul>
        <li class="selected">
            <a class="dashboard" href="<?php echo base_url();?>Administrator"><i></i><span>Dashboard</span></a>
        </li>
    </ul>
    <strong>Point of Sale</strong>
    <ul>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/sales'><span style="font-weight:bold">Retail Sales</span></a></li>
<!--                    --><?php //$selltype = $this->session->userdata('userBrunch'); if($selltype!='2'){ ?>
                    <li class='active'><a href='<?php echo base_url(); ?>Administrator/wholesales'><span style="font-weight:bold">Whole Sales</span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/installment'><span style="font-weight:bold">Installment Sale</span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/sales/salesreturn'><span style="font-weight:bold">Sales Return</span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/purchase/order'><span style="font-weight:bold">Purchase </span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/purchase/returns'><span style="font-weight:bold">Purchase Return</span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/products/current_stock'><span style="font-weight:bold">Current Stock</span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/products/current_short_list'><span style="font-weight:bold">Short List</span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/account/cash_transaction'><span style="font-weight:bold">Cash Transaction</span></a></li>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/page/service'><span style="font-weight:bold">Services</span></a></li>
                    <!--<li class='active has-sub'><a href='<?php //echo base_url() ?>Administrator/products/transfer'><span style="font-weight:bold">Product Transfer</span></a>
                    	<ul>
                            <li><a href='<?php //echo base_url();?>Administrator/products/pending'><span>Pending Transaction</span></a></li>
                            <li><a href='<?php //echo base_url();?>Administrator/products/sentlist'><span>Sent List</span></a></li>
                            <li><a href='<?php //echo base_url();?>Administrator/products/transfer_req'><span>Transfer request</span></a></li>
                            <li><a href='<?php //echo base_url();?>Administrator/products/transfer_record'><span>Transfer Record</span></a></li>
                        </ul>
                    </li>-->
                </ul>
            </div>         
        </li>
    </ul>
    <br>
    <strong>Others</strong>
    <ul>
        
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/supplier'><span>Supplier</span></a>
                    </li>
                </ul>
            </div>                      
        </li>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active'><a href='<?php echo base_url();?>Administrator/customer'><span>Customer</span></a></li>
                </ul>
            </div>                      
        </li>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Product</span></a>
                        <ul>
                            <li class='active'><a href='<?php echo base_url();?>Administrator/products'><span style="font-weight:bold">Add Products</span></a></li>
                            <li><a href='<?php echo base_url();?>Administrator/products/Products_List'><span>Products List</span></a></li>
                            <li><a href='<?php echo base_url();?>Administrator/page/add_category'><span>Add Model</span></a></li>
                            <li><a href='<?php echo base_url();?>Administrator/page/add_size'><span>Add Size</span></a></li>
                            <li><a href='<?php echo base_url();?>Administrator/page/unit'><span>Add Unit</span></a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Purchase</span></a>
                        <ul>
                            <li><a href='<?php echo base_url();?>Administrator/purchase/order'><span>Purchase Order</span></a></li>
                            <li><a href='<?php echo base_url();?>Administrator/purchase/returns'><span>Purchase Return</span></a></li>
                            <li ><a href='<?php echo base_url();?>Administrator/purchase/damage_entry'><span>Damage Entry</span></a></li>
                            <li ><a href='<?php echo base_url();?>Administrator/purchase/purchase_stock'><span>Purchase Stock</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>                    
        </li>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Sales</span></a>
                        <ul>
                            <li><a href='<?php echo base_url();?>Administrator/sales'><span>Product Sales</span></a></li>
                            <li ><a href='<?php echo base_url();?>Administrator/sales/salesreturn'><span>Sales Return</span></a></li>
                            <li ><a href='<?php echo base_url();?>Administrator/sales/sales_stock'><span>Sales Stock</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>         
        </li> 
        <li>
              <div id='cssmenu'>
                  <ul>
                      <li class='active has-sub'><a href='#'><span>Accounts</span></a>
                          <ul>
                              <li><a href='<?php echo base_url();?>Administrator/account/cash_transaction'><span>Cash Transaction</span></a></li>
                              <!-- <li><a href='<?php echo base_url();?>Administrator/account/'><span>Cash View </span></a></li> -->
                              <li ><a href='<?php echo base_url();?>Administrator/account'><span>Add Account</span></a></li>                           
                          </ul>
                      </li>
                  </ul>
              </div>         
          </li>               
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Employee</span></a>
                        <ul>
                            <li><a href='<?php echo base_url();?>Administrator/employee'><span>Add Employee</span></a></li>
                            <li><a href='<?php echo base_url();?>Administrator/employee/emplists'><span>Employee List</span></a></li>
                            <li ><a href='<?php echo base_url();?>Administrator/employee/designation'><span>Add Designation</span></a></li>
                            <li ><a href='<?php echo base_url();?>Administrator/employee/depertment'><span>Add Department</span></a></li> 
                        </ul>
                    </li>
                </ul>
            </div>             
        </li>
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Reports</span></a>
                        <ul>
                            <li class='active'>
                                <a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/supplierList', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><span>Supplier List</span></a>
                            </li>
                            <li class='active'>
                                <a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/customerlist', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><span>Customer List</span></a>
                            </li><li class='active'>
                                <a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/sales/customer_statement', 'width=850, height=800,scrollbars=yes'); return false;"><span>Customer Statement</span></a>
                            </li>
                            <li class='active'>
                                <a style="cursor:pointer" href="<?php echo base_url(); ?>Administrator/account/daily_summery"><span>Daily Summery</span></a>
                            </li>
                            <li class='active'>
                             <a href='<?php echo base_url();?>Administrator/products/getbranchstock'><span>Branch wise Stock</span></a>
                            </li>
                            <!-- <li class='active has-sub'>
                                <a href='#'><span>Inventory</span></a>
                                <ul>
                                   <li>
                                        <a href='#'><span>Stock Report</span></a>
                                   </li>
                                   <li>
                                        <a href='#'><span>Damaged Product List</span></a>
                                   </li>                                      
                                </ul>                                  
                            </li> -->
                            <li class='active has-sub'>
                                <a href='#'><span>Sales</span></a>
                                <ul>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/sales/sales_invoice'><span>Sales Invoice</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/customer/customer_due'><span>Customer Due Report</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/customer/customer_payment_report'><span>Customer Payment </span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/sales/sales_record'><span>Sales Record</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/sales/installmentrpt'><span>Installment Report</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/sales/return_list'><span>Sales Return List</span></a>
                                    </li>
                                    <!-- <li>
                                                                                                                                                      <a href='#'><span>Profit/Lose By Sales</span></a>
                                                                                                                                                  </li>  -->                                                                                                              
                                </ul>                                 
                            </li> 
                            <li class='active has-sub'>
                                <a href='#'><span>Purchase</span></a>
                                <ul>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/purchase/purchase_bill'><span>Purchase Invoice</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/supplier/supplier_due'><span>Supplier Due Report</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/supplier/supplier_payment_report'><span>Supplier Payment </span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/purchase/purchase_record'><span>Purchase Record</span></a>
                                    </li>
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/purchase/returns_list'><span>Purchase Return List</span></a>
                                    </li>                                                                                                                
                                </ul>                                 
                            </li>
                            <li class='active has-sub'>
                                <a href='#'><span>Accounts</span></a>
                                <ul>
                                   <li>
                                        <a href='<?php echo base_url();?>Administrator/account/expense'><span>Expense View</span></a>
                                   </li>
                                   <li>
                                        <a href='<?php echo base_url();?>Administrator/account/cash_view'><span>Cash View</span></a>
                                   </li> 
                                   <li>
                                        <a href='<?php echo base_url();?>Administrator/sales/monthlysummery'><span>Monthly Summery</span></a>
                                    </li> 
                                    <li>
                                        <a href='<?php echo base_url();?>Administrator/sales/lossprofit'><span>Profit and Loss Summary</span></a>
                                    </li>                                                                                                           
                                </ul>                                 
                            </li> 
                            <li class='active '>
                                <a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/employeelist', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;">Employee List</a>
                            </li> 
                           <!--  <li class='active has-sub'>
                              <a href='#'><span>Others</span></a>
                              <ul>
                                 <li>
                                      <a href='#'><span>Product List</span></a>
                                 </li>
                                 <li>
                                      <a href='#'><span>Re-order List</span></a>
                                 </li>                                     
                              </ul>                                
                          </li>  -->                                                                                                   
                        </ul>
                    </li>
                </ul>
            </div>             
        </li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Settings</span></a>
                        <ul>
                            <!--<li><a href='<?php /*echo base_url();*/?>Administrator/page/company_profile'><span>Company Profile</span></a></li>-->
                            <?php $access = $this->session->userdata('accountType'); if($access != 'u'){?>
                            <li><a href='<?php echo base_url();?>Administrator/user_management'><span>User Profile</span></a></li><?php } ?>
                            <li><a href='<?php echo base_url();?>Administrator/page/brunch'><span>Add Branch</span></a></li> 
                            <li><a href='<?php echo base_url();?>Administrator/page/district'><span>Add District</span></a></li> 
                            <li><a href='<?php echo base_url();?>Administrator/page/add_country'><span>Add Country</span></a></li>
                             <li><a href='<?php echo base_url();?>Administrator/'><span>Database Backup</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </li>
        <!-- <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Tools</span></a>
                        <ul>
                            <li><a href='#'><span>Calculator</span></a></li>
                            <li><a href='#'><span>Notepad</span></a></li>
                            <li><a href='#'><span>Task Manager</span></a></li>
                            <li><a href='#'><span>MS Word</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </li> -->
        <li>
            <div id='cssmenu'>
                <ul>
                    <li class='active has-sub'><a href='#'><span>Help</span></a>
                        <ul>
                            <li><a href='http://linktechbd.com' target="_blank"><span>Online Support</span></a></li>
                            <li><a href='<?php echo base_url();?>Administrator/page/about_us'><span>About Us</span></a></li>                          
                        </ul>
                    </li>
                </ul>
            </div>             
        </li>                                               
    </ul>
     
</nav>