
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Cetak Laporan Mutasi</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                <!-- table content -->
                    
                        <p align="justify" style="padding-right: 60%"><?php echo $keterangan;?></p>
                        <form action="<?php echo $action; ?>" method="post">
                            <table>
                            <tr><td width="180px">
                            Bulan </td><td width="20px">: </td>
                            <td>

                            <?php
                                $options[1] = 'Januari';
                                $options[2] = 'Februari';
                                $options[3] = 'Maret';
                                $options[4] = 'April';
                                $options[5] = 'Mei';
                                $options[6] = 'Juni';
                                $options[7] = 'Juli';
                                $options[8] = 'Agustus';
                                $options[9] = 'September';
                                $options[10] = 'Oktober';
                                $options[11] = 'November';
                                $options[12] = 'Desember';
                                                       
                                echo form_dropdown('bulan', $options, 01);
                            ?>
                            </td>
                            <tr>
                                <td>Tahun </td><td>:</td>
                                <td>
                                    <?php
                                        for ($i = date('Y'); $i >= 2000; $i--) {
                                            $optionstahun1[$i] = $i;
                                        }
                                                                                              
                                        echo form_dropdown('tahun1', $optionstahun1, $set_tahun1);
                                    ?>
                                </td>
                            </tr>
                            <tr><td>
                            Pejabat penanda tangan</td><td> : </td>
                            <td>
                            <?php
                            
                                foreach ($data_pejabat as $pejabat)
                                {
                                    $options1[$pejabat->id_user] = $pejabat->nama_depan_user." ".$pejabat->nama_belakang_user." (".$pejabat->jabatan.")";
                                }

                                
                        
                                echo form_dropdown('id_user', $options1, $id_user);
                            ?>
                            </td>
                            </tr>
                            </table>
                            <br>
                            <button type="submit" class="btn btn-success">Cetak <i class="fa fa-file-pdf-o"></i></button> 
                            
                        </form>
                        
                    
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->

            <div class="row">
                <div class="col-md-12">
                <!-- LINE CHART -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart"></i>
                      <h3 class="box-title">Lihat Grafik</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo site_url('mutasi/grafik'); ?>" method="post">
                            <table>
                            <tr><td width="50px">
                            Bulan </td><td width="20px">: </td>
                            <td width="100px">

                            <?php
                                $options[1] = 'Januari';
                                $options[2] = 'Februari';
                                $options[3] = 'Maret';
                                $options[4] = 'April';
                                $options[5] = 'Mei';
                                $options[6] = 'Juni';
                                $options[7] = 'Juli';
                                $options[8] = 'Agustus';
                                $options[9] = 'September';
                                $options[10] = 'Oktober';
                                $options[11] = 'November';
                                $options[12] = 'Desember';
                                                       
                                echo form_dropdown('bulan', $options, $set_bulan);
                            ?>
                            </td>
                            <td width="120px">
                            Tahun : 
                            <?php
                                for ($i = date('Y'); $i >= 2000; $i--) {
                                    $optionstahun[$i] = $i;
                                }
                                                                                      
                                echo form_dropdown('tahun', $optionstahun, $set_tahun);
                            ?>
                            </td>
                            <td width="100px">
                            <button type="submit" class="btn btn-primary">Lihat</button> 
                            </td>
                            </tr>
                            
                            </table>
                            
                            
                            
                        </form>
                        <center><h3> <?php echo $grafik?> </h3></center>
                      <div class="chart">
                        
                        
                            <canvas id="barChart1" style="height:450px"></canvas>
                        
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
            </div>

            