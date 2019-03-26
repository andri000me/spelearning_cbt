<!--card stats start-->
<div id="card-stats" style="display: non">
  <div class="row mt-1">
  <?php 
  if ($GLOBALS['cfg']->XElearning == 1) {
  ?>

    <a href="<?= base_url("siswa/pelajaran"); ?>">
      <div class="col s12 m6 l3">
        <div class="card gradient-45deg-purple-deep-purple gradient-shadow min-height-100 white-text">
          <div class="padding-4">
            <div class="col s3 m3">
              <i class="material-icons background-round mt-5">book</i>
            </div>
            <div class="col s9 m9 right-align">
              <!-- <h5 class="mb-0"><b><?= $total['pelajaran']; ?></b></h5> -->
              <h5>Pelajaran</h5>
            </div>
          </div>
        </div>
      </div>
    </a>
    <?php
    } 
    if ($GLOBALS['cfg']->XCbt == 1) {
    ?>

    <a href="<?= base_url("siswa/ujian"); ?>">
    	<div class="col s12 m6 l3">
	      <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
	        <div class="padding-4">
	          <div class="col s4 m4">
	            <i class="material-icons background-round mt-5">border_color</i>
	          </div>
	          <div class="col s8 m8 right-align">
	            <!-- <h5 class="mb-0"><b><?= $total['ujian']; ?></b></h5> -->
	            <h5>Ujian</h5>
	          </div>
	        </div>
	      </div>
	    </div>
    </a>
  <?php } ?>
  </div>
</div>
<div id="card-stats" style="display: none;">
  <div class="row">
    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-content cyan white-text">
          <p class="card-stats-title">
            <i class="material-icons">person_outline</i> New Clients</p>
          <h4 class="card-stats-number">566</h4>
          <p class="card-stats-compare">
            <i class="material-icons">keyboard_arrow_up</i> 15%
            <span class="cyan text text-lighten-5">from yesterday</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-content red accent-2 white-text">
          <p class="card-stats-title">
            <i class="material-icons">attach_money</i>Total Sales</p>
          <h4 class="card-stats-number">$8990.63</h4>
          <p class="card-stats-compare">
            <i class="material-icons">keyboard_arrow_up</i> 70%
            <span class="red-text text-lighten-5">last month</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-content teal accent-4 white-text">
          <p class="card-stats-title">
            <i class="material-icons">trending_up</i> Today Profit</p>
          <h4 class="card-stats-number">$806.52</h4>
          <p class="card-stats-compare">
            <i class="material-icons">keyboard_arrow_up</i> 80%
            <span class="teal-text text-lighten-5">from yesterday</span>
          </p>
        </div>
        
      </div>
    </div>
    <div class="col s12 m6 l3">
      <div class="card">
        <div class="card-content deep-orange accent-2 white-text">
          <p class="card-stats-title">
            <i class="material-icons">content_copy</i> namew Invoice</p>
          <h4 class="card-stats-number">1806</h4>
          <p class="card-stats-compare">
            <i class="material-icons">keyboard_arrow_down</i> 3%
            <span class="deep-orange-text text-lighten-5">from last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--card stats end-->

<div class="row">
	<div class="col s12 m7">
		<ul class="timeline">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="blue white-text">
                    <?= date("d M. Y"); ?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-thumbs-up blue white-text"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?= date("H:i"); ?></span>
                <h3 class="timeline-header blue-text">Selamat datang</h3>
                <div class="timeline-body">
                	Hai <b><?= ucwords($GLOBALS['u']['XNamaSiswa']) ;?></b>, Selamat datang dihalaman beranda aplikasi Pembelajaran Online, silahkan gunakan menu navigasi disamping kiri untuk memulai aktivitas anda.
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <?php
            foreach ($pesan_guru as $p) {
            	$warna=["green","blue","red",'purple','indigo'];
            	?>
            <li class="time-label">
                  <span class="<?= $warna[array_rand($warna)]; ?> white-text">
                    <?= date("d M. Y",strtotime($p->XTgl)); ?>
                  </span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope <?= $warna[array_rand($warna)]; ?> white-text"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?= date("H:i",strtotime($p->XTgl)); ?></span>
                <h3 class="timeline-header">
                	<a href="<?= base_url("siswa/user/info/".$p->Username); ?>"><?= $p->Nama; ?></a></h3>
                <div class="timeline-body">
                  <?= $p->XPesan; ?>
                </div>
              </div>
            </li>
            <!-- END timeline item -->

            	<?php
            }
            ?>
          </ul>
	</div>
	<div class="col s12 m5">
		<div id="profile-card" class="card">
	        <div class="card-image waves-effect waves-block waves-light">
	          <img class="activator" src="<?= $this->m_config->random_bg(); ?>">
	        </div>
	        <div class="card-content">
	          <img src="<?= base_url('asset/uploads/foto_siswa/'.$GLOBALS['u']['XFoto']); ?>" alt="" class="circle responsive-img activator card-profile-image  lighten-1 padding-2">
	          <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right" href="<?= base_url("siswa/user"); ?>">
	            <i class="material-icons">edit</i>
	          </a>

	          <span class="card-title activator grey-text text-darken-4"><?= $GLOBALS['u']['XNamaSiswa']; ?></span>
	        </div>
	    </div>
	</div>
</div>
		
<script type="text/javascript">
	$(document).ready(function() {
		$("textarea.pesan").froalaEditor();
		$('.modal').modal();
	});
</script>