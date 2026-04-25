    <h3><?= esc($subKategori['nama_sub_kategori']) ?></h3>

    <div class="row g-4">
    <?php foreach ($produk as $p): ?>
    <div class="col-md-3">
        <a href="<?= base_url(
            $kategori['slug'].'/'.$subKategori['slug'].'/'.$p['slug']
        ) ?>" class="text-decoration-none text-dark">
        <div class="card product-card">
            <img src="<?= base_url('uploads/'.$p['gambar']) ?>">
            <div class="card-body">
            <h6><?= esc($p['nama_produk']) ?></h6>
            </div>
        </div>
        </a>
    </div>
    <?php endforeach ?>
    </div>
