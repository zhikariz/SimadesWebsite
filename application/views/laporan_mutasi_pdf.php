
<html>
<head>
<title><?php echo $judul?></title>

    <link href="<?php echo base_url().'uploads/image/'.$logo_desa ?>" rel="shortcut icon">
	<link href="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />


</head>
<body>
	<!-- KOP SURAT -->
	<table width="100%">
		<tr>
			<th align="center"><h4><?php echo $judul?></h4></th>
		</tr>
	</table>
	 <br>
	<table width="100%">
		<tr>
			<td width="360px" align="left"></td>
			<td width="10px" align="left">DESA</td>
			<td width="15px" align="center">
				:
			</td>
			<td width="20px" align="left"><?php echo strtoupper($desa)?></td>
			<td width="290px" align="center"> </td>
		</tr>
		<tr>
			<td width="220px" align="left"></td>
			<td width="10px" align="left">KECAMATAN</td>
			<td width="15px" align="center">
				:
			</td>
			<td width="20px" align="left"><?php echo $kecamatan?></td>
			<td width="220px" align="center"> </td>
		</tr>
		<tr>
			<td width="220px" align="left"></td>
			<td width="10px" align="left">LAPORAN BULAN</td>
			<td width="15px" align="center">
				:
			</td>
			<td width="20px" align="left"><?php echo $bulan." ".$tahun?></td>
			<td width="220px" align="center"> </td>
		</tr>
	</table>

	<!-- ISI SURAT -->
	<br>
	<br>
	<table class="table-bordered" width="100%">
		<tr>
			<th align="center"><small>No.</small></th><th align="center"><small>Uraian</small></th><th align="center"><small>Laki-laki</small></th><th align="center"><small>Perempuan</small></th><th align="center"><small>Jumlah</small></th>
		</tr>
		<tr>
			<td align="center"><small>1.</small></td><td align="left"><small> Penduduk Awal Bulan</small></td><td align="center"><small><?php echo $laki_awal?></small></td><td align="center"><small><?php echo $perempuan_awal?></small></td><td align="center"><small><?php echo $jumlah_awal?></small></td>
		</tr>
		<tr>
			<td align="center"><small>2.</small></td><td align="left"><small> Kelahiran Bulan ini</small></td><td align="center"><small><?php echo $laki_lahir?></small></td><td align="center"><small><?php echo $perempuan_lahir?></small></td><td align="center"><small><?php echo $jumlah_lahir?></small></td>
		</tr>
		<tr>
			<td align="center"><small>3.</small></td><td align="left"><small> Kematian Bulan Ini</small></td><td align="center"><small><?php echo $laki_mati?></small></td><td align="center"><small><?php echo $perempuan_mati?></small></td><td align="center"><small><?php echo $jumlah_mati?></small></td>
		</tr>
		<tr>
			<td align="center"><small>4.</small></td><td align="left"><small> Pendatang Bulan Ini</small></td><td align="center"><small><?php echo $laki_datang?></small></td><td align="center"><small><?php echo $perempuan_datang?></small></td><td align="center"><small><?php echo $jumlah_datang?></small></td>
		</tr>
		<tr>
			<td align="center"><small>5.</small></td><td align="left"><small> Pindah Bulan Ini</small></td><td align="center"><small><?php echo $laki_pergi?></small></td><td align="center"><small><?php echo $perempuan_pergi?></small></td><td align="center"><small><?php echo $jumlah_pergi?></small></td>
		</tr>
		<tr>
			<td align="center"><small>6.</small></td><td align="left"><small> Penduduk Akhir Bulan Ini</small></td><td align="center"><small><?php echo $laki_akhir?></small></td><td align="center"><small><?php echo $perempuan_akhir?></small></td><td align="center"><small><?php echo $jumlah_akhir?></small></td>
		</tr>
	</table>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
	<br>
	<br>
	<table width="100%">
		<tr> 
			<td width="100px"></td><td width="80px" align="left"></td><td width="100px" align="center"><small> <?php echo $desa?>, <?php echo $tgl_surat?> <br> <?php echo $jabatan?> <?php echo $desa?> </small></td>
		</tr>
		<tr> 
			<td width="400px"><small></small></td><td width="80px"></td><td width="100px" align="center"></td>
		</tr>
		<tr> 
			<td width="320px"></td><td width="80px"></td><td width="80px" align="center"></td>
		</tr>
		<tr> 
			<td width="320px"><small></small></td><td width="80px" align="left"></td><td width="100px" align="center"><br><br><br><br><br></td>

		<tr> 
			<td width="320px"><small></small></td><td width="80px" align="left"></td><td width="100px" align="center"><small><b><u><?php echo $nama_pejabat?></u></b></small></td>
		</tr>
		
	</table>
</body>
</html>