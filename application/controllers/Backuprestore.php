<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backuprestore extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url','file','download'));
    }

    public function index()
    {
        $data = array(
            
            'titlenav' => 'SIMADES || Backup Restore Data',
            'title' => 'Backup Restore Data',
            'anchor' => 'Backup Restore',
            'keterangan_backup' => 'Membuat database cadangan sehingga data tersebut dapat digunakan kembali apabila terjadi kerusakan atau kehilangan.',
            'keterangan_restore' => 'Memulihkan database dengan cara mengupload database cadangan yang pernah dibackup sebelumnya',
            'isi' => 'backuprestore',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function backup(){
        
        
        $tanggal=date('Ymd-His');
        $namaFile=$tanggal . '.sql.zip';
        $this->load->dbutil();
        $backup=& $this->dbutil->backup();
        force_download($namaFile, $backup);
    }

    public function restore(){
        //upload dulu filenya
        $fupload = $_FILES['datafile'];
        $nama = $_FILES['datafile']['name'];
        if(isset($fupload)){
            $lokasi_file = $fupload['tmp_name'];
            $direktori="backupdb/$nama";
            move_uploaded_file($lokasi_file,"$direktori");
        }
        //restore database
        $isi_file=file_get_contents($direktori);
        $string_query=rtrim($isi_file, "\n;" );
        $array_query=explode(";", $string_query);
        foreach($array_query as $query){
            $this->db->query($query);
        }
        //$data['page']='restore';
        //$this->load->view('home',$data);
    }
}