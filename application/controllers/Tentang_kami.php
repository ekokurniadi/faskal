<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tentang_kami extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tentang_kami_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tentang_kami/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tentang_kami/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tentang_kami/index.dart';
            $config['first_url'] = base_url() . 'tentang_kami/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tentang_kami_model->total_rows($q);
        $tentang_kami = $this->Tentang_kami_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tentang_kami_data' => $tentang_kami,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('tentang_kami_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Tentang_kami_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'logo' => $row->logo,
		'tentang_kami' => $row->tentang_kami,
	    );
            $this->load->view('header');
            $this->load->view('tentang_kami_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tentang_kami'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tentang_kami/create_action'),
	    'id' => set_value('id'),
	    'logo' => set_value('logo'),
	    'tentang_kami' => set_value('tentang_kami'),
	);

        $this->load->view('header');
        $this->load->view('tentang_kami_form', $data);
        $this->load->view('footer');
    }
    
    // public function create_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->create();
    //     } else {
    //         $data = array(
	// 	'logo' => $this->input->post('logo',TRUE),
	// 	'tentang_kami' => $this->input->post('tentang_kami',TRUE),
	//     );

    //         $this->Tentang_kami_model->insert($data);
    //         $this->session->set_flashdata('message', 'Create Record Success');
    //         redirect(site_url('tentang_kami'));
    //     }
    // }
    
    public function create_action() 
    {
        $this->load->library('upload');
            $nmfile = "logo".time();
            $config['upload_path']   = './image/';
            $config['overwrite']     = true;
            $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
            $config['file_name'] = $nmfile;

            $this->upload->initialize($config);

            if($_FILES['logo']['name'])
            {
                if($this->upload->do_upload('logo'))
                {
                $gbr = $this->upload->data();
                $data = array(
                    'logo' =>  $gbr['file_name'],
                    'tentang_kami' => $this->input->post('tentang_kami',TRUE),
                );

                $this->Tentang_kami_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('tentang_kami')); 
            }
        }
    }

    public function update($id) 
    {
        $row = $this->Tentang_kami_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tentang_kami/update_action'),
		'id' => set_value('id', $row->id),
		'logo' => set_value('logo', $row->logo),
		'tentang_kami' => set_value('tentang_kami', $row->tentang_kami),
	    );
            $this->load->view('header');
            $this->load->view('tentang_kami_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tentang_kami'));
        }
    }
    
    // public function update_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->update($this->input->post('id', TRUE));
    //     } else {
    //         $data = array(
	// 	'logo' => $this->input->post('logo',TRUE),
	// 	'tentang_kami' => $this->input->post('tentang_kami',TRUE),
	//     );

    //         $this->Tentang_kami_model->update($this->input->post('id', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('tentang_kami'));
    //     }
    // }

    public function update_action() 
    {
        $this->load->library('upload');
        $nmfile = "logo".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
        $config['file_name'] = $nmfile;

        $this->upload->initialize($config);
        
                if(!empty($_FILES['logo']['name']))
                {  
                        unlink("./image/".$this->input->post('logo'));

                    if($_FILES['logo']['name'])
                    {
                        if($this->upload->do_upload('logo'))
                        {
                            $gbr = $this->upload->data();
                            $data = array(
                                'tentang_kami' => $this->input->post('tentang_kami',TRUE),
                                'logo' => $gbr['file_name'],
                            );
                        }
                    }
                  
                    $this->Tentang_kami_model->update($this->input->post('id', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('tentang_kami'));
                }
                    else
                        {
                            $data = array(
                                'tentang_kami' => $this->input->post('tentang_kami',TRUE),
                            );
                        }
                    
                        $this->Tentang_kami_model->update($this->input->post('id', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('tentang_kami'));
    }
    
    public function delete($id) 
    {
        $row = $this->Tentang_kami_model->get_by_id($id);

        if ($row) {
            unlink('image/'.$row->logo);
            $this->Tentang_kami_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tentang_kami'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tentang_kami'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('logo', 'logo', 'trim|required');
	$this->form_validation->set_rules('tentang_kami', 'tentang kami', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tentang_kami.php */
/* Location: ./application/controllers/Tentang_kami.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 14:02:49 */
/* http://harviacode.com */