<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Penduduk_model');
		//$this->load->model('Kk_model');
        
	}
	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(7);
		//$keyword = $nik;
		// cari di database
		$data = $this->db->from('penduduk')->like('nik',$keyword)->get();
		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'		=>$row->nik,
				'no_kk'		=>$row->no_kk,
				'nama_depan'		=>$row->nama_depan,
				'nama_belakang'			=>$row->nama_belakang,
				'tempat_lhr'			=>$row->tempat_lhr,
				'tanggal_lhr'		=>$row->tanggal_lhr,
				'jekel'		=>$row->jekel,
				
			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
}
?>