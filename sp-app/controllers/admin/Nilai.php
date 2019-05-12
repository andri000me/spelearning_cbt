<?php 

    // ditulis oleh  @supangat_oy

defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Nilai extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function ujian()
	{
		$data['title']="Nilai Ujian";

		if ($GLOBALS['lvl'] != 1 ) {
			if ($this->m_config->config->XGuru2Admin != 1) {
				$this->db->where("u.XGuru",$GLOBALS['u']['Username']);
			}
		}

		$this->db->select("u.*,u.Urut as XIdUjian,s.*, m.XNamaMapel");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal s","u.XKodeSoal = s.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->order_by("u.Urut","DESC");
		$data['ujian']=$this->db->get()->result();
		// cek tanggal tak aktiv
		foreach ($data['ujian'] as $u => $g) {
			// cek empty key
			foreach ($g as $key => $value) {
				if (empty($value)) {
					$data['ujian'][$u]->$key="All";
				}
			}

			$buka=strtotime($g->XTglUjian);
			$tutup=strtotime($g->XBatasMasuk);
			$sekarang=strtotime(date("Y-m-d H:i:s"));


			if ($sekarang > $tutup || $g->XStatusUjian == 9) {
				$this->db->where("Urut",$g->XIdUjian);
				if ($this->db->update('cbt_ujian',['XStatusUjian' => 9])) {
					// redirect(base_url("admin/ujian"));
					$data['ujian'][$u]->XTokenUjian="Selesai";
					$data['ujian'][$u]->XDisplay='style="display:none"';
				}

				$data['ujian'][$u]->XTokenUjian="Selesai";
				$data['ujian'][$u]->XDisplay='style="display:none"';
			} else {
				$data['ujian'][$u]->XDisplay='';
			}
		}

		$this->load->view('head_meta',$data);
		$this->load->view('admin/header',$data);
		
		$this->load->view('admin/nilai_ujian_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function pdf($Urut)
	{
		if (empty($Urut)) {
			redirect(base_url());
		}

		$this->db->select("u.*,u.Urut as XIdUjian,s.*, m.XNamaMapel,m.XKKM");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal s","u.XKodeSoal = s.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("u.Urut",$Urut);

		$data['ujian']=$ujian=$this->db->get()->row();

		foreach ($data['ujian'] as $key => $value) {
			if (empty($value)) {
				$data['ujian']->$key="Semua";
			}
		}

		$this->db->select("*");
		$this->db->from("cbt_siswa s");
		$this->db->order_by("s.XNomerUjian","ASC");
		if ($ujian->XKodeKelas != "Semua") {
			$this->db->where("s.XKodeKelas",$ujian->XKodeKelas);
		}

		if ($ujian->XKodeJurusan != "Semua") {
			$this->db->where("s.XKodeJurusan",$ujian->XKodeJurusan);
		}

		$data['siswa']=$this->db->get()->result();
		$this->load->view("admin/print_header",$data);
		// print_r($data['nilai']);
		$this->load->view("admin/nilai_pdf",$data);
		$this->load->view("admin/print_footer",$data);
	}
	function excel($Urut=""){
		if (!is_numeric($Urut) || $Urut=='') {
			redirect(base_url(''));
		}

		$this->db->select("u.*,u.Urut as XIdUjian,s.*, m.XNamaMapel,m.XKKM");
		$this->db->from("cbt_ujian u");
		$this->db->join("cbt_paketsoal s","u.XKodeSoal = s.XKodeSoal");
		$this->db->join("cbt_mapel m","m.XKodeMapel = s.XKodeMapel");
		$this->db->where("u.Urut",$Urut);

		$data['ujian']=$ujian=$this->db->get()->row();

		foreach ($data['ujian'] as $key => $value) {
			if (empty($value)) {
				$data['ujian']->$key="Semua";
			}
		}

		$this->load->library('PHPExcel');
        $objPHPExcel    = new PHPExcel();
        $objPHPExcel->getSecurity()->setLockWindows(true);
        $objPHPExcel->getSecurity()->setLockStructure(true);
        $objPHPExcel->getSecurity()->setWorkbookPassword('spanel2018');

        // welcome shell
        $kl=$objPHPExcel->getActiveSheet();
        $kl->setTitle("Welcome");
        $kl->getProtection()->setSheet(true);
        $kl->setCellValueExplicit("C5","DATA NILAI ".strtoupper($ujian->XNamaMapel));
        $kl->setCellValueExplicit("C6", strtoupper($this->m_config->cfg['XSekolah']));
        $kl->setCellValueExplicit("C8", "Kelas | Rombel : ".$ujian->XKodeKelas." | ".$ujian->XKodeJurusan);
        $kl->setCellValueExplicit("C9", "Tanggal Ujian : ".date("d M Y",strtotime($ujian->XTglUjian)));
        $kl->setCellValueExplicit("C10", "Tanggal Unduh : ".date("d M Y"));


        // dapatkan keterangan kelas dan jurusan

  //       if ($ujian->XKodeKelas != "Semua") {
		// 	$this->db->where("XKodeKelas",$ujian->XKodeKelas);
		// }

		// if ($ujian->XKodeJurusan != "Semua") {
		// 	$this->db->where("XKodeJurusan",$ujian->XKodeJurusan);
		// }

		// $this->db->select("XNamaKelas,XKodeKelas");
        $this->db->where_in("XNamaKelas",json_decode($ujian->XNamaKelas));
		$this->db->group_by("XNamaKelas");
		$this->db->group_by("Urut");
		$this->db->group_by("XKodeKelas");
		$this->db->order_by("XNamaKelas","ASC");
        // die();
        foreach ($this->db->get('cbt_kelas')->result() as $k) {
            $objWorksheet1 = $objPHPExcel->createSheet();
            $objWorksheet1->setTitle($k->XNamaKelas);
            $kl=$objPHPExcel->getSheetByName($k->XNamaKelas);
            $kl->getProtection()->setSheet(true);
            
            // $kl=$objPHPExcel->getActiveSheet();
        

            // freze pane
            $kl->freezePane("A7");
            // $kl->freezePaneByColumnAndRow(3,7);
            // $kl->freezePaneByColumnAndRow(3,7);
            // $kl->
            // foreach (range("A", $objPHPExcel->getActiveSheet()->getHighestDataColumn()) as $col) {
            //     $kl->getColumnDimension($col)->setAutoSize(true);
            // }
    	
            // foreach (range('B', 'D') as $key) {
            // 	if ($key!='I' && $key!="L"&& $key!="J"&& $key!="O"&& $key!="T"&& $key!="W"&& $key!="X") {
            //         $kl->getColumnDimension($key)->setAutoSize(true);
            //     }
            // }
        	// $kl->getColumnDimension('BI')->setAutoSize(true);
            $kl->getColumnDimension('A')->setWidth(5);
            $kl->getColumnDimension('B')->setWidth(20);
            $kl->getColumnDimension('C')->setWidth(30);

            $kl->getStyle(1)->getFont()->setBold(true);
            $kl->getStyle(2)->getFont()->setBold(true);
            $kl->getStyle(3)->getFont()->setBold(true);
            
            $header = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => '000000'),
                    'name' => 'Verdana'
                )
            );
            $border = new PHPExcel_Style();
            $border->applyFromArray(
            	array(
    		        'borders' => array(
    					'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
    					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
    					'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
    					'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN	)
    				)
    			)
    		); 
           $header2 = new PHPExcel_Style();
            $header2->applyFromArray(
            	array(
            		'alignment' => array(
    	                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
    	                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
    	            ),
    		        'borders' => array(
    					'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
    					'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
    					'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
    					'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN	)
    				),
    			 	'font' => array(
    	                // 'bold' => true,
    	                'color' => array('rgb' => 'FFFFFF'),
    	            ),
    		        'fill' 	=> array(
    								'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
    								'color'		=> array('rgb' => "7699A3")
    				),
    			)
    		);

            $kl->getStyle("A1:K2")
                    ->applyFromArray($header)
                    ->getFont()->setSize(16);
            $kl->mergeCells('A1:H2');
            $kl
                ->setCellValueExplicit('A1', 'Data Nilai '.ucwords($ujian->XNamaMapel))

                ->setCellValueExplicit('A3', 'Kelas : '.$k->XNamaKelas)
                ->setCellValueExplicit('A4', 'No.')
                ->setCellValueExplicit('B4', 'No. Ujian')
                ->setCellValueExplicit('C4', 'Nama')
                ->setCellValueExplicit('D4', 'Nilai');

                // merge sell
            foreach (range("A", "D") as $K) {
                $kl->mergeCells($K.'4:'.$K.'6');
            }

            $kl->setSharedStyle($header2, "A4:D6");
            $no = 1;    
            $counter =7;


            $this->db->select("*");
			$this->db->from("cbt_siswa s");
			$this->db->order_by("s.XNomerUjian","ASC");
            $this->db->where("s.XKodeKelas",$k->XKodeKelas);
			$this->db->where("s.XNamaKelas",$k->XNamaKelas);
			$this->db->where("s.XKodeJurusan",$k->XKodeJurusan);

			foreach ($this->db->get()->result() as $s){

					$this->db->select("*");
					$this->db->from("cbt_siswa s");
					$this->db->join("cbt_nilai n","n.XNomerUjian = s.XNomerUjian");
					$this->db->join("cbt_siswa_ujian u","u.XIdUjian = n.XIdUjian AND u.XNomerUjian = n.XNomerUjian AND n.XTokenUjian = u.XTokenUjian");
					$this->db->where("s.XNomerUjian",$s->XNomerUjian);
					$this->db->where("u.XIdUjian",$ujian->XIdUjian);

					$data=$this->db->get();
					if ($data->num_rows() < 1) {
						$XTotalNilai=0;
					} else {
						$data=$data->row();
						$XTotalNilai=$data->XTotalNilai;
					}
					if ($ujian->XKKM < $XTotalNilai) {
						$ss="green";
					} elseif ($ujian->XKKM == $XTotalNilai) {
						$ss="blue";
					} else {
						$ss="red";
					}

                $kl->setCellValueExplicit('A'.$counter, $no++);
                $kl->setCellValueExplicit('B'.$counter, $s->XNomerUjian);
                $kl->setCellValueExplicit('C'.$counter, $s->XNamaSiswa);
                $kl->setCellValueExplicit('D'.$counter, $XTotalNilai);

                $counter++;
			}
			// end forea
    	    $kl->setSharedStyle($border, "A7:D".ceil($counter-1));
    	    $kl
    			->getStyle('Y7:AT'.$counter)
    			->getProtection()->setLocked(
    				PHPExcel_Style_Protection::PROTECTION_UNPROTECTED
    		);
        }

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getProperties()->setCreator("Supangat Oy")
            ->setLastModifiedBy("Supangat Oy")
            ->setTitle("Data PDD ".$this->m_config->cfg['XSekolah'])
            ->setSubject("Export PHPExcel Test Document")
            ->setDescription("Data PDD ".$this->m_config->cfg['XSekolah'])
            ->setKeywords("Data PDD ".$this->m_config->cfg['XSekolah'])
            ->setCategory("PHPExcel");
        
        $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Chace-Control: no-store, no-cache, must-revalation');
        header('Chace-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='. date('d-m-Y') .'_Nilai_'.$ujian->XKodeUjian.'_'.$ujian->XKodeMapel.'_'.$ujian->XKodeSoal.'.xlsx');
        
        $objWriter->save('php://output');

	}
}
