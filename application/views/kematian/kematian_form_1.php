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
                <label for="varchar" class="col-sm-2 control-label">NIK Meninggal <?php echo form_error('nik_meninggal') ?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nik_meninggal" id="nik" placeholder="NIK Meninggal" value="<?php echo $nik_meninggal; ?>" />
                </div>
                <div class="col-sm-1">
                    <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapend/nik")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                </div>

                <label for="varchar" class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="agama" id="agama" value="<?php echo $agama; ?>" readonly />
                </div>
            </div>
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nomor KK </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="no_kk" id="no_kk" value="<?php echo $no_kk; ?>" readonly />
                        </div>

                        <label for="varchar" class="col-sm-2 control-label">Pekerjaan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kerja" id="kerja" value="<?php echo $kerja; ?>" readonly />
                        </div>              
                    </div>

                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nama Depan</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_depan" id="nama_depan" value="<?php echo $nama_depan; ?>" readonly />
                        </div>   

                        <label for="varchar" class="col-sm-2 control-label">Tempat Lahir</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tempat_lhr" id="tempat_lhr" value="<?php echo $tempat_lhr; ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nama Belakang</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang"  value="<?php echo $nama_belakang; ?>" readonly />
                        </div>

                        <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tanggal_lhr" id="tanggal_lhr" value="<?php echo $tanggal_lhr; ?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="jekel" id="jekel" value="<?php echo $jekel; ?>" readonly />
                        </div>

                        <label for="varchar"class="col-sm-2 control-label">Alamat </label>
                        <div class="col-sm-3">
                            <textarea class="form-control" rows="3" name="alamat" id="alamat" readonly><?php echo $alamat; ?></textarea>
                            
                        </div>
                    </div>

                    
    	    <div class="form-group">
                <label for="date" class="col-sm-2 control-label">Tanggal Meninggal <?php echo form_error('tgl_meninggal') ?></label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" name="tgl_meninggal" id="tgl_meninggal" placeholder="Tanggal Meninggal" value="<?php echo $tgl_meninggal; ?>" />
                </div>    
            </div>
    	    <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Sebab Meninggal<?php echo form_error('sebab') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="sebab" id="sebab" placeholder="Sebab"  value="<?php echo $sebab; ?>" />
                </div> 
            </div>
    	    <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Tempat Meninggal <?php echo form_error('tpt_meninggal') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="tpt_meninggal" id="tpt_meninggal" placeholder="Tempat Meninggal" value="<?php echo $tpt_meninggal; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Yang Menerangkan <?php echo form_error('tpt_meninggal') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="menerangkan" id="menerangkan" placeholder="Yang Menerangkan" value="<?php echo $menerangkan; ?>" />
                </div>
            </div>
	    </div>
	    <input type="hidden" name="id_mati" value="<?php echo $id_mati; ?>" /> 
	    
	
<!-- /.table content -->
        
    
        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('kematian') ?>" class="btn btn-default">Batal</a>
        </div><!-- /.box-footer-->
    </form>
    
    </div><!-- /.box -->