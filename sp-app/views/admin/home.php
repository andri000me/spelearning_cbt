<!--card stats start-->
<?= $this->m_config->pesan(); ?>
<div id="card-stats">
  <div class="row mt-1">
  	<a href="<?= base_url("admin/kelas"); ?>">
		<?php if ($GLOBALS['lvl'] == 1) { ?>
	    <div class="col s12 m4 l3">
	      <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text">
	        <div class="padding-4">
	          <div class="col s7 m7">
	            <i class="material-icons background-round mt-5">class</i>
	          </div>
	          <div class="col s5 m5 right-align">
	            <h5 class="mb-0"><?= $total['kelas']; ?></h5>
	            <p class="no-margin">Kelas</p>
	          </div>
	        </div>
	      </div>
	    </div>
  	</a>
    <a href="<?= base_url("admin/mapel"); ?>">
    	<div class="col s12 m4 l3">
	      <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text">
	        <div class="padding-4">
	          <div class="col s7 m7">
	            <i class="material-icons background-round mt-5">local_library</i>
	          </div>
	          <div class="col s5 m5 right-align">
	            <h5 class="mb-0"><?= $total['mapel']; ?></h5>
	            <p class="no-margin">Mapel</p>
	          </div>
	        </div>
	      </div>
	    </div>
    </a>
    <a href="<?= base_url("admin/siswa"); ?>">
    	<div class="col s12 m4 l3">
	      <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text">
	        <div class="padding-4">
	          <div class="col s7 m7">
	            <i class="material-icons background-round mt-5">people</i>
	          </div>
	          <div class="col s5 m5 right-align">
	            <h5 class="mb-0"><?= $total['siswa']; ?></h5>
	            <p class="no-margin">Siswa</p>
	          </div>
	        </div>
	      </div>
	    </div>
    </a>
<?php } ?>
    <a href="<?= base_url("admin/pelajaran"); ?>">
      <div class="col s12 m4 l3">
        <div class="card gradient-45deg-purple-deep-purple gradient-shadow min-height-100 white-text">
          <div class="padding-4">
            <div class="col s6 m6">
              <i class="material-icons background-round mt-5">book</i>
            </div>
            <div class="col s6 m6 right-align">
              <h5 class="mb-0"><b><?= $total['pelajaran']; ?></b></h5>
              <p class="no-margin">Pembelajaran</p>
            </div>
          </div>
        </div>
      </div>
    </a>
    <a href="<?= base_url("admin/ujian"); ?>">
    	<div class="col s12 m4 l3">
	      <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text">
	        <div class="padding-4">
	          <div class="col s7 m7">
	            <i class="material-icons background-round mt-5">border_color</i>
	          </div>
	          <div class="col s5 m5 right-align">
	            <h5 class="mb-0"><b><?= $total['ujian']; ?></b></h5>
	            <p class="no-margin">Ujian</p>
	          </div>
	        </div>
	      </div>
	    </div>
    </a>
  </div>
