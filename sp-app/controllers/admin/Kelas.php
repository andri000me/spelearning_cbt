<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Kelas extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Kelas";
	}
	public function index()
	{
		$data['title']='Kelola '.$this->judul;
		$data['kelas']=$this->db->get('cbt_kelas')->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/kelas_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah()
	{
		$data['title']='Tambah '.$this->judul;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
	}
	public function upload()
	{
		$data['title']='Upload '.$this->judul;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/upload__data',$data);
		$this->load->view('admin/footer',$data);
	}
	public function edit($Urut=0)
	{
		$data['title']='Edit '.$this->judul;
		$this->db->where("Urut",$Urut);
		$data['u']=$this->db->get('cbt_kelas')->row();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
		$this->m_config->form_edit(base_url("admin/".$this->judul."/proedit/".$Urut),$data['u']);
	}
	public function protam($value='')
	{
		$this->db->where("XNamaKelas",$this->input->post("XNamaKelas"));
		if ($this->db->get('cbt_kelas')->num_rows() > 0) {
			$this->m_config->pindah("admin/kelas",0,"Nama Kelas yang anda gunakan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[
			'XNamaKelas' => ucwords($this->input->post('XNamaKelas')), 
			'XKodeJurusan' => ucwords($this->input->post('XKodeJurusan')), 
			'XKodeKelas' => ucwords($this->input->post('XKodeKelas')), 
			'XStatusKelas' => 1, 
		];
		if ($this->db->insert('cbt_kelas',$data['submit'])) {
			$this->m_config->pindah("admin/kelas",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/kelas",0,"Gagal Menyimpan");
		}
	}
	public function proedit($Urut=0)
	{	
		$this->db->where("XNamaKelas",$this->input->post("XNamaKelas"));
		if ($this->db->get('cbt_kelas')->num_rows() > 0) {
			$this->m_config->pindah("admin/kelas",0,"Nama Kelas yang anda gunakan tidak tersedia/ Sudah digunakan");
		}
		$data['submit']=[
			'XNamaKelas' => ucwords($this->input->post('XNamaKelas')), 
			'XKodeJurusan' => ucwords($this->input->post('XKodeJurusan')), 
			'XKodeKelas' => ucwords($this->input->post('XKodeKelas')), 
			'XStatusKelas' => 1, 
		];

		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_kelas',$data['submit'])) {
			$this->m_config->pindah("admin/kelas",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/kelas",0,"Gagal Menyimpan");
		}
	}
	
	public function proha($Urut)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->delete('cbt_kelas')) {
			$this->m_config->pindah("admin/kelas",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/kelas",0,"Gagal Menghapus");
		}

	}


	public function api_get_user($Urut)
	{
		$this->db->where("Urut",$Urut);
		echo json_encode($this->db->get('cbt_kelas')->row());
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
		            	"XKodeKelas" =>ucwords($rowData[0][0]),
		            	"XNamaKelas" =>ucwords($rowData[0][1]),
		            	"XKodeJurusan" =>ucwords($rowData[0][2]),
		            	"XStatusKelas" =>1,
		            ];
		            $this->db->where('XNamaKelas',$rowData[0][1]);
		            if ($this->db->get('cbt_kelas')->num_rows() > 0 ) {
		            	$data['pesan'].='<div class="card-panel red white-text">Sudah ada kelas dengan nama '.$rowData[0][1].'</div>'; 
		            } else {
			            if ($this->db->insert('cbt_kelas',$data['submit'])) {
							$sukses++;			            	
			            } else {
			            	$data['pesan'].='<div class="card-panel	 red white-text">Gagal Upload Kelas '.$rowData[0][2].'</div>'; 
			            }
		            }

		            
		        }
		        // echo $sukses;
		        if ($sukses > 0) {
		        	$data['pesan'].='<div class="green white-text padding-3">'.$sukses.' Data Kelas sukses di import</div>'; 
		        }
		        if ($gagal > 0 ) {
		        	$data['pesan'].='<div class="red white-text padding-3">'.$gagal.' Data Kelas gagal di import</div>'; 
		        }
		        // echo json_encode($data_item);
		        // echo $data['pesan'];
		        $this->m_config->pindah("admin/kelas/upload",2,$data['pesan']);
	     
		}

	}
	function simpan_kelas_guru($bak){
		$this->db->where("Username",$GLOBALS['u']['Username']);
		if ($this->db->update("cbt_user",['XKelas' => json_encode($this->input->post("kelas"))])) {
			// echo "string";
	        $this->m_config->pindah("admin/".$bak,1,"sukses menyimpan");

		}
	}
}
