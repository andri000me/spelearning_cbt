<div class="row">
	<div class="col s12 m7">
		<div class="card">
			<div class="card-content">
				<span class="card-title black-text">
	               <?= $Pelajaran->XJudul; ?>
	            </span>
	        	<div id="breadcrumbs-wrapper" style="padding: 0;margin: 0;background: white">
	                <ol class="breadcrumbs">
	                  <li><a  href="<?= base_url("siswa/pelajaran/cari/".$Pelajaran->XKodeKelas); ?>"><?= $Pelajaran->XKodeKelas; ?></a></li>
	                  <li><a href="<?= base_url("siswa/pelajaran/cari/".$Pelajaran->XKodeJurusan); ?>"><?= $Pelajaran->XKodeJurusan; ?></a></li>
	                  <li> <a  href="<?= base_url("siswa/pelajaran/cari/".$Pelajaran->XKodeMapel); ?>"><?= $Pelajaran->XNamaMapel ?></a></li>
	                  <li> <a  href="<?= base_url("siswa/pelajaran/cari/".$Pelajaran->XKd); ?>"><?= $Pelajaran->XKd ?></a></li>
	                </ol>
	            </div>
	            <p>Tanggal : <?= date("d M y H:i A",strtotime($Pelajaran->XWaktuMulai)); ?> <b>s/d.</b> <?= date("d M y H:i A",strtotime($Pelajaran->XWaktuAkhir)); ?></p>
	            <p>dibuat oleh  <a href="<?= base_url("siswa/user/info/".$Pelajaran->Username); ?>"><?= ucwords($Pelajaran->Nama) ?></a></p>

			</div>
			<div class="card-content">
				<?php
				      $rep1=array(
				        '[gambar]','[/gambar]',
				        '[audio]','[/audio]',
				        '[video]','[/video]',
				        '[doc]','[/doc]',
				        '[code]','[/code]',
				      );
				      $rep2=array(
				        '<img class="responsive-img" src="'.base_url('asset/uploads/file_materi/gambar/'),'">',
				        '<audio class="responsive-video"  src="'.base_url('asset/uploads/file_materi/audio/'),'" controls></audio>',
				        '<video class="responsive-video" controls><source  src="'.base_url('asset/uploads/file_materi/video/'),'"></video>',
				        '<p><a  class="btn btn-primary" href="https://view.officeapps.live.com/op/view.aspx?src='.base_url('../file-pdf/materi/'),'">Lihat Dokumen</a></p>',
				        '<textarea id="code">','</textarea>'
				      );
				      // $isi_materi=str_replace($rep1, $rep2, $s->isi_materi);

				?>
				<?= str_replace($rep1, $rep2, $Pelajaran->XIsiMateri); ?>
			</div>
		</div>
		<?php
		if (!empty($Pelajaran->XFile) AND !empty(json_decode($Pelajaran->XFile)) AND ($Pelajaran->XFile != "[]")) {
			?>
			<div class="card-panel">
				File Dilampirkan :
				<table>
					<thead>
						<tr>
							<th>Nama File</th>
							<th>Type</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach (json_decode($Pelajaran->XFile) as $key => $value) {
								?>
								<tr>
									<td><?= $value; ?></td>
									<td><?= pathinfo($value,PATHINFO_EXTENSION); ?></td>
									<td><a href="<?= base_url("asset/uploads/att_materi/".$value); ?>" class="btn blue btn-floating"><i class="material-icons small">cloud_download</i></a></td>
								</tr>
								<?php	
							}
						?>
					</tbody>
				</table>
			</div>
			<?php
		}
		if (!empty($Pelajaran->XUjian) AND !empty(json_decode($Pelajaran->XUjian)) AND ($Pelajaran->XUjian != "[]")) {
			?>
			<div class="card-panel">
				Ujian Dilampirkan :
				<table>
					<thead>
						<tr>
							<th>#</th>
							<th>Kelas</th>
							<th>Jur.</th>
							<th>Mulai</th>
							<th>Selesai</th>
							<th>Ikuti</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$this->db->select("*,u.Urut as XIdUjian");
					$this->db->from("cbt_ujian u");
					$this->db->join("cbt_paketsoal ps",'u.XKodeSoal = ps.XKodeSoal');
					$this->db->where_in("u.Urut",json_decode($Pelajaran->XUjian));
					// $this->db->where("XKodeMapel",$u->XKodeMapel);
					// $this->db->where("XKodeJurusan",$u->XKodeJurusan);
					// $this->db->where("XKodeKelas",$u->XKodeKelas);
					foreach ($this->db->get()->result() as $uj) {
						foreach ($uj as $key => $value) {
							if (empty($value)) {
								$uj->$key="Semua";
							}
						}
						?>
						<tr>
							<td><?= $uj->XKodeUjian; ?></td>
							<td><?= $uj->XKodeKelas; ?></td>
							<td><?= $uj->XKodeJurusan; ?></td>
							<td><?= $uj->XTglUjian; ?></td>
							<td><?= $uj->XBatasMasuk; ?></td>
							<td><a href="<?= base_url("siswa/ujian/mulai/".$uj->XIdUjian); ?>" class="btn btn-floating"><i class="material-icons small">border_color</i></a></td>
						</tr>
						<?php
					}
					?>
					</tbody>
				</table>
			</div>
			<?php
		}
		?>
	</div>
	<div class="col s12 m5">
		<div class="card-panel">
		<div class="card-title">Tanya Jawab</div>
		<hr>
          <div class="direct-chat direct-chat-primary">
              <!-- Conversations are loaded here -->
              <div id="XLembarTanyaScroll"  style="max-height: 400px!important;overflow-y:scroll;">
              	
	              <div class="" id="XLembarTanya">
	                <!-- Message. Default to the left -->
	                <?php
	                // echo strtotime(date("Y-m-d"));
	                // echo $No;
	                // echo $Pelajaran->XIdPelajaran;
	                $this->db->where("XIdPelajaran",$Pelajaran->XIdPelajaran);
	                $this->db->order_by("XTanggal","DESC");
	                $query=$this->db->get("cbt_tanya_pelajaran");
	                if ($query->num_rows() == 0) {
						$XTanggal=strtotime(date("Y-m-d H:i:s"));
	                } else {
		                foreach ($query->result() as $t) {
		                	$XTanggal=$t->XTanggal;
		                	if ($t->XUser == 1) {
		                		$this->db->select("XNamaSiswa,XFoto");
		                		$this->db->where("XNomerUjian",$t->XNomerUjian);
		                		$sis=$this->db->get("cbt_siswa")->row();
		                		if (empty($sis->XFoto)) {
		                			$sis->XFoto = '../../img/nouser.png';
		                		}
		                		?>
		                		 <div class="direct-chat-msg">
				                  <div class="direct-chat-info clearfix">
				                    <span class="direct-chat-name pull-left"><?= $sis->XNamaSiswa; ?></span>
				                    <span class="direct-chat-timestamp pull-right"><?= date("d M h:i a",$t->XTanggal);?></span>
				                  </div>
				                  <!-- /.direct-chat-info -->
				                  <img class="direct-chat-img" src="<?= base_url("asset/uploads/foto_siswa/".$sis->XFoto); ?>" alt="Message User Image"><!-- /.direct-chat-img -->
				                  <div class="direct-chat-text">
				                  	<?= $t->XTanya; ?>
				                  </div>
				                  <!-- /.direct-chat-text -->
				                </div>
				                <!-- /.direct-chat-msg -->

		                		<?php
		                	} else {
		                		$this->db->select("Nama,XFoto");
		                		$this->db->where("Username",$t->XGuru);
		                		$sis=$this->db->get("cbt_user")->row();
		                		if (empty($sis->XFoto)) {
		                			$sis->XFoto = '../../img/nouser.png';
		                		}
		                		?>
		                		<!-- Message to the right -->
				                <div class="direct-chat-msg right">
				                  <div class="direct-chat-info clearfix">
				                    <span class="direct-chat-name pull-right"><?= $sis->Nama; ?></span>
				                    <span class="direct-chat-timestamp pull-left"><?= date("d M h:i a",$t->XTanggal);?></span>
				                  </div>
				                  <!-- /.direct-chat-info -->
				                  <img class="direct-chat-img" src="<?= base_url("asset/uploads/foto_siswa/".$sis->XFoto); ?>" alt="Message User Image"><!-- /.direct-chat-img -->
				                  <div class="direct-chat-text">
				                    <?= $t->XTanya; ?>
				                  </div>
				                  <!-- /.direct-chat-text -->
				                </div>
				                <!-- /.direct-chat-msg -->
		                		<?php
		                	}
		                }
	                }
	                ?>
	              </div>
              </div>
            <div class="box-footer">
              <form action="#" onsubmit="return kirim()" method="post" novalidate="novalidate" autocomplete="off">
                <div class="input-group">
                  <input  autocomplete="off" type="hidden" name="XTanggal" value="<?= $XTanggal; ?>">
                  <textarea required="required" minlength="10" type="text" autocomplete="false" id="XTanya" placeholder="Tulis Pesanmu ..." class="materialize-textarea" autocomplete="off"  list="fahssfa"></textarea>
                      <span class="input-group-btn">
                        <button type="submit" class="btn blue white-text btn-flat">Kirim</button>
                      </span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->		
		</div>
	</div>
