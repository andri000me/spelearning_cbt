<form method="post" action="<?= base_url('admin/Pelajaran/protam'); ?>">
	<div class="row">
		<div class="col s12 m12">
			<div class="card">
				<div class="card-content">
					<span class="card-title">
						Informasi Bank Materi
					</span>
					<p>
						<div class="row">
							<div class="col s12 m4">
								<div class="input-field">
									<input  autocomplete="off" readonly="readonly" type="text" name="XKodeMateri" value="<?= $u->XKodeMateri; ?>">
									<label>Kode Bank Materi</label>
								</div>
							</div>
							<div class="col s12 m4">
								<div class="input-field">
									<input  autocomplete="off" readonly="readonly" type="text" name="" value="<?= $u->XNamaMapel; ?>">
									<label>Mapel</label>
								</div>
							</div>
						</div>
					</p>
				</div>
			</div>
			<div class="card">
				<div class="card-content">
					<span class="card-title">
						<div class="row">
							<div class="col s12 m4">
								<div class="input-field">
									<input  autocomplete="off" type="text" name="XWaktuMulai" class="datetimepicker" required="required" value="<?= date("Y/m/d H:i"); ?>">
									<label> Waktu Mulai Pelajaran</label>
								</div>
								<div class="input-field">
									<input  autocomplete="off" type="text" class="datetimepicker" name="XWaktuAkhir" required="required">
									<label> Waktu Selesai Pelajaran</label>
								</div>
								<div class="input-field">
									<select class="select" name="XTanya" required="required">
										<option value="0">Tidak</option>
										<option value="1">Boleh</option>
									</select>
									<label> Perbolehkan Siswa Bertanya</label>
								</div>

								<div class="input-field">
									<select class='select' name="XStatusToken">
										<option value='0'>TOKEN Tidak Ditampilkan </option>
										<option value='1'>TOKEN Ditampilkan</option>
									</select>
									<label>Status Token</label>
								</div>
							</div>
							<div class="col s12 m4">
								<fieldset>
									<legend>Token Pelajaran</legend>
									<input  autocomplete="off" style="color: red;font-size: 25px;text-align: center;" type="text" name="XTokenPelajaran" readonly="readonly" required="required" value="<?= $this->m_config->get_token(); ?>">
								</fieldset>
								<small class="red-text">(*) Jangan Rilis token kembali jika saat mengedit Pelajaran</small>
							</div>
						</div>
						<div class="input-field">
							<!-- <button class="btn blue" type="button" onclick="rilis_token()" ><i class="material-icons left">refresh</i> RILIS TOKEN</button> -->
							<button type="submit" class="btn green"><i class="material-icons left">save</i> Simpan Pelajaran</button>
						</div>
					</span>
				</div>
			</div>
		</div>
		<div class="col s12 m12">
			<div class="card">
				<div class="card-content">
					<span class="red-text">* PERHATIAN</span>
					<ul>
						<li> - Pada Mode Materi PDF form template Materi hanya perlu isi kunci jawaban, Materi dan jawaban tidak boleh diacak</li>
						<li> - Penggunaan Materi PDF belum didukung untuk Android dan masih terbatas untuk desktop/laptop saja.</li>
						<li> - File PDF harus diupload ke folder "file-pdf", - Hindari penggunaan nama yang panjang dan SPASI</li>
						<li> - Pastikan pada Komputer Klien telah diinstall PDF Reader.</li>
						<li> - Dinyatakan terlambat bila login dilakukan setelah waktu Pelajaran ditutup</li>
					</ul>

				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function() {
		$('.datetimepicker').datetimepicker();
		$('[name="XPdf"]').change(function(event) {
			if ($(this).val() == 1) {
				$("#XFilePdf").show();
			} else {
				$("#XFilePdf").hide();
			}
		});
		$("[name='XLamaPelajaran']").click(function(event) {
			$("button[onclick='rilis_token()']").removeAttr('disabled');
		});
	});	
	function rilis_token(){
		$.get('<?= base_url("admin/Pelajaran/get_token"); ?>', function(data) {
			if (data[0] == 1) {
				$("[name='XTokenPelajaran']").val(data[1]);
				$("[type='submit']").removeAttr('disabled');
			}
		},"json");
	}

</script>