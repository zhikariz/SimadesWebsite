
<html>
<head>
<title><?php echo $judul?></title>

    <link href="<?php echo base_url().'uploads/image/'.$logo_desa ?>" rel="shortcut icon">

</head>
<body>
	<!-- KOP SURAT -->
	<table width="100%">
		<tr>
			<td width="60px" align="left"><img src="<?php echo base_url().'uploads/image/'.$logo_desa ?>" width="12%"></td>
			<td width="30" align="center">
				 <font face="Arial"><h3> PEMERINTAH KABUPATEN <?php echo $kabupaten?> <br>
				 KECAMATAN <?php echo $kecamatan?>  <br> </h3>
				 <h2><b> DESA <?php echo strtoupper($desa)?> </b></h2> 
				 <i>Alamat : <?php echo $alamat?> Telp. <?php echo $no_telp?> Kode Pos <?php echo $kode_pos?></i> </font>
			</td>
			<td width="25" align="center"> </td>
		</tr>
	</table>

	<hr size="12px">

	<!-- ISI SURAT -->
	
	<table width="100%">
		<tr>
			<td align="center"><font face="Arial"><h3><u><?php echo $judul?></u></h3></font></td>
		</tr>
		<tr>
			<td align="center"><small> Nomor : <?php echo $no_surat?> </small></td>
		</tr>
	</table>
	<br>
	<small>
	Yang bertanda tangan di bawah ini : 
	</small>
	<table width="100%" style="margin-top: 6px; margin-bottom: 8px;">
		
		<tr>
			
			<td width="60px"></td><td width="170px"><small>Nama</small></td><td width="12px"> : </td><td><small><?php echo $nama_pejabat?></small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small>NIP</small></td><td width="12px"> : </td><td><small><?php echo $nip_pejabat?></small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small>Jabatan</small></td><td width="12px"> : </td><td><small><?php echo $jabatan?></small></td>
			
		</tr>

	</table>
	<small>
	Dengan ini menerangkan bahwa : 
	</small>
	<table width="100%" style="margin-top: 10px; margin-bottom: 8px;">
		<tr>
			<td width="60px"></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_anak?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tempat/Tanggal Lahir </small></td><td width="12px"> : </td><td><small> <?php echo $ttl_anak?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Jenis Kelamin </small></td><td width="12px"> : </td><td><small> <?php echo $jekel_anak?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Pekerjaan </small></td><td width="12px"> : </td><td><small> <?php echo $kerja_anak?> </small></td>
			
		</tr>
		
		<tr>
			<td width="60px"></td><td width="170px"><small> Agama </small></td><td width="12px"> : </td><td><small> <?php echo $agama_anak?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KTP </small></td><td width="12px"> : </td><td><small> <?php echo $no_ktp_anak?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KK </small></td><td width="12px"> : </td><td><small> <?php echo $no_kk_anak?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px" valign="top"><small> Alamat </small></td><td width="12px" valign="top"> : </td><td align="justify"><small> <?php echo $alamat_anak?> </small></td>
			
		</tr>
	</table>
	<small>
	Adalah anak ke 1 yang sah dari pernikahan seorang laki-laki (Ayah) : 
	</small>
	<table width="100%" style="margin-top: 10px; margin-bottom: 8px;">
		<tr>
			<td width="60px"></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_ayah?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tempat/Tanggal Lahir </small></td><td width="12px"> : </td><td><small> <?php echo $ttl_ayah?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Pekerjaan </small></td><td width="12px"> : </td><td><small> <?php echo $kerja_ayah?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KTP </small></td><td width="12px"> : </td><td><small> <?php echo $no_ktp_ayah?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KK </small></td><td width="12px"> : </td><td><small> <?php echo $no_kk_ayah?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px" valign="top"><small> Alamat </small></td><td width="12px" valign="top"> : </td><td align="justify"><small> <?php echo $alamat_ayah?> </small></td>
			
		</tr>
	</table>
	<small>
	Dan seorang perempuan (Ibu) : 
	</small>
	<table width="100%" style="margin-top: 10px; margin-bottom: 8px;">
		<tr>
			<td width="60px"></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_ibu?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tempat/Tanggal Lahir </small></td><td width="12px"> : </td><td><small> <?php echo $ttl_ibu?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Pekerjaan </small></td><td width="12px"> : </td><td><small> <?php echo $kerja_ibu?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KTP </small></td><td width="12px"> : </td><td><small> <?php echo $no_ktp_ibu?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KK </small></td><td width="12px"> : </td><td><small> <?php echo $no_kk_ibu?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px" valign="top"><small> Alamat </small></td><td width="12px" valign="top"> : </td><td align="justify"><small> <?php echo $alamat_ibu?> </small></td>
			
		</tr>
	</table>
	<small>
	Demikian Surat Keterangan ini dibuat untuk keperluan Untuk melamar pekerjaan
	</small>
	<br>
	<table width="100%">
		<tr> 
			<td width="100px"></td><td width="80px"></td><td width="100px" align="center"><small> <?php echo $desa?>, <?php echo $tgl_surat?> <br> <?php echo $jabatan?> <?php echo $desa?> </small></td>
		</tr>
		<tr> 
			<td width="100px"><small>Saksi-saksi :</small></td><td width="80px"></td><td width="100px" align="center"></td>
		</tr>
		<tr> 
			<td width="100px"></td><td width="80px"></td><td width="80px" align="center"></td>
		</tr>
		<tr> 
			<td width="100px"><small>1. <?php echo $nama_saksi1?></small></td><td width="80px" align="left">( ....................... )</td><td width="100px" align="center"></td>
		</tr>
		<tr> 
			<td width="100px"><small>2. <?php echo $nama_saksi2?></small></td><td width="80px" align="left">( ....................... )</td><td width="100px" align="center"><small><b><?php echo $nama_pejabat?></b></small></td>
		</tr>
		
	</table>
</body>
</html>