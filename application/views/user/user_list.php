


    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Akun</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

        <!-- table content -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('user/create'),'Tambah', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('user'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-striped" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Username</th>
		<th>Nama Depan</th>
		<th>Nama Belakang</th>
		<th>Jabatan</th>
        <th>NIP</th>
		<th>Status</th>
        <th></th>
		<th>Action</th>
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $user->username ?></td>
			
			<td><?php echo $user->nama_depan_user ?></td>
			<td><?php echo $user->nama_belakang_user ?></td>
			<td><?php echo $user->jabatan ?></td>
            <td><?php echo $user->nip ?></td>
			<td><?php echo $user->aktif ?></td>
            <td border="0"><?php
                if($user->aktif=='Aktif'){
                    echo anchor(site_url('user/non_aktif/'.$user->id_user),'Non Aktif-kan', 'class="btn btn-xs btn-danger"');
                }
                else{
                    echo anchor(site_url('user/aktif/'.$user->id_user),'Aktif-kan', 'class="btn btn-xs btn-success"');   
                }
                ?>
            </td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('user/read/'.$user->id_user),'Detail', 'class="btn btn-xs btn-success"'); 
				echo ' | '; 
				echo anchor(site_url('user/update/'.$user->id_user),'Edit', 'class="btn btn-xs btn-primary"'); 
				
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
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

