<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            User Manager
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
                <h2><i class="glyphicon glyphicon-user"></i> User List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addUser" title="Add New User" data-toggle="modal" data-target="#ManageUser"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>                     
                        <th>Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Department</th>
                        <th>Access</th>                       
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($users as $item){                            
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[fullname]</td>";
                                echo "<td>$item[username]</td>";
                                echo "<td>$item[password]</td>";
                                echo "<td>$item[dept]</td>";
                                echo "<td>$item[Access]</td>";                           
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editUser" data-toggle="modal" data-target="#ManageUser" data-id="<?=$item['id'];?>_<?=$item['username'];?>_<?=$item['password'];?>_<?=$item['fullname'];?>_<?=$item['dept'];?>_<?=$item['Access'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a href="<?=base_url('delete_users/'.$item['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this item?');return false;"><i class="glyphicon glyphicon-eye"></i> Delete</a>
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