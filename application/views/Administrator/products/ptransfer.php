<div  class="dialog contact" >
	<input name="acqty" type="hidden" id="acqty" value="<?php echo $_GET['tqty'];?>" />
    <input name="pcode" type="hidden" id="pcode" value="<?php echo $_GET['pid'];?>" />
    <input name="frombranch" type="hidden" id="frombranch" value="<?php echo $this->session->userdata("BRANCHid");?>" />
    <div class="full clearfix" style="width:320px;height:250px">
    <p id="success"></p> 
        <strong>Transfer Product</strong>
       <br><br>
        <strong>Select Branch</strong>
        <select name="branchname" id="branchname" style="width:300px" required>
                                            <option value="">Select</option>
                                             <?php $sql = mysql_query("SELECT * FROM tbl_brunch Where brunch_id!='".$this->session->userdata("BRANCHid")."' order by Brunch_name asc");
                                            while($row = mysql_fetch_array($sql)){ ?>
                                            <option value="<?php echo $row['brunch_id'] ?>"><?php echo $row['Brunch_name'] ?></option>
                                            <?php } ?>
                                        </select>  
	    <br><br><br>
         <strong>Quantity</strong>
         <input name="trqty" type="text" id="trqty" class="required" style="width:300px"  />
	    <br><br><br>
         <input type="hidden" name="submit" value="add_category" id="submit">
	    <input type="button" onclick="Submitdata()" value="Transfer" class="button" style="width:50px;float:right"/>
    </div>
    <h3 id="success"></h3>
</div>
<script type="text/javascript">                 
function Submitdata(){
				var send = $('#submit').val();
				var tobranchname = $('#branchname').val();
				var frombranchname = $('#frombranch').val();
				var actualqty = $('#acqty').val();
				var prodid = $('#pcode').val();
				var prodqty = $('#trqty').val();
				var errormessage = '';
				if(tobranchname == ''){ errormessage = errormessage+'<span>Please Select your Branch.</span>';
					$('#branchname').addClass('er');
				}
				else{$('#branchname').removeClass('er');}
				if(prodqty == ''){ errormessage = errormessage+'<span>Please Enter Qty.</span>';
					$('#trqty').addClass('er');
				}
				else{$('#trqty').removeClass('er');}
				
				if(parseFloat(actualqty) < parseFloat(prodqty)){
					alert("Stock quantity is smaller than transfer quantity");
					return false;
					}
				
				if(errormessage==''){
				var errormessage = '<span style="color:#060;">Successfully Added.</span>';
				var dataString = 'send='+send +'&tobranchname='+tobranchname+'&frombranchname='+frombranchname+'&prodid='+prodid+'&prodqty='+prodqty;
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>Administrator/products/transfersuccess",
						data: dataString,
						success: function(data){
						$("#success").html(errormessage);
							setTimeout( function() {$.fancybox.close(); },500);
						}
					});
				}
			}
</script>