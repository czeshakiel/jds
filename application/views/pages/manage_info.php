<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">Home</a>
        </li>
        <li>
            <a href="#">Company Settings</a>
        </li>
    </ul>
</div>
<?php
$name="";$address="";$email="";$contactno="";$img="";
if($info){
    $name=$info['company_name'];
    $address=$info['company_address'];
    $email=$info['company_email'];
    $contactno=$info['company_contactno'];
    $img=$info['company_logo'];
}
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
                <h2><i class="glyphicon glyphicon-edit"></i> Company Details</h2>

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
                    if($img==""){
                        $button="<a href='#' class='btn btn-success' data-toggle='modal' data-target='#ManageLogo'>Upload Logo</a>";
                    }else{
                        $button="<a href='#' data-toggle='modal' data-target='#ManageLogo'><img src='data:image/jpg;charset=utf8;base64,".base64_encode($img)."' width='100' alt='Image'></a>";
                    }
                    if($info){
                ?>
                <?=$button;?>
                <?php } ?>
                <br>
                <br>
                <form role="form" action="<?=base_url('save_info');?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Company Name</label>
                        <input type="text" class="form-control" name="company_name" id="exampleInputEmail1" value="<?=$name;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <textarea name="company_address" class="form-control" rows="3"><?=$address;?></textarea>
                    </div>                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" name="company_email" id="exampleInputEmail1" value="<?=$email;?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contact No</label>
                        <input type="text" class="form-control" name="company_contactno" id="exampleInputEmail1" value="<?=$contactno;?>">
                    </div>                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->