<span style="color:red;float:right;font-size:15px;"><?php if(isset($exists))echo $exists;?></span>



<table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">

            <tbody>

                <?php $sql = mysql_query("SELECT * FROM tbl_unit order by Unit_Name asc");

                while($row = mysql_fetch_array($sql)){ ?>

                <tr>

                    <td style="width:10px"></td>

                    <td style="width:200px"><?php echo $row['Unit_Name'] ?></td>

                    <td style="width:90px">

                        <a href="<?php echo base_url().'page/unitedit/'.$row['Unit_SlNo'];?>" style="color:green;font-size:20px;float:left; margin-right:20px;" title="Eidt" onclick="return confirm('Are you sure you want to edit this item?');"><i class="fa fa-pencil"></i></a>

                        <span  style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px" onclick="deleted(<?php echo $row['Unit_SlNo'] ?>)"><i class="fa fa-trash-o"></i></span>

                    </td>

                </tr>

            <?php } ?> 

            </tbody>    

        </table> 