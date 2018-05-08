<div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Jenis Surat</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <!-- table content -->
                    <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                            
                    <th>Jenis Surat</th>
                    <th>Format Nomor Surat</th>
                    <th>Action</th>
                        </tr><?php
                        foreach ($jenis_surat_data as $jenis_surat)
                        {
                            ?>
                            <tr>
                        
                        <td><?php echo $jenis_surat->jenis_surat ?></td>
                        <td><?php echo $jenis_surat->format_no_surat ?></td>

                        <td style="text-align:center" width="200px">
                            <?php 
                            
                            echo anchor(site_url('surat/update_no_surat/'.$jenis_surat->id_jenis),'Ubah', 'class="btn btn-xs btn-primary"'); 
                            
                            ?>
                        </td>
                    </tr>
                            <?php
                        }
                        ?>
                    </table>
                <!-- /.table content -->
                </div><!-- /.box-body -->
            <div class="box-footer">
                   <a href="<?php echo site_url('surat') ?>" class="btn btn-default">Kembali</a>
            </div><!-- /.box-footer-->
            </div><!-- /.box -->