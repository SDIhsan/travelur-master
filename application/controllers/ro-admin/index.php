<?php
defined('BASEPATH') or exit('No direct access alowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('type_trans_model');
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
}
