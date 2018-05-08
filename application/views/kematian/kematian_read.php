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
	    <tr><td>Nik Meninggal</td><td><?php echo $nik_meninggal; ?></td></tr>
	    <tr><td>Tgl Meninggal</td><td><?php echo $tgl_meninggal; ?></td></tr>
	    <tr><td>Sebab</td><td><?php echo $sebab; ?></td></tr>
	    <tr><td>Tpt Meninggal</td><td><?php echo $tpt_meninggal; ?></td></tr>
	    <tr><td>Nik Ayah</td><td><?php echo $nik_ayah; ?></td></tr>
	    <tr><td>Nik Ibu</td><td><?php echo $nik_ibu; ?></td></tr>
	    <tr><td>Nik Pelapor</td><td><?php echo $nik_pelapor; ?></td></tr>
	    <tr><td>Nik Saksi1</td><td><?php echo $nik_saksi1; ?></td></tr>
	    <tr><td>Nik Saksi2</td><td><?php echo $nik_saksi2; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kematian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<!-- /.table content -->
</div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->