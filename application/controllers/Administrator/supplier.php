<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $access = $this->session->userdata('userId');
        $this->brunch = $this->session->userdata('BRANCHid');
         if($access == '' ){
            redirect("login");
        }
        $this->load->model("model_myclass", "mmc", TRUE);
        $this->load->model('model_table', "mt", TRUE);
		date_default_timezone_set('Asia/Dhaka');
    }
    public function index()  {
        $data['title'] = "Supplier";
        $data['content'] = $this->load->view('Administrator/add_supplier', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }

    public function supplier_country()  {
        $this->load->view('Administrator/supplier_country');
    }
    public function insert_country()  {
        $mail = $this->input->post('add_country');
        $query = $this->db->query("SELECT CountryName from tbl_country where CountryName = '$mail'");
        
        if($query->num_rows() > 0){
            $data['exists'] = "This Name is Already Exists";
            $this->load->view('Administrator/ajax/sup_country',$data);
        }
        else{
            $data = array(
                "CountryName"          =>$this->input->post('add_country', TRUE),
                "AddBy"                  =>$this->session->userdata("FullName"),
                "AddTime"                =>date("Y-m-d h:i:s")
                );
            $this->mt->save_data('tbl_country',$data);
            $this->load->view('Administrator/ajax/sup_country');
        }
    }
    public function supplier_district()  {
        $this->load->view('Administrator/supplier_district');
    }
    public function insert_district()  {
        $mail = $this->input->post('District');
        $query = $this->db->query("SELECT District_Name from tbl_district where District_Name = '$mail'");
        
        if($query->num_rows() > 0){
            $data['exists'] = "This Name is Already Exists";
            $this->load->view('Administrator/ajax/supplier_district',$data);
        }
        else{
            $data = array(
                "District_Name"          =>$this->input->post('District', TRUE),
                "AddBy"                  =>$this->session->userdata("FullName"),
                "AddTime"                =>date("Y-m-d h:i:s")
                );
            $this->mt->save_data('tbl_district',$data);
            $this->load->view('Administrator/ajax/supplier_district');
        }
    }
    public function insert_supplier()  {
        $data = array(
            "Supplier_Code"                 =>$this->input->post('supplier_id', TRUE),
            "Supplier_Name"                 =>$this->input->post('sl_name', TRUE),
            "Supplier_Type"                 =>$this->input->post('type', TRUE),
            "Supplier_Address"              =>$this->input->post('address', TRUE),
            "District_SlNo"                 =>$this->input->post('district', TRUE),
            "Country_SlNo"                  =>$this->input->post('country', TRUE),
            "Supplier_Phone"                =>$this->input->post('phone', TRUE),
            "Supplier_Mobile"               =>$this->input->post('mobile', TRUE),
            "Supplier_OfficePhone"          =>$this->input->post('office_phone', TRUE),
            "Supplier_Email"                =>$this->input->post('email', TRUE),
            "Supplier_Web"                  =>$this->input->post('web', TRUE),
            "Supplier_brinchid"             =>$this->session->userdata("BRANCHid"),
            "AddBy"                         =>$this->session->userdata("FullName"),
            "AddTime"                       =>date("Y-m-d h:i:s")
            );
        $this->mt->save_data('tbl_supplier',$data);
        $this->load->view('Administrator/ajax/supplier');
    }
    public function supplier_edit()  {
        $id = $this->input->post('edit');
        $query = "SELECT tbl_supplier.*, tbl_country.*,tbl_district.* FROM tbl_supplier left join tbl_country on tbl_country.Country_SlNo=tbl_supplier.Country_SlNo left join tbl_district on tbl_district.District_SlNo=tbl_supplier.District_SlNo where tbl_supplier.Supplier_SlNo = '$id'";
        $data['selected'] = $this->mt->edit_by_id($query);
        //$data['content'] = $this->load->view('Administrator/edit/supplier_edit', $data, TRUE);
        $this->load->view('Administrator/edit/supplier_edit', $data);
    }
    public function supplierupdate(){
        $id = $this->input->post('id');
        $fld = 'Supplier_SlNo';
        $data = array(
            "Supplier_Code"                 =>$this->input->post('supplier_id', TRUE),
            "Supplier_Name"                 =>$this->input->post('sl_name', TRUE),
            "Supplier_Type"                 =>$this->input->post('type', TRUE),
            "Supplier_Address"              =>$this->input->post('address', TRUE),
            "District_SlNo"                 =>$this->input->post('district', TRUE),
            "Country_SlNo"                  =>$this->input->post('country', TRUE),
            "Supplier_Phone"                =>$this->input->post('phone', TRUE),
            "Supplier_Mobile"               =>$this->input->post('mobile', TRUE),
            "Supplier_OfficePhone"          =>$this->input->post('office_phone', TRUE),
            "Supplier_Email"                =>$this->input->post('email', TRUE),
            "Supplier_Web"                  =>$this->input->post('web', TRUE),
            "Supplier_brinchid"             =>$this->session->userdata("BRANCHid"),
            "UpdateBy"                      =>$this->session->userdata("FullName"),
            "UpdateTime"                    =>date("Y-m-d h:i:s")
        );
        $this->mt->update_data("tbl_supplier", $data, $id,$fld);
        $this->load->view('Administrator/ajax/supplier');
    } 
    public function supplier_delete(){
        $id = $this->input->post('deleted');
        $fld = 'Supplier_SlNo';
        $this->mt->delete_data("tbl_supplier", $id, $fld);
        $data['cate'] = 'Delete Success';
        $this->load->view('Administrator/ajax/supplier', $data);
    }
    function supplier_due(){
        $data['title'] = 'Supplier Due';
        $data['content'] = $this->load->view('Administrator/due_report/supplier_due', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    } 
    function search_supplier_due()  {
        $dAta['searchtype']= $searchtype = $this->input->post('searchtype');
        $dAta['Purchase_startdate']=$Purchase_startdate = $this->input->post('Purchase_startdate');
        $dAta['Purchase_enddate']=$Purchase_enddate = $this->input->post('Purchase_enddate');
        $dAta['Supplierid']=$Supplierid = $this->input->post('Supplierid');
        $this->session->set_userdata($dAta);

        if($searchtype == "All"){
            //$sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate' group by tbl_purchasemaster.Supplier_SlNo";
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo  group by tbl_purchasemaster.Supplier_SlNo";
        }
        if($searchtype == "Supplier"){
            //$sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.Supplier_SlNo = '$Supplierid' and  tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate' group by tbl_purchasemaster.Supplier_SlNo";
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.Supplier_SlNo = '$Supplierid'  group by tbl_purchasemaster.Supplier_SlNo";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('Administrator/due_report/supplier_due_list', $datas);
    }
    function supplier_due_payment($Supplierid)  {
        $Purchase_startdate = $this->session->userdata('Purchase_startdate');
        $Purchase_enddate = $this->session->userdata('Purchase_enddate');
        
        $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.Supplier_SlNo = '$Supplierid' group by tbl_purchasemaster.Supplier_SlNo";
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('Administrator/due_report/supplier_due_payment', $datas);
    }
    function supplier_PaymentAmount(){
        
        $data = array(
            "SPayment_date"                     =>$this->input->post('paymentDate', TRUE),
            "SPayment_invoice"                  =>$this->input->post('invoice', TRUE),
            "SPayment_customerID"               =>$this->input->post('SuppID', TRUE),
            "SPayment_amount"                   =>$this->input->post('paidAmount', TRUE),
            "SPayment_notes"                    =>$this->input->post('country', TRUE),
            "SPayment_Paymentby"                =>$this->input->post('Paymentby', TRUE),

            "SPayment_Addby"                    =>$this->session->userdata("FullName"),
            "SPayment_brunchid"                 =>$this->session->userdata("BRANCHid")
        );
        $this->mt->save_data("tbl_supplier_payment", $data);
        
        $searchtype = $this->session->userdata('searchtype');
        $Purchase_startdate = $this->session->userdata('Purchase_startdate');
        $Purchase_enddate = $this->session->userdata('Purchase_enddate');
        $Supplierid = $this->session->userdata('Supplierid');

        if($searchtype == "All"){
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate' group by tbl_purchasemaster.Supplier_SlNo";
        }
        if($searchtype == "Supplier"){
            $sql = "SELECT tbl_purchasemaster.*, tbl_supplier.* FROM tbl_purchasemaster left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_purchasemaster.Supplier_SlNo WHERE tbl_purchasemaster.Supplier_SlNo = '$Supplierid' and  tbl_purchasemaster.PurchaseMaster_OrderDate between  '$Purchase_startdate' and '$Purchase_enddate' group by tbl_purchasemaster.Supplier_SlNo";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('Administrator/due_report/supplier_due_list', $datas);
    }
    function supplier_payment_report(){
        $data['title'] = "Supplier Payment Reports";
        $data['content'] = $this->load->view('Administrator/payment_reports/supplier_payment_report', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    function search_supplier_payments()  {
        $dAta['searchtype']= $searchtype = $this->input->post('searchtype');
        $dAta['Purchase_startdate']=$Purchase_startdate = $this->input->post('Purchase_startdate');
        $dAta['Purchase_enddate']=$Purchase_enddate = $this->input->post('Purchase_enddate');
        $dAta['Supplierid']=$Supplierid = $this->input->post('Supplierid');
        $this->session->set_userdata($dAta);

        if($searchtype == "All"){
            $sql = "SELECT tbl_supplier_payment.*, tbl_supplier.* FROM tbl_supplier_payment left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_supplier_payment.SPayment_customerID WHERE tbl_supplier_payment.SPayment_date between  '$Purchase_startdate' and '$Purchase_enddate'";
        }
        if($searchtype == "Supplier"){
            $sql = "SELECT tbl_supplier_payment.*, tbl_supplier.* FROM tbl_supplier_payment left join tbl_supplier on tbl_supplier.Supplier_SlNo = tbl_supplier_payment.SPayment_customerID WHERE tbl_supplier_payment.SPayment_customerID = '$Supplierid' and  tbl_supplier_payment.SPayment_date between  '$Purchase_startdate' and '$Purchase_enddate'";
        }
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('Administrator/payment_reports/supplier_payment_report_list', $datas);
    }
}
