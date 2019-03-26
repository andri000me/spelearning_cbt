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
   <!-- datatables -->
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

    <!-- custom js -->
    <script type="text/javascript" src="<?= base_url('sp-plugin/custom.js'); ?>"></script>


  </head>
  <body>
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
                <a href="<?= base_url("admin/home"); ?>" class="brand-logo">
                    <!-- <i class="material-icons">school</i> -->
                    <span class="logo-text ">SPanel</span>
                </a>

              </div>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
               <li>
                  <a href="javascript:void(0);" class="dropdown-trigger" data-target="profile-dropdown">
                    <span class="avatar-status avatar-online">
                      <img  src="<?= base_url('asset/uploads/foto_guru/'.$GLOBALS['u']['XFoto']); ?>" alt="avatar">
                    </span>
                  </a>
                  <ul id="profile-dropdown" class="dropdown-content" style="width: 3000px">
                    <li>
                      <a href="<?= base_url('admin/user'); ?>#" class="black-text text-darken-1">
                        <i class="material-icons">face</i> Profile</a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/logout'); ?>#" class="black-text text-darken-1">
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
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <aside class="left-sidebar-nav">
          <ul id="slide-out" class="sidenav  sidenav-fixed">
            <li style="padding: 0;margin: 0">
              <!-- <a href="<?= base_url('admin/user'); ?>" style="margin: 0;padding: 0"> -->
                <div class="user-view">
                  <div class="background">
                    <img src="<?= base_url("asset/bg/rect826.png"); ?>" class="responsive-img">
                  </div>
                  <a href="<?= base_url('admin/user'); ?>"> <img src="<?= base_url('asset/uploads/foto_guru/'.$GLOBALS['u']['XFoto']); ?>" alt="" class="circle"></a>
                  <a href="<?= base_url('admin/user'); ?>"><span class="white-text name"><?= $GLOBALS['u']['Nama']; ?></span></a>
                  <a href="<?= base_url('admin/user'); ?> "><span class="white-text email">#<?= $GLOBALS['u']['Username']; ?></span></a>
                </div>
              <!-- </a> -->

            </li>
             <li class="no-padding">
              <ul class="collapsible">
                <li>
                  <div class="collapsible-header">
                    <a href="<?= base_url('admin/home'); ?>" class="black-text">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                  </div>
                </li>
              <li>
                <div class="collapsible-header">
                  <a href="<?= base_url('admin/user'); ?>" class="black-text"><i class="material-icons">face</i> Profile</a>
                </div>

              </li>
              <?php if ($GLOBALS['lvl'] == 1) { ?>
                <li>
                  <div class="collapsible-header">
                      <i class="material-icons">school</i>
                      <span class="nav-text">Data Sekolah</span>
                  </div>
                  <ul class="collapsible-body">
                    <li>
                      <a href="<?= base_url('admin/sekolah'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">fingerprint</i>
                          <span class="nav-text">Identitas Sekolah</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/users'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">people</i>
                          <span class="nav-text">Kelola Guru/Admin</span>
                      </a>
                    </li>
                  </ul>
                </li>

                <li>
                  <div class="collapsible-header">
                      <i class="material-icons">dns</i>
                      <span class="nav-text">Administrasi</span>
                  </div>
                  <ul class="collapsible-body">
                    <li>
                      <a href="<?= base_url('admin/kelas'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">class</i>
                          <span class="nav-text">Daftar Kelas</span>
                      </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/mapel'); ?>" class="waves-effect waves-cyan">
                            <i class="material-icons">local_library</i>
                            <span class="nav-text">Mata Pelajaran</span>
                        </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/siswa'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">people</i>
                          <span class="nav-text">Kelola Siswa</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <?php } ?>
                <li>
                  <div class="collapsible-header">
                    <a href="<?= base_url('admin/cetak/kartu'); ?>" class="black-text">
                        <i class="material-icons">credit_card</i>
                        <span class="nav-text">Kartu Peserta</span>
                    </a>

                  </div>
                </li>
                <li>
                  <div class="collapsible-header">
                      <i class="material-icons">book</i>
                      <span class="nav-text">Pelajaran Online</span>
                  </div>
                  <ul class="collapsible-body collapsible" >
                    <li>
                      <a href="<?= base_url('admin/materi'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">class</i>
                          <span class="nav-text">Bank Materi</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/File_Materi'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">insert_photo</i>
                          <span class="nav-text">File Pendukung Materi</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/pelajaran'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">notifications_active</i>
                          <span class="nav-text">Seting Pembelajaran</span>
                      </a>
                    </li>
                   <li>
                      <a href="<?= base_url('admin/peserta_pelajaran'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">people</i>
                          <span class="nav-text">Status Peserta</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/cetak/daftar_hadir_pela'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">print</i>
                          <span class="nav-text">Daftar Hadir</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <div class="collapsible-header">
                      <i class="material-icons">border_color</i>
                      <span class="nav-text">Ujian Online</span>
                  </div>
                  <ul class="collapsible-body collapsible" >
                    <li>
                      <a href="<?= base_url('admin/soal'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">class</i>
                          <span class="nav-text">Bank Soal</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/File_Soal'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">insert_photo</i>
                          <span class="nav-text">File Pendukung Soal</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/ujian'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">notifications_active</i>
                          <span class="nav-text">Seting Ujian</span>
                      </a>
                    </li>
                   <li>
                      <a href="<?= base_url('admin/peserta_ujian'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">people</i>
                          <span class="nav-text">Status Peserta</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/cetak/daftar_hadir'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">print</i>
                          <span class="nav-text">Daftar Hadir</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/cetak/beritacara'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">print</i>
                          <span class="nav-text">Berita Acara</span>
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url('admin/nilai/ujian'); ?>" class="waves-effect waves-cyan">
                          <i class="material-icons">insert_photo</i>
                          <span class="nav-text">Nilai Ujian</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <div class="collapsible-header">
                <a href="<?= base_url('siswa/logout'); ?>" class="black-text">
                  <i class="material-icons">keyboard_tab</i> Keluar
                </a>
              </div>

            </li>
       
      
          </ul>

        </aside>
        <main>
        <section id="content" style="padding: 10px">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- <div class="container"> -->
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="font-jos breadcrumbs-title"><?= str_replace("_"," ",$title) ?></h5>
                  <ol class="breadcrumbs">
                    <li><a href="<?= base_url('admin/home'); ?>">Dashboard</a>
                    </li>
                    <li class="active"><?= str_replace("_"," ",$title) ?></li>
                  </ol>
                </div>
              </div>
            <!-- </div> -->
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div>
