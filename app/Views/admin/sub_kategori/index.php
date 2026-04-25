<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>


<h3>Sub Kategori</h3>

<a href="<?= base_url('admin/sub-kategori/create') ?>">
  + Tambah Sub Kategori
</a>

<table class="table table-bordered">
<tr>
  <th>Kategori</th>
  <th>Sub Kategori</th>
  <th>Aksi</th>
</tr>

<?php foreach ($subKategori as $s): ?>
<tr>
  <td><?= esc($s['nama_kategori']) ?></td>
  <td><?= esc($s['nama_sub_kategori']) ?></td>
  <td>
    <a href="<?= base_url('admin/sub-kategori/delete/'.$s['id_sub_kategori']) ?>"
       class="btn btn-sm btn-danger"
       onclick="return confirm('Hapus?')">Hapus</a>
    <a href="<?= base_url('admin/sub-kategori/edit/'.$s['id_sub_kategori']) ?>"
       class="btn btn-sm btn-danger">Edit</a>
  </td>
</tr>
<?php endforeach ?>

</table>
<?= $this->endSection() ?>