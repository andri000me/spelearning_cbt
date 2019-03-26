<?php 
    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi("siswa");
	}
	public function index()
	{
		$data['title']='Dashboard Siswa';


		// dapatkan total Ujian
		$this->db->select("*,u.Urut XIdUjian");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		// $this->db->where("XStatusUjian","1");
		$this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
		$this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);
		$this->db->where_in("u.XSesi",['',$GLOBALS['u']['XSesi']]);
		$ujian['total']=$this->db->get()->num_rows();

		$this->db->select("*,u.Urut XIdUjian");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->where("XStatusUjian","1");
		$this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
		$this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);
		$this->db->where_in("u.XSesi",['',$GLOBALS['u']['XSesi']]);
		$ujian['aktiv']=$this->db->get()->num_rows();



		$this->db->select("*,u.Urut XIdUjian");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->where("XStatusMateri","1");
		$this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
		$this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);
		$pelajaran['aktiv']=$this->db->get()->num_rows();

		// $data['total']=[
		// 	'pelajaran' => $pelajaran['aktiv'],
		// 	'ujian' => $ujian['aktiv']

		// ];

		$data['total']=[
			'pelajaran' => " ",
			'ujian' => " "

		];




		// $this->db->select();
		$this->db->select("*,p.Urut as id_pesan");
		$this->db->from("cbt_pesan p");
		$this->db->join("cbt_user u","p.XGuru = u.Username");
		$this->db->order_by("p.Urut","DESC");

		$data['pesan_guru']=$this->db->get()->result();
		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/home',$data);
		$this->load->view('siswa/footer',$data);
	}

}
