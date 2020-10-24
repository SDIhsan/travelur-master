<?php
defined('BASEPATH') or exit('No direct access script allowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('rute_model');
        $this->load->model('reservasi_model');
        $this->load->model('trans_model');
        $this->load->model('type_trans_model');
    }

    public function index()
    {
        $this->cek_login->cek();

        $data = [
            'title' => 'Dashboard'
        ];
        $this->load->view('user/index', $data);
    }

    public function login()
    {
        $valid = $this->form_validation;
        $valid->set_rules('user_nama', 'Username', 'required|trim', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('user_pass', 'Password', 'required|trim|min_length[5]', ['min_length' => '%s min 5 karakter', 'required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {
            $data = ['title' => 'Login'];
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('user_nama');
        $password = $this->input->post('user_pass');

        $user = $this->db->get_where('tb_user', ['user_nama' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['user_pass'])) {
                $data = [
                    'user_nama' => $user['user_nama'],
                    'user_pass' => $user['user_pass'],
                    'user_id' => $user['user_id'],
                    'user_nama_lengkap' => $user['user_nama_lengkap']
                ];
                $this->session->set_userdata($data);

                redirect('index');
                // } else {
                //     redirect('index/login');
                // }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah!!!</div>');
                redirect('index/login');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username salah!!!</div>');
            redirect('index/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_nama');
        $this->session->unset_userdata('user_pass');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_nama_lengkap');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('index/login');;
    }

    public function registrasi()
    {
        $valid = $this->form_validation;
        $valid->set_rules('user_nama', 'Username', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('user_nama_lengkap', 'Nama Lengkap', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('user_pass', 'Password', 'required|trim|min_length[5]', ['required' => '%s tidak boleh kosong', 'min_length' => '%s min 5 karakter']);

        if (!$valid->run()) {
            $data = ['title' => 'Registrasi Akun'];
            $this->load->view('registrasi', $data);
        } else {
            $data = [
                'user_nama' => htmlspecialchars($this->input->post('user_nama', true)),
                'user_nama_lengkap' => htmlspecialchars($this->input->post('user_nama_lengkap', true)),
                'user_pass' => password_hash($this->input->post('user_pass'), PASSWORD_DEFAULT),
            ];

            $this->user_model->create($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data login berhasil ditambahkan</div>');
            redirect('index/login');
        }
    }

    public function data_diri()
    {
        $this->cek_login->cek();

        $user = $this->user_model->get();

        $data = [
            'title' => 'Data diri',
            'user' => $user
        ];
        $this->load->view('user/get_data_diri', $data);
    }

    public function data_diri_up()
    {
        $this->cek_login->cek();

        $valid = $this->form_validation;
        $valid->set_rules('user_jk', 'Jenis Kelamin', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('user_alamat', 'Alamat', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('user_telp' . 'No Telp', 'required', ['required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {

            $user = $this->user_model->get();
            $data = [
                'title' => 'Data Diri',
                'user' => $user
            ];
            $this->load->view('user/get_data_diri', $data);
        } else {
            $data = [
                'user_id' => $this->input->post('user_id'),
                'user_jk' => $this->input->post('user_jk'),
                'user_telp' => $this->input->post('user_telp'),
                'user_alamat' => $this->input->post('user_alamat')
            ];

            $this->user_model->update($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
            redirect('index/data_diri');
        }
    }
}
