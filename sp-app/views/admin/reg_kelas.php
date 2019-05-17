<div class="card">
	<div class="card-content">
		<div class="card-title">
			Pilih Kelas yang ditampung
		</div>
		<form action="<?= base_url("admin/kelas/simpan_kelas_guru/home"); ?> " method="post">
			<div class="row">
				<?php
				$this->db->select("XKodeKelas");
				$this->db->order_by("XKodeKelas","ASC");
				$this->db->group_by("XKodeKelas","ASC");
				foreach ($this->db->get("cbt_kelas")->result() as $k) {
					?>
					<div class="col s6 m4">
						<h5><?= $k->XKodeKelas; ?></h5>
						<ul class="collection">
							<?php
							$this->db->where("XKodeKelas",$k->XKodeKelas);
							$this->db->order_by("XNamaKelas","ASC");
							foreach ($this->db->get("cbt_kelas")->result() as $kk) {
								?>
								<li class="collection-item">
									<label>
										<input  autocomplete="off" type="checkbox" name="kelas[]" value="<?= $kk->XNamaKelas; ?>">
										<span>
											<?= $kk->XNamaKelas; ?>
										</span>
									</label>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
					<?php
				}
				?>
			</div>		
			<div class="card-actions">
				<button  type="submit" class="btn green">Simpan Kelas</button>
				<div class="fixed-action-btn" style="top: 10%; bottom: auto">
					<button  type="submit" class="btn btn-floating green btn-large"><i class="material-icons">save</i></button>
				</div>
			</div>
		</form>
	</div>
</div>