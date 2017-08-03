

<!DOCTYPE html>

<html>

<head>

<title> </title>

<meta charset='utf-8'>

    <link href="<?php echo base_url()?>css/prints.css" rel="stylesheet" />

</head>

<style type="text/css" media="print">

.hide{display:none}



</style>

<script type="text/javascript">

function printpage() {

document.getElementById('printButton').style.visibility="hidden";

window.print();

document.getElementById('printButton').style.visibility="visible";  

}

</script>

<body style="background:none;">

<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">



      <table width="800px" >

        <tr>

          <td style="text-align: center;">

            <img src="<?php echo base_url();?>images/address.jpg" alt="Logo" style="width:80%;margin-bottom:0px">

          </td>

        </tr>

        <tr>

          <td style="float:right">

            <table width="100%"  border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="250px" style="text-align:right;"><strong></td>

              </tr>

          </table>

          </td>

        </tr>

        <tr>

            <td> 

                <table class="border" cellspacing="0" cellpadding="0" width="100%">

                    <thead>

                        <tr class="header">

                            <th style="width:7%">Photo</th>

                            <th>ID</th>

                            <th>Employee Name</th>

                            <th>Designation</th>

                            <th>Depertment</th>

                            <th>Present Address</th>

                            <th>Contact no</th>

                        </tr>

                    </thead>

                    <tbody>

                   <?php $sql = mysql_query("SELECT tbl_employee.*,tbl_department.*,tbl_designation.* FROM tbl_employee left join tbl_department on tbl_department.Department_SlNo=tbl_employee.Department_ID left join tbl_designation on tbl_designation.Designation_SlNo=tbl_employee.Designation_ID order by tbl_employee.Employee_Name asc ");

            while($row = mysql_fetch_array($sql)){ ?>

                        <tr>

                            <td style="width:7%"><img src="<?php echo base_url().'uploads/employeePhoto_thum/'.$row['Employee_Pic_thum'];?>" alt="" style="width:45px;height:45px;"></td>

                            <td><?php echo $row['Employee_ID'] ?></td>

                            <td><?php echo $row['Employee_Name'] ?></td>

                            <td><?php echo $row['Designation_Name'] ?></td>

                            <td><?php echo $row['Department_Name'] ?></td>

                            <td><?php echo $row['Employee_PrasentAddress'] ?></td>

                            <td><?php echo $row['Employee_ContactNo'] ?></td>

                        </tr>  

                    <?php } ?>                

                    </tbody>

                </table>

            </td>

        </tr>

       

    </table></td>

  </tr>

  

</table>



<div class="provied">

  <span style="float:left;font-size:11px;">Software Provied By Link-Up Technology</span>

</div>

</body>

</html>



