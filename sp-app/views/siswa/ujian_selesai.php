<div class="row">
	<div class="col s12 m6">
		<div class="card">
			<div class="card-content">
				<div class="card-title">
					Konfirmasi Tes
				</div>
				<p>
					Selamat <b><?= $GLOBALS['u']['XNamaSiswa']; ?></b>, 
					Terimakasih telah berpartisi dalam :
					<table>
						<tr>
							<td>Jenis Ujian</td>
							<td>: <b><?= $ujian->XNamaUjian; ?></b></td>
						</tr>
						<tr>
							<td>Mata Pelajaran</td>
							<td>: <b><?= $ujian->XNamaMapel; ?></b></td>
						</tr>
					</table>
				</p>
				<?php
				if ($ujian->XTampil == 1) {
					?>
					<p align="center">
						<small class="red-text">Nilai Pilihan Ganda</small><br>
						<small>KKM : <?= $ujian->XKKM; ?>  Benar : <?= $nilai->XBenar; ?>  Salah : <?= $nilai->XSalah; ?></small>
						<h1 align="center"><?= $nilai->XNilai; ?></h1>
					</p>
					<?php
				}
				?>
			</div>
			<div class="card-action" align="center">
				<a href="<?= base_url("siswa/logout"); ?>" class="btn red">Logout / KELUAR</a>
				<a href="<?= base_url("siswa/home"); ?>" class="btn blue">DASHBOARD</a>
			</div>
		</div>
	</div>
</div>