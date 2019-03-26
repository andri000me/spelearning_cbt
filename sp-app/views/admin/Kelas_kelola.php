<div class="row">
	<div class="col s12 m6">
		<div class="card">
			<div class="card-content">
				<p>

					<form method="post" action="<?= base_url("admin/kelas/protam"); ?>">
			      		<div class="input-field">
			      			<input type="text" name="XKodeKelas" required="required" maxlength="100" placeholder="contoh : X,XI,XII"> 
			      			<label>Kode Kelas</label>
			      		</div>	
			      		<div class="input-field">
			      			<input type="text" name="XNamaKelas" required="required" maxlength="100" placeholder="contoh : X-TKJ-A,7A"><label>Nama Kelas</label>
			      		</div>	
			      		<?php
			      		// echo $GLOBALS['sp']['XTingkat'];
			      		if ($GLOBALS['sp']['XTingkat'] == "SMK/SMA/MA") {
			      			?>
				      		<div class="input-field">
				      			<input type="text" name="XKodeJurusan" required="required" maxlength="100" placeholder="contoh : TKJ"><label>Kode Jurusan</label>
				      		</div>	
			      			<?php
			      		} else {
							?>
			      			<input type="hidden" name="XKodeJurusan" required="required" maxlength="100" value="tidak">
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