<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    require APPPATH . '/libraries/REST_Controller.php';
    use Restserver\Libraries\REST_Controller;

class Api extends REST_Controller {

  function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
      echo "Mo Ngapaen Bro !";
    }

    function profil_desa_get(){
       $id = $this->get('id');

      if ($id == '') {
          $profil_desa = $this->db->get('profil_desa')->result();
      } else {
          $this->db->where('id_desa', $id);
          $profil_desa = $this->db->get('profil_desa')->result();
      }

      $this->response($profil_desa, 200);
    }


}
