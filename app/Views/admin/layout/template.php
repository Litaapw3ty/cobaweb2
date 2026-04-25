<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Sturent' ?></title>

    <link rel="stylesheet" href="<?= base_url('css/dashboard.css') ?>">
</head>
<body>

<div class="admin-wrapper">

    <?= $this->include('admin/layout/sidebar') ?>

    <main class="content">
        <?= $this->include('admin/layout/header') ?>

        <!-- ISI HALAMAN -->
        <?= $this->renderSection('content') ?>
    </main>

</div>

</body>
</html>