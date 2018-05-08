
    <div class="row">
        <!-- left col-->
        <section class="col-lg-6 connectedSortable">
            <!-- Daftar Dusun -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Dusun</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    
                    <!-- table content -->
                  
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4">
                                <?php echo anchor(site_url('dusun/create'),'Tambah', 'class="btn btn-success"'); ?>
                            </div>
                            <div class="col-md-4 text-center">
                                <div style="margin-top: 8px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                            </div>
                
                        </div>
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                                
                        <th>Dusun</th>
                        <th>Action</th>
                            </tr><?php
                            foreach ($dusun_data as $dusun)
                            {
                                ?>
                                <tr>
                            
                            <td><?php echo $dusun->dusun ?></td>
                            <td style="text-align:center" width="200px">
                                <?php 
                                
                                echo anchor(site_url('dusun/update/'.$dusun->id_dusun),'Edit', 'class="btn btn-xs btn-primary"'); 
                                ?>
                            </td>
                        </tr>
                                <?php
                            }
                            ?>
                        </table>
                    <!-- /.table content -->
                    </div><!-- /.box-body -->
                <div class="box-footer">
                       
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        <!-- !daftar dusun -->

            <!-- Daftar Agama -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Agama</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    
                    <!-- table content -->
                  
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4">
                                <?php echo anchor(site_url('agama/create'),'Tambah', 'class="btn btn-success"'); ?>
                            </div>
                            <div class="col-md-4 text-center">
                                <div style="margin-top: 8px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                            </div>
                
                        </div>
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                                
                        <th>Agama</th>
                        <th>Action</th>
                            </tr><?php
                            foreach ($agama_data as $agama)
                            {
                                ?>
                                <tr>
                            
                            <td><?php echo $agama->agama ?></td>
                            <td style="text-align:center" width="200px">
                                <?php 
                                
                                echo anchor(site_url('agama/update/'.$agama->id_agama),'Edit', 'class="btn btn-xs btn-primary"'); 
                                ?>
                            </td>
                        </tr>
                                <?php
                            }
                            ?>
                        </table>
                    <!-- /.table content -->
                    </div><!-- /.box-body -->
                <div class="box-footer">
                       
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        <!-- !daftar agama -->

        <!-- Daftar GOLDAR -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Golongan Darah</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <!-- table content -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('goldar/create'),'Tambah', 'class="btn btn-success"'); ?>
                        </div>
                        
                        
                        
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                      
                    <th>Goldar</th>
                    <th>Action</th>
                        </tr><?php
                        foreach ($goldar_data as $goldar)
                        {
                            ?>
                            <tr>
                        
                        <td><?php echo $goldar->goldar ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            
                            echo anchor(site_url('goldar/update/'.$goldar->id_goldar),'Edit', 'class="btn btn-xs btn-primary"'); 
                           ?>
                        </td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
        <!-- !daftar goldar -->

        <!-- Daftar HUBKEL -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Hubungan Keluarga</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <!-- table content -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('hubkel/create'),'Tambah', 'class="btn btn-success"'); ?>
                        </div>
                        
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                        
                    <th>Hubkel</th>
                    <th>Action</th>
                        </tr><?php
                        foreach ($hubkel_data as $hubkel)
                        {
                            ?>
                            <tr>
                        
                        <td><?php echo $hubkel->hubkel ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            
                            echo anchor(site_url('hubkel/update/'.$hubkel->id_hubkel),'Edit', 'class="btn btn-xs btn-primary"'); 
                           ?>
                        </td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->
        <!-- !daftar hubkel -->

        <!-- Daftar Jabatan -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Jabatan Akun</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <!-- table content -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('jabatan/create'),'Tambah', 'class="btn btn-success"'); ?>
                        </div>
                        
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                        
                    <th>Jabatan</th>
                    <th>Action</th>
                        </tr><?php
                        foreach ($jabatan_data as $jabatan)
                        {
                            ?>
                            <tr>
                        
                        <td><?php echo $jabatan->jabatan ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            
                            echo anchor(site_url('jabatan/update/'.$jabatan->id_jabatan),'Edit', 'class="btn btn-xs btn-primary"'); 
                            ?>
                        </td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->
        <!-- !daftar jabatan -->

        <!-- Daftar jenis surat -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Jenis Surat</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <!-- table content -->
                    <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('jenis_surat/create'),'Tambah', 'class="btn btn-success"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                            
                    <th>Jenis Surat</th>
                    <th>Action</th>
                        </tr><?php
                        foreach ($jenis_surat_data as $jenis_surat)
                        {
                            ?>
                            <tr>
                        
                        <td><?php echo $jenis_surat->jenis_surat ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            
                            echo anchor(site_url('jenis_surat/update/'.$jenis_surat->id_jenis),'Update', 'class="btn btn-xs btn-primary"'); 
                            
                            ?>
                        </td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->
        <!-- !daftar jenis surat -->

        </section><!-- /.Left col -->

        <!-- right col -->
        <section class="col-lg-6 connectedSortable">
            <!-- Daftar Pekerjaan -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Daftar Pekerjaan</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    
                    <!-- table content -->
                  
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4">
                                <?php echo anchor(site_url('kerja/create'),'Tambah', 'class="btn btn-success"'); ?>
                            </div>
                            
                        </div>
                        <table class="table table-bordered" style="margin-bottom: 10px">
                            <tr>
                            
                        <th>Kerja</th>
                        <th>Action</th>
                            </tr><?php
                            foreach ($kerja_data as $kerja)
                            {
                                ?>
                                <tr>
                            
                            <td><?php echo $kerja->kerja ?></td>
                            <td style="text-align:center" width="200px">
                                <?php 
                                
                                echo anchor(site_url('kerja/update/'.$kerja->id_kerja),'Edit', 'class="btn btn-xs btn-primary"'); 
                               ?>
                            </td>
                        </tr>
                                <?php
                            }
                            ?>
                        </table>
                    <!-- /.table content -->
                    </div><!-- /.box-body -->
                <div class="box-footer">
                       
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        <!-- !daftar pekerjaan -->

        <!-- Daftar Pendidikan -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Pendidikan</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <!-- table content -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('pendidikan/create'),'Tambah', 'class="btn btn-success"'); ?>
                        </div>
                        
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                        
                    <th>Pendidikan</th>
                    <th>Action</th>
                        </tr><?php
                        foreach ($pendidikan_data as $pendidikan)
                        {
                            ?>
                            <tr>
                        
                        <td><?php echo $pendidikan->pendidikan ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            
                            echo anchor(site_url('pendidikan/update/'.$pendidikan->id_pendidikan),'Edit', 'class="btn btn-xs btn-primary"'); 
                           ?>
                        </td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
        <!-- !daftar pendidikan -->

        <!-- Daftar Status Kawin -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Status Perkawinan</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <!-- table content -->
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('status_kawin/create'),'Tambah', 'class="btn btn-success"'); ?>
                        </div>
                        
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                        
                    <th>Stkawin</th>
                    <th>Action</th>
                        </tr><?php
                        foreach ($status_kawin_data as $status_kawin)
                        {
                            ?>
                            <tr>
                        
                        <td><?php echo $status_kawin->stkawin ?></td>
                        <td style="text-align:center" width="200px">
                            <?php 
                            
                            echo anchor(site_url('status_kawin/update/'.$status_kawin->id_stkawin),'Edit', 'class="btn btn-xs btn-primary"'); 
                           ?>
                        </td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->
        <!-- !daftar status kawin -->

        

        </section><!-- /.right col -->


    </div>
      