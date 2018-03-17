<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {
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
        $data['title'] = "Add Product";
        $data['content'] = $this->load->view('Administrator/products/add_product', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    public function Products_List()  {
        $data['title'] = "Products List";
        $data['content'] = $this->load->view('Administrator/products/Product_List', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }

    public function fanceybox_unit()  {
        $this->load->view('Administrator/products/fanceybox_unit');
    }
    public function insert_unit()  {
        $mail = $this->input->post('add_unit');
        $query = $this->db->query("SELECT Unit_Name from tbl_unit where Unit_Name = '$mail'");
        
        if($query->num_rows() > 0){
            $data['exists'] = "This Name is Already Exists";
            $this->load->view('Administrator/ajax/fanceybox_product_unit',$data);
        }
        else{
            $data = array(
                "Unit_Name"          =>$this->input->post('add_unit', TRUE),
                "AddBy"                  =>$this->session->userdata("FullName"),
                "AddTime"                =>date("Y-m-d h:i:s")
                );
            $this->mt->save_data('tbl_unit',$data);
            $this->load->view('Administrator/ajax/fanceybox_product_unit');
        }
    }
    
    public function insert_product()  {
        $data = array(
            "Product_Code"                 =>$this->input->post('Product_id', TRUE),
            "ProductCategory_ID"           =>$this->input->post('pCategory', TRUE),
			"sizeId"                       =>$this->input->post('psize', TRUE),
            "Product_Name"                 =>$this->input->post('pro_Name', TRUE),
            "Product_type"                 =>$this->input->post('product_check', TRUE),
            "Product_ReOrederLevel"        =>$this->input->post('Re_Order', TRUE),
            "Product_Purchase_Rate"        =>$this->input->post('Purchase_rate', TRUE),
            "Product_WholesaleRate"        =>$this->input->post('wholesale_rate', TRUE),
            "Product_SellingPrice"         =>$this->input->post('sell_rate', TRUE),
            "Product_InstallmentRate"      =>$this->input->post('Installment_rate', TRUE),
            "Unit_ID"                      =>$this->input->post('product_unit', TRUE),
            "AddBy"                        =>$this->session->userdata("FullName"),
            "Product_branchid"             =>$this->session->userdata("BRANCHid"),
            "AddTime"                      =>date("Y-m-d h:i:s")
            );
        $this->mt->save_data('tbl_product',$data);
        $this->load->view('Administrator/ajax/product');
    }
    public function product_edit()  {
        $id = $this->input->post('edit');
        $query = "SELECT tbl_product.*, tbl_productcategory.*,tbl_unit.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID left join tbl_unit on tbl_unit.Unit_SlNo=tbl_product.Unit_ID  where tbl_product.Product_SlNo = '$id'";
        $data['selected'] = $this->mt->edit_by_id($query);
        //$data['content'] = $this->load->view('Administrator/edit/supplier_edit', $data, TRUE);
        $this->load->view('Administrator/edit/product', $data);
    }
    public function product_update(){
        $id = $this->input->post('id');
        $fld = 'Product_SlNo';
        $data = array(
            "Product_Code"                 =>$this->input->post('Product_id', TRUE),
            "ProductCategory_ID"           =>$this->input->post('pCategory', TRUE),
			"sizeId"                       =>$this->input->post('psize', TRUE),
            "Product_Name"                 =>$this->input->post('pro_Name', TRUE),
            "Product_type"                 =>$this->input->post('product_check', TRUE),
            "Product_ReOrederLevel"        =>$this->input->post('Re_Order', TRUE),
            "Product_Purchase_Rate"        =>$this->input->post('Purchase_rate', TRUE),
            "Product_WholesaleRate"        =>$this->input->post('wholesale_rate', TRUE),
            "Product_SellingPrice"         =>$this->input->post('sell_rate', TRUE),
            "Product_InstallmentRate"        =>$this->input->post('Installment_rate', TRUE),
            "Unit_ID"                      =>$this->input->post('product_unit', TRUE),
            "Product_branchid"             =>$this->session->userdata("BRANCHid"),
            "UpdateBy"                     =>$this->session->userdata("FullName"),
            "UpdateTime"                   =>date("Y-m-d h:i:s")
        );
        $this->mt->update_data("tbl_product", $data, $id,$fld);
        $this->load->view('Administrator/ajax/product', $data);
    } 
    public function product_delete(){
        $id = $this->input->post('deleted');
        $fld = 'Product_SlNo';
        $this->mt->delete_data("tbl_product", $id, $fld);
        $data['cate'] = 'Delete Success';
        $this->load->view('Administrator/ajax/product', $data);
    } 
    public function fanceybox_category()  {
        $this->load->view('Administrator/products/fanceybox_category');
    }
    public function insert_fanceybox_category()  {
        $mail = $this->input->post('add_Category');
        $query = $this->db->query("SELECT ProductCategory_Name from tbl_productcategory where ProductCategory_Name = '$mail'");
        
        if($query->num_rows() > 0){
            $data['exists'] = "This Name is Already Exists";
            $this->load->view('Administrator/ajax/fanceybox_product_cat',$data);
        }
        else{
            $data = array(
                "ProductCategory_Name"                  =>$this->input->post('add_Category', TRUE),
                "ProductCategory_Description"           =>$this->input->post('catdescrip', TRUE),
				"company"           					=>$this->input->post('company', TRUE),
                "AddBy"                                 =>$this->session->userdata("FullName"),
                "AddTime"                               =>date("Y-m-d h:i:s")
                );
            $this->mt->save_data('tbl_productcategory',$data);
            $this->load->view('Administrator/ajax/fanceybox_product_cat');
        }
    }
		public function fanceybox_size()  {
        $this->load->view('Administrator/products/fanceybox_size');
    }
    public function insert_fanceybox_size()  {
        $mail = $this->input->post('psize');
        $query = $this->db->query("SELECT Productsize_Name from tbl_produsize where Productsize_Name = '$mail'");
        
        if($query->num_rows() > 0){
            $data['exists'] = "This Size is Already Exists";
            $this->load->view('Administrator/ajax/fanceybox_product_size',$data);
        }
        else{
            $data = array(
                "Productsize_Name"                  =>$this->input->post('psize', TRUE),
                "Productsize_Description"           =>$this->input->post('catdescrip', TRUE),
                "addby"                                 =>$this->session->userdata("FullName")
                );
            $this->mt->save_data('tbl_produsize',$data);
            $this->load->view('Administrator/ajax/fanceybox_product_size');
        }
    }

    public function current_stock()  {
        $data['title'] = "Current Stock";
        $data['content'] = $this->load->view('Administrator/stock/current_stock', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }

    public function current_stock_ajax()  {
        $datas['searchtypeval'] = $this->input->post('searchtypeval');
        $content = $this->load->view('Administrator/ajax/current_stock_ajax', $datas, TRUE);
        echo $content;
    }
    public function current_short_ajax()  {
        $datas['searchtypeval'] = $this->input->post('searchtypeval');
        $content = $this->load->view('Administrator/ajax/current_short_list_ajax', $datas, TRUE);
        echo $content;
    }

    /// Short List
public function current_short_list()  {
        $data['title'] = "Current Stock";
        $data['content'] = $this->load->view('Administrator/stock/current_short_list', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }

	public function branch_current_stock()  {
        $data['title'] = "Current Stock";
        $data['content'] = $this->load->view('Administrator/stock/branchcurrent_stock', $data, TRUE);
        $this->load->view('Administrator/index', $data);
    }
    function searchproduct(){
        $data['Searchkey'] = $this->input->post('Searchkey');
        $this->load->view('Administrator/ajax/search_product', $data);
    }
    function searchmodel(){
        $data['Searchkey'] = $this->input->post('Searchkey');
        $this->load->view('Administrator/ajax/search_model', $data);
    }
	function transfer(){
		 $data['title'] = "Product Transfer";
        $data['content'] = $this->load->view('Administrator/products/transfer', $data, TRUE);
        $this->load->view('Administrator/index', $data);
		}
	function ptransfer(){
        $this->load->view('Administrator/products/ptransfer');
		}
   function transfersuccess(){
	   $tobranchname = $this->input->post('tobranchname', TRUE);
	   $frombranchname = $this->input->post('frombranchname', TRUE);
	   $prodcode = $this->input->post('prodid', TRUE);
	   $quantity =  $this->input->post('prodqty', TRUE);
	   $trdate = date("Y-m-d");
	   $query3 = "INSERT INTO tbl_transfer(tobranch_id,from_branch,status,pro_codes,quantity,trans_date)
						VALUES('$tobranchname','$frombranchname','0','$prodcode','$quantity','$trdate')";
						mysql_query($query3) or die(mysql_error());
	   }
	 function pending(){
		 $data['title'] = "Product Transfer Pending";
        $data['content'] = $this->load->view('Administrator/products/pending_list', $data, TRUE);
        $this->load->view('Administrator/index', $data);
		}
	 function sentlist(){
		 $data['title'] = "Product Transfer Sent";
        $data['content'] = $this->load->view('Administrator/products/sentlist', $data, TRUE);
        $this->load->view('Administrator/index', $data);
		}
	function transfer_req(){
		 $data['title'] = "Product Transfer Request";
        $data['content'] = $this->load->view('Administrator/products/transfer_requiest', $data, TRUE);
        $this->load->view('Administrator/index', $data);
		}
	function transferapproved(){
	    $proid= $_POST['proid'];
		$branchname= $_POST['branchn'];
		$trnsid= $_POST['trnsid'];
		$qtn= $_POST['qtn'];
		$mybranch = $this->session->userdata('BRANCHid');
		
		$query5 ="select * from tbl_branchwise_product Where pro_codes ='".$proid."' AND branch_ids='".$mybranch."'";
		$result5 = mysql_query($query5)or die(mysql_error());
		$numrow = mysql_num_rows($result5);
		$row5 = mysql_fetch_array( $result5);
		if($numrow <=0){
			$query3 = "INSERT INTO tbl_branchwise_product(pro_codes,total_branchqty,branch_ids)
		VALUES('$proid','$qtn','$mybranch')";
		mysql_query($query3) or die(mysql_error());
			}
		else{
		$totalstock2 = $row5['total_branchqty'];
		$addstock2 = $totalstock2+$qtn;
		mysql_query("UPDATE tbl_branchwise_product SET total_branchqty='$addstock2' WHERE pro_codes ='".$proid."' AND branch_ids='".$mybranch."'") or die(mysql_error());
		}
		
		$query4 ="select * from tbl_branchwise_product Where pro_codes ='".$proid."' AND branch_ids='".$branchname."'";
		$result4 = mysql_query($query4)or die(mysql_error());
		$row4 = mysql_fetch_array( $result4);
		$totalstock = $row4['total_branchqty'];
		$addstock = $totalstock-$qtn;
		mysql_query("UPDATE tbl_branchwise_product SET total_branchqty='$addstock' WHERE pro_codes ='".$proid."' AND branch_ids='".$branchname."'") or die(mysql_error());
		
		mysql_query("UPDATE tbl_transfer SET status='1' WHERE trans_id='".$trnsid."'") or die(mysql_error());
		
		$crbranch = $this->session->userdata('BRANCHid');?>
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                <tbody>
                <?php  
				$sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_transfer.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID Left Join tbl_transfer ON tbl_transfer.pro_codes=tbl_product.Product_SlNo where tbl_transfer.tobranch_id='".$this->brunch."' AND tbl_transfer.status='0' order by tbl_transfer.pro_codes desc");
                while($row = mysql_fetch_array($sql)){
					 ?>
                    <tr>
                        <td style="width:10%"><?php echo $row['Product_Code']; ?></td>
                        <td style="width:25%"><?php echo $row['ProductCategory_Name']; ?></td>
                        <td style="width:25%"><?php echo $row['Product_Name']; ?></td>
                        <td style="width:10.5%"><?php echo $row['quantity']; ?></td>
                        <td style="width:12.5%"><?php $tobranch = $row['from_branch'];
						 $sqlbr = mysql_query("SELECT * FROM tbl_brunch where brunch_id='".$tobranch."'");
                			$rowbr = mysql_fetch_array($sqlbr);
							echo $rowbr['Brunch_name'];
						 ?></td>
                         <td style="width:18%">
                 <a class="label-success label label-default" style="cursor:pointer;float: left;padding-right: 15px;" onclick="approveord('<?php echo $row['pro_codes'];?>','<?php echo $row['from_branch'];?>','<?php echo $row['trans_id'];?>','<?php echo $row['quantity'];?>')">
                                    Approve
                                |</a>
                                <a class="label-default label label-danger" style="cursor:pointer;float: left;padding-left: 15px;" onclick="rejectord('<?php echo $row['trans_id'];?>')">
                                    Cancel
                                </a>
                         </td>
                    </tr>
                <?php } ?> 
                </tbody>    
            </table>
	   <?php }
	function transferreject(){
	    $trnsid= $_POST['trnsid'];
		mysql_query("DELETE FROM tbl_transfer WHERE trans_id = '$trnsid'") or die(mysql_error());
		$crbranch = $this->session->userdata('BRANCHid');?>
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                <tbody>
                <?php  
				$sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_transfer.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID Left Join tbl_transfer ON tbl_transfer.pro_codes=tbl_product.Product_SlNo where tbl_transfer.tobranch_id='".$this->brunch."' AND tbl_transfer.status='0' order by tbl_transfer.pro_codes desc");
                while($row = mysql_fetch_array($sql)){
					 ?>
                    <tr>
                        <td style="width:10%"><?php echo $row['Product_Code']; ?></td>
                        <td style="width:25%"><?php echo $row['ProductCategory_Name']; ?></td>
                        <td style="width:25%"><?php echo $row['Product_Name']; ?></td>
                        <td style="width:10.5%"><?php echo $row['quantity']; ?></td>
                        <td style="width:12.5%"><?php $tobranch = $row['from_branch'];
						 $sqlbr = mysql_query("SELECT * FROM tbl_brunch where brunch_id='".$tobranch."'");
                			$rowbr = mysql_fetch_array($sqlbr);
							echo $rowbr['Brunch_name'];
						 ?></td>
                         <td style="width:18%">
                 <a class="label-success label label-default" style="cursor:pointer;float: left;padding-right: 15px;" onclick="approveord('<?php echo $row['pro_codes'];?>','<?php echo $row['from_branch'];?>','<?php echo $row['trans_id'];?>','<?php echo $row['quantity'];?>')">
                                    Approve
                                |</a>
                                <a class="label-default label label-danger" style="cursor:pointer;float: left;padding-left: 15px;" onclick="rejectord('<?php echo $row['trans_id'];?>')">
                                    Cancel
                                </a>
                         </td>
                    </tr>
                <?php } ?> 
                </tbody>    
            </table>
	   <?php }
	 function transfer_record(){
		$data['title'] = "Branch wise Stock Report";
        $data['content'] = $this->load->view('Administrator/products/transrecord', $data, TRUE);
        $this->load->view('Administrator/index', $data);
		 }
	 function getbranchstock(){
		 $data['title'] = "Branch wise Stock Report";
        $data['content'] = $this->load->view('Administrator/stock/branchcurrent_stock', $data, TRUE);
        $this->load->view('Administrator/index', $data);
		}

	function branchwisestock(){
		 $tobranchname = $this->input->post('tobranchname', TRUE);
		 ?>
         <table class="border" cellspacing="0" cellpadding="0" width="70%">

        <h4><a style="cursor:pointer" onclick="window.open('<?php echo base_url();?>Administrator/reports/print_current_stock?brid=<?php echo $tobranchname;?>', 'newwindow', 'width=850, height=800,scrollbars=yes'); return false;"><img src="<?php echo base_url(); ?>images/printer.png" alt=""> Print</a></h4>
        <tr>
            <td colspan="9" align="center"><h2>Current Stock</h2></td>
        </tr>
             <tr bgcolor="#ccc">
                 <th>Sl No.</th>
                 <th>Company</th>
                 <th>Product Name</th>
                 <th>Model</th>
                 <th>Size</th>
                 <th>Unit</th>
                 <th>Qty</th>
                 <th width="110px">Purchase Price</th>
                 <th width="110px">Total Price</th>
             </tr>
        <?php $totalqty = 0;$sellTOTALqty = 0; $subtotal = 0; $gttotalqty = 0; $gttotalpur = 0;
        $sql = mysql_query("SELECT tbl_purchaseinventory.*,tbl_product.*, tbl_productcategory.*, tbl_produsize.*, tbl_purchasedetails.*,SUM(tbl_purchasedetails.PurchaseDetails_TotalQuantity) as totalqty,SUM(tbl_purchasedetails.PurchaseDetails_Rate) as totalpr FROM tbl_purchaseinventory left join tbl_product on tbl_product.Product_SlNo = tbl_purchaseinventory.purchProduct_IDNo LEFT JOIN tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID LEFT JOIN tbl_produsize ON tbl_produsize.Productsize_SlNo = tbl_product.sizeId left join tbl_purchasedetails on tbl_purchasedetails.Product_IDNo = tbl_product.Product_SlNo group by tbl_purchasedetails.Product_IDNo  order by company asc");
        $i=0;
        while($record = mysql_fetch_array($sql)){
            $i++;
                $totalprretqty = $record['PurchaseInventory_ReturnQuantity'];
                $totalprdamqty = $record['PurchaseInventory_DamageQuantity'];
                
				$totalprlostqty = $totalprretqty+$totalprdamqty;
                $PID = $record['purchProduct_IDNo'];
                // Sell qty
                $sqq = mysql_query("SELECT * FROM tbl_saleinventory WHERE sellProduct_IdNo = '$PID' AND SaleInventory_brunchid = '".$tobranchname."'");
                $or = mysql_fetch_array($sqq);
                if($or['SaleInventory_packname'] ==""){
                $sellTOTALqty = $or['SaleInventory_TotalQuantity'];
               
                $sellTOTALqty = $sellTOTALqty-$or['SaleInventory_DamageQuantity'];
                $totalsaretqty = $or['SaleInventory_ReturnQuantity'];
				
				$sqltstock = mysql_query("SELECT * FROM tbl_branchwise_product WHERE pro_codes = '$PID' AND branch_ids='".$tobranchname."'");
				$roxstock = mysql_fetch_array($sqltstock);
				$perbranchqty = $roxstock['total_branchqty'];
				
				 $totalqty = ($perbranchqty+$totalsaretqty)-($totalprlostqty+$sellTOTALqty);
                if($totalqty !="0"){
                    $rate = $totalqty*$record['PurchaseDetails_Rate'];
                    $subtotal = $subtotal+$rate;
                    $totalrate=$rate+$rate;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $record['company'] ?></td>
                    <td><?php echo $record['Product_Name'] ?></td>
                    <td><?php echo $record['ProductCategory_Name'] ?></td>
                    <td><?php echo $record['Productsize_Name'] ?></td>
                    <td><?php if($record['PurchaseDetails_Unit']==""){echo "pcs";} else{echo $record['PurchaseDetails_Unit']; }?></td>
                    <td style="text-align: center;"><?php echo $totalqty;
                        $gttotalqty = $gttotalqty+$totalqty;
                        ?></td>
                    <td style="text-align: right;"><?php echo number_format($record['PurchaseDetails_Rate'], 2);
                        $gttotalpur = $gttotalpur+$record['PurchaseDetails_Rate'];
                        ?></td>
                    <td><?php echo $rate ?></td>
                </tr>
        <?php } } }?>
           <!--  <tr>
                 <td colspan="5" style="text-align: right;"><strong>Sub Total:</strong></td>
                 <td style="text-align: center;"><strong><?php /*echo $gttotalqty; */?></strong></td>
                 <td style="text-align: right;"><strong><?php /*echo number_format($gttotalpur, 2); */?> Tk</strong> </td>
                 <td style="text-align: right;"><strong><?php /*echo number_format($subtotal, 2); */?> Tk</strong></td>
             </tr>-->
        <tr>
            <td colspan="5" style="border:0px"></td>
            <td><strong>Sub Total:</strong> </td>
            <td style="text-align: center;"><strong><?php echo $gttotalqty; ?></strong></td>
            <td style="text-align: right;"><strong><?php echo number_format($gttotalpur, 2); ?> Tk</strong> </td>
            <td><strong><?php echo number_format($subtotal, 2); ?> Tk</strong></td>
        </tr>
       
    </table>
		<?php
		}

    public function generatebarcode(){
        $data['title'] = "Generate Barcode";
        $data["content"] = $this->load->view('Administrator/products/barcode', $data, TRUE);
        $this->load->view('Administrator/index', $data);
        }
    public function barcode(){
        $data['title'] = "Generate Barcode";
        $data["content"] = $this->load->view('Administrator/products/getbarcode', $data, TRUE);
         $this->load->view('Administrator/index', $data);
        }
    function bikin_barcode($kode){
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array('text'=>$kode), array());
    }
}
