<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Peserta_Pelajaran extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
		$this->judul="Peserta_Pelajaran";
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

	function ruang ($Urut){
		$data['Urut']=$Urut;
		$data['title']='Pilih Ruang Pelajaran';
		$this->db->select("u.*,u.Urut as XIdPelajaran,s.*, m.XNamaMapel");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri s","u.XKodeMateri = s.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("u.Urut",$Urut);

		$data['Pelajaran']=$this->db->get()->row();

		// dapatkan data ruangan
		if (!empty($d['Pelajaran']->XKodeKelas)) {
			$this->db->where("XKodeKelas",$d['Pelajaran']->XKodeKelas);
		}
		if (!empty($d['Pelajaran']->XKodeJurusan)) {
			$this->db->where("XKodeJurusan",$d['Pelajaran']->XKodeJurusan);
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
		// $d['Ruang']=$Ruang=$this->input->post("XRuang");

		

		// if (empty($Urut) || empty($Ruang)) {
		// 	redirect(base_url("admin/home"));
		// }
		// die();
		$d['title']="Kelola Peserta Pelajaran";
		$this->db->select("u.*,u.Urut as XIdPelajaran,s.*, m.XNamaMapel");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri s","u.XKodeMateri = s.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("u.Urut",$Urut);

		$d['Pelajaran']=$this->db->get()->row();

		// get kelas
		// if (!empty($d['Pelajaran']->XKodeKelas)) {
		// 	$this->db->where("XKodeKelas",$d['Pelajaran']->XKodeKelas);
		// }
		// if (!empty($d['Pelajaran']->XKodeJurusan)) {
		// 	$this->db->where("XKodeJurusan",$d['Pelajaran']->XKodeJurusan);
		// }


		// $this->db->where("XRuang",$Ruang);
		$this->db->where_in("XNamaKelas",json_decode($d['Pelajaran']->XNamaKelas));
		$this->db->select("XNamaKelas");
		$this->db->group_by("XNamaKelas");
		$d['kelas']=$this->db->get("cbt_siswa");
		// get siswa
		// if (!empty($d['Pelajaran']->XKodeKelas)) {
		// 	$this->db->where("XKodeKelas",$d['Pelajaran']->XKodeKelas);
		// }
		// if (!empty($d['Pelajaran']->XKodeJurusan)) {
		// 	$this->db->where("XKodeJurusan",$d['Pelajaran']->XKodeJurusan);
		// }

		$this->db->where_in("XNamaKelas",json_decode($d['Pelajaran']->XNamaKelas));
		$this->db->order_by("XNomerUjian","ASC");
		$d['siswa']=$this->db->get("cbt_siswa");

		$this->load->view('admin/header',$d);
		$this->load->view('admin/'.$this->judul.'_lihat',$d);
		$this->load->view('admin/footer',$d);
	}

	function lihat_tanya($Urut){

		// $d['Urut']=$Urut=$this->input->post("Urut");
		$d['Urut']=$Urut;
		// $d['Ruang']=$Ruang=$this->input->post("XRuang");

		

		// if (empty($Urut) || empty($Ruang)) {
		// 	redirect(base_url("admin/home"));
		// }
		// die();
		$d['title']="Kelola Peserta Pelajaran";
		$this->db->select("u.*,u.Urut as XIdPelajaran,s.*, m.XNamaMapel");
		$this->db->from("cbt_pelajaran u");
		$this->db->join("cbt_paketmateri s","u.XKodeMateri = s.XKodeMateri");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("u.Urut",$Urut);

		$d['Pelajaran']=$this->db->get()->row();

		// get kelas
		if (!empty($d['Pelajaran']->XKodeKelas)) {
			$this->db->where("XKodeKelas",$d['Pelajaran']->XKodeKelas);
		}
		if (!empty($d['Pelajaran']->XKodeJurusan)) {
			$this->db->where("XKodeJurusan",$d['Pelajaran']->XKodeJurusan);
		}


		// $this->db->where("XRuang",$Ruang);
		$this->db->where_in("XNamaKelas",json_decode($d['Pelajaran']->XNamaKelas));
		$this->db->select("XNamaKelas");
		$this->db->group_by("XNamaKelas");
		$d['kelas']=$this->db->get("cbt_siswa");
		// get siswa
		// if (!empty($d['Pelajaran']->XKodeKelas)) {
		// 	$this->db->where("XKodeKelas",$d['Pelajaran']->XKodeKelas);
		// }
		// if (!empty($d['Pelajaran']->XKodeJurusan)) {
		// 	$this->db->where("XKodeJurusan",$d['Pelajaran']->XKodeJurusan);
		// }

		$this->db->where_in("XNamaKelas",json_decode($d['Pelajaran']->XNamaKelas));
		$this->db->order_by("XNomerUjian","ASC");
		$d['siswa']=$this->db->get("cbt_siswa");

		$this->load->view('admin/header',$d);
		$this->load->view('admin/'.$this->judul.'_lihat_tanya',$d);
		$this->load->view('admin/footer',$d);
	}

	function reload_tanya($time,$XIdPelajaran){
		
		$this->db->where("XIdPelajaran",$XIdPelajaran);
        $this->db->order_by("XTanggal","DESC");
        // $this->db->where("XTanggal > '".$time."'" );
        $this->db->limit(5);
        $data['pesan']='';
        foreach ($this->db->get("cbt_tanya_pelajaran")->result() as $t) {
        	if ($t->XTanggal >= $time) {
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
			"XGuru" => $GLOBALS['u']['Username'],
			"XTanggal"=>$XTanggal,
			"XTanya"=>$XTanya,
			"XUser"=>2
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
