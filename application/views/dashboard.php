
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                
                                <div class="small-box bg-aqua">
                                    
                                    <div class="inner">
                                        <h3><?php echo $jmllahir?></h3>
                                        <p>Kelahiran</p>
                                    </div>
                                    <div class="icon">
                                      
                                        <i class="fa fa-user-plus"></i> 
                                      
                                    </div>

                                    <a href="<?php echo site_url().'kelahiran'?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                
                            </div><!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3><?php echo $jmlmati?></h3>
                                        <p>Kematian</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-user-times"></i>
                                    </div>
                                    <a href="<?php echo site_url().'kematian'?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div><!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3><?php echo $jmldatang?></h3>
                                        <p>Datang</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-sign-in"></i>
                                    </div>
                                    <a href="<?php echo site_url().'kedatangan'?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div><!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3><?php echo $jmlpergi?></h3>
                                        <p>Pergi</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-sign-out"></i>
                                    </div>
                                    <a href="<?php echo site_url().'kepergian'?>" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div><!-- ./col -->
                        </div><!-- /.row -->
      <?php if($this->session->userdata('jabatan')=='Kepala Desa'){?>
      <div class="row">
        <div class="col-md-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              
              <h3 class="box-title">Mode Grafik Berdasarkan Dusun & Tahun</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              
                
                  <table width="100%">
                            <tr><td width="50px" align="center">
                             <a href="<?php echo site_url('dashboard/index2')?>" class="btn btn-info btn-lg"> PINDAH HALAMAN</a>
                            </td>
                            </tr>
                            
                  </table>
                
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

        </div>
        
      </div>

      <?php }?>

      <div class="row">


        <div class="col-md-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Statistik Pekerjaan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            Jumlah Penduduk
              <div id="bar-chart-kerja" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
          </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Statistik Pendidikan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            Jumlah Penduduk
              <div id="bar-chart-pendidikan" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-pie-chart"></i>
              <h3 class="box-title">Jenis Kelamin</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <div class="chart-responsive">
                    <canvas id="pieChartJekel" height="150"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle text-red"></i> Laki-laki</li>
                    
                    <li><i class="fa fa-circle text-aqua"></i> Perempuan</li>
                    
                  </ul>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
            
            
          </div>
          <!-- /.box -->
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Statistik Dusun</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            Jumlah Penduduk
              <div id="bar-chart-dusun" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->  
        </div>
            

            <div class="col-md-6">
          
          


          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Statistik Hubungan Keluarga</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            Jumlah Penduduk
              <div id="bar-chart-hubkel" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->  


          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Statistik Umur</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            Jumlah Penduduk
              <div id="bar-chart-umur" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->  

          
        </div>
        
        <!-- /.col -->
          </div>
      
          
        
        

        
      




 


    

