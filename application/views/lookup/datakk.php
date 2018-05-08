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
   
</head>
<body>
    
    <table class="mytable" width="100%" border="1">
        <thead>
                <tr>
            <th>No</th>        
            <th>Nomor KK</th>
            <th>Nama Kepala Keluarga</th>
            <th>Alamat</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kelurahan</th>
                        
        
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($kk_data as $kk)
            {
                ?>
                <tr onclick="javascript:pilih(this);">
            <td><?php echo ++$start ?></td>
            <td><?php echo $kk->no_kk ?></td>
            <td><?php echo $kk->nama_depan." ".$kk->nama_belakang ?></td>
            <td><?php echo $kk->alamat ?></td>
            <td><?php echo $kk->rt ?></td>
            <td><?php echo $kk->rw ?></td>
            <td><?php echo $kk->kelurahan ?></td>
            
            
            
            
        </tr>
                <?php
            }
            ?>
        </tbody>    
    </table>
    
</body>
<script>
    function pilih(row){
//        mendapatkan nama kota
        var no_kk=row.cells[1].innerHTML;
        var alamat=row.cells[3].innerHTML;
        var rt=row.cells[4].innerHTML;
        var rw=row.cells[5].innerHTML;
        
        
//        memasukkan data dalam form
        window.opener.parent.document.getElementById("no_kk_baru").value = no_kk;
        window.opener.parent.document.getElementById("alamat_baru").value = alamat;
        window.opener.parent.document.getElementById("rt_baru").value = rt;
        window.opener.parent.document.getElementById("rw_baru").value = rw;
//        menutup pop up
        window.close();
    }
</script>