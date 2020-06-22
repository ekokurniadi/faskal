<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_fiskal extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_fiskal_model');
        $this->load->library('form_validation');
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
    }


    public function cetak_surat($id)
    {
        $dompdf= new Dompdf();
      
        $data['surat_data']=  $this->db->query("SELECT * from surat_fiskal where id='$id'")->row_array();
        $data['start']=0;
        $html=$this->load->view('surat_fiskal_print',$data,true);
       
        $dompdf->load_html($html);
        $dompdf->set_paper('A4','potrait');
        $dompdf->render();
       
        $pdf = $dompdf->output();
 
        $dompdf->stream('Surat Fiskal.pdf',array("Attachment"=>FALSE));
     }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat_fiskal/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat_fiskal/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat_fiskal/index.dart';
            $config['first_url'] = base_url() . 'surat_fiskal/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surat_fiskal_model->total_rows($q);
        $surat_fiskal = $this->Surat_fiskal_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_fiskal_data' => $surat_fiskal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('surat_fiskal_list', $data);
        $this->load->view('footer');
    }

	function kode()
    {
             $this->db->select('RIGHT(surat_fiskal.no_seri,2) as no_seri', FALSE);
             $this->db->order_by('no_seri','DESC');    
             $this->db->limit(1);    
             $query = $this->db->get('surat_fiskal');  //cek dulu apakah ada sudah ada kode di tabel.    
             if($query->num_rows() <> 0){      
                  //cek kode jika telah tersedia    
                  $data = $query->row();      
                  $kode = intval($data->no_seri) + 1; 
             }
             else{      
                  $kode = 1;  //cek jika kode belum terdapat pada table
             }  
                date_default_timezone_set("Asia/Jakarta");
                 $batas = str_pad($kode, 6, "0", STR_PAD_LEFT);    
                 $kodetampil = $batas;  //format kode
                 return $kodetampil;  
   }

   function kode2()
    {	
             $this->db->select('LEFT(surat_fiskal.no_surat,3) as no_surat', FALSE);
             $this->db->order_by('no_surat','DESC');    
             $this->db->limit(1);    
             $query = $this->db->get('surat_fiskal');  //cek dulu apakah ada sudah ada kode di tabel.    
             if($query->num_rows() <> 0){      
                  //cek kode jika telah tersedia    
                  $data = $query->row();      
                  $kode = intval($data->no_surat) + 1; 
             }
             else{      
                  $kode = 1;  //cek jika kode belum terdapat pada table
             }  
                date_default_timezone_set("Asia/Jakarta");
                 $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                 $batas1 = str_pad($kode, 6, "0", STR_PAD_LEFT);    
				 $bulan = date('n');
				 $tahun=date('Y');
				 $romawi = $this->getRomawi($bulan); 
                 $kodetampil = $batas." /".$batas1." /FAD"." /".$romawi." /".$tahun;  //format kode
                 return $kodetampil;  
        }

	function getRomawi($bln){
        	switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
              }
       }


    public function read($id) 
    {
        $row = $this->Surat_fiskal_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'no_seri' => $row->no_seri,
		'no_surat' => $row->no_surat,
		'nomor_polisi' => $row->nomor_polisi,
		'nama_pemilik' => $row->nama_pemilik,
		'alamat' => $row->alamat,
		'merktype_kendaraan' => $row->merktype_kendaraan,
		'tahuncc_kendaraan' => $row->tahuncc_kendaraan,
		'warna_kendaraan' => $row->warna_kendaraan,
		'nomor_chasis' => $row->nomor_chasis,
		'nomor_mesin' => $row->nomor_mesin,
		'jenis' => $row->jenis,
		'bbn_kb_sebesar' => $row->bbn_kb_sebesar,
		'tanggal_bbn_kb' => $row->tanggal_bbn_kb,
		'pkb_sebesar' => $row->pkb_sebesar,
		'tanggal_pkb' => $row->tanggal_pkb,
		'daerah_tujuan' => $row->daerah_tujuan,
		'untuk_atas_nama' => $row->untuk_atas_nama,
		'alamat_pemilik' => $row->alamat_pemilik,
		'tanggal_surat' => $row->tanggal_surat,
		'no_swdkllj' => $row->no_swdkllj,
		'tanggal_swdkllj' => $row->tanggal_swdkllj,
		'tanggal_akhir_berlaku_swdkllj' => $row->tanggal_akhir_berlaku_swdkllj,
		'pejabat_uptd' => $row->pejabat_uptd,
		'pejabat_jasaraharja' => $row->pejabat_jasaraharja,
	    );
            $this->load->view('header');
            $this->load->view('surat_fiskal_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_fiskal'));
        }
	}
	

	public function hapus_temp()
    {
        $id=$_GET['id'];
        $this->db->query("DELETE FROM detail_surat_fiskal where id='$id'");
    }

     // fungsi ajax
     public function load_temp()
     {
          echo " <table class='table table-bordered'>
                        <thead>
                        <tr>
                        <th width='20px;'>No</th>
                        <th>Tembusan</th>
                        <th width='120px;'>Action</th>
                        </tr>
                    </thead>";
                     $id=$_GET['no_seri'];
                     $no=1;
                     $data = $this->db->query("SELECT * FROM detail_surat_fiskal where no_seri='$id'")->result();
                     foreach ($data as $d) {
                      
                         echo "<tbody><tr id='dataku$d->id'>
                                 <td>$no</td>
                                 <td>$d->tembusan</td>
                                 <td><button type ='button' class='btn btn-icon btn-sm btn-danger' onClick='hapus($d->id)'><i class='fa fa-close'></i> Batal</td>
                              </tr>
                            </tbody>  ";
                         $no++;
                         
                     }
                     echo "</table>"; 
                    
     }
     public function load_temp2()
     {
         echo " <table class='table table-bordered table-striped table-hover'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Tembusan</th>
                       
                        </tr>
                    </thead>";
                     $id=$_GET['no_seri'];
                     $no=1;
                     $data = $this->db->query("SELECT * FROM detail_surat_fiskal where no_seri='$id'")->result();
                     foreach ($data as $d) {
                      
                         echo "<tbody><tr id='dataku$d->id'>
                                 <td>$no</td>
                                 <td>$d->tembusan</td>
                                
                              </tr>
                            </tbody>  ";
                         $no++;
                         
                     }
                     echo "</table>";  
                    
     }

     function input_ajax()
    {
 
         $no_seri       = $_GET['no_seri'];
         $tembusan      = $_GET['tembusan'];
        $data=array(
            'no_seri'=>$no_seri,
            'tembusan'=>$tembusan, 
            );
        $this->db->insert('detail_surat_fiskal',$data);
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surat_fiskal/create_action'),
	    'id' => set_value('id'),
	    'no_seri' => set_value('no_seri'),
	    'no_surat' => set_value('no_surat'),
	    'nomor_polisi' => set_value('nomor_polisi'),
	    'nama_pemilik' => set_value('nama_pemilik'),
	    'alamat' => set_value('alamat'),
	    'merktype_kendaraan' => set_value('merktype_kendaraan'),
	    'tahuncc_kendaraan' => set_value('tahuncc_kendaraan'),
	    'warna_kendaraan' => set_value('warna_kendaraan'),
	    'nomor_chasis' => set_value('nomor_chasis'),
	    'nomor_mesin' => set_value('nomor_mesin'),
	    'jenis' => set_value('jenis'),
	    'bbn_kb_sebesar' => set_value('bbn_kb_sebesar'),
	    'tanggal_bbn_kb' => set_value('tanggal_bbn_kb'),
	    'pkb_sebesar' => set_value('pkb_sebesar'),
	    'tanggal_pkb' => set_value('tanggal_pkb'),
	    'daerah_tujuan' => set_value('daerah_tujuan'),
	    'untuk_atas_nama' => set_value('untuk_atas_nama'),
	    'alamat_pemilik' => set_value('alamat_pemilik'),
	    'tanggal_surat' => set_value('tanggal_surat'),
	    'no_swdkllj' => set_value('no_swdkllj'),
	    'tanggal_swdkllj' => set_value('tanggal_swdkllj'),
	    'tanggal_akhir_berlaku_swdkllj' => set_value('tanggal_akhir_berlaku_swdkllj'),
	    'pejabat_uptd' => set_value('pejabat_uptd'),
        'pejabat_jasaraharja' => set_value('pejabat_jasaraharja'),
        'pilih_merk'=>$this->db->query("select * from tipe_kendaraan")->result(),
        'pilih_warna'=>$this->db->query("select * from warna")->result(),
        'pilih_jenis'=>$this->db->query("select * from jenis_kendaraan")->result(),
        'pilih_daerah'=>$this->db->query("select * from daerah")->result(),
        'pilih_aparatur'=>$this->db->query("select * from aparatur")->result(),
	);
		$data['kode']=$this->kode();
		$data['kode2']=$this->kode2();
        $this->load->view('header');
        $this->load->view('surat_fiskal_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_seri' => $this->input->post('no_seri',TRUE),
		'no_surat' => $this->input->post('no_surat',TRUE),
		'nomor_polisi' => $this->input->post('nomor_polisi',TRUE),
		'nama_pemilik' => $this->input->post('nama_pemilik',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'merktype_kendaraan' => $this->input->post('merktype_kendaraan',TRUE),
		'tahuncc_kendaraan' => $this->input->post('tahuncc_kendaraan',TRUE),
		'warna_kendaraan' => $this->input->post('warna_kendaraan',TRUE),
		'nomor_chasis' => $this->input->post('nomor_chasis',TRUE),
		'nomor_mesin' => $this->input->post('nomor_mesin',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'bbn_kb_sebesar' => $this->input->post('bbn_kb_sebesar',TRUE),
		'tanggal_bbn_kb' => $this->input->post('tanggal_bbn_kb',TRUE),
		'pkb_sebesar' => $this->input->post('pkb_sebesar',TRUE),
		'tanggal_pkb' => $this->input->post('tanggal_pkb',TRUE),
		'daerah_tujuan' => $this->input->post('daerah_tujuan',TRUE),
		'untuk_atas_nama' => $this->input->post('untuk_atas_nama',TRUE),
		'alamat_pemilik' => $this->input->post('alamat_pemilik',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'no_swdkllj' => $this->input->post('no_swdkllj',TRUE),
		'tanggal_swdkllj' => $this->input->post('tanggal_swdkllj',TRUE),
		'tanggal_akhir_berlaku_swdkllj' => $this->input->post('tanggal_akhir_berlaku_swdkllj',TRUE),
		'pejabat_uptd' => $this->input->post('pejabat_uptd',TRUE),
		'pejabat_jasaraharja' => $this->input->post('pejabat_jasaraharja',TRUE),
	    );

            $this->Surat_fiskal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat_fiskal'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_fiskal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_fiskal/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('no_seri', $row->no_seri),
		'kode2' => set_value('no_surat', $row->no_surat),
		'nomor_polisi' => set_value('nomor_polisi', $row->nomor_polisi),
		'nama_pemilik' => set_value('nama_pemilik', $row->nama_pemilik),
		'alamat' => set_value('alamat', $row->alamat),
		'merktype_kendaraan' => set_value('merktype_kendaraan', $row->merktype_kendaraan),
		'tahuncc_kendaraan' => set_value('tahuncc_kendaraan', $row->tahuncc_kendaraan),
		'warna_kendaraan' => set_value('warna_kendaraan', $row->warna_kendaraan),
		'nomor_chasis' => set_value('nomor_chasis', $row->nomor_chasis),
		'nomor_mesin' => set_value('nomor_mesin', $row->nomor_mesin),
		'jenis' => set_value('jenis', $row->jenis),
		'bbn_kb_sebesar' => set_value('bbn_kb_sebesar', $row->bbn_kb_sebesar),
		'tanggal_bbn_kb' => set_value('tanggal_bbn_kb', $row->tanggal_bbn_kb),
		'pkb_sebesar' => set_value('pkb_sebesar', $row->pkb_sebesar),
		'tanggal_pkb' => set_value('tanggal_pkb', $row->tanggal_pkb),
		'daerah_tujuan' => set_value('daerah_tujuan', $row->daerah_tujuan),
		'untuk_atas_nama' => set_value('untuk_atas_nama', $row->untuk_atas_nama),
		'alamat_pemilik' => set_value('alamat_pemilik', $row->alamat_pemilik),
		'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
		'no_swdkllj' => set_value('no_swdkllj', $row->no_swdkllj),
		'tanggal_swdkllj' => set_value('tanggal_swdkllj', $row->tanggal_swdkllj),
		'tanggal_akhir_berlaku_swdkllj' => set_value('tanggal_akhir_berlaku_swdkllj', $row->tanggal_akhir_berlaku_swdkllj),
		'pejabat_uptd' => set_value('pejabat_uptd', $row->pejabat_uptd),
        'pejabat_jasaraharja' => set_value('pejabat_jasaraharja', $row->pejabat_jasaraharja),
        'pilih_merk'=>$this->db->query("select * from tipe_kendaraan")->result(),
        'pilih_warna'=>$this->db->query("select * from warna")->result(),
        'pilih_jenis'=>$this->db->query("select * from jenis_kendaraan")->result(),
        'pilih_daerah'=>$this->db->query("select * from daerah")->result(),
        'pilih_aparatur'=>$this->db->query("select * from aparatur")->result(),
		);
            $this->load->view('header');
            $this->load->view('surat_fiskal_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_fiskal'));
        }
    }

    public function detail($id) 
    {
        $row = $this->Surat_fiskal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_fiskal/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('no_seri', $row->no_seri),
		'kode2' => set_value('no_surat', $row->no_surat),
		'nomor_polisi' => set_value('nomor_polisi', $row->nomor_polisi),
		'nama_pemilik' => set_value('nama_pemilik', $row->nama_pemilik),
		'alamat' => set_value('alamat', $row->alamat),
		'merktype_kendaraan' => set_value('merktype_kendaraan', $row->merktype_kendaraan),
		'tahuncc_kendaraan' => set_value('tahuncc_kendaraan', $row->tahuncc_kendaraan),
		'warna_kendaraan' => set_value('warna_kendaraan', $row->warna_kendaraan),
		'nomor_chasis' => set_value('nomor_chasis', $row->nomor_chasis),
		'nomor_mesin' => set_value('nomor_mesin', $row->nomor_mesin),
		'jenis' => set_value('jenis', $row->jenis),
		'bbn_kb_sebesar' => set_value('bbn_kb_sebesar', $row->bbn_kb_sebesar),
		'tanggal_bbn_kb' => set_value('tanggal_bbn_kb', $row->tanggal_bbn_kb),
		'pkb_sebesar' => set_value('pkb_sebesar', $row->pkb_sebesar),
		'tanggal_pkb' => set_value('tanggal_pkb', $row->tanggal_pkb),
		'daerah_tujuan' => set_value('daerah_tujuan', $row->daerah_tujuan),
		'untuk_atas_nama' => set_value('untuk_atas_nama', $row->untuk_atas_nama),
		'alamat_pemilik' => set_value('alamat_pemilik', $row->alamat_pemilik),
		'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
		'no_swdkllj' => set_value('no_swdkllj', $row->no_swdkllj),
		'tanggal_swdkllj' => set_value('tanggal_swdkllj', $row->tanggal_swdkllj),
		'tanggal_akhir_berlaku_swdkllj' => set_value('tanggal_akhir_berlaku_swdkllj', $row->tanggal_akhir_berlaku_swdkllj),
		'pejabat_uptd' => set_value('pejabat_uptd', $row->pejabat_uptd),
        'pejabat_jasaraharja' => set_value('pejabat_jasaraharja', $row->pejabat_jasaraharja),
        'pilih_merk'=>$this->db->query("select * from tipe_kendaraan")->result(),
        'pilih_warna'=>$this->db->query("select * from warna")->result(),
        'pilih_jenis'=>$this->db->query("select * from jenis_kendaraan")->result(),
        'pilih_daerah'=>$this->db->query("select * from daerah")->result(),
        'pilih_aparatur'=>$this->db->query("select * from aparatur")->result(),
		);
            $this->load->view('header');
            $this->load->view('surat_fiskal_detail', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_fiskal'));
        }
    }
    
    public function arsip()
    {
        $this->load->view('header');
        $this->load->view('arsip');
        $this->load->view('footer');
    }
   
    public function proses()
    {
        echo " <table class='table table-bordered'>
                        <thead>
                        <tr>
                        <th width='20px;'>No</th>
                        <th>No Seri</th>
                        <th>No Surat</th>
                        <th>No Polisi</th>
                        <th>Nama Pemilik</th>
                        <th>Alamat</th>
                        <th width='120px;'>Action</th>
                        </tr>
                    </thead>";
                     $tanggal1=$_GET['tanggal1'];
                     $tanggal2=$_GET['tanggal2'];
                     $no=1;
                     $data = $this->db->query("SELECT * FROM surat_fiskal where tanggal_surat between '$tanggal1' and '$tanggal2' ")->result();
                     foreach ($data as $d) {
                      
                         echo "<tbody><tr id='dataku$d->id'>
                                 <td>$no</td>
                                 <td>$d->no_seri</td>
                                 <td>$d->no_surat</td>
                                 <td>$d->nomor_polisi</td>
                                 <td>$d->nama_pemilik</td>
                                 <td>$d->alamat</td>
                                 <td><a href='cetak_surat/$d->id' target='_blank' class='btn btn-sm btn-success'><i class='fa fa-print'> Cetak</a></td>
                              </tr>
                            </tbody>  ";
                         $no++;
                         
                     }
                     echo "</table>";
    }

    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'no_seri' => $this->input->post('no_seri',TRUE),
		'no_surat' => $this->input->post('no_surat',TRUE),
		'nomor_polisi' => $this->input->post('nomor_polisi',TRUE),
		'nama_pemilik' => $this->input->post('nama_pemilik',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'merktype_kendaraan' => $this->input->post('merktype_kendaraan',TRUE),
		'tahuncc_kendaraan' => $this->input->post('tahuncc_kendaraan',TRUE),
		'warna_kendaraan' => $this->input->post('warna_kendaraan',TRUE),
		'nomor_chasis' => $this->input->post('nomor_chasis',TRUE),
		'nomor_mesin' => $this->input->post('nomor_mesin',TRUE),
		'jenis' => $this->input->post('jenis',TRUE),
		'bbn_kb_sebesar' => $this->input->post('bbn_kb_sebesar',TRUE),
		'tanggal_bbn_kb' => $this->input->post('tanggal_bbn_kb',TRUE),
		'pkb_sebesar' => $this->input->post('pkb_sebesar',TRUE),
		'tanggal_pkb' => $this->input->post('tanggal_pkb',TRUE),
		'daerah_tujuan' => $this->input->post('daerah_tujuan',TRUE),
		'untuk_atas_nama' => $this->input->post('untuk_atas_nama',TRUE),
		'alamat_pemilik' => $this->input->post('alamat_pemilik',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'no_swdkllj' => $this->input->post('no_swdkllj',TRUE),
		'tanggal_swdkllj' => $this->input->post('tanggal_swdkllj',TRUE),
		'tanggal_akhir_berlaku_swdkllj' => $this->input->post('tanggal_akhir_berlaku_swdkllj',TRUE),
		'pejabat_uptd' => $this->input->post('pejabat_uptd',TRUE),
		'pejabat_jasaraharja' => $this->input->post('pejabat_jasaraharja',TRUE),
	    );

            $this->Surat_fiskal_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat_fiskal'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_fiskal_model->get_by_id($id);

        if ($row) {
            $this->Surat_fiskal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_fiskal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_fiskal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_seri', 'no seri', 'trim|required');
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('nomor_polisi', 'nomor polisi', 'trim|required');
	$this->form_validation->set_rules('nama_pemilik', 'nama pemilik', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('merktype_kendaraan', 'merktype kendaraan', 'trim|required');
	$this->form_validation->set_rules('tahuncc_kendaraan', 'tahuncc kendaraan', 'trim|required');
	$this->form_validation->set_rules('warna_kendaraan', 'warna kendaraan', 'trim|required');
	$this->form_validation->set_rules('nomor_chasis', 'nomor chasis', 'trim|required');
	$this->form_validation->set_rules('nomor_mesin', 'nomor mesin', 'trim|required');
	$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
	$this->form_validation->set_rules('bbn_kb_sebesar', 'bbn kb sebesar', 'trim|numeric');
	$this->form_validation->set_rules('tanggal_bbn_kb', 'tanggal bbn kb', 'trim|');
	$this->form_validation->set_rules('pkb_sebesar', 'pkb sebesar', 'trim|required|numeric');
	$this->form_validation->set_rules('tanggal_pkb', 'tanggal pkb', 'trim|required');
	$this->form_validation->set_rules('daerah_tujuan', 'daerah tujuan', 'trim|required');
	$this->form_validation->set_rules('untuk_atas_nama', 'untuk atas nama', 'trim|required');
	$this->form_validation->set_rules('alamat_pemilik', 'alamat pemilik', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
	$this->form_validation->set_rules('no_swdkllj', 'no swdkllj', 'trim|required');
	$this->form_validation->set_rules('tanggal_swdkllj', 'tanggal swdkllj', 'trim|required');
	$this->form_validation->set_rules('tanggal_akhir_berlaku_swdkllj', 'tanggal akhir berlaku swdkllj', 'trim|required');
	$this->form_validation->set_rules('pejabat_uptd', 'pejabat uptd', 'trim|required');
	$this->form_validation->set_rules('pejabat_jasaraharja', 'pejabat jasaraharja', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "surat_fiskal.xls";
        $judul = "surat_fiskal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Seri");
	xlsWriteLabel($tablehead, $kolomhead++, "No Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Polisi");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pemilik");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Merktype Kendaraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahuncc Kendaraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Warna Kendaraan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Chasis");
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Mesin");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
	xlsWriteLabel($tablehead, $kolomhead++, "Bbn Kb Sebesar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Bbn Kb");
	xlsWriteLabel($tablehead, $kolomhead++, "Pkb Sebesar");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pkb");
	xlsWriteLabel($tablehead, $kolomhead++, "Daerah Tujuan");
	xlsWriteLabel($tablehead, $kolomhead++, "Untuk Atas Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Pemilik");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Swdkllj");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Swdkllj");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Akhir Berlaku Swdkllj");
	xlsWriteLabel($tablehead, $kolomhead++, "Pejabat Uptd");
	xlsWriteLabel($tablehead, $kolomhead++, "Pejabat Jasaraharja");

	foreach ($this->Surat_fiskal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_seri);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_polisi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pemilik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->merktype_kendaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahuncc_kendaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->warna_kendaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_chasis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_mesin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteNumber($tablebody, $kolombody++, $data->bbn_kb_sebesar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_bbn_kb);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pkb_sebesar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_pkb);
	    xlsWriteLabel($tablebody, $kolombody++, $data->daerah_tujuan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->untuk_atas_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_pemilik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_swdkllj);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_swdkllj);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_akhir_berlaku_swdkllj);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pejabat_uptd);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pejabat_jasaraharja);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=surat_fiskal.doc");

        $data = array(
            'surat_fiskal_data' => $this->Surat_fiskal_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('surat_fiskal_doc',$data);
    }

}

/* End of file Surat_fiskal.php */
/* Location: ./application/controllers/Surat_fiskal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 10:10:48 */
/* http://harviacode.com */