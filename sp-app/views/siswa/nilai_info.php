<div class="row">
	<div class="col s12 m8">
		<div class="card">
			<div class="card-content">
				<span class="card-title">
					Daftar Nilai <?= $GLOBALS['u']['XNamaSiswa']; ?> (<?= $GLOBALS['u']['XNamaKelas']; ?>)
				</span>
				<table class="table striped bordered">
					<thead>
						<tr>
							<th width="1%">No.</th>
							<th>Jenis</th>
							<th>Mapel</th>
							<th>Tanggal Ujian</th>
							<th>KKM</th>
							<th>Nilai</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						foreach ($nilai as $n) {
							?>
							<tr>
								<td><?= $i++; ?>.</td>
								<td><?= $n->XKodeUjian; ?></td>
								<td><?= $n->XNamaMapel; ?></td>
								<td><?= date("d M. Y",strtotime($n->XTgl)); ?></td>
								<td><?= $n->XKKM; ?></td>

								<?php
								if ($n->XKKM < $n->XTotalNilai) {
									$s="green";
								} elseif ($n->XKKM == $n->XTotalNilai) {
									$s="blue";
								} else {
									$s="red";
								}
								?>

								<td class="<?=$s;?>-text"><?= $n->XTotalNilai; ?></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
	<div class="col s12 m4" style="display: none;">
		<div class="card">
			<div class="card-content">
				<span class="card-title">
					Keterangan Nilai
				</span>
				<table class="padding-1">
					<tr>
						<td class="red-text">Merah</td>
						<td>: Tidak mencapai KKM</td>
					</tr>
					<tr>
						<td class="blue-text">Biru</td>
						<td>: Mencapai KKM</td>
					</tr>
					<tr>
						<td class="green-text">Hijau</td>
						<td>: Melebihi KKM</td>
					</tr>
				</table>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("table").dataTable({
		responsive: true
	});
</script>
