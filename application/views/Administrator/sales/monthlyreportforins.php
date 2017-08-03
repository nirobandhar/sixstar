
<div class="content_scroll">
<h2>Installment Report</h2>
    <div style="width:100%; float:left;">
        <div style="border:1px solid #ddd">
            <table width="100%"> 
                <tr>
                    <td width="150"><strong>Select Month</strong></td>
                    <td id="ashiqeCalender" width="220"><input name="Purchase_date" type="text" id="Sales_enddate" value="<?php echo date("Y-m-d") ?>" class="inputclass" style="width:200px"/></td>
                    <td>
                        <div class="side-by-side clearfix">
                            <div>
                                <input type="button" class="buttonAshiqe" onclick="searchforreturn()" value="Show Report">
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
<div id="SalesInvoice"></div>
<script type="text/javascript">
  function searchforreturn(){
    var Purchase_date = $("#Sales_enddate").val();
    var inputData = 'Purchase_date='+Purchase_date;
    var urldata = "<?php echo base_url();?>Administrator/sales/installmentrecord";
    $.ajax({
        type: "POST",
        url: urldata,
        data: inputData,
        success:function(data){
            $("#SalesInvoice").html(data);
        }
    });
  }
</script>