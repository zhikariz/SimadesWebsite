<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kepergian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kepergian_model');
        $this->load->model('Penduduk_model');
        $this->load->model('Kk_model');
        $this->load->model('Agama_model');
        $this->load->model('Goldar_model');
        $this->load->model('Status_kawin_model');
        $this->load->model('Kerja_model');
        $this->load->model('Hubkel_model');
        $this->load->model('Pendidikan_model');
        $this->load->model('Layanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kepergian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kepergian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kepergian/index.html';
            $config['first_url'] = base_url() . 'kepergian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kepergian_model->total_rows($q);
        $kepergian = $this->Kepergian_model->get_limit_data($config['per_page'], $start, $c, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kepergian_data' => $kepergian,
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav' => 'SIMADES || Data Kepergian',
            'title' => 'Data Kepergian',
            'anchor' => 'Daftar Kepergian',
            'isi' => 'kepergian/kepergian_list',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function read($id)
    {
        $row = $this->Kepergian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pergi' => $row->id_pergi,
		'nik_pergi' => $row->nik_pergi,
		'alamat_tuju' => $row->alamat_tuju,
		'alasan' => $row->alasan,
	    );
            $this->load->view('kepergian/kepergian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepergian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kepergian/create_action'),
	    'id_pergi' => set_value('id_pergi'),
	    'nik_pergi' => set_value('nik_pergi'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'jekel' => set_value('jekel'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),

	    'alamat_tuju' => set_value('alamat_tuju'),
        'kode_pos' => set_value('kode_pos'),
        'alasan' => set_value('alasan'),

        'tgl_pergi' => set_value('tgl_pergi'),

	    'titlenav' => 'SIMADES || Data Kepergian',
        'title' => 'Data Kepergian',
        'anchor' => 'Tambah Data Kepergian',
        'isi' => 'kepergian/kepergian_form',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik_pergi' => $this->input->post('nik_pergi',TRUE),
		'alamat_tuju' => $this->input->post('alamat_tuju',TRUE),
        'kode_pos' => $this->input->post('kode_pos',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
        'tgl_pergi' => $this->input->post('tgl_pergi',TRUE),


	    );
            $data_layanan = array (
        'nik'   => $this->input->post('nik_pergi',TRUE),
        'id_user'   => $this->session->userdata('id_user'),
        'waktu_layanan' => date('Y-m-d h:i:s'),
        'nama_layanan' => 'Mutasi Pergi',
        );

            $data_pend = array(
        'status' => 'MP',
        'tgl_mutasi' => date('Y-m-d'),
                );

            $this->Penduduk_model->update($this->input->post('nik_pergi',TRUE), $data_pend);
            $this->Layanan_model->insert($data_layanan);
            $this->Kepergian_model->insert($data);
            $this->session->set_flashdata('message', '!!TAMBAH DATA SUKSES!!');

/*            if($this->input->post('pengikut',TRUE)=='Sendiri'){

                redirect(site_url('kepergian'));
            }
            else{
                $dataPend=$this->Penduduk_model->get_by_id($this->input->post('nik_pergi',TRUE));

                redirect(site_url('kepergian/listAnggota/'.$dataPend->no_kk));
            } */

            redirect(site_url('kepergian'));
        }
    }

    public function listAnggota($nokk)
    {

        $penduduk = $this->Penduduk_model->get_all_kk($nokk);

        $data = array(
            'penduduk_data' => $penduduk,

            'action'    => 'kepergian/action_anggota',
            'button'    => 'Selesai',
            'no_kk'     => $nokk,
            'titlenav'  => 'SIMADES || Data Penduduk',
            'title'     => 'Data Penduduk',
            'anchor'    => 'Daftar Penduduk',
            'isi'       => 'kepergian/kepergian_list_anggota',

        );
        $this->load->view('layout/wrapper', $data);

    }

    public function update($id)
    {
        $row = $this->Kepergian_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kepergian/update_action'),
		'id_pergi' => set_value('id_pergi', $row->id_pergi),
		'nik_pergi' => set_value('nik_pergi', $row->nik_pergi),
		'alamat_tuju' => set_value('alamat_tuju', $row->alamat_tuju),
		'alasan' => set_value('alasan', $row->alasan),
	    'titlenav' => 'SIMADES || Data Kepergian',
        'title' => 'Data Kepergian',
        'anchor' => 'Edit Data Kepergian',
        'isi' => 'kepergian/kepergian_form',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepergian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pergi', TRUE));
        } else {
            $data = array(
		'nik_pergi' => $this->input->post('nik_pergi',TRUE),
		'alamat_tuju' => $this->input->post('alamat_tuju',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
	    );

            $this->Kepergian_model->update($this->input->post('id_pergi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kepergian'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kepergian_model->get_by_id($id);

        if ($row) {
            $this->Kepergian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kepergian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepergian'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nik_pergi', 'nik pergi', 'trim|required');
	$this->form_validation->set_rules('alamat_tuju', 'alamat tuju', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');

	$this->form_validation->set_rules('id_pergi', 'id_pergi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kepergian.php */
/* Location: ./application/controllers/Kepergian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:20 */
/* http://harviacode.com */
