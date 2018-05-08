<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 function __construct()
    {
        parent::__construct();
        $this->load->model('Kelahiran_model');
        $this->load->model('Kematian_model');
        $this->load->model('Kedatangan_model');
        $this->load->model('Kepergian_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Dusun_model');
        
        
    }

	public function index()
	{
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));


        
        $jmllahir = $this->Kelahiran_model->total_rows($q);
        $jmlmati = $this->Kematian_model->total_rows($q);
        $jmldatang = $this->Kedatangan_model->total_rows($q);
        $jmlpergi = $this->Kepergian_model->total_rows($q);
		
        //Grafik Jekel
        $laki = $this->Penduduk_model->jumlah_jekel('Laki-laki');
        $perempuan = $this->Penduduk_model->jumlah_jekel('Perempuan');
        $dewasa = $this->Penduduk_model->stat_umur_dewasa();
        $lansia = $this->Penduduk_model->stat_umur_lansia();
      
		$data = array(
			'titlenav' => 'SIMADES || Beranda',
			'title' => 'Beranda',
        	'anchor' => '',
            //Statistik Mutasi
            'jmllahir' => $jmllahir,
            'jmlmati' => $jmlmati,
            'jmldatang' => $jmldatang,
            'jmlpergi' => $jmlpergi,
            //Statistik Jekel
            'laki'  => $laki,
            'perempuan' => $perempuan,
            //Statistik Hubkel
            'data_hubkel' => $this->Penduduk_model->stat_hubkel(),
            'data_pekerjaan' => $this->Penduduk_model->stat_pekerjaan(),
            'data_dusun' => $this->Penduduk_model->stat_dusun(),
            'data_pendidikan' => $this->Penduduk_model->stat_pendidikan(),
            'balita' => $this->Penduduk_model->stat_umur_balita()->jumlah,
            'anak' => $this->Penduduk_model->stat_umur_anak()->jumlah,
            'remaja' => $this->Penduduk_model->stat_umur_remaja()->jumlah,
            'dewasa' => $this->Penduduk_model->stat_umur_dewasa()->jumlah,
            'lansia' => $this->Penduduk_model->stat_umur_lansia()->jumlah,
            'manula' => $this->Penduduk_model->stat_umur_manula()->jumlah,
                           
            'isi' => 'dashboard',
		);
    
    $this->load->view('layout/wrapper', $data);
			
	}

    public function index2()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $list_dusun = $this->Dusun_model->get_all();
        

        if($this->input->post('submit')){
            $dusun = $this->input->post('id_dusun');
            $tahun = $this->input->post('tahun');
            $nama_dusun = $this->Dusun_model->get_by_id($dusun);
            //Grafik Jekel
            $laki = $this->Penduduk_model->jumlah_jekel2('Laki-laki', $dusun, $tahun);
            $perempuan = $this->Penduduk_model->jumlah_jekel2('Perempuan', $dusun, $tahun);
            
          
            $data = array(
                'titlenav' => 'SIMADES || Beranda',
                'title' => 'Beranda',
                'anchor' => '',
                'list_dusun' => $list_dusun,
                'set_dusun' => set_value('id_dusun'),
                'set_tahun' => set_value('tahun'),
                'post' => TRUE,
                'dusun' => $nama_dusun->dusun,

                //Statistik Jekel
                'laki'  => $laki->jumlah,
                'perempuan' => $perempuan->jumlah,
                //Statistik Hubkel
                'data_hubkel' => $this->Penduduk_model->stat_hubkel2($dusun, $tahun),
                'data_pekerjaan' => $this->Penduduk_model->stat_pekerjaan2($dusun, $tahun),
                'data_pendidikan' => $this->Penduduk_model->stat_pendidikan2($dusun, $tahun),
                'balita' => $this->Penduduk_model->stat_umur_balita2($dusun, $tahun)->jumlah,
                'anak' => $this->Penduduk_model->stat_umur_anak2($dusun, $tahun)->jumlah,
                'remaja' => $this->Penduduk_model->stat_umur_remaja2($dusun, $tahun)->jumlah,
                'dewasa' => $this->Penduduk_model->stat_umur_dewasa2($dusun, $tahun)->jumlah,
                'lansia' => $this->Penduduk_model->stat_umur_lansia2($dusun, $tahun)->jumlah,
                'manula' => $this->Penduduk_model->stat_umur_manula2($dusun, $tahun)->jumlah,
                //'id_user' => $this->session->userdata('id_user'),
                //'nama_user' => $this->session->userdata('nama_user'),
                //'jabatan' => $this->session->userdata('jabatan'),
                //'nama_desa' => $this->session->userdata('nama_desa'),
                //'logo_desa' => $this->session->userdata('logo_desa'),
                
                'isi' => 'dashboard2',
            );
        
            $this->load->view('layout/wrapper', $data);


        }
        else
        {            
          
            $data = array(
                'titlenav' => 'SIMADES || Beranda',
                'title' => 'Beranda',
                'anchor' => '',
                'list_dusun' => $list_dusun,
                'set_dusun' => set_value('id_dusun'),
                'set_tahun' => set_value('tahun'),
                'post' => FALSE,
                
                'isi' => 'dashboard2',
            );
        
            $this->load->view('layout/wrapper', $data);
        }
        
                
        
            
    }
   
}
