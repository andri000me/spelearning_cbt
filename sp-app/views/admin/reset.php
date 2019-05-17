<div class="row">
  <div class="col s12 m6">
    <form action="<?= base_url('admin/reset/aksi'); ?>" method='post' onsubmit="return confirm('Apakah anda yakin akan melakukan reset data, kehilangan data akan bersifat permanent / selamanya !!!!!');">
      <div class="card">
        <div class="card-content">
          <span class="card-title">
            <?= $this->m_config->cfg['XSekolah']; ?>
          </span>
          <span>Masukan kembali username dan password super admin untuk melakukan reset data</span>
          <p>
            <div class="input-field">
              <input  autocomplete="off" type="text" name="user" required="required">
              <label>Username</label>
            </div>
            <div class="input-field">
              <input  autocomplete="off" type="password" name="pwd" required="required">
              <label>Password</label>
            </div>
            <?= $this->m_config->pesan(); ?>
            <div class="input-field">
              <button style="width: 100%" type="submit" class="btn btn-block green">Masuk</button>
            </div>
          </p>
        </div>

      </div>
    </form>
  </div>
</div>
