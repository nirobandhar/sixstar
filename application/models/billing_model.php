<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Billing_model extends CI_Model {
    
     // Get all details ehich store in "products" table in database.
        public function get_all()
	{
		$query = $this->db->get('products');
		return $query->result_array();
	}
    
    // Insert customer details in "customer" table in database.
	public function purchaseOrder($data)
	{
		$this->db->insert('tbl_purchasemaster', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;		
	}
	
        // Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		$this->db->insert('order_tbl', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
        // Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($data) {
		$this->db->insert('tbl_purchasedetails', $data);
	}
	// ==========================Sales Product==========================================
	public function SalesOrder($data) {
		$this->db->insert('tbl_salesmaster', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;		
	}
	public function insert_sales_detail($data) {
		$this->db->insert('tbl_saledetails', $data);
        return $this->db->insert_id();
	}
	// ==========================Sales Return==========================================
	public function SalesReturn($table, $data) {
		$this->db->insert($table, $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;		
	}
       
}