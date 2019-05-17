<div class="row">
	<div class="col s12 m6">
		<div class="card">
			<div class="card-content">
				<p>

					<form method="post" action="<?= base_url("admin/kelas/protam"); ?>">
			      		<div class="input-field">
			      			<input  autocomplete="off" type="text" name="XKodeKelas" required="required" maxlength="100" placeholder="contoh : X,XI,XII"> 
			      			<label>Kode Kelas</label>
			      		</div>	
			      		<div class="input-field">
			      			<input  autocomplete="off" type="text" name="XNamaKelas" required="required" maxlength="100" placeholder="contoh : X-TKJ-A,7A"><label>Nama Kelas</label>
			      		</div>	
			      		<?php
			      		// echo $this->m_config->cfg['XTingkat'];
			      		if ($this->m_config->cfg['XTingkat'] == "SMK/SMA/MA") {
			      			?>
				      		<div class="input-field">
				      			<input  autocomplete="off" type="text" name="XKodeJurusan" required="required" maxlength="100" placeholder="contoh : TKJ"><label>Kode Jurusan</label>
				      		</div>	
			      			<?php
			      		} else {
							?>
			      			<input  autocomplete="off" type="hidden" name="XKodeJurusan" required="required" maxlength="100" value="tidak">
							<?php			      			
			      		}
			      		?>
			      		<div class="input-field">
			      			<button type="submit" class="btn green">Simpan</button>
			      		</div>
			      	</form>
				</p>
			</div>
		</div>
	</div>
</div>