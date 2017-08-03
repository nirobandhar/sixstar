<div  class="dialog contact" >
    <div class="full clearfix" style="width:320px;height:250px">
        <strong>Add Size</strong>
        <input name="psize2" type="text" id="psize2" style="width:300px;"  class="txt" placeholder="Add Size"  />
        <span id="msc"></span><br><br>
        <strong>Description</strong>
        <textarea name="catdescrip" id="catdescrip" style="width:300px" rows="2"></textarea>
        <span id="msc"></span>
	    <br><br><br>
	    <input type="button" onclick="Submitdata()" value="Add" class="button" style="width:50px;float:right"/>
    </div>
    <h3 id="success"></h3>
</div> 

<script type="text/javascript">
	function Submitdata(){
		var psize = $('#psize2').val();
		//alert(psize);
		if(psize ==""){
			$('#msc').html('Required Field').css("color","green");
			return false;
		}
		var catdescrip = $('#catdescrip').val();
		var succes = "";
		
		if(succes == ""){
			var psize = encodeURIComponent(psize);
		    var catdescrip = encodeURIComponent(catdescrip);
			var inputdata = 'psize='+psize+'&catdescrip='+catdescrip;
			//alert(inputdata);
			var urldata = "<?php echo base_url();?>Administrator/products/insert_fanceybox_size/";
			$.ajax({
				type: "POST",
				url: urldata,
				data: inputdata,
				success:function(data){
					$('#success').html('Save Success').css("color","green");
					$('#Search_Results_size').html(data);
					//alert("ok");
					setTimeout(function() {$.fancybox.close()}, 2000);
				}
			});
		}
	}
</script>