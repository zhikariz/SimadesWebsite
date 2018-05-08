<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Simple_login {
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}
	// Fungsi login
	public function login($username, $password) {
		$query = $this->CI->db->get_where('user',array('username'=>$username,'password' => $password));
		if($query->num_rows() == 1) {
			$row 		= $this->CI->db->query('SELECT user.id_user, nama_depan_user, nama_belakang_user, jabatan FROM user JOIN memiliki_jabatan ON user.id_user = memiliki_jabatan.id_user JOIN jabatan ON memiliki_jabatan.id_jabatan = jabatan.id_jabatan where username = "'.$username.'" and aktif = "Aktif"');
			$row2  		= $this->CI->db->query('SELECT nm_desa, image FROM profil_desa where id_desa = 1');

			$user 		= $row->row();
			$desa 		= $row2->row();
			$id_user 	= $user->id_user;
			$data_jabatan = $this->CI->db->query('SELECT * FROM memiliki_jabatan JOIN jabatan ON jabatan.id_jabatan = memiliki_jabatan.id_jabatan where id_user = '.$id_user);
			$list_jabatan = $data_jabatan->result();
			$nama_user 	= $user->nama_depan_user.' '.$user->nama_belakang_user;
			$jabatan 	= $user->jabatan;
			$nama_desa	= $desa->nm_desa;
			$image	= $desa->image;

			$this->CI->session->set_userdata('id_user', $id_user);
			$this->CI->session->set_userdata('nama_user', $nama_user);
			$this->CI->session->set_userdata('jabatan', $jabatan);
			$this->CI->session->set_userdata('list_jabatan', $list_jabatan);
			$this->CI->session->set_userdata('nama_desa', $nama_desa);
			$this->CI->session->set_userdata('logo_desa', $image);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			
			redirect(base_url('dashboard'));
		}else{
			$this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
			redirect(base_url('auth'));
		}
		return false;
	}
	// Proteksi halaman
	public function cek_login() {
		if($this->CI->session->userdata('id_user') == '') {
			$this->CI->session->set_flashdata('sukses','Anda belum login atau Akun anda tidak aktif');
			redirect(base_url('auth'));
		}
		
	}
	// Fungsi logout
	public function logout() {
		
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('nama_user');
		$this->CI->session->unset_userdata('jabatan');
		$this->CI->session->unset_userdata('nama_desa');
		//$this->CI->session->unset_userdata('logo_desa');
		$this->CI->session->unset_userdata('id_login', uniqid(rand()));
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('auth'));
	}
}