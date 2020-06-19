<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_berita extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_berita_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kategori_berita/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kategori_berita/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kategori_berita/index.dart';
            $config['first_url'] = base_url() . 'kategori_berita/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kategori_berita_model->total_rows($q);
        $kategori_berita = $this->Kategori_berita_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kategori_berita_data' => $kategori_berita,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('kategori_berita_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Kategori_berita_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kategori_berita' => $row->kategori_berita,
		'active' => $row->active,
	    );
            $this->load->view('header');
            $this->load->view('kategori_berita_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_berita'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kategori_berita/create_action'),
	    'id' => set_value('id'),
	    'kategori_berita' => set_value('kategori_berita'),
	    'active' => set_value('active'),
	);

        $this->load->view('header');
        $this->load->view('kategori_berita_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kategori_berita' => $this->input->post('kategori_berita',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Kategori_berita_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategori_berita'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_berita_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kategori_berita/update_action'),
		'id' => set_value('id', $row->id),
		'kategori_berita' => set_value('kategori_berita', $row->kategori_berita),
		'active' => set_value('active', $row->active),
	    );
            $this->load->view('header');
            $this->load->view('kategori_berita_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_berita'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kategori_berita' => $this->input->post('kategori_berita',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Kategori_berita_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategori_berita'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kategori_berita_model->get_by_id($id);

        if ($row) {
            $this->Kategori_berita_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategori_berita'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategori_berita'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kategori_berita', 'kategori berita', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kategori_berita.php */
/* Location: ./application/controllers/Kategori_berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 04:27:00 */
/* http://harviacode.com */