<?= $this->include('user/layout/header') ?>

<section class="hero">
  <div class="hero-overlay"></div>

  <div class="hero-inner">
    <div class="hero-content">
      <h1>Sewa Peralatan Studio<br>Foto Profesional</h1>
      <p>
        Dapatkan akses ke peralatan studio foto berkualitas tinggi
        dengan harga terjangkau. Mulai dari kamera, lighting, hingga
        aksesoris lengkap.
      </p>

      <div class="hero-actions">
        <a href="#popular" class="hero-btn primary">Jelajahi Katalog</a>
        <a href="<?= base_url('about') ?>" class="hero-btn secondary">
            Tentang Kami
        </a>

      </div>
    </div>
  </div>
</section>
<!--item popoular -->
<section class="home-section" id="popular">
  <h3 class="section-title">Popular Items →</h3>

  <div class="horizontal-list">
    <?php foreach ($popular as $p): ?>
      <a href="<?= base_url('produk/'.$p['id_produk']) ?>" class="card-link">
        <div class="product-card">
          <div class="product-img">
            <img src="<?= $p['gambar']
              ? base_url('assets/img/'.$p['gambar'])
              : base_url('assets/img/default.png') ?>">
          </div>
          <div class="product-info">
            <h6><?= esc($p['nama_produk']) ?></h6>
            <span><?= esc($p['nama_lokasi'] ?? '') ?></span>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</section>

<!--kategori-->
<section class="home-section" id="kategori">
  <h3 class="section-title center">Popular Category</h3>

  <div class="category-wrap">
    <?php foreach ($kategori as $k): ?>
      <a href="<?= base_url($k['slug'] ?? '#') ?>" class="category-link">
        <div class="category-card">
          <div class="category-icon">
            <img src="<?= base_url('/assets/icon/'.$k['nama_kategori'].'.svg') ?>">
          </div>
          <div class="category-text">
            <h6><?= esc($k['nama_kategori']) ?></h6>
            <p><?= esc($k['sub_list'] ?? '') ?></p>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</section>

<!--kamera -->
<section class="home-section">
  <h3 class="section-title">Camera →</h3>

  <div class="product-grid">
    <?php foreach ($kamera as $p): ?>
      <a href="<?= base_url('produk/'.$p['id_produk']) ?>" class="card-link">
        <div class="product-card">
          <div class="product-img">
            <img src="<?= $p['gambar']
              ? base_url('assets/img/'.$p['gambar'])
              : base_url('assets/img/default.png') ?>">
          </div>
          <div class="product-info">
            <h6><?= esc($p['nama_produk']) ?></h6>
            <span><?= esc($p['nama_lokasi'] ?? '') ?></span>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</section>

<!--lighting -->
<section class="home-section">
  <h3 class="section-title">Lighting →</h3>

  <div class="product-grid">
    <?php foreach ($lighting as $p): ?>
      <a href="<?= base_url('produk/'.$p['id_produk']) ?>" class="card-link">
        <div class="product-card">
          <div class="product-img">
            <img src="<?= $p['gambar']
              ? base_url('assets/img/'.$p['gambar'])
              : base_url('assets/img/default.png') ?>">
          </div>
          <div class="product-info">
            <h6><?= esc($p['nama_produk']) ?></h6>
            <span><?= esc($p['nama_lokasi'] ?? '') ?></span>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</section>

<!-- modifier -->
<section class="home-section">
  <h3 class="section-title">Modifier →</h3>

  <div class="product-grid">
    <?php foreach ($modifier as $p): ?>
      <a href="<?= base_url('produk/'.$p['id_produk']) ?>" class="card-link">
        <div class="product-card">
          <div class="product-img">
            <img src="<?= $p['gambar']
              ? base_url('assets/img/'.$p['gambar'])
              : base_url('assets/img/default.png') ?>">
          </div>
          <div class="product-info">
            <h6><?= esc($p['nama_produk']) ?></h6>
            <span><?= esc($p['nama_lokasi'] ?? '') ?></span>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</section>

<!--PARTNERS-->
  <section class="home-section partners-section">
    <h3 class="section-title center">Our Partner Studio</h3>

    <div class="partners-carousel">
      <div class="partners-track">
        <img src="<?= base_url('images/partner1.jpg') ?>" alt="Partner 1">
        <img src="<?= base_url('images/partner2.jpg') ?>" alt="Partner 2">
        <img src="<?= base_url('images/partner3.jpg') ?>" alt="Partner 3">
        <img src="<?= base_url('images/partner4.jpg') ?>" alt="Partner 4">
        <img src="<?= base_url('images/partner5.jpg') ?>" alt="Partner 5">

        <img src="<?= base_url('images/partner1.jpg') ?>" alt="Partner 1">
        <img src="<?= base_url('images/partner2.jpg') ?>" alt="Partner 2">
        <img src="<?= base_url('images/partner3.jpg') ?>" alt="Partner 3">
        <img src="<?= base_url('images/partner4.jpg') ?>" alt="Partner 4">
        <img src="<?= base_url('images/partner5.jpg') ?>" alt="Partner 5">
      </div>
    </div>

    <p class="partners-desc">
      Sebagai penyedia penyewaan alat studio, kami bangga telah dipercaya oleh fotografer, videografer, komunitas kreatif, hingga brand ternama. 
      Bersama mereka, kami terus berkomitmen menjadi <br>
      <strong>Partner Terbaik untuk Karyamu.</strong>
    </p>
  </section>

<?= $this->include('user/layout/footer') ?>