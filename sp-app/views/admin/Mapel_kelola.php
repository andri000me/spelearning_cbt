<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">
				<p>
					<form method="post" action="<?= base_url("admin/mapel/protam"); ?>">
			      		<div class="input-field">
			      			<input  autocomplete="off" type="text" name="XKodeMapel" required="required" maxlength="100"> 
			      			<label>Kode Mapel</label>
			      		</div>	
			      		<div class="input-field">
			      			<input  autocomplete="off" type="text" name="XNamaMapel" required="required" maxlength="100"> 
			      			<label>Nama Mapel</label>
			      		</div>	
			      		<div class="input-field">
			      			<select required="required" name="XMapelAgama">
			      				<option value="N">Mapel Umum</option>
			      				<option value="J">Jurusan</option>
			      				<option value="A">Agama</option>
			      				<option value="Y">Pilihan (Khusus)</option>
			      			</select>
			      			<label>Jenis Mapel</label>
			      		</div>
			      		<div class="input-field">
			      			<input  autocomplete="off" type="number" min="0" max="100" name="XKKM" required="required" maxlength="100"> 
			      			<label>Nilai KKM</label>
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