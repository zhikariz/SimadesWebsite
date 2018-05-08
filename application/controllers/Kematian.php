<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kematian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kematian_model');
        $this->load->model('Layanan_model');
        $this->load->model('Penduduk_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $c = urldecode($this->input->get('c', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'kematian/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kematian/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kematian/index.html';
            $config['first_url'] = base_url() . 'kematian/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kematian_model->total_rows($q);
        $kematian = $this->Kematian_model->get_limit_data($config['per_page'], $start, $c, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kematian_data' => $kematian,
            'q' => $q,
            'c' => $c,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'titlenav' => 'SIMADES || Data Kematian',
            'title' => 'Data Kematian',
            'anchor' => 'Daftar Kematian',
            'isi' => 'kematian/kematian_list',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function read($id)
    {
        $row = $this->Kematian_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mati' => $row->id_mati,
		'nik_meninggal' => $row->nik_meninggal,
		'tgl_meninggal' => $row->tgl_meninggal,
		'sebab' => $row->sebab,
		'tpt_meninggal' => $row->tpt_meninggal,
		'nik_ayah' => $row->nik_ayah,
		'nik_ibu' => $row->nik_ibu,
		'nik_pelapor' => $row->nik_pelapor,
		'nik_saksi1' => $row->nik_saksi1,
		'nik_saksi2' => $row->nik_saksi2,
	    'titlenav' => 'SIMADES || Data Kematian',
        'title' => 'Data Kematian',
        'anchor' => 'Detail Kematian',
        'isi' => 'kematian/kematian_read',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kematian'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Tambah',
            'action' => site_url('kematian/create_action'),
	    'id_mati' => set_value('id_mati'),
	    'nik_meninggal' => set_value('nik_meninggal'),
        'no_kk' => set_value('no_kk'),
        'nama_depan' => set_value('nama_depan'),
        'nama_belakang' => set_value('nama_belakang'),
        'jekel' => set_value('jekel'),
        'tempat_lhr' => set_value('tempat_lhr'),
        'tanggal_lhr' => set_value('tanggal_lhr'),
        'agama' => set_value('agama'),
        'kerja' => set_value('kerja'),
        'alamat' => set_value('alamat'),

	    'tgl_meninggal' => set_value('tgl_meninggal'),
	    'sebab' => set_value('sebab'),
	    'tpt_meninggal' => set_value('tpt_meninggal'),
        'menerangkan' => set_value('menerangkan'),

        'titlenav' => 'SIMADES || Data Kematian',
        'title' => 'Data Kematian',
        'anchor' => 'Tambah Data Kematian',
        'isi' => 'kematian/kematian_form_1',
        );
        $this->load->view('layout/wrapper', $data);
    }

    public function create2()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $no_kk = $this->input->post('no_kk');
            $data_ayah = $this->Penduduk_model->get_ayah($this->input->post('nik_meninggal',TRUE), $no_kk);
            $data_ibu = $this->Penduduk_model->get_ibu($this->input->post('nik_meninggal',TRUE), $no_kk);
            $data = array(
                'button' => 'Tambah',
                'action' => site_url('kematian/create_action'),
            'id_mati' => set_value('id_mati', $this->input->post('id_mati',TRUE)),
            'nik_meninggal' => set_value('nik_meninggal', $this->input->post('nik_meninggal',TRUE)),

            'tgl_meninggal' => set_value('tgl_meninggal', $this->input->post('tgl_meninggal',TRUE)),
            'sebab' => set_value('sebab', $this->input->post('sebab',TRUE)),
            'tpt_meninggal' => set_value('tpt_meninggal', $this->input->post('tpt_meninggal',TRUE)),
            'menerangkan' => set_value('menerangkan', $this->input->post('menerangkan',TRUE)),

            'nik_ayah' => set_value('nik_ayah', $data_ayah->nik),
            'no_kk_ayah' => set_value('no_kk_ayah', $data_ayah->no_kk),
            'nama_depan_ayah' => set_value('nama_depan_ayah', $data_ayah->nama_depan),
            'nama_belakang_ayah' => set_value('nama_belakang_ayah', $data_ayah->nama_belakang),
            'jekel_ayah' => set_value('jekel_ayah', $data_ayah->jekel),
            'tempat_lhr_ayah' => set_value('tempat_lhr_ayah', $data_ayah->tempat_lhr),
            'tanggal_lhr_ayah' => set_value('tanggal_lhr_ayah', $data_ayah->tanggal_lhr),
            'agama_ayah' => set_value('jekel_ayah', $data_ayah->agama),
            'kerja_ayah' => set_value('kerja_ayah', $data_ayah->kerja),
            'alamat_ayah' => set_value('alamat_ayah', $data_ayah->alamat.", RT ".$data_ayah->rt."/RW ".$data_ayah->rw.", Kel. ".$data_ayah->kelurahan.", Kec. ".$data_ayah->kecamatan.", Kab. ".$data_ayah->kabupaten),

            'nik_ibu' => set_value('nik_ibu', $data_ibu->nik),
            'no_kk_ibu' => set_value('no_kk_ibu', $data_ibu->no_kk),
            'nama_depan_ibu' => set_value('nama_depan_ibu', $data_ibu->nama_depan),
            'nama_belakang_ibu' => set_value('nama_belakang_ibu', $data_ibu->nama_belakang),
            'jekel_ibu' => set_value('jekel_ibu', $data_ibu->jekel),
            'tempat_lhr_ibu' => set_value('tempat_lhr_ibu', $data_ibu->tempat_lhr),
            'tanggal_lhr_ibu' => set_value('tanggal_lhr_ibu', $data_ibu->tanggal_lhr),
            'agama_ibu' => set_value('jekel_ibu', $data_ibu->agama),
            'kerja_ibu' => set_value('kerja_ibu', $data_ibu->kerja),
            'alamat_ibu' => set_value('alamat_ibu', $data_ibu->alamat.", RT ".$data_ibu->rt."/RW ".$data_ibu->rw.", Kel. ".$data_ibu->kelurahan.", Kec. ".$data_ibu->kecamatan.", Kab. ".$data_ibu->kabupaten),

            'nik_pelapor' => set_value('nik_pelapor'),
            'no_kk_pelapor' => set_value('no_kk_pelapor'),
            'nama_depan_pelapor' => set_value('nama_depan_pelapor'),
            'nama_belakang_pelapor' => set_value('nama_belakang_pelapor'),
            'jekel_pelapor' => set_value('jekel_pelapor'),
            'tempat_lhr_pelapor' => set_value('tempat_lhr_pelapor'),
            'tanggal_lhr_pelapor' => set_value('tanggal_lhr_pelapor'),
            'agama_pelapor' => set_value('agama_pelapor'),
            'kerja_pelapor' => set_value('kerja_pelapor'),
            'alamat_pelapor' => set_value('alamat_pelapor'),

            'nik_saksi1' => set_value('nik_saksi1'),
            'no_kk_saksi1' => set_value('no_kk_saksi1'),
            'nama_depan_saksi1' => set_value('nama_depan_saksi1'),
            'nama_belakang_saksi1' => set_value('nama_belakang_saksi1'),
            'jekel_saksi1' => set_value('jekel_saksi1'),
            'tempat_lhr_saksi1' => set_value('tempat_lhr_saksi1'),
            'tanggal_lhr_saksi1' => set_value('tanggal_lhr_saksi1'),
            'agama_saksi1' => set_value('agama_saksi1'),
            'kerja_saksi1' => set_value('kerja_saksi1'),
            'alamat_saksi1' => set_value('alamat_saksi1'),

            'nik_saksi2' => set_value('nik_saksi2'),
            'no_kk_saksi2' => set_value('no_kk_saksi2'),
            'nama_depan_saksi2' => set_value('nama_depan_saksi2'),
            'nama_belakang_saksi2' => set_value('nama_belakang_saksi2'),
            'jekel_saksi2' => set_value('jekel_saksi2'),
            'tempat_lhr_saksi2' => set_value('tempat_lhr_saksi2'),
            'tanggal_lhr_saksi2' => set_value('tanggal_lhr_saksi2'),
            'agama_saksi2' => set_value('agama_saksi2'),
            'kerja_saksi2' => set_value('kerja_saksi2'),
            'alamat_saksi2' => set_value('alamat_saksi2'),

            'titlenav' => 'SIMADES || Data Kematian',
            'title' => 'Data Kematian',
            'anchor' => 'Tambah Data Kematian',
            'isi' => 'kematian/kematian_form_2',
            );
            $this->load->view('layout/wrapper', $data);
        }
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            //$data_meninggal = $this->Penduduk_model->get_by_id($row->nik_meninggal);
            $cek_nik = $this->Penduduk_model->get_data('kematian', 'nik_meninggal', $this->input->post('nik_meninggal',TRUE));
            if(!$cek_nik)
            {
                    $data = array(
                'nik_meninggal' => $this->input->post('nik_meninggal',TRUE),
        		'tgl_meninggal' => $this->input->post('tgl_meninggal',TRUE),
        		'sebab' => $this->input->post('sebab',TRUE),
        		'tpt_meninggal' => $this->input->post('tpt_meninggal',TRUE),
                'menerangkan' => $this->input->post('menerangkan',TRUE),

        	    );
                    $data_layanan = array (
                'nik'   => $this->input->post('nik_meninggal',TRUE),
                'id_user'   => $this->session->userdata('id_user'),
                'waktu_layanan' => date('Y-m-d h:i:s'),
                'nama_layanan' => 'Mutasi Kematian',
                );
                    $data_pend = array(
                'status' => 'MM',
                'tgl_mutasi' => date('Y-m-d'),
                );

                $this->Penduduk_model->update($this->input->post('nik_meninggal',TRUE), $data_pend);
                $this->Layanan_model->insert($data_layanan);
                $this->Kematian_model->insert($data);

                $this->session->set_flashdata('message', '!!TAMBAH DATA SUKSES!!');
                redirect(site_url('kematian'));
            } else{
                $this->session->set_flashdata('message', 'NIK meninggal '.$this->input->post('nik_meninggal',TRUE).' sudah ada');
                redirect(site_url('kematian/create'));
            }

        }
    }

    public function update($id)
    {
        $row = $this->Kematian_model->get_by_id($id);

        if ($row) {
            $data_meninggal = $this->Penduduk_model->get_by_id($row->nik_meninggal);
            $data_ayah = $this->Penduduk_model->get_by_id($row->nik_ayah);
            $data_ibu = $this->Penduduk_model->get_by_id($row->nik_ibu);
            $data_pelapor = $this->Penduduk_model->get_by_id($row->nik_pelapor);
            $data_saksi1 = $this->Penduduk_model->get_by_id($row->nik_saksi1);
            $data_saksi2 = $this->Penduduk_model->get_by_id($row->nik_saksi2);

            $data = array(
                'button' => 'Edit',
                'action' => site_url('kematian/update_action'),
		'id_mati' => set_value('id_mati', $row->id_mati),
		'nik_meninggal' => set_value('nik_meninggal', $row->nik_meninggal),
        'no_kk' => set_value('no_kk', $data_meninggal->no_kk),
        'nama_depan' => set_value('nama_depan', $data_meninggal->nama_depan),
        'nama_belakang' => set_value('nama_belakang', $data_meninggal->nama_belakang),
        'jekel' => set_value('jekel', $data_meninggal->jekel),
        'tempat_lhr' => set_value('tempat_lhr', $data_meninggal->tempat_lhr),
        'tanggal_lhr' => set_value('tanggal_lhr', $this->tgl_indo($data_meninggal->tanggal_lhr)),
        'agama' => set_value('agama', $data_meninggal->agama),
        'kerja' => set_value('kerja', $data_meninggal->kerja),
        'alamat' => set_value('alamat', $data_meninggal->alamat.", RT ".$data_meninggal->rt."/RW ".$data_meninggal->rw.", Kel. ".$data_meninggal->kelurahan.", Kec. ".$data_meninggal->kecamatan.", Kab. ".$data_meninggal->kabupaten),

		'tgl_meninggal' => set_value('tgl_meninggal', $row->tgl_meninggal),
		'sebab' => set_value('sebab', $row->sebab),
		'tpt_meninggal' => set_value('tpt_meninggal', $row->tpt_meninggal),
        'menerangkan' => set_value('menerangkan', $row->menerangkan),


	    'titlenav' => 'SIMADES || Data Kematian',
        'title' => 'Data Kematian',
        'anchor' => 'Edit Data Kematian',
        'isi' => 'kematian/kematian_form_1',
        );
            $this->load->view('layout/wrapper', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kematian'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mati', TRUE));
        } else {
            $data = array(
		'nik_meninggal' => $this->input->post('nik_meninggal',TRUE),
		'tgl_meninggal' => $this->input->post('tgl_meninggal',TRUE),
		'sebab' => $this->input->post('sebab',TRUE),
		'tpt_meninggal' => $this->input->post('tpt_meninggal',TRUE),
        'menerangkan' => $this->input->post('menerangkan', TRUE),

	    );

            $this->Kematian_model->update($this->input->post('id_mati', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kematian'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kematian_model->get_by_id($id);

        if ($row) {
            $this->Kematian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kematian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kematian'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nik_meninggal', 'nik meninggal', 'trim|required');
	$this->form_validation->set_rules('tgl_meninggal', 'tgl meninggal', 'trim|required');
	$this->form_validation->set_rules('sebab', 'sebab', 'trim|required');
	$this->form_validation->set_rules('tpt_meninggal', 'tpt meninggal', 'trim|required');

	//$this->form_validation->set_rules('id_mati', 'id_mati', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules2()
    {
    $this->form_validation->set_rules('nik_meninggal', 'nik meninggal', 'trim|required');
    $this->form_validation->set_rules('tgl_meninggal', 'tgl meninggal', 'trim|required');
    $this->form_validation->set_rules('sebab', 'sebab', 'trim|required');
    $this->form_validation->set_rules('tpt_meninggal', 'tpt meninggal', 'trim|required');
    $this->form_validation->set_rules('nik_ayah', 'nik ayah', 'trim|required');
    $this->form_validation->set_rules('nik_ibu', 'nik ibu', 'trim|required');
    $this->form_validation->set_rules('nik_pelapor', 'nik pelapor', 'trim|required');
    $this->form_validation->set_rules('nik_saksi1', 'nik saksi1', 'trim|required');
    $this->form_validation->set_rules('nik_saksi2', 'nik saksi2', 'trim|required');

    $this->form_validation->set_rules('id_mati', 'id_mati', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
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

/* End of file Kematian.php */
/* Location: ./application/controllers/Kematian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-04-16 05:46:14 */
/* http://harviacode.com */
