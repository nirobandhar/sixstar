<div class="content_scroll">

    <div id="page_menu" class="page_menu">

        <ul>

            <li class="active"><a href="<?php echo base_url();?>Administrator/employee">Add Employee</a></li>

            <li><span style="color:green;"><?php $status = $this->session->userdata('employee');if(isset($status))echo $status;$this->session->unset_userdata('employee'); ?></span></li>

        </ul>

    </div>

    <div class="tabContent">

        <div id="tabs" class="clearfix moderntabs">

            <div id="tabs-1">

            <div id="Employee">

                <form  method="post" enctype="multipart/form-data">

                    <div class="middle_form">

                        <h2>Job Information</h2>

                        <div class="body">

                            <div class="full clearfix">

                                <span>Employee Id</span>

                                <div class="left">                                    

                                    <input name="Emp_id" type="text" id="Empr_id" class="required" disabled="" value="<?php   $serial ="E1000"; $sql = mysql_query("SELECT * FROM tbl_employee");

                                    while ($d = mysql_fetch_array($sql)){

                                        if($d['Employee_ID']!=null){$serial = $d['Employee_ID'];}

                                    } $serial = explode("E",$serial);

                                        $serial=$serial['1']; $autoserial= $serial+1;echo "E".$autoserial;?>" />

                                        <input name="Employeer_id" type="hidden" id="Employeer_id" class="required" value="<?php   $serial ="E1000"; $sql = mysql_query("SELECT * FROM tbl_employee");

                                    while ($d = mysql_fetch_array($sql)){

                                        if($d['Employee_ID']!=null){$serial = $d['Employee_ID'];}

                                    } $serial = explode("E",$serial);

                                        $serial=$serial['1']; $autoserial= $serial+1;echo "E".$autoserial;?>" />

                                </div>

                            </div>                                

                            <div class="full clearfix">

                                <span>Name</span>

                                <div class="left">                                      

                                    <input name="em_name" type="text" id="em_name" class="required" placeholder="" autofocus="" />

                                </div>

                            </div>

                            <div class="full clearfix">

                                <span>Designation</span>

                                <div class="left">                                      

                                  <div id="Search_ResultsDesignation">

                                        <select name="em_Designation" id="em_Designation" style="width:163px;" required>

                                            <option value="">Select</option>

                                            <?php $sql = mysql_query("SELECT * FROM tbl_designation order by Designation_Name asc ");

                                            while($row = mysql_fetch_array($sql)){ ?>

                                            <option value="<?php echo $row['Designation_SlNo'] ?>"><?php echo $row['Designation_Name'] ?></option>

                                            <?php } ?>

                                        </select>  

                                    </div>               

                                </div>

                                <div class="rightElement">

                                    <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/employee/fancybox_designation">

                                        <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                

                                    </a> 

                                </div>

                            </div>

                            <div class="full clearfix">

                                <span>Depertment</span>

                                <div class="left">                                      

                                    <div id="Search_Resultsss">

                                        <select name="em_Depertment" id="em_Depertment" style="width:163px;" required>

                                            <option value="">Select</option>

                                            <?php $sql = mysql_query("SELECT * FROM tbl_department order by Department_Name asc ");

                                            while($row = mysql_fetch_array($sql)){ ?>

                                            <option value="<?php echo $row['Department_SlNo'] ?>"><?php echo $row['Department_Name'] ?></option>

                                            <?php } ?>

                                        </select>  

                                    </div>             

                                </div>

                                <div class="rightElement">

                                    <a class="btn-add fancybox fancybox.ajax" href="<?php echo base_url();?>Administrator/employee/fancybox_depertment">

                                        <input type="button" name="country_button" value="+"  class="button" style="padding:7px 10px;font-size:16px;"/>                                

                                    </a> 

                                </div>

                            </div>

                            

                            <div class="full clearfix">

                                <span>Joint Date</span>

                                <div class="left" id="ashiqeCalender">

                                <input name="em_Joint_date" type="text" value="" id="em_Joint_date" class="required"  />

                                </div>

                                

                            </div>                                                                                                                                                  

                        </div>

                        <h2 >Personal Information</h2>

                        <div class="body">

                            <div class="full clearfix">

                                <span>Father's Name</span>

                                <div class="left">                                    

                                    <input name="em_father" type="text" id="em_father" class="required"  autofocus="" />

                                </div>

                            </div>                                

                            <div class="full clearfix">

                                <span>Mother's Name</span>

                                <div class="left">                                      

                                    <input name="mother_name" type="text" id="mother_name" class="required" placeholder="" autofocus="" />

                                </div>

                            </div>

                            <div class="full clearfix">

                                <span>Gender</span>

                                <div class="left">                                      

                                   <select name="Gender" id="Gender" style="width:173px;">

                                        <option value="">Select</option>

                                        <option value="Male">Male</option>

                                        <option value="Female">Female</option>

                                    </select>          

                                </div>

                            </div>

                            <div class="full clearfix">

                                <span>Date of Birth</span>

                                <div class="left" id="ashiqeCalender">  

                                <input name="em_dob" type="text" value="" id="em_dob" class="required"  />

                                </div>

                            </div>

                            <div class="full clearfix">

                                <span>Marital Status</span>

                                <div class="left">

                                    <select name="Marital" id="Marital" style="width:173px;">

                                        <option value="">Select</option>

                                        <option value="married">Married</option>

                                        <option value="unmarried">Unmarried</option>

                                    </select>                 

                                </div>

                            </div>  
                            <div class="full clearfix">

                                <span>Religion</span>

                                <div class="left">  

                                <input name="religion" type="text" value="" id="religion"/>

                                </div>

                            </div>                                                                                                                                                
							<div class="full clearfix">

                                <span>Nationality</span>

                                <div class="left">  

                                <input name="national" type="text" value="" id="national" />

                                </div>

                            </div>
                            <div class="full clearfix">

                                <span>Nid</span>

                                <div class="left">  

                                <input name="nid" type="text" value="" id="nid"/>

                                </div>

                            </div>
                            <div class="full clearfix">

                                <span>Blood Group</span>

                                <div class="left">  

                                <input name="bp" type="text" value="" id="bp" />

                                </div>

                            </div>
                            <div class="full clearfix">

                                <span>Height</span>

                                <div class="left">  

                                <input name="height" type="text" value="" id="height" class="required"  />

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="right_form">

                        <h2 id="personal-info">Contact Information</h2>

                        <div class="body">

                            

                            <div class="full clearfix">

                                <span>Present Address</span>
								<textarea name="em_Present_address"  id="em_Present_address" cols="50" rows="4"></textarea>

                            </div>

                            <div class="full clearfix">

                                <span>Permanent Address</span>
								<textarea name="em_Permanent_address"  id="em_Permanent_address" cols="50" rows="4"></textarea>
                            </div> 

                            <div class="full clearfix">

                                <span>Contact No</span>

                                <input name="em_contact" type="text" id="em_contact" class="txt" />

                            </div>

                            <div class="full clearfix">

                                <span>Email</span>

                                <input name="ec_email" type="email" id="ec_email" class="txt" />

                            </div> 

                            <div class="full clearfix">

                                <span></span>

                                <img id="hideid" src="<?php echo base_url();?>images/No-Image-.jpg" alt="" style="width:100px">

                                <img id="preview" src="#" style="width:100px;" hidden>

                                

                            </div>   

                            <div class="full clearfix">

                                <span>Employee Image</span>

                                <input name="em_photo" type="file" id="em_photo" onchange="readURL(this)" class="txt"/>

                            </div>                                                                                                                                                         
							 <div class="full clearfix">

                                <span>Notes</span>
								<textarea name="notes"  id="notes" cols="50" rows="4"></textarea>

                            </div>
                        </div>

                    </div>

                    <div class="section_content">

                        <div class="section_right clearfix">

                           <a  class="button btn-info"  href="<?php echo base_url();?>Administrator">Cancel</a>

                            <input type="button" onclick="Employee_submit()" name="btnSubmit" value="Save"  title="Save" class="button" />

                        </div>

    

                    </div>

                </form>

            </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                document.getElementById('preview').src=e.target.result;

            }

            reader.readAsDataURL(input.files[0]);

            $("#hideid").hide();

            $("#preview").show();

        }

    }

