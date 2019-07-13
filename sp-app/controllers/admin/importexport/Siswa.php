<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Siswa extends CI_Controller {
	var $judul;
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	function index(){
		$data['title']='Import / Export Data Kelas';

		$data['kelas']=$this->db->order_by('XNamaKelas',"ASC")->group_by('XNamaKelas')->select('XNamaKelas')->get('cbt_kelas');
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/importExport/siswa',$data);
		$this->load->view('admin/footer',$data);
		
	}
	function prosesimport(){
		$url=$this->input->get('url');
		$this->load->library('curl');
		$kelas=json_decode($this->curl->simple_get($url.'/api/siswa'));
		$data['pesan']='';
		if ($kelas) {

			$data['pesan']='';
			$sukses=$gagal=0;
			foreach ($kelas as $k) {
		            $this->db->where('XNamaKelas',$k->kelas);
		            if ($this->db->get('cbt_kelas')->num_rows() > 0 ) {
		            	$data['pesan'].='<div class="card-panel red white-text">Sudah ada kelas dengan nama '.$k->kelas.'</div>'; 
		            } else {
		            	$kel=explode('-', $k->kelas);
		            	$data['submit']=[
		            		'XKodeKelas' => $kel[0],
		            		'XNamaKelas' => $k->kelas,
		            		'XKodeJurusan' => $kel[1],
		            		'XStatusKelas' => 1,
			            	"LastUpdate" => time()
		            	];
			            if ($this->db->insert('cbt_kelas',$data['submit'])) {
							$sukses++;			            	
			            } else {
			            	$data['pesan'].='<div class="card-panel	 red white-text">Gagal Upload Kelas '.$k.'</div>'; 
			            }
		            }

			}

	        // echo $sukses;
	        if ($sukses > 0) {
	        	$data['pesan'].='<div class="green white-text padding-3">'.$sukses.' Data Kelas sukses di import</div>'; 
	        }
	        if ($gagal > 0 ) {
	        	$data['pesan'].='<div class="red white-text padding-3">'.$gagal.' Data Kelas gagal di import</div>'; 
	        }

	        echo $data['pesan'];
		} else {
			echo "Gagal Mengakses Url tujuan, silahkan cek kembali url yang anda masukan";
		}
	}
}