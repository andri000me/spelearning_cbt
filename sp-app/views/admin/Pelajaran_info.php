<div class="card">
	<div class="card-content">
		<span class="red-text">Perhatian !</span>
		<ul>
			<li>- Untuk Pelajaran yang melawati waktu selesai akan otomatis nonaktiv.</li>
			<li>- Bisa melakukan Pelajaran lebih dari satu secara bersamaan.</li>
			<li>- Untuk Pelajaran yang sudah nonaktiv bisak diaktivkan kembali dengan mengeset ulang waktu Pelajaran,</li>
			<li>- <span class="red-text">Menghapus Bank Materi akan menghapus semua Pelajaran / data yang terkait dengan bank Materi tersebut.</span></li>
		</ul>
	</div>
</div>
<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Pelajaran
			<?php if ($this->m_config->cfg['XServer']) { ?>
			<div class="pull right">
				<!-- <a href="<?= base_url("admin/Pelajaran/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/Pelajaran/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah jadwal  Pelajaran</a>	
			</div>
			<?php } ?>
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Kode Bank Materi</th>
					<th>Mata Pelajaran</th>
					<th>Kelas</th>
					<th>Tgl Aktiv</th>
					<th>Tgl Selesai</th>
					<th>Token</th>
					<th nowrap="nowrap">Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			// print_r($siswa);
			foreach ((object) $Pelajaran as $g) {
				?>
				<tr>
					<td align="center"><?= $no++; ?></td>
					<td><?= $g->XKodeMateri; ?></td>
					<td><?= $g->XNamaMapel." (".$g->XKodeMapel.")" ?></td>
					<td>
						<!-- <?= $g->XKodeKelas; ?> -  <?= $g->XKodeJurusan; ?> -->
						<?php
						foreach (json_decode($g->XNamaKelas) as $k) {
							echo $k.', ';
						}
						?>
				
					</td>
					<td nowrap="nowrap"><?= tgl_bilang(strtotime($g->XWaktuMulai),1); ?></td>
					<td nowrap="nowrap"><?= tgl_bilang(strtotime($g->XWaktuAkhir),1); ?></td>
					<td><span class="red-text"><?= $g->XTokenPelajaran ;?></span></td>
					<td nowrap="nowrap">
						<?php if ($this->m_config->cfg['XServer']) { ?>
						<a  href="<?= base_url("admin/Pelajaran/edit/".$g->XIdPelajaran); ?>" class="btn btn-small blue" ><i class="material-icons left">timer</i> Set</a>
						<a <?= $g->XDisplay; ?> onclick="return confirm('Apakah anda yakin ingin mengakhiri sesi Pelajaran ini ??');" href="<?= base_url("admin/Pelajaran/prosesai/".$g->XIdPelajaran); ?>"  class="btn btn-small green"><i class="material-icons left">done_all</i> Selesai</a>
						<a onclick="return confirm('Apakah anda yakin ingin mnghapus sesi ujian ini ??');" href="<?= base_url("admin/pelajaran/hapus/".$g->XIdPelajaran); ?>"  class="btn btn-small red"><i class="material-icons left">delete</i> Hapus</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
<a href="" class="toggle-vis" data-column="0">Name</a>
<script type="text/javascript">
	$(document).ready(function() {
		var table=$("table").dataTable({
			responsive:true,
			"columnDefs": [
			    { "visible": false, "targets": 3 }
			 ]
		});
	});
</script>