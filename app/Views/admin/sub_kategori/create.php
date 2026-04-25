<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Tambah Sub Kategori</h3>

<form action="<?= base_url('admin/sub-kategori/store') ?>" method="post">

  <div class="mb-3">
    <label>Kategori</label>
    <select name="id_kategori" class="form-control" required>
      <?php foreach ($kategori as $k): ?>
        <option value="<?= $k['id_kategori'] ?>">
          <?= esc($k['nama_kategori']) ?>
        </option>
      <?php endforeach ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Nama Sub Kategori</label>
    <input type="text" name="nama_sub_kategori" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="<?= base_url('admin/sub-kategori') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
