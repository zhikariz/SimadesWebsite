

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Kelahiran</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        
        <!-- table content -->
        
        <table class="table">
	    <tr><td>Nis Bayi</td><td><?php echo $nis_bayi; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
	    <tr><td>Tpt Lahir</td><td><?php echo $tpt_lahir; ?></td></tr>
	    <tr><td>Jekel</td><td><?php echo $jekel; ?></td></tr>
	    <tr><td>Berat Bayi</td><td><?php echo $berat_bayi; ?></td></tr>
	    <tr><td>Anak Ke</td><td><?php echo $anak_ke; ?></td></tr>
	    <tr><td>Waktu</td><td><?php echo $waktu; ?></td></tr>
	    <tr><td>Panjang Bayi</td><td><?php echo $panjang_bayi; ?></td></tr>
	    <tr><td>Nik Ayah</td><td><?php echo $nik_ayah; ?></td></tr>
	    <tr><td>Nik Ibu</td><td><?php echo $nik_ibu; ?></td></tr>
	    <tr><td>Nik Saksi1</td><td><?php echo $nik_saksi1; ?></td></tr>
	    <tr><td>Nik Saksi2</td><td><?php echo $nik_saksi2; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kelahiran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<!-- /.table content -->
</div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->