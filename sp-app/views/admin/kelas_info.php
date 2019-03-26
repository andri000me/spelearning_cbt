<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Kelas
			<div class="input-field">
				<!-- <a href="<?= base_url("admin/kelas/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/kelas/upload"); ?>" class="modal-trigger btn blue white-text">Upload Data<i class="material-icons left">cloud_upload</i></a>	
				<a href="<?= base_url("admin/kelas/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah Kelas</a>	
			</div>
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Kode Level</th>
					<th>Kode Kelas</th>
					<th>Rombel</th>
					<th>Nama Kelas</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($kelas as $g) {
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $g->XKodeKelas; ?></td>
					<td><?= $g->XKodeJurusan; ?></td>
					<td><?= $g->XNamaKelas; ?></td>
					<td>
						<a data-target="modal1" class="btn green white-text " href="<?= base_url("admin/kelas/edit/".$g->Urut); ?>" >
							<i class="material-icons">mode_edit</i>
						</a>
						<a onclick="return confirm('Apakah benar akan menghapus data ini ?')" href="<?= base_url("admin/kelas/proha/".$g->Urut); ?>" class="btn red white-text">
							<i class="material-icons">delete_forever</i>
						</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
