<div class="row">
  <div class="col s12 m8">
    <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
      <li class="tab active"><a href="#pelajaran">Daftar Pelajaran</a></li>
      <li class="tab active"><a href="#mapel">Daftar Mapel</a></li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col s12 m8" id="pelajaran">
    <div class="" >
      <?php
      if ($Pelajaran->num_rows() ==0 ) {
        ?>
        <div class="card-panel blue white-text">Tidak ada pembelajaran/ materi tersedia silahkan kontak guru/ panitia bersangkutan jika terjadi kesalahan !</div>
        <?php
      } else {
        $total=0;
        foreach ($Pelajaran->result() as $p) {
          if (empty($p->XNamaKelas)) {
          } elseif (in_array($GLOBALS['u']['XNamaKelas'],json_decode($p->XNamaKelas))) {
            $total++;
            foreach ($p as $key => $value) {
              if ($value =="" || empty($value)) {
                $p->$key="Semua";
              }
            }
            
            $buka=strtotime($p->XWaktuMulai);
            $tutup=strtotime($p->XWaktuAkhir);
            // echo(date("Y-m-d H:i:s"));
            $sekarang=strtotime(date("Y-m-d H:i:s"));

            if (($p->XStatusPelajaran != 9)) {
              if ($sekarang < $buka) {
                $p->XDisplay='green lighten-2 white-text';
                $p->XStatus="Tutup";
              } elseif (($sekarang > $tutup)) {
                $this->db->where("Urut",$p->XIdPelajaran);
                $this->db->update('cbt_pelajaran',['XStatusPelajaran' => 9]);
                $p->XStatus="Selesai";
                $p->XDisplay='blue lighten-2 white-text';
              } else {
                $p->XDisplay='';
                $p->XStatus="Buka";
              }
            
            ?>
            <div class="card">
              <div class="card-content">
                <span class="card-title black-text">
                   <a href="<?= base_url("siswa/pelajaran/ikuti/".$p->XIdPelajaran); ?>"><?= $p->XJudul; ?> </a>
                </span>
                <a href="<?= base_url("siswa/pelajaran/ikuti/".$p->XIdPelajaran); ?>" title="Ikuti Pelajaran ini" class="btn btn-floating right blue btn-large"><i class="material-icons">book</i></a>
                 <div id="breadcrumbs-wrapper" style="padding: 0;margin: 0;background: white">
                    <ol class="breadcrumbs">
                      <li><a  href="<?= base_url("siswa/pelajaran/cari/".$p->XKodeKelas); ?>"><?= $p->XKodeKelas; ?></a></li>
                      <li><a href="<?= base_url("siswa/pelajaran/cari/".$p->XKodeJurusan); ?>"><?= $p->XKodeJurusan; ?></a></li>
                      <li> <a  href="<?= base_url("siswa/pelajaran/cari/".$p->XKodeMapel); ?>"><?= $p->XNamaMapel ?></a></li>
                      <li> <a  href="<?= base_url("siswa/pelajaran/cari/".$p->XKd); ?>"><?= $p->XKd ?></a></li>
                    </ol>
                 
                </div>
                <p>Tanggal : <?= date("d M y H:i A",strtotime($p->XWaktuMulai)); ?> <b>s/d.</b> <?= date("d M y H:i A",strtotime($p->XWaktuAkhir)); ?></p>
                <p>dibuat oleh  <a href="<?= base_url("siswa/user/info/".$p->Username); ?>"><?= ucwords($p->Nama) ?></a></p>
                <!-- <div class="card-action"> -->
                  <!-- <a href="" class="btn btn-floatig"><i class="material-icons left">book</i> Baca Materi Pelajaran</a> -->
                <!-- </div> -->
              </div>
            </div>
            <?php
          }
        }
      }
      if ($total==0) {
        ?>
        <div class="card-panel blue white-text">Tidak ada pembelajaran/ materi tersedia silahkan kontak guru/ panitia bersangkutan jika terjadi kesalahan !</div>
        <?php
      }
    }
      ?>
    </div>
  </div>
  <div class="col s12 m12" id="mapel">
    <div class="card">
      <div class="card-content">
        <div class="card-title">
          Kategori Mapel
        </div>
        <ul class="collapsible">
          <li class="active">
            <div class="collapsible-header"><i class="material-icons">book</i>Umum</div>
            <div class="collapsible-body">
              <?php
              $this->db->order_by("XNamaMapel","ASC");
              $this->db->where("XMapelAgama","N");
              foreach ($this->db->get("cbt_mapel")->result() as $m) {
                ?>
                  <a href="<?= base_url("siswa/pelajaran/cari/".$m->XKodeMapel); ?>" class='btn' style="margin-bottom: 7px"><?= $m->XNamaMapel; ?></a>            
                <?php
              }
              ?>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">book</i>Agama</div>
            <div class="collapsible-body">
              <?php
              $this->db->order_by("XNamaMapel","ASC");

              $this->db->where("XMapelAgama","A");
              foreach ($this->db->get("cbt_mapel")->result() as $m) {
                ?>
                  <a href="<?= base_url("siswa/pelajaran/cari/".$m->XKodeMapel); ?>" class='btn' style="margin-bottom: 7px"><?= $m->XNamaMapel; ?></a>            
                <?php
              }
              ?>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">book</i>Jurusan</div>
            <div class="collapsible-body">
              <?php
              $this->db->order_by("XNamaMapel","ASC");
              $this->db->where("XMapelAgama","J");
              foreach ($this->db->get("cbt_mapel")->result() as $m) {
                ?>
                  <a href="<?= base_url("siswa/pelajaran/cari/".$m->XKodeMapel); ?>" class='btn' style="margin-bottom: 7px"><?= $m->XNamaMapel; ?></a>            
                <?php
              }
              ?>
            </div>
          </li>
        </ul>
      </div>
    </div>    
  </div>
</div>