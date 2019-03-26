<div class="card">
	<div class="card-content">
		<div class="card-title">
			Pilih Bank Soal Untuk Ujian
		</div>
		<p>
			Silahkan Pilih bank soal dan klik selanjutnya untuk menlanjutkan.
		</p>
	</div>
</div>
<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Bank Soal
			<div class="pull right">
				<!-- <a href="<?= base_url("admin/soal/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/soal/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah Bank Soal</a>	
			</div>
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Kode Bank Soal</th>
					<th>Mata Pelajaran</th>
					<th>Soal</th>
					<th>Kelas</th>
					<th nowrap="nowrap">Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($u as $g) {
				?>
				<tr>
					<td align="center"><?= $no++; ?></td>
					<td><?= $g->XKodeSoal; ?></td>
					<td><?= $g->XNamaMapel." (".$g->XKodeMapel.")" ?></td>
					<td><?php
					$this->db->where("XKodeSoal",$g->XKodeSoal);
					$jumlah_soal=$this->db->get("cbt_soal")->num_rows();
					echo $jumlah_soal;
					?> (<?= $g->XJumPilihan; ?> pilihan)</td>
					<td>
						<?php
						foreach (json_decode($g->XNamaKelas) as $k) {
							echo $k.', ';
						}
						?>
				
						<!-- <?= $g->XKodeKelas; ?> -  <?= $g->XKodeJurusan; ?> -->
					</td>
					<td nowrap="nowrap">
						<a  href="<?= base_url("admin/ujian/tambah/".$g->Urut); ?>" class="btn btn-small green"><i class="material-icons left">done</i> Selanjutnya</a>
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