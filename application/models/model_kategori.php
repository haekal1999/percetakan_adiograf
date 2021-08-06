<?php
class Model_kategori extends CI_Model
{
    public function data_spanduk()
    {
        return  $this->db->get_where("tbl_produk", array('kategori' => 'spanduk'));
    }

    public function data_brosur()
    {
        return  $this->db->get_where("tbl_produk", array('kategori' => 'brosur'));
    }

    public function data_kartu_undangan()
    {
        return  $this->db->get_where("tbl_produk", array('kategori' => 'kartu undangan'));
    }
}
