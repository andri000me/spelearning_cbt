<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">
				<p>
					<form method="post" action="<?= base_url("admin/users/proedit/".$u->Urut); ?>">
			      		<div class="input-field">
			      			<input  autocomplete="off" type="text" name="Nama" required="required" maxlength="100" value="<?= $u->Nama; ?>">
			      			<label>Nama Lengkap</label>

			      		</div>	
			      		<div class="input-field">
			      			<input  autocomplete="off" type="text" name="Username" required="required" maxlength="100" value="<?= $u->Username; ?>" readonly="readonly">
			      			<label>Username</label>
			      		</div>	
			      		<div class="input-field">
			      			<input  autocomplete="off" type="number" name="HP" required="required" maxlength="100" value="<?= $u->HP; ?>">
			      			<label>No. HP</label>
			      		</div>	
			      		<div class="input-field">
			      			<input  autocomplete="off" type="password" name="Password" maxlength="100">
			      			<label>Password</label>
			      		</div>	
		      			<small class="red-text">(!) Kosongkan Jika tidak akan mengubah password</small>
			      		<div class="input-field">
			      			<select class='select' name="Level" required="required">	
			      				
			      				<option value="2" <?php if ($u->login ==2) {echo "Selected"; } ?> >Guru</option>
			      				<option value="1" <?php if ($u->login ==1) {echo "Selected"; } ?>>Admin</option>
			      			</select>
			      			<label>Level</label>
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