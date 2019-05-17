<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Kelas
			<?php if ($this->m_config->cfg['XServer']) { ?>
			<div class="input-field">
				<!-- <a href="<?= base_url("admin/mapel/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/mapel/upload"); ?>" class="modal-trigger btn blue white-text">Upload Data<i class="material-icons left">cloud_upload</i></a>	
				<a href="<?= base_url("admin/mapel/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah Mapel</a>	
			</div>
			<?php } ?>
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Kode Mapel</th>
					<th>Nama Mapel</th>
					<th>Nilai KKM</th>
					<th>Jenis</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($mapel as $g) {
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $g->XKodeMapel; ?></td>
					<td><?= $g->XNamaMapel; ?></td>
					<td><?= $g->XKKM; ?></td>
					<td><?php
						switch ($g->XMapelAgama) {
							case 'N':
								echo "Mapel Umum";
								break;
							case 'Y':
								echo "Mapel Peminatan";
								# code...
								break;
							case 'A':
								echo "Mapel Agama";
								# code...
								break;
						}
					 ?></td>
					<td>
						<?php if ($this->m_config->cfg['XServer']) { ?>
						<a data-target="modal1" class="btn green white-text " href="<?= base_url("admin/mapel/edit/".$g->Urut); ?>" >
							<i class="material-icons">mode_edit</i>
						</a>
						<a onclick="return confirm('Apakah benar akan menghapus data ini ?')" href="<?= base_url("admin/mapel/proha/".$g->Urut); ?>" class="btn red white-text">
							<i class="material-icons">delete_forever</i>
						</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('table').dataTable({
			responsive:true
		});
	});
</script>