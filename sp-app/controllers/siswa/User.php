<?php 

// ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi("siswa");
	}
	public function index()
	{
		$data['title']="Profil Anda";
		$data['u']=(object) $GLOBALS['u'];
		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/User_kelola',$data);
		$this->load->view('siswa/footer',$data);
	}

	public function info($Uname)
	{
	
		$this->db->where("Username",$Uname);
		$data['u']=$this->db->get("cbt_user")->row();
		$data['title']="Profil ".$data['u']->Nama;
		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/user_info',$data);
		$this->load->view('siswa/footer',$data);
	}
	function profoto(){

		$config['upload_path']          = './asset/uploads/foto_siswa/';
	    $config['allowed_types']        = 'gif|jpg|png';
       	$config['max_size']              = 1000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('file')){
	    	$data['pesan']='<div class="card-panel	 red white-text card-panel ">Gagal Upload '.$_FILES['file']['name'].'  '.$this->upload->display_errors().'</div>';
	    } else {
	    	$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
	    	if ($this->db->update('cbt_siswa',['XFoto'=>$this->upload->data('file_name')])) {
	    		$data['pesan']="";
	    	} else {
	    		$data['pesan']="";
	    	}
	    }
        $this->m_config->pindah("siswa/user/",2,$data['pesan']);
	}
	public function proedit()
	{	
		$this->db->where("XNIK",$this->input->post("XNamaKelas"));
		if ($this->db->get('cbt_siswa')->num_rows() > 0) {
			$this->m_config->pindah("siswa/user",0,"Nomor Induk yang anda gunakan tidak tersedia/ Sudah digunakan");
		}


		$data['submit']=[
			'XNomerUjian' => strtoupper($this->input->post('XNomerUjian')), 
			// 'XNIK' => strtoupper($this->input->post('XNIK')), 
			// 'XKodeJurusan' => strtoupper($this->input->post('XKodeJurusan')), 
			'XNamaSiswa' => strtoupper($this->input->post('XNamaSiswa')), 
			// 'XKodeKelas' => strtoupper($this->input->post('XKodeKelas')), 
			'XJenisKelamin' => strtoupper($this->input->post('XJenisKelamin')), 
			'XPassword' => $this->input->post('XPassword'), 
			// 'XFoto' => $this->input->post('XFoto'), 
			'XAgama' => strtoupper($this->input->post('XAgama')), 
			// 'XSetId' => $this->m_config->get_tahun_ajaran(), 
			// 'XSesi' => $this->input->post('XSesi'), 
			// 'XRuang' => strtoupper($this->input->post('XRuang')), 
			'XPilihan' => $this->input->post('XPilihan'), 
			// 'XNamaKelas' => strtoupper($this->input->post('XNamaKelas')), 
		];
		// echo($data['submit']['XPilihan']);
		// die();
		if (!empty($data['submit']['XPilihan']) || ($data['submit']['XPilihan'] != "" )) {
			$this->db->where_in("XKodeMapel",(array) ($data['submit']['XPilihan']));
			if ($this->db->get("cbt_mapel")->num_rows() < 1) {
				$this->m_config->pindah("siswa/user",0,"Gagal Menyimpan, Kode Piilihan Khusus yang anda masukan tidak terdaftar di mapel");
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

		$this->db->where("XNomerUjian",$data['submit']['XNomerUjian']);
		if ($this->db->update('cbt_siswa',$data['submit'])) {
			$this->m_config->pindah("siswa/user",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("siswa/user",0,"Gagal Menyimpan");
		}
	}
}
