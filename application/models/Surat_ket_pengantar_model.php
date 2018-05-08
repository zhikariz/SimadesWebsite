<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_ket_pengantar_model extends CI_Model
{

    public $table = 'surat_ket_pengantar';
    public $join = 'user.id_user = surat_ket_pengantar.id_user_ttd';
    public $id = 'kd_surat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_kode(){
        $this->db->select('right(surat_ket_pengantar.kd_surat,4) as kode',false);
            $this->db->order_by('kd_surat','desc');
        $this->db->limit(1);
        $query=$this->db->get('surat_ket_pengantar');

            //cek dulu apakah ada sudah kode di tabel.
            if($query->num_rows()<>0){
                //jika kode ternyata sudah ada
                $data=$query->row();
                $kode=intval($data->kode)+1;
            }
            else {
                //jika kode belum ada
                $kode=1;
            }
            $kodemax=str_pad($kode,4,"0",STR_PAD_LEFT);

            
            return $kodejadi="".$kodemax;
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('user', $this->join);
        $this->db->join('jabatan', 'user.id_jabatan = jabatan.id_jabatan');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('user', $this->join);
        $this->db->join('memiliki_jabatan', 'memiliki_jabatan.id_user = user.id_user');
        $this->db->join('jabatan', 'memiliki_jabatan.id_jabatan = jabatan.id_jabatan');
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kd_surat', $q);
	$this->db->or_like('nik_wali', $q);
	$this->db->or_like('nik_pemohon', $q);
	$this->db->or_like('sekolah', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('jurusan', $q);
	$this->db->or_like('id_user_ttd', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kd_surat', $q);
	$this->db->or_like('nik_wali', $q);
	$this->db->or_like('nik_pemohon', $q);
	$this->db->or_like('sekolah', $q);
	$this->db->or_like('kelas', $q);
	$this->db->or_like('jurusan', $q);
	$this->db->or_like('id_user_ttd', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Surat_ket_tdk_mampu_model.php */
/* Location: ./application/models/Surat_ket_tdk_mampu_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-06 05:52:13 */
/* http://harviacode.com */