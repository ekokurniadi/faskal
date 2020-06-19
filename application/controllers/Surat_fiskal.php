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
	);

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
		'no_seri' => set_value('no_seri', $row->no_seri),
		'no_surat' => set_value('no_surat', $row->no_surat),
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
	    );
            $this->load->view('header');
            $this->load->view('surat_fiskal_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_fiskal'));
        }
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
	$this->form_validation->set_rules('bbn_kb_sebesar', 'bbn kb sebesar', 'trim|required|numeric');
	$this->form_validation->set_rules('tanggal_bbn_kb', 'tanggal bbn kb', 'trim|required');
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