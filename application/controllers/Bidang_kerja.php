<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bidang_kerja extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bidang_kerja_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bidang_kerja/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bidang_kerja/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bidang_kerja/index.dart';
            $config['first_url'] = base_url() . 'bidang_kerja/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Bidang_kerja_model->total_rows($q);
        $bidang_kerja = $this->Bidang_kerja_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bidang_kerja_data' => $bidang_kerja,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('bidang_kerja_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Bidang_kerja_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'icons' => $row->icons,
		'bidang' => $row->bidang,
		'deskripsi' => $row->deskripsi,
		'active' => $row->active,
	    );
            $this->load->view('header');
            $this->load->view('bidang_kerja_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bidang_kerja'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bidang_kerja/create_action'),
	    'id' => set_value('id'),
	    'icons' => set_value('icons'),
	    'bidang' => set_value('bidang'),
	    'deskripsi' => set_value('deskripsi'),
	    'active' => set_value('active'),
	);

        $this->load->view('header');
        $this->load->view('bidang_kerja_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'icons' => $this->input->post('icons',TRUE),
		'bidang' => $this->input->post('bidang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Bidang_kerja_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bidang_kerja'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Bidang_kerja_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bidang_kerja/update_action'),
		'id' => set_value('id', $row->id),
		'icons' => set_value('icons', $row->icons),
		'bidang' => set_value('bidang', $row->bidang),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'active' => set_value('active', $row->active),
	    );
            $this->load->view('header');
            $this->load->view('bidang_kerja_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bidang_kerja'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'icons' => $this->input->post('icons',TRUE),
		'bidang' => $this->input->post('bidang',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Bidang_kerja_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bidang_kerja'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Bidang_kerja_model->get_by_id($id);

        if ($row) {
            $this->Bidang_kerja_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bidang_kerja'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bidang_kerja'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('icons', 'icons', 'trim|required');
	$this->form_validation->set_rules('bidang', 'bidang', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bidang_kerja.php */
/* Location: ./application/controllers/Bidang_kerja.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 05:10:04 */
/* http://harviacode.com */