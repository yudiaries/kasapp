<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hutang extends CI_Model {
	function nomor()
	{
		$this->db->select('nomor');
		$this->db->order_by('nomor DESC');
		$query = $this->db->get('data1');
		return $query->result_array();
	}
	function tambah_hutangkeluar($data)
	{
		$query = $this->db->insert('data1', $data);
		return $query;
	}
	 function row_hutang(){
    	$this->db->where('jenis', 'hutang');
        $query = $this->db->get('data1');
        return $query->num_rows();
    }

	function hutang($number, $offset){
		$this->db->where('jenis', 'hutang');
        $this->db->order_by('nomor DESC');
        $query = $this->db->get('data1', $number, $offset);
        return $query->result();
    }
    function hapus($nomor)
    {
        $this->db->where('nomor', $nomor);
        $query = $this->db->delete('data1');
        return $query;
    }
    function total_hutang()
    {
    	$this->db->select('jumlah');
    	$this->db->from('data1');
    	$this->db->where('jenis', 'hutang');
    	$query = $this->db->get();
    	return $query->result();
    }
    function total_harian_hutang($tanggal)
    {
    	$this->db->select('jumlah');
    	$this->db->from('data1');
    	$this->db->where('tanggal', $tanggal);
    	$this->db->where('jenis','hutang');
    	$query = $this->db->get();
    	return $query->result();
    }

    function total_periode_hutang($mulai, $sampai)
    {
    	$this->db->select('jumlah');
    	$this->db->from('data1');
		$this->db->where('tanggal >=', $mulai);
		$this->db->where('tanggal <=', $sampai);
    	$this->db->where('jenis', 'hutang');
    	$query = $this->db->get();
    	return $query->result();
    }
}
