<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wholesales extends CI_Controller {
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
        $data['title'] = "Whole Sales Product";
        $data['content'] = $this->load->view('Administrator/sales/wholesales_product', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    function SelectProducts()  {
        $ProID = $this->input->post('ProID');
        $query = "SELECT tbl_product.*,tbl_unit.* FROM tbl_product left join tbl_unit on tbl_unit.Unit_SlNo = tbl_product.Unit_ID where tbl_product.Product_SlNo = '$ProID'";
        $data['Product'] = $this->mt->edit_by_id($query);
        $this->load->view('Administrator/sales/ajax_wholesalesProduct', $data);
    }
    //Designation

    /*public function sales_order(){
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
        $this->load->view('Administrator/sales/wholesales_product');
    }*/

    public function sales_order(){ //in
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
                "SaleMaster_TotalDue"                       =>$this->input->post('totalPreDue'),
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
                "SaleMaster_TotalDue"                       =>$this->input->post('totalPreDue'),
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
                    'discount_price'                => $item['ProductAmont'],
                    'SaleDetails_Discount'          => $item['SaleDetails_Discount'],
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
        $this->load->view('Administrator/sales/wholesales_product');
    }
}
