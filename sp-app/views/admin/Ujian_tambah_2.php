<form method="post" action="<?= base_url('admin/ujian/protam'); ?>">
	<div class="row">
		<div class="col s12 m12">
			<div class="card">
				<div class="card-content">
					<span class="card-title">
						Informasi Bank Soal
					</span>
					<p>
						<div class="row">
							<div class="col s12 m4">
								<div class="input-field">
									<input  autocomplete="off" readonly="readonly" type="text" name="XKodeSoal" value="<?= $u->XKodeSoal; ?>">
									<label>Kode Bank Soal</label>
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
									<select class='select' name="XKodeUjian">
										<?php
										foreach ($this->db->get('cbt_tes')->result() as $v) {
											?>
											<option value="<?= $v->XKodeUjian; ?>"><?= $v->XNamaUjian; ?></option>
											<?php
										}
										?>
									</select>
									<label>Jenis Ujian</label>
								</div>
								<div class="input-field">
									<select class='select' name="XSemester">
										<option value="1">Gasal</option>
										<option value="2">Genap</option>
									</select>
									<label>Semester</label>
								</div>
								<div class="input-field" style="display: none;">
									<select class='select' name="XSesi">
										<option value="">Semua</option>
										<?php
										for ($i=1; $i < 6; $i++) { 
											echo "<option>".$i."</option>";
										}?>
									</select>
									<label>Sesi Ujian</label>
								</div>
								<div class="input-field">
									<input  autocomplete="off" type="text" name="XTglUjian" class="datetimepicker" required="required" value="<?= date("Y/m/d H:i"); ?>">
									<label> Waktu Mulai Ujian</label>
								</div>
								<div class="input-field">
									<input  autocomplete="off" type="text" class="datetimepicker" name="XBatasMasuk" required="required">
									<label> Waktu Selesai Ujian</label>
								</div>
								<div class="input-field">
									<input  autocomplete="off" type="number" min="0" max="10000" name="XLamaUjian" required="required">
									<label>Durasi Tes (Menit)</label>
								</div>
							</div>
							<div class="col s12 m4">
								<div class="input-field" style="display: none;">
									<select class='select' name="XPdf" required="required">
										<option value="0">Bukan PDF</option>
										<option value="1">Soal PDF</option>
									</select>
									<label>Soal PDF <span  class="red-text">(*)</span></label>
								</div>
								<div class="input-field" style="display: none;" id="XFilePdf">
									<input  autocomplete="off" type="text" name="XFilePdf">
									<label>Nama File PDF</label>
								</div>
								<div class="input-field">
									<select class='select' name="XListening">
										<option value='1'>Sekali</option>
										<option value='2'>Dua Kali</option>
										<option value='3'>terusan</option>
									</select>
									<label>Pemutaran Listening</label>
								</div>
								<div class="input-field">
									<select class='select' name="XTampil">
										<option value='1'>NILAI Ditampilkan</option>
										<option value='0'>NILAI Tidak Ditampilkan </option> 
									</select>
									<label>Nilai</label>
								</div>
								<div class="input-field">
									<select class='select' name="XStatusToken">
										<option value='0'>TOKEN Tidak Ditampilkan </option>
										<option value='1'>TOKEN Ditampilkan</option>
									</select>
									<label>Status Token</label>
								</div>
								<fieldset>
									<legend>Token Ujian</legend>
									<input  autocomplete="off" style="color: red;font-size: 25px;text-align: center;" type="text" name="XTokenUjian" readonly="readonly" required="required" value="<?= $this->m_config->get_token(); ?>">
								</fieldset>
								<small class="red-text">(*) Jangan Rilis token kembali jika saat mengedit ujian</small>
							</div>
						</div>
						<div class="input-field">
							<!-- <button class="btn blue" type="button" onclick="rilis_token()" ><i class="material-icons left">refresh</i> RILIS TOKEN</button> -->
							<button type="submit" class="btn green"><i class="material-icons left">save</i> Simpan Ujian</button>
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
						<li> - Pada Mode Soal PDF form template soal hanya perlu isi kunci jawaban, soal dan jawaban tidak boleh diacak</li>
						<li> - Penggunaan Soal PDF belum didukung untuk Android dan masih terbatas untuk desktop/laptop saja.</li>
						<li> - File PDF harus diupload ke folder "file-pdf", - Hindari penggunaan nama yang panjang dan SPASI</li>
						<li> - Pastikan pada Komputer Klien telah diinstall PDF Reader.</li>
						<li> - Dinyatakan terlambat bila login dilakukan setelah waktu Ujian ditutup</li>
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
		$("[name='XLamaUjian']").click(function(event) {
			$("button[onclick='rilis_token()']").removeAttr('disabled');
		});
	});	
	function rilis_token(){
		$.get('<?= base_url("admin/ujian/get_token"); ?>', function(data) {
			if (data[0] == 1) {
				$("[name='XTokenUjian']").val(data[1]);
				$("[type='submit']").removeAttr('disabled');
			}
		},"json");
	}

</script>