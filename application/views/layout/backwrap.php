<?php
// Panggil semua file layout


$this->load->view('layout/head.php');

$this->load->view('layout/header.php');

if($this->session->userdata('jabatan')=='Kepala Desa'){
	$this->load->view('layout/sidebarKepdes.php');	
}
else if($this->session->userdata('jabatan')=='Admin'){
	$this->load->view('layout/sidebarAdmin.php');		
}
else{
	$this->load->view('layout/sidebar.php');	
}
$this->load->view('layout/konten.php');

$this->load->view('layout/footer.php');

?>