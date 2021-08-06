<?php
class Rekening extends CI_Controller
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

    public function index()
    {
        $data = array(
            'rekening' => $this->m_produk->lihat_rekening()->result_array(),

        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/rekening/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_rekening($id)
    {

        $where = array('id' => $id);
        $data['finishing'] = $this->m_produk->detail_finishing($where, 'tbl_finishing')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/lihat_finishing', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_rekening()
    {
        $jenis = $this->input->post('jenis');
        $rekening = $this->input->post('rekening');
        $nomor = $this->input->post('nomor');
        $atas_nama = $this->input->post('atas_nama');

        $data = array(
            'jenis' => $jenis,
            'rekening' => $rekening,
            'nomor' => $nomor,
            'atas_nama' => $atas_nama

        );
        $this->m_produk->tambah_produk($data, "tbl_pembayaran");
        redirect('admin/rekening');
    }

    public function edit_rekening($id)
    {
        $where = array('id' => $id);
        $data['rekening'] = $this->m_produk->edit_rekening($where, 'tbl_pembayaran')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/rekening/edit', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_rekening()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $rekening = $this->input->post('rekening');
        $nomor = $this->input->post('nomor');
        $atas_nama = $this->input->post('atas_nama');


        $data = array(

            'jenis' => $jenis,
            'rekening' => $rekening,
            'nomor' => $nomor,
            'atas_nama' => $atas_nama

        );
        $where = array(
            'id' => $id
        );
        $this->m_produk->update_rekening($where, $data, 'tbl_pembayaran');
        redirect('admin/rekening');
    }

    public function hapus_rekening($id)
    {
        $where = array('id' => $id);
        $this->m_produk->hapus_data($where, 'tbl_pembayaran');
        redirect('admin/rekening');
    }
}
