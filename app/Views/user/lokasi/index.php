<?= $this->include('user/layout/header') ?>
<link rel="stylesheet" href="<?= base_url('css/lokasi.css') ?>">

<?php
$banner = file_exists(FCPATH.'assets/img/lokasi/'.$lokasiAktif['slug'].'.jpg')
    ? $lokasiAktif['slug'].'.jpg'
    : 'default.jpg';
?>

<!-- BANNER -->
<div class="lokasi-banner">
    <img src="<?= base_url('assets/img/lokasi/'.$banner) ?>" alt="">
    <div class="lokasi-overlay"></div>
</div>

<div class="container">

    <p class="lokasi-breadcumb">
        <a href="<?= base_url('/') ?>">Home</a> /
        Lokasi / <?= esc($lokasiAktif['nama_lokasi']) ?>
    </p>

    <h2 class="lokasi-page-tittle">
        Penyewaan Area <?= esc($lokasiAktif['nama_lokasi']) ?>
    </h2>

    <div class="produk-grid">

        <?php foreach ($produk as $p): ?>
        <?php $isSaved = in_array($p['id_produk'], $koleksiIds ?? []); ?>

        <div class="product-card">

<a href="<?= base_url('koleksi/simpan/' . $p['id_produk']) ?>"
   onclick="return koleksiConfirm();"
   class="btn-simpan"   
   title="Simpan ke koleksi">

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

                <div class="produk-lokasi">
                    📍 <?= esc($lokasiAktif['nama_lokasi']) ?>
                </div>

                <div class="produk-harga">
                    Rp <?= number_format($p['harga_sewa']) ?>
                    <span>/hari</span>
                </div>
            </div>

        </div>
        <?php endforeach; ?>

    </div>
</div>
<script>
document.querySelectorAll('.btn-simpan').forEach(btn => {
    btn.addEventListener('click', function (e) {

        e.preventDefault(); 

        const produkId = this.href.split('/').pop();
        const icon = this.querySelector('.icon-bookmark');

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

            if (data.status === 'saved') {
                this.classList.add('saved');
                toast('Disimpan ke koleksi');
            }

            if (data.status === 'removed') {
                this.classList.remove('saved');
                toast('Dihapus dari koleksi');
            }
        });
    });
});

function toast(text) {
    const el = document.createElement('div');
    el.innerText = text;
    el.style.cssText =
        "position:fixed;bottom:24px;left:50%;transform:translateX(-50%);" +
        "background:#000;color:#fff;padding:10px 18px;border-radius:20px;" +
        "font-size:14px;z-index:9999";
    document.body.appendChild(el);
    setTimeout(() => el.remove(), 1500);
}
</script>

<?= $this->include('user/layout/footer') ?>
