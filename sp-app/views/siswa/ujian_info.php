<?php
// echo $ujian->num_rows();
?>
<div class="row">
  <div class="col s12 m12">
    <div class="card">
      <div class="card-content">
        <p>
          Hai <b><?= ucwords($GLOBALS['u']['XNamaSiswa']) ;?></b>, Selamat datang dihalaman daftar ujian. silahkan pilih ujian yang sesuai dengan kelas dan mata pelajaran yang kamu ikuti !.
        </p>
      </div>
    </div>
    <!-- card end -->
    <div class="row">
      <?php
      // print_r($ujian);
      if ($ujian->num_rows() == 0) {
        ?>
        <div class="col s12 m12">
          <div class="card-panel padding-2 blue white-text">
            Belum ada mata ujian yang aktiv, silahkan hubungi guru/ atau yang bersangkutan apabila terjadi kesalahan !.
          </div>
        </div>
        <?php
      } else {
        $total=0;
        foreach ($ujian->result() as $u) {
          if (empty($u->XNamaKelas)) {
            // echo "string";
          } elseif (in_array($GLOBALS['u']['XNamaKelas'],json_decode($u->XNamaKelas))) {
            $total++;

            $buka=strtotime($u->XTglUjian);
            $tutup=strtotime($u->XBatasMasuk);
            // echo(date("Y-m-d H:i:s"));
            $sekarang=strtotime(date("Y-m-d H:i:s"));
            $this->db->where("XNomerUjian",$GLOBALS['u']['XNomerUjian']);
            $this->db->where("XIdUjian",$u->XIdUjian);
            $this->db->where("XTokenUjian",$u->XTokenUjian);
            $cek_nilai=$this->db->get("cbt_nilai")->num_rows();

            // echo $sekarang;
            // echo "<br/>";
            // echo $tutup;
            if (($u->XStatusUjian != 9)) {
              if ($sekarang < $buka) {
                $u->XDisplay='green lighten-2 white-text';
                $u->XStatus="Tutup";
              } elseif ($cek_nilai > 0) {
                $u->XStatus="Sudah";
                $u->XDisplay='teal lighten-1 white-text';
              } else {
                $u->XDisplay='';
                $u->XStatus="Buka";
              }
            ?>

            <div class="col s12 m4">
              <div class="card">
                <div class="card-content <?= $u->XDisplay; ?>">
                  <b>Mata Palajaran</b><br><i> : <?= $u->XNamaMapel; ?></i><br>
                  <b>Ujian Dimulai</b><br><i> : <?= date("d M. Y H:i A",$buka); ?></i><br>
                  <b>Ujian Selesai</b><br><i> : <?= date("d M. Y H:i A",$tutup); ?></i><br>
                  <b>Durasi Ujian</b><br><i> : <?= $u->XLamaUjian; ?> Menit</i><br>
                </div>
                <?php
                switch ($u->XStatus) {
                  case 'Buka':
                  ?>
                    <div class="card-action">
                      <a href="<?= base_url("siswa/ujian/mulai/".$u->XIdUjian); ?>" class="btn green lighten-2"> <i class="material-icons left">border_color</i> Ikuti Ujian</a>
                    </div>
                  <?php
                    break;
                  case 'Selesai':
                  ?>
                     <div class="card-action">
                       <button href="#" class="btn red" disabled="disabled">Ujian Sudah Selesai</button>
                     </div>
                  <?php
                    break;
                  case 'Tutup':
                  ?>
                     <div class="card-action">
                       <button href="#" class="btn red" disabled="disabled">Ujian Belum Dibuka</button>
                     </div>
                  <?php
                    break;
                  case 'Sudah':
                  ?>
                     <div class="card-action">
                       <button href="#" class="btn red" disabled="disabled">Sudah Pernah mengikuti</button>
                     </div>
                  <?php
                    break;
                }
                ?>
              </div>
            </div>
            <?php
            }
          }
        }
        if ($total==0) {
          ?>
        <div class="col s12 m12">
          <div class="card-panel padding-2 blue white-text">
            Belum ada mata ujian yang aktiv, silahkan hubungi guru/ atau yang bersangkutan apabila terjadi kesalahan !.
          </div>
        </div>
        <?php
        }
      }


      ?>
    </div>
  </div>
</div>