<?php 
 $query = mysql_query("SELECT tbl_product.*, tbl_productcategory.*, tbl_unit.* FROM tbl_product LEFT JOIN tbl_productcategory ON tbl_productcategory.ProductCategory_SlNo = tbl_product.ProductCategory_ID LEFT JOIN tbl_unit ON tbl_unit.Unit_SlNo = tbl_product.Unit_ID Where tbl_product.Product_SlNo='".$_GET['ID']."'");
$results = mysql_fetch_array($query);

//print_r($results);
$kode = $results['Product_Code'];

$qty= $this->input->post('qty');
$factory= $this->input->post('factory');

?>
<style>
.vertext{
  position: relative;
    float: left;
    -webkit-transform: rotate(270deg);
    -moz-transform: rotate(270deg);  /* FF3.5+ */
    -o-transform: rotate(270deg);  /* Opera 10.5 */
  text-align: center;
  width: 30%;
  vertical-align: middle;
  top:60px;
  font-size:10px;
  left:10px;

    /*-moz-transform-origin: 100% 100%;*/
    /*-o-transform-origin: 100% 100%;*/
    /*-webkit-transform-origin: 100% 100%;*/
  }
.barcol_left{
  position:relative;width:15%; float:left;
  }
.barcol_right{
  position:relative;width:85%; float:left;
  }
.barcol_txt{float:left; width:100%; position:relative; text-align:left;}
  @media print {
    @page {
        size:auto;
        margin:0 0 0;
    }
  }
</style>
<div class="content_scroll">
<div class="row">
    <div class="col-lg-12">
	<div class="box">
	    <header>
		<h5 style="text-align:center;width:100%;"><?php echo $results['Product_Name']."  Barcode";?> <span id="printhide"><a style="cursor:pointer; margin-right: 14px;"  onClick="doPrint(); return false;">Print <i class="fa fa-print fa-2x"></i></a></span></h5>
	    </header>
	    <div class="row">
        	<div class="col-sm-12 ui-sortable">
            <?php for($i=1;$i<=$qty;$i++){?>
            <div style="padding:5px 0; width:156px;height: 130px;display: inline-block;margin-left: 10px;">
            		<div class="barcol_left"><span class="vertext"></span></div>
                   <div class="barcol_right">
                       <div class="barcol_txt">Six Star Electronics & Furniture</div>
                       <div class="barcol_txt"><?php echo $results['Product_Name'];?></div>  
                       <div class="barcol_txt"><img src="<?php echo site_url();?>Administrator/products/bikin_barcode/<?php echo $kode;?>" align="left"></div> 
                       <div class="barcol_txt" style="padding-right:25px;">Tk.<?php echo $results['Product_SellingPrice']."/-";?></div>  
                       <div class="barcol_txt" style="padding-right:25px;font-size: 9px;margin-bottom: 20px;"><?php echo date('Y-m-d h:i:s');?></div>  
                   </div>          
            </div>
            <?php }?>
            </div>
        </div>
	</div>
    </div>
</div>
</div>
<script>
function doPrint() {
	$("#top").hide();
	$("#left").hide();
	$("#printhide").hide();
    window.print();    
	//setTimeout("location.href='<php echo base_url()?>products'",3000);
}
</script>