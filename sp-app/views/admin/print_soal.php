<body class="page">
	<div class="">
		<h3 align="center">DATA BANK SOAL</h3>
		<table>
			<tr>
				<td>
					<img src="<?= base_url("asset/uploads/".$this->m_config->cfg['XLogo']); ?>" style="max-width: 80px">
				</td>
				<td>
					<table>
						<tr>
							<td>Mata Pelajaran | Kode Soal</td>
							<td>: <?= $p->XNamaMapel; ?> | <?= $p->XKodeSoal; ?></td>
						</tr>
						<tr>
							<td>Kelas | Rombel</td>
							<td>: <?= $p->XKodeKelas; ?> | <?= $p->XKodeJurusan; ?></td>
						</tr>
						<tr>
							<td>Pembuat Soal</td>
							<td>: <?= $p->XGuru; ?></td>
						</tr>
						<tr>
							<td>Tanggal Pembuatan</td>
							<td>: <?= date("d M Y",strtotime($p->XTglBuat)) ?></td>
						</tr>
						<tr>
							<td>Satuan Pendidikan</td>
							<td>: <?= $this->m_config->cfg['XSekolah']; ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<hr>
		<?php foreach ($s as $v): ?>
			<table>
				<tr>
					<td width="10px">
						<?= $v->XNomerSoal;?>.	
					</td>
					<td>
						<?php
						// print_r($v->XGambarTanya);
						if (!empty($v->XGambarTanya)) {
							echo "<img src='".base_url("asset/uploads/cbt/gambar/".$v->XGambarTanya)."' style='max-width:200px' alt='mengandung gambar ".$v->XGambarTanya."'><br/>";
						}
						if (!empty($v->XVideoTanya)) {
							echo "<i>Menganudung video ".$v->XVideoTanya."</i> <br/>";
						}
						if (!empty($v->XAudioTanya)) {
							echo "<i>Menganudung Audio ".$v->XAudioTanya."</i><br/>";
						}
						?>
						<?= $v->XTanya; ?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<ol style="list-style-type: upper-alpha;">
							<?php
							for ($i=1; $i <= $p->XJumPilihan ; $i++) { 
								?>
								<li>
									<?php
									$a=(array) $v;
									if (!empty($a['XGambarJawab'.$i])) {
										echo "<img src='".base_url("asset/uploads/cbt/gambar/".$a['XGambarJawab'.$i])."' style='max-width:200px'>";
									}
									?>
									<?php eval("echo \$v->XJawab".$i.';'); ?>
									<?php
									if ($v->XKunciJawaban == $i) {
										echo "<img src='".base_url("asset/img/benar.png")."' style='width:20px'>";
								}?>
								</li>
								<?php
							}
							?>
						</ol>
					</td>
				</tr>
			</table>
		<?php endforeach ?>
	</div>


</body>