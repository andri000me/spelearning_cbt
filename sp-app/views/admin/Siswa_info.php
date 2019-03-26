<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Siswa
			<div class="input-field">
				<!-- <a href="<?= base_url("admin/siswa/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/siswa/upload"); ?>" class="modal-trigger btn blue white-text">Upload Data<i class="material-icons left">cloud_upload</i></a>	
				<a href="<?= base_url("admin/siswa/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah Siswa</a>	
				<button class="btn red" type="button" onclick="submit_siswa_all()"><i class="material-icons left">delete</i> <span>Hapus siswa Seleksi</span></button>
			</div>
		</div>
		<form action="<?= base_url("admin/siswa/hapus_seleksi"); ?>" method="post">
		<table>
			<thead>
				<tr>
					<th>
						<label>
							<input type="checkbox" name="" onclick="return siswa_all()">
							<span></span>
						</label>
					</th>
					<th style="max-width: 10px;">No. </th>
					<th>Foto</th>
					<th>Nomer Peserta | Sesi</th>
					<th>Nama Peserta</th>
					<th>Kelas - Jurusan</th>
					<th>Nama Kelas</th>	
					<th>Mapel Khusus</th>
					<th nowrap="nowrap">Aksi</th>
				</tr>
			</thead>
				<tbody>
				<?php
					$no=1;
					foreach ($siswa as $g) {
						?>
						<tr>
							<td>
								<label>
									<input type="checkbox" name="siswa[]" value="<?= $g->Urut; ?>">
									<span></span>
								</label>
							</td>
							<td><?= $no++; ?></td>
							<td>
								<?php
								if (empty($g->XFoto)) {
									$foto="asset/img/no_siswa.png";
								} else {
									$foto="asset/uploads/foto_siswa/".$g->XFoto;
								}?>
								<img src="<?= base_url($foto); ?>" style="max-width: 60px">
							</td>
							<td><?= $g->XNomerUjian ?> | <?= $g->XSesi; ?></td>
							<td><?= $g->XNamaSiswa; ?></td>
							<td><?= $g->XKodeKelas; ?> - <?= $g->XKodeJurusan; ?></td>
							<td><?= $g->XNamaKelas; ?></td>
							<td><?= $g->XPilihan; ?></td>
							<td nowrap="nowrap">
								<a data-target="modal1" class="btn green white-text " href="<?= base_url("admin/siswa/edit/".$g->Urut); ?>" >
									<i class="material-icons">mode_edit</i>
								</a>	
								<a onclick="return confirm('Apakah benar akan menghapus data ini ?')" href="<?= base_url("admin/siswa/proha/".$g->Urut); ?>" class="btn red white-text">
									<i class="material-icons">delete_forever</i>
								</a>
							</td>
						</tr>
					<?php } ?>

				</tbody>
		</table>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("table").dataTable({
			responsive:true
		});
	});
	function siswa_all(){
		// alert("as");
		$("[name='siswa[]']").attr('checked', 'checked');
	}
	function submit_siswa_all(){
		if (confirm("Apakah anda yakin menghapus semua data siswa yang di seleksi ?")) {
			$("form").submit();
		};
	}
</script>