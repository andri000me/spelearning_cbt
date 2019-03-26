<div class="row">
	<div class="col s12 m8">
	<div class="card-panel">
		<div class="card-title">Tanya Jawab</div>
		<hr>
          <div class="direct-chat direct-chat-primary">
              <!-- Conversations are loaded here -->
              <div id="XLembarTanyaScroll"  style="max-height: 400px!important;overflow-y:scroll;">
              	
	              <div class="" id="XLembarTanya">
	                <!-- Message. Default to the left -->
	                <?php
	                // echo strtotime(date("Y-m-d"))\;
	                // print_r($Pelajaran);
	                // die;
	                $this->db->where("XIdPelajaran",$Pelajaran->XIdPelajaran);
	                $this->db->order_by("XTanggal","DESC");
	                $query=$this->db->get("cbt_tanya_pelajaran");
	                if ($query->num_rows() == 0) {
						$XTanggal=strtotime(date("Y-m-d H:i:s"));
	                	// echo $query->num_rows();
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
		                		<div class="clearfix">
		                		 <div class="direct-chat-msg left">
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
				               </div>
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
	                		<div class="clearfix">
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
                  <input type="hidden" name="XTanggal" value="<?= $XTanggal; ?>">
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
		function kirim() {
		var id = '<?= $Pelajaran->XIdPelajaran; ?>';
		var pesan = $("[id='XTanya']").val();
		var time = $("[name='XTanggal']").val();
		// alert(time);
		$.post('<?= base_url("admin/peserta_pelajaran/protam_tanya"); ?>', {XTanya: pesan,time:time,id:id}, function(data, textStatus, xhr) {
			// alert(data['reload']);

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
		$.post('<?= base_url("admin/peserta_pelajaran/refresh_tanya"); ?>', {time:time,id:id}, function(data, textStatus, xhr) {
			// alert(data);
			$("#XLembarTanya").prepend(data['reload']);
			$("[name='XTanggal']").val(data['time']);
		},'json');
	}
	setInterval(refresh,1000);

</script>