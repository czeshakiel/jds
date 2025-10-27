<!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
            <?php
            $info=$this->General_model->getSettings();
            if($info){
                $img=$info['company_logo'];
            }else{
                $img="";
            }
            ?>           
            <a class="navbar-brand" href="<?=base_url('main');?>"> 
                <img alt="Charisma Logo" src="data:image/jpg;charset=utf8;base64,<?=base64_encode($img);?>"/>
                <span>JDS | PMS</span>
            </a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?=$this->session->fullname;?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#logout">Logout</a></li>
                </ul>
            </div>
            <div class="btn-group pull-right theme-container animated tada">
                <p>Date/Time: <b><?=date('F d, Y');?> / <i id="clock"></i></b></p>
            </div>
        </div>
    </div>