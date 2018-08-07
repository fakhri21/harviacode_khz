<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class H_kerusakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_kerusakan');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('h_kerusakan/h_kerusakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_kerusakan->json();
    }

    public function read($id) 
    {
        $row = $this->Model_kerusakan->get_by_id($id);
        if ($row) {
            $data = array(
		'id_laporan' => $row->id_laporan,
		'id_pelapor' => $row->id_pelapor,
		'id_ruangan' => $row->id_ruangan,
		'id_barang' => $row->id_barang,
		'deskripsi' => $row->deskripsi,
		'tanggal' => $row->tanggal,
		'status' => $row->status,
		'tanggal_penyelesaian' => $row->tanggal_penyelesaian,
		'periode_penyelesaian' => $row->periode_penyelesaian,
	    );
            $this->load->view('h_kerusakan/h_kerusakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('h_kerusakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('h_kerusakan/create_action'),
	    'id_laporan' => set_value('id_laporan'),
	    'id_pelapor' => set_value('id_pelapor'),
	    'id_ruangan' => set_value('id_ruangan'),
	    'id_barang' => set_value('id_barang'),
	    'deskripsi' => set_value('deskripsi'),
	    'tanggal' => set_value('tanggal'),
	    'status' => set_value('status'),
	    'tanggal_penyelesaian' => set_value('tanggal_penyelesaian'),
	    'periode_penyelesaian' => set_value('periode_penyelesaian'),
	);
        $this->load->view('h_kerusakan/h_kerusakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_pelapor' => $this->input->post('id_pelapor',TRUE),
		'id_ruangan' => $this->input->post('id_ruangan',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tanggal_penyelesaian' => $this->input->post('tanggal_penyelesaian',TRUE),
		'periode_penyelesaian' => $this->input->post('periode_penyelesaian',TRUE),
	    );

            $this->Model_kerusakan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('h_kerusakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_kerusakan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('h_kerusakan/update_action'),
		'id_laporan' => set_value('id_laporan', $row->id_laporan),
		'id_pelapor' => set_value('id_pelapor', $row->id_pelapor),
		'id_ruangan' => set_value('id_ruangan', $row->id_ruangan),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'status' => set_value('status', $row->status),
		'tanggal_penyelesaian' => set_value('tanggal_penyelesaian', $row->tanggal_penyelesaian),
		'periode_penyelesaian' => set_value('periode_penyelesaian', $row->periode_penyelesaian),
	    );
            $this->load->view('h_kerusakan/h_kerusakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('h_kerusakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_laporan', TRUE));
        } else {
            $data = array(
		'id_pelapor' => $this->input->post('id_pelapor',TRUE),
		'id_ruangan' => $this->input->post('id_ruangan',TRUE),
		'id_barang' => $this->input->post('id_barang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tanggal_penyelesaian' => $this->input->post('tanggal_penyelesaian',TRUE),
		'periode_penyelesaian' => $this->input->post('periode_penyelesaian',TRUE),
	    );

            $this->Model_kerusakan->update($this->input->post('id_laporan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('h_kerusakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_kerusakan->get_by_id($id);

        if ($row) {
            $this->Model_kerusakan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('h_kerusakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('h_kerusakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_pelapor', 'id pelapor', 'trim|required');
	$this->form_validation->set_rules('id_ruangan', 'id ruangan', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('tanggal_penyelesaian', 'tanggal penyelesaian', 'trim|required');
	$this->form_validation->set_rules('periode_penyelesaian', 'periode penyelesaian', 'trim|required');

	$this->form_validation->set_rules('id_laporan', 'id_laporan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file H_kerusakan.php */
/* Location: ./application/controllers/H_kerusakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-28 06:45:24 */
/* http://harviacode.com */