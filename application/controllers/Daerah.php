<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Daerah extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Daerah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'daerah/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'daerah/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'daerah/index.dart';
            $config['first_url'] = base_url() . 'daerah/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Daerah_model->total_rows($q);
        $daerah = $this->Daerah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'daerah_data' => $daerah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('daerah_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Daerah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'provinsi' => $row->provinsi,
		'kabupaten' => $row->kabupaten,
		'kecamatan' => $row->kecamatan,
	    );
            $this->load->view('header');
            $this->load->view('daerah_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daerah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('daerah/create_action'),
	    'id' => set_value('id'),
	    'provinsi' => set_value('provinsi'),
	    'kabupaten' => set_value('kabupaten'),
	    'kecamatan' => set_value('kecamatan'),
	);

        $this->load->view('header');
        $this->load->view('daerah_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );

            $this->Daerah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('daerah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Daerah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('daerah/update_action'),
		'id' => set_value('id', $row->id),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'kecamatan' => set_value('kecamatan', $row->kecamatan),
	    );
            $this->load->view('header');
            $this->load->view('daerah_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daerah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'kecamatan' => $this->input->post('kecamatan',TRUE),
	    );

            $this->Daerah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('daerah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Daerah_model->get_by_id($id);

        if ($row) {
            $this->Daerah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('daerah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('daerah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "daerah.xls";
        $judul = "daerah";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kabupaten");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan");

	foreach ($this->Daerah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kabupaten);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=daerah.doc");

        $data = array(
            'daerah_data' => $this->Daerah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('daerah_doc',$data);
    }

}

/* End of file Daerah.php */
/* Location: ./application/controllers/Daerah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 09:52:05 */
/* http://harviacode.com */