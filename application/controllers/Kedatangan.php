<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kedatangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kedatangan_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Kk_model');
        $this->load->model('Agama_model');
        $this->load->model('Goldar_model');
        $this->load->model('Status_kawin_model');
        $this->load->model('Kerja_model');
        $this->load->model('Hubkel_model');
        $this->load->model('Pendidikan_model');
        $this->load->model('Profil_desa_model');
        $this->load->model('Layanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kedatangan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kedatangan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kedatangan/index.html';
            $config['first_url'] = base_url() . 'kedatangan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kedatangan_model->total_rows($q);
        $kedatangan = $this->Kedatangan_model->get_limit_data($config['per_page'], $start, $c, $q);
        //$kedatangan = $this->Kedatangan_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kedatangan_data' => $kedatangan,
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav' => 'SIMADES || Data Kedatangan',
            'title' => 'Data Kedatangan',
            'anchor' => 'Daftar Kedatangan',
            'isi' => 'kedatangan/kedatangan_list',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function read($id)
    {
        $row = $this->Kedatangan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_datang' => $row->id_datang,
		'nik_pendatang' => $row->nik_pendatang,
		'alamat_asal' => $row->alamat_asal,
		'alasan' => $row->alasan,
	    'titlenav' => 'SIMADES || Data Kedatangan',
        'title' => 'Data Kedatangan',
        'anchor' => 'Detail Kelahiran',
        'isi' => 'kedatangan/kedatangan_read',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kedatangan'));
        }
    }

    public function create()
    {
        //ambil data dropdown
        $list_agama = $this->Agama_model->get_all();
        $list_goldar = $this->Goldar_model->get_all();
        $list_stkawin = $this->Status_kawin_model->get_all();
        $list_kerja = $this->Kerja_model->get_all();
        $list_hubkel = $this->Hubkel_model->get_all();
        $list_pendidikan = $this->Pendidikan_model->get_all();
        $data_desa = $this->Profil_desa_model->get_by_id(1);

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kedatangan/create_action'),
	    'id_datang' => set_value('id_datang'),
	    'nik_pendatang' => set_value('nik_pendatang'),
        'no_kk_asal'    => set_value('no_kk_asal'),
        'nik_asal'      => set_value('nik_asal'),
        'nama_depan'    => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'jekel'         => set_value('jekel'),
        'list_agama'    => $list_agama,
        'id_agama'      => set_value('id_agama'),
        'list_goldar'   => $list_goldar,
        'id_goldar'     => set_value('id_goldar'),
        'list_stkawin'  => $list_stkawin,
        'id_stkawin'    => set_value('id_stkawin'),
        'tempat_lhr'    => set_value('tempat_lhr'),
        'tanggal_lhr'   => set_value('tanggal_lhr'),
        'nama_ayah'     => set_value('nama_ayah'),
        'nama_ibu'      => set_value('nama_ibu'),
        'anak_ke'       => set_value('anak_ke'),
        'list_kerja'    => $list_kerja,
        'id_kerja'      => set_value('id_kerja'),
        'list_hubkel'   => $list_hubkel,
        'id_hubkel'     => set_value('id_hubkel'),
        'list_pendidikan' => $list_pendidikan,
        'id_pendidikan' => set_value('id_pendidikan'),
	    'alamat_asal' => set_value('alamat_asal'),
	    'alasan' => set_value('alasan'),
        'no_kk_baru'    => set_value('no_kk_baru'),
        'alamat_baru'    => set_value('alamat_baru'),
        'rt_baru' => set_value('rt_baru'),
        'rw_baru' => set_value('rw_baru'),
        'kelurahan' => set_value('kelurahan', $data_desa->nm_desa),
        'kecamatan' => set_value('kecamatan', $data_desa->kecamatan),
        'kabupaten' => set_value('kabupaten', $data_desa->kabupaten),
        'propinsi' => set_value('propinsi', $data_desa->propinsi),
        'pengikut' => set_value('pengikut'),

	    'titlenav' => 'SIMADES || Data Kedatangan',
        'title' => 'Data Kedatangan',
        'anchor' => 'Tambah Data Kedatangan',
        'isi' => 'kedatangan/kedatangan_form',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $cek_nik = $this->Penduduk_model->get_data('kedatangan', 'nik_pendatang', $this->input->post('nik_pendatang',TRUE));
            if(!$cek_nik)
            {
                $dataDat = array(
    		'nik_pendatang' => $this->input->post('nik_pendatang',TRUE),
            'nik_asal'      => $this->input->post('nik_asal',TRUE),
            'no_kk_asal'    => $this->input->post('no_kk_asal',TRUE),
    		'alamat_asal'   => $this->input->post('alamat_asal',TRUE),
    		'alasan'        => $this->input->post('alasan',TRUE),
            'pengikut'        => $this->input->post('pengikut',TRUE),


            );

                $dataKK = array(
            'no_kk'         => $this->input->post('no_kk_baru',TRUE),
            'alamat'        => $this->input->post('alamat_baru',TRUE),
            'rt'            => $this->input->post('rt_baru',TRUE),
            'rw'            => $this->input->post('rw_baru',TRUE),
            'kelurahan'     => $this->input->post('kelurahan',TRUE),
            'kecamatan'     => $this->input->post('kecamatan',TRUE),
            'kabupaten'     => $this->input->post('kabupaten',TRUE),
            'propinsi'      => $this->input->post('propinsi',TRUE),

            );

                $dataPend = array(
            'nik'           => $this->input->post('nik_pendatang',TRUE),
            'no_kk'         => $this->input->post('no_kk_baru',TRUE),
            'nama_depan'    => $this->input->post('nama_depan',TRUE),
            'nama_belakang' => $this->input->post('nama_belakang',TRUE),
            'jekel'         => $this->input->post('jekel',TRUE),
            'id_agama'      => $this->input->post('id_agama',TRUE),
            'id_goldar'     => $this->input->post('id_goldar',TRUE),
            'id_stskawin'   => $this->input->post('id_stkawin',TRUE),
            'tempat_lhr'    => $this->input->post('tempat_lhr',TRUE),
            'tanggal_lhr'   => $this->input->post('tanggal_lhr',TRUE),
            'nama_ayah'     => $this->input->post('nama_ayah',TRUE),
            'nama_ibu'      => $this->input->post('nama_ibu',TRUE),
            'anak_ke'       => $this->input->post('anak_ke',TRUE),
            'id_kerja'      => $this->input->post('id_kerja',TRUE),
            'id_hubkel'     => $this->input->post('id_hubkel',TRUE),
            'id_pendidikan' => $this->input->post('id_pendidikan',TRUE),
            'status'        => 'MD',

            );

                $data_layanan = array (
            'nik'   => $this->input->post('nik_pendatang',TRUE),
            'id_user'   => $this->session->userdata('id_user'),
            'waktu_layanan' => date('Y-m-d h:i:s'),
            'nama_layanan' => 'Mutasi Datang',
            );
                if($this->input->post('alasan')=='Pindah Tempat Tinggal'){
                    $this->Kk_model->insert($dataKK);
                }
                $this->Penduduk_model->insert($dataPend);
                $this->Kedatangan_model->insert($dataDat);
                $this->Layanan_model->insert($data_layanan);

                if($this->input->post('pengikut')=='Sendiri'){
                    $this->session->set_flashdata('message', '!!TAMBAH DATA SUKSES!!');
                    redirect(site_url('kedatangan'));
                }
                else{
                    $this->session->set_userdata('no_kk_asal', $this->input->post('no_kk_asal',TRUE));
                    //$this->createAnggota($this->input->post('no_kk_baru',TRUE));
                    redirect(site_url('kedatangan/createAnggota/'.$this->input->post('no_kk_baru',TRUE)));
                }
            }
            else{
                $this->session->set_flashdata('message', 'NIK '.$this->input->post('nik_pendatang',TRUE).' sudah ada');
                redirect(site_url('kedatangan/create'));
            }


        }
    }

    public function listAnggota($nokk)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penduduk_model->total_rows($q);

        $penduduk = $this->Penduduk_model->get_all_anggota($nokk);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penduduk_data' => $penduduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'titlenav'  => 'SIMADES || Data Penduduk',
            'no_kk'     => $nokk,
            'title'     => 'Data Kedatangan',
            'anchor'    => 'Daftar Anggota Pengikut',
            'isi'       => 'kedatangan/kedatangan_list_anggota',
            'start'     => $start,
        );
        $this->load->view('layout/wrapper', $data);

    }

    public function createAnggota($nokk)
    {
        //ambil data dropdown
        $list_agama = $this->Agama_model->get_all();
        $list_goldar = $this->Goldar_model->get_all();
        $list_stkawin = $this->Status_kawin_model->get_all();
        $list_kerja = $this->Kerja_model->get_all();
        $list_hubkel = $this->Hubkel_model->get_all();
        $list_pendidikan = $this->Pendidikan_model->get_all();

        $data = array(

            'action' => site_url('kedatangan/createAnggota_action'),
        'no_kk'        => set_value('no_kk', $nokk),
        'nik'           => set_value('nik'),
        'nik_asal'           => set_value('nik_asal'),
        'nama_depan'    => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'jekel'         => set_value('jekel'),
        'list_agama'    => $list_agama,
        'id_agama'      => set_value('id_agama'),
        'list_goldar'   => $list_goldar,
        'id_goldar'     => set_value('id_goldar'),
        'list_stkawin'  => $list_stkawin,
        'id_stkawin'    => set_value('id_stkawin'),
        'tempat_lhr'    => set_value('tempat_lhr'),
        'tanggal_lhr'   => set_value('tanggal_lhr'),
        'nama_ayah'     => set_value('nama_ayah'),
        'nama_ibu'      => set_value('nama_ibu'),
        'anak_ke'       => set_value('anak_ke'),
        'list_kerja'    => $list_kerja,
        'id_kerja'      => set_value('id_kerja'),
        'list_hubkel'   => $list_hubkel,
        'id_hubkel'     => set_value('id_hubkel'),
        'list_pendidikan' => $list_pendidikan,
        'id_pendidikan' => set_value('id_pendidikan'),
        'status'        => set_value('status'),
        'id_user'       => $this->session->userdata('id_user'),
        'nama_user'     => $this->session->userdata('nama_user'),
        'jabatan'       => $this->session->userdata('jabatan'),
        'nama_desa'     => $this->session->userdata('nama_desa'),
        'titlenav'      => 'SIMADES || Data Kedatangan',
        'title'         => 'Data Kedatangan',
        'anchor'        => 'Tambah Pengikut',
        'isi'           => 'kedatangan/anggota_form',
    );
        $this->load->view('layout/wrapper', $data);

    }

    public function createAnggota_action()
    {
        $this->_rulesAnggota();

        if ($this->form_validation->run() == FALSE) {
            $this->createAnggota($this->input->post('nokk',TRUE));
        } else {
            $nik = $this->input->post('nik_pend');
            $cek_nik = $this->Penduduk_model->get_data('kedatangan', 'nik_pendatang', $nik);

            if(!$cek_nik)
            {
                $dataMutasi = $this->Kedatangan_model->get_by_nokk_asal($this->session->userdata('no_kk_asal'));


                $data = array(
            'nik'           => $nik,
            'no_kk'         => $this->input->post('nokk',TRUE),
            'nama_depan'    => $this->input->post('nama_depan',TRUE),
            'nama_belakang' => $this->input->post('nama_belakang',TRUE),
            'jekel'         => $this->input->post('jekel',TRUE),
            'id_agama'      => $this->input->post('id_agama',TRUE),
            'id_goldar'     => $this->input->post('id_goldar',TRUE),
            'id_stskawin'   => $this->input->post('id_stkawin',TRUE),
            'tempat_lhr'    => $this->input->post('tempat_lhr',TRUE),
            'tanggal_lhr'   => $this->input->post('tanggal_lhr',TRUE),
            'nama_ayah'     => $this->input->post('nama_ayah',TRUE),
            'nama_ibu'      => $this->input->post('nama_ibu',TRUE),
            'anak_ke'       => $this->input->post('anak_ke',TRUE),
            'id_kerja'      => $this->input->post('id_kerja',TRUE),
            'id_hubkel'     => $this->input->post('id_hubkel',TRUE),
            'id_pendidikan' => $this->input->post('id_pendidikan',TRUE),
            'status'        => 'MD',
            );

                $dataDat = array(
            'nik_pendatang' => $nik,
            'nik_asal'      => $this->input->post('nik_asal',TRUE),
            'no_kk_asal'    => $this->session->userdata('no_kk_asal'),
            'alamat_asal'   => $dataMutasi->alamat_asal,
            'alasan'        => $dataMutasi->alasan,
            'pengikut'      => $dataMutasi->pengikut,


            );

                 $data_layanan = array (
            'nik'   => $nik,
            'id_user'   => $this->session->userdata('id_user'),
            'waktu_layanan' => date('Y-m-d h:i:s'),
            'nama_layanan' => 'Mutasi Datang',
            );


                //simpan data
                $this->Penduduk_model->insert($data);
                $this->Kedatangan_model->insert($dataDat);
                $this->Layanan_model->insert($data_layanan);

                $this->session->set_flashdata('message', '!!TAMBAH DATA SUKSES!!');

                if($this->input->post('submit')=='Selesai'){ //jika tekan tombol Selesai
                    redirect(site_url('kedatangan'));
                }
                else if($this->input->post('submit')=='Tambah Lagi'){ //jika tekan tombol Tambah Lagi

                    redirect(site_url('kedatangan/createAnggota/'.$this->input->post('nokk',TRUE)));
                }
            }
            else
            {
                $this->session->set_flashdata('message', 'NIK '.$nik.' sudah ada');
                redirect(site_url('kedatangan/createAnggota/'.$this->input->post('nokk',TRUE)));
            }
        }
    }



    public function update($id)
    {
        $row = $this->Kedatangan_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $list_goldar = $this->Goldar_model->get_all();
        $list_stkawin = $this->Status_kawin_model->get_all();
        $list_kerja = $this->Kerja_model->get_all();
        $list_hubkel = $this->Hubkel_model->get_all();
        $list_pendidikan = $this->Pendidikan_model->get_all();
        $data_desa = $this->Profil_desa_model->get_by_id(1);


        if ($row) {
            $dataPend = $this->Penduduk_model->get_by_id($row->nik_pendatang);
            $data = array(
                'button' => 'Edit',
                'action' => site_url('kedatangan/update_action'),
		'id_datang' => set_value('id_datang', $row->id_datang),
		'nik_pendatang' => set_value('nik_pendatang', $row->nik_pendatang),
        'no_kk_asal'    => set_value('no_kk_asal', $row->no_kk_asal),
        'nik_asal'      => set_value('nik_asal', $row->nik_asal),
        'nama_depan'    => set_value('nama_depan', $dataPend->nama_depan),
        'nama_belakang' => set_value('nama_belakang', $dataPend->nama_belakang),
        'jekel'         => set_value('jekel', $dataPend->jekel),
        'list_agama'    => $list_agama,
        'id_agama'      => set_value('id_agama', $dataPend->id_agama),
        'list_goldar'   => $list_goldar,
        'id_goldar'     => set_value('id_goldar', $dataPend->id_goldar),
        'list_stkawin'  => $list_stkawin,
        'id_stkawin'    => set_value('id_stkawin', $dataPend->id_stskawin),
        'tempat_lhr'    => set_value('tempat_lhr', $dataPend->tempat_lhr),
        'tanggal_lhr'   => set_value('tanggal_lhr', $dataPend->tanggal_lhr),
        'nama_ayah'     => set_value('nama_ayah', $dataPend->nama_ayah),
        'nama_ibu'      => set_value('nama_ibu', $dataPend->nama_ibu),
        'anak_ke'       => set_value('anak_ke', $dataPend->anak_ke),
        'list_kerja'    => $list_kerja,
        'id_kerja'      => set_value('id_kerja', $dataPend->id_kerja),
        'list_hubkel'   => $list_hubkel,
        'id_hubkel'     => set_value('id_hubkel', $dataPend->id_hubkel),
        'list_pendidikan' => $list_pendidikan,
        'id_pendidikan' => set_value('id_pendidikan', $dataPend->id_pendidikan),
        'alamat_asal' => set_value('alamat_asal', $row->alamat_asal),
        'alasan' => set_value('alasan', $row->alasan),
        'no_kk_baru'    => set_value('no_kk_baru', $dataPend->no_kk),
        'alamat_baru'    => set_value('alamat_baru', $dataPend->alamat),
        'rt_baru' => set_value('rt_baru', $dataPend->rt),
        'rw_baru' => set_value('rw_baru', $dataPend->rw),
        'kelurahan' => set_value('kelurahan', $dataPend->kelurahan),
        'kecamatan' => set_value('kecamatan', $dataPend->kecamatan),
        'kabupaten' => set_value('kabupaten', $dataPend->kabupaten),
        'propinsi' => set_value('propinsi', $dataPend->propinsi),
        'pengikut' => set_value('pengikut', $row->pengikut),

	    'titlenav' => 'SIMADES || Data Kedatangan',
        'title' => 'Data Kedatangan',
        'anchor' => 'Edit Data Kedatangan',
        'isi' => 'kedatangan/kedatangan_form',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kedatangan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_datang', TRUE));
        } else {
            $dataDat = array(
        'nik_pendatang' => $this->input->post('nik_pendatang',TRUE),
        'nik_asal'      => $this->input->post('nik_asal',TRUE),
        'no_kk_asal'    => $this->input->post('no_kk_asal',TRUE),
        'alamat_asal'   => $this->input->post('alamat_asal',TRUE),
        'alasan'        => $this->input->post('alasan',TRUE),
        'pengikut'        => $this->input->post('pengikut',TRUE),


        );

            $dataKK = array(
        'no_kk'         => $this->input->post('no_kk_baru',TRUE),
        'alamat'        => $this->input->post('alamat_baru',TRUE),
        'rt'            => $this->input->post('rt_baru',TRUE),
        'rw'            => $this->input->post('rw_baru',TRUE),
        'kelurahan'     => $this->input->post('kelurahan',TRUE),
        'kecamatan'     => $this->input->post('kecamatan',TRUE),
        'kabupaten'     => $this->input->post('kabupaten',TRUE),
        'propinsi'      => $this->input->post('propinsi',TRUE),

        );

            $dataPend = array(
        'nik'           => $this->input->post('nik_pendatang',TRUE),
        'no_kk'         => $this->input->post('no_kk_baru',TRUE),
        'nama_depan'    => $this->input->post('nama_depan',TRUE),
        'nama_belakang' => $this->input->post('nama_belakang',TRUE),
        'jekel'         => $this->input->post('jekel',TRUE),
        'id_agama'      => $this->input->post('id_agama',TRUE),
        'id_goldar'     => $this->input->post('id_goldar',TRUE),
        'id_stskawin'   => $this->input->post('id_stkawin',TRUE),
        'tempat_lhr'    => $this->input->post('tempat_lhr',TRUE),
        'tanggal_lhr'   => $this->input->post('tanggal_lhr',TRUE),
        'nama_ayah'     => $this->input->post('nama_ayah',TRUE),
        'nama_ibu'      => $this->input->post('nama_ibu',TRUE),
        'anak_ke'       => $this->input->post('anak_ke',TRUE),
        'id_kerja'      => $this->input->post('id_kerja',TRUE),
        'id_hubkel'     => $this->input->post('id_hubkel',TRUE),
        'id_pendidikan' => $this->input->post('id_pendidikan',TRUE),
        'status'        => 'MD',

        );


            if($this->input->post('alasan')=='Pindah Tempat Tinggal'){
                $this->Kk_model->insert($dataKK);
            }
            $this->Penduduk_model->update($this->input->post('nik_pendatang',TRUE),$dataPend);
            $this->Kedatangan_model->update($this->input->post('id_datang', TRUE),$dataDat);

            if($this->input->post('pengikut')=='Sendiri'){
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('kedatangan'));
            }
            else{
                //$this->createAnggota($this->input->post('no_kk_baru',TRUE));
                redirect(site_url('kedatangan/listAnggota/'.$this->input->post('no_kk_baru',TRUE)));
            }

            //$this->Kedatangan_model->update($this->input->post('id_datang', TRUE), $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            //redirect(site_url('kedatangan'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kedatangan_model->get_by_id($id);

        if ($row) {
            $this->Kedatangan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kedatangan'));

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kedatangan'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nik_pendatang', 'nik pendatang', 'trim|required');
    $this->form_validation->set_rules('nik_asal', 'nik asal', 'trim|required');
    $this->form_validation->set_rules('no_kk_asal', 'nomor kk asal', 'trim|required');
    $this->form_validation->set_rules('no_kk_baru', 'nomor kk asal', 'trim|required');
    $this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
    //$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim|required');
    //$this->form_validation->set_rules('jekel', 'jekel', 'trim|required');
    $this->form_validation->set_rules('id_agama', 'id agama', 'trim|required');
    $this->form_validation->set_rules('id_goldar', 'id goldar', 'trim|required');
    $this->form_validation->set_rules('id_stkawin', 'id stkawin', 'trim|required');
    $this->form_validation->set_rules('tempat_lhr', 'tempat lhr', 'trim|required');
    $this->form_validation->set_rules('tanggal_lhr', 'tanggal lhr', 'trim|required');
    $this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
    $this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
    //$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|required');
    $this->form_validation->set_rules('id_kerja', 'id kerja', 'trim|required');
    $this->form_validation->set_rules('id_hubkel', 'id hubkel', 'trim|required');
    $this->form_validation->set_rules('id_pendidikan', 'id pendidikan', 'trim|required');
	$this->form_validation->set_rules('alamat_asal', 'alamat asal', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');
    $this->form_validation->set_rules('pengikut', 'pengikut', 'trim|required');

	$this->form_validation->set_rules('id_datang', 'id_datang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rulesAnggota(){
    $this->form_validation->set_rules('nik_pend', 'nik', 'trim|required');
    $this->form_validation->set_rules('nokk', 'nomor kk', 'trim|required');
    $this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
    //$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim|required');
    $this->form_validation->set_rules('jekel', 'jekel', 'trim|required');
    $this->form_validation->set_rules('id_agama', 'id agama', 'trim|required');
    $this->form_validation->set_rules('id_goldar', 'id goldar', 'trim|required');
    $this->form_validation->set_rules('id_stkawin', 'id stkawin', 'trim|required');
    $this->form_validation->set_rules('tempat_lhr', 'tempat lhr', 'trim|required');
    $this->form_validation->set_rules('tanggal_lhr', 'tanggal lhr', 'trim|required');
    $this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
    $this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
    //$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|required');
    $this->form_validation->set_rules('id_kerja', 'id kerja', 'trim|required');
    $this->form_validation->set_rules('id_hubkel', 'id hubkel', 'trim|required');
    $this->form_validation->set_rules('id_pendidikan', 'id pendidikan', 'trim|required');
    }

}

/* End of file Kedatangan.php */
/* Location: ./application/controllers/Kedatangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:00 */
/* http://harviacode.com */
