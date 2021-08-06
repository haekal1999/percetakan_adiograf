<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PesanModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//SPANDUK
	public function simpan_spanduk($data)
	{
		$this->db->insert('pesan_spanduk_indoor', $data);
		return $this->db->affected_rows();
	}
	public function lihat_spanduk_by_id($id)
	{
		$this->db->where('spanduk_id', $id);
		return $this->db->get('pesan_spanduk_indoor')->row_array();
	}

	//XBANNER
	public function simpan_xbanner($data)
	{
		$this->db->insert('pesan_xbanner', $data);
		return $this->db->affected_rows();
	}
	public function lihat_xbanner_by_id($id)
	{
		$this->db->where('xbanner_id', $id);
		return $this->db->get('pesan_xbanner')->row_array();
	}

	//SPANDUK OUTDOOR
	public function simpan_spanduk_outdoor($data)
	{
		$this->db->insert('pesan_spanduk_outdoor', $data);
		return $this->db->affected_rows();
	}
	public function lihat_spanduk_outdoor_by_id($id)
	{
		$this->db->where('spanduk_outdoor_id', $id);
		return $this->db->get('pesan_spanduk_outdoor')->row_array();
	}

	//FLYER
	public function simpan_flyer($data)
	{
		$this->db->insert('pesan_flyer', $data);
		return $this->db->affected_rows();
	}
	public function lihat_flyer_by_id($id)
	{
		$this->db->where('flyer_id', $id);
		return $this->db->get('pesan_flyer')->row_array();
	}

	//BROSUR
	public function simpan_brosur($data)
	{
		$this->db->insert('pesan_brosur', $data);
		return $this->db->affected_rows();
	}
	public function lihat_brosur_by_id($id)
	{
		$this->db->where('brosur_id', $id);
		return $this->db->get('pesan_brosur')->row_array();
	}

	//SERTIFIKAT
	public function simpan_sertifikat($data)
	{
		$this->db->insert('pesan_sertifikat', $data);
		return $this->db->affected_rows();
	}
	public function lihat_sertifikat_by_id($id)
	{
		$this->db->where('sertifikat_id', $id);
		return $this->db->get('pesan_sertifikat')->row_array();
	}

	//UNDANGAN
	public function simpan_kartu_undangan($data)
	{
		$this->db->insert('pesan_kartu_undangan', $data);
		return $this->db->affected_rows();
	}
	public function lihat_kartu_undangan_by_id($id)
	{
		$this->db->where('undangan_id', $id);
		return $this->db->get('pesan_kartu_undangan')->row_array();
	}
	//KARTU NAMA
	public function simpan_kartu_nama($data)
	{
		$this->db->insert('pesan_kartu_nama', $data);
		return $this->db->affected_rows();
	}
	public function lihat_kartu_nama_by_id($id)
	{
		$this->db->where('kartu_nama_id', $id);
		return $this->db->get('pesan_kartu_nama')->row_array();
	}
	//KALENDER
	public function simpan_kalender($data)
	{
		$this->db->insert('pesan_kalender', $data);
		return $this->db->affected_rows();
	}
	public function lihat_kalender_by_id($id)
	{
		$this->db->where('kalender_id', $id);
		return $this->db->get('pesan_kalender')->row_array();
	}
	//


	public function delete($key, $id, $table)
	{
		$this->db->where($key, $id);
		return $this->db->delete($table);
	}
	public function lihat_desain($table, $key, $id)
	{
		$this->db->where($key, $id);
		return $this->db->get($table)->row_array();
	}
	public function simpan($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
	}
	public function update($table, $key, $id, $data)
	{
		$this->db->where($key, $id);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
}
