<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_login
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function cek()
    {

        if ($this->CI->session->userdata('user_nama') == '') {
            $this->CI->session->set_flashdata('msg', 'Silahkan Login terlebih dahulu');
            redirect(base_url('index/login'));
        }
    }

    public function cek_admin()
    {
        if ($this->CI->session->userdata('level') != 'Admin') {
            $this->CI->session->set_flashdata('msg', 'Silahkan Login terlebih dahulu');
            redirect('login');

            if ($this->session->userdata('username') == '') {
                $this->CI->session->set_flashdata('msg', 'Silahkan Login terlebih dahulu');
                redirect('login');
            }
        }
    }

    public function cek_petugas()
    {
        if ($this->CI->session->userdata('level') != 'Petugas') {
            $this->CI->session->set_flashdata('msg', 'Silahkan Login terlebih dahulu');
            redirect('login');

            if ($this->session->userdata('username') == '') {
                $this->CI->session->set_flashdata('msg', 'Silahkan Login terlebih dahulu');
                redirect('login');
            }
        }
    }

    // public function logout()
    // {
    //     $this->CI->session->unset_userdata('id_user');
    //     $this->CI->session->unset_userdata('email');
    //     $this->CI->session->unset_userdata('nama');
    //     $this->CI->session->unset_userdata('role');

    //     $this->CI->session->set_flashdata('message', 'Anda telah keluar dari administrator');
    //     redirect(base_url('auth'));
    // }
}
