<?php
if ($ujian->num_rows() == 0) {
	?>
	<div class="card-panel blue white-text">
		Ujian tidak tersedia silahkan cek kembali tangggal dimulai dan berakhirnya ujian / Hubungi guru / panitia bersangkutan jika terjadi kesalahan !
	</div>
	<?php
}
foreach ($ujian->result() as $u) {
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
					Konfirmasi Data Ujian
				</div>
				<ul class="collection">
					<li class="collection-item"><b>Kode Soal</b><br/><i> : <?= $u->XKodeSoal; ?></i></li>
					<li class="collection-item"><b>Kelas</b><br/><i> : <ol>
						<?php
						foreach (json_decode($u->XNamaKelas) as $k) {
							echo '<li>'.$k.'</li>';
						}
						?>
										
					</ol></i></li>
					<li class="collection-item"><b>Tanggal & Waktu Mulai Ujian</b><br/><i> : <?= date("d M. Y H:i",strtotime($u->XTglUjian)); ?></i></li>
					<li class="collection-item"><b>Tanggal & Waktu Selesai Ujian</b><br/><i> : <?= date("d M. Y H:i",strtotime($u->XBatasMasuk)); ?></i></li>
					<li class="collection-item"><b>Durasi Ujian</b><br/><i> : <?= $u->XLamaUjian; ?> Menit</i></li>
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
						<legend>Token Ujian Anda</legend>
						<div class="red-text align-center" style="text-align: center;text-decoration:"><i><h5><?= $u->XTokenUjian; ?></h5></i></div>
					</fieldset>
				<?php } else {
					?>
					<?php
				} ?>

				<form action="<?= base_url("siswa/ujian/cek/".$u->XIdUjian); ?>" method="post">
					<div class="input-field">
						<input type="text" name="XTokenUjian" required="required" maxlength="5">
						<label>Masukan Token Ujian</label>
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