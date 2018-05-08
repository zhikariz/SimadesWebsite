<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_desa_model');
        $this->load->model('Penduduk_model');
        
    }

	public function index()
	{
		date_default_timezone_get('Asia/Jakarta');
		$data_desa = $this->Profil_desa_model->get_by_id(1);
		if($data_desa){
			$data = array('logo' => $data_desa->image, 
							'nm_desa' => $data_desa->nm_desa,
							);	
		}
		else{
			$data = array('logo' => 'Tidak Ada Logo', 
				'nm_desa' => 'Nama Desa Belum Terdefinisi');
		}
		
		
		$this->load->view('login', $data);
		
	}
        
	public function login()
	{
		//update umur
		$penduduk = $this->Penduduk_model->get_all();
		foreach ($penduduk as $row) {
			$data_umur = array(
				'umur' => $this->hitung_umur($row->tanggal_lhr), 
				);

			$this->Penduduk_model->update($row->nik, $data_umur);
		}

		$data_desa = $this->Profil_desa_model->get_by_id(1);
		$logo = $data_desa->image;
		// Fungsi Login
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');
		if($valid->run()) {
			$this->simple_login->login($username, $password, base_url('dashboard'), base_url('auth'));
		}
        
        redirect('auth');
	}

	public function switch1()
	{
		$this->session->set_userdata('jabatan', $this->input->post('jabatan_switch'));
		redirect(base_url('dashboard'));
	}
        
    public function logout()
	{
        $this->simple_login->logout();
	}

	function hitung_umur($tanggal_lahir) {
        list($year,$month,$day) = explode("-",$tanggal_lahir);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;
        if ($month_diff < 0) $year_diff--;
            elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
        return $year_diff;
    }
}
