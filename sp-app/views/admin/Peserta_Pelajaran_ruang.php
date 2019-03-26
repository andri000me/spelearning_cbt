<div class="row">
	<div class="col s12 m6">
		<div class="card">
			<div class="card-content">	
				<form target="_blank" action="<?= base_url("admin/peserta_pelajaran/lihat"); ?>" method="post">
					<div class="row">
						<div class="col s12 m12">
							<div class="input-field">
								<input type="hidden" name="Urut" value="<?= $Urut; ?>">
								<select class='select' name="XRuang">
									<?php
									foreach ($ruang->result() as $key => $value) {
										echo "<option>".$value->XRuang."</option>";
									}
									?>
								</select>
								<label>Ruang</label>
							</div>
						</div>
					</div>
					<div class="input-field">
						<button type="submit" class="btn green">Lihat Peserta Ujian</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
