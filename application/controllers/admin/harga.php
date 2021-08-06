<?php
class Harga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Anda belum login ! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
            redirect('auth/login');
        }
    }

    public function harga_bahan()
    {

        $data = array(
            'bahan' => $this->m_produk->lihat_harga_bahan()->result_array()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/harga/harga_bahan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_harga_bahan()
    {
        $id_bhn = $this->input->post('id_bahan');
        $harga = $this->input->post('harga');

        $data = array(
            'id_bhn_fk' => $id_bhn,
            'harga' => $harga,


        );
        $this->m_produk->tambah_produk($data, "tbl_harga_bahan");
        redirect('admin/harga/harga_bahan');
    }

    public function edit_harga_bahan($id)
    {
        $where = array('id' => $id);
        $data['bahan'] = $this->m_produk->edit_harga_bahan($where, 'tbl_harga_bahan')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/harga/edit_harga_bahan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_harga_bahan()
    {
        $id = $this->input->post('id');
        $id_bhn = $this->input->post('id_bahan');
        $harga = $this->input->post('harga');


        $data = array(

            'id_bhn_fk' => $id_bhn,
            'harga' => $harga,
        );
        $where = array(
            'id_hrg_bahan' => $id
        );
        $this->m_produk->update_bahan($where, $data, 'tbl_harga_bahan');
        redirect('admin/harga_bahan');
    }

    public function hapus_harga_bahan($id)
    {
        $where = array('id_hrg_bahan' => $id);
        $this->m_produk->hapus_data($where, 'tbl_harga_bahan');
        redirect('admin/harga_bahan');
    }


    public function harga_laminasi()
    {

        $data = array(
            'laminasi' => $this->m_produk->lihat_harga_laminasi()->result_array()
        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/harga/harga_laminasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_harga_laminasi()
    {
        $id_laminasi = $this->input->post('id_laminasi');
        $harga = $this->input->post('harga');

        $data = array(
            'id_laminasi_fk' => $id_laminasi,
            'harga' => $harga,


        );
        $this->m_produk->tambah_produk($data, "tbl_harga_laminasi");
        redirect('admin/harga/harga_laminasi');
    }

    public function edit_harga_laminasi($id)
    {
        $where = array('id' => $id);
        $data['laminasi'] = $this->m_produk->edit_harga_laminasi($where, 'tbl_harga_laminasi')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/harga/edit_harga_laminasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_harga_laminasi()
    {
        $id = $this->input->post('id');
        $id_laminasi = $this->input->post('id_laminasi');
        $harga = $this->input->post('harga');


        $data = array(

            'id_laminasi_fk' => $id_laminasi,
            'harga' => $harga,
        );
        $where = array(
            'id_hrg_laminasi' => $id
        );
        $this->m_produk->update_laminasi($where, $data, 'tbl_harga_laminasi');
        redirect('admin/harga_laminasi');
    }

    public function hapus_harga_laminasi($id)
    {
        $where = array('id_hrg_laminasi' => $id);
        $this->m_produk->hapus_data($where, 'tbl_harga_laminasi');
        redirect('admin/harga_laminasi');
    }
}
