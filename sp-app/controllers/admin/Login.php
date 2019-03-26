<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
			// session_destroy();
	}
	public function index()
	{
		$this->load->view('admin/login');
	}
	function pro(){
		$user=$this->input->post('user');
		$pwd=crypt('$//SP'.md5(sha1($this->input->post('pwd'))),'$6$SPangat$');
		// $pwd=crypt('$//SP'.md5(sha1($this->input->post('pwd'))),'$6$SPangat$');
		// $this->db->select('username, pwd');
		$this->db->where('Username', $user);
		$this->db->where("Password",$pwd);
		$this->db->where('Status',"1");
		$query=$this->db->get('cbt_user');
		$cek=$query->num_rows();
		// echo $cek;
		// die();
		if ($cek==1) {
			$u=$query->row();
			// print_r($u);
			// die();
			$data=array(
				'login' => 1,
				'user' => $user,
				'level' => $u->login,
			);
			$this->session->set_userdata($data);
			redirect(base_url('admin/home'));
		} else {
			$data=array(
				'alert' => 'danger',
				'pesan' => 'Gagal menpatkan sesi login pastikan password dan username yang anda masukan benar / akun anda belum diaktivkan'
			);
			$this->session->set_flashdata($data);
			redirect(base_url('admin/login/'));
		}
	}
}
