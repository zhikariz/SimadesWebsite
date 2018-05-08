<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_ket_lahir_model');
        $this->load->model('Surat_ket_meninggal_model');
        $this->load->model('Surat_ket_tdk_mampu_model');
        $this->load->model('Surat_ket_bepergian_model');
        $this->load->model('Surat_ket_blm_menikah_model');
        $this->load->model('Surat_ket_usaha_model');
        $this->load->model('Surat_ket_pengantar_model');
        $this->load->model('Surat_ket_wali_model');
        $this->load->model('Surat_ket_kehilangan_model');
        $this->load->model('Surat_ket_keramaian_model');
        $this->load->model('Surat_ket_domisili_model');
        $this->load->model('Surat_ket_pengantar_ektp_model');

        $this->load->model('History_surat_kelahiran_model');
        $this->load->model('History_surat_meninggal_model');
        $this->load->model('History_surat_tdk_mampu_model');
        $this->load->model('History_surat_bepergian_model');
        $this->load->model('History_surat_blm_menikah_model');
        $this->load->model('History_surat_usaha_model');
        $this->load->model('History_surat_pengantar_model');
        $this->load->model('History_surat_wali_model');
        $this->load->model('History_surat_kehilangan_model');
        $this->load->model('History_surat_keramaian_model');
        $this->load->model('History_surat_domisili_model');
         $this->load->model('History_surat_pengantar_ektp_model');

        $this->load->model('Pengikut_model');
        $this->load->model('Kepergian_model');
        $this->load->model('Jenis_surat_model');
        $this->load->model('Agama_model');
        $this->load->model('Penduduk_model');
        $this->load->model('User_model');
        $this->load->model('Profil_desa_model');
        $this->load->library('m_pdf');

        $this->load->library('form_validation', 'session');
    }

    public function index()
    {

        $jenis_surat = $this->Jenis_surat_model->get_all();
        $g_kelahiran = $this->History_surat_kelahiran_model->grafik(date('Y'));
        $g_usaha = $this->History_surat_usaha_model->grafik(date('Y'));
        $g_meninggal = $this->History_surat_meninggal_model->grafik(date('Y'));
        $g_skck = $this->History_surat_pengantar_model->grafik(date('Y'));
        $g_wali = $this->History_surat_wali_model->grafik(date('Y'));
        $g_nikah = $this->History_surat_blm_menikah_model->grafik(date('Y'));
        $g_ramai = $this->History_surat_keramaian_model->grafik(date('Y'));
        $g_bepergian = $this->History_surat_bepergian_model->grafik(date('Y'));
        $g_hilang = $this->History_surat_kehilangan_model->grafik(date('Y'));
        $g_mampu = $this->History_surat_tdk_mampu_model->grafik(date('Y'));
        $g_ektp = $this->History_surat_pengantar_ektp_model->grafik(date('Y'));

        //deklarasi default
        for ($i=1; $i<=12 ; $i++) {
            $lahir[$i] = 0;
            $usaha[$i] = 0;
            $meninggal[$i] = 0;
            $skck[$i] = 0;
            $wali[$i] = 0;
            $nikah[$i] = 0;
            $ramai[$i] = 0;
            $pergi[$i] = 0;
            $hilang[$i] = 0;
            $mampu[$i] = 0;
            $ektp[$i] =0;

        }
        foreach ($g_kelahiran as $hasil) {
            $lahir[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_usaha as $hasil) {
            $usaha[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_meninggal as $hasil) {
            $meninggal[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_skck as $hasil) {
            $skck[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_wali as $hasil) {
            $wali[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_nikah as $hasil) {
            $nikah[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_ramai as $hasil) {
            $ramai[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_bepergian as $hasil) {
            $pergi[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_hilang as $hasil) {
            $hilang[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach ($g_mampu as $hasil) {
            $mampu[intval($hasil->bulan)] = $hasil->jumlah;
        }
        foreach($g_ektp as $hasil){
          $ektp[intval($hasil->bulan)] = $hasil->jumlah;
        }


        $data = array(


            'jenis_surat' => $jenis_surat,
           'lahir' => $lahir,
           'usaha' => $usaha,
           'meninggal' => $meninggal,
           'skck' => $skck,
           'wali' => $wali,
           'nikah' => $nikah,
           'ramai' => $ramai,
           'pergi' => $pergi,
           'hilang' => $hilang,
           'mampu' => $mampu,
           'ektp' => $ektp,

            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat',
            'isi'           => 'surat/surat_list',
        );
            $this->load->view('layout/wrapper', $data);
    }


    public function format_no_surat()
    {
        $data_jenis = $this->Jenis_surat_model->get_all();

        $data = array(
        'jenis_surat_data' => $data_jenis,
        'titlenav'      => 'SIMADES || Pengajuan Surat',
        'title'         => 'Pengajuan Surat',
        'anchor'        => 'Format Nomor Surat',
        'isi'           => 'jenis_surat/jenis_surat_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function update_no_surat($id)
    {
        $row = $this->Jenis_surat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Ubah',
                'action' => site_url('surat/update_no_surat_action'),
        'id_jenis' => set_value('id_jenis', $row->id_jenis),
        'jenis_surat' => $row->jenis_surat,
        'format_no_surat' => set_value('format_no_surat', $row->format_no_surat),
        'id_user' => $this->session->userdata('id_user'),
        'nama_user' => $this->session->userdata('nama_user'),
        'jabatan' => $this->session->userdata('jabatan'),
        'nama_desa' => $this->session->userdata('nama_desa'),
        'logo_desa' => $this->session->userdata('logo_desa'),
        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Ubah Format Nomor Surat',
        'isi' => 'jenis_surat/format_no_surat_form',
            );
                $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat/format_no_surat'));
        }
    }

    public function update_no_surat_action()
    {
        //$this->_rules();

        /*if ($this->form_validation->run() == FALSE) {
            $this->update_no_surat($this->input->post('id_jenis', TRUE));
        } else {
        */
            $data = array(
        'format_no_surat' => $this->input->post('format_no_surat',TRUE),
        );

            $this->Jenis_surat_model->update($this->input->post('id_jenis', TRUE), $data);
            $this->session->set_flashdata('message', 'Ubah Format Nomor Surat Telah Berhasil');
            redirect(site_url('surat/format_no_surat'));
        //}
    }

    public function create($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        if($jenis_surat->jenis_surat=='Surat Keterangan Kelahiran'){
            redirect(site_url('surat/ket_kelahiran_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Penduduk Meninggal'){
            redirect(site_url('surat/ket_meninggal_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Tidak Mampu'){
            redirect(site_url('surat/ket_tdk_mampu_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Bepergian'){
            redirect(site_url('surat/ket_bepergian_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Belum Pernah Menikah'){
            redirect(site_url('surat/ket_blm_menikah_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Usaha'){
            redirect(site_url('surat/ket_usaha_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Pengantar SKCK'){
            redirect(site_url('surat/ket_pengantar_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Wali'){
            redirect(site_url('surat/ket_wali_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Kehilangan'){
            redirect(site_url('surat/ket_kehilangan_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Izin Keramaian'){
            redirect(site_url('surat/ket_keramaian_list/'.$id));
        }
        else if($jenis_surat->jenis_surat=='Surat Keterangan Domisili'){
            redirect(site_url('surat/ket_domisili_list/'.$id));
        }else if($jenis_surat->jenis_surat == 'Surat Pengantar E-KTP'){
          redirect(site_url('surat/ket_pengantar_ektp_list/'.$id));
        }
        /*$data = array(
            'button' => 'Tambah',
            'action' => site_url('surat/create_action'),
	    'id_surat' => set_value('id_surat'),
	    'nik' => set_value('nik'),
	    'tgl_surat' => set_value('tgl_surat'),
	    'jenis_surat' => set_value('jenis_surat', $jenis_surat->jenis_surat),
	    'no_surat' => set_value('no_surat'),
	    'tgl_berlaku' => set_value('tgl_berlaku'),


        'titlenav'      => 'SIMADES || Pengajuan Surat',
        'title'         => 'Pengajuan Surat',
        'anchor'        => 'Tambah Pengajuan '.$jenis_surat->jenis_surat,
        'isi'           => 'surat/surat-surat/',
        );
            $this->load->view('layout/wrapper', $data);
        */
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'jenis_surat' => $this->input->post('jenis_surat',TRUE),
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tgl_berlaku' => $this->input->post('tgl_berlaku',TRUE),
	    );

            $this->Surat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat'));
        }
    }

    public function update($id)
    {
        $row = $this->Surat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('surat/update_action'),
		'id_surat' => set_value('id_surat', $row->id_surat),
		'nik' => set_value('nik', $row->nik),
		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
		'jenis_surat' => set_value('jenis_surat', $row->jenis_surat),
		'no_surat' => set_value('no_surat', $row->no_surat),
		'tgl_berlaku' => set_value('tgl_berlaku', $row->tgl_berlaku),
        'titlenav'      => 'SIMADES || Pengajuan Surat',
        'title'         => 'Pengajuan Surat',
        'anchor'        => 'Edit Pengajuan Surat',
        'isi'           => 'surat/surat_form',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_surat', TRUE));
        } else {
            $data = array(
		'nik' => $this->input->post('nik',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'jenis_surat' => $this->input->post('jenis_surat',TRUE),
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tgl_berlaku' => $this->input->post('tgl_berlaku',TRUE),
	    );

            $this->Surat_model->update($this->input->post('id_surat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat'));
        }
    }

    public function delete($id)
    {
        $row = $this->Surat_model->get_by_id($id);

        if ($row) {
            $this->Surat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat'));
        }
    }

//Surat Keterangan Kelahiran

    public function ket_kelahiran_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_kelahiran_model->total_rows($q);
        $surat = $this->History_surat_kelahiran_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_kelahiran_1/'.$id,
            'cetak' => 'surat/cetak_ket_kelahiran/',
            'setujui' => 'surat/setujui_surat_kelahiran/',
            'batal' => 'surat/batal_setujui_surat_kelahiran/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Kelahiran',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_kelahiran_1($id)
    {
        $list_agama = $this->Agama_model->get_all();
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $data = array(
            'button' => 'Selanjutnya',
            'batal' => site_url('surat/ket_kelahiran_list/'.$id),
            'action' => site_url('surat/ket_kelahiran_2/'.$id),
        //'id_lahir' => set_value('id_lahir'),
        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        //'berat_bayi' => set_value('berat_bayi'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        //'waktu' => set_value('waktu'),
        //'panjang_bayi' => set_value('panjang_bayi'),



        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Kelahiran',
        'isi' => 'surat/surat_ket_kelahiran/ket_kelahiran-1',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function ket_kelahiran_2($id)
    {

            $nik = $this->input->post('nik');
            $no_kk = $this->input->post('no_kk');
            $data_ayah = $this->Penduduk_model->get_ayah($nik, $no_kk);
            $data_ibu = $this->Penduduk_model->get_ibu($nik, $no_kk);
            $data_pejabat = $this->User_model->get_all();

            $data = array(
                'button' => 'Simpan',
                'batal' => site_url('surat/ket_kelahiran_list/'.$id),
                'action' => site_url('surat/ket_kelahiran_action/'.$id),

            'no_surat' => set_value('no_surat', $this->input->post('no_surat')),
            'nik' => set_value('nik', $this->input->post('nik')),


            'nik_ayah' => set_value('nik_ayah', $data_ayah->nik),
            'no_kk_ayah' => set_value('no_kk_ayah', $data_ayah->no_kk),
            'nama_depan_ayah' => set_value('nama_depan_ayah', $data_ayah->nama_depan),
            'nama_belakang_ayah' => set_value('nama_belakang_ayah', $data_ayah->nama_belakang),

            'tempat_lhr_ayah' => set_value('tempat_lhr_ayah', $data_ayah->tempat_lhr),
            'tanggal_lhr_ayah' => set_value('tanggal_lhr_ayah', $data_ayah->tanggal_lhr),

            'kerja_ayah' => set_value('kerja_ayah', $data_ayah->kerja),
            'alamat_ayah' => set_value('alamat_ayah', $data_ayah->alamat.", RT ".$data_ayah->rt."/RW ".$data_ayah->rw.", Kel. ".$data_ayah->kelurahan.", Kec. ".$data_ayah->kecamatan.", Kab. ".$data_ayah->kabupaten),

            'nik_ibu' => set_value('nik_ibu', $data_ibu->nik),
            'no_kk_ibu' => set_value('no_kk_ibu', $data_ibu->no_kk),
            'nama_depan_ibu' => set_value('nama_depan_ibu', $data_ibu->nama_depan),
            'nama_belakang_ibu' => set_value('nama_belakang_ibu', $data_ibu->nama_belakang),

            'tempat_lhr_ibu' => set_value('tempat_lhr_ibu', $data_ibu->tempat_lhr),
            'tanggal_lhr_ibu' => set_value('tanggal_lhr_ibu', $data_ibu->tanggal_lhr),

            'kerja_ibu' => set_value('kerja_ibu', $data_ibu->kerja),
            'alamat_ibu' => set_value('alamat_ibu', $data_ibu->alamat.", RT ".$data_ibu->rt."/RW ".$data_ibu->rw.", Kel. ".$data_ibu->kelurahan.", Kec. ".$data_ibu->kecamatan.", Kab. ".$data_ibu->kabupaten),


            'nama_saksi1' => set_value('nama_saksi1'),

            'nama_saksi2' => set_value('nama_saksi2'),

            'data_pejabat' => $data_pejabat,
            'id_user' => set_value('id_user'),


            'titlenav' => 'SIMADES || Pengajuan Surat',
            'title' => 'Pengajuan Surat',
            'anchor' => 'Tambah Pengajuan Surat Keterangan Kelahiran',
            'isi' => 'surat/surat_ket_kelahiran/ket_kelahiran-2',
                );
            $this->load->view('layout/wrapper', $data);


    }

    function ket_kelahiran_action($id) {

            $no = $this->Surat_ket_lahir_model->get_kode();
            $kode = 'SKN'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'nik_ayah' => $this->input->post('nik_ayah', TRUE),
                'nik_ibu' => $this->input->post('nik_ibu', TRUE),
                'nama_saksi1' => $this->input->post('nama_saksi1', TRUE),
                'nama_saksi2' => $this->input->post('nama_saksi2', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Lahir',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_lahir_model->insert($data_surat);
            $this->History_surat_kelahiran_model->insert($data_history);

            // redirect(site_url('surat/cetak_ket_kelahiran/'.$kode));
            redirect(site_url('surat/ket_kelahiran_list/1'));

    }

    function cetak_ket_kelahiran($kode) {

        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_kelahiran_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_lahir_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_kelahiran_model->get_by_kode($kode);
        $data_anak = $this->Penduduk_model->get_by_id($data_surat->nik);
        $data_ayah = $this->Penduduk_model->get_by_id($data_surat->nik_ayah);
        $data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);

        $data = array(
            'judul' => 'SURAT KETERANGAN KELAHIRAN',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama_anak' => $data_anak->nama_depan.' '.$data_anak->nama_belakang,
            'ttl_anak' => $data_anak->tempat_lhr.', '.$this->tgl_indo($data_anak->tanggal_lhr),
            'jekel_anak' => $data_anak->jekel,
            'kerja_anak' => $data_anak->kerja,
            'agama_anak' => $data_anak->agama,
            'no_ktp_anak' => $data_anak->nik,
            'no_kk_anak' => $data_anak->no_kk,
            'alamat_anak' => $data_anak->alamat.", RT ".$data_anak->rt."/RW ".$data_anak->rw.", Kel. ".$data_anak->kelurahan.", Kec. ".$data_anak->kecamatan.", Kab. ".$data_anak->kabupaten,

            'nama_ayah' => $data_ayah->nama_depan.' '.$data_ayah->nama_belakang,
            'ttl_ayah' => $data_ayah->tempat_lhr.', '.$this->tgl_indo($data_ayah->tanggal_lhr),
            'kerja_ayah' => $data_ayah->kerja,
            'no_ktp_ayah' => $data_ayah->nik,
            'no_kk_ayah' => $data_ayah->no_kk,
            'alamat_ayah' => $data_ayah->alamat.", RT ".$data_ayah->rt."/RW ".$data_ayah->rw.", Kel. ".$data_ayah->kelurahan.", Kec. ".$data_ayah->kecamatan.", Kab. ".$data_ayah->kabupaten,

            'nama_ibu' => $data_ibu->nama_depan.' '.$data_ibu->nama_belakang,
            'ttl_ibu' => $data_ibu->tempat_lhr.', '.$this->tgl_indo($data_ibu->tanggal_lhr),
            'kerja_ibu' => $data_ibu->kerja,
            'no_ktp_ibu' => $data_ibu->nik,
            'no_kk_ibu' => $data_ibu->no_kk,
            'alamat_ibu' => $data_ibu->alamat.", RT ".$data_ibu->rt."/RW ".$data_ibu->rw.", Kel. ".$data_ibu->kelurahan.", Kec. ".$data_ibu->kecamatan.", Kab. ".$data_ibu->kabupaten,

            'nama_saksi1' => $data_surat->nama_saksi1,
            'nama_saksi2' => $data_surat->nama_saksi2,


            );


        $this->load->view('surat/surat_ket_kelahiran/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_kelahiran/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_kelahiran(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        //exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_kelahiran($id)
    {
      $row = $this->History_surat_kelahiran_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_kelahiran_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Kelahiran Success');
    redirect(site_url('surat/ket_kelahiran_list/1'));
  }

  public function batal_setujui_surat_kelahiran($id)
  {
    $row = $this->History_surat_kelahiran_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_kelahiran_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Kelahiran Success');
  redirect(site_url('surat/ket_kelahiran_list/1'));
}

//Surat Keterangan Meninggal

    public function ket_meninggal_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_meninggal_model->total_rows($q);
        $surat = $this->History_surat_meninggal_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_meninggal_1/'.$id,
            'cetak' => 'surat/cetak_ket_meninggal/',
            'setujui' => 'surat/setujui_surat_meninggal/',
            'batal' => 'surat/batal_setujui_surat_meninggal/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Meninggal',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_meninggal_1($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data = array(
            'button' => 'Selanjutnya',
            'batal' => site_url('surat/ket_meninggal_list/'.$id),
            'action' => site_url('surat/ket_meninggal_2/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),

        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),




        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Meninggal',
        'isi' => 'surat/surat_ket_meninggal/ket_meninggal-1',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function ket_meninggal_2($id)
    {
            $nik = $this->input->post('nik');
            $no_kk = $this->input->post('no_kk');


            $data_pejabat = $this->User_model->get_all();

            $data = array(
                'button' => 'Simpan',
                'batal' => site_url('surat/ket_meninggal_list/'.$id),
                'action' => site_url('surat/ket_meninggal_action/'.$id),

            'no_surat' => set_value('no_surat', $this->input->post('no_surat')),
            'nik' => set_value('nik', $this->input->post('nik')),

            'nik_meninggal' => set_value('nik_meninggal'),
            'no_kk_mati' => set_value('no_kk_mati'),
            'nama_depan_mati' => set_value('nama_depan_mati'),
            'nama_belakang_mati' => set_value('nama_belakang_mati'),
            'tanggal_lhr_mati' => set_value('tanggal_lhr_mati'),
            'tempat_lhr_mati' => set_value('tempat_lhr_mati'),
            'jekel_mati' => set_value('jekel_mati'),
            //'list_agama'    => $list_agama,
            'agama_mati' => set_value('agama_mati'),
            'kerja_mati' => set_value('kerja_mati'),

            'alamat_mati' => set_value('alamat_mati'),
            'anak_ke_mati' => set_value('anak_ke_mati'),

            'nama_saksi2' => set_value('nama_saksi2'),
            'umur_saksi2' => set_value('umur_saksi2'),
            'alamat_saksi2' => set_value('alamat_saksi2'),

            'hari_meninggal' => set_value('hari_meninggal'),
            'tgl_meninggal' => set_value('tgl_meninggal'),
            'sebab_meninggal' => set_value('sebab_meninggal'),

            'data_pejabat' => $data_pejabat,
            'id_user' => set_value('id_user'),


            'titlenav' => 'SIMADES || Pengajuan Surat',
            'title' => 'Pengajuan Surat',
            'anchor' => 'Tambah Pengajuan Surat Keterangan Meninggal',
            'isi' => 'surat/surat_ket_meninggal/ket_meninggal-2',
                );
            $this->load->view('layout/wrapper', $data);


    }

    function ket_meninggal_action($id) {

            $no = $this->Surat_ket_meninggal_model->get_kode();
            $data_saksi1 = $this->Penduduk_model->get_by_id($this->input->post('nik'));
            $kode = 'SML'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'nik_meninggal' => $this->input->post('nik_meninggal', TRUE),
                'nama_saksi1' => $data_saksi1->nama_depan.' '.$data_saksi1->nama_belakang,
                'umur_saksi1' => $this->hitung_umur($data_saksi1->tanggal_lhr),
                'alamat_saksi1' => $data_saksi1->alamat,
                'nama_saksi2' => $this->input->post('nama_saksi2', TRUE),
                'umur_saksi2' => $this->input->post('umur_saksi2', TRUE),
                'alamat_saksi2' => $this->input->post('alamat_saksi2', TRUE),
                'hari_meninggal' => $this->input->post('hari_meninggal', TRUE),
                'tgl_meninggal' => $this->input->post('tgl_meninggal', TRUE),
                'sebab_meninggal' => $this->input->post('sebab_meninggal', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),


                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Meninggal',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_meninggal_model->insert($data_surat);
            $this->History_surat_meninggal_model->insert($data_history);

            redirect(site_url('surat/ket_meninggal_list/3'));

    }

    function cetak_ket_meninggal($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_meninggal_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_meninggal_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_meninggal_model->get_by_kode($kode);
        $data_meninggal = $this->Penduduk_model->get_by_id($data_surat->nik_meninggal);
        //$data_ayah = $this->Penduduk_model->get_by_id($data_surat->nik_ayah);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);

        $umur = $this->hitung_umur($data_meninggal->tanggal_lhr);
        $data = array(
            'judul' => 'SURAT KETERANGAN MENINGGAL',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama_meninggal' => $data_meninggal->nama_depan.' '.$data_meninggal->nama_belakang,
            'ttl_meninggal' => $data_meninggal->tempat_lhr.', '.$this->tgl_indo($data_meninggal->tanggal_lhr),
            'jekel_meninggal' => $data_meninggal->jekel,
            'umur' => $umur,
            'agama_meninggal' => $data_meninggal->agama,
            'no_ktp_meninggal' => $data_meninggal->nik,
            'no_kk_meninggal' => $data_meninggal->no_kk,
            'alamat_meninggal' => $data_meninggal->alamat.", RT ".$data_meninggal->rt."/RW ".$data_meninggal->rw.", Kel. ".$data_meninggal->kelurahan.", Kec. ".$data_meninggal->kecamatan.", Kab. ".$data_meninggal->kabupaten,

            'nama_saksi1' => $data_surat->nama_saksi1,
            'umur_saksi1' => $data_surat->umur_saksi1,
            'alamat_saksi1' => $data_surat->alamat_saksi1,

            'nama_saksi2' => $data_surat->nama_saksi2,
            'umur_saksi2' => $data_surat->umur_saksi2,
            'alamat_saksi2' => $data_surat->alamat_saksi2,

            'hari_meninggal' => $data_surat->hari_meninggal,
            'tgl_meninggal' => $this->tgl_indo($data_surat->tgl_meninggal),
            'sebab_meninggal' => $data_surat->sebab_meninggal,

            );


        $this->load->view('surat/surat_ket_meninggal/viewpdf_meninggal',$data);
        $sumber = $this->load->view('surat/surat_ket_meninggal/viewpdf_meninggal',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_meninggal(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        //exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_meninggal($id)
    {
      $row = $this->History_surat_meninggal_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_meninggal_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Kematian Success');
    redirect(site_url('surat/ket_meninggal_list/3'));
  }

  public function batal_setujui_surat_meninggal($id)
  {
    $row = $this->History_surat_meninggal_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_meninggal_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Kematian Success');
  redirect(site_url('surat/ket_meninggal_list/3'));
}


//Surat Keterangan Tidak Mampu

    public function ket_tdk_mampu_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_tdk_mampu_model->total_rows($q);
        $surat = $this->History_surat_tdk_mampu_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_tdk_mampu_1/'.$id,
            'cetak' => 'surat/cetak_ket_tdk_mampu/',
            'setujui' => 'surat/setujui_surat_tdk_mampu/',
            'batal' => 'surat/batal_setujui_surat_tdk_mampu/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Tidak Mampu',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_tdk_mampu_1($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data = array(
            'button' => 'Selanjutnya',
            'batal' => site_url('surat/ket_tdk_mampu_list/'.$id),
            'action' => site_url('surat/ket_tdk_mampu_2/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik_wali'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),

        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),




        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Tidak Mampu',
        'isi' => 'surat/surat_ket_tdk_mampu/ket_tdk_mampu-1',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function ket_tdk_mampu_2($id)
    {

            $nik = $this->input->post('nik');
            $no_kk = $this->input->post('no_kk');


            $data_pejabat = $this->User_model->get_all();

            $data = array(
                'button' => 'Simpan',
                'batal' => site_url('surat/ket_tdk_mampu_list/'.$id),
                'action' => site_url('surat/ket_tdk_mampu_action/'.$id),

            'no_surat' => set_value('no_surat', $this->input->post('no_surat')),
            'nik' => set_value('nik', $nik),
            'no_kk_wali' => set_value('no_kk', $this->input->post('no_kk')),

            'nik_pemohon' => set_value('nik_pemohon'),
            'no_kk' => set_value('no_kk_anak'),
            'nama_depan' => set_value('nama_depan_anak'),
            'nama_belakang' => set_value('nama_belakang_anak'),
            'tanggal_lhr' => set_value('tanggal_lhr_anak'),
            'tempat_lhr' => set_value('tempat_lhr_anak'),
            'jekel' => set_value('jekel_anak'),
            //'list_agama'    => $list_agama,
            'agama' => set_value('agama_anak'),
            'kerja' => set_value('kerja_anak'),

            'alamat' => set_value('alamat_anak'),
            'anak_ke' => set_value('anak_ke_anak'),

            'sekolah' => set_value('sekolah'),
            'kelas' => set_value('kelas'),
            'jurusan' => set_value('jurusan'),

            'data_pejabat' => $data_pejabat,
            'id_user' => set_value('id_user'),


            'titlenav' => 'SIMADES || Pengajuan Surat',
            'title' => 'Pengajuan Surat',
            'anchor' => 'Tambah Pengajuan Surat Keterangan Tidak Mampu',
            'isi' => 'surat/surat_ket_tdk_mampu/ket_tdk_mampu-2',
                );
            $this->load->view('layout/wrapper', $data);


    }

    function ket_tdk_mampu_action($id) {

            $no = $this->Surat_ket_tdk_mampu_model->get_kode();
            $kode = 'STM'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik_wali' => $this->input->post('nik', TRUE),
                'nik' => $this->input->post('nik_pemohon', TRUE),
                'sekolah' => $this->input->post('sekolah', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'jurusan' => $this->input->post('jurusan', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Tidak Mampu',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_tdk_mampu_model->insert($data_surat);
            $this->History_surat_tdk_mampu_model->insert($data_history);

            redirect(site_url('surat/ket_tdk_mampu_list/10'));

    }

    function cetak_ket_tdk_mampu($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_tdk_mampu_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_tdk_mampu_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_tdk_mampu_model->get_by_kode($kode);
        $data_wali = $this->Penduduk_model->get_by_id($data_surat->nik_wali);
        $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
        //$data_ayah = $this->Penduduk_model->get_by_id($data_surat->nik_ayah);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT KETERANGAN TIDAK MAMPU',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama_wali' => $data_wali->nama_depan.' '.$data_wali->nama_belakang,
            'nik_wali' => $data_wali->nik,
            'ttl_wali' => $data_wali->tempat_lhr.', '.$this->tgl_indo($data_wali->tanggal_lhr),
            'jekel_wali' => $data_wali->jekel,
            'status_wali' => $data_wali->stkawin,
            'agama_wali' => $data_wali->agama,
            'pekerjaan_wali' => $data_wali->kerja,
            'alamat_wali' => $data_wali->alamat.", RT ".$data_wali->rt."/RW ".$data_wali->rw.", Kel. ".$data_wali->kelurahan.", Kec. ".$data_wali->kecamatan.", Kab. ".$data_wali->kabupaten,

            'nama_pemohon' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
            'ttl_pemohon' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
            'jekel_pemohon' => $data_pemohon->jekel,
            'sekolah' => $data_surat->sekolah,
            'kelas' => $data_surat->kelas,
            'jurusan' => $data_surat->jurusan,


            );


        $this->load->view('surat/surat_ket_tdk_mampu/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_tdk_mampu/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_tidak_mampu(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_tdk_mampu($id)
    {
      $row = $this->History_surat_tdk_mampu_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
        );

              $this->History_surat_tdk_mampu_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Tidak Mampu Success');
    redirect(site_url('surat/ket_tdk_mampu_list/10'));
  }

  public function batal_setujui_surat_tdk_mampu($id)
  {
    $row = $this->History_surat_tdk_mampu_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_tdk_mampu_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Tidak Mampu Success');
  redirect(site_url('surat/ket_tdk_mampu_list/10'));
}

    //SURAT KETERANGAN BEPERGIAN

    public function ket_bepergian_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_bepergian_model->total_rows($q);
        $surat = $this->History_surat_bepergian_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_bepergian/'.$id,
            'cetak' => 'surat/cetak_ket_bepergian/',
            'setujui' => 'surat/setujui_surat_bepergian/',
            'batal' => 'surat/batal_setujui_surat_bepergian/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Bepergian',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_bepergian($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_bepergian_list/'.$id),
            'action' => site_url('surat/ket_bepergian_action/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),

        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        'alamat_tuju' => set_value('alamat_tuju'),
        'alasan' => set_value('alasan'),

        'data_pejabat' => $data_pejabat,
        'id_user' => set_value('id_user'),


        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Bepergian',
        'isi' => 'surat/surat_ket_bepergian/ket_bepergian',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_bepergian_action($id) {

            $no = $this->Surat_ket_bepergian_model->get_kode();
            $kode = 'SBN'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'tempat_tujuan' => $this->input->post('alamat_tuju', TRUE),
                'keperluan' => $this->input->post('alasan', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Bepergian',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_bepergian_model->insert($data_surat);
            $this->History_surat_bepergian_model->insert($data_history);
            if($this->input->post('submit')=='Tambah Pengikut'){
                $this->session->set_flashdata('kd_surat', $kode);
                redirect(site_url('surat/tambah_pengikut/'.$id));

            }
            else{
               redirect(site_url('surat/ket_bepergian_list/8'));

            }

    }

    public function tambah_pengikut($id)
    {

        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_bepergian/'.$id),
            'action' => site_url('surat/ket_pengikut_action/'.$id),

        'kd_surat' => set_value('kd_surat', $this->session->userdata('kd_surat')),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        'keterangan' => set_value('keterangan'),

        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengikut Surat Keterangan Bepergian',
        'isi' => 'surat/surat_ket_bepergian/ket_pengikut',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_pengikut_action($id) {

        $kode = $this->input->post('kd_surat', TRUE);
        $data_pengikut = array(
            'kd_surat' => $kode,
            'nik_pengikut' => $this->input->post('nik', TRUE),
            'keterangan' => $this->input->post('keterangan', TRUE),

            );

        $this->Pengikut_model->insert($data_pengikut);
        if($this->input->post('submit')=='Tambah Pengikut'){
            $this->session->set_flashdata('kd_surat', $kode);
            redirect(site_url('surat/tambah_pengikut/'.$id));

        }
        else{
            redirect(site_url('surat/ket_bepergian_list/8'));

        }
    }

    function cetak_ket_bepergian($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_bepergian_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_bepergian_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_bepergian_model->get_by_kode($kode);
        $data_pergi = $this->Penduduk_model->get_by_id($data_surat->nik);
        $data_pengikut = $this->Pengikut_model->get_pengikut($kode);
        $jml_pengikut = $this->Pengikut_model->total_rows($kode);
        //$data_ayah = $this->Penduduk_model->get_by_id($data_surat->nik_ayah);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT KETERANGAN BEPERGIAN',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama' => $data_pergi->nama_depan.' '.$data_pergi->nama_belakang,
            'nik' => $data_pergi->nik,
            'ttl' => $data_pergi->tempat_lhr.', '.$this->tgl_indo($data_pergi->tanggal_lhr),
            'jekel' => $data_pergi->jekel,
            'status' => $data_pergi->stkawin,
            'agama' => $data_pergi->agama,
            'pekerjaan' => $data_pergi->kerja,
            'pendidikan' => $data_pergi->pendidikan,
            'alamat_asal' => $data_pergi->alamat.", RT ".$data_pergi->rt."/RW ".$data_pergi->rw.", Kel. ".$data_pergi->kelurahan.", Kec. ".$data_pergi->kecamatan.", Kab. ".$data_pergi->kabupaten,
            'tempat_tujuan' => $data_surat->tempat_tujuan,
            'keperluan' => $data_surat->keperluan,
            'jml_pengikut' => $jml_pengikut,
            'data_pengikut' => $data_pengikut,


            );


        $this->load->view('surat/surat_ket_bepergian/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_bepergian/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_bepergian(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        //$pdf->Output($pdfFilePath, 'D');
        $pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_bepergian($id)
    {
      $row = $this->History_surat_bepergian_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_bepergian_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Bepergian Success');
    redirect(site_url('surat/ket_bepergian_list/8'));
  }

  public function batal_setujui_surat_bepergian($id)
  {
    $row = $this->History_surat_bepergian_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_bepergian_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Bepergian Success');
  redirect(site_url('surat/ket_bepergian_list/8'));
}

    //SURAT KETERANGAN BELUM MENIKAH

    public function ket_blm_menikah_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_blm_menikah_model->total_rows($q);
        $surat = $this->History_surat_blm_menikah_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_blm_menikah/'.$id,
            'cetak' => 'surat/cetak_ket_blm_menikah/',
            'setujui' => 'surat/setujui_surat_blm_menikah/',
            'batal' => 'surat/batal_setujui_surat_blm_menikah/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Belum Pernah Menikah',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_blm_menikah($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_blm_menikah_list/'.$id),
            'action' => site_url('surat/ket_blm_menikah_action/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),

        'data_pejabat' => $data_pejabat,
        'id_user' => set_value('id_user'),


        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Belum Pernah Menikah',
        'isi' => 'surat/surat_ket_blm_menikah/ket_blm_menikah',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_blm_menikah_action($id) {

            $data_desa = $this->Profil_desa_model->get_by_id(1);
            $no = $this->Surat_ket_blm_menikah_model->get_kode();
            $kode = 'SBM'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'keterangan' => 'Orang tersebut di atas adalah benar-benar Penduduk '.$data_desa->nm_desa.', Kecamatan '.$data_desa->kecamatan.', sampai saat ini orang tersebut menurut penelitian kami belum pernah Kawin / Nikah.',
                'id_user_ttd' => $this->input->post('id_user', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Belum Pernah Menikah',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_blm_menikah_model->insert($data_surat);
            $this->History_surat_blm_menikah_model->insert($data_history);

            redirect(site_url('surat/ket_blm_menikah_list/6'));

    }

    function cetak_ket_blm_menikah($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_blm_menikah_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_blm_menikah_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_blm_menikah_model->get_by_kode($kode);
        $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT KETERANGAN BELUM MENIKAH',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
            'ttl' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
            'jekel' => $data_pemohon->jekel,
            'status' => $data_pemohon->stkawin,
            'agama' => $data_pemohon->agama,
            'kerja' => $data_pemohon->kerja,
            'pendidikan' => $data_pemohon->pendidikan,
            'alamat' => $data_pemohon->alamat.", RT ".$data_pemohon->rt."/RW ".$data_pemohon->rw.", Kel. ".$data_pemohon->kelurahan.", Kec. ".$data_pemohon->kecamatan.", Kab. ".$data_pemohon->kabupaten,
            'no_ktp' => $data_pemohon->nik,
            'no_kk' => $data_pemohon->no_kk,
            'keterangan' => $data_surat->keterangan,


            );


        $this->load->view('surat/surat_ket_blm_menikah/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_blm_menikah/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_blm_menikah(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_blm_menikah($id)
    {
      $row = $this->History_surat_blm_menikah_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_blm_menikah_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Blm Menikah Success');
    redirect(site_url('surat/ket_blm_menikah_list/6'));
  }

  public function batal_setujui_surat_blm_menikah($id)
  {
    $row = $this->History_surat_blm_menikah_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_blm_menikah_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Blm Menikah Success');
  redirect(site_url('surat/ket_blm_menikah_list/6'));
}

    //SURAT KETERANGAN USAHA

    public function ket_usaha_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_usaha_model->total_rows($q);
        $surat = $this->History_surat_usaha_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_usaha/'.$id,
            'cetak' => 'surat/cetak_ket_usaha/',
            'setujui' => 'surat/setujui_surat_usaha/',
            'batal' => 'surat/batal_setujui_surat_usaha/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Usaha',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_usaha($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_usaha_list/'.$id),
            'action' => site_url('surat/ket_usaha_action/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        'nama_usaha' => set_value('nama_usaha'),
        'tgl_mulai' => set_value('tgl_mulai', $this->tgl_indo(date('Y-m-d'))),
        'tgl_akhir' => set_value('tgl_akhir'),

        'data_pejabat' => $data_pejabat,
        'id_user' => set_value('id_user'),


        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Usaha',
        'isi' => 'surat/surat_ket_usaha/ket_usaha',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_usaha_action($id) {

            $data_desa = $this->Profil_desa_model->get_by_id(1);
            $no = $this->Surat_ket_usaha_model->get_kode();
            $kode = 'SKU'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'nama_usaha' => $this->input->post('nama_usaha', TRUE),
                'keterangan' => 'Orang tersebut di atas adalah benar-benar Penduduk '.$data_desa->nm_desa.', Kecamatan '.$data_desa->kecamatan.', Kabupaten '.$data_desa->kabupaten.' yang memiliki usaha '.$this->input->post('nama_usaha', TRUE),
                'keperluan' => 'Untuk mendapatkan ijin usaha Diperindag Kabupaten '.$data_desa->kabupaten,
                'id_user_ttd' => $this->input->post('id_user', TRUE),
                'tgl_mulai' => date('Y-m-d'),
                'tgl_akhir' => $this->input->post('tgl_akhir', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Usaha',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_usaha_model->insert($data_surat);
            $this->History_surat_usaha_model->insert($data_history);

            redirect(site_url('surat/ket_usaha_list/2'));

    }

    function cetak_ket_usaha($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_usaha_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_usaha_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_usaha_model->get_by_kode($kode);
        $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT KETERANGAN USAHA',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
            'ttl' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
            'jekel' => $data_pemohon->jekel,
            'status' => $data_pemohon->stkawin,
            'agama' => $data_pemohon->agama,
            'kerja' => $data_pemohon->kerja,
            'alamat' => $data_pemohon->alamat.", RT ".$data_pemohon->rt."/RW ".$data_pemohon->rw.", Kel. ".$data_pemohon->kelurahan.", Kec. ".$data_pemohon->kecamatan.", Kab. ".$data_pemohon->kabupaten,
            'nik' => $data_pemohon->nik,
            'keterangan' => $data_surat->keterangan,
            'keperluan' => $data_surat->keperluan,
            'berlaku_mulai' => $this->tgl_indo($data_surat->tgl_mulai).'<br> sampai dengan '.$this->tgl_indo($data_surat->tgl_akhir),


            );


        $this->load->view('surat/surat_ket_usaha/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_usaha/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_usaha(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_usaha($id)
    {
      $row = $this->History_surat_usaha_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_usaha_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Usaha Success');
    redirect(site_url('surat/ket_usaha_list/2'));
  }

  public function batal_setujui_surat_usaha($id)
  {
    $row = $this->History_surat_usaha_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_usaha_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Usaha Success');
  redirect(site_url('surat/ket_usaha_list/2'));
}

    //SURAT KETERANGAN PENGANTAR

    public function ket_pengantar_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_pengantar_model->total_rows($q);
        $surat = $this->History_surat_pengantar_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_pengantar/'.$id,
            'cetak' => 'surat/cetak_ket_pengantar/',
            'setujui' => 'surat/setujui_surat_pengantar/',
            'batal' => 'surat/batal_setujui_surat_pengantar/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Pengantar SKCK',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_pengantar($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_pengantar_list/'.$id),
            'action' => site_url('surat/ket_pengantar_action/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        'keperluan' => set_value('keperluan'),
        'tgl_mulai' => set_value('tgl_mulai', $this->tgl_indo(date('Y-m-d'))),
        'tgl_akhir' => set_value('tgl_akhir'),

        'data_pejabat' => $data_pejabat,
        'id_user' => set_value('id_user'),


        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Pengantar SKCK',
        'isi' => 'surat/surat_ket_pengantar/ket_pengantar',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_pengantar_action($id) {

            $data_desa = $this->Profil_desa_model->get_by_id(1);
            $no = $this->Surat_ket_pengantar_model->get_kode();
            $kode = 'SPS'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'keterangan' => 'Orang tersebut beradat istiadat baik',
                'keperluan' => $this->input->post('keperluan', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),
                'tgl_mulai' => date('Y-m-d'),
                'tgl_akhir' => $this->input->post('tgl_akhir', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Pengantar SKCK',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_pengantar_model->insert($data_surat);
            $this->History_surat_pengantar_model->insert($data_history);

            redirect(site_url('surat/ket_pengantar_list/4'));

    }

    function cetak_ket_pengantar($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_pengantar_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_pengantar_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_pengantar_model->get_by_kode($kode);
        $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT PENGANTAR PERMOHONAN SKCK',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
            'ttl' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
            'jekel' => $data_pemohon->jekel,
            'status' => $data_pemohon->stkawin,
            'agama' => $data_pemohon->agama,
            'kerja' => $data_pemohon->kerja,
            'alamat' => $data_pemohon->alamat.", RT ".$data_pemohon->rt."/RW ".$data_pemohon->rw.", Kel. ".$data_pemohon->kelurahan.", Kec. ".$data_pemohon->kecamatan.", Kab. ".$data_pemohon->kabupaten,
            'bukti' => 'KTP No. '.$data_pemohon->nik.' KK No. '.$data_pemohon->no_kk,
            'keterangan' => $data_surat->keterangan,
            'keperluan' => $data_surat->keperluan,
            'berlaku_mulai' => $this->tgl_indo($data_surat->tgl_mulai).' s.d '.$this->tgl_indo($data_surat->tgl_akhir),


            );


        $this->load->view('surat/surat_ket_pengantar/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_pengantar/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_pengantarSKCK(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_pengantar($id)
    {
      $row = $this->History_surat_pengantar_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_pengantar_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Pengantar Success');
    redirect(site_url('surat/ket_pengantar_list/4'));
  }

  public function batal_setujui_surat_pengantar($id)
  {
    $row = $this->History_surat_pengantar_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_pengantar_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Pengantar Success');
  redirect(site_url('surat/ket_pengantar_list/4'));
}

    //SURAT KETERANGAN WALI

    public function ket_wali_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_wali_model->total_rows($q);
        $surat = $this->History_surat_wali_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_wali_1/'.$id,
            'cetak' => 'surat/cetak_ket_wali/',
            'setujui' => 'surat/setujui_surat_wali/',
            'batal' => 'surat/batal_setujui_surat_wali/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Wali',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_wali_1($id)
    {
        $list_agama = $this->Agama_model->get_all();
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $data = array(
            'button' => 'Selanjutnya',
            'batal' => site_url('surat/ket_wali_list/'.$id),
            'action' => site_url('surat/ket_wali_2/'.$id),
        //'id_lahir' => set_value('id_lahir'),
        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        //'berat_bayi' => set_value('berat_bayi'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        //'waktu' => set_value('waktu'),
        //'panjang_bayi' => set_value('panjang_bayi'),



        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Wali',
        'isi' => 'surat/surat_ket_wali/ket_wali-1',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function ket_wali_2($id)
    {

            $nik = $this->input->post('nik');
            $no_kk = $this->input->post('no_kk');
            $data_pejabat = $this->User_model->get_all();

            $data = array(
                'button' => 'Simpan',
                'batal' => site_url('surat/ket_wali_list/'.$id),
                'action' => site_url('surat/ket_wali_action/'.$id),

            'no_surat' => set_value('no_surat', $this->input->post('no_surat')),
            'nik' => set_value('nik', $this->input->post('nik')),


            'nik_perempuan' => set_value('nik_perempuan'),
            'no_kk_perempuan' => set_value('no_kk_perempuan'),
            'nama_depan_perempuan' => set_value('nama_depan_perempuan'),
            'nama_belakang_perempuan' => set_value('nama_belakang_perempuan'),

            'tempat_lhr_perempuan' => set_value('tempat_lhr_perempuan'),
            'tanggal_lhr_perempuan' => set_value('tanggal_lhr_perempuan'),
            'agama_perempuan' => set_value('agama_perempuan'),
            'kerja_perempuan' => set_value('kerja_perempuan'),
            'alamat_perempuan' => set_value('alamat_perempuan'),
            'anak_ke_perempuan' => set_value('anak_ke_perempuan'),


            'nik_laki' => set_value('nik_laki'),
            'no_kk_laki' => set_value('no_kk_laki'),
            'nama_depan_laki' => set_value('nama_depan_laki'),
            'nama_belakang_laki' => set_value('nama_belakang_laki'),

            'tempat_lhr_laki' => set_value('tempat_lhr_laki'),
            'tanggal_lhr_laki' => set_value('tanggal_lhr_laki'),
            'agama_laki' => set_value('agama_laki'),
            'kerja_laki' => set_value('kerja_laki'),
            'alamat_laki' => set_value('alamat_laki'),
            'anak_ke_laki' => set_value('anak_ke_laki'),

            'alasan' => set_value('alasan'),

            'data_pejabat' => $data_pejabat,
            'id_user' => set_value('id_user'),

            'titlenav' => 'SIMADES || Pengajuan Surat',
            'title' => 'Pengajuan Surat',
            'anchor' => 'Tambah Pengajuan Surat Keterangan Wali',
            'isi' => 'surat/surat_ket_wali/ket_wali-2',
                );
            $this->load->view('layout/wrapper', $data);


    }

    function ket_wali_action($id) {

            $no = $this->Surat_ket_wali_model->get_kode();
            $kode = 'SKW'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'nik_perempuan' => $this->input->post('nik_perempuan', TRUE),
                'nik_laki' => $this->input->post('nik_laki', TRUE),
                'alasan' => $this->input->post('alasan', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Wali',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_wali_model->insert($data_surat);
            $this->History_surat_wali_model->insert($data_history);

            redirect(site_url('surat/ket_wali_list/5'));

    }

    function cetak_ket_wali($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_wali_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_wali_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_wali_model->get_by_kode($kode);
        $data_wali = $this->Penduduk_model->get_by_id($data_surat->nik);
        $data_perempuan = $this->Penduduk_model->get_by_id($data_surat->nik_perempuan);
        $data_laki = $this->Penduduk_model->get_by_id($data_surat->nik_laki);

        $data = array(
            'judul' => 'SURAT KETERANGAN WALI',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama_wali' => $data_wali->nama_depan.' '.$data_wali->nama_belakang,
            'ttl_wali' => $data_wali->tempat_lhr.', '.$this->tgl_indo($data_wali->tanggal_lhr),
            'jekel_wali' => $data_wali->jekel,
            'kerja_wali' => $data_wali->kerja,
            'agama_wali' => $data_wali->agama,
            'no_ktp_wali' => $data_wali->nik,
            'no_kk_wali' => $data_wali->no_kk,
            'alamat_wali' => $data_wali->alamat.", RT ".$data_wali->rt."/RW ".$data_wali->rw.", Kel. ".$data_wali->kelurahan.", Kec. ".$data_wali->kecamatan.", Kab. ".$data_wali->kabupaten,

            'nama_perempuan' => $data_perempuan->nama_depan.' '.$data_perempuan->nama_belakang,
            'ttl_perempuan' => $data_perempuan->tempat_lhr.', '.$this->tgl_indo($data_perempuan->tanggal_lhr),
            'kerja_perempuan' => $data_perempuan->kerja,
            'agama_perempuan' => $data_perempuan->agama,
            'no_ktp_perempuan' => $data_perempuan->nik,
            'no_kk_perempuan' => $data_perempuan->no_kk,
            'alamat_perempuan' => $data_perempuan->alamat.", RT ".$data_perempuan->rt."/RW ".$data_perempuan->rw.", Kel. ".$data_perempuan->kelurahan.", Kec. ".$data_perempuan->kecamatan.", Kab. ".$data_perempuan->kabupaten,


            'nama_laki' => $data_laki->nama_depan.' '.$data_laki->nama_belakang,
            'ttl_laki' => $data_laki->tempat_lhr.', '.$this->tgl_indo($data_laki->tanggal_lhr),
            'kerja_laki' => $data_laki->kerja,
            'agama_laki' => $data_laki->agama,
            'no_ktp_laki' => $data_laki->nik,
            'no_kk_laki' => $data_laki->no_kk,
            'alamat_laki' => $data_laki->alamat.", RT ".$data_laki->rt."/RW ".$data_laki->rw.", Kel. ".$data_laki->kelurahan.", Kec. ".$data_laki->kecamatan.", Kab. ".$data_laki->kabupaten,

            'alasan' => $data_surat->alasan,


            );


        $this->load->view('surat/surat_ket_wali/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_wali/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_wali(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load('utf-8', 'F4');
        //$mpdf = new mPDF('utf-8', 'F4');
        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        //$pdf->Output($pdfFilePath, 'D');
        $pdf->Output();
        //$this->continueNextFunction();
        //exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_wali($id)
    {
      $row = $this->History_surat_wali_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_wali_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Wali Success');
    redirect(site_url('surat/ket_wali_list/5'));
  }

  public function batal_setujui_surat_wali($id)
  {
    $row = $this->History_surat_wali_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_wali_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Wali Success');
  redirect(site_url('surat/ket_wali_list/5'));
}

    //SURAT KETERANGAN KEHILANGAN

    public function ket_kehilangan_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_kehilangan_model->total_rows($q);
        $surat = $this->History_surat_kehilangan_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_kehilangan/'.$id,
            'cetak' => 'surat/cetak_ket_kehilangan/',
            'setujui' => 'surat/setujui_surat_kehilangan/',
            'batal' => 'surat/batal_setujui_surat_kehilangan/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Kehilangan',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_kehilangan($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_kehilangan_list/'.$id),
            'action' => site_url('surat/ket_kehilangan_action/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        'barang' => set_value('barang'),
        'sebab' => set_value('sebab'),
        'tgl_hilang' => set_value('tgl_hilang'),
        'tpt_hilang' => set_value('tpt_hilang'),

        'data_pejabat' => $data_pejabat,
        'id_user' => set_value('id_user'),


        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Kehilangan',
        'isi' => 'surat/surat_ket_kehilangan/ket_kehilangan',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_kehilangan_action($id) {

            $data_desa = $this->Profil_desa_model->get_by_id(1);
            $no = $this->Surat_ket_kehilangan_model->get_kode();
            $kode = 'SKK'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'barang' => $this->input->post('barang', TRUE),
                'sebab' => $this->input->post('sebab', TRUE),
                'tgl_hilang' => $this->input->post('tgl_hilang', TRUE),
                'tpt_hilang' => $this->input->post('tpt_hilang', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Kehilangan',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_kehilangan_model->insert($data_surat);
            $this->History_surat_kehilangan_model->insert($data_history);

            redirect(site_url('surat/ket_kehilangan_list/9'));

    }

    function cetak_ket_kehilangan($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_kehilangan_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_kehilangan_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_kehilangan_model->get_by_kode($kode);
        $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT KETERANGAN KEHILANGAN',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
            'ttl' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
            'jekel' => $data_pemohon->jekel,
            'status' => $data_pemohon->stkawin,
            'agama' => $data_pemohon->agama,
            'kerja' => $data_pemohon->kerja,
            'alamat' => $data_pemohon->alamat.", RT ".$data_pemohon->rt."/RW ".$data_pemohon->rw.", Kel. ".$data_pemohon->kelurahan.", Kec. ".$data_pemohon->kecamatan.", Kab. ".$data_pemohon->kabupaten,
            'no_ktp' => $data_pemohon->nik,
            'no_kk' => $data_pemohon->no_kk,
            'barang' => $data_surat->barang,
            'sebab' => $data_surat->sebab,
            'tgl_hilang' => $this->tgl_indo($data_surat->tgl_hilang),
            'tpt_hilang' => $data_surat->tpt_hilang,


            );


        $this->load->view('surat/surat_ket_kehilangan/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_kehilangan/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_kehilangan(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        //$pdf->Output($pdfFilePath, 'D');
        $pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_kehilangan($id)
    {
      $row = $this->History_surat_kehilangan_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_kehilangan_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Kehilangan Success');
    redirect(site_url('surat/ket_kehilangan_list/9'));
  }

  public function batal_setujui_surat_kehilangan($id)
  {
    $row = $this->History_surat_kehilangan_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_kehilangan_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Kehilangan Success');
  redirect(site_url('surat/ket_kehilangan_list/9'));
}

    //SURAT KETERANGAN IZIN KERAMAIAN

    public function ket_keramaian_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_keramaian_model->total_rows($q);
        $surat = $this->History_surat_keramaian_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_keramaian/'.$id,
            'cetak' => 'surat/cetak_ket_keramaian/',
            'setujui' => 'surat/setujui_surat_keramaian/',
            'batal' => 'surat/batal_setujui_surat_keramaian/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Izin Keramaian',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_keramaian($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_keramaian_list/'.$id),
            'action' => site_url('surat/ket_keramaian_action/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        'rangka' => set_value('rangka'),

        'data_pejabat' => $data_pejabat,
        'id_user' => set_value('id_user'),


        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Izin Keramaian',
        'isi' => 'surat/surat_ket_keramaian/ket_keramaian',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_keramaian_action($id) {

            $data_desa = $this->Profil_desa_model->get_by_id(1);
            $no = $this->Surat_ket_keramaian_model->get_kode();
            $kode = 'SIK'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'rangka' => $this->input->post('rangka', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Izin Keramaian',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_keramaian_model->insert($data_surat);
            $this->History_surat_keramaian_model->insert($data_history);

            redirect(site_url('surat/ket_keramaian_list/7'));

    }

    function cetak_ket_keramaian($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_keramaian_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_keramaian_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_keramaian_model->get_by_kode($kode);
        $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT KETERANGAN IZIN KERAMAIAN',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
            'ttl' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
            'jekel' => $data_pemohon->jekel,
            'status' => $data_pemohon->stkawin,
            'agama' => $data_pemohon->agama,
            'kerja' => $data_pemohon->kerja,
            'pendidikan' => $data_pemohon->pendidikan,
            'alamat' => $data_pemohon->alamat.", RT ".$data_pemohon->rt."/RW ".$data_pemohon->rw.", Kel. ".$data_pemohon->kelurahan.", Kec. ".$data_pemohon->kecamatan.", Kab. ".$data_pemohon->kabupaten,
            'no_ktp' => $data_pemohon->nik,
            'no_kk' => $data_pemohon->no_kk,
            'rangka' => $data_surat->rangka,


            );


        $this->load->view('surat/surat_ket_keramaian/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_keramaian/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_keramaian(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        //$pdf->Output($pdfFilePath, 'D');
        $pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_keramaian($id)
    {
      $row = $this->History_surat_keramaian_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_keramaian_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Keramaian Success');
    redirect(site_url('surat/ket_keramaian_list/7'));
  }

  public function batal_setujui_surat_keramaian($id)
  {
    $row = $this->History_surat_keramaian_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_keramaian_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Keramaian Success');
  redirect(site_url('surat/ket_keramaian_list/7'));
}

    //SURAT KETERANGAN DOMISILI

    public function ket_domisili_list($id)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->History_surat_domisili_model->total_rows($q);
        $surat = $this->History_surat_domisili_model->get_limit_data($config['per_page'], $start, $c, $q);


        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_data' => $surat,
            'tambah' => 'surat/ket_domisili/'.$id,
            'cetak' => 'surat/cetak_ket_domisili/',
            'setujui' => 'surat/setujui_surat_domisili/',
            'batal' => 'surat/batal_setujui_surat_domisili/',
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav'      => 'SIMADES || Pengajuan Surat',
            'title'         => 'Pengajuan Surat',
            'anchor'        => 'Daftar Pengajuan Surat Keterangan Domisili',
            'isi'           => 'surat/history_list',
        );
            $this->load->view('layout/wrapper', $data);
    }

    public function ket_domisili($id)
    {
        $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
        $list_agama = $this->Agama_model->get_all();
        $data_pejabat = $this->User_model->get_all();
        $data = array(
            'button' => 'Simpan',
            'batal' => site_url('surat/ket_domisili_list/'.$id),
            'action' => site_url('surat/ket_domisili_action/'.$id),

        'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
        'nik' => set_value('nik'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'jekel' => set_value('jekel'),
        'list_agama'    => $list_agama,
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),
        'anak_ke' => set_value('anak_ke'),
        'keperluan' => set_value('keperluan'),
        'tgl_mulai' => set_value('tgl_mulai', $this->tgl_indo(date('Y-m-d'))),
        'tgl_akhir' => set_value('tgl_akhir'),

        'data_pejabat' => $data_pejabat,
        'id_user' => set_value('id_user'),


        'titlenav' => 'SIMADES || Pengajuan Surat',
        'title' => 'Pengajuan Surat',
        'anchor' => 'Tambah Pengajuan Surat Keterangan Domisili',
        'isi' => 'surat/surat_ket_domisili/ket_domisili',
        );
        $this->load->view('layout/wrapper', $data);
    }

    function ket_domisili_action($id) {

            $data_desa = $this->Profil_desa_model->get_by_id(1);
            $no = $this->Surat_ket_domisili_model->get_kode();
            $kode = 'SKD'.date('Ymd').$no;
            $data_surat = array(
                'kd_surat' => $kode,
                'nik' => $this->input->post('nik', TRUE),
                'keterangan' => 'Orang tersebut di atas adalah benar-benar Penduduk '.$data_desa->nm_desa.', Kecamatan '.$data_desa->kecamatan.', Kabupaten '.$data_desa->kabupaten,
                'keperluan' => $this->input->post('keperluan', TRUE),
                'id_user_ttd' => $this->input->post('id_user', TRUE),
                'tgl_mulai' => date('Y-m-d'),
                'tgl_akhir' => $this->input->post('tgl_akhir', TRUE),

                );

            $data_history = array(
                'kd_surat' => $kode,
                'no_surat' => $this->input->post('no_surat', TRUE),
                'jenis_surat' => 'Surat Keterangan Domisili',
                'tgl_surat' => date('Y-m-d'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_persetujuan' => 'Belum disetujui',

                );
            $this->Surat_ket_domisili_model->insert($data_surat);
            $this->History_surat_domisili_model->insert($data_history);

            redirect(site_url('surat/ket_domisili_list/11'));

    }

    function cetak_ket_domisili($kode) {
        $update_tgl = array(
            'tgl_surat' => date('Y-m-d'),
            );
        $this->History_surat_domisili_model->update($kode, $update_tgl);

        //Cetak Surat
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $data_surat = $this->Surat_ket_domisili_model->get_by_id($kode);
        $data_surat2 = $this->History_surat_domisili_model->get_by_kode($kode);
        $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
        //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


        $data = array(
            'judul' => 'SURAT KETERANGAN DOMISILI',
            'logo_desa' => $data_desa->image,
            'kabupaten' => strtoupper($data_desa->kabupaten),
            'kecamatan' => strtoupper($data_desa->kecamatan),
            'desa' => $data_desa->nm_desa,
            'alamat_desa' => $data_desa->alamat_desa,
            'no_telp' => $data_desa->no_telp,
            'kode_pos' => $data_desa->kode_pos,
            'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

            'no_surat' => $data_surat2->no_surat,
            'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
            'nip_pejabat' => $data_surat->nip,
            'jabatan' => $data_surat->jabatan,

            'nama' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
            'ttl' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
            'jekel' => $data_pemohon->jekel,
            'status' => $data_pemohon->stkawin,
            'agama' => $data_pemohon->agama,
            'kerja' => $data_pemohon->kerja,
            'alamat' => $data_pemohon->alamat.", RT ".$data_pemohon->rt."/RW ".$data_pemohon->rw.", Kel. ".$data_pemohon->kelurahan.", Kec. ".$data_pemohon->kecamatan.", Kab. ".$data_pemohon->kabupaten,
            'nik' => $data_pemohon->nik,
            'keterangan' => $data_surat->keterangan,
            'keperluan' => $data_surat->keperluan,
            'berlaku_mulai' => $this->tgl_indo($data_surat->tgl_mulai).'<br> sampai dengan '.$this->tgl_indo($data_surat->tgl_akhir),


            );


        $this->load->view('surat/surat_ket_domisili/viewpdf',$data);
        $sumber = $this->load->view('surat/surat_ket_domisili/viewpdf',$data, TRUE);
        $html = $sumber;


        $pdfFilePath = "surat_ket_domisili(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
        //lokasi file css yang akan di load
        //$css = $this->load->view('css/bootstrap.min.css');
        //$stylesheet = file_get_contents($css);

        $pdf = $this->m_pdf->load();

        $pdf->AddPage('P');
        $pdf->WriteHTML($stylesheet, 1);
        $pdf->WriteHTML($html);

        $pdf->Output($pdfFilePath, 'D');
        //$pdf->Output();
        //$this->continueNextFunction();
        exit();
        redirect(site_url('surat'));
    }

    public function setujui_surat_domisili($id)
    {
      $row = $this->History_surat_domisili_model->get_by_id($id);

      if ($row) {
              $data = array(
      'status_persetujuan' => 'Disetujui',
  	    );

              $this->History_surat_domisili_model->update($id, $data);


    }
    $this->session->set_flashdata('message', 'Persetujuan Surat Domisili Success');
    redirect(site_url('surat/ket_domisili_list/11'));
  }

  public function batal_setujui_surat_domisili($id)
  {
    $row = $this->History_surat_domisili_model->get_by_id($id);

    if ($row) {
            $data = array(
    'status_persetujuan' => 'Belum disetujui',
      );

            $this->History_surat_domisili_model->update($id, $data);


  }
  $this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Domisili Success');
  redirect(site_url('surat/ket_domisili_list/11'));
}

// Surat Pengantar E-KTP

public function ket_pengantar_ektp_list($id){
  $q = urldecode($this->input->get('q', TRUE));
  $c = urldecode($this->input->get('c', TRUE));
  $start = intval($this->input->get('start'));

  $config['per_page'] = 10;
  $config['page_query_string'] = TRUE;
  $config['total_rows'] = $this->History_surat_pengantar_ektp_model->total_rows($q);
  $surat = $this->History_surat_pengantar_ektp_model->get_limit_data($config['per_page'], $start, $c, $q);


  $this->load->library('pagination');
  $this->pagination->initialize($config);

  $data = array(
      'surat_data' => $surat,
      'tambah' => 'surat/ket_pengantar_ektp/'.$id,
      'cetak' => 'surat/cetak_ket_pengantar_ektp/',
      'setujui' => 'surat/setujui_surat_pengantar_ektp/',
      'batal' => 'surat/batal_setujui_surat_pengantar_ektp/',
      'q' => $q,
      'c' => $c,
      'pagination' => $this->pagination->create_links(),
      'total_rows' => $config['total_rows'],
      'start' => $start,
      'titlenav'      => 'SIMADES || Pengajuan Surat',
      'title'         => 'Pengajuan Surat',
      'anchor'        => 'Daftar Pengajuan Surat Pengantar E-KTP',
      'isi'           => 'surat/history_list',
  );
      $this->load->view('layout/wrapper', $data);
}

public function ket_pengantar_ektp($id){
  $jenis_surat = $this->Jenis_surat_model->get_by_id($id);
  $list_agama = $this->Agama_model->get_all();
  $data_pejabat = $this->User_model->get_all();
  $data = array(
      'button' => 'Simpan',
      'batal' => site_url('surat/ket_pengantar_ektp_list/'.$id),
      'action' => site_url('surat/ket_pengantar_ektp_action/'.$id),

  'no_surat' => set_value('no_surat', $jenis_surat->format_no_surat),
  'nik' => set_value('nik'),
  'no_kk' => set_value('no_kk'),
  'nama_depan' => set_value('nama_depan'),
  'nama_belakang' => set_value('nama_belakang'),
  'tanggal_lhr' => set_value('tanggal_lhr'),
  'tempat_lhr' => set_value('tempat_lhr'),
  'jekel' => set_value('jekel'),
  'list_agama'    => $list_agama,
  'agama' => set_value('agama'),
  'kerja' => set_value('kerja'),
  'alamat' => set_value('alamat'),
  'anak_ke' => set_value('anak_ke'),
  'keperluan' => set_value('keperluan'),
  'tgl_mulai' => set_value('tgl_mulai', $this->tgl_indo(date('Y-m-d'))),
  'tgl_akhir' => set_value('tgl_akhir'),

  'data_pejabat' => $data_pejabat,
  'id_user' => set_value('id_user'),


  'titlenav' => 'SIMADES || Pengajuan Surat',
  'title' => 'Pengajuan Surat',
  'anchor' => 'Tambah Pengajuan Surat Pengantar E-KTP',
  'isi' => 'surat/surat_ket_pengantar_ektp/ket_pengantar_ektp',
  );
  $this->load->view('layout/wrapper', $data);
}

function ket_pengantar_ektp_action($id) {

        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $no = $this->Surat_ket_pengantar_ektp_model->get_kode();
        $kode = 'SPE'.date('Ymd').$no;
        $data_surat = array(
            'kd_surat' => $kode,
            'nik' => $this->input->post('nik', TRUE),
            'ket_permohonan' => $this->input->post('ket_permohonan', TRUE),
            'id_user_ttd' => $this->input->post('id_user', TRUE),
            'tgl_mulai' => date('Y-m-d'),
            'tgl_akhir' => $this->input->post('tgl_akhir', TRUE),

            );

        $data_history = array(
            'kd_surat' => $kode,
            'no_surat' => $this->input->post('no_surat', TRUE),
            'jenis_surat' => 'Surat Pengantar E-KTP',
            'tgl_surat' => date('Y-m-d'),
            'waktu' => date('Y-m-d h:i:s'),
            'status_persetujuan' => 'Belum disetujui',

            );
        $this->Surat_ket_pengantar_ektp_model->insert($data_surat);
        $this->History_surat_pengantar_ektp_model->insert($data_history);

        redirect(site_url('surat/ket_pengantar_ektp_list/12'));

}

function cetak_ket_pengantar_ektp($kode) {
    $update_tgl = array(
        'tgl_surat' => date('Y-m-d'),
        );
    $this->History_surat_pengantar_ektp_model->update($kode, $update_tgl);

    //Cetak Surat
    $data_desa = $this->Profil_desa_model->get_by_id(1);
    $data_surat = $this->Surat_ket_pengantar_ektp_model->get_by_id($kode);
    $data_surat2 = $this->History_surat_pengantar_ektp_model->get_by_kode($kode);
    $data_pemohon = $this->Penduduk_model->get_by_id($data_surat->nik);
    //$data_ibu = $this->Penduduk_model->get_by_id($data_surat->nik_ibu);


    $data = array(
        'judul' => 'SURAT PENGANTAR PERMOHONAN E-KTP',
        'logo_desa' => $data_desa->image,
        'kabupaten' => strtoupper($data_desa->kabupaten),
        'kecamatan' => strtoupper($data_desa->kecamatan),
        'desa' => $data_desa->nm_desa,
        'alamat' => $data_desa->alamat_desa,
        'no_telp' => $data_desa->no_telp,
        'kode_pos' => $data_desa->kode_pos,
        'tgl_surat' => $this->tgl_indo($data_surat2->tgl_surat),

        'no_surat' => $data_surat2->no_surat,
        'nama_pejabat' => $data_surat->nama_depan_user.' '.$data_surat->nama_belakang_user,
        'nip_pejabat' => $data_surat->nip,
        'jabatan' => $data_surat->jabatan,

        'nama' => $data_pemohon->nama_depan.' '.$data_pemohon->nama_belakang,
        'ttl' => $data_pemohon->tempat_lhr.', '.$this->tgl_indo($data_pemohon->tanggal_lhr),
        'jekel' => $data_pemohon->jekel,
        'status' => $data_pemohon->stkawin,
        'agama' => $data_pemohon->agama,
        'kerja' => $data_pemohon->kerja,
        'alamat' => $data_pemohon->alamat.", RT ".$data_pemohon->rt."/RW ".$data_pemohon->rw.", Kel. ".$data_pemohon->kelurahan.", Kec. ".$data_pemohon->kecamatan.", Kab. ".$data_pemohon->kabupaten,
        'bukti' => 'KTP No. '.$data_pemohon->nik.' KK No. '.$data_pemohon->no_kk,
        'keterangan' => $data_surat->keterangan,
        'ket_permohonan' => $data_surat->ket_permohonan,
        'berlaku_mulai' => $this->tgl_indo($data_surat->tgl_mulai).' s.d '.$this->tgl_indo($data_surat->tgl_akhir),


        );


    $this->load->view('surat/surat_ket_pengantar_ektp/view_pdf_pengantar_ektp',$data);
    $sumber = $this->load->view('surat/surat_ket_pengantar_ektp/view_pdf_pengantar_ektp',$data, TRUE);
    $html = $sumber;


    $pdfFilePath = "surat_ket_pengantarE-KTP(".$data_surat->nik.")-".$data_surat2->tgl_surat.".pdf";
    //lokasi file css yang akan di load
    //$css = $this->load->view('css/bootstrap.min.css');
    //$stylesheet = file_get_contents($css);

    $pdf = $this->m_pdf->load();

    $pdf->AddPage('P');
    $pdf->WriteHTML($stylesheet, 1);
    $pdf->WriteHTML($html);

    $pdf->Output($pdfFilePath, 'D');
    //$pdf->Output();
    //$this->continueNextFunction();
    exit();
    redirect(site_url('surat'));
}

public function setujui_surat_pengantar_ektp($id)
{
  $row = $this->History_surat_pengantar_ektp_model->get_by_id($id);

  if ($row) {
          $data = array(
  'status_persetujuan' => 'Disetujui',
    );

          $this->History_surat_pengantar_ektp_model->update($id, $data);


}
$this->session->set_flashdata('message', 'Persetujuan Surat Pengantar E-KTP Success');
redirect(site_url('surat/ket_pengantar_ektp_list/12'));
}

public function batal_setujui_surat_pengantar_ektp($id)
{
$row = $this->History_surat_pengantar_ektp_model->get_by_id($id);

if ($row) {
        $data = array(
'status_persetujuan' => 'Belum disetujui',
  );

        $this->History_surat_pengantar_ektp_model->update($id, $data);


}
$this->session->set_flashdata('message', 'Batalkan Persetujuan Surat Pengantar E-KTP Success');
redirect(site_url('surat/ket_pengantar_ektp_list/12'));
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

    function hitung_umur($tanggal_lahir) {
        list($year,$month,$day) = explode("-",$tanggal_lahir);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;
        if ($month_diff < 0) $year_diff--;
            elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
        return $year_diff;
    }

    public function _rules_bepergian()
    {
	$this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_blm_menikah()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_kehilangan()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('barang', 'barang hilang', 'trim|required');
    $this->form_validation->set_rules('sebab', 'sebab hilang', 'trim|required');
    $this->form_validation->set_rules('tgl_hilang', 'tanggal hilang', 'trim|required');
    $this->form_validation->set_rules('tpt_hilang', 'tempat hilang', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_keramaian()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('rangka', 'dalam rangka', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_lahir()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim|required');
    $this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim|required');
    $this->form_validation->set_rules('nama_saksi1', 'nama saksi 1', 'trim|required');
    $this->form_validation->set_rules('nama_saksi2', 'nama saksi 2', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_meninggal()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('nama_saksi1', 'nama saksi 1', 'trim|required');
    $this->form_validation->set_rules('umur_saksi1', 'umur saksi 1', 'trim|required');
    $this->form_validation->set_rules('alamat_saksi1', 'alamat saksi 1', 'trim|required');
    $this->form_validation->set_rules('nama_saksi2', 'nama saksi 2', 'trim|required');
    $this->form_validation->set_rules('umur_saksi2', 'umur saksi 2', 'trim|required');
    $this->form_validation->set_rules('alamat_saksi2', 'alamat saksi 2', 'trim|required');
    $this->form_validation->set_rules('hari_meninggal', 'hari meninggal', 'trim|required');
    $this->form_validation->set_rules('tgl_meninggal', 'tanggal meninggal', 'trim|required');
    $this->form_validation->set_rules('sebab_meninggal', 'sebab meninggal', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_pengantar()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    $this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
    $this->form_validation->set_rules('tgl_akhir', 'tanggal akhir', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_tdk_mampu()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('nik_wali', 'nik wali', 'trim|required');
    $this->form_validation->set_rules('sekolah', 'sekolah', 'trim|required');
    $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
    $this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_usaha()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('nama_usaha', 'nama usaha', 'trim|required');
    $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    $this->form_validation->set_rules('keperluan', 'keperluan', 'trim|required');
    $this->form_validation->set_rules('tgl_akhir', 'tanggal akhir', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules_wali()
    {
    $this->form_validation->set_rules('nik', 'nik', 'trim|required');
    $this->form_validation->set_rules('nik_perempuan', 'nik perempuan', 'trim|required');
    $this->form_validation->set_rules('nik_laki', 'keterangan', 'trim|required');
    $this->form_validation->set_rules('alasan', 'alasan', 'trim|required');
    $this->form_validation->set_rules('id_user_ttd', 'pejabat', 'trim|required');

    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }



}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:36 */
/* http://harviacode.com */
