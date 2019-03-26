<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">
				<form target="_blank" action="<?= base_url("admin/cetak/proses_kartu"); ?>" method="post">
					<div class="input-field" style="display: none;">
						<select class='select' name="XKodeJurusan">
							<?php
      						if ($GLOBALS['lvl'] != 1 ) {
      							$this->db->where_in("XNamaKelas",json_decode($GLOBALS['u']['XKelas']));
      						}

							$this->db->select("XKodeJurusan");
							$this->db->group_by('XKodeJurusan');
							$this->db->order_by('XKodeJurusan',"ASC");
							foreach ($this->db->get('cbt_siswa')->result() as $key => $value) {
								echo "<option>".$value->XKodeJurusan."</option>";
							}
							?>
						</select>
						<label>Jurusan/ Rombel</label>
					</div>
					
					<div class="input-field" style="display: none;">
						<select class='select' name="XKodeKelas">
							<?php
      						if ($GLOBALS['lvl'] != 1 ) {
      							$this->db->where_in("XNamaKelas",json_decode($GLOBALS['u']['XKelas']));
      						}

							$this->db->select("XKodeKelas");
							$this->db->group_by('XKodeKelas');
							$this->db->order_by('XKodeKelas',"ASC");
							foreach ($this->db->get('cbt_siswa')->result() as $key => $value) {
								echo "<option>".$value->XKodeKelas."</option>";
							}
							?>
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
						<select class='select' name="XKodeUjian">
							<?php
							foreach ($this->db->get('cbt_tes')->result() as $key => $value) {
								echo "<option value='".$value->XKodeUjian."'>".$value->XNamaUjian."</option>";
							}
							?>
						</select>
						<label>Ujian</label>
					</div>
					<div class="input-field">
						<button type="submit" class="btn green"><i class="material-icons left">print</i> Print Sekarang</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>