<?= $this->include('user/layout/header') ?>

<div class="category-page container">

  <p class="breadcrumb-text">
    Home / <?= esc($kategori['nama_kategori']) ?>
  </p>

  <h1 class="category-title">
    Ciptakan Karya Hebat dengan 
    <span><?= esc($kategori['nama_kategori']) ?></span>!
  </h1>
  <p class="category-subtitle">
    Ciptakan karya hebat mulai dari sini
  </p>

  <!-- Ssubkategori -->
  <div class="subcategory-tabs">
    <?php foreach ($subKategori as $s): ?>
      <a href="<?= base_url($kategoriSlug.'/'.$s['slug']) ?>"
         class="subcategory-btn <?= ($subAktif == $s['id_sub_kategori']) ? 'active' : '' ?>">
        <?= esc($s['nama_sub_kategori']) ?>
      </a>
    <?php endforeach ?>
  </div>

  <div class="product-grid">
    <?php foreach ($produk as $p): ?>
      <a href="<?= base_url('produk/'.$p['id_produk']) ?>" class="product-link">
        <div class="product-card">
          <div class="product-img">
            <img src="<?= $p['gambar']
              ? base_url('assets/img/'.$p['gambar'])
              : base_url('assets/img/default.png') ?>">
          </div>

          <div class="product-info">
            <h6><?= esc($p['nama_produk']) ?></h6>
            <span>📍 <?= esc($p['nama_lokasi'] ?? '') ?></span>
          </div>
        </div>
      </a>
    <?php endforeach ?>
  </div>
</div>

<?= $this->include('user/layout/footer') ?>