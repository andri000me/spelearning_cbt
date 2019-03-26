<div class="card">
	<div class="card-content">
		<span class="red-text">Perhatian !</span>
		<ul>
			<li>- Untuk ujian yang melawati waktu selesai akan otomatis nonaktiv.</li>
			<li>- Bisa melakukan ujian lebih dari satu secara bersamaan.</li>
			<li>- Untuk ujian yang sudah nonaktiv bisak diaktivkan kembali dengan mengeset ulang waktu ujian,</li>
			<li>- <span class="red-text">Menghapus Bank Soal akan menghapus semua ujian / data yang terkait dengan bank soal tersebut.</span></li>
		</ul>
	</div>
</div>
<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Ujian
			<div class="pull right">
				<!-- <a href="<?= base_url("admin/ujian/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/ujian/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah Ujian</a>	
			</div>
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
						<a  href="<?= base_url("admin/peserta_ujian/lihat/".$g->XIdUjian); ?>" class="btn btn-small blue" ><i class="material-icons left">people</i> Lihat Peserta</a>
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