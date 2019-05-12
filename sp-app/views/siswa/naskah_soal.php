<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title><?= str_replace("_"," ",$title) ?> |<?= $this->m_config->cfg['XSekolah']; ?></title>
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

     <!-- jplayer -->
    <link href="<?= base_url('sp-plugin/jplayer/skin/blue.monday/css/jplayer.blue.monday.min.css'); ?>" type="text/css" rel="stylesheet">

    <script type="text/javascript" src="<?= base_url('sp-plugin/jplayer/jplayer/jquery.jplayer.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= base_url('sp-plugin/jplayer/jplayer/jplayer-responsive.js'); ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?= base_url('sp-plugin/masonry.pkgd.min.js'); ?>"></script>

    <style>


      button:focus {
        outline: none;
        background-color: #fff!important;
      }


      /*nomer jawaban*/
      .contente {margin-top:20px; margin-left:20px; margin-bottom:20px; margin-right:20px; width:330px; z-index:20; border-style:solid; border:thin;
        border-color:#ccc; padding:20px; background-color:#FFF; overflow:scroll; height:460px; font:12px/25px Verdana, Arial, Helvetica, sans-serif;}

      @media (max-width: 500px) {  /*breakpoint*/
        .contente {margin-top:20px; margin-left:20px; margin-bottom:20px; margin-right:20px; width:200px; z-index:20; border-style:solid; border:thin;
          border-color:#ccc; padding:20px; background-color:#FFF; overflow:scroll; height:160px; font:12px/25px Verdana, Arial, Helvetica, sans-serif;}
      }
      .item   {width: 50px; height: 50px; /* background-color: green; */ border:#313132; color:#fff; border-style:solid;  margin-bottom: 17px;font-size:18px; line-height:normal;}

      #awal {color:#FFF; font-family:Arial, Helvetica, sans-serif; line-height: 90%; margin:0px auto;  margin-top:20px;}
      #ahir {color:#FFF; font-family:Arial, Helvetica, sans-serif; line-height: 120%; margin:0px auto; margin-top:10px;}
      #noti-count {position:absolute; top:-12px; right:-15px; background-color:white; color:#313132; padding:5px; -webkit-border-radius: 30px;
          -moz-border-radius: 30px; border-radius: 30px; border-style:solid; border-color:#313132; width:30px; height:30px; text-align:center;}
      #noti-count div {margin-top:-5px;}


      /*end nomer jawaban*/
      [type="radio"]:not(:checked) + label:before,
      [type="radio"]:not(:checked) + label:after {
        border: none;
      }


      input[type="radio"] {opacity:0.2;  position:absolute;}  /*left:-10000;*/
      input[type="radio"] + label {cursor: pointer;}
      .A {background: url("<?= base_url("asset/img/A.png"); ?>");}
      .B {background: url("<?= base_url("asset/img/B.png"); ?>");}
      .C {background: url("<?= base_url("asset/img/C.png"); ?>");}
      .D {background: url("<?= base_url("asset/img/D.png"); ?>");}
      .E {background: url("<?= base_url("asset/img/E.png"); ?>");}
      .jawaban {padding-bottom:10px; font-size: 10pt; border:solid; border-color:#CCC;} 
      .pilihanjawaban {font-size: 10pt; padding-bottom:15px;} 
      .noti-jawab {position:absolute; background-color:white; color:#999; padding:4px;  -webkit-border-radius: 30px;
          -moz-border-radius: 30px; border-radius: 30px; border-style:solid; border-color:#999; width:27px; height:27px; text-align:center;}
      .flatRoundedCheckbox {width: 120px; height: 40px; margin: 20px 50px; position: relative;}
      .flatRoundedCheckbox div {width: 100%; height:100%; background: #d3d3d3; border-radius: 50px; position: relative; top:-30px;}     
      .cc-selector input {margin-left:0px; padding:0; -webkit-appearance:none; -moz-appearance:none; appearance:none; margin-top:-90px; top:-90px;}
      .pilih-jawaban {margin-left:0; border-radius: 30px; border-style:solid; border-color:#999; list-style:none;}
      .pilih-jawaban {background-image:url("<?= base_url("asset/img/pilih.png"); ?>"); -webkit-filter: none; -moz-filter: none; filter: none;}
      .drinkcard-cc {cursor:pointer; background-size:contain; background-repeat:no-repeat; display:inline-block; width:38px;height:28px;}



       .jp-volume-controls { display:block}
    /*   .jp-progress{ display:block}
       .jp-duration{ display:block}  */ 
       .jp-progress{ display:none}
       .jp-duration{ display:none}      
       .jp-time-holder{ display:block}  
       .jp-volume-bar{ max-width:50px   }
      @media screen and (max-width: 500px) {
      }

    </style>
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
    <!-- START div -->
    <div id="div" class="page-topbar">
      <!-- start div nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper" style="text-align: center;">
              <span class="logo-text" style="font-size: 25px">Sesi Ujian Peserta</span>
          </div>
        </nav>
      </div>
      <!-- end div nav-->
    </div>
    
    <!-- START MAIN -->
      <!-- START WRAPPER -->
      <div class="wrapper">
        <section id="content">
          <div class="container">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col s12 m3">
                    <b>
                      <div class="row" style="text-align: center;">
                        <div class="col s4 m4 padding-3">
                          No.
                        </div>
                        <div class="col s4 m4 white-text padding-3 blue ">
                          <?= $No; ?>
                        </div>
                      </div>
                    </b>
                  </div>
                  <div class="col s12 m4">
                    <b>Mata Pelajaran : </b><i><?= $ujian->XNamaMapel; ?></i>
                  </div>
                  <div class="col s12 m5">
                    <div class="row" style="text-align: center;">
                      <div class="col s12 m4 white-text padding-3 blue-grey lighten-1">SISA WAKTU</div>
                      <div id="timer" class=" col s12 m8 white-text padding-3 blue-grey darken-4"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-action">
                Ganti Ukuran Font :
                <button onclick="ukuran_huruf(15)" style="background: none;border: none; font-size: 15px "><b>A</b></button>
                <button onclick="ukuran_huruf(20)" style="background: none;border: none; font-size: 20px "><b>A</b></button>
                <button onclick="ukuran_huruf(25)" style="background: none;border: none; font-size: 25px "><b>A</b></button>
              </div>
            </div>
            <!-- end card 1 -->
            <div class="progress">
                <div class="determinate blue" style="width: <?= $persen; ?>%"></div>
            </div>
            <!-- start card 2 -->
            <div class="card">
              <div class="card-content cc-selector" id="soal">
                <div class="" style="">
                  <?php
                  $jawaban_array=(array) $jawaban;
                   echo $jawaban->XTanya; 
                    // cek pertanyaan gambar
                    if (!empty($jawaban->XGambarTanya)) {
                      ?>

                      <p><img class='materialboxed responsive-img' width="500" src="<?= base_url("asset/uploads/cbt/gambar/".$jawaban->XGambarTanya); ?>"></p>
                      <?php
                    }



                    // print_r($ujian);
                    // pertanyaan dengan video
                    if (!empty($jawaban->XVideoTanya)) {
                      if ($jawaban->XPutarV < $ujian->XListening) {
                        ?>
                        <div class="" style="width: 100%;overflow-x: scroll;">
                          <input type="hidden" name="berhenti2" id="berhenti2">
                          <div id="jp_container_3" class="jp-video jp-video-270p"   role="application" aria-label="media player">
                            <div class="jp-type-single">
                              <div id="jquery_jplayer_3" class="jp-jplayer"></div>
                              <div class="jp-gui">
                                <div class="jp-video-play">
                                  <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                                </div>
                                <div class="jp-interface">
                                  <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                      <div class="jp-play-bar"></div>
                                    </div>
                                  </div>
                                  <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                  <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                                  <div class="jp-controls-holder">
                                    <div class="jp-controls">
                                      <button class="jp-play" role="button" tabindex="0">play</button>
                                      <button class="jp-stop" role="button" tabindex="0">stop</button>
                                    </div>
                                    <div class="jp-volume-controls">
                                      <button class="jp-mute" role="button" tabindex="0">mute</button>
                                      <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                      <div class="jp-volume-bar">
                                        <div class="jp-volume-bar-value"></div>
                                      </div>
                                    </div>
                                    <div class="jp-toggles">
                                      <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                      <button class="jp-full-screen" role="button" tabindex="0">full screen</button>
                                    </div>
                                  </div>
                                  <div class="jp-details">
                                    <div class="jp-title" aria-label="title">&nbsp;</div>
                                  </div>
                                </div>
                              </div>
                              <div class="jp-no-solution">
                                <pan>Update Required</span>
                                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                              </div>
                            </div>
                          </div>

                        </div>
                        <br/>
                        Sisa Pemutaran: <?=  (int) ($ujian->XListening - $jawaban->XPutarV) ?>X
                        <br/>
                        <small class="red-text"> Gunakan jika video tidak muncul / Tidak bisa diputar</small><br/>
                        <button class="btn " onclick="reload_halaman()"><i class="material-icons left">refresh</i> refresh video player</button> 
                        <script type="text/javascript">
                          $(document).ready(function() {
                              $("#jquery_jplayer_3").jPlayer({
                                ready: function () {
                                  // alert("as");
                                  $(this).jPlayer("setMedia", {
                                    title: " <?php echo "VideoPlayer | ".$this->m_config->cfg['XSekolah'];?>",
                                    m4v: "<?= base_url("asset/uploads/cbt/video/".$jawaban->XVideoTanya); ?>",
                                    ogv: "<?= base_url("asset/uploads/cbt/video/".$jawaban->XVideoTanya); ?>",
                                    webmv: "<?= base_url("asset/uploads/cbt/video/".$jawaban->XVideoTanya); ?>",
                                    poster: "<?= base_url("asset/img/media-v.png"); ?>"
                                  });
                                  $(this).jPlayer("pause", <?php echo $jawaban->XMulaiV; ?>); // stop all players except this one.
                                },
                                /*play: function() { // To avoid multiple jPlayers playing together.
                                  $(this).jPlayer("pauseOthers");
                                },
                                */
                                
                                swfPath: "sp-plugin/jplayer/jplayer",
                                supplied: "webmv, ogv, m4v",
                                cssSelectorAncestor: "#jp_container_3",
                                globalVolume: true,
                                useStateClassSkin: true,
                                autoBlur: false,
                                smoothPlayBar: true,
                                keyEnabled: true,   
                                wmode: "window",
                                useStateClassSkin: true,
                                remainingDuration: true,
                                toggleDuration: false,
                                  play : function(){
    
                                    //$('a.get_pic').remove();
                                    //$('a.get_pic').removeAttr('href'); // hilangkan href pada class get_pic
                                    $("a.get_pic").removeClass("get_pic").addClass("get1_pic");
                                    //alert("S");

                                        $("#tomb").attr('disabled', 'disabled');
                                        $("#tombol").attr('disabled', 'disabled');
                                        //alert(s);                 
                                      
                                    },
                                    pause : function(){
                                    //alert("S2");
                                    var henti2 = $(this).data("jPlayer").status.currentTime;
                                    //alert(henti2);
                                    var anu2 = document.getElementById("berhenti2").innerHTML = aksi_player("pause",'video',henti2); 
                                    
                                       
                                    $("a.get1_pic").removeClass("get1_pic").addClass("get_pic");  
                                //    $('a.get_pic').Attr('href'); // hilangkan href pada class get_pic 


                                        
                                        //localStorage.setItem('Text',90);
                                        document.getElementById("berhenti2").value = henti2;
                                        //alert(henti);
                                        $("#tomb").removeAttr('disabled');
                                        $("#tombol").removeAttr('disabled');
                                        //alert(s);   
                                        //$("#jquery_jplayer_1").load('simpan_mp3.php?img='+henti);             
                                      
                                    },
                                    ended : function(){
                                    var anu = document.getElementById("berhenti2").innerHTML = aksi_player("habis",'video',0,'<?= $jawaban->XPutarV; ?>'); 
                                    $(".jp-controls").css({"display":"none"});
                                      $(".jp-progress").css({"display":"none"});
                                      $(".jp-volume-controls").css({"display":"none"});
                                      $(".jp-time-holder").css({"display":"none"});
                                    //alert();
                                    $("a.get1_pic").removeClass("get1_pic").addClass("get_pic");  
                                    //$('a.get_pic').Attr('href'); // hilangkan href pada class get_pic     
                                        //document.getElementById("btnNextSoal").disabled = false;
                                        //document.getElementById("btnPrevSoal").disabled = false;
                                        $("#tomb").removeAttr('disabled');
                                        $("#tombol").removeAttr('disabled');
                                           // confirm('The sound ended?');
                                       
                                        
                                      
                                       var tampilNama = localStorage.getItem('Text');
                                       var x = Number(tampilNama)
                                       //alert(tampilNama);
                                       $(this).jPlayer("stop");
                                       //$(this).jPlayer("play", x); 
                                       
                                       var s = $(this).data("jPlayer").status.currentTime;
                                       document.getElementById("anu").value = s;
                                       //$(this).Player( "stop", 100); 
  
                                    }
                              });

                          });

                        </script>
                        <?php
                      }
                    }


                    // audio di soal
                    if (!empty($jawaban->XAudioTanya)) {
                      if ($jawaban->XPutar < $ujian->XListening) {
                        ?>
                        <div class="" style="width: 100%;overflow-x: scroll;">
                          <input type="hidden" name="berhenti1" id="berhenti1">
                          <div id="jquery_jplayer_1" class="jp-jplayer"></div>
                            <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
                              <div class="jp-type-single">
                                <div class="jp-gui jp-interface">
                                  <div class="jp-controls">
                                    <button class="jp-play" role="button" tabindex="0">play</button>
                                  </div>
                                  <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                      <div class="jp-play-bar"></div>
                                    </div>
                                  </div>
                                  <div class="jp-volume-controls">
                                    <button class="jp-mute" role="button" tabindex="0">mute</button>
                                    <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                    <div class="jp-volume-bar">
                                      <div class="jp-volume-bar-value"></div>
                                    </div>
                                  </div>
                                  <div class="jp-time-holder">
                                    <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                    <!-- <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                                    <div class="jp-toggles">
                                      <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                    </div> !-->
                                  </div>
                                </div>
                                <div class="jp-details">
                                  <div class="jp-title" aria-label="title">&nbsp;</div>
                                </div>
                                <div class="jp-no-solution">
                                  &nbsp;
                                </div>
                              </div>
                            </div>
                            <br>
                          </div>
                        Sisa Pemutaran: <?=  (int) ($ujian->XListening - $jawaban->XPutar) ?>X
                        <br/>
                        <small class="red-text"> Gunakan jika Audio tidak muncul / Tidak bisa diputar</small><br/>
                        <button class="btn blue " onclick="reload_halaman()"><i class="material-icons left">refresh</i> refresh Audio player</button> 
                        <script type="text/javascript">
                          $(document).ready(function() {
                              $("#jquery_jplayer_1").jPlayer({
                                ready: function () {
                                  // alert("as");
                                  $(this).jPlayer("setMedia", {
                                    title: " <?php echo "AudioPlayer | ".$this->m_config->cfg['XSekolah'];?>",
                                    m4a: "<?= base_url("asset/uploads/cbt/audio/".$jawaban->XAudioTanya); ?>",
                                    oga: "<?= base_url("asset/uploads/cbt/audio/".$jawaban->XAudioTanya); ?>",
                                    mp3: "<?= base_url("asset/uploads/cbt/audio/".$jawaban->XAudioTanya); ?>",
                                  });
                                  $(this).jPlayer("pause", <?php echo $jawaban->XMulai; ?>); // stop all players except this one.
                                },
                                /*play: function() { // To avoid multiple jPlayers playing together.
                                  $(this).jPlayer("pauseOthers");
                                },
                                */
                                
                                swfPath: "sp-plugin/jplayer/jplayer",
                                supplied: "m4a, oga,mp3",
                                wmode: "window",
                                useStateClassSkin: true,
                                autoBlur: false,
                                smoothPlayBar: true,
                                keyEnabled: true,
                                remainingDuration: true,
                                toggleDuration: false,
                                  play : function(){
    
                                    //$('a.get_pic').remove();
                                    //$('a.get_pic').removeAttr('href'); // hilangkan href pada class get_pic
                                    $("a.get_pic").removeClass("get_pic").addClass("get1_pic");
                                    //alert("S");

                                        $("#tomb").attr('disabled', 'disabled');
                                        $("#tombol").attr('disabled', 'disabled');
                                        //alert(s);                 
                                      
                                    },
                                    pause : function(){
                                    //alert("S2");
                                    var henti2 = $(this).data("jPlayer").status.currentTime;
                                    //alert(henti2);
                                    var anu2 = document.getElementById("berhenti1").innerHTML = aksi_player("pause",'audio',henti2); 
                                    
                                       
                                    $("a.get1_pic").removeClass("get1_pic").addClass("get_pic");  
                                //    $('a.get_pic').Attr('href'); // hilangkan href pada class get_pic 


                                        
                                        //localStorage.setItem('Text',90);
                                        document.getElementById("berhenti1").value = henti2;
                                        //alert(henti);
                                        $("#tomb").removeAttr('disabled');
                                        $("#tombol").removeAttr('disabled');
                                        //alert(s);   
                                        //$("#jquery_jplayer_1").load('simpan_mp3.php?img='+henti);             
                                      
                                    },
                                    ended : function(){
                                    var anu = document.getElementById("berhenti1").innerHTML = aksi_player("habis",'audio',0,'<?= $jawaban->XPutar; ?>'); 
                                    $(".jp-controls").css({"display":"none"});
                                      $(".jp-progress").css({"display":"none"});
                                      $(".jp-volume-controls").css({"display":"none"});
                                      $(".jp-time-holder").css({"display":"none"});
                                    //alert();
                                    $("a.get1_pic").removeClass("get1_pic").addClass("get_pic");  
                                    //$('a.get_pic').Attr('href'); // hilangkan href pada class get_pic     
                                        //document.getElementById("btnNextSoal").disabled = false;
                                        //document.getElementById("btnPrevSoal").disabled = false;
                                        $("#tomb").removeAttr('disabled');
                                        $("#tombol").removeAttr('disabled');
                                           // confirm('The sound ended?');
                                       
                                        
                                      
                                       var tampilNama = localStorage.getItem('Text');
                                       var x = Number(tampilNama)
                                       //alert(tampilNama);
                                       $(this).jPlayer("stop");
                                       //$(this).jPlayer("play", x); 
                                       
                                       var s = $(this).data("jPlayer").status.currentTime;
                                       document.getElementById("anu").value = s;
                                       //$(this).Player( "stop", 100); 
  
                                    }
                              });

                          });

                        </script>
                        <?php
                      }
                    }
                    ?>


                  <hr style="border:1px solid #ccc;">
                  <table>
                  <?php
                  $abc=range("A", "E");
                  
                  for ($i=0; $i < $ujian->XJumPilihan; $i++) { 

                    if ($abc[$i] == $jawaban->XJawaban) {
                      $pilih="pilih-jawaban";
                    } else { $pilih =""; }
                    ?>
                    <tr>
                      <td width="1%" valign="top">
                        <!-- tombol jawaban -->
                        <button type="button" data-no="<?= $No; ?>" style="border: none;"; value="<?= $abc[$i]; ?>" class="button-jawaban drinkcard-cc <?= $abc[$i].' '.$pilih; ?> " data-nilai="<?= $jawaban_array['X'.$abc[$i]]; ?>" >
                          &nbsp;
                        </button>
                      </td>
                      <td style="vertical-align: top">

                        <!-- mengambil gambar untuk jawaban/ -->
                        <?php
                        if (!empty($jawaban_array['XGambarJawab'.$jawaban_array['X'.$abc[$i]]])) {
                          ?>
                          <img class='materialboxed responsive-img' width="200" src="<?= base_url("asset/uploads/cbt/gambar/".$jawaban_array['XGambarJawab'.$jawaban_array['X'.$abc[$i]]]); ?>">
                          <br/>
                          <?php
                        }
                        ?>
                       <!-- mengambil jawban tulisan -->
                        <?= $jawaban_array['XJawab'.$jawaban_array['X'.$abc[$i]]]; ?>

                          
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                  </table>
                </div>
                <div class="card-action">
                  <div class="row" style="text-align: center;">
                    <div class="col s4 m4 margin-b2">
                      <?php
                      if ($No>1) {
                        echo "<a id=\"tomb\" class='btn  light-blue accent-4' href='".base_url("siswa/ujian/naskah/".ceil($No-1))."'><i class='material-icons'>navigate_before</i></a>";
                      }
                      ?>                    
                    </div>
                    <div class="col s4 m4">
                      <?php
                      if ($jawaban->Ragu=="Y") { $ragu['c']="yellow darken-1"; $ragu['y']="check_box"; } else { $ragu['c']="yellow darken-4"; $ragu['y']="check_box_outline_blank"; }
                      ?>

                      <a href="<?= base_url("siswa/aksi_ujian/ragu/".$ujian->Urut."/".$No); ?>" class="btn <?= $ragu['c']; ?>" ><i class="material-icons left"><?= $ragu['y']; ?></i> Ragu</a>
                    </div>                  
                    <div class="col s4 m4">
                      <?php
                        if ($No<$total_jawaban) {
                          echo "<a id='tombol' class='btn  light-blue accent-4' href='".base_url("siswa/ujian/naskah/".ceil($No+1))."'><i class='material-icons'>navigate_next</i></a>";
                        } else {
                          echo "<button id='tombol-selesai' class='btn green accent-4'>Selesai <i class='material-icons left'>check</i></button>";
                        }
                       ?>
                      
                    </div>
                  </div>

                </div>
              </div>
              <!-- end card content -->
            </div>
          </div>
        </section>

        <!-- membuat urutan nomer -->
        <aside id="right-sidebar-nav">
          <div id="slide-out" class="sidenav rightside-navigation">
            <div  style="padding: 7% 1%">
              <div id="nomer-jawaban" style="text-align: center">
                  <?php
                  foreach ($data_jawaban as $dj) {
                          if($dj['XRagu']=='Y'){$cssb = "#eaca08"; $csst = "#000"; $noti = "noti-ragu"; $border = "#eaca08"; $iki = 'R';} 
                          elseif( $dj['Urut']==$No ){$cssb = "#336898"; $csst = "#fff"; $noti = "noti-ragu"; $border = "#336898"; $iki = 'S';}
                          elseif(!$dj['XJawabanEsai']==''){$cssb = "#313132"; $csst = "#fff"; $noti = "noti-ragu"; $border = "#313132"; $iki = 'S';}
                          else {
                              if(!$dj['XJawaban']==''){$cssb = "#313132";$csst = "#fff";$noti = "noti-count";$border = "#313132";} 
                              else {$cssb = "#fff";$csst = "#313132";$noti = "noti-count";$border = "#313132";}
                              $iki = 'N';
                          }
                          ?>
                          <a href="<?= base_url("siswa/ujian/naskah/".$dj['Urut']); ?>" data-id="" class="get_pic" id="tombil">
                            <div class="item nomer-<?= $dj['Urut']; ?>" data-ragu="<?= $dj['XRagu']; ?>" style="background-color:<?php echo $cssb; ?>; color:<?php echo $csst; ?>;border-color:<?php echo $border; ?>">

                                <p style="font-family:Arial, Helvetica, sans-serif; font-size:24px;margin-top: 8px">
                                   <?php   echo $dj['Urut']; ?>
                                </p>
                                <div  id='noti-count' style="border-color:<?php echo $border; ?>">
                                  <div>
                                    <?php 
                                      echo $dj['XJawaban']; 
                                    ?>
                                  </div>
                              </div>
                            </div>
                         </a>
                    <?php
                  }
                  ?>
                </div>

            </div>
          </div>
        </aside>
      </div>
      <!-- end wraper -->


  <a href="#"  data-target="slide-out" style="position: fixed;top: 20%;right: 3px;padding: 10px;text-transform: uppercase;" class="sidenav-trigger chat-collapse white-text red lighten-1"><i class="material-icons left">keyboard_arrow_left</i> Daftar <br/> Soal</a>
  
  <div id="profile-dropdown" class="modal">
    <div class="modal-content">
      <p>Hay <b><?= $GLOBALS['u']['XNamaSiswa']; ?></b>, kamu sedang mngerjakan ujian online !</p>
      <p>Pastikan kamu menjawab dengan jujur ya</p>
    </div>
  </div>

  <!-- pensan untuk orang ragu - ragu -->
  <div id="pesan-ragu" class="modal">
    <div class="modal-content">
      <h2 align="center" class="red-text">
        HAYOOO PERINGATAN !! 
      </h2>
      <div class="row">
        <div class="col s12 m4" style="text-align: center;">
          <i class="material-icons red-text" style="font-size: 150px;">warning</i>
        </div>
        <div class="col s12 m8">
            <p>Hay <b><?= $GLOBALS['u']['XNamaSiswa']; ?></b>, jawaban ujianmu masih ada yang <b>ragu -  ragu</b> !</p>
            <p>Pastikan kamu <i><b>meneliti kembali  hasil ujianmu !,</b></i></p>
            <p>Jangan terburu buru loh ya !!
              <br>
            Salam, mimin :)</p>
          
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close btn-flat">Tutup pesan</a>
    </div>
  </div>

  <div id="pesan-selesai1" class="modal">
    <div class="modal-content">
      <h2 align="center">  
        Konfirmasi
      </h2>
      <div class="row">
        <div class="col s12 m4">
          <i class="material-icons" style="font-size: 150px">warning</i>
        </div>
        <div class="col s12 m8">
            <p>Hay <b><?= $GLOBALS['u']['XNamaSiswa']; ?></b>, kamu yakin akan mengakhiri ujian ini ?? <br/> Anda tidak akan kembali jika sudah mengeklik tombol selesai</p>
            <p>
              <div class="input-field">
                <label>
                  <input type="checkbox" name="selesai" style="border: 1px solid #000;width: 35px;height: 35px;text-align: center;line-height: 40px;border-radius: 100%;background: none;"  onClick="$('#selesai1').removeAttr('disabled')">
                  <span>Centang, lalu klik selesai, jika yakin mengakhiri ujian</span>
                </label>
              </div>
            </p>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#pesan-selesai2" class="modal-close btn green modal-trigger" id="selesai1" disabled="disabled">selesai</a>
      <a href="#!" class="modal-close btn red">TIDAK</a>
    </div>
  </div>

  <div id="pesan-selesai2" class="modal">
    <div class="modal-content">
      <h2 align="center">  
        Konfirmasi
      </h2>
      <div class="row">
        <div class="col s12 m4">
          <i class="material-icons" style="font-size: 150px">warning</i>
        </div>
        <div class="col s12 m8">
            <p>Hay <b><?= $GLOBALS['u']['XNamaSiswa']; ?></b>, kamu yakin akan mengakhiri ujian ini ?? <br/> Anda tidak akan kembali jika sudah mengeklik tombol selesai</p>
            <p>
              <div class="input-field">
                <label>
                  <input type="checkbox" name="selesai" style="border: 1px solid #000;width: 35px;height: 35px;text-align: center;line-height: 40px;border-radius: 100%;background: none;"  onClick="$('#selesai2').removeAttr('disabled')">
                  <span>Centang, lalu klik selesai, jika yakin mengakhiri ujian</span>
                </label>
              </div>
            </p>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <a href="<?= base_url("siswa/ujian/pronilai"); ?>" class="modal-close btn green modal-trigger" id="selesai2" disabled="disabled">selesai</a>
      <a href="#!" class="modal-close btn red">TIDAK</a>
    </div>
  </div>

    <div class="fixed-action-btn hide-on-large-only">
      <button onclick="location.reload()" class="sidenav-trigger btn-floating btn-medium  blue">
        <i class="material-icons medium">refresh</i>
      </button>
    </div>

</body>
</html>
<script type="text/javascript">
var container = document.querySelector('#nomer-jawaban');
var msnry = new Masonry( container, {columnWidth: 55, itemSelector: '.item',  gutter: 17});

$(document).ready(function(){
    $('.materialboxed').materialbox();
    // jawaban
    $(".button-jawaban").click(function(event) {
      /* Act on the event */
      // $(this + ' [label]').css('background-image', 'value');
      var no = $(this).attr("data-no");
      var nilai = $(this).attr("data-nilai");
      var pilih = $(this).val();
      var btn=this;
      $.post('<?= base_url("siswa/aksi_ujian/simpan_jawaban"); ?>', {pilih:pilih,nilai:nilai,no:no}, function(data, textStatus, xhr) {
        /*optional stuff to do after success */
        if (data == "sukses") {
          // alert(data);
          $(btn).addClass('pilih-jawaban');
          $('.button-jawaban').not(btn).removeClass('pilih-jawaban');
        }
      });
    });



    // tombol selesai
    $("#tombol-selesai").click(function(event) {
      for (var i = 1; i <= <?= $total_jawaban; ?>; i++) {
        var raagu = $(".item").filter(".nomer-"+i).attr('data-ragu');
        if (raagu == "Y") {
          $('#pesan-ragu').modal('open');
          return false;
        }
      }

      $("#pesan-selesai1").modal("open");
    });
    // $('.sidenav').sidenav();
    
    var detik   = <?= $waktu_selesai['detik']; ?>;
    var menit   = <?= $waktu_selesai['menit']; ?>;
    var jam     = <?= $waktu_selesai['jam']; ?>;
    
    /**
       * Membuat function hitung() sebagai Penghitungan Waktu
    */
    var cek_koneksi=0;
    var sisa_waktu=<?= $siswa_ujian->XSisaWaktu; ?>;
    function hitung() {
        /** setTimout(hitung, 1000) digunakan untuk 
             * mengulang atau merefresh halaman selama 1000 (1 detik) 
        */
        setTimeout(hitung,1000);

        /** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
        if(menit < 10 && jam == 0){
            var peringatan = 'style="color:red"';
        };

        /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
        $('#timer').html(
            '<span align="center"'+peringatan+'>' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</span>'
        );

        /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
        detik --;
        sisa_waktu++;
        // alert(sisa_waktu);
        $.post('<?= base_url("siswa/aksi_ujian/simpan_waktu"); ?>',{sisa:sisa_waktu}, function(data) {
          // alert(data);
          if (data != "sukses") {
            cek_koneksi++;
          }
        });

        if (cek_koneksi==15) {
          cek_koneksi=0;
          alert("Koneksi anda buruk silahkan cek koneksi anda / hubungi pihak bersangkutan");
        }
        /** Jika var detik < 0
            * var detik akan dikembalikan ke 59
            * Menit akan Berkurang 1
        */
        if(detik < 0) {
            detik = 59;
            menit --;

           /** Jika menit < 0
                * Maka menit akan dikembali ke 59
                * Jam akan Berkurang 1
            */
            if(menit < 0) {
                menit = 59;
                jam --;

                /** Jika var jam < 0
                    * clearInterval() Memberhentikan Interval dan submit secara otomatis
                */
                     
                if(jam < 0) { 
                    clearInterval(hitung); 
                    /** Variable yang digunakan untuk submit secara otomatis di Form */
                    // alsert('Waktu Anda telah habis, Jika ingin mencoba lagi silahkan dihapus dulu SESSION browser anda');
                    location.reload();
                } 
            } 
        } 
    }           
    /** Menjalankan Function Hitung Waktu Mundur */
    hitung();
});


function ukuran_huruf(v){
  // alert(v);
    $("#soal").css('font-size', v);
}

function aksi_player(type,file,waktu,putar) {
    $.post('<?= base_url("siswa/aksi_ujian/player"); ?>', {type:type,file:file,waktu:waktu,no:'<?= $No; ?>',putar:putar}, function(data, textStatus, xhr) {
      /*optional stuff to do after success */
      // alert(data);
    });
}

function reload_halaman(){
  $(".jp-play").click();
  location.reload();
}


</script>


