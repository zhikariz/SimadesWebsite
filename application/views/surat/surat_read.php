<div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $anchor?></h3>
                    
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
        <table class="table">
	    <tr><td>Nik</td><td><?php echo $nik; ?></td></tr>
	    <tr><td>Tgl Surat</td><td><?php echo $tgl_surat; ?></td></tr>
	    <tr><td>Jenis Surat</td><td><?php echo $jenis_surat; ?></td></tr>
	    <tr><td>No Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Tgl Berlaku</td><td><?php echo $tgl_berlaku; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('surat') ?>" class="btn btn-default">Kembali</a></td></tr>
	</table>
<!-- /.table content -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                   
                </div><!-- /.box-footer-->
            </div><!-- /.box -->