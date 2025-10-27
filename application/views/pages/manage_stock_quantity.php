<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            Stocks Quantity Manager
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
                <h2><i class="glyphicon glyphicon-book"></i> Stocks List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addStocks" title="Add New Stocks" data-toggle="modal" data-target="#ManageStocks"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>
                        <th>Code</th>         
                        <th>Description</th>
                        <th>Qty</th>
                        <th>SRP</th>                        
                        <th>Category</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($this->session->dept=="admin"){
                            $addqty="";
                        }else{
                            $addqty="style='display:none;'";
                        }
                        $x=1;
                        foreach($stocks as $item){                            
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[code]</td>";                           
                                echo "<td>$item[description]</td>";
                                echo "<td style='text-align:center;'>$item[quantity]</td>";
                                echo "<td style='text-align:right;'>".number_format($item['sellingprice'],2)."</td>";                                
                                echo "<td>$item[category]</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm addStockQty" data-toggle="modal" data-target="#AddStockQty" data-id="<?=$item['code'];?>_<?=date('Ymd');?>_<?=$item['description'];?>"><i class="glyphicon glyphicon-plus"></i> Add Quantity</a>                                    
                                    <a href="#" class="btn btn-warning btn-sm editStockQty" data-toggle="modal" data-target="#EditStockQty" data-id="<?=$item['code'];?>_<?=date('Ymd');?>_<?=$item['description'];?>_<?=$item['quantity'];?>" <?=$addqty;?>><i class="glyphicon glyphicon-edit"></i> Edit</a>
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