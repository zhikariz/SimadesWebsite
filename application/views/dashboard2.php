
                        
            
      <div class="row">
        <div class="col-md-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              
              <h3 class="box-title">Lihat Grafik</h3>
                
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form action="<?php echo site_url('dashboard/index2')?>" method="POST">
                  <table>
                            <tr><td width="50px">
                            Dusun </td><td width="20px">: </td>
                            <td width="100px">

                            <?php

                                foreach ($list_dusun as $row) {
                                  $optionsdusun[$row->id_dusun] = $row->dusun;
                                }
                                                       
                                echo form_dropdown('id_dusun', $optionsdusun, $set_dusun);
                            ?>
                            </td>
                            <td width="70px">
                            Tahun :
                            </td>
                            <td width="80px">
                            <?php
                                for ($i = date('Y'); $i >= 2000; $i--) {
                                    $optionstahun[$i] = $i;
                                }
                                                                                      
                                echo form_dropdown('tahun', $optionstahun, $set_tahun);
                            ?>
                            </td>
                            <td width="100px">
                            <input type="submit" name="submit" value="Lihat" class="btn btn-primary"></input> 
                            </td>
                            </tr>
                            
                            </table>
                </form>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        
      </div>

      <?php if($post==TRUE){?>

      <div class="row">


        <div class="col-md-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Statistik Pekerjaan <?php echo $dusun?></h3>

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

              <h3 class="box-title">Statistik Pendidikan <?php echo $dusun?></h3>

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
              <h3 class="box-title">Jenis Kelamin <?php echo $dusun?></h3>

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

              <h3 class="box-title">Statistik Umur <?php echo $dusun?></h3>

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
            

            <div class="col-md-6">
          
          


          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Statistik Hubungan Keluarga <?php echo $dusun?></h3>

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




          
        </div>
        
        <!-- /.col -->
          </div>
      <?php }?>
      
          
        
        

        
      




 


    

