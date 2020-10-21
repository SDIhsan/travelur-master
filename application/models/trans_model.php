<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trans_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $this->db->select('tb_trans.*, tb_type_trans.*');
        $this->db->from('tb_trans');

        $this->db->join('tb_type_trans', 'tb_type_trans.id_type_trans = tb_trans.type_trans_id', 'left');
        $this->db->order_by('id_trans');

        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_trans)
    {
        $this->db->select('tb_trans.*, tb_type_trans.*');
        $this->db->from('tb_trans');

        $this->db->join('tb_type_trans', 'tb_type_trans.id_type_trans = tb_trans.type_trans_id', 'left');
        $this->db->where('id_trans', $id_trans);
        $this->db->order_by('id_trans');

        $query = $this->db->get();
        return $query->row();
    }

    public function create($data)
    {
        $this->db->insert('tb_trans', $data);
    }

    public function update($data)
    {
        $this->db->where('id_trans', $data['id_trans']);
        $this->db->update('tb_trans', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_trans', $data['id_trans']);
        $this->db->delete('tb_trans', $data);
    }
}
