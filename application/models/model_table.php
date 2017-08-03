<?php
class Model_Table extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
   
    /*---------------------------  Save Update Data  ------------------------------*/

    
    public function payment_invoice($id){
        $sql = mysql_query("SELECT tbl_booking_bill.*, tbl_booking_customer.*, tbl_booking_customer.fld_id as cusID, tbl_cash_receive.fld_id as cashR_ID FROM tbl_booking_bill LEFT JOIN tbl_booking_customer ON tbl_booking_customer.fld_id=tbl_booking_bill.fld_customer_id left join tbl_cash_receive on tbl_booking_bill.fld_id =tbl_cash_receive.fld_order_id  where tbl_booking_bill.fld_id = '$id'");
        while($d = mysql_fetch_array($sql)){
            return $d;
        }
    }
     public function ajax_cash_payment($key){
        $sql = mysql_query("SELECT tbl_booking_bill.*, tbl_booking_customer.*, tbl_booking_customer.fld_id as cusID, tbl_cash_receive.fld_id as cashR_ID FROM tbl_booking_bill LEFT JOIN tbl_booking_customer ON tbl_booking_customer.fld_id=tbl_booking_bill.fld_customer_id left join tbl_cash_receive on tbl_booking_bill.fld_id =tbl_cash_receive.fld_order_id  where tbl_booking_bill.fld_Serial = '$key'");
        while($d = mysql_fetch_array($sql)){
            return $d;
        }
    }
    public function ajax_cash_receive($id){
        $sql = mysql_query("SELECT tbl_booking_bill.*, tbl_booking_customer.*, tbl_booking_customer.fld_id as cusID, tbl_cash_receive.fld_id as cashR_ID FROM tbl_booking_bill LEFT JOIN tbl_booking_customer ON tbl_booking_customer.fld_id=tbl_booking_bill.fld_customer_id left join tbl_cash_receive on tbl_booking_bill.fld_id =tbl_cash_receive.fld_order_id  where tbl_booking_bill.fld_id = '$id'");
        while($d = mysql_fetch_array($sql)){
            return $d;
        }
    }
    public function add_product($data)
    {
            //untuk insert data ke table product
            $this->db->insert('product', $data);
    }
    public function save_data($table, $data){       
        $result= $this->db->insert($table, $data);
        if ($result) {                    
           $this->Id = $this->db->insert_id();
           return TRUE;
        } 
        $this->Err = mysql_error();
        return FALSE;
    }
    

    public function save_date_id($table, $data){
        $this->db->insert($table, $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;      
    }
    public function update_customer_data($table, $data, $id){       
        $this->db->where("fld_id", $id);
        $result= $this->db->update($table, $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;      
     }
    public function update_data($table, $data, $id,$fld){       
        $this->db->where($fld, $id);
        $result= $this->db->update($table, $data);
        if (!$result) {                      
           return FALSE;
        } 
        return TRUE;
     }
     
    public function delete_data($table, $id, $fld){       
        $this->db->where($fld, $id);
        $result= $this->db->delete($table);
        if (!$result) {                      
           return FALSE;
        } 
        return TRUE;
    }

    public function select_by_Booking_id($id){
        $sql = mysql_query("SELECT tbl_booking_bill.*,tbl_booking_bill.fld_id as ordID, tbl_booking_customer.*, tbl_booking_customer.fld_id as cusID, tbl_cash_receive.*, tbl_cash_receive.fld_id as cashR_ID FROM tbl_booking_bill LEFT JOIN tbl_booking_customer ON tbl_booking_customer.fld_id=tbl_booking_bill.fld_customer_id left join tbl_cash_receive on tbl_booking_bill.fld_id =tbl_cash_receive.fld_order_id  where tbl_booking_bill.fld_id = '".$id."'");
        while($d = mysql_fetch_array($sql)){
            return $d;
        }
    }
    public function edit_by_id($query){
        $sql = mysql_query($query);
        while($d = mysql_fetch_array($sql)){
            return $d;
        }
    }

    public function select_by_id($table, $id,$fld){
        $sql = mysql_query("SELECT * from {$table} where {$fld} = '".$id."'");
        while($d = mysql_fetch_array($sql)){
            return $d;
        }
    }
    
    public function view_data($table){
        $a = array();
        $sql = mysql_query($table);
        while($d = mysql_fetch_array($sql)){
           $a[] = $d;
        }   
      return $a;
    }

    
    public function ccdata($data){
        $a = array();
        $sql = mysql_query($data);
        while($d = mysql_fetch_array($sql)){
           $a[] = $d;
        }	
      return $a;
    }
    
    
    public function mailcheck_availablity(){
        $mail = $this->input->post('usermail');
        
        $query = $this->db->query("SELECT fld_email from tbl_superadmin where fld_email = '$mail'");
        if($query->num_rows() > 0){
            return false;
        }
        else{
            return true;}
    }
  }
?>
