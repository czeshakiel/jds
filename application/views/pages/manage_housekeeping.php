<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Housekeeping</a>
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
$clean=0;$dirty=0;$insp=0;$ren=0;
foreach($rooms as $item){
    if($item['room_hk_status']=="clean"){
        $clean++;
    }
    if($item['room_hk_status']=="dirty"){
        $dirty++;
    }
    if($item['room_hk_status']=="for inspection"){
        $insp++;
    }
    if($item['room_hk_status']=="for renovation"){
        $ren++;
    }
}
?>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-ok green"></i>

            <div>Clean Rooms</div>
            <div><?=$clean;?></div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-trash red"></i>

            <div>Dirty Rooms</div>
            <div><?=$dirty;?></div>

        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-zoom-in yellow"></i>

            <div>For Inspection</div>
            <div><?=$insp;?></div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-wrench blue"></i>

            <div>For Renovation</div>
            <div><?=$ren;?></div>
        
        </a>
    </div>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-home"></i> Room List</h2>

            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round btn-default addRoom" data-toggle="modal" data-target="#ManageRoom" title="Add New Room"><i class="glyphicon glyphicon-plus"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th width="20%">Room</th>                
                <th width="15%">FO Status</th>
                <th width="15%">HK Status</th>
                <th>Transaction History</th>
                <th width="10%">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($rooms as $room){
                        if($room['room_hk_status']=="clean"){
                            $label="<div style='background:green; color:white; width:auto;'>$room[room_hk_status]</div>";
                        }else
                        if($room['room_hk_status']=="dirty"){
                            $label="<div style='background:red; color:white; width:auto;'>$room[room_hk_status]</div>";
                        }else
                        if($room['room_hk_status']=="for inspection"){
                            $label="<div style='background:yellow; color:black; width:auto;'>$room[room_hk_status]</div>";
                        }else
                        if($room['room_hk_status']=="for renovation"){
                            $label="<div style='background:lightblue; color:white; width:auto;'>$room[room_hk_status]</div>";
                        }
                        // $img=$room['room_image'];
                        // $button="<img src='data:image/jpg;charset=utf8;base64,".base64_encode($img)."' width='50' alt='Image'>";                        
                        echo "<tr>";                            
                            echo "<td>$room[room_type] ($room[room_color])</td>";
                            echo "<td style='text-align:center;'>$room[room_fo_status]</td>";
                            echo "<td align='center' style='text-align:center;'>$label</td>";
                            echo "<td>";
                               echo $room['fullname']."<br>".$room['datearray']." ".$room['timearray'];
                            echo "</td>";
                            ?>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#ChangeRoomStatus" data-id="<?=$room['id'];?>_<?=$room['room_type'];?> <?=$room['room_color'];?>_<?=$room['room_hk_status'];?>" class="btn btn-primary btn-sm changeRoomStatus"><i class="glyphicon glyphicon-refresh"></i> Change Status</a>
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
    <!--/span-->
</div><!--/row-->