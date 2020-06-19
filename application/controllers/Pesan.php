<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pesan extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pesan/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pesan/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pesan/index.dart';
            $config['first_url'] = base_url() . 'pesan/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pesan_model->total_rows($q);
        $pesan = $this->Pesan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pesan_data' => $pesan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('pesan_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Pesan_model->get_by_id($id);
        if ($row) {
            $query=$this->db->query("UPDATE pesan SET status ='1' where id='$id'");
            $data = array(
		'id' => $row->id,
		'first_name' => $row->first_name,
		'last_name' => $row->last_name,
		'email_address' => $row->email_address,
		'telp' => $row->telp,
		'pesan' => $row->pesan,
	    );
            $this->load->view('header');
            $this->load->view('pesan_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pesan/create_action'),
	    'id' => set_value('id'),
	    'first_name' => set_value('first_name'),
	    'last_name' => set_value('last_name'),
	    'email_address' => set_value('email_address'),
	    'telp' => set_value('telp'),
	    'pesan' => set_value('pesan'),
	);

        $this->load->view('header');
        $this->load->view('pesan_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email_address' => $this->input->post('email_address',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
	    );

            $this->Pesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pesan/update_action'),
		'id' => set_value('id', $row->id),
		'first_name' => set_value('first_name', $row->first_name),
		'last_name' => set_value('last_name', $row->last_name),
		'email_address' => set_value('email_address', $row->email_address),
		'telp' => set_value('telp', $row->telp),
		'pesan' => set_value('pesan', $row->pesan),
	    );
            $this->load->view('header');
            $this->load->view('pesan_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesan'));
        }
    }
    

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email_address' => $this->input->post('email_address',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
	    );

            $this->Pesan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pesan_model->get_by_id($id);

        if ($row) {
            $this->Pesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('email_address', 'email address', 'trim|required');
	$this->form_validation->set_rules('telp', 'telp', 'trim|required');
	$this->form_validation->set_rules('pesan', 'pesan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pesan.php */
/* Location: ./application/controllers/Pesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 05:27:41 */
/* http://harviacode.com */