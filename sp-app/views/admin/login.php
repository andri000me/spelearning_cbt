<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title>Login</title>
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
    <!-- <link href="<?= base_url('sp-plugin/sp/'); ?>css//style.css" type="text/css" rel="stylesheet"> -->
     <link href="<?= base_url('sp-plugin/DataTables/datatables.min.css'); ?>" type="text/css" rel="stylesheet">
     <link href="<?= base_url('sp-plugin/DataTables/Responsive-2.2.2/css/responsive.dataTables.min.css'); ?>" type="text/css" rel="stylesheet">
     <link href="<?= base_url('sp-plugin/font-awesome/css/font-awesome.min.css'); ?>" type="text/css" rel="stylesheet">
    <!-- froala -->
     <link href="<?= base_url('sp-plugin/froala/css/froala_editor.min.css'); ?>" type="text/css" rel="stylesheet">
     <link href="<?= base_url('sp-plugin/froala/css/froala_style.min.css'); ?>" type="text/css" rel="stylesheet">
    
     <link href="<?= base_url('sp-plugin/font-awesome/css/font-awesome.min.css'); ?>" type="text/css" rel="stylesheet">
    
    <!-- Custome CSS-->
    <link href="<?= base_url('sp-plugin/custom.css'); ?>" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?= base_url('sp-plugin/'); ?>/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('sp-plugin/date/jquery.datetimepicker.min.css'); ?>">
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?= base_url('sp-plugin/'); ?>/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url('sp-plugin/materialize/js/materialize.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/font-awesome/js/font-awesome.min.js'); ?>"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?= base_url('sp-plugin/'); ?>/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?= base_url('sp-plugin/custom.js'); ?>"></script>

    <script type="text/javascript" src="<?= base_url('sp-plugin/DataTables/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/DataTables/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'); ?>"></script>

    <script type="text/javascript" src="<?= base_url('sp-plugin/froala/js/froala_editor.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/date/jquery.datetimepicker.full.js'); ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->

  </head>
  <body>
    <div class="padding-3" style="padding-top: 20px">
      <div class="row">
        <div class="col s12 m4 offset-m4">
          <form action="<?= base_url('admin/login/pro'); ?>" method='post'>
            <div class="card">
              <div class="card-content">
                <span class="card-title">
                  <?= $this->m_config->cfg['XSekolah']; ?>
                </span>
                <span>Masuk Halaman Admin/ Guru</span>
                <p>
                  <div class="input-field">
                    <input  autocomplete="off" type="text" name="user" required="required">
                    <label>Username</label>
                  </div>
                  <div class="input-field">
                    <input  autocomplete="off" type="password" name="pwd" required="required">
                    <label>Password</label>
                  </div>
                  <?php
                  if (isset($this->session->pesan)) {
                    ?>
                    <div class="card-panel red lighten-1 white-text">
                      <?= $this->session->pesan;?>
                    </div>
                    <?php
                  }
                  ?>
                  <div class="input-field">
                    <button style="width: 100%" type="submit" class="btn btn-block green">Masuk</button>
                  </div>
                </p>
              </div>
              <div class="card-content">
                <p>
                  Anda Siswa ? <a href="<?= base_url(""); ?>">Masuk Disini</a>
                </p>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>