<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Slider_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'slider/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'slider/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'slider/index.dart';
            $config['first_url'] = base_url() . 'slider/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Slider_model->total_rows($q);
        $slider = $this->Slider_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'slider_data' => $slider,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('slider_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Slider_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'foto' => $row->foto,
		'title' => $row->title,
		'subtitle' => $row->subtitle,
	    );
            $this->load->view('header');
            $this->load->view('slider_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('slider/create_action'),
	    'id' => set_value('id'),
	    'foto' => set_value('foto'),
	    'title' => set_value('title'),
	    'subtitle' => set_value('subtitle'),
	);

        $this->load->view('header');
        $this->load->view('slider_form', $data);
        $this->load->view('footer');
    }
    
    
    public function create_action() 
    {
        $this->load->library('upload');
            $nmfile = "slider".time();
            $config['upload_path']   = './image/';
            $config['overwrite']     = true;
            $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG|jfif';
            $config['file_name'] = $nmfile;

            $this->upload->initialize($config);

            if($_FILES['foto']['name'])
            {
                if($this->upload->do_upload('foto'))
                {
                $gbr = $this->upload->data();
                $data = array(
                    'foto' =>  $gbr['file_name'],
                    'title' => $this->input->post('title',TRUE),
                    'subtitle' => $this->input->post('subtitle',TRUE),
                );

                $this->Slider_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('slider'));
            }
        }
    }


    public function update($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('slider/update_action'),
		'id' => set_value('id', $row->id),
		'foto' => set_value('foto', $row->foto),
		'title' => set_value('title', $row->title),
		'subtitle' => set_value('subtitle', $row->subtitle),
	    );
            $this->load->view('header');
            $this->load->view('slider_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }
     
    public function update_action() 
    {
        $this->load->library('upload');
        $nmfile = "slider".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG|jfif';
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
                                'title' => $this->input->post('title',TRUE),
                                'subtitle' => $this->input->post('subtitle',TRUE),
                                'foto' => $gbr['file_name'],
                            );
                        }
                    }
                  
                    $this->Slider_model->update($this->input->post('id', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('slider'));
                }
                    else
                        {
                            $data = array(
                                'title' => $this->input->post('title',TRUE),
                                'subtitle' => $this->input->post('subtitle',TRUE),
                            );
                        }
                    
                        $this->Slider_model->update($this->input->post('id', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('slider'));
    }

    public function delete($id) 
    {
        $row = $this->Slider_model->get_by_id($id);

        if ($row) {
            unlink('image/'.$row->foto);
            $this->Slider_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slider'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slider'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('subtitle', 'subtitle', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Slider.php */
/* Location: ./application/controllers/Slider.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 05:05:23 */
/* http://harviacode.com */