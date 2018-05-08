<div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $anchor?></h3>
                    
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">

        <div class="row" style="margin-bottom: 10px">
            
            <div class="col-md-6 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <form action="<?php echo site_url('layanan/index'); ?>" class="form-inline" method="get">
            
                        
            <div class="col-md-6 text-right">
                    <div class="form-group">
                        <?php
                            $options[NULL] = "*Pencarian berdasarkan*" ;
                            $options['penduduk.nik'] = "NIK Penduduk" ;
                            $options['user.nip'] = "NIP Pejabat" ;
                            $options['penduduk.nama_depan'] = "Nama Penduduk" ;
                            $options['user.nama_depan_user'] = "Nama Pejabat" ;
                            
                                 
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
                                    <a href="<?php echo site_url('layanan'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                
            </div>
            </form>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Penduduk (NIK) </th>
		<th>Nama Pejabat (NIP) </th>
        <th>Layanan </th>
        <th>Waktu Layanan </th>
		
            </tr><?php
            foreach ($layanan_data as $layanan)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $layanan->nama_depan." ".$layanan->nama_belakang." ( ".$layanan->nik." )"; ?></td>
			<td><?php echo $layanan->nama_depan_user." ".$layanan->nama_belakang_user." ( ".$layanan->nip." )"; ?></td>
            <td><?php echo $layanan->nama_layanan?></td>
            <td><?php echo $layanan->waktu_layanan?></td>
			
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

</div><!-- /.box-body -->
                <div class="box-footer">
                   
                </div><!-- /.box-footer-->
            </div><!-- /.box -->