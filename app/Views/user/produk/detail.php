<?= $this->include('user/layout/header') ?>
<link rel="stylesheet" href="<?= base_url('css/detail.css') ?>">

<div class="produk-container">

  <p class="breadcrumb">Home / Sewa</p>

  <h1 class="produk-nama"><?= esc($produk['nama_produk']) ?></h1>

  <div class="produk-flex">

    <div class="produk-gambar">
      <img src="<?= base_url('assets/img/'.$produk['gambar']) ?>">
    </div>

    <div class="produk-detail">

      <div class="header-kanan">
        <div class="harga-besar">
          Rp <?= number_format($produk['harga_sewa'], 0, ',', '.') ?>/hari
        </div>

        <div class="rating-block">
          <br>
          📍 <?= esc($produk['nama_lokasi'] ?? '-') ?>
        </div>
      </div>

      <h3>Deskripsi</h3>
      <p class="produk-deskripsi">
        <?= nl2br(esc($produk['deskripsi'] ?? '-')) ?>
      </p>

      <?php if (!empty($produk['spesifikasi'])): ?>
        <h3>Spesifikasi</h3>
        <ul class="produk-spesifikasi">
          <?php foreach (explode("\n", $produk['spesifikasi']) as $s): ?>
            <li><?= esc($s) ?></li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>

<?php if (empty(session()->get('logged_in'))): ?>
<?php elseif (session()->get('logged_in')): ?>
<?php endif ?>

      <h3 class="durasi-title">
        <span class="icon-calendar">
          <svg xmlns="http://www.w3.org/2000/svg"
              width="20" height="20" viewBox="0 0 24 24">
            <path fill="#525252"
              d="M9 1v2h6V1h2v2h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1zm11 10H4v8h16zM7 5H4v4h16V5h-3v2h-2V5H9v2H7z"/>
          </svg>
        </span>
        Durasi Sewa
      </h3>      
        <div class="durasi-sewa">
          <button data-hari="1">1 hari</button>
          <button data-hari="3">3 hari</button>
          <button data-hari="7">7 hari</button>
        </div>      
        <div class="produk-total">
        <div>
          <small>Total Harga</small>
          <div id="totalHarga">
            Rp <?= number_format($produk['harga_sewa'], 0, ',', '.') ?>
          </div>
        </div>

        <a id="btnSewa"
           href="<?= base_url('sewa/'.$produk['id_produk']) ?>?durasi=1"
           class="btn-sewa">
          Sewa Sekarang
        </a>
      </div>

    </div>
  </div>
  <script>
document.addEventListener('DOMContentLoaded', function () {

  const harga = <?= (int)$produk['harga_sewa'] ?>;
  const buttons = document.querySelectorAll('.durasi-sewa button');
  const totalHarga = document.getElementById('totalHarga');
  const btnSewa = document.getElementById('btnSewa');
  const baseUrl = "<?= base_url('sewa/'.$produk['id_produk']) ?>";

  if (!buttons.length || !totalHarga || !btnSewa) return;

  //default 1h
  activate(buttons[0]);
  update(1);

  buttons.forEach(btn => {
    btn.addEventListener('click', function () {
      const hari = parseInt(this.dataset.hari);
      activate(this);
      update(hari);
    });
  });

  function activate(activeBtn){
    buttons.forEach(b => b.classList.remove('active'));
    activeBtn.classList.add('active');
  }

  function update(hari){
    const total = harga * hari;
    totalHarga.innerText = 'Rp ' + total.toLocaleString('id-ID');
    btnSewa.href = baseUrl + '?durasi=' + hari;
  }

});

</script>
<?php if (!empty($rekomendasi)): ?>
  <h3 class="rekomendasi">Rekomendasi</h3>

  <div class="rekomendasi-grid">
    <?php foreach ($rekomendasi as $r): ?>
      <a href="<?= base_url('produk/'.$r['id_produk']) ?>" class="rek-link">
        <div class="rek-card">
          <img src="<?= base_url('assets/img/'.$r['gambar']) ?>">

          <h4><?= esc($r['nama_produk']) ?></h4>

          <span>📍 <?= esc($r['nama_lokasi'] ?? '') ?></span>

          <b class="rek-harga">
            Rp <?= number_format($r['harga_sewa'], 0, ',', '.') ?>/hari
          </b>
        </div>
      </a>
    <?php endforeach ?>
  </div>
<?php endif ?>

</div>
<?= $this->include('user/layout/footer') ?>
