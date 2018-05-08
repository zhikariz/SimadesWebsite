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
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
                <?php echo anchor(site_url('kepergian/create'),'Tambah Kepergian', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-2 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <form action="<?php echo site_url('kepergian/index'); ?>" class="form-inline" method="get">
            
                        
            <div class="col-md-7 text-right">
                    <div class="form-group">
                        <div class="col-md-3">
                        <?php
                            $options[NULL] = "*Pencarian berdasarkan*" ;
                            $options['nik_pergi'] = "NIK" ;
                            $options['alamat_tuju'] = "Alamat Asal" ;
                            $options['alasan'] = "Alasan" ;
                            $options['tgl_pergi'] = "Tanggal Pergi" ;
                            $options['pengikut'] = "Pengikut" ;
                                 
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
                                    <a href="<?php echo site_url('kepergian'); ?>" class="btn btn-default">Reset</a>
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
		<th>NIK Pergi</th>
        <th>Nama Lengkap</th>
		<th>Alamat Tuju</th>
        <th>Kode Pos</th>
        <th>Tanggal Pergi</th>

		<th>Alasan</th>
<!--        <th>Pengikut</th>
        <th>Daftar Pengikut</th> -->
		<th>Action</th>
            </tr><?php
            foreach ($kepergian_data as $kepergian)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kepergian->nik_pergi ?></td>
            <td><?php echo $kepergian->nama_depan." ".$kepergian->nama_belakang ?></td>
			<td><?php echo $kepergian->alamat_tuju ?></td>
            <td><?php echo $kepergian->kode_pos ?></td>
            <td><?php echo $kepergian->tgl_pergi ?></td>
			<td><?php echo $kepergian->alasan ?></td>
<!--            <td><?php echo $kepergian->pengikut ?></td>
            <td><?php 
                if($kepergian->pengikut == 'Keluarga'){
                    echo anchor(site_url('kepergian/listAnggota/'.$kepergian->no_kk),'Lihat Pengikut', 'class="btn btn-xs btn-info"'); 
                }
                else{
                    echo "";
                } 
            ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kepergian/read/'.$kepergian->id_pergi),'Detail', 'class="btn btn-xs btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('kepergian/update/'.$kepergian->id_pergi),'Edit', 'class="btn btn-xs btn-primary"'); 
				echo ' | '; 
				echo anchor(site_url('kepergian/delete/'.$kepergian->id_pergi),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')", class="btn btn-xs btn-danger"'); 
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