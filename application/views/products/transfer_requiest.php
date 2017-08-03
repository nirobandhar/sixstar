       
        
<div class="content_scroll">
        <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:90%;border-collapse:collapse;">
                <thead>
                    <tr class="header">
                        <th style="width:10%">ID</th>
                        <th style="width:24%">Category</th>
                        <th style="width:24%">Product Name</th>                                                               
                        <th style="width:10%">Quantity</th> 
                        <th style="width:12%">Transfer from</th>  
                        <th style="width:18%">Action</th>                                                             
                    </tr>
                </thead>
            </table>                    
        </div> 
        <div class="clearfix moderntabs" id="getlist" style="width:330px;width:90%;max-height:500px;overflow:auto;">
           
            <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                <tbody>
                <?php  $sql = mysql_query("SELECT tbl_product.*, tbl_productcategory.*,tbl_transfer.* FROM tbl_product left join tbl_productcategory on tbl_productcategory.ProductCategory_SlNo= tbl_product.ProductCategory_ID Left Join tbl_transfer ON tbl_transfer.pro_codes=tbl_product.Product_SlNo where tbl_transfer.tobranch_id='".$this->brunch."' AND tbl_transfer.status='0' order by tbl_transfer.pro_codes desc");
                while($row = mysql_fetch_array($sql)){ ?>
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
        </div> 
</div>
<script>
function approveord(proid,frbranch,trnsid,qtn){
	var send = "approvetr";
	var dataString = 'proid='+proid+'&branchn='+frbranch+'&trnsid='+trnsid+'&qtn='+qtn+'&send='+send;
	$.ajax({
		type: "POST",
		url: "<?php echo base_url()?>products/transferapproved",
		data: dataString,
		success: function(data){
			$("#getlist").html(data);
			alert("Approved Complete");
		}
	 });
	}
function rejectord(trnsid){
	var send = "rejectord";
	var dataString = 'trnsid='+trnsid+'&send='+send;
	$.ajax({
		type: "POST",
		url: "<?php echo base_url()?>products/transferreject",
		data: dataString,
		success: function(data){
			$("#getlist").html(data);
			alert("Rejected this item");
		}
	 });
	}
</script>
