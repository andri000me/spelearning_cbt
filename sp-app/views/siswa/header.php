
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title><?= str_replace("_"," ",$title) ?> |<?= $GLOBALS['sp']['XSekolah']; ?></title>
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

    <!-- datatables -->
    <script type="text/javascript" src="<?= base_url('sp-plugin/DataTables/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/DataTables/datatables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js'); ?>"></script>
    <!-- froala -->
    <script type="text/javascript" src="<?= base_url('sp-plugin/froala/js/froala_editor.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/date/jquery.datetimepicker.full.js'); ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->


    <link rel="stylesheet" href="<?= base_url("sp-plugin/quill/katex.min.css"); ?>" />
    <link rel="stylesheet" href="<?= base_url("sp-plugin/quill/monokai-sublime.min.css"); ?>" />
    <link rel="stylesheet" href="<?= base_url("sp-plugin/quill/quill.snow.css"); ?>" />

    <script src="<?= base_url("sp-plugin/quill/katex.min.js"); ?>"></script>
    <script src="<?= base_url("sp-plugin/quill/highlight.min.js"); ?>"></script>
    <script src="<?= base_url("sp-plugin/quill/quill.min.js"); ?>"></script>

  </head>
  <body>
    <div class="fixed-action-btn hide-on-large-only" style="right: -100px">
      <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-large red">
        <i class="material-icons large">menu</i>
      </a>
    </div>
    <!-- Start Page Loading -->
<!--     <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div> -->
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
        <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
         <nav class="gradient-45deg-light-blue-cyan">
            <div class="nav-wrapper">
              <div style="padding: 0 30px">
                <a href="<?= base_url("siswa/home"); ?>" class="brand-logo">
                    <!-- <i class="material-icons">school</i> -->
                    <span class="logo-text ">SPanel</span>
                </a>

              </div>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
               <li>
                  <a href="javascript:void(0);" class="dropdown-trigger" data-target="profile-dropdown">
                    <span class="avatar-status avatar-online">
                      <img  src="<?= base_url('asset/uploads/foto_siswa/'.$GLOBALS['u']['XFoto']); ?>" alt="avatar">
                    </span>
                  </a>
                  <ul id="profile-dropdown" class="dropdown-content" style="width: 3000px">
                    <li>
                      <a href="<?= base_url('siswa/user'); ?>#" class="black-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
                    </li>
                    <li>
                      <a href="<?= base_url('siswa/logout'); ?>#" class="black-text text-darken-1">
                        <i class="material-icons">keyboard_tab</i> Keluar</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      <!-- end header nav-->
    </header>

    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav">
          <ul id="slide-out" class="sidenav sidenav-fixed">
           <li style="padding: 0;margin: 0">
              <!-- <a href="<?= base_url('siswa/user'); ?>" style="margin: 0;padding: 0"> -->
                <div class="user-view">
                  <div class="background">
                    <img src="<?= base_url("asset/bg/rect826.png"); ?>" class="responsive-img">
                  </div>
                  <a href="<?= base_url('siswa/user'); ?>"> <img src="<?= base_url('asset/uploads/foto_siswa/'.$GLOBALS['u']['XFoto']); ?>" alt="" class="circle"></a>
                  <a href="<?= base_url('siswa/user'); ?>"><span class="white-text name"><?= $GLOBALS['u']['XNamaSiswa']; ?></span></a>
                  <a href="<?= base_url('siswa/user'); ?> "><span class="white-text email"> # <?= $GLOBALS['u']['XNomerUjian']; ?></span></a>
                </div>
              <!-- </a> -->

            </li>
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                <li >
                  <a href="<?= base_url('siswa/home'); ?>" class="waves-effect waves-cyan">
                      <i class="material-icons">pie_chart_outlined</i>
                      <span class="nav-text">Dashboard</span>
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('siswa/user'); ?>" class="">
                    <i class="material-icons">face</i> Profile</a>
                </li>

                <?php
                if ($GLOBALS['cfg']->XElearning == 1) {
                  ?>
                  <li>
                    <a href="<?= base_url('siswa/pelajaran'); ?>" class="waves-effect waves-cyan">
                        <i class="material-icons">book</i>
                        <span class="nav-text">Materi Pelajaran</span>
                    </a>
                  </li>                  
                  <?php
                }

                if ($GLOBALS['cfg']->XCbt == 1) {
                  ?>
                  <li>
                    <a href="<?= base_url('siswa/ujian'); ?>" class="waves-effect waves-cyan">
                        <i class="material-icons">border_color</i>
                        <span class="nav-text">Ujian</span>
                    </a>
                  </li>                  
                  <?php
                }

                if ($GLOBALS['cfg']->XNilai == 1) {
                  ?>
                  <li>
                    <a href="<?= base_url('siswa/nilai'); ?>" class="waves-effect waves-cyan">
                        <i class="material-icons">playlist_add_check</i>
                        <span class="nav-text">Lihat Nilai</span>
                    </a>
                  </li>                  
                  <?php
                }
                ?>
 
                <li>
                  <a href="<?= base_url('siswa/logout'); ?>">
                    <i class="material-icons">keyboard_tab</i> Keluar</a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <main>
        <section id="content" style="padding: 10px">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <div>
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title font-jos"><?= str_replace("_"," ",$title) ?></h5>
                  <ol class="breadcrumbs">
                    <li><a href="<?= base_url('siswa/home'); ?>">Dashboard</a>
                    </li>
                    <li class="active"><?= str_replace("_"," ",$title) ?></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <!-- <div class="container"> -->
          <div>
