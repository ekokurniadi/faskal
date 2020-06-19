<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pesan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_berita'=>$this->db->query("SELECT a.id as linknya,a.id_kategori,a.foto,a.judul,a.berita,a.posted_by,a.tanggal_posting,b.kategori_berita as kategori,b.id from berita a left join kategori_berita b on a.id_kategori=b.id where a.active='active' ORDER BY a.id ASC")->result(),
            'data_bidang'=>$this->db->query("select * from bidang_kerja where active='active'")->result(),
            'data_slider'=>$this->db->query("SELECT * FROM slider order by id ASC")->result(),
            'data_galeri'=>$this->db->query("SELECT * FROM galeri")->result()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/slider',$data); 
        $this->load->view('page/bidang',$data);
        $this->load->view('page/galeri',$data);
        $this->load->view('page/informasi',$data);
        $this->load->view('page/footer_web'); 

    }

    public function informasi()
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_berita'=>$this->db->query("SELECT a.id as linknya,a.id_kategori,a.foto,a.judul,a.berita,a.posted_by,a.tanggal_posting,b.kategori_berita as kategori,b.id from berita a left join kategori_berita b on a.id_kategori=b.id where a.active='active' ORDER BY a.id ASC")->result(),
            'data_bidang'=>$this->db->query("select * from bidang_kerja where active='active'")->result(),
            'data_slider'=>$this->db->query("SELECT * FROM slider order by id ASC")->result(),
            'data_galeri'=>$this->db->query("SELECT * FROM galeri")->result()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/berita_all',$data);
        $this->load->view('page/footer_web'); 

    }

    public function galeri()
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_berita'=>$this->db->query("SELECT a.id as linknya,a.id_kategori,a.foto,a.judul,a.berita,a.posted_by,a.tanggal_posting,b.kategori_berita as kategori,b.id from berita a left join kategori_berita b on a.id_kategori=b.id where a.active='active' ORDER BY a.id ASC")->result(),
            'data_bidang'=>$this->db->query("select * from bidang_kerja where active='active'")->result(),
            'data_slider'=>$this->db->query("SELECT * FROM slider order by id ASC")->result(),
            'data_galeri'=>$this->db->query("SELECT * FROM galeri")->result()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/galeri_all',$data);
        $this->load->view('page/footer_web'); 

    }

    public function tentang() 
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_tentang'=>$this->db->query("SELECT tentang_kami from tentang_kami LIMIT 1")->row_array()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/tentang_kami',$data);
        $this->load->view('page/footer_web');
    }

    public function sejarah() 
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_sejarah'=>$this->db->query("SELECT sejarah from sejarah LIMIT 1")->row_array()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/sejarah',$data);
        $this->load->view('page/footer_web');
    }

    public function visi_kami() 
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_visi'=>$this->db->query("SELECT visi from visi where active ='active' LIMIT 1")->row_array()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/visi_kami',$data);
        $this->load->view('page/footer_web');
    }

    public function misi_kami() 
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_misi'=>$this->db->query("SELECT misi from misi where active ='active' LIMIT 1")->row_array()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/misi_kami',$data);
        $this->load->view('page/footer_web');
    }
    public function aparat() 
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_aparat'=>$this->db->query("SELECT * from aparatur order by id ASC")->result()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/aparatur',$data);
        $this->load->view('page/footer_web');
    }

    public function readmore($id) 
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_read'=>$this->db->query("SELECT * from berita where id='$id'")->row_array()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/readmore',$data);
        $this->load->view('page/footer_web');
    }

    public function bidang($id) 
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_bidang'=>$this->db->query("SELECT * from bidang_kerja where id='$id'")->row_array()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/bagian',$data);
        $this->load->view('page/footer_web');
    }

    public function contact_us()
    {
        $data=array(
            'data_kontak'=>$this->db->query("SELECT * FROM kontak LIMIT 1")->row_array(),
            'data_tentang'=>$this->db->query("SELECT tentang_kami from tentang_kami LIMIT 1")->row_array()
        );
        $this->load->view('page/header_web',$data);
        $this->load->view('page/contact_us',$data);
        $this->load->view('page/footer_web'); 
    }

    public function create_action() 
    {
      
            $data = array(
		'first_name' => $this->input->post('first_name',TRUE),
		'last_name' => $this->input->post('last_name',TRUE),
		'email_address' => $this->input->post('email_address',TRUE),
		'telp' => $this->input->post('telp',TRUE),
		'pesan' => $this->input->post('pesan',TRUE),
	    );

            $this->Pesan_model->insert($data);
            $_SESSION['pesan'] 	= "Pesan berhasil dikirim";
            redirect(site_url('web/contact_us'));
    }

}

/* End of file Web.php */


?>