</script>

<script type="text/javascript">

    function Employee_submit(){

        var Employeer_id = $("#Employeer_id").val();

        var em_name = $("#em_name").val();

        if(em_name==""){

            $("#em_name").css('border-color','red');

            return false;

        }

        var em_Designation = $("#em_Designation").val();

        if(em_Designation==""){

            $("#em_Designation").css('border-color','red');

            return false;

        }

        var em_Depertment = $("#em_Depertment").val();

        if(em_Depertment==""){

            $("#em_Depertment").css('border-color','red');

            return false;

        }

        var em_Joint_date = $("#em_Joint_date").val();

        if(em_Joint_date==""){

            $("#em_Joint_date").css('border-color','red');

            return false;

        }

        var Gender = $("#Gender").val();

        if(Gender==""){

            $("#Gender").css('border-color','red');

            return false;

        }

        var em_dob = $("#em_dob").val();

        if(em_dob==""){

            $("#em_dob").css('border-color','red');

            return false;

        }

        var Marital = $("#Marital").val();

        if(Marital==""){

            $("#Marital").css('border-color','red');

            return false;

        }

        var em_contact = $("#em_contact").val();

        if(em_contact==""){

            $("#em_contact").css('border-color','red');

            return false;

        }

        var em_Present_address = $("#em_Present_address").val();

        

        var em_father = $("#em_father").val();

        var mother_name = $("#mother_name").val();

        

        var em_Permanent_address = $("#em_Permanent_address").val();

        

        

        

        var ec_email = $("#ec_email").val();

        



        var fd = new FormData();

          fd.append('em_photo', $('#em_photo')[0].files[0]);

          fd.append('Employeer_id', $('#Employeer_id').val());

          fd.append('em_name', $('#em_name').val());

          fd.append('em_Designation', $('#em_Designation').val());

          fd.append('em_Depertment', $('#em_Depertment').val());

          fd.append('em_Joint_date', $('#em_Joint_date').val());

          fd.append('em_father', $('#em_father').val());

          fd.append('mother_name', $('#mother_name').val());

          fd.append('em_Present_address', $('#em_Present_address').val());

          fd.append('em_Permanent_address', $('#em_Permanent_address').val());

          fd.append('em_dob', $('#em_dob').val());

          fd.append('em_contact', $('#em_contact').val());

          fd.append('Gender', $('#Gender').val());

          fd.append('ec_email', $('#ec_email').val());

          fd.append('Marital', $('#Marital').val());
		  fd.append('religion', $('#religion').val());
		  fd.append('national', $('#national').val());
		  fd.append('nid', $('#nid').val());
		  fd.append('bp', $('#bp').val());
		  fd.append('height', $('#height').val());
		  fd.append('notes', $('#notes').val());



          var x = $.ajax({

            url: "<?php echo base_url();?>Administrator/employee/employee_insert",

            type: "POST",

            data: fd,

            enctype: 'multipart/form-data',

            processData: false, 

            contentType: false,

            success:function(data){         

            $("#Employee").html(data);

            alert("Save Success");

            //setTimeout( function() {$.fancybox.close(); },1200);

            } 

          });

    }

</script>