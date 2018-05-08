            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $anchor?></h3>

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">




                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    <input type="hidden" name="id_desa" value="<?php echo $id_desa; ?>" />
            	    <div class="form-group">
                        <label for="varchar">Kode Desa <?php echo form_error('kd_desa') ?></label>
                        <input type="text" class="form-control" name="kd_desa" id="kd_desa" maxlength="7" placeholder="Kode Desa" onkeypress="return isNumberKeyTrue(event)"
                          value="<?php echo $kode_desa; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Desa <?php echo form_error('nm_desa') ?></label>
                        <input type="text" class="form-control" name="nm_desa" id="nm_desa" placeholder="Nama Desa" value="<?php echo $nm_desa; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
                        <input type="text" class="form-control" name="kecamatan" id="kecamatan"   placeholder="Kecamatan" onkeypress="return isNumberKey(event)" value="<?php echo $kecamatan; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Kabupaten <?php echo form_error('kabupaten') ?></label>
                        <input type="text" class="form-control" name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?php echo $kabupaten; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Propinsi <?php echo form_error('propinsi') ?></label>
                        <input type="text" class="form-control" name="propinsi" id="propinsi" placeholder="Propinsi" value="<?php echo $propinsi; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Nama Kepdes <?php echo form_error('nm_kepdes') ?></label>
                        <input type="text" class="form-control" name="nm_kepdes" id="nm_kepdes" placeholder="Nama Kepdes" onkeypress="return isNumberKey(event)" value="<?php echo $nm_kepdes; ?>" readonly/>
                    </div>
            	    <div class="form-group">
                        <label for="varchar">NIP Kepdes <?php echo form_error('nip_kepdes') ?></label>
                        <input type="text" class="form-control" name="nip_kepdes" id="nip_kepdes" placeholder="NIP Kepdes" value="<?php echo $nip_kepdes; ?>" readonly/>
                    </div>
            	    <div class="form-group">
                        <label for="alamat_desa">Alamat Desa <?php echo form_error('alamat_desa') ?></label>
                        <textarea class="form-control" rows="3" name="alamat_desa" id="alamat_desa" placeholder="Alamat Desa"><?php echo $alamat_desa; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat_desa">Nomor Telepon <?php echo form_error('no_telp') ?></label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" onkeypress="return isNumberKeyTrue(event)"
                         value="<?php echo $no_telp; ?>"/>
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Kode Pos <?php echo form_error('kode_pos') ?></label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" onkeypress="return isNumberKeyTrue(event)"
                        value="<?php echo $kode_pos; ?>" />
                    </div>
                    <div class="form-group">
                       <label for="varchar">Logo Desa <?php echo form_error('logo_desa') ?></label>
                       <input type="file" name="logo_desa" id="logo_desa" />
                        <br>
                    <?php
                    if($logo_desa)
                            {
                    ?>
                            <img src="<?php echo base_url().'uploads/image/'.$logo_desa ?>" height='160px' width='160px' />

                    <?php
                             }

                    ?>
                    </div>
            	    <input type="hidden" name="kode_desa" value="<?php echo $kode_desa; ?>" />
            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
            	    <a href="<?php echo site_url('dashboard') ?>" class="btn btn-default">Kembali</a>
                    <?php if($empty=="ada"){?>
                    <a href="<?php echo site_url('profil_desa/truncate') ?>" class="btn btn-warning">Hapus Profil</a>
                    <?php } ?>
            	    </form>
                <!-- /.table content -->
                </div><!-- /.box-body -->
                <div class="box-footer">

                </div><!-- /.box-footer-->
            </div><!-- /.box -->
