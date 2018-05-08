            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Import Excel</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                <!-- table content -->
                        <p align="justify" style="padding-right: 60%"><?php //echo $keterangan_restore;?></p>
                        <form action="<?php echo base_url();?>penduduk/importexcel/" method="post" enctype="multipart/form-data">
                            <input type="file" name="file"/>
                            <br/>
                            <input class="btn btn-success" type="submit"  value="Upload Excel"/>
                        </form>

                        <br />
                        Download format excel <a href= "<?php echo site_url('penduduk/download') ?>"> Klik Disini </a>
                        <br>

                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">

            </div><!-- /.box-footer-->
            </div><!-- /.box -->
