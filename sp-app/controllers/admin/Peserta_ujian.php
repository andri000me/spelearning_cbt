<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Peserta_ujian extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Peserta_Ujian";
	}
	public function index()
	{

		$data['title']='Kelola '.$this->judul;

		if ($GLOBALS['lvl'] != 1 ) {
			if ($this->m_config->config->XGuru2Admin != 1) {
				$this->db->where("u.XGuru",$GLOBALS['u']['Username']);
			}
		}

		$this->db->select("u.*,u.Urut as XIdUjian,s.*, m.XNamaMapel");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal s","u.XKodeSoal = s.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->order_by("u.Urut","DESC");
		// $this->db->where("u.XStatusUjian",1);
		$data['ujian']=$this->db->get()->result();

		// cek tanggal tak aktiv
		foreach ($data['ujian'] as $u => $g) {
			// cek empty key
			foreach ($g as $key => $value) {
				if (empty($value)) {
					$data['ujian'][$u]->$key="All";
				}
			}

			$buka=strtotime($g->XTglUjian);
			$tutup=strtotime($g->XBatasMasuk);
			$sekarang=strtotime(date("Y-m-d H:i:s"));
			if ($sekarang > $tutup || $g->XStatusUjian == 9) {
				$this->db->where("Urut",$g->XIdUjian);
				if ($this->db->update('cbt_ujian',['XStatusUjian' => 9])) {
					// redirect(base_url("admin/ujian"));
					$data['ujian'][$u]->XTokenUjian="Selesai";
					$data['ujian'][$u]->XDisplay='style="display:none"';
				}

				$data['ujian'][$u]->XTokenUjian="Selesai";
				$data['ujian'][$u]->XDisplay='style="display:none"';
			} else {
				$data['ujian'][$u]->XDisplay='';
			}
		}
		// print_r($data['ujian']);
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_info',$data);
		$this->load->view('admin/footer',$data);
	}
	function ruang ($Urut){
		$data['Urut']=$Urut;
		$data['title']='Pilih Ruang Ujian';
		$this->db->select("u.*,u.Urut as XIdUjian,s.*, m.XNamaMapel");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal s","u.XKodeSoal = s.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("u.Urut",$Urut);

		$data['ujian']=$this->db->get()->row();

		// dapatkan data ruangan
		if (!empty($d['ujian']->XKodeKelas)) {
			$this->db->where("XKodeKelas",$d['ujian']->XKodeKelas);
		}
		if (!empty($d['ujian']->XKodeJurusan)) {
			$this->db->where("XKodeJurusan",$d['ujian']->XKodeJurusan);
		}
		$this->db->select("XRuang");
		$this->db->group_by('XRuang');
		$this->db->order_by('XRuang');
		$data['ruang']=$this->db->get("cbt_siswa");
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/'.$this->judul.'_ruang',$data);
		$this->load->view('admin/footer',$data);
	}
	function lihat($Urut){

		// $d['Urut']=$Urut=$this->input->post("Urut");
		$d['Urut']=$Urut;
		$d['Ruang']=$Ruang=$this->input->post("XRuang");

		

		if (empty($Urut) || empty($Ruang)) {
			// redirect(base_url("admin/home"));
		}
		// die();
		$d['title']="Kelola Peserta Ujian";
		$this->db->select("u.*,u.Urut as XIdUjian,s.*, m.XNamaMapel");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal s","u.XKodeSoal = s.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("u.Urut",$Urut);

		$d['ujian']=$this->db->get()->row();

		// get kelas
		// if (!empty($d['ujian']->XKodeKelas)) {
		// 	$this->db->where("XKodeKelas",$d['ujian']->XKodeKelas);
		// }

		// if (!empty($d['ujian']->XKodeJurusan)) {
		// 	$this->db->where("XKodeJurusan",$d['ujian']->XKodeJurusan);
		// }
		// if (!empty($d['ujian']->XSesi)) {
		// 	$this->db->where("XSesi",$d['ujian']->XSesi);
		// }

		// $this->db->where("XSesi",$Ruang);
	
		$this->db->where_in("XNamaKelas",json_decode($d['ujian']->XNamaKelas));
		$this->db->select("XNamaKelas");
		$this->db->group_by("XNamaKelas");
		$d['kelas']=$this->db->get("cbt_siswa");
		// get siswa
		if (!empty($d['ujian']->XKodeKelas)) {
			$this->db->where("XKodeKelas",$d['ujian']->XKodeKelas);
		}
		if (!empty($d['ujian']->XKodeJurusan)) {
			$this->db->where("XKodeJurusan",$d['ujian']->XKodeJurusan);
		}

		$this->db->order_by("XNomerUjian","ASC");

		$d['siswa']=$this->db->get("cbt_siswa");
		$this->load->view('head_meta',$d);
		$this->load->view('admin/header',$d);
		$this->load->view('admin/'.$this->judul.'_lihat',$d);
		$this->load->view('admin/footer',$d);
	}
}
