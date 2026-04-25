<aside class="sidebar">
    <h2 class="logo">Sturent</h2>

    <ul class="menu">
        <li class="<?= service('uri')->getSegment(2)=='dashboard'?'active':'' ?>">
            <a href="<?= base_url('admin/dashboard') ?>">Dashboard</a>
        </li>

        <p class="menu-title">Manajemen</p>

        <li>
            <a href="<?= base_url('admin/produk') ?>">Produk</a>
        </li>
        <li>
            <a href="<?= base_url('admin/stok') ?>">Stok Produk</a>
        </li>
        <li>
            <a href="<?= base_url('admin/kategori') ?>">Kategori</a>
        </li>
        <li>
            <a href="<?= base_url('admin/sub-kategori') ?>">Sub Kategori</a>
        </li>
        <li>
            <a href="<?= base_url('admin/lokasi') ?>">Lokasi</a>
        </li>

</aside>