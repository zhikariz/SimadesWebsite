
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
			<td width="60px"></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_wali?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> NIK </small></td><td width="12px"> : </td><td><small> <?php echo $nik_wali?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tempat/Tanggal Lahir </small></td><td width="12px"> : </td><td><small> <?php echo $ttl_wali?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Jenis Kelamin </small></td><td width="12px"> : </td><td><small> <?php echo $jekel_wali?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Status </small></td><td width="12px"> : </td><td><small> <?php echo $status_wali?> </small></td>
			
		</tr>
		
		<tr>
			<td width="60px"></td><td width="170px"><small> Agama </small></td><td width="12px"> : </td><td><small> <?php echo $agama_wali?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Pekerjaan </small></td><td width="12px"> : </td><td><small> <?php echo $pekerjaan_wali?> </small></td>
			
		</tr>
		
		<tr>
			<td width="60px"></td><td width="170px" valign="top"><small> Alamat </small></td><td width="12px" valign="top"> : </td><td align="justify"><small> <?php echo $alamat_wali?> </small></td>
			
		</tr>
	</table>
	<small>
	<?php echo "<p style='font-size:12; text-align: justify; text-indent: 0.5in;'> Adalah benar-benar warga penduduk Desa Mangunrejo yang berdomisili di alamat tersebut di atas dengan kondisi ekonomi yang tidak mampu.</p>";?> 
	</small>
	<table width="100%" style="margin-top: 10px; margin-bottom: 8px;">
		<tr>
			<td width="60px"></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_pemohon?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tempat/Tanggal Lahir </small></td><td width="12px"> : </td><td><small> <?php echo $ttl_pemohon?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Jenis Kelamin </small></td><td width="12px"> : </td><td><small> <?php echo $jekel_pemohon?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Sekolah/Kuliah di </small></td><td width="12px"> : </td><td><small> <?php echo $sekolah?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Kelas/Semester </small></td><td width="12px"> : </td><td><small> <?php echo $kelas?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Jurusan </small></td><td width="12px"> : </td><td><small> <?php echo $jurusan?> </small></td>
			
		</tr>
	</table>
	<small>
	<?php echo "<p style='font-size:12; text-align: justify; text-indent: 0.5in;'> Surat ini dipergunakan untuk keperluan Persyaratan untuk mendapatkan keringanan  biaya di $sekolah.</p>";?> 
	</small>
	
	
	<small>
	Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana semestinya
	</small>
	<br>
	<br>
	<br>
	<br>
	<table width="100%">
		<tr> 
			<td width="100px"></td><td width="80px" align="left"><small><br> Pemohon,</small></td><td width="100px" align="center"><small> <?php echo $desa?>, <?php echo $tgl_surat?> <br> <?php echo $jabatan?> <?php echo $desa?> </small></td>
		</tr>
		<tr> 
			<td width="100px"><small></small></td><td width="80px"></td><td width="100px" align="center"></td>
		</tr>
		<tr> 
			<td width="100px"></td><td width="80px"></td><td width="80px" align="center"></td>
		</tr>
		<tr> 
			<td width="100px"><small></small></td><td width="80px" align="left"></td><td width="100px" align="center"><br><br><br><br></td>

		<tr> 
			<td width="100px"><small></small></td><td width="80px" align="left"><small><b><u><?php echo $nama_pemohon?></u></b></small></td><td width="100px" align="center"><small><b><u><?php echo $nama_pejabat?></u></b></small></td>
		</tr>
		
	</table>
</body>
</html>