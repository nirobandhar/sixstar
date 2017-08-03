<div class="content_scroll">
    <div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
            <div id="tabs-1">
               
                    <div class="middle_form">
                        <h2 id="">Add Product Size</h2>
                        <div class="body">
                            <div class="full clearfix">
                                <span>Size Name</span>
                                <div class="left">                                      
                                    <input name="psize" type="text" id="psize" class="required" value="<?php echo htmlentities($selected['Productsize_Name']); ?>" autofocus="" required/>
                                    <input name="id" id="id" type="hidden" value="<?php echo $selected['Productsize_SlNo'] ?>"/>
                                </div>
                            </div>
                            <div class="full clearfix">
                                <span>Description</span>
                                <div class="left">                                      
                                    <textarea name="catdescrip" id="catdescrip" style="width:167px" rows="2"><?php echo $selected['Productsize_Description']; ?></textarea>
                                </div>
                            </div>
                            <div class="full clearfix">
                                <div class="section_right clearfix">
                                <a href="<?php echo base_url();?>Administrator/page/add_size" class="button">Cancel</a>
                                    <input type="button" onclick="submit()" name="btnSubmit" value="Update"  title="Save" class="button" />
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    <span id="saveResult"> 
    <div class="clearfix moderntabs" style="width:330px;width:50%;">
        <span id="saveResult">
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
            <thead>
                <tr class="header">
                    <th style="width:200px">Product Name</th>
                    <th>Description</th>                                                               
                    <th style="width:90px">Action</th>                                                               
                </tr>
            </thead>
            <tbody>
            <?php $sql = mysql_query("SELECT * FROM tbl_produsize order by Productsize_Name asc");
            while($row = mysql_fetch_array($sql)){ ?>
                <tr>
                    <td style="width:200px"><?php echo $row['Productsize_Name'] ?></td>
                    <td><?php echo $row['Productsize_Description'] ?></td>
                    <td style="width:90px">
                        <a href="<?php echo base_url().'Administrator/page/sizedit/'.$row['Productsize_SlNo'];?>" style="color:green;font-size:20px;float:left" title="Eidt" onclick="return confirm('Are you sure you want to Edit this item?');"><i class="fa fa-pencil"></i></a>
                        <span  onclick="deleted(<?php echo $row['Productsize_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px" ><i class="fa fa-trash-o"></i></span>
                    </td>
                </tr>
            <?php } ?> 
            </tbody>    
        </table> 
    </div> 
    </span>
</div> 

<script type="text/javascript">
    function submit(){
        var psize= $("#psize").val();
        var catdescrip= $("#catdescrip").val();
        var id= $("#id").val();
        if(psize==""){
            $("#msg").html("Required Filed").css("color","red");
            return false;
        }
		var psize = encodeURIComponent(psize);
		var catdescrip = encodeURIComponent(catdescrip);
        var inputdata = 'psize='+psize+'&catdescrip='+catdescrip+'&id='+id;
        var urldata = "<?php echo base_url();?>Administrator/page/sizeupdate";
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
    function deleted(id){
        var deletedd= id;
        var inputdata = 'deleted='+deletedd;
        //alert(inputdata);
        var urldata = "<?php echo base_url();?>Administrator/page/sizedelete";
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
</script>