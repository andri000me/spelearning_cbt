<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Ujian
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Kode Bank Soal</th>
					<th>Mata Pelajaran</th>
					<th>Kelas</th>
					<th>Sesi</th>
					<th>Tgl Aktiv</th>
					<th>Tgl Selesai</th>
					<th>Durasi</th>
					<th>Token</th>
					<th nowrap="nowrap">Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			// print_r($siswa);
			foreach ((object) $ujian as $g) {
				?>
				<tr>
					<td align="center"><?= $no++; ?></td>
					<td><?= $g->XKodeSoal; ?></td>
					<td><?= $g->XNamaMapel." (".$g->XKodeMapel.")" ?></td>
					<td>
						<!-- <?= $g->XKodeKelas; ?> -  <?= $g->XKodeJurusan; ?> -->
						<?php
						foreach (json_decode($g->XNamaKelas) as $k) {
							echo $k.', ';
						}
						?>
				
					</td>
					<td><?= $g->XSesi; ?></td>
					<td nowrap="nowrap"><?= $g->XTglUjian; ?></td>
					<td nowrap="nowrap"><?= $g->XBatasMasuk; ?></td>
					<td><?= $g->XLamaUjian; ?> Menit</td>
					<td><span class="red-text"><?= $g->XTokenUjian ;?></span></td>
					<td nowrap="nowrap">
						<a target="_blank" href="<?= base_url("admin/nilai/excel/$g->XIdUjian"); ?>" class="btn green"><i class="material-icons left">cloud_download</i> Excel</a>
						<a target="_blank" href="<?= base_url("admin/nilai/pdf/$g->XIdUjian"); ?>" class="btn red"><i class="material-icons left">cloud_download</i> PDF</a>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("table").dataTable({
			responsive:true
		});
	});
</script>