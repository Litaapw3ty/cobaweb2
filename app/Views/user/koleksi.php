<?= $this->include('user/layout/header') ?>

<div class="container">

    <h2>Koleksi Saya</h2>

    <?php if (empty($produk)): ?>
        <p>Belum ada koleksi</p>
    <?php else: ?>

    <div class="row g-4">
        <?php foreach ($produk as $p): ?>
            <div class="card">
                <img src="<?= base_url('uploads/'.$p['gambar']) ?>" class="card-img-top">
                <div class="card-body">
                    <h6><?= esc($p['nama_produk']) ?></h6>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php endif; ?>

</div>

<?= $this->include('user/layout/footer') ?>
            