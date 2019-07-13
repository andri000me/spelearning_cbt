<div class="row">
	<div class="col m6" style="margin-right: 0">
		<div class="card blue accent-2 white-text">
			<div class="card-content">
				<span class="card-title">Fitur Baru !!</span>
				<p>
					Bagi kamu yang berlangganan aplikasi Simdik dari kami, dapat dengan mudah import dan export data loh !!
				</p>
				<p>
					Mulai dari data kelas siswa, dll dengan <b>satu kali klik !</b>
				</p>
			</div>
		</div>
		<div class="card">
			<div class="card-content">
				<form action="<?= base_url('admin/importexport/siswa/prosesimport'); ?>"  target="hasil">
					<div>
						<label>Url Aplikasi SIMDIK :</label>
						<input type="text" name="url" required="required" minlength="4" placeholder="http://smk.com/simdik">
					</div>
					<div>
						Tahun Ajaran
						<input type="text" name="ta" value="<?= $this->m_config->get_tahun_ajaran() ?>" required="required">
					</div>
					<div>
						<label>Kelas</label>
						<select name="kelas[]" multiple="multiple" class="select">
							<option value="semua" value="semua">Semua</option>
							<?php
							foreach ($kelas->result() as $k) {
								echo "<option>{$k->XNamaKelas}</option>";
							}
							?>
						</select>
					</div>
					<div>
						<label>Password Generator</label>
						<!-- Switch -->
						<table>
							<tr>
								<td>
									<p>
										<input name="group1" type="radio" id="test1" />
										<label for="test1">Label</label>
									</p>
								</td>
							</tr>
						</table>
					</div>
					<div>
						<button type="submit" class="btn">Import data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col m6">
	</div>
</div>


