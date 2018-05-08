

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

                <center><h4><b>DATA ORANG TUA </b></h4></center>

                <br>

        	    <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">NIK Ayah <?php echo form_error('nik_ayah') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" placeholder="NIK Ayah" value="<?php echo $nik_ayah; ?>" />

                    </div>


                    <label for="varchar"class="col-sm-2 control-label">NIK Ibu <?php echo form_error('nik_ibu') ?></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" value="<?php echo $nik_ibu; ?>"/>

                    </div>
                    <!--
                    <div class="col-sm-2">
                        <button class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapend/nik_ibu")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                    </div>
                    -->
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nomor KK Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk_ayah" id="no_kk_ayah" value="<?php echo $no_kk_ayah; ?>" />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Nomor KK Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk_ibu" id="no_kk_ibu" value="<?php echo $no_kk_ibu; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan_ayah" id="nama_depan_ayah" value="<?php echo $nama_depan_ayah; ?>"/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan_ibu" id="nama_depan_ibu" value="<?php echo $nama_depan_ibu; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_belakang_ayah" id="nama_belakang_ayah"  value="<?php echo $nama_belakang_ayah; ?>" />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_belakang_ibu" id="nama_belakang_ibu" value="<?php echo $nama_belakang_ibu; ?>"/>
                    </div>
                </div>


                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="kerja_ayah" id="kerja_ayah" value="<?php echo $kerja_ayah; ?>" />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="kerja_ibu" id="kerja_ibu" value="<?php echo $kerja_ibu; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tempat_lhr_ayah" id="tempat_lhr_ayah" value="<?php echo $tempat_lhr_ayah; ?>" />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tempat_lhr_ibu" id="tempat_lhr_ibu" value="<?php echo $tempat_lhr_ibu; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tanggal_lhr_ayah" id="tanggal_lhr_ayah" value="<?php echo $tanggal_lhr_ayah; ?>" />
                    </div>

                    <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tanggal_lhr_ibu" id="tanggal_lhr_ibu" value="<?php echo $tanggal_lhr_ibu; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar"class="col-sm-2 control-label">Alamat Ayah </label>
                    <div class="col-sm-3">
                        <textarea class="form-control" rows="3" name="alamat_ayah" id="alamat_ayah" ><?php echo $alamat_ayah; ?></textarea>

                    </div>

                    <label for="varchar"class="col-sm-2 control-label">Alamat Ibu </label>
                    <div class="col-sm-3">
                        <textarea class="form-control" rows="3" name="alamat_ibu" id="alamat_ibu" ><?php echo $alamat_ibu; ?></textarea>
                    </div>
                </div>


            <hr>



                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Saksi 1 </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_saksi1" id="nama_saksi1" value="<?php echo $nama_saksi1; ?>" />
                    </div>


                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Saksi 2 </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_saksi2" id="nama_saksi2" value="<?php echo $nama_saksi2; ?>" />
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
                <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                <a href="<?php echo $batal ?>" class="btn btn-default">Kembali</a>


            </div><!-- /.box-footer-->
        </form>
    </div><!-- /.Box Data Kelahiran -->
