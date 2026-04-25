<?= $this->include('user/layout/header'); ?>

<link rel="stylesheet" href="<?= base_url('css/result.css') ?>">

<div class="container" style="margin-top: 20px; padding: 20px;">
    <div class="search-header">
        <h2>Hasil pencarian untuk: "<?= esc($keyword) ?>"</h2>
        <p>Ditemukan <?= $total ?> produk.</p>
    </div>

    <hr>

    <?php if (empty($products)) : ?>
        <div class="no-result" style="text-align: center; padding: 50px 0;">

            <img src="<?= base_url('assets/img/') ?>" alt="Not Found" style="width: 200px; opacity: 0.5;">
            <p style="margin-top: 20px; color: #666;">Maaf, tidak ada produk atau kategori yang ditemukan dengan kata kunci tersebut.</p>
            <a href="<?= base_url('/') ?>" class="btn-back">Kembali ke Beranda</a>
        </div>
    <?php else : ?>
        <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;">
            <?php foreach ($products as $p) : ?>
                <div class="card-produk" style="border: 1px solid #eee; padding: 15px; border-radius: 12px; transition: transform 0.2s; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                    <div class="img-container" style="height: 180px; overflow: hidden; border-radius: 8px; margin-bottom: 10px;">
                        <img src="<?= base_url('assets/img/' . ($p['gambar'] ? $p['gambar'] : 'default.jpg')) ?>" 
                             alt="<?= esc($p['nama_produk']) ?>" 
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    
                    <span class="badge-kategori" style="font-size: 11px; background: #f0f0f0; padding: 2px 8px; border-radius: 4px; color: #555;">
                        <?= esc($p['nama_kategori']) ?>
                    </span>
                    
                    <h4 style="margin: 10px 0 5px 0; font-size: 16px; color: #333;"><?= esc($p['nama_produk']) ?></h4>
                    
                    <p style="color: #e67e22; font-weight: bold; margin-bottom: 5px;">
                        Rp <?= number_format($p['harga_sewa'], 0, ',', '.') ?> <small style="color: #888; font-weight: normal;">/hari</small>
                    </p>
                    
                    <p style="font-size: 13px; color: #777; margin-bottom: 15px;">
                        📍 <?= esc($p['nama_lokasi'] ?? 'Lokasi tidak tersedia') ?>
                    </p>
                    
                    <a href="<?= base_url('produk/' . $p['id_produk']) ?>" 
                       style="display: block; text-align: center; background: #000; color: #fff; padding: 8px; border-radius: 6px; text-decoration: none; font-size: 14px;">
                       Lihat Detail
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<style>
    .card-produk:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .btn-back {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
</style>

<?= $this->include('user/layout/footer') ?>