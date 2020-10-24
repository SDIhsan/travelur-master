<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('user_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_admin()
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->order_by('user_id', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function detail($user_id)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('user_id', 'desc');

        $query = $this->db->get();
        return $query->row();
    }

    public function create($data)
    {
        $this->db->insert('tb_user', $data);
    }

    public function update($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('tb_user', $data);
    }

    public function delete($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('tb_user', $data);
    }
}
