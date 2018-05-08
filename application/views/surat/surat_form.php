<div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $anchor?></h3>
                    
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">NIK <?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" maxlength="16" value="<?php echo $nik; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Surat <?php echo form_error('tgl_surat') ?></label>
            <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" placeholder="Tgl Surat" value="<?php echo $tgl_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jenis Surat <?php echo form_error('jenis_surat') ?></label>
            <input type="text" class="form-control" name="jenis_surat" id="jenis_surat" placeholder="Jenis Surat" value="<?php echo $jenis_surat; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
            <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Berlaku <?php echo form_error('tgl_berlaku') ?></label>
            <input type="date" class="form-control" name="tgl_berlaku" id="tgl_berlaku" placeholder="Tgl Berlaku" value="<?php echo $tgl_berlaku; ?>" />
        </div>
	    <input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surat') ?>" class="btn btn-default">Batal</a>
        <button type="submit" class="btn btn-success">Cetak <i class="fa fa-file-pdf-o"></i></button> 
	</form>
 <!-- /.table content -->
                </div><!-- /.box-body -->
                <div class="box-footer">
                   
                </div><!-- /.box-footer-->
            </div><!-- /.box -->