<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url().'uploads/image/'.$this->session->userdata('logo_desa') ?>" height="160px" width="160px" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php if($this->session->userdata('nama_desa')){echo $this->session->userdata('nama_desa');} else {echo "???";}?></p>

                <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
            <li class="header">Administrasi Desa</li>
            <li class="treeview">
                <a href="<?php echo base_url('dashboard/'); ?>">
                    <i class="fa fa-home"></i> <span>Beranda</span> </i>
                </a>

            </li>

            <li class="header">Layanan</li>

            <li class="treeview">
                <a href="<?php echo base_url('surat/'); ?>">
                    <i class="fa fa-files-o"></i> <span>Pengajuan Surat</span>

                </a>

            </li>
            
            <li>
                <a href="<?php echo base_url('layanan/'); ?>">
                    <i class="fa fa-calendar"></i> <span>Riwayat Transaksi</span>

                </a>
            </li>


            <li class="header">Laporan</li>
            <li><a href="<?php echo base_url('mutasi/'); ?>"><i class="fa fa-book"></i><span> Laporan Mutasi </span></a></li>


            <li class="header">Kelola Sistem</li>
            <li class="treeview">
                <a href="<?php echo base_url('profil_desa/')?>">
                    <i class="fa fa-laptop"></i> <span>Profil Desa</span>

                </a>

            </li>

            <li>
                <a href="<?php echo base_url('user/'); ?>">
                    <i class="fa fa-user"></i> <span>Kelola Akun</span>
                </a>
            </li>
    <!--
            <li>
            <a href="<?php echo base_url('backuprestore/')?>"><i class="fa fa-circle-o text-danger"></i> <span>Backup/Restore Data</span></a>
            </li>
    -->

        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
