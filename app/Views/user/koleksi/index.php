<?= $this->include('user/layout/header') ?>
<link rel="stylesheet" href="<?= base_url('css/lokasi.css') ?>">

<div class="container">

    <p class="lokasi-breadcumb">
        <a href="<?= base_url('/') ?>">Home</a> / Koleksi
    </p>

    <h2 class="lokasi-page-tittle">
        Koleksi Favorit
    </h2>

    <?php if (!empty($koleksi)): ?>

    <div class="produk-grid">

        <?php foreach ($koleksi as $p): ?>

        <div class="product-card">

            <a href="#"
               class="btn-simpan saved"
               data-id="<?= $p['id_produk'] ?>"
               title="Hapus dari koleksi">

                <svg class="icon-bookmark" viewBox="0 0 24 24">
                    <path d="M6 2h12a1 1 0 0 1 1 1v19l-7-4-7 4V3a1 1 0 0 1 1-1z"/>
                </svg>
            </a>

            <div class="produk-img">
                <img src="<?= base_url('assets/img/'.$p['gambar']) ?>"
                     alt="<?= esc($p['nama_produk']) ?>">
            </div>


            <div class="produk-body">

                <div class="produk-nama-card">
                    <?= esc($p['nama_produk']) ?>
                </div>

                <div class="produk-harga">
                    Rp <?= number_format($p['harga_sewa']) ?>
                    <span>/hari</span>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>

    <?php else: ?>
        <p class="text-muted">Belum ada koleksi.</p>
    <?php endif; ?>

</div>

<script>
document.querySelectorAll('.btn-simpan').forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.preventDefault();

        const produkId = this.dataset.id;

        fetch("<?= base_url('koleksi/toggle') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "X-Requested-With": "XMLHttpRequest"
            },
            body:
                "id_produk=" + produkId +
                "&<?= csrf_token() ?>=<?= csrf_hash() ?>"
        })
        .then(res => res.json())
        .then(data => {

            if (data.status === 'login') {
                window.location.href = "<?= base_url('login') ?>";
                return;
            }

            if (data.status === 'removed') {
                this.closest('.product-card').remove();
            }
        });
    });
});
</script>

<?= $this->include('user/layout/footer') ?>
