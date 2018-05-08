
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            
            <h3 class="box-title"><?php echo $anchor?></h3>
            
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

        <!-- table content -->
        <div style="margin-top: 8px" id="message">
            <h4 align="center"><font color="red"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></font></h4>
        </div>

        <form action="<?php echo $action; ?>" method="post">
	    
        <div class="form-group">
            <label for="varchar">Nomor KK Baru<?php echo form_error('no_kk') ?></label>
            <input type="text" class="form-control" name="nokk" id="nokk" maxlength="16" value="<?php echo $no_kk; ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="varchar">NIK Asal<?php echo form_error('nik_asal') ?></label>
            <input type="text" class="form-control" name="nik_asal" id="nik_asal" placeholder="NIK Asal" onkeypress="return isNumberKeyTrue(event)" maxlength="16" size="16" value="<?php echo $nik_asal; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">NIK Baru/NIS<?php echo form_error('nik') ?></label>
            <input type="text" class="form-control" name="nik_pend" id="nik_pend" placeholder="NIK Baru" maxlength="16" size="16" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $nik; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Depan <?php echo form_error('nama_depan') ?></label>
            <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="<?php echo $nama_depan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Belakang <?php echo form_error('nama_belakang') ?></label>
            <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="<?php echo $nama_belakang; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jekel') ?></label>
            <!--<input type="text" class="form-control" name="jekel" id="jekel" placeholder="Jekel" value="<?php echo $jekel; ?>" />-->
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
        
        <div class="form-group">
            <label for="int">Agama <?php echo form_error('id_agama') ?></label>
            <!--<input type="text" class="form-control" name="id_agama" id="id_agama" placeholder="Id Agama" value="<?php echo $id_agama; ?>" /> -->
            <?php
                $options1[NULL] = "---";
                 foreach ($list_agama as $agama)
                {
                    $options1[$agama->id_agama] = $agama->agama;
                }

                
        
                echo form_dropdown('id_agama', $options1, $id_agama, array('class' => 'form-control'));
            ?>
        </div>
	    <div class="form-group">
            <label for="int">Golongan Darah <?php echo form_error('id_goldar') ?></label>
            <!--<input type="text" class="form-control" name="id_goldar" id="id_goldar" placeholder="Id Goldar" value="<?php echo $id_goldar; ?>" />-->
            <?php
                $options2[NULL] = "---";
                 foreach ($list_goldar as $goldar)
                {
                    $options2[$goldar->id_goldar] = $goldar->goldar;
                }

                
        
                echo form_dropdown('id_goldar', $options2, $id_goldar, array('class' => 'form-control'));
            ?>
        </div>
	    <div class="form-group">
            <label for="int">Status Perkawinan <?php echo form_error('id_stskawin') ?></label>
            <!--<input type="text" class="form-control" name="id_stskawin" id="id_stskawin" placeholder="Id Stskawin" value="<?php echo $id_stskawin; ?>" />-->
            <?php
                $options3[NULL] = "---";
                 foreach ($list_stkawin as $stkawin)
                {
                    $options3[$stkawin->id_stkawin] = $stkawin->stkawin;
                }

                
        
                echo form_dropdown('id_stkawin', $options3, $id_stkawin, array('class' => 'form-control'));
            ?>
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lhr') ?></label>
            <input type="text" class="form-control" name="tempat_lhr" id="tempat_lhr" placeholder="Tempat Lhr" value="<?php echo $tempat_lhr; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lhr') ?></label>
            <input type="date" class="form-control" name="tanggal_lhr" id="tanggal_lhr" placeholder="Tanggal Lhr" value="<?php echo $tanggal_lhr; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Anak Ke <?php echo form_error('anak_ke') ?></label>
            <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak Ke" onkeypress="return isNumberKeyTrue(event)" value="<?php echo $anak_ke; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pekerjaan <?php echo form_error('id_kerja') ?></label>
            <!--<input type="text" class="form-control" name="id_kerja" id="id_kerja" placeholder="Id Kerja" value="<?php echo $id_kerja; ?>" />-->
            <?php
                $options4[NULL] = "---";
                 foreach ($list_kerja as $kerja)
                {
                    $options4[$kerja->id_kerja] = $kerja->kerja;
                }

                
        
                echo form_dropdown('id_kerja', $options4, $id_kerja, array('class' => 'form-control'));
            ?>
        </div>
	    <div class="form-group">
            <label for="int">Hubungan Keluarga <?php echo form_error('id_hubkel') ?></label>
            <!--<input type="text" class="form-control" name="id_hubkel" id="id_hubkel" placeholder="Id Hubkel" value="<?php echo $id_hubkel; ?>" />-->
            <?php
                $options5[NULL] = "---";
                 foreach ($list_hubkel as $hubkel)
                {
                    $options5[$hubkel->id_hubkel] = $hubkel->hubkel;
                }
                                            
                echo form_dropdown('id_hubkel', $options5, $id_hubkel, array('class' => 'form-control'));
                
            ?>
        </div>
	    <div class="form-group">
            <label for="int">Pendidikan <?php echo form_error('id_pendidikan') ?></label>
            <!--<input type="text" class="form-control" name="id_pendidikan" id="id_pendidikan" placeholder="Id Pendidikan" value="<?php echo $id_pendidikan; ?>" />-->
            <?php
                $options6[NULL] = "---";
                 foreach ($list_pendidikan as $pendidikan)
                {
                    $options6[$pendidikan->id_pendidikan] = $pendidikan->pendidikan;
                }

                
        
                echo form_dropdown('id_pendidikan', $options6, $id_pendidikan, array('class' => 'form-control'));
            ?>
        </div>
	    
       

        <div class="form-group">
            
            <input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="IB" />
        </div>
	    <input type="hidden" name="nik" value="<?php echo $nik; ?>" /> 
	    <input type="submit" name="submit" value="Selesai" class="btn btn-primary" />
        <input type="submit" name="submit" value="Tambah Lagi" class="btn btn-success" />
        <input type="button" value="Cancel" onclick="history.back();" class="btn btn-default" />
	    
	</form>
<!-- /.table content -->
</div><!-- /.box-body -->
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

