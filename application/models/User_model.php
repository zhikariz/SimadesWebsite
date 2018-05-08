<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'user.id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->where_not_in('jabatan.jabatan', 'Admin');
        $this->db->join('memiliki_jabatan', 'user.id_user = memiliki_jabatan.id_user');
        $this->db->join('jabatan', 'memiliki_jabatan.id_jabatan = jabatan.id_jabatan');
        return $this->db->get($this->table)->result();
    }

    function get_user($username)
    {
        $this->db->where('username', $username);

        //$this->db->join('jabatan', 'user.id_jabatan = jabatan.id_jabatan');

        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);

        //$this->db->join('jabatan', 'user.id_jabatan = jabatan.id_jabatan');
        $this->db->join('memiliki_jabatan', 'memiliki_jabatan.id_user = user.id_user');
        $this->db->join('jabatan', 'memiliki_jabatan.id_jabatan = jabatan.id_jabatan');

        return $this->db->get($this->table)->row();
    }

    //get data kepdes
    function get_by_where($jabatan)
    {
        $this->db->like('jabatan.jabatan', $jabatan);
        $this->db->join('user', 'user.id_user = memiliki_jabatan.id_user');
        $this->db->join('jabatan', 'jabatan.id_jabatan = memiliki_jabatan.id_jabatan');
        return $this->db->get('memiliki_jabatan')->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_user', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('nama_depan_user', $q);
	$this->db->or_like('nama_belakang_user', $q);
	//$this->db->or_like('id_jabatan', $q);
    $this->db->or_like('nip', $q);
	$this->db->or_like('aktif', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('nama_depan_user', $q);
	$this->db->or_like('nama_belakang_user', $q);
	//$this->db->or_like('id_jabatan', $q);
    $this->db->or_like('nip', $q);
	$this->db->or_like('aktif', $q);
    $this->db->where_not_in('jabatan.jabatan', 'Admin');
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

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-03 12:38:49 */
/* http://harviacode.com */