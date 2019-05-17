<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Mapel extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Mapel";
	}
	public function index()
	{
		$data['title']='Kelola '.$this->judul;
		$data['mapel']=$this->db->get('cbt_mapel')->result();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah()
	{
		$data['title']='Tambah '.$this->judul;
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
	}
	public function upload()
	{
		$data['title']='Upload '.$this->judul;
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/upload__data',$data);
		$this->load->view('admin/footer',$data);
	}
	public function edit($Urut=0)
	{
		$data['title']='Edit '.$this->judul;
		$this->db->where("Urut",$Urut);
		$data['u']=$this->db->get('cbt_mapel')->row();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
		$this->m_config->form_edit(base_url("admin/".$this->judul."/proedit/".$Urut),$data['u']);
	}
	public function protam($value='')
	{
		$this->db->where("XKodeMapel",$this->input->post("XNamaKelas"));
		if ($this->db->get('cbt_mapel')->num_rows() > 0) {
			$this->m_config->pindah("admin/mapel",0,"Kode Mapel yang anda gunakan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[
			'XKodeMapel' => strtoupper($this->input->post('XKodeMapel')), 
			'XNamaMapel' => strtoupper($this->input->post('XNamaMapel')), 
			'XKKM' => (int) $this->input->post('XKKM'), 
			'XMapelAgama' => $this->input->post('XMapelAgama'), 
			"LastUpdate" => time()
		];

		if ($this->db->insert('cbt_mapel',$data['submit'])) {
			$this->m_config->pindah("admin/mapel",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/mapel",0,"Gagal Menyimpan");
		}
	}
	public function proedit($Urut=0)
	{	
		$this->db->where("XKodeMapel",$this->input->post("XNamaKelas"));
		if ($this->db->get('cbt_mapel')->num_rows() > 0) {
			$this->m_config->pindah("admin/mapel",0,"Kode Mapel yang anda gunakan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[
			'XKodeMapel' => strtoupper($this->input->post('XKodeMapel')), 
			'XNamaMapel' => strtoupper($this->input->post('XNamaMapel')), 
			'XKKM' => (int) $this->input->post('XKKM'), 
			'XMapelAgama' => $this->input->post('XMapelAgama'), 
			"LastUpdate" => time()
		];

		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_mapel',$data['submit'])) {
			$this->m_config->pindah("admin/mapel",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/mapel",0,"Gagal Menyimpan");
		}
	}
	
	public function proha($Urut)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->delete('cbt_mapel')) {
			$this->m_config->pindah("admin/mapel",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/mapel",0,"Gagal Menghapus");
		}

	}


	public function api_get_user($Urut)
	{
		$this->db->where("Urut",$Urut);
		echo json_encode($this->db->get('cbt_mapel')->row());
	}	
	public function proupload($value='')
	{

		if (!empty($this->input->post('submit'))) {
			$this->load->library('PHPExcel');
	        try {
	            $inputFileType = PHPExcel_IOFactory::identify($_FILES['file']['tmp_name']);
	            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	            $objPHPExcel = $objReader->load($_FILES['file']['tmp_name']);
	        } catch (Exception $e) {
	        	// echo "string";
	            die('Error loading file ' . $e->getMessage());
	        }
	        // echo "string";
	        $sheet = $objPHPExcel->getSheet(0);
	        $highestRow = $sheet->getHighestRow();
	        $highestColumn = $sheet->getHighestColumn();
       		$sukses=$gagal=0;

	        // $uid=$sheet->getCell('Z3')->getValue();
	        // echo $uid;
	        $data['pesan']='';

		        for ($row = 2; $row <= $highestRow; $row++) {

		            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
		            $data['submit']=[
		            	"XKodeMapel" =>strtoupper($rowData[0][0]),
		            	"XNamaMapel" =>strtoupper($rowData[0][1]),
		            	"XKKM" => (int) $rowData[0][2],
		            	"XMapelAgama" => $rowData[0][3],
		            	"LastUpdate" => time()
		            ];
		            if (!empty($data['submit']['XKodeMapel']) AND !empty($data['submit']['XNamaMapel']) AND  !empty($data['submit']['XKKM']) AND !empty($data['submit']['XMapelAgama'])) {

			            $this->db->where('XKodeMapel',$rowData[0][0]);
			            if ($this->db->get('cbt_mapel')->num_rows() > 0 ) {
			            	$data['pesan'].='<div class="card-panel red white-text">Kode Mapel tidka bisa digunakan ( '.$rowData[0][0].' )</div>'; 
			            } else {
				            if ($this->db->insert('cbt_mapel',$data['submit'])) {
								$sukses++;			            	
				            } else {
				            	$data['pesan'].='<div class="card-panel	 red white-text">Gagal Upload '.$rowData[0][2].'</div>'; 
				            }
			            }


		            }

		            
		        }
		        // echo $sukses;
		        if ($sukses > 0) {
		        	$data['pesan'].='<div class="green white-text padding-3">'.$sukses.' Data  sukses di import</div>'; 
		        }
		        if ($gagal > 0 ) {
		        	$data['pesan'].='<div class="red white-text padding-3">'.$gagal.' Data gagal di import</div>'; 
		        }
		        // echo json_encode($data_item);
		        // echo $data['pesan'];
		        $this->m_config->pindah("admin/mapel/upload",2,$data['pesan']);
	     
		}
	}
}
