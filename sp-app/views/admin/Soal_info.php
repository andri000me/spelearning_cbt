<?php if ($this->m_config->cfg['XServer']) { ?>
<div class="card">
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
<?php } ?>
<?= $this->m_config->pesan(); ?>
<div class="card">
	<div class="card-content">
		<div class="card-title">
			Daftar Bank Soal
			<?php if ($this->m_config->cfg['XServer']) { ?>
			<div class="pull right">
				<!-- <a href="<?= base_url("admin/soal/tambah"); ?>" class="modal-trigger btn cyan white-text"><i class="material-icons left">cloud_download</i> Download Data</a>	 -->
				<a href="<?= base_url("admin/soal/tambah"); ?>" class="modal-trigger btn green white-text"><i class="material-icons left">add</i> Tambah Bank Soal</a>	
			</div>
			<?php } ?>
		</div>
		<table class="striped">
			<thead>
				<tr>
					<th style="max-width: 10px;">No. </th>
					<th>Kode Bank Soal</th>
					<th>Mata Pelajaran</th>
					<th>Soal</th>
					<th>Kelas</th>
					<th>Status</th>
					<?php if ($this->m_config->cfg['XServer']) { ?>
					<th>Copy | Upload | Edit</th>
					<th nowrap="nowrap">Aksi</th>
					<?php } ?>
				</tr>
			</thead>
			<?php
			$no=1;
			foreach ($siswa as $g) {
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
						<!-- <?= $g->XKodeKelas; ?> -  <?= $g->XKodeJurusan; ?> -->
						<?php
						foreach (json_decode($g->XNamaKelas) as $k) {
							echo $k.', ';
						}
						?>
				
					</td>
					<td align="center">
						<?php
						switch ($g->XStatusSoal) {
							case "N":
								$disable2="";
								$disable="";
								if ($jumlah_soal<=0 || $jumlah_soal < $g->XPilGanda) {
									$disable="disabled='disabled'";
								}

								?>
								<a href="<?= base_url("admin/soal/aktiv/".$g->Urut."/Y"); ?>" class="btn white black-text" <?= $disable; ?> >Aktivkan</a>
								<?php
								break;
							case 'Y':
								$this->db->where("XKodeSoal",$g->XKodeSoal);
								$uj=$this->db->get("cbt_ujian");
								$disable2="";
								$disable="";
								if ($uj->num_rows() > 0) {
									foreach ($uj->result() as $uji) {
										if ($uji->XStatusUjian == 1) {
											// print_r($uji);
											$disable2="disabled='disabled'";
										}
									}
								}
								?>
								<a  <?= $disable2; ?> href="<?= base_url("admin/soal/aktiv/".$g->Urut."/N"); ?>" class="btn green white-text">Aktiv</a>
								<?php
								break;
						}
						?>
					</td>
					<?php if ($this->m_config->cfg['XServer']) { ?>
					<td nowrap="nowrap">
				
						<a data-target="modal1" class="btn blue lighten-3 white-text " href="<?= base_url("admin/soal/kopi/".$g->Urut); ?>" >
							<i class="material-icons">content_copy</i>
						</a>
						<a data-target="modal1" class="btn blue white-text " href="<?= base_url("admin/soal/upload_butir/".$g->Urut); ?>" <?= $disable2; ?> >
							<i class="material-icons">cloud_upload</i>
						</a>
						<a data-target="modal1" <?= $disable2; ?> class="btn green white-text " href="<?= base_url("admin/butir_soal/index/".$g->Urut); ?>"  >
							<i class="material-icons">mode_edit</i>
						</a>

					</td>
					<td nowrap="nowrap">
						<a  href="<?= base_url("admin/soal/pdf/".$g->Urut); ?>" class="btn btn-small blue" <?= $disable; ?>><i class="material-icons">print</i></a>
						<a <?= $disable2; ?>  onclick="return confirm('Apakah anda ingin menghapus paket soal ini ?? data yang berkaitan dengan kode pakel soal berikut akan juga dihapus');" href="<?= base_url("admin/soal/proha/".$g->Urut); ?>" class="btn btn-small red"><i class="material-icons">delete_forever</i></a>
					</td>
					<?php } ?>
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