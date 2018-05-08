<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'layanan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'layanan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'layanan/index.html';
            $config['first_url'] = base_url() . 'layanan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Layanan_model->total_rows($q);
        $layanan = $this->Layanan_model->get_limit_data($config['per_page'], $start, $c, $q);
        //$layanan = $this->Layanan_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'layanan_data' => $layanan,
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Riwayat Transaksi',
            'title'         => 'Riwayat Transaksi',
            'anchor'        => 'Daftar Riwayat Transaksi',
            'isi'           => 'layanan/layanan_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function read($id) 
    {
        $row = $this->Layanan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_layanan' => $row->id_layanan,
		'nik' => $row->nik,
		'id_user' => $row->id_user,
	    );
            $this->load->view('layanan/layanan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('layanan/create_action'),
	    'id_layanan' => set_value('id_layanan'),
	    'nik' => set_value('nik'),
	    'id_user' => set_value('id_user'),
	);
        $this->load->view('layanan/layanan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );

            $this->Layanan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('layanan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Layanan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('layanan/update_action'),
		'id_layanan' => set_value('id_layanan', $row->id_layanan),
		'nik' => set_value('nik', $row->nik),
		'id_user' => set_value('id_user', $row->id_user),
	    );
            $this->load->view('layanan/layanan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_layanan', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
	    );

            $this->Layanan_model->update($this->input->post('id_layanan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('layanan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Layanan_model->get_by_id($id);

        if ($row) {
            $this->Layanan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('layanan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('layanan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');

	$this->form_validation->set_rules('id_layanan', 'id_layanan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:29 */
/* http://harviacode.com */