<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            Track Invoice
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
    <div class="box col-12">
        <?=form_open('track_invoice_search');?>
        <table width="100%" border="0">
            <tr>
                <td width="8%"><b>Select Date:</b></td>
                <td width="15%"><input type="date" name="datearray" class="form-control" value="<?=date('Y-m-d');?>"></td>
                <td><input type="submit" class="btn btn-primary btn-sm" value="Search"></td>
            </tr>
        </table>
        <?=form_close();?>                    
    </div>
    <div class="box col-md-12">                            
        <div class="box-inner">            
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-book"></i> Sales List</h2>                                
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>
                        <th>Refno</th>         
                        <th>Date</th>
                        <th>Time</th>                        
                        <th>User</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($sales as $item){                            
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[trans_id]</td>";                           
                                echo "<td>$item[datearray]</td>";                                
                                echo "<td>$item[timearray]</td>";
                                echo "<td>$item[fullname]</td>";
                                ?>
                                <td>
                                    <a href="<?=base_url('print_receipt/'.$item['trans_id']);?>" class="btn btn-success btn-sm" target="_blank"><i class="glyphicon glyphicon-print"></i> Print Receipt</a>
                                    <a href="<?=base_url('print_order_slip/'.$item['trans_id']);?>" class="btn btn-primary btn-sm" target="_blank"><i class="glyphicon glyphicon-print"></i> Print Slip</a>
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