<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Rooms</a>
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
                <th>Img</th>
                <th>Color</th>
                <th>Type</th>
                <th>Rate Mon-Thu</th>
                <th>Rate Fri-Sun</th>
                <th>Excess</th>
                <th width="20%">Inclusions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($rooms as $room){
                        $img=$room['room_image'];
                        if($img==""){
                            $button="<a href='#' class='btn btn-success addRoomImage' data-toggle='modal' data-target='#ManageRoomImage' data-id='$room[id]'>Add Image</a>";
                        }else{
                            $button="<a href='#' data-toggle='modal' class='addRoomImage' data-target='#ManageRoomImage' data-id='$room[id]'><img src='data:image/jpg;charset=utf8;base64,".base64_encode($img)."' width='100' alt='Image'></a>";
                        }
                        $inc=explode(',',$room['room_inclusion']);
                        $rinc="";
                        for($i=0;$i<sizeof($inc);$i++){
                            $rinc .="<li>".$inc[$i]."</l>";
                        }
                        echo "<tr>";
                            echo "<td width='100'>$button</td>";
                            echo "<td>$room[room_color]</td>";
                            echo "<td>$room[room_type]</td>";
                            echo "<td align='right'>".number_format($room['room_rate_weekday'],2)."</td>";
                            echo "<td align='right'>".number_format($room['room_rate_weekend'],2)."</td>";
                            echo "<td align='right'>".number_format($room['room_excess'],2)."</td>";
                            echo "<td>";
                                echo "<ul>";
                                    echo $rinc;
                                echo "</ul>";
                            echo "</td>";
                            ?>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm editRoom" data-toggle="modal" data-target="#ManageRoom" data-id="<?=$room['id'];?>_<?=$room['room_color'];?>_<?=$room['room_type'];?>_<?=$room['room_rate_weekday'];?>_<?=$room['room_rate_weekend'];?>_<?=$room['room_excess'];?>_<?=$room['room_inclusion'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a href="<?=base_url('delete_room/'.$room['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this item?');return false;"><i class="glyphicon glyphcon-trash"></i> Delete</a>
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