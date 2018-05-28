<?php
// Proteksi halaman
$this->simple_login->cek_login();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $titlenav ?></title>
  <?php if($this->session->userdata('logo_desa')){ ?>
    <link href="<?php echo base_url().'uploads/image/'.$this->session->userdata('logo_desa') ?>" rel="shortcut icon">
  <?php } ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="<?php echo base_url('assets/ionicons-2.0.1/css/ionicons.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css') ?>">


   

  <script  type='text/javascript'>
    function findSelected(){ 
      var alasan= document.getElementById('alasan'); 
      //var variable = document.getElementById('variable'); 
      if(alasan.value == "Menumpang KK"){
            
          document.getElementById('no_kk_baru').readOnly=true;
          document.getElementById('alamat_baru').readOnly=true;
          document.getElementById('rt_baru').readOnly=true;
          document.getElementById('rw_baru').readOnly=true;
          document.getElementById('cari').disabled=false;
          document.getElementById('id_dusun').disabled=true;
      } else if(alasan.value == "Pindah Tempat Tinggal"){
          document.getElementById('no_kk_baru').readOnly=false;
          document.getElementById('alamat_baru').readOnly=false;
          document.getElementById('rt_baru').readOnly=false;
          document.getElementById('rw_baru').readOnly=false;
          document.getElementById('id_dusun').disabled=false;
          document.getElementById('cari').disabled=true;
      }
    };

    function onSelected(){ 
                 
      document.getElementById('switch').disabled=false;
      
    };

    function open_child(url,title,w,h){
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        w = window.open(url, title, 'toolbar=no, location=no, directories=no, \n\
        status=no, menubar=no, scrollbar=no, resizabel=no, copyhistory=no,\n\
        width='+w+',height='+h+',top='+top+',left='+left);
    };

    

</script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>