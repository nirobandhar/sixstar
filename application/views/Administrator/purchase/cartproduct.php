<div class="clearfix moderntabs" style="width:330px;width:100%;max-height:150px;min-height:150px;overflow:auto;">
                        
                        <?php  if ($cart = $this->cart->contents()){ ?>
                        <table class="zebra" cellspacing="0" cellpadding="0" border="0" id="" style="text-align:left;width:100%;border-collapse:collapse;">
                            <tbody>
                            <?php
                                //echo form_open('shopping/update_cart');
                                $grand_total = 0;
                                $i=0;
                                foreach ($cart as $item){
                                    $i++;
                                    echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                    echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                    echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                    echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                    echo form_hidden('cart[' . $item['id'] . '][purchaserate]', $item['purchaserate']);
                                    echo form_hidden('cart[' . $item['id'] . '][model]', $item['model']);
									echo form_hidden('cart[' . $item['id'] . '][gqty]', $item['gqty']);
                                    echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                    echo form_hidden('cart[' . $item['id'] . '][image]', $item['image']); 
                            ?> 
                                <tr>
                                    <td style="width:4%"><?php echo $i; ?></td>
                                    <td style="width:13%"><?php echo $item['name']; ?></td>
                                    <td style="width:10%"><?php echo $item['company_name']; ?></td>
                                    <td style="width:12%"><?php echo $item['model']; ?></td>
                                   <!-- <td style="width:10%"><?php /*echo $item['size']; */?></td>-->

                                    <td style="width:10%"><?php echo $item['qty']; ?><?php if(!empty($item['packagename'])){ ?><input type="hidden" name="sqty[]" id="sqty<?php echo $i;?>" value="<?php echo $item['qty']; ?>">
                                            <input type="hidden" name="sNaMe[]" id="sNaMe<?php echo $i;?>" value="<?php echo $item['name']; ?>">
                                        <?php } ?>
                                        <input type="hidden" name="allqty[]" id="allqty<?php echo $i;?>" value="<?php echo $item['qty']; ?>">
                                        <input type="hidden" name="allname[]" id="allname<?php echo $i;?>" value="<?php echo $item['name']; ?>">
                                    </td>

                                    <td style="width:10%"><?php echo $item['price']; ?></td>
                                    <td style="width:10%"><?php echo $item['image']; ?></td>
                                    <td style="width:10%"><?php $grand_total = $grand_total + $item['subtotal']; ?> <?php echo number_format($item['subtotal'], 2) ?>
                                        <input type="hidden" id="PriCe_<?php echo $item['rowid'];?>" value="<?php echo $item['subtotal']; ?>"></td>

                                    <td style="width:10%">
                                        <span style="cursor:pointer" onclick="cartRemove(a='<?php echo $item['rowid'];?>')">
                                        <input type="hidden" id="rowid<?php echo $item['rowid'];?>" value="<?php echo $item['rowid'];?>">
                                        <img src='<?php echo base_url();?>images/cart_cross.jpg' width='20px' height='15px'></span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>    
                        </table> 
                        <?php } ?>
                    
                </div>
                <table width="100%">
                    <tr>
                        <td width="40%" >
                            <fieldset style="height:65px">
                                <legend>Notes</legend>
                                <textarea name="PurchNotes" id="PurchNotes" rows="3" style="width:100%"></textarea>
                            </fieldset>
                        </td>
                        <td width="60%">
                            <fieldset style="height:65px">
                                <legend>Total</legend>
                                <h2>
                                    <span>Total</span>
                                    <div style="float:right">
                                        <span style="color:red"><?php if(isset($grand_total)) {echo $grand_total;}else{echo 0;} ?></span>
                                        <span>tk</span>
                                    </div>
                                </h2>
                            </fieldset>
                        </td>

                    </tr>
                </table> 