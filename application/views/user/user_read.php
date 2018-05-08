
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Akun</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

        <!-- table content -->        
        <table class="table">
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
	    <tr><td>Nama Depan</td><td><?php echo $nama_depan; ?></td></tr>
	    <tr><td>Nama Belakang</td><td><?php echo $nama_belakang; ?></td></tr>
	    <tr><td>Jabatan</td><td><?php echo $id_jabatan; ?></td></tr>
        <tr><td>NIP</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Aktif</td><td><?php echo $aktif; ?></td></tr>
	    </tr>
	</table>
 <!-- /.table content -->
</div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->
