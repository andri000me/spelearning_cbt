  <div class="padding-2">
    <a href="<?= base_url("admin/File_Soal/upload"); ?>" class="btn blue">  <i class="material-icons left">cloud_upload</i>  Upload File pendukung soal</a>
    <!-- <a href="<?= base_url("admin/File_Soal/kosongkan"); ?>" class="btn red" onclick="return confirm('apakah anda yakin akan melanjutkan tindakan ini ??')">  <i class="material-icons left">delete_forever</i>  Kosongkan</a> -->
  </div>
  <?= $this->m_config->pesan(); ?>
  <div class="row">
    <div class="col s12 m8">
      <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
        <li class="tab col s3"><a href="#gambar">Gambar</a></li>
        <li class="tab col s3"><a href="#audio">Audio</a></li>
        <li class="tab col s3"><a href="#video">Video</a></li>
        <li class="tab col s3"><a href="#doc">PDF / DOK</a></li>
      </ul>
    </div>
    <div class="col s12" id="gambar">
      <div class="row">
        <?php
          $folder = "asset/uploads/cbt/gambar/"; //folder tempat gambar disimpan 
          $handle = opendir($folder);
          $i=1;
          while(false !== ($file = readdir($handle))){  
            if($file != '.' && $file != '..'){
              ?>
              <div class="col s12 m3">
                <div class="card">
                  <div class="card-image">
                    <img src="<?= base_url($folder.$file); ?>">
                    <!-- <a class="btn-floating halfway-fab waves-effect waves-light red" href="<?= base_url("admin/File_Soal/hapus/gambar/".$file); ?>"><i class="material-icons">delete</i></a> -->
                  </div>
                  <div class="card-content"><p style="word-wrap: break-word;"><?= $file ;?></p></div>
                </div>
              </div>
              <?php
            } 
          }
        ?>
      </div>
    </div>

    <div class="col s12" id="audio">
      <div class="row">
        <?php
          $folder = "asset/uploads/cbt/audio/"; //folder tempat gambar disimpan 
          $handle = opendir($folder);
          $i=1;
          while(false !== ($file = readdir($handle))){  
            if($file != '.' && $file != '..'){
              ?>
              <div class="col s12 m3">
                <div class="card">
                  <div class="card-image">
                    <audio class="responsive-video" controls>
                      <source src="<?= base_url($folder.$file); ?>">
                    </audio>
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="<?= base_url("admin/File_Soal/hapus/audio/".$file); ?>"><i class="material-icons">delete</i></a>
                  </div>
                  <div class="card-content"><p style="word-wrap: break-word;"><?= $file ;?></p></div>
                </div>
              </div>
              <?php
            } 
          }
        ?>
      </div>
    </div>

    <div class="col s12" id="video">
      <div class="row">
        <?php
          $folder = "asset/uploads/cbt/video/"; //folder tempat gambar disimpan 
          $handle = opendir($folder);
          $i=1;
          while(false !== ($file = readdir($handle))){  
            if($file != '.' && $file != '..'){
              ?>
              <div class="col s12 m3">
                <div class="card">
                  <div class="card-image">
                    <video class="responsive-video" controls>
                      <source src="<?= base_url($folder.$file); ?>">
                    </video>
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="<?= base_url("admin/File_Soal/hapus/video/".$file); ?>"><i class="material-icons">delete</i></a>
                  </div>
                  <div class="card-content"><p style="word-wrap: break-word;"><?= $file ;?></p></div>
                </div>
              </div>
              <?php
            } 
          }
        ?>
      </div>
    </div>


    <div class="col s12" id="doc">
      <div class="row">
        <?php
          $folder = "asset/uploads/cbt/doc/"; //folder tempat gambar disimpan 
          $handle = opendir($folder);
          $i=1;
          while(false !== ($file = readdir($handle))){  
            if($file != '.' && $file != '..'){
              $ext = pathinfo($file,PATHINFO_EXTENSION);
              ?>
              <div class="col s12 m3">
                <div class="card">
                  <div class="card-image">
                    <div width="100%">
                      <h1 align="center">
                        <?= $ext;?>
                      </h1>
                    </div>
                    <a class="btn-floating halfway-fab waves-effect waves-light red" href="<?= base_url("admin/File_Soal/hapus/doc/".$file); ?>"><i class="material-icons">delete</i></a>
                  </div>
                  <div class="card-content"><p style="word-wrap: break-word;"><?= $file ;?></p></div>
                </div>
              </div>
              <?php
            } 
          }
        ?>
      </div>
    </div>
  </div>
