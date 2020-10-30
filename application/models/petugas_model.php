<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Petugas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->order_by('id_petugas', 'desc');

        return $this->db->get()->result();
    }

    public function detail($id_petugas)
    {
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->where('id_petugas', $id_petugas);
        $this->db->order_by('id_petugas');

        return $this->db->get()->row();
    }

    public function create($data)
    {
        $this->db->insert('tb_petugas', $data);
    }

    public function update($data)
    {
        $this->db->where('id_petugas', $data['id_petugas']);
        $this->db->update('tb_petugas', $data);
    }

    public function update_pass($data2)
    {
        $this->db->where('id_petugas', $data2['id_petugas']);
        $this->db->update('tb_petugas', $data2);
    }

    public function delete($data)
    {
        $this->db->where('id_petugas', $data['id_petugas']);
        $this->db->delete('tb_petugas', $data);
    }
}
