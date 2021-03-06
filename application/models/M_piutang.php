<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_piutang extends CI_Model {
	function tambah_piutangmasuk($data)
	{
		$query = $this->db->insert('data1', $data);
		return $query;
	}
	function nomor()
	{
		$this->db->select('nomor');
		$this->db->order_by('nomor DESC');
		$query = $this->db->get('data1');
		return $query->result_array();
	}
    function ambil_data($nomor)
    {
        $this->db->where('nomor', $nomor);
        $query = $this->db->get('data1');
        return $query->result_array();
    }
	function row_piutang(){
    	$this->db->where('jenis', 'piutang');
        $query = $this->db->get('data1');
        return $query->num_rows();
    }
    function piutang($number, $offset){
		$this->db->where('jenis', 'piutang');
        $this->db->order_by('nomor DESC');
        $query = $this->db->get('data1',$number,$offset);
        return $query->result();
    }
    function total_piutang()
    {
    	$this->db->select('jumlah');
    	$this->db->from('data1');
    	$this->db->where('jenis', 'piutang');
    	$query = $this->db->get();
    	return $query->result();
    }
     function total_harian_piutang($tanggal)
    {
    	$this->db->select('jumlah');
    	$this->db->from('data1');
    	$this->db->where('tanggal', $tanggal);
    	$this->db->where('jenis','piutang');
    	$query = $this->db->get();
    	return $query->result();
    }
    function total_periode_piutang($mulai, $sampai)
    {
        $this->db->select('jumlah');
        $this->db->from('data1');
        $this->db->where('tanggal >=', $mulai);
        $this->db->where('tanggal <=', $sampai);
        $this->db->where('jenis', 'piutang');
        $query = $this->db->get();
        return $query->result();
    }
       function ubah($nomor, $data)
    {
        $this->db->where('nomor', $nomor);
        $query = $this->db->update('data1', $data);
        return $query;
    }

    function hapus($nomor)
    {
        $this->db->where('nomor', $nomor);
        $query = $this->db->delete('data1');
        return $query;
    }
}
