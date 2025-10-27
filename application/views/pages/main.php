
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
        </ul>
</div>
<div class=" row">
    <div class="col-md-4 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-home green"></i>

            <div>Bookings</div>
            <div><?=count($booked);?></div>
        </a>
    </div>

    <div class="col-md-4 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-download-alt blue"></i>

            <div>Checked In</div>
            <div><?=count($checkin);?></div>

        </a>
    </div>

    <div class="col-md-4 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-share yellow"></i>

            <div>Checked Out</div>
            <div><?=count($checkout);?></div>
        </a>
    </div>

    <!-- <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" class="well top-block" href="#">
            <i class="glyphicon glyphicon-book blue"></i>

            <div>Checked In (Package)</div>
            <div></div>
        
        </a>
    </div> -->
</div>
<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-calendar"></i> Calendar</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php
                    $datetime=$year."-".$month;
                    if($month==date('m') && $year==date('Y')){
                        $previous="disabled";
                    }else{
                        $previous="";
                    }
                    $nextmonth=date('m',strtotime('1 month',strtotime($datetime)));
                    $nextyear=date('Y',strtotime('1 month',strtotime($datetime)));
                    $prevmonth=date('m',strtotime('-1 month',strtotime($datetime)));
                    $prevyear=date('Y',strtotime('-1 month',strtotime($datetime)));
                    ?>
                    <!-- <div id="calendar"></div> --> 
                <table class="table table-bordered" width="100%" style="table-layout: fixed;">

                  <tr style="background-color: purple; color:white;">
                    <td style="text-transform:uppercase;text-align:center; font-size:24px;">
                      <b><?=date('m',strtotime($datetime));?></b>
                    </td>
                    <td align="center" colspan="5" style="text-transform:uppercase;text-align:center; font-size:24px; border-left:0;">
                      <font styl="text-align:center;"><b><?=date('F',strtotime($datetime));?></b></font>
                    </td>
                    <td style="text-transform:uppercase;text-align:center; font-size:24px; border-left:0;">
                      <b><?=date('y',strtotime($datetime));?></b>
                    </td>
                  </tr>

                    <tr>

                      <td align="center" style="background-color:red; color:white;"><b>SUN</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>MON</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>TUE</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>WED</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>THU</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>FRI</b></td>

                      <td align="center" style="background-color:blue; color:white;"><b>SAT</b></td>

                    </tr>

                    <?php
                    $w=0;                    
                    $color="";
                    for($i=1;$i<=date('t',strtotime($datetime));$i++){

                      $date=date('Y-m-d',strtotime($datetime."-".$i));                      

                      if($i==1){

                        for($x=0;$x<7;$x++){

                            if(date('w',strtotime($date))==$x){                                                              
                                
                             echo "<td style='height:100px;' align='center'><b style='font-size:1.5vw;'>$i</b>";
                                if($date < date('Y-m-d')){

                                }else{
                             echo "<p style='text-align:center;'><b><a href='".base_url('view_available/'.$date)."' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-search'></i> View Availability<a></b></p>";
                             $rooms=$this->General_model->getRooms();
                             $avail=count($rooms);;
                             foreach($rooms as $room){
                                $query=$this->Reservation_model->checkAvailableRoom($room['id'],$date);
                                if(count($query)>0){
                                    $avail--;
                                }
                             }  
                                 if($avail==0 ){
                                    echo "<p align='center'><b style='color:red;'>Fully Booked!</b></p>";
                                }else{
                                    echo "<p align='center'>".$avail." Available Room(s)</p>";
                                }
                                }
                             echo "</td>";                                 

                                $w++;

                                break;                                                                                                                                                     

                            }else{

                                echo "<td style='background-color:gray; height:100px;'>&nbsp;</td>";

                                $w++;

                            }

                           

                       }

                    }else{                      

                        echo "<td style='height:100px;' align='center'><b style='font-size:1.5vw;'>$i</b>";
                                if($date < date('Y-m-d')){

                                }else{
                             echo "<p style='text-align:center;'><b><a href='".base_url('view_available/'.$date)."' class='btn btn-primary btn-sm'><i class='glyphicon glyphicon-search'></i> View Availability<a></b></p>";
                             $rooms=$this->General_model->getRooms();
                             $avail=count($rooms);;
                             foreach($rooms as $room){
                                $query=$this->Reservation_model->checkAvailableRoom($room['id'],$date);
                                if(count($query)>0){
                                    $avail--;
                                }
                             }  
                                if($avail==0 ){
                                    echo "<p align='center'><b style='color:red;'>Fully Booked!</b></p>";
                                }else{
                                    echo "<p align='center'>".$avail." Available Room(s)</p>";
                                }
                                }
                             echo "</td>"; 

                        $w++;

                    }

                                                               

                   

                    if($w > 6){

                        $w=0;

                        echo "</tr>";

                    }

                    }

                    ?>

                </table>
                <table width="100%" border="0" cellpadding="0">
                        <tr>
                            <td width="3%">
                            <!-- <a href="#">Prev</a> -->
                             <?=form_open(base_url('main'));?>
                            <input type="hidden" name="month" value="<?=$prevmonth;?>">
                            <input type="hidden" name="year" value="<?=$prevyear;?>">
                            <button type="submit" class="btn btn-primary btn-sm" <?=$previous;?>><< Previous</button>
                            <?=form_close();?>
                        </td>
                        <td>
                            <?=form_open(base_url('main'));?>
                            <input type="hidden" name="month" value="<?=$nextmonth;?>">
                            <input type="hidden" name="year" value="<?=$nextyear;?>">
                            <button type="submit" class="btn btn-primary btn-sm">Next >></button>
                            <?=form_close();?>
                        </td>
                        </tr>
                </table>
                </div>
            </div>
        </div>
    </div><!--/row-->