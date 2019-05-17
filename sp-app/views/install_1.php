<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    
    <title>Install</title>

    <!-- Favicons-->
    <link rel="icon" href="<?= base_url('sp-plugin/sp/'); ?>images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('sp-plugin/sp/'); ?>images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->

    <!-- CORE CSS-->
    <link href="<?= base_url('sp-plugin/materialize/css/materialize.min.css'); ?>" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url('sp-plugin/'); ?>/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url('sp-plugin/materialize/js/materialize.min.js'); ?>"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s6 m6">
          <div class="card">
            <div class="card-content">
              <span class="card-title">
                Tutorial Install
              </span>
              <p>
                <span class="red-text">Nb:</span> Versi saat ini menggunakan <b><i>PostgreSQL 11</i></b> demi kecepatan dan kestabilan aplikasi.
                <br/>
              </p>
              <ul class="collection">
                <li class="collection-item">1. Passtikan mempunyai <b><i>PostgreSQL 11</i></b></li>
                <!-- <li class="divider"></li> -->
                <li class="collection-item">2. Buat database terlebih dahulu di <b><i>PostgreSQL 11</i></b> tutorialnya cek <a href="http://google.com">google.com</a> dulu ya <br> sesuaikan dengan os yang kalian gunakan.</li>
                <li class="collection-item">3. lanjutkan Halaman ini jika sudah mengikuti langkah diatas.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col s6 m6">
          <div class="card-panel">
            <form action="<?= base_url('install/proses/1'); ?>" method="post">
              <div class="form-group">
                <label>Nama Database :</label>
                <input  autocomplete="off" type="text" name="db_name" required="required" class="form-control">
                <small class='red-text'>Buat terlebih dahulu database dengan nama yang akan digunakan</small>
              </div>
              <div class="form-group">
                <label>Alamat Host Server :</label>
                <input  autocomplete="off" type="text" name="db_host" required="required" class="form-control" value="localhost">
              </div>
              <div class="form-group">
                <label>Nama User Database :</label>
                <input  autocomplete="off" type="text" name="db_user" required="required" class="form-control">
              </div>
              <div class="form-group">
                <label>Password Database :</label>
                <input  autocomplete="off" type="text" name="db_pass" class="form-control">
              </div>
              <div class="form-group">
                <label>Alamat Utama Aplikasi anda:</label>
                <input  autocomplete="off" type="text" name="url" required="required" class="form-control">
                <small class='red-text'>contoh : http://127.0.0.1/cbt </small>
              </div>
              <?= $this->m_config->pesan(); ?>
              <div class="form-group">
                <button type="submit" name="submit" value="simpan" class="btn btn-success btn-block">Simpan / Lanjutkan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </body>
</html>