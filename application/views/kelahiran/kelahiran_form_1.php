

    <!-- Box Data Kelahiran -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo $anchor?></h3>
            (Step 1 dari 2)
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
                    <label for="varchar" class="col-sm-2 control-label">Nomor KK Bayi <?php echo form_error('no_kk_bayi') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" maxlength="16" name="no_kk" id="no_kk" placeholder="Nomor KK Bayi" onkeypress="return isNumberKeyTrue(event)"
                        value="<?php echo $no_kk; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">NIS Bayi <?php echo form_error('nis_bayi') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" maxlength="16" name="nis_bayi" id="nis_bayi" placeholder="NIS Bayi" onkeypress="return isNumberKeyTrue(event)"
                        value="<?php echo $nis_bayi; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Depan <?php echo form_error('nama_depan_bayi') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_depan_bayi" id="nama_depan_bayi" placeholder="Nama Depan" value="<?php echo $nama_depan_bayi; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang <?php echo form_error('nama_belakang_bayi') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama_belakang_bayi" id="nama_belakang_bayi" placeholder="Nama Belakang" value="<?php echo $nama_belakang_bayi; ?>" />
                    </div>
                </div>
        	    <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
                    <div class="col-sm-8">
                        <div class="input-group date">
                            
                            <input type="date" class="form-control pull-right" name="tgl_lahir" id="datepicker" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                        
                    </div>
                </div>
        	    <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir <?php echo form_error('tpt_lahir') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="tpt_lahir" id="tpt_lahir" placeholder="Tempat Lahir" value="<?php echo $tpt_lahir; ?>" />
                    </div>
                </div>
        	    <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin <?php echo form_error('jekel') ?></label>
                    <div class="col-sm-10">
                        
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
                </div>
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Agama <?php echo form_error('agama') ?></label>
                    <div class="col-sm-8">
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
                    <label for="varchar" class="col-sm-2 control-label">Berat Bayi <?php echo form_error('berat_bayi') ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="berat_bayi" id="berat_bayi" placeholder="Berat Bayi" onkeypress="return isNumberKeyTrue(event)"
                        value="<?php echo $berat_bayi; ?>" />
                    </div>
                    <label>*KG</label>
                </div>
        	    <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Anak Ke <?php echo form_error('anak_ke') ?></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak Ke" onkeypress="return isNumberKeyTrue(event)"
                         value="<?php echo $anak_ke; ?>" />
                    </div>
                </div>
        	    <div class="form-group">
                    <label for="time" class="col-sm-2 control-label">Waktu <?php echo form_error('waktu') ?></label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo $waktu; ?>" />
                    </div>
                </div>
        	    <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Panjang Bayi <?php echo form_error('panjang_bayi') ?></label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="panjang_bayi" id="panjang_bayi" placeholder="Panjang Bayi"   onkeypress="return isNumberKeyTrue(event)"
                        value="<?php echo $panjang_bayi; ?>" />
                    </div>
                    <label>*CM</label>
                </div>
            
            
            
                                   
            </div>
        	    
        	    <input type="hidden" name="id_lahir" value="<?php echo $id_lahir; ?>" /> 
        
            
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('kelahiran') ?>" class="btn btn-default">Batal</a>
                 
                
            </div><!-- /.box-footer-->
        </form>
    </div><!-- /.Box Data Kelahiran -->