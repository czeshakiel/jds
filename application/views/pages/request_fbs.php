<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li> 
         <li>
            <a href="<?=base_url('manage_reservation/room');?>">Reservation</a>
        </li>        
        <li>
          <a href="<?=base_url('reservation_details/'.$refno);?>">Reservation Details</a>
        </li>
        <li>
          Request FBS
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
if($reserve['room_type']==""){
    $room_type=$reserve['description'];
}else{
    $room_type=$reserve['room_type'];
}
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-book"></i> Reservation Details</h2>                
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered responsive">
                    <tr>
                        <td width="30%">
                            <b>Customer Name: </b><?=$reserve['res_fullname'];?>
                        </td>
                        <td>
                            <b>Date Checked In: </b><?=date('m/d/Y',strtotime($reserve['res_date_arrive']));?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Address: </b><?=$reserve['res_address'];?>
                        </td>
                        <td>
                            <b>Date Check Out: </b><?=date('m/d/Y',strtotime($reserve['res_date_depart']));?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Contact No.: </b><?=$reserve['res_contactno'];?>
                        </td>
                        <td>
                            <b>No. of Night(s): </b><?=$reserve['res_no_nights'];?>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <b>Email: </b><?=$reserve['res_email'];?>
                        </td>
                        <td>                            
                            <b>No. of Guest(s): </b><?=$reserve['res_no_guest_adult'];?> Adult / <?=$reserve['res_no_guest_child'];?> Child / <?=$reserve['res_no_guest_senior'];?> Senior/PWD
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Nationality: </b><?=$reserve['res_nationality'];?>                            
                        </td>
                        <td>
                            <b>Room: </b><?=$room_type;?> [<?=$reserve['room_color'];?>]<br>
                        </td>                        
                    </tr>                    
                </table>
            </div>
        </div>
        <br>
        <?php
        $final=0;
        foreach($charges as $row){
            if($row['trans_id']==""){
                $final++;
            }
        }        
        ?>
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-shopping-cart"></i> Requested Items</h2>  
                <div style="float:right;">
                    <a href="#" class="btn btn-round btn-primary btn-sm addFBSCharges" title="Add New Charges" data-toggle="modal" data-target="#AddFBSCharges" data-id="<?=$refno;?>"><i class="glyphicon glyphicon-plus"></i> Add Item</a>
                    <?php
                    if($final > 0){
                    ?>
                    <a href="<?=base_url('finalize_order/'.$refno);?>" class="btn btn-round btn-warning btn-sm" onclick="return confirm('Do you wish to finalize order?'); return false;"><i class="glyphicon glyphicon-share"></i> Finalize Order</a>
                    <?php
                    }
                    ?>
                </div>              
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th style="text-align:center;" width="5%">#</th>
                            <th style="text-align:center;" width="15%" style="text-align:center;">Date/Time</th>
                            <th style="text-align:center;" width="12%">Transaction #</th>
                            <th style="text-align:center;" width="30%">Description</th>                            
                            <th style="text-align:center;" width="5%">Qty</th>
                            <th style="text-align:center;" width="10%">Amount</th>
                            <th style="text-align:center;" width="10%">Total</th>
                            <th width="10%" style="text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($charges as $item){
                            if($item['trans_id'] == ""){
                                $view="";
                            }else{
                                $view="style='display:none;'";
                            }
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>".date('m/d/Y',strtotime($item['datearray']))."  - ".date('h:i A',strtotime($item['timearray']))."</td>";
                                echo "<td>$item[trans_id]</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td style='text-align:center;'>$item[quantity]</td>";
                                echo "<td style='text-align:right;'>".number_format($item['sellingprice'],2)."</td>";
                                echo "<td style='text-align:right;'>".number_format($item['quantity']*$item['sellingprice'],2)."</td>";
                                ?>
                                <td><a href="<?=base_url('remove_request_item/'.$item['id']."/".$refno);?>" onclick="return confirm('Do you wish to remove this item?');return false;" class="btn btn-danger btn-sm" <?=$view;?>><i class="glyphicon glyphicon-trash"></i> Remove</a></td>
                                <?php
                            echo "</tr>";
                            $x++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>