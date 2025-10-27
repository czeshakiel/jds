<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<div>
        <ul class="breadcrumb">
            <li>
                <a href="<?=base_url('main');?>">Home</a>
            </li>
            <li>
                <a href="#">Packages</a>
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
            <h2><i class="glyphicon glyphicon-home"></i> Package List</h2>

            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round btn-default addPackage" data-toggle="modal" data-target="#ManagePackage" title="Add New Package"><i class="glyphicon glyphicon-plus"></i></a>
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
            </div>
        </div>
        <div class="box-content">    
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
            <thead>
            <tr>                
                <th>Description</th>
                <th>Rate</th>                            
                <th width="30%">Inclusions</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($packages as $room){                        
                        $inc=explode(',',$room['package_inclusion']);
                        $rinc="";
                        for($i=0;$i<sizeof($inc);$i++){
                            $rinc .="<li>".$inc[$i]."</l>";
                        }
                        echo "<tr>";                            
                            echo "<td>$room[description]</td>";                            
                            echo "<td align='right'>".number_format($room['rate'],2)."</td>";                                                        
                            echo "<td>";
                                echo "<ul>";
                                    echo $rinc;
                                echo "</ul>";
                            echo "</td>";
                            ?>
                            <td width="13%">
                                <a href="#" class="btn btn-warning btn-sm editPackage" data-toggle="modal" data-target="#ManagePackage" data-id="<?=$room['id'];?>_<?=$room['description'];?>_<?=$room['rate'];?>_<?=$room['package_inclusion'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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