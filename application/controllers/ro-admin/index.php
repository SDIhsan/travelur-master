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
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin'
        ];
        $this->load->view('ro-admin/layout/header', $data);
        $this->load->view('ro-admin/layout/sidebar', $data);
        $this->load->view('ro-admin/index', $data);
        $this->load->view('ro-admin/layout/footer', $data);
    }

    public function type_trans()
    {
        $type_trans = $this->type_trans_model->get();
        // $detail_type = $this->type_trans_model->detail();

        $data = [
            'title' => 'Tipe Transportasi',
            'type_trans' => $type_trans
        ];
        $this->load->view('ro-admin/layout/header', $data);
        $this->load->view('ro-admin/layout/sidebar', $data);
        $this->load->view('ro-admin/type_trans/get_type_trans', $data);
        $this->load->view('ro-admin/layout/footer', $data);
    }

    public function create_type()
    {
        $valid = $this->form_validation;
        $valid->set_rules('description', 'Deskripsi', 'required', ['required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" id="msg">Gagal menambahkan data!!!</div>');
            redirect('ro-admin/index/type_trans');
        } else {
            $data = [
                'description' => $this->input->post('description')
            ];

            $this->type_trans_model->create($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil ditambahkan</div>');
            redirect('ro-admin/index/type_trans');
        }
    }

    public function edit_type()
    {
        $valid = $this->form_validation;
        $valid->set_rules('description', 'Deskripsi', 'required', ['required' => '%s tidak boleh kosong']);

        if (!$valid->run()) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" id="msg">Gagal mengubah data!!!</div>');
            redirect('ro-admin/index/type_trans');
        } else {
            $data = [
                'id_type_trans' => $this->input->post('id_type_trans'),
                'description' => $this->input->post('description')
            ];

            $this->type_trans_model->update($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil diupdate</div>');
            redirect('ro-admin/index/type_trans');
        }
    }

    public function delete_type($id_type_trans)
    {
        $type_trans = $this->type_trans_model->detail($id_type_trans);
        $data = [
            'id_type_trans' => $type_trans->id_type_trans
        ];

        $this->type_trans_model->delete($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil dihapus</div>');
        redirect('ro-admin/index/type_trans');
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
        $this->load->view('ro-admin/layout/header', $data);
        $this->load->view('ro-admin/layout/sidebar', $data);
        $this->load->view('ro-admin/trans/get_trans', $data);
        $this->load->view('ro-admin/layout/footer', $data);
    }

    public function create_trans()
    {
        $valid = $this->form_validation;
        $valid->set_rules('deskripsi', 'Deskripsi', 'required');
        $valid->set_rules('type_trans_id', 'Tipe Trans', 'required');

        if (!$valid->run()) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" id="msg">Gagal menambahkan data!!!</div>');
            redirect('ro-admin/index/trans');
        } else {
            $data = [
                'kode' => $this->input->post('kode'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kursi' => $this->input->post('kursi'),
                'type_trans_id' => $this->input->post('type_trans_id')
            ];

            $this->trans_model->create($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil ditambahkan</div>');
            redirect('ro-admin/index/trans');
        }
    }

    public function edit_trans()
    {
        $valid = $this->form_validation;
        $valid->set_rules('deskripsi', 'Deskripsi', 'required');
        $valid->set_rules('kursi', 'Kursi', 'required');

        if (!$valid->run()) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" id="msg">Gagal mengubah data!!!</div>');
            redirect('ro-admin/index/type_trans');
        } else {
            $data = [
                'id_trans' => $this->input->post('id_trans'),
                'kode' => $this->input->post('kode'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kursi' => $this->input->post('kursi'),
                'type_trans_id' => $this->input->post('type_trans_id')
            ];

            $this->trans_model->update($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil diupdate</div>');
            redirect('ro-admin/index/trans');
        }
    }

    public function delete_trans($id_trans)
    {
        $trans = $this->trans_model->detail($id_trans);
        $data = [
            'id_trans' => $trans->id_trans
        ];

        $this->trans_model->delete($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil dihapus</div>');
        redirect('ro-admin/index/trans');
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
        $this->load->view('ro-admin/layout/header', $data);
        $this->load->view('ro-admin/layout/sidebar', $data);
        $this->load->view('ro-admin/rute/get_rute', $data);
        $this->load->view('ro-admin/layout/footer', $data);
    }

    public function create_rute()
    {
        $valid = $this->form_validation;
        $valid->set_rules('tgl_keberangkatan', 'Tanggal Keberangkatan', 'required');
        $valid->set_rules('rute_dari', 'Rute Dari', 'required');
        $valid->set_rules('rute_ke', 'Rute Ke', 'required');
        $valid->set_rules('harga', 'Harga', 'required');
        $valid->set_rules('trans_id', 'Deskripsi', 'required');

        if (!$valid->run()) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" id="msg">Gagal menambahkan data!!!</div>');
            redirect('ro-admin/index/rute');
        } else {
            $data = [
                'tgl_keberangkatan' => $this->input->post('tgl_keberangkatan'),
                'rute_ke' => $this->input->post('rute_ke'),
                'rute_dari' => $this->input->post('rute_dari'),
                'harga' => $this->input->post('harga'),
                'trans_id' => $this->input->post('trans_id')
            ];

            $this->rute_model->create($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil ditambahkan</div>');
            redirect('ro-admin/index/rute');
        }
    }

    public function edit_rute()
    {

        $valid = $this->form_validation;
        $valid->set_rules('tgl_keberangkatan', 'Tanggal Keberangkatan', 'required');
        $valid->set_rules('rute_dari', 'Rute Dari', 'required');
        $valid->set_rules('rute_ke', 'Rute Ke', 'required');
        $valid->set_rules('harga', 'Harga', 'required');
        $valid->set_rules('trans_id', 'Deskripsi', 'required');

        if (!$valid->run()) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert" id="msg">Gagal mengubah data!!!</div>');
            redirect('ro-admin/index/rute');
        } else {
            $data = [
                'id_rute' => $this->input->post('id_rute'),
                'tgl_keberangkatan' => $this->input->post('tgl_keberangkatan'),
                'rute_ke' => $this->input->post('rute_ke'),
                'rute_dari' => $this->input->post('rute_dari'),
                'harga' => $this->input->post('harga'),
                'trans_id' => $this->input->post('trans_id')
            ];

            $this->rute_model->update($data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil diubah</div>');
            redirect('ro-admin/index/rute');
        }
    }

    public function delete_rute($id_rute)
    {
        $rute = $this->rute_model->detail($id_rute);
        $data = [
            'id_rute' => $rute->id_rute
        ];

        $this->rute_model->delete($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert" id="msg">Data berhasil dihapus</div>');
        redirect('ro-admin/index/rute');
    }
}
