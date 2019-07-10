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

				$sq=["cbt_jawaban_Urutan_seq","cbt_kelas_Urut_seq","cbt_cleint_Urut_seq","cbt_mapel_Urut_seq","cbt_nilai_Urut_seq","cbt_paketmateri_Urut_seq","cbt_paketsoal_Urut_seq","cbt_pelajaran_Urut_seq","cbt_pesan_Urut_seq","cbt_siswa_pelajaran_Urut_seq","cbt_siswa_ujian_Urut_seq","cbt_siswa_Urut_seq","cbt_soal_Urut_seq","cbt_tanya_pelajaran_Urut_seq","cbt_tes_Urut_seq","cbt_ujian_Urut_seq"];
				foreach ($sq as $k) {
					$this->db->query('ALTER SEQUENCE "'.$k.'" RESTART WITH 1');
				}
				// die();
				$this->m_config->pindah("admin/reset",1,'Sukses mereset');
			} else {
				$this->m_config->pindah("admin/reset",0,'Gagal reset silahkan ulangi lagi dan laporkan jika terjadi hal error berullang');
			}
		} else {
			$this->m_config->pindah("admin/reset",0,'Username dan password yang anda masukan tidak sesuai dengan akun superadmin');
		}
	}

}