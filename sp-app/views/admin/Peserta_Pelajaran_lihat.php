<div class="card">
	<div class="card-content">
		<span class="card-title">
			PESERTA Pelajaran <?= $Pelajaran->XNamaMapel; ?> 
		</span>
	</div>
	<div class="card-action">
		<a href="<?= base_url("admin/peserta_pelajaran"); ?>" class="btn blue">Ganti Pelajaran</a>
		<!-- <a href="<?= base_url("admin/peserta_Pelajaran/ruang/".$Urut); ?>" class="btn green">Ganti Ruang</a> -->
	</div>
</div>
<div class="card-panel">
	<table class="table striped bordered">
		<thead>
			<tr>
				<th style="width: 1%">No.</th>
				<th>Nomer Pelajaran</th>
				<th>Nama</th>
				<th>Kelas</th>
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
					<!-- <td><?= $s->XKodeKelas; ?> - <?= $s->XKodeJurusan; ?></td> -->
					<td><?= $s->XNamaKelas; ?></td>
					<td>
						<?php
						$this->db->select("XStatusPelajaran");
						$this->db->where("XIdPelajaran",$Pelajaran->XIdPelajaran);
						$this->db->where("XNomerUjian",$s->XNomerUjian);
						$ss=$this->db->get("cbt_siswa_pelajaran");
						// echo($ss->num_rows());
						if ($ss->num_rows() < 1) {
							echo "<span class='red-text'>Belum Ikut Pelajaran</span>";
						} else {
							$ss=$ss->row();
							if ($ss->XStatusPelajaran == 0) {
								echo "<span class='blue-text'>Sedang Mengikuti</span>";
							} else {
								echo "<span class='green-text'>Selesai Menguikuti</span>";
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