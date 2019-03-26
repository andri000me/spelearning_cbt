<?php
$langkah=isset($_REQUEST['langkah'])?$_REQUEST['langkah']:1;$pesan="";
// echo $langkah;
if (isset($_REQUEST['submit'])) {
	$kode=addslashes($_REQUEST['kode']);
	$email=addslashes($_REQUEST['email']);
	$kod=addslashes($_REQUEST['kod']);
	// kirim email
	$msg = "Proses Aktivasi Aplikasi PPD\n";
	$msg.=date("d-m-Y H:i:s");
	$msg.="\n==================================";
	$msg.="\nEmail : ".$email;
	$msg.="\nNomer Serial : ".$kode;
	$msg.="\nKode Reg : ".$kod;
	$msg.="\n==================================\n";
	$msg = wordwrap($msg,70);
	mail("zpid3805@gmail.com","Aktivasi Aplikasi PPD",$msg);

	$file=fopen("../sp-sys/core/compat/string.php", "w");
	if (fwrite($file, $kod)) {
		$pesan="Sukses menyimpan kode aktivasi silahkan cek dengan pergi kehalaman utama aplikasi anda <a href='../'>Klik Disini</a>";
	} else {
		$pesan="Gagal Menyimpan Kode, silahkan hubungi kami !";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Aktivator</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap4/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap4/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="padding-top: 20px">
		<div class="row justify-content-md-center">
			<div class="col-md-6">
				<div class="jumbotron">
					<h3>Selamat Datang di @eval com Aktivator</h3>
				<hr>
				Aktivator aplikasi mudah untuk semua produk kami <img src="img/face-glasses.svg" style="width: 30px">
				<hr>
				Silahkan Beli Produk resmi kami<br>
				<div style="text-align: right;font-size: 12px">
					<img src="img/spanel.png" style="width: 15%;"> & @eval com &copy; 2018</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h3>Tutorial Aktivasi</h3>
					</div>
					<div class="card-body">
						<img src="img/serial.png" class="img-thumbnail">
						<ol>
							<li>Silahkan Kontak kami dengan meneyertakan nomer serial yang terapat pada aplikasi</b></li>
							<li>Jika sudah masukan kode aktivasi pada halaman ini</li>
						</ol>
<!-- 						<ul>
							<li>Jika anda akan menginstall di XAMPP atau localhost dengan user <b>ROOT</b> Silahkan ikuti form dan lanjutkan menggunakan halaman ini</li>
							<li>Jika anda akan menginstall di <b>Cpanel / Hosting </b> dengan user bukan root :
								<ol>
									<li>Masuk CPANEL dan Buat database secara <b>MANUAL</b></li>
									<li>Lalu Baru ikuti langkah ini</li>
								</ol>
							</li>
						</ul>
 -->					</div>
					
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						Aktivasi aplikasi PPD
					</div>
					<div class="card-body">
						<form method="post" action="">
							<?php
							if (!empty($pesan)) {
								echo "<div class='alert alert-default'>".$pesan."</div>";
							}
							?>

							<div class="form-group">
								<label>Nomer Serial :</label>
								<input type="text" name="kode" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Email :</label>
								<input type="email" name="email" class="form-control" required="required">
							</div>
							<div class="form-group">
								<label>Kode Aktivasi :</label>
								<input type="text" name="kod" class="form-control" required="required"> 
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-success">Aktivasi Sekarang</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

  <script type="text/javascript">
  function mousedwn(e){try{if(event.button==2||event.button==3)return false}catch(e){if(e.which==3)return false}}document.oncontextmenu=function(){return false};document.ondragstart=function(){return false};document.onmousedown=mousedwn
  </script>
  <script type="text/javascript">
  window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}
  </script>
  <script type="text/javascript">
  document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}
  </script>  
