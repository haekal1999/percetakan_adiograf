<?php
class Dashboard_admin extends CI_controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('id_role') != '1') {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda belum login !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('auth/login');
    }
  }


  public function index()
  {
    $data = array(
      'pesanan_masuk' => $this->db->where('faktur_status', 'tunggu')->count_all_results('tbl_faktur'),
      'pesanan_selesai' => $this->db->where('faktur_status', 'selesai')->count_all_results('tbl_faktur'),
      'total_transaksi' => $this->db->count_all_results('tbl_faktur'),
      'total_produk' => $this->db->count_all_results('tbl_produk'),
      'total_user' => $this->db->count_all_results('tb_user')



    );
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dashboard', $data);
    $this->load->view('templates_admin/footer');
  }

  public function user()
	{
		$data = array(
			'user' => $this->BayarModel->lihat_user()->result_array(),
      'role' => $this->m_produk->role()->result()

		);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/user/index', $data);
		$this->load->view('templates_admin/footer');
	}

  public function tambah_user()
  {
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $no_hp = $this->input->post('no_hp');
    $email = $this->input->post('email');
    $alamat = $this->input->post('alamat');
    $password = $this->input->post('password');
    $username = $this->input->post('username');
    $role = $this->input->post('role');


       $data = array(

        'nama' => $nama,
        'no_hp' => $no_hp,
        'email' => $email,
        'alamat' => $alamat,
        'username' => $username,
        'id_role' => $role,
        'password' => $password

      );
      $this->m_produk->tambah_user($data, "tb_user");
      redirect('admin/user');
  }

  public function detail_user($id)
  {

      $where = array('id' => $id);
      $data['user'] = $this->m_produk->detail_user($where, 'tb_user')->result();
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/user/lihat_user', $data);
      $this->load->view('templates_admin/footer');
  }

  
  public function edit_user($id)
  {
      $where = array('id' => $id);
      $data['user'] = $this->m_produk->edit_user($where, 'tb_user')->result();
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/user/edit_user', $data);
      $this->load->view('templates_admin/footer');
  }

  public function update_user()
  {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      $no_hp = $this->input->post('no_hp');
      $email = $this->input->post('email');
      // $harga = $this->input->post('harga');
      $alamat = $this->input->post('alamat');
      $password = $this->input->post('password');



      $data = array(

          'nama' => $nama,
          'no_hp' => $no_hp,
          'email' => $email,
          'alamat' => $alamat,
          'password' => $password


      );
      $where = array(
          'id' => $id
      );
      $this->m_produk->update_user($where, $data, 'tb_user');
      redirect('admin/user');
  }

  public function hapus_user($id)
  {
      $where = array('id' => $id);
      $this->m_produk->hapus_data($where, 'tb_user');
      redirect('admin/user');
  }
}
