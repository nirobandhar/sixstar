<link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />
<div class="content_scroll" style="padding:120px 20px 25px 160px">
	<div class="full clearfix">
        <strong>Select Branch</strong>
        <select name="branchname" id="branchname" style="width:300px" required>
                                            <option value="">Select</option>
                                             <?php $sql = mysql_query("SELECT * FROM tbl_brunch order by Brunch_name asc");
                                            while($row = mysql_fetch_array($sql)){ ?>
                                            <option value="<?php echo $row['brunch_id'] ?>"><?php echo $row['Brunch_name'] ?></option>
                                            <?php } ?>
                                        </select>  
	    <br><br><br>
         <input type="hidden" name="submit" value="branchselect" id="submit">
	    <input type="button" onclick="Submitdata()" value="Stock Report" class="button" style="margin-left:100px; margin-bottom:30px;"/>
    </div>
	<div id="specific_Branch">
    
    </div>
</div>
<script type="text/javascript">                 
function Submitdata(){
			var send = $('#submit').val();
			var tobranchname = $('#branchname').val();
			var errormessage = '';
			if(tobranchname == ''){ errormessage = errormessage+'<span>Please Select your Branch.</span>';
				$('#branchname').addClass('er');
			}
			else{$('#branchname').removeClass('er');}
			if(errormessage==''){
			var errormessage = '<span style="color:#060;">Successfully Added.</span>';
			var dataString = 'send='+send +'&tobranchname='+tobranchname;
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>products/branchwisestock",
					data: dataString,
					success: function(data){
					$("#specific_Branch").html(data);
					}
				});
			}
		}
</script>