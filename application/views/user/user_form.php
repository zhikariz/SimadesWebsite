
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form <?php echo $button ?> Akun</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

        <!-- table content -->  

        <div style="margin-top: 8px" id="message">
            <h4 align="center"><font color="red"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></font></h4>
        </div>     
        
        <form action="<?php echo $action; ?>" method="post">
	    

        <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div> 
	    <div class="form-group">
            <label for="varchar">Nama Depan <?php echo form_error('nama_depan') ?></label>
            <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php //echo form_error('id_jabatan') ?></label>
        <?php
                echo '<br>';
                foreach ($list_jabatan as $jabatan)
                {
                    echo form_checkbox('id_jabatan[]', $jabatan->id_jabatan);
                    echo ' '.$jabatan->jabatan;
                    echo '<br>';
                }

                //$kategori = array('initial', 'nama');
        
                //echo form_dropdown('id_jabatan', $options, $id_jabatan, array('class'=>'form-control'));
            ?>
        
            <!--
            <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" placeholder="Id Jabatan" value="<?php echo $id_jabatan; ?>" /> -->
        </div>
        <div class="form-group">
            <label for="varchar">NIP (Nomor Induk Pegawai) <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" maxlength="18" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $nip; ?>" />
        </div> 
	    <!--<div class="form-group">
            <label for="varchar">Aktif <?php //echo form_error('aktif') ?></label> -->
            <input type="hidden" class="form-control" name="aktif" id="aktif" placeholder="Aktif" value="Aktif" />
        <!--</div>-->
	    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Batal</a>
	</form>
<!-- /.table content -->
</div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

