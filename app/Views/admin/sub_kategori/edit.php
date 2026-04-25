<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Edit</h3>

<form action="<?= base_url('admin/sub-kategori/store') ?>" method="post">

<div class="mb-3">
    <label>Sub Kategori</label>
    <select name="id_sub_kategori" id="subKategori" class="form-control" required>
        <?php foreach ($subKategori as $s): ?>
            <option value="<?= $s['id_sub_kategori'] ?>"
              <?= ($s['id_sub_kategori'] == $produk['id_sub_kategori']) ? 'selected' : '' ?>>
              <?= esc($s['nama_sub_kategori']) ?>
            </option>
        <?php endforeach ?>
    </select>
</div>

<?= $this->endSection() ?>
