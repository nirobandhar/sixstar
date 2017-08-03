<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->brunch = $this->session->userdata('BRANCHid');
        $access = $this->session->userdata('userId');
        $this->accountType = $this->session->userdata('accountType');
         if($access == ''){
            redirect("login");
        }  
        $this->load->model("model_myclass", "mmc", TRUE);
        $this->load->model('model_table', "mt", TRUE);
		date_default_timezone_set('Asia/Dhaka');
    }
    public function index()  {
        
        redirect('Administrator/page',"Refresh");
    }
    public function setting($id)  {
       
        $data['title'] = "Branch Setting";
        $datas['bid'] = $id;
        $this->session->set_userdata($datas);
        $data['content'] = $this->load->view('Administrator/brunch/Shahbag', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function Update_Success()  {
       
        $data['title'] = "Branch Update_Success";
        $data['content'] = $this->load->view('Administrator/brunch/Update_Success', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function Shahbag()  {
       
        $data['title'] = "Shahbag Branch";
        $data['content'] = $this->load->view('Administrator/brunch/Shahbag', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function Sylhet()  {
        
        $data['title'] = "Sylhet Branch";
        $data['content'] = $this->load->view('Administrator/brunch/Sylhet', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
   
    public function Shahbag_Insert()  {
              $bid = $this->input->post('brid', TRUE);
                $data = array(
                "Accounts"                         => $this->input->post('Accounts', TRUE),
                "Cash_Transaction"                 => $this->input->post('CashTransaction', TRUE),
                "Add_Account"                 => $this->input->post('AddAccount', TRUE),
                "Current_Stock"                 => $this->input->post('CurrentStock', TRUE),
                "Add_Supplier"                 => $this->input->post('AddSupplier', TRUE),
                "Add_Customer"                 => $this->input->post('AddCustomer', TRUE),
                "Employee"                 => $this->input->post('Employee', TRUE),
                "Add_Employee"                 => $this->input->post('AddEmployee', TRUE),
                "Employee_List"                 => $this->input->post('EmployeeList', TRUE),
                "Add_Designation"                 => $this->input->post('AddDesignation', TRUE),
                "Add_Department"                 => $this->input->post('AddDepartment', TRUE),
                "Sales"                         => $this->input->post('Sales', TRUE),
                "Product_Sales"                 => $this->input->post('ProductSales', TRUE),
				"installment"                 => $this->input->post('insSales', TRUE),
				"installment_record"                 => $this->input->post('insRecord', TRUE),
                "Sales_Return"                 => $this->input->post('SaleReturn', TRUE),
                "Sales_Stock"                 => $this->input->post('SalesStock', TRUE),
                "Purchase"                    => $this->input->post('Purchase', TRUE),
                "Purchase_Order"                 => $this->input->post('PurchaseOrder', TRUE),
                "Purchase_Return"                 => $this->input->post('PurchaseReturn', TRUE),
                "Damage_Entry"                 => $this->input->post('DamageEntry', TRUE),
                "Purchase_Stock"                 => $this->input->post('PurchaseStock', TRUE),
                "Settings"                 => $this->input->post('Settings', TRUE),
                "Add_Category"                 => $this->input->post('AddCategory', TRUE),
                "Add_Product"                 => $this->input->post('AddProduct', TRUE),
                "User_Profile"                 => $this->input->post('UserProfil', TRUE),
                "Add_Unit"                 => $this->input->post('AddUnit', TRUE),
                "Add_Branch"                 => $this->input->post('AddBranch', TRUE),
                "Add_District"                 => $this->input->post('AddDistrict', TRUE),
                "Add_Country"                 => $this->input->post('AddCountry', TRUE),
                "Supplier_List"                 => $this->input->post('SupplierList', TRUE),
                "Customer_List"                 => $this->input->post('CustomerList', TRUE),
                "rpSales"                 => $this->input->post('RSales', TRUE),
                "Sales_Invoice"                 => $this->input->post('SalesInvoice', TRUE),
                "Customer_Due_Report"                 => $this->input->post('CustomerDueReport', TRUE),
                "Customer_Payment"                 => $this->input->post('CustomerPayment', TRUE),
                "Sales_Record"                 => $this->input->post('SalesRecord', TRUE),
                "Sales_Return_List"                 => $this->input->post('SalesReturnList', TRUE),
                "rpPurchase"                 => $this->input->post('RPurchase', TRUE),
                "Purchase_Bill"                 => $this->input->post('PurchaseBill', TRUE),
                "Supplier_Due_Report"                 => $this->input->post('SupplierDueReport', TRUE),
                "Supplier_Payment"                 => $this->input->post('SupplierPayment', TRUE),
                "Purchase_Record"                 => $this->input->post('PurchaseRecord', TRUE),
                "Purchase_Return_List"                 => $this->input->post('PurchaseReturnList', TRUE),
                "rpAccounts"                 => $this->input->post('RAccounts', TRUE),
                "Expense_View"                 => $this->input->post('ExpenseView', TRUE),
                "Cash_View"                 => $this->input->post('CashsView', TRUE),
				"monthlysummery"                 => $this->input->post('summery', TRUE),
				"lossprofit"                 => $this->input->post('prolos', TRUE)
            );
        //print_r($data);
            $this->mt->update_data("tbl_menuaccess", $data, $bid,'branch_id');
            redirect("Administrator/branch/Update_Success");
    }
    public function Sylhet_Insert()  {
             $bid = $this->input->post('brid', TRUE);
            $data = array(
                "Accounts"                 => $this->input->post('Accounts', TRUE),
                "Cash_Transaction"                 => $this->input->post('CashTransaction', TRUE),
                "Add_Account"                 => $this->input->post('AddAccount', TRUE),
                "Current_Stock"                 => $this->input->post('CurrentStock', TRUE),
                "Add_Supplier"                 => $this->input->post('AddSupplier', TRUE),
                "Add_Customer"                 => $this->input->post('AddCustomer', TRUE),
                "Employee"                 => $this->input->post('Employee', TRUE),
                "Add_Employee"                 => $this->input->post('AddEmployee', TRUE),
                "Employee_List"                 => $this->input->post('EmployeeList', TRUE),
                "Add_Designation"                 => $this->input->post('AddDesignation', TRUE),
                "Add_Department"                 => $this->input->post('AddDepartment', TRUE),
                "Sales"                         => $this->input->post('Sales', TRUE),
                "Product_Sales"                 => $this->input->post('ProductSales', TRUE),
                "Sales_Return"                 => $this->input->post('SaleReturn', TRUE),
                "Sales_Stock"                 => $this->input->post('SalesStock', TRUE),
                "Purchase"                    => $this->input->post('Purchase', TRUE),
                "Purchase_Order"                 => $this->input->post('PurchaseOrder', TRUE),
                "Purchase_Return"                 => $this->input->post('PurchaseReturn', TRUE),
                "Damage_Entry"                 => $this->input->post('DamageEntry', TRUE),
                "Purchase_Stock"                 => $this->input->post('PurchaseStock', TRUE),
                "Settings"                 => $this->input->post('Settings', TRUE),
                "Add_Category"                 => $this->input->post('AddCategory', TRUE),
                "Add_Product"                 => $this->input->post('AddProduct', TRUE),
                "User_Profile"                 => $this->input->post('UserProfil', TRUE),
                "Add_Unit"                 => $this->input->post('AddUnit', TRUE),
                "Add_Branch"                 => $this->input->post('AddBranch', TRUE),
                "Add_District"                 => $this->input->post('AddDistrict', TRUE),
                "Add_Country"                 => $this->input->post('AddCountry', TRUE),
                "Supplier_List"                 => $this->input->post('SupplierList', TRUE),
                "Customer_List"                 => $this->input->post('CustomerList', TRUE),
                "rpSales"                 => $this->input->post('RSales', TRUE),
                "Sales_Invoice"                 => $this->input->post('SalesInvoice', TRUE),
                "Customer_Due_Report"                 => $this->input->post('CustomerDueReport', TRUE),
                "Customer_Payment"                 => $this->input->post('CustomerPayment', TRUE),
                "Sales_Record"                 => $this->input->post('SalesRecord', TRUE),
                "Sales_Return_List"                 => $this->input->post('SalesReturnList', TRUE),
                "rpPurchase"                 => $this->input->post('RPurchase', TRUE),
                "Purchase_Bill"                 => $this->input->post('PurchaseBill', TRUE),
                "Supplier_Due_Report"                 => $this->input->post('SupplierDueReport', TRUE),
                "Supplier_Payment"                 => $this->input->post('SupplierPayment', TRUE),
                "Purchase_Record"                 => $this->input->post('PurchaseRecord', TRUE),
                "Purchase_Return_List"                 => $this->input->post('PurchaseReturnList', TRUE),
                "rpAccounts"                 => $this->input->post('RAccounts', TRUE),
                "Expense_View"                 => $this->input->post('ExpenseView', TRUE),
                "Cash_View"                 => $this->input->post('CashsView', TRUE)
            );

            $this->mt->update_data("tbl_menuaccess", $data, $bid,'branch_id');
            redirect("Administrator/branch/Sylhet");
    }
   


    
}
