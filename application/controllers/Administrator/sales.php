<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->sbrunch = $this->session->userdata('BRANCHid');
        $access = $this->session->userdata('userId');
         if($access == '' ){
            redirect("login");
        }
        $this->load->model('billing_model');
        $this->load->library('cart');
        $this->load->model('model_table', "mt", TRUE);
        $this->load->helper('form');
		date_default_timezone_set('Asia/Dhaka');
    }
    public function index()  {
        $this->cart->destroy();
        $data['title'] = "Product Sales";
        $data['content'] = $this->load->view('Administrator/sales/product_sales', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    //Designation
    function selectCustomer()  {
        $data['cid'] = $this->input->post('cid');
        // $query = "SELECT * FROM tbl_customer where Customer_SlNo = '$cid'";
        // $data['customer'] = $this->mt->edit_by_id($query);
        $this->load->view('Administrator/sales/ajax_customer', $data);
    }
    function SelectProducts()  {
        $ProID = $this->input->post('ProID');
        $query = "SELECT tbl_product.*,tbl_unit.* FROM tbl_product left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID where tbl_product.Product_SlNo = '$ProID'";
        $data['Product'] = $this->mt->edit_by_id($query);
        $this->load->view('Administrator/sales/ajax_product', $data);
    }
    public function sales_order(){
        $customerID = $this->input->post('customerID');
        if($customerID == '0'){
            $sales = array(
                "SaleMaster_InvoiceNo"                      =>$this->input->post('salesInvoiceno'),
                "SalseCustomer_IDNo"                        =>$this->input->post('customerID'),
                "SalseCustomer_Name"                        =>$this->input->post('CusName'),
                "SalseCustomer_Contact"                     =>$this->input->post('CusMobile'),
                "SalseCustomer_Address"                     =>$this->input->post('CusAddress'),
                "SaleMaster_SaleDate"                       =>$this->input->post('sales_date'),
                "SaleMaster_Description"                    =>$this->input->post('SelesNotes'),
                "SaleMaster_TotalSaleAmount"                =>$this->input->post('subTotal'),
                "SaleMaster_TotalDiscountAmount"            =>$this->input->post('SellsDiscount'),
                "SaleMaster_RewordDiscount"                 =>$this->input->post('Reword_Discount'),
                "SaleMaster_TaxAmount"                      =>$this->input->post('vatPersent'),
                "SaleMaster_Freight"                        =>$this->input->post('SellsFreight'),
                "SaleMaster_SubTotalAmount"                 =>$this->input->post('SellTotals'),
                "SaleMaster_PaidAmount"                     =>$this->input->post('SellsPaid'),
                "SaleMaster_DueAmount"                      =>$this->input->post('SellsDue'),
    			'Status'                                    => $this->input->post('status'),
                "AddBy"                                     =>$this->session->userdata("FullName"),
                "SaleMaster_branchid"                       =>$this->session->userdata("BRANCHid"),
                "AddTime"                                   =>date("Y-m-d h:i:s"),
            );

        }else{
            $sales = array(
                "SaleMaster_InvoiceNo"                      =>$this->input->post('salesInvoiceno'),
                "SalseCustomer_IDNo"                        =>$this->input->post('customerID'),
                "SaleMaster_SaleDate"                       =>$this->input->post('sales_date'),
                "SaleMaster_Description"                    =>$this->input->post('SelesNotes'),
                "SaleMaster_TotalSaleAmount"                =>$this->input->post('subTotal'),
                "SaleMaster_TotalDiscountAmount"            =>$this->input->post('SellsDiscount'),
                "SaleMaster_RewordDiscount"                 =>$this->input->post('Reword_Discount'),
                "SaleMaster_TaxAmount"                      =>$this->input->post('vatPersent'),
                "SaleMaster_Freight"                        =>$this->input->post('SellsFreight'),
                "SaleMaster_SubTotalAmount"                 =>$this->input->post('SellTotals'),
                "SaleMaster_PaidAmount"                     =>$this->input->post('SellsPaid'),
                "SaleMaster_DueAmount"                      =>$this->input->post('SellsDue'),
                'Status'                                    => $this->input->post('status'),
                "AddBy"                                     =>$this->session->userdata("FullName"),
                "SaleMaster_branchid"                       =>$this->session->userdata("BRANCHid"),
                "AddTime"                                   =>date("Y-m-d h:i:s"),
            );

        } 

        $sales_id = $this->billing_model->SalesOrder($sales);
        $data = array(
            "CPayment_date"                     =>$this->input->post('sales_date', TRUE),
            "CPayment_invoice"                  =>$this->input->post('salesInvoiceno', TRUE),
            "CPayment_customerID"               =>$this->input->post('customerID', TRUE),
            "CPayment_amount"                   =>$this->input->post('SellsPaid', TRUE),
            "CPayment_notes"                    =>$this->input->post('SelesNotes', TRUE),
			'status'                            => $this->input->post('status'),
            "CPayment_Addby"                    =>$this->session->userdata("FullName"),
            "CPayment_brunchid"                 =>$this->session->userdata("BRANCHid")
        );
        $this->mt->save_data("tbl_customer_payment", $data);
        
        if ($cart = $this->cart->contents()){
            foreach ($cart as $item){
                $proname = $item['name'];
                    $order_detail = array(
                        'SaleMaster_IDNo'               => $sales_id,
                        'Product_IDNo'                  => $item['id'],
                        'SaleDetails_TotalQuantity'     => $item['qty'],
						'Status'                        => $this->input->post('status'),
                        'SaleDetails_Rate'              => $item['price'],
                        'SaleDetails_unit'              => $item['image'],
                        'Purchase_Rate'                 => $item['purchaserate'],
						'saledetailbrids'               => $this->session->userdata("BRANCHid")
                    );
                    $this->billing_model->insert_sales_detail($order_detail);
                    // Stock add
                    $sql = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo = '".$item['id']."'");
                    $rox = mysql_fetch_array($sql);
                    $id = $rox['SaleInventory_SlNo'];
                    $oldStock = $rox['SaleInventory_TotalQuantity'];

                    if($rox['sellProduct_IdNo']== $item['id']){
                        $addStock = array(
                            'sellProduct_IdNo'                      => $item['id'],
                            'SaleInventory_TotalQuantity'           => $oldStock+$item['qty'],
                            'SaleInventory_brunchid'                => $this->sbrunch,
                            "UpdateBy"                              =>$this->session->userdata("FullName"),
                            "UpdateTime"                            =>date("Y-m-d h:i:s")
                        );
                        $this->mt->update_data("tbl_saleinventory",$addStock,$id,'SaleInventory_SlNo');  
                    }else{
                        $addStock = array(
                            'sellProduct_IdNo'                      => $item['id'],
                            'SaleInventory_TotalQuantity'           => $item['qty'],
                            'SaleInventory_brunchid'                => $this->sbrunch,
                            "AddBy"                                 =>$this->session->userdata("FullName"),
                            "AddTime"                               =>date("Y-m-d h:i:s")
                        );
                    $this->mt->save_data("tbl_saleinventory",$addStock);
                    } 
					//$query5 ="select * from tbl_branchwise_product Where pro_codes ='".$proids."' AND branch_ids='".$this->session->userdata("BRANCHid")."'";
					//$result5 = mysql_query($query5)or die(mysql_error());
					//$row5 = mysql_fetch_array( $result5);
					//$totalstock2 = $row5['total_branchqty'];
					//$addstock2 = $totalstock2-$item['qty'];
					//mysql_query("UPDATE tbl_branchwise_product SET total_branchqty='$addstock2' WHERE pro_codes ='".$proids."' AND branch_ids='".$this->session->userdata("BRANCHid")."'") or die(mysql_error());
            }// end foreach
        }// end if

        $this->cart->destroy();
        $sss['lastidforprint'] = $sales_id;
        $this->session->set_userdata($sss);
        $this->load->view('Administrator/sales/product_sales');
    }
    function salesreturn(){
        $data['title'] = " Sales Return";
        $data['content'] = $this->load->view('Administrator/sales/salseReturn', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    function salesreturnSearch(){
        $invoice = $this->input->post('invoiceno');
        $sql = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SlNo = '$invoice'");
        $row = mysql_fetch_array($sql);
        $data['proID'] = $row['SaleMaster_SlNo'];
        $data['invoices'] = $row['SaleMaster_InvoiceNo'];
        $this->load->view('Administrator/sales/salesReturnList', $data);
    }
    function salesreturnInvoice($invoice_id=''){
        $data['title'] = " Sales Return Invoice";
        //$data['id'] = $this->session->userdata('SalesID');
        $data['invoices'] = $invoice_id;
        $this->load->view('Administrator/sales/salesReturnInvoice', $data);
    }
    function SalesReturnInsert(){
        
        $returnqty = $this->input->post('returnqty');
        $returnamount = $this->input->post('returnamount');
        $return_date = $this->input->post('return_date');
        $productID = $this->input->post('productID');
        $salseQTY = $this->input->post('salseQTY');
        $invoices = $this->input->post('invoice');
        $totalQty = "";
        $RAmount = "";
        $totalarray =  sizeof($returnqty);
        for($j=0;$j<$totalarray; $j++){
            $rqtys = $this->input->post('returnqty');
            $totalQty = $rqtys[$j]+$totalQty;
            $ramounts = $this->input->post('returnamount');
            $RAmount =$ramounts[$j]+$RAmount;
        }
        $sqlll = mysql_query("SELECT * FROM tbl_salereturn where SaleMaster_InvoiceNo = '$invoices'");
        $ros = mysql_fetch_array($sqlll);
        $iid = $ros['SaleReturn_SlNo'];
        $ivo = $ros['SaleMaster_InvoiceNo'];

        $totalqt = $ros['SaleReturn_ReturnQuantity'];
        $totalamou = $ros['SaleReturn_ReturnAmount'];
        $fld = 'SaleReturn_SlNo';

        if($ivo >0){
            $return = array(
                "SaleMaster_InvoiceNo"               =>$this->input->post('invoice'),
                "SaleReturn_ReturnDate"              =>$this->input->post('return_date'),
                "SaleReturn_ReturnQuantity"          =>$totalQty+$totalqt,
                "SaleReturn_ReturnAmount"            =>$RAmount+$totalamou,
                "SaleReturn_Description"             =>$this->input->post('Notes'),
                
                "AddBy"                              =>$this->session->userdata("FullName"),
                "SaleReturn_brunchId"                =>$this->session->userdata("BRANCHid"),
                "AddTime"                            =>date("Y-m-d h:i:s")
            );      
            $return_id = $this->mt->update_data('tbl_salereturn',$return,$iid,$fld);
            for($i=0;$i<$totalarray; $i++){
                $returnqtyss = $this->input->post('returnqty');
                $returnamounts = $this->input->post('returnamount');
                $productIDs = $this->input->post('productID');
                $salseQTYs = $this->input->post('salseQTY');
                //
                $productsCodes = $this->input->post('productsCodes');
                $productsCodes=$productsCodes[$i];
                $packnames = $this->input->post('packname');
                $packnames = $packnames[$i];
                $productsName = $this->input->post('productsName');
                $productsName = $productsName[$i];
                if($packnames == $productsName){
                    $sqj = mysql_query("SELECT * FROM tbl_package_create WHERE create_pacageID ='".$productsCodes."'");
                    while($romio = mysql_fetch_array($sqj)){

                        $sqn = mysql_query("SELECT * FROM tbl_product WHERE Product_Code = '".$romio['create_proCode']."'");
                        $ron = mysql_fetch_array($sqn);
                    //---------------------------------------
                        $returns = array(
                            "SaleReturn_IdNo"                           =>$iid,
                            "SaleReturnDetails_ReturnDate"              =>$this->input->post('return_date'),
                            "SaleReturnDetailsProduct_SlNo"             =>$ron['Product_SlNo'],//$productIDs[$i],
                            "SaleReturnDetails_SaleQuantity"            =>$salseQTYs[$i],
                            "SaleReturnDetails_ReturnQuantity"          =>$returnqtyss[$i]*$romio['cteate_qty'],
                            "SaleReturnDetails_Qty"                     =>$returnqtyss[$i],
                            "SaleReturnDetails_ReturnAmount"            =>$returnamounts[$i],
                            
                            "AddBy"                                     =>$this->session->userdata("FullName"),
                            "SaleReturnDetails_brunchID"                =>$this->session->userdata("BRANCHid"),
                            "AddTime"                                   =>date("Y-m-d h:i:s")
                        );      
                        $this->billing_model->SalesReturn('tbl_salereturndetails',$returns);
						$query5 ="select * from tbl_branchwise_product Where pro_codes ='".$ron['Product_SlNo']."' AND branch_ids='".$this->session->userdata("BRANCHid")."'";
					$result5 = mysql_query($query5)or die(mysql_error());
					$row5 = mysql_fetch_array( $result5);
					$totalstock2 = $row5['total_branchqty'];
					$addstock2 = $totalstock2+($returnqtyss[$i]*$romio['cteate_qty']);
					mysql_query("UPDATE tbl_branchwise_product SET total_branchqty='$addstock2' WHERE pro_codes ='".$ron['Product_SlNo']."' AND branch_ids='".$this->session->userdata("BRANCHid")."'") or die(mysql_error());
                    }
                }else{
                    $returns = array(
                        "SaleReturn_IdNo"                           =>$iid,
                        "SaleReturnDetails_ReturnDate"              =>$this->input->post('return_date'),
                        "SaleReturnDetailsProduct_SlNo"             =>$productIDs[$i],
                        "SaleReturnDetails_SaleQuantity"            =>$salseQTYs[$i],
                        "SaleReturnDetails_ReturnQuantity"          =>$returnqtyss[$i],
                        "SaleReturnDetails_ReturnAmount"            =>$returnamounts[$i],
                        
                        "AddBy"                                     =>$this->session->userdata("FullName"),
                        "SaleReturnDetails_brunchID"                =>$this->session->userdata("BRANCHid"),
                        "AddTime"                                   =>date("Y-m-d h:i:s")
                    );      
                    $this->billing_model->SalesReturn('tbl_salereturndetails',$returns);
					
					$query5 ="select * from tbl_branchwise_product Where pro_codes ='".$productIDs[$i]."' AND branch_ids='".$this->session->userdata("BRANCHid")."'";
					$result5 = mysql_query($query5)or die(mysql_error());
					$row5 = mysql_fetch_array( $result5);
					$totalstock2 = $row5['total_branchqty'];
					$addstock2 = $totalstock2+$returnqtyss[$i];
					mysql_query("UPDATE tbl_branchwise_product SET total_branchqty='$addstock2' WHERE pro_codes ='".$productIDs[$i]."' AND branch_ids='".$this->session->userdata("BRANCHid")."'") or die(mysql_error());
                }
                //
                
            }   
        }else{
            $return = array(
                "SaleMaster_InvoiceNo"               =>$this->input->post('invoice'),
                "SaleReturn_ReturnDate"              =>$this->input->post('return_date'),
                "SaleReturn_ReturnQuantity"          =>$totalQty,
                "SaleReturn_ReturnAmount"            =>$RAmount,
                "SaleReturn_Description"             =>$this->input->post('Notes'),
                
                "AddBy"                              =>$this->session->userdata("FullName"),
                "SaleReturn_brunchId"                =>$this->session->userdata("BRANCHid"),
                "AddTime"                            =>date("Y-m-d h:i:s")
            );      
            $return_id = $this->billing_model->SalesReturn('tbl_salereturn',$return);
            for($i=0;$i<$totalarray; $i++){
                $returnqtyss = $this->input->post('returnqty');
                $returnamounts = $this->input->post('returnamount');
                $productIDs = $this->input->post('productID');
                $salseQTYs = $this->input->post('salseQTY');
                //
                $productsCodes = $this->input->post('productsCodes');
                $productsCodes=$productsCodes[$i];
                $packnames = $this->input->post('packname');
                $packnames = $packnames[$i];
                $productsName = $this->input->post('productsName');
                $productsName = $productsName[$i];
                if($packnames == $productsName){
                    $sqj = mysql_query("SELECT * FROM tbl_package_create WHERE create_pacageID ='".$productsCodes."'");
                    while($romio = mysql_fetch_array($sqj)){

                        $sqn = mysql_query("SELECT * FROM tbl_product WHERE Product_Code = '".$romio['create_proCode']."'");
                        $ron = mysql_fetch_array($sqn);
                    //---------------------------------------
                        $returns = array(
                            "SaleReturn_IdNo"                           =>$return_id,
                            "SaleReturnDetails_ReturnDate"              =>$this->input->post('return_date'),
                            "SaleReturnDetailsProduct_SlNo"             =>$ron['Product_SlNo'],//$productIDs[$i],
                            "SaleReturnDetails_SaleQuantity"            =>$salseQTYs[$i],
                            "SaleReturnDetails_ReturnQuantity"          =>$returnqtyss[$i]*$romio['cteate_qty'],
                            "SaleReturnDetails_Qty"                     =>$returnqtyss[$i],
                            "SaleReturnDetails_ReturnAmount"            =>$returnamounts[$i],
                            
                            "AddBy"                                     =>$this->session->userdata("FullName"),
                            "SaleReturnDetails_brunchID"                =>$this->session->userdata("BRANCHid"),
                            "AddTime"                                   =>date("Y-m-d h:i:s")
                        );      
                        $this->billing_model->SalesReturn('tbl_salereturndetails',$returns);
						
						$query5 ="select * from tbl_branchwise_product Where pro_codes ='".$ron['Product_SlNo']."' AND branch_ids='".$this->session->userdata("BRANCHid")."'";
					$result5 = mysql_query($query5)or die(mysql_error());
					$row5 = mysql_fetch_array( $result5);
					$totalstock2 = $row5['total_branchqty'];
					$addstock2 = $totalstock2+($returnqtyss[$i]*$romio['cteate_qty']);
					mysql_query("UPDATE tbl_branchwise_product SET total_branchqty='$addstock2' WHERE pro_codes ='".$ron['Product_SlNo']."' AND branch_ids='".$this->session->userdata("BRANCHid")."'") or die(mysql_error());
                    }
                 }else{
                    $returns = array(
                        "SaleReturn_IdNo"                           =>$return_id,
                        "SaleReturnDetails_ReturnDate"              =>$this->input->post('return_date'),
                        "SaleReturnDetailsProduct_SlNo"             =>$productIDs[$i],
                        "SaleReturnDetails_SaleQuantity"            =>$salseQTYs[$i],
                        "SaleReturnDetails_ReturnQuantity"          =>$returnqtyss[$i],
                        "SaleReturnDetails_ReturnAmount"            =>$returnamounts[$i],
                        
                        "AddBy"                                     =>$this->session->userdata("FullName"),
                        "SaleReturnDetails_brunchID"                =>$this->session->userdata("BRANCHid"),
                        "AddTime"                                   =>date("Y-m-d h:i:s")
                    );      
                    $this->billing_model->SalesReturn('tbl_salereturndetails',$returns);
					
					$query5 ="select * from tbl_branchwise_product Where pro_codes ='".$productIDs[$i]."' AND branch_ids='".$this->session->userdata("BRANCHid")."'";
					$result5 = mysql_query($query5)or die(mysql_error());
					$row5 = mysql_fetch_array( $result5);
					$totalstock2 = $row5['total_branchqty'];
					$addstock2 = $totalstock2+$returnqtyss[$i];
					mysql_query("UPDATE tbl_branchwise_product SET total_branchqty='$addstock2' WHERE pro_codes ='".$productIDs[$i]."' AND branch_ids='".$this->session->userdata("BRANCHid")."'") or die(mysql_error());
                }

                
            }   

        }
        for($f=0;$f<$totalarray; $f++){
            $productIDs = $this->input->post('productID');
            $rqtyss = $this->input->post('returnqty');
            //------------------------------------------
            $productsCodes = $this->input->post('productsCodes');
            $productsCodes=$productsCodes[$f];
            $packnames = $this->input->post('packname');
            $packnames = $packnames[$f];
            $productsName = $this->input->post('productsName');
            $productsName = $productsName[$f];
            if($packnames == $productsName){
                $sqj = mysql_query("SELECT * FROM tbl_package_create WHERE create_pacageID ='".$productsCodes."'");
                while($romio = mysql_fetch_array($sqj)){

                    $sqn = mysql_query("SELECT * FROM tbl_product WHERE Product_Code = '".$romio['create_proCode']."'");
                    $ron = mysql_fetch_array($sqn);

                    $sqls = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo ='".$ron['Product_SlNo']."' AND SaleInventory_brunchid='".$this->session->userdata("BRANCHid")."'");
                    $ROW = mysql_fetch_array($sqls);
                    $id = $ROW['SaleInventory_SlNo'];
                    $qTys= $romio['cteate_qty']*$rqtyss[$f];
                    $qt = $ROW['SaleInventory_ReturnQuantity'];
                    $qtpac = $ROW['SaleInventory_returnqty'];
                    $fld = "SaleInventory_SlNo";
                    $returns = array(
                        "SaleInventory_ReturnQuantity"      =>$qTys+$qt,
                        "SaleInventory_returnqty"           =>$qtpac+$rqtyss[$f]
                    );      
                    $this->mt->update_data('tbl_saleinventory',$returns, $id,$fld);
                }
            }else{
                $sqls = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo ='".$productIDs[$f]."' AND SaleInventory_brunchid='".$this->session->userdata("BRANCHid")."' ");
                $ROW = mysql_fetch_array($sqls);
                $id = $ROW['SaleInventory_SlNo'];
                $qt = $ROW['SaleInventory_ReturnQuantity'];
                $fld = "SaleInventory_SlNo";
                $returns = array(
                    "SaleInventory_ReturnQuantity"      =>$rqtyss[$f]+$qt
                );      
                $this->mt->update_data('tbl_saleinventory',$returns, $id,$fld);
            }        
            
        }
        
        $this->load->view('Administrator/sales/blankpage');

    }
    public function sales_invoice()  {
        $data['title'] = "Sales Invoice";
        $data['content'] = $this->load->view('Administrator/sales/sales_invoice', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function sales_invoice_search()  {
        $id = $this->input->post('SaleMasteriD');
        $sql = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SlNo = '$id'");
        $row = mysql_fetch_array($sql);
        $datas['SalesID'] = $row['SaleMaster_SlNo'];
        $datas['invoices'] = $row['SaleMaster_InvoiceNo'];
        $this->session->set_userdata($datas);
        $this->load->view('Administrator/sales/sales_invoice_search', $datas);
    }
    function sales_record()  {
        $data['title'] = "Sales Record";
        $data['content'] = $this->load->view('Administrator/sales/sales_record', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    function sales_customerName()  {
        $id = $this->input->post('customerID');
        $sql = mysql_query("SELECT * FROM tbl_customer WHERE Customer_SlNo = '$id'");
        $row = mysql_fetch_array($sql);
        $datas['customerName'] = $row['Customer_Name'];
        $this->load->view('Administrator/sales/salesrecord_customername', $datas);
    }
    
    function search_sales_record()  {
        $dAta['searchtype']= $searchtype = $this->input->post('searchtype');
        $dAta['Sales_startdate']=$Sales_startdate = $this->input->post('Sales_startdate');
        $dAta['Sales_enddate']=$Sales_enddate = $this->input->post('Sales_enddate');
        $dAta['customerID']=$customerID = $this->input->post('customerID');
        $dAta['Salestype']=$Salestype = $this->input->post('Salestype');
        $this->session->set_userdata($dAta);

        if($searchtype == "All"){
            if($Salestype == 'All'){
				//echo "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' ";
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' ";
            }else{
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$Salestype' and tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' ";
            }
        }
        if($searchtype == "Customer"){
            if($Salestype == 'All'){
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate'";
            }else{
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$Salestype' and tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate'";
            }
            
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('Administrator/sales/sales_record_list', $datas);
    }
    function sales_stock()  {
        $data['title'] = "Sales Stock";
        $data['content'] = $this->load->view('Administrator/stock/sales_stock', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function sellAndPrint()  {
        $data['title'] = "Sales Report";
        $id = $this->session->userdata('lastidforprint');
        $sql = mysql_query("SELECT * FROM tbl_salesmaster WHERE SaleMaster_SlNo = '$id'");
        $row = mysql_fetch_array($sql);
        $datas['SalesID'] = $row['SaleMaster_SlNo'];
        $datas['invoices'] = $row['SaleMaster_InvoiceNo'];
        $this->session->set_userdata($datas);
        $data['content'] = $this->load->view('Administrator/sales/sellAndreport', $datas, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    function return_list()  {
        $data['title'] = "Sales Return List";
        $data['content'] = $this->load->view('Administrator/sales/return_list', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
	function installmentrpt(){
		 	$data['title'] = "Installment Report Monthly";
			$data['content'] = $this->load->view('Administrator/sales/monthlyreportforins', $data, TRUE);
			$this->load->view('Administrator/index', $data);
		}
	function installmentrecord(){
		$data['cmonth']=$this->input->post('Purchase_date');
		$this->load->view('Administrator/sales/detailsinstallment',$data);
		}
	function monthlysummery(){
			$data['title'] = "Monthly Summery Sheet";
			$data['content'] = $this->load->view('Administrator/sales/monthlysummery', $data, TRUE);
			$this->load->view('Administrator/index', $data);
		}
	function monthlyrecord(){
		$data['cmonth']=$this->input->post('Purchase_date');
		$this->load->view('Administrator/sales/monthlysummeryresult',$data);
		}
	function lossprofit(){
			$data['title'] = "Loss Profit Calculation";
			$data['content'] = $this->load->view('Administrator/sales/lossprofitsummery', $data, TRUE);
			$this->load->view('Administrator/index', $data);
		}
		
    function craditlimit(){
        $cid = $this->input->post('custID');
        $sql = mysql_query("SELECT *  FROM tbl_customer_payment  where CPayment_customerID = '$cid' ");
        $sell = '';
        $paid = '';
        while($rox = mysql_fetch_array($sql)){
            $paid =$paid+ $rox['CPayment_amount'];
        }
        $sqlx = mysql_query("SELECT * FROM tbl_salesmaster  where SalseCustomer_IDNo = '$cid' ");
        while($rox = mysql_fetch_array($sqlx)){
            $sell =$sell+ $rox['SaleMaster_SubTotalAmount'];
        }

        //echo  $sell.'<br>';echo $paid;
        $data['totaldue'] = $sell-$paid;
        $sqll = mysql_query("SELECT * FROM tbl_customer WHERE Customer_SlNo = '$cid'");
        $rol = mysql_fetch_array($sqll);
        $data['craditlimit'] = $rol['Customer_Credit_Limit'];
        $this->load->view('Administrator/sales/craditlimit', $data);
    }
}
