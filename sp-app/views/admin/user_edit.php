<?= $this->m_config->pesan(); ?>
<div class="row">
	<div class="col s12 m4">
		<div class="card-panel">
			<div class="card-header">
				<div class="card-content">
					<img src="<?= base_url("asset/uploads/foto_guru/".$u->XFoto); ?>" class="circle responsive-img">
				</div>
				<div class="card-content">
					<form method="post" enctype="multipart/form-data" action="<?= base_url("admin/user/profoto"); ?>" id='form-logo'>
						<div class="file-field input-field">
					      <div class="btn">
					        <span>Foto Anda</span>
					        <input  autocomplete="off" type="file" name="file" data-target='#form-logo'>
					      </div>
					      <div class="file-path-wrapper">
					        <input  autocomplete="off" class="file-path validate" type="text">
					      </div>
					    </div>
					</form>	
				</div>
			</div>
		</div>
	</div>
	<div class="col s12 m8">
		<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
		    <li class="tab active"><a href="#identitas">Identitas</a></li>
		    <li class="tab"><a href="#kelas">Kelas</a></li>
		    <li class="tab"><a href="#password">Password</a></li>
		   
	  	</ul>
	  	<div class="card" id="kelas">
			<div class="card-content">
				<div class="card-title">
					Pilih Kelas yang ditampung
				</div>
				<form action="<?= base_url("admin/kelas/simpan_kelas_guru/user#kelas"); ?> " method="post">
					<div class="row">
						<?php
						$this->db->select("XKodeKelas");
						$this->db->order_by("XKodeKelas","ASC");
						$this->db->group_by("XKodeKelas","ASC");
						foreach ($this->db->get("cbt_kelas")->result() as $k) {
							?>
							<div class="col s6 m4">
								<h5><?= $k->XKodeKelas; ?></h5>
								<ul class="collection">
									<?php
									$this->db->where("XKodeKelas",$k->XKodeKelas);
									$this->db->order_by("XNamaKelas","ASC");
									foreach ($this->db->get("cbt_kelas")->result() as $kk) {
										?>
										<li class="collection-item">
											<label>
												<input  autocomplete="off" type="checkbox" name="kelas[]" value="<?= $kk->XNamaKelas; ?>">
												<span>
													<?= $kk->XNamaKelas; ?>
												</span>
											</label>
										</li>
										<?php
									}
									?>
								</ul>
							</div>
							<?php
						}
						?>
					</div>		
					<div class="card-actions">
						<button  type="submit" class="btn green">Simpan Kelas</button>
						<div class="fixed-action-btn" style="top: 10%; bottom: auto">
							<button  type="submit" class="btn btn-floating green btn-large"><i class="material-icons">save</i></button>
						</div>
					</div>
					<script type="text/javascript">
						$(document).ready(function() {
							<?php
							foreach (json_decode($GLOBALS['u']['XKelas']) as $k) {
								?>
								$("[name='kelas[]'][value='<?= $k; ?>']").attr('checked', 'checked');
								<?php
							}
							?>
						});
					</script>
				</form>
			</div>
		</div>
		<div class="card" id="identitas">
			<div class="card-content">
				<span class="card-title">
					Data Identitas Anda
				</span>
				<p>
					<!-- <?= print_r($s); ?> -->
				<form action="<?= base_url('admin/user/proedit'); ?>" method="post">
						<div class="input-field">
							<input  autocomplete="off" type="text" name="Username" required="required" readonly="readonly">  
							<label>Username</label>
						</div>
						<div class="input-field">
							<input  autocomplete="off" type="text" name="Nama" required="required"> 
							<label>Nama Lengkap</label>
						</div>
						<div class="input-field">
							<input  autocomplete="off" type="number" name="HP" required="required"> 
							<label>No. HP / WhatsApp</label>
						</div>
						<div class="input-field">
							<input  autocomplete="off" type="email" name="Email" required="required"> 
							<label>E-Mail</label>
						</div>
						<div class="input-field">
							<textarea name="Alamat" required="required" class="materialize-textarea"></textarea>
							<label>Alamat Lengkap</label>
						</div>
						<div class="input-field">
							<button type="submit" class="btn green">Simpan perubahan</button>
						</div>
					</form>
				</p>
			</div>
		</div>

		<div class="card" id="password">
			<div class="card-content">
				<div class="card-title">Ganti password</div>
				<p>
					<form action="<?= base_url("admin/user/propwd"); ?>" method="post">
						<div class="input-field">
							<input  autocomplete="off" type="password" name="pwd_lama" required="required">
							<label>Password Lama</label>
						</div>
						<div class="input-field">
							<input  autocomplete="off" type="password" name="pwd_1" required="required">
							<label>Password Baru</label>
						</div>
						<div class="input-field">
							<input  autocomplete="off" type="password" name="pwd_2" required="required">
							<label>Konfirmasi Password Baru</label>
						</div>
						<div class="input-field">
							<button type="submit" class="btn green">Simpan perubahan</button>
						</div>
					</form>
				</p>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("[type='file']").change(function(event) {
			$($(this).attr('data-target')).submit();
		});
	});
</script>
<script type="text/javascript">
	<?php foreach ($u as $key => $value): ?>
		$("[name='<?= $key; ?>']").val("<?= $value; ?>");
	<?php endforeach ?>
</script>