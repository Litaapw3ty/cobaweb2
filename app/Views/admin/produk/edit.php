<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>


<h3>Edit Produk</h3>

<form action="<?= base_url('admin/produk/update/'.$produk['id_produk']) ?>" method="post" enctype="multipart/form-data">

<div class="mb-3">
    <label>Kategori</label>
    <select name="id_kategori" id="kategori" class="form-control" required>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori'] ?>"
                <?= $produk['id_kategori'] == $k['id_kategori'] ? 'selected' : '' ?>>
                <?= esc($k['nama_kategori']) ?>
            </option>
        <?php endforeach ?>
    </select>
</div>

<div class="mb-3">
    <label>Sub Kategori</label>
    <select name="id_sub_kategori" id="subKategori" class="form-control" required>
        <option value="">-- Pilih Sub Kategori --</option>
        <?php foreach ($subKategori as $s): ?>
            <option value="<?= $s['id_sub_kategori'] ?>"
                <?= $produk['id_sub_kategori'] == $s['id_sub_kategori'] ? 'selected' : '' ?>>
                <?= esc($s['nama_sub_kategori']) ?>
            </option>
        <?php endforeach ?>
    </select>
</div>

<div class="mb-3">
    <label>Lokasi</label>
    <select name="id_lokasi" class="form-control" required>
        <option value="">-- Pilih Lokasi --</option>
        <?php foreach ($lokasi as $l): ?>
            <option value="<?= $l['id_lokasi'] ?>"
                <?= $produk['id_lokasi'] == $l['id_lokasi'] ? 'selected' : '' ?>>
                <?= esc($l['nama_lokasi']) ?>
            </option>
        <?php endforeach ?>
    </select>
</div>


    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control"
               value="<?= esc($produk['nama_produk']) ?>" required>
    </div>

    <div class="mb-3">
        <label>Harga Sewa</label>
        <input type="number" name="harga_sewa" class="form-control"
               value="<?= $produk['harga_sewa'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control"
               value="<?= $produk['stok'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control">
        <?php if($produk['gambar']): ?>
            <img src="<?= base_url('images/'.$produk['gambar']) ?>" width="100" class="mt-2">
        <?php endif ?>
    </div>

    <div class="mb-3">
        <label>
            <input type="checkbox" name="is_popular" value="1"
                <?= $produk['is_popular'] ? 'checked' : '' ?>> Popular
        </label>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="aktif" <?= $produk['status']=='aktif'?'selected':'' ?>>Aktif</option>
            <option value="nonaktif" <?= $produk['status']=='nonaktif'?'selected':'' ?>>Nonaktif</option>
        </select>
    </div>

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4"><?= esc($produk['deskripsi']) ?></textarea>
<label>Spesifikasi</label>
    <textarea name="spesifikasi" class="form-control" rows="4"><?= esc($produk['spesifikasi']) ?></textarea>


    <button class="btn btn-success">Update</button>
    <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary">Kembali</a>
</form>
<script>
document.getElementById('kategori').addEventListener('change', function () {
    const kategoriId = this.value;
    const subSelect = document.getElementById('subKategori');

    subSelect.innerHTML = '<option>Loading...</option>';

    fetch('<?= base_url("admin/sub-kategori") ?>/' + kategoriId)
        .then(res => res.json())
        .then(data => {
            let html = '<option value="">-- Pilih Sub Kategori --</option>';
            data.forEach(item => {
                html += `<option value="${item.id_sub_kategori}">
                            ${item.nama_sub_kategori}
                         </option>`;
            });
            subSelect.innerHTML = html;
        });
});
</script>


<?= $this->endSection() ?>
