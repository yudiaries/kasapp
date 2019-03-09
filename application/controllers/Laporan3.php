<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan3 extends CI_Controller {
	public function __construct()
    {
    	parent::__construct();
		$this->load->model('M_index');
    	$this->load->model('M_hutang');
    	$this->load->model('M_piutang');
    	$this->load->model('M_masuk');
    	$this->load->model('M_keluar');
    }
    function index()
	{
		if ($this->session->userdata('username')) {
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('laporan/rekap_laporan');
			$this->load->view('template/footer');
		}else{
			redirect(base_url());
		}
	}
	function laporan_periode3()
	{
		if ($this->session->userdata('username')) {
			if (!$this->uri->segment(3) && !$this->uri->segment(4)){
				$tgl_mulai = str_replace('/','-',$this->input->post('tgl_mulai'));
				$tgl_sampai = str_replace('/','-',$this->input->post('tgl_sampai'));
			}else{
				$tgl_mulai = $this->uri->segment(3);
				$tgl_sampai = $this->uri->segment(4);
			}
			$tgl_mulai_db = str_replace('-','/',$tgl_mulai);
			$tgl_sampai_db = str_replace('-','/',$tgl_sampai);
			$total = $this->M_index->row_periode($tgl_mulai_db, $tgl_sampai_db);
			$total = $this->M_index->row_periode2($tgl_mulai_db, $tgl_sampai_db);
			$config['base_url'] 		= base_url().'laporan2/laporan_periode2/'.$tgl_mulai.'/'.$tgl_sampai;
			$config['total_rows'] 		= $total;
			$config['per_page'] 		= 10;
	        $config['full_tag_open']    = '<div><ul class="pagination">';
	        $config['full_tag_close']   = '</ul></div>';
        	$config['first_link']       = '<li class="page-item page-link">Awal</li>';
        	$config['last_link']        = '<li class="page-item page-link">Akhir</li>';
	        $config['prev_link']        = '&laquo';
	        $config['prev_tag_open']    = '<li class="page-item page-link">';
	        $config['prev_tag_close']   = '</li>';
	        $config['next_link']        = '&raquo';
	        $config['next_tag_open']    = '<li class="page-item page-link">';
	        $config['next_tag_close']   = '</li>';
	        $config['cur_tag_open']     = '<li class="page-item page-link">';
	        $config['cur_tag_close']    = '</li>';
	        $config['num_tag_open']     = '<li class="page-item page-link">';
	        $config['num_tag_close']    = '</li>';
			$this->pagination->initialize($config);
			$from = $this->uri->segment(5);
			$data = array(
				'tgl_mulai' 	=> $tgl_mulai_db,
				'tgl_sampai'	=> $tgl_sampai_db,
				'ttl_hutang'	=> $this->M_hutang->total_periode_hutang($tgl_mulai,$tgl_sampai),
				'ttl_piutang'	=> $this->M_piutang->total_periode_piutang($tgl_mulai,$tgl_sampai),
				'ttl_masuk'		=> $this->M_masuk->total_periode_masuk($tgl_mulai,$tgl_sampai),
				'ttl_keluar'	=> $this->M_keluar->total_periode_keluar($tgl_mulai,$tgl_sampai),
				'halaman' 		=> $this->pagination->create_links(),
				'result' 		=> $this->M_index->laporan_periode2($tgl_mulai_db, $tgl_sampai_db, $config['per_page'], $from),
				'result1' 		=> $this->M_index->laporan_periode($tgl_mulai_db, $tgl_sampai_db, $config['per_page'], $from)
			);
			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('laporan/laporan_periode3',$data);
			$this->load->view('template/footer');
		}else{
			redirect(base_url());
		}
	}
	function cetak(){
		$this->load->library('Pdf');
	}
}