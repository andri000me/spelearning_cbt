<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Admin/Guru
			<?php if ($this->m_config->cfg['XServer']) { ?>
			<div class="pull right">
				<a href="<?= base_url("admin/users/tambah"); ?>" class="modal-trigger btn green white-text">Tambah Guru/Admin</a>	
			</div>
			<?php } ?>
		</div>
		<table>
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Username</th>
					<th>Nama</th>
					<th>No.Hp</th>
					<th>Level</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($guru as $g) {
				?>
				<tr>
					<td><?= $no++; ?></td>
					<td>
						<?= $g->Username; ?>
					</td>
					<td><?= $g->Nama; ?></td>
					<td><?= $g->HP;?></td>
					<td>
						<?php
						if ($g->login == 1) {
							echo "Admin";
						} else {
							echo "Guru";
						}
						?>
					</td>
					<td>
						<?php
						if ($g->Status == 1) {
							?>
							<a href="<?= base_url("admin/users/prost/".$g->Urut."/0"); ?>" class=" btn green white-text ">Aktiv</a>
							<?php
						} else {
							?>
							<a href="<?= base_url("admin/users/prost/".$g->Urut."/1"); ?>" class=" btn red white-text ">Non Aktiv</a>
							<?php
						} ?>
					</td>
					<td>
						<?php if ($this->m_config->cfg['XServer']) { ?>
						<a data-target="modal1" class="btn green white-text " href="<?= base_url("admin/users/edit/".$g->Urut); ?>" >
							<i class="material-icons">mode_edit</i>
						</a>
						<a onclick="return confirm('Apakah benar akan menghapus data ini ?')" href="<?= base_url("admin/users/proha/".$g->Urut); ?>" class="btn red white-text">
							<i class="material-icons">delete_forever</i>
						</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
