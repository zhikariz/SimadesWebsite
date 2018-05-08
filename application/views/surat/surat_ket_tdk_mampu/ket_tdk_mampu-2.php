

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
            <center><h4><b>DATA ANAK/PEMOHON </b></h4></center>
            <br>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">NIK <?php echo form_error('nik') ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" maxlength="16" name="nik_pemohon" id="nik_pemohon" placeholder="NIK" value="<?php echo $nik_pemohon; ?>" />
                    </div>
                    <div class="col-sm-1">
                        <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/dataanak/".$no_kk_wali)?>','Look Up','1200','500'); return false;"> Cari Data </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">No KK <?php echo form_error('no_kk') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="no_kk" id="no_kk_anak" placeholder="Nomor KK" value="<?php echo $no_kk; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Depan <?php echo form_error('nama_depan') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_depan" id="nama_depan_anak" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang_anak" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                    <div class="col-sm-8">


                            <input type="text" class="form-control" name="tanggal_lhr" id="tanggal_lhr_anak" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lhr; ?>" readonly/>


                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir <?php echo form_error('tpt_lahir') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tempat_lhr" id="tempat_lhr_anak" placeholder="Tempat Lahir" value="<?php echo $tempat_lhr; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin <?php echo form_error('jekel') ?></label>
                    <div class="col-sm-8">

                        <input type="text" class="form-control" name="jekel" id="jekel_anak" placeholder="Jenis Kelamin" value="<?php echo $jekel; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan <?php echo form_error('kerja') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kerja" id="kerja_anak" placeholder="Pekerjaan" value="<?php echo $kerja; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Agama <?php echo form_error('agama') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="agama" id="agama_anak" placeholder="Agama" value="<?php echo $agama; ?>" readonly/>
                    </div>

                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Alamat <?php echo form_error('alamat') ?></label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="alamat" id="alamat_anak" placeholder="Alamat" readonly><?php echo $alamat; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Anak Ke <?php echo form_error('anak_ke') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="anak_ke" id="anak_ke_anak" placeholder="Anak Ke" value="<?php echo $anak_ke; ?>" readonly/>
                    </div>
                </div>


                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Sekolah/Kuliah di </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sekolah" id="sekolah" value="<?php echo $sekolah; ?>" />
                    </div>


                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Kelas/Semester </label>
                    <div class="col-sm-8">
                        <input type="input" class="form-control" name="kelas" id="kelas" value="<?php echo $kelas; ?>" />
                    </div>


                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Jurusan </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?php echo $jurusan; ?>" />
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
