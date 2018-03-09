<di

    <div class="tabContent">
        <div id="tabs" class="clearfix moderntabs">
            <div id="tabs-1">

            </div>
        </div>
    </div>
    <div class="full clearfix" style="float:right;margin-right:10%">
        <input type="text" id="Searchkey" placeholder="Search Products" required class="txt" onkeypress="modelSearch(event)" style="border: 1px solid #c8d3df;
  border-radius: 2px;
  padding: 7px !important;" />
    </div><br>
    <div class="row_section clearfix" style="margin-top:20px;padding-bottom:0px;">
        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="width:90%;border-collapse:collapse;">
            <thead>
            <tr class="header">
                <th style="width:200px">Category/Model Name</th>
                <th style="width:200px">Description</th>
                <th style="width:150px">Company</th>
                <th style="width:90px">Action</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="clearfix moderntabs" style="width:330px;width:90%;">

        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
            <tbody>
            <?php $sql = mysql_query("SELECT * FROM tbl_productcategory WHERE ProductCategory_Name LIKE '%$Searchkey%' or company LIKE '%$Searchkey%' order by company asc");
            while($row = mysql_fetch_array($sql)){ ?>
                <tr>
                    <td style="width:200px"><?php echo $row['ProductCategory_Name'] ?></td>
                    <td style="width:200px"><?php echo $row['ProductCategory_Description'] ?></td>
                    <td style="width:150px"><?php echo $row['company'] ?></td>
                    <td style="width:90px">
                        <a href="<?php echo base_url().'Administrator/page/catedit/'.$row['ProductCategory_SlNo'];?>" style="color:green;font-size:20px;float:left; margin-right:20px;" title="Eidt" onclick="return confirm('Are you sure you want to Edit this item?');"><i class="fa fa-pencil"></i></a>
                        <span  onclick="deleted(<?php echo $row['ProductCategory_SlNo'] ?>)" style="cursor:pointer;color:red;font-size:20px;float:left;padding-left:10px" ><i class="fa fa-trash-o"></i></span>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>