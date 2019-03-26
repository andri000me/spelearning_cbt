<?php 

    // ditulis oleh  @supangat_oy

    
defined('BASEPATH') OR exit('No direct script access allowed');
defined('SP_BUY') OR exit('APLIKASI EROR SILAHKAN HUBUNGI 083873272419');


class Logout extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->m_config->cek_sesi();
	}
	public function index()
	{
        $this->session->unset_userdata(array('login','user'));
        redirect(base_url());
	}
}
