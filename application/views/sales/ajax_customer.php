<table>
    <tr>
        <td style="width:100px">Name</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" class="inputclass" disabled="" value="<?php echo $customer['Customer_Name'] ?>">
                <input type="hidden" id="CusName" class="inputclass"  value="<?php echo $customer['Customer_Name'] ?>">
            </div>
        </td>
    </tr>
    <tr>
        <td>Address</td>
        <td style="width:200px">
            <div class="full clearfix">
                <textarea name="" id="" rows="2" disabled="" class="inputclass"><?php echo $customer['Customer_Address'] ?></textarea>
                <input type="hidden" id="CusAddress" value="<?php echo $customer['Customer_Address'] ?>">
            </div>
        </td>
    </tr>
    <tr>
        <td>Contact No</td>
        <td style="width:200px">
            <div class="full clearfix">
                <input type="text" disabled="" class="inputclass" value="<?php echo $customer['Customer_Mobile'] ?>">
                <input type="hidden" id="CusMobile" class="inputclass" value="<?php echo $customer['Customer_Mobile'] ?>">
            </div>
        </td>
    </tr>
    
</table>