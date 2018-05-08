    <!-- Default box -->
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
   
    	           <input type="hidden" name="nik_meninggal" id="nik" value="<?php echo $nik_meninggal; ?>" />
            
                   <input type="hidden" name="tgl_meninggal" id="tgl_meninggal" value="<?php echo $tgl_meninggal; ?>" />
                
                   <input type="hidden" name="sebab" id="sebab" value="<?php echo $sebab; ?>" />
                
                   <input type="hidden" name="tpt_meninggal" id="tpt_meninggal" value="<?php echo $tpt_meninggal; ?>" />
                
                   <input type="hidden" name="menerangkan" id="menerangkan" value="<?php echo $menerangkan; ?>" />
                
                <h3>Data Orang Tua</h3>
                                                   
                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">NIK Ayah <?php echo form_error('nik_ayah') ?></label>
                    <div class="col-sm-3"> 
                        <input type="text" class="form-control" name="nik_ayah" id="nik_ayah" placeholder="NIK Ayah" value="<?php echo $nik_ayah; ?>" />
                        
                    </div>
                    
                    
                    <label for="varchar"class="col-sm-2 control-label">NIK Ibu <?php echo form_error('nik_ibu') ?></label>
                    <div class="col-sm-3"> 
                        <input type="text" class="form-control" name="nik_ibu" id="nik_ibu" placeholder="NIK Ibu" value="<?php echo $nik_ibu; ?>" />  
                        
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nomor KK Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk_ayah" id="no_kk_ayah" value="<?php echo $no_kk_ayah; ?>"/>
                    </div>          

                    <label for="varchar" class="col-sm-2 control-label">Nomor KK Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk_ibu" id="no_kk_ibu" value="<?php echo $no_kk_ibu; ?>"/>
                    </div>              
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan_ayah" id="nama_depan_ayah" value="<?php echo $nama_depan_ayah; ?>" />
                    </div> 

                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan_ibu" id="nama_depan_ibu" value="<?php echo $nama_depan_ibu; ?>"/>
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
                    <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="jekel_ayah" id="jekel_ayah" value="<?php echo $jekel_ayah; ?>"/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="jekel_ibu" id="jekel_ibu" value="<?php echo $jekel_ibu; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Agama Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="agama_ayah" id="agama_ayah" value="<?php echo $agama_ayah; ?>"  />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Agama Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="agama_ibu" id="agama_ibu" value="<?php echo $agama_ibu; ?>" />
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
                        <input type="text" class="form-control" name="tempat_lhr_ayah" id="tempat_lhr_ayah" value="<?php echo $tempat_lhr_ayah; ?>"/>
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tempat_lhr_ibu" id="tempat_lhr_ibu" value="<?php echo $tempat_lhr_ibu; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir Ayah </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tanggal_lhr_ayah" id="tanggal_lhr_ayah" value="<?php echo $tanggal_lhr_ayah; ?>" />
                    </div>

                    <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir Ibu </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tanggal_lhr_ibu" id="tanggal_lhr_ibu" value="<?php echo $tanggal_lhr_ibu; ?>"/>
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
        </div>

        <div class="box-body">
        <hr>
            <h3>Data Pelapor</h3>
    	    <div class="form-group">
                <label for="varchar" class="col-sm-2 control-label">Nik Pelapor <?php echo form_error('nik_pelapor') ?></label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nik_pelapor" id="nik_pelapor" placeholder="Nik Pelapor" value="<?php echo $nik_pelapor; ?>" />
                </div>
                <div class="col-sm-1">
                    <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapend/nik_pelapor")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                </div>

                <label for="varchar" class="col-sm-2 control-label">Agama Pelapor</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="agama_pelapor" id="agama_pelapor" value="<?php echo $agama_pelapor; ?>" />
                </div>
            </div>
            
                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nomor KK Pelapor</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="no_kk_pelapor" id="no_kk_pelapor" value="<?php echo $no_kk_pelapor; ?>" />
                        </div>              

                        <label for="varchar" class="col-sm-2 control-label">Pekerjaan Pelapor</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="kerja_pelapor" id="kerja_pelapor" value="<?php echo $kerja_pelapor; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nama Depan Pelapor</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_depan_pelapor" id="nama_depan_pelapor" value="<?php echo $nama_depan_pelapor; ?>" />
                        </div>   

                        <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Pelapor</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tempat_lhr_pelapor" id="tempat_lhr_pelapor" value="<?php echo $tempat_lhr_pelapor; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Nama Belakang Pelapor</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama_belakang_pelapor" id="nama_belakang_pelapor"  value="<?php echo $nama_belakang_pelapor; ?>"  />
                        </div>

                        <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir Pelapor</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="tanggal_lhr_pelapor" id="tanggal_lhr_pelapor" value="<?php echo $tanggal_lhr_pelapor; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin Pelapor</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="jekel_pelapor" id="jekel_pelapor" value="<?php echo $jekel_pelapor; ?>" />
                        </div>

                        <label for="varchar"class="col-sm-2 control-label">Alamat Pelapor</label>
                        <div class="col-sm-3">
                            <textarea class="form-control" rows="3" name="alamat_pelapor" id="alamat_pelapor"><?php echo $alamat_pelapor; ?></textarea>
                            
                        </div>
                    </div>

                    
        </div>

	    <div class="box-body">
        <hr>
                <h3>Data Saksi</h3>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">NIK Saksi1 <?php echo form_error('nik_saksi1') ?></label>
                    <div class="col-sm-2"> 
                        <input type="text" class="form-control" name="nik_saksi1" id="nik_saksi1" placeholder="NIK Saksi 1" value="<?php echo $nik_saksi1; ?>" />
                        
                    </div>
                    <div class="col-sm-1">
                        <button  class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapend/nik_saksi1")?>','Look Up','1200','500'); return false;"> Cari Data </button>
                    </div>
                    
                    <label for="varchar"class="col-sm-2 control-label">NIK Saksi2 <?php echo form_error('nik_saksi2') ?></label>
                    <div class="col-sm-2"> 
                        <input type="text" class="form-control" name="nik_saksi2" id="nik_saksi2" placeholder="NIK Saksi 2" value="<?php echo $nik_saksi2; ?>" />  
                        
                    </div>
                    <div class="col-sm-1">
                        <button class="btn btn-info" onclick="open_child('<?php echo site_url("lookup/datapend/nik_saksi2")?>','Look Up','1200','500'); return false;">Cari Data</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nomor KK Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk" id="no_kk_saksi1" value="<?php echo $no_kk_saksi1; ?>" readonly />
                    </div>          

                    <label for="varchar" class="col-sm-2 control-label">Nomor KK Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_kk" id="no_kk_saksi2" value="<?php echo $no_kk_saksi2; ?>" readonly />
                    </div>              
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan" id="nama_depan_saksi1" value="<?php echo $nama_depan_saksi1; ?>" readonly />
                    </div> 

                    <label for="varchar" class="col-sm-2 control-label">Nama Depan Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_depan" id="nama_depan_saksi2" value="<?php echo $nama_depan_saksi2; ?>" readonly />
                    </div>   
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang_saksi1" value="<?php echo $nama_belakang_saksi1; ?>" readonly />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Nama Belakang Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nama_belakang" id="nama_belakang_saksi2" value="<?php echo $nama_belakang_saksi2; ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="jekel_saksi1" id="jekel_saksi1" value="<?php echo $jekel_saksi1; ?>" readonly />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Jenis Kelamin Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="jekel_saksi2" id="jekel_saksi2" value="<?php echo $jekel_saksi2; ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Agama Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="agama_saksi1" id="agama_saksi1" value="<?php echo $agama_saksi1; ?>" readonly />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Agama Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="agama_saksi2" id="agama_saksi2" value="<?php echo $agama_saksi2; ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="kerja_saksi1" id="kerja_saksi1" value="<?php echo $kerja_saksi1; ?>" readonly />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Pekerjaan Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="kerja_saksi2" id="kerja_saksi2" value="<?php echo $kerja_saksi2; ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tempat_lhr_saksi1" id="tempat_lhr_saksi1" value="<?php echo $tempat_lhr_saksi1; ?>" readonly />
                    </div>

                    <label for="varchar" class="col-sm-2 control-label">Tempat Lahir Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tempat_lhr_saksi2" id="tempat_lhr_saksi2" value="<?php echo $tempat_lhr_saksi2; ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir Saksi1 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tanggal_lhr_saksi1" id="tanggal_lhr_saksi1" value="<?php echo $tanggal_lhr_saksi1; ?>" readonly />
                    </div>

                    <label for="varchar"class="col-sm-2 control-label">Tanggal Lahir Saksi2 </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="tanggal_lhr_saksi2" id="tanggal_lhr_saksi2" value="<?php echo $tanggal_lhr_saksi2; ?>" readonly />
                    </div>
                </div>

                <div class="form-group">
                    <label for="varchar"class="col-sm-2 control-label">Alamat Saksi1 </label>
                    <div class="col-sm-3">
                        <textarea class="form-control" rows="3" name="alamat_saksi1" id="alamat_saksi1" readonly><?php echo $alamat_saksi1; ?></textarea>
                    </div>

                    <label for="varchar"class="col-sm-2 control-label">Alamat Saksi2 </label>
                    <div class="col-sm-3">
                        <textarea class="form-control" rows="3" name="alamat_saksi2" id="alamat_saksi2" readonly><?php echo $alamat_saksi2; ?></textarea>
                    </div>
                </div>
                                   
            </div>
	    <input type="hidden" name="id_mati" value="<?php echo $id_mati; ?>" /> 
	    
	
<!-- /.table content -->
        
    
        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('kematian') ?>" class="btn btn-default">Batal</a>
        </div><!-- /.box-footer-->
    </form>
    
    </div><!-- /.box -->