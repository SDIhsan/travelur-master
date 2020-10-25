<?php
defined('BASEPATH') or exit('No direct script access alowed');

class Reservasi_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $this->db->select('tb_reservasi.*, tb_user.*, tb_rute.*');
        $this->db->from('tb_reservasi');

        $this->db->join('tb_user', 'tb_user.user_id = tb_reservasi.user_id', 'left');
        $this->db->join('tb_rute', 'tb_rute.id_rute = tb_reservasi.rute_id', 'left');
        $this->db->order_by('id_reservasi', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_reservasi)
    {
        $this->db->select('tb_reservasi.*, tb_user.*, tb_rute.*');
        $this->db->from('tb_reservasi');

        $this->db->join('tb_user', 'tb_user.user_id = tb_reservasi.user_id', 'left');
        $this->db->join('tb_rute', 'tb_rute.id_rute = tb_reservasi.rute_id', 'left');
        $this->db->where('tb_reservasi.user_id', $id_reservasi);
        // $this->db->order_by('tb_reservasi.user_id', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('tb_reservasi', $data);
    }

    public function update($data)
    {
        $this->db->where('id_reservasi', $data['id_reservasi']);
        $this->db->update('tb_reservasi', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_reservasi', $data['id_reservasi']);
        $this->db->delete('tb_reservasi', $data);
    }
}
