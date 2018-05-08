<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIMADES || Log in</title>
        <?php if($this->session->userdata('logo_desa')){ ?>
            <link href="<?php echo base_url().'uploads/image/'.$this->session->userdata('logo_desa') ?>" rel="shortcut icon">
        <?php } ?>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/iCheck/square/blue.css') ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page" align="center">
        <center>
        <?php
             // Cetak session
            if($this->session->flashdata('sukses')) {
                echo '<div class="callout callout-danger">';
                echo '<h4> Perhatian !!!</h4>';
                echo '<p>'.$this->session->flashdata('sukses').'</p>';
                echo '</div>';
            }
            // Cetak error
            //echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
            ?>
        </center>
        
                <div class="login-box">
                    <div class="login-logo">
                        <a href="#"><b>LOGIN</b></a>

                    </div><!-- /.login-logo -->
                    <div class="row">
                    <div class="col-md-7">
                        <div class="login-box-body">
                            <center>    
                            <h3>Selamat Datang di SIMADES</h3>
                            <br>
                            <?php if($logo){?>
                               <img src="<?php echo base_url().'uploads/image/'.$logo ?>" class="user-image" alt="User Image" style="width: 150px; height: 200px;"/>
                            <?php } else {echo "<h4>".$logo_desa."</h4>";}?>    </center>
                            <p style="padding: 9% 10%"><b>Sistem Informasi Manajemen Desa, menangani unit pelayanan desa <?php echo $nm_desa?></b></p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="login-box-body">
                            <br>
                            <br>
                            <br>
                            <p class="login-box-msg"><b>Masukkan username dan password Anda</b></p>
                            <br>
                            <br>
                            
                                    <form action="<?php echo site_url('auth/login') ?>" method="post">
                                        <div class="form-group has-feedback">
                                            <input type="text" name="username" id="username "class="form-control" placeholder="Username"/>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                        <div class="row">
                            <br>
                            <br>
                            <br>
                            <br>                
                                            <div class="col-xs-5">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">SIGN IN</button>
                                            </div><!-- /.col -->
                                        </div>

                                    </form>
                            
                            
                            <br>    

                        </div><!-- /.login-box-body -->
                    </div>
                    </div><!-- /.row-->
                </div><!-- /.login-box -->
            
        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jQuery/jQuery-2.1.3.min.js') ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>