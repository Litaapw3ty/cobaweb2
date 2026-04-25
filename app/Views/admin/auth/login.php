<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>

<h3>Login Admin</h3>

<?php if(session()->getFlashdata('error')): ?>
    <p style="color:red"><?= session()->getFlashdata('error') ?></p>
<?php endif ?>

<form method="post" action="<?= base_url('admin/login') ?>">
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
