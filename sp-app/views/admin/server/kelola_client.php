<div class="row">
	<div class="col s12 m8">
		<div class="card">
			<div class="card-content blue white-text">
				Selamat Datang di Halaman Server Aplikasi, jika anda melihat halaman ini berarti aplikasi yang kamu gunakan berada di mode <b>SERVER</b>,
				<br>
				Gunakan Halaman ini untuk mengatur jadwal sinkronasi antara aplikasi klient.
			</div>
			<div class="card-action">
				<?= form_open(base_url("admin/server/setid"), ''); ?>
					<div>
						<label>Alamat Server</label>
						<input  autocomplete="off" type="text" class="red-text" readonly="readonly" name="XHostServer" value="<?= base_url(); ?>">
					</div>
					<div>
						<label>Id Aplikasi</label>
						<input  autocomplete="off" required="required" type="text" name="XIdServer" value="<?= $this->m_config->cfg['XIdServer']; ?>">
					</div>
					<div>
						<button class="btn green"><i class="material-icons left">check</i> SIMPAN PERUBAHAN</button>
					</div>
				</form>
			</div>
		</div>
		<?= $this->m_config->pesan(); ?>
	</div>
	<div class="col s12 m12">
		<div class="card">
			<div class="card-action">
				<a href="<?= base_url("admin/server/tambah"); ?>" class="btn green"><i class="material-icons left">add</i> Tambah Client</a>
			</div>
			<div class="card-content">
				<table class="table">
					<thead>
						<tr>
							<th>
								Nama
							</th>
							<th>
								Id Aplikasi
							</th>
							<th>
								Telahir Sync
							</th>
							<th>
								Status
							</th>
							<th>
								Aksi
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($client->result() as $key => $v) {
							?>
							<tr>
								<td><?= $v->XNama; ?></td>
								<td><?= $v->XIdServer; ?></td>
								<td>
									<?php
									if ($v->LastSync == 0) {
										echo "Belum Pernah Sinkronasi";
									} else {
										echo(tgl_bilang($v->LastSync));
									}
									?>
								</td>
								<td>
									<?php
									if ($v->XStatus) {
										?>
										<a href="<?= base_url("admin/server/set/".$v->Urut."/0"); ?>" class="btn green">Aktiv</a>
										<?php
									} else {
										?>
										<a href="<?= base_url("admin/server/set/".$v->Urut."/1"); ?>" class="btn white black-text">Aktivkan</a>
										<?php
									} ?>
								</td>
								<td>
									<a href="<?= base_url("admin/server/edit/".$v->Urut); ?>" class="btn blue"><i class="material-icons">edit</i></a>
									<a onclick="return confirm('Apakah anda yakin akan menghapus data ini ??')" href="<?= base_url("admin/server/hapus/".$v->Urut); ?>" class="btn red"><i class="material-icons">delete</i></a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
