<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tipe_kendaraan extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipe_kendaraan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tipe_kendaraan/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tipe_kendaraan/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tipe_kendaraan/index.dart';
            $config['first_url'] = base_url() . 'tipe_kendaraan/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tipe_kendaraan_model->total_rows($q);
        $tipe_kendaraan = $this->Tipe_kendaraan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tipe_kendaraan_data' => $tipe_kendaraan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('tipe_kendaraan_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Tipe_kendaraan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tipe_kendaraan' => $row->tipe_kendaraan,
	    );
            $this->load->view('header');
            $this->load->view('tipe_kendaraan_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kendaraan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tipe_kendaraan/create_action'),
	    'id' => set_value('id'),
	    'tipe_kendaraan' => set_value('tipe_kendaraan'),
	);

        $this->load->view('header');
        $this->load->view('tipe_kendaraan_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tipe_kendaraan' => $this->input->post('tipe_kendaraan',TRUE),
	    );

            $this->Tipe_kendaraan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tipe_kendaraan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tipe_kendaraan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tipe_kendaraan/update_action'),
		'id' => set_value('id', $row->id),
		'tipe_kendaraan' => set_value('tipe_kendaraan', $row->tipe_kendaraan),
	    );
            $this->load->view('header');
            $this->load->view('tipe_kendaraan_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kendaraan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tipe_kendaraan' => $this->input->post('tipe_kendaraan',TRUE),
	    );

            $this->Tipe_kendaraan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tipe_kendaraan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tipe_kendaraan_model->get_by_id($id);

        if ($row) {
            $this->Tipe_kendaraan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tipe_kendaraan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tipe_kendaraan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tipe_kendaraan', 'tipe kendaraan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tipe_kendaraan.xls";
        $judul = "tipe_kendaraan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tipe Kendaraan");

	foreach ($this->Tipe_kendaraan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tipe_kendaraan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tipe_kendaraan.doc");

        $data = array(
            'tipe_kendaraan_data' => $this->Tipe_kendaraan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tipe_kendaraan_doc',$data);
    }

}

/* End of file Tipe_kendaraan.php */
/* Location: ./application/controllers/Tipe_kendaraan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 09:52:21 */
/* http://harviacode.com */