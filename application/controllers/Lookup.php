<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lookup extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
        $this->load->model('Kepergian_model');
    }

   
    public function datapend($nik)
    {
        
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Penduduk_model->get_limit_data($config['per_page'], $start, $c, $q);

        if($nik=='nik_ayah'){
            //$penduduk=$this->Penduduk_model->get_all();
            
            $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'id'                => $nik,
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_ayah',                       
                'no_kk'             => 'no_kk_ayah',
                'nama_depan'        => 'nama_depan_ayah',
                'nama_belakang'     => 'nama_belakang_ayah',
                'jekel'             => 'jekel_ayah',
                'id_agama'     => 'id_agama_ayah',
                'agama'             => 'agama_ayah',
                'kerja'         => 'kerja_ayah',
                'alamat'            => 'alamat_ayah',
                'tempat_lhr'        => 'tempat_lhr_ayah',
                'tanggal_lhr'       => 'tanggal_lhr_ayah',
                'start'   => $start,
            );
        }
        else if($nik=='nik_ibu'){
            //$penduduk=$this->Penduduk_model->get_all();
            $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'id'                => $nik,
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_ibu',                       
                'no_kk'             => 'no_kk_ibu',
                'nama_depan'        => 'nama_depan_ibu',
                'nama_belakang'     => 'nama_belakang_ibu',
                'jekel'             => 'jekel_ibu',
                'id_agama'      => 'id_agama_ibu',
                'agama'             => 'agama_ibu',
                'kerja'         => 'kerja_ibu',
                'alamat'            => 'alamat_ibu',
                'tempat_lhr'        => 'tempat_lhr_ibu',
                'tanggal_lhr'       => 'tanggal_lhr_ibu',
                'start'   => $start,
            );
        }
        else if($nik=='nik_pelapor'){
            //$penduduk=$this->Penduduk_model->get_all();
            $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'id'                => $nik,
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_pelapor',                       
                'no_kk'             => 'no_kk_pelapor',
                'nama_depan'        => 'nama_depan_pelapor',
                'nama_belakang'     => 'nama_belakang_pelapor',
                'jekel'             => 'jekel_pelapor',
                'id_agama'   => 'id_agama_pelapor',
                'agama'             => 'agama_pelapor',
                'kerja'         => 'kerja_pelapor',
                'alamat'            => 'alamat_pelapor',
                'tempat_lhr'        => 'tempat_lhr_pelapor',
                'tanggal_lhr'       => 'tanggal_lhr_pelapor',
                'start'   => $start,
            );
        }
        else if($nik=='nik_saksi1'){
            //$penduduk=$this->Penduduk_model->get_all();
            $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'id'                => $nik,
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_saksi1',                       
                'no_kk'             => 'no_kk_saksi1',
                'nama_depan'        => 'nama_depan_saksi1',
                'nama_belakang'     => 'nama_belakang_saksi1',
                'jekel'             => 'jekel_saksi1',
                'id_agama'   => 'id_agama_saksi1',
                'agama'             => 'agama_saksi1',
                'kerja'         => 'kerja_saksi1',
                'alamat'            => 'alamat_saksi1',
                'tempat_lhr'        => 'tempat_lhr_saksi1',
                'tanggal_lhr'       => 'tanggal_lhr_saksi1',
                'start'   => $start,
            );
        }
        else if($nik=='nik_saksi2'){
            //$penduduk=$this->Penduduk_model->get_all();
            $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'id'                => $nik,
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_saksi2',                       
                'no_kk'             => 'no_kk_saksi2',
                'nama_depan'        => 'nama_depan_saksi2',
                'nama_belakang'     => 'nama_belakang_saksi2',
                'jekel'             => 'jekel_saksi2',
                'id_agama'   => 'id_agama_saksi2',
                'agama'             => 'agama_saksi2',
                'kerja'         => 'kerja_saksi2',
                'alamat'            => 'alamat_saksi2',
                'tempat_lhr'        => 'tempat_lhr_saksi2',
                'tanggal_lhr'       => 'tanggal_lhr_saksi2',
                'start'   => $start,
            );
        }
        else if($nik=='nik_pergi'){
            //$penduduk=$this->Penduduk_model->get_all_pergi();
            $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'id'                => $nik,
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik',                       
                'no_kk'             => 'no_kk',
                'nama_depan'        => 'nama_depan',
                'nama_belakang'     => 'nama_belakang',
                'jekel'             => 'jekel',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama',
                'kerja'         => 'kerja',
                'alamat'            => 'alamat',
                'tempat_lhr'        => 'tempat_lhr',
                'tanggal_lhr'       => 'tanggal_lhr',
                'start'   => $start,
            );
        }
        else {
            //$penduduk=$this->Penduduk_model->get_all();
            $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'id'                => $nik,
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik',                       
                'no_kk'             => 'no_kk',
                'nama_depan'        => 'nama_depan',
                'nama_belakang'     => 'nama_belakang',
                'jekel'             => 'jekel',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama',
                'kerja'         => 'kerja',
                'alamat'            => 'alamat',
                'tempat_lhr'        => 'tempat_lhr',
                'tanggal_lhr'       => 'tanggal_lhr',
                'start'   => $start,
            );
        }
            
        $this->load->view('lookup/datapend', $data);
        
    }

    public function datakk(){
        $start = intval($this->input->get('start'));
        $kk = $this->Penduduk_model->get_all_kepala();
        $data = array(
                'kk_data'     => $kk,
                //'no_kk'             => 'no_kk_baru',
                'start'   => $start,
            );
        $this->load->view('lookup/datakk', $data);
    }

    public function dataortu(){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Penduduk_model->get_limit_data_ortu($config['per_page'], $start, $c, $q);        

        $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'cari' => 'lookup/dataortu',
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_wali',                       
                'no_kk'             => 'no_kk',
                'nama_depan'        => 'nama_depan',
                'nama_belakang'     => 'nama_belakang',
                'jekel'             => 'jekel',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama',
                'kerja'         => 'kerja',
                'alamat'            => 'alamat',
                'tempat_lhr'        => 'tempat_lhr',
                'tanggal_lhr'       => 'tanggal_lhr',
                'anak_ke'       => 'anak_ke',
                'start'   => $start,
        );

        $this->load->view('lookup/datalahir', $data);
    }

    public function datablmnikah(){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Penduduk_model->get_limit_data_blm_menikah($config['per_page'], $start, $c, $q);        

        $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'cari' => 'lookup/datablmnikah',
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik',                       
                'no_kk'             => 'no_kk',
                'nama_depan'        => 'nama_depan',
                'nama_belakang'     => 'nama_belakang',
                'jekel'             => 'jekel',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama',
                'kerja'         => 'kerja',
                'alamat'            => 'alamat',
                'tempat_lhr'        => 'tempat_lhr',
                'tanggal_lhr'       => 'tanggal_lhr',
                'anak_ke'       => 'anak_ke',
                'start'   => $start,
        );

        $this->load->view('lookup/datalahir', $data);
    }

    public function datalahir(){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Penduduk_model->get_limit_data_lahir($config['per_page'], $start, $c, $q);        

        $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'cari' => 'lookup/datalahir',
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik',                       
                'no_kk'             => 'no_kk',
                'nama_depan'        => 'nama_depan',
                'nama_belakang'     => 'nama_belakang',
                'jekel'             => 'jekel',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama',
                'kerja'         => 'kerja',
                'alamat'            => 'alamat',
                'tempat_lhr'        => 'tempat_lhr',
                'tanggal_lhr'       => 'tanggal_lhr',
                'anak_ke'       => 'anak_ke',
                'start'   => $start,
        );

        $this->load->view('lookup/datalahir', $data);
    }

    public function datapergi(){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Kepergian_model->get_limit_data($config['per_page'], $start, $c, $q);        

        $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'cari' => 'lookup/datapergi',
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik',                       
                'no_kk'             => 'no_kk',
                'nama_depan'        => 'nama_depan',
                'nama_belakang'     => 'nama_belakang',
                'jekel'             => 'jekel',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama',
                'kerja'         => 'kerja',
                'alamat'            => 'alamat',
                'tempat_lhr'        => 'tempat_lhr',
                'tanggal_lhr'       => 'tanggal_lhr',
                'anak_ke'       => 'anak_ke',
                'alamat_tuju'       => 'alamat_tuju',
                'alasan'       => 'alasan',
                'start'   => $start,
        );

        $this->load->view('lookup/datapergi', $data);
    }

    public function datamati(){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Penduduk_model->get_limit_data_mati($config['per_page'], $start, $c, $q);        

        $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'cari' => 'lookup/datamati',
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_meninggal',                       
                'no_kk'             => 'no_kk_mati',
                'nama_depan'        => 'nama_depan_mati',
                'nama_belakang'     => 'nama_belakang_mati',
                'jekel'             => 'jekel_mati',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama_mati',
                'kerja'         => 'kerja_mati',
                'alamat'            => 'alamat_mati',
                'tempat_lhr'        => 'tempat_lhr_mati',
                'tanggal_lhr'       => 'tanggal_lhr_mati',
                'anak_ke'       => 'anak_ke_mati',
                'start'   => $start,
        );

        $this->load->view('lookup/datalahir', $data);
    }

    public function dataanak($no_kk){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Penduduk_model->get_limit_data_anak($no_kk, $config['per_page'], $start, $c, $q);        

        $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'cari' => 'lookup/dataanak',
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik_pemohon',                       
                'no_kk'             => 'no_kk_anak',
                'nama_depan'        => 'nama_depan_anak',
                'nama_belakang'     => 'nama_belakang_anak',
                'jekel'             => 'jekel_anak',
                'id_agama'   => 'id_agama_anak',
                'agama'             => 'agama_anak',
                'kerja'         => 'kerja_anak',
                'alamat'            => 'alamat_anak',
                'tempat_lhr'        => 'tempat_lhr_anak',
                'tanggal_lhr'       => 'tanggal_lhr_anak',
                'anak_ke'       => 'anak_ke_anak',
                'start'   => $start,
        );

        $this->load->view('lookup/datalahir', $data);
    }

     public function datapengantin($jekel){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        if($jekel=='laki'){            
            $penduduk = $this->Penduduk_model->get_limit_data_pengantin('Laki-laki', $config['per_page'], $start, $c, $q);        

            $data = array(
                    'q' => $q,
                    'c' => $c,
                    'pagination' => $this->pagination->create_links(),
                    'cari' => 'lookup/datapengantin/laki',
                    'penduduk_data'     => $penduduk,
                    'nik'               => 'nik_laki',                       
                    'no_kk'             => 'no_kk_laki',
                    'nama_depan'        => 'nama_depan_laki',
                    'nama_belakang'     => 'nama_belakang_laki',
                    'jekel'             => 'jekel_laki',
                    'id_agama'          => 'id_agama_laki',
                    'agama'             => 'agama_laki',
                    'kerja'             => 'kerja_laki',
                    'alamat'            => 'alamat_laki',
                    'tempat_lhr'        => 'tempat_lhr_laki',
                    'tanggal_lhr'       => 'tanggal_lhr_laki',
                    'anak_ke'           => 'anak_ke_laki',
                    'start'             => $start,
            );
        }
        else if($jekel=='perempuan'){            
            $penduduk = $this->Penduduk_model->get_limit_data_pengantin('Perempuan', $config['per_page'], $start, $c, $q);        

            $data = array(
                    'q' => $q,
                    'c' => $c,
                    'pagination' => $this->pagination->create_links(),
                    'cari' => 'lookup/datapengantin/perempuan',
                    'penduduk_data'     => $penduduk,
                    'nik'               => 'nik_perempuan',                       
                    'no_kk'             => 'no_kk_perempuan',
                    'nama_depan'        => 'nama_depan_perempuan',
                    'nama_belakang'     => 'nama_belakang_perempuan',
                    'jekel'             => 'jekel_perempuan',
                    'id_agama'   => 'id_agama_perempuan',
                    'agama'             => 'agama_perempuan',
                    'kerja'         => 'kerja_perempuan',
                    'alamat'            => 'alamat_perempuan',
                    'tempat_lhr'        => 'tempat_lhr_perempuan',
                    'tanggal_lhr'       => 'tanggal_lhr_perempuan',
                    'anak_ke'       => 'anak_ke_perempuan',
                    'start'   => $start,
            );
        }

        $this->load->view('lookup/datapengantin', $data);
    }


    public function datasemua(){
        $start = intval($this->input->get('start'));
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));   
        $config['per_page'] = 1000;
        $this->load->library('pagination');
        $penduduk = $this->Penduduk_model->get_limit_data($config['per_page'], $start, $c, $q);        

        $data = array(
                'q' => $q,
                'c' => $c,
                'pagination' => $this->pagination->create_links(),
                'cari' => 'lookup/datasemua',
                'penduduk_data'     => $penduduk,
                'nik'               => 'nik',                       
                'no_kk'             => 'no_kk',
                'nama_depan'        => 'nama_depan',
                'nama_belakang'     => 'nama_belakang',
                'jekel'             => 'jekel',
                'id_agama'   => 'id_agama',
                'agama'             => 'agama',
                'kerja'         => 'kerja',
                'alamat'            => 'alamat',
                'tempat_lhr'        => 'tempat_lhr',
                'tanggal_lhr'       => 'tanggal_lhr',
                'anak_ke'       => 'anak_ke',
                'start'   => $start,
        );

        $this->load->view('lookup/datalahir', $data);
    }
}
