<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Point of Sale</a>
            </li>
            <li>
                Transaction #: <?=$refno;?>
            </li>
        </ul>
    </div>
    <?php
    $disabled="";
    if($refno==""){
        $disabled="pointer-events: none; cursor: default;";
        $cancel="style='display:none;'";
        $new="";
        $focus="readonly";
        $hold="style='display:none;'";
        $holdlist="style='display:none;'";
    }else{
        $cancel="";
        $new="style='display:none;'";        
        $focus="";
		echo "<script>";
			echo "document.getElementById('searchme').focus();";
		echo "</script>";
        $hold="";
        $holdlist="";
    }
    if($tender){
        $disabled="pointer-events: none; cursor: default;";
        $cancel="style='display:none;'";
        $new="";
    }
    if(count($category)>0){
        $new="";
    }else{
        $new="style='display:none;'";
    }    
    ?>
    <div class="row">
        <div class="box col-md-7">
            <div class="box-inner"> 
                <div class="box-header well" data-original-title="" style="height:40px;">
                    <h2><i class="glyphicon glyphicon-th-list"></i> Item List</h2>

                    <div style="float:right;">
                        <a href="#" class="btn btn-round btn-default btn-sm" data-toggle="modal" data-target="#HoldList" <?=$holdlist;?>>Hold List (<?=count($temp);?>)</a>
                        <a href="<?=base_url('new_transaction');?>" class="btn btn-round btn-primary btn-sm" <?=$new;?>><i
                                class="glyphicon glyphicon-plus"></i> New (F1)</a>                        
                        <a href="<?=base_url('cancel_transaction/'.$refno);?>" class="btn btn-danger btn-round btn-sm" <?=$cancel;?> onclick="return confirm('Do you wish to cancel this transaction?'); return false;"><i
                                class="glyphicon glyphicon-remove"></i> Cancel (F12)</a>
                                
                    </div>
                </div>
                <div class="box-content">
                     <!-- <ul class="nav nav-tabs" id="myTab">
                        <?php
                           // foreach($category as $cat){
                        ?>
                        <li><a href="#<?=$cat['category'];?>"><?=$cat['category'];?></a></li>                       
                        <?php
                            //}
                            ?>
                    </ul> -->
                    <?=form_open(base_url('search_item'),array('class' => 'searchitem'));?>
                                    <input type="text" name="searchme" class="form-control" required placeholder="Search Item" id="searchme" <?=$focus;?>>
                                <?=form_close();?>
                                <br>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Refresh (Ctrl + R) | Search (F2)</a>
                        </li>
                        <?php
                       //$w=2;
                        //     foreach($type as $cat){
                        // ?>
                        <!-- //     <li><a href="<?=base_url('change_category/'.$cat['category']);?>"><?=$cat['category'];?> (<?=$w;?>)</a></li>                        -->
                         <?php
                        //     $w++;
                        //     }
                        //     ?>
                    </ul>
                    <!-- <div id="myTabContent" class="tab-content"> -->   
                        <div style="height:500px; overflow-y: auto;">                     
                        <table class="table table-striped table-bordered">
                        <?php            
                                   $w=1; 
                            foreach($category as $cat){
                            
                        ?>                       
                        <!-- <div class="tab-pane" id="<?=$cat['category'];?>">                                                         -->
                            
                                <tbody style="overflow:scroll;">
                                <?php
                                    $x=1;                                    
                                    $items=$this->Sales_model->getItemByCategory($this->session->type);
                                    foreach($items as $item){
                                        if($item['quantity']>0){
                                            $q="";
                                        }else{
                                            $q="pointer-events: none; cursor: default;";
                                        }
                                ?>                                
                                <tr>                                    
                                     
                                    <td style="text-align:left; vertical-align:top;" width="100" >
                                       <a href="<?=base_url('add_item/'.$item['code']);?>" style="text-decoration:none; color:black; <?=$disabled;?> <?=$q;?>">
                                        <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($item['img']);?>" alt="Item" style=" width:30vw; max-width:100%;" name="img" tabindex="<?=$w;?>">
                                    </td>
                                        <td>
                                        <b style="font-size:1.2em;"><?=$item['description'];?></b><br>P <b><?=number_format($item['sellingprice'],2);?></b><br>Qty: <b><?=$item['quantity'];?></b>                                                                        
                                        </a>
                                    </td>                                                                        
                                </tr>    

                                <?php
                                if($x >= 4){echo "</tr>"; $x=1;}
                                $x++;                                
                                    }
                                    $w++;
                                    
                                ?>                                        
                            </tbody>
                        <!-- </div>   -->
                        <?php                        
                            }
                            ?>  
                            </table>                
                    </div>                    
                </div>
            </div>
        </div>
        <?php
        $ordered = $this->Sales_model->getAllPunchedItems($refno);
    if(count($ordered)>0){
        $proceed="";
        $discount="";
    }else{
        $proceed="style='display:none;'";
        $discount="style='display:none;'";
        $hold="style='display:none;'";
    }

    $disc=0;
    foreach($ordered as $row){
        $disc += $row['discount'];
    }
    if($disc>0){
        $viewdisc="";
        $discount="style='display:none;'";
    }else{
        $viewdisc="style='display:none;'";
    }
    if($tender){
        $print="";
        $del="style='display:none;'";
        $disable="style='pointer-events: none; cursor: default;'";
        $proceed="style='display:none;'";
        $viewdisc="style='display:none;'";
        $discount="style='display:none;'";
        $amtpaid=$tender['amount'];
    }else{
        $print="style='display:none;'";
        $del="";
        $disable="";
        $amtpaid=0;
    }
        ?>
        <div class="row">
            <div class="box col-md-5">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="" style="height:40px;">
                        <h2><i class="glyphicon glyphicon-shopping-cart"></i> Items</h2>

                        <div style="float:right;">
                            <a href="<?=base_url('hold_transaction/'.$refno);?>" class="btn btn-round btn-default btn-sm holdtransaction" <?=$hold;?>><i
                                    class="glyphicon glyphicon-stop"></i> Hold (H)</a>
                            <a href="#" class="btn btn-round btn-primary btn-sm proceedPayment" <?=$proceed;?> data-toggle="modal" data-target="#ProceedPayment" data-id="<?=$refno;?>"><i
                                    class="glyphicon glyphicon-share"></i> Pay (Ctrl + D)</a>
                            <a href="<?=base_url('print_receipt/'.$refno);?>" class="btn btn-round btn-success btn-sm" <?=$print;?> target="_blank"><i
                                    class="glyphicon glyphicon-print"></i> Print Receipt (F3)</a>
                                    <a href="<?=base_url('print_order_slip/'.$refno);?>" class="btn btn-round btn-primary btn-sm" <?=$print;?> target="_blank"><i
                                    class="glyphicon glyphicon-print"></i> Print Slip (F4)</a>
                            <a href="#" class="btn btn-round btn-warning btn-sm addDiscount" data-toggle="modal" data-target="#AddDiscount" data-id="<?=$refno;?>" <?=$discount;?>><i
                                    class="glyphicon glyphicon-plus"></i> Discount (Ctrl + F)</a>
                            <a href="<?=base_url('remove_all_discount/'.$refno);?>" class="btn btn-round btn-info btn-sm removealldisc" <?=$viewdisc;?> onclick="return confirm('Do you wish to remove all dicount?'); return false;"><i
                                    class="glyphicon glyphicon-minus"></i> Remove All Discount (Ctrl + Z)</a>
                        </div>
                    </div>
                    <div class="box-content">
                        <table class="table table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">Description</th>
                                    <th style="text-align:center;">Qty</th>
                                    <th style="text-align:center;">Price</th>
                                    <th style="text-align:center;">Discount</th>
                                    <th style="text-align:center;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalamount=0;
                                $totaldiscount=0;
                                foreach($ordered as $ord){
                                    echo "<tr>";
                                        echo "<td style='text-align:left;'><a href='#' class='btn btn-danger btn-sm removeOrder' data-toggle='modal' data-target='#RemoveOrder' data-id='$ord[id]' $del>x</a> $ord[description]</td>";
                                        echo "<td style='text-align:center;'><a href='#' $disable class='changeQty' data-toggle='modal' data-target='#ChangeQty' data-id='$ord[id]_$ord[quantity]'>$ord[quantity]</a></td>";
                                        echo "<td style='text-align:right;'>".number_format($ord['sellingprice'],2)."</td>";
                                        echo "<td style='text-align:right;'><a href='#' $disable class='addSingleDiscount' data-toggle='modal' data-target='#AddSingleDiscount' data-id='$ord[id]_$ord[discount]'>".number_format($ord['discount'],2)."</a></td>";
                                        $total=$ord['sellingprice']*$ord['quantity'];
                                        echo "<td style='text-align:right;'>".number_format($total,2)."</td>";
                                    echo "</tr>";
                                        $totalamount += $total;
                                        $totaldiscount += $ord['discount'];
                                }
                                ?>
                            </tbody>
                        </table>
                    
                        <table class="table" border="0" cellspacing="0" cellpadding="0" style="border-collapse;collapse; font-size:16px;">
                            <tr>
                                <td style="text-align:right;"><b>Sub Total:</b></td>
                                <td style="text-align:right;" width="20%"><b><?=number_format($totalamount,2);?></b></td>
                            </tr>
                            <tr>
                                <td style="text-align:right;"><b>Discount:</b></td>
                                <td style="text-align:right;" width="20%"><b><?=number_format($totaldiscount,2);?></b></td>
                            </tr>
                            <tr>
                                <td style="text-align:right;"><b>Total Amount Due:</b></td>
                                <td style="text-align:right;" width="20%"><b><?=number_format($totalamount-$totaldiscount,2);?></b></td>
                            </tr>
                            <tr>
                                <td style="text-align:right;"><b>Tendered:</b></td>
                                <td style="text-align:right;" width="20%"><b><?=number_format($amtpaid,2);?></b></td>
                            </tr>
                            <?php
                            $change=$amtpaid-($totalamount-$totaldiscount);
                            if($change < 0){
                                $change=0;
                            }
                            ?>
                            <tr>
                                <td style="text-align:right;"><b>Change:</b></td>
                                <td style="text-align:right;" width="20%"><b><?=number_format($change,2);?></b></td>
                            </tr>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
        <!--/span-->

</div><!--/row-->