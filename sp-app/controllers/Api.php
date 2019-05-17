<?php
class Api extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function get()
	{
		$data=$this->input->get();
		$res['status']=false;
		$db=$this->db->where("XIdServer",$data['XIdServer'])->get("cbt_client");
		if ($db->num_rows() == 0) {
			$res['pesan']="Id Aplikasi yang anda gunakan tidak di ketahui oleh aplikasi server pusat";
		}  else {
			$dt=$db->row();
			if (!$dt->XStatus) {
				$res['pesan']="Id Aplikasi anda belum di aktivkan / belum di perbolehkan melakukan sinkronasi ke server pusat";
			} else {
				$res['status']=true;
				// get data
				$table=['mapel','kelas','siswa','paketsoal','ujian','siswa_ujian','paketmateri','pelajaran','siswa_pelajaran'];

				foreach ($table as $key => $v) {
					$res['data'][$v]=$this->db->get("cbt_".$v)->result();
				}
			}
		}
		$this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($res, JSON_PRETTY_PRINT))
	      ->_display();
	      exit;
	}

	public function get_soal()
	{
		$data=$this->input->get();
		$res['status']=false;
		$db=$this->db->where("XIdServer",$data['XIdServer'])->get("cbt_client");
		if ($db->num_rows() == 0) {
			$res['pesan']="Id Aplikasi yang anda gunakan tidak di ketahui oleh aplikasi server pusat";
		}  else {
			$dt=$db->row();
			if (!$dt->XStatus) {
				$res['pesan']="Id Aplikasi anda belum di aktivkan / belum di perbolehkan melakukan sinkronasi ke server pusat";
			} else {
				$res['status']=true;
				$res['data']=$this->db->where("XKodeSoal",$data['XKodeSoal'])->get("cbt_soal")->result();
			}
		}
		$this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($res, JSON_PRETTY_PRINT))
	      ->_display();
	      exit;
	}



	public function get_jawaban()
	{
		$data=$this->input->get();
		$res['status']=false;
		$db=$this->db->where("XIdServer",$data['XIdServer'])->get("cbt_client");
		if ($db->num_rows() == 0) {
			$res['pesan']="Id Aplikasi yang anda gunakan tidak di ketahui oleh aplikasi server pusat";
		}  else {
			$dt=$db->row();
			if (!$dt->XStatus) {
				$res['pesan']="Id Aplikasi anda belum di aktivkan / belum di perbolehkan melakukan sinkronasi ke server pusat";
			} else {
				$res['status']=true;
				$res['data']=$this->db->where(["XNomerUjian" => $data['XNomerUjian'],'XIdUjian' => $data['XIdUjian']])->get("cbt_jawaban")->result();
			}
		}
		$this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($res, JSON_PRETTY_PRINT))
	      ->_display();
	      exit;
	}


	public function get_nilai()
	{
		$data=$this->input->get();
		$res['status']=false;
		$db=$this->db->where("XIdServer",$data['XIdServer'])->get("cbt_client");
		if ($db->num_rows() == 0) {
			$res['pesan']="Id Aplikasi yang anda gunakan tidak di ketahui oleh aplikasi server pusat";
		}  else {
			$dt=$db->row();
			if (!$dt->XStatus) {
				$res['pesan']="Id Aplikasi anda belum di aktivkan / belum di perbolehkan melakukan sinkronasi ke server pusat";
			} else {
				$res['status']=true;
				$res['data']=$this->db->where(["XNomerUjian" => $data['XNomerUjian'],'XIdUjian' => $data['XIdUjian']])->get("cbt_nilai")->result();
			}
		}
		$this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($res, JSON_PRETTY_PRINT))
	      ->_display();
	      exit;
	}



	function push(){
		$data=$this->input->post();
		$res['status']=false;
		$db=$this->db->where("XIdServer",$data['XIdServer'])->get("cbt_client");
		if ($db->num_rows() == 0) {
			$res['pesan']="Id Aplikasi yang anda gunakan tidak di ketahui oleh aplikasi server pusat";
		}  else {
			$dt=$db->row();
			if (!$dt->XStatus) {
				$res['pesan']="Id Aplikasi anda belum di aktivkan / belum di perbolehkan melakukan sinkronasi ke server pusat";
			} else {
				$res['status']=true;


				// sync data siswa_ujian/
				$tabel='cbt_siswa_ujian';
				foreach ($data['data'][$tabel] as $key => $v) {
	
					$db=$this->db->where([
						'XIdUjian' => $v['XIdUjian'],
						"XNomerUjian" => $v['XNomerUjian'],
						"XTokenUjian" => $v['XTokenUjian']

					])->get($tabel);

					$v['LastSync']=time();
					if ($db->num_rows() > 0) {
						$dd=$db->row();
						if ($dd->LastUpdate < $v['LastUpdate']) {
							$db=$this->db->where([
								'XIdUjian' => $v['XIdUjian'],
								"XNomerUjian" => $v['XNomerUjian'],
								"XTokenUjian" => $v['XTokenUjian']

							])->update($tabel,$v);
							$res['data'][]='Update XNomerUjian '.$v['XNomerUjian'].' XIdUjian '.$v['XIdUjian'];
							$status=true;
						} else {
							$res['data'][]='Skip  XNomerUjian '.$v['XNomerUjian'].' XIdUjian '.$v['XIdUjian'];
						}

					} else {
						$status=true;
						$this->db->insert($tabel,$v);
						$res['data'][]='Insert   XNomerUjian '.$v['XNomerUjian'].' XIdUjian '.$v['XIdUjian'];
					}
					// $res[]=$v;

				}


				// end sync siswa)ujian

				// sync data jawaban/
				$tabel='cbt_jawaban';
				foreach ($data['data'][$tabel] as $key => $v) {
	
					$db=$this->db->where([
						'XIdUjian' => $v['XIdUjian'],
						"XNomerUjian" => $v['XNomerUjian'],
						"XNomerSoal" => $v['XNomerSoal'],
						"XTokenUjian" => $v['XTokenUjian']

					])->get($tabel);

					if ($db->num_rows() > 0) {
						$db=$this->db->where([
							'XIdUjian' => $v['XIdUjian'],
							"XNomerUjian" => $v['XNomerUjian'],
							"XNomerSoal" => $v['XNomerSoal'],
							"XTokenUjian" => $v['XTokenUjian']

						])->update($tabel,$v);
						$res['data'][]='Update Jawaban XNomerUjian '.$v['XNomerUjian'].' XIdUjian '.$v['XIdUjian'];
						$status=true;

					} else {
						$status=true;
						$this->db->insert($tabel,$v);
						$res['data'][]='Insert Jawaban   XNomerUjian '.$v['XNomerUjian'].' XIdUjian '.$v['XIdUjian'];
					}
					// $res[]=$v;

				}

				// sync data jawaban/
				$tabel='cbt_nilai';
				foreach ($data['data'][$tabel] as $key => $v) {
	
					$db=$this->db->where([
						'XIdUjian' => $v['XIdUjian'],
						"XNomerUjian" => $v['XNomerUjian'],
						"XTokenUjian" => $v['XTokenUjian']
					])->get($tabel);

					if ($db->num_rows() > 0) {
						$db=$this->db->where([
							'XIdUjian' => $v['XIdUjian'],
							"XNomerUjian" => $v['XNomerUjian'],
							"XTokenUjian" => $v['XTokenUjian']
						])->update($tabel,$v);
						$res['data'][]='Update Nilai XNomerUjian '.$v['XNomerUjian'].' XIdUjian '.$v['XIdUjian'];
						$status=true;

					} else {
						$status=true;
						$this->db->insert($tabel,$v);
						$res['data'][]='Insert Nilai  XNomerUjian '.$v['XNomerUjian'].' XIdUjian '.$v['XIdUjian'];
					}
					// $res[]=$v;

				}


				// end sync siswa)ujian
			}
		}
		$this->output
	      ->set_status_header(200)
	      ->set_content_type('application/json', 'utf-8')
	      ->set_output(json_encode($res, JSON_PRETTY_PRINT))
	      ->_display();
	      exit;

	}
}
