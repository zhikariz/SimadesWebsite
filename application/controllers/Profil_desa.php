<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_desa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_desa_model');
        $this->load->model('User_model');
        //$this->load->library('form_validation','upload','image_lib');
        $this->load->library('upload');
        // $this->load->helper(array('html','url'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $isi_data = $this->Profil_desa_model->total_rows($q);

        if ($isi_data>0) {
            $this->update(1);

        }
        else{
            $data = array(

                'action'    => '/profil_desa/create',
                'id_user'   => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama_user'),
                'jabatan'   => $this->session->userdata('jabatan'),
                'nama_desa' => $this->session->userdata('nama_desa'),
                'logo_desa' => $this->session->userdata('logo_desa'),
                'titlenav'  => 'SIMADES || Profil Desa',
                'title'     => 'Profil Desa',
                'anchor'    => 'Profil Desa',
                'isi'       => 'profil_desa/profil_desa_awal',
                'button'    => 'Buat Profil Baru',
                'keterangan'=> 'Buat profil desa anda',

            );
            $this->load->view('layout/wrapper', $data);
        }
    }

    public function read($id)
    {
        $row = $this->Profil_desa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode_desa' => $row->kode_desa,
		'nm_desa' => $row->nm_desa,
		'kecamatan' => $row->kecamatan,
		'kabupaten' => $row->kabupaten,
        'propinsi' => $row->propinsi,
		'nm_kepdes' => $row->nm_kepdes,
		'nip_kepdes' => $row->nip_kepdes,
		'alamat_desa' => $row->alamat_desa,
        'no_telp' => $row->no_telp,
		'kode_pos' => $row->kode_pos,
        'logo_desa' => $row->image,
        'id_user'   => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama_user'),
                'jabatan'   => $this->session->userdata('jabatan'),
                'nama_desa' => $this->session->userdata('nama_desa'),
                'logo_desa' => $this->session->userdata('logo_desa'),
                'titlenav'  => 'SIMADES || Profil Desa',
                'title'     => 'Profil Desa',
                'anchor'    => 'Profil Desa',
                'isi'       => 'profil_desa/profil_desa_read',

	    );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_desa'));
        }
    }

    public function create()
    {
        $dataKepdes=$this->User_model->get_by_where('Kepala Desa');
        $data = array(
            'button' => 'Buat',
            'empty' => '',
            'action' => site_url('profil_desa/create_action'),
	    'id_desa' => set_value('id_desa'),
        'kode_desa' => set_value('kd_desa'),
	    'nm_desa' => set_value('nm_desa'),
	    'kecamatan' => set_value('kecamatan'),
	    'kabupaten' => set_value('kabupaten'),
        'propinsi' => set_value('propinsi'),
	    'nm_kepdes' => set_value('nm_kepdes',$dataKepdes->nama_depan_user.' '.$dataKepdes->nama_belakang_user),
	    'nip_kepdes' => set_value('nip_kepdes',$dataKepdes->nip),
	    'alamat_desa' => set_value('alamat_desa'),
        'no_telp' => set_value('no_telp'),
	    'kode_pos' => set_value('kode_pos'),
        'logo_desa' => set_value('logo_desa'),
        'id_user' => $this->session->userdata('id_user'),
        'nama_user' => $this->session->userdata('nama_user'),
        'jabatan' => $this->session->userdata('jabatan'),
        'nama_desa' => $this->session->userdata('nama_desa'),
        'logo_desa' => $this->session->userdata('logo_desa'),
        'titlenav'  => 'SIMADES || Profil Desa',
        'title'     => 'Profil Desa',
        'anchor'    => 'Form Profil Desa',
        'isi'       => 'profil_desa/profil_desa_form',
	);
        $this->load->view('layout/wrapper', $data);
    }

    public function create_action()
    {
         $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            //upload image logo
            $config['upload_path']          = './uploads/image';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 10000000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('logo_desa')){
                    $error = array('error' => $this->upload->display_errors(),
                        'id_user'   => $this->session->userdata('id_user'),
                        'nama_user' => $this->session->userdata('nama_user'),
                        'jabatan'   => $this->session->userdata('jabatan'),
                        'nama_desa' => $this->session->userdata('nama_desa'),
                        'logo_desa' => $this->session->userdata('logo_desa'),
                        'titlenav'  => 'SIMADES || Profil Desa',
                        'title'     => 'Profil Desa *Upload Error',
                        'anchor'    => 'Form Profil Desa',
                        'isi'       => 'profil_desa/profil_desa_form',
                        );
                    $this->load->view('layout/wrapper', $error);

            }else{
                    $data_image = $this->upload->data();
                    $image = $data_image['file_name'];
                  }


            $kode_desa = $this->input->post('kd_desa',TRUE);
            $data = array(
		'kode_desa' => $kode_desa,
        'nm_desa' => $this->input->post('nm_desa',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
        'propinsi' => $this->input->post('propinsi',TRUE),
		'nm_kepdes' => $this->input->post('nm_kepdes',TRUE),
		'nip_kepdes' => $this->input->post('nip_kepdes',TRUE),
		'alamat_desa' => $this->input->post('alamat_desa',TRUE),
        'no_telp' => $this->input->post('no_telp',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
        'image' => $image,
	    );

            $this->Profil_desa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            $this->session->set_userdata('nama_desa', $data['nm_desa']);
            $this->session->set_userdata('logo_desa', $data['image']);
            redirect(site_url('dashboard'));
            }

    }

    public function update($id)
    {
        $row = $this->Profil_desa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'empty'  =>  'ada',
                'action' => site_url('profil_desa/edit/1'),
		'id_desa' => set_value('id_desa', $row->id_desa),
        'kode_desa' => set_value('kode_desa', $row->kode_desa),
		'nm_desa' => set_value('nm_desa', $row->nm_desa),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
        'propinsi' => set_value('propinsi', $row->propinsi),
		'nm_kepdes' => set_value('nm_kepdes', $row->nm_kepdes),
		'nip_kepdes' => set_value('nip_kepdes', $row->nip_kepdes),
		'alamat_desa' => set_value('alamat_desa', $row->alamat_desa),
        'no_telp' => set_value('no_telp', $row->no_telp),
		'kode_pos' => set_value('kode_pos', $row->kode_pos),
        'logo_desa' => set_value('logo_desa', $row->image),
        'id_user' => $this->session->userdata('id_user'),
        'nama_user' => $this->session->userdata('nama_user'),
        'jabatan' => $this->session->userdata('jabatan'),
        'nama_desa' => $this->session->userdata('nama_desa'),
        'logo_desa' => $this->session->userdata('logo_desa'),
        'titlenav'  => 'SIMADES || Profil Desa',
        'title'     => 'Profil Desa',
        'anchor'    => 'Profil Desaku',
        'isi'       => 'profil_desa/profil_desa_form-read',
	    );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dashboard'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_desa', TRUE));
        } else {
            //upload image logo
            $def_image   = $this->input->post('def_image',TRUE);
            $config['upload_path']          = './uploads/image';
            $config['allowed_types']        = 'gif|jpg|jpeg|png';
            $config['max_size']             = 100000000000;
            $config['max_width']            = 100000000000;
            $config['max_height']           = 100000000000;

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('logo_desa')){
                    $error = array('error' => $this->upload->display_errors(),
                        'id_user'   => $this->session->userdata('id_user'),
                        'nama_user' => $this->session->userdata('nama_user'),
                        'jabatan'   => $this->session->userdata('jabatan'),
                        'nama_desa' => $this->session->userdata('nama_desa'),
                        'logo_desa' => $this->session->userdata('logo_desa'),
                        'titlenav'  => 'SIMADES || Profil Desa',
                        'title'     => 'Profil Desa *Upload Error',
                        'anchor'    => 'Form Profil Desa',
                        'isi'       => 'profil_desa/profil_desa_form',
                        );
                    $this->load->view('layout/wrapper', $error);

            }else{
                    $data_image = $this->upload->data();
                    $image = $data_image['file_name'];
            }


            if($image==NULL){
                     $data = array(
                'kode_desa' => $this->input->post('kd_desa',TRUE),
                'nm_desa' => $this->input->post('nm_desa',TRUE),
                'kecamatan' => $this->input->post('kecamatan',TRUE),
                'kabupaten' => $this->input->post('kabupaten',TRUE),
                'propinsi' => $this->input->post('propinsi',TRUE),
                'nm_kepdes' => $this->input->post('nm_kepdes',TRUE),
                'nip_kepdes' => $this->input->post('nip_kepdes',TRUE),
                'alamat_desa' => $this->input->post('alamat_desa',TRUE),
                'no_telp' => $this->input->post('no_telp',TRUE),
                'kode_pos' => $this->input->post('kode_pos',TRUE),

                );

            } else {

                    $data = array(
                'kode_desa' => $this->input->post('kd_desa',TRUE),
        		'nm_desa' => $this->input->post('nm_desa',TRUE),
        		'kecamatan' => $this->input->post('kecamatan',TRUE),
        		'kabupaten' => $this->input->post('kabupaten',TRUE),
                'propinsi' => $this->input->post('propinsi',TRUE),
        		'nm_kepdes' => $this->input->post('nm_kepdes',TRUE),
        		'nip_kepdes' => $this->input->post('nip_kepdes',TRUE),
        		'alamat_desa' => $this->input->post('alamat_desa',TRUE),
                'no_telp' => $this->input->post('no_telp',TRUE),
        		'kode_pos' => $this->input->post('kode_pos',TRUE),
                'image'  => $image,
        	    );

                $this->session->set_userdata('logo_desa', $data['image']);
            }


            $this->Profil_desa_model->update(1, $data);
            $this->session->set_userdata('nama_desa', $data['nm_desa']);
            $this->session->set_flashdata('message', 'Update Record Success');

            redirect(site_url('profil_desa/read/1'));
        }
    }

    public function edit($id) {
        $row = $this->Profil_desa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'empty'  =>  'ada',
                'action' => site_url('profil_desa/update_action'),
    'id_desa' => set_value('id_desa', $row->id_desa),
        'kode_desa' => set_value('kode_desa', $row->kode_desa),
    'nm_desa' => set_value('nm_desa', $row->nm_desa),
    'kecamatan' => set_value('kecamatan', $row->kecamatan),
    'kabupaten' => set_value('kabupaten', $row->kabupaten),
        'propinsi' => set_value('propinsi', $row->propinsi),
    'nm_kepdes' => set_value('nm_kepdes', $row->nm_kepdes),
    'nip_kepdes' => set_value('nip_kepdes', $row->nip_kepdes),
    'alamat_desa' => set_value('alamat_desa', $row->alamat_desa),
        'no_telp' => set_value('no_telp', $row->no_telp),
    'kode_pos' => set_value('kode_pos', $row->kode_pos),
        'logo_desa' => set_value('logo_desa', $row->image),
        'id_user' => $this->session->userdata('id_user'),
        'nama_user' => $this->session->userdata('nama_user'),
        'jabatan' => $this->session->userdata('jabatan'),
        'nama_desa' => $this->session->userdata('nama_desa'),
        'logo_desa' => $this->session->userdata('logo_desa'),
        'titlenav'  => 'SIMADES || Profil Desa',
        'title'     => 'Profil Desa',
        'anchor'    => 'Profil Desaku',
        'isi'       => 'profil_desa/profil_desa_form-edit',
      );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dashboard'));
        }
    }

  

    public function truncate()
    {
        $this->Profil_desa_model->truncate();
        $this->session->unset_userdata('nama_desa');
        $this->session->unset_userdata('logo_desa');

        redirect(site_url('profil_desa/'));
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nm_desa', 'nm desa', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
    $this->form_validation->set_rules('propinsi', 'propinsi', 'trim|required');
	$this->form_validation->set_rules('nm_kepdes', 'nm kepdes', 'trim|required');
	$this->form_validation->set_rules('nip_kepdes', 'nip kepdes', 'trim|required');
	$this->form_validation->set_rules('alamat_desa', 'alamat desa', 'trim|required');
    $this->form_validation->set_rules('no_telp', 'nomor telepon', 'trim|required');
	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
	$this->form_validation->set_rules('kd_desa', 'kode desa', 'trim|required');
    // $this->form_validation->set_rules('logo_desa', 'logo desa', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Profil_desa.php */
/* Location: ./application/controllers/Profil_desa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-15 13:15:56 */
/* http://harviacode.com */
