<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kk/index.html';
            $config['first_url'] = base_url() . 'kk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kk_model->total_rows($q);
        $kk = $this->Kk_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kk_data' => $kk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('kk/kk_list', $data);
    }

    public function read($id)
    {
        $row = $this->Kk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_kk' => $row->no_kk,
		'alamat' => $row->alamat,
		'rt' => $row->rt,
		'rw' => $row->rw,
		'kelurahan' => $row->kelurahan,
		'kecamatan' => $row->kecamatan,
		'kabupaten' => $row->kabupaten,
		'propinsi' => $row->propinsi,
		'kode_pos' => $row->kode_pos,
	    );
            $this->load->view('kk/kk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kk'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kk/create_action'),
	    'no_kk' => set_value('no_kk'),
	    'alamat' => set_value('alamat'),
	    'rt' => set_value('rt'),
	    'rw' => set_value('rw'),
	    'kelurahan' => set_value('kelurahan'),
	    'kecamatan' => set_value('kecamatan'),
	    'kabupaten' => set_value('kabupaten'),
	    'propinsi' => set_value('propinsi'),
	    'kode_pos' => set_value('kode_pos'),
	);
        $this->load->view('kk/kk_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'alamat' => $this->input->post('alamat',TRUE),
		'rt' => $this->input->post('rt',TRUE),
		'rw' => $this->input->post('rw',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'propinsi' => $this->input->post('propinsi',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
	    );

            $this->Kk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kk'));
        }
    }

    public function update($id)
    {
        $row = $this->Kk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kk/update_action'),
		'no_kk' => set_value('no_kk', $row->no_kk),
		'alamat' => set_value('alamat', $row->alamat),
		'rt' => set_value('rt', $row->rt),
		'rw' => set_value('rw', $row->rw),
		'kelurahan' => set_value('kelurahan', $row->kelurahan),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'propinsi' => set_value('propinsi', $row->propinsi),
		'kode_pos' => set_value('kode_pos', $row->kode_pos),
	    );
            $this->load->view('kk/kk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kk'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_kk', TRUE));
        } else {
            $data = array(
		'alamat' => $this->input->post('alamat',TRUE),
		'rt' => $this->input->post('rt',TRUE),
		'rw' => $this->input->post('rw',TRUE),
		'kelurahan' => $this->input->post('kelurahan',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'propinsi' => $this->input->post('propinsi',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
	    );

            $this->Kk_model->update($this->input->post('no_kk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kk'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kk_model->get_by_id($id);

        if ($row) {
            $this->Kk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kk'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('rt', 'rt', 'trim|required');
	$this->form_validation->set_rules('rw', 'rw', 'trim|required');
	$this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('propinsi', 'propinsi', 'trim|required');
	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');

	$this->form_validation->set_rules('no_kk', 'no_kk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kk.php */
/* Location: ./application/controllers/Kk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-03 12:39:49 */
/* http://harviacode.com */
