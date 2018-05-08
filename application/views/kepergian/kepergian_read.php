    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $anchor?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        
        <!-- table content -->
        <table class="table">
	    <tr><td>Nik Pergi</td><td><?php echo $nik_pergi; ?></td></tr>
	    <tr><td>Alamat Tuju</td><td><?php echo $alamat_tuju; ?></td></tr>
	    <tr><td>Alasan</td><td><?php echo $alasan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kepergian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<!-- /.table content -->
</div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->