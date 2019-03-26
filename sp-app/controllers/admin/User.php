<?php 

// ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function index()
	{
		$data['title']="Profil Anda";
		$data['u']=(object) $GLOBALS['u'];
		$this->load->view('admin/header',$data);
		$this->load->view('admin/user_edit',$data);
		$this->load->view('admin/footer',$data);
	}

	public function info($Uname)
	{
	
		$this->db->where("Username",$Uname);
		$data['u']=$this->db->get("cbt_user")->row();
		$data['title']="Profil ".$data['u']->Nama;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/user_info',$data);
		$this->load->view('admin/footer',$data);
	}
	function profoto(){

		$config['upload_path']          = './asset/uploads/foto_guru/';
	    $config['allowed_types']        = 'gif|jpg|png';
       // $config['max_size']              = 1000;
        // $config['max_width']            = 768;
        // $config['max_height']           = 768;
	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('file')){
	    	$data['pesan']='<div class="card-panel	 red white-text card-panel ">Gagal Upload '.$_FILES['file']['name'].'  '.$this->upload->display_errors().'</div>';
	    } else {
	    	$this->db->where("Username",$GLOBALS['u']['Username']);
	    	if ($this->db->update('cbt_user',['XFoto'=>$this->upload->data('file_name')])) {
	    		$data['pesan']="";
	    	} else {
	    		$data['pesan']="";
	    	}
	    }
        $this->m_config->pindah("admin/user/",2,$data['pesan']);
	}
	function proedit(){
		$data['submit']=[
			// 'Urut' => $this->input->post('Urut'), 
			// 'Username' => $this->input->post('Username'), 
			// 'Password' => $this->input->post('Password'), 
			// 'NIP' => $this->input->post('NIP'), 
			'Nama' => ucwords($this->input->post('Nama')), 
			'Alamat' => ucwords($this->input->post('Alamat')), 
			'HP' => $this->input->post('HP'), 
			// 'Faxs' => $this->input->post('Faxs'), 
			'Email' => $this->input->post('Email'), 
			// 'login' => $this->input->post('login'), 
			// 'Status' => $this->input->post('Status'), 
			// 'XFoto' => $this->input->post('XFoto'), 
		];

		$this->db->where("Username",$GLOBALS['u']['Username']);
		if ($this->db->update('cbt_user',$data['submit'])) {
			$this->m_config->pindah("admin/user",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/user",0,"Gagal Menyimpan");
		}
	}

	function propwd(){
		$pwd_lama= $this->input->post("pwd_lama");
		$pwd_1= $this->input->post("pwd_1");
		$pwd_2= $this->input->post("pwd_2");

		$this->db->where('Username', $GLOBALS['u']['Username']);
		$this->db->where("Password",crypt('$//SP'.md5(sha1($this->input->post('pwd_lama'))),'$6$SPangat$'));

		$query=$this->db->get('cbt_user');
		$cek=$query->num_rows();
		// echo($cek);
		// die();
		if ($cek==0) {
			$this->m_config->pindah("admin/user/index#password",0,"Password lama yang anda masukan salah");
		} else {
			if ($pwd_1!=$pwd_2) {
				$this->m_config->pindah("admin/user/index#password",0,"Password baru yang anda masukan tidak sama");
			} else {
				$this->db->where('Username', $GLOBALS['u']['Username']);
				$this->db->where("Password",crypt('$//SP'.md5(sha1($this->input->post('pwd_lama'))),'$6$SPangat$'));
				if ($this->db->update("cbt_user",[
					"Password" => crypt('$//SP'.md5(sha1($this->input->post('pwd_1'))),'$6$SPangat$')
				])) {
					$this->m_config->pindah("admin/user",1,"Sukses mengganti password");
				} else {
					$this->m_config->pindah("admin/user",0,"Gagal Menyimpan");
				}
			}
		}


	}
}
