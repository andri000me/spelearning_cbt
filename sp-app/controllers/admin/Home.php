<?php 

// ditulis oleh  @supangat_oy

if (strtotime(date("Y-m-d")) > mktime(null,null,null,3,31,2020)) {
	echo("Versi anda terlalu lama silahkan upgrade ke yang baru");
	die();
}

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();

	}
	function filter(){
		if ($GLOBALS['u']['login'] != 1) {
			$this->db->where("p.XGuru",$GLOBALS['u']['Username']);
		}
	}
	public function index()
	{
		$data['title']='Dashboard';
		$this->filter();
		$this->db->select("*,p.Urut as id_pesan");
		$this->db->from("cbt_pesan p");
		$this->db->join("cbt_user u","p.XGuru = u.Username");
		$this->db->order_by("p.Urut","DESC");
		$data['pesan']=$this->db->get()->result();

		// hitung total
		$data['total']["kelas"]=$this->db->get("cbt_kelas")->num_rows();
		$data['total']["mapel"]=$this->db->get("cbt_mapel")->num_rows();
		$data['total']["siswa"]=$this->db->get("cbt_siswa")->num_rows();

		$this->filter();
		$data['total']["ujian"]=$this->db->get("cbt_ujian")->num_rows();

		$this->filter();
		$data['total']["pelajaran"]=$this->db->get("cbt_pelajaran")->num_rows();

		$this->filter();
		$data['total']["materi"]=$this->db->get("cbt_paketmateri")->num_rows();

		$this->filter();
		$data['total']["soal"]=$this->db->get("cbt_paketsoal")->num_rows();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		

		if ($GLOBALS['u']['login'] != 1) {
			if (empty($GLOBALS['u']['XKelas']) || $GLOBALS['u']['XKelas'] == 'null' || $GLOBALS['u']['XKelas'] == '') {
				$this->load->view('admin/pesan_guru_baru',$data);
				$this->load->view('admin/reg_kelas',$data);
			} else {
				$this->load->view('admin/home',$data);
			}

		} else {
			$this->load->view('admin/home',$data);
		}

		$this->load->view('admin/footer',$data);
	}
	public function set()
	{
		$n=$this->input->post('id');
		$s=$this->db->get('cbt_config')->row_array();
		if ($s[$n] == 0) {
			$h=1;
		} else {
			$h=0;
		}
		$this->db->update('cbt_config',[$n => $h]);
	}

	public function set_server()
	{
		if ($this->m_config->cfg['XServer']) {
			$h=false;
		} else {
			$h=true;
		}
		if ($this->db->update('cbt_admin',['XServer' => $h])) {
			$data['success']=true;
		} else {
			$data['success']=false;
		}
		echo(json_encode($data));
	}
	public function propesan($value='')
	{
		$data['submit']=[
			"XPesan"=> $this->input->post('XPesan'),
			"XGuru"=> $this->input->post('XGuru'),
			"XTgl"=> $this->input->post('XTgl'),
		];

		if ($this->db->insert('cbt_pesan',$data['submit'])) {
			$this->m_config->pindah("admin/home",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/home",0,"Gagal Menyimpan");
		}
	}
	public function prohapuspesan($value='')
	{
		$this->db->where("Urut",$value);
		if ($this->db->delete('cbt_pesan')) {
			$this->m_config->pindah("admin/home",1,"Sukses Menghapus");
		} else {
			$this->m_config->pindah("admin/home",0,"Gagal Menghapus");
		}
	}
}
