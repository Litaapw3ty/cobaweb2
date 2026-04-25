<?= $this->include('user/layout/header') ?>
<link rel="stylesheet" href="<?= base_url('css/sewa.css') ?>">

<form action="<?= base_url('sewa/bookingWA') ?>" method="post">
<?= csrf_field() ?>

    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
    <input type="hidden" name="durasi" value="<?= $durasi ?>">
    <input type="hidden" name="total" value="<?= $total ?>">

    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>No HP</label>
    <input type="text" name="telp" required>

    <label>NIK</label>
    <input type="text" name="nik" required>

    <label>Tanggal Mulai Sewa</label>
    <input type="date" name="tanggal_sewa" required>

    <label>Catatan</label>
    <textarea name="catatan"></textarea>

    <button type="submit">Konfirmasi via WhatsApp</button>
</form>

<?= $this->include('user/layout/footer') ?>
