<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Web_App_Model extends CI_Model {

    //query otomatis dengan active record
    public function getAllData($table) {
        return $this->db->get($table);
    }
}
?>