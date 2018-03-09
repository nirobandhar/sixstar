

<div class="content_scroll">
    <div id="rpage_menu" class="page_menu">
        <ul>
            <li class="active"><a href="">Add Product</a></li>
            <!-- <li class="active"><a href="<?php echo base_url();?>Administrator/employee/emplists">Employee List </a> </li> -->
            <li><span style="color:green;"><?php $status = $this->session->userdata('employee');if(isset($status))echo $status;$this->session->unset_userdata('employee'); ?></span></li>
        </ul>
    </div>
    <span id="saveResult">
    <div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
            <div id="tabs-1">
                <div class="middle_form">
                    <h2>Add Product</h2>
                    <div class="body">
                        <div class="full clearfix">
                            <span>Product Id</span>
                            <div class="left">
                                <input name="Emp_id" type="text" id="Empr_id" class="required" disabled="" value="<?php   $serial ="P1000"; $sql = mysql_query("SELECT * FROM tbl_product");
                                while ($d = mysql_fetch_array($sql)){
                                    if($d['Product_Code']!=null){$serial = $d['Product_Code'];}
                                } $serial = explode("P",$serial);
                                $serial=$serial['1']; $autoserial= $serial+1;echo "P".$autoserial;?>" />
                                    <input name="Product_id" type="hidden" id="Product_id" class="required" value="<?php   $serial ="P1000"; $sql = mysql_query("SELECT * FROM tbl_product");
                                    while ($d = mysql_fetch_array($sql)){
                                        if($d['Product_Code']!=null){$serial = $d['Product_Code'];}
                                    } $serial = explode("P",$serial);
                                    $serial=$serial['1']; $autoserial= $serial+1;echo "P".$autoserial;?>" />
                            </div>
                        </div>

                        <div class="full clearfix">
                            <span ta>Model</span>
                            <div class="left">
                              <div id="Search_Results_category">
                                    <select name="pCategory" id="pCategory" style="width:163px;" tabindex="1" required>
                                        <option value=""></option>
                                        <?php $sql = mysql_query("SELECT * FROM tbl_productcategory order by ProductCategory_Name asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                            <option value="<?php echo $row['ProductCategory_SlNo'] ?>"><?php echo $row['ProductCategory_Name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/products/fanceybox_category">
                                <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>
                                </a>
                            </div>
                            <span id="pCategory_"></span>
                        </div>
                        <div class="full clearfix">
                            <span>Size</span>
                            <div class="left">
                              <div id="Search_Results_size">
                                    <select name="psize" id="psize" style="width:163px;" tabindex="2" required>
                                        <option value="">Select</option>
                                        <?php $sql = mysql_query("SELECT * FROM tbl_produsize order by Productsize_Name asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                            <option value="<?php echo $row['Productsize_SlNo'] ?>"><?php echo $row['Productsize_Name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/products/fanceybox_size">
                                <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>
                                </a>
                            </div>
                            <span id="psize_"></span>
                        </div>
                        <div class="full clearfix">
                            <span>Name</span>
                            <div class="left">
                                <input name="pro_Name" type="text" id="pro_Name" class="required" tabindex="3" required/>
                                <span id="pro_Name_"></span>
                            </div>
                        </div>
                         <div class="full clearfix">
                            <span>Re-Order Level</span>
                            <div class="left">
                                <input name="Re_Order" type="text" id="Re_Order" value="0" class="required" tabindex="4" />
                                <input id="product_check" type="hidden" value="Product" checked name="product_check" />
                                <span id="Re_Order_"></span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="right_form">
                    <div class="body">
                        <div class="full clearfix">
                            <span>MRP or DP</span>
                            <input id="mrp_dp" onkeyup="mdronkeyup()" tabindex="5" class="inputclass" style="width:130px" value="0" type="text"> Tk.
                            <input id="mrp_dp_p" onkeyup="mdponkeyup()" tabindex="6" class="inputclass" style="width:50px" value="0" type="text"> %
                        </div>
                        <div class="full clearfix">
                            <span>Purchase Rate</span>
                            <input name="Purchase_rate" style="width: 130px;" tabindex="7" type="text" id="Purchase_rate" value="0" onkeyup="puronkeyup()" class="txt" required/> Tk.
                            <input id="wr_p" onkeyup="wrponkeyup()" tabindex="8" class="inputclass" style="width:50px" value="0" type="text"> %
                            <input type="text" id="wrate" readonly style="border:none;font-size:20px;width:120px;text-align:center; background-color: transparent" value="0">
                            <span id="Purchase_rate_"></span>

                        </div>
                        <div class="full clearfix">
                            <span>Wholesales Rate</span>
                            <input id="wholesaleper" onkeyup="whponkeyup()" tabindex="9" class="inputclass" style="width:50px" value="0" type="text"> %
                            <input id="wholesale_rate" class="inputclass" tabindex="10" style="width:130px" value="0" type="text">
                        </div>
                        <div class="full clearfix">
                            <span>Retail Rate</span>
                            <input id="sellper" onkeyup="slponkeyup()" tabindex="11" class="inputclass" style="width:50px" value="0" type="text"> %
                            <input id="sell_rate" onkeyup="slronkeyup()" onkeydown="post()" tabindex="12" class="inputclass" style="width:130px" value="0" type="text">
                        </div>
                        <!--<div class="full clearfix">
                            <span>Installment Rate</span>
                            <input id="insper" onkeyup="insonkeyup()"tabindex="13" class="inputclass" style="width:50px" value="0" type="text"> %
                            <input id="installment_rate_" class="inputclass" tabindex="14" style="width:130px" value="0" type="text">
                        </div>-->
                        <div class="full clearfix">
                            <span>Unit</span>
                            <div class="left">
                                <div id="Search_Results">
                                    <select name="product_unit" id="product_unit" tabindex="15" style="width:200px;" required>
                                        <!--<option value="">Select</option>-->
                                        <?php $sql = mysql_query("SELECT * FROM tbl_unit order by Unit_Name asc");
                                        while($row = mysql_fetch_array($sql)){ ?>
                                            <option value="<?php echo $row['Unit_SlNo'] ?>"><?php echo $row['Unit_Name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="rightElement">
                                <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/products/fanceybox_unit">
                                    <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>
                                </a>
                            </div>
                            <div id="product_unit_"></div>
                        </div>
                        <div class="full clearfix">
                            <span></span>
                            <input type="button" onclick="submit()" name="btnSubmit" value="Save"  title="Save" class="button" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="full clearfix" style="float:right;margin-right:10%">
        <input type="text" id="Searchkey" placeholder="Search Products" required class="txt" onkeypress="productSearch(event)" style="border: 1px solid #c8d3df;
  border-radius: 2px;
  padding: 7px !important;" />
    </div><br>
    <div class="clearfix moderntabs" style="width:330px;width:100%;max-height:500px;overflow:scroll;">

        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:97%;border-collapse:collapse;">
            <thead>
                <tr class="header">
                    <th>
                            <a href="?orderBy=Product_Code">Product Code<a/>
                    </th>
                    <th>
                            <a href="?orderBy=company">Company<a/>
                    </th>
                    <th>
                        <a href="?orderBy=ProductCategory_Name">Model<a/>
                    </th>
                    <th style="width:10%">Size</th>
                    <th>
                        <a href="?orderBy=Product_Name">Product Name<a/>
                    </th>
                    <th style="width:8%">Purchase Rate</th>
                    <th style="width:8%">Wholesale Rate</th>
                    <th style="width:10%">Retail Rate</th>
                    <th style="width:12%">Installment Rate</th>
                    <th style="width:15%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $orderBy = array('Product_Code','company', 'Product_Name', 'ProductCategory_Name');
            $order = 'Product_Code desc';
            if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
                $order = $_GET['orderBy'];
            }
            else{
                $order='Product_Code Desc';
            }
            $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_produsize.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID left join tbl_produsize on tbl_produsize.Productsize_SlNo= tbl_product.sizeId order by ".$order."");
            while($row = mysql_fetch_array($sql)){ ?>
                <tr>
                    <td style="width:5%"><?php echo $row['Product_Code'] ?></td>
                    <td style="width:8%"><?php echo $row['company'] ?></td>
                    <td style="width:15%"><?php echo $row['ProductCategory_Name'] ?></td>
                    <td style="width:10%"><?php echo $row['Productsize_Name'] ?></td>
                    <td style="width:15%"><?php echo $row['Product_Name'] ?></td>
                    <td style="width:8%"><?php echo $row['Product_Purchase_Rate'] ?></td>
                    <td style="width:8%"><?php echo $row['Product_WholesaleRate'] ?></td>
                    <td style="width:10%"><?php echo $row['Product_SellingPrice'] ?></td>
                    <td style="width:12%"><?php echo $row['Product_InstallmentRate'] ?></td>
                    <td style="width:15%">
                        <span onclick="Edit_product(<?php echo $row['Product_SlNo'] ?>)" style="cursor:pointer;color:green;font-size:20px;float:left; margin:5px;"><i class="fa fa-pencil"></i></span>
                        <span  onclick="deleted(<?php echo $row['Product_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding:5px" ><i class="fa fa-trash-o"></i></span>
                        <span style="cursor:pointer;color:red;font-size:20px;float:left;padding:5px" >
                            <a title="Generate Barcode" href="<?php echo base_url()?>Administrator/products/generatebarcode?ID=<?php echo $row['Product_SlNo']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fa fa-barcode"></i></a>
                        </span>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    </span>
</div>

<script type="text/javascript">
    function post() {
        var post = event.keyCode;
        if (post == 13) {
            submit()
        }
    }

    function mdronkeyup() {
        var mrp_dp = $("#mrp_dp").val();
        var mrp_dp_p = $("#mrp_dp_p").val();
        var mrp_dp = mrp_dp-((mrp_dp_p/100)*mrp_dp
            );
        $("#Purchase_rate").val(mrp_dp)
    }
    function mdponkeyup() {
        var mrp_dp = $("#mrp_dp").val();
//        var mrate=parseFloat(mrp_dp)*1;
        var mrp_dp_p = $("#mrp_dp_p").val();
        var mrp_dp = mrp_dp-((mrp_dp_p/100)*mrp_dp
            );
        $("#Purchase_rate").val(mrp_dp)
    }

    function wrponkeyup() {
        var mrp_dp = $("#mrp_dp").val();
//        var mrate=parseFloat(mrp_dp)*1;
        var wr_p = $("#wr_p").val();
        var mrp_dp = mrp_dp-((wr_p/100)*mrp_dp
            );
        $("#wrate").val(Math.round(mrp_dp))
    }




    function puronkeyup()   {
        var Purchase_rate = $("#Purchase_rate").val();
        var sellrate = $("#sell_rate").val();
        var wrate = parseFloat(Purchase_rate)* 1;
        var srate = parseFloat(Purchase_rate)* 1;
        var irate = parseFloat(sellrate)* 1;

        var wholesaleper = $("#wholesaleper").val();
        var wrate = wrate+((wholesaleper/100)*wrate);
        $("#wholesale_rate").val(Math.round(wrate))
        var sellper = $("#sellper").val();
        var srate = srate+((sellper/100)*srate);
        $("#sell_rate").val(Math.round(srate))

        var insper = $("#insper").val();
        var irate = irate+((insper/100)*irate);
        $("#installment_rate_").val(Math.round(irate))


    }

    function whponkeyup()   {
        var Purchase_rate = $("#Purchase_rate").val();
        var wrate = parseFloat(Purchase_rate)* 1;
        var wholesaleper = $("#wholesaleper").val();
        var wrate = wrate+((wholesaleper/100)*wrate);
        $("#wholesale_rate").val(Math.round(wrate))
    }
    function slponkeyup()   {
        var Purchase_rate = $("#Purchase_rate").val();
        var srate = parseFloat(Purchase_rate)* 1;
        var sellper = $("#sellper").val();
        var srate = srate+((sellper/100)*srate);
        $("#sell_rate").val(Math.round(srate))
    }
    function slronkeyup() {
        var sellrate = $("#sell_rate").val();
        var irate = parseFloat(sellrate)* 1;
        var insper = $("#insper").val();
        var irate = irate+((insper/100)*irate);
        $("#installment_rate_").val(Math.round(irate))
    }
    function insonkeyup()   {
        var sellrate = $("#sell_rate").val();
        var irate = parseFloat(sellrate)* 1;
        var insper = $("#insper").val();
        var irate = irate+((insper/100)*irate);
        $("#installment_rate_").val(Math.round(irate))

        /*var sell_rate = $("#sell_rate").val();
        var irate = (sell_rate)* 1;
        var irate = irate+((sellper/100)*irate);
        $("#installment_rate_").val(irate);*/
    }

</script>


<script type="text/javascript">
    function submit(){
        var Product_id= $("#Product_id").val();

        var pCategory= $("#pCategory").val();
        if(pCategory==""){
            $("#pCategory_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#pCategory_").html("");
        }
        var psize= $("#psize").val();
        if(psize==""){
            $("#psize_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#psize_").html("");
        }
        var pro_Name= $("#pro_Name").val();
        if(pro_Name==""){
            $("#pro_Name_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#pro_Name_").html("");
        }
        var product_check= $("#product_check").val();
        var Re_Order= $("#Re_Order").val();
        if(Re_Order==""){
            $("#Re_Order_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Re_Order_").html("");
        }

        var Purchase_rate= $("#Purchase_rate").val();
        if(Purchase_rate==""){
            $("#Purchase_rate_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Purchase_rate_").html("");
        }
        var wholesale_rate= $("#wholesale_rate").val();
        if(wholesale_rate==""){
            $("#Wholesales_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Wholesales_").html("");
        }
        var sell_rate= $("#sell_rate").val();
        if(sell_rate==""){
            $("#sell_rate_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#sell_rate_").html("");
        }
        var Installment_rate= $("#installment_rate_").val();
        if(Installment_rate==""){
            $("#Installment_rate_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Installment_rate_").html("");
        }
        var product_unit= $("#product_unit").val();
        if(product_unit==""){
            $("#product_unit_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#product_unit_").html("");
        }
        var pro_Name = encodeURIComponent(pro_Name);
        var inputdata = 'Product_id='+Product_id+'&pCategory='+pCategory+'&psize='+psize+'&pro_Name='+pro_Name+'&product_check='+product_check+'&Re_Order='+Re_Order+'&Purchase_rate='+Purchase_rate+'&wholesale_rate='+wholesale_rate+'&sell_rate='+sell_rate+'&Installment_rate='+Installment_rate+'&product_unit='+product_unit;
        var urldata = "<?php echo base_url();?>Administrator/products/insert_product";
        //alert(inputdata);
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
                alert("Save Success");
            }
        });
    }
</script>
<script type="text/javascript">
    function update_pro(){
        var iidd= $("#iidd").val();

        var Product_id= $("#Product_id").val();

        var pCategory= $("#pCategory").val();
        if(pCategory==""){
            $("#pCategory_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#pCategory_").html("");
        }
        var psize= $("#psize").val();
        if(psize==""){
            $("#psize_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#psize_").html("");
        }
        var pro_Name= $("#pro_Name").val();
        if(pro_Name==""){
            $("#pro_Name_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#pro_Name_").html("");
        }
        var product_check= $("#product_check").val();
        var Re_Order= $("#Re_Order").val();
        if(Re_Order==""){
            $("#Re_Order_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Re_Order_").html("");
        }

        var Purchase_rate= $("#Purchase_rate").val();
        if(Purchase_rate==""){
            $("#Purchase_rate_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Purchase_rate_").html("");
        }
        var wholesale_rate= $("#wholesale_rate").val();
        if(wholesale_rate==""){
            $("#Wholesales_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Wholesales_").html("");
        }
        var sell_rate= $("#sell_rate").val();
        if(sell_rate==""){
            $("#sell_rate_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#sell_rate_").html("");
        }
        var Installment_rate= $("#Installment_rate").val();
        if(Installment_rate==""){
            $("#Installment_rate_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#Installment_rate_").html("");
        }
        var product_unit= $("#product_unit").val();
        if(product_unit==""){
            $("#product_unit_").html("Required Filed").css("color","red");
            return false;
        }else{
            $("#product_unit_").html("");
        }
        var pro_Name = encodeURIComponent(pro_Name);
        var inputdata = 'id='+iidd+'&Product_id='+Product_id+'&pCategory='+pCategory+'&psize='+psize+'&pro_Name='+pro_Name+'&product_check='+product_check+'&Re_Order='+Re_Order+'&Purchase_rate='+Purchase_rate+'&wholesale_rate='+wholesale_rate+'&sell_rate='+sell_rate+'&Installment_rate='+Installment_rate+'&product_unit='+product_unit;
        var urldata = "<?php echo base_url();?>Administrator/products/product_update";
        //alert(inputdata);
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
                alert("Update Success");
            }
        });
    }
</script>

<script type="text/javascript">
    function Edit_product(id){
        var edit= id;
        var inputdata = 'edit='+edit;
        var urldata = "<?php echo base_url();?>Administrator/products/product_edit";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
            }
        });
    }
    function deleted(id){
        var deletedd= id;
        var inputdata = 'deleted='+deletedd;
        var urldata = "<?php echo base_url();?>Administrator/products/product_delete";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
                alert("Delete Success");
            }
        });
    }

    function productSearch(e){
        if(e.keyCode === 13){
            var Searchkey = $('#Searchkey').val();
            var inputdata = 'Searchkey='+Searchkey;
            var urldata = "<?php echo base_url();?>Administrator/products/searchproduct/";
            $.ajax({
                type: "POST",
                url: urldata,
                data: inputdata,
                success:function(data){
                    $('#saveResult').html(data);
                }
            });
        }
        return false;
    }
</script>