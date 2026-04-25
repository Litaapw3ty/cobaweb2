<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Data Lokasi</h3>

<a href="<?= base_url('admin/lokasi/create') ?>" class="btn btn-primary mb-3">
  + Tambah Lokasi
</a>

<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Nama Lokasi</th>
    <th>Slug</th>
    <th>Aksi</th>
  </tr>

  <?php $no = 1; foreach ($lokasi as $l): ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= esc($l['nama_lokasi']) ?></td>
    <td><?= esc($l['slug']) ?></td>
    <td>
      <a href="<?= base_url('admin/lokasi/edit/'.$l['id_lokasi']) ?>" class="btn btn-warning btn-sm">Edit</a>
      <a href="<?= base_url('admin/lokasi/delete/'.$l['id_lokasi']) ?>"
         class="btn btn-danger btn-sm"
         onclick="return confirm('Hapus lokasi?')">Hapus</a>
    </td>
  </tr>
  <?php endforeach ?>
</table>

<?= $this->endSection() ?>
