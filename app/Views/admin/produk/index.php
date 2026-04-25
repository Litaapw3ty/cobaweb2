<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Data Produk</h3>
<a href="<?= base_url('admin/produk/create') ?>" class="btn btn-primary mb-3">+ Tambah Produk</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Sub Kategori</th>
            <th>Lokasi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Popular</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($produk as $p): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($p['nama_produk']) ?></td>
            <td><?= esc($p['nama_kategori']) ?></td>
            <td><?= esc($p['nama_sub_kategori'] ?? '-') ?></td>
            <td><?= esc($p['nama_lokasi'] ?? '-') ?></td>
            <td>Rp <?= number_format($p['harga_sewa']) ?></td>
            <td><?= $p['stok'] ?></td>
            <td>
                <?php if($p['gambar']): ?>
                    <img src="<?= base_url('assets/img/' . $p['gambar']) ?>" alt="<?= esc($p['nama_produk']) ?>" style="max-width: 100px;">
                <?php endif ?>
            </td>
            <td><?= $p['is_popular'] ? 'Ya' : 'Tidak' ?></td>
            <td><?= $p['status'] ?></td>
            <td>
                <a href="<?= base_url('admin/produk/edit/' . $p['id_produk']) ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="<?= base_url('admin/produk/delete/' . $p['id_produk']) ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>
