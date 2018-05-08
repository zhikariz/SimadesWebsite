

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
        
        <!-- table content -->
        <div style="margin-top: 8px" id="message">
            <h4 align="center"><font color="red"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></font></h4>
        </div>
            	    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">NIS <?php echo form_error('nik_pendatang') ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nik_pendatang" id="nik_pendatang" maxlength="16" placeholder="Nomor Induk Sementara" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $nik_pendatang; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">NIK Asal <?php echo form_error('nik_asal') ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nik_asal" id="nik_asal" maxlength="16" placeholder="NIK Asal" onkeypress="return isNumberKeyTrue(event)"  value="<?php echo $nik_asal; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nomor KK Asal<?php echo form_error('no_kk_asal') ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no_kk_asal" id="no_kk_asal" maxlength="16" placeholder="Nomor KK Asal"maxlength="16" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $no_kk_asal; ?>"/>
                        </div>    
                    </div>
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nama Depan <?php echo form_error('nama_depan') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" />
                        </div>
                        <label for="varchar" class="col-sm-2 control-label">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="enum" class="col-sm-2 control-label">Jenis Kelamin <?php echo form_error('jekel') ?></label>
                        <div class="col-sm-3">
                        <?php
                            if($jekel=="Perempuan"){
                                $checkL = FALSE;
                                $checkP = TRUE;  
                                
                            }
                            else{
                                $checkL = TRUE;
                                $checkP = FALSE; 
                            }


                            //echo '<br>';
                            echo "<div class='radio'>";
                            echo "<label>";
                            echo form_radio('jekel', 'Laki-laki', $checkL).'Laki-laki';
                            echo "</label>";
                            echo "</div><div class='radio'>";
                            echo "<label>";
                            echo form_radio('jekel', 'Perempuan', $checkP).'Perempuan ';
                            echo "</label>";
                            echo "</div>";
                        ?>
                        </div>

                        <label for="int" class="col-sm-2 control-label">Agama <?php echo form_error('id_agama') ?></label>
                        <div class="col-sm-3">
                        <?php
                            $options1[NULL] = "---";
                             foreach ($list_agama as $agama)
                            {
                                $options1[$agama->id_agama] = $agama->agama;
                            }

                            
                    
                            echo form_dropdown('id_agama', $options1, $id_agama, array('class' => 'form-control'));
                        ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="int" class="col-sm-2 control-label">Golongan Darah <?php echo form_error('id_goldar') ?></label>
                        <div class="col-sm-3">
                        <?php
                            $options2[NULL] = "---";
                             foreach ($list_goldar as $goldar)
                            {
                                $options2[$goldar->id_goldar] = $goldar->goldar;
                            }

                            
                    
                            echo form_dropdown('id_goldar', $options2, $id_goldar, array('class' => 'form-control'));
                        ?>
                        </div>

                        <label for="int" class="col-sm-2 control-label">Status Perkawinan <?php echo form_error('id_stskawin') ?></label>
                        <div class="col-sm-3">
                        <?php
                            $options3[NULL] = "---";
                             foreach ($list_stkawin as $stkawin)
                            {
                                $options3[$stkawin->id_stkawin] = $stkawin->stkawin;
                            }

                            
                    
                            echo form_dropdown('id_stkawin', $options3, $id_stkawin, array('class' => 'form-control'));
                        ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Tempat Lahir <?php echo form_error('tempat_lhr') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tempat_lhr" id="tempat_lhr" placeholder="Tempat Lahir" value="<?php echo $tempat_lhr; ?>" />
                        </div>

                        <label for="date" class="col-sm-2 control-label">Tanggal Lahir <?php echo form_error('tanggal_lhr') ?></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="tanggal_lhr" id="tanggal_lhr" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lhr; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" />
                        </div>

                        <label for="varchar" class="col-sm-2 control-label">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Anak Ke <?php echo form_error('anak_ke') ?></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak Ke" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $anak_ke; ?>" />
                        </div>

                        <label for="int" class="col-sm-2 control-label">Pekerjaan <?php echo form_error('id_kerja') ?></label>
                        <div class="col-sm-3">
                        <?php
                            $options4[NULL] = "---";
                             foreach ($list_kerja as $kerja)
                            {
                                $options4[$kerja->id_kerja] = $kerja->kerja;
                            }

                            
                    
                            echo form_dropdown('id_kerja', $options4, $id_kerja, array('class' => 'form-control'));
                        ?>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="int" class="col-sm-2 control-label">Hubungan Keluarga <?php echo form_error('id_hubkel') ?></label>
                        <div class="col-sm-3">
                        <?php
                            $options5[NULL] = "---";
                             foreach ($list_hubkel as $hubkel)
                            {
                                $options5[$hubkel->id_hubkel] = $hubkel->hubkel;
                            }
                                                        
                            echo form_dropdown('id_hubkel', $options5, $id_hubkel, array('class' => 'form-control'));
                            
                        ?>
                        </div>

                        <label for="int" class="col-sm-2 control-label">Pendidikan <?php echo form_error('id_pendidikan') ?></label>
                        <div class="col-sm-3">
                        <?php
                            $options6[NULL] = "---";
                             foreach ($list_pendidikan as $pendidikan)
                            {
                                $options6[$pendidikan->id_pendidikan] = $pendidikan->pendidikan;
                            }

                            
                    
                            echo form_dropdown('id_pendidikan', $options6, $id_pendidikan, array('class' => 'form-control'));
                        ?>
                        </div>
                    </div>
                    <div class="form-group">
                    <hr>
                    </div>

	    <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Alamat Asal <?php echo form_error('alamat_asal') ?></label>
            <div class="col-sm-8">
                
                <textarea class="form-control" rows="3" name="alamat_asal" id="alamat_asal"><?php echo $alamat_asal; ?></textarea>
            </div>
        </div>
	    <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Alasan Pindah<?php echo form_error('alasan') ?></label>
            <div class="col-sm-3">
                
                <select name="alasan" id="alasan" class="form-control" onChange="findSelected()" >
                    <?php if($alasan=='Pindah Tempat Tinggal'){?>
                        <option value="Pindah Tempat Tinggal" selected>Pindah Tempat Tinggal</option>
                        <option value="Menumpang KK">Menumpang KK</option>
                    <?php }else if($alasan=='Menumpang KK'){?>
                        <option value="Pindah Tempat Tinggal">Pindah Tempat Tinggal</option>
                        <option value="Menumpang KK" selected>Menumpang KK</option>
                    <?php } else {?>
                        <option value="Pindah Tempat Tinggal">Pindah Tempat Tinggal</option>
                        <option value="Menumpang KK">Menumpang KK</option>
                    <?php }?>
                </select>
                
            </div>
            <label for="varchar" class="col-sm-2 control-label">Nomor KK Baru<?php echo form_error('no_kk') ?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="no_kk_baru" id="no_kk_baru" maxlength="16" placeholder="Nomor KK Baru"maxlength="16" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $no_kk_baru; ?>"/>
            </div>    
            <div class="col-sm-1">
                <button name="cari" class="btn btn-info" id="cari" disabled onclick="open_child('<?php echo site_url("lookup/datakk")?>','Look Up','1200','500'); return false;"> Cari KK </button>
            </div>
        </div>
        <div class="form-group">
           
            <div class="col-sm-5">
                                
            </div>
            <label for="varchar" class="col-sm-2 control-label">Alamat<?php echo form_error('alamat_baru') ?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="alamat_baru" id="alamat_baru" placeholder="Alamat Baru" value="<?php echo $alamat_baru; ?>"/>
            </div>    
            
        </div>
        <div class="form-group">
           
            <div class="col-sm-5">
                                
            </div>
            <label for="varchar" class="col-sm-2 control-label">RT<?php echo form_error('rt_baru') ?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="rt_baru" id="rt_baru" placeholder="RT Baru" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $rt_baru; ?>"/>
            </div>    
            
        </div>
        <div class="form-group">
           
            <div class="col-sm-5">
                                
            </div>
            <label for="varchar" class="col-sm-2 control-label">RW<?php echo form_error('rw_baru') ?></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="rw_baru" id="rw_baru" placeholder="RW Baru" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $rw_baru; ?>"/>
            </div>    
            
        </div>
        <div class="form-group">
           
            <div class="col-sm-5">
                                
            </div>
            <label for="varchar" class="col-sm-2 control-label">Kelurahan</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="kelurahan" id="kelurahan" value="<?php echo $kelurahan; ?>" readonly/>
            </div>    
            
        </div>
        <div class="form-group">
           
            <div class="col-sm-5">
                                
            </div>
            <label for="varchar" class="col-sm-2 control-label">Kecamatan</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="kecamatan" id="kecamatan" value="<?php echo $kecamatan; ?>" readonly/>
            </div>    
            
        </div>
        <div class="form-group">
           
            <div class="col-sm-5">
                                
            </div>
            <label for="varchar" class="col-sm-2 control-label">Kabupaten</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="<?php echo $kabupaten; ?>" readonly/>
            </div>    
            
        </div>
        <div class="form-group">
           
            <div class="col-sm-5">
                                
            </div>
            <label for="varchar" class="col-sm-2 control-label">Propinsi</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="propinsi" id="propinsi" value="<?php echo $propinsi; ?>" readonly/>
            </div>    
            
        </div>
        <div class="form-group">
                        
                    </div>
        <div class="form-group">
            <label for="varchar" class="col-sm-2 control-label">Pengikut<?php echo form_error('pengikut') ?></label>
            <div class="col-sm-8">
                
                
                    <?php if($pengikut=='Sendiri'){?>
                        <select name="pengikut" id="pengikut" class="form-control" >
                            <option>---</option>
                            <option value="Sendiri" selected>Sendiri</option>
                            <option value="Keluarga">Keluarga</option>
                        </select>
                    <?php }else if($pengikut=='Keluarga'){?>
                        <input type="text" name="pengikut" id="pengikut" class="form-control" value="Keluarga" readonly />
                    <?php } else {?>
                        <select name="pengikut" id="pengikut" class="form-control" >
                            <option>---</option>
                            <option value="Sendiri">Sendiri</option>
                            <option value="Keluarga">Keluarga</option>
                        </select>
                    <?php }?>
                
            </div>
        </div>
	    <input type="hidden" name="id_datang" value="<?php echo $id_datang; ?>" /> 

    
	    
	
        <!-- /.table content -->
        </div><!-- /.box-body -->
        
        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('kedatangan') ?>" class="btn btn-default">Batal</a>

        </div><!-- /.box-footer-->
        
        </form>
    </div><!-- /.box -->