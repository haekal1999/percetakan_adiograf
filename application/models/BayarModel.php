<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BayarModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function lihat_keranjang()
	{
		$this->db->from('tbl_keranjang');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function lihat_keranjang_by_id($id)
	{
		$this->db->from('tbl_keranjang');
		$this->db->where('keranjang_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function lihat_keranjang_status1($pengguna_id)
	{
		$this->db->from('tbl_keranjang');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_status', 'belum');
		return $this->db->get();
	}

	public function lihat_keranjang_status($pengguna_id, $status)
	{
		$this->db->from('tbl_keranjang');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}

	public function lihat_keranjang_status_selesai($pengguna_id, $status, $id)
	{
		$this->db->from('tbl_keranjang');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_status', $status);
		$this->db->where('keranjang_id', $id);
		return $this->db->get();
	}
	public function lihat_keranjang_spanduk($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_spanduk_indoor');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_spanduk_indoor.spanduk_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_spanduk_indoor.spanduk_bahan');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}
	public function lihat_keranjang_xbanner($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_xbanner');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_xbanner.xbanner_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_xbanner.xbanner_bahan');

		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}
	public function lihat_keranjang_spanduk_outdoor($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_spanduk_outdoor');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_spanduk_outdoor.spanduk_outdoor_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_spanduk_outdoor.spanduk_outdoor_bahan');

		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}
	public function lihat_keranjang_flyer($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_flyer');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_flyer.flyer_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_flyer.flyer_bahan');

		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}

	public function lihat_keranjang_brosur($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_brosur');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_brosur.brosur_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_brosur.brosur_bahan');
		$this->db->join('tbl_laminasi', 'tbl_laminasi.id = pesan_brosur.brosur_laminasi');

		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}

	public function lihat_keranjang_kartu_nama($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_kartu_nama');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_kartu_nama.kartu_nama_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_kartu_nama.kartu_nama_bahan');
		$this->db->join('tbl_laminasi', 'tbl_laminasi.id = pesan_kartu_nama.kartu_nama_laminasi');

		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}

	public function lihat_keranjang_sertifikat($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_sertifikat');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_sertifikat.sertifikat_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_sertifikat.sertifikat_bahan');
		$this->db->join('tbl_laminasi', 'tbl_laminasi.id = pesan_sertifikat.sertifikat_laminasi');

		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}

	public function lihat_keranjang_kartu_undangan($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_kartu_undangan');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_kartu_undangan.undangan_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_kartu_undangan.undangan_bahan');
		$this->db->join('tbl_laminasi', 'tbl_laminasi.id = pesan_kartu_undangan.undangan_laminasi');

		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}

	public function lihat_keranjang_kalender($pengguna_id, $status, $keranjang_id)
	{
		$this->db->from('pesan_kalender');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_kalender.kalender_bahan');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_kalender.kalender_keranjang_id');
		$this->db->join('tbl_laminasi', 'tbl_laminasi.id = pesan_kalender.kalender_laminasi');


		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('keranjang_id', $keranjang_id);
		$this->db->where('keranjang_status', $status);
		return $this->db->get();
	}

	public function lihat_keranjang_spanduk_admin($status, $tanggal)
	{
		$this->db->from('pesan_spanduk');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_spanduk.spanduk_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}
	public function lihat_keranjang_xbanner_admin($status, $tanggal)
	{
		$this->db->from('pesan_xbanner');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_xbanner.xbanner_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}
	public function lihat_keranjang_spanduk_outdoor_admin($status, $tanggal)
	{
		$this->db->from('pesan_spanduk_outdoor');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_spanduk_outdoor.spanduk_outdoor_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}
	public function lihat_keranjang_flyer_admin($status, $tanggal)
	{
		$this->db->from('pesan_flyer');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_flyer.flyer_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}

	public function lihat_keranjang_brosur_admin($status, $tanggal)
	{
		$this->db->from('pesan_brosur');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_brosur.brosur_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}
	public function lihat_keranjang_kartu_nama_admin($status, $tanggal)
	{
		$this->db->from('pesan_kartu_nama');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_kartu_nama.kartu_nama_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}
	public function lihat_keranjang_kalender_admin($status, $tanggal)
	{
		$this->db->from('pesan_kalender');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_kalender.kalender_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}
	public function lihat_keranjang_kartu_undangan_admin($status, $tanggal)
	{
		$this->db->from('pesan_kartu_undangan');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_kartu_undangan.undangan_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}
	public function lihat_keranjang_sertifikat_admin($status, $tanggal)
	{
		$this->db->from('pesan_sertifikat');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_sertifikat.sertifikat_keranjang_id');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->like('faktur_date_created', $tanggal);
		$this->db->where('keranjang_status', $status);
		$this->db->where('faktur_status', 'sudah');
		return $this->db->get();
	}

	public function lihat_keranjang_faktur($pengguna_id)
	{
		$this->db->from('tbl_keranjang');
		$this->db->order_by('keranjang_date_created', 'DESC');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		return $this->db->get();
	}
	public function lihat_keranjang_faktur_admin()
	{
		//PENENTUAN PRIORITAS
		$this->db->from('tbl_keranjang');

		$this->db->order_by('deadline_pesanan', 'ASC');
		$this->db->order_by('faktur_date_created', 'ASC');
		$this->db->order_by('keranjang_total', 'ASC');

		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		return $this->db->get();
	}


	public function lihat_keranjang_faktur_admin_by_id($id)
	{
		$this->db->from('tbl_keranjang');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->where('faktur_id', $id);
		return $this->db->get();
	}
	public function lihat_keranjang_faktur_konfirmasi_admin_by_id($id)
	{
		$this->db->from('tbl_keranjang');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');
		$this->db->join('tbl_konfirmasi', 'tbl_konfirmasi.konfirmasi_faktur_id = tbl_faktur.faktur_id');
		$this->db->where('faktur_id', $id);
		return $this->db->get();
	}
	public function lihat_keranjang_faktur_by_id($id, $pengguna_id)
	{
		$this->db->from('tbl_keranjang');
		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->where('keranjang_pengguna_id', $pengguna_id);
		$this->db->where('faktur_id', $id);
		return $this->db->get();
	}
	public function simpan_keranjang($data)
	{
		$this->db->insert('tbl_keranjang', $data);
		return $this->db->affected_rows();
	}
	public function update_keranjang($id, $data)
	{
		$this->db->where('keranjang_id', $id);
		$this->db->update('tbl_keranjang', $data);
		return $this->db->affected_rows();
	}
	public function simpan_faktur($data)
	{
		$this->db->insert('tbl_faktur', $data);
		return $this->db->affected_rows();
	}
	public function update_faktur($id, $data)
	{
		$this->db->where('faktur_id', $id);
		$this->db->update('tbl_faktur', $data);
		return $this->db->affected_rows();
	}
	public function simpan_konfirmasi($data)
	{
		$this->db->insert('tbl_konfirmasi', $data);
		return $this->db->affected_rows();
	}


	public function notif_keranjang($id)
	{
		$this->db->from('pesan_spanduk_indoor');
		$this->db->join('tbl_keranjang', 'tbl_keranjang.keranjang_id = pesan_spanduk_indoor.spanduk_keranjang_id');
		$this->db->join('tbl_bahan', 'tbl_bahan.id = pesan_spanduk_indoor.spanduk_bahan');
		$this->db->where('keranjang_pengguna_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function edit_konfirmasi($id)
	{
		$this->db->select('*');
		return $this->db->get_where('tbl_konfirmasi', $id);
	}

	public function update_konfirmasi($data_konfirmasi, $where)
	{
		$this->db->update('tbl_konfirmasi', $data_konfirmasi, $where);
	}

	//ANTRIAN SATU
	public function lihat_antrian_keranjang_faktur_admin()
	{
		$nominal = "500000";
		$this->db->from('tbl_keranjang');
		$this->db->order_by('keranjang_date_created', 'ASC');
		$this->db->where('keranjang_total <', $nominal);
		$this->db->where('faktur_status', 'tunggu');

		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');

		return $this->db->get();
	}

	public function lihat_antrian2_keranjang_faktur_admin()
	{
		$nominal = "500000";
		$this->db->from('tbl_keranjang');
		$this->db->order_by('keranjang_date_created', 'ASC');
		$this->db->where('keranjang_total >', $nominal);
		$this->db->where('faktur_status', 'tunggu');

		$this->db->join('tbl_faktur', 'tbl_faktur.faktur_keranjang_id = tbl_keranjang.keranjang_id');
		$this->db->join('tb_user', 'tb_user.id = tbl_keranjang.keranjang_pengguna_id');

		return $this->db->get();
	}

	//OPERATOR
	public function update_status_faktur($id, $data1)
	{
		$this->db->where('faktur_id', $id);
		$this->db->update('tbl_faktur', $data1);
		return $this->db->affected_rows();
	}
	public function update_status($data_status, $where)
	{
		$this->db->update('tbl_faktur', $data_status, $where);
	}

	//USER
	public function lihat_user()
	{
		$this->db->from('tb_user');

		return $this->db->get();
	}

	public function edit_user($id)
	{
		$this->db->select('*');
		return $this->db->get_where('tb_user', $id);
	}

	public function update_user($data_user, $where)
	{
		$this->db->update('tb_user', $data_user, $where);
	}

	//REKENING PEMBAYARAN

	public function lihat_rekening()
	{
		return  $this->db->get("tbl_pembayaran");
	}

	public function lihat_rekening_bank($bank)
	{
		$this->db->select('*');
		return  $this->db->get_where("tbl_pembayaran", $bank);
	}
}
