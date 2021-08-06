<?php
class M_produk extends CI_Model
{

    //PRODUK
    public function lihat_produk()
    {
        $this->db->from('tbl_produk');
        return $this->db->get();
    }

    public function detail_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //BAHAN VIEW
    public function lihat_bahan()
    {
        $this->db->from('tbl_bahan');
        //   $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');

        return $this->db->get();
    }

    public function detail_bahan($where, $table)
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get_where($table, $where);
    }

    public function edit_bahan($where, $table)
    {
        // $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get_where($table, $where);
    }

    public function update_bahan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function kategori_produk()
    {
        $this->db->from('tbl_produk');

        return $this->db->get();
    }

    public function lihat_harga_bahan()
    {
        $this->db->from('tbl_harga_bahan');
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');

        return $this->db->get();
    }

    public function edit_harga_bahan($where, $table)
    {
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get_where($table, $where);
    }

    //FINISHING VIEW
    public function lihat_finishing()
    {
        $this->db->from('tbl_finishing');

        return $this->db->get();
    }

    public function detail_finishing($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function edit_finishing($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_finishing($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //LAMINASI VIEW
    public function lihat_laminasi()
    {
        $this->db->from('tbl_laminasi');
        //$this->db->join('tbl_harga_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');

        return $this->db->get();
    }

    public function detail_laminasi($where, $table)
    {
        $this->db->join('tbl_harga_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');

        return $this->db->get_where($table, $where);
    }

    public function edit_laminasi($where, $table)
    {
        // $this->db->join('tbl_harga_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return $this->db->get_where($table, $where);
    }

    public function update_laminasi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function lihat_harga_laminasi()
    {
        $this->db->from('tbl_harga_laminasi');
        $this->db->join('tbl_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');

        return $this->db->get();
    }

    public function edit_harga_laminasi($where, $table)
    {
        $this->db->join('tbl_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return $this->db->get_where($table, $where);
    }

    //USER

    public function tambah_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function detail_user($where, $table)
    {

        return $this->db->get_where($table, $where);
    }

    public function edit_user($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function role()
    {
        return  $this->db->get("tbl_role");
    }

    //REKENING
    public function lihat_rekening()
    {
        $this->db->from('tbl_pembayaran');

        return $this->db->get();
    }

    public function edit_rekening($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_rekening($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    //

    public function tampil_data()
    {
        return $this->db->get('tbl_produk');
    }

    public function tambah_produk($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_produk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_produk', $id)
            ->limit(1)
            ->get('tbl_produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_pdk($id_pdk)
    {
        $result = $this->db->where('id_produk', $id_pdk)->get('tbl_produk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    //JENIS PRODUK
    public function spanduk_indoor()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'spanduk indoor'));
    }

    public function xbanner()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'X-Banner'));
    }

    public function spanduk_outdoor()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'Spanduk Outdoor'));
    }

    public function flyer()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'Flyer'));
    }

    public function brosur()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'brosur'));
    }

    public function kartu_nama()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'kartu nama'));
    }

    public function undangan()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'kartu undangan'));
    }

    public function kalender()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'kalender meja'));
    }

    public function sertifikat()
    {
        return  $this->db->get_where("tbl_produk", array('nama' => 'sertifikat'));
    }

    public function detail_keranjang($id_produk)
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get();
        return $query->row();
    }

    //DETAIL PESANAN

    //SPANDUK
    public function bahan()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'Spanduk'));
    }

    public function harga_bahan($id_bhn)
    {

        $this->db->where('id', $id_bhn);
        $result = $this->db->get('tbl_bahan')->result();
        return $result;
    }


    public function get_hrg_bahan()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }

    public function tampil_bahan()
    {
        $this->db->select('*');
        $this->db->from('tbl_bahan');
        $data = $this->db->get();
        return $data->result();
    }

    public function finishing()
    {
        return  $this->db->get_where("tbl_finishing", array('produk' => 'Spanduk'));
    }

    //X-BANNER

    public function bahan_xbanner()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'x-banner'));
    }

    public function get_hrg_bahan_xbanner()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }


    //SPANDUK OUTDOOR

    public function bahan_spanduk_outdoor()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'spanduk outdoor'));
    }

    public function get_hrg_bahan_spanduk_outdoor()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }


    //FLYER

    public function bahan_flyer()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'flyer'));
    }

    public function get_hrg_bahan_flyer()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }

    public function finishing_flyer()
    {
        return  $this->db->get_where("tbl_finishing", array('produk' => 'Flyer'));
    }

    //BROSUR

    public function bahan_brosur()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'brosur'));
    }

    public function get_hrg_bahan_brosur()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }

    public function finishing_brosur()
    {
        return  $this->db->get_where("tbl_finishing", array('produk' => 'Brosur'));
    }

    public function sisi_brosur()
    {
        return  $this->db->get_where("tbl_sisi", array('produk' => 'Brosur'));
    }

    public function laminasi_brosur()
    {
        return  $this->db->get_where("tbl_laminasi", array('produk' => 'Brosur'));
    }
    public function get_hrg_laminasi_brosur()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return $this->db->get('tbl_harga_laminasi')->result();
    }

    //KARTU NAMA

    public function bahan_kartu_nama()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'Kartu Nama'));
    }

    public function get_hrg_bahan_kartu_nama()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }

    public function sudut_kartu_nama()
    {
        return  $this->db->get_where("tbl_tipe_sudut", array('produk' => 'Kartu Nama'));
    }

    public function sisi_kartu_nama()
    {
        return  $this->db->get_where("tbl_sisi", array('produk' => 'Kartu Nama'));
    }

    public function laminasi_kartu_nama()
    {
        $this->db->join('tbl_harga_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return  $this->db->get_where("tbl_laminasi", array('produk' => 'Kartu Nama'));
    }
    public function get_hrg_laminasi_kartu_nama()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return $this->db->get('tbl_harga_laminasi')->result();
    }

    //UNDANGAN

    public function bahan_undangan()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'Kartu Undangan'));
    }

    public function get_hrg_bahan_undangan()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }

    public function sisi_undangan()
    {
        return  $this->db->get_where("tbl_sisi", array('produk' => 'Kartu Undangan'));
    }

    public function laminasi_undangan()
    {
        $this->db->join('tbl_harga_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return  $this->db->get_where("tbl_laminasi", array('produk' => 'Kartu Undangan'));
    }
    public function get_hrg_laminasi_undangan()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return $this->db->get('tbl_harga_laminasi')->result();
    }

    //KALENDER

    public function bahan_kalender()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'Kalender'));
    }

    public function get_hrg_bahan_kalender()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }

    public function dudukan_kalender()
    {
        return  $this->db->get_where("tbl_finishing", array('produk' => 'Dudukan Kalender'));
    }

    public function finishing_kalender()
    {
        return  $this->db->get_where("tbl_finishing", array('produk' => 'Finishing Kalender'));
    }

    public function finishing_dudukan_kalender()
    {
        return  $this->db->get_where("tbl_finishing", array('produk' => 'Finishing Kalender'));
    }

    public function laminasi_kalender()
    {
        $this->db->join('tbl_harga_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return  $this->db->get_where("tbl_laminasi", array('produk' => 'Kartu Undangan'));
    }
    public function get_hrg_laminasi_kalender()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_laminasi', 'tbl_harga_laminasi.id_laminasi_fk = tbl_laminasi.id');
        return $this->db->get('tbl_harga_laminasi')->result();
    }

    //SERTIFIKAT

    public function bahan_sertifikat()
    {
        $this->db->join('tbl_harga_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return  $this->db->get_where("tbl_bahan", array('produk' => 'sertifikat'));
    }

    public function get_hrg_bahan_sertifikat()
    {
        // kita joinkan tabel bahan dengan harga_bahan
        $this->db->join('tbl_bahan', 'tbl_harga_bahan.id_bhn_fk = tbl_bahan.id');
        return $this->db->get('tbl_harga_bahan')->result();
    }

    public function finishing_sertifikat()
    {
        return  $this->db->get_where("tbl_laminasi", array('produk' => 'Sertifikat'));
    }
}
