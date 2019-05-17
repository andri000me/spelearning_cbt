<?php 
// ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');

class Ujian extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->judul="Ujian";
		$this->m_config->cek_sesi("siswa");
	}
	public function index()
	{

		$data['title']="Daftar ".$this->judul;
		$this->db->select("*,u.Urut XIdUjian");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->where("XStatusUjian","1");
		// $this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
		// $this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);
		// $this->db->where_in("u.XSesi",['',$GLOBALS['u']['XSesi']]);
		$this->db->order_by("u.XStatusUjian",'ASC');
		$this->db->order_by("u.XTglUjian",'DESC');
		$data['ujian']=$this->db->get();
		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/ujian_info',$data);
		$this->load->view('siswa/footer',$data);
	}

	public function mulai($Urut)
	{
		if (empty($Urut) || !is_numeric($Urut) || $Urut ==0) {
			redirect("tidak_ada");
		} else {
			$data['title']="Mulai ".$this->judul;
			$this->db->select("*,u.Urut XIdUjian");
			$this->db->from("cbt_ujian u");
			$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
			$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
			$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
			$this->db->where("XStatusUjian","1");
			// $this->db->where_in("p.XKodeKelas",['',$GLOBALS['u']['XKodeKelas']]);
			// $this->db->where_in("p.XKodeJurusan",['',$GLOBALS['u']['XKodeJurusan']]);
			// $this->db->where_in("u.XSesi",['',$GLOBALS['u']['XSesi']]);
			$this->db->order_by("u.XStatusUjian",'ASC');
			$this->db->order_by("u.XTglUjian",'DESC');
			$this->db->where("u.Urut",$Urut);
			$data['ujian']=$this->db->get();
			$this->load->view('siswa/header',$data);
			$this->load->view('siswa/ujian_mulai',$data);
			$this->load->view('siswa/footer',$data);
		}
	}

	function cek($Urut,$token=""){
		if ($token == "") {
			$token=strtoupper($this->input->post('XTokenUjian'));
		}
		$this->db->select("u.*,m.XMapelAgama,p.XPilGanda,p.XJumPilihan");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		$this->db->where("u.Urut",$Urut);
		$this->db->where("u.XTokenUjian",$token);
		$query['ujian']=$this->db->get();
		if ($query['ujian']->num_rows() == 0) {
			$this->m_config->pindah("siswa/ujian/mulai/".$Urut,0,"Token yang anda masukan salah");
		} else {
			$ujian=$query['ujian']->row();
			// cek tanggal ujian
			$buka=strtotime($ujian->XTglUjian);
			$tutup=mktime(substr($ujian->XBatasMasuk, 11,2),substr($ujian->XBatasMasuk, 14,2)-$ujian->XLamaUjian,null ,substr($ujian->XBatasMasuk, 5,2),substr($ujian->XBatasMasuk, 8,2),substr($ujian->XBatasMasuk, 0,4));

            $sekarang=strtotime(date("Y-m-d H:i:s"));
            // echo($ujian->XKodeSoal);
            // die();
            if ($sekarang<$buka) {
				$this->m_config->pindah("siswa/ujian/mulai/".$Urut,0,"Ujian Belum Dibuka silahkan cek tanggal dimulainya ujian");
            } elseif ($ujian->XStatusUjian == 9) {
				$this->m_config->pindah("siswa/ujian/mulai/".$Urut,0,"Anda telat memasuki ruang ujian");
            } else {
            	
            	// cek db siswa ujian
            	$this->db->where("XIdUjian",$Urut);
            	$this->db->where("XTokenUjian",$token);
            	$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);

            	$query['siswa_ujian']=$this->db->get("cbt_siswa_ujian");
            	if ($query['siswa_ujian']->num_rows() == 0) {
            		$submit['siswa_ujian']=[
						'XIdUjian' => $Urut, 
						'XNomerUjian' => $GLOBALS['u']['XNomerUjian'], 
						// 'XMulaiUjian' => $this->input->post('XMulaiUjian'), 
						'XTokenUjian' => $token, 
						'XGetIP' => $this->m_config->getUserIP(), 
						"LastUpdate" => time()
            		];
            		if ($this->db->insert("cbt_siswa_ujian",$submit['siswa_ujian'])) {
            			redirect("siswa/ujian/cek/".$Urut."/".$token);
            		}
            	} else {
            		// set ke sedang mengerjakan
					$this->db->where("XIdUjian",$Urut);
            		$this->db->where("XTokenUjian",$token);
            		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
            		$this->db->update("cbt_siswa_ujian",['XStatusUjian' =>0]);
            		// cek jawaban untuk siswa
	            	$this->db->where("XIdUjian",$Urut);
	            	$this->db->where("XTokenUjian",$token);
	            	$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
	            	$query['jawaban']=$this->db->get('cbt_jawaban');
	            	if ($query['jawaban']->num_rows() < 1) {
	            		$hit=1;

	            		// mapel tidak acak
	            		// if ($ujian->XMapelAgama == "Y") {
	            		// 	$this->db->where("XAgama",$GLOBALS['u']['XPilihan']);
	            		// } elseif ($ujian->XMapelAgama == "J") {
	            		// 	$this->db->where("XAgama",$GLOBALS['u']['XKodeJurusan']);
	            		// } elseif ($ujian->XMapelAgama == "A") {
	            		// 	$this->db->where("XAgama",$GLOBALS['u']['XAgama']);
	            		// } 

	            		// echo($ujian->XMapelAgama);
	            		$this->db->where("XAcakSoal","T");
	            		$this->db->where("XJenisSoal","1");
	            		$this->db->where("XKodeSoal",$ujian->XKodeSoal);
	            		$this->db->limit($ujian->XPilGanda);
	            		$this->db->order_by("XNomerSoal","ASC");
	            		$query['soal_tidak_acak']=$this->db->get("cbt_soal");
	            		// echo($query['soal_tidak_acak']->num_rows());
	            		// die();
	            		foreach ($query['soal_tidak_acak']->result() as $soal) {
	            			// membuat jawaban
	            			$a=range(1, $ujian->XJumPilihan);
	            			// acak jawaban
	            			if ($soal->XAcakOpsi == "A") { shuffle($a); }
	            			// cari kunci jawaban
	            			// $kuncijawab=ceil(array_search($soal->XKunciJawaban, $a)+1);
	            			$submit['jawaban']=[
	            				'Urut' => $hit, 
								'XNomerSoal' => $soal->XNomerSoal, 
								'XIdUjian' => $Urut, 
								'XNomerUjian' => $GLOBALS['u']['XNomerUjian'], 
								'XTokenUjian' => $token, 
								// 'XJawaban' => $->XJawaban, 
								// 'XTemp' => $->XTemp, 
								// 'XJawabanEsai' => $->XJawabanEsai, 
								// 'XKodeJawab' => $->XKodeJawab, 
								// 'XNilaiJawab' => $->XNilaiJawab, 
								// 'XNilai' => $->XNilai, 
								// 'XNilaiEsai' => $->XNilaiEsai, 
								// 'XRagu' => $->XRagu, 
								// 'XMulai' => $->XMulai, 
								// 'XPutar' => $->XPutar, 
								// 'XMulaiV' => $->XMulaiV, 
								// 'XPutarV' => $->XPutarV, 
								// 'XTglJawab' => $->XTglJawab, 
								// 'XJamJawab' => $->XJamJawab, 
								'XKunciJawaban' => $soal->XKunciJawaban, 
								// 'Campur' => $->Campur, 
								// 'XUserPeriksa' => $->XUserPeriksa, 
								// 'XTglPeriksa' => $->XTglPeriksa, 
								// 'XJamPeriksa' => $->XJamPeriksa, 
								// 'XNamaKelas' => $->XNamaKelas, 
	            			];

	            			// membuat nomerjawaban
	            			$abcd=range("A", "E");
	            			for ($i=0; $i < $ujian->XJumPilihan; $i++) { 
	            				$submit['jawaban']["X".$abcd[$i]]=$a[$i];
	            			}

            				// print_r($submit['jawaban']);
            				// header("Content-type: text/array");
	            			$this->db->insert("cbt_jawaban",$submit['jawaban']);
            				$hit++;
	            		}
	            		// die();
	            		// mapel dengan nomer acak
	            		// if ($ujian->XMapelAgama == "Y") {
	            		// 	$this->db->where("XAgama",$GLOBALS['u']['XPilihan']);
	            		// } elseif ($ujian->XMapelAgama == "J") {
	            		// 	$this->db->where("XAgama",$GLOBALS['u']['XKodeJurusan']);
	            		// } elseif ($ujian->XMapelAgama == "A") {
	            		// 	$this->db->where("XAgama",$GLOBALS['u']['XAgama']);
	            		// } 

	            		$sisa_soal=$ujian->XPilGanda - $query['soal_tidak_acak']->num_rows();
	            		// echo $hit;
	            		// die();
	            		// end foreace
	            		if ($sisa_soal > 0) {
		            		$this->db->where("XAcakSoal","A");
		            		$this->db->where("XJenisSoal","1");
		            		$this->db->where("XKodeSoal",$ujian->XKodeSoal);
		            		// hitung soal tidak acak yang sudah diambil
		            		// echo $sisa_soal;
		            		$this->db->limit($sisa_soal);
		            		$this->db->order_by("XNomerSoal",'RANDOM');
		            		$query['soal_acak']=$this->db->get("cbt_soal");
		            		// echo $query['soal_acak']->num_rows();
		            		foreach ($query['soal_acak']->result() as $soal) {
		            			// membuat jawaban
		            			$a=range(1, $ujian->XJumPilihan);
		            			// acak jawaban
		            			if ($soal->XAcakOpsi == "A") { shuffle($a); }
		            			// cari kunci jawaban
		            			// $kuncijawab=ceil(array_search($soal->XKunciJawaban, $a)+1);
		
		            			$submit['jawaban']=[
		            				'Urut' => $hit, 
									'XNomerSoal' => $soal->XNomerSoal, 
									'XIdUjian' => $Urut, 
									'XNomerUjian' => $GLOBALS['u']['XNomerUjian'], 
									'XTokenUjian' => $token, 
									// 'XJawaban' => $->XJawaban, 
									// 'XTemp' => $->XTemp, 
									// 'XJawabanEsai' => $->XJawabanEsai, 
									// 'XKodeJawab' => $->XKodeJawab, 
									// 'XNilaiJawab' => $->XNilaiJawab, 
									// 'XNilai' => $->XNilai, 
									// 'XNilaiEsai' => $->XNilaiEsai, 
									// 'XRagu' => $->XRagu, 
									// 'XMulai' => $->XMulai, 
									// 'XPutar' => $->XPutar, 
									// 'XMulaiV' => $->XMulaiV, 
									// 'XPutarV' => $->XPutarV, 
									// 'XTglJawab' => $->XTglJawab, 
									// 'XJamJawab' => $->XJamJawab, 
									'XKunciJawaban' => $soal->XKunciJawaban, 
									// 'Campur' => $->Campur, 
									// 'XUserPeriksa' => $->XUserPeriksa, 
									// 'XTglPeriksa' => $->XTglPeriksa, 
									// 'XJamPeriksa' => $->XJamPeriksa, 
									// 'XNamaKelas' => $->XNamaKelas, 
		            			];

		            			// membuat nomerjawaban
		            			$abcd=range("A", "E");
		            			for ($i=0; $i < $ujian->XJumPilihan; $i++) { 
		            				$submit['jawaban']["X".$abcd[$i]]=$a[$i];
		            			}

		            			$this->db->insert("cbt_jawaban",$submit['jawaban']);
	            				$hit++;
	            				// print_r($submit['jawaban']);
		            		} 

	            		}
	            	}
	            	$this->session->set_userdata(['token' => strtoupper($token),"Urut"=>$Urut]);
					redirect("siswa/ujian/naskah/");
            	}
            }
		}
	}

	function naskah($No=1){
		$data['No']=$No;
		$Urut=$this->session->Urut;
		$token=$this->session->token;
		if (empty($token) || empty($Urut) || !is_numeric($Urut)) {
			redirect("tidak_ada");
		} else {
			$data['title']="Naskah Soal";
	
			// dapatkan info ujian

			$this->db->select("u.*,m.XNamaMapel,p.XPilGanda,p.XJumPilihan");
			$this->db->from("cbt_ujian u");
			$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
			$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
			$this->db->where("u.Urut",$Urut);
			$this->db->where("u.XTokenUjian",$token);
			$data['ujian']=$this->db->get()->row();

			// cek
			$data['persen']=$No/$data['ujian']->XPilGanda*100;

			// dapatkan info siswa ujain
			$this->db->where("XTokenUjian",$token);
			$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
			$this->db->where("XIdUjian",$Urut);
			$data['siswa_ujian']=$this->db->get("cbt_siswa_ujian")->row();

			// hitung sisa waktu ujian
			$selesai=mktime(date('H'),date('i')+$data['ujian']->XLamaUjian,date("s"),date('m'),date('d'),date('Y'));
			// echo(date("d m y H:i:s",$selesai));
			$sekarang=mktime(date('H'),date('i'),date("s")+$data['siswa_ujian']->XSisaWaktu,date('m'),date('d'),date('Y'));
			// echo($data['siswa_ujian']->XSisaWaktu);
			// echo(date("d m y H:i:s",$sekarang));
			// jika sudah melebihi waktu
			// die();

			if ($sekarang >= $selesai) {
				redirect(base_url("siswa/ujian/pronilai/"));
			} else {
				// hitung selisih kedua waktu
				$sisa = $selesai - $sekarang;
				$jumlah_jam = floor($sisa/3600);
				$sisa = $sisa % 3600;
				$jumlah_menit = floor($sisa/60);
				$sisa = $sisa % 60;
				$jumlah_detik = floor($sisa/1);

				$data['waktu_selesai']=[
					"jam"=>$jumlah_jam,
					"menit"=>$jumlah_menit,
					"detik"=>$jumlah_detik,
				];

				// dapatkan soal sekarang
				$this->db->select("j.*,s.*,j.Urut as Nomer,j.XRagu as Ragu");
				$this->db->from("cbt_jawaban j");
				$this->db->join("cbt_siswa_ujian sj","sj.XIdUjian =  j.XIdUjian AND sj.XNomerUjian = j.XNomerUjian");
				$this->db->join("cbt_ujian u","sj.XIdUjian = u.Urut");
				$this->db->join("cbt_soal s",'j.XNomerSoal = s.XNomerSoal AND u.XKodeSoal = s.XKodeSoal');
				$this->db->where("j.Urut",$No);
				$this->db->where("sj.XNomerUjian",$GLOBALS['u']['XNomerUjian']);
				$this->db->where("j.XNomerUjian",$GLOBALS['u']['XNomerUjian']);
				$this->db->where("sj.XTokenUjian",$token);

				$query['jawaban']=$this->db->get();
				$data['jawaban']=$query['jawaban']->row();

				// print_r($data['jawaban']);
				// cek jumlah jawaban total / soal
				$this->db->select("j.*");
				$this->db->from("cbt_jawaban j");
				$this->db->join("cbt_siswa_ujian sj","sj.XIdUjian =  j.XIdUjian",'sj.XNomerUjian = j.XNomerUjian');
				$this->db->where("sj.XNomerUjian",$GLOBALS['u']['XNomerUjian']);
				$this->db->where("j.XNomerUjian",$GLOBALS['u']['XNomerUjian']);
				$this->db->where("sj.XTokenUjian",$token);
				$this->db->order_by("j.Urut","ASC");
				$query['total_jawaban']=$this->db->get();
				$data['data_jawaban']=$query['total_jawaban']->result_array();
				$data['total_jawaban']=$query['total_jawaban']->num_rows();
				// print_r($data['data_jawaban']);
				$this->load->view("siswa/naskah_soal",$data);
			}
			// end jika sudah melebihi waktu
		}
		// end if token empty
	}

	public function selesai()
	{

		$Urut=$this->session->Urut;
		$token=$this->session->token;
		if (empty($Urut) || empty($token)) {
			redirect(base_url("tidak_ada"));
		}


		$data['title']="Selesai ".$this->judul;
		$this->db->select("*,u.Urut XIdUjian,t.XNamaUjian,m.XNamaMapel,m.XKKM");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");

		$this->db->where("u.Urut",$Urut);
		$this->db->where("u.XTokenUjian",$token);

		$data['ujian']=$this->db->get()->row();

		$this->db->where("XIdUjian",$Urut);
		$this->db->where("XTokenUjian",$token);
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);

		$data['nilai']=$this->db->get("cbt_nilai")->row();


		$this->load->view('siswa/header',$data);
		$this->load->view('siswa/ujian_selesai',$data);
		$this->load->view('siswa/footer',$data);
	}


	function pronilai(){
		$Urut=$this->session->Urut;
		$token=$this->session->token;

		$this->db->select("*,u.Urut XIdUjian");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
		$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
		// $this->db->where("XStatusUjian",1);

		$this->db->where("u.Urut",$Urut);
		$this->db->where("u.XTokenUjian",$token);
		$uj=$this->db->get()->row();
		// print_r($uj);

    	$this->db->where("XIdUjian",$Urut);
    	$this->db->where("XTokenUjian",$token);
    	$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
    	$query['jawaban']=$this->db->get('cbt_jawaban');


    	$data=[
    		"benar"=>0,
    		"salah"=>0
    	];


    	foreach ($query['jawaban']->result() as $key => $value) {
    		if ($value->XNilaiJawab == $value->XKunciJawaban) {
    			$data['benar']++;
    		} else {
    			$data['salah']++;
    		}
    	}

    	$jumpil=ceil((int) ($data['benar'] + $data['salah']));

    	$data['nilai']=round((($data['benar']/$jumpil)*$uj->XPersenPil),2);
    	$submit['nilai']=[
    		'XIdUjian' => $Urut,
    		'XNomerUjian' => $GLOBALS['u']['XNomerUjian'], 
			'XTokenUjian' => $token, 
			'XTgl' => date("Y-m-d"), 
			'XJumSoal' => $jumpil, 
			'XBenar' => $data['benar'], 
			'XSalah' => $data['salah'], 
			'XNilai' => $data['nilai'], 
			'XPersenPil' => $uj->XPersenPil, 
			// 'XPersenEsai' => $uj->XPersenEsai, 
			// 'XEsai' => $->XEsai, 
			'XTotalNilai' => $data['nilai'], 
			'XPilGanda' => $uj->XPilGanda, 
			'XStatus' => 9, 
		];

		$this->db->where("XIdUjian",$Urut);
		$this->db->where("XTokenUjian",$token);
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);


		$this->db->where("XIdUjian",$Urut);
		$this->db->where("XTokenUjian",$token);
		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);

		if ($this->db->get("cbt_nilai")->num_rows() == 0) {
			$query=$this->db->insert("cbt_nilai",$submit['nilai']);
		} else {
			$this->db->where("XIdUjian",$Urut);
			$this->db->where("XTokenUjian",$token);
			$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
			$query=$this->db->update("cbt_nilai",$submit['nilai']);
		}


		if ($query) {
			// set ke selesai mengerjakan
			$this->db->where("XIdUjian",$Urut);
    		$this->db->where("XTokenUjian",$token);
    		$this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
    		$this->db->update("cbt_siswa_ujian",['XStatusUjian' =>1,"LastUpdate" => time()]);

			redirect(base_url("siswa/ujian/selesai/".$Urut));
		}
	}
}
