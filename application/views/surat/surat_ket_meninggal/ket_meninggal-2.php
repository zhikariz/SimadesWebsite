

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
        <center><h4><b>DATA MENINGGAL</b></h4></center>
        <br>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
            <div class="box-body">

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">NIK Meninggal<?php echo form_error('nik') ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" maxlength="16" name="nik_meninggal" id="nik_meninggal" placeholder="NIK Meninggal" value="<?php echo $nik_meninggal; ?>" />
                    </div>
                    <div class="col-sm-1">
                        <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datamati")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">No KK <?php echo form_error('no_kk') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="no_kk" id="no_kk_mati" placeholder="Nomor KK" value="<?php echo $no_kk_mati; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Depan <?php echo form_error('nama_depan') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_depan" id="nama_depan_mati" placeholder="Nama Depan" value="<?php echo $nama_depan_mati; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang_mati" placeholder="Nama Belakang" value="<?php echo $nama_belakang_mati; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                    <div class="col-sm-8">


                            <input type="text" class="form-control" name="tanggal_lhr" id="tanggal_lhr_mati" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lhr_mati; ?>" readonly/>


                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir <?php echo form_error('tpt_lahir') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tempat_lhr" id="tempat_lhr_mati" placeholder="Tempat Lahir" value="<?php echo $tempat_lhr_mati; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin <?php echo form_error('jekel') ?></label>
                    <div class="col-sm-8">

                        <input type="text" class="form-control" name="jekel" id="jekel_mati" placeholder="Jenis Kelamin" value="<?php echo $jekel_mati; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan <?php echo form_error('kerja') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="kerja" id="kerja_mati" placeholder="Pekerjaan" value="<?php echo $kerja_mati; ?>" readonly/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Agama <?php echo form_error('agama') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="agama" id="agama_mati" placeholder="Agama" value="<?php echo $agama_mati; ?>" readonly/>
                    </div>

                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Alamat <?php echo form_error('alamat') ?></label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="3" name="alamat" id="alamat_mati" placeholder="Alamat" readonly><?php echo $alamat_mati; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Anak Ke <?php echo form_error('anak_ke') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="anak_ke" id="anak_ke_mati" placeholder="Anak Ke" value="<?php echo $anak_ke_mati; ?>" readonly/>
                    </div>
                </div>

                <div class="form-group">

                    <label for="varchar" class="col-sm-2 control-label">Nama Saksi 2 </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_saksi2" id="nama_saksi2" value="<?php echo $nama_saksi2; ?>" />
                    </div>


                </div>

                <div class="form-group">

                    <label for="varchar" class="col-sm-2 control-label">Umur Saksi 2 </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="umur_saksi2" id="umur_saksi2" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $umur_saksi2; ?>" />
                    </div>


                </div>

                <div class="form-group">

                    <label for="varchar" class="col-sm-2 control-label">Alamat Saksi 2 </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="alamat_saksi2" id="alamat_saksi2" value="<?php echo $alamat_saksi2; ?>" />
                    </div>


                </div>


                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Hari Meninggal </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="hari_meninggal" id="hari_meninggal" onkeypress="return isNumberKey(event)" value="<?php echo $hari_meninggal; ?>" />
                    </div>


                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Tanggal Meninggal </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="tgl_meninggal" id="tgl_meninggal" value="<?php echo $tgl_meninggal; ?>" />
                    </div>


                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Sebab Meninggal </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="sebab_meninggal" id="sebab_meninggal" value="<?php echo $sebab_meninggal; ?>" />
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
