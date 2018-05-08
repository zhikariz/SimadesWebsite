

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form <?php echo $button ?> Golongan Darah</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">

                       <!-- table content -->
        
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Goldar <?php echo form_error('goldar') ?></label>
            <input type="text" class="form-control" name="goldar" id="goldar" placeholder="Goldar" value="<?php echo $goldar; ?>" />
        </div>
	    <input type="hidden" name="id_goldar" value="<?php echo $id_goldar; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('master') ?>" class="btn btn-default">Cancel</a>
	</form>
<!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   
            </div><!-- /.box-footer-->
            </div><!-- /.box -->
