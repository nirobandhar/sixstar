<div class="content_scroll">

    <div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
            <div id="tabs-1">

                <div class="middle_form">
                    <h2>Add Category/Model <span style="color:green;float:right"><?php $status = $this->session->userdata('cate');if(isset($status))echo $status;$this->session->unset_userdata('cate'); ?></span>
                        <span style="color:red;float:right;font-size:15px;"><?php if(isset($exists))echo $exists;?></span>
                    </h2>
                    <div class="body">
                        <div class="full clearfix">
                            <span>Model Name</span>
                            <div class="left">
                                <input name="catname" type="text" selected="" id="catname" onkeydown="post()" class="required" placeholder="" autofocus="" required/>
                                <span id="msg"></span>
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Company</span>
                            <div class="left">
                                <input name="company" id="company" onkeydown="post()" type="text" />
                            </div>
                        </div>
                        <div class="full clearfix">
                            <span>Description</span>
                            <div class="left">
                                <textarea name="catdescrip" id="catdescrip" style="width:167px" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="full clearfix">
                            <div class="section_right clearfix">
                                <input type="button" onclick="submit()" name="btnSubmit" value="Add"  title="Save" class="button" style="margin-left:41px"/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <span id="saveResult">
    <div class="full clearfix" style="float:right;margin-right:10%">
        <input type="text" id="Searchkey" placeholder="Search Model" required class="txt" onkeypress="modelSearch(event)" style="border: 1px solid #c8d3df;
  border-radius: 2px;
  padding: 7px !important;" />
    </div><br>
    <div class="clearfix moderntabs" style="width:330px;width:90%;max-height:500px;overflow:scroll;">

        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
            <thead>
                <tr class="header">
                    <th style="width:200px">Category/Model Name</th>
                    <th style="width:200px">Description</th>
                    <th style="width:150px">Company</th>
                    <th style="width:90px">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $sql = mysql_query("SELECT * FROM tbl_productcategory order by company asc");
            while($row = mysql_fetch_array($sql)){ ?>
                <tr>
                    <td style="width:200px"><?php echo $row['ProductCategory_Name'] ?></td>
                    <td style="width:200px"><?php echo $row['ProductCategory_Description'] ?></td>
                    <td style="width:150px"><?php echo $row['company'] ?></td>
                    <td style="width:90px">
                        <a href="<?php echo base_url().'Administrator/page/catedit/'.$row['ProductCategory_SlNo'];?>" style="color:green;font-size:20px;float:left; margin-right:20px;" title="Eidt" onclick="return confirm('Are you sure you want to Edit this item?');"><i class="fa fa-pencil"></i></a>
                        <span  onclick="deleted(<?php echo $row['ProductCategory_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px" ><i class="fa fa-trash-o"></i></span>
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
    function submit(){
        var catname= $("#catname").val();
        var catdescrip= $("#catdescrip").val();
        var company= $("#company").val();
        if(catname==""){
            $("#msg").html("Required Filed").css("color","red");
            return false;
        }
        var inputdata = 'catname='+catname+'&catdescrip='+catdescrip+'&company='+company;
        var urldata = "<?php echo base_url();?>Administrator/page/insert_category";
        $.ajax({
            type: "POST",
            url: urldata,
            data: inputdata,
            success:function(data){
                $("#saveResult").html(data);
                alert("Save Success");
                document.getElementById("catname").value='';
            }
        });
    }
</script>
<script type="text/javascript">
    function deleted(id){
        var deletedd= id;
        var inputdata = 'deleted='+deletedd;
        //alert(inputdata);
        var urldata = "<?php echo base_url();?>Administrator/page/catdelete";
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
    function modelSearch(e){
        if(e.keyCode === 13){
            var Searchkey = $('#Searchkey').val();
            var inputdata = 'Searchkey='+Searchkey;
            var urldata = "<?php echo base_url();?>Administrator/products/searchmodel/";
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