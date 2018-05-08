<div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $anchor?></h3>

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

        <div class="row" style="margin-bottom: 5px">
            <div class="col-md-2" style="margin-bottom: 5px">
                <a href="<?php echo site_url('surat/format_no_surat')?>" class="btn btn-success">Format Nomor Surat</a>
            </div>
            <div class="col-md-8" >

                    <?php
                    foreach($jenis_surat as $row)
                    {
                        ?>
                        <a href="<?php echo site_url('surat/create/'.$row->id_jenis)?>" style="width: 335px;margin-bottom: 2px" class="btn btn-social bg-maroon"> <?php echo $row->id_jenis.".  ".$row->jenis_surat ?></a>
                    <?php
                    }
                    ?>




            </div>



        </div>



     <!-- /.table content -->
                </div><!-- /.box-body -->
                <div class="box-footer">

                </div><!-- /.box-footer-->
            </div><!-- /.box -->



        <div class="row">

        <div class="col-md-12">


          <!-- BAR CHART1 -->
          <div class="box box-success">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Grafik Pengajuan Surat (Januari-Juni)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart1" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->

      <div class="row">

        <div class="col-md-12">


          <!-- BAR CHART2 -->
          <div class="box box-success">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Grafik Pengajuan Surat (Juli-Desember)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

              <div class="chart">
                <canvas id="barChart2" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
