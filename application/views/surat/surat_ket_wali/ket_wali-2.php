

    <!-- Box Data Kelahiran -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $anchor?></h3>
            (Step 2 dari 2)
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
            <div class="box-body">

                <center><h4><b>DATA PENGANTIN </b></h4></center>

                <br>

        	    <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">NIK Perempuan<?php echo form_error('nik_perempuan') ?></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" maxlength="16" name="nik_perempuan" id="nik_perempuan" placeholder="NIK Perempuan" value="<?php echo $nik_perempuan; ?>" />
                    </div>
                    <div class="col-sm-1">
                        <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapengantin/perempuan")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">NIK Laki<?php echo form_error('nik_laki') ?></label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" maxlength="16" name="nik_laki" id="nik_laki" placeholder="NIK Laki-laki" value="<?php echo $nik_laki; ?>" />
                    </div>
                    <div class="col-sm-1">
                        <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapengantin/laki")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">No KK Perempuan<?php echo form_error('no_kk_perempuan') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk_perempuan" id="no_kk_perempuan" placeholder="Nomor KK Perempuan" value="<?php echo $no_kk_perempuan; ?>" readonly/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">No KK Laki<?php echo form_error('no_kk_laki') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk_laki" id="no_kk_laki" placeholder="Nomor KK Laki-laki" value="<?php echo $no_kk_laki; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Perempuan<?php echo form_error('nama_depan_perempuan') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan_perempuan" id="nama_depan_perempuan" placeholder="Nama Depan" value="<?php echo $nama_depan_perempuan; ?>" readonly/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Laki<?php echo form_error('nama_depan_laki') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan_laki" id="nama_depan_laki" placeholder="Nama Depan" value="<?php echo $nama_depan_laki; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang Perempuan<?php echo form_error('nama_belakang_perempuan') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_belakang_perempuan" id="nama_belakang_perempuan" placeholder="Nama Belakang" value="<?php echo $nama_belakang_perempuan; ?>" readonly/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang Laki<?php echo form_error('nama_belakang_laki') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_belakang_laki" id="nama_belakang_laki" placeholder="Nama Belakang" value="<?php echo $nama_belakang_laki; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="text" class="col-sm-2 control-label">Tanggal Lahir Perempuan<?php echo form_error('tgl_lahir_perempuan') ?></label>
                    <div class="col-sm-3">

                        <input type="text" class="form-control" name="tanggal_lhr_perempuan" id="tanggal_lhr_perempuan" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lhr_perempuan; ?>" readonly/>

                    </div>

                    <label for="text" class="col-sm-2 control-label">Tanggal Lahir Laki<?php echo form_error('tgl_lahir_laki') ?></label>
                    <div class="col-sm-3">

                        <input type="text" class="form-control" name="tanggal_lhr_laki" id="tanggal_lhr_laki" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lhr_laki; ?>" readonly/>

                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Perempuan <?php echo form_error('tpt_lahir') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tempat_lhr_perempuan" id="tempat_lhr_perempuan" placeholder="Tempat Lahir" value="<?php echo $tempat_lhr_perempuan; ?>" readonly/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Laki <?php echo form_error('tpt_lahir') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tempat_lhr_laki" id="tempat_lhr_laki" placeholder="Tempat Lahir" value="<?php echo $tempat_lhr_laki; ?>" readonly/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan Perempuan<?php echo form_error('kerja') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="kerja_perempuan" id="kerja_perempuan" placeholder="Pekerjaan" value="<?php echo $kerja_perempuan; ?>" readonly/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan Laki<?php echo form_error('kerja') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="kerja_laki" id="kerja_laki" placeholder="Pekerjaan" value="<?php echo $kerja_laki; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Agama Perempuan<?php echo form_error('agama') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="agama_perempuan" id="agama_perempuan" placeholder="Agama" value="<?php echo $agama_perempuan; ?>" readonly/>
                    </div>

                   <label for="varchar" class="col-sm-2 control-label">Agama Laki<?php echo form_error('agama') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="agama_laki" id="agama_laki" placeholder="Agama" value="<?php echo $agama_laki; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Alamat Perempuan<?php echo form_error('alamat') ?></label>
                    <div class="col-sm-3">
                        <textarea class="form-control" rows="3" name="alamat_perempuan" id="alamat_perempuan" placeholder="Alamat" readonly><?php echo $alamat_perempuan; ?></textarea>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Alamat Laki<?php echo form_error('alamat') ?></label>
                    <div class="col-sm-3">
                        <textarea class="form-control" rows="3" name="alamat_laki" id="alamat_laki" placeholder="Alamat" readonly><?php echo $alamat_laki; ?></textarea>
                    </div>
                </div>


            <hr>



                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Alasan Menjadi Wali</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="alasan" id="alasan" value="<?php echo $alasan; ?>" />
                    </div>


                </div>


                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Pejabat Penandatangan <?php echo form_error('id_user') ?></label>
                    <div class="col-sm-8">
                        <?php
                        $options1[NULL] = "---";
                         foreach ($data_pejabat as $pejabat)
                        {
                            $options1[$pejabat->id_user] = $pejabat->nama_depan_user." ".$pejabat->nama_belakang_user." (".$pejabat->jabatan.")";
                        }



                        echo form_dropdown('id_user', $options1, $id_user, array('class' => 'form-control'));
                        ?>
                    </div>

                </div>

            </div>

            <input type="hidden" name="no_surat" value="<?php echo $no_surat?>">
            <input type="hidden" name="nik" value="<?php echo $nik?>">

            <div class="box-footer">
                <button type="submit" class="btn btn-success"><?php echo $button ?> </button> 
                <a href="<?php echo $batal ?>" class="btn btn-default">Kembali</a>


            </div><!-- /.box-footer-->
        </form>
    </div><!-- /.Box Data Kelahiran -->
