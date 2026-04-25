<?= $this->include('user/layout/header') ?>
<link rel="stylesheet" href="<?= base_url('css/sewa.css') ?>">

<div class="produk-container">

    <h4 class="section-title">
        <a href="/">Home</a> / Sewa
    </h4>

    <div class="produk-flex">

        <div class="produk-kiri">

            <div class="produk-gambar">
                <img src="<?= base_url('assets/img/'.$produk['gambar']) ?>">
            </div>

            <h2 class="produk-nama"><?= esc($produk['nama_produk']) ?></h2>

            <div class="rating-block">
                📌 <?= esc($produk['nama_lokasi'] ?? '-') ?>
            </div>

            <div class="harga">
                <div class="harga-besar">
                    Rp <?= number_format($produk['harga_sewa'], 0, ',', '.') ?>/hari
                </div>
            </div>

            <h3>Deskripsi</h3>
            <p class="produk-deskripsi">
                <?= esc($produk['deskripsi'] ?? 'Tidak ada deskripsi') ?>
            </p>

        </div>

        <div class="divider-vertikal"></div>

<!--form sewa-->
        <div class="produk-detail detail-background">

            <div class="form-sewa-card">

                <h3 class="form-title">
                    Form Penyewaan <span class="merah">*wajib</span>
                </h3>

                <form action="<?= base_url('sewa/bookingWA') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                    <input type="hidden" name="durasi" value="<?= $durasi ?? 1 ?>">
                    <input type="hidden" name="total_harga" value="<?= $total ?? 0 ?>">

                    <label class="label">Nama Lengkap<span class="merah">*</span></label>
                    <div class="input-box">
                        <input type="text" name="nama" placeholder="Nama sesuai KTP" required>
                    </div>

                    <label class="label">No Telepon<span class="merah">*</span></label>
                    <div class="input-box">
                        <input type="text" name="telp" placeholder="08xxxxxxxxxx" required>
                    </div>

                    <label class="label">NIK<span class="merah">*</span></label>
                    <div class="input-box">
                        <input type="text" name="nik" placeholder="16 digit NIK" required>
                    </div>

                    <label class="label">Tanggal Mulai Sewa<span class="merah">*</span></label>
                    <div class="input-box">
                        <input type="date" name="tanggal_sewa" required>
                    </div>

                    <label class="label">Catatan (opsional)</label>
                    <textarea class="catatan-box"
                              name="catatan"
                              placeholder="Tulis catatan jika ada..."></textarea>

                    <div class="note-box">
                        <b>Note:</b><br>
                        Pengambilan barang dilakukan langsung di studio.
                        Tidak tersedia layanan antar.
                    </div>

                    <div class="total-wrapper">
                        <span class="total-label">Total Harga</span>
                        <span class="total-harga">
                            Rp <?= number_format($total, 0, ',', '.') ?>
                        </span>
                    </div>

                    <button type="button" id="wa-button" class="btn-konfirmasi">
                        Konfirmasi via WhatsApp
                    </button>

                    <script>
                    (function(){
                      const btn = document.getElementById('wa-button');
                      btn.addEventListener('click', function(){
                        const form = this.closest('form');
                        const nama = form.nama.value || '-';
                        const telp = form.telp.value || '-';
                        const nik = form.nik.value || '-';
                        const tanggal = form.tanggal_sewa.value || '-';
                        const catatan = form.catatan.value || '-';
                        const id_produk = form.id_produk.value || '-';
                        const durasi = form.durasi.value || '-';
                        const total = form.total_harga.value || '0';

                        const message = [
                          'Halo, saya ingin menyewa produk (ID: ' + id_produk + ').',
                          'Nama: ' + nama,
                          'Telp: ' + telp,
                          'NIK: ' + nik,
                          'Tanggal mulai: ' + tanggal,
                          'Durasi: ' + durasi + ' hari',
                          'Total: Rp ' + total,
                          'Catatan: ' + catatan
                        ].join('\n');

                        const phone = '6285975244284';
                        const url = 'https://wa.me/' + phone + '?text=' + encodeURIComponent(message);

                        window.open(url, '_blank');
                      });
                    })();
                    </script>
                </form>
            </div>
        </div>
    </div>

    <?php if (!empty($rekomendasi)): ?>
  <h3 class="rekomendasi-title">Rekomendasi</h3>

  <div class="rekomendasi-grid">
    <?php foreach ($rekomendasi as $r): ?>
      <a href="<?= base_url('produk/'.$r['id_produk']) ?>" class="rek-link">
        <div class="rek-card">
          <img src="<?= base_url('assets/img/'.$r['gambar']) ?>">
          <h4><?= esc($r['nama_produk']) ?></h4>
          <span>📍 <?= esc($r['nama_lokasi'] ?? '-') ?></span>
          <b class="rek-harga">
            Rp <?= number_format($r['harga_sewa'], 0, ',', '.') ?>/hari
          </b>
        </div>
      </a>
    <?php endforeach ?>
  </div>
<?php endif ?>
</div>

<?= $this->include('user/layout/footer') ?>

