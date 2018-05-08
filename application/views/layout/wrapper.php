<?php
// Panggil semua file layout


require_once('head.php');

require_once('header.php');

if($this->session->userdata('jabatan')=='Kepala Desa'){
	require_once('sidebarKepdes.php');	
}
else if($this->session->userdata('jabatan')=='Admin'){
	require_once('sidebarAdmin.php');		
}
else{
	require_once('sidebar.php');	
}
require_once('konten.php');

require_once('footer.php');

?>