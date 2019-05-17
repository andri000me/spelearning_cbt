<?php 

// ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Sync extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function index()
	{
		$data['title']='Kelola Sinkronasi';
		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sync/sync.php',$data);
		$this->load->view('admin/footer',$data);
	}

	function setid(){
		$data=[
			"XIdServer" => $this->input->post("XIdServer"),
			"XHostServer" => $this->input->post("XHostServer"),
		];
		if ($this->db->update("cbt_admin",$data)) {
			$this->m_config->pindah(base_url("admin/sync/"),1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah(base_url("admin/sync/"),0,"Gagal Menyimpan");
		}
	}
	function get(){
		$this->load->library('curl');
		$data=json_decode($this->curl->simple_get($this->m_config->cfg['XHostServer']."/api/get",
			['XIdServer' => $this->m_config->cfg['XIdServer']]
		));

		if (!$data->status) {
			$res['status']=false;
			$res['pesan']=$data->pesan;
		} else {
			$res['status']=true;
	
			// sync user
			foreach ($data->data->user as $key => $v) {
				if ($v->Username != "admin") {
					$db=$this->db->where([
						'Username' => $v->Username
					])->get('cbt_user');

					$v->LastSync=time();
					if ($db->num_rows() > 0) {
						$dd=$db->row();

						if ($dd->LastUpdate < $v->LastUpdate) {
							$db=$this->db->where([
								'Username' => $v->Username
							])->update('cbt_user',$v);

							$res['data'][]='Update Username '.$v->Username;
						} else {
							$res['data'][]='Skip Username '.$v->Username;
						}

					} else {
						$this->db->insert("cbt_user",$v);
						$res['data'][]='Insert  Username '.$v->Username;
					}
				}
				// $res[]=$v;
			}
			

			// end sync user

			// sync mapel
			foreach ($data->data->mapel as $key => $v) {
				$db=$this->db->where([
					'XKodeMapel' => $v->XKodeMapel
				])->get('cbt_mapel');

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();

					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XKodeMapel' => $v->XKodeMapel
						])->update('cbt_mapel',$v);

						$res['data'][]='Update KodeMapel '.$v->XKodeMapel;
					} else {
						$res['data'][]='Skip KodeMapel '.$v->XKodeMapel;
					}

				} else {
					$this->db->insert("cbt_mapel",$v);
					$res['data'][]='Insert  KodeMapel '.$v->XKodeMapel;
				}
				// $res[]=$v;
			}
			

			// end sync mapel


			// stary sync kelas
			foreach ($data->data->kelas as $key => $v) {

				$db=$this->db->where([
					'XNamaKelas' => $v->XNamaKelas
				])->get('cbt_kelas');

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();

					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XNamaKelas' => $v->XNamaKelas
						])->update('cbt_kelas',$v);

						$res['data'][]='Update XNamaKelas '.$v->XNamaKelas;
					} else {
						$res['data'][]='Skip XNamaKelas '.$v->XNamaKelas;
					}

				} else {
					$this->db->insert("cbt_kelas",$v);
					$res['data'][]='Insert  XNamaKelas '.$v->XNamaKelas;
				}
				// $res[]=$v;
			}
			
			// end sync kelas



			// start sync siswa
			
			foreach ($data->data->siswa as $key => $v) {

				$db=$this->db->where([
					'XNomerUjian' => $v->XNomerUjian
				])->get('cbt_siswa');

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();

					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XNomerUjian' => $v->XNomerUjian
						])->update('cbt_siswa',$v);

						$res['data'][]='Update XNomerUjian '.$v->XNomerUjian;
					} else {
						$res['data'][]='Skip XNomerUjian '.$v->XNomerUjian;
					}

				} else {
					$this->db->insert("cbt_siswa",$v);
					$res['data'][]='Insert  XNomerUjian '.$v->XNomerUjian;
				}
				// $res[]=$v;
			}
			// end sync siswa

			// start sync paket soal
			
			foreach ($data->data->paketsoal as $key => $v) {
				$status=false;
				$db=$this->db->where([
					'XKodeSoal' => $v->XKodeSoal
				])->get('cbt_paketsoal');

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();
					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XKodeSoal' => $v->XKodeSoal
						])->update('cbt_paketsoal',$v);
						$res['data'][]='Update XKodeSoal '.$v->XKodeSoal;
						$status=true;
					} else {
						$res['data'][]='Skip XKodeSoal '.$v->XKodeSoal;
					}

				} else {
					$status=true;
					$this->db->insert("cbt_paketsoal",$v);
					$res['data'][]='Insert  XKodeSoal '.$v->XKodeSoal;
				}
				// $res[]=$v;

				if ($status) {

					$soal=json_decode($this->curl->simple_get($this->m_config->cfg['XHostServer']."/api/get_soal",
						[
							'XIdServer' => $this->m_config->cfg['XIdServer'],
							'XKodeSoal' => $v->XKodeSoal
						]
					));
					// print_r($soal);
					// die();
	
					foreach ($soal->data as $val) {

						// print_r($val);
						// die();
						$db=$this->db->where([
							'XKodeSoal' => $val->XKodeSoal,
							'XNomerSoal' => $val->XNomerSoal
						])->get('cbt_soal');

						if ($db->num_rows() > 0) {
							$this->db->where([
								'XKodeSoal' => $val->XKodeSoal,
								'XNomerSoal' => $val->XNomerSoal
							])->update('cbt_soal',$val);
						} else {
							$this->db->insert('cbt_soal',$val);							
						}			
					}
				}
			}
			// end sync paket soal


			// start sync ujian
			
			foreach ($data->data->ujian as $key => $v) {

				$db=$this->db->where([
					'XTokenUjian' => $v->XTokenUjian
				])->get('cbt_ujian');

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();

					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XTokenUjian' => $v->XTokenUjian
						])->update('cbt_ujian',$v);

						$res['data'][]='Update XTokenUjian '.$v->XTokenUjian;
					} else {
						$res['data'][]='Skip XTokenUjian '.$v->XTokenUjian;
					}

				} else {
					$this->db->insert("cbt_ujian",$v);
					$res['data'][]='Insert  XTokenUjian '.$v->XTokenUjian;
				}
				// $res[]=$v;
			}
			// end sync Ujian

			// start sync siswa ujian
			$tabel='siswa_ujian';
			foreach ($data->data->$tabel as $key => $v) {
				$status=false;
				$db=$this->db->where([
					'XIdUjian' => $v->XIdUjian,
					"XNomerUjian" => $v->XNomerUjian,
				])->get('cbt_'.$tabel);

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();
					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XIdUjian' => $v->XIdUjian,
							"XNomerUjian" => $v->XNomerUjian,
						])->update('cbt_'.$tabel,$v);
						$res['data'][]='Update XNomerUjian '.$v->XNomerUjian.' XIdUjian '.$v->XIdUjian;
						$status=true;
					} else {
						$res['data'][]='Skip  XNomerUjian '.$v->XNomerUjian.' XIdUjian '.$v->XIdUjian;
					}

				} else {
					$status=true;
					$this->db->insert('cbt_'.$tabel,$v);
					$res['data'][]='Insert   XNomerUjian '.$v->XNomerUjian.' XIdUjian '.$v->XIdUjian;
				}
				// $res[]=$v;

				if ($status) {

					$tabel='jawaban';
					$soal=json_decode($this->curl->simple_get($this->m_config->cfg['XHostServer']."/api/get_jawaban",
						[
							'XIdServer' => $this->m_config->cfg['XIdServer'],
							'XNomerUjian' => $v->XNomerUjian,
							"XIdUjian" => $v->XIdUjian
						]
					));

					// print_r($soal);
					// die();
	
					foreach ($soal->data as $val) {

						// print_r($val);
						// die();
						$db=$this->db->where([
							'XNomerSoal' => $val->XNomerSoal,
							'XNomerUjian' => $val->XNomerUjian,
							"XIdUjian" => $val->XIdUjian,
							"XTokenUjian" => $val->XTokenUjian
						])->get('cbt_'.$tabel);

						if ($db->num_rows() > 0) {
							$this->db->where([
								'XNomerSoal' => $val->XNomerSoal,
								'XNomerUjian' => $val->XNomerUjian,
								"XIdUjian" => $val->XIdUjian,
								"XTokenUjian" => $val->XTokenUjian
							])->update('cbt_'.$tabel,$val);
						} else {
							$this->db->insert('cbt_'.$tabel,$val);							
						}			
					}

					// get nilai
					$nilai=json_decode($this->curl->simple_get($this->m_config->cfg['XHostServer']."/api/get_nilai",
						[
							'XIdServer' => $this->m_config->cfg['XIdServer'],
							'XNomerUjian' => $v->XNomerUjian,
							"XIdUjian" => $v->XIdUjian
						]
					));

					$tabel='nilai';
					foreach ($nilai->data as $val) {
						// print_r($val);
						// die();
						$db=$this->db->where([
							'XNomerSoal' => $val->XNomerSoal,
							'XNomerUjian' => $val->XNomerUjian,
							"XIdUjian" => $val->XIdUjian,
							"XTokenUjian" => $val->XTokenUjian
						])->get('cbt_'.$tabel);

						if ($db->num_rows() > 0) {
							$this->db->where([
								'XNomerSoal' => $val->XNomerSoal,
								'XNomerUjian' => $val->XNomerUjian,
								"XIdUjian" => $val->XIdUjian,
								"XTokenUjian" => $val->XTokenUjian
							])->update('cbt_'.$tabel,$val);
						} else {
							$this->db->insert('cbt_'.$tabel,$val);							
						}			
					}

				}
			}
			// end sync siswa ujian

			// start sync paket materi
			
			foreach ($data->data->paketmateri as $key => $v) {
				$status=false;
				$db=$this->db->where([
					'XKodeMateri' => $v->XKodeMateri
				])->get('cbt_paketmateri');

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();
					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XKodeMateri' => $v->XKodeMateri
						])->update('cbt_paketmateri',$v);
						$res['data'][]='Update XKodeMateri '.$v->XKodeMateri;
						$status=true;
					} else {
						$res['data'][]='Skip XKodeMateri '.$v->XKodeMateri;
					}

				} else {
					$status=true;
					$this->db->insert("cbt_paketmateri",$v);
					$res['data'][]='Insert  XKodeMateri '.$v->XKodeMateri;
				}
				// $res[]=$v;
			}
			// end sync paket soal


			// start sync pelajaran
			
			foreach ($data->data->pelajaran as $key => $v) {

				$db=$this->db->where([
					'XTokenPelajaran' => $v->XTokenPelajaran
				])->get('cbt_pelajaran');

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();

					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XTokenPelajaran' => $v->XTokenPelajaran
						])->update('cbt_pelajaran',$v);

						$res['data'][]='Update XTokenPelajaran '.$v->XTokenPelajaran;
					} else {
						$res['data'][]='Skip XTokenPelajaran '.$v->XTokenPelajaran;
					}

				} else {
					$this->db->insert("cbt_pelajaran",$v);
					$res['data'][]='Insert  XTokenPelajaran '.$v->XTokenPelajaran;
				}
				// $res[]=$v;
			}
			// end sync pelajaran

			// start sync siswa pelajaran
			$tabel='siswa_pelajaran';
			foreach ($data->data->$tabel as $key => $v) {
				$status=false;
				$db=$this->db->where([
					'XIdPelajaran' => $v->XIdPelajaran,
					"XNomerUjian" => $v->XNomerUjian,
				])->get('cbt_'.$tabel);

				$v->LastSync=time();
				if ($db->num_rows() > 0) {
					$dd=$db->row();
					if ($dd->LastUpdate < $v->LastUpdate) {
						$db=$this->db->where([
							'XIdPelajaran' => $v->XIdPelajaran,
							"XNomerUjian" => $v->XNomerUjian,
						])->update('cbt_'.$tabel,$v);
						$res['data'][]='Update XNomerUjian '.$v->XNomerUjian.' XIdPelajaran '.$v->XIdPelajaran;
						$status=true;
					} else {
						$res['data'][]='Skip  XNomerUjian '.$v->XNomerUjian.' XIdPelajaran '.$v->XIdPelajaran;
					}

				} else {
					$status=true;
					$this->db->insert('cbt_'.$tabel,$v);
					$res['data'][]='Insert   XNomerUjian '.$v->XNomerUjian.' XIdPelajaran '.$v->XIdPelajaran;
				}
				// $res[]=$v;

			}
			// end sync siswa pelajaran


		}

		$this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($res, JSON_PRETTY_PRINT))
	      ->_display();
	      exit;
	}

	function push(){
		$this->load->library('curl');

		$tabel=['cbt_siswa_ujian','cbt_jawaban','cbt_nilai'];

		foreach ($tabel as $key => $v) {
			$data[$v]=$this->db->get($v)->result();
			
		}
	
		$res=json_decode($this->curl->simple_post($this->m_config->cfg['XHostServer']."/api/push",
			['XIdServer' => $this->m_config->cfg['XIdServer'],'data' => $data]
		));
		if ($res->status) {
			$this->db->update("cbt_admin",['LastSync' => time()]);
		}	
		$this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($res, JSON_PRETTY_PRINT))
	      ->_display();
	      exit;
	}
}