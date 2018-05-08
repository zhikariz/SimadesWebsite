
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
			<td width="60px"></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_meninggal?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tempat/Tanggal Lahir </small></td><td width="12px"> : </td><td><small> <?php echo $ttl_meninggal?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Jenis Kelamin </small></td><td width="12px"> : </td><td><small> <?php echo $jekel_meninggal?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Umur </small></td><td width="12px"> : </td><td><small> <?php echo $umur?> </small></td>
			
		</tr>
		
		<tr>
			<td width="60px"></td><td width="170px"><small> Agama </small></td><td width="12px"> : </td><td><small> <?php echo $agama_meninggal?> </small></td>
			
		</tr>
		
		<tr>
			<td width="60px"></td><td width="170px"><small> Alamat </small></td><td width="12px"> : </td><td><small> <?php echo $alamat_meninggal?> </small></td>
			
		</tr>
	</table>
	<small>
	Berdasarkan saksi-saksi : 
	</small>
	<table width="100%" style="margin-top: 10px; margin-bottom: 8px;">
		<tr>
			<td width="60px" align="right"><small>1.</small></td><td width="170px"><small>  Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_saksi1?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small>   Umur </small></td><td width="12px"> : </td><td><small> <?php echo $umur_saksi1?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small>  Alamat </small></td><td width="12px"> : </td><td><small> <?php echo $alamat_saksi1?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> </small></td><td width="12px">  </td><td><small>  </small></td>
			
		<tr>
			<td width="60px" align="right"><small>2.</small></td><td width="170px"><small> Nama </small></td><td width="12px"> : </td><td><small> <?php echo $nama_saksi2?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Umur </small></td><td width="12px"> : </td><td><small> <?php echo $umur_saksi2?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Alamat </small></td><td width="12px"> : </td><td><small> <?php echo $alamat_saksi2?> </small></td>
			
		</tr>
	</table>
	<small>
	Orang tersebut telah meninggal dunia pada : 
	</small>
	<table width="100%" style="margin-top: 10px; margin-bottom: 8px;">
		<tr>
			<td width="60px"></td><td width="170px"><small> Hari </small></td><td width="12px"> : </td><td><small> <?php echo $hari_meninggal?> </small></td>

		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Tanggal Meninggal </small></td><td width="12px"> : </td><td><small> <?php echo $tgl_meninggal?> </small></td>
			
		</tr>
		<tr>
			<td width="60px"></td><td width="170px"><small> Disebabkan </small></td><td width="12px"> : </td><td><small> <?php echo $sebab_meninggal?> </small></td>
			
		</tr>
		
	</table>
	<small>
	Demikian Surat Keterangan ini dibuat untuk dipergunakan sebagaimana semestinya
	</small>
	<br>
	<br>
	<br>
	<table width="100%">
		<tr> 
			<td width="100px"></td><td width="80px"></td><td width="100px" align="center"><small> <?php echo $desa?>, <?php echo $tgl_surat?> <br> <?php echo $jabatan?> <?php echo $desa?> </small></td>
		</tr>
		<tr> 
			<td width="100px"><small></small></td><td width="80px"></td><td width="100px" align="center"></td>
		</tr>
		<tr> 
			<td width="100px"></td><td width="80px"></td><td width="80px" align="center"></td>
		</tr>
		<tr> 
			<td width="100px"><small></small></td><td width="80px" align="left"></td><td width="100px" align="center"><br><br><br><br></td>
		</tr>
		<tr> 
			<td width="100px"><small></small></td><td width="80px" align="left"></td><td width="100px" align="center"><small><b><?php echo $nama_pejabat?></b></small></td>
		</tr>
		
	</table>
</body>
</html>