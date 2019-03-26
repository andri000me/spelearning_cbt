<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">
				<p>
					<form method="post" action="<?= base_url("admin/materi/protam"); ?>">
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
	      					<input type="text" name="XKodeMateri" maxlength="50" required="required">
	      					<label>Kodel Bank Materi</label>
	      				</div>
	      				<div class="input-field">
	      					<input type="text" name="XKd" maxlength="50" required="required">
	      					<label>Kompetensi Dasar</label>
	      				</div>
	      				<div class="input-field">
	      					<input type="text" name="XJudul" maxlength="50" required="required">
	      					<label>Judul Materi Pelajaran</label>
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
					Hindari Kode Bank Materi yang Terlalu Panjang
				</li>
				<li class="collection-item">
					Contoh nama yang baik: <b>BING-11IPA-UAS1</b>
				</li>
			</ul>
		</div>
	</div>
</div>