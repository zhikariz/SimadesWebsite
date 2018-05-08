<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengikut_model extends CI_Model
{

    public $table = 'pengikut';
    public $id = 'kd_surat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        //$this->db->order_by($this->id, $this->order);
        //$this->db->join('surat_ket_bepergian','pengikut.kd_surat = surat_ket_bepergian.kd_surat');
        $this->db->join('penduduk','pengikut.nik_pengikut = penduduk.nik');
        $this->db->join('pendidikan','penduduk.id_pendidikan = pendidikan.id_pendidikan');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_pengikut($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('penduduk','pengikut.nik_pengikut = penduduk.nik');
        $this->db->join('pendidikan','penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin','penduduk.id_stskawin = status_kawin.id_stkawin');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($kode) {
        $this->db->where($this->id, $kode);        
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $c=NULL, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('penduduk','layanan.nik = penduduk.nik');
        $this->db->join('user','layanan.id_user = user.id_user');
    
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

/* End of file Layanan_model.php */
/* Location: ./application/models/Layanan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:29 */
/* http://harviacode.com */