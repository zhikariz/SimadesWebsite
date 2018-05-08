<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{

    public $table = 'penduduk';
    public $id = 'nik';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        //$this->db->order_by($this->id, $this->order);
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->result();
    }

    function get_all_pergi()
    {
        //$this->db->order_by($this->id, $this->order);
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        $this->db->where_not_in('status','MP');
        return $this->db->get($this->table)->result();
    }

    function get_all_kepala()
    {
        //$this->db->order_by($this->id, $this->order);
        $this->db->where('hubkel.hubkel','Kepala Keluarga');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->result();
    }

    function get_all_anggota($nokk)
    {
        $this->db->order_by('id_datang', $this->order);
        $this->db->where('penduduk.no_kk',$nokk);
        $this->db->where('penduduk.status','MD');
        $this->db->join('kedatangan', 'penduduk.nik = kedatangan.nik_pendatang');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->result();
    }

    //get all by nokk
    function get_all_kk($nokk)
    {
        $this->db->order_by('penduduk.id_hubkel', $this->order);
        $this->db->order_by('anak_ke', $this->order);
        $this->db->where('penduduk.no_kk',$nokk);
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        //$this->db->where_not_in('status','MP');
        return $this->db->get($this->table)->result();
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->row();
    }

    function get_data($table, $where, $id)
    {
        $this->db->where($where, $id);
        $this->db->from($table);
        return $this->db->get($this->table)->row();
    }

    function get_ayah($nik, $no_kk)
    {
        $this->db->where('penduduk.no_kk', $no_kk);
        $this->db->where_not_in('penduduk.nik', $nik);
        $this->db->where('hubkel', 'Kepala Keluarga');
        $this->db->where('jekel', 'Laki-laki');
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->row();
    }

    function get_ibu($nik, $no_kk)
    {
        $this->db->where('penduduk.no_kk', $no_kk);
        $this->db->where_not_in('penduduk.nik', $nik);
        $this->db->where('hubkel', 'Istri');
        $this->db->where('jekel', 'Perempuan');
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->row();
    }

    function get_m_ayah($no_kk)
    {
        $this->db->where('penduduk.no_kk', $no_kk);
        $this->db->where('hubkel', 'Kepala Keluarga')->or_where('hubkel', 'Suami');
        $this->db->where('jekel', 'Laki-laki');
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->row();
    }

    function get_m_ibu($no_kk)
    {
        $this->db->where('penduduk.no_kk', $no_kk);
        $this->db->where('hubkel', 'Istri');
        $this->db->where('jekel', 'Perempuan');
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $c=NULL ,$q = NULL) {
        $this->db->order_by('penduduk.no_kk', $this->order);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
	
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_blm_menikah($limit, $start = 0, $c=NULL ,$q = NULL) {
        $this->db->order_by('penduduk.no_kk', $this->order);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->where('stkawin', 'Belum Kawin');
        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_lahir($limit, $start = 0, $c=NULL ,$q = NULL) {
        $this->db->order_by('penduduk.no_kk', $this->order);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->where('hubkel', 'Anak');
        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_mati($limit, $start = 0, $c=NULL ,$q = NULL) {
        $this->db->order_by('penduduk.no_kk', $this->order);
        $this->db->where('status', 'MM');
        
        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_anak($no_kk, $limit, $start = 0, $c=NULL ,$q = NULL) {
        //$this->db->order_by('penduduk.no_kk', $this->order);
        $this->db->where('penduduk.no_kk', $no_kk);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->where('hubkel', 'Anak');

        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function get_limit_data_pengantin($jekel, $limit, $start = 0, $c=NULL ,$q = NULL) {
        //$this->db->order_by('penduduk.no_kk', $this->order);
        
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->where('jekel', $jekel);

        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

     function get_limit_data_ortu($limit, $start = 0, $c=NULL ,$q = NULL) {
        $this->db->order_by('penduduk.no_kk', $this->order);
        
        $this->db->where_not_in('status', 'MP');
        $this->db->where('hubkel', 'Kepala Keluarga');

        if($c){
            $this->db->like($c, $q);
        }
        $this->db->join('agama', 'penduduk.id_agama = agama.id_agama');
        $this->db->join('goldar', 'penduduk.id_goldar = goldar.id_goldar');
        $this->db->join('hubkel', 'penduduk.id_hubkel = hubkel.id_hubkel');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('status_kawin', 'penduduk.id_stskawin = status_kawin.id_stkawin');
        $this->db->join('kk', 'penduduk.no_kk = kk.no_kk');
        //$this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    
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

    function stat_pekerjaan()
    {
        
            $data = $this->db->query('select kerja.kerja as label, count(kerja.kerja) as jumlah from penduduk join kk on penduduk.no_kk = kk.no_kk join kerja on kerja.id_kerja = penduduk.id_kerja group by kerja.kerja');
        
        return $data->result();
    }

    function stat_pekerjaan2($dusun, $tahun)
    {
        $this->db->select('kerja.kerja as label');
        $this->db->select('count(kerja.kerja) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kerja', 'penduduk.id_kerja = kerja.id_kerja');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    //$this->db->from($this->table);
        $this->db->group_by('kerja.kerja');
        return $this->db->get($this->table)->result();
    }

    function stat_pendidikan()
    {
        $data = $this->db->query('select pendidikan.pendidikan as label, count(pendidikan.pendidikan) as jumlah from penduduk join pendidikan on pendidikan.id_pendidikan = penduduk.id_pendidikan group by pendidikan.pendidikan');
        return $data->result();
    }

    function stat_pendidikan2($dusun, $tahun)
    {
        $this->db->select('pendidikan.pendidikan as label');
        $this->db->select('count(pendidikan.pendidikan) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('pendidikan', 'penduduk.id_pendidikan = pendidikan.id_pendidikan');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    //$this->db->from($this->table);
        $this->db->group_by('pendidikan.pendidikan');
        return $this->db->get($this->table)->result();
    }

    function stat_dusun()
    {
        $this->db->select('dusun.dusun as label');
        $this->db->select('count(dusun.dusun) as jumlah');
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    //$this->db->from($this->table);
        $this->db->group_by('dusun.dusun');
        return $this->db->get($this->table)->result();
    }

   
    function stat_umur_balita()
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('umur >=', 0);
        $this->db->where('umur <=', 5);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
                    
        return $this->db->get($this->table)->row();
    }

    function stat_umur_balita2($dusun, $tahun)
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('umur >=', 0);
        $this->db->where('umur <=', 5);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
            
        return $this->db->get($this->table)->row();
    }

    function stat_umur_anak()
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('umur >=', 6);
        $this->db->where('umur <=', 11);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
                    
        return $this->db->get($this->table)->row();
    }

    function stat_umur_anak2($dusun, $tahun)
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('umur >=', 6);
        $this->db->where('umur <=', 11);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
            
        return $this->db->get($this->table)->row();
    }

    function stat_umur_remaja()
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('umur >=', 12);
        $this->db->where('umur <=', 16);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
                    
        return $this->db->get($this->table)->row();
    }

    function stat_umur_remaja2($dusun, $tahun)
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('umur >=', 12);
        $this->db->where('umur <=', 16);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
            
        return $this->db->get($this->table)->row();
    }

    function stat_umur_dewasa()
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('umur >=', 17);
        $this->db->where('umur <=', 45);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
                    
        return $this->db->get($this->table)->row();
    }

    function stat_umur_dewasa2($dusun, $tahun)
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('umur >=', 17);
        $this->db->where('umur <=', 45);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
            
        return $this->db->get($this->table)->row();
    }

    function stat_umur_lansia()
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('umur >=', 46);
        $this->db->where('umur <=', 65);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
                    
        return $this->db->get($this->table)->row();
    }

    function stat_umur_lansia2($dusun, $tahun)
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('umur >=', 46);
        $this->db->where('umur <=', 65);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
            
        return $this->db->get($this->table)->row();
    }

    function stat_umur_manula()
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('umur >=', 66);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
                    
        return $this->db->get($this->table)->row();
    }

    function stat_umur_manula2($dusun, $tahun)
    {
        
        $this->db->select('count(umur) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('umur >=', 66);
        
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
            
        return $this->db->get($this->table)->row();
    }

    function stat_hubkel()
    {
        $data = $this->db->query('select hubkel.hubkel as label, count(hubkel.hubkel) as jumlah from penduduk join hubkel on hubkel.id_hubkel = penduduk.id_hubkel group by hubkel.hubkel');
        return $data->result();
    }

    function stat_hubkel2($dusun, $tahun)
    {
        $this->db->select('hubkel.hubkel as label');
        $this->db->select('count(hubkel.hubkel) as jumlah');
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('hubkel', 'hubkel.id_hubkel = penduduk.id_hubkel');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    //$this->db->from($this->table);
        $this->db->group_by('hubkel.hubkel');
        return $this->db->get($this->table)->result();
    }

    function jumlah_jekel($jekel)
    {
        $this->db->like('jekel', $jekel);
   
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function jumlah_jekel2($jekel, $dusun, $tahun)
    {
        //$this->db->select('jekel as label');
        $this->db->select('count(jekel) as jumlah');
        $this->db->like('jekel', $jekel);
        $this->db->where('dusun.id_dusun', $dusun);
        $this->db->where('Year(tgl_mutasi) >=', 2000);
        $this->db->where('Year(tgl_mutasi) <=', $tahun);
        $this->db->where_not_in('status', 'MM');
        $this->db->where_not_in('status', 'MP');
        $this->db->join('kk', 'kk.no_kk = penduduk.no_kk');
        $this->db->join('dusun', 'kk.id_dusun = dusun.id_dusun');
    //$this->db->from($this->table);
        //$this->db->group_by('jekel');
        return $this->db->get($this->table)->row();
    }



    function penduduk_input_baru($jekel, $bulan, $tahun)
    {
        $data = $this->db->query("select count(jekel) as jumlah from penduduk where MONTH(tgl_mutasi) = ".$bulan." and Year(tgl_mutasi) = ".$tahun." and jekel = '".$jekel."' and status='IB'");
        //return $data->result();
        return $data->row();
    }

    function penduduk_awal_bulan($jekel, $bulan, $tahun)
    {
        $data = $this->db->query("select count(jekel) as jumlah from penduduk where MONTH(tgl_mutasi) >= 1 and MONTH(tgl_mutasi) < ".$bulan." and Year(tgl_mutasi) = ".$tahun." and jekel = '".$jekel."' and not ( status='MM' or status='MP')");
        //return $data->result();
        return $data->row();
    }

    function kelahiran_sekarang($jekel, $bulan, $tahun)
    {
        $data = $this->db->query("select count(jekel) as jumlah from layanan join penduduk on penduduk.nik = layanan.nik where jekel = '".$jekel."' and nama_layanan = 'Mutasi Kelahiran' and Year(waktu_layanan) = ".$tahun." and MONTH(waktu_layanan) = ".$bulan." ");
        //return $data->result();
        return $data->row();
    }
    
    function kematian_sekarang($jekel, $bulan, $tahun)
    {
        $data = $this->db->query("select count(jekel) as jumlah from layanan join penduduk on penduduk.nik = layanan.nik where jekel = '".$jekel."' and nama_layanan = 'Mutasi Kematian' and Year(waktu_layanan) = ".$tahun." and MONTH(waktu_layanan) = ".$bulan." ");
        //return $data->result();
        return $data->row();
    }

    function kedatangan_sekarang($jekel, $bulan, $tahun)
    {
        $data = $this->db->query("select count(jekel) as jumlah from layanan join penduduk on penduduk.nik = layanan.nik where jekel = '".$jekel."' and nama_layanan = 'Mutasi Datang' and Year(waktu_layanan) = ".$tahun." and MONTH(waktu_layanan) = ".$bulan." ");
        //return $data->result();
        return $data->row();
    }

    function kepergian_sekarang($jekel, $bulan, $tahun)
    {
        $data = $this->db->query("select count(jekel) as jumlah from layanan join penduduk on penduduk.nik = layanan.nik where jekel = '".$jekel."' and nama_layanan = 'Mutasi Pergi' and Year(waktu_layanan) = ".$tahun." and MONTH(waktu_layanan) = ".$bulan." ");
        //return $data->result();
        return $data->row();
    }

    function penduduk_akhir_bulan($jekel, $bulan, $tahun)
    {
        $data = $this->db->query("select count(jekel) as jumlah from penduduk where MONTH(tgl_mutasi) >= 01 and MONTH(tgl_mutasi) <= ".$bulan." and Year(tgl_mutasi) = ".$tahun." and jekel = '".$jekel."' and not ( status='MM' or status='MP')");
        
        //return $data->result();
        return $data->row();
    }


}

/* End of file Penduduk_model.php */
/* Location: ./application/models/Penduduk_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-03 12:39:42 */
/* http://harviacode.com */