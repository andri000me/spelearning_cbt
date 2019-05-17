<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Server extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function index()
	{

		$data['title']='Kelola Aplikasi Client';

		$data['client']=$this->db->order_by("Urut","ASC")->get("cbt_client");

		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/server/kelola_client',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah()
	{

		$data['title']='Kelola Aplikasi Client';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/server/tambah_client',$data);
		$this->load->view('admin/footer',$data);
	}

	public function edit($Urut)
	{
		$data['Urut']=$Urut;
		$data['p']=$this->db->where("Urut",$Urut)->get("cbt_client")->row();
		$data['title']='Kelola Aplikasi Client';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/server/edit_client',$data);
		$this->load->view('admin/footer',$data);
	}
	function proses($type){
		$data=[
			"XNama" => ucwords($this->input->post("XNama")),
			"XIdServer" => strtoupper($this->input->post("XIdServer"))
		];
		if ($type=="tambah") {
			if ($this->db->insert("cbt_client",$data)) {
				$this->m_config->pindah(base_url("admin/server/"),1,"Sukses Menyimpan");
			} else {
				$this->m_config->pindah(base_url("admin/server/"),0,"Gagal Menyimpan");
			}
		} else {
			if ($this->db->where("Urut",$this->input->post("Urut"))->update("cbt_client",$data)) {
				$this->m_config->pindah(base_url("admin/server/"),1,"Sukses Menyimpan");
			} else {
				$this->m_config->pindah(base_url("admin/server/"),0,"Gagal Menyimpan");
			}
		}
		var_dump($data);
	}


	public function set($Urut,$t)
	{
		if ($this->db->where("Urut",$Urut)->update("cbt_client",['XStatus' => $t])) {
			$this->m_config->pindah(base_url("admin/server/"),1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah(base_url("admin/server/"),0,"Gagal Menyimpan");
		}
	
	}

	public function hapus($Urut)
	{
		if ($this->db->where("Urut",$Urut)->delete("cbt_client")) {
			$this->m_config->pindah(base_url("admin/server/"),1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah(base_url("admin/server/"),0,"Gagal Menghapus");
		}
	
	}
	function setid(){
		$data=[
			"XIdServer" => $this->input->post("XIdServer"),
			"XHostServer" => $this->input->post("XHostServer"),
		];
		if ($this->db->update("cbt_admin",$data)) {
			$this->m_config->pindah(base_url("admin/server/"),1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah(base_url("admin/server/"),0,"Gagal Menyimpan");
		}

	}

}
