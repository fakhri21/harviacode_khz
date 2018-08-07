<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_kerusakan extends CI_Model
{

    public $table = 'h_kerusakan';
    public $id = 'id_laporan';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_laporan,id_pelapor,id_ruangan,id_barang,deskripsi,tanggal,status,tanggal_penyelesaian,periode_penyelesaian');
        $this->datatables->from('h_kerusakan');
        //add this line for join
        //$this->datatables->join('table2', 'h_kerusakan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('h_kerusakan/read/$1'),'Read')." | ".anchor(site_url('h_kerusakan/update/$1'),'Update')." | ".anchor(site_url('h_kerusakan/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_laporan');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_laporan', $q);
	$this->db->or_like('id_pelapor', $q);
	$this->db->or_like('id_ruangan', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('tanggal_penyelesaian', $q);
	$this->db->or_like('periode_penyelesaian', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_laporan', $q);
	$this->db->or_like('id_pelapor', $q);
	$this->db->or_like('id_ruangan', $q);
	$this->db->or_like('id_barang', $q);
	$this->db->or_like('deskripsi', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('tanggal_penyelesaian', $q);
	$this->db->or_like('periode_penyelesaian', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Model_kerusakan.php */
/* Location: ./application/models/Model_kerusakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-28 06:45:24 */
/* http://harviacode.com */