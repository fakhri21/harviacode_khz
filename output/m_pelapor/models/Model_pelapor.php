<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_pelapor extends CI_Model
{

    public $table = 'm_pelapor';
    public $id = 'id_pelapor';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_pelapor,npm,firstname,lastname,jenis_kelamin,email,no_hp');
        $this->datatables->from('m_pelapor');
        //add this line for join
        //$this->datatables->join('table2', 'm_pelapor.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('m_pelapor/read/$1'),'Read')." | ".anchor(site_url('m_pelapor/update/$1'),'Update')." | ".anchor(site_url('m_pelapor/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_pelapor');
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
        $this->db->like('id_pelapor', $q);
	$this->db->or_like('npm', $q);
	$this->db->or_like('firstname', $q);
	$this->db->or_like('lastname', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_hp', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pelapor', $q);
	$this->db->or_like('npm', $q);
	$this->db->or_like('firstname', $q);
	$this->db->or_like('lastname', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('no_hp', $q);
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

/* End of file Model_pelapor.php */
/* Location: ./application/models/Model_pelapor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-22 17:29:07 */
/* http://harviacode.com */