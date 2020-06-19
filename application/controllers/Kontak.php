<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kontak extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kontak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kontak/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kontak/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kontak/index.dart';
            $config['first_url'] = base_url() . 'kontak/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kontak_model->total_rows($q);
        $kontak = $this->Kontak_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kontak_data' => $kontak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('kontak_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'alamat' => $row->alamat,
		'email' => $row->email,
		'no_telp' => $row->no_telp,
	    );
            $this->load->view('header');
            $this->load->view('kontak_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kontak/create_action'),
	    'id' => set_value('id'),
	    'alamat' => set_value('alamat'),
	    'email' => set_value('email'),
	    'no_telp' => set_value('no_telp'),
	);

        $this->load->view('header');
        $this->load->view('kontak_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'alamat' => $this->input->post('alamat',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
	    );

            $this->Kontak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kontak'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kontak/update_action'),
		'id' => set_value('id', $row->id),
		'alamat' => set_value('alamat', $row->alamat),
		'email' => set_value('email', $row->email),
		'no_telp' => set_value('no_telp', $row->no_telp),
	    );
            $this->load->view('header');
            $this->load->view('kontak_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'alamat' => $this->input->post('alamat',TRUE),
		'email' => $this->input->post('email',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
	    );

            $this->Kontak_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kontak'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);

        if ($row) {
            $this->Kontak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kontak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kontak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 04:31:23 */
/* http://harviacode.com */