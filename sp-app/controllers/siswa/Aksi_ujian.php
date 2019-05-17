<?php 
    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Aksi_ujian extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->judul="Ujian";
		$this->m_config->cek_sesi("siswa");
	}
	function ragu($Urut,$No){
		$Urut=$this->session->Urut;
		$token=$this->session->token;

		$this->db->where("XIdUjian",$Urut);
		$this->db->where("XTokenUjian",$token);
		$this->db->where("Urut",$No);
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
		$data=$this->db->get("cbt_jawaban")->row();
		if ($data->XRagu != "Y") {
			$submit=['XRagu' => "Y"];
		} else {
			$submit=['XRagu' => "N"];
		}
		$this->db->where("XIdUjian",$Urut);
		$this->db->where("XTokenUjian",$token);
		$this->db->where("Urut",$No);
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
		$this->db->update("cbt_jawaban",$submit);
		redirect(base_url("siswa/ujian/naskah/".$No));
	}

	function player(){
		$Urut=$this->session->Urut;
		$token=$this->session->token;


		$type=$this->input->post("type");
		$file=$this->input->post("file");
		$waktu=$this->input->post("waktu");
		$putar=$this->input->post("putar");
		$no=$this->input->post("no");


		$this->db->where("XTokenUjian",$token);
		$this->db->where("XIdUjian",$Urut);
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
		$this->db->where("Urut",$no);
		if ($file=="video") {
			$f="V";
		} else {
			$f="";
		}
		if ($type == "habis") {
			$data['submit']['XPutar'.$f]=(int)($putar + 1);
			$data['submit']['XMulai'.$f]=0;
		} else {
			$data['submit']['XMulai'.$f]=$waktu;
		}
		$this->db->update("cbt_jawaban",$data['submit']);

	}

	function simpan_jawaban() {
		$Urut=$this->session->Urut;
		$token=$this->session->token;

		$pilih=$this->input->post("pilih");
		$nilai=$this->input->post("nilai");
		$no=$this->input->post("no");
		// die();
		$this->db->where("XTokenUjian",$token);
		$this->db->where("XIdUjian",$Urut);
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
		$this->db->where("Urut",$no);
		if ($this->db->update("cbt_jawaban",[
			"XJawaban" => $pilih,
			"XKodeJawab" =>"X".$pilih,
			"XNilaiJawab" => $nilai
		])) {
			echo("sukses");
		}

	}

	function simpan_waktu(){
		$Urut=$this->session->Urut;
		$token=$this->session->token;
		$n=$this->input->post("sisa");
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
		$this->db->where("XTokenUjian",$token);
		$this->db->where("XIdUjian",$Urut);
		$this->db->update("cbt_siswa_ujian",['XSisaWaktu' => $n]);
		echo("sukses");
	}
}
