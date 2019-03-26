<?php 

    // ditulis oleh  @supangat_oy

if (strtotime(date("Y-m-d")) > mktime(null,null,null,3,31,2019)) {
	echo("Versi anda terlalu lama silahkan upgrade ke yang baru");
	die();
}

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		// $this->m_config->cek_sesi();
		// echo("AS");
		if (!$this->m_config->koneksi) {
			redirect(base_url("install"));
		}
	}

	public function index()
	{
		$this->load->view('login');
		session_destroy();
	}
	function pro(){
		$user=$this->input->post('XNomerUjian');
		$pwd=$this->input->post('XPassword');

		$this->db->where('XNomerUjian', $user);
		$this->db->where("XPassword",$pwd);

		$query=$this->db->get('cbt_siswa');
		$cek=$query->num_rows();
		// echo $cek;
		// die();
		if ($cek==1) {
			$u=$query->row();
			// print_r($u);
			// die();
			$data=array(
				'login' => 2,
				'user' => $user,
				'level' => $u->login,
			);
			$this->session->set_userdata($data);
			redirect(base_url('siswa/home'));

		} else {
			$data=array(
				'pesan' => 'Gagal menpatkan sesi login pastikan password dan username yang anda masukan benar / akun anda belum diaktivkan'
			);	
 	       $this->m_config->pindah("login",0,$data['pesan']);			
		}
	}
}
