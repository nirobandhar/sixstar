<select name="psize" id="psize" style="width:163px;" required>
    <option value="">Select</option>
     <?php $sql = mysql_query("SELECT * FROM tbl_produsize order by Productsize_Name asc");
    while($row = mysql_fetch_array($sql)){ ?>
    <option value="<?php echo $row['Productsize_SlNo'] ?>"><?php echo $row['Productsize_Name'] ?></option>
    <?php } ?>
</select>  
<span style="color:red;font-size:15px;"><?php if(isset($exists))echo $exists;?></span>