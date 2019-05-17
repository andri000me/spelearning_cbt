<div class="row">
	<div class="col s12 m8">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Download File Excel (Template Data <?= $this->judul; ?>)</span>
				<p>Silahkan Klik <span class="green-text">Download</span>, untuk download file excel database <?= $this->judul; ?>.<br/> <b class="red-text">Jangan ada inputan apapun setelah nomer terakhir Karena akan dibaca dan diacak oleh sistem. </b> <hr>Setelah selesai edit, Upload kembali untuk ditransfer ke database melalui tool dibawah ini.</p>
			</div>
			<div class="card-action">
				<a target="_balnk" href="<?= base_url("asset/templat/sp_".$this->judul.".xlsx"); ?>" class="btn green"> Download</a>
				<a href="<?= base_url("admin/".$this->judul); ?>" class="btn blue"> Daftar <?= $this->judul; ?></a>
			</div>
		</div>
		<div class="card">
			<div class="card-content">
				<span class="card-title">Upload Template Excel (Data <?= $this->judul; ?>)</span>
				<p>
					<?php
					if (!isset($Urut)) {
						$Urut="";
					}?>
					<form enctype="multipart/form-data" method="post" action="<?= base_url("admin/".$this->judul."/proupload/".$Urut); ?>">
						<div class="file-field input-field">
							<div class="btn blue btn-small">
								<span>File Excel</span>
								<input  autocomplete="off" type="file" name="file" required="required">
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