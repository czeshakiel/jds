<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Available Rooms <b>(<?=date('F d, Y',strtotime($datearray));?>, <?=date('l',strtotime($datearray));?>)</b></a>
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
        <?php
        foreach($rooms as $room){
            $query=$this->Reservation_model->checkAvailableRoom($room['id'],$datearray);
            if(count($query)>0){

            }else{
        ?>
        <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-home"></i> <?=$room['room_type'];?> [<?=$room['room_color'];?>]</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-4 col-sm-4"><img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($room['room_image']);?>" width='100' alt='Image'><br>
                    <a href="#" class="btn btn-primary btn-sm bookRoom" style="margin-top:5px;" data-toggle="modal" data-target="#BookRoom" data-id="<?=$datearray;?>_<?=$room['id'];?>_<?=$room['room_type'];?> (<?=$room['room_color'];?>)">Book Now</a></div>
                        <div class="col-md-8 col-sm-8">
                            Rate (Mon-Thu): <b><?=number_format($room['room_rate_weekday'],2);?></b><br>
                            Rate (Fri-Sun): <b><?=number_format($room['room_rate_weekend'],2);?></b><br>
                            <b>Inclusion:</b><br>
                            <ul>
                            <?php
                            $inc=explode(',',$room['room_inclusion']);
                            for($i=0;$i<sizeof($inc);$i++){
                                echo "<li>$inc[$i]</li>";
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
        
    </div><!--/row-->

  
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Packages <b>(<?=date('F d, Y',strtotime($datearray));?>, <?=date('l',strtotime($datearray));?>)</b></a>
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
        <?php
        foreach($packages as $room){
           
        ?>
        <div class="box col-md-3">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-home"></i> <?=$room['description'];?></h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="row">                     
                        <div class="col-md-8 col-sm-12">
                            Rate  <b><?=number_format($room['rate'],2);?></b><br>
                            <b>Inclusion:</b><br>
                            <ul>
                            <?php
                            $inc=explode(',',$room['package_inclusion']);
                            for($i=0;$i<sizeof($inc);$i++){
                                echo "<li>$inc[$i]</li>";
                            }
                            ?>
                            </ul>
                            <a href="#" class="btn btn-primary btn-sm bookPackage" style="margin-top:5px;margin-left:25px;" data-toggle="modal" data-target="#BookPackage" data-id="<?=$datearray;?>_<?=$room['id'];?>_<?=$room['description'];?>">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            
        }
        ?>
        
    </div><!--/row-->