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
           Reservation Details
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
        $full=0;
        $disc=0;
        if($checkin){
            $full=$checkin['amount'];
            $disc=$reserve['res_room_rate']-$reserve['res_downpayment']-$full;
        }

        $other=$reserve['res_room_rate']-$reserve['res_downpayment']-$full-$disc;        
        foreach($charges as $item){
            $other += $item['amount'];            
        }        
        if($payment){
            $label="Print Invoice";
            $bill="style='display:none;'";
            $undo="";
        }else{
            $bill="";
            $label="Print Final Bill";
            $undo="style='display:none;'";
        }
        $disc=0;
                            if($reserve['res_no_guest_senior'] > 0){
                                $totalpax=$reserve['res_no_guest_adult']+$reserve['res_no_guest_child']+$reserve['res_no_guest_senior'];
                                $person=$other/$totalpax;
                                $disc=($person*.20)*$reserve['res_no_guest_senior'];                                
                            }
        ?>
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-shopping-cart"></i> Charged Items</h2>  
                <div style="float:right;">
                    <a href="#" class="btn btn-round btn-default addCharges" <?=$bill;?>  title="Add New Charges" data-toggle="modal" data-target="#AddCharges" data-id="<?=$refno;?>"><i class="glyphicon glyphicon-plus"></i> Add Charges</a>
                    <a href="<?=base_url('request_fbs/'.$refno);?>" <?=$bill;?> class="btn btn-round btn-default requestFBS" title="Food Request"><i class="glyphicon glyphicon-folder-close"></i> FBS Request</a>
                    <a href="#" class="btn btn-round btn-default billPayment" <?=$bill;?> title="Payment" data-toggle="modal" data-target="#BillPayment" data-id="<?=$refno;?>_<?=$other;?>_<?=$disc;?>"><i class="glyphicon glyphicon-folder-open"></i> Payment</a>
                    <a href="#" class="btn btn-round btn-danger undoPayment" <?=$undo;?> title="Cancel Payment" data-toggle="modal" data-target="#UndoPayment" data-id="<?=$refno;?>"><i class="glyphicon glyphicon-share"></i> Undo Payment</a>
                    <a href="<?=base_url('print_bill/'.$refno);?>" class="btn btn-round btn-default" title="Print Billing Statement" target="_blank"><i class="glyphicon glyphicon-print"></i> <?=$label;?></a>
                    <a href="#" class="btn btn-round btn-danger cancelCheckIn" title="Cancel Check In" data-toggle="modal" data-target="#CancelCheckIn" data-id="<?=$refno;?>"><i class="glyphicon glyphicon-share"></i> Revert Checkin</a>
                </div>              
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%" style="text-align:center;">Date/Time</th>
                            <th>Description</th>                            
                            <th width="25%" style="text-align:right;">Amount</th>
                            <th width="10%" style="text-align:center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($charges as $item){
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>".date('m/d/Y',strtotime($item['datearray']))." / ".date('h:i A',strtotime($item['timearray']))."</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td style='text-align:right;'>".number_format($item['amount'],2)."</td>";
                                ?>
                                <td>
                                    <?php
                                    if($item['refno'] ==""){
                                    ?>
                                    <a href="#" class="btn btn-danger btn-sm deleteCharges" <?=$bill;?> data-toggle="modal" data-target="#DeleteCharges" data-id="<?=$refno;?>_<?=$item['id'];?>"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                    <?php
                                    }
                                    ?>
                                </td>
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