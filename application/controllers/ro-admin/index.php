<?php
defined('BASEPATH') or exit('No direct access alowed');

class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
}
