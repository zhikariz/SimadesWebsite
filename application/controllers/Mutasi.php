<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mutasi extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('Profil_desa_model');
        $this->load->model('Penduduk_model');
        $this->load->model('User_model');
        $this->load->library('m_pdf');
       
        
    }

    public function index()
    {
                  
        $data_pejabat=$this->User_model->get_all();
        $desa = $this->Profil_desa_model->get_by_id(1);
        $data = array(
            'index' => 'index',
            'action' => site_url('mutasi/cetak'),
            'data_pejabat' => $data_pejabat,
            'keterangan' => 'Cetak Laporan Mutasi Desa '.$desa->nm_desa,
            'grafik' => ' Pilih Bulan dan Tahun Terlebih Dahulu',
            'set_bulan' => set_value('bulan'),
            'set_tahun' => set_value('tahun'),
            'set_tahun1' => set_value('tahun1'),

            'id_user' => $this->session->userdata('id_user'),
            'nama_user' => $this->session->userdata('nama_user'),
            'jabatan' => $this->session->userdata('jabatan'),
            'nama_desa' => $this->session->userdata('nama_desa'),
            'titlenav' => 'SIMADES || Laporan Mutasi',
            'title' => 'Laporan Mutasi',
            'anchor' => 'Cetak Laporan Mutasi',
            'isi' => 'mutasi',
        );
        $this->load->view('layout/wrapper', $data);
        

        //$this->template->display('datamaster', $data);
    }

    public function grafik()
    {
        $bulan = 1;
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_pejabat = $this->User_model->get_by_id($this->input->post('id_user'));

            $laki_awal = $this->Penduduk_model->penduduk_awal_bulan('Laki-laki', $bulan, $tahun); 
            $perempuan_awal = $this->Penduduk_model->penduduk_awal_bulan('Perempuan', $bulan, $tahun);
            $jumlah_awal = $laki_awal->jumlah + $perempuan_awal->jumlah;

            $laki_lahir = $this->Penduduk_model->kelahiran_sekarang('Laki-laki', $bulan, $tahun); 
            $perempuan_lahir = $this->Penduduk_model->kelahiran_sekarang('Perempuan', $bulan, $tahun); 
            $jumlah_lahir = $laki_lahir->jumlah + $perempuan_lahir->jumlah;
       
            $laki_datang = $this->Penduduk_model->kedatangan_sekarang('Laki-laki', $bulan, $tahun); 
            $perempuan_datang = $this->Penduduk_model->kedatangan_sekarang('Perempuan', $bulan, $tahun);
            $jumlah_datang = $laki_datang->jumlah + $perempuan_datang->jumlah;
       
            $laki_pergi = $this->Penduduk_model->kepergian_sekarang('Laki-laki', $bulan, $tahun); 
            $perempuan_pergi = $this->Penduduk_model->kepergian_sekarang('Perempuan', $bulan, $tahun); 
            $jumlah_pergi = $laki_pergi->jumlah + $perempuan_pergi->jumlah;
        
            $laki_mati = $this->Penduduk_model->kematian_sekarang('Laki-laki', $bulan, $tahun); 
            $perempuan_mati = $this->Penduduk_model->kematian_sekarang('Perempuan', $bulan, $tahun); 
            $jumlah_mati = $laki_mati->jumlah + $perempuan_mati->jumlah;
        
            $laki_akhir = $this->Penduduk_model->penduduk_akhir_bulan('Laki-laki', $bulan, $tahun); 
            $perempuan_akhir = $this->Penduduk_model->penduduk_akhir_bulan('Perempuan', $bulan, $tahun);
            $jumlah_akhir = $laki_akhir->jumlah + $perempuan_akhir->jumlah;
            
        $data_pejabat=$this->User_model->get_all();
        $desa = $this->Profil_desa_model->get_by_id(1);
        $data = array(
            'index' => 'grafik',
            'action' => site_url('mutasi/cetak'),
            'data_pejabat' => $data_pejabat,
            'keterangan' => 'Cetak Laporan Mutasi Desa '.$desa->nm_desa,
            
            'set_bulan' => set_value('bulan'),
            'set_tahun' => set_value('tahun'),
            'set_tahun1' => set_value('tahun1'),
            
            'bulan' => $this->getBulan($bulan),
            'grafik' => 'Grafik Bulan '.$this->getBulan($bulan),
            'jumlah_awal' => $jumlah_awal,
            'jumlah_lahir' => $jumlah_lahir,
            'jumlah_mati' => $jumlah_mati,
            'jumlah_datang' => $jumlah_datang,
            'jumlah_pergi' => $jumlah_pergi,
            'jumlah_akhir' => $jumlah_akhir,


            'id_user' => $this->session->userdata('id_user'),
            'nama_user' => $this->session->userdata('nama_user'),
            'jabatan' => $this->session->userdata('jabatan'),
            'nama_desa' => $this->session->userdata('nama_desa'),
            'titlenav' => 'SIMADES || Laporan Mutasi',
            'title' => 'Laporan Mutasi',
            'anchor' => 'Cetak Laporan Mutasi',
            'isi' => 'mutasi',
        );
        $this->load->view('layout/wrapper', $data);
        
    }

    public function cetak()
    {

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun1');
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_pejabat = $this->User_model->get_by_id($this->input->post('id_user'));

        $laki_awal = $this->Penduduk_model->penduduk_awal_bulan('Laki-laki', $bulan, $tahun); 
        $perempuan_awal = $this->Penduduk_model->penduduk_awal_bulan('Perempuan', $bulan, $tahun);
        $jumlah_awal = $laki_awal->jumlah + $perempuan_awal->jumlah;

        $laki_lahir = $this->Penduduk_model->kelahiran_sekarang('Laki-laki', $bulan, $tahun);
        $perempuan_lahir = $this->Penduduk_model->kelahiran_sekarang('Perempuan', $bulan, $tahun);
        $jumlah_lahir = $laki_lahir->jumlah + $perempuan_lahir->jumlah;

        $laki_datang = $this->Penduduk_model->kedatangan_sekarang('Laki-laki', $bulan, $tahun);
        $perempuan_datang = $this->Penduduk_model->kedatangan_sekarang('Perempuan', $bulan, $tahun);
        $jumlah_datang = $laki_datang->jumlah + $perempuan_datang->jumlah;

        $laki_pergi = $this->Penduduk_model->kepergian_sekarang('Laki-laki', $bulan, $tahun);
        $perempuan_pergi = $this->Penduduk_model->kepergian_sekarang('Perempuan', $bulan, $tahun);
        $jumlah_pergi = $laki_pergi->jumlah + $perempuan_pergi->jumlah;

        $laki_mati = $this->Penduduk_model->kematian_sekarang('Laki-laki', $bulan, $tahun);
        $perempuan_mati = $this->Penduduk_model->kematian_sekarang('Perempuan', $bulan, $tahun);
        $jumlah_mati = $laki_mati->jumlah + $perempuan_mati->jumlah;
        
        $laki_akhir = $this->Penduduk_model->penduduk_akhir_bulan('Laki-laki', $bulan, $tahun);
        $perempuan_akhir = $this->Penduduk_model->penduduk_akhir_bulan('Perempuan', $bulan, $tahun);
        $jumlah_akhir = $laki_akhir->jumlah + $perempuan_akhir->jumlah;
    /*
        $laki_akhir = $laki_awal->jumlah + $laki_lahir->jumlah + $laki_datang->jumlah - $laki_mati->jumlah - $laki_pergi->jumlah;
        $perempuan_akhir = $perempuan_awal->jumlah + $perempuan_lahir->jumlah + $perempuan_datang->jumlah - $perempuan_mati->jumlah - $perempuan_pergi->jumlah;
        $jumlah_akhir = $laki_akhir + $perempuan_akhir;
    */
        $data = array(
            'judul' => 'LAPORAN MUTASI PENDUDUK',
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'tgl_surat' => $this->tgl_indo(date('Y-m-d')),
            'laki_awal' => (string)$laki_awal->jumlah,
            'perempuan_awal' => (string)$perempuan_awal->jumlah,
            'laki_lahir' => (string)$laki_lahir->jumlah,
            'perempuan_lahir' => (string)$perempuan_lahir->jumlah,
            'laki_datang' => (string)$laki_datang->jumlah,
            'perempuan_datang' => (string)$perempuan_datang->jumlah,
            'laki_pergi' => (string)$laki_pergi->jumlah,
            'perempuan_pergi' => (string)$perempuan_pergi->jumlah,
            'laki_mati' => (string)$laki_mati->jumlah,
            'perempuan_mati' => (string)$perempuan_mati->jumlah,
            'laki_akhir' => (string)$laki_akhir->jumlah,
            'perempuan_akhir' => (string)$perempuan_akhir->jumlah,
            'jumlah_awal' => (string)$jumlah_awal,
            'jumlah_lahir' => (string)$jumlah_lahir,
            'jumlah_datang' => (string)$jumlah_datang,
            'jumlah_pergi' => (string)$jumlah_pergi,
            'jumlah_mati' => (string)$jumlah_mati,
            'jumlah_akhir' => (string)$jumlah_akhir,
            'nama_pejabat' => $data_pejabat->nama_depan_user.' '.$data_pejabat->nama_belakang_user,
            'nip_pejabat' => $data_pejabat->nip,
            'jabatan' => $data_pejabat->jabatan,

            'bulan' => strtoupper($this->getBulan($bulan)),
            'tahun' => $tahun,
            );
        
        
        $this->load->view('laporan_mutasi_pdf',$data);
        $sumber = $this->load->view('laporan_mutasi_pdf',$data, TRUE);
        $html = $sumber;
 
 
        $pdfFilePath = "Laporan Mutasi(".$bulan."-".$tahun.").pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);
 
        $pdf = $this->m_pdf->load();
 
        $pdf->AddPage('L');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);
        
        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        exit();
    }

    function tgl_indo($tgl){
        $tanggal = substr($tgl,8,2);
        $bulan   = $this->getBulan(substr($tgl,5,2));
        $tahun   = substr($tgl,0,4);
        return $tanggal.' '.$bulan.' '.$tahun;
    }

    function getBulan($bln){
        switch ($bln){
        case 1:
        return "Januari";
        break;
        case 2:
        return "Februari";
        break;
        case 3:
        return "Maret";
        break;
        case 4:
        return "April";
        break;
        case 5:
        return "Mei";
        break;
        case 6:
        return "Juni";
        break;
        case 7:
        return "Juli";
        break;
        case 8:
        return "Agustus";
        break;
        case 9:
        return "September";
        break;
        case 10:
        return "Oktober";
        break;
        case 11:
        return "November";
        break;
        case 12:
        return "Desember";
        break;
        }
    }

    
    

}

/* End of file Agama.php */
/* Location: ./application/controllers/Agama.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-07 16:44:36 */
/* http://harviacode.com */