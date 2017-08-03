<div class="content_scroll">
  <div id="page_menu" class="page_menu">
      <ul>
          <li class="active"><a href="">Barcode Generate</a></li>
      </ul>
  </div>
  <div class="tabContent">
    <div id="tabs" class="clearfix moderntabs">
      <div id="tabs-1">
        <div class="middle_form">
          <div class="body">
          <form method="post" action="<?php echo base_url()?>Administrator/products/barcode?ID=<?php echo $_GET['ID'];?>">
            <div class="full clearfix">
              
                <span></span>
                <div class="left">                            
                    Number Of Qty <input name="qty" type="text" id="CatName" class="required" placeholder="Enter Number Of Qty" required/>
                </div>
              
            </div>
            <div class="full clearfix">
                  <span></span>
                  <input type="submit" value="submit" class="button" />
              </div>
            </form>      
          </div>
        </div>
      </div>
    </div>

  </div>

</div>