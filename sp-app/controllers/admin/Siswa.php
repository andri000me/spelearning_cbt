<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Siswa extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Siswa";
	}
	public function index()
	{
		$data['title']='Kelola '.$this->judul;
		$data['siswa']=$this->db->get('cbt_siswa')->result();
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
		$data['u']=$this->db->get('cbt_siswa')->row();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
		$this->m_config->form_edit(base_url("admin/".$this->judul."/proedit/".$Urut),$data['u']);
	}
	public function protam($value='')
	{
		$this->db->where("XNIK",$this->input->post("XNamaKelas"));
		if ($this->db->get('cbt_siswa')->num_rows() > 0) {
			$this->m_config->pindah("admin/siswa",0,"Nomor Induk yang anda gunakan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[
			'XNomerUjian' => strtoupper($this->input->post('XNomerUjian')), 
			'XNIK' => strtoupper($this->input->post('XNIK')), 
			'XKodeJurusan' => strtoupper($this->input->post('XKodeJurusan')), 
			'XNamaSiswa' => strtoupper($this->input->post('XNamaSiswa')), 
			'XKodeKelas' => strtoupper($this->input->post('XKodeKelas')), 
			'XJenisKelamin' => strtoupper($this->input->post('XJenisKelamin')), 
			'XPassword' => $this->input->post('XPassword'), 
			'XFoto' => $this->input->post('XFoto'), 
			'XAgama' => strtoupper($this->input->post('XAgama')), 
			'XSetId' => $this->m_config->get_tahun_ajaran(), 
			'XSesi' => $this->input->post('XSesi'), 
			'XRuang' => strtoupper($this->input->post('XRuang')), 
			'XPilihan' => $this->input->post('XPilihan'), 
			'XNamaKelas' => strtoupper($this->input->post('XNamaKelas')), 
		];
		// echo($data['submit']['XPilihan']);
		// die();
		if (!empty($data['submit']['XPilihan']) || ($data['submit']['XPilihan'] != "" )) {
			$this->db->where_in("XKodeMapel",(array) ($data['submit']['XPilihan']));
			if ($this->db->get("cbt_mapel")->num_rows() < 1) {
				$this->m_config->pindah("admin/siswa",0,"Gagal Menyimpan, Kode Piilihan Khusus yang anda masukan tidak terdaftar di mapel");
			} else {
				$data['submit']['XPilihan']=implode(',', $data['submit']['XPilihan']);
			}
		}
		// echo($this->input->post('XPilihan'));
		// foreach ($this->input->post('XPilihan') as $key => $value) {
		// 	echo($value);
		// }
		// print_r($this->input->post('XPilihan'));
		// echo($data['submit']['XPilihan']);

		// die();
		if (empty($data['submit']['XPassword']) || ($data['submit']['XPassword'] == "")) {
			$this->load->model("m_token");
			$data['submit']['XPassword']=$this->m_token->get_pwd(5);
		}

		// echo($data['submit']['XPassword']);
		// die();
		if ($this->db->insert('cbt_siswa',$data['submit'])) {
			$this->m_config->pindah("admin/siswa",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/siswa",0,"Gagal Menyimpan");
		}
	}

	public function proedit($Urut=0)
	{	
		$this->db->where("XNIK",$this->input->post("XNamaKelas"));
		if ($this->db->get('cbt_siswa')->num_rows() > 0) {
			$this->m_config->pindah("admin/siswa",0,"Nomor Induk yang anda gunakan tidak tersedia/ Sudah digunakan");
		}


		$data['submit']=[
			'XNomerUjian' => strtoupper($this->input->post('XNomerUjian')), 
			'XNIK' => strtoupper($this->input->post('XNIK')), 
			'XKodeJurusan' => strtoupper($this->input->post('XKodeJurusan')), 
			'XNamaSiswa' => strtoupper($this->input->post('XNamaSiswa')), 
			'XKodeKelas' => strtoupper($this->input->post('XKodeKelas')), 
			'XJenisKelamin' => strtoupper($this->input->post('XJenisKelamin')), 
			'XPassword' => $this->input->post('XPassword'), 
			'XFoto' => $this->input->post('XFoto'), 
			'XAgama' => strtoupper($this->input->post('XAgama')), 
			'XSetId' => $this->m_config->get_tahun_ajaran(), 
			'XSesi' => $this->input->post('XSesi'), 
			'XRuang' => strtoupper($this->input->post('XRuang')), 
			'XPilihan' => $this->input->post('XPilihan'), 
			'XNamaKelas' => strtoupper($this->input->post('XNamaKelas')), 
		];
		// echo($data['submit']['XPilihan']);
		// die();
		if (!empty($data['submit']['XPilihan']) || ($data['submit']['XPilihan'] != "" )) {
			$this->db->where_in("XKodeMapel",(array) ($data['submit']['XPilihan']));
			if ($this->db->get("cbt_mapel")->num_rows() < 1) {
				$this->m_config->pindah("admin/siswa",0,"Gagal Menyimpan, Kode Piilihan Khusus yang anda masukan tidak terdaftar di mapel");
			} else {
				$data['submit']['XPilihan']=implode(',', $data['submit']['XPilihan']);
			}
		}

		// echo($this->input->post('XPilihan'));
		// foreach ($this->input->post('XPilihan') as $key => $value) {
		// 	echo($value);
		// }
		// print_r($this->input->post('XPilihan'));
		// echo($data['submit']['XPilihan']);

		// die();
		if (empty($data['submit']['XPassword']) || ($data['submit']['XPassword'] == "")) {
			$this->load->model("m_token");
			$data['submit']['XPassword']=$this->m_token->get_pwd(5);
		}

		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_siswa',$data['submit'])) {
			$this->m_config->pindah("admin/siswa",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/siswa",0,"Gagal Menyimpan");
		}
	}
	
	public function proha($Urut)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->delete('cbt_siswa')) {
			$this->m_config->pindah("admin/siswa",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/siswa",0,"Gagal Menghapus");
		}

	}

	public function hapus_seleksi()
	{
		$no = $this->input->post("siswa");
		// echo "Eror";
		// die();
		foreach ($no as $key => $value) {
			$this->db->where('Urut',$value);
			$this->db->delete('cbt_siswa');
		}
		$this->m_config->pindah("admin/siswa",1,"Sukses Menghapus");

	}


	public function api_get_user($Urut)
	{
		$this->db->where("Urut",$Urut);
		echo json_encode($this->db->get('cbt_siswa')->row());
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

		        for ($row = 3; $row <= $highestRow; $row++) {

		            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
		        
					$data['submit']=[
						'XNomerUjian' => strtoupper($rowData[0][0]), 
						'XNamaSiswa' => strtoupper($rowData[0][1]), 
						'XNIK' => $rowData[0][2], 
						// 'XSesi' => $rowData[0][3], 
						// 'XRuang' => strtoupper($rowData[0][4]), 
						'XKodeKelas' => strtoupper($rowData[0][3]), 
						'XKodeJurusan' => strtoupper($rowData[0][4]), 
						'XNamaKelas' => strtoupper($rowData[0][5]), 
						'XJenisKelamin' => strtoupper($rowData[0][6]), 
						'XPassword' => $rowData[0][7], 
						'XFoto' => $rowData[0][8], 
						'XAgama' => strtoupper($rowData[0][9]), 
						'XPilihan' => strtoupper($rowData[0][10]), 
						'XSetId' => $this->m_config->get_tahun_ajaran(), 
						// 'XKodeSekolah' => $this->input->post('XKodeSekolah'), 

					];

				
					if (!empty($data['submit']['XPilihan']) || ($data['submit']['XPilihan'] != "" )) {
						$this->db->where_in("XKodeMapel",(array) (explode(',',$data['submit']['XPilihan'])));
						if ($this->db->get("cbt_mapel")->num_rows() < 1) {
							$data['pesan'].='<div class="card-panel red white-text card-panel ">Kode mapel khusus tidak bisa digunakan  ( '.$data['submit']['XPilihan'].' ) / tidak tersedia</div>';
						} else {
							$data['submit']['XPilihan']=implode(',', $data['submit']['XPilihan']);
						}
					}
					// echo($this->input->post('XPilihan'));
					// foreach ($this->input->post('XPilihan') as $key => $value) {
					// 	echo($value);
					// }
					// print_r($this->input->post('XPilihan'));
					// echo($data['submit']['XPilihan']);

					// die();
					if (empty($data['submit']['XPassword']) || ($data['submit']['XPassword'] == "")) {
						$this->load->model("m_token");
						$data['submit']['XPassword']=$this->m_token->get_pwd(5);
					}

					if (!empty($rowData[0][0])  AND !empty($rowData[0][1])  AND !empty($rowData[0][2])  AND !empty($rowData[0][2])) {
					   	$this->db->where('XNomerUjian',(string) $rowData[0][0]);
			            if ($this->db->get('cbt_siswa')->num_rows() > 0 ) {
			            	$data['pesan'].='<div class="card-panel red white-text card-panel ">Nomer Ujian tidak bisa digunakan  ( '.$rowData[0][0].' )</div>'; 
			            } else {
				            if ($this->db->insert('cbt_siswa',$data['submit'])) {
								$sukses++;			            	
				            } else {
				            	$gagal++;
				            	$data['pesan'].='<div class="card-panel	 red white-text card-panel ">Gagal Upload '.$rowData[0][2].'</div>'; 
				            }
			            }
					}

		            
		        }
		        // echo $sukses;
		        if ($sukses > 0) {
		        	$data['pesan'].='<div class="green white-text card-panel  padding-3">'.$sukses.' Data  sukses di import</div>'; 
		        }
		        if ($gagal > 0 ) {
		        	$data['pesan'].='<div class="red white-text card-panel  	-3">'.$gagal.' Data gagal di import</div> <div class="blue white-text card-panel  padding-3">Pastikan data yang terdapat di excel sesuai ketentuan !!</div>';
		        	$data['pesan'].='<div class="blue white-text card-panel  	-3">Lakukan tambah siswa secara manual untuk yang terjadi error / kesalahan untuk menghindari perulangan / duplikat eror !!</div>'; 
		        }
		        // echo json_encode($data_item);
		        // echo $data['pesan'];
		        $this->m_config->pindah("admin/siswa/upload",2,$data['pesan']);
	     
		}
	}
}
