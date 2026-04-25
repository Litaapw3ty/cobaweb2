<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Tambah Kategori</h3>

<form action="<?= base_url('admin/kategori/store') ?>" method="post">
    <div class="mb-3">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Icon (optional)</label>
        <input type="text" name="icon" class="form-control">
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/kategori') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
