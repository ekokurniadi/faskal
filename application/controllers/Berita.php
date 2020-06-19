<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'berita/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'berita/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'berita/index.dart';
            $config['first_url'] = base_url() . 'berita/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Berita_model->total_rows($q);
        $berita = $this->Berita_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'berita_data' => $berita,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('berita_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Berita_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_kategori' => $row->id_kategori,
		'judul' => $row->judul,
		'berita' => $row->berita,
		'tanggal_posting' => $row->tanggal_posting,
		'posted_by' => $row->posted_by,
		'foto' => $row->foto,
		'active' => $row->active,
	    );
            $this->load->view('header');
            $this->load->view('berita_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('berita'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('berita/create_action'),
	    'id' => set_value('id'),
	    'id_kategori' => set_value('id_kategori'),
	    'judul' => set_value('judul'),
	    'berita' => set_value('berita'),
	    'tanggal_posting' => set_value('tanggal_posting'),
	    'posted_by' => set_value('posted_by'),
	    'foto' => set_value('foto'),
        'active' => set_value('active'),
        'data_kategori'=>$this->db->query("SELECT * from kategori_berita where active ='active'")->result()
	);

        $this->load->view('header');
        $this->load->view('berita_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        
        $this->load->library('upload');
            $nmfile = "berita".time();
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
                    'id_kategori' => $this->input->post('id_kategori',TRUE),
                    'judul' => $this->input->post('judul',TRUE),
                    'berita' => $this->input->post('berita',TRUE),
                    'tanggal_posting' => $this->input->post('tanggal_posting',TRUE),
                    'posted_by' => $this->input->post('posted_by',TRUE),
                    'active' => $this->input->post('active',TRUE),
                );

                $this->Berita_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('berita'));
             }
        }
    }
    
    public function update($id) 
    {
        $row = $this->Berita_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('berita/update_action'),
		'id' => set_value('id', $row->id),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'judul' => set_value('judul', $row->judul),
		'berita' => set_value('berita', $row->berita),
		'tanggal_posting' => set_value('tanggal_posting', $row->tanggal_posting),
		'posted_by' => set_value('posted_by', $row->posted_by),
		'foto' => set_value('foto', $row->foto),
        'active' => set_value('active', $row->active),
        'data_kategori'=>$this->db->query("SELECT kategori_berita from kategori_berita where active ='active'")->result()
	    );
            $this->load->view('header');
            $this->load->view('berita_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('berita'));
        }
    }

    public function update_action() 
    {
        $this->load->library('upload');
        $nmfile = "berita".time();
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
                                'id_kategori' => $this->input->post('id_kategori',TRUE),
                                'judul' => $this->input->post('judul',TRUE),
                                'berita' => $this->input->post('berita',TRUE),
                                'tanggal_posting' => $this->input->post('tanggal_posting',TRUE),
                                'posted_by' => $this->input->post('posted_by',TRUE),
                                'active' => $this->input->post('active',TRUE),
                                'foto' => $gbr['file_name'],
                            );
                        }
                    }
                  
                    $this->Berita_model->update($this->input->post('id', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('berita'));
                }
                    else
                        {
                            $data = array(
                                'id_kategori' => $this->input->post('id_kategori',TRUE),
                                'judul' => $this->input->post('judul',TRUE),
                                'berita' => $this->input->post('berita',TRUE),
                                'tanggal_posting' => $this->input->post('tanggal_posting',TRUE),
                                'posted_by' => $this->input->post('posted_by',TRUE),
                                'active' => $this->input->post('active',TRUE),
                            );
                        }
                    
                        $this->Berita_model->update($this->input->post('id', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('berita'));
    }

    public function delete($id) 
    {
        $row = $this->Berita_model->get_by_id($id);

        if ($row) {
            unlink('image/'.$row->foto);
            $this->Berita_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('berita'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('berita'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('berita', 'berita', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('tanggal_posting', 'tanggal posting', 'trim|required');
	$this->form_validation->set_rules('posted_by', 'posted by', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-01-26 04:38:16 */
/* http://harviacode.com */