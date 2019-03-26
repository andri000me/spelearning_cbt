<?php 
    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Pelajaran extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->judul="Pelajaran";
		$this->m_config->cek_sesi("siswa");
	}
	public function index()
	{
		$data['title']="Daftar ".$this->judul;
		$this->db->select("*,u.Urut XIdPelajaran");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->join("cbt_user guru","u.XGuru = guru.Username");
		$this->db->where("XStatusPelajaran","1");

		// $this->db->where_in("p.XNamaKelas",$GLOBALS['u']['XNamaKelas']);
		// $this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
		// $this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);

		$this->db->order_by("u.XStatusPelajaran",'ASC');
		$this->db->order_by("u.XWaktuMulai",'DESC');
		$data['Pelajaran']=$this->db->get();
		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/pelajaran_info',$data);
		$this->load->view('siswa/footer',$data);
	}

	public function cari($q='')
	{

		$data['title']="Daftar ".$this->judul;
		$this->db->select("*,u.Urut XIdPelajaran");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->join("cbt_user guru","u.XGuru = guru.Username");
		$this->db->where("m.XKodeMapel",$q);
		$this->db->where("XStatusPelajaran","1");
		// $this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
		// $this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);
		$this->db->order_by("u.XStatusPelajaran",'ASC');
		$this->db->order_by("u.XWaktuMulai",'DESC');
		$data['Pelajaran']=$this->db->get();
		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/pelajaran_info',$data);
		$this->load->view('siswa/footer',$data);
	}


	public function ikuti($Urut)
	{
		if (empty($Urut) || !is_numeric($Urut) || $Urut ==0) {
			redirect("tidak_ada");
		} else {
			$data['title']="Mulai ".$this->judul;
			$this->db->select("*,u.Urut XIdPelajaran");
			$this->db->from("cbt_pelajaran u");
			$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
			$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
			$this->db->where("XStatusPelajaran","1");
			// $this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
			// $this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);
			$this->db->order_by("u.XStatusPelajaran",'ASC');
			$this->db->order_by("u.XWaktuMulai",'DESC');
			$this->db->where("u.Urut",$Urut);
			$data['Pelajaran']=$this->db->get();
			$this->load->view('siswa/header',$data);
			$this->load->view('siswa/Pelajaran_mulai',$data);
			$this->load->view('siswa/footer',$data);
		}
	}

	function cek($Urut,$token=""){
		if ($token == "") {
			$token=strtoupper($this->input->post('XTokenPelajaran'));
		}
		$this->db->select("u.*");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->where("u.Urut",$Urut);
		$this->db->where("u.XTokenPelajaran",$token);
		$query['Pelajaran']=$this->db->get();
		if ($query['Pelajaran']->num_rows() == 0) {
			$this->m_config->pindah("siswa/Pelajaran/ikuti/".$Urut,0,"Token yang anda masukan salah");
		} else {
			$Pelajaran=$query['Pelajaran']->row();
			// cek tanggal Pelajaran
			$buka=strtotime($Pelajaran->XWaktuMulai);
			$tutup=strtotime($Pelajaran->XWaktuAkhir);

            $sekarang=strtotime(date("Y-m-d H:i:s"));
            // echo($Pelajaran->XKodeMateri);
            // die();
            if ($sekarang<$buka) {
				$this->m_config->pindah("siswa/Pelajaran/ikuti/".$Urut,0,"Pelajaran Belum Dibuka silahkan cek tanggal dimulainya Pelajaran");
            } elseif ($sekarang>=$tutup || $Pelajaran->XStatusPelajaran == 9) {
				$this->m_config->pindah("siswa/Pelajaran/ikuti/".$Urut,0,"Anda telat memasuki ruang Pelajaran");
            } else {
            	
            	// cek db siswa Pelajaran
            	$this->db->where("XIdPelajaran",$Urut);
            	$this->db->where("XTokenPelajaran",$token);
            	$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);

            	$query['siswa_Pelajaran']=$this->db->get("cbt_siswa_pelajaran");
            	if ($query['siswa_Pelajaran']->num_rows() == 0) {
            		$submit['siswa_Pelajaran']=[
						'XIdPelajaran' => $Urut, 
						'XNomerUjian' => $GLOBALS['u']['XNomerUjian'], 
						// 'XMulaiPelajaran' => $this->input->post('XMulaiPelajaran'), 
						'XTokenPelajaran' => $token, 
						'XGetIP' => $this->m_config->getUserIP(), 
            		];
            		if ($this->db->insert("cbt_siswa_pelajaran",$submit['siswa_Pelajaran'])) {
            			redirect("siswa/Pelajaran/cek/".$Urut."/".$token);
            		}
            	} else {
            		// set ke sedang mengerjakan
					$this->db->where("XIdPelajaran",$Urut);
            		$this->db->where("XTokenPelajaran",$token);
            		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
            		$this->db->update("cbt_siswa_pelajaran",['XStatusPelajaran' =>0]);
            		// cek jawaban untuk siswa
	            
	            	$this->session->set_userdata(['token' => strtoupper($token),"Urut"=>$Urut]);
					redirect("siswa/Pelajaran/naskah/");
            	}
            }
		}
	}

	function naskah(){
		// $data['No']=$No;
		$Urut=$this->session->Urut;
		$token=$this->session->token;
		if (empty($token) || empty($Urut) || !is_numeric($Urut)) {
			redirect("tidak_ada");
		} else {
	
			// dapatkan info Pelajaran

			$this->db->select("u.*,u.Urut AS XIdPelajaran, m.XNamaMapel,p.*,guru.Username,guru.Nama");
			$this->db->from("cbt_pelajaran u");
			$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
			$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
			$this->db->join("cbt_user guru","u.XGuru = guru.Username");

			$this->db->where("u.Urut",$Urut);
			$this->db->where("u.XTokenPelajaran",$token);
			$data['Pelajaran']=$this->db->get()->row();
			foreach ($data['Pelajaran'] as $key => $value) {
				if ($value=='' || empty($value)) {
					$data['Pelajaran']->$key = "Semua";
				}
			}
			// dapatkan info siswa ujain
			$this->db->where("XTokenPelajaran",$token);
			$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
			$this->db->where("XIdPelajaran",$Urut);
			$data['siswa_Pelajaran']=$this->db->get("cbt_siswa_pelajaran")->row();

			$data['title']=$data['Pelajaran']->XJudul;
			$this->load->view('siswa/header',$data);
			$this->load->view("siswa/naskah_pelajaran",$data);
			$this->load->view('siswa/footer',$data);
		}
		// end if token empty
	}

	function reload_tanya($time,$XIdPelajaran){
		
		$this->db->where("XIdPelajaran",$XIdPelajaran);
        $this->db->order_by("XTanggal","DESC");
        // $this->db->where("XTanggal > '".$time."'" );
        $this->db->limit(5);
        $data['pesan']='';
        foreach ($this->db->get("cbt_tanya_pelajaran")->result() as $t) {
        	if ($t->XTanggal > $time && $t->XTanggal != $time) {
        	// if (true) {
	        	if ($t->XUser == 1) {
	        		$this->db->select("XNamaSiswa,XFoto");
	        		$this->db->where("XNomerUjian",$t->XNomerUjian);
	        		$sis=$this->db->get("cbt_siswa")->row();
	        		if (empty($sis->XFoto)) {
	        			$sis->XFoto = '../../img/nouser.png';
	        		}
	        		$data['pesan'].='
	        		<div class="clearfix">
	        		 <div class="direct-chat-msg">
	                  <div class="direct-chat-info clearfix">
	                    <span class="direct-chat-name pull-left">'.$sis->XNamaSiswa.'</span>
	                    <span class="direct-chat-timestamp pull-right">'.date("d M h:i a",$t->XTanggal).'</span>
	                  </div>
	                  <!-- /.direct-chat-info -->
	                  <img class="direct-chat-img" src="'.base_url("asset/uploads/foto_siswa/".$sis->XFoto).'" alt="Message User Image"><!-- /.direct-chat-img -->
	                  <div class="direct-chat-text">
	                  	'.$t->XTanya.'
	                  </div>
	                  <!-- /.direct-chat-text -->
	                </div>
	                <!-- /.direct-chat-msg -->
	               </div>
	                ';
	        	} else {
	        		$this->db->select("Nama,XFoto");
	        		$this->db->where("Username",$t->XGuru);
	        		$sis=$this->db->get("cbt_user")->row();
	        		if (empty($sis->XFoto)) {
	        			$sis->XFoto = '../../img/nouser.png';
	        		}
	        		$data['pesan'].='
        		<div class="clearfix">

	                <div class="direct-chat-msg right">
	                  <div class="direct-chat-info clearfix">
	                    <span class="direct-chat-name pull-right">'.$sis->Nama.'</span>
	                    <span class="direct-chat-timestamp pull-left">'.date("d M h:i a",$t->XTanggal).'</span>
	                  </div>
	                  <!-- /.direct-chat-info -->
	                  <img class="direct-chat-img" src="'.base_url("asset/uploads/foto_siswa/".$sis->XFoto).'" alt="Message User Image"><!-- /.direct-chat-img -->
	                  <div class="direct-chat-text">
	                    '.$t->XTanya.'
	                  </div>
	                  <!-- /.direct-chat-text -->
	                </div>
	                <!-- /.direct-chat-msg -->
	               </div>
	                ';
	        	}
        	}
        }
        return $data['pesan'];
	}
	function protam_tanya(){
		$XTanya=$this->input->post("XTanya");
		$XTanggal=strtotime(date("Y-m-d H:i:s"));
		$time=$this->input->post("time");
		$XIdPelajaran = $this->input->post("id");


		if ($this->db->insert("cbt_tanya_pelajaran",[
			"XIdPelajaran" => $XIdPelajaran,
			"XNomerUjian" => $GLOBALS['u']['XNomerUjian'],
			"XTanggal"=>$XTanggal,
			"XTanya"=>$XTanya,
			"XUser"=>1
		])) {
			$data['sukses']=1;
			$data['time']=$XTanggal;
			$data['reload']=$this->reload_tanya($time,$XIdPelajaran);

		} else {
			$data['sukses']=0;
		}
		echo json_encode($data);
	}

	function refresh_tanya(){

		$XTanggal=strtotime(date("Y-m-d H:i:s"));
		$time=$this->input->post("time");
		$XIdPelajaran = $this->input->post("id");


		$data['sukses']=1;
		$data['time']=$XTanggal;
		$data['reload']=$this->reload_tanya($time,$XIdPelajaran);
		echo json_encode($data);
	}
}
