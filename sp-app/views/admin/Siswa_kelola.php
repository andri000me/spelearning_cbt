<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">
				<p>
					<form method="post" action="<?= base_url("admin/siswa/protam"); ?>">
			      		<div class="input-field">
			      			<input type="text" name="XNamaSiswa" required="required" maxlength="100"> 
			      			<label>Nama Siswa</label>
			      		</div>	
			      		<div class="input-field">
			      			<input type="text" name="XNomerUjian" required="required" maxlength="100"> 
			      			<label>Nomer Ujian Peserta</label>
			      		</div>	
			      		<div class="row">
			      			<div class="col s12 m4">
			      				<div class="input-field">
			      					<select class='select' name="XKodeKelas" required="required">
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
			      					<select class='select' name="XKodeJurusan" required="required">
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
			      					<input type="text" name="XNIK" required="required">
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
			      			<div class="col s12 m5">
			      				<div class="input-field">
			      					<input type="text" name="XPassword">
			      					<label>Password</label>
			      				</div>
			      				<small class="red-text">Kosongkan untuk password random</small>
			      			</div>
			      			<div class="col s12 m12">
			      				<div class="input-field">
			      					<input type="text" name="XFoto">
			      					<label>Foto Peserta</label>
			      					<small class="red-text">Kosongkan jika tidak ada, isikan nama file fotosiswa lengkap beserta extensi (jpg,png)</small>
			      				</div>
			      			</div>
			      			<div class="col s12 m2">
			      				<div class="input-field" style="display: none;">
			      					<select class='select' name="XSesi">
			      						<?php
			      						for ($i=1; $i < 6; $i++) { 
			      							?>
			      							<option><?= $i; ?></option>
			      							<?php
			      						}?>
			      					</select>
			      					<label>Sesi Ujian</label>
			      				</div>
			      			</div>
			      			<div class="col s12 m5">
					      		<div class="input-field" style="display: none;">
					      			<input type="text" name="XRuang"  maxlength="100" value="RUANG 1"> 
					      			<label>Ruang Ujian</label>
					      		</div>	
			      			</div>
			      			<div class="col s12 m4">
					      		<div class="input-field">
					      			<select class='select' name="XAgama" required="required">
					      				<option value="" disabled="disabled" selected="selected"> -- pilih --</option>
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
					      			<select class='select' name="XNamaKelas" required="required">
					      				<option value="" selected="selected" disabled="disabled"> -- pilih --</option>
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
					      				<option value="" disabled="disabled">Non Pilihan</option>
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