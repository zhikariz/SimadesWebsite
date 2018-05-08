<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Jabatan_model');
        $this->load->model('Memiliki_jabatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        //$user = $this->User_model->get_limit_data($config['per_page'], $start, $q);
        $user = $this->User_model->get_all();
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'id_user' => $this->session->userdata('id_user'),
            'nama_user' => $this->session->userdata('nama_user'),
            'jabatan' => $this->session->userdata('jabatan'),
            'nama_desa' => $this->session->userdata('nama_desa'),
            'titlenav' => 'SIMADES || Kelola Akun User',
            'title' => 'Kelola Akun User',
            'anchor' => 'Daftar Akun',
            'isi' => 'user/user_list',
        );
        $this->load->view('layout/wrapper', $data);
        
        //$this->template->display('user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'username' => $row->username,
		'password' => $row->password,
		'nama_depan' => $row->nama_depan_user,
		'nama_belakang' => $row->nama_belakang_user,
		'id_jabatan' => $row->jabatan,
        'nip' => $row->nip,
		'aktif' => $row->aktif,
        'id_user' => $this->session->userdata('id_user'),
        'nama_user' => $this->session->userdata('nama_user'),
        'jabatan' => $this->session->userdata('jabatan'),
        'nama_desa' => $this->session->userdata('nama_desa'),
        'titlenav' => 'SIMADES || Kelola Akun User',
	    'title' => 'Kelola Akun User',
        'anchor' => 'Detail Akun',
        'isi' => 'user/user_read',
        );
            $this->load->view('layout/wrapper', $data);
            //$this->template->display('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $list_jabatan = $this->Jabatan_model->get_all();

        $data = array(
            'button' => 'Tambah',
            'action' => site_url('user/create_action'),
	    'id_user' => set_value('id_user'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama_depan' => set_value('nama_depan'),
	    'nama_belakang' => set_value('nama_belakang'),
        'list_jabatan' => $list_jabatan,
	    'id_jabatan' => set_value('id_jabatan'),
        'nip' => set_value('nip'),
	    'aktif' => set_value('aktif'),
        'id_user' => $this->session->userdata('id_user'),
        'nama_user' => $this->session->userdata('nama_user'),
        'jabatan' => $this->session->userdata('jabatan'),
        'nama_desa' => $this->session->userdata('nama_desa'),
        'titlenav' => 'SIMADES || Kelola Akun User',
	    'title' => 'Kelola Akun User',
        'anchor' => 'Tambah Akun',
        'isi' => 'user/user_form',
        );
        $this->load->view('layout/wrapper', $data);
        
        //$this->template->display('user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $cek_user = $this->User_model->get_user($this->input->post('username',TRUE));

        if($cek_user){
            $this->session->set_flashdata('message', 'Username sudah ada');
            $this->create();
        }
        else{

            if ($this->form_validation->run() == FALSE) {
                $this->create();
               
            } else {
                //$passmd5 = md5($this->input->post('password')); 
                $jabatan = $this->input->post('id_jabatan');
                $data = array(
    		'username' => $this->input->post('username',TRUE),
    		'password' => $this->input->post('password',TRUE),
    		'nama_depan_user' => $this->input->post('nama_depan',TRUE),
    		'nama_belakang_user' => $this->input->post('nama_belakang',TRUE),
    		//'id_jabatan' => $jabatan[0],
            'nip' => $this->input->post('nip',TRUE),
    		'aktif' => $this->input->post('aktif',TRUE),
    	    );
                $this->User_model->insert($data);
                $get_id = $this->User_model->get_user($this->input->post('username',TRUE));
                
                for ($i=0; $i < sizeof($jabatan); $i++) { 
                        $data_jabatan = array(
                    'id_jabatan' => $jabatan[$i],
                    'id_user' => $get_id->id_user,
                    
                    );
                    $this->Memiliki_jabatan_model->insert($data_jabatan);
                }

                
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('user'));
            }
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);
        $list_jabatan = $this->Jabatan_model->get_all();

        

            if ($row) {
                $data = array(
                    'button' => 'Edit',
                    'action' => site_url('user/update_action/'.$id),
    		//'id_usr' => set_value('id_user', $row->id_user),
    		'username' => set_value('username', $row->username),
    		'password' => set_value('password', $row->password),
    		'nama_depan' => set_value('nama_depan', $row->nama_depan_user),
    		'nama_belakang' => set_value('nama_belakang', $row->nama_belakang_user),
    		//'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
            //'list_jabatan' => $list_jabatan,
            'nip' => set_value('nip', $row->nip),
    		'aktif' => set_value('aktif', $row->aktif),
            'id_user' => $this->session->userdata('id_user'),
            'nama_user' => $this->session->userdata('nama_user'),
            'jabatan' => $this->session->userdata('jabatan'),
            'nama_desa' => $this->session->userdata('nama_desa'),
            'titlenav' => 'SIMADES || Kelola Akun User',
    	    'title' => 'Kelola Akun User',
            'anchor' => 'Edit Akun',
            'isi' => 'user/user_edit',
            );
                $this->load->view('layout/wrapper', $data);
                //$this->template->display('user/user_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('user'));
            }
        
    }
    
    public function update_action($id) 
    {
        $this->_rules();
        if($cek_user){
            $this->session->set_flashdata('message', 'Username sudah ada');
            $this->create();
        }
        else{

            if ($this->form_validation->run() == FALSE) {
                $this->update($id);
            } else {
                $data = array(
    		'username' => $this->input->post('username',TRUE),
    		'password' => $this->input->post('password',TRUE),
    		'nama_depan_user' => $this->input->post('nama_depan',TRUE),
    		'nama_belakang_user' => $this->input->post('nama_belakang',TRUE),
    		//'id_jabatan' => $this->input->post('id_jabatan',TRUE),
            'nip' => $this->input->post('nip',TRUE),
    		'aktif' => $this->input->post('aktif',TRUE),
    	    );

                $this->User_model->update($id, $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('user'));
            }
        }
    }
    
    public function non_aktif($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array('aktif' => 'Non Aktif' );
            $this->User_model->update($id, $data);
            $this->session->set_flashdata('message', 'Non Aktif Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function aktif($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array('aktif' => 'Aktif' );
            $this->User_model->update($id, $data);
            $this->session->set_flashdata('message', 'Aktif Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
	$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim|required');
	//$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
	$this->form_validation->set_rules('aktif', 'aktif', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-03 12:38:49 */
/* http://harviacode.com */