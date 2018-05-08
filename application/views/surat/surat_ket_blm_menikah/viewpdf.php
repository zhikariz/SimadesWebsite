
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
			<td width="60px"></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tempat/Tanggal Lahir </small></td><td width="12px"> : </td><td><small> <?php echo $ttl?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Jenis Kelamin </small></td><td width="12px"> : </td><td><small> <?php echo $jekel?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Pekerjaan </small></td><td width="12px"> : </td><td><small> <?php echo $kerja?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Pendidikan </small></td><td width="12px"> : </td><td><small> <?php echo $pendidikan?> </small></td>
			
		</tr>
		
		<tr>
			<td width="60px"></td><td width="170px"><small> Agama </small></td><td width="12px"> : </td><td><small> <?php echo $agama?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Status Perkawinan </small></td><td width="12px"> : </td><td><small> <?php echo $status?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KTP </small></td><td width="12px"> : </td><td><small> <?php echo $no_ktp?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Nomor KK </small></td><td width="12px"> : </td><td><small> <?php echo $no_kk?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px" valign="top"><small> Alamat </small></td><td width="12px" valign="top"> : </td><td align="justify"><small> <?php echo $alamat?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px" valign="top"><small> Keterangan </small></td><td width="12px" valign="top"> : </td><td align="justify"><small> <?php echo $keterangan?> </small></td>
			
		</tr>
	</table>
	
	<small>
	Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
	</small>
	<br>
	<br>
	<br>
	<br>
	<table width="100%">
		<tr> 
			<td width="100px"></td><td width="80px" align="left"><small><br> Pemegang Surat,</small></td><td width="100px" align="center"><small> <?php echo $desa?>, <?php echo $tgl_surat?> <br> <?php echo $jabatan?> <?php echo $desa?> </small></td>
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
			<td width="100px"><small></small></td><td width="80px" align="left"><small><b><u><?php echo $nama?></u></b></small></td><td width="100px" align="center"><small><b><u><?php echo $nama_pejabat?></u></b></small></td>
		</tr>
		
	</table>
</body>
</html>