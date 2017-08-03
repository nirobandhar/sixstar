

            <div class="content_scroll">

                <div id="page_menu" class="page_menu">

                    <h1 class="users"><i></i><span>User Update Form</span> </h1>

                </div>

                <div class="tabContent">



                    <div id="tabs" class="clearfix">

                        <ul class="tabs">

                            <li><a href="#tabs-1"><span class="general">General</span></a></li>

                        </ul>

                            <div id="tabs-1">

                                <div class="clearfix">

                                     

                                    <div class="row_section clearfix">

                                        <div class="section_info">

                                            <strong>Login Credentials</strong>

                                            <i>Credentials used to log-in to the POS System</i>

                                        </div>

                                        <div class="section_content">

                                            <div class="section_full clearfix">

                                                <div class="section_full">

                                                    <strong>Username</strong>

                                                    <input name="username" type="text" id="username" class="txt" value="<?php echo $selected['User_Name'] ?>" required/>

                                                    <input name="id" type="hidden" id="id" value="<?php echo $selected['User_SlNo'] ?>" />

                                                </div>

                                                

                                            </div>

                                            <div class="section_full clearfix">

                                                <div class="section_left">

                                                    <strong>Password</strong>

                                                    <input name="Password" type="password" id="assword" class="txt" required/>

                                                </div>

                                                <div class="section_right">

                                                    <strong>Re-Password</strong>

                                                    <input name="rePassword" onblur="password()" type="password" id="rePassword" class="txt" required/>

                                                </div>

                                                

                                            </div>

                                            <span id="mes"></span>

                                        </div>

                                    </div>

                                    <div class="row_section clearfix">

                                        <div class="section_info">

                                            <strong>Personnel Information</strong>

                                            <i>Basic information regarding the personnel's identity</i>

                                        </div>

                                        <div class="section_content">

                                            <div class="section_full clearfix">

                                                <div class="section_full">

                                                    <strong>Full Name</strong>

                                                    <input name="txtFirstName" type="text" id="txtFirstName" class="txt" value="<?php echo $selected['FullName'] ?>"  />

                                                </div>

                                                

                                            </div>

                                            <div class="section_full clearfix">

                                                <div class="section_left">

                                                    <strong>Select Branch</strong>

                                                    <select name="Brunch" id="Brunch" class="txt" required>

                                                        <option value="<?php echo $selected['userBrunch_id'] ?>"><?php echo $selected['Brunch_name'] ?></option>

                                                        <?php $sql = mysql_query("SELECT * FROM tbl_brunch order by Brunch_name asc ");

                                                        while($row = mysql_fetch_array($sql)){ ?>

                                                        <option value="<?php echo $row['brunch_id'] ?>"><?php echo $row['Brunch_name'] ?></option>

                                                        <?php } ?>

                                                    </select>

                                                </div>

                                                

                                            </div>

                                        </div>

                                    </div>

                                    <div class="row_section clearfix">

                                        <div class="section_info">

                                            <strong>Type</strong>

                                        </div>

                                        <div class="section_content">

                                            <div class="section_left clearfix">

                                                <select name="type" id="type" class="txt" required>

                                                    <option value="<?php if($selected['UserType']=='a'){echo "a"; }else{echo "u"; } ?>"><?php if($selected['UserType']=='a'){echo "Admin"; }else{echo "User"; } ?></option>

                                                    <option value="a">Admin</option>

                                                    <option value="u">User</option>

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                     <div class="row_section clearfix">

                                        <div class="section_info">

                                        </div>

                                        <div class="section_content">

                                            <div class="section_right clearfix">

                                               <a  class="button btn-info"  href="<?php echo base_url();?>user_management">Cancel</a>

                                                <input type="button" onclick="Updatesubmit()" name="btnSubmit" value="Update"  title="Update" class="button" />

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

<script type="text/javascript">

    function password(){

        var pass = $("#assword").val();

        var passre = $("#rePassword").val();

        if(pass != passre){

            $('#mes').html('Your password and confirm password do not match').css('color','red');

            return false;

        }else{

            $('#mes').html('Your password and confirm password matched').css('color','green');

            setTimeout( function() {$.fancybox.close(); },1200);

        }

    }

</script>

<script type="text/javascript">

    function Updatesubmit(){

        var username= $("#username").val();

        if(username==""){

            $("#username").css("border-color","red");

            return false;

        }else{

            $("#username").css("border-color","green");

        }

        var assword= $("#assword").val();

        if(assword==""){

            $("#assword").css("border-color","red");

            return false;

        }else{

            $("#assword").css("border-color","green");

        }

        var rePassword= $("#rePassword").val();

        if(rePassword==""){

            $("#rePassword").css("border-color","red");

            return false;

        }else{

            $("#rePassword").css("border-color","green");

        }

        if(assword != rePassword){

            $('#mes').html('Your password and confirm password do not match').css('color','red');

            return false;

        }else{

            $('#mes').html('Your password and confirm password matched').css('color','green');

            setTimeout( function() {$.fancybox.close(); },1200);

        }



        var txtFirstName= $("#txtFirstName").val();

        var Brunch= $("#Brunch").val();

        if(Brunch==""){

            $("#Brunch").css("border-color","red");

            return false;

        }else{

            $("#Brunch").css("border-color","green");

        }

        var type= $("#type").val();

        if(type==""){

            $("#type").css("border-color","red");

            return false;

        }else{

            $("#type").css("border-color","green");

        }

        var id= $("#id").val();

        

        var inputdata = 'id='+id+'&username='+username+'&rePassword='+rePassword+'&txtFirstName='+txtFirstName+'&Brunch='+Brunch+'&type='+type;

        var urldata = "<?php echo base_url();?>user_management/userupdate";

        $.ajax({

            type: "POST",

            url: urldata,

            data: inputdata,

            success:function(data){

                //$("#saveResult").html(data);

                alert("Update Success");

            }

        });

    }

</script>

