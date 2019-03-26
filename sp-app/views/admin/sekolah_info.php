<?= $this->m_config->pesan(); ?>
<div class="row">
	<div class="col s12 m4">
		<div class="card">
			<div class="card-header">
				<div class="card-content">

					<img src="<?= base_url("asset/uploads/".$s->XLogo); ?>" class="responsive-img">
				</div>
				<div class="card-content">
					<form method="post" enctype="multipart/form-data" action="<?= base_url("admin/sekolah/prologo"); ?>" id='form-logo'>
						<div class="file-field input-field">
					      <div class="btn">
					        <span>Logo Sekolah</span>
					        <input type="file" name="file" data-target='#form-logo'>
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					      <!-- <div class="center-align"> -->
					      	<small class="red-text">(*) Max 700x700px</small>
					      <!-- </div> -->
					    </div>
					</form>	
				</div>
			</div>
		</div>
	</div>
	<div class="col s12 m8">
		<div class="card">
			<div class="card-content">
				<span class="card-title">
					Data Identitas Sekolah
				</span>
				<p>
					<!-- <?= print_r($s); ?> -->
					<form action="<?= base_url('admin/sekolah/proup'); ?>" method="post">
						<div class="input-field">
							<input type="text" name="XKodeSekolah" required="required" maxlength="100" value="<?= $s->XKodeSekolah; ?>">
							<label>Kode Sekolah</label>
						</div>
						<div class="input-field">
							<input type="text" name="XSekolah" required="required" maxlength="100" value="<?= $s->XSekolah; ?>">
							<label>Nama Sekolah</label>
						</div>
						<div class="input-field">
							<select class='select' name="XTingkat">
								<option value="" selected="selected">(*)Pilih</option>
								<option <?php if ($s->XTingkat == "SD/MI") { echo "selected=\"selected\""; } ?> >SD/MI</option>
								<option <?php if ($s->XTingkat == "SMP/MTs") { echo "selected=\"selected\""; } ?> > SMP/MTs</option>
								<option <?php if ($s->XTingkat == "SMK/SMA/MA") { echo "selected=\"selected\""; } ?> >SMK/SMA/MA</option>
							</select>
							<label>Tingkatan Sekolah</label>
						</div>
						<div class="input-field">
							<input type="text" name="XAlamat" required="required" maxlength="100" value="<?= $s->XAlamat; ?>">
							<label>Alamat Sekolah</label>
						</div>
						<div class="row">
							<div class="col s12 m5">
								<div class="input-field">
									<input type="text" name="XProp" required="required" maxlength="100" value="<?= $s->XProp; ?>">
									<label>Provinsi</label>
								</div>
							</div>
							<div class="col s12 m5">
								<div class="input-field">
									<input type="text" name="XKab" required="required" maxlength="100" value="<?= $s->XKab; ?>">
									<label>Kabupaten</label>
								</div>
							</div>
							<div class="col s12 m5">
								<div class="input-field">
									<input type="text" name="XKec" required="required" maxlength="100" value="<?= $s->XKec; ?>">
									<label>Kecamatan</label>
								</div>
							</div>
						</div>
						<div class="input-field">
							<input type="text" name="XTelp" required="required" maxlength="100" value="<?= $s->XTelp; ?>">
							<label>No. Telp</label>
						</div>
						<div class="input-field">
							<input type="text" name="XFax" required="required" maxlength="100" value="<?= $s->XFax; ?>">
							<label>No. Fax</label>
						</div>
						<div class="input-field">
							<input type="text" name="XEmail" required="required" maxlength="100" value="<?= $s->XEmail; ?>">
							<label>Email Sekolah</label>
						</div>
						<div class="input-field">
							<input type="text" name="XKepSek" required="required" maxlength="100" value="<?= $s->XKepSek; ?>">
							<label>Kepala Sekolah</label>
						</div>
						<div class="input-field">
							<input type="text" name="XNIPKepsek" required="required" maxlength="100" value="<?= $s->XNIPKepsek; ?>">
							<label>NIP. Kepala Sekolah</label>
						</div>
						<div class="input-field">
							<button type="submit" class="btn green lighten-1 white-text"> Simpan Perubahan</button>
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