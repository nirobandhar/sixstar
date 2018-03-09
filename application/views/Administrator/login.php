<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html id="ctl00_html" xmlns="http://www.w3.org/1999/xhtml">



<head>

    <title>

       Six Star Electronics & Furniture| Login Form <?php echo $title; ?>

    </title>
    <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.png">
    <link href="//fonts.googleapis.com/css?family=Roboto|Roboto+Slab:400,700" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url();?>js/jquery-2.1.4.min.js" type="text/javascript"></script>



    <link href="<?php echo base_url();?>css/login.css?v=7" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url();?>js/cookieschecker.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>js/jquery.cycle2.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>





<body>

<marquee style="z-index:1;font-family:Cursive;font-size:40pt;color:green;height:150; direction="left"> Welcome to Six Star Electronics & Furniture </marquee>

    <div id="ctl00_divContainer" class="container">

        <div class="login_pane clearfix">

            <div class="sign_in">

                <img src="<?php echo base_url()?>images/favicon.png" alt="Six Star Electronics & Furniture" align="center">

                <div  class="form-block" >

                    <h2>Sign In</h2>

                    <?php if(isset($st)){?>

                    <div class="error">

                        <span><?php echo $st; ?></span>

                    </div><?php } ?>

                    <form action="<?php echo base_url();?>Administrator/login/procedure" method="post">

                        <div class="row">

                            <input name="txtUserName" type="text" class="inputbox" placeholder="Username" autofocus="" required/>

                        </div>

                        <div class="row password">

                            <input name="txtPassword" type="password" class="inputbox" placeholder="Password" required/>

                        </div>

                        <div class="action">

                            <input type="submit" value="Log In" class="login" />

                            <!-- <div class="forgot">

                                <a href="<?php echo base_url();?>Administrator/login/forgotpassword"  class="forgot">Forgot your password?</a>

                            </div> -->

                        </div>

                    </form>



                </div>

            </div>

            <div class="news">

                <h1>Express Retail</h1>

                <div class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-slides="> div" data-cycle-timeout="4000" data-cycle-pager=".example-pager" data-cycle-caption="#alt-caption" data-cycle-caption-template="{{alt}}">

                    <!-- empty element for pager links -->



                    <div class="cycle-caption">

                        <a href="" target="_blank">

                            <img alt="" src="<?php echo base_url();?>images/Login/offline.png" /></a>

                        <strong>Offline Support</strong>

                        <p>Continue to work even when you have no connection.</p>

                    </div>



                    <div class="cycle-caption">

                        <a href="" target="_blank">

                            <img alt="" src="<?php echo base_url();?>images/Login/eod-mail.png" /></a>

                        <strong>End of Day Report</strong>

                        <p>Get your daily sales report delivered to your INBOX at certain hour.</p>

                    </div>



                    <div class="cycle-caption">

                        <a href="" target="_blank">

                            <img alt="" src="<?php echo base_url();?>images/Login/stock_take.png" /></a>

                        <strong>Stock Take</strong>

                        <p>Create adjustment every time you perform stock opname at your outlet.</p>

                    </div>



                </div>

                <div class="example-pager"></div>

            </div>

        </div>

        <div class="copyright">

            <span>powered by :</span>

            <a title="Link-Up Technology" target="_blank" href="http://www.linktechbd.com"></a>

        </div>



    </div>



</body>

</html>