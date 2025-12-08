<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Log me out!</h3>
            </div>
            <div class="modal-body">
                <img  src="<?=base_url('design/img/logout.jpg');?>" width="80%">
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">No, I will stay</a>
                <a href="<?=base_url('logout');?>" class="btn btn-primary">Yes, Log me out</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ManageDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_department');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="department_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Department</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" required id="department_description">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ManageUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_users');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="user_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage User</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="fullname" class="form-control" required id="user_fullname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <select name="department" class="form-control" required id="user_dept">
                        <option value="">Select Department</option>
                        <?php
                        $department=$this->General_model->getAllDepartment();
                        foreach($department as $dept){
                            echo "<option value='$dept[description]'>$dept[description]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required id="user_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Passwod</label>
                    <input type="password" name="password" class="form-control" required id="user_password">
                    <input type="checkbox" onclick="user_password.type =  checked ? 'text' : 'password'"> Show Password
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Access</label>
                    <input type="text" name="access" class="form-control" value="0" required id="user_access">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageLogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_logo');?>" method="POST" enctype="multipart/form-data">                
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Logo</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Logo</label>
                    <input type="file" name="file" class="form-control" required accept="image/*">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_room');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Room</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="room_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Color</label>
                    <input type="text" name="room_color" class="form-control" required id="room_color">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <input type="text" name="room_type" class="form-control" required id="room_type">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rate (Mon-Thu)</label>
                    <input type="text" name="room_rate_weekday" class="form-control" required id="room_rate_weekday">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rate (Fri-Sun)</label>
                    <input type="text" name="room_rate_weekend" class="form-control" required id="room_rate_weekend">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Excess</label>
                    <input type="text" name="room_excess" class="form-control" required id="room_excess">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Inclusions (Separate with comma ',')</label>
                    <textarea name="room_inclusion" class="form-control" rows="4" id="room_inclusion"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageRoomImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_room_image');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="room_image_id">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Room Image</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Room Image</label>
                    <input type="file" name="file" class="form-control" required accept="image/*">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManagePackage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_package');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Package</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="pack_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" required id="pack_description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Rate</label>
                    <input type="text" name="rate" class="form-control" required id="pack_rate">
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Inclusions (Separate with comma ',')</label>
                    <textarea name="package_inclusion" class="form-control" rows="4" id="pack_inclusion"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="BookRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_reservation');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Book a Room</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="room_id" id="book_room_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input list="fullname" name="fullname" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getExistingClient();
                    ?>
                    <datalist id="fullname">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_fullname]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input list="address" name="address" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getClientAddress();
                    ?>
                    <datalist id="address">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_address]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <input list="contactno" name="contactno" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getContactNumber();
                    ?>
                    <datalist id="contactno">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_contactno]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input list="emailadd" name="email" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getEmailAddress();
                    ?>
                    <datalist id="emailadd">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_email]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input list="nationality" name="nationality" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getNationality();
                    ?>
                    <datalist id="nationality">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_nationality]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Package Type</label>
                    <p id="book_room_type"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Arrival Date</label>
                    <input type="date" name="arrival_date" class="form-control" required id="book_arrival_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Departure Date</label>
                    <input type="date" name="departure_date" class="form-control" required id="book_depart_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Adult</label>
                    <select name="adult" class="form-control" required>
                        <option value="">Select No. of Adult</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Child</label>
                    <select name="child" class="form-control" required>
                        <option value="">Select No. of Child</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Senior/PWD</label>
                    <select name="senior" class="form-control" required>
                        <option value="">Select No. of Senior/PWD</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Source</label>
                    <select name="source" class="form-control" required>
                        <option value="">Select Source</option>
                        <option value="Walk in">Walk in</option>
                        <option value="Phone call">Phone Call</option>
                        <option value="Messenger">Messenger</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Downpayment</label>
                    <input type="text" name="downpayment" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <select name="paymentmode" class="form-control" required>
                        <option value="">Select Payment Mode</option>
                        <option value="cash">Cash Payment</option>
                        <option value="gcash">GCash</option>
                        <option value="credit">Debit/Credit Payment</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ChangeRoomStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('change_room_hk_status');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="room_status_id">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Status</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Room</label>
                    <p id="room_status_type"></p>
                </div>                                
                <div class="form-group">
                    <label for="exampleInputEmail1">Room Status</label>
                    <select name="status" class="form-control" required id="room_status">
                        <option value="clean">Clean</option>
                        <option value="dirty">Dirty</option>
                        <option value="for inspection">For Inspection</option>
                        <option value="for renovation">For Renovation</option>
                    </select>
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditReservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('update_reservation');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Update Reservation</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="edit_book_id">                
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input list="fullname" name="fullname" id="edit_book_customer" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getExistingClient();
                    ?>
                    <datalist id="fullname">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_fullname]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input list="address" name="address" id="edit_book_address" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getClientAddress();
                    ?>
                    <datalist id="address">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_address]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <input list="contactno" name="contactno" id="edit_book_contactno" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getContactNumber();
                    ?>
                    <datalist id="contactno">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_contactno]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input list="emailadd" name="email" id="edit_book_email" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getEmailAddress();
                    ?>
                    <datalist id="emailadd">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_email]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input list="nationality" name="nationality" id="edit_book_nationality" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getNationality();
                    ?>
                    <datalist id="nationality">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_nationality]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Room Type</label>
                    <p id="book_room_type"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Arrival Date</label>
                    <input type="date" name="arrival_date" class="form-control" required id="edit_book_arrival_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Departure Date</label>
                    <input type="date" name="departure_date" class="form-control" required id="edit_book_depart_date">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Adult</label>
                    <select name="adult" class="form-control" required id="edit_book_adult">
                        <option value="">Select No. of Adult</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Child</label>
                    <select name="child" class="form-control" required id="edit_book_child">
                        <option value="">Select No. of Child</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Senior/PWD</label>
                    <select name="senior" class="form-control" required id="edit_book_senior">
                        <option value="">Select No. of Senior/PWD</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Source</label>
                    <select name="source" class="form-control" required id="edit_book_source">
                        <option value="">Select Source</option>
                        <option value="Walk in">Walk in</option>
                        <option value="Phone call">Phone Call</option>
                        <option value="Messenger">Messenger</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Downpayment</label>
                    <input type="text" name="downpayment" class="form-control" required id="edit_book_downpayment">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <select name="paymentmode" class="form-control" required id="edit_book_paymentmode">
                        <option value="">Select Payment Mode</option>
                        <option value="cash">Cash Payment</option>
                        <option value="gcash">GCash</option>
                        <option value="credit">Debit/Credit Payment</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddCharges" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_charges');?>" method="POST"> 
                <input type="hidden" name="refno" id="charged_refno">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Add Charges</h3>
            </div>
            <div class="modal-body">                                                
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input list="chargedesc" name="description" id="browser" class="form-control" autocomplete="off" required>
                    <?php
                    $charges=$this->Reservation_model->getAllChargesItem();
                    ?>
                    <datalist id="chargedesc">
                        <?php
                        foreach($charges as $cus){
                            echo "<option value='$cus[description]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text" class="form-control" name="amount" required>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteCharges" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('delete_charges');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="refno" id="delete_charge_refno">               
                <input type="hidden" name="id" id="delete_charge_id">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Delete Charges?</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageStocks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_stocks');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="code" id="stock_code">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Stocks</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control" required id="stock_description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" required id="stock_quantity">
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Selling Price</label>
                    <input type="text" name="sellingprice" class="form-control" required id="stock_sellingprice">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Department</label>
                    <input list="department" name="department" id="stock_department" class="form-control" autocomplete="off" required>
                    <?php
                    $charges=$this->General_model->getAllDepartment();
                    ?>
                    <datalist id="department">
                        <?php
                        foreach($charges as $cus){
                            echo "<option value='$cus[description]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input list="category" name="category" id="stock_category" class="form-control" autocomplete="off" required>
                    <?php
                    $charges=$this->Sales_model->getAllCategory();
                    ?>
                    <datalist id="category">
                        <?php
                        foreach($charges as $cus){
                            echo "<option value='$cus[category]'>";
                        }
                        ?>
                    </datalist>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddStockQty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('add_stock_quantity');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="code" id="add_stock_code">
                <input type="hidden" name="refno" id="add_stock_refno">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Add Quantity</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Description</label>
                    <p style="font-size:20px;" id="add_stock_description"></p>
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" required>
                </div>                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageStockImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_stock_image');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="code" id="stock_image_code">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Stock Image</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Stock Image</label>
                    <input type="file" name="file" class="form-control" required accept="image/*">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ChangeQty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('change_qty');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="change_qty_id">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Change Quantity</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" required id="change_qty_num" autocomplete="off">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="RemoveOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('remove_order');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="remove_order_id">                              
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Remove Item?</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required id="remove_username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" required id="remove_password">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddSingleDiscount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('add_single_discount');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="single_disc_id">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Discount</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Discount</label>
                    <input type="text" name="discount" class="form-control" required id="single_disc_amount" autocomplete="off">
                </div>  
                <div class="form-group">
                    <label for="exampleInputEmail1">Discount Type</label><br>
                    <input type="radio" name="type" required value="percent"> Percentage
                    <input type="radio" name="type" required value="amount"> Amount
                </div>                               
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="AddDiscount" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('add_discount');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="refno" id="add_disc_refno">               
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Discount</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Discount (in %)</label>
                    <input type="text" name="discount" class="form-control" required id="add_disc_amount" autocomplete="off">
                </div>                               
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ProceedPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_payment');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="refno" id="payment_refno">               
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
                <h3>Amount Tendered</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Transaction Type</label>
                    <!-- <select name="trantype" class="form-control" required autofocus>
                        <option value="">Select Transaction Type</option>
                        <option value="Dine in">Dine in</option>
                        <option value="Take out">Take out</option>
                        <option value="Room Service">Room Service</option>
                    </select> -->
                    <input type="radio" name="trantype" value="Dine in" checked tabindex="0"> Dine in
                    <input type="radio" name="trantype" value="Take out"> Take out
                    <input type="radio" name="trantype" value="Room Service"> Room Service
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Table No.</label>
                    <!-- <select name="controlno" class="form-control" requied>
                        <option value="">Select No.</option>
                        <option value="Room Service">No Table</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select> -->
                    <input type="radio" name="controlno" value="Room Service" checked> No Table<br>
                    <input type="radio" name="controlno" value="1"> 1&nbsp;
                    <input type="radio" name="controlno" value="2"> 2&nbsp;
                    <input type="radio" name="controlno" value="3"> 3&nbsp;
                    <input type="radio" name="controlno" value="4"> 4&nbsp;
                    <input type="radio" name="controlno" value="5"> 5<br>
                    <input type="radio" name="controlno" value="6"> 6&nbsp;
                    <input type="radio" name="controlno" value="7"> 7&nbsp;
                    <input type="radio" name="controlno" value="8"> 8&nbsp;
                    <input type="radio" name="controlno" value="9"> 9&nbsp;
                    <input type="radio" name="controlno" value="10"> 10<br>
                    <input type="radio" name="controlno" value="11"> 11&nbsp;
                    <input type="radio" name="controlno" value="12"> 12&nbsp;
                    <input type="radio" name="controlno" value="13"> 13&nbsp;
                    <input type="radio" name="controlno" value="14"> 14&nbsp;
                    <input type="radio" name="controlno" value="15"> 15
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text" name="amount" class="form-control" id="payment_amount" required autocomplete="off">
                </div> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Type</label><br>
                    <input type="radio" name="type" required value="cash" checked onclick="unshowAll();"> Cash
                    <input type="radio" name="type" required value="gcash" onclick="showGCash(); unshowCard(); unshowCharged(); "> GCash
                    <input type="radio" name="type" required value="card" onclick="showCard();unshowGCash();unshowCharged();"> Card
                    <input type="radio" name="type" required value="charge" onclick="showCharged();unshowCard();unshowGCash();"> Charge
                </div>
                <div class="form-group" id="gcash" style="display:none;">
                    <label>Transaction #</lable>
                    <input type="text" name="transno" class="form-control">
                </div>
                <div class="form-group" id="card" style="display:none;">
                    <label>Card #</lable>
                    <input type="text" name="transno" class="form-control">
                </div>
                <div class="form-group" id="charge" style="display:none;">
                    <label>Reservation ID</lable>
                    <select name="transno" class="form-control">
                        <?php
                        $query=$this->Reservation_model->getReservation('checkedin');                        
                        foreach($query as $row){
                            if($row['room_type']==""){
                                $roomtype=$row['description'];
                            }else{
                                $roomtype=$row['room_type'];
                            }
                            echo "<option value='$row[res_id]'>$row[res_fullname] - [$roomtype $row[room_color]]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddFBSCharges" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_room_charges');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="id" id="request_id">
                <input type="hidden" name="refno" id="request_refno">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Item Request</h3>
            </div>
            <div class="modal-body">                                               
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Menu</label>
                    <select name="code" class="form-control" required id="request_item">
                        <option value="">Select Item</option>
                        <?php
                        $stocks=$this->Sales_model->getAllStocks();
                        foreach($stocks as $item){
                            echo "<option value='$item[code]'>$item[description] [P $item[sellingprice]] [QTY: $item[quantity]]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="1" id="request_quantity">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditRoomChargeQty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_room_charge_qty');?>" method="POST"> 
                <input type="hidden" name="id" id="edit_room_qty_id">
                <input type="hidden" name="refno" id="edit_room_qty_refno">
                <input type="hidden" name="reserve_id" id="edit_room_qty_res_id">
                <input type="hidden" name="fullname" id="edit_room_qty_fullname">
                <input type="hidden" name="code" id="edit_room_qty_code">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Edit Quantity</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Description</label>
                    <p style="font-size:20px;" id="edit_room_qty_description"></p>
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" id="edit_room_qty_quantity" required>
                </div>                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="AddChargesFBS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('room_charges_save');?>" method="POST">                 
                <input type="hidden" name="id" id="request_room_id">
                <input type="hidden" name="refno" id="request_room_refno">
                <input type="hidden" name="reserve_id" id="request_room_res_id">
                <input type="hidden" name="fullname" id="request_room_fullname">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Item Request</h3>
            </div>
            <div class="modal-body">                                               
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Menu</label>
                    <select name="code" class="form-control" required id="request_room_item">
                        <option value="">Select Item</option>
                        <?php
                        $stocks=$this->Sales_model->getAllStocks();
                        foreach($stocks as $item){
                            echo "<option value='$item[code]'>$item[description] [P $item[sellingprice]] [QTY: $item[quantity]]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="1" id="request_room_quantity">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="BillPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('bill_payment');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="refno" id="final_payment_refno">                
                <input type="hidden" name="totalamount" id="final_payment_total_amount">                
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Payment</h3>
            </div>
            <div class="modal-body">                                               
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Amount</label>
                    <input type="text" name="amount" class="form-control"  id="final_payment_amount">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Discount</label>
                    <input type="text" name="discount" class="form-control" id="final_payment_discount">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="BookPackage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_reservation_package');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Book Package</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="room_id" id="book_package_id">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input list="fullname" name="fullname" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getExistingClient();
                    ?>
                    <datalist id="fullname">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_fullname]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input list="address" name="address" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getClientAddress();
                    ?>
                    <datalist id="address">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_address]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <input list="contactno" name="contactno" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getContactNumber();
                    ?>
                    <datalist id="contactno">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_contactno]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input list="emailadd" name="email" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getEmailAddress();
                    ?>
                    <datalist id="emailadd">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_email]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input list="nationality" name="nationality" id="browser" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getNationality();
                    ?>
                    <datalist id="nationality">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_nationality]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Package</label>
                    <p id="book_package_type"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Arrival Date</label>
                    <input type="date" name="arrival_date" class="form-control" required id="book_arrival_date_package">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Departure Date</label>
                    <input type="date" name="departure_date" class="form-control" required id="book_depart_date_package">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Person</label>
                    <input type="text" name="pax" class="form-control" id="book_no_person_package">
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Source</label>
                    <select name="source" class="form-control" required>
                        <option value="">Select Source</option>
                        <option value="Walk in">Walk in</option>
                        <option value="Phone call">Phone Call</option>
                        <option value="Messenger">Messenger</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Downpayment</label>
                    <input type="text" name="downpayment" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <select name="paymentmode" class="form-control" required>
                        <option value="">Select Payment Mode</option>
                        <option value="cash">Cash Payment</option>
                        <option value="gcash">GCash</option>
                        <option value="credit">Debit/Credit Payment</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="EditReservationPackage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('update_reservation_package');?>" method="POST">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Update Reservation</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="edit_book_package_id">                
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input list="fullname" name="fullname" id="edit_book_customer_package" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getExistingClient();
                    ?>
                    <datalist id="fullname">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_fullname]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input list="address" name="address" id="edit_book_address_package" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getClientAddress();
                    ?>
                    <datalist id="address">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_address]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <input list="contactno" name="contactno" id="edit_book_contactno_package" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getContactNumber();
                    ?>
                    <datalist id="contactno">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_contactno]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input list="emailadd" name="email" id="edit_book_email_package" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getEmailAddress();
                    ?>
                    <datalist id="emailadd">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_email]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nationality</label>
                    <input list="nationality" name="nationality" id="edit_book_nationality_package" class="form-control" autocomplete="off">
                    <?php
                    $clients=$this->Reservation_model->getNationality();
                    ?>
                    <datalist id="nationality">
                        <?php
                        foreach($clients as $cus){
                            echo "<option value='$cus[res_nationality]'>";
                        }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Package Type</label>
                    <p id="edit_book_room_type_package"></p>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Arrival Date</label>
                    <input type="date" name="arrival_date" class="form-control" required id="edit_book_arrival_date_package">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Departure Date</label>
                    <input type="date" name="departure_date" class="form-control" required id="edit_book_depart_date_package">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">No of Pax</label>
                    <input type="text" name="pax" class="form-control" id="edit_book_pax_package">
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Source</label>
                    <select name="source" class="form-control" required id="edit_book_source_package">
                        <option value="">Select Source</option>
                        <option value="Walk in">Walk in</option>
                        <option value="Phone call">Phone Call</option>
                        <option value="Messenger">Messenger</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Downpayment</label>
                    <input type="text" name="downpayment" class="form-control" required id="edit_book_downpayment_package">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Mode</label>
                    <select name="paymentmode" class="form-control" required id="edit_book_paymentmode_package">
                        <option value="">Select Payment Mode</option>
                        <option value="cash">Cash Payment</option>
                        <option value="gcash">GCash</option>
                        <option value="credit">Debit/Credit Payment</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EditStockQty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('edit_stock_quantity');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="code" id="edit_stock_code">
                <input type="hidden" name="refno" id="edit_stock_refno">
                <input type="hidden" name="oldqty" id="edit_stock_old_qty">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>EDit Quantity</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Item Description</label>
                    <p style="font-size:20px;" id="edit_stock_description"></p>
                </div>                
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" name="quantity" class="form-control" required id="edit_stock_qty">
                </div>                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="CancelReservation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('cancel_reservation');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="refno" id="cancel_refno">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Cancel Reservation?</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="CheckIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('check_in');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="refno" id="checkin_refno">                
                <input type="hidden" name="totalamount" id="checkin_total_amount">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Payment</h3>
            </div>
            <div class="modal-body">                                               
                <div class="form-group">
                    <label for="exampleInputEmail1">Payment Amount</label>
                    <input type="text" name="amount" class="form-control"  id="checkin_balance">
                </div>                               
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="UndoPayment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('undo_payment');?>" method="POST" enctype="multipart/form-data"> 
                <input type="hidden" name="refno" id="undo_refno">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Cancel Payment?</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="HoldList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Suspended Transaction</h3>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>Transaction ID</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    foreach($temp as $item){
                        echo "<tr>";
                            echo "<td>$item[trans_id]</td>";
                            echo "<td><a href='unhold_transaction/$item[trans_id]' class='btn btn-primary btn-round btn-sm'>Resume</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>                
            </div>
        </div>
    </div>
</div>