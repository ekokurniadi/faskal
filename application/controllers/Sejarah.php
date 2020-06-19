<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sejarah extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sejarah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sejarah/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sejarah/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sejarah/index.dart';
            $config['first_url'] = base_url() . 'sejarah/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sejarah_model->total_rows($q);
        $sejarah = $this->Sejarah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sejarah_data' => $sejarah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('sejarah_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Sejarah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'sejarah' => $row->sejarah,
	    );
            $this->load->view('header');
            $this->load->view('sejarah_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sejarah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sejarah/create_action'),
	    'id' => set_value('id'),
	    'sejarah' => set_value('sejarah'),
	);

        $this->load->view('header');
        $this->load->view('sejarah_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'sejarah' => $this->input->post('sejarah',TRUE),
	    );

            $this->Sejarah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sejarah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sejarah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sejarah/update_action'),
		'id' => set_value('id', $row->id),
		'sejarah' => set_value('sejarah', $row->sejarah),
	    );
            $this->load->view('header');
            $this->load->view('sejarah_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sejarah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'sejarah' => $this->input->post('sejarah',TRUE),
	    );

            $this->Sejarah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sejarah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sejarah_model->get_by_id($id);

        if ($row) {
            $this->Sejarah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sejarah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sejarah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sejarah', 'sejarah', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sejarah.php */
/* Location: ./application/controllers/Sejarah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-25 19:14:18 */
/* http://harviacode.com */