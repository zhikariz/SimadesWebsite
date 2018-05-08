<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Nyoba extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //$this->load->model('Penduduk_model');
    }

    public function index()
    {
        /*$data = array(
            'titlenav' => 'SIMADES || Data Kelahiran',
            'title' => 'Data Kelahiran',
            'anchor' => 'Daftar Kelahiran',
            'isi' => 'nyoba',
        ); */
        //$this->load->view('layout/wrapper', $data);
        $this->load->view('nyoba');
    }

    
}