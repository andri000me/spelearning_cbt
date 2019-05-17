<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">
				<p>
					<form method="post" action="<?= base_url("admin/soal/protam"); ?>">
			      		<div class="input-field">
			      			<select class='select' name="XKodeMapel">
			      				<?php
			      				foreach ($this->db->get('cbt_mapel')->result() as $key => $value) {
			      					?>
			      					<option value="<?= $value->XKodeMapel; ?>"><?= $value->XKodeMapel." | ".$value->XNamaMapel; ?></option>
			      					<?php
			      				}
			      				?>
			      			</select>
			      			<label>Mata Pelajaran</label>
			      		</div>
			      		<div class="input-field" style="display: none;">
	      					<select class='select' name="XKodeJurusan">
	      						<option value="">Semua</option>
	      						<?php
	      						if ($GLOBALS['lvl'] != 1 ) {
	      							$this->db->where_in("XNamaKelas",json_decode($GLOBALS['u']['XKelas']));
	      						}
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
			      		<div class="input-field" style="display: none;">
	      					<select class='select' name="XKodeKelas">
	      						<option value="">Semua</option>
	      						<?php
	      						if ($GLOBALS['lvl'] != 1 ) {
	      							$this->db->where_in("XNamaKelas",json_decode($GLOBALS['u']['XKelas']));
	      						}

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
	      				<!-- XNamaKelas -->
						<div class="input-field">
							<select class='select' name="XNamaKelas[]" multiple="multiple" required="required"> 
								<option value="" disabled="disabled">-- pilih kelas --</option>
								<?php
	      						if ($GLOBALS['lvl'] != 1 ) {
	      							$this->db->where_in("XNamaKelas",json_decode($GLOBALS['u']['XKelas']));
	      						}

								$this->db->select("XNamaKelas");
								// $this->db->group_by('XKodeKelas');
								$this->db->order_by('XNamaKelas',"ASC");
								foreach ($this->db->get('cbt_kelas')->result() as $key => $value) {
									echo "<option>".$value->XNamaKelas."</option>";
								}
								?>
							</select>
							<label>Kelas</label>
						</div>
	      				<div class="input-field">
	      					<input  autocomplete="off" type="text" name="XKodeSoal" maxlength="50" required="required">
	      					<label>Kodel Bank Soal</label>
	      				</div>
	      				<div class="input-field">
	      					<select class='select' name="XJumPilihan">
	      						<?php
	      						for ($i=5; $i > 1; $i--) { 
	      							?>
	      							<option><?= $i; ?></option>
	      							<?php
	      						}?>
	      					</select>
	      					<label>Jumlah Opsi Jawaban</label>
	      				</div>
	      				<div class="input-field">
	      					<input  autocomplete="off" type="number" min="1" max="200" name="XPilGanda" required="required">
	      					<label>Jumlah Pilihan Ganda yang ditampilkan</label>
	      				</div>
      					<!-- <small class="red-text">* Jumlah yang ditampilkan</small> -->
	      				<div class="input-field">
	      					<input  autocomplete="off" type="number" min="1" max="100" name="XPersenPil" value="100" readonly="readonly">
	      					<label>Bobot Pilihan (%)</label>
	      				</div>
      			  		<div class="input-field">
			      			<button type="submit" class="btn green">Simpan</button>
			      		</div>
			      	</form>
				</p>
			</div>
		</div>
	</div>
	<div class="col s12 m6">
		<div class="card-pan">
			<ul class="collection">
				<li class="collection-item">JANGAN ada SPASI, BISA gunakan tanda sambung (-) </li>
				<li class="collection-item">
					Hindari Kode Bank Soal yang Terlalu Panjang
				</li>
				<li class="collection-item">
					Contoh nama yang baik: BING-11IPA-UAS1
				</li>
			</ul>
		</div>
	</div>
</div>