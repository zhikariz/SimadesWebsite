

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Kelahiran</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
        
        <!-- table content -->

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
                <?php echo anchor(site_url('kelahiran/create'),'Tambah Kelahiran', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-2 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <form action="<?php echo site_url('kelahiran/index'); ?>" class="form-inline" method="get">
            
                        
            <div class="col-md-7 text-right">
                    <div class="form-group">
                        <div class="col-md-3">
                        <?php
                            $options[NULL] = "*Pencarian berdasarkan*" ;
                            $options['nis'] = "NIS" ;
                            $options['nama_depan_bayi'] = "Nama Depan Bayi" ;
                            $options['nama_belakang_bayi'] = "Nama Belakang Bayi" ;
                            $options['tgl_lahir'] = "Tanggal Lahir" ;
                            $options['tpt_lahir'] = "Tempat Lahir" ;
                            $options['jekel'] = "Jenis Kelamin" ;
                                 
                            echo form_dropdown('c', $options, array('class' => 'form-control', ));
                        ?>
                        </div>
                    </div>
                    
                    <div class="input-group">
                        
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kelahiran'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">CARI</button>
                        </span>
                    </div>
                
            </div>
            </form>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>NIS/NIK Bayi</th>
        <th>Nama Lengkap Bayi</th>
		<th>Tanggal Lahir</th>
		<th>Tempat Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Berat Bayi (*KG)</th>
		
		<th>Waktu</th>
		<th>Panjang Bayi (*CM)</th>
		
		<th>Action</th>
            </tr><?php
            foreach ($kelahiran_data as $kelahiran)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kelahiran->nis_bayi ?></td>
            <td><?php echo $kelahiran->nama_depan_bayi." ".$kelahiran->nama_belakang_bayi ?></td>
			<td><?php echo $kelahiran->tgl_lahir ?></td>
			<td><?php echo $kelahiran->tpt_lahir ?></td>
			<td><?php echo $kelahiran->jekel ?></td>
			<td><?php echo $kelahiran->berat_bayi ?></td>
			
			<td><?php echo $kelahiran->waktu ?></td>
			<td><?php echo $kelahiran->panjang_bayi ?></td>
			
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kelahiran/read/'.$kelahiran->id_lahir),'Detail', 'class="btn btn-xs btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('kelahiran/update/'.$kelahiran->id_lahir),'Edit',  'class="btn btn-xs btn-primary"'); 
				echo ' | '; 
				echo anchor(site_url('kelahiran/delete/'.$kelahiran->id_lahir),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')", class="btn btn-xs btn-danger"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
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