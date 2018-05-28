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

    function profil_desa_put() {
        $id = $this->put('id_desa');
        $data = array(
                    'id_desa'       => $this->put('id_desa'),
                    'kode_desa'     => $this->put('kode_desa'),
                    'nm_desa'       => $this->put('nm_desa'),
                    'kecamatan'     => $this->put('kecamatan'),
                    'kabupaten'     => $this->put('kabupaten'),
                    'propinsi'      => $this->put('propinsi'),
                    'nm_kepdes'     => $this->put('nm_kepdes'),
                    'nip_kepdes'    => $this->put('nip_kepdes'),
                    'alamat_desa'   => $this->put('alamat_desa'),
                    'no_telp'       => $this->put('no_telp'),
                    'kode_pos'      => $this->put('kode_pos'),
                    'image'         => $this->put('image')
                    );
        $this->db->where('id_desa', $id);
        $update = $this->db->update('profil_desa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function penduduk_get(){
      $id = $this->get('no_kk');

      if($id == '') {
        $penduduk = $this->db->get('penduduk')->result();
      } else {
        $this->db->where('no_kk', $id);
        $penduduk = $this->db->get('penduduk')->result();
      }

      $this->response($penduduk, 200);
    }

    function kelahiran_get(){
      $id = $this->get('id_lahir');

      if($id == '') {
        $kelahiran = $this->db->get('kelahiran')->result();
      } else {
        $this->db->where('id_lahir', $id);
        $kelahiran = $this->db->get('kelahiran')->result();
      }

      $this->response($kelahiran, 200);

    }

    function kematian_get(){
      $id = $this->get('id_mati');

      if($id == '') {
        $kematian = $this->db->get('kematian')->result();
      } else {
        $this->db->where('id_mati', $id);
        $kematian = $this->db->get('kematian')->result();
      }

      $this->response($kematian, 200);

    }

    function datang_get(){
      $id = $this->get('id_datang');

      if($id == '') {
        $kedatangan = $this->db->get('kedatangan')->result();
      } else {
        $this->db->where('id_datang', $id);
        $kedatangan = $this->db->get('kedatangan')->result();
      }

      $this->response($kedatangan, 200);

    }

    function pergi_get(){
      $id = $this->get('id_pergi');

      if($id == '') {
        $kepergian = $this->db->get('kepergian')->result();
      } else {
        $this->db->where('id_pergi', $id);
        $kepergian = $this->db->get('kepergian')->result();
      }

      $this->response($kepergian, 200);

    }

    function user_get() {
      $id = $this->get('id_user');

      if($id == '') {
        $user = $this->db->get('user')->result();
      } else {
        $this->db->where('id_user', $id);
        $user = $this->db->get('user')->result();
      }

      $this->response($user, 200);

    }

    function surat_kelahiran_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_kelahiran = $this->db->get('history_surat_kelahiran')->result();
      } else {
        $this->db->where('id', $id);
        $surat_kelahiran = $this->db->get('history_surat_kelahiran')->result();
      }

      $this->response($surat_kelahiran, 200);
    }

    function surat_usaha_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_usaha = $this->db->get('history_surat_usaha')->result();
      } else {
        $this->db->where('id', $id);
        $surat_usaha = $this->db->get('history_surat_usaha')->result();
      }

      $this->response($surat_usaha, 200);
    }

    function surat_kematian_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_kematian = $this->db->get('history_surat_meninggal')->result();
      } else {
        $this->db->where('id', $id);
        $surat_kematian = $this->db->get('history_surat_meninggal')->result();
      }

      $this->response($surat_kematian, 200);
    }

    function surat_pengantar_skck_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_pengantar_skck = $this->db->get('history_surat_pengantar')->result();
      } else {
        $this->db->where('id', $id);
        $surat_pengantar_skck = $this->db->get('history_surat_pengantar')->result();
      }

      $this->response($surat_pengantar_skck, 200);
    }

    function surat_wali_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_wali = $this->db->get('history_surat_wali')->result();
      } else {
        $this->db->where('id', $id);
        $surat_wali = $this->db->get('history_surat_wali')->result();
      }

      $this->response($surat_wali, 200);
    }

    function surat_blm_menikah_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_blm_menikah = $this->db->get('history_surat_blm_menikah')->result();
      } else {
        $this->db->where('id', $id);
        $surat_blm_menikah = $this->db->get('history_surat_blm_menikah')->result();
      }

      $this->response($surat_blm_menikah, 200);
    }

    function surat_izin_keramaian_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_izin_keramaian = $this->db->get('history_surat_keramaian')->result();
      } else {
        $this->db->where('id', $id);
        $surat_izin_keramaian = $this->db->get('history_surat_keramaian')->result();
      }

      $this->response($surat_izin_keramaian, 200);
    }

    function surat_bepergian_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_bepergian = $this->db->get('history_surat_bepergian')->result();
      } else {
        $this->db->where('id', $id);
        $surat_bepergian = $this->db->get('history_surat_bepergian')->result();
      }

      $this->response($surat_bepergian, 200);
    }

    function surat_kehilangan_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_kehilangan = $this->db->get('history_surat_kehilangan')->result();
      } else {
        $this->db->where('id', $id);
        $surat_kehilangan = $this->db->get('history_surat_kehilangan')->result();
      }

      $this->response($surat_kehilangan, 200);
    }

    function surat_tidak_mampu_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_tidak_mampu = $this->db->get('history_surat_tdk_mampu')->result();
      } else {
        $this->db->where('id', $id);
        $surat_tidak_mampu = $this->db->get('history_surat_tdk_mampu')->result();
      }

      $this->response($surat_tidak_mampu, 200);
    }

    function surat_domisili_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_domisili = $this->db->get('history_surat_domisili')->result();
      } else {
        $this->db->where('id', $id);
        $surat_domisili = $this->db->get('history_surat_domisili')->result();
      }

      $this->response($surat_domisili, 200);
    }

    function surat_pengantar_ektp_get(){
      $id = $this->get('id');

      if($id == '') {
        $surat_pengantar_ektp = $this->db->get('history_surat_pengantar_ektp')->result();
      } else {
        $this->db->where('id', $id);
        $surat_pengantar_ektp = $this->db->get('history_surat_pengantar_ektp')->result();
      }

      $this->response($surat_pengantar_ektp, 200);
    }


}
