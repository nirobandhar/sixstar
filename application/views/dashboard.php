<div class="content_scroll" style="padding:101px 20px 25px 155px">

    <table width="70%" align="center">

    	<tr><td colspan="3">

        <h1 style="text-align:center;padding-top:30px;font-size:50px;color:#ccc;"><img src="<?php echo base_url()?>images/favicon.png" alt=" Six Star Electronics & Furniture "></h1> 

    		

    	</td></tr>

    	<tr>

    		<td align="center">

            <?php $branchids = $this->session->userdata('BRANCHid'); 

            $sqlx = mysql_query("SELECT * FROM tbl_menuaccess WHERE branch_id= '$branchids'");

            $rowx = mysql_fetch_array($sqlx); ?>

            <?php if($rowx['Product_Sales'] == 1){?>

            <a href="<?php echo base_url()?>sales">

            <?php } else{?><a href=""><?php } ?>



            <img style="width:100px;height:100px" src="<?php echo base_url()?>images/dashboard/sell.png" alt=""><br><h3>Sales</h3></a></td>

    		<td align="center">

            <?php if($rowx['Add_Product'] == 1){?>

            <a href="<?php echo base_url()?>products">

            <?php } else{?><a href=""><?php } ?>

            <img style="width:100px;height:100px" src="<?php echo base_url()?>images/dashboard/products.png" alt=""><br><h3>Add Products</h3></a></td>

    		<td align="center">

            <?php $selltype = $this->session->userdata('userBrunch'); if($selltype!='2'){ ?>

            <a href="<?php echo base_url()?>wholesales"><?php } else{?><a href="">

            <?php } ?>

            <img style="width:100px;height:100px" src="<?php echo base_url()?>images/dashboard/whole-sell.png" alt=""><br><h3>Whole Sales</h3></a></td>

    	</tr>

    	<tr>

    		<td align="center"><a href="<?php echo base_url()?>"><img style="width:100px;height:100px" src="<?php echo base_url()?>images/dashboard/reports.png" alt=""><br><h3>Reports</h3></a></td>

    		<td align="center">

            <?php if($rowx['Current_Stock'] == 1){?>

            <a href="<?php echo base_url()?>products/current_stock">

            <?php } else{?><a href=""><?php } ?>

            <img style="width:100px;height:100px" src="<?php echo base_url()?>images/dashboard/stock.png" alt=""><br><h3>Current Stock</h3></a></td>

    		

            <td align="center"><a href="<?php echo base_url()?>login/logout"><img style="width:100px;height:100px" src="<?php echo base_url()?>images/dashboard/logout.png" alt=""><br><h3>Log Out</h3></a></td>

    	</tr>

    </table>

        <!-- 

        http://localhost/bellbangladeshsoft/login/logout

        <h1 style="text-align:center;padding-top:100px;font-size:50px;color:#ccc;">Welcome to Dashboard<br>Six Star Electronics & Furnituresoft </h1> -->

</div>