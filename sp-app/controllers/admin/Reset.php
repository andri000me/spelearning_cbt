<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');

class Reset extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function index()
	{
		$data['title']='Reset Data';
		$this->db->where('Urut != 1');
		$data['guru']=$this->db->get('cbt_user')->result();
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/reset',$data);
		$this->load->view('admin/footer',$data);
	}

	function aksi(){


		$user=$this->input->post('user');
		$pwd=crypt('$//SP'.md5(sha1($this->input->post('pwd'))),'$6$SPangat$');

		if ($user == $GLOBALS['u']['Username'] AND $pwd == $GLOBALS['u']['Password']) {
			if ($this->db->query('TRUNCATE "cbt_jawaban", "cbt_kelas", "cbt_mapel", "cbt_nilai", "cbt_paketmateri", "cbt_paketsoal", "cbt_pelajaran", "cbt_pesan", "cbt_siswa", "cbt_siswa_pelajaran", "cbt_siswa_ujian", "cbt_soal", "cbt_tanya_pelajaran", "cbt_ujian"')) {
				$this->m_config->pindah("admin/reset",1,'Sukses mereset');
			} else {
				$this->m_config->pindah("admin/reset",0,'Gagal reset silahkan ulangi lagi dan laporkan jika terjadi hal error berullang');
			}
		} else {
			$this->m_config->pindah("admin/reset",0,'Username dan password yang anda masukan tidak sesuai dengan akun superadmin');
		}
	}

}