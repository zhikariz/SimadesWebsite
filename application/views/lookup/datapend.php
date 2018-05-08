<head>
    <style>
    /*    css disini*/
        *{
            font-family: arial;font-size: small;
        }
        .mytable th{
            background-color: black;color: white;
        }
        .mytable tr:hover{
            background-color: lightblue;cursor: pointer;
        }
        .mytable td, th{
            padding: 5px
        }
    </style>
   <!-- Bootstrap 3.3.6 -->
  
</head>
<body>
    <form action="<?php echo site_url('lookup/datapend/'.$nik); ?>" class="form-inline" method="get">
        <?php
                            $options[NULL] = "*Pencarian berdasarkan*" ;
                            $options['penduduk.nik'] = "NIK" ;
                            $options['penduduk.no_kk'] = "Nomor KK" ;
                            $options['penduduk.nama_depan'] = "Nama Depan" ;
                            $options['penduduk.nama_belakang'] = "Nama Belakang" ;
                            $options['penduduk.jekel'] = "Jenis Kelamin" ;
                            $options['hubkel.hubkel'] = "Hubungan Keluarga" ;
                                 
                            echo form_dropdown('c', $options, array('class' => 'form-control', ));
                        ?>
        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">                        
        <button class="btn btn-primary" type="submit">CARI</button>                
        <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a type="button" href="<?php echo site_url('lookup/datapend/'.$nik); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          
    </form>
    
    <table class="mytable" width="100%" border="1">
        <thead>
                <tr>
            <th>No</th>        
            <th>NIK</th>
            <th>Nomor KK</th>
            
            <th>Nama Depan</th>
            <th>Nama Belakang</th>

            <th>Jekel</th>
            <th>Agama</th>
            <th>Pekerjaan</th>
            <th>Hubungan Keluarga</th>
            
            <th>Tempat Lhr</th>
            <th>Tanggal Lhr</th>
            <th>Alamat</th>
            
        
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($penduduk_data as $penduduk)
            {
                ?>
                <tr onclick="javascript:pilih(this);">
            <td><?php echo ++$start ?></td>
            <td><?php echo $penduduk->nik ?></td>
            <td><?php echo $penduduk->no_kk ?></td>
            
            <td><?php echo $penduduk->nama_depan ?></td>
            <td><?php echo $penduduk->nama_belakang ?></td>
            <td><?php echo $penduduk->jekel ?></td>

            <td><?php echo $penduduk->agama ?></td>
            <td><?php echo $penduduk->kerja ?></td>
            <td><?php echo $penduduk->hubkel ?></td>
            <td><?php echo $penduduk->tempat_lhr ?></td>
            <td><?php echo $penduduk->tanggal_lhr ?></td>
            <td><?php echo $penduduk->alamat.", RT ".$penduduk->rt."/RW ".$penduduk->rw.", Kel. ".$penduduk->kelurahan.", Kec. ".$penduduk->kecamatan.", Kab. ".$penduduk->kabupaten ?></td>
            
            
            
        </tr>
                <?php
            }
            ?>
        </tbody>    
    </table>
    <?php echo $pagination?>
</body>
<script>
    function pilih(row){
        

//        mendapatkan nama kota
        var nik=row.cells[1].innerHTML;
        var no_kk=row.cells[2].innerHTML;
        var nama_depan=row.cells[3].innerHTML;
        var nama_belakang=row.cells[4].innerHTML;
        var jekel=row.cells[5].innerHTML;
        var agama=row.cells[6].innerHTML;
        var kerja=row.cells[7].innerHTML;
        var tempat_lhr=row.cells[9].innerHTML;
        var tanggal_lhr=row.cells[10].innerHTML;
        var alamat=row.cells[11].innerHTML;
        
//        mendapatkan data ortu
        
          
        

//        memasukkan data dalam form
        window.opener.parent.document.getElementById("<?php echo $nik ?>").value = nik;
        window.opener.parent.document.getElementById("<?php echo $no_kk ?>").value = no_kk;
        window.opener.parent.document.getElementById("<?php echo $nama_depan ?>").value = nama_depan;
        window.opener.parent.document.getElementById("<?php echo $nama_belakang ?>").value = nama_belakang;
        window.opener.parent.document.getElementById("<?php echo $jekel ?>").value = jekel;
        
        window.opener.parent.document.getElementById("<?php echo $agama ?>").value = agama;
        window.opener.parent.document.getElementById("<?php echo $kerja ?>").value = kerja;
        window.opener.parent.document.getElementById("<?php echo $alamat ?>").value = alamat;
        window.opener.parent.document.getElementById("<?php echo $tempat_lhr ?>").value = tempat_lhr;
        window.opener.parent.document.getElementById("<?php echo $tanggal_lhr ?>").value = tanggal_lhr;
//        menutup pop up
        window.close();
    }
</script>