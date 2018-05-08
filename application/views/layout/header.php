<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo base_url('dashboard/'); ?>" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><img src="<?php echo base_url().'uploads/logo/LOGO.png' ?>" height="32px" width="45px" class="user-image" alt="User Image"/></span>
              <!-- logo for regular state and mobile devices -->
              <!--<span class="logo-lg">SIMADES</span> -->
              <img src="<?php echo base_url().'uploads/logo/LOGO_SIMADES.png' ?>" height="34px" width="140px" class="user-image" alt="User Image"/>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="col-md-7" style="margin-left: -5%"></div>
                    <form action="<?php echo site_url('auth/switch1') ?>" method="POST">
                <div class="col-md-2" style="margin-top: 1%">                    
                              
                
                <?php
                if(sizeof($this->session->userdata('list_jabatan'))>1){
                    foreach ($this->session->userdata('list_jabatan') as $jabatan)
                    {
                        $options[$jabatan->jabatan] = $jabatan->jabatan;
                    }
                    echo form_dropdown('jabatan_switch', $options,$this->session->userdata('jabatan') ,array('class' => 'form-control', "onChange" => "onSelected()"));
                }
                ?>
                    
                    
                    
                </div>
                
                <div class="col-md-1" style="margin-top: 1%">
                
                    <input type="submit" id="switch" class="btn btn-default btn-sm" value="SWITCH" disabled></input>
                
                  
                </div>


                    </form>
                
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url().'uploads/image/'.$this->session->userdata('logo_desa') ?>" class="user-image" alt="User Image"/>
                                <span class="hidden-xs"><?php echo $this->session->userdata('jabatan');?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url().'uploads/image/'.$this->session->userdata('logo_desa') ?>" class="img-circle" alt="User Image" />
                                    <p>
                                    <?php 
                                        
                                        echo "Nama User : ".$this->session->userdata('nama_user');
                                        echo "</p><p>";    
                                        echo "Sebagai ".$this->session->userdata('jabatan');
                                        
                                    ?>
                                    
                                    </p>    
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('user/read/'.$this->session->userdata('id_user'))?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        
                                        <a href="<?php echo site_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
  <!-- Left side column. contains the logo and sidebar -->
  