<?php
//Our DD-MM-YYYY date string.
// if (empty($info['XKodeJurusan'])) {
// 	$XKodeJurusan='Semua';
// } else {
// 	$XKodeJurusan=$info['XKodeJurusan'];
// }
// if (empty($info['XKodeKelas'])) {
// 	$XKodeKelas='Semua';
// } else {
// 	$XKodeKelas=$info['XKodeKelas'];
// }

$batas=50;

// $this->db->where('XRuang',$ruang);
// if (!empty($info['XSesi'])) {
// 	$this->db->where('XSesi',$info['XSesi']);
// }
// if (!empty($info['XKodeJurusan'])) {
// 	$this->db->where("XKodeJurusan",$info['XKodeJurusan']);
// }
// if (!empty($info['XKodeKelas'])) {
// 	$this->db->where("XKodeKelas",$info['XKodeKelas']);
// }

foreach (json_decode($info['XNamaKelas']) as $kelas) {
					
	$this->db->where("XNamaKelas",$kelas);
	$siswa=$this->db->get('cbt_siswa');
	$jumlahn=22;
	$n=ceil($siswa->num_rows() / $jumlahn);

	// echo($siswa->num_rows());
	$no=1;
	// echo($n);
	// die;
	for ($i=0; $i <$n ; $i++) { 
		?>
		<div  class="page">
		    <table border="0" width="100%">
	    		<tr>
					<td valign="top" rowspan="1" width="100" align="left"><img src="<?= base_url("asset/uploads/".$this->m_config->cfg['XLogo']); ?>" width="100"></td>
					<td valign="top">
						<b>
							<center>
								<h2>
								<font>DAFTAR HADIR PESERTA </font>
							    <br><font><?= strtoupper($ujian->XNamaUjian); ?></font>
								<br><font><?= $this->m_config->cfg['XSekolah'] ?></font>
							    <br><font><b>TAHUN PELAJARAN : <?= $this->m_config->get_tahun_ajaran() ?></b></font>
								</h2>
							</center>
						</b>
					</td>
				</tr>
			</table>
		    <table border="0" width="100%" style="margin-left:0px">
			  <tr >
				  <td  width="15%">Mata Pelajaran</td>
				  <td  width="1%">:</td>
				  <td  width="15%" ><?= strtoupper($ujian->XNamaMapel); ?> </td>
				  <!-- <td  width="15%"> Sesi / Ruang</td>
	    		  <td  width="1%"> : </td>
	    		  <td  width="20%"> <?= $info['XSesi']; ?> / <?= $ruang; ?></td>
	    		   --><td width="15%" >Kelas</td>
	    		  <td width="1%" >:</td>
	    		  <td width="15%" ><?= $kelas; ?></td>
			  </tr>
<!-- 			</table>
			<table width="100%"> -->
			  <tr>
				  <td width="15%" valign="top">Hari, Tanggal</td>
				  <td width="1%" valign="top">:</td>
				  <td width="53%" ><?php echo $tgl; ?> </td>
				  <td width="15%" style="margin-left:10px"> Pukul </td>
				  <td width="1%">:</td>
				  <td width="36%" ><?= $pukul1; ?> - <?= $pukul2; ?></td>
			  </tr>

		  	</table>
		  	 <table border="1" width="100%">
		  	 	<thead>
		  	 		<tr bgcolor="#CCCCCC" height="40">
			  	 		<th width="5%" style="text-align: center;">No.</th>
			  	 		<th width="13%" style="text-align: center;">No. Ujian</th>
			  	 		<th width="30%" style="text-align: center;">Nama Siswa</th>
			  	 		<th width="24%"style="text-align: center;">Tanda Tangan</th>
			  	 		<th colspan="2" width="13%" style="text-align: center;">Ket</th>
			  	 	</tr>
		  	 	</thead>
		  	 	<tbody>
		  	 		<?php
		  	 		$mulai = $i-1;
					$batas = ($mulai*$jumlahn);
					$startawal = $batas;
					$batasakhir = $batas+$jumlahn;

					$s = $i-1;
					$this->db->order_by("XNomerUjian","ASC");
					// $this->db->where('XRuang',$ruang);
					$this->db->where("XNamaKelas",$kelas);
					$this->db->limit($jumlahn,$batasakhir);
					// if (!empty($info['XSesi'])) {
					// 	$this->db->where('XSesi',$info['XSesi']);
					// }
					
					// if (!empty($info['XKodeJurusan'])) {
					// 	$this->db->where("XKodeJurusan",$info['XKodeJurusan']);
					// }
					// if (!empty($info['XKodeKelas'])) {
					// 	$this->db->where("XKodeKelas",$info['XKodeKelas']);
					// }
					
					$siswa=$this->db->get('cbt_siswa');
					foreach ($siswa->result_array() as $f) {
						echo "<tr height=30px>
						  		<td align='center'>&nbsp;$no.</td><td align='center'>$f[XNomerUjian]</td>
					  			<td>&nbsp;$f[XNamaSiswa]</td>";
						if ($no % 2 == 0) {
							echo "  		<td align='center'>&nbsp;$no.</td> ";
						} else {
							echo "  		<td align='left'>&nbsp;$no.</td> ";
						}
						// echo "<td align='center'>&nbsp; ".$f['XNamaKelas']."</td></tr>";
						echo "<td align='center'>&nbsp;</td></tr>";
						  $no++;
					}
		  	 		?>
		  	 	</tbody>
		  	 </table>
				1. Daftar hadir di buat rangkap 2 (dua).<br>
				2. Pengawas ruang menyilang Nama Peserta yang tidak hadir.
			 <table width="100%">
			 	<tr>
			 		<td width="60%" style="font-size: small;text-align: center;"></td>
					<td width="20%" style="font-size: small;text-align: center;"> Pengawas</td>
	  				<td width="20%" style="font-size: small;text-align: center;">Proktor</td>
	  			</tr>
	    	</table>
			<table border="0" width="100%">
				<tr>
				  <td width="30%" style="text-align: left;font-size: small; border-top:thin solid #000000;border-left: thin solid #000000;">&nbsp; Jumlah Peserta yang Seharusnya Hadir</td>
				  <td width="2%" style="text-align: left;font-size: small; border-top:thin solid #000000"> : </td>
				  <td width="10%" style="text-align: left;font-size: small; border-top:thin solid #000000; border-right: thin solid #000000;"> ______ orang</td></tr>
				  <td width="30%" style="text-align: left;font-size: small;border-bottom:thin solid #000000;border-left: thin solid #000000;">&nbsp; Jumlah Peserta yang Tidak Hadir</td>
				  <td width="2%" style="text-align: left;font-size: small;border-bottom:thin solid #000000"> : </td>
				  <td width="10%" style="text-align: left;font-size: small;border-bottom:thin solid #000000; border-right: thin solid #000000;"> ______ orang</td>
				  <td colspan="2" width="15%" style="text-align: left;font-size: small;text-align: center;"> </td>
				  <td width="15%" style="text-align: left;font-size: small;text-align: center;"></td>				
				</tr>
				<tr>
					<td width="30%" style="text-align: left;font-size: small;border-bottom:thin solid #000000;border-left: thin solid #000000;">&nbsp; Jumlah Peserta yang Tidak Hadir</td>
					<td width="2%" style="text-align: left;font-size: small;border-bottom:thin solid #000000"> : </td>
					<td width="10%" style="text-align: left;font-size: small;border-bottom:thin solid #000000; border-right: thin solid #000000;"> ______ orang</td>
				</tr>
			  </table>
			  <table width="100%">
				  	<tr>
				  		<td width="60%" style="font-size: small;text-align: center;"></td>
				    	<td width="20%" style="font-size: small;text-align: center;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
				    	<td width="20%" style="font-size: small;text-align: center;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
					</tr>
				</table>
			    <table width="100%">
				    <tr>
				    	<td width="60%" style="font-size: small;text-align: center;"></td>
				    	<td width="20%" style="font-size: small;text-align: left;"> NIP.</td>
				  		<td width="20%" style="font-size: small;text-align: left;">NIP.</td>
				  	</tr>
			    </table>
			</div>
		<?php
	}	
}

?>