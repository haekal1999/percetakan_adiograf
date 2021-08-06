<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }

    /* public function input_keranjang($id)
    {
        $produk = $this->m_produk->find($id);
        $data = array(
            'id' => '',
            'produk' => $produk->nama,
            'jumlah' => $produk->1,
            'username' => $produk->nama,
            'harga' => $produk->nama,

        );
        $this->db->insert('tbl_keranjang', $data);
        redirect('welcome');
    }   
    */

    public function index()
    {
        $data['produk'] = $this->m_produk->tampil_data()->result();
        $data['spanduk_indoor'] = $this->m_produk->spanduk_indoor()->result();
        $data['xbanner'] = $this->m_produk->xbanner()->result();
        $data['spanduk_outdoor'] = $this->m_produk->spanduk_outdoor()->result();
        $data['flyer'] = $this->m_produk->flyer()->result();
        $data['brosur'] = $this->m_produk->brosur()->result();
        $data['kartu_nama'] = $this->m_produk->kartu_nama()->result();
        $data['undangan'] = $this->m_produk->undangan()->result();
        $data['kalender'] = $this->m_produk->kalender()->result();
        $data['sertifikat'] = $this->m_produk->sertifikat()->result();





        //$data['produk'] = $this->m_produk->detail_keranjang()->result();

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        //$this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ke_keranjang($id)
    {
        $produk = $this->m_produk->find($id);
        $data = array(
            'id'      => $produk->id_produk,
            'qty'     => 1,
            'price'   => $produk->harga,
            'name'    => $produk->nama,
        );

        $this->cart->insert($data);
        redirect('welcome');
    }

    public function detail_keranjang()
    {
        $keranjang = $this->cart->contents();
        $data = array(

            'keranjang'   => $keranjang,
        );

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('add_keranjang', $data);
        // $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang($rowid = '')
    {
        if ($rowid) {
            $this->cart->remove($rowid);
            redirect('dashboard/detail_keranjang');
        } else {

            $this->cart->destroy();
            redirect('dashboard/detail_keranjang');
        }
    }

    public function update_keranjang($rowid)
    {
        if ($rowid) {
            $data = array(
                'rowid' => $rowid,
                'qty' => $this->input->post('qty')
            );
            $this->cart->update($data);
            redirect('dashboard/detail_keranjang');
        } else {
            redirect('dashboard/detail_keranjang');
        }
    }



    public function pembayaran()
    {

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $id_member = $this->session->userdata('username');
        $is_processed = $this->model_invoice->index($id_member);
        if ($is_processed) {
            $this->cart->destroy();

            $this->load->view('templates/topbar');
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf, Pesanan Anda Gagal diproses !!!";
        }
    }

    public function detail($id_pdk)
    {
        $data['produk'] = $this->m_produk->detail_pdk($id_pdk);



        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_produk', $data);
        $this->load->view('templates/footer');
    }


    public function bahan()
    {
        $data['produk'] = $this->m_produk->tampil_bahan()->result();
    }

    //PESAN PRODUK
    public function pesan_spanduk_indoor()
    {
        //$data['pesan_spanduk_indoor'] = $this->m_produk->detail_pdk($id_pdk);



        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan()->result(),
            'finishing' => $this->m_produk->finishing()->result(),

        );

        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        //  $this->load->view('templates/sidebar');
        $this->load->view('pesanan/pesan_spanduk_indoor', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_xbanner()
    {
        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_xbanner(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_xbanner()->result(),
            'finishing' => $this->m_produk->finishing()->result(),

        );



        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_xbanner', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_spanduk_outdoor()
    {
        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_spanduk_outdoor(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_spanduk_outdoor()->result(),
            'finishing' => $this->m_produk->finishing()->result(),

        );



        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_spanduk_outdoor', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_flyer()
    {
        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_flyer(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_flyer()->result(),
            'finishing' => $this->m_produk->finishing_flyer()->result(),

        );



        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_flyer', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_brosur()
    {

        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_brosur(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_brosur()->result(),
            'finishing' => $this->m_produk->finishing_brosur()->result(),
            'sisi' => $this->m_produk->sisi_brosur()->result(),
            'laminasi_selected' => '',
            'harga_laminasi_selected' => '',
            'harga_laminasi' => $this->m_produk->get_hrg_laminasi_brosur(),
            'laminasi' => $this->m_produk->laminasi_brosur()->result(),
        );



        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_brosur', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_kartu_nama()
    {
        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_kartu_nama(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_kartu_nama()->result(),
            'sisi' => $this->m_produk->sisi_kartu_nama()->result(),
            'sudut' => $this->m_produk->sudut_kartu_nama()->result(),
            'laminasi_selected' => '',
            'harga_laminasi_selected' => '',
            'harga_laminasi' => $this->m_produk->get_hrg_laminasi_kartu_nama(),
            'laminasi' => $this->m_produk->laminasi_kartu_nama()->result(),
        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_kartu_nama', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_kartu_undangan()
    {
        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_undangan(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_undangan()->result(),
            'sisi' => $this->m_produk->sisi_kartu_nama()->result(),
            'sudut' => $this->m_produk->sudut_kartu_nama()->result(),
            'laminasi_selected' => '',
            'harga_laminasi_selected' => '',
            'harga_laminasi' => $this->m_produk->get_hrg_laminasi_kartu_nama(),
            'laminasi' => $this->m_produk->laminasi_undangan()->result(),
        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_kartu_undangan', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_kalender()
    {
        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_kalender(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_kalender()->result(),
            'finishing_dudukan' => $this->m_produk->finishing_dudukan_kalender()->result(),
            'finishing' => $this->m_produk->finishing_kalender()->result(),

            'dudukan' => $this->m_produk->dudukan_kalender()->result(),

            'laminasi_selected' => '',
            'harga_laminasi_selected' => '',
            'harga_laminasi' => $this->m_produk->get_hrg_laminasi_kalender(),
            'laminasi' => $this->m_produk->laminasi_kalender()->result(),
        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_kalender', $data);
        $this->load->view('templates/footer');
    }

    public function pesan_sertifikat()
    {
        $data = array(
            'harga' => $this->m_produk->get_hrg_bahan_sertifikat(),
            'bahan_selected' => '',
            'harga_selected' => '',
            'bahan' => $this->m_produk->bahan_sertifikat()->result(),
            'sisi' => $this->m_produk->sisi_kartu_nama()->result(),
            'sudut' => $this->m_produk->sudut_kartu_nama()->result(),
            'laminasi_selected' => '',
            'harga_laminasi_selected' => '',
            'harga_laminasi' => $this->m_produk->get_hrg_laminasi_kartu_nama(),
            'laminasi' => $this->m_produk->laminasi_undangan()->result(),
        );
        $this->load->view('templates/topbar');
        $this->load->view('templates/header');
        $this->load->view('pesanan/pesan_sertifikat', $data);
        $this->load->view('templates/footer');
    }

    /*
    public function keranjang()
    {
        $data['hitung_keranjang'] = $this->BayarModel->lihat_keranjang_by_id();


        $this->load->view('templates/footer', $data);
    }
    */
}
