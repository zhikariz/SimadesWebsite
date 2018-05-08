

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form <?php echo $button ?> Dusun</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                       <!-- table content -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Dusun <?php echo form_error('dusun') ?></label>
            <input type="text" class="form-control" name="dusun" id="dusun" placeholder="Nama Dusun" value="<?php echo $dusun; ?>" />
        </div>
	    <input type="hidden" name="id_dusun" value="<?php echo $id_dusun; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('master') ?>" class="btn btn-default">Batal</a>
	</form>
<!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->

