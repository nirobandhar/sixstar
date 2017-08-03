

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

            <td colspan="2"><hr><hr></td>

            <td colspan="2"><br></td>

        </tr>

        <tr>

            <td colspan="2" style="background:#ddd;" align="center"><h2 >Expense Report</h2></td>

        </tr>

        <tr>

            <td>

            <!-- Page Body -->

          

              <table class="border" cellspacing="0" cellpadding="0" width="100%">

                <tr >

                  <th>SL.No</th>

                  <th>Tr. ID</th>

                  <th>Date</th>

                  <th>Tr. Type</th>

                  <th>Account Head</th>

                  <th>Description</th>

                  <th>In Amount</th>                      

                  <th>Out Amount</th> 

                </tr>

               <?php $i=""; $totalIN ='0';$totalOUT = '0';

                foreach($record as $row){$i++;

                    $totalIN = $totalIN+$row['In_Amount'];

                    $totalOUT = $totalOUT+$row['Out_Amount'];

                  ?>

                <tr>

                    <td><?php echo $i ?></td>

                    <td><?php echo $row['Tr_Id'] ?></td>

                    <td><?php echo $row['Tr_date'] ?></td>

                    <td><?php echo $row['Tr_Type'] ?></td>

                    <td><?php echo $row['Acc_Name'] ?></td>

                    <td><?php echo $row['Tr_Description'] ?></td>

                    <td style="text-align: right;"><?php if($row['In_Amount']=="" ||$row['In_Amount']=="0" ){echo '0.00';}else{ echo number_format($row['In_Amount'], 2);} ?></td>

                    <td style="text-align: right;"><?php if($row['Out_Amount']=="" ||$row['Out_Amount']=="0" ){echo '0.00';}else{ echo number_format($row['Out_Amount'], 2);} ?></td>

                </tr>

                <?php } ?>

                <tr>

                  <td colspan="6" align="right"><strong>Total</strong></td>

                  <td style="text-align: right;"><strong><?php if(isset($totalIN)) echo number_format($totalIN,2) ?></strong></td>

                  <td style="text-align: right;"><strong><?php if(isset($totalOUT)) echo number_format($totalOUT,2) ?></strong></td>

                </tr>

              </table>

            </td>

            <!-- Page Body end -->

       

    </table></td>

  </tr>

  

</table>



<div class="provied">

  

  <span style="float:left;font-size:11px;">

<i>"THANK YOU FOR YOUR BUSINESS"</i><br>

  Software Provied By Link-Up Technology</span>

</div>



</body>

</html>



