<?php 

// ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Materi extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Materi";
	}
	public function index()
	{
		$data['title']='Kelola '.$this->judul;
	
		if ($GLOBALS['lvl'] != 1 ) {
			if ($this->m_config->config->XGuru2Admin != 1) {
				$this->db->where("s.XGuru",$GLOBALS['u']['Username']);
			}
		}

		$this->db->select("s.*, m.XNamaMapel");
		$this->db->from("cbt_paketmateri s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$data['siswa']=$this->db->get()->result();
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

	public function edit_materi($Urut)
	{

		$this->db->select("s.*,m.XNamaMapel, s.Urut as XIdMateri");
		$this->db->from("cbt_paketmateri s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("s.Urut",$Urut);
		$data['u']=$this->db->get()->row();

		$data['title']='Edit Materi '.$this->judul;
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_tulis',$data);
		$this->load->view('admin/footer',$data);
	}
	public function protam($value='')
	{
		$this->db->where("XKodeMateri",$this->input->post("XKodeMateri"));
		if ($this->db->get('cbt_paketmateri')->num_rows() > 0) {
			$this->m_config->pindah("admin/materi",0,"Kode Soal yang anda gunakan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[
			// 'XKodeKelas' => $this->input->post('XKodeKelas'), 
			// 'XKodeJurusan' => $this->input->post('XKodeJurusan'), 
			'XNamaKelas' => json_encode($this->input->post('XNamaKelas')), 
			'XKodeMapel' => $this->input->post('XKodeMapel'), 
			'XKodeMateri' => $this->input->post('XKodeMateri'), 
			'XKd' => strtoupper($this->input->post('XKd')), 
			'XJudul' => ucwords($this->input->post('XJudul')), 
			'XGuru' => $GLOBALS['u']['Username'], 
			'XSetId' => $this->m_config->get_tahun_ajaran(), 
			'XTglBuat' => date("Y-m-d"), 
			"LastUpdate" => time()
		];
		
		if ($this->db->insert('cbt_paketmateri',$data['submit'])) {
			$this->m_config->pindah("admin/materi",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/materi",0,"Gagal Menyimpan");
		}
	}

	function promateri(){
		$Urut=$this->input->post("Urut");
		$XKd=$this->input->post("XKd");
		$XJudul=$this->input->post("XJudul");
		$XIsiMateri=$this->input->post("XIsiMateri");
		$data['submit']=[
			'XKd' => strtoupper($XKd),
			'XJudul' => ucwords($XJudul),
			'XIsiMateri'=>ucfirst($XIsiMateri),
			'XUjian'=>json_encode($this->input->post("XUjian")),
			"LastUpdate" => time()
		];

		$this->db->where("Urut",$Urut);
		$m=$this->db->get("cbt_paketmateri")->row();


		// print_r($_FILES['files']);
		$file=(array) json_decode($m->XFile);
		$filesCount = count($_FILES['files']['name']);
		// echo $filesCount;
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['file']['name']     = $_FILES['files']['name'][$i];
            $_FILES['file']['type']     = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['files']['error'][$i];
            $_FILES['file']['size']     = $_FILES['files']['size'][$i];
            
         	$config['upload_path']          = './asset/uploads/att_materi/';
            $config['allowed_types']        = 'gif|jpg|png|mp3|wav|mp4|avi|pdf|xls|xlsx|doc|docx|pdf|ppt|pptx|zip';
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if($this->upload->do_upload('file')){
            	array_push($file,$this->upload->data('file_name'));
            }  else {
            	// echo("eror");
            }
        }
        $data['submit']['XFile']=json_encode($file);
		// echo(json_encode($file));
		// die();
		// print_r($data);
		// die;
		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_paketmateri',$data['submit'])) {
			$this->m_config->pindah("admin/materi/edit_materi/".$Urut.'#submit',1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/materi/edit_materi/".$Urut.'#submit',0,"Gagal Menyimpan");
		}
	}
	function hapus_att($Urut,$file){
		$this->db->where("Urut",$Urut);
		$m=$this->db->get("cbt_paketmateri")->row();
		$files_sebelum=(array) json_decode($m->XFile);
		// array_pop($files);
		if (unlink("./asset/uploads/att_materi/".$files_sebelum[$file])) {
			$files_sebelum[$file]='';
			$files_sesudah=[];
			foreach ($files_sebelum as $key => $value) {
				if ($value != "" || !empty($value)) {
					array_push($files_sesudah, $value);
				}
			}
			$this->db->where("Urut",$Urut);
			if ($this->db->update("cbt_paketmateri",['XFile' => json_encode($files_sesudah),"LastUpdate" => time()])) {
				$this->m_config->pindah("admin/materi/edit_materi/".$Urut.'#submit',1,"Sukses Menghapus");
			}

		}
	}
	public function proha($Urut)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->delete('cbt_paketmateri')) {
			$this->m_config->pindah("admin/materi",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/materi",0,"Gagal Menghapus");
		}

	}

	public function aktiv($Urut=0,$s='N')
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->update("cbt_paketmateri",[
			"XStatusMateri" => $s,
			"LastUpdate" => time()
		])) {
			$this->m_config->pindah("admin/materi",1,"Sukses Mengganti Status");
		} else {
			$this->m_config->pindah("admin/materi",0,"Gagal Mengganti Status");
		}

	}


	public function api_get_user($Urut)
	{
		$this->db->where("Urut",$Urut);
		echo json_encode($this->db->get('cbt_paketmateri')->row());
	}	

	public function pdf($Urut)
	{
		$data['title']="Print Soal";
		$this->db->select("s.*, m.XNamaMapel");
		$this->db->from("cbt_paketmateri s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where('s.Urut',$Urut);
		$data['p']=$this->db->get()->row();
		foreach ($data['p'] as $key => $value) {
			if (empty($value) || $value == "") {
				$data['p']->$key="ALL";
			}
		}
		$this->db->where("XKodeMateri",$data['p']->XKodeMateri);
		$this->db->order_by("XNomerSoal","ASC");
		$data['s']=$this->db->get("cbt_soal")->result();
		$this->load->view('admin/print_header',$data);
		$this->load->view('admin/print_soal',$data);
		$this->load->view('admin/print_footer',$data);
	}
}
