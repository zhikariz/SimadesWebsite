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
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Nomor Surat <?php echo form_error('no_surat') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="Nomor Surat" value="<?php echo $no_surat; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">NIK <?php echo form_error('nik') ?></label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" maxlength="16" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" />
                </div>
                <div class="col-sm-1">
                    <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datasemua")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">No KK <?php echo form_error('no_kk') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Nomor KK" value="<?php echo $no_kk; ?>" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Nama Depan <?php echo form_error('nama_depan') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" readonly/>
                </div>
            </div>
          <div class="form-group">
                <label for="date" class="col-sm-2 control-label">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                <div class="col-sm-8">


                        <input type="text" class="form-control" name="tanggal_lhr" id="tanggal_lhr" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lhr; ?>" readonly/>


                </div>
            </div>
          <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Tempat Lahir <?php echo form_error('tpt_lahir') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="tempat_lhr" id="tempat_lhr" placeholder="Tempat Lahir" value="<?php echo $tempat_lhr; ?>" readonly/>
                </div>
            </div>
          <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin <?php echo form_error('jekel') ?></label>
                <div class="col-sm-8">

                    <input type="text" class="form-control" name="jekel" id="jekel" placeholder="Jenis Kelamin" value="<?php echo $jekel; ?>" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Pekerjaan <?php echo form_error('kerja') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="kerja" id="kerja" placeholder="Pekerjaan" value="<?php echo $kerja; ?>" readonly/>
                </div>
            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Agama <?php echo form_error('agama') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" readonly/>
                </div>

            </div>
            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Alamat <?php echo form_error('alamat') ?></label>
                <div class="col-sm-8">
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat" readonly><?php echo $alamat; ?></textarea>
                </div>
            </div>

          <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Anak Ke <?php echo form_error('anak_ke') ?></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak Ke" value="<?php echo $anak_ke; ?>" readonly/>
                </div>
            </div>

            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Permohonan <?php echo form_error('nama_usaha') ?></label>
                <div class="col-sm-8 ">
                  <input type="radio" name="ket_permohonan" value="Baru"> Baru &nbsp; &nbsp;
                  <input type="radio" name="ket_permohonan" value="Perpanjangan"> Perpanjangan &nbsp; &nbsp;
                  <input type="radio" name="ket_permohonan" value="Pergantian"> Pergantian
                </div>
            </div>

            <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Tanggal Berlaku <?php echo form_error('tgl_mulai') ?></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tanggal Mulai" value="<?php echo $tgl_mulai; ?>" readonly/>
                </div>

                <label for="varchar" class="col-sm-2 control-label">Sampai dengan <?php echo form_error('tgl_akhir') ?></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Berakhir" value="<?php echo $tgl_akhir; ?>" />
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







        <div class="box-footer">
            <button type="submit" class="btn btn-success"><?php echo $button ?> </button>
            <a href="<?php echo $batal ?>" class="btn btn-default">Kembali</a>


        </div><!-- /.box-footer-->
    </form>
</div><!-- /.Box Data Kelahiran -->
