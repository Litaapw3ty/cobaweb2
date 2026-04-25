<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Edit Kategori</h3>

<form action="<?= base_url('admin/kategori/update/'.$kategori['id_kategori']) ?>" method="post">
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control"
               value="<?= esc($kategori['nama_kategori']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Icon</label>
        <input type="text" name="icon" class="form-control"
               value="<?= esc($kategori['icon']) ?>">
    </div>
    <button class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/kategori') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
