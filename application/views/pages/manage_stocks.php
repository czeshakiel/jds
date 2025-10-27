<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>        
        <li>
            Stocks Manager
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
                        <th>Img</th>         
                        <th>Code</th>         
                        <th>Description</th>
                        <th>Qty</th>
                        <th>SRP</th>
                        <th>Dept</th>
                        <th>Category</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($stocks as $item){   
                            $img=$item['img'];
                            if($img==""){
                                $button="<a href='#' class='btn btn-success addStockImage' data-toggle='modal' data-target='#ManageStockImage' data-id='$item[code]'>Add Image</a>";
                            }else{
                                $button="<a href='#' data-toggle='modal' class='addStockImage' data-target='#ManageStockImage' data-id='$item[code]'><img src='data:image/jpg;charset=utf8;base64,".base64_encode($img)."' width='100' alt='Image'></a>";
                            }                         
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td style='text-align:center;'>$button</td>";
                                echo "<td>$item[code]</td>";                           
                                echo "<td>$item[description]</td>";
                                echo "<td>$item[quantity]</td>";
                                echo "<td>".number_format($item['sellingprice'],2)."</td>";
                                echo "<td>$item[dept]</td>";
                                echo "<td>$item[category]</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editStocks" data-toggle="modal" data-target="#ManageStocks" data-id="<?=$item['code'];?>_<?=$item['description'];?>_<?=$item['quantity'];?>_<?=$item['sellingprice'];?>_<?=$item['dept'];?>_<?=$item['category'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a href="<?=base_url('delete_stocks/'.$item['code']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this item?');return false;"><i class="glyphicon glyphicon-eye"></i> Delete</a>
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