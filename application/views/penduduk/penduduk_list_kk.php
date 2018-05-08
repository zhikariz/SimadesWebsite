

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Anggota KK</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        
        <!-- table content -->
      
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('penduduk/create'),'Tambah Anggota', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NIK</th>
        <th>No Kk</th>
		<th>Nama Depan</th>
		<th>Nama Belakang</th>
		<th>Jenis kelamin</th>
		
		<th>Hubungan keluarga</th>
	    <th>Status</th>
	
		<th>Action</th>
            </tr><?php
            foreach ($penduduk_data as $penduduk)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $penduduk->nik ?></td>
            <td><?php echo $penduduk->no_kk ?></td>
			<td><?php echo $penduduk->nama_depan ?></td>
			<td><?php echo $penduduk->nama_belakang ?></td>
			<td><?php echo $penduduk->jekel ?></td>
			
			<td><?php echo $penduduk->hubkel ?></td>
	        <td><?php if($penduduk->status == 'MM'){echo "Meninggal";} else if($penduduk->status == 'MP'){echo "Hidup (Pergi)";}else {echo "Hidup";}?></td>
	
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('penduduk/read/'.$penduduk->nik),'Detail', 'class="btn btn-xs btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('penduduk/update/'.$penduduk->nik),'Edit', 'class="btn btn-xs btn-primary"'); 
				echo ' | '; 
				echo anchor(site_url('penduduk/delete/'.$penduduk->nik),'Hapus', 'onclick="javasciprt: return confirm(\'Apakah Anda Yakin ?\')", class="btn btn-xs btn-danger"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo site_url('penduduk') ?>" class="btn btn-default">Kembali</a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
<!-- /.table content -->
</div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

