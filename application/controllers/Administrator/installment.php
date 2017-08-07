<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Installment extends CI_Controller {
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
    }
    public function index()  {
        $this->cart->destroy();
        $data['title'] = "Sales Product";
        $data['content'] = $this->load->view('Administrator/sales/product_salesins', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
   function SelectProducts()  {
        $ProID = $this->input->post('ProID');
        $query = "SELECT tbl_product.*,tbl_unit.* FROM tbl_product left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID where tbl_product.Product_SlNo = '$ProID'";
        $data['Product'] = $this->mt->edit_by_id($query);
        $this->load->view('Administrator/sales/ajax_product', $data);
    }
    //Designation
   
    public function sales_order(){
        $sales = array(
            "SaleMaster_InvoiceNo"                      =>$this->input->post('salesInvoiceno'),
            "SalseCustomer_IDNo"                        =>$this->input->post('customerID'),
            "SaleMaster_SaleDate"                       =>$this->input->post('sales_date'),
            "SaleMaster_Description"                    =>$this->input->post('SelesNotes'),
            "SaleMaster_TotalSaleAmount"                =>$this->input->post('subTotal'),
            "SaleMaster_TotalDiscountAmount"            =>$this->input->post('SellsDiscount'),
            "SaleMaster_TaxAmount"                      =>$this->input->post('vatPersent'),
            "SaleMaster_Freight"                        =>$this->input->post('SellsFreight'),
            "SaleMaster_SubTotalAmount"                 =>$this->input->post('SellTotals'),
            "SaleMaster_PaidAmount"                     =>$this->input->post('SellsPaid'),
            "SaleMaster_DueAmount"                      =>$this->input->post('SellsDue'),
            'Status'                                    =>$this->input->post('status'),
            "AddBy"                                     =>$this->session->userdata("FullName"),
            "SaleMaster_branchid"                       =>$this->session->userdata("BRANCHid"),
            "AddTime"                                   =>date("Y-m-d h:i:s")
        );      
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

        $time = strtotime(date('Y-m-09',time()));//strtotime("2010-08-06");
        $date1 = date('Y-m-d', strtotime('+1 month',$time));
        $date2 = date('Y-m-d', strtotime('+2 month',$time));
        $date3 = date('Y-m-d', strtotime('+3 month',$time));
			 
		 $install = array(
            "invoiceid"              =>$this->input->post('salesInvoiceno', TRUE),
            "fistdate"               =>$date1,
            "secondate"              =>$date2,
            "thirdate"               =>$date3
        );

        $this->mt->save_data("tbl_installment_date", $install);
        
        if ($cart = $this->cart->contents()){
            foreach ($cart as $item){
                $packagename = $item['packagename'];
                $proname = $item['name'];
                    $order_detail = array(
                        'SaleMaster_IDNo'               => $sales_id,
                        'Product_IDNo'                  => $item['id'],
                        'SaleDetails_TotalQuantity'     => $item['qty'],
						'Status'                        => $this->input->post('status'),
                        'SaleDetails_Rate'              => $item['price'],
                        'SaleDetails_unit'              => $item['image'],
                        'Purchase_Rate'                 => $item['purchaserate']
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
                
            }// end foreach
        }// end if

        $this->cart->destroy();
        $sss['lastidforprint'] = $sales_id;
        $this->session->set_userdata($sss);
        $this->load->view('Administrator/sales/product_salesins');
    }
}
