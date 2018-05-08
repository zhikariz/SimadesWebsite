<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_desa_model extends CI_Model
{

    public $table = 'profil_desa';
    public $id = 'id_desa';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kode_desa', $q);
	$this->db->or_like('nm_desa', $q);
	$this->db->or_like('kecamatan', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('nm_kepdes', $q);
	$this->db->or_like('nip_kepdes', $q);
	$this->db->or_like('alamat_desa', $q);
	$this->db->or_like('kode_pos', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kode_desa', $q);
	$this->db->or_like('nm_desa', $q);
	$this->db->or_like('kecamatan', $q);
	$this->db->or_like('kabupaten', $q);
	$this->db->or_like('nm_kepdes', $q);
	$this->db->or_like('nip_kepdes', $q);
	$this->db->or_like('alamat_desa', $q);
	$this->db->or_like('kode_pos', $q);
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

    function truncate()
    {
        $this->db->truncate($this->table);
    }
}

/* End of file Profil_desa_model.php */
/* Location: ./application/models/Profil_desa_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-15 13:15:56 */
/* http://harviacode.com */
