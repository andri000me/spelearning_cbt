<?php
// print_r($Pelajaran);
// echo $Pelajaran->num_rows();
if ($Pelajaran->num_rows() == 0) {
	?>
	<div class="card-panel blue white-text">
		Pelajaran tidak tersedia silahkan cek kembali tangggal dimulai dan berakhirnya ujian / Hubungi guru / panitia bersangkutan jika terjadi kesalahan !
	</div>
	<?php
}

foreach ($Pelajaran->result() as $u) {
	foreach ($u as $key => $value) {
		if ($value == "" || empty($value)) {
			$u->$key="All";
		}
	}
?>
<div class="row">
	<div class="col s12 m8">
		<div class="card">
			<div class="card-content">
				<div class="card-title">
					Konfirmasi Data Pelajaran
				</div>
				<ul class="collection">
					<li class="collection-item"><b>Kode Materi</b><br/><i> : <?= $u->XKodeMateri; ?></i></li>
					<li class="collection-item"><b>Kelas</b><br/><i> : <ol>
						<?php
						foreach (json_decode($u->XNamaKelas) as $k) {
							echo '<li>'.$k.'</li>';
						}
						?>
										
					</ol></i></li>
					<li class="collection-item"><b>Tanggal & Waktu Mulai Pelajaran</b><br/><i> : <?= date("d M. Y H:i",strtotime($u->XWaktuMulai)); ?></i></li>
					<li class="collection-item"><b>Tanggal & Waktu Selesai Pelajaran</b><br/><i> : <?= date("d M. Y H:i",strtotime($u->XWaktuAkhir)); ?></i></li>
					<li class="collection-item"><b>Bolehkan Bertanya </b><br/><i> : <?php
					if ($u->XTanya==0) {
					 	echo("Tidak diperbolehkan");
					 } else {
					 	echo("Diperbolehkan");
					 }
					 ?></i></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col s12 m4">
		<div class="card">
			<div class="card-content">
				<?php
				if ($u->XStatusToken == 1) {
					?>
					<fieldset>
						<legend>Token Pelajaran Anda</legend>
						<div class="red-text align-center" style="text-align: center;text-decoration:"><i><h5><?= $u->XTokenPelajaran; ?></h5></i></div>
					</fieldset>
				<?php } else {
					?>
					<?php
				} ?>

			<form action="<?= base_url("siswa/Pelajaran/cek/".$u->XIdPelajaran); ?>" method="post">
					<div class="input-field">
						<input type="text" name="XTokenPelajaran" required="required" maxlength="5">
						<label>Masukan Token Pelajaran</label>
					</div>
					<?= $this->m_config->pesan(); ?>
					<div class="input-field">
						<button class="btn green lighten-1 " style="width: 100%">Masuk</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>