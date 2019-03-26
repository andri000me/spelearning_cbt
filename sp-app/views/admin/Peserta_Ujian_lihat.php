<div class="card">
	<div class="card-content">
		<span class="card-title">
			PESERTA UJIAN <?= $ujian->XNamaMapel; ?> (Ruang <?= $Ruang; ?>)
		</span>
	</div>
	<div class="card-action">
		<a href="<?= base_url("admin/peserta_ujian"); ?>" class="btn blue">Ganti Ujian</a>
		<!-- <a href="<?= base_url("admin/peserta_ujian/ruang/".$Urut); ?>" class="btn green">Ganti Ruang</a> -->
	</div>
</div>
<div class="card-panel">
	<table class="table striped bordered">
		<thead>
			<tr>
				<th style="width: 1%">No.</th>
				<th>Nomer Ujian</th>
				<th>Nama</th>
				<th>Kelas - Jurusan</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=1;
			foreach ($siswa->result() as $s) {
				// print_r($s);
				// die();
				?>
				<tr>
					<td><?= $no++; ?>.</td>
					<td><?= $s->XNomerUjian; ?></td>
					<td><?= $s->XNamaSiswa; ?></td>
					<td><?= $s->XKodeKelas; ?> - <?= $s->XKodeJurusan; ?></td>
					<td>
						<?php
						$this->db->select("XStatusUjian");
						$this->db->where("XIdUjian",$ujian->XIdUjian);
						$this->db->where("XNomerUjian",$s->XNomerUjian);
						$ss=$this->db->get("cbt_siswa_ujian");
						// echo($ss->num_rows());
						if ($ss->num_rows() < 1) {
							echo "<span class='red-text'>Belum Memulai Ujian</span>";
						} else {
							$ss=$ss->row();
							if ($ss->XStatusUjian == 0) {
								echo "<span class='blue-text'>Sedang Ujian</span>";
							} else {
								echo "<span class='green-text'>Selesai Ujian</span>";
							}
						}
						?>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("table").dataTable({
			responsive:true
		});
	});
</script>