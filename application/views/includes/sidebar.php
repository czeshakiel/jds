<?php
if($this->session->dept=="admin"){
    $dashboard="";
    $reservation="";
    $housekeeping="";
    $fbs="";
    $reports="";
    $settings="";
    $addqty="";
    $notes="";
    $stocks="";
    $room="";
    $package="";
    $depart="";
    $users="";
    $cinfo="";
    $resrep="";
}else
if($this->session->dept=="FRONT OFFICE"){
    $dashboard="";
    $reservation="";
    $housekeeping="style='display:none;'";
    $fbs="style='display:none;'";
    $reports="style='display:none;'";
    $settings="style='display:none;'";
    $addqty="style='display:none;'";
    $notes="";
    $stocks="style='display:none;'";
    $room="style='display:none;'";
    $package="style='display:none;'";
    $depart="style='display:none;'";
    $users="style='display:none;'";
    $cinfo="style='display:none;'";
    $resrep="style='display:none;'";
}else
if($this->session->dept=="HOUSEKEEPING"){
    $dashboard="style='display:none;'";
    $reservation="style='display:none;'";
    $housekeeping="";
    $fbs="style='display:none;'";
    $reports="style='display:none;'";
    $settings="style='display:none;'";
    $addqty="style='display:none;'";
    $notes="style='display:none;'";
    $stocks="style='display:none;'";
    $room="style='display:none;'";
    $package="style='display:none;'";
    $depart="style='display:none;'";
    $users="style='display:none;'";
    $cinfo="style='display:none;'";
    $resrep="style='display:none;'";
}else
if(($this->session->dept=="CAFE" || $this->session->dept=="FOOD KIOSK" || $this->session->dept=="SOUVENIR") && $this->session->access=="1"){
    $dashboard="style='display:none;'";
    $reservation="style='display:none;'";
    $housekeeping="style='display:none;'";
    $fbs="";
    $addqty="";
    $reports="";
    $settings="";
    $notes="style='display:none;'";
    $stocks="";
    $room="style='display:none;'";
    $package="style='display:none;'";
    $depart="style='display:none;'";
    $users="style='display:none;'";
    $cinfo="style='display:none;'";
    $resrep="style='display:none;'";
}else{
    $dashboard="style='display:none;'";
    $reservation="style='display:none;'";
    $housekeeping="style='display:none;'";
    $fbs="";
    $addqty="style='display:none;'";
    $reports="style='display:none;'";
    $settings="style='display:none;'";
    $notes="style='display:none;'";
    $stocks="style='display:none;'";
    $room="style='display:none;'";
    $package="style='display:none;'";
    $depart="style='display:none;'";
    $users="style='display:none;'";
    $cinfo="style='display:none;'";
    $resrep="style='display:none;'";
}

?>
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li <?=$dashboard;?>><a class="ajax-link" href="<?=base_url('main');?>"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>                        
                        <li <?=$reservation;?>><a class="ajax-link" href="<?=base_url('manage_reservation/room');?>"><i class="glyphicon glyphicon-book"></i><span> Reservation</span></a>
                        </li>
                        <li <?=$housekeeping;?>><a class="ajax-link" href="<?=base_url('manage_housekeeping');?>"><i class="glyphicon glyphicon-tasks"></i><span> Housekeeping</span></a>
                        </li>
                        <?php
                            $charges=$this->Sales_model->getAllRoomCharges();
                            $pen="";
                            if(count($charges)>0){
                                $pen="(".count($charges).")";
                            }
                        ?>
                        <li class="accordion" <?=$fbs;?>>
                             <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i><span> Food and Beverages <?=$pen;?></span></a>
                             <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?=base_url('point_of_sale');?>">Point of Sales</a></li>
                                <li><a href="<?=base_url('room_charges');?>">Room Charges <?=$pen;?></a></li>
                                <li><a href="<?=base_url('track_invoice');?>">Track Invoice</a></li>
                                <li><a href="<?=base_url('manage_stock_quantity');?>">Stock Quantity</a></li>                                
                            </ul>
                        </li>
                        <li class="accordion" <?=$reports;?>>
                             <a href="#"><i class="glyphicon glyphicon-file"></i><span> Reports <?=$pen;?></span></a>
                             <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?=base_url('sales_report');?>">Sales Report</a></li>
                                <li><a href="<?=base_url('booking_report');?>" <?=$resrep;?>>Reservation Report</a></li>                              
                            </ul>
                        </li>
                        <li class="accordion" <?=$settings;?>>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i><span> Settings</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="<?=base_url('manage_room');?>" <?=$room;?>>Rooms</a></li>
                                <li><a href="<?=base_url('manage_package');?>" <?=$package;?>>Packages</a></li>
                                <li><a href="<?=base_url('manage_department');?>" <?=$depart;?>>Department</a></li>
                                <li><a href="<?=base_url('manage_stocks');?>" <?=$stocks;?>>Stocks</a></li>
                                <li><a href="<?=base_url('manage_users');?>" <?=$users;?>>Users</a></li>
                                <li><a href="<?=base_url('manage_info');?>" <?=$cinfo;?>>Company Info</a></li>                                
                            </ul>
                        </li>                        
                    </ul>                    
                </div>
            </div>
            <br>
            <?php
            $note=$this->General_model->getNotes();
            if($note){
                $mynotes=$note['notes'];
            }else{
                $mynotes="";
            }
            ?>
            <div class="sidebar-nav" <?=$notes;?>>
                <div class="nav-canvas">
                    <div class="nav nav-pills nav-stacked main-menu" style="padding:10px;">
                        <h5>My Notes</h5>
                        <?=form_open(base_url("save_notes"));?>
                        <textarea name="notes" class="form-control" rows="10"><?=$mynotes;?></textarea><br>
                        <input type="submit" class="btn btn-primary btn-sm" value="Save">
                        <?=form_close();?>
                    </div>                 
                </div>
            </div>
        </div>
        <!--/span-->