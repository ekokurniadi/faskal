<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_kendaraan extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_kendaraan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_kendaraan/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_kendaraan/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_kendaraan/index.dart';
            $config['first_url'] = base_url() . 'jenis_kendaraan/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_kendaraan_model->total_rows($q);
        $jenis_kendaraan = $this->Jenis_kendaraan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_kendaraan_data' => $jenis_kendaraan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('jenis_kendaraan_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Jenis_kendaraan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jenis_kendaraan' => $row->jenis_kendaraan,
	    );
            $this->load->view('header');
            $this->load->view('jenis_kendaraan_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kendaraan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_kendaraan/create_action'),
	    'id' => set_value('id'),
	    'jenis_kendaraan' => set_value('jenis_kendaraan'),
	);

        $this->load->view('header');
        $this->load->view('jenis_kendaraan_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_kendaraan' => $this->input->post('jenis_kendaraan',TRUE),
	    );

            $this->Jenis_kendaraan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_kendaraan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Jenis_kendaraan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_kendaraan/update_action'),
		'id' => set_value('id', $row->id),
		'jenis_kendaraan' => set_value('jenis_kendaraan', $row->jenis_kendaraan),
	    );
            $this->load->view('header');
            $this->load->view('jenis_kendaraan_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kendaraan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jenis_kendaraan' => $this->input->post('jenis_kendaraan',TRUE),
	    );

            $this->Jenis_kendaraan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_kendaraan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_kendaraan_model->get_by_id($id);

        if ($row) {
            $this->Jenis_kendaraan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_kendaraan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_kendaraan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_kendaraan', 'jenis kendaraan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_kendaraan.xls";
        $judul = "jenis_kendaraan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kendaraan");

	foreach ($this->Jenis_kendaraan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kendaraan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis_kendaraan.doc");

        $data = array(
            'jenis_kendaraan_data' => $this->Jenis_kendaraan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenis_kendaraan_doc',$data);
    }

}

/* End of file Jenis_kendaraan.php */
/* Location: ./application/controllers/Jenis_kendaraan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 09:52:13 */
/* http://harviacode.com */