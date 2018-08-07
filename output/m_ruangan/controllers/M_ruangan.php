<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_ruangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_ruangan');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('m_ruangan/m_ruangan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_ruangan->json();
    }

    public function read($id) 
    {
        $row = $this->Model_ruangan->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ruangan' => $row->id_ruangan,
		'no_ruangan' => $row->no_ruangan,
		'nama_ruangan' => $row->nama_ruangan,
	    );
            $this->load->view('m_ruangan/m_ruangan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_ruangan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_ruangan/create_action'),
	    'id_ruangan' => set_value('id_ruangan'),
	    'no_ruangan' => set_value('no_ruangan'),
	    'nama_ruangan' => set_value('nama_ruangan'),
	);
        $this->load->view('m_ruangan/m_ruangan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_ruangan' => $this->input->post('no_ruangan',TRUE),
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
	    );

            $this->Model_ruangan->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_ruangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_ruangan->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_ruangan/update_action'),
		'id_ruangan' => set_value('id_ruangan', $row->id_ruangan),
		'no_ruangan' => set_value('no_ruangan', $row->no_ruangan),
		'nama_ruangan' => set_value('nama_ruangan', $row->nama_ruangan),
	    );
            $this->load->view('m_ruangan/m_ruangan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_ruangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ruangan', TRUE));
        } else {
            $data = array(
		'no_ruangan' => $this->input->post('no_ruangan',TRUE),
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
	    );

            $this->Model_ruangan->update($this->input->post('id_ruangan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_ruangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_ruangan->get_by_id($id);

        if ($row) {
            $this->Model_ruangan->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_ruangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_ruangan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_ruangan', 'no ruangan', 'trim|required');
	$this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');

	$this->form_validation->set_rules('id_ruangan', 'id_ruangan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_ruangan.php */
/* Location: ./application/controllers/M_ruangan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-22 17:29:25 */
/* http://harviacode.com */