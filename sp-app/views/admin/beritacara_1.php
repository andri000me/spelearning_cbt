<div class="row">
	<div class="col s12 m6">
		<div class="card-panel">
			<div class="card-content">	
				<form target="_blank" action="<?= base_url("admin/cetak/proses_beritacara"); ?>" method="post">
					<div class="input-field">
						<select class='select' name="XKodeUjian">
							<?php
							$this->db->select("*,u.Urut XIdUjian");
							$this->db->from("cbt_ujian u");
							$this->db->join("cbt_tes t","u.XKodeUjian = t.XKodeUjian");
							$this->db->join("cbt_paketsoal p","u.XKodeSoal = p.XKodeSoal");
							$this->db->join("cbt_mapel m","m.XKodeMapel = p.XKodeMapel");
							$this->db->order_by("u.XStatusUjian",'ASC');
							$this->db->order_by("u.XTglUjian",'DESC');
							$ujian=$this->db->get();
							foreach ($ujian->result() as $key => $value) {
								echo "<option value='".$value->XIdUjian."'>".$value->XNamaUjian." | ";
								foreach (json_decode($value->XNamaKelas) as $k) {
									echo $k.', ';
								}
						
								echo "| ".$value->XNamaMapel."</option>";
							}
							?>
						</select>
						<label>Ujian</label>
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