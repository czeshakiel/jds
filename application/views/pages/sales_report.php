<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            Sales Report
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
                <h2><i class="glyphicon glyphicon-file"></i> Sales Report</h2>                                
            </div>
            <?=form_open('generate_sales_report',array('target'=>'_blank'));?>
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
                    <label>Department</label>
                    <select name="department" class="form-control" required>
                        <option value="">Select Department</option>
                        <option value="all">All</option>
                        <?php
                        foreach($department as $item){
                            echo "<option value='$item[description]'>$item[description]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="all">All</option>
                        <option value="book">Booking</option>
                        <option value="final">Checkout</option>
                        <?php
                        foreach($category as $item){
                            echo "<option value='$item[category]'>$item[category]</option>";
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
    <?php
    if($this->session->dept=="admin"){
    ?>
    <div class="box col-lg-4 col-sm-12 col-md-6">                            
        <div class="box-inner">            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-file"></i> Sales Summary Report</h2>                                
            </div>
            <?=form_open('generate_sales_summary_report',array('target'=>'_blank'));?>
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
                    <label>Department</label>
                    <select name="department" class="form-control" required>
                        <option value="">Select Department</option>
                        <option value="all">All</option>
                        <?php
                        foreach($department as $item){
                            echo "<option value='$item[description]'>$item[description]</option>";
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
    <?php
    }
    ?>
</div>