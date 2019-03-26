<?= $this->m_config->pesan(); ?>
<div class="row">
	<div class="col s12 m4">
		<div class="card">
			<div class="card-header">
				<div class="card-content">
					<img src="<?= base_url("asset/uploads/foto_siswa/".$u->XFoto); ?>" class="circle responsive-img">
				</div>
				<div class="card-content">
					<form method="post" enctype="multipart/form-data" action="<?= base_url("siswa/user/profoto"); ?>" id='form-logo'>
						<div class="file-field input-field">
					      <div class="btn">
					        <span>Foto Anda</span>
					        <input type="file" name="file" data-target='#form-logo'>
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>
					    <small class="red-text">Max : 2000x2000 px 1mb</small>
					</form>	
				</div>
			</div>
		</div>
	</div>

	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">
				<p>
					<form method="post" action="<?= base_url("siswa/user/proedit"); ?>">
			      		<div class="input-field">
			      			<input type="text" name="XNamaSiswa" required="required" maxlength="100"> 
			      			<label>Nama Siswa</label>
			      		</div>	
			      		<div class="input-field">
			      			<input type="text" name="XNomerUjian" required="required" maxlength="100" readonly="readonly"> 
			      			<label>Nomer Ujian Peserta</label>
			      		</div>	
			      		<div class="row">
			      			<div class="col s12 m4">
			      				<div class="input-field">
			      					<select class='select' name="XKodeKelas" required="required" disabled="disabled" >
			      						<option value="">-- Pilih -- </option>
			      						<?php
			      						$this->db->select("XKodeKelas");
			      						$this->db->group_by("XKodeKelas");
			      						foreach ($this->db->get('cbt_kelas')->result() as $data) {
			      							?>
			      							<option><?= $data->XKodeKelas; ?></option>
			      							<?php
			      						}?>
			      					</select>
			      					<label>Kelas</label>
			      				</div>
			      			</div>
			      			<div class="col s12 m5">
			      				<div class="input-field">
			      					<select class='select' name="XKodeJurusan" required="required" disabled="disabled">
			      						<option value="">-- Pilih -- </option>
			      						<?php
			      						$this->db->select("XKodeJurusan");
			      						$this->db->group_by("XKodeJurusan");
			      						foreach ($this->db->get('cbt_kelas')->result() as $data) {
			      							?>
			      							<option><?= $data->XKodeJurusan; ?></option>
			      							<?php
			      						}?>
			      					</select>
			      					<label>Jurusan</label>
			      				</div>
			      			</div>
			      			<div class="col s12 m3">
			      				<div class="input-field">
			      					<input type="text" name="XNIK" required="required" disabled="disabled">
			      					<label>Nomor Induk</label>
			      				</div>
			      			</div>
			      			<div class="col s12 m4">
			      				<div class="input-field">
			      					<select class='select' name="XJenisKelamin" required="required">
			      						<option value="">-- pilih --</option>
			      						<option value="L">Laki - Laki</option>
			      						<option value="P">Perempuan</option>
			      					</select>
			      					<label>Jenis Kelamin</label>
			      				</div>
			      			</div>
			      			<div class="col s12 m8">
			      				<div class="input-field">
			      					<input type="text" name="XPassword">
			      					<label>Password</label>
			      				</div>
			      				<small class="red-text">Jika Lupa password setelah diganti lapor proktor</small>
			      			</div>
			      			<div class="col s12 m4">
					      		<div class="input-field">
					      			<select class='select' name="XAgama" required="required">
					      				<option value=""> -- pilih --</option>
										<option value='ISLAM'>ISLAM</option>
										<option value='KRISTEN'>KRISTEN</option>  
										<option value='PROTESTAN'>PROTESTAN</option>
										<option value='HINDU'>HINDU</option>
										<option value='BUDHA'>BUDHA</option>
										<option value='KONGHUCU'>KONGHUCU</option>
					      			</select>
					      			<label>Agama</label>
					      		</div>	
			      			</div>
			      			<div class="col s12 m4">
					      		<div class="input-field">
					      			<select class='select' name="XNamaKelas" required="required" disabled="disabled">
					      				<option value=""> -- pilih --</option>
					      				<?php
					      				$this->db->select("XNamaKelas");
					      				$this->db->group_by("XNamaKelas");
			      						foreach ($this->db->get('cbt_kelas')->result() as $data) {
			      							?>
			      							<option><?= $data->XNamaKelas; ?></option>
			      							<?php
			      						}?>
					      			</select>
					      			<label>Nama Kelas</label>
					      		</div>	
			      			</div>
			      			<div class="col s12 m12">
					      		<div class="input-field">
					      			<select class='select' name="XPilihan[]" multiple="multiple" size="5">
					      				<option value="">Non Pilihan</option>
					      				<?php
					      				$this->db->where("XMapelAgama","P");
			      						foreach ($this->db->get('cbt_mapel')->result() as $data) {
			      							?>
			      							<option value="<?= $data->XKodeMapel; ?>" ><?= $data->XNamaMapel; ?></option>
			      							<?php
			      						}?>
					      			</select>
					      			<label>Mapel Pilihan</label>
					      		</div>	
			      			</div>
			      		</div>
			      		<div class="input-field">
			      			<button type="submit" class="btn green">Simpan</button>
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