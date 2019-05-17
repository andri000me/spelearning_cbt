<div class="row">
	<div class="col s12 m6">
		<?= $this->m_config->pesan(); ?>
		<div class="card">
			<div class="card-content blue white-text">
				Selamat datang di halaman sinkronasi,
				<br>
				Gunakan halaman ini untuk mengirim / menerima data ke aplikasi  <b>PUSAT / SERVER </b>
			</div>
			<div class="card-action">
				<?= form_open(base_url("admin/sync/setid"), ''); ?>
					<div>
						<label>Id Aplikasi</label>
						<input  autocomplete="off" required="required" type="text" name="XIdServer" value="<?= $this->m_config->cfg['XIdServer']; ?>">
					</div>
					<div>
						<label>Alamat Server</label>
						<input  autocomplete="off" type="text" name="XHostServer" value="<?= $this->m_config->cfg['XHostServer']; ?>">
					</div>
					<div>
						<label>Terakhir Sinkronasi</label>
						<?php
						if (empty($this->m_config->cfg['LastSync']) || $this->m_config->cfg['LastSync'] == 0 || $this->m_config->cfg['LastSync']) {
							$LastSync="Belum Pernah Sinkronasi";
						} else {
							$LastSync=tgl_bilang($this->m_config->cfg['LastSync'],1);
						}
						?>
						<input  autocomplete="off" type="text" name="XLastSync" readonly="readonly" value="<?= $LastSync; ?>">
					</div>
					<div>
						<button class="btn green"><i class="material-icons left">check</i> SIMPAN</button>
						<button onclick="sinkronasi()" type="button" class="btn">
							<i class="material-icons left">sync</i>
							sinkronasi sekarang
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col s12 m6" style="display: none;">
		<div class="card-panel">
			<?= form_open($this->m_config->cfg['XHostServer'].'/api/sync', ''); ?>
				<ul class="">
					<?php
					$data=[
						"mapel , kelas & siswa",'soal & ujian','materi & pembelajaran','jawaban dan nilai',
					];
					foreach ($data as $key => $v) {
						?>
						<li class="collection-item">
							<label>
								<input  autocomplete="off" type="checkbox" name="in[]" value="<?= $key; ?>">
								<span><?= ucwords($v); ?></span>
							</label>
						</li>

						<?php
					}
					?>
				</ul>	
				<button onclick="sinkronasi()" type="button" class="" class="btn green">
					<i class="material-icons left">sync</i>
					sinkronasi sekarang
				</button>
			</form>
		</div>
	</div>
	<div class="col s12 m6" style="display: none;">
		<div class="card">
			<div class="card-content">
				<div class="card-title">
					Info
				</div>
				<p>
					<ul>
						<li>
							
						</li>
					</ul>
				</p>
			</div>
		</div>
	</div>
</div>


  <!-- Modal Structure -->
  <div id="Log" class="modal">
    <div class="modal-content">
      <h4>Log Sinkronasi</h4>
      <ul class="collection" id="LogTxt">
      	
      </ul>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>


  <script type="text/javascript">
  		function sinkronasi(){
			$("#Log").modal("open");
  			$("#LogTxt").html('');
  			$.get('<?= base_url("admin/sync/get"); ?>', function(data) {
  				if (data.status) {
  					$("#LogTxt").append('<li class="collection-item green white-text">sukses get data</li>');
	  				for (var i = 0; i < data.data.length; i++) {
		  				$("#LogTxt").append('<li class="collection-item">'+data.data[i]+'</li>');
	  				}


  					$.get('<?= base_url("admin/sync/push"); ?>', function(data) {
		  				if (data.status) {
		  					$("#LogTxt").append('<li class="collection-item green white-text">sukses push data</li>');
			  				for (var i = 0; i < data.data.length; i++) {
				  				$("#LogTxt").append('<li class="collection-item">'+data.data[i]+'</li>');
			  				}

		  				} else {
		  					$("#LogTxt").append('<li class="collection-item red white-text">'+data.pesan+'</li>');
		  				}
		  			},"json");
		  		
  				} else {
  					$("#LogTxt").append('<li class="collection-item red white-text">'+data.pesan+'</li>');
  				}

  			},"json");


		}
  </script>