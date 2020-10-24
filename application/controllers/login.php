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
        $valid->set_rules('admin_username', 'Email', 'required|trim', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('admin_pass', 'Password', 'required|trim|min_length[5]', ['min_length' => '%s min 5 karakter', 'required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {
            $data = ['title' => 'Login Admin'];
            $this->load->view('ro-admin/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $admin_username = $this->input->post('admin_username');
        $admin_pass = $this->input->post('admin_pass');

        $admin = $this->db->get_where('tb_admin', ['admin_username' => $admin_username])->row_array();

        if ($admin) {
            if (sha1($admin_pass, $admin['admin_pass'])) {
                $data = [
                    'admin_username' => $admin['admin_username'],
                    'admin_pass' => $admin['admin_pass'],
                    'admin_name' => $admin['admin_name']
                ];
                $this->session->set_userdata($data);
                redirect('ro-admin/index');
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
        $this->session->unset_userdata('admin_username');
        $this->session->unset_userdata('admin_pass');
        $this->session->unset_userdata('admin_name');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('login');;
    }
}
