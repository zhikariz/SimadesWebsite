<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penduduk_model');
        $this->load->model('Kk_model');
        $this->load->model('Dusun_model');
        $this->load->model('Agama_model');
        $this->load->model('Goldar_model');
        $this->load->model('Status_kawin_model');
        $this->load->model('Kerja_model');
        $this->load->model('Hubkel_model');
        $this->load->model('Pendidikan_model');
        $this->load->model('Profil_desa_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url','file','download'));
        //$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
    }

    public function index()
    {
        $penduduk = $this->Penduduk_model->get_all();
        foreach ($penduduk as $row) {
            $data_umur = array(
                'umur' => $this->hitung_umur($row->tanggal_lhr),
                );

            $this->Penduduk_model->update($row->nik, $data_umur);
        }

        $this->session->unset_userdata('no_kk');
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'penduduk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penduduk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penduduk/index.html';
            $config['first_url'] = base_url() . 'penduduk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penduduk_model->total_rows($q);
        $penduduk = $this->Penduduk_model->get_limit_data($config['per_page'], $start, $c, $q);
        //$penduduk = $this->Penduduk_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penduduk_data' => $penduduk,
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'titlenav'  => 'SIMADES || Data Penduduk',
            'title'     => 'Data Penduduk',
            'anchor'    => 'Daftar Penduduk',
            'isi'       => 'penduduk/penduduk_list',
            'start'     => $start,
        );
        $this->load->view('layout/wrapper', $data);
        //set halaman
        $this->session->set_userdata('dari','semua');
    }

    public function import()
    {
        $data = array(

            'titlenav'  => 'SIMADES || Data Penduduk',
            'title'     => 'Data Penduduk',
            'anchor'    => 'Daftar Penduduk',
            'isi'       => 'penduduk/import',

        );
        $this->load->view('layout/wrapper', $data);
    }

    public function importexcel() {
      $fileName = date('Y-m-d H:i:s')."-".$_FILES['file']['name'];
  		$config = array(
        'file_name' => $fileName,
  			'upload_path'   => FCPATH.'upload/',
  			'allowed_types' => 'xls|csv|xlsm|xlsx'
  		);
  		$this->load->library('upload', $config);
  		if ($this->upload->do_upload('file')) {
  			$data = $this->upload->data();
  			@chmod($data['full_path'], 0777);

  			$this->load->library('Spreadsheet_Excel_Reader');
  			$this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

  			$this->spreadsheet_excel_reader->read($data['full_path']);
  			$sheets = $this->spreadsheet_excel_reader->sheets[0];


  			$data_kk = array();
        $data_penduduk = array();
        $data_desa = $this->Profil_desa_model->get_by_id(1);

  			for ($i = 1; $i <= $sheets['numRows']; $i++) {
  				if ($sheets['cells'][$i][1] == '') break;

  				$data_kk[$i - 1]['no_kk']    = $sheets['cells'][$i][3];
  				$data_kk[$i - 1]['alamat']   = $sheets['cells'][$i][16];
  				$data_kk[$i - 1]['id_dusun'] = $sheets['cells'][$i][21];
          $data_kk[$i - 1]['rt'] = $sheets['cells'][$i][17];
          $data_kk[$i - 1]['rw'] = $sheets['cells'][$i][18];
          $data_kk[$i - 1]['kelurahan'] = $data_desa->nm_desa;
          $data_kk[$i - 1]['kecamatan'] = $data_desa->kecamatan;
          $data_kk[$i - 1]['kabupaten'] = $data_desa->kabupaten;
          $data_kk[$i - 1]['propinsi'] = $data_desa->propinsi;


          $data_penduduk[$i - 1]['nik'] = $sheets['cells'][$i][2];
          $data_penduduk[$i - 1]['no_kk'] = $sheets['cells'][$i][3];
          $data_penduduk[$i - 1]['nama_depan'] = $sheets['cells'][$i][4];
          $data_penduduk[$i - 1]['nama_belakang'] = $sheets['cells'][$i][5];
          $data_penduduk[$i - 1]['jekel'] = $sheets['cells'][$i][7];
          $data_penduduk[$i - 1]['umur'] = $this->hitung_umur($sheets['cells'][$i][6]);
          $data_penduduk[$i - 1]['id_agama'] = $sheets['cells'][$i][10];
          $data_penduduk[$i - 1]['id_goldar'] = $sheets['cells'][$i][9];
          $data_penduduk[$i - 1]['id_stskawin'] = $sheets['cells'][$i][12];
          $data_penduduk[$i - 1]['tempat_lhr'] = $sheets['cells'][$i][8];
          $data_penduduk[$i - 1]['tanggal_lhr'] = date('Y-m-d',$sheets['cells'][$i][6]);
          $data_penduduk[$i - 1]['nama_ayah'] = $sheets['cells'][$i][20];
          $data_penduduk[$i - 1]['nama_ibu'] = $sheets['cells'][$i][19];
          $data_penduduk[$i - 1]['anak_ke'] = $sheets['cells'][$i][13];
          $data_penduduk[$i - 1]['id_kerja'] = $sheets['cells'][$i][14];
          $data_penduduk[$i - 1]['id_hubkel'] = $sheets['cells'][$i][11];
          $data_penduduk[$i - 1]['id_pendidikan'] = $sheets['cells'][$i][15];
          $data_penduduk[$i - 1]['status'] = 'IB';
          $data_penduduk[$i - 1]['tgl_mutasi'] = date('Y-m-d');

  			}

        for($i = 1; $i < count($data_kk); $i++){
          $number_kk = $this->Kk_model->get_by_number($data_kk[$i]['no_kk']);
           if($data_kk[$i]['no_kk'] != $number_kk->no_kk){
            $data = array(
        'no_kk'         => $data_kk[$i]['no_kk'],
        'alamat'        => $data_kk[$i]['alamat'],
        'id_dusun'        => $data_kk[$i]['id_dusun'],
        'rt'            => $data_kk[$i]['rt'],
        'rw'            => $data_kk[$i]['rw'],
        'kelurahan'     => $data_kk[$i]['kelurahan'],
        'kecamatan'     => $data_kk[$i]['kecamatan'],
        'kabupaten'     => $data_kk[$i]['kabupaten'],
        'propinsi'      => $data_kk[$i]['propinsi'],
        );
            //simpan data tabel KK
             $this->Kk_model->insert($data);

           }
        }

        for($i = 1; $i < count($data_penduduk); $i++){
          $number_penduduk = $this->Penduduk_model->get_by_id($data_penduduk[$i]['nik']);
           if($data_penduduk[$i]['nik'] != $number_penduduk->nik){
             $data_pend = array(
                'nik'           => $data_penduduk[$i]['nik'],
                'no_kk'         => $data_penduduk[$i]['no_kk'],
                'nama_depan'    => $data_penduduk[$i]['nama_depan'],
                'nama_belakang' => $data_penduduk[$i]['nama_belakang'],
                'jekel'         => $data_penduduk[$i]['jekel'],
                'id_agama'      => $data_penduduk[$i]['id_agama'],
                'id_goldar'     => $data_penduduk[$i]['id_goldar'],
                'id_stskawin'   => $data_penduduk[$i]['id_stskawin'],
                'tempat_lhr'    => $data_penduduk[$i]['tempat_lhr'],
                'tanggal_lhr'   => $data_penduduk[$i]['tanggal_lhr'],
                'nama_ayah'     => $data_penduduk[$i]['nama_ayah'],
                'nama_ibu'      => $data_penduduk[$i]['nama_ibu'],
                'anak_ke'       => $data_penduduk[$i]['anak_ke'],
                'id_kerja'      => $data_penduduk[$i]['id_kerja'],
                'id_hubkel'     => $data_penduduk[$i]['id_hubkel'],
                'id_pendidikan' => $data_penduduk[$i]['id_pendidikan'],
                'status'        => $data_penduduk[$i]['status'],
                'tgl_mutasi'    => $data_penduduk[$i]['tgl_mutasi'],
                );


                    //simpan data tabel penduduk
                    $this->Penduduk_model->insert($data_pend);

           }
        }
        // $this->db->insert_batch('penduduk', $data_penduduk);
        redirect('penduduk');



  		}



      }

    public function upload()
    {
        $fileName = time().$_FILES['file']['name'];
        $config['upload_path'] ='./uploads/';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';

        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();

        $media = $this->upload->data('file');
       // $inputFileName = './assets/'.$media['file_name'];
        $inputFileName = './uploads/'.$fileName;

        try {
                /*$inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType); */
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);

            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);

                //Sesuaikan sama nama kolom tabel di database
                $data_desa = $this->Profil_desa_model->get_by_id(1);
                $agama = $this->Agama_model->get_by_data($rowData[0][10]);
                $goldar = $this->Goldar_model->get_by_data($rowData[0][9]);
                $sts_kawin = $this->Status_kawin_model->get_by_data($rowData[0][11]);
                $kerja = $this->Kerja_model->get_by_data($rowData[0][14]);
                $hubkel = $this->Hubkel_model->get_by_data($rowData[0][12]);
                $pendidikan = $this->Pendidikan_model->get_by_data($rowData[0][13]);
                $dusun = $this->Dusun_model->get_by_data($rowData[0][16]);


                if($agama || $goldar || $sts_kawin || $kerja || $hubkel || $pendidikan || $dusun)
                {

                    $kk = $this->Penduduk_model->get_data('kk','kk.no_kk', $rowData[0][2]);
                    if(!$kk){
                      $data_kk = array(
                        'no_kk'         => $rowData[0][2],
                        'alamat'        => $rowData[0][15],
                        'id_dusun'      => $dusun->id_dusun,
                        'rt'            => $rowData[0][18],
                        'rw'            => $rowData[0][17],
                        'kelurahan'     => $data_desa->nm_desa,
                        'kecamatan'     => $data_desa->kecamatan,
                        'kabupaten'     => $data_desa->kabupaten,
                        'propinsi'      => $data_desa->propinsi,
                        );
                            //simpan data tabel KK
                            $this->Kk_model->insert($data_kk);
                    }
                     $data_pend = array(
                        'nik'           => $rowData[0][1],
                        'no_kk'         => $rowData[0][2],
                        'nama_depan'    => $rowData[0][4],
                        'nama_belakang' => $rowData[0][5],
                        'jekel'         => $rowData[0][7],
                        'id_agama'      => $agama->id_agama,
                        'id_goldar'     => $goldar->id_goldar,
                        'id_stskawin'   => $sts_kawin->id_stkawin,
                        'tempat_lhr'    => $rowData[0][8],
                        'tanggal_lhr'   => date('Y-m-d', strtotime($rowData[0][6])),
                        'nama_ayah'     => $rowData[0][20],
                        'nama_ibu'      => $rowData[0][19],
                        'anak_ke'       => NULL,
                        'id_kerja'      => $kerja->id_kerja,
                        'id_hubkel'     => $hubkel->id_hubkel,
                        'id_pendidikan' => $pendidikan->id_pendidikan,
                        'status'        => 'IB',
                        'tgl_mutasi'    => date('Y-m-d'),
                        );


                            //simpan data tabel penduduk
                            $this->Penduduk_model->insert($data_pend);
                }
                else{
                    $this->session->set_flashdata('message', 'Data Master Belum lengkap');
                    redirect('penduduk');
                }

            }
                    //delete_files($fileName);
                   $path_to_file = './uploads/'.$fileName;

                   if(unlink($path_to_file)){
                        $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
                        redirect('penduduk');
                    }
                    else{
                        $this->session->set_flashdata('message', 'Data gagal dimasukkan');
                        redirect('penduduk');

                    }
    }

    public function download()
    {
        force_download('./uploads/excel/template_kolom.xls', NULL);
    }

    public function listKK($nokk)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penduduk_model->total_rows($q);

        $penduduk = $this->Penduduk_model->get_all_kk($nokk);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penduduk_data' => $penduduk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'titlenav'  => 'SIMADES || Data Penduduk',
            'title'     => 'Data Penduduk',
            'anchor'    => 'Daftar Penduduk',
            'isi'       => 'penduduk/penduduk_list_kk',
            'start'     => $start,
        );
        $this->load->view('layout/wrapper', $data);
        //menyimpan nomor KK di session
        $this->session->set_userdata('no_kk', $nokk);
        //set halaman
        $this->session->set_userdata('dari','kk');
    }

    public function read($id)
    {
        $row = $this->Penduduk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nik' 			=> $row->nik,
		'no_kk' 		=> $row->no_kk,
		'nama_depan' 	=> $row->nama_depan,
		'nama_belakang' => $row->nama_belakang,
		'jekel' 		=> $row->jekel,
        'umur'         => $row->umur,
		'id_agama' 		=> $row->agama,
		'id_goldar' 	=> $row->goldar,
		'id_stskawin' 	=> $row->stkawin,
		'tempat_lhr' 	=> $row->tempat_lhr,
		'tanggal_lhr' 	=> $row->tanggal_lhr,
		'nama_ayah' 	=> $row->nama_ayah,
		'nama_ibu'		=> $row->nama_ibu,
		'anak_ke' 		=> $row->anak_ke,
		'id_kerja' 		=> $row->kerja,
		'id_hubkel' 	=> $row->hubkel,
		'id_pendidikan' => $row->pendidikan,
		'alamat'		=> $row->alamat,
        'dusun'         => $row->dusun,
	    'rt' 			=> $row->rt,
	    'rw'			=> $row->rw,
	    'kelurahan' 	=> $row->kelurahan,
	    'kecamatan' 	=> $row->kecamatan,
	    'kabupaten' 	=> $row->kabupaten,
	    'propinsi' 		=> $row->propinsi,
		'status' 		=> $row->status,
		'titlenav' 		=> 'SIMADES || Data Penduduk',
		'title' 		=> 'Data Penduduk',
        'anchor' 		=> 'Detail Penduduk',
        'isi' 			=> 'penduduk/penduduk_read',
	    );
            $this->load->view('layout/wrapper', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function createKK()
    {
        //ambil data alamat desa
        $data_desa = $this->Profil_desa_model->get_by_id(1);
        $list_dusun = $this->Dusun_model->get_all();

        $data = array(
            'button' => 'Tambah Anggota Keluarga',
            'action' => site_url('penduduk/createKK_action'),
        'no_kk'         => set_value('no_kk'),
        'alamat'        => set_value('alamat'),
        'list_dusun'    => $list_dusun,
        'id_dusun'         => set_value('id_dusun'),
        'rt'            => set_value('rt'),
        'rw'            => set_value('rw'),
        'kelurahan'     => set_value('kelurahan', $data_desa->nm_desa),
        'kecamatan'     => set_value('kecamatan', $data_desa->kecamatan),
        'kabupaten'     => set_value('kabupaten', $data_desa->kabupaten),
        'propinsi'      => set_value('propinsi', $data_desa->propinsi),
        'titlenav'      => 'SIMADES || Data Penduduk',
        'title'         => 'Data Penduduk',
        'anchor'        => 'Buat KK Baru',
        'isi'           => 'kk/kk_form',
    );
        $this->load->view('layout/wrapper', $data);

    }

    public function createKK_action()
    {
        $this->_rulesKK();

        if ($this->form_validation->run() == FALSE) {
            $this->createKK();
        } else {
            $nokk = $this->input->post('nokk');
            $cek_nokk = $this->Penduduk_model->get_data('kk', 'kk.no_kk', $nokk);
            if(!$cek_nokk)
            {
                $data = array(
            'no_kk'         => $nokk,
            'alamat'        => $this->input->post('alamat',TRUE),
            'id_dusun'        => $this->input->post('id_dusun',TRUE),
            'rt'            => $this->input->post('rt',TRUE),
            'rw'            => $this->input->post('rw',TRUE),
            'kelurahan'     => $this->input->post('kelurahan',TRUE),
            'kecamatan'     => $this->input->post('kecamatan',TRUE),
            'kabupaten'     => $this->input->post('kabupaten',TRUE),
            'propinsi'      => $this->input->post('propinsi',TRUE),
            );
                //simpan data tabel KK
                $this->Kk_model->insert($data);
                $this->session->set_userdata('no_kk', $nokk);
                redirect(site_url('penduduk/create/'));
            } else {
                $this->session->set_flashdata('message', 'Nomor KK '.$nokk.' sudah ada');
                redirect(site_url('penduduk/createKK'));
            }

            //$this->session->set_flashdata('message', 'Create Record Success');
            //menyimpan nomor KK di session untuk tambah anggota (dilempar ke function create())

        }
    }

    public function create()
    {
    	//ambil data dropdown
    	$list_agama = $this->Agama_model->get_all();
    	$list_goldar = $this->Goldar_model->get_all();
    	$list_stkawin = $this->Status_kawin_model->get_all();
    	$list_kerja = $this->Kerja_model->get_all();
    	$list_hubkel = $this->Hubkel_model->get_all();
    	$list_pendidikan = $this->Pendidikan_model->get_all();
    	//memasukkan nomor KK dari function createKK_action()
        $nokk = $this->session->userdata('no_kk');
        $data = array(

            'action' => site_url('penduduk/create_action'),
            'button' => 'Tambah',
	    'no_kk'        => set_value('no_kk', $nokk),
        'nik' 			=> set_value('nik_pend'),
	    'nama_depan' 	=> set_value('nama_depan'),
	    'nama_belakang' => set_value('nama_belakang'),
	    'jekel' 		=> set_value('jekel'),
	    'list_agama' 	=> $list_agama,
	    'id_agama' 		=> set_value('id_agama'),
	    'list_goldar' 	=> $list_goldar,
	    'id_goldar' 	=> set_value('id_goldar'),
	    'list_stkawin' 	=> $list_stkawin,
	    'id_stkawin' 	=> set_value('id_stkawin'),
	    'tempat_lhr' 	=> set_value('tempat_lhr'),
	    'tanggal_lhr' 	=> set_value('tanggal_lhr'),
	    'nama_ayah' 	=> set_value('nama_ayah'),
	    'nama_ibu' 		=> set_value('nama_ibu'),
	    'anak_ke' 		=> set_value('anak_ke'),
	    'list_kerja' 	=> $list_kerja,
	    'id_kerja' 		=> set_value('id_kerja'),
	    'list_hubkel' 	=> $list_hubkel,
	    'id_hubkel' 	=> set_value('id_hubkel'),
	    'list_pendidikan' => $list_pendidikan,
	    'id_pendidikan' => set_value('id_pendidikan'),
	    //'status' 		=> set_value('status'),
	    'id_user'       => $this->session->userdata('id_user'),
        'nama_user'     => $this->session->userdata('nama_user'),
        'jabatan'       => $this->session->userdata('jabatan'),
        'nama_desa'     => $this->session->userdata('nama_desa'),
	    'titlenav' 		=> 'SIMADES || Data Penduduk',
	    'title' 		=> 'Data Penduduk',
        'anchor' 		=> 'Tambah Anggota KK',
        'isi' 			=> 'penduduk/penduduk_form',
	);
        $this->load->view('layout/wrapper', $data);

    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '!!TAMBAH DATA GAGAL!!');
            $this->create();
        } else {
        	$nik = $this->input->post('nik_pend');
        	$cek_nik = $this->Penduduk_model->get_by_id($nik);

            if(!$cek_nik){
                $data = array(
    		'nik' 			=> $nik,
    		'no_kk' 		=> $this->input->post('nokk',TRUE),
    		'nama_depan'	=> $this->input->post('nama_depan',TRUE),
    		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
    		'jekel' 		=> $this->input->post('jekel',TRUE),
    		'id_agama' 		=> $this->input->post('id_agama',TRUE),
    		'id_goldar' 	=> $this->input->post('id_goldar',TRUE),
    		'id_stskawin'	=> $this->input->post('id_stkawin',TRUE),
    		'tempat_lhr' 	=> $this->input->post('tempat_lhr',TRUE),
    		'tanggal_lhr' 	=> $this->input->post('tanggal_lhr',TRUE),
    		'nama_ayah' 	=> $this->input->post('nama_ayah',TRUE),
    		'nama_ibu' 		=> $this->input->post('nama_ibu',TRUE),
    		'anak_ke' 		=> $this->input->post('anak_ke',TRUE),
    		'id_kerja' 		=> $this->input->post('id_kerja',TRUE),
    		'id_hubkel' 	=> $this->input->post('id_hubkel',TRUE),
    		'id_pendidikan' => $this->input->post('id_pendidikan',TRUE),
    		'status' 		=> 'IB',
            'tgl_mutasi'    => date('Y-m-d'),
    	    );


                //simpan data tabel penduduk
                $this->Penduduk_model->insert($data);

                $this->session->set_flashdata('message', '!!TAMBAH DATA SUKSES!!');

                if($this->input->post('submit')=='Selesai'){ //jika tekan tombol Selesai
                    if($this->session->userdata('dari')=='semua'){
                        $this->session->unset_userdata('no_kk'); //menghapus nomor KK dari session
                        redirect(site_url('penduduk'));
                    }
                    else if($this->session->userdata('dari')=='kk'){
                        redirect(site_url('penduduk/listKK/'.$this->session->userdata('no_kk')));
                    }
                }
                else if($this->input->post('submit')=='Tambah Lagi'){ //jika tekan tombol Tambah Lagi

                    redirect(site_url('penduduk/create'));
                }
            }
            else {
                $this->session->set_flashdata('message', 'NIK '.$nik.' sudah ada');
                redirect(site_url('penduduk/create'));
            }
        }
    }

    public function update($id)
    {
    	//Ambil data penduduk by id
        $row1 = $this->Penduduk_model->get_by_id($id);
        //Ambil data KK by id
        //$row2 = $this->Kk_model->get_by_id($row1->no_kk);

        //ambil data dropdown
    	$list_agama 	= $this->Agama_model->get_all();
    	$list_goldar 	= $this->Goldar_model->get_all();
    	$list_stkawin 	= $this->Status_kawin_model->get_all();
    	$list_kerja 	= $this->Kerja_model->get_all();
    	$list_hubkel 	= $this->Hubkel_model->get_all();
    	$list_pendidikan = $this->Pendidikan_model->get_all();

        if ($row1) {
            $data = array(
                'button' => 'Edit',
                'action' => site_url('penduduk/update_action'),
		'nik' 			=> set_value('nik_pend', $row1->nik),
		'no_kk' 		=> set_value('no_kk', $row1->no_kk),
		'nama_depan' 	=> set_value('nama_depan', $row1->nama_depan),
		'nama_belakang' => set_value('nama_belakang', $row1->nama_belakang),
		'jekel' 		=> set_value('jekel', $row1->jekel),
		'id_agama' 		=> set_value('id_agama', $row1->id_agama),
		'id_goldar' 	=> set_value('id_goldar', $row1->id_goldar),
		'id_stkawin' 	=> set_value('id_stkawin', $row1->id_stskawin),
		'tempat_lhr' 	=> set_value('tempat_lhr', $row1->tempat_lhr),
		'tanggal_lhr' 	=> set_value('tanggal_lhr', $row1->tanggal_lhr),
		'nama_ayah' 	=> set_value('nama_ayah', $row1->nama_ayah),
		'nama_ibu' 		=> set_value('nama_ibu', $row1->nama_ibu),
		'anak_ke' 		=> set_value('anak_ke', $row1->anak_ke),
		'id_kerja' 		=> set_value('id_kerja', $row1->id_kerja),
		'id_hubkel' 	=> set_value('id_hubkel', $row1->id_hubkel),
		'id_pendidikan' => set_value('id_pendidikan', $row1->id_pendidikan),
		'alamat' 		=> set_value('alamat', $row1->alamat),
	    'rt' 			=> set_value('rt', $row1->rt),
	    'rw' 			=> set_value('rw', $row1->rw),
	    'kelurahan' 	=> set_value('kelurahan', $row1->kelurahan),
	    'kecamatan' 	=> set_value('kecamatan', $row1->kecamatan),
	    'kabupaten' 	=> set_value('kabupaten', $row1->kabupaten),
	    'propinsi' 		=> set_value('propinsi', $row1->propinsi),
		//'status' 		=> set_value('status', $row1->status),
		'list_agama' 	=> $list_agama,
		'list_goldar' 	=> $list_goldar,
		'list_stkawin' 	=> $list_stkawin,
		'list_kerja' 	=> $list_kerja,
		'list_hubkel' 	=> $list_hubkel,
		'list_pendidikan' => $list_pendidikan,
		'id_user' => $this->session->userdata('id_user'),
        'nama_user' => $this->session->userdata('nama_user'),
        'jabatan' => $this->session->userdata('jabatan'),
        'nama_desa' => $this->session->userdata('nama_desa'),
		'titlenav' 		=> 'SIMADES || Data Penduduk',
		'title' 		=> 'Data Penduduk',
        'anchor' 		=> 'Edit Penduduk',
        'isi' 			=> 'penduduk/penduduk_form',
	    );
            $this->load->view('layout/wrapper', $data);
            //$this->template->display('penduduk/penduduk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nik_pend', TRUE));
        } else {
        	$nik = $this->input->post('nik_pend',TRUE);
        	$nokk = $this->input->post('nokk',TRUE);
            $data1 = array(
		'nik' 			=> $nik,
		'no_kk' 		=> $nokk,
		'nama_depan' 	=> $this->input->post('nama_depan',TRUE),
		'nama_belakang' => $this->input->post('nama_belakang',TRUE),
		'jekel' 		=> $this->input->post('jekel',TRUE),
        'umur'          => $this->hitung_umur($this->input->post('tanggal_lhr',TRUE)),
		'id_agama' 		=> $this->input->post('id_agama',TRUE),
		'id_goldar' 	=> $this->input->post('id_goldar',TRUE),
		'id_stskawin' 	=> $this->input->post('id_stkawin',TRUE),
		'tempat_lhr' 	=> $this->input->post('tempat_lhr',TRUE),
		'tanggal_lhr' 	=> $this->input->post('tanggal_lhr',TRUE),
		'nama_ayah' 	=> $this->input->post('nama_ayah',TRUE),
		'nama_ibu' 		=> $this->input->post('nama_ibu',TRUE),
		'anak_ke' 		=> $this->input->post('anak_ke',TRUE),
		'id_kerja' 		=> $this->input->post('id_kerja',TRUE),
		'id_hubkel' 	=> $this->input->post('id_hubkel',TRUE),
		'id_pendidikan' => $this->input->post('id_pendidikan',TRUE),
		//'status' 		=> $this->input->post('status',TRUE),
	    );
            $data2 = array(
		'no_kk' 		=> $nokk,
        'alamat' 		=> $this->input->post('alamat',TRUE),
	    'rt' 			=> $this->input->post('rt',TRUE),
	    'rw' 			=> $this->input->post('rw',TRUE),
	    'kelurahan' 	=> $this->input->post('kelurahan',TRUE),
	    'kecamatan' 	=> $this->input->post('kecamatan',TRUE),
	    'kabupaten' 	=> $this->input->post('kabupaten',TRUE),
	    'propinsi' 		=> $this->input->post('propinsi',TRUE),
        );
            //update data tabel penduduk
            $this->Penduduk_model->update($this->input->post('nik_pend', TRUE), $data1);
            //update data tabel KK
            //$this->Kk_model->update($this->input->post('nokk', TRUE), $data2);

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penduduk'));
        }
    }

    public function delete($id)
    {
    	$row = $this->Penduduk_model->get_by_id($id);

        if ($row) {
        	//Hapus data kk
            //$this->Kk_model->delete($id);
        	//Hapus data penduduk
            $this->Penduduk_model->delete($id);

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penduduk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penduduk'));
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

    public function _rulesKK()
    {
    $this->form_validation->set_rules('nokk', 'no kk', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('id_dusun', 'dusun', 'trim|required');
    $this->form_validation->set_rules('rt', 'rt', 'trim|required');
    $this->form_validation->set_rules('rw', 'rw', 'trim|required');
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
    $this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
    $this->form_validation->set_rules('propinsi', 'propinsi', 'trim|required');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules()
    {
    $this->form_validation->set_rules('nik_pend', 'nik', 'trim|required');
	$this->form_validation->set_rules('nokk', 'no kk', 'trim|required');
	$this->form_validation->set_rules('nama_depan', 'nama depan', 'trim|required');
	//$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'trim|required');
	$this->form_validation->set_rules('jekel', 'jekel', 'trim|required');
	$this->form_validation->set_rules('id_agama', 'id agama', 'trim|required');
	$this->form_validation->set_rules('id_goldar', 'id goldar', 'trim|required');
	$this->form_validation->set_rules('id_stkawin', 'id stkawin', 'trim|required');
	$this->form_validation->set_rules('tempat_lhr', 'tempat lhr', 'trim|required');
	$this->form_validation->set_rules('tanggal_lhr', 'tanggal lhr', 'trim|required');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	//$this->form_validation->set_rules('anak_ke', 'anak ke', 'trim|required');
	$this->form_validation->set_rules('id_kerja', 'id kerja', 'trim|required');
	$this->form_validation->set_rules('id_hubkel', 'id hubkel', 'trim|required');
	$this->form_validation->set_rules('id_pendidikan', 'id pendidikan', 'trim|required');
	//$this->form_validation->set_rules('status', 'status', 'trim|required');
	//$this->form_validation->set_rules('nik', 'nik', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Penduduk.php */
/* Location: ./application/controllers/Penduduk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-03 12:39:42 */
/* http://harviacode.com */
