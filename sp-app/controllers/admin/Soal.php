<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Soal extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Soal";
	}
	public function index()
	{
		$data['title']='Kelola '.$this->judul;
	
		if ($GLOBALS['lvl'] != 1 ) {
			if ($GLOBALS['cfg']->XGuru2Admin != 1) {
				$this->db->where("s.XGuru",$GLOBALS['u']['Username']);
			}
		}

		$this->db->select("s.*, m.XNamaMapel");
		$this->db->from("cbt_paketsoal s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$data['siswa']=$this->db->get()->result();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$this->judul.'_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah()
	{
		$data['title']='Tambah '.$this->judul;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
	}
	public function upload_butir($Urut=0)
	{
		$data['title']='Upload Butir'.$this->judul;
		$data['Urut']=$Urut;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/upload__data',$data);
		$this->load->view('admin/footer',$data);
	}
	public function kopi($Urut=0)
	{

		$data['title']='Kopi '.$this->judul;
		$this->db->select("s.*,m.XNamaMapel");
		$this->db->from("cbt_paketsoal s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("s.Urut",$Urut);
		$data['u']=$this->db->get()->row();
		print_r($data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
		$this->m_config->form_edit(base_url("admin/".$this->judul."/prokopi/".$Urut),$data['u']);
	}
	public function protam($value='')
	{
		$this->db->where("XKodeSoal",$this->input->post("XKodeSoal"));
		if ($this->db->get('cbt_paketsoal')->num_rows() > 0) {
			$this->m_config->pindah("admin/soal",0,"Kode Soal yang anda gunakan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[
			'XNamaKelas'=>json_encode($this->input->post("XNamaKelas")),
			// 'XKodeKelas' => $this->input->post('XKodeKelas'), 
			// 'XKodeJurusan' => $this->input->post('XKodeJurusan'), 
			'XKodeMapel' => $this->input->post('XKodeMapel'), 
			'XPilGanda' => $this->input->post('XPilGanda'), 
			'XPersenPil' => $this->input->post('XPersenPil'), 
			'XKodeSoal' => $this->input->post('XKodeSoal'), 
			'XJumPilihan' => $this->input->post('XJumPilihan'), 
			// 'XJumSoal' => $this->input->post('XJumSoal'), 
			// 'JumUjian' => $this->input->post('JumUjian'), 
			// 'XAcakSoal' => $this->input->post('XAcakSoal'), 
			'XGuru' => $GLOBALS['u']['Username'], 
			'XSetId' => $this->m_config->get_tahun_ajaran(), 
			// 'XStatusSoal' => $this->input->post('XStatusSoal'), 
			'XTglBuat' => date("Y-m-d"), 
			// 'XSemua' => $this->input->post('XSemua'), 
		];
		
		if ($this->db->insert('cbt_paketsoal',$data['submit'])) {
			$this->m_config->pindah("admin/soal",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/soal",0,"Gagal Menyimpan");
		}
	}

	public function prokopi($Urut='')
	{
		$this->db->where("XKodeSoal",$this->input->post("XKodeSoal"));
		if ($this->db->get('cbt_paketsoal')->num_rows() > 0) {
			$this->m_config->pindah("admin/soal",0,"Kode Soal yang anda gunakan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[
			'XNamaKelas'=>json_encode($this->input->post("XNamaKelas")),
			// 'XKodeKelas' => $this->input->post('XKodeKelas'), 
			// 'XKodeJurusan' => $this->input->post('XKodeJurusan'), 
			'XKodeMapel' => $this->input->post('XKodeMapel'), 
			'XKodeLevel' => $this->input->post('XKodeLevel'), 
			'XPilGanda' => $this->input->post('XPilGanda'), 
			'XPersenPil' => $this->input->post('XPersenPil'), 
			'XKodeSoal' => $this->input->post('XKodeSoal'), 
			'XJumPilihan' => $this->input->post('XJumPilihan'), 
			// 'XJumSoal' => $this->input->post('XJumSoal'), 
			// 'JumUjian' => $this->input->post('JumUjian'), 
			// 'XAcakSoal' => $this->input->post('XAcakSoal'), 
			'XGuru' => $GLOBALS['u']['Username'], 
			// 'XSetId' => $this->input->post('XSetId'), 
			// 'XStatusSoal' => $this->input->post('XStatusSoal'), 
			'XTglBuat' => date("Y-m-d"), 
			// 'XSemua' => $this->input->post('XSemua'), 
			// 'XKodeSekolah' => $this->input->post('XKodeSekolah'), 
		];

		$data['pesan']='';
		if ($this->db->insert('cbt_paketsoal',$data['submit'])) {
			$this->db->where('Urut',$Urut);
			$p=$this->db->get('cbt_paketsoal')->row();
			$sukses=$gagal=0;
			$this->db->where('XKodeSoal',$p->XKodeSoal);
			foreach ($this->db->get("cbt_soal")->result() as $s) {
				foreach ($s as $key => $value) {
					$data['soal'][$key]=$value;
				}
				$data['soal']['Urut']=Null;
				$data['soal']['XKodeSoal']=$data['submit']['XKodeSoal'];
				if ($this->db->insert("cbt_soal",$data['soal'])) {
					$sukses++;
				} else {
					$gagal++;
					$data['pesan'].='<div class="card-panel	 red white-text card-panel ">Gagal Mengkopi Nomer '.$data['soal']['XNomerSoal'].'</div>'; 
				}
			}
			
		} else {
			$data['pesan'].='<div class="card-panel	 red white-text card-panel ">Gagal Mengkopi Paket Soal</div>'; 
		}
		if ($sukses > 0) {
        	$data['pesan'].='<div class="green white-text card-panel  padding-3">'.$sukses.' Data  sukses di import</div>'; 
        }
        if ($gagal > 0 ) {
        	$data['pesan'].='<div class="red white-text card-panel  	-3">'.$gagal.' Data gagal di import</div> <div class="blue white-text card-panel  padding-3">Pastikan data yang terdapat di excel sesuai ketentuan !!</div>'; 
        }
        // echo json_encode($data_item);
        // echo $data['pesan'];
        $this->m_config->pindah("admin/soal",2,$data['pesan']);
	}

	public function proha($Urut)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->delete('cbt_paketsoal')) {
			$this->m_config->pindah("admin/soal",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/soal",0,"Gagal Menghapus");
		}

	}

	public function aktiv($Urut=0,$s='N')
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->update("cbt_paketsoal",[
			"XStatusSoal" => $s
		])) {
			$this->m_config->pindah("admin/soal",1,"Sukses Mengganti Status");
		} else {
			$this->m_config->pindah("admin/soal",0,"Gagal Mengganti Status");
		}

	}


	public function api_get_user($Urut)
	{
		$this->db->where("Urut",$Urut);
		echo json_encode($this->db->get('cbt_paketsoal')->row());
	}	
	public function proupload($Urut='')
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
	        	$this->db->where("Urut",$Urut);
	        	// echo $urut;
	        	$m=$this->db->get('cbt_paketsoal')->row();
		        for ($row = 3; $row <= $highestRow; $row++) {

		            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
		        
					$data['submit']=[
						'XKodeMapel' => $m->XKodeMapel, 
						'XKodeSoal' => $m->XKodeSoal, 
						'XNomerSoal' => $rowData[0][0], 
						'XJenisSoal' => $rowData[0][1], 
						'XKategori' => $rowData[0][2], 
						'XAcakSoal' => $rowData[0][3], 
						// 'XRagu' => $this->input->post('XRagu'), 
						'XTanya' => $rowData[0][4], 
						'XJawab1' => $rowData[0][5], 
						'XGambarJawab1' => $rowData[0][6], 
						'XJawab2' => $rowData[0][7], 
						'XGambarJawab2' => $rowData[0][8], 
						'XJawab3' => $rowData[0][9], 
						'XGambarJawab3' => $rowData[0][10], 
						'XJawab4' => $rowData[0][11], 
						'XGambarJawab4' => $rowData[0][12], 
						'XJawab5' => $rowData[0][13], 
						'XGambarJawab5' => $rowData[0][14], 
						'XAudioTanya' => $rowData[0][15], 
						'XVideoTanya' => $rowData[0][16], 
						'XGambarTanya' => $rowData[0][17], 
						'XKunciJawaban' => $rowData[0][18], 
						'XAcakOpsi' => $rowData[0][19], 
						// 'XAgama' => $this->input->post('XAgama'), 
						// 'XLevel' => $this->input->post('XLevel'), 
						// 'XKodeKelas' => $this->input->post('XKodeKelas'), 
						// 'XKodeSekolah' => $this->input->post('XKodeSekolah'), 

					];
					if (!empty($rowData[0][20])) {
						$data['submit']["XAgama"] = $rowData[0][20];
					}					

				   	$this->db->where('XNomerSoal',$rowData[0][0]);
				   	$this->db->where('XKodeSoal',$m->XKodeSoal);
		            if ($this->db->get('cbt_soal')->num_rows() > 0 ) {
		            	$data['pesan'].='<div class="card-panel red white-text card-panel ">Nomer soal tidak tersedia / sudah digunakan'.$rowData[0][0].'</div>'; 
		            } else {
			            if ($this->db->insert('cbt_soal',$data['submit'])) {
							$sukses++;			            	
			            } else {
			            	$gagal++;
			            	$data['pesan'].='<div class="card-panel	 red white-text card-panel ">Gagal Upload '.$rowData[0][2].'</div>'; 
			            }
		            }
		            
		        }
		        // echo $sukses;
		        if ($sukses > 0) {
		        	$data['pesan'].='<div class="green white-text card-panel  padding-3">'.$sukses.' Data  sukses di import</div>'; 
		        }
		        if ($gagal > 0 ) {
		        	$data['pesan'].='<div class="red white-text card-panel  	-3">'.$gagal.' Data gagal di import</div> <div class="blue white-text card-panel  padding-3">Pastikan data yang terdapat di excel sesuai ketentuan !!</div>'; 
		        }
		        // echo json_encode($data_item);
		        // echo $data['pesan'];
		        $this->m_config->pindah("admin/soal/upload_butir/".$Urut,2,$data['pesan']);
		}
	}
	public function pdf($Urut)
	{
		$data['title']="Print Soal";
		$this->db->select("s.*, m.XNamaMapel");
		$this->db->from("cbt_paketsoal s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where('s.Urut',$Urut);
		$data['p']=$this->db->get()->row();
		foreach ($data['p'] as $key => $value) {
			if (empty($value) || $value == "") {
				$data['p']->$key="ALL";
			}
		}
		$this->db->where("XKodeSoal",$data['p']->XKodeSoal);
		$this->db->order_by("XNomerSoal","ASC");
		$data['s']=$this->db->get("cbt_soal")->result();
		$this->load->view('admin/print_header',$data);
		$this->load->view('admin/print_soal',$data);
		$this->load->view('admin/print_footer',$data);
	}
}
