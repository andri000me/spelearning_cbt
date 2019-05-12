<center>
	<div class="page">
		<div class="row">
						<?php
		$i=1;
		$sudah=$batas=6;
		foreach ($siswa as $a) {
			if (empty($a['XFoto']) || $a['XFoto'] == Null || $a['XFoto'] == "") {
				$a['XFoto']="nouser.png";
			}
			?>
			<div class="col s12 m6">
				<table style="width:9cm;border:1px solid black;" class="kartu">
					<tbody>
					<tr>
						<td colspan="3" style="border-bottom:1px solid black">
							<table width="100%" style="background:" class="kartu">
								<tbody>
								<tr>
									<td><img src="<?= base_url("asset/img/tut.png"); ?>" height="40"></td>
									<td align="center" style="font-weight:bold">
										<font color="#" >KARTU PESERTA <br> UJIAN BERBASIS KOMPUTER<br>
											<?= strtoupper($tes->XNamaUjian) ?><br/>
											<?= $this->m_config->cfg['XSekolah']; ?></br>
										</font> <?= $this->m_config->get_tahun_ajaran(); ?></br>
									</td>
									<td><img src="<?= base_url("asset/uploads/".$this->m_config->cfg['XLogo']); ?>" height="40"></td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr><td width="115">&nbsp;Nama Peserta</td><td width="1">:</td><td><?php echo "$a[XNamaSiswa] "; ?></td></tr>
					<tr><td>&nbsp;Kelas</td><td>:</td><td><?php echo $a["XNamaKelas"]; ?></td></tr>
					<tr><td>&nbsp;Username</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo "$a[XNomerUjian]"; ?></td></tr>
					<tr><td>&nbsp;Password</td><td>:</td><td style="font-size:12px;font-weight:bold;"><?php echo $a['XPassword']; ?></td></tr>
					<tr><td>&nbsp;Jurusan</td><td>:</td><td><?php echo "$a[XKodeJurusan] "; ?></td></tr>
					<!-- <tr><td>&nbsp;Sesi - Ruang</td><td>:</td><td><?php echo "$a[XSesi] - $a[XRuang]"; ?></td></tr> -->
					<tr><td rowspan="3" align="center"><img src="<?= base_url("asset/uploads/foto_siswa/".$a['XFoto']); ?>" height="65px" border="thin solid red"></td>
					<td colspan="2" valign="top" align="center">Kepala<br><?= $this->m_config->cfg['XSekolah']; ?></td></tr>
					<td style="font-size:12px;font-weight:bold;" colspan="2" align="center">Ttd ,</td>
					<tr><td colspan="2" align="center"><?= $this->m_config->cfg['XKepSek'] ?></td></tr>
					</tbody>
				</table>
			</div>
			<?php
			if ($i==$sudah) {
				$sudah+=$batas;
				echo "</div><small>Copyright &copy; ".date("Y | ").$this->m_config->cfg['XSekolah']."</small></div><div class='page'><div class='row'>";
			}
			$i++;
		}
		?>
		</div>
	</div>
</center>
