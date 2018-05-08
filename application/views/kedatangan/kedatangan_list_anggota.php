
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
                 <?php echo anchor(site_url('kedatangan/createAnggota/'.$no_kk),'Tambah Anggota', 'class="btn btn-primary"'); ?>
                
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
                <input type="button" value="Kembali" onclick="history.back();" class="btn btn-default" />
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
