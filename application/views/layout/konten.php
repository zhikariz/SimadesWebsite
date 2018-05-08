<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title;?>
            
        </h1>
        <!--<ol class="breadcrumb">
            <li><a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><?php echo $anchor; ?></li>
        </ol>-->
    </section>
    

    <!-- Main content -->
    <section class="content">
        
                <?php
                if ( $isi ) {
                  $this->load->view( $isi );
                }
                ?>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
