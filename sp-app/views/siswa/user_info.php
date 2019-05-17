<?= $this->m_config->pesan(); ?>
<?php
if (empty($u->XFoto)) {
	$u->XFoto='../../img/nouser.png';
}
?>
<div class="row">
	<div class="col s12 m4">
		<div class="card">
			<div class="card-header">
				<div class="card-content">
					<img src="<?= base_url("asset/uploads/foto_guru/".$u->XFoto); ?>" class="circle responsive-img">
				</div>
			</div>
		</div>
	</div>
	<div class="col s12 m8">
		<div class="card" id="identitas">
			<div class="card-content">
				<p>
					<!-- <?= print_r($s); ?> -->
				<form action="<?= base_url('admin/user/proedit'); ?>" method="post">
						<div class="input-field">
							<input  autocomplete="off" type="text" name="Nama" readonly="readonly"> 
							<label>Nama Lengkap</label>
						</div>
						<div class="input-field">
							<input  autocomplete="off" type="number" name="HP" readonly="readonly"> 
							<label>No. HP / WhatsApp</label>
						</div>
						<div class="input-field">
							<input  autocomplete="off" type="email" name="Email" readonly="readonly"> 
							<label>E-Mail</label>
						</div>
						<div class="input-field">
							<textarea name="Alamat" readonly="readonly" class="materialize-textarea"></textarea>
							<label>Alamat Lengkap</label>
						</div>
					</form>
				</p>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	<?php foreach ($u as $key => $value): ?>
		$("[name='<?= $key; ?>']").val("<?= addslashes($value) ?>");
	<?php endforeach ?>
</script>