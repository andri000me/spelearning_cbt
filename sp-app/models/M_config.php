<?php

class M_config extends CI_Model {
	public $koneksi;
	public $config;
	public $cfg;
	function __construct(){
		parent::__construct();
		// die();
		if (isset($GLOBALS['db_name']) AND !empty($GLOBALS['db_name'])) {
			$this->cfg=$this->db->get("cbt_admin")->row_array();
			$this->config=$this->db->get('cbt_config')->row();
			date_default_timezone_set($this->cfg['XTimeZone']);
			date_default_timezone_set("Asia/Jakarta");
			$this->koneksi=true;
		} else {
			$this->koneksi=false;
		}
	}
	function getUserIP()
	{
	    $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = $_SERVER['REMOTE_ADDR'];

	    if(filter_var($client, FILTER_VALIDATE_IP))
	    {
	        $ip = $client;
	    }
	    elseif(filter_var($forward, FILTER_VALIDATE_IP))
	    {
	        $ip = $forward;
	    }
	    else
	    {
	        $ip = $remote;
	    }

	    return $ip;
	}
	function counter(){
		$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
		$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		$tanggal=date('d')." ".date("m")." ".date("Y");
		
		$this->db->where('tanggal',$tanggal);
		$query=$this->db->get('sp_counter');
		if ($query->num_rows() == 0) {
			$this->db->insert('sp_counter',array('tanggal' => $tanggal,'total' => 0));
		} else {
			$data=$query->row_array();
			$data['total']+=1;
			$this->db->where('tanggal',$tanggal);
			$this->db->update('sp_counter',array('total' => $data['total']));
		}
	}
	
	function cek_sesi($type=''){
		$data=$this->session->login;
		if (empty($data)) {
			$data=0;
		}
		if ($type=='login') {
			if ($data==1) {
				redirect(base_url('admin/home'));
			}
		} if ($type=="siswa") {
			if ($data!=2) {
				redirect(base_url());
			} else {
				$username=$this->session->user;
				if (isset($this->session->user) && !empty($username)) {
					$this->db->select("*");
					$this->db->where('XNomerUjian',$username);
					$query=$this->db->get('cbt_siswa');
					$GLOBALS['u']=$query->row_array();
					if (empty($GLOBALS['u']['XFoto'])) {
						$GLOBALS['u']['XFoto']='../../img/nouser.png';
					}
				} else {
					redirect(base_url('admin/login'));
				}
			}
		} else {
			if ($data!=1) {
				redirect(base_url());
			} else {
				$username=$this->session->user;
				if (isset($this->session->user) && !empty($username)) {
					$this->db->select("*");
					$this->db->where('Username',$username);
					$query=$this->db->get('cbt_user');
					$GLOBALS['u']=$query->row_array();
					if (empty($GLOBALS['u']['XFoto'])) {
						$GLOBALS['u']['XFoto']='../../img/nouser.png';
					}
					$GLOBALS['lvl']=$GLOBALS['u']['login'];
				} else {
					redirect(base_url('admin/login'));
				}
			}
		}
	}

	public function get_tahun_ajaran()
	{
		$bulan_sekarang=date("m");
		$tahun_sekarang=date("Y");
		if ($bulan_sekarang < 6) {
			return ceil($tahun_sekarang-1)."/".ceil($tahun_sekarang);
		} else {
			return ceil($tahun_sekarang)."/".ceil($tahun_sekarang+1);
		}
	}
	public function pesan()
	{ 
		if (!empty($this->session->p)) {
			if (empty($this->session->s) || $this->session->s != 1) {
				$bg='red white-text';
			} else {
				$bg="green white-text";
			}
			$pesan="<div class='card-panel padding-2 medium-small ".$bg."'>".$this->session->p."</div>";
			if ($this->session->s==2) {
				return $this->session->p;
			} else {
				return $pesan;
			}
		}
	}
	public function pindah($url,$s,$p)
	{
		$this->session->set_flashdata([
			"s"=>$s,
			"p"=>$p
		]);
		redirect($url);
	}

	public function form_edit($url='',$u=array())
	{
		$data=[
			"url"=>$url,
			"u"=>$u
		];
		$this->load->view('admin/kode_edit',$data);
	}


	public function random_bg($value='')
	{
		return base_url("asset/bg/".rand(1,33).'.png');
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
}
