<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            Reservation Report
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
    <div class="box col-lg-4 col-sm-12 col-md-6">                            
        <div class="box-inner">            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-book"></i> Reservation Report</h2>                                
            </div>
            <?=form_open('generate_booking_report',array('target'=>'_blank'));?>
            <div class="box-content">
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="startdate" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" name="enddate" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Report Type</label>
                    <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="booked">Booking</option>
                        <option value="checkedin">Check In</option>
                        <option value="checkedout">Check Out</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Generate">
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <div class="box col-lg-4 col-sm-12 col-md-6">                            
        <div class="box-inner">            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-book"></i> Visitor Statistic Report</h2>                                
            </div>
            <?=form_open('generate_statistic_report',array('target'=>'_blank'));?>
            <div class="box-content">                
                <div class="form-group">
                    <label>Report Type</label>
                    <select name="type" class="form-control" required onchange="viewStat(this.value);">
                        <option value="">Select Type</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>                        
                    </select>
                </div>
                <div class="form-group" id="stat_month" style="display:none;">
                    <label>Month</label>
                    <select name="month" class="form-control" required>
                        <option value="">Select Month</option>
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="form-group"  id="stat_year" style="display:none;">
                    <label>Year</label>
                    <select name="year" class="form-control" required>
                        <option value="">Select Year</option>
                        <?php
                        for($x=date('Y');$x > 2024;$x--){
                            echo "<option value='$x'>$x</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Generate">
                </div>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>