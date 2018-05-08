<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class History_surat_kehilangan_model extends CI_Model
{

    public $table = 'history_surat_kehilangan';
    public $join_table = 'surat_ket_kehilangan';
    public $join = 'history_surat_kehilangan.kd_surat = surat_ket_kehilangan.kd_surat';
    public $id = 'history_surat_kehilangan.kd_surat';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function grafik($tahun)
    {
        $data = $this->db->query("select count(*) as jumlah, date_format(waktu, '%m') as bulan from ".$this->table." where YEAR(waktu) = ".$tahun." group by bulan");
        return $data->result();
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
    
    // get data by kode
    function get_by_kode($kd)
    {
        $this->db->where('kd_surat', $kd);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $c=NULL, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        if($c){
            $this->db->like($c, $q);
        }

        $this->db->join($this->join_table, $this->join);
        $this->db->join('penduduk', 'surat_ket_kehilangan.nik = penduduk.nik');
        
        
    
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
        $this->db->join($this->join_table, $this->join);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Surat_model.php */
/* Location: ./application/models/Surat_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:36 */
/* http://harviacode.com */