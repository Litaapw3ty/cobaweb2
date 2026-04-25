<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Tambah Lokasi</h3>

<form action="<?= base_url('admin/lokasi/store') ?>" method="post">
  <div class="mb-3">
    <label>Nama Lokasi</label>
    <input type="text" name="nama_lokasi" class="form-control" required>
  </div>

  <button class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('admin/lokasi') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
