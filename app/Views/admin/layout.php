<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">
<div class="bg-dark text-white p-3" style="width:240px">
<h5>Sturent Admin</h5>
<a href="/admin/produk" class="text-white d-block">Produk</a>
<a href="/admin/lokasi" class="text-white d-block">Lokasi</a>
</div>
<div class="p-4 flex-fill">
<?= $this->renderSection('content') ?>
</div>
</div>
</body>
</html>