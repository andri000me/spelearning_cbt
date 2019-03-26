<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Sekolah extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function index()
	{
		$data['title']='Identitas Sekolah';
		$data['s']=(object) $GLOBALS['sp'];
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sekolah_info',$data);
		$this->load->view('admin/footer',$data);
	}
	public function proup()
	{
		$data['submit']=[
			'XSekolah' => ucwords($this->input->post('XSekolah')), 
			'XTingkat' => $this->input->post('XTingkat'), 
			'XAlamat' => ucwords($this->input->post('XAlamat')), 
			'XKec' => ucwords($this->input->post('XKec')), 
			'XKab' => ucwords($this->input->post('XKab')), 
			'XProp' => ucwords($this->input->post('XProp')), 
			'XTelp' => $this->input->post('XTelp'), 
			'XFax' => $this->input->post('XFax'), 
			'XEmail' => $this->input->post('XEmail'), 
			'XKepSek' => ucwords($this->input->post('XKepSek')), 
			'XKodeSekolah' => str_replace([' ','\'','"','_'], "", $this->input->post('XKodeSekolah')), 
			'XNIPKepsek' => $this->input->post('XNIPKepsek'), 
		];
		if ($this->db->update('cbt_admin',$data['submit'])) {
			$this->m_config->pindah("admin/sekolah",1,"Sukses Menyimpan");
		} else {
			$this->m_config->pindah("admin/sekolah",0,"Gagal Menyimpan");
		}
	}

	function prologo(){
		$config['upload_path']          = './asset/uploads/';
	    $config['allowed_types']        = 'gif|jpg|png';
       $config['max_size']             = 700;
        $config['max_width']            = 700;
        $config['max_height']           = 700;
	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload('file')){
	    	$data['pesan']='<div class="card-panel	 red white-text card-panel ">Gagal Upload '.$_FILES['file']['name'].'  '.$this->upload->display_errors().'</div>';
	    } else {
	    	if ($this->db->update('cbt_admin',['XLogo'=>$this->upload->data('file_name')])) {
	    		$data['pesan']="";
	    	} else {
	    		$data['pesan']="";
	    	}
	    }
        $this->m_config->pindah("admin/sekolah/",2,$data['pesan']);
	}
}
