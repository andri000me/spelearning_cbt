<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Butir_soal extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Butir_Soal";
	}
	public function index($Urut=0)
	{
		$data['Uid']=$Urut;
		$data['title']='Kelola '.$this->judul;
		$this->db->select("s.*");
		$this->db->from("cbt_soal s");
		$this->db->join('cbt_paketsoal p','p.XKodeSoal = s.XKodeSoal');
		$this->db->where('p.Urut',$Urut);
		$this->db->order_by("XNomerSoal","ASC");
		$data['soal']=$this->db->get()->result();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function kosongkan($Urut=0)
	{
		$this->db->where("Urut",$Urut);
		$p=$this->db->get("cbt_paketsoal")->row();
		$this->db->where('XKodeSoal',$p->XKodeSoal);
		if ($this->db->delete('cbt_soal')) {
			$this->db->where("Urut",$Urut);
			$this->db->update('cbt_paketsoal',[
				"XStatusSoal" => "N"
			]);
			$this->m_config->pindah("admin/soal",1,"Sukses mengosongkan paket soal");
		} else {
			$this->m_config->pindah("admin/soal",0,"Gagal mengosongkan paket soal");
		}
	}

	public function tambah($Urut=0)
	{
		$data['title']='Tambah '.$this->judul;
		$this->db->select("p.*,m.*,p.Urut XIdPaket");
		// $this->db->from("cbt_soal s");
		$this->db->from('cbt_paketsoal p');
		$this->db->join('cbt_mapel m','p.XKodeMapel = m.XKodeMapel');
		$this->db->where('p.Urut',$Urut);
		// $this->db->order_by("XNomerSoal","ASC");
		$data['soal']=$this->db->get()->row_array();
		$this->db->where("XKodeSoal",$data['soal']['XKodeSoal']);
		$this->db->order_by("XNomerSoal","DESC");
		$this->db->limit(1);
		$no=$this->db->get("cbt_soal")->row();
		$data['No']=ceil($no->XNomerSoal+1);
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_tambah',$data);
		$this->load->view('admin/footer',$data);
		// $this->m_config->form_edit(base_url("admin/".$this->judul."/prokopi/".$Urut),$data['soal']);
	}

	public function edit($Urut=0)
	{
		$data['title']='Edit '.$this->judul;
		$this->db->select("s.*,p.*,s.Urut AS XIdSoal,m.*,p.Urut XIdPaket");
		$this->db->from("cbt_soal s");
		$this->db->join('cbt_paketsoal p','p.XKodeSoal = s.XKodeSoal');
		$this->db->join('cbt_mapel m','p.XKodeMapel = m.XKodeMapel');
		$this->db->where('s.Urut',$Urut);
		$this->db->order_by("XNomerSoal","ASC");
		$data['soal']=$this->db->get()->row_array();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_kelola',$data);
		$this->load->view('admin/footer',$data);
		// $this->m_config->form_edit(base_url("admin/".$this->judul."/prokopi/".$Urut),$data['soal']);
	}
	public function proha($Urut,$id)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->delete('cbt_soal')) {
			$this->m_config->pindah("admin/butir_soal/index/".$id,1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/butir_soal/index/".$id,0,"Gagal Menghapus");
		}

	}

	function proses($t,$Urut=0){
		// upload file pertanyyaan
		// print_r($_FILES);
		header("Content-type: text/css");
		$data['submit']=[];
		$data['pesan']='';

		// dapatkan data input
		foreach ($this->input->post() as $key => $value) {
			$data['submit'][$key]=$value;
		}
		// die;

		// datapatkan data file
		foreach ($_FILES as $key => $value) {
			if (!empty($_FILES[$key]['tmp_name'])) {
				// print_r($_FILES[$key]);
		 		$ext = pathinfo($_FILES[$key]['name'],PATHINFO_EXTENSION);
				if($ext=='mp4'||$ext=='avi'||$ext=='MP4'||$ext=='AVI'){
			   		$uploaddir = "video"; //a directory inside
			   	}
			   elseif($ext=='mp3'||$ext=='wav'||$ext=='MP3'||$ext=='WAV'){
				   $uploaddir = "audio"; //a directory inside
			   }
			    elseif($ext=='pdf' || $ext=='doc' || $ext=='docx' || $ext=='odt' || $ext=='txt' || $ext=='ods' || $ext=='xls' || $ext=='xlsx' || $ext=='csv' || $ext=='odf' || $ext=='ppt' || $ext=='pptx'  ){
			   $uploaddir = "doc"; //a directory inside
			   }
			   else{
				   $uploaddir = "gambar"; //a directory inside
			   }
			
	         	$config['upload_path']          = './asset/uploads/cbt/'.$uploaddir;
				if ($key=="XAudioTanya") {
		            $config['allowed_types']        = 'mp3|wav';
		       	}  elseif ($key=="XVideoTanya") {
		            $config['allowed_types']        = 'mp4|avi';

		       	} else {
		            $config['allowed_types']        = 'gif|jpg|png';
		       	}      
	            // Load and initialize upload library
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);
	            
	            // Upload file to server
	            if($this->upload->do_upload($key)){
	            	$data['submit'][$key]=$this->upload->data('file_name');
	        	} else {
			    	$data['pesan'].='<div class="card-panel	 red white-text card-panel ">Gagal Upload '.$_FILES[$key]['name'].'  '.$this->upload->display_errors().'</div>';
	        	} 
			}
		}

		// print_r($_FILES);
		// die;
		if ($t=="edit") {
			$this->db->where("Urut",$Urut);
			if ($this->db->update("cbt_soal",$data['submit'])) {
				$data['pesan'].='<div class="card-panel	green white-text card-panel ">Sukses Menyimpan</div>';
				$this->m_config->pindah("admin/butir_soal/edit/".$Urut,2,$data['pesan']);
			}
		} else {
			if ($this->db->insert("cbt_soal",$data['submit'])) {
				$data['pesan'].='<div class="card-panel	green white-text card-panel ">Sukses Menyimpan</div>';
				$this->m_config->pindah("admin/butir_soal/index/".$Urut,2,$data['pesan']);
			}
		}
	}
}
