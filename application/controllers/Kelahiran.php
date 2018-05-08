<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelahiran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelahiran_model');
        $this->load->model('Layanan_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Agama_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kelahiran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kelahiran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kelahiran/index.html';
            $config['first_url'] = base_url() . 'kelahiran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kelahiran_model->total_rows($q);
        $kelahiran = $this->Kelahiran_model->get_limit_data($config['per_page'], $start, $c, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kelahiran_data' => $kelahiran,
            'q' => $q,
            'c' => $c,
            'pagination'    => $this->pagination->create_links(),
            'total_rows'    => $config['total_rows'],
            'start'         => $start,
            'titlenav'      => 'SIMADES || Data Kelahiran',
            'title'         => 'Data Kelahiran',
            'anchor'        => 'Daftar Kelahiran',
            'isi'           => 'kelahiran/kelahiran_list',
        );
        $this->load->view('layout/wrapper', $data);

    }

    public function read($id)
    {
        $row = $this->Kelahiran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lahir'    => $row->id_lahir,
		'nis_bayi'    => $row->nis_bayi,
		'tgl_lahir'   => $row->tgl_lahir,
		'tpt_lahir'   => $row->tpt_lahir,
		'jekel'       => $row->jekel,
		'berat_bayi'  => $row->berat_bayi,
		'anak_ke'     => $row->anak_ke,
		'waktu'       => $row->waktu,
		'panjang_bayi' => $row->panjang_bayi,
		'nik_ayah'    => $row->nik_ayah,
		'nik_ibu'     => $row->nik_ibu,
		'nik_saksi1'  => $row->nik_saksi1,
		'nik_saksi2'  => $row->nik_saksi2,
	    'titlenav'     => 'SIMADES || Data Kelahiran',
        'title'     => 'Data Kelahiran',
        'anchor'    => 'Detail Kelahiran',
        'isi'       => 'kelahiran/kelahiran_read',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelahiran'));
        }
    }

    public function create()
    {

        $list_agama = $this->Agama_model->get_all();
        $data = array(
            'button' => 'Selanjutnya',
            'action' => site_url('kelahiran/create_2'),
	    'id_lahir'         => set_value('id_lahir'),
        'no_kk'             => set_value('no_kk'),
	    'nis_bayi'             => set_value('nis_bayi'),
        'nama_depan_bayi'       => set_value('nama_depan_bayi'),
        'nama_belakang_bayi'   => set_value('nama_belakang_bayi'),
	    'tgl_lahir'            => set_value('tgl_lahir'),
	    'tpt_lahir'            => set_value('tpt_lahir'),
	    'jekel'                => set_value('jekel'),
        'list_agama'            => $list_agama,
        'id_agama'              => set_value('id_agama'),
	    'berat_bayi'           => set_value('berat_bayi'),
	    'anak_ke'              => set_value('anak_ke'),
	    'waktu'                => set_value('waktu'),
	    'panjang_bayi'         => set_value('panjang_bayi'),

	    'titlenav' => 'SIMADES || Data Kelahiran',
        'title' => 'Data Kelahiran',
        'anchor' => 'Tambah Data Kelahiran',
        'isi' => 'kelahiran/kelahiran_form_1',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function create_2()
    {
        //$list_agama = $this->Agama_model->get_all();
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $cek_nis = $this->Penduduk_model->get_data('kelahiran', 'nis_bayi', $this->input->post('nis_bayi',TRUE));
            if(!$cek_nis)
            {
                $no_kk = $this->input->post('no_kk');
                $data_ayah = $this->Penduduk_model->get_m_ayah($no_kk);
                $data_ibu = $this->Penduduk_model->get_m_ibu($no_kk);
                $data = array(
                    'button' => 'Tambah',
                    'action' => site_url('kelahiran/create_action'),
                'id_lahir' => set_value('id_lahir', $this->input->post('id_lahir',TRUE)),
                'nis_bayi' => set_value('nis_bayi', $this->input->post('nis_bayi',TRUE)),
                'nama_depan_bayi' => set_value('nama_depan_bayi', $this->input->post('nama_depan_bayi',TRUE)),
                'nama_belakang_bayi' => set_value('nama_belakang_bayi', $this->input->post('nama_belakang_bayi',TRUE)),
                'tgl_lahir' => set_value('tgl_lahir', $this->input->post('tgl_lahir',TRUE)),
                'tpt_lahir' => set_value('tpt_lahir', $this->input->post('tpt_lahir',TRUE)),
                'jekel' => set_value('jekel', $this->input->post('jekel',TRUE)),
                //'list_agama'    => $list_agama,
                'id_agama' => set_value('id_agama', $this->input->post('id_agama',TRUE)),
                'berat_bayi' => set_value('berat_bayi', $this->input->post('berat_bayi',TRUE)),
                'anak_ke' => set_value('anak_ke', $this->input->post('anak_ke',TRUE)),
                'waktu' => set_value('waktu', $this->input->post('waktu',TRUE)),
                'panjang_bayi' => set_value('panjang_bayi', $this->input->post('panjang_bayi',TRUE)),

                'nik_ayah' => set_value('nik_ayah', $data_ayah->nik),
                'no_kk_ayah' => set_value('no_kk_ayah', $data_ayah->no_kk),
                'nama_depan_ayah' => set_value('nama_depan_ayah', $data_ayah->nama_depan),
                'nama_belakang_ayah' => set_value('nama_belakang_ayah', $data_ayah->nama_belakang),

                'tempat_lhr_ayah' => set_value('tempat_lhr_ayah', $data_ayah->tempat_lhr),
                'tanggal_lhr_ayah' => set_value('tanggal_lhr_ayah', $data_ayah->tanggal_lhr),

                'kerja_ayah' => set_value('kerja_ayah', $data_ayah->kerja),
                'alamat_ayah' => set_value('alamat_ayah', $data_ayah->alamat.", RT ".$data_ayah->rt."/RW ".$data_ayah->rw.", Kel. ".$data_ayah->kelurahan.", Kec. ".$data_ayah->kecamatan.", Kab. ".$data_ayah->kabupaten),

                'nik_ibu' => set_value('nik_ibu', $data_ibu->nik),
                'no_kk_ibu' => set_value('no_kk_ibu', $data_ibu->no_kk),
                'nama_depan_ibu' => set_value('nama_depan_ibu', $data_ibu->nama_depan),
                'nama_belakang_ibu' => set_value('nama_belakang_ibu', $data_ibu->nama_belakang),

                'tempat_lhr_ibu' => set_value('tempat_lhr_ibu', $data_ibu->tempat_lhr),
                'tanggal_lhr_ibu' => set_value('tanggal_lhr_ibu', $data_ibu->tanggal_lhr),

                'kerja_ibu' => set_value('kerja_ibu', $data_ibu->kerja),
                'alamat_ibu' => set_value('alamat_ibu', $data_ibu->alamat.", RT ".$data_ibu->rt."/RW ".$data_ibu->rw.", Kel. ".$data_ibu->kelurahan.", Kec. ".$data_ibu->kecamatan.", Kab. ".$data_ibu->kabupaten),

                'nik_saksi1' => set_value('nik_saksi1'),
                'no_kk_saksi1' => set_value('no_kk_saksi1'),
                'nama_depan_saksi1' => set_value('nama_depan_saksi1'),
                'nama_belakang_saksi1' => set_value('nama_belakang_saksi1'),
                'jekel_saksi1' => set_value('jekel_saksi1'),
                'tempat_lhr_saksi1' => set_value('tempat_lhr_saksi1'),
                'tanggal_lhr_saksi1' => set_value('tanggal_lhr_saksi1'),
                'agama_saksi1' => set_value('agama_saksi1'),
                'kerja_saksi1' => set_value('kerja_saksi1'),
                'alamat_saksi1' => set_value('alamat_saksi1'),

                'nik_saksi2' => set_value('nik_saksi2'),
                'no_kk_saksi2' => set_value('no_kk_saksi2'),
                'nama_depan_saksi2' => set_value('nama_depan_saksi2'),
                'nama_belakang_saksi2' => set_value('nama_belakang_saksi2'),
                'jekel_saksi2' => set_value('jekel_saksi2'),
                'tempat_lhr_saksi2' => set_value('tempat_lhr_saksi2'),
                'tanggal_lhr_saksi2' => set_value('tanggal_lhr_saksi2'),
                'agama_saksi2' => set_value('agama_saksi2'),
                'kerja_saksi2' => set_value('kerja_saksi2'),
                'alamat_saksi2' => set_value('alamat_saksi2'),

                'titlenav' => 'SIMADES || Data Kelahiran',
                'title' => 'Data Kelahiran',
                'anchor' => 'Tambah Data Kelahiran',
                'isi' => 'kelahiran/kelahiran_form_2',
                );
                $this->load->view('layout/wrapper', $data);
            } else{
                $this->session->set_flashdata('message', 'NIS '.$this->input->post('nis_bayi',TRUE).' sudah ada');
                redirect(site_url('kelahiran/create'));
            }


        }
    }


    public function create_action()
    {
        $this->_rules2();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {


                $data = array(
    		'nis_bayi'            => $this->input->post('nis_bayi',TRUE),
            'nama_depan_bayi'     => $this->input->post('nama_depan_bayi',TRUE),
            'nama_belakang_bayi'  => $this->input->post('nama_belakang_bayi',TRUE),
    		'tgl_lahir'           => $this->input->post('tgl_lahir',TRUE),
    		'tpt_lahir'           => $this->input->post('tpt_lahir',TRUE),
    		'jekel'               => $this->input->post('jekel',TRUE),
    		'berat_bayi'          => $this->input->post('berat_bayi',TRUE),
    		'anak_ke'             => $this->input->post('anak_ke',TRUE),
    		'waktu'               => $this->input->post('waktu',TRUE),
    		'panjang_bayi'        => $this->input->post('panjang_bayi',TRUE),
    		'nik_ayah'            => $this->input->post('nik_ayah',TRUE),
    		'nik_ibu'             => $this->input->post('nik_ibu',TRUE),
    		'nik_saksi1'          => $this->input->post('nik_saksi1',TRUE),
    		'nik_saksi2'          => $this->input->post('nik_saksi2',TRUE),
    	    );
                $nama_ayah = $this->input->post('nama_depan_ayah',TRUE)." ".$this->input->post('nama_belakang_ayah',TRUE);
                $nama_ibu = $this->input->post('nama_depan_ibu',TRUE)." ".$this->input->post('nama_belakang_ibu',TRUE);
                $data_pend = array(
            'nik' => $this->input->post('nis_bayi',TRUE),
            'no_kk' => $this->input->post('no_kk_ayah',TRUE),
            'nama_depan' => $this->input->post('nama_depan_bayi',TRUE),
            'nama_belakang' => $this->input->post('nama_belakang_bayi',TRUE),
            'jekel' => $this->input->post('jekel',TRUE),
            'id_agama' => $this->input->post('id_agama',TRUE),
            'id_stskawin' => '1',
            'tempat_lhr' => $this->input->post('tpt_lahir',TRUE),
            'tanggal_lhr' => $this->input->post('tgl_lahir',TRUE),
            'nama_ayah' => $nama_ayah,
            'nama_ibu' => $nama_ibu,
            'anak_ke' => $this->input->post('anak_ke',TRUE),
            'id_kerja' => '1',
            'id_goldar' => '1',
            'id_hubkel' => '4',
            'id_pendidikan' => '1',
            'status' => 'ML',
            'tgl_mutasi' => date('Y-m-d'),
            );
                $data_layanan = array (
            'nik'   => $this->input->post('nis_bayi',TRUE),
            'id_user'   => $this->session->userdata('id_user'),
            'waktu_layanan' => date('Y-m-d h:i:s'),
            'nama_layanan' => 'Mutasi Kelahiran',
            );
                $this->Penduduk_model->insert($data_pend);
                $this->Layanan_model->insert($data_layanan);
                $this->Kelahiran_model->insert($data);

                $this->session->set_flashdata('message', '!!TAMBAH DATA SUKSES!!');
                redirect(site_url('kelahiran'));


        }
    }

    public function update($id)
    {
        $row = $this->Kelahiran_model->get_by_id($id);


        if ($row) {
            $list_agama = $this->Agama_model->get_all();
            $data_bayi = $this->Penduduk_model->get_by_id($row->nis_bayi);
            $data_ayah = $this->Penduduk_model->get_by_id($row->nik_ayah);
            $data_ibu = $this->Penduduk_model->get_by_id($row->nik_ibu);
            $data_saksi1 = $this->Penduduk_model->get_by_id($row->nik_saksi1);
            $data_saksi2 = $this->Penduduk_model->get_by_id($row->nik_saksi2);

            $data = array(
                'button' => 'Update',
                'action' => site_url('kelahiran/update_action'),
		'id_lahir' => set_value('id_lahir', $row->id_lahir),
        'no_kk'    => set_value('no_kk', $data_bayi->no_kk),
		'nis_bayi' => set_value('nis_bayi', $row->nis_bayi),
        'nama_depan_bayi' => set_value('nama_depan_bayi', $row->nama_depan_bayi),
        'nama_belakang_bayi' => set_value('nama_belakang_bayi', $row->nama_belakang_bayi),
		'tgl_lahir' => set_value('tgl_lahir', $row->tgl_lahir),
		'tpt_lahir' => set_value('tpt_lahir', $row->tpt_lahir),
		'jekel' => set_value('jekel', $row->jekel),
        'list_agama' => $list_agama,
        'id_agama' => set_value('id_agama', $data_bayi->id_agama),
		'berat_bayi' => set_value('berat_bayi', $row->berat_bayi),
		'anak_ke' => set_value('anak_ke', $row->anak_ke),
		'waktu' => set_value('waktu', $row->waktu),
		'panjang_bayi' => set_value('panjang_bayi', $row->panjang_bayi),

		'nik_ayah' => set_value('nik_ayah', $row->nik_ayah),
        'no_kk_ayah' => set_value('no_kk_ayah', $data_ayah->no_kk),
        'nama_depan_ayah' => set_value('nama_depan_ayah', $data_ayah->nama_depan),
        'nama_belakang_ayah' => set_value('nama_belakang_ayah', $data_ayah->nama_belakang),
        'jekel_ayah' => set_value('jekel_ayah', $data_ayah->jekel),
        'tempat_lhr_ayah' => set_value('tempat_lhr_ayah', $data_ayah->tempat_lhr),
        'tanggal_lhr_ayah' => set_value('tanggal_lhr_ayah', $this->tgl_indo($data_ayah->tanggal_lhr)),
        'agama_ayah' => set_value('agama_ayah', $data_ayah->agama),
        'kerja_ayah' => set_value('kerja_ayah', $data_ayah->kerja),
        'alamat_ayah' => set_value('alamat_ayah', $data_ayah->alamat.", RT ".$data_ayah->rt."/RW ".$data_ayah->rw.", Kel. ".$data_ayah->kelurahan.", Kec. ".$data_ayah->kecamatan.", Kab. ".$data_ayah->kabupaten),

		'nik_ibu' => set_value('nik_ibu', $row->nik_ibu),
        'no_kk_ibu' => set_value('no_kk_ibu', $data_ibu->no_kk),
        'nama_depan_ibu' => set_value('nama_depan_ibu', $data_ibu->nama_depan),
        'nama_belakang_ibu' => set_value('nama_belakang_ibu', $data_ibu->nama_belakang),
        'jekel_ibu' => set_value('jekel_ibu', $data_ibu->jekel),
        'tempat_lhr_ibu' => set_value('tempat_lhr_ibu', $data_ibu->tempat_lhr),
        'tanggal_lhr_ibu' => set_value('tanggal_lhr_ibu', $data_ibu->tanggal_lhr),
        'agama_ibu' => set_value('agama_ibu', $data_ibu->agama),
        'kerja_ibu' => set_value('kerja_ibu', $data_ibu->kerja),
        'alamat_ibu' => set_value('alamat_ibu', $data_ibu->alamat.", RT ".$data_ibu->rt."/RW ".$data_ibu->rw.", Kel. ".$data_ibu->kelurahan.", Kec. ".$data_ibu->kecamatan.", Kab. ".$data_ibu->kabupaten),

		'nik_saksi1' => set_value('nik_saksi1', $row->nik_saksi1),
        'no_kk_saksi1' => set_value('no_kk_saksi1', $data_saksi1->no_kk),
        'nama_depan_saksi1' => set_value('nama_depan_saksi1', $data_saksi1->nama_depan),
        'nama_belakang_saksi1' => set_value('nama_belakang_saksi1', $data_saksi1->nama_belakang),
        'jekel_saksi1' => set_value('jekel_saksi1', $data_saksi1->jekel),
        'tempat_lhr_saksi1' => set_value('tempat_lhr_saksi1', $data_saksi1->tempat_lhr),
        'tanggal_lhr_saksi1' => set_value('tanggal_lhr_saksi1', $data_saksi1->tanggal_lhr),
        'agama_saksi1' => set_value('agama_saksi1', $data_saksi1->agama),
        'kerja_saksi1' => set_value('kerja_saksi1', $data_saksi1->kerja),
        'alamat_saksi1' => set_value('alamat_saksi1', $data_saksi1->alamat.", RT ".$data_saksi1->rt."/RW ".$data_saksi1->rw.", Kel. ".$data_saksi1->kelurahan.", Kec. ".$data_saksi1->kecamatan.", Kab. ".$data_saksi1->kabupaten),

		'nik_saksi2' => set_value('nik_saksi2', $row->nik_saksi2),
        'no_kk_saksi2' => set_value('no_kk_saksi2', $data_saksi2->no_kk),
        'nama_depan_saksi2' => set_value('nama_depan_saksi2', $data_saksi2->nama_depan),
        'nama_belakang_saksi2' => set_value('nama_belakang_saksi2', $data_saksi2->nama_belakang),
        'jekel_saksi2' => set_value('jekel_saksi2', $data_saksi2->jekel),
        'tempat_lhr_saksi2' => set_value('tempat_lhr_saksi2', $data_saksi2->tempat_lhr),
        'tanggal_lhr_saksi2' => set_value('tanggal_lhr_saksi2', $data_saksi2->tanggal_lhr),
        'agama_saksi2' => set_value('agama_saksi2', $data_saksi2->agama),
        'kerja_saksi2' => set_value('kerja_saksi2', $data_saksi2->kerja),
        'alamat_saksi2' => set_value('alamat_saksi2', $data_saksi2->alamat.", RT ".$data_saksi2->rt."/RW ".$data_saksi2->rw.", Kel. ".$data_saksi2->kelurahan.", Kec. ".$data_saksi2->kecamatan.", Kab. ".$data_saksi2->kabupaten),

	    'titlenav' => 'SIMADES || Data Kelahiran',
        'title' => 'Data Kelahiran',
        'anchor' => 'Edit Data Kelahiran',
        'isi' => 'kelahiran/kelahiran_form_1',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelahiran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lahir', TRUE));
        } else {
            $data = array(
        'nis_bayi' => $this->input->post('nis_bayi',TRUE),
        'nama_depan_bayi' => $this->input->post('nama_depan_bayi',TRUE),
        'nama_belakang_bayi' => $this->input->post('nama_belakang_bayi',TRUE),
        'tgl_lahir' => $this->input->post('tgl_lahir',TRUE),
        'tpt_lahir' => $this->input->post('tpt_lahir',TRUE),
        'jekel' => $this->input->post('jekel',TRUE),
        'berat_bayi' => $this->input->post('berat_bayi',TRUE),
        'anak_ke' => $this->input->post('anak_ke',TRUE),
        'waktu' => $this->input->post('waktu',TRUE),
        'panjang_bayi' => $this->input->post('panjang_bayi',TRUE),
        //'nik_ayah' => $this->input->post('nik_ayah',TRUE),
        //'nik_ibu' => $this->input->post('nik_ibu',TRUE),
        //'nik_saksi1' => $this->input->post('nik_saksi1',TRUE),
        //'nik_saksi2' => $this->input->post('nik_saksi2',TRUE),
        );
            $nama_ayah = $this->input->post('nama_depan_ayah',TRUE)." ".$this->input->post('nama_belakang_ayah',TRUE);
            $nama_ibu = $this->input->post('nama_depan_ibu',TRUE)." ".$this->input->post('nama_belakang_ibu',TRUE);
            $data_pend = array(
        'nik' => $this->input->post('nis_bayi',TRUE),
        'no_kk' => $this->input->post('no_kk_ayah',TRUE),
        'nama_depan' => $this->input->post('nama_depan_bayi',TRUE),
        'nama_belakang' => $this->input->post('nama_belakang_bayi',TRUE),
        'jekel' => $this->input->post('jekel',TRUE),
        'id_agama' => $this->input->post('id_agama_ayah',TRUE),

        'tempat_lhr' => $this->input->post('tpt_lahir',TRUE),
        'tanggal_lhr' => $this->input->post('tgl_lahir',TRUE),
        'nama_ayah' => $nama_ayah,
        'nama_ibu' => $nama_ibu,
        'anak_ke' => $this->input->post('anak_ke',TRUE),

        );
            $this->Penduduk_model->update($this->input->post('nis_bayi', TRUE), $data_pend);

            $this->Kelahiran_model->update($this->input->post('id_lahir', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelahiran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kelahiran_model->get_by_id($id);

        if ($row) {

            $this->Kelahiran_model->delete($id);
            $this->Penduduk_model->delete($row->nis_bayi);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelahiran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelahiran'));
        }
    }

    public function _rules()
    {
    $this->form_validation->set_rules('no_kk', 'nomor kk bayi', 'trim|required');
	$this->form_validation->set_rules('nis_bayi', 'nis bayi', 'trim|required');
	$this->form_validation->set_rules('tgl_lahir', 'tgl lahir', 'trim|required');
	$this->form_validation->set_rules('tpt_lahir', 'tpt lahir', 'trim|required');
	$this->form_validation->set_rules('jekel', 'jekel', 'trim|required');
	$this->form_validation->set_rules('berat_bayi', 'berat bayi', 'trim|required');
	$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('panjang_bayi', 'panjang bayi', 'trim|required');

	//$this->form_validation->set_rules('id_lahir', 'id_lahir', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules2()
    {

    $this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim|required');
    $this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim|required');
    $this->form_validation->set_rules('nik_saksi1', 'nik saksi1', 'trim|required');
    $this->form_validation->set_rules('nik_saksi2', 'nik saksi2', 'trim|required');

    $this->form_validation->set_rules('id_lahir', 'id_lahir', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function tgl_indo($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan   = $this->getBulan(substr($tgl,5,2));
        $tahun   = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;
    }
    function getBulan($bln){
        switch ($bln){
        case 1:
        return "Januari";
        break;
        case 2:
        return "Februari";
        break;
        case 3:
        return "Maret";
        break;
        case 4:
        return "April";
        break;
        case 5:
        return "Mei";
        break;
        case 6:
        return "Juni";
        break;
        case 7:
        return "Juli";
        break;
        case 8:
        return "Agustus";
        break;
        case 9:
        return "September";
        break;
        case 10:
        return "Oktober";
        break;
        case 11:
        return "November";
        break;
        case 12:
        return "Desember";
        break;
        }
    }
}

/* End of file Kelahiran.php */
/* Location: ./application/controllers/Kelahiran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:07 */
/* http://harviacode.com */
