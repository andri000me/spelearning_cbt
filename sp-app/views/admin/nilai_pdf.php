<link href="<?= base_url('sp-plugin/materialize/css'); ?>/materialize.css" type="text/css" rel="stylesheet">

<body class="page">
	<div>
		<h3 align="center" style="font-size: 20px;" class="no-padding no-margin">DATA NILAI</h3>
		<table class="no-padding no-margin">
			<tr>
				<td style="width: 30%; vertical-align: top;">
					<img src="<?= base_url("asset/uploads/".$GLOBALS['sp']['XLogo']); ?>" style="width: 100%">
				</td>
				<td style="vertical-align: top;">
					<table class="kop-table">
						<tr class="no-padding">
							<td class="no-padding">Mata Pelajaran | Kode Soal</td>
							<td class="no-padding">: <?= $ujian->XNamaMapel; ?> | <?= $ujian->XKodeSoal; ?></td>
						</tr>
						<tr class="no-padding">
							<td class="no-padding">Nilai KKM</td>
							<td class="no-padding green-text">: <?= $ujian->XKKM; ?></td>
						</tr>
						<tr class="no-padding">
							<td class="no-padding">Kelas | Rombel</td>
							<td class="no-padding">: <?= $ujian->XKodeKelas; ?> | <?= $ujian->XKodeJurusan; ?></td>
						</tr>
						<tr class="no-padding">
							<td class="no-padding">Pembuat Soal</td>
							<td class="no-padding">: <?= $ujian->XGuru; ?></td>
						</tr>
						<tr>
							<td class="no-padding">Tanggal Ujian</td>
							<td class="no-padding">: <?= date("d M Y",strtotime($ujian->XTglUjian)) ?></td>
						</tr>
						<tr>
							<td class="no-padding">Satuan Pendidikan</td>
							<td class="no-padding">: <?= $GLOBALS['sp']['XSekolah']; ?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<hr>
		<table class="table striped">
			<thead>
				<tr>
					<td align="center">No.</td>
					<td>No. Ujian</td>
					<td>Nama</td>
					<td>Kelas</td>
					<td>Nilai</td>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=1;
				foreach ($siswa as $n) {

					$this->db->select("*");
					$this->db->from("cbt_siswa s");
					$this->db->join("cbt_nilai n","n.XNomerUjian = s.XNomerUjian");
					$this->db->join("cbt_siswa_ujian u","u.XIdUjian = n.XIdUjian AND u.XNomerUjian = n.XNomerUjian AND n.XTokenUjian = u.XTokenUjian");
					$this->db->where("s.XNomerUjian",$n->XNomerUjian);
					$this->db->where("u.XIdUjian",$ujian->XIdUjian);


					$data=$this->db->get();
					if ($data->num_rows() < 1) {
						$XTotalNilai=0;
					} else {
						$data=$data->row();
						$XTotalNilai=$data->XTotalNilai;
					}
					if ($ujian->XKKM < $XTotalNilai) {
						$s="green";
					} elseif ($ujian->XKKM == $XTotalNilai) {
						$s="blue";
					} else {
						$s="red";
					}
					?>
					<tr>
						<td align="center"><?= $i++; ?>.</td>
						<td><?= $n->XNomerUjian; ?></td>
						<td><?= $n->XNamaSiswa; ?></td>
						<td><?= $n->XNamaKelas; ?></td>
						<td class="<?=$s; ?>-text"><?= $XTotalNilai; ?></td>
					</tr>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
</body>