<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aparatur extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aparatur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'aparatur/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'aparatur/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'aparatur/index.dart';
            $config['first_url'] = base_url() . 'aparatur/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Aparatur_model->total_rows($q);
        $aparatur = $this->Aparatur_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'aparatur_data' => $aparatur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('aparatur_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Aparatur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nip' => $row->nip,
		'nama' => $row->nama,
		'jabatan' => $row->jabatan,
		'bagian' => $row->bagian,
		'foto' => $row->foto,
	    );
            $this->load->view('header');
            $this->load->view('aparatur_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aparatur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('aparatur/create_action'),
	    'id' => set_value('id'),
	    'nip' => set_value('nip'),
	    'nama' => set_value('nama'),
	    'jabatan' => set_value('jabatan'),
	    'bagian' => set_value('bagian'),
        'foto' => set_value('foto'),
        'pilih_jabatan'=>$this->db->query("SELECT * FROM jabatan")->result(),
        'pilih_pangkat'=>$this->db->query("SELECT * from bidang_kerja where active='active'")->result()
	);

        $this->load->view('header');
        $this->load->view('aparatur_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->load->library('upload');
            $nmfile = "aparatur".time();
            $config['upload_path']   = './image/';
            $config['overwrite']     = true;
            $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
            $config['file_name'] = $nmfile;

            $this->upload->initialize($config);

            if($_FILES['foto']['name'])
            {
                if($this->upload->do_upload('foto'))
                {
                $gbr = $this->upload->data();
                $data = array(
                    'foto' =>  $gbr['file_name'],
                    'nip' => $this->input->post('nip',TRUE),
                    'nama' => $this->input->post('nama',TRUE),
                    'jabatan' => $this->input->post('jabatan',TRUE),
                    'bagian' => $this->input->post('bagian',TRUE),
                );

                $this->Aparatur_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('aparatur'));
            }
        }
    }


    public function update($id) 
    {
        $row = $this->Aparatur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('aparatur/update_action'),
		'id' => set_value('id', $row->id),
		'nip' => set_value('nip', $row->nip),
		'nama' => set_value('nama', $row->nama),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'bagian' => set_value('bagian', $row->bagian),
        'foto' => set_value('foto', $row->foto),
        'pilih_jabatan'=>$this->db->query("SELECT * FROM jabatan")->result(),
        'pilih_pangkat'=>$this->db->query("SELECT * from bidang_kerja where active='active'")->result()
	    );
            $this->load->view('header');
            $this->load->view('aparatur_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aparatur'));
        }
    }
    
   
    public function update_action() 
    {
        $this->load->library('upload');
        $nmfile = "aparat".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
        $config['file_name'] = $nmfile;

        $this->upload->initialize($config);
        
                if(!empty($_FILES['foto']['name']))
                {  
                        unlink("./image/".$this->input->post('foto'));

                    if($_FILES['foto']['name'])
                    {
                        if($this->upload->do_upload('foto'))
                        {
                            $gbr = $this->upload->data();
                            $data = array(
                                'nip' => $this->input->post('nip',TRUE),
                                'nama' => $this->input->post('nama',TRUE),
                                'jabatan' => $this->input->post('jabatan',TRUE),
                                'bagian' => $this->input->post('bagian',TRUE),
                                'foto' => $gbr['file_name'],
                            );
                        }
                    }
                  
                    $this->Aparatur_model->update($this->input->post('id', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('aparatur'));
                }
                    else
                        {
                            $data = array(
                                'nip' => $this->input->post('nip',TRUE),
                                'nama' => $this->input->post('nama',TRUE),
                                'jabatan' => $this->input->post('jabatan',TRUE),
                                'bagian' => $this->input->post('bagian',TRUE),
                            );
                        }
                    
                        $this->Aparatur_model->update($this->input->post('id', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('aparatur'));
    }
    
    public function delete($id) 
    {
        $row = $this->Aparatur_model->get_by_id($id);

        if ($row) {
            unlink('image/'.$row->foto);
            $this->Aparatur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('aparatur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aparatur'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('bagian', 'bagian', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Aparatur.php */
/* Location: ./application/controllers/Aparatur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 16:59:08 */
/* http://harviacode.com */