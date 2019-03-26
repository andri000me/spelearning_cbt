<?= $this->m_config->pesan(); ?>
<div class="clearfix">
	<a class="btn blue right" href="<?= base_url("admin/butir_soal/index/".$soal['XIdPaket']); ?>">Kembali</a>
</div>
<form enctype="multipart/form-data" method="post" action="<?= base_url("admin/butir_soal/proses/edit/".$soal['XIdSoal']); ?>">
	<div class="card-panel">
		<div class="row">
			<div class="col m1">
				<span>No. <span class="blue darken-2 white-text" style="padding:10px"><?= $soal['XNomerSoal']; ?></span></span>
			</div>
			<div class="col m5">
				<div class="input-field">
					<input type="text" name="" value="<?= $soal['XKodeSoal']; ?>" readonly='readonly'>
					<label>Kode Soal</label>
				</div>
			</div>
			<div class="col m5">
				<div class="input-field">
					<input type="text" name="" value="<?= $soal['XNamaMapel']; ?>" readonly='readonly'>
					<label>Mapel</label>
				</div>
			</div>
		</div>

		<!-- <label>Soal</label> -->
		<textarea name="XTanya" class="froala"><?= $soal['XTanya']; ?></textarea>
		<br>
		<div class="row">
			<div class="col m4">
				<?php
				if (!empty($soal['XGambarTanya'])) {
						echo "<img src='".base_url("asset/uploads/cbt/gambar/".$soal['XGambarTanya'])."' style='max-width:200px' alt='mengandung gambar ".$soal['XGambarTanya']."'><br/>";
				}
				?>

				<div class="file-field input-field">
			      <div class="btn">
			        <span><i class="material-icons">image</i></span>
			        <input type="file" name="XGambarTanya">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col m4">
				<?php
				if (!empty($soal['XVideoTanya'])) {
						echo "<video class=\"responsive-video\" controls><source src='".base_url("asset/uploads/cbt/video/".$soal['XVideoTanya'])."'></video><br/>";
				}
				?>
				<div class="file-field input-field">
			      <div class="btn">
			        <span><i class="material-icons">movie</i></span>
			        <input type="file" name="XVideoTanya">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
			<div class="col m4">
				<?php
				if (!empty($soal['XAudioTanya'])) {
						echo "<audio class=\"responsive-video\" controls><source src='".base_url("asset/uploads/cbt/audio/".$soal['XAudioTanya'])."'></audio><br/>";
				}
				?>
				<div class="file-field input-field">
			      <div class="btn">
			        <span><i class="material-icons">audiotrack</i></span>
			        <input type="file" name="XAudioTanya">
			      </div>
			      <div class="file-path-wrapper">
			        <input class="file-path validate" type="text">
			      </div>
			    </div>
			</div>
		</div>
	</div>
	<?php
	// print_r($soal/);
	for ($i=1; $i <= $soal['XJumPilihan'] ; $i++) { 
		?>
		<div class="card-panel">
			<div class="row">
				<div class="col m1">
					<?php
					$abc=range("A", "F");
					?>
					<span class="blue darken-2 white-text" style="padding:10px"><?= $abc[$i-1]; ?></span>
				</div>
				<div class="col m3">
					<div class="">
						<label>
							<input type="radio" required="required" name="XKunciJawaban" value="<?= $i ;?>"  class="with-gap">
							<span>Kunci Jawaban</span>
						</label>
					</div>
					<br/>
					<?php
					if (!empty($soal['XGambarJawab'.$i])) {
							echo "<img src='".base_url("asset/uploads/cbt/gambar/".$soal['XGambarJawab'.$i])."' style='max-width:200px' alt='mengandung gambar ".$soal['XGambarJawab'.$i]."'><br/>";
					}
					?>
					<div class="file-field input-field">
				      <div class="btn">
				        <span><i class="material-icons">image</i></span>
				        <input type="file" name="XGambarJawab<?= $i; ?>">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>		
				</div>
				<div class="col m7">
					<textarea class="froala" name="XJawab<?= $i; ?>"><?= $soal['XJawab'.$i]; ?></textarea>
				</div>
			</div>
		</div>

		<?php
	}
	?>
	<div class="card-panel" id="submit">
		<?= $this->m_config->pesan(); ?>
		<button  type="submit" class="btn green">Simpan Soal</button>
		<div class="fixed-action-btn" style="top: 10%; bottom: auto">
			<button  type="submit" class="btn btn-floating green btn-large"><i class="material-icons">save</i></button>
		</div>
		<a href="<?= base_url("admin/materi"); ?>" class="btn red">Kembali</a>
	</div>

</form>
<script type="text/javascript">
	$(document).ready(function() {
		$("[name='XKunciJawaban'][value='<?= $soal['XKunciJawaban']; ?>']").attr('checked', 'checked');;
	});
</script>