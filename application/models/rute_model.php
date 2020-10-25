<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rute_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get()
    {
        $this->db->select('tb_rute.*, tb_trans.*');
        $this->db->from('tb_rute');

        $this->db->join('tb_trans', 'tb_trans.id_trans = tb_rute.trans_id', 'left');
        $this->db->order_by('id_rute');

        $query = $this->db->get();
        return $query->result();
    }

    public function detail($id_rute)
    {
        $this->db->select('tb_rute.*, tb_trans.*');
        $this->db->from('tb_rute');

        $this->db->join('tb_trans', 'tb_trans.id_trans = tb_rute.trans_id', 'left');
        $this->db->where('id_rute', $id_rute);
        $this->db->order_by('id_rute');

        $query = $this->db->get();
        return $query->row();
    }

    public function create($data)
    {
        $this->db->insert('tb_rute', $data);
    }

    public function update($data)
    {
        $this->db->where('id_rute', $data['id_rute']);
        $this->db->update('tb_rute', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_rute', $data['id_rute']);
        $this->db->delete('tb_rute', $data);
    }

    public function search($keyword)
    {
        $this->db->distinct();
        $this->db->select('tb_rute.*, tb_trans.*');
        $this->db->from('tb_rute');
        $this->db->from('tb_trans');

        // $this->db->join('tb_type_trans', 'tb_type_trans.id_type_trans = tb_trans.type_trans_id', 'left');
        // $this->db->join('tb_trans', 'tb_trans.id_trans = tb_rute.trans_id', 'left');
        // $this->db->where('tb_type_trans.id_type_trans = tb_trans.type_trans_id');
        $this->db->where('tb_rute.trans_id = tb_trans.id_trans');
        $this->db->like('rute_dari', $keyword);
        $this->db->or_like('rute_ke', $keyword);
        // $this->db->or_like('description', $keyword);

        $query = $this->db->get();
        return $query->result();
    }

    // public function cari($keyword)
    // {
    //     $this->db->query('SELECT tb_rute.*, tb_type_trans.* FROM tb_rute, tb_trans, tb_type_trans WHERE tb_type_trans.id_type_trans = tb_trans.type_trans_id AND tb_rute.trans_id = tb_trans.id_trans AND (CONVERT(id_rute USING utf8) LIKE "%$keyword%" OR CONVERT(tgl_keberangkatan USING utf8) LIKE "%$keyword%" OR CONVERT(rute_dari USING utf8) LIKE "%$keyword%" OR CONVERT(rute_ke USING utf8) LIKE "%$keyword%"');
    //     return $this->db->get()->result();
    // }
}
