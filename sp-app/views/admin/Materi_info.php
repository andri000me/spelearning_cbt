<div class="card" style="display: none;">
	<div class="card-content">
		<span class="card-title">Download Template Soal</span>
		<p> Silahkan Klik tombol dibawah ini untuk <b>download</b> file excel template soal yang dibutuhkan sesuai jenis soal. <br> <span class="red-text">Jangan ada inputan apapun setelah nomer terakhir Karena akan dibaca dan diacak oleh sistem.  </span> <br><u>Hal ini berakibat beberapa soal menjadi kosong / tidak tampil di lembar ujian CBT.</u>
		</p>
	</div>
	<div class="card-action">
		<a href="<?= base_url("asset/templat/sp_Soal.xlsx"); ?>" class="btn green"><i class="material-icons left">cloud_download</i> Template Soal</a>
		<a href="<?= base_url("asset/templat/coba_soal.xlsx"); ?>" class="btn blue"><i class="material-icons left">cloud_download</i>Soal DUMY Matematika 81 Soal (FULL)</a>
		<!-- <a href="" class="btn green"><i class="material-icons left">cloud_download</i> Soal Peminatan</a> -->
		<!-- <a href="" class="btn green"><i class="material-icons left">cloud_download</i> Soal Agama</a> -->
	</div>
</div>
<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Bank Materi Pelajaran
			<?php if ($this->m_config->cfg['XServer']) { ?>
			<div class="pull right">
				<!-- <a href="<?= base_url("admin/materi/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/materi/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah Materi</a>	
			</div>
			<?php } ?>
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Judul</th>
					<th>Mata Pelajaran</th>
					<th>Kelas</th>
					<th>Status</th>
					<th>Edit</th>
					<th nowrap="nowrap">Aksi</th>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($siswa as $g) {
				?>
				<tr>
					<td align="center"><?= $no++; ?></td>
					<td><?= $g->XJudul; ?></td>
					<td><?= $g->XNamaMapel." (".$g->XKodeMapel.")" ?></td>
					<td>
						<!-- <?= $g->XKodeKelas; ?> -  <?= $g->XKodeJurusan; ?> -->
						<?php
						foreach (json_decode($g->XNamaKelas) as $k) {
							echo $k.', ';
						}
						?>
					</td>
					<td align="center">
						<?php
						switch ($g->XStatusMateri) {
							case "N":
									$disable="disabled='disabled'";

								?>
								<a href="<?= base_url("admin/materi/aktiv/".$g->Urut."/Y"); ?>" class="btn white black-text"  >Aktivkan</a>
								<?php
								break;
							case 'Y':
								$disable2="disabled='disabled'";
								?>
								<a   href="<?= base_url("admin/materi/aktiv/".$g->Urut."/N"); ?>" class="btn green white-text">Aktiv</a>
								<?php
								break;
						}
						?>
					</td>
					<td nowrap="nowrap">
						<?php if ($this->m_config->cfg['XServer']) { ?>
						<!-- <a data-target="modal1" class="btn blue lighten-3 white-text " href="<?= base_url("admin/materi/kopi/".$g->Urut); ?>" > -->
							<!-- <i class="material-icons">content_copy</i> -->
						<!-- </a> -->
						<!-- <a data-target="modal1" class="btn blue white-text " href="<?= base_url("admin/materi/upload_butir/".$g->Urut); ?>"  > -->
							<!-- <i class="material-icons">cloud_upload</i> -->
						<!-- </a> -->
						<a data-target="modal1"  class="btn green white-text " href="<?= base_url("admin/materi/edit_materi/".$g->Urut); ?>"  >
							<i class="material-icons">mode_edit</i>
						</a>
						<?php } ?>
					</td>
					<td nowrap="nowrap">
						<?php if ($this->m_config->cfg['XServer']) { ?>
						<!-- <a  href="<?= base_url("admin/materi/pdf/".$g->Urut); ?>" class="btn btn-small blue" ><i class="material-icons">print</i></a> -->
						<a   onclick="return confirm('Apakah anda ingin menghapus paket soal ini ?? data yang berkaitan dengan kode pakel soal berikut akan juga dihapus');" href="<?= base_url("admin/materi/proha/".$g->Urut); ?>" class="btn btn-small red"><i class="material-icons">delete_forever</i></a>
						<?php } ?>
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