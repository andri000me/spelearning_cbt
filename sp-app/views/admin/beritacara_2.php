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
		<hr>
		<br>
		<p>Pada hari ini <?= $tgl; ?>, di <?= ucwords($this->m_config->cfg['XSekolah']); ?> telah diselenggarakan <?= $ujian->XNamaUjian; ?> Berbasis Komputer untuk matapelajaran <?= $ujian->XNamaMapel; ?> <?= $pukul; ?></p>
		  <br>
		  <table border="0" width="85%" style="margin-left:50px">
		  <tr height="30">
		  <td height="30" width="5%">1.</td>
		  <td height="30">Sekolah/Madrasah</td>
		  <td height="30" width="60%" style="border-bottom:thin solid #000000"><?= $this->m_config->cfg['XSekolah']?></td>  
		  </tr>
<!-- 		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td height="30">Ruang - Sesi</td>
		  <td height="30" width="60%" style="border-bottom:thin solid #000000"><?= $ruang; ?> - <?= $ujian->XSesi; ?></td>  
		  </tr> -->
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td height="30">Jumlah Peserta Seharusnya</td>
		  <td height="30" width="60%" style="border-bottom:thin solid #000000"></td>  
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td height="30">Jumlah Hadir (ikut ujian)</td>
		  <td height="30" width="60%" style="border-bottom:thin solid #000000"></td>  
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td height="30">Jumlah Tidak Hadir</td>
		  <td height="30" width="60%" style="border-bottom:thin solid #000000"></td>  
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td height="30">Nomer</td>
		  <td height="30" width="60%" style="border-bottom:thin solid #000000"></td>  
		  </tr>
		   <tr height="30">
		  <td height="30" width="10px"></td></tr>    
		  <tr height="30">
		  <td height="30" width="5%">2.</td>
		  <td colspan="2" height="30" width="30%">Catatan selama Ujian Berbasis Komputer (UBK) </td>
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td colspan="2" height="30" width="60%" style="border-bottom:thin solid #000000"></td>  
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td colspan="2" height="30" width="60%" style="border-bottom:thin solid #000000"></td>   
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td colspan="2" height="30" width="60%" style="border-bottom:thin solid #000000"></td>    
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td colspan="2" height="30" width="60%" style="border-bottom:thin solid #000000"></td>   
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td>
		  <td colspan="2" height="30" width="60%" style="border-bottom:thin solid #000000"></td>   
		  </tr>
		  <tr height="30">
		  <td height="30" width="10px"></td></tr>    
		  <tr height="30">
		  <td height="30" colspan="2" width="5%">Yang membuat berita acara : </td></tr>
		  </table>
		  
		  <table border="0" width="80%" style="margin-left:50px">  
		  <tr><td colspan="4" ></td>
		  <td height="30" width="30%">TTD</td>
		  </tr>
		  <tr><td width="10%">1. </td><td width="20%">Proktor</td><td width="30%" style="border-bottom:thin solid #000000"></td>
		  <td height="30" width="5%"></td><td height="30" width="35%"></td>
		  </tr>
		  <tr><td width="10%">   </td><td width="20%">NIP. </td><td width="30%" style="border-bottom:thin solid #000000"></td>
		  <td height="30" width="5%"></td><td height="30" width="35%" style="border-bottom:thin solid #000000">  1. </td>
		  </tr>

		  <tr><td width="10%">2. </td><td width="20%">Pengawas</td><td width="30%" style="border-bottom:thin solid #000000"></td>
		  <td height="30" width="5%"></td><td height="30" width="35%"></td>
		  </tr>
		  <tr><td width="10%">   </td><td width="20%">NIP. </td><td width="30%" style="border-bottom:thin solid #000000"></td>
		  <td height="30" width="5%"></td><td height="30" width="35%" style="border-bottom:thin solid #000000">  2. </td>
		  </tr>

		  
		  </table>  
