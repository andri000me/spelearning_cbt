<?php
class Install extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function index($pg=1)
	{
		if ($this->m_config->koneksi) {
			// redirect(base_url());
		}
		$this->load->view("install_".$pg);
	}
	function proses($id=1){
		switch ($id) {
			case 1:
				// simpan config
				$in['db_host']=$this->input->post("db_host");
				$in['db_name']=$this->input->post("db_name");
				$in['db_user']=$this->input->post("db_user");
				$in['db_pass']=$this->input->post("db_pass");
				$db['default'] = array(
					'dsn'	=> 'pgsql:host='.$in['db_host'].';port=5432;dbname='.$in['db_name'],
					'hostname' => $in['db_host'],
					'username' => $in['db_user'],
					'password' => $in['db_pass'],
					'database' => $in['db_name'],
					'dbdriver' => 'pdo',
				);
				
				// print_r($db);
				// die;
				try{
					$koneksi = new PDO($db['default']['dsn'],$db['default']['username'],$db['default']['password']);

					$this->load->database($db['default']);

					$sqlScript = file('supangat.sql');
					foreach ($sqlScript as $line) {
						$startWith = substr(trim($line), 0 ,2);
						$endWith = substr(trim($line), -1 ,1);
						if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') { continue; }
						$query = $query . $line;
						if ($endWith == ';'){
							if ($this->db->query($query)) {
							 	$result=1;
							 }  else {
							 	$result=0;
							 }
							$query= '';
						}
					}

					if ($result=1) {
						$as='<?php /* jangan ubah sendiri silahkan gunakan installer dari aplikasi ini */ $db_host="'.$db['default']['hostname'].'";$db_name="'.$db['default']['database'].'"; /* jangan ubah sendiri silahkan gunakan installer dari aplikasi ini */  $db_user="'.$db['default']['username'].'"; /* jangan ubah sendiri silahkan gunakan installer dari aplikasi ini */  $db_pass="'.$db['default']['password'].'"; /* jangan ubah sendiri silahkan gunakan installer dari aplikasi ini */ $url_utama="'.$_REQUEST['url'].'"; // jangan ubah sendiri silahkan gunakan installer dari aplikasi ini ?>';

						$myfile = fopen("config/db_config.php", "w") or die("Unable to open file!");
						if (!fwrite($myfile, $as)) {
							$this->m_config->pindah('install',0,"Gagal Menyimpan Config pastikan file config/db_config.php tersedia atau mendaptkan permission 777");
						} else {
							redirect("install/index/2");
						}
					} else {
						$this->m_config->pindah('install',0,"Gagag saat mengisi database silahkan lakukan penginstallan dengan database yang berbeda/ hubungi kami jika terjadi kesalahan berulang !");
					}
					
				}catch(PDOException $e){
					$this->m_config->pindah('install',0,"Koneksi Gagal ".$e->getMessage());
				}
				break;
			case 2:
				
							

				break;
			default:
				
				break;
		}
	}
}
