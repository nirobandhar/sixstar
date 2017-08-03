<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->cbrunch = $this->session->userdata('BRANCHid');
        $access = $this->session->userdata('userId');
         if($access == '' ){
            redirect("login");
        }
        $this->load->model("model_myclass", "mmc", TRUE);
        $this->load->model('model_table', "mt", TRUE);
		date_default_timezone_set('Asia/Dhaka');
    }
    public function index()  {
        $data['title'] = "Customer";
        $data['content'] = $this->load->view('Administrator/add_customer', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function insert_customer()  {
		$data=array();
        $this->load->library('upload');
        $config['upload_path'] = './uploads/Customerbiodata/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = '10000';
        $config['image_width']= '4000';
        $config['image_height']= '4000';
        $this->upload->initialize($config);
         
        $data['Customer_Code']=  $this->input->post('Customer_id', TRUE);
        $data['Customer_Name']=  $this->input->post('cus_name', TRUE);
        $data['Customer_Type']=  $this->input->post('type', TRUE);
        $data['Customer_Address']=  $this->input->post('address', TRUE);
		$data['Gurantor_Name']=  $this->input->post('gur_name', TRUE);
        $data['Gurantor_Contact']=  $this->input->post('gur_contact', TRUE);
        $data['Gurantor_Address']=  $this->input->post('gur_address', TRUE);
        $data['permanent_address']=  $this->input->post('praddress', TRUE);
		$data['disttrict']=  $this->input->post('district', TRUE);
        $data['Country_SlNo']=  $this->input->post('country', TRUE);
        $data['Customer_Phone']=  $this->input->post('phone', TRUE);
        $data['Customer_Mobile']=  $this->input->post('mobile',true);
        $data['Customer_OfficePhone']=  $this->input->post('office_phone',true);
        $data['Customer_Email']=  $this->input->post('email',true);
        $data['Customer_Web']=  $this->input->post('web',true);
        $data['Customer_Credit_Limit']=  $this->input->post('credit',true);
        $data['Customer_brunchid']=  $this->session->userdata("BRANCHid");
        $data['AddBy']= $this->session->userdata("FullName");
        $data['AddTime']=  date("Y-m-d h:i:s");
		$data['notes']=  $this->input->post('notes',true);

		$this->upload->do_upload('photo');
        $images1 = $this->upload->data();
        $data['customerpic'] = $images1['file_name'];
		
        $this->upload->do_upload('biodata');
        $images = $this->upload->data();
        $data['biodata'] = $images['file_name'];
        $this->mt->save_data('tbl_customer',$data);
        $this->load->view('Administrator/ajax/customer');
    }
    public function customeredit()  {
        $data['title'] = "Edit Customer";
        $id =$this->input->post('edit');
        $query = "SELECT tbl_customer.*, tbl_country.* FROM tbl_customer left join tbl_country on tbl_country.Country_SlNo=tbl_customer.Country_SlNo where tbl_customer.Customer_SlNo = '$id'";
        $data['selected'] = $this->mt->edit_by_id($query);
        //$data['content'] = $this->load->view('Administrator/edit/customer_edit', $data, TRUE);
        $this->load->view('Administrator/edit/customer_edit', $data);
    }
    public function customerupdate(){
        $id = $this->input->post('id');
        $fld = 'Customer_SlNo';
        $data = array(
            "Customer_Code"                 =>$this->input->post('Customer_id', TRUE),
            "Customer_Name"                 =>$this->input->post('cus_name', TRUE),
            "Customer_Type"                 =>$this->input->post('type', TRUE),
            "Customer_Address"              =>$this->input->post('address', TRUE),
			"permanent_address"             =>$this->input->post('praddress', TRUE),
            "Gurantor_Name"             =>$this->input->post('gur_name', TRUE),
            "Gurantor_Contact"             =>$this->input->post('gur_contact', TRUE),
            "Gurantor_Address"             =>$this->input->post('gur_address', TRUE),
			"disttrict"              		=>$this->input->post('district', TRUE),
            "Country_SlNo"                  =>$this->input->post('country', TRUE),
            "Customer_Phone"                =>$this->input->post('phone', TRUE),
            "Customer_Mobile"               =>$this->input->post('mobile', TRUE),
            "Customer_OfficePhone"          =>$this->input->post('office_phone', TRUE),
            "Customer_Email"                =>$this->input->post('email', TRUE),
            "Customer_Web"                  =>$this->input->post('web', TRUE),
            "Customer_Credit_Limit"         =>$this->input->post('credit', TRUE),
            "UpdateBy"                      =>$this->session->userdata("FullName"),
            "Customer_brunchid"             =>$this->session->userdata("BRANCHid"),
            "UpdateTime"                    =>date("Y-m-d h:i:s"),
			"notes"                    		=>$this->input->post('notes',TRUE)
        );
		
        $this->load->library('upload');
        $config['upload_path'] = './uploads/Customerbiodata/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = '10000';
        $config['image_width']= '4000';
        $config['image_height']= '4000';
        $this->upload->initialize($config);

        $data['Customer_Code']=  $this->input->post('Customer_id', TRUE);
        $data['Customer_Name']=  $this->input->post('cus_name', TRUE);
        $data['Customer_Type']=  $this->input->post('type', TRUE);
        $data['Customer_Address']=  $this->input->post('address', TRUE);
		$data['permanent_address']=  $this->input->post('praddress', TRUE);
		$data['disttrict']=  $this->input->post('district', TRUE);
        $data['Country_SlNo']=  $this->input->post('country', TRUE);
        $data['Customer_Phone']=  $this->input->post('phone', TRUE);
        $data['Customer_Mobile']=  $this->input->post('mobile',true);
        $data['Customer_OfficePhone']=  $this->input->post('office_phone',true);
        $data['Customer_Email']=  $this->input->post('email',true);
        $data['Customer_Web']=  $this->input->post('web',true);
        $data['Customer_Credit_Limit']=  $this->input->post('credit',true);
        $data['Customer_brunchid']=  $this->session->userdata("BRANCHid");
        $data['AddBy']= $this->session->userdata("FullName");
        $data['AddTime']=  date("Y-m-d h:i:s");
		$data['notes']=  $this->input->post('notes',true);
		
		$xx = $this->mt->select_by_id("tbl_customer", $id,$fld);
		
        $image1=$this->upload->do_upload('photo');
        $images1 = $this->upload->data();
        
        if($image1 != ""){            
            if($xx['customerpic']){
            unlink("./uploads/Customerbiodata/".$xx['customerpic']);
            }
            $data['customerpic'] = $images1['file_name'];
              
        }else{
            $data['customerpic'] = $xx['customerpic'];
         }
		$image=$this->upload->do_upload('biodata');
        $images = $this->upload->data();
		if($image != ""){            
            if($xx['biodata']){
            unlink("./uploads/Customerbiodata/".$xx['biodata']);
            }
            $data['biodata'] = $images['file_name'];
              
        }else{
            $data['biodata'] = $xx['biodata'];
         }
		 //print_r($data);
        $this->mt->update_data("tbl_customer", $data, $id,$fld);
    } 
    public function customerdelete(){
        $id = $this->input->post('deleted');
        $fld = 'Customer_SlNo';
        $this->mt->delete_data("tbl_customer", $id, $fld);
        $data['cate'] = 'Delete Success';
        $this->load->view('Administrator/ajax/customer', $data);
    } 
	function getcustomer(){
		 $Salestype = $this->input->post('Salestypef');
		 ?>
          <select name="" id="customerID" class="inputclass" style="width:200px" onchange="Supplierdata()">
           <option value="">  </option>
		 <?php $sql = mysql_query("SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo Where tbl_salesmaster.Status = '$Salestype' group by tbl_salesmaster.SalseCustomer_IDNo");
		 while($row = mysql_fetch_array($sql)){?>
                <option value="<?php echo $row['Customer_SlNo']; ?>"><?php echo $row['Customer_Name']; ?> (<?php echo $row['Customer_Code']; ?>)</option>
			 <?php } ?>
             </select>
		<?php }
	function getcustomer2(){
		 $Salestype = $this->input->post('Salestypef');
		 ?>
          <select name="" id="customerID" class="inputclass" style="width:200px" >
           <option value="">  </option>
		 <?php $sql = mysql_query("SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID Where tbl_customer_payment.status = '$Salestype' Group BY tbl_customer_payment.CPayment_customerID");
		 while($row = mysql_fetch_array($sql)){?>
                <option value="<?php echo $row['Customer_SlNo']; ?>"><?php echo $row['Customer_Name']; ?> (<?php echo $row['Customer_Code']; ?>)</option>
			 <?php } ?>
             </select>
		<?php }
    function customer_due(){
        $data['title'] = 'Customer Due';
        $data['content'] = $this->load->view('Administrator/due_report/customer_due', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    } 
    function search_customer_due()  {
        $dAta['searchtype']= $searchtype = $this->input->post('searchtype');
        $dAta['Sales_startdate']=$Sales_startdate = $this->input->post('Sales_startdate');
        $dAta['Sales_enddate']=$Sales_enddate = $this->input->post('Sales_enddate');
        $dAta['customerID']=$customerID = $this->input->post('customerID');
		$dAta['salestype']=$Salestype = $this->input->post('Salestype');
        $this->session->set_userdata($dAta);
		
	if($Salestype == 'All'){
        if($searchtype == "All"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo group by tbl_salesmaster.SalseCustomer_IDNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
        if($searchtype == "Customer"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' group by tbl_salesmaster.SalseCustomer_IDNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
	}
	else{
        if($searchtype == "All"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo Where tbl_salesmaster.Status = '$Salestype' group by tbl_salesmaster.SalseCustomer_IDNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
        if($searchtype == "Customer"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$Salestype' AND tbl_salesmaster.SalseCustomer_IDNo = '$customerID' group by tbl_salesmaster.SalseCustomer_IDNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
	}
        $datas["record"] = $this->mt->ccdata($sql);
        
        $this->load->view('Administrator/due_report/customer_due_list', $datas);
    }
    function customer_due_payment($Custid){
        $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as cstatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$Custid' group by tbl_salesmaster.SalseCustomer_IDNo ";
        $datas["record"] = $this->mt->ccdata($sql);
		//print_r($datas["record"]);
        $this->load->view('Administrator/due_report/customer_due_payment', $datas);
    }
    
    public function custome_PaymentAmount(){
        $status = $this->input->post('status');
		if($status==3){
			$datastatus = array(
            "invoice"                           =>$this->input->post('invoice', TRUE),
			"custid"                            =>$this->input->post('CustID', TRUE),
            "payment_amount"                    =>$this->input->post('paidAmount', TRUE),
            "pay_date"                          =>$this->input->post('paymentDate', TRUE),
            "comments"                          =>''
        );
        $this->mt->save_data("tbl_installment", $datastatus);
			}
        $data = array(
            "CPayment_date"                     =>$this->input->post('paymentDate', TRUE),
            "CPayment_invoice"                  =>$this->input->post('invoice', TRUE),
            "CPayment_customerID"               =>$this->input->post('CustID', TRUE),
            "CPayment_amount"                   =>$this->input->post('paidAmount', TRUE),
            "CPayment_notes"                    =>$this->input->post('country', TRUE),
			"status"                            =>$this->input->post('status', TRUE),
            "CPayment_Paymentby"                =>$this->input->post('Paymentby', TRUE),
            "CPayment_Addby"                    =>$this->session->userdata("FullName"),
            "CPayment_brunchid"                 =>$this->session->userdata("BRANCHid")			
        );
        $this->mt->save_data("tbl_customer_payment", $data);

        $searchtype = $this->session->userdata('searchtype');
        $Sales_startdate = $this->session->userdata('Sales_startdate');
        $Sales_enddate = $this->session->userdata('Sales_enddate');
        $customerID = $this->session->userdata('customerID');
		$Salestype = $this->session->userdata('Salestype');
        if($Salestype == 'All'){
        if($searchtype == "All"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo group by tbl_salesmaster.SaleMaster_InvoiceNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
        if($searchtype == "Customer"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' group by tbl_salesmaster.SaleMaster_InvoiceNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
	}
	    else{
        if($searchtype == "All"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo Where tbl_salesmaster.Status = '$Salestype' group by tbl_salesmaster.SaleMaster_InvoiceNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
        if($searchtype == "Customer"){
            $sql = "SELECT tbl_salesmaster.*,tbl_salesmaster.Status as salestatus, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.Status = '$Salestype' AND tbl_salesmaster.SalseCustomer_IDNo = '$customerID' group by tbl_salesmaster.SaleMaster_InvoiceNo";
            // $sql = "SELECT tbl_salesmaster.*, tbl_customer.* FROM tbl_salesmaster left join tbl_customer on tbl_customer.Customer_SlNo = tbl_salesmaster.SalseCustomer_IDNo WHERE tbl_salesmaster.SalseCustomer_IDNo = '$customerID' and  tbl_salesmaster.SaleMaster_SaleDate between  '$Sales_startdate' and '$Sales_enddate' group by tbl_salesmaster.SalseCustomer_IDNo";
        }
	}
        $datas["record"] = $this->mt->ccdata($sql);
        $this->load->view('Administrator/due_report/customer_due_list', $datas);
    } 
    function customer_payment_report(){
        $data['title'] = "Customer Payment Reports";
        $data['content'] = $this->load->view('Administrator/payment_reports/customer_payment_report', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
   
    function search_customer_payments(){
        $dAta['searchtype']= $searchtype = $this->input->post('searchtype');
        $dAta['Sales_startdate']=$Sales_startdate = $this->input->post('Sales_startdate');
        $dAta['Sales_enddate']=$Sales_enddate = $this->input->post('Sales_enddate');
        $dAta['customerID']=$customerID = $this->input->post('customerID');
		$dAta['salestype']=$Salestype = $this->input->post('Salestype');
        $this->session->set_userdata($dAta);
		if($Salestype == 'All'){
        if($searchtype == "All"){
            
            $sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID where tbl_customer_payment.CPayment_date between '$Sales_startdate' and '$Sales_enddate'";
        }
        if($searchtype == "Customer"){
            $sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID WHERE tbl_customer_payment.CPayment_customerID = '$customerID' and tbl_customer_payment.CPayment_date between '$Sales_startdate' and '$Sales_enddate'";
        }
		}
		else{
			if($searchtype == "All"){
            $sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID Where tbl_customer_payment.status = '$Salestype' AND tbl_customer_payment.CPayment_date between '$Sales_startdate' and '$Sales_enddate'";
        }
        if($searchtype == "Customer"){
            $sql = "SELECT tbl_customer_payment.*, tbl_customer.* FROM tbl_customer_payment left join tbl_customer on tbl_customer.Customer_SlNo = tbl_customer_payment.CPayment_customerID WHERE tbl_customer_payment.status = '$Salestype' AND tbl_customer_payment.CPayment_customerID = '$customerID' and tbl_customer_payment.CPayment_date between '$Sales_startdate' and '$Sales_enddate'";
        }
			}
        $datas["record"] = $this->mt->ccdata($sql);
        $this->load->view('Administrator/payment_reports/customer_payment_report_list', $datas);
    }

   
}
