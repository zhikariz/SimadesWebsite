<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {

	public function index()
	{
		$data = array(
				'id_user' => $this->session->userdata('id_user'),
                'nama_user' => $this->session->userdata('nama_user'),
                'jabatan' => $this->session->userdata('jabatan'),
                'nama_desa' => $this->session->userdata('nama_desa'),
                'titlenav'  => 'SIMADES || Blank Page',
                'title'     => 'Blank Page',
                'anchor'    => 'Blank Page',
                'isi'       => 'blank',
                );
		$this->load->view('layout/wrapper', $data);
	}
}
