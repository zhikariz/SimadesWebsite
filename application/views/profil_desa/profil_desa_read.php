<div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $anchor?></h3>
                    
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
        <center><img src="<?php echo base_url().'uploads/image/'.$logo_desa ?>" height='160px' width='160px' /></center>
        <table class="table">
	    <tr><td>Kode Desa</td><td><?php echo $kode_desa; ?></td></tr>
	    <tr><td>Nama Desa</td><td><?php echo $nm_desa; ?></td></tr>
	    <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
	    <tr><td>Kabupaten</td><td><?php echo $kabupaten; ?></td></tr>
	    <tr><td>Propinsi</td><td><?php echo $propinsi; ?></td></tr>
        <tr><td>Nama Kepdes</td><td><?php echo $nm_kepdes; ?></td></tr>
        <tr><td>NIP Kepdes</td><td><?php echo $nip_kepdes; ?></td></tr>
        <tr><td>Alamat Desa</td><td><?php echo $alamat_desa; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('profil_desa') ?>" class="btn btn-default">Kembali</a></td></tr>
	</table>
<!-- /.table content -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                   
                </div><!-- /.box-footer-->
            </div><!-- /.box -->