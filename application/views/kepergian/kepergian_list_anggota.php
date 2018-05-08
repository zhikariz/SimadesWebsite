

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Pengikut</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post" >

        <div class="box-body">
        
        <!-- table content -->
      
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <h4 align="center"><font color="red"><?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></font></h4>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered table-striped mailbox-messages" style="margin-bottom: 10px" id="mytable">
            <thead>
                <tr>
                    <th><input type="checkbox" name="pilihsemua" id="pilihsemua"></th>
    		<th>NIK</th>
            <th>No KK</th>
    		<th>Nama Depan</th>
    		<th>Nama Belakang</th>
    		<th>Jenis kelamin</th>
    		
    		<th>Hubungan keluarga</th>
				
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($penduduk_data as $penduduk)
                {
                    ?>
                    <tr>
    			<td><input type="checkbox" class="pilih" name="list_nik[]" value="<?php echo $penduduk->nik ?>"></td>
    			<td><?php echo $penduduk->nik ?></td>
                <td><?php echo $penduduk->no_kk ?></td>
    			<td><?php echo $penduduk->nama_depan ?></td>
    			<td><?php echo $penduduk->nama_belakang ?></td>
    			<td><?php echo $penduduk->jekel ?></td>
    			
    			<td><?php echo $penduduk->hubkel ?></td>
    	   	
    			
    		      </tr>
            </tbody>
                <?php
            }
            ?>
        </table>
        <div class="row">
            
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary" style="width: 150px"> <?php echo $button; ?></button>
                <input type="button" value="Kembali" onclick="history.back();" class="btn btn-default" />
            </div>
            
        </div>
<!-- /.table content -->
        </div><!-- /.box-body -->
        </form>
        
        <div class="box-footer">
            
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

<script>
    
</script>


        