</div>
<div id="card-stats" style="display: none;">
  <div class="row">
    <div class="col s12 m4 l3">
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
    <div class="col s12 m4 l3">
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
    <div class="col s12 m4 l3">
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
    <div class="col s12 m4 l3">
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
	<div class="col s12 m7 push-m5">
		<div class="" style="position: relative;">
			<span class="flow-text">Pesan untuk siswa</span>
			<span class="right"><a class="btn green modal-trigger" href="#modal_pesan"><i class="material-icons left">add</i> tambah</a></span>
		</div>
		<hr>
		<ul class="timeline">
            <?php
            foreach ($pesan as $p) {
            	$warna=["green","blue","red",'purple','indigo'];
            	?>
            <li class="time-label">
                  <span class="<?= $warna[array_rand($warna)]; ?> white-text">
                    <?= date("d M. Y",strtotime($p->XTgl)); ?>
		          </span>
					<span class="red white-text">
						<a href="<?= base_url("admin/home/prohapuspesan/".$p->id_pesan); ?>" class="white-text"><i class="fa fa-trash"></i> Hapus</a>
					</span>
            </li>
            <!-- /.timeline-label -->

            <!-- timeline item -->
            <li>
              <i class="fa fa-envelope <?= $warna[array_rand($warna)]; ?> white-text"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?= date("H:i",strtotime($p->XTgl)); ?></span>
                <h3 class="timeline-header">
                	<a href="<?= base_url("admin/user/info/".$p->Username); ?>"><?= $p->Nama; ?></a></h3>
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

	<div class="col s12 m5 pull-m7">
		<div id="profile-card" class="card">
	        <div class="card-image waves-effect waves-block waves-light">
	          <img class="activator" src="<?= $this->m_config->random_bg(); ?>">
	        </div>
	        <div class="card-content">
	          <img src="<?= base_url('asset/uploads/foto_guru/'.$GLOBALS['u']['XFoto']); ?>" alt="" class="circle responsive-img activator card-profile-image  padding-2">
	          <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right" href="<?= base_url("admin/user"); ?>">
	            <i class="material-icons">edit</i>
	          </a>

	          <span class="card-title activator grey-text text-darken-4"><?= $GLOBALS['u']['Nama']; ?></span>
	          <p>
	          	Selamat datang dihalaman Admin/ Guru, Gunakan semua tombol navigasi di samping kiri untuk memulai aktivitas anda.
	          </p>
	        </div>
	    </div>

	<?php if ($GLOBALS['lvl'] != 1) { echo "</div>"; } else { ?>

			<ul id="task-card" class="collection with-header">
		    <li class="collection-header teal accent-4">
		      <div class="task-card-title white-text">Pengaturan Guru</div>
		      <!-- <p class="task-card-date">Sept 16, 2017</p> -->
		    </li>
		    <li class="collection-item dismissable">
		    	<div class="row">
		    		<div class="col s7">
		    			Tampilkan Data Milik Admin<br>
		    			<small class="red-text">(Bank Soal,Ujian,dll)</small>
		    		</div>
		    		<div class="col s5">
				      <div class="switch">
					    <label>
					      Off
					      <input  autocomplete="off" type="checkbox" name="XGuru2Admin" class="set_setting">
					      <span class="lever"></span>
					      On
					    </label>
					  </div>
		    		</div>
		    	</div>
			</li>
	  	</ul>
			<ul id="task-card" class="collection with-header">
		    <li class="collection-header teal accent-4">
		      <div class="white-text task-card-title">Pengaturan Siswa</div>
		      <!-- <p class="task-card-date">Sept 16, 2017</p> -->
		    </li>
		    <li class="collection-item dismissable">
		    	<div class="row">
		    		<div class="col s7">
		    			Tampilkan Elearning
		    		</div>
		    		<div class="col s5">
				      <div class="switch">
					    <label>
					      Off
					      <input  autocomplete="off" type="checkbox" name="XElearning" class="set_setting">
					      <span class="lever"></span>
					      On
					    </label>
					  </div>
		    		</div>
		    	</div>
			</li>
		    <li class="collection-item dismissable">
		    	<div class="row">
		    		<div class="col s7">
		    			Tampilkan CBT/ Ujian
		    		</div>
		    		<div class="col s5">
				      <div class="switch">
					    <label>
					      Off
					      <input  autocomplete="off" type="checkbox" name="XCbt" class="set_setting">
					      <span class="lever"></span>
					      On
					    </label>
					  </div>
		    		</div>
		    	</div>
			</li>
		    <li class="collection-item dismissable">
		    	<div class="row">
		    		<div class="col s7">
		    			Tampilkan Nilai
		    		</div>
		    		<div class="col s5">
				      <div class="switch">
					    <label>
					      Off
					      <input  autocomplete="off" type="checkbox" name="XNilai" class="set_setting">
					      <span class="lever"></span>
					      On
					    </label>
					  </div>
		    		</div>
		    	</div>
			</li>
	  	</ul>
  	</div>
  <?php } ?>
</div>
<!-- Modal Structure -->
  <div id="modal_pesan" class="modal">
    <div class="modal-content">
      <h4>Tambah Pesan Untuk Siswa</h4>
      <p>
      	<form method="post" action="<?= base_url("admin/home/propesan");?>">
      		<div class="row">
      			<div class="col s12 m6">
		      		<div class="input-field">
		      			<input  autocomplete="off" type="text" name="XGuru" readonly="readonly" value="<?= $GLOBALS['u']['Username']; ?>">
		      			<label>Admin/ Guru</label>
		      		</div>
	  			</div>
      			<div class="col s12 m6">
		      		<div class="input-field">
		      			<input  autocomplete="off" type="text" name="XTgl" readonly="readonly" value="<?= date("Y-m-d H:i:s"); ?>">
		      			<label>Tanggal</label>
		      		</div>
      			</div>
      			<div class="col s12 m12">
      				<textarea class="froala" name="XPesan"></textarea>
      			</div>
      			<div class="col s12 m12">
      				<div class="input-field">
	      				<button type="submit" class="btn green"><i class="material-icons">send</i> Simpan</button>
      				</div>
      			</div>
      		</div>
      	</form>
      </p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>

<script type="text/javascript">
	$(document).ready(function() {
		$(".set_setting").click(function(event) {
			$.post('<?= base_url('admin/home/set'); ?>', {id:$(this).attr('name')}, function(data) {
			});
		});
		<?php
		$s=$this->db->get('cbt_config')->row_array();
	 	foreach ($s as $key => $value) {
	 		if ($value==1) {
	 			?>
	 			$("[name='<?= $key; ?>']").attr("checked","checked");
	 			<?php
	 		}
	 	}
	 	?>
	});
</script>