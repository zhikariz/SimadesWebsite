

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Penduduk</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

        <!-- table content -->

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3">
                <?php echo anchor(site_url('penduduk/createKK'),'Buat KK Baru', 'class="btn btn-primary"'); ?>
                <?php echo anchor(site_url('penduduk/import'),'Import EXCEL', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-2 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <form action="<?php echo site_url('penduduk/index'); ?>" class="form-inline" method="get">


            <div class="col-md-7 text-right">
                    <div class="form-group">
                        <div class="col-md-3">
                        <?php
                            $options[NULL] = "*Pencarian berdasarkan*" ;
                            $options['penduduk.nik'] = "NIK" ;
                            $options['penduduk.no_kk'] = "No KK";
                            $options['penduduk.nama_depan'] = "Nama Depan" ;
                            $options['penduduk.nama_belakang'] = "Nama Belakang" ;
                            $options['penduduk.jekel'] = "Jenis Kelamin" ;
                            $options['penduduk.hubkel'] = "Hubungan Keluarga" ;

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
                                    <a href="<?php echo site_url('penduduk'); ?>" class="btn btn-default">Reset</a>
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
        <th>No KK</th>
		<th>Nama Depan</th>
		<th>Nama Belakang</th>
		<th>Jenis kelamin</th>

		<th>Hubungan keluarga</th>
	    <th>Daftar Keluarga</th>

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
	        <td><?php  echo anchor(site_url('penduduk/listkk/'.$penduduk->no_kk),'Lihat KK', 'class="btn btn-xs btn-info"'); ?></td>

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