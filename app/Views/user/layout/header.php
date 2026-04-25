<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sturent Studio</title>

    <link rel="stylesheet" href="<?= base_url('css/navbar.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/home.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/footer.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/category.css') ?>">
</head>

<body>

<nav class="navbar">
    <div class="nav-left">
        <img src="<?= base_url('images/brand-logo-hitam.jpg') ?>" width="36">
        <h2>Sturent</h2>
    </div>

    <div class="nav-center">
        <ul class="nav-menu">
            <li><a href="/" class="<?= uri_string() == '' ? 'active' : '' ?>">Beranda</a></li>
            <li><a href="<?= base_url('/') ?>#kategori" id="navKategori">Kategori</a></li>
            <li><a href="/koleksi">Koleksi</a></li>

            <li class="nav-item lokasi-menu">
                <a href="javascript:void(0)" id="lokasiToggle">
                    Lokasi <span class="arrow">▾</span>
                </a>

                <ul class="lokasi-dropdown" id="lokasiDropdown">
                    <?php foreach ($lokasi ?? [] as $l): ?>
                        <li>
                            <a href="<?= base_url('produk/lokasi/'.$l['id_lokasi']) ?>">
                                <?= esc($l['nama_lokasi']) ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </li>
        </ul>
    </div>

    <div class="nav-right">

       <form action="<?= base_url('search') ?>" method="get" class="search-bar">
            <input type="text" name="q" placeholder="Cari..." value="<?= isset($keyword) ? esc($keyword) : '' ?>" required>
            <button type="submit" style="display: none;">Cari</button>
        </form>

        <div class="user-icon">
            <?php if (session()->get('logged_in')): ?>
                <a href="/logout">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
            <?php endif ?>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Logic Dropdown Lokasi
    const toggle = document.getElementById('lokasiToggle');
    const dropdown = document.getElementById('lokasiDropdown');

    if(toggle && dropdown) {
        toggle.addEventListener('click', e => {
            e.stopPropagation();
            dropdown.classList.toggle('show');
        });

        document.addEventListener('click', () => {
            dropdown.classList.remove('show');
        });
    }
});
</script>

</body>