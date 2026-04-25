<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="admin-wrapper">

    <!-- CONTENT -->
    <main class="content">

        <!-- STAT CARD -->
        <div class="stat-grid">

            <div class="stat-card active">
                <h4>Total Produk</h4>
                <p><?= $totalProduk ?></p> 
            </div>

            <div class="stat-card">
                <h4>Kategori</h4>
                <p><?= $totalKategori ?></p>
            </div>

        </div>

<?= $this->endSection() ?>