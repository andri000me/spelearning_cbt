<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<?= form_open(base_url("admin/server/proses/tambah"), ''); ?>
				<div >
					<label>Nama</label>
					<input  autocomplete="off" type="text" name="XNama" required="required" maxlength="50">				
				</div>
				<div>
					<label>ID Aplikasi</label>
					<input  autocomplete="off" type="text" name="XIdServer" required="required" maxlength="50">				
				</div>
				<div>
					<button class="btn green " type="submit"><i class="material-icons left">add</i> Tambah Client</button>
				</div>	
		</div>
	</div>
</div>