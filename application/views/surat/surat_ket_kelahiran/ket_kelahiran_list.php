<div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $anchor?></h3>
                    
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
        <div class="row" style="margin-bottom: 5px; margin-left: 5px;">

            <a href="<?php echo site_url($tambah)?>" style="width: 180px;margin-bottom: 2px" class="btn btn-social bg-maroon"> <i class="fa fa-file-text-o"></i>Tambah Pengajuan</a>
         
        </div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-2">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <form action="<?php echo site_url('surat/index'); ?>" class="form-inline" method="get">
            
                        
            <div class="col-md-6 text-right">
                    <div class="form-group">
                        <?php
                            $options[NULL] = "*Pencarian berdasarkan*" ;
                            $options['nik'] = "NIK" ;
                            $options['tgl_surat'] = "Tanggal Surat" ;
                            $options['jenis_surat'] = "Jenis Surat" ;
                            
                                 
                            echo form_dropdown('c', $options, array('class' => 'form-control', ));
                        ?>
                    </div>
                    
                    <div class="input-group">
                        
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('surat'); ?>" class="btn btn-default">Reset</a>
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
		<th>NIK</th>
		<th>Tanggal Surat</th>
		<th>Jenis Surat</th>
		<th>No Surat</th>
		
		<th>Action</th>
            </tr><?php
            foreach ($surat_data as $surat)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php //echo $surat->nik ?></td>
			<td><?php echo $surat->tgl_surat ?></td>
			<td><?php echo $surat->jenis_surat ?></td>
			<td><?php echo $surat->no_surat ?></td>
			
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('surat/cetak_ket_kelahiran/'.$surat->kd_surat),'CETAK', 'class="btn btn-xs btn-success"'); 
				
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
                <a href="<?php echo site_url('surat') ?>" class="btn btn-default">Kembali</a>
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


