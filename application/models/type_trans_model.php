<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type_trans_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_type_trans');
        $this->db->order_by('id_type_trans', 'asc');

        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_type_trans)
    {
        $this->db->select('*');
        $this->db->from('tb_type_trans');
        $this->db->where('id_type_trans', $id_type_trans);

        $query = $this->db->get();
        return $query->row();
    }

    public function create($data)
    {
        $this->db->insert('tb_type_trans', $data);
    }

    public function update($data)
    {
        $this->db->where('id_type_trans', $data['id_type_trans']);
        $this->db->update('tb_type_trans', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_type_trans', $data['id_type_trans']);
        $this->db->delete('tb_type_trans', $data);
    }
}
