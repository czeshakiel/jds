<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            FBS Request
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
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-shopping-cart"></i> Request List</h2>                                
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>
                        <th>Refno</th>         
                        <th>Reservation ID</th>
                        <th>Customer Name</th>                        
                        <th>Room/Package</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($sales as $item){     
                            if($item['room_type']==""){
                                $room_type=$item['pack'];
                            }else{
                                $room_type=$item['room_type'];
                            }
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[trans_id]</td>";                           
                                echo "<td>$item[res_id]</td>";                                
                                echo "<td>$item[res_fullname]</td>";
                                echo "<td>$room_type [$item[room_color]]</td>";
                                ?>
                                <td>
                                    <a href="<?=base_url('view_room_charges/'.$item['trans_id']."/".$item['res_id']."/".$item['res_fullname']);?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-eye-open"></i> View</a>
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