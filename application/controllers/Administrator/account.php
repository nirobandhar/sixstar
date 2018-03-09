<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->brunch = $this->session->userdata('BRANCHid');
        $access = $this->session->userdata('userId');
         if($access == '' ){
            redirect("login");
        }
        $this->load->model("model_myclass", "mmc", TRUE);
        $this->load->model('model_table', "mt", TRUE);
		date_default_timezone_set('Asia/Dhaka');
    }
    public function index()  {
        $data['title'] = "Add Account";
        $data['content'] = $this->load->view('Administrator/account/add_account', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }

   
    public function account_insert()  {
        $mail = $this->input->post('accountName');
        $query = $this->db->query("SELECT Acc_Name from tbl_account where Acc_Name = '$mail'");
        
        if($query->num_rows() > 0){
            $data['exists'] = "This Name is Already Exists";
            $this->load->view('Administrator/ajax/add_account',$data);
        }
        else{
            $data = array(
                "Acc_Code"          =>$this->input->post('account_id', TRUE),
                "Acc_Name"          =>$this->input->post('accountName', TRUE),
                "Acc_Type"          =>$this->input->post('accounttype', TRUE),
                "Acc_Description"          =>$this->input->post('Description', TRUE),
                "AddBy"                  =>$this->session->userdata("FullName"),
                "AddTime"                =>date("Y-m-d h:i:s")
                );
            $this->mt->save_data('tbl_account',$data);
            $this->load->view('Administrator/ajax/add_account');
        }
    }
    public function account_insertFanceybox()  {
        $mail = $this->input->post('accountName');
        $query = $this->db->query("SELECT Acc_Name from tbl_account where Acc_Name = '$mail'");
        
        if($query->num_rows() > 0){
            $data['exists'] = "This Name is Already Exists";
            $this->load->view('Administrator/ajax/add_account',$data);
        }
        else{
            $data = array(
                "Acc_Code"          =>$this->input->post('account_id', TRUE),
                "Acc_Name"          =>$this->input->post('accountName', TRUE),
                "Acc_Type"          =>$this->input->post('accounttype', TRUE),
                "Acc_Description"          =>$this->input->post('Description', TRUE),
                "AddBy"                  =>$this->session->userdata("FullName"),
                "AddTime"                =>date("Y-m-d h:i:s")
                );
            $this->mt->save_data('tbl_account',$data);
            $this->load->view('Administrator/ajax/transaction/fancyboxResultOffice');
        }
    }
    
   
    public function account_edit() {
        $id = $this->input->post('edit');
        $query = "SELECT * from tbl_account where Acc_SlNo = '$id'";
        $data['selected'] = $this->mt->edit_by_id($query);
        //$data['content'] = $this->load->view('Administrator/edit/supplier_edit', $data, TRUE);
        $this->load->view('Administrator/edit/account_edit', $data);
    }
    public function account_update(){
        $id = $this->input->post('id');
        $fld = 'Acc_SlNo';
        $data = array(
            "Acc_Code"              =>$this->input->post('account_id', TRUE),
            "Acc_Name"              =>$this->input->post('accountName', TRUE),
            "Acc_Type"              =>$this->input->post('accounttype', TRUE),
            "Acc_Description"       =>$this->input->post('Description', TRUE),
            "UpdateBy"              =>$this->session->userdata("FullName"),
            "UpdateTime"            =>date("Y-m-d h:i:s")
        );
        $this->mt->update_data("tbl_account", $data, $id,$fld);
        $this->load->view('Administrator/ajax/add_account', $data);
    } 
    public function account_delete(){
        $id = $this->input->post('deleted');
        $fld = 'Acc_SlNo';
        $this->mt->delete_data("tbl_account", $id, $fld);
        $data['cate'] = 'Delete Success';
        $this->load->view('Administrator/ajax/add_account', $data);
    }
    // Cash Transection
    public function cash_transaction()  {
        $data['title'] = "Cash Transection";
        $data['content'] = $this->load->view('Administrator/account/cash_transaction', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function fancybox_add_account()  {
        $this->load->view('Administrator/ajax/fanceybox_add_account');
    }

    public function AccountType()  {
        $acc_type = $this->input->post('acc_type');
        if($acc_type=="Customer"){
            $this->load->view('Administrator/ajax/transaction/customer');
        }
        elseif($acc_type=="Official"){
            $this->load->view('Administrator/ajax/transaction/Official');
        }
        elseif($acc_type=="Supplier"){
            $this->load->view('Administrator/ajax/transaction/Supplier');
        }
    }
    public function OnselectName()  {
        $acc_type = $this->input->post('acc_type');
        $account_id = $this->input->post('account_id');
        if($acc_type=="Customer"){
            $query = "SELECT * from tbl_customer where Customer_SlNo = '$account_id'";
            $data['selected'] = $this->mt->edit_by_id($query);
            $this->load->view('Administrator/ajax/transaction/customer_name', $data);
        }
        elseif($acc_type=="Official"){
            $query = "SELECT * from tbl_account where Acc_SlNo = '$account_id'";
            $data['selected'] = $this->mt->edit_by_id($query);
            $this->load->view('Administrator/ajax/transaction/official_name', $data);
        }
        elseif($acc_type=="Supplier"){
            $query = "SELECT * from tbl_supplier where Supplier_SlNo = '$account_id'";
            $data['selected'] = $this->mt->edit_by_id($query);
            $this->load->view('Administrator/ajax/transaction/supplier_name', $data);
        }
    }
    public function AutoSelect()  {
        $tr_type = $this->input->post('tr_type');
        if($tr_type== "Deposit To Bank" or $tr_type== "Withdraw Form Bank"){
            $this->load->view('Administrator/ajax/transaction/Office_autoSelect');  
        }else{
            $this->load->view('Administrator/ajax/transaction/Office_None_Select');  
        }
    
    }
    public function cashTransection_insert()  {
        $atype = $this->input->post('acc_type');
        $TrType = $this->input->post('tr_type');

        
        if($atype=="Official" && $TrType=="Cash Payment"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "In_Amount"             =>0,
                "Out_Amount"            =>$this->input->post('Amount', TRUE),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "AddBy"                 =>$this->session->userdata("FullName"),
                "AddTime"               =>date("Y-m-d h:i:s")
            ); 
        }
        elseif($atype=="Official" && $TrType=="Cash Receive"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "Out_Amount"            =>0,
                "In_Amount"             =>$this->input->post('Amount', TRUE),
                "AddBy"                 =>$this->session->userdata("FullName"),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "AddTime"               =>date("Y-m-d h:i:s")
            ); 
        }
        elseif($atype=="Official" && $TrType=="Deposit To Bank"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "Out_Amount"            =>0,
                "In_Amount"             =>$this->input->post('Amount', TRUE),
                "AddBy"                 =>$this->session->userdata("FullName"),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "AddTime"               =>date("Y-m-d h:i:s")
            ); 
        }
        elseif($atype=="Official" && $TrType=="Withdraw Form Bank"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "In_Amount"             =>0,
                "Out_Amount"            =>$this->input->post('Amount', TRUE),
                "AddBy"                 =>$this->session->userdata("FullName"),
                "AddTime"               =>date("Y-m-d h:i:s")
            ); 
        }
        /*elseif($atype=="Supplier"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Supplier_SlID"         =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "Out_Amount"            =>$this->input->post('Amount', TRUE),
                "AddBy"                 =>$this->session->userdata("FullName"),
                "AddTime"               =>date("Y-m-d h:i:s")
            ); 
        }*/
        $lastid = $this->mt->save_date_id('tbl_cashtransaction',$data);

        $upstadata = array(
            "Transaction_Date"         =>$this->input->post('DaTe', TRUE),
            "IdentityNo"               =>$lastid,
            "Narration"                =>$this->input->post('Transaction_id', TRUE),
            "InAmount"                 =>$this->input->post('Transaction_id', TRUE),
            "OutAmount"                =>$this->input->post('Amount', TRUE),
            "Description"              =>$this->input->post('Description', TRUE),
            "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
            "Saved_By"                 =>$this->session->userdata("FullName"),
            "Saved_Time"               =>date("Y-m-d h:i:s")
        );

        $this->load->view('Administrator/ajax/cash_transection');
    }
    public function cash_transaction_edit() {
        $id = $this->input->post('edit');
        $query = "SELECT tbl_cashtransaction.*,tbl_account.*,tbl_supplier.*,tbl_customer.* from tbl_cashtransaction left join tbl_account on tbl_account.Acc_SlNo= tbl_cashtransaction.Acc_SlID left join tbl_supplier on tbl_supplier.Supplier_SlNo=tbl_cashtransaction.Supplier_SlID left join tbl_customer on tbl_customer.Customer_SlNo=tbl_cashtransaction.Customer_SlID where tbl_cashtransaction.Tr_SlNo = '$id'";
        $data['selected'] = $this->mt->edit_by_id($query);
        $this->load->view('Administrator/edit/cash_transection_Edit', $data);
    }
    public function cash_transaction_delete(){
        $id = $this->input->post('deleted');
        $fld = 'Tr_SlNo';
        $this->mt->delete_data("tbl_cashtransaction", $id, $fld);
        $data['cate'] = 'Delete Success';
        $this->load->view('Administrator/ajax/cash_transection', $data);
    }
    public function cash_transaction_update(){
        $id = $this->input->post('id');
        $fld = 'Tr_SlNo';
        $atype = $this->input->post('acc_type');
        $TrType = $this->input->post('tr_type');

        if($atype=="Official" && $TrType=="Cash Receive"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "In_Amount"             =>$this->input->post('Amount', TRUE),
                "Out_Amount"             =>0,
                "UpdateBy"              =>$this->session->userdata("FullName"),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "UpdateTime"            =>date("Y-m-d h:i:s")
            ); 
        }
        elseif($atype=="Official" && $TrType=="Cash Payment"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "In_Amount"             =>0,
                "Out_Amount"            =>$this->input->post('Amount', TRUE),
                "UpdateBy"              =>$this->session->userdata("FullName"),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "UpdateTime"            =>date("Y-m-d h:i:s")
            ); 
        }
        elseif($atype=="Official" && $TrType=="Deposit To Bank"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "Out_Amount"             =>0,
                "In_Amount"             =>$this->input->post('Amount', TRUE),
                "UpdateBy"              =>$this->session->userdata("FullName"),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "UpdateTime"            =>date("Y-m-d h:i:s")
            ); 
        }
        elseif($atype=="Official" && $TrType=="Withdraw Form Bank"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Acc_SlID"              =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "In_Amount"             =>0,
                "Out_Amount"            =>$this->input->post('Amount', TRUE),
                "UpdateBy"              =>$this->session->userdata("FullName"),
                "Tr_branchid"           =>$this->session->userdata("BRANCHid"),
                "UpdateTime"            =>date("Y-m-d h:i:s")
            ); 
        }
        /*elseif($atype=="Supplier"){
            $data = array(
                "Tr_Id"                 =>$this->input->post('Transaction_id', TRUE),
                "Tr_date"               =>$this->input->post('DaTe', TRUE),
                "Tr_Type"               =>$this->input->post('tr_type', TRUE),
                "Tr_account_Type"       =>$this->input->post('acc_type', TRUE),
                "Supplier_SlID"         =>$this->input->post('account_id', TRUE),
                "Tr_Description"        =>$this->input->post('Description', TRUE),
                "Out_Amount"            =>$this->input->post('Amount', TRUE),
                "In_Amount"             =>0,
                "UpdateBy"              =>$this->session->userdata("FullName"),
                "UpdateTime"            =>date("Y-m-d h:i:s")
            ); 
        }*/
        $this->mt->update_data("tbl_cashtransaction", $data, $id,$fld);
        $this->load->view('Administrator/ajax/cash_transection', $data);
    } 
    function expense()  {
        $data['title'] = "Expense";
        $data['content'] = $this->load->view('Administrator/account/expense_report', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    function expense_search()  {
        $dAta['expence_startdate']=$expence_startdate = $this->input->post('expence_startdate');
        $dAta['expence_enddate']=$expence_enddate = $this->input->post('expence_enddate');
        $dAta['accountid']=$accountid = $this->input->post('accountid');
        $dAta['searchtype']=$searchtype = $this->input->post('searchtype');
        $this->session->set_userdata($dAta);
        if($searchtype=="All"){
            $sql = "SELECT tbl_cashtransaction.*,tbl_account.* FROM tbl_cashtransaction left join tbl_account on tbl_account.Acc_SlNo=tbl_cashtransaction.Acc_SlID where tbl_cashtransaction.Tr_date between '$expence_startdate' and '$expence_enddate'";

        }
        elseif($searchtype=="Account"){
            $sql = "SELECT tbl_cashtransaction.*,tbl_account.* FROM tbl_cashtransaction left join tbl_account on tbl_account.Acc_SlNo=tbl_cashtransaction.Acc_SlID where tbl_cashtransaction.Acc_SlID ='$accountid ' and tbl_cashtransaction.Tr_date between '$expence_startdate' and '$expence_enddate'";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('Administrator/account/expense_search_list', $datas);
    }
    function cash_view()  {
        $data['title'] = "Cash View";
        $sql = "SELECT tbl_cashtransaction.*,tbl_account.* FROM tbl_cashtransaction left join tbl_account on tbl_account.Acc_SlNo=tbl_cashtransaction.Acc_SlID";
        $data["record"] = $this->mt->ccdata($sql);
        $data['content'] = $this->load->view('Administrator/account/cashview_search_list', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }

    public function daily_summery(){
        $data['title'] = "Daily Summery";
        $data['content'] = $this->load->view('Administrator/account/daily_summery', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }

    public function summery_search(){
        $data['startdate'] = $this->input->post('startdate');
        $data['enddate'] = $this->input->post('enddate');
        $this->session->set_userdata($data);
        $this->load->view('Administrator/account/summery_search', $data);
    }
}
