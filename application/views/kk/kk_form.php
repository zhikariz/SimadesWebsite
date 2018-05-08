<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $anchor?></h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
    <div class="box-body">

        <div style="margin-top: 8px" id="message">
            <h4 align="center"><font color="red"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></font></h4>
        </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Nomor KK <?php echo form_error('no_kk') ?></label>
            <input type="text" class="form-control" name="nokk" id="nokk" maxlength="16" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $no_kk; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
        <div class="form-group">
            <label for="int">Dusun <?php echo form_error('id_dusun') ?></label>
            <!--<input type="text" class="form-control" name="id_hubkel" id="id_hubkel" placeholder="Id Hubkel" value="<?php echo $id_hubkel; ?>" />-->
            <?php
                $options5[NULL] = "---";
                 foreach ($list_dusun as $dusun)
                {
                    $options5[$dusun->id_dusun] = $dusun->dusun;
                }
                                            
                echo form_dropdown('id_dusun', $options5, $id_dusun, array('class' => 'form-control'));
                
            ?>
        </div>
	    <div class="form-group">
            <label for="varchar">RT <?php echo form_error('rt') ?></label>
            <input type="text" class="form-control" name="rt" id="rt" placeholder="RT" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $rt; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">RW <?php echo form_error('rw') ?></label>
            <input type="text" class="form-control" name="rw" id="rw" placeholder="RW" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $rw; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">Kabupaten <?php echo form_error('kabupaten') ?></label>
            <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">Propinsi <?php echo form_error('propinsi') ?></label>
            <input type="text" class="form-control" name="propinsi" id="propinsi" placeholder="Propinsi" value="<?php echo $propinsi; ?>" readonly/>
        </div>
	    
	    <input type="hidden" name="no_kk" value="<?php echo $no_kk; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penduduk') ?>" class="btn btn-default">Batal</a>
	</form>
      <!-- /.table content -->
    </div><!-- /.box-body -->
    <div class="box-footer">
                   
    </div><!-- /.box-footer-->
</div><!-- /.box -->