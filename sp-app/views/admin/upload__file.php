<div class="row">
	<div class="col s12 m8">
		<div class="card">
			<div class="card-content">
				<span class="card-title">
					Upload <?= $this->judul; ?>
					<div class="pull right">
						<a href="<?= base_url("admin/".$this->judul); ?>" class="btn blue"><i class="material-icons left">arrow_back</i> Kembali</a>
					</div>
				</span>
					<div class="card-panel red lighten-3 padding-1 white-text">
						<ul>
							<li> - Pastikan File PHP.ini sudah di Set (upload_max_filesize=3000M, post_max_size = 3000M) !!!! </li>
							<li>- Pergunakan huruf dan angkat (A-Z, a-z, 0-9) untuk Nama File</li>
							<li>- Tidak boleh memakai Spasi</li>
						</ul>
					</div>

				<p>
					Upload <?= $this->judul; ?> adalah proses pengcopyan file-file pendukung ke dalam Server, proses ini berpengaruh pada sinkronsisasi server sekolah ke server pusat. Data file pendukung akan terbentuk hanya bila pengcopyan file ke folder melalui proses Uploading. <hr>File-file pendukung akan dicopy ke dalam folder-folder pendukung, Extensi File yang suport adalah: 
					<table class="table">
						<tr class=" no-padding">
							<td class=" no-padding">mp3,wav</td>
							<td class=" no-padding">=>: Ke folder asset/uploads/audio</td>
						</tr>
						<tr class=" no-padding">
							<td class=" no-padding">mp4, avi</td>
							<td class=" no-padding">=>: Ke folder asset/uploads/video</td>
						</tr>
						<tr class=" no-padding">
							<td class=" no-padding">jpg, png, gif</td>
							<td class=" no-padding">=>: Ke folder asset/uploads/gambar</td>
						</tr>
						<tr>
							<td class=" no-padding">docx,xlsx,zip,pptx,pdf</td>
							<td class=" no-padding">=>: Ke folder asset/uploads/dok</td>
						</tr>
					</table>
				</p>
			</div>
		</div>
		<div class="card">
			<div class="card-content">
				<span class="card-title">Upload <?= $this->judul; ?></span>
				<p>
					<?php
					if (!isset($Urut)) {
						$Urut="";
					}?>
					<form enctype="multipart/form-data" method="post" action="<?= base_url("admin/".$this->judul."/proupload/".$Urut); ?>">
						<div class="file-field input-field">
							<div class="btn blue btn-small">
								<span><i class="material-icons">add</i></span>
								<input  autocomplete="off" type="file" name="files[]" required="required" multiple="multiple">
							</div>
							<div class="file-path-wrapper">
						        <input  autocomplete="off" class="file-path validate" type="text">
						     </div>
						</div>
						<div>
							<button type="submit" name="submit" value="submit" class="btn green"><i class="material-icons left">cloud_upload</i> Upload Sekarang</button>
						</div>
					</form>
				</p>
			</div>
		</div>
	</div>
	<div class="col s12 m4">
		<div style="max-height: 700px;overflow: scroll;">
			<?= $this->m_config->pesan(); ?>
		</div>
	</div>
</div>