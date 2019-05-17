<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Pelajaran extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Pelajaran";
	}
	public function index()
	{

		$data['title']='Kelola '.$this->judul;


		if ($GLOBALS['lvl'] != 1 ) {
			if ($this->m_config->config->XGuru2Admin != 1) {
				$this->db->where("u.XGuru",$GLOBALS['u']['Username']);
			}
		}

		$this->db->select("u.*,u.Urut as XIdPelajaran,s.*, m.XNamaMapel");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri s","u.XKodeMateri = s.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->order_by("u.Urut","DESC");
		// $this->db->where("u.XStatusPelajaran",1);
		$data['Pelajaran']=$this->db->get()->result();

		// cek tanggal tak aktiv
		foreach ($data['Pelajaran'] as $u => $g) {
			// cek empty key
			foreach ($g as $key => $value) {
				if (empty($value)) {
					$data['Pelajaran'][$u]->$key="All";
				}
			}

			$buka=strtotime($g->XWaktuMulai);
			$tutup=strtotime($g->XWaktuAkhir);
			$sekarang=strtotime(date("Y-m-d H:i:s"));


			if ($sekarang > $tutup || $g->XStatusPelajaran == 9) {
				$this->db->where("Urut",$g->XIdPelajaran);
				if ($this->db->update('cbt_pelajaran',['XStatusPelajaran' => 9])) {
					// redirect(base_url("admin/Pelajaran"));
					$data['Pelajaran'][$u]->XTokenPelajaran="Selesai";
					$data['Pelajaran'][$u]->XDisplay='style="display:none"';
				}

				$data['Pelajaran'][$u]->XTokenPelajaran="Selesai";
				$data['Pelajaran'][$u]->XDisplay='style="display:none"';
			} else {
				$data['Pelajaran'][$u]->XDisplay='';
			}
		}
		// print_r($data['Pelajaran']);
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/'.$this->judul.'_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function tambah($Urut="")
	{
		// echo $Urut;
		$data['title']='Tambah '.$this->judul;
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);

		if ($GLOBALS['lvl'] != 1 ) {
			if ($this->m_config->config->XGuru2Admin != 1) {
				$this->db->where("s.XGuru",$GLOBALS['u']['Username']);
			}
		}
		$this->db->select("s.*, m.XNamaMapel");
		$this->db->from("cbt_paketmateri s");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("s.XStatusMateri","Y");
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
		$this->load->view('head_meta',$data);
	
		$this->load->view('admin/header',$data);
		
		$this->db->select("u.*,u.Urut as XIdPelajaran, m.XNamaMapel");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri s","u.XKodeMateri = s.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		// $this->db->where("u.XStatusPelajaran",1);
		$this->db->where("u.Urut",$Urut);
		$data['u']=$this->db->get()->row();
		$this->load->view('admin/'.$this->judul.'_tambah_2',$data);
		$this->load->view('admin/footer',$data);
		$this->m_config->form_edit(base_url("admin/".$this->judul."/proedit/".$Urut),$data['u']);
	}

	public function protam($value='')
	{
		$data['submit']=[
			'XKodeMateri' => $this->input->post('XKodeMateri'), 
			'XTokenPelajaran' => $this->input->post('XTokenPelajaran'), 
			'XWaktuMulai' => $this->input->post('XWaktuMulai'), 
			'XWaktuAkhir' => $this->input->post('XWaktuAkhir'), 
			'XTanya' => $this->input->post('XTanya'), 
			'XGuru' => $GLOBALS['u']["Username"], 
			'XTglBuat' => date("Y-m-d"),		 
			'XStatusPelajaran' => 1, 
			'XStatusToken' => $this->input->post('XStatusToken'), 
			"LastUpdate" => time()
			
		];
		if ($this->db->insert('cbt_pelajaran',$data['submit'])) {
			$this->m_config->pindah("admin/Pelajaran",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/Pelajaran",0,"Gagal Menyimpan");
		}
	}

	public function proedit($Urut)
	{
		$data['submit']=[
			'XKodeMateri' => $this->input->post('XKodeMateri'), 
			'XTokenPelajaran' => $this->input->post('XTokenPelajaran'), 
			'XWaktuMulai' => $this->input->post('XWaktuMulai'), 
			'XWaktuAkhir' => $this->input->post('XWaktuAkhir'), 
			'XTanya' => $this->input->post('XTanya'), 
			'XGuru' => $GLOBALS['u']["Username"], 
			'XTglBuat' => date("Y-m-d"),		 
			'XStatusPelajaran' => 1, 
			'XStatusToken' => $this->input->post('XStatusToken'), 
			"LastUpdate" => time()
		];
		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_pelajaran',$data['submit'])) {
			$this->m_config->pindah("admin/Pelajaran",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/Pelajaran",0,"Gagal Menyimpan");
		}
	}

	public function prosesai($Urut)
	{
		$this->db->where("Urut",$Urut);
		if ($this->db->update('cbt_pelajaran',[
			'XStatusPelajaran' => 9,
			"LastUpdate" => time()
		])) {
			$this->m_config->pindah("admin/Pelajaran",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/Pelajaran",0,"Gagal Menyimpan");
		}
	}

	public function get_token()
	{
		$this->load->model("M_token");
		$haha=$this->M_token->get(5);
		$this->db->where('XTokenPelajaran',$haha);
		if($this->db->get('cbt_pelajaran')->num_rows() > 0){
			$this->get_token();
		}
		return $haha;
	}
}
