<select name="account_id" id="account_id" style="width:163px;" required onchange="OnselectName()">
    <option value=""></option>
    <?php $sql = mysql_query("SELECT * FROM tbl_customer order by Customer_Code asc ");
    while($row = mysql_fetch_array($sql)){ ?>
    <option value="<?php echo $row['Customer_SlNo'] ?>"><?php echo $row['Customer_Name'] ?></option>
    <?php } ?>                                     
</select>
<span style="color:red;font-size:15px;"><?php if(isset($exists))echo $exists;?></span>