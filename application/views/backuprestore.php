
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Backup Data</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                <!-- table content -->
                    
                        <p align="justify" style="padding-right: 60%"><?php echo $keterangan_backup;?></p>
                        <a href="<?php echo base_url('backuprestore/backup') ?>" class="btn btn-success"> Backup </a>
                    
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Restore Data</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

                <!-- table content -->
                    
                        <p align="justify" style="padding-right: 60%"><?php echo $keterangan_restore;?></p>
                        <input type="file" name="datafile"/>
                        <br>
                        <a href="<?php echo base_url('backuprestore/restore') ?>" class="btn btn-success"> Restore </a>
                    
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->