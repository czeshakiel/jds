<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Reservation</a>
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
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-home"></i> Booking List &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=base_url('manage_reservation/room');?>" style="color:black;">Room</a> | <a href="<?=base_url('manage_reservation/package');?>"  style="color:black;">Package</a></h2>

            <div class="box-icon">
                <!-- <a href="#" class="btn btn-setting btn-round btn-default" data-toggle="modal" data-target="#ManagePackage" title="Add New Package"><i class="glyphicon glyphicon-plus"></i></a> -->
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th>Reservation #</th>
                <th>Client Name</th>                            
                <th class="sorting_asc">Arrival Date</th> 
                <th>Departure Date</th>
                <th>Room</th>
                <th>No. of Guest</th>
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($booked as $room){  
                        
                        $days=strtotime(date('Y-m-d'))-strtotime($room['res_date_arrive']);
                        if($days >= 0){
                            $color="style='background-color:red; color:white;'";
                        }else{
                            $date1=date_create($room['res_date_arrive']);
                            $date2=date_create(date("Y-m-d"));
                            $interval = date_diff($date1,$date2);
                            $days=$interval->format('%a');
                            if($days <= 2  && $days >= 1){
                                $color="style='background-color:green; color:white;'";
                            }else{
                                $color="";
                            }
                            
                        }
                        if($room['room_type']=="")                        {
                                $room_type=$room['description'];
                                $regform="style='display:none;'";
                                $edit="";
                            }else{
                                $room_type=$room['room_type'];
                                $regform="";
                                $edit="style='display:none;'";
                            }

                            $balance=$room['res_room_rate']-$room['res_downpayment'];
                            if($room['res_no_guest_senior'] > 0){
                                $totalpax=$room['res_no_guest_adult']+$room['res_no_guest_child']+$room['res_no_guest_senior'];
                                $person=$room['res_room_rate']/$totalpax;
                                $disc=($person*.20)*$room['res_no_guest_senior'];
                                $balance=$balance-$disc;
                            }

                            if($room['res_date_arrive']==date('Y-m-d')){
                                $c_in="";
                            }else{
                                $c_in="style='display:none;'";
                            }
                            
                        echo "<tr>";                            
                            echo "<td $color>$room[res_id]</td>";                            
                            echo "<td $color>$room[res_fullname]</td>";                                                        
                            echo "<td $color>";
                                echo date('m/d/Y',strtotime($room['res_date_arrive']));
                            echo "</td>";
                            echo "<td $color>";
                                echo date('m/d/Y',strtotime($room['res_date_depart']));
                            echo "</td>";
                            echo "<td $color>";
                                echo $room_type." ".$room['room_color'];
                            echo "</td>";
                            echo "<td $color>";
                                echo $room['res_no_guest_adult']." Adult"." / ".$room['res_no_guest_child']." Child"." / ".$room['res_no_guest_senior']." Senior/PWD";
                            echo "</td>";
                            echo "<td $color>";
                                echo $room['res_status'];
                            echo "</td>";


                            // $guest=explode('/ ',$room['res_no_guest']);
                            // if(count($guest)>1){
                            //     $adult=str_replace(' Adult','',$guest[0]);
                            //     $child=str_replace(' Child','',$guest[1]);
                            // }else{
                            //     $adult=$room['res_no_guest'];
                            //     $child="";
                            // }                                
                            ?>
                            <td width="13%" <?=$color;?>>
                                <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-primary"><i class="glyphicon glyphicon-th-list"></i> Menu <span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?=base_url('print_reg_form/'.$room['res_id']);?>" target="_blank" <?=$regform;?>>Registration Form</a></li>
                                            <li><a href="<?=base_url('print_voucher/'.$room['res_id']);?>" target="_blank">Reservation Voucher</a></li>
                                            <li><a href="#" class="checkIn" data-toggle="modal" data-target="#CheckIn" data-id="<?=$room['res_id'];?>_<?=$balance;?>" <?=$c_in;?>>Check In</a></li>
                                            <li class="divider"></li>                                            
                                            <li><a href="#" <?=$regform;?> class="editReservation" data-toggle="modal" data-target="#EditReservation" data-id="<?=$room['res_id'];?>_<?=$room['res_fullname'];?>_<?=$room['res_address'];?>_<?=$room['res_contactno'];?>_<?=$room['res_email'];?>_<?=$room['res_nationality'];?>_<?=$room['res_date_arrive'];?>_<?=$room['res_date_depart'];?>_<?=$room['res_no_guest_adult'];?>_<?=$room['res_no_guest_child'];?>_<?=$room['res_no_guest_senior'];?>_<?=$room['res_source'];?>_<?=$room['res_downpayment'];?>_<?=$room['res_mode_payment'];?>">Edit</a></li>
                                            <li><a href="#" <?=$edit;?> class="editReservationPackage" data-toggle="modal" data-target="#EditReservationPackage" data-id="<?=$room['res_id'];?>_<?=$room['res_fullname'];?>_<?=$room['res_address'];?>_<?=$room['res_contactno'];?>_<?=$room['res_email'];?>_<?=$room['res_nationality'];?>_<?=$room['res_date_arrive'];?>_<?=$room['res_date_depart'];?>_<?=$room['res_no_guest_adult'];?>_<?=$room['res_source'];?>_<?=$room['res_downpayment'];?>_<?=$room['res_mode_payment'];?>_<?=$room_type;?>">Edit</a></li>
                                            <li><a href="#" class="cancelReservation" data-toggle="modal" data-target="#CancelReservation" data-id="<?=$room['res_id'];?>">Cancel</a></li>
                                            <!-- <li class="divider"></li>
                                            <li><a href="#">One more separated link</a></li> -->
                                        </ul>
                                    </li>                                    
                                </ul>
                            </td>
                            <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="box col-md-12 col-lg-12 col-sm-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-home"></i> Check in List</h2>

            <div class="box-icon">
                <!-- <a href="#" class="btn btn-setting btn-round btn-default" data-toggle="modal" data-target="#ManagePackage" title="Add New Package"><i class="glyphicon glyphicon-plus"></i></a> -->
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th>Reservation #</th>
                <th>Client Name</th>                            
                <th>Arrival Date</th> 
                <th>Departure Date</th>
                <th>Room/Package</th>
                <th>No. of Guest</th>
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($checkedin as $room){ 
                      $days=strtotime(date('Y-m-d'))-strtotime($room['res_date_depart']);
                        if($days >= 0){
                                $color="style='background-color:red; color:white;'";
                        }else{    
                                $color="";                            
                        }                       
                       if($room['res_date_depart']==date('Y-m-d')){
                        $status="<span class='blink_text'>For Checkout</span>";
                       }else{
                        $status="Checked In";
                       }
                       $payment = $this->Reservation_model->getPayment($room['res_id']);
                       if($payment){
                            $checkout="";
                       }else{
                            $checkout="style='display:none;'";
                       }
                       if($room['room_type']=="")                        {
                                $room_type=$room['description'];
                                
                            }else{
                                $room_type=$room['room_type'];
                                
                            }
                        echo "<tr>";                            
                            echo "<td $color>$room[res_id]</td>";                            
                            echo "<td $color>$room[res_fullname]</td>";                                                        
                            echo "<td $color>";
                                echo $room['res_date_arrive'];
                            echo "</td>";
                            echo "<td $color>";
                                echo $room['res_date_depart'];
                            echo "</td>";
                            echo "<td $color>";
                                echo $room_type." ".$room['room_color'];
                            echo "</td>";
                            echo "<td $color>";
                                echo $room['res_no_guest_adult']." Adult / ".$room['res_no_guest_child']." Child / ".$room['res_no_guest_senior']." Senior/PWD";
                            echo "</td>";
                            echo "<td $color>";
                                echo $status;
                            echo "</td>";
                            ?>
                            <td width="13%" <?=$color;?>>
                                <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-primary"><i class="glyphicon glyphicon-th-list"></i> Menu <span
                                                class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?=base_url('reservation_details/'.$room['res_id']);?>">View</a></li>
                                            <li <?=$checkout;?>><a href="<?=base_url('check_out/'.$room['res_id']);?>" onclick="return confirm('Do you wish to check out now?');return false;">Check out</a></li>
                                        </ul>
                                    </li>                                    
                                </ul>                                
                            </td>
                            <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-home"></i> Checkout List</h2>

            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th>Reservation #</th>
                <th>Client Name</th>                            
                <th>Arrival Date</th> 
                <th>Departure Date</th>
                <th>Room/Package</th>
                <th>No. of Guest</th>
                <th>Status</th> 
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($checkedout as $room){ 
                        if($room['room_type']=="")                        {
                                $room_type=$room['description'];
                                $regform="style='display:none;'";
                                $edit="";
                            }else{
                                $room_type=$room['room_type'];
                                $regform="";
                                $edit="style='display:none;'";
                            }                         
                       
                        echo "<tr>";                            
                            echo "<td>$room[res_id]</td>";                            
                            echo "<td>$room[res_fullname]</td>";                                                        
                            echo "<td>";
                                echo $room['res_date_arrive'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_date_depart'];
                            echo "</td>";
                            echo "<td>";
                                echo $room_type." ".$room['room_color'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_no_guest'];
                            echo "</td>";
                            echo "<td>";
                                echo $room['res_status'];
                            echo "</td>";
                            ?>
                            <td width="13%">
                                <a href="<?=base_url('reservation_details/'.$room['res_id']);?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i> View</a>
                            </td>
                            <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
            </table>
        </div>
    </div> -->
</div>
    <!--/span-->
</div><!--/row-->