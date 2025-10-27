<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            <a href="<?=base_url('room_charges');?>">FBS Request</a>
        </li>
        <li>
            FBS Request Details (<?=$reserve_id;?> | <?=str_replace('%20',' ',$fullname);?>)
        </li>
    </ul>
</div>
<?php
if($this->session->flashdata('success')){
    echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
}
if($this->session->flashdata('failed')){
    echo "<div class='alert alert-danger'>".$this->session->flashdata('failed')."</div>";
}
$stat="";
foreach($charges as $item){
    $stat=$item['status'];
}
if($stat=="pending"){
    $paid="style='display:none;'";
    $print="";
}
else if($stat=="confirmed"){
    $paid="";
    $print="style='display:none;'";
}
?>
<div class="row">    
    <div class="box col-md-12">                            
        <div class="box-inner">            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-shopping-cart"></i> Requested Item List (<?=$refno;?>)</h2>
                <div style="float:right">
                    <a href="#" <?=$print;?> class="btn btn-round btn-success btn-sm addChargesFBS" title="Add New Charges" data-toggle="modal" data-target="#AddChargesFBS" data-id="<?=$refno;?>_<?=$reserve_id;?>_<?=str_replace('%20',' ',$fullname);?>"><i class="glyphicon glyphicon-plus"></i> Add Item</a>
                    <a href="<?=base_url('proceed_request/'.$refno."/".$reserve_id."/".$fullname);?>"  <?=$print;?> class="btn btn-primary btn-round btn-sm" onclick="return confirm('Do you wish to proceed request?'); return false;"><i class="glyphicon glyphicon-share"></i> Proceed</a>
                    <a href="<?=base_url('cancel_room_charges/'.$refno."/".$reserve_id."/".$fullname);?>"  <?=$print;?> class="btn btn-danger btn-round btn-sm" onclick="return confirm('Do you wish to cancel this request?'); return false;"><i class="glyphicon glyphicon-trash"></i> Cancel Request</a>
                    <a href="<?=base_url('print_receipt/'.$refno);?>" target="_blank"  <?=$paid;?> class="btn btn-primary btn-round btn-sm"><i class="glyphicon glyphicon-print"></i> Print Receipt</a>
                    <a href="<?=base_url('print_order_slip/'.$refno);?>" target="_blank"  <?=$paid;?> class="btn btn-success btn-round btn-sm"><i class="glyphicon glyphicon-print"></i> Print Slip</a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th style="text-align:center;">No.</th>
                        <th style="text-align:center;">Item Code</th>         
                        <th style="text-align:center;">Description</th>
                        <th style="text-align:center;">Qty</th>                        
                        <th style="text-align:center;">Price</th>
                        <th style="text-align:center;">Total</th>
                        <th style="text-align:center;" width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        $totalamount=0;
                        foreach($charges as $item){  
                            $total=$item['quantity']*$item['sellingprice'];                          
                            $totalamount += $total;
                            if($item['status']=="pending"){
                                $view="";
                            }else{
                                $view="style='display:none;'";
                            }
                            echo "<tr>";
                                echo "<td style='text-align:center;'>$x.</td>";
                                echo "<td style='text-align:center;'>$item[code]</td>";                           
                                echo "<td style='text-align:left;'>$item[description]</td>";                                
                                echo "<td style='text-align:center;'>$item[quantity]</td>";
                                echo "<td style='text-align:right;'>".number_format($item['sellingprice'],2)."</td>";
                                echo "<td style='text-align:right;'>".number_format($total,2)."</td>";                                
                                ?>
                                <td>
                                   <a href="#" <?=$view;?> data-toggle="modal" data-target="#EditRoomChargeQty" data-id="<?=$item['id'];?>_<?=$item['code'];?>_<?=$item['quantity'];?>_<?=$item['description'];?>_<?=$refno;?>_<?=$reserve_id;?>_<?=str_replace('%20',' ',$fullname);?>" class="btn btn-warning btn-sm editRoomChargeQty"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                   <a href="<?=base_url('remove_room_charge_item/'.$item['id']."/".$refno."/".$reserve_id."/".$fullname);?>" <?=$view;?> class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to remove this item?'); return false;"><i class="glyphicon glyphicon-trash"></i> Remove</a>
                                </td>
                                <?php
                            echo "</tr>";
                            $x++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" style="text-align:right;"><b>Total</b></th>
                            <th style="text-align:right;"><b><?=number_format($totalamount,2);?></b></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    </table>
            </div>
        </div>
    </div>
</div>