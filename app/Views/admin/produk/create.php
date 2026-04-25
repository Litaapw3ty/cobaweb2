<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h3>Tambah Produk</h3>

<form action="<?= base_url('admin/produk/store') ?>" method="post" enctype="multipart/form-data">

    <!-- KATEGORI -->
    <div class="mb-3">
        <label>Kategori</label>
        <select name="id_kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori'] ?>">
                    <?= esc($k['nama_kategori']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Sub Kategori</label>
        <select name="id_sub_kategori" id="subKategori" class="form-control" required>
            <option value="">-- Pilih Sub Kategori --</option>
        </select>
    </div>


    <!-- LOKASI -->
    <div class="mb-3">
        <label>Lokasi</label>
        <select name="id_lokasi" class="form-control" required>
            <option value="">-- Pilih Lokasi --</option>
            <?php foreach ($lokasi as $l): ?>
                <option value="<?= $l['id_lokasi'] ?>">
                    <?= esc($l['nama_lokasi']) ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <!-- NAMA PRODUK -->
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" class="form-control" required>
    </div>

    <!-- HARGA -->
    <div class="mb-3">
        <label>Harga Sewa / Hari</label>
        <input type="number" name="harga_sewa" class="form-control" required>
    </div>

    <!-- STOK -->
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>

    <!-- GAMBAR -->
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control">
    </div>

    <!-- POPULAR -->
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_popular" value="1" class="form-check-input" id="popular">
        <label class="form-check-label" for="popular">Popular Item</label>
    </div>

    <!-- STATUS -->
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control" required>
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
        </select>
    </div>

    <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
</div>

<div class="mb-3">
    <label>Spesifikasi</label>
    <textarea name="spesifikasi" class="form-control" rows="4"
        placeholder="- Sensor Full Frame&#10;- ISO 100–25600"></textarea>
</div>

    <button class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary">Kembali</a>

</form>

<script>
document.querySelector('select[name="id_kategori"]')
  .addEventListener('change', function () {

    const kategoriId = this.value;
    const subSelect  = document.getElementById('subKategori');

    if (!kategoriId) {
      subSelect.innerHTML = '<option value="">-- Pilih Sub Kategori --</option>';
      return;
    }

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
      })
      .catch(err => {
        console.error(err);
        subSelect.innerHTML = '<option>Error load data</option>';
      });
});
</script>


<?= $this->endSection() ?>
