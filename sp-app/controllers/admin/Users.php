<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');

class Users extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function index()
	{
		$data['title']='Kelola Admin/Guru';
		$this->db->where('Urut != 1');
		$data['guru']=$this->db->get('cbt_user')->result();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/users_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah()
	{
		$data['title']='Tambah Admin/Guru';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/users_tambah',$data);
		$this->load->view('admin/footer',$data);
	}
	public function edit($Urut=0)
	{
		$data['title']='Edit Admin/Guru';
		$this->db->where("Urut",$Urut);
		$data['u']=$this->db->get('cbt_user')->row();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/users_edit',$data);
		$this->load->view('admin/footer',$data);
	}
	public function protam($value='')
	{
		$this->db->where("Username",$this->input->post("Username"));
		if ($this->db->get('cbt_user')->num_rows() > 0) {
			$this->m_config->pindah("admin/users",0,"Username Yang anda masukan tidak tersedia/ Sudah digunakan");
		}

		$data['submit']=[

			'Username' => str_replace(" ", "", $this->input->post('Username')), 
			'Password' => crypt('$//SP'.md5(sha1($this->input->post('Password'))),'$6$SPangat$'), 
			'Nama' => $this->input->post('Nama'), 
			'HP' => $this->input->post('HP'), 
			'login' => $this->input->post('Level'), 
			'Status' => 1	,
			"LastUpdate" => time()
 
		];
		if ($this->db->insert('cbt_user',$data['submit'])) {
			$this->m_config->pindah("admin/users",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/users",0,"Gagal Menyimpan");
		}
	}
	public function proedit($Urut=0)
	{	
		$this->db->where("Username",$this->input->post("Username"));
		$data['submit']=[
			'Username' =>  str_replace(" ", "", $this->input->post('Username')),
			'Nama' => $this->input->post('Nama'), 
			'HP' => $this->input->post('HP'), 
			'login' => $this->input->post('Level'), 
			"LastUpdate" => time()
		];
		if (!empty($this->input->post("Password"))) {
			$data['submit']['Password']=crypt('$//SP'.md5(sha1($this->input->post('Password'))),'$6$SPangat$');
		}
		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_user',$data['submit'])) {
			$this->m_config->pindah("admin/users",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/users",0,"Gagal Menyimpan");
		}
	}
	public function prost($Urut,$t)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->update('cbt_user',["Status" => $t,"LastUpdate" => time()])) {
			$this->m_config->pindah("admin/users",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/users",0,"Gagal Menyimpan");
		}

	}

	public function proha($Urut)
	{
		$this->db->where('Urut',$Urut);
		if ($this->db->delete('cbt_user')) {
			$this->m_config->pindah("admin/users",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/users",0,"Gagal Menghapus");
		}

	}


	public function api_get_user($Urut)
	{
		$this->db->where("Urut",$Urut);
		echo json_encode($this->db->get('cbt_user')->row());
	}	
}
