

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
                <?php echo anchor(site_url('kedatangan/create'),'Tambah Kedatangan', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-2 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <form action="<?php echo site_url('kedatangan/index'); ?>" class="form-inline" method="get">
            
                        
            <div class="col-md-7 text-right">
                    <div class="form-group">
                        <div class="col-md-3">
                        <?php
                            $options[NULL] = "*Pencarian berdasarkan*" ;
                            $options['nik_pendatang'] = "NIK" ;
                            $options['alamat_asal'] = "Alamat Asal" ;
                            $options['alasan'] = "Alasan" ;
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
                                    <a href="<?php echo site_url('kedatangan'); ?>" class="btn btn-default">Reset</a>
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
		<th>NIK Pendatang</th>
        <th>Nama Lengkap</th>
		<th>Alamat Asal</th>
		<th>Alasan</th>
        <th>Pengikut</th>
        <th>Daftar Pengikut</th>
		<th>Action</th>
            </tr><?php
            foreach ($kedatangan_data as $kedatangan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $kedatangan->nik_pendatang ?></td>
            <td><?php echo $kedatangan->nama_depan." ".$kedatangan->nama_belakang ?></td>
			<td><?php echo $kedatangan->alamat_asal ?></td>
			<td><?php echo $kedatangan->alasan ?></td>
            <td><?php echo $kedatangan->pengikut ?></td>
            <td><?php 
                if($kedatangan->pengikut == 'Keluarga'){
                    echo anchor(site_url('kedatangan/listAnggota/'.$kedatangan->no_kk),'Lihat Pengikut', 'class="btn btn-xs btn-info"'); 
                }
                else{
                    echo "";
                }
            ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kedatangan/read/'.$kedatangan->id_datang),'Detail',  'class="btn btn-xs btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('kedatangan/update/'.$kedatangan->id_datang),'Edit',  'class="btn btn-xs btn-primary"'); 
				echo ' | '; 
				echo anchor(site_url('kedatangan/delete/'.$kedatangan->id_datang),'Hapus','onclick="javasciprt: return confirm(\'Are You Sure ?\')", class="btn btn-xs btn-danger"'); 
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