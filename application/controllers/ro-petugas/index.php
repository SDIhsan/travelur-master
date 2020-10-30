<?php
defined('BASEPATH') or exit('No direct access alowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('type_trans_model');
        $this->load->model('trans_model');
        $this->load->model('rute_model');
        $this->load->model('reservasi_model');
        $this->load->model('user_model');
        $this->load->model('petugas_model');

        $this->cek_login->cek_petugas();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Petugas'
        ];
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/index', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function reservasi()
    {
        $reservasi = $this->reservasi_model->get();

        $data = [
            'title' => 'Reservasi',
            'reservasi' => $reservasi
        ];
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/reservasi/get_reservasi', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function up_status($id_reservasi)
    {
        $this->load->library('user_agent');

        $data = [
            'id_reservasi' => $id_reservasi,
            'status' => 'Dibayar'
        ];
        $this->reservasi_model->update($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil diupdate</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function user()
    {
        $user = $this->user_model->get_admin();

        $data = [
            'title' => 'User',
            'user' => $user
        ];
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/user/get_user', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function type_trans()
    {
        $type_trans = $this->type_trans_model->get();
        // $detail_type = $this->type_trans_model->detail();

        $data = [
            'title' => 'Tipe Transportasi',
            'type_trans' => $type_trans
        ];
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/type_trans/get_type_trans', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function trans()
    {
        $trans = $this->trans_model->get();
        $type_trans = $this->type_trans_model->get();

        $rang = range(1, 9);
        shuffle($rang);
        $c = implode($rang);
        $kode = $c;

        $r = range(1, 2);
        shuffle($r);
        $k = implode($r);
        $kursi = $k;

        $data = [
            'title' => 'Transportasi',
            'trans' => $trans,
            'type_trans' => $type_trans,
            'kode'  => $kode,
            'kursi' => $kursi
        ];
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/trans/get_trans', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function rute()
    {
        $rute = $this->rute_model->get();
        $trans = $this->trans_model->get();


        $data = [
            'title' => 'Tipe Transportasi',
            'rute'  => $rute,
            'trans' => $trans
        ];
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/rute/get_rute', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }

    public function petugas()
    {
        $petugas = $this->petugas_model->get();

        $data = [
            'title' => 'Petugas',
            'petugas' => $petugas
        ];
        $this->load->view('ro-petugas/layout/header', $data);
        $this->load->view('ro-petugas/layout/sidebar', $data);
        $this->load->view('ro-petugas/petugas/get_petugas', $data);
        $this->load->view('ro-petugas/layout/footer', $data);
    }
}
