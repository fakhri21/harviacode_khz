<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pelapor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pelapor');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->load->view('m_pelapor/m_pelapor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Model_pelapor->json();
    }

    public function read($id) 
    {
        $row = $this->Model_pelapor->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pelapor' => $row->id_pelapor,
		'npm' => $row->npm,
		'firstname' => $row->firstname,
		'lastname' => $row->lastname,
		'jenis_kelamin' => $row->jenis_kelamin,
		'email' => $row->email,
		'no_hp' => $row->no_hp,
	    );
            $this->load->view('m_pelapor/m_pelapor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pelapor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('m_pelapor/create_action'),
	    'id_pelapor' => set_value('id_pelapor'),
	    'npm' => set_value('npm'),
	    'firstname' => set_value('firstname'),
	    'lastname' => set_value('lastname'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'email' => set_value('email'),
	    'no_hp' => set_value('no_hp'),
	);
        $this->load->view('m_pelapor/m_pelapor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Model_pelapor->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('m_pelapor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Model_pelapor->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_pelapor/update_action'),
		'id_pelapor' => set_value('id_pelapor', $row->id_pelapor),
		'npm' => set_value('npm', $row->npm),
		'firstname' => set_value('firstname', $row->firstname),
		'lastname' => set_value('lastname', $row->lastname),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'email' => set_value('email', $row->email),
		'no_hp' => set_value('no_hp', $row->no_hp),
	    );
            $this->load->view('m_pelapor/m_pelapor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pelapor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelapor', TRUE));
        } else {
            $data = array(
		'npm' => $this->input->post('npm',TRUE),
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
	    );

            $this->Model_pelapor->update($this->input->post('id_pelapor', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('m_pelapor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Model_pelapor->get_by_id($id);

        if ($row) {
            $this->Model_pelapor->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('m_pelapor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pelapor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('npm', 'npm', 'trim|required');
	$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');

	$this->form_validation->set_rules('id_pelapor', 'id_pelapor', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file M_pelapor.php */
/* Location: ./application/controllers/M_pelapor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-07-22 17:29:07 */
/* http://harviacode.com */