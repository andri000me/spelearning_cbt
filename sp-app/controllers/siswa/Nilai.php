<?php 
    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Nilai extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi("siswa");
	}
	public function index()
	{
		$data['title']='Daftar Nilai Siswa';

		$this->db->select("*");
		$this->db->from("cbt_nilai n");
		$this->db->join("cbt_ujian u","u.Urut = n.XIdUjian");
		$this->db->join("cbt_paketsoal p","p.XKodeSoal = u.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->where("n.XNomerUjian",$GLOBALS['u']['XNomerUjian']);
		$this->db->order_by("n.Urut","DESC");

		$data['nilai']=$this->db->get()->result();
		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/nilai_info',$data);
		$this->load->view('siswa/footer',$data);
	}

}
	