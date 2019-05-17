<form onsubmit="return submit_co()" action="<?= base_url('admin/materi/promateri'); ?>" method="post" enctype="multipart/form-data">
	<div class="card-panel">
		<div class="row">
			<div class="col m6">
				<div class="input-field">
					<input  autocomplete="off" type="text" name="XKd" required="required" value="<?= $u->XKd; ?>">
					<label>Kompetensi Dasar</label>
				</div>
			</div>
			<div class="col m6">
				<div class="input-field">
					<input  autocomplete="off" type="text" name="XJudul" required="required" value="<?= $u->XJudul; ?>">
					<label>Judul Materi Pelajaran</label>
				</div>
			</div>
		</div>
	</div>
	<input  autocomplete="off" type="hidden" name="Urut" value="<?= $u->XIdMateri; ?>">
	<textarea id="test" name="XIsiMateri" style="display: none;"></textarea>
	<div class="card-panel">
		<div id="standalone-container">
		  <div id="toolbar-container">
		    <span class="ql-formats">
		      <select class="browser-default ql-font"></select>
		      <select class="browser-default ql-size"></select>
		    </span>
		    <span class="ql-formats">
		      <button class="ql-bold"></button>
		      <button class="ql-italic"></button>
		      <button class="ql-underline"></button>
		      <button class="ql-strike"></button>
		    </span>
		    <span class="ql-formats">
		      <select class="browser-default ql-color"></select>
		      <select class="browser-default ql-background"></select>
		    </span>
		    <span class="ql-formats">
		      <button class="ql-script" value="sub"></button>
		      <button class="ql-script" value="super"></button>
		    </span>
		    <span class="ql-formats">
		      <button class="ql-header" value="1"></button>
		      <button class="ql-header" value="2"></button>
		      <button class="ql-blockquote"></button>
		      <button class="ql-code-block"></button>
		    </span>
		    <span class="ql-formats">
		      <button class="ql-list" value="ordered"></button>
		      <button class="ql-list" value="bullet"></button>
		      <button class="ql-indent" value="-1"></button>
		      <button class="ql-indent" value="+1"></button>
		    </span>
		    <span class="ql-formats">
		      <button class="ql-direction" value="rtl"></button>
		      <select class="browser-default ql-align"></select>
		    </span>
		    <span class="ql-formats">
		      <button class="ql-link"></button>
		      <button class="ql-image"></button>
		      <button class="ql-video"></button>
		      <button class="ql-formula"></button>
		    </span>
		    <span class="ql-formats">
		      <button class="ql-clean"></button>
		    </span>
		  </div>
		  <div id="editor-container" style="max-height: 400px; overflow: scroll;"><?= $u->XIsiMateri; ?></div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m12">
			<div class="row">
				<div class="col s12 m8">
					<div class="card-panel">
						<!-- <div class="card-content"> -->
							<span>File dilampirkan</span>
							<p>
								<?php
								if (empty($u->XFile) OR empty(json_decode($u->XFile)) OR ($u->XFile == "[]")) {
									?>
									<div class="card-panel blue white-text">Tidak ada file dilampirkan</div>
									<?php
								} else {	
									?>
									<table>
										<thead>
											<tr>
												<th>Nama File</th>
												<th>Type</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach (json_decode($u->XFile) as $key => $value) {
													?>
													<tr>
														<td><?= $value; ?></td>
														<td><?= pathinfo($value,PATHINFO_EXTENSION); ?></td>
														<td><a href="<?= base_url("admin/materi/hapus_att/".$u->XIdMateri."/".$key); ?>" class="btn red btn-floating"><i class="material-icons">delete</i></a>
															<a href="<?= base_url("asset/uploads/att_materi/".$value); ?>" class="btn blue btn-floating"><i class="material-icons">cloud_download</i></a></td>

													</tr>
													<?php	
												}
											?>
										</tbody>
									</table>
									<?php
								}
								?>
							</p>
							<div class="file-field input-field">
								<div class="btn blue btn-small">
									<span><i class="material-icons">add</i></span>
									<input  autocomplete="off" type="file" name="files[]"  multiple="multiple">
								</div>
								<div class="file-path-wrapper">
							        <input  autocomplete="off" class="file-path validate" type="text">
							     </div>
							</div>
						<!-- </div> -->
					</div>

				</div>

				<div class="col s12 m4">
					<div class="card-panel blue white-text">
						<b>Format file yang diperbolehkan :</b> <br>
						<i>gif, jpg, png, mp3, wav, mp4, avi, pdf, xls, xlsx, doc, docx, pdf, ppt, pptx, zip</i>
					</div>
				</div>

			</div>
		</div>
		<div class="col s12 m8">
			<div class="card-panel">
				<div class="row">
					<div class="col s12 m12"><span>Ujian dilampirkan</span></div>
					<?php
					if (empty($u->XUjian) || $u->XUjian == 'null' || $u->XUjian == '') {
						?>
						<div class="col s12 m12">
							<div class="card-panel blue white-text">Tidak ada ujian untuk materi pembelajaran ini</div>
						</div>

						<?php
					} else {
						?>
						<div class="col s12 m12">
							<table>
								<thead>
									<tr>
										<th>#</th>
										<th>Kelas</th>
										<th>Jur.</th>
										<th>Mulai</th>
										<th>Selesai</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$this->db->select("*,u.Urut as XIdUjian");
								$this->db->from("cbt_ujian u");
								$this->db->join("cbt_paketsoal ps",'u.XKodeSoal = ps.XKodeSoal');
								$this->db->where_in("u.Urut",json_decode($u->XUjian));
								// $this->db->where("XKodeMapel",$u->XKodeMapel);
								// $this->db->where("XKodeJurusan",$u->XKodeJurusan);
								// $this->db->where("XKodeKelas",$u->XKodeKelas);
								foreach ($this->db->get()->result() as $uj) {
									foreach ($uj as $key => $value) {
										if (empty($value)) {
											$uj->$key="Semua";
										}
									}
									?>
									<tr>
										<td><?= $uj->XKodeUjian; ?></td>
										<td><?= $uj->XKodeKelas; ?></td>
										<td><?= $uj->XKodeJurusan; ?></td>
										<td><?= $uj->XTglUjian; ?></td>
										<td><?= $uj->XBatasMasuk; ?></td>
									</tr>
									<script type="text/javascript">
										$(document).ready(function() {
											$("#XUjian option[value='<?= $uj->XIdUjian; ?>']").attr('selected', 'selected');
										});
									</script>
									<?php
								}
								?>
								</tbody>
							</table>
						</div>
						<?php
					}
					?>

					<div class="col s12 m12">
						<br/>
						<div class="input-field">
							<select class="select" id="XUjian" name="XUjian[]" multiple="multiple">
								<?php
								$this->db->select("*,u.Urut as XIdUjian");
								$this->db->from("cbt_ujian u");
								$this->db->join("cbt_paketsoal ps",'u.XKodeSoal = ps.XKodeSoal');
								$this->db->where("XKodeMapel",$u->XKodeMapel);
								$this->db->where("XKodeJurusan",$u->XKodeJurusan);
								$this->db->where("XKodeKelas",$u->XKodeKelas);
								foreach ($this->db->get()->result() as $uj) {
									foreach ($uj as $key => $value) {
										if (empty($value)) {
											$uj->$key="Semua";
										}
									}
									?>
									<option value="<?= $uj->XIdUjian; ?>"><?= $uj->XKodeUjian; ?> |, <?= $uj->XKodeKelas; ?> - <?= $uj->XKodeJurusan; ?> |, <?= $uj->XTglUjian; ?> s/d <?= $uj->XBatasMasuk; ?></option>
									<?php
								}
								?>
							</select>
							<label>Pilih Ujian</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="card-panel" id="submit">
		<?= $this->m_config->pesan(); ?>
		<button  type="submit" class="btn green">Simpan Materi Pelajaran</button>
		<div class="fixed-action-btn" style="top: 10%; bottom: auto">
			<button  type="submit" class="btn btn-floating green btn-large"><i class="material-icons">save</i></button>
		</div>
		<a href="<?= base_url("admin/materi"); ?>" class="btn red">Kembali</a>
	</div>
