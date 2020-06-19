<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends MY_Controller {

    // protected $access=array('Admin');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Grafik_model');
        $this->load->library('form_validation');
    }
    

    public function key_token()
	{
		$this->load->view('app_token.py');
	}

	public function index()
	{	

        $data=array(
            'user'=>$this->db->get('user'),
            'aparatur'=>$this->db->get('aparatur'),
            'bidang_kerja'=>$this->db->get('bidang_kerja'),
            'berita'=>$this->db->get('berita')
            
        );
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
        
    } 
  

    public function get_data()
	{
		$this->load->model('Grafik_model');
		$data 	= $this->Grafik_model->get_data();
		$cek	= json_encode($data);
		print_r($cek);
		exit(); 
	}
    public function get_data2()
	{
		$this->load->model('Grafik_model');
		$data 	= $this->Grafik_model->get_data2();
		$cek	= json_encode($data);
		print_r($cek);
		exit(); 
    }
    
    public function ambil_data()
    {
        $jenis_bbm = $_POST['jenis_bbm'];
        $data = $this->db->query("SELECT * FROM stok WHERE bbm='$jenis_bbm'")->result();
        foreach($data as $dd)
        {
            $data =array(
                'stok'=>$dd->stok,
            );
            
           echo json_encode($data);
        }
    }
}
?>