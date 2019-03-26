<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Ujian extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Ujian";
	}
	public function index()
	{

		$data['title']='Kelola '.$this->judul;

		if ($GLOBALS['lvl'] != 1 ) {
			if ($GLOBALS['cfg']->XGuru2Admin != 1) {
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


			if ($g->XStatusUjian == 9) {

				// $this->db->where("Urut",$g->XIdUjian);
				// if ($this->db->update('cbt_ujian',['XStatusUjian' => 9])) {
					// redirect(base_url("admin/ujian"));
				// 	$data['ujian'][$u]->XTokenUjian="Selesai";
				// 	$data['ujian'][$u]->XDisplay='style="display:none"';
				// }

				$data['ujian'][$u]->XTokenUjian="Selesai";
				$data['ujian'][$u]->XDisplay='style="display:none"';
			} else {
				$data['ujian'][$u]->XDisplay='';
			}
		}
		// print_r($data['ujian']);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$this->judul.'_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah($Urut="")
	{

		if ($GLOBALS['lvl'] != 1 ) {
			if ($GLOBALS['cfg']->XGuru2Admin != 1) {
				$this->db->where("s.XGuru",$GLOBALS['u']['Username']);
			}
		}

		// echo $Urut;
		$data['title']='Tambah '.$this->judul;
		$this->load->view('admin/header',$data);
		$this->db->select("s.*, m.XNamaMapel");
		$this->db->from("cbt_paketsoal s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("s.XStatusSoal","Y");
		if (empty($urut) && $Urut == "") {
			// echo $Urut;
			$data['u']=$this->db->get()->result();
			$this->load->view('admin/'.$this->judul.'_tambah_1',$data);
		} else {
			// echo $Urut;
			$this->db->where("s.Urut",$Urut);
			$data['u']=$this->db->get()->row();
			$this->load->view('admin/'.$this->judul.'_tambah_2',$data);
		}

		$this->load->view('admin/footer',$data);
	}
	public function edit($Urut="")
	{
		// echo $Urut;
		$data['title']='Edit '.$this->judul;
		$this->load->view('admin/header',$data);
		
		$this->db->select("u.*,u.Urut as XIdUjian,s.*, m.XNamaMapel");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal s","u.XKodeSoal = s.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		// $this->db->where("u.XStatusUjian",1);
		$this->db->where("u.Urut",$Urut);
		$data['u']=$this->db->get()->row();
		// print_r($data['u']);
		$this->load->view('admin/'.$this->judul.'_tambah_2',$data);
		$this->load->view('admin/footer',$data);
		$this->m_config->form_edit(base_url("admin/".$this->judul."/proedit/".$Urut),$data['u']);
	}

	public function protam($value='')
	{
		$data['submit']=[
			'XKodeUjian' => $this->input->post('XKodeUjian'), 
			'XSemester' => $this->input->post('XSemester'), 
			'XKodeSoal' => $this->input->post('XKodeSoal'), 
			// 'XLambat' => $this->input->post('XLambat'), 
			// 'XAcakSoal' => $this->input->post('XAcakSoal'), 
			'XTglUjian' => $this->input->post('XTglUjian'), 
			// 'XJamUjian' => $this->input->post('XJamUjian'), 
			'XBatasMasuk' => $this->input->post('XBatasMasuk'), 
			// 'XSisaWaktu' => $this->input->post('XSisaWaktu'), 
			'XLamaUjian' => $this->input->post('XLamaUjian'), 
			// 'XIdleTime' => $this->input->post('XIdleTime'), 
			'XTokenUjian' => $this->input->post('XTokenUjian'), 
			'XGuru' => $GLOBALS['u']["Username"], 
			'XTglBuat' => date("Y-m-d"),		 
			'XSetId' => $this->m_config->get_tahun_ajaran(), 
			'XStatusUjian' => 1, 
			// 'XProktor' => $this->input->post('XProktor'), 
			// 'XNIPProktor' => $this->input->post('XNIPProktor'), 
			// 'XPengawas' => $this->input->post('XPengawas'), 
			// 'XNIPPengawas' => $this->input->post('XNIPPengawas'), 
			// 'XCatatan' => $this->input->post('XCatatan'), 
			'XSesi' => $this->input->post('XSesi'), 
			'XTampil' => $this->input->post('XTampil'), 
			'XStatusToken' => $this->input->post('XStatusToken'), 
			// 'XLevel' => $this->input->post('XLevel'), 
			'XPdf' => $this->input->post('XPdf'), 
			'XFilePdf' => $this->input->post('XFilePdf'), 
			'XListening' => $this->input->post('XListening'), 
		];
		if ($this->db->insert('cbt_ujian',$data['submit'])) {
			$this->m_config->pindah("admin/ujian",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/ujian",0,"Gagal Menyimpan");
		}
	}

	public function proedit($Urut)
	{
		$data['submit']=[
			'XKodeUjian' => $this->input->post('XKodeUjian'), 
			'XSemester' => $this->input->post('XSemester'), 
			'XKodeSoal' => $this->input->post('XKodeSoal'), 
			// 'XLambat' => $this->input->post('XLambat'), 
			// 'XAcakSoal' => $this->input->post('XAcakSoal'), 
			'XTglUjian' => $this->input->post('XTglUjian'), 
			// 'XJamUjian' => $this->input->post('XJamUjian'), 
			'XBatasMasuk' => $this->input->post('XBatasMasuk'), 
			// 'XSisaWaktu' => $this->input->post('XSisaWaktu'), 
			'XLamaUjian' => $this->input->post('XLamaUjian'), 
			// 'XIdleTime' => $this->input->post('XIdleTime'), 
			'XTokenUjian' => $this->input->post('XTokenUjian'), 
			'XGuru' => $GLOBALS['u']["Username"], 
			'XSetId' => $this->m_config->get_tahun_ajaran(), 
			// 'XProktor' => $this->input->post('XProktor'), 
			// 'XNIPProktor' => $this->input->post('XNIPProktor'), 
			// 'XPengawas' => $this->input->post('XPengawas'), 
			// 'XNIPPengawas' => $this->input->post('XNIPPengawas'), 
			// 'XCatatan' => $this->input->post('XCatatan'), 
			'XSesi' => $this->input->post('XSesi'), 
			'XTampil' => $this->input->post('XTampil'), 
			// 'XKodeSekolah' => $this->input->post('XKodeSekolah'), 
			'XStatusToken' => $this->input->post('XStatusToken'), 
			// 'XLevel' => $this->input->post('XLevel'), 
			'XPdf' => $this->input->post('XPdf'), 
			'XFilePdf' => $this->input->post('XFilePdf'), 
			'XListening' => $this->input->post('XListening'), 
			'XStatusUjian' => 1, 
		];
		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_ujian',$data['submit'])) {
			$this->m_config->pindah("admin/ujian",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/ujian",0,"Gagal Menyimpan");
		}
	}

	public function prosesai($Urut)
	{
		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_ujian',[
			'XStatusUjian' => 9
		])) {
			$this->m_config->pindah("admin/ujian",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/ujian",0,"Gagal Menyimpan");
		}
	}

	public function get_token()
	{
		$this->load->model("M_token");
		$haha=$this->M_token->get(5);
		$this->db->where('XTokenUjian',$haha);
		if($this->db->get('cbt_ujian')->num_rows() > 0){
			$this->get_token();
		}
		return $haha;
	}
	function hapus($Urut){
		$this->db->where("Urut",$Urut);

		if ($this->db->delete('cbt_ujian')) {
			$this->m_config->pindah("admin/ujian",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/ujian",0,"Gagal Menghapus");
		}	
	}
}
