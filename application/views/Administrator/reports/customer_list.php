

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

                            <th style="width:12%">ID</th>

                            <th style="width:25%">Customer Name</th>

                            <th style="width:25%">Address</th>

                            <th style="width:25%">Contact No</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php $sql = mysql_query("SELECT * FROM tbl_customer order by Customer_Code asc");

                    while($row = mysql_fetch_array($sql)){ ?>

                        <tr>

                            <td style="width:12%"><?php echo $row['Customer_Code'] ?></td>

                            <td style="width:25%"><?php echo $row['Customer_Name'] ?></td>

                            <td style="width:25%"><?php echo $row['Customer_Address'] ?></td>

                            <td style="width:25%"><?php echo $row['Customer_Mobile'] ?></td>

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



