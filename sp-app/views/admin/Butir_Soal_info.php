<?= $this->m_config->pesan(); ?>

<div class="card">
	<div class="card-content">
		<!-- <h1></h1> -->
		<a href="<?= base_url("admin/soal"); ?>" class="btn white black-text "><i class="material-icons left">arrow_back</i>Kembali</a>
		<a href="<?= base_url("admin/butir_soal/kosongkan/".$Uid); ?>" class="btn red "><i class="material-icons left">delete</i>Kosongkan</a>
		<a href="<?= base_url("admin/butir_soal/tambah/".$Uid); ?>" class="btn green "><i class="material-icons left">add</i>tambah</a>
	</div>
</div>
<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<table class="striped">
			<thead>
				<tr>
					<th width="5px">No.</th>
					<th>Pertanyaan</th>
					<!-- <th>Jenis</th> -->
					<th>Level</th>
					<th>Acak Soal</th>
					<th>Acak Opsi</th>
					<th>Edit | Hapus</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($soal as  $v):
					switch ($v->XKategori) {
						case '1':
							$lvl="Mudah";
							break;
						
						case '2':
							$lvl="Sedang";
							break;
						
						case '3':
							$lvl="Sulit";
							break;
					}
					?>
					<tr>
						<td valign="top">
							<?= $v->XNomerSoal; ?>
						</td>
						<td valign="top"><?= $v->XTanya; ?></td>
						<td><?= $lvl; ?></td>
						<td>
							<?php
							switch ($v->XAcakSoal) {
								case 'A': echo "Acak";break;
								case 'T': echo "Tidak";break;
							}
							?>
						</td>
						<td>
							<?php
							switch ($v->XAcakOpsi) {
								case 'A': echo "Acak";break;
								case 'T': echo "Tidak";break;
							}
							?>
						</td>
						<td nowrap="nowrap">
							<!-- <a data-target="modal1" class="btn blue lighten-3 white-text " href="<?= base_url("admin/soal/kopi/".$v->Urut); ?>" title="Lihat Butir Soal" >
								<i class="material-icons">search</i>
							</a> -->
							<a data-target="modal1" class="btn green lighten-2 white-text " href="<?= base_url("admin/butir_soal/edit/".$v->Urut); ?>" title="Edit Butir Soal" >
								<i class="material-icons">mode_edit</i>
							</a>
							<a class="btn red white-text " href="<?= base_url("admin/butir_soal/proha/".$v->Urut."/".$Uid); ?>" >
								<i class="material-icons">delete_forever</i>
							</a>

						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>