</form>
	<div class="card-panel blue white-text">

		<ul>
			<li><b>(*) </b> Kopi materi yang terdapat di dokumen word jika anda menggunakan word untuk menulis sebelumnya dan pastekan di sini</li>
			<li><b>(*)</b> Jika ingin mengupload video gunakan format sesuai ketentuan dibawah dan upload melalui fitur halaman <i><b>UPLOAD FILE MATERI</b></i></li>
			<li><hr></li>
			<li>
				<i>Fomat penulisan file : </i>
				<table>
					<tr>
						<td>Gambar/ Foto</td>
						<td>:</td>
						<td><code><b>[gambar]<i>Nama_fIle.jpg</i>[/gambar]</b></code></td>
					</tr>
					<tr>
						<td>Video </td>
						<td>:</td>
						<td><code><b>[video]<i>Nama_fIle.mp4</i>[/video]</b></code></td>
					</tr>
					<tr>
						<td>Musik/ Audio</td>
						<td>:</td>
						<td><code><b>[audio]<i>Nama_fIle.mp3</i>[/audio]</b></code></td>
					</tr>
				</table>

			</li>
		</ul>
	</div>

<script>
  var quill = new Quill('#editor-container', {
    modules: {
      formula: true,
      syntax: true,
      toolbar: '#toolbar-container'
    },
    placeholder: 'Tulis Sesuatu Disini .... / Paste dari Dokumen Word',
    theme: 'snow'
  });
  function submit_co(){
  	$("#test").val($(".ql-editor").html());
  	// return false;
  }
</script>

