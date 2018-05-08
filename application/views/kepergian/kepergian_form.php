    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $anchor?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>

        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
        <div class="box-body">
        <div style="margin-top: 8px" id="message">
            <h4 align="center"><font color="red"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></font></h4>
        </div>
        
	    <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">NIK Pergi <?php echo form_error('nik_pergi') ?></label>
            <div class="col-sm-7">
                <input type="text" class="form-control" name="nik_pergi" id="nik" placeholder="NIK Pergi" value="<?php echo $nik_pergi; ?>" />
            </div>
            <div class="col-sm-1">
                <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapend/nik_pergi")?>','Look Up','1200','500'); return false;"> Cari Data </button>
            </div>
        </div>
        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Nomor KK </label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?php echo $no_kk; ?>" readonly />
            </div>              
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Nama Depan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="<?php echo $nama_depan; ?>" readonly />
                </div>   
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Nama Belakang</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang"  value="<?php echo $nama_belakang; ?>" readonly />
            </div>
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="jekel" id="jekel" value="<?php echo $jekel; ?>" readonly />
            </div>
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Agama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="agama" id="agama" value="<?php echo $agama; ?>" readonly />
            </div>
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Pekerjaan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kerja" id="kerja" value="<?php echo $kerja; ?>" readonly />
            </div>
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Tempat Lahir</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="tempat_lhr" id="tempat_lhr" value="<?php echo $tempat_lhr; ?>" readonly />
            </div>
        </div>

        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Tanggal Lahir</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="tanggal_lhr" id="tanggal_lhr" value="<?php echo $tanggal_lhr; ?>" readonly />
            </div>
        </div>
        
        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Alamat </label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="3" name="alamat" id="alamat" readonly><?php echo $alamat; ?></textarea>
                            
            </div>
        </div>

	    <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Alamat Tujuan <?php echo form_error('alamat_tuju') ?></label>
            <div class="col-sm-8">
                
                <textarea class="form-control" rows="3" name="alamat_tuju" id="alamat_tuju"><?php echo $alamat_tuju; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Kode Pos <?php echo form_error('kode_pos') ?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kode_pos" id="kode_pos" maxlength="5" placeholder="Kode Pos" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $kode_pos; ?>" />
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Tanggal Pindah <?php echo form_error('tgl_pergi') ?></label>
            <div class="col-sm-8">
                <input type="date" class="form-control" name="tgl_pergi" id="tgl_pergi" value="<?php echo $tgl_pergi; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Alasan <?php echo form_error('alasan') ?></label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="alasan" id="alasan" placeholder="Alasan" value="<?php echo $alasan; ?>" />
            </div>
        </div>
        
	    <input type="hidden" name="id_pergi" value="<?php echo $id_pergi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kepergian') ?>" class="btn btn-default">Batal</a>
	
<!-- /.table content -->
        </div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
        </form>
    </div><!-- /.box -->
    