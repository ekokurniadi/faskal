<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Warna extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Warna_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'warna/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'warna/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'warna/index.dart';
            $config['first_url'] = base_url() . 'warna/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Warna_model->total_rows($q);
        $warna = $this->Warna_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'warna_data' => $warna,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('warna_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Warna_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'warna' => $row->warna,
	    );
            $this->load->view('header');
            $this->load->view('warna_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('warna/create_action'),
	    'id' => set_value('id'),
	    'warna' => set_value('warna'),
	);

        $this->load->view('header');
        $this->load->view('warna_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Warna_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('warna'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Warna_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('warna/update_action'),
		'id' => set_value('id', $row->id),
		'warna' => set_value('warna', $row->warna),
	    );
            $this->load->view('header');
            $this->load->view('warna_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'warna' => $this->input->post('warna',TRUE),
	    );

            $this->Warna_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('warna'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Warna_model->get_by_id($id);

        if ($row) {
            $this->Warna_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('warna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('warna'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('warna', 'warna', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "warna.xls";
        $judul = "warna";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Warna");

	foreach ($this->Warna_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warna);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=warna.doc");

        $data = array(
            'warna_data' => $this->Warna_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('warna_doc',$data);
    }

}

/* End of file Warna.php */
/* Location: ./application/controllers/Warna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 09:52:27 */
/* http://harviacode.com */