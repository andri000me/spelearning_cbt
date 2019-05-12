<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Cetak extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Cetak";
	}

	function daftar_hadir(){
		$data['title']=$this->judul.' Daftar Hadir';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/daftar_hadir_1',$data);
		$this->load->view('admin/footer',$data);
	}
	function daftar_hadir_pela(){
		$data['title']=$this->judul.' Daftar Hadir';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/daftar_hadir_pela_1',$data);
		$this->load->view('admin/footer',$data);
	}
	public function kartu()
	{
		$data['title']=$this->judul.' Kartu';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/kartu_1',$data);
		$this->load->view('admin/footer',$data);
	}

	public function beritacara()
	{
		$data['title']=$this->judul.' Berita Acara';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/beritacara_1',$data);
		$this->load->view('admin/footer',$data);
	}
	public function proses_kartu()
	{
		// ujian
		$this->db->where('XKodeUjian',$this->input->post('XKodeUjian'));
		$data['tes']=$this->db->get('cbt_tes')->row();

		// $this->db->where('XKodeKelas',$this->input->post('XKodeKelas'));
		// $this->db->where('XKodeJurusan',$this->input->post('XKodeJurusan'));


		$this->db->where_in('XNamaKelas',$this->input->post('XNamaKelas'));
		$data['siswa']=$this->db->get('cbt_siswa')->result_array();
		$this->load->view("admin/print_header",$data);
		$this->load->view("admin/kartu_2",$data);
		$this->load->view("admin/print_footer",$data);
	}

	public function proses_daftar_hadir()
	{

		$this->db->select("*,u.Urut XIdUjian, u.XSesi sesi");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->where("u.Urut",$this->input->post("XKodeUjian"));
		$ujian=$data['ujian']=$this->db->get()->row();
		$data['ruang']=$this->input->post("XRuang");
		$data['info']=(array) $ujian;
		// print_r($data['info']);
		// die();
		//Our DD-MM-YYYY date string.
		$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		// dapatkan jam,

		$data['pukul1']=substr($ujian->XTglUjian, 10,6);
		$data['pukul2']=substr($ujian->XBatasMasuk, 10,6);
		// dapatkan tanggal
		$data['tgl']="".$hari[date("w",strtotime($ujian->XTglUjian))]." ".date('j',strtotime($ujian->XTglUjian))." ".$bulan[date("n",strtotime($ujian->XTglUjian))]." ".date("Y",strtotime($ujian->XTglUjian));


		if (substr($ujian->XTglUjian, 0,10) == substr($ujian->XBatasMasuk, 0,10)) {
		} else {
			$data['tgl'].=" - ".$hari[date("w",strtotime($ujian->XBatasMasuk))]." ".date('j',strtotime($ujian->XBatasMasuk))." ".$bulan[date("n",strtotime($ujian->XBatasMasuk))]." ".date("Y",strtotime($ujian->XBatasMasuk));
			$data['pukul']="";
		}

		$this->load->view("admin/print_header",$data);
		$this->load->view("admin/daftar_hadir_2",$data);
		$this->load->view("admin/print_footer",$data);
	}
	public function proses_daftar_hadir_pela()
	{

		$this->db->select("*,u.Urut XIdPelajaran");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->join("cbt_user guru","u.XGuru = guru.Username");
		$this->db->where("u.Urut",$this->input->post("XIdPelajaran"));
		$ujian=$data['ujian']=$this->db->get()->row();
		$data['ruang']=$this->input->post("XRuang");
		$data['info']=(array) $ujian;
		// print_r($data['info']);
		// die();
		//Our DD-MM-YYYY date string.
		$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		// dapatkan jam,

		// $data['pukul1']=substr($ujian->XTglUjian, 10,6);
		// $data['pukul2']=substr($ujian->XBatasMasuk, 10,6);
		// dapatkan tanggal
		// $data['tgl']="".$hari[date("w",strtotime($ujian->XTglUjian))]." ".date('j',strtotime($ujian->XTglUjian))." ".$bulan[date("n",strtotime($ujian->XTglUjian))]." ".date("Y",strtotime($ujian->XTglUjian));


		// if (substr($ujian->XTglUjian, 0,10) == substr($ujian->XBatasMasuk, 0,10)) {
		// } else {
		// 	$data['tgl'].=" - ".$hari[date("w",strtotime($ujian->XBatasMasuk))]." ".date('j',strtotime($ujian->XBatasMasuk))." ".$bulan[date("n",strtotime($ujian->XBatasMasuk))]." ".date("Y",strtotime($ujian->XBatasMasuk));
		// 	$data['pukul']="";
		// }

		$this->load->view("admin/print_header",$data);
		$this->load->view("admin/daftar_hadir_pela_2",$data);
		$this->load->view("admin/print_footer",$data);
	}
	public function proses_beritacara()
	{

		$this->db->select("*,u.Urut XIdUjian");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->where("u.Urut",$this->input->post("XKodeUjian"));
		$ujian=$data['ujian']=$this->db->get()->row();
		$data['ruang']=$this->input->post("XRuang");
		// print_r($data['ujian']);
		// die();

		//Our DD-MM-YYYY date string.
		$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		// dapatkan jam,
		$pukul1=substr($ujian->XTglUjian, 10,6);
		$pukul2=substr($ujian->XBatasMasuk, 10,6);
		// dapatkan tanggal
		$data['tgl']="Pada hari ini ".$hari[date("w",strtotime($ujian->XTglUjian))]." tanggal ".date('j',strtotime($ujian->XTglUjian))." bulan ".$bulan[date("n",strtotime($ujian->XTglUjian))]." tahun ".date("Y",strtotime($ujian->XTglUjian));


		if (substr($ujian->XTglUjian, 0,10) == substr($ujian->XBatasMasuk, 0,10)) {
			$data['pukul']=' dari pukul '.$pukul1.' sampai pukul '.$pukul2;
		} else {
			$data['tgl'].=" pukul ".$pukul1." sampai hari ini ".$hari[date("w",strtotime($ujian->XBatasMasuk))]." tanggal ".date('j',strtotime($ujian->XBatasMasuk))." bulan ".$bulan[date("n",strtotime($ujian->XBatasMasuk))]." tahun ".date("Y",strtotime($ujian->XBatasMasuk)).' pukul '.$pukul2;
			$data['pukul']="";
		}

		$tanggal=$hari[date("w")].", ".date('j')." ".$bulan[date("n")]." ".date("Y");
		$this->load->view("admin/print_header",$data);
		$this->load->view("admin/beritacara_2",$data);
		$this->load->view("admin/print_footer",$data);
	}
}
