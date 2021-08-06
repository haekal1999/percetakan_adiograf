<?php
class Model_auth  extends CI_Model
{
    protected $table = 'tb_user';

    public function cek_login()
    {
        $username = set_value('username');
        $password = set_value('password');
        $nama = set_value('nama');
        $no_hp = set_value('no_hp');
        $alamat = set_value('alamat');
        $email = set_value('email');

        if (password_verify('secret password', $password)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
        $result = $this->db->where('username', $username)
            ->where('password', $password)
            ->limit(1)
            ->get('tb_user');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }


    public function login($username, $password)
    {
        $this->db->where('username', $username);
        if ($user = $this->db->get($this->table)->row()) {
            if (password_verify($password, $user->password)) {
                $data = array(
                    'username' => $user->username,
                    'password' => $user->password,
                    'alamat' => $user->alamat,
                    'id' => $user->id,
                    'id_role' => $user->id_role,
                    'no_hp' => $user->ho_hp,
                    'email' => $user->email,

                    'status' => 'login'
                );
                $this->session->set_userdata($data);
                return 'sukses';
            } else {
                return 'password';
            }
        } else {
            return "username";
        }
    }
}
