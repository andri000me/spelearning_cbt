<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">	
				<form target="_blank" action="<?= base_url("admin/cetak/proses_daftar_hadir_pela"); ?>" method="post">
					<div class="input-field">
						<select class='select' name="XIdPelajaran">
							<?php
							$this->db->select("*,u.Urut XIdPelajaran");
							$this->db->from("cbt_pelajaran u");
							$this->db->join("cbt_paketmateri p","u.XKodeMateri = p.XKodeMateri");
							$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
							$this->db->join("cbt_user guru","u.XGuru = guru.Username");
							$ujian=$this->db->get();
							foreach ($ujian->result() as $key => $value) {
								echo "<option value='".$value->XIdPelajaran."'>".$value->XJudul." | ";
								foreach (json_decode($value->XNamaKelas) as $k) {
									echo $k.', ';
								}
						
								echo "| ".$value->XNamaMapel."</option>";
							}
							?>
						</select>
						<label>Pelajaran</label>
					</div>

					<div class="row">
						<div class="col s12 m12">
							<div class="input-field" style="display: none;">
								<select class='select' name="XRuang">
									<?php
									$this->db->select("XRuang");
									$this->db->group_by('XRuang');
									$this->db->order_by('XRuang','ASC');
									foreach ($this->db->get('cbt_siswa')->result() as $key => $value) {
										echo "<option>".$value->XRuang."</option>";
									}
									?>
								</select>
								<label>Ruang</label>
							</div>
						</div>
					</div>
					<div class="input-field">
						<button type="submit" class="btn green"><i class="material-icons left">print</i> Print Sekarang</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.tgl').datetimepicker({
			timepicker:false,
			format:'Y-m-d',
		});
		$('.waktu').datetimepicker({
			datepicker:false,
			format:'H:i',
		});
	});
</script>