

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

          <td>

            <img src="<?php echo base_url();?>images/bell-bangladesh.png" alt="Logo" style="margin-bottom:-30px">

            <div class="headline">

            <div style="text-align:center" >

            <?php $branches = $this->session->userdata('BRANCHid'); 

    $sql2 = mysql_query("SELECT * FROM tbl_brunch WHERE brunch_id= '$branches'");

    $row2 = mysql_fetch_array($sql2); ?>

             <strong style="font-size:16px"><?php echo $row2['Brunch_name'];?></strong><br>

            <?php echo $row2['Brunch_address'];?><br>

           <i>Supplier List</i>

              </div>

          </div>

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

                <table class="border" cellspacing="0" cellpadding="0" >

                    <thead>

                        <tr class="header">

                            <th style="width:12%">ID</th>

                            <th style="width:25%">Supplier Name</th>

                            <th style="width:25%">Address</th>

                            <th style="width:25%">Contact No</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php $sql = mysql_query("SELECT * FROM tbl_supplier order by Supplier_Code asc");

                    while($row = mysql_fetch_array($sql)){ ?>

                        <tr>

                            <td style="width:12%"><?php echo $row['Supplier_Code'] ?></td>

                            <td style="width:25%"><?php echo $row['Supplier_Name'] ?></td>

                            <td style="width:25%"><?php echo $row['Supplier_Address'] ?></td>

                            <td style="width:25%"><?php echo $row['Supplier_Mobile'] ?></td>

                            

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



