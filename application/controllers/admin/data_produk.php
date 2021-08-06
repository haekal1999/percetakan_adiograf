<?php
class Data_produk extends CI_Controller
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
            'transaksi' => $this->m_produk->lihat_produk()->result_array(),
            'bahan' => $this->m_produk->bahan()->result(),
            'kategori_produk' => $this->m_produk->kategori_produk()->result()

        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_produk($id)
    {

        $where = array('id_produk' => $id);
        $data['produk'] = $this->m_produk->detail_produk($where, 'tbl_produk')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/lihat_produk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload !";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama' => $nama,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'gambar' => $gambar

        );
        $this->m_produk->tambah_produk($data, "tbl_produk");
        redirect('admin/data_produk/index');
    }

    public function edit($id)
    {
        $where = array('id_produk' => $id);
        $data['produk'] = $this->m_produk->edit_produk($where, 'tbl_produk')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_produk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id = $this->input->post('id_produk');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');

        $data = array(

            'nama' => $nama,
            'kategori' => $kategori,
            'keterangan' => $keterangan,
            'harga' => $harga
        );
        $where = array(
            'id_produk' => $id
        );
        $this->m_produk->update_data($where, $data, 'tbl_produk');
        redirect('admin/data_produk/index');
    }

    public function hapus($id)
    {
        $where = array('id_produk' => $id);
        $this->m_produk->hapus_data($where, 'tbl_produk');
        redirect('admin/data_produk/index');
    }

    public function bahan()
    {
        $data['bahan'] = $this->m_produk->tampil_bahan();

        $this->load->view('admin/data_produk', $data);
    }


    //BAHAN VIEW

    public function lihat_bahan()
    {

        $data = array(
            'bahan' => $this->m_produk->lihat_bahan()->result_array(),
            'kategori_produk' => $this->m_produk->kategori_produk()->result()

        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/bahan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_bahan($id)
    {

        $where = array('id' => $id);
        $data['bahan'] = $this->m_produk->detail_bahan($where, 'tbl_bahan')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/lihat_bahan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_bahan()
    {
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/img/produk/bahan';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload !";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'bahan' => $nama,
            'ket' => $keterangan,
            'produk' => $kategori,
            'foto' => $gambar

        );
        $this->m_produk->tambah_produk($data, "tbl_bahan");
        redirect('admin/data_produk/lihat_bahan');
    }

    public function edit_bahan($id)
    {
        $where = array('id' => $id);
        $data['bahan'] = $this->m_produk->edit_bahan($where, 'tbl_bahan')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/edit_bahan', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_bahan()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('bahan');
        $kategori = $this->input->post('produk');
        $keterangan = $this->input->post('ket');
        // $harga = $this->input->post('harga');
        $foto = $this->input->post('foto');


        $data = array(

            'bahan' => $nama,
            'produk' => $kategori,
            'ket' => $keterangan,
            // 'harga' => $harga,
            'foto' => $foto

        );
        $where = array(
            'id' => $id
        );
        $this->m_produk->update_bahan($where, $data, 'tbl_bahan');
        redirect('admin/bahan');
    }

    public function hapus_bahan($id)
    {
        $where = array('id' => $id);
        $this->m_produk->hapus_data($where, 'tbl_bahan');
        redirect('admin/bahan');
    }
    //FINISHING VIEW

    public function lihat_finishing()
    {

        $data = array(
            'finishing' => $this->m_produk->lihat_finishing()->result_array(),
            'kategori_produk' => $this->m_produk->kategori_produk()->result()

        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/finishing', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_finishing($id)
    {

        $where = array('id' => $id);
        $data['finishing'] = $this->m_produk->detail_finishing($where, 'tbl_finishing')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/lihat_finishing', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_finishing()
    {
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/img/produk/finishing';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload !";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama' => $nama,
            'ket' => $keterangan,
            'produk' => $kategori,
            'foto' => $gambar

        );
        $this->m_produk->tambah_produk($data, "tbl_finishing");
        redirect('admin/finishing');
    }

    public function edit_finishing($id)
    {
        $where = array('id' => $id);
        $data['finishing'] = $this->m_produk->edit_finishing($where, 'tbl_finishing')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/edit_finishing', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_finishing()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('produk');
        $keterangan = $this->input->post('ket');
        // $harga = $this->input->post('harga');
        $foto = $this->input->post('foto');


        $data = array(

            'nama' => $nama,
            'produk' => $kategori,
            'ket' => $keterangan,
            // 'harga' => $harga,
            'foto' => $foto

        );
        $where = array(
            'id' => $id
        );
        $this->m_produk->update_finishing($where, $data, 'tbl_finishing');
        redirect('admin/finishing');
    }

    public function hapus_finishing($id)
    {
        $where = array('id' => $id);
        $this->m_produk->hapus_data($where, 'tbl_finishing');
        redirect('admin/finishing');
    }

    //Laminasi VIEW

    public function lihat_laminasi()
    {

        $data = array(
            'laminasi' => $this->m_produk->lihat_laminasi()->result_array(),
            'kategori_produk' => $this->m_produk->kategori_produk()->result()

        );
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/laminasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail_laminasi($id)
    {

        $where = array('id' => $id);
        $data['laminasi'] = $this->m_produk->detail_laminasi($where, 'tbl_laminasi')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/lihat_laminasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_laminasi()
    {
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $kategori = $this->input->post('kategori');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/img/produk/laminasi';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload !";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'nama' => $nama,
            'ket' => $keterangan,
            'produk' => $kategori,
            'foto' => $gambar

        );
        $this->m_produk->tambah_produk($data, "tbl_laminasi");
        redirect('admin/data_produk/lihat_laminasi');
    }

    public function edit_laminasi($id)
    {
        $where = array('id' => $id);
        $data['laminasi'] = $this->m_produk->edit_laminasi($where, 'tbl_laminasi')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/produk/edit_laminasi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_laminasi()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('produk');
        $keterangan = $this->input->post('ket');
        // $harga = $this->input->post('harga');
        $foto = $this->input->post('foto');


        $data = array(

            'nama' => $nama,
            'produk' => $kategori,
            'ket' => $keterangan,
            //   'harga' => $harga,
            'foto' => $foto

        );
        $where = array(
            'id' => $id
        );
        $this->m_produk->update_laminasi($where, $data, 'tbl_laminasi');
        redirect('admin/laminasi');
    }

    public function hapus_laminasi($id)
    {
        $where = array('id' => $id);
        $this->m_produk->hapus_data($where, 'tbl_laminasi');
        redirect('admin/laminasi');
    }
}
