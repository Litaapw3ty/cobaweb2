<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="card">
    <h2 style="margin-bottom:15px;">Data Pesanan</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>User</th>
                <th>Periode</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($sewa)): ?>
            <?php foreach ($sewa as $s): ?>
            <tr>
                <td><?= esc($s['produk']) ?></td>
                <td>User #<?= esc($s['id_user']) ?></td>
                <td>
                    <?= date('d M Y', strtotime($s['tanggal_sewa'])) ?><br>
                    s/d <?= date('d M Y', strtotime($s['tanggal_kembali'])) ?>
                </td>

                <!-- STATUS -->
                <td>
                    <?php if ($s['status'] === 'pending'): ?>
                        <span class="badge pending">Pending</span>
                    <?php elseif ($s['status'] === 'aktif'): ?>
                        <span class="badge aktif">Sedang Disewa</span>
                    <?php else: ?>
                        <span class="badge selesai">Selesai</span>
                    <?php endif ?>
                </td>

                <!-- AKSI -->
                <td>
                    <?php if ($s['status'] === 'pending'): ?>

                        <form action="<?= base_url('admin/sewa/konfirmasi/'.$s['id_sewa']) ?>"
                              method="post"
                              style="display:inline;"
                              onsubmit="return confirm('Konfirmasi pesanan ini?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-success">
                                Konfirmasi
                            </button>
                        </form>

                    <?php elseif ($s['status'] === 'aktif'): ?>

                        <form action="<?= base_url('admin/sewa/selesai/'.$s['id_sewa']) ?>"
                              method="post"
                              style="display:inline;"
                              onsubmit="return confirm('Selesaikan pesanan ini?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger">
                                Selesaikan
                            </button>
                        </form>

                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center;">
                    Belum ada pesanan
                </td>
            </tr>
        <?php endif ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>