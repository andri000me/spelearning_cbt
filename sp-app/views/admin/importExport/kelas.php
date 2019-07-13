<div class="row">
	<div class="col m6" style="margin-right: 0">
		<div class="card blue accent-2 white-text">
			<div class="card-content">
				<span class="card-title">Fitur Baru !!</span>
				<p>
					Bagi kamu yang berlangganan aplikasi Simdik dari kami, dapat dengan mudah import dan export data loh !!
				</p>
				<p>
					Mulai dari data kelas siswa, dll dengan <b>satu kali klik !</b>
				</p>
			</div>
		</div>
		<div id="hasil" style="max-height: 300px; overflow-y: scroll;" >
		</div>
	</div>
	<div class="col m6 " style="margin-left: 0">
		<div class="card">
			<div class="card-content">
				<form action="<?= base_url('admin/importexport/kelas/prosesimport'); ?>"  onsubmit="return Sumbit()">
					<div>
						<label>Url Aplikasi SIMDIK :</label>
						<input type="text" name="url" required="required" minlength="4" placeholder="http://smk.com/simdik">
					</div>
					<div>
						<button type="submit" class="btn">Import data</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	function Sumbit(){
		$.get($('form').attr('action'),{url:$("[name='url']").val()}, function(data) {
			$("#hasil").html(data);
		});
		return false;
	}
</script>