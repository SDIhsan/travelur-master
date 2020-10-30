<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $valid = $this->form_validation;
        $valid->set_rules('username', 'Username', 'required|trim', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('password', 'Password', 'required|trim|min_length[5]', ['min_length' => '%s min 5 karakter', 'required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {
            $data = ['title' => 'Login Petugas'];
            $this->load->view('ro-admin/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $petugas = $this->db->get_where('tb_petugas', ['username' => $username])->row_array();

        if ($petugas) {
            if (password_verify($password, $petugas['password'])) {
                $data = [
                    'username' => $petugas['username'],
                    'nama_lengkap' => $petugas['nama_lengkap'],
                    'level' => $petugas['level']
                ];
                $this->session->set_userdata($data);
                if ($petugas['level'] == 'Admin') {
                    redirect('ro-admin/index');
                } else {
                    redirect('ro-petugas/index');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah!!!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username salah!!!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama_lengkap');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('login');;
    }
}
