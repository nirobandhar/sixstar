<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>

       Six Star Electronics & Furniture| <?php echo $title; ?>

    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.png">

    <link href="//fonts.googleapis.com/css?family=Roboto|Roboto+Slab:400,700" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/core.css?v=108" rel="stylesheet" />

    <link href="<?php echo base_url();?>css/chosen.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>css/hover_menu.css" rel="stylesheet" />

    <link href="<?php echo base_url();?>css/light/core.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/jquery-ui-app.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/jquery-ui-1.11.3.custom.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/home_dashboard.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/light/info.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/light/detail.css" rel="stylesheet" type="text/css" />

    <link rel='stylesheet' href='<?php echo base_url();?>css/jquery-ui-app.css' />

    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/form.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/light/Form.css" rel="Stylesheet" type="text/css" />

    <link href="<?php echo base_url();?>css/datepiker/bootstrap-datepicker3.css" rel="Stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fancybox/jquery.fancybox.css" media="screen" />

    <!-- Datepicker start  -->

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>$(function(){

            $( "#ashiqeCalender input" ).datepicker({

                dateFormat: 'yy-mm-dd',

              changeMonth: true,

              changeYear: true

            });

          });

    </script>

    <!-- Datepicker End -->

    <script src="<?php echo base_url();?>js/jquery-2.1.4.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/ajaxupload.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/UI-tabs.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/dialog.js" type="text/javascript"></script>

     <script src="<?php echo base_url();?>js/chosen.jquery.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/chosen.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url();?>fancybox/jquery.fancybox.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

         $(".fancybox").fancybox();

        });



    </script> 

    <script src="<?php echo base_url();?>js/jquery-ui-1.11.3.custom.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        jQuery(document).ready(function($) {  

            $(window).load(function(){

                $('#preloader').fadeOut('slow',function(){$(this).remove();});

            });



        });



    </script>

    <style type="text/css" media="screen">

    .js div#preloader { position: fixed; left: 0; top: 0; z-index: 999; width: 100%; height: 100%; overflow: visible; background: #333 url('../images/loading.gif') no-repeat center center; }    

    </style>

     <link rel="stylesheet" href="<?php echo base_url();?>css/chosen.css">

  <!-- // fancey box -->

  <style type="text/css" media="all">

    /* fix rtl for demo */

    .chosen-rtl .chosen-drop { left: -9000px; }

  </style>

</head>

<div class="js">

<body>

<div id="preloader"></div>

    <div class="container">

        <header>

            <div class="account">

                <i></i>

                <span>Six Star Electronics & Furniture</span>

            </div>

            <div class="status_bar">

                

                <section>

                    <a class="help"  title="Settings"> <i></i> <span>Settings</span> </a>                    

                    <div class="dropdown">

                    <?php $branchids = $this->session->userdata('BRANCHid'); 

                    $sqls = mysql_query("SELECT * FROM tbl_menuaccess WHERE branch_id= '$branchids'");

                    $rows = mysql_fetch_array($sqls); ?>

                        <ul><?php if($rows['Add_Category'] == 1){?>

                            <li><a href='<?php echo base_url(); ?>page/add_category'><span>Add Category</span></a></li>

                            <?php }if($rows['Add_Product'] == 1){?>

                            <li><a href='<?php echo base_url(); ?>products'><span>Add Product</span></a></li>

                            <?php }if($rows['User_Profile'] == 1){?>

                            <li><a href='<?php echo base_url(); ?>user_management'><span>User Profile</span></a></li>

                            <?php }if($rows['Add_Unit'] == 1){?>

                            <li><a href='<?php echo base_url(); ?>page/unit'><span>Add Unit</span></a></li> 

                            <?php }if($rows['Add_District'] == 1){?>

                            <li><a href='<?php echo base_url(); ?>page/district'><span>Add District</span></a></li> 

                            <?php }if($rows['Add_Country'] == 1){?>

                            <li><a href='<?php echo base_url(); ?>page/add_country'><span>Add Country</span></a></li>

                            <?php } ?>

                        </ul>

                    </div>

                </section>

                <section>

                    <a class="member">

                        <i></i>

                        <span id=""><?php echo $this->session->userdata("User_Name"); ?></span>

                        <i></i>

                    </a>

                    <div class="dropdown profile">

                        <ul>

                            <li><a href="<?php echo base_url() ?>user_management">User Management</a></li>

                            <li><a href="<?php echo base_url() ?>login/logout">Log out</a></li>

                            <li>



                            </li>

                            

                        </ul>

                    </div>

                </section>

            </div>

            <h1 class="dashboard"><i></i><span>Dashboard</span></h1>

            <div class="page_action">

                <ul class="section">

                    <li>

                        <a class="clock" >

                        <i></i><span><?php  date_default_timezone_set('Asia/Dhaka'); echo date("l, d F Y"); ?><span id="timer"></span></span> </a>

                    </li>

                    <li>

                        <a class="accounting hidden-phone">Branch : <?php echo $this->session->userdata('Brunch_name'); ?></a>

                    </li>

                </ul>



                <!-- <a class="accounting hidden-phone" title="Accounting" href="#" target="_blank">Accounting</a>

                <a href="#" class="referfriend hidden-phone " title="ReferAFriend">Refer A Friend</a> -->

            </div>

        </header>



        <?php include('menu.php'); ?>



        <?php if(isset($content))echo $content;?>

    </div>

    <script type="text/javascript">

        setInterval(function() {

            var currentTime = new Date ( );    

            var currentHours = currentTime.getHours ( );   

            var currentMinutes = currentTime.getMinutes ( );   

            var currentSeconds = currentTime.getSeconds ( );

            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;   

            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;    

            var timeOfDay = ( currentHours < 12 ) ? "AM" : "PM";    

            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;    

            currentHours = ( currentHours == 0 ) ? 12 : currentHours;    

            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

            document.getElementById("timer").innerHTML = currentTimeString;

        }, 1000);

    </script>



    

    <script src="<?php echo base_url();?>js/jquery.mCustomScrollbar.concat.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/jquery.floatThead.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/core.js?v=108" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/jquery.validate.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/highcharts.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/LineHome.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/dialog.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/dashboard.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/cookieschecker.js" type="text/javascript"></script>

    



   

    



    <script src="<?php echo base_url();?>js/autoNumeric-1.8.1.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/autoNumericLoader.js?v=B" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/chosen.jquery.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/prism.js" type="text/javascript" charset="utf-8"></script>

    <script src="<?php echo base_url();?>js/bootstrap-datepicker.min.jds" type="text/javascript"></script>

    <script type="text/javascript">

        var config = {

          '.chosen-select'           : {},

          '.chosen-select-deselect'  : {allow_single_deselect:true},

          '.chosen-select-no-single' : {disable_search_threshold:10},

          '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},

          '.chosen-select-width'     : {width:"95%"}

        }

        for (var selector in config) {

          $(selector).chosen(config[selector]);

        }

        /*$('#ashiqeCalender input').datepicker({

            format: "dd/mm/yyyy",

            todayBtn: "linked",

            clearBtn: true,

            multidateSeparator: "/",

            calendarWeeks: true,

            autoclose: true

        });*/

    </script>

</body>

</div>

</html>