</div>
<script type="text/javascript">	
	$(document).ready(function() {
		// alert($("#XLembarTanya").height());
	});
	function kirim() {
		var id = '<?= $Pelajaran->XIdPelajaran; ?>';
		var pesan = $("[id='XTanya']").val();
		var time = $("[name='XTanggal']").val();
		// alert(time);
		$.post('<?= base_url("siswa/pelajaran/protam_tanya"); ?>', {XTanya: pesan,time:time,id:id}, function(data, textStatus, xhr) {
			// alert(data);
			$("#XLembarTanya").prepend(data['reload']);
			$("[name='XTanggal']").val(data['time']);
			$("[id='XTanya']").val('');
			$("#XLembarTanyaScroll").scrollTop(0);
			$("[id='XTanya']").focus();
		},'json');
		return false;
	}

	function refresh(){
		var id = '<?= $Pelajaran->XIdPelajaran; ?>';
		var time = $("[name='XTanggal']").val();
		// alert(time);
		$.post('<?= base_url("siswa/pelajaran/refresh_tanya"); ?>', {time:time,id:id}, function(data, textStatus, xhr) {
			// alert(data);
			$("#XLembarTanya").prepend(data['reload']);
			$("[name='XTanggal']").val(data['time']);
		},'json');
	}
	setInterval(refresh,5000);
</script>