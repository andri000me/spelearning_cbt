<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class File_Soal extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="File_Soal";
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
		$folder=['gambar','video','audio','doc'];
		foreach ($folder as $f) {
			$folder = "asset/uploads/cbt/".$f.'/'; //folder tempat gambar disimpan 
	        $handle = opendir($folder);
	        while(false !== ($file = readdir($handle))){  
            	if($file != '.' && $file != '..'){
            		unlink($folder.$file);
            	}
            }
		}
		$this->m_config->pindah("admin/File_Soal/index/",1,"Sukses Menghapus File");
	}

	public function hapus($jenis,$file)
	{	
		$file=addslashes($file);
		$folder="./asset/uploads/cbt/".$jenis;
		$file=$folder."/".$file;
		if (unlink($file)) {
			$this->m_config->pindah("admin/File_Soal/index/#".$jenis,1,"Sukses Menghapus File");
		} else {
			$this->m_config->pindah("admin/File_Soal/index/#".$jenis,0,"Gagal menghapus file");
		}
	}
	public function upload()
	{
		$data['title']='Upload '.$this->judul;
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/upload__file',$data);
		$this->load->view('admin/footer',$data);
	}
	public function proupload($value='')
	{
		// print_r($_FILES['file']);
		// die();
		$sukses=$gagal=0;
		$data['pesan']="";
		$filesCount = count($_FILES['files']['name']);
		// echo $filesCount;
        for($i = 0; $i < $filesCount; $i++){
            $_FILES['file']['name']     = $_FILES['files']['name'][$i];
            $_FILES['file']['type']     = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error']     = $_FILES['files']['error'][$i];
            $_FILES['file']['size']     = $_FILES['files']['size'][$i];
            
     		$ext = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
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
            $config['allowed_types']        = 'gif|jpg|png|mp3|wav|mp4|avi|pdf|xls|xlsx|doc|docx|pdf|ppt|pptx|zip';
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            // Upload file to server
            if(!$this->upload->do_upload('file')){
            	$gagal++;
            	$data['pesan'].='<div class="card-panel	 red white-text card-panel ">Gagal Upload '.$_FILES['file']['name'].'  '.$this->upload->display_errors().'</div>'; 
            } else {
            	$sukses++;
            }
        }
        // die();
	 	if ($sukses > 0) {
	    	$data['pesan'].='<div class="green white-text card-panel  padding-3">'.$sukses.' FIle  sukses di upload</div>'; 
        }
        if ($gagal > 0 ) {
        	$data['pesan'].='<div class="red white-text card-panel  	-3">'.$gagal.' FIle gagal di upload</div> <div class="blue white-text card-panel  padding-3">Pastikan file yang anda upload sesuai ketentuan !!</div>'; 
        }
        // echo json_encode($data_item);
        // echo $data['pesan'];
        $this->m_config->pindah("admin/File_Soal/upload/",2,$data['pesan']);
	}

}
