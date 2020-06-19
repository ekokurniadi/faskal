<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Visi extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Visi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'visi/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'visi/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'visi/index.dart';
            $config['first_url'] = base_url() . 'visi/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Visi_model->total_rows($q);
        $visi = $this->Visi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'visi_data' => $visi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('visi_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Visi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'visi' => $row->visi,
		'active' => $row->active,
	    );
            $this->load->view('header');
            $this->load->view('visi_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('visi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('visi/create_action'),
	    'id' => set_value('id'),
	    'visi' => set_value('visi'),
	    'active' => set_value('active'),
	);

        $this->load->view('header');
        $this->load->view('visi_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'visi' => $this->input->post('visi',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Visi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('visi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Visi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('visi/update_action'),
		'id' => set_value('id', $row->id),
		'visi' => set_value('visi', $row->visi),
		'active' => set_value('active', $row->active),
	    );
            $this->load->view('header');
            $this->load->view('visi_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('visi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'visi' => $this->input->post('visi',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Visi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('visi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Visi_model->get_by_id($id);

        if ($row) {
            $this->Visi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('visi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('visi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('visi', 'visi', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Visi.php */
/* Location: ./application/controllers/Visi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-25 18:51:35 */
/* http://harviacode.com */