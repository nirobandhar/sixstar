<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->brunch = $this->session->userdata('BRANCHid');
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
        $data['title'] = "Product Sales";
        $data['content'] = $this->load->view('sales/product_sales', $data, TRUE);
        $this->load->view('index', $data);
    }
    public function supplierList()  {
        $data['title'] = "Supplier List";
        $this->load->view('reports/supplierList', $data);
    }
    public function customerlist()  {
        $data['title'] = "Customer List";
        $this->load->view('reports/customer_list', $data);
    }
    public function employeelist()  {
        $data['title'] = "Employee List";
        $this->load->view('reports/employeelist', $data);
    }
    public function sales_invoice()  {
        $data['title'] = "Sales Invoice";
        $data['id'] = $this->session->userdata('SalesID');
        $this->load->view('reports/sales_invoice', $data);
    }
    public function Purchase_invoice()  {
        $data['title'] = "Purchase Bill";
        $data['id'] = $this->session->userdata('PurchID');
        $this->load->view('reports/purchase_bill', $data);
    }
    function search_purchase_record()  {
        $searchtype = $this->session->userdata('searchtype');
        $Purchase_startdate = $this->session->userdata('Purchase_startdate');
        $Purchase_enddate = $this->session->userdata('Purchase_enddate');
        $Supplierid = $this->session->userdata('Supplierid');
        if($searchtype == "All"){
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate'";
        }
        if($searchtype == "Supplier"){
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.Supplier_SlNo = '$Supplierid' and  tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate'";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('reports/purchase_record_print', $datas);
    }
    function search_sales_record()  {
       $searchtype = $this->session->userdata('searchtype');
        $Sales_startdate = $this->session->userdata('Sales_startdate');
        $Sales_enddate = $this->session->userdata('Sales_enddate');
        $customerID = $this->session->userdata('customerID');
        $Salestype = $this->session->userdata('Salestype');
        if($searchtype == "All"){
            if($Salestype == 'All'){
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' ";
            }else{
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$Salestype' and tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' ";
            }
        }
        if($searchtype == "Customer"){
            if($Salestype == 'All'){
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$Salestype' AND tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate'";
            }else{
                $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as type, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$Salestype' and tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate'";
            }
            
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('reports/sales_record_print', $datas);
    }
    function sales_record_print($invoce)  {
        $datas["id"] = $invoce;
        $this->load->view('reports/sales_invoice', $datas);
    }
    function sales_stock()  {
        $datas['title'] = "Sales Stock";
        $this->load->view('reports/sales_sotck', $datas);
    }
    function purchase_stock()  {
        $datas['title'] = "Purchase Stock";
        $this->load->view('reports/purchase_stock', $datas);
    }
    function search_supplier_due()  {
        $searchtype = $this->session->userdata('searchtype');
        $Purchase_startdate = $this->session->userdata('Purchase_startdate');
        $Purchase_enddate = $this->session->userdata('Purchase_enddate');
        $Supplierid = $this->session->userdata('Supplierid');
        if($searchtype == "All"){
            //$sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate' group by tbl_purchasemaster.Supplier_SlNo";
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo  group by tbl_purchasemaster.Supplier_SlNo";
        }
        if($searchtype == "Supplier"){
            //$sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.Supplier_SlNo = '$Supplierid' and  tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate' group by tbl_purchasemaster.Supplier_SlNo";
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.Supplier_SlNo = '$Supplierid'  group by tbl_purchasemaster.Supplier_SlNo";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('reports/supplier_due_list_print', $datas);
    }
    function search_customer_due()  {
       $searchtype = $this->session->userdata('searchtype');
        $Sales_startdate = $this->session->userdata('Sales_startdate');
        $Sales_enddate = $this->session->userdata('Sales_enddate');
        $customerID = $this->session->userdata('customerID');
		$salestype = $this->session->userdata('salestype');
		if($salestype == 'All'){
			if($searchtype == "All"){
				//$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
				$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo  group by tbl_salesmaster.SalseCustomer_IDNo";
			}
			if($searchtype == "Customer"){
				//$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
				$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID'  group by tbl_salesmaster.SalseCustomer_IDNo";
			}
		}
		else{
				if($searchtype == "All"){
					//echo "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo Where tbl_salesmaster.Status = '$salestype' group by tbl_salesmaster.SalseCustomer_IDNo";
				//$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
				$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo Where tbl_salesmaster.Status = '$salestype' group by tbl_salesmaster.SalseCustomer_IDNo";
				}
				if($searchtype == "Customer"){
					//$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
					$sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$salestype' AND tbl_salesmaster.SalseCustomer_IDNo = '$customerID' group by tbl_salesmaster.SalseCustomer_IDNo";
				}
			}
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('reports/customer_due_print', $datas);
    }
    function supplier_payment_print()  {
        $searchtype = $this->session->userdata('searchtype');
        $Purchase_startdate = $this->session->userdata('Purchase_startdate');
        $Purchase_enddate = $this->session->userdata('Purchase_enddate');
        $Supplierid = $this->session->userdata('Supplierid');
        if($searchtype == "All"){
            $sql = "SELECT tbl_supplier_payment.*, tbl_supplier.* FROM tbl_supplier_payment left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_supplier_payment.SPayment_customerID WHERE tbl_supplier_payment.SPayment_date between  '$Purchase_startdate' and '$Purchase_enddate'";
        }
        if($searchtype == "Supplier"){
            $sql = "SELECT tbl_supplier_payment.*, tbl_supplier.* FROM tbl_supplier_payment left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_supplier_payment.SPayment_customerID WHERE tbl_supplier_payment.SPayment_customerID = '$Supplierid' and  tbl_supplier_payment.SPayment_date between  '$Purchase_startdate' and '$Purchase_enddate'";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('reports/supplier_payment_print', $datas);
    }
    function customer_payment_print()  {
       $searchtype = $this->session->userdata('searchtype');
        $Sales_startdate = $this->session->userdata('Sales_startdate');
        $Sales_enddate = $this->session->userdata('Sales_enddate');
        $customerID = $this->session->userdata('customerID');
		$salestype = $this->session->userdata('salestype');
		if($salestype== "All"){
        if($searchtype == "All"){
            $sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID WHERE tbl_customer_payment.CPayment_date between  '$Sales_startdate' and '$Sales_enddate'";
        }
        if($searchtype == "Customer"){
            $sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID WHERE tbl_customer_payment.CPayment_customerID = '$customerID' and  tbl_customer_payment.CPayment_date between  '$Sales_startdate' and '$Sales_enddate'";
        }
		}
		else{
			    if($searchtype == "All"){
					$sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID WHERE tbl_customer_payment.status = '$salestype' AND tbl_customer_payment.CPayment_date between  '$Sales_startdate' and '$Sales_enddate'";
				}
        		if($searchtype == "Customer"){
					$sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID WHERE tbl_customer_payment.status = '$salestype' AND tbl_customer_payment.CPayment_customerID = '$customerID' and  tbl_customer_payment.CPayment_date between  '$Sales_startdate' and '$Sales_enddate'";
				}
			}
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('reports/customer_payment_print', $datas);
    }
    function current_stock()  {
        $datas['title'] = "Current Stock";
        $this->load->view('reports/current_stock', $datas);
    }
    function expense_print()  {
        $expence_startdate = $this->session->userdata('expence_startdate');
        $expence_enddate = $this->session->userdata('expence_enddate');
        $accountid = $this->session->userdata('accountid');
        $searchtype = $this->session->userdata('searchtype');
        if($searchtype=="All"){
            $sql = "SELECT tbl_cashtransaction.*,tbl_account.* FROM tbl_cashtransaction left join tbl_account on tbl_account.Acc_SlNo=tbl_cashtransaction.Acc_SlID where Tr_date between '$expence_startdate' and '$expence_enddate'";

        }
        elseif($searchtype=="Account"){
            $sql = "SELECT tbl_cashtransaction.*,tbl_account.* FROM tbl_cashtransaction left join tbl_account on tbl_account.Acc_SlNo=tbl_cashtransaction.Acc_SlID where tbl_cashtransaction.Acc_SlID ='$accountid ' and tbl_cashtransaction.Tr_date between '$expence_startdate' and '$expence_enddate'";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('reports/expense_list', $datas);
    }
    function cashview_print()  {
        $sql = "SELECT tbl_cashtransaction.*,tbl_account.* FROM tbl_cashtransaction left join tbl_account on tbl_account.Acc_SlNo=tbl_cashtransaction.Acc_SlID where tbl_cashtransaction.Tr_branchid = '".$this->brunch."'";
        $datas["record"] = $this->mt->ccdata($sql);
        $this->load->view('reports/cashview_print', $datas);
    }
    function salesreturnlist(){
        $this->load->view('reports/salesreturnlist');
    }
    function purchase_returnlist(){
        $this->load->view('reports/purchase_return_list');
    }
	function installmentrecord(){
		$this->load->view('reports/printInslallmentdetails');
		}
	function monthlysummery(){
		$this->load->view('reports/printmonthlysummery');
		}
	function balancesheet(){
		$this->load->view('reports/lossprofit');
		}
}
