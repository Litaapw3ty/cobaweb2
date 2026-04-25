<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h2>Inventori Stok Produk</h2>

<table border="1" cellpadding="10" width="100%">
    <tr>
        <th>Produk</th>
        <th>Stok Total</th>
        <th>Dipakai</th>
        <th>Tersedia</th>
        <th>Status</th>
    </tr>

    <?php foreach ($stok as $s): ?>
    <tr>
        <td><?= esc($s['nama_produk']) ?></td>
        <td><?= $s['stok_total'] ?></td>
        <td><?= $s['stok_dipakai'] ?></td>
        <td><?= $s['stok_tersedia'] ?></td>
        <td>
            <?php if ($s['stok_tersedia'] <= 0): ?>
                <span style="color:red;font-weight:bold">Habis</span>
            <?php elseif ($s['stok_tersedia'] <= 2): ?>
                <span style="color:orange;font-weight:bold">Hampir Habis</span>
            <?php else: ?>
                <span style="color:green;font-weight:bold">Aman</span>
            <?php endif ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>