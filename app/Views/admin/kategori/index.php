<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Data Kategori</h3>
<a href="<?= base_url('admin/kategori/create') ?>" class="btn btn-primary mb-3">+ Tambah</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Icon</th>
        <th>Aksi</th>
    </tr>
    <?php $no=1; foreach($kategori as $k): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= esc($k['nama_kategori']) ?></td>
        <td><?= esc($k['icon']) ?></td>
        <td>
            <a href="<?= base_url('admin/kategori/edit/'.$k['id_kategori']) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('admin/kategori/delete/'.$k['id_kategori']) ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>
