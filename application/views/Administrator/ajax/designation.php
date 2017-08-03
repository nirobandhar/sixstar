<span style="color:red;font-size:15px;"><?php if(isset($exists))echo $exists;?></span>



<div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">

        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:30%;border-collapse:collapse;">

            <thead>

                <tr class="header">

                    <th  style="width:10px"></th>

                    <th  style="width:200px">Designation Name</th>                                                               

                </tr>

            </thead>

        </table>                    

    </div> 

    <div class="clearfix moderntabs" style="width:330px;width:30%;max-height:400px;overflow:auto;">

        

        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">

            <tbody>

                <?php $sql = mysql_query("SELECT * FROM tbl_designation order by Designation_Name asc ");

                while($row = mysql_fetch_array($sql)){ ?>

                <tr>

                    <td style="width:10px"></td>

                    <td style="width:200px"><?php echo $row['Designation_Name'] ?></td>

                    <td style="width:90px">

                        <a href="<?php echo base_url().'Administrator/employee/designationedit/'.$row['Designation_SlNo'];?>" style="color:green;font-size:20px;float:left; margin-right:20px;" title="Eidt" onclick="return confirm('Are you sure you want to edit this item?');"><i class="fa fa-pencil"></i></a>

                        <span style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px;" onclick="deleted(<?php echo $row['Designation_SlNo'];?>)"><i class="fa fa-trash-o"></i></span>

                    </td>

                </tr>

            <?php } ?> 

            </tbody>    

        </table> 

    </div>