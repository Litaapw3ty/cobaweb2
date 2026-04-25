<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/log.css') ?>">

    <style>
        .error-msg {
            font-size: 12px;
            color: red;
            margin-top: 4px;
        }
    </style>
</head>

<body>

<div class="register-container">

    <!-- LEFT PANEL -->
    <div class="left-panel">
        <div class="welcome-box">
            <h2 class="logo">Sturent</h2>
            <h1 class="welcome-title">
                Selamat <span>Datang!</span>
            </h1>
            <p>
                Ciptakan Karya Hebat, Mulai dari Sini. <br>
                Daftar sekarang dan temukan berbagai peralatan terbaik untuk mendukung setiap karyamu.
            </p>
        </div>
    </div>

    <!-- FORM -->
    <div class="form-box">
        <h2 class="form-title">Buat Akun</h2>

        <?php if (session('errors')) : ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

<form action="<?= url_to('register') ?>" method="post">
    <?= csrf_field() ?>

    <input type="text" name="username" class="form-control mt-3"
           placeholder="Nama Lengkap" required>

    <input type="email" name="email" class="form-control mt-3"
           placeholder="Email" required>

    <input type="password" name="password" id="password"
           class="form-control mt-3" placeholder="Buat Kata Sandi" required>

    <div id="password-hint" style="display:none;font-size:12px">
        Password minimal 8 karakter
    </div>

    <input type="password" name="pass_confirm" id="pass_confirm"
           class="form-control mt-3" placeholder="Ulangi Kata Sandi" required>

    <small id="confirm-hint" style="display:none;color:red">
        Konfirmasi password tidak sama
    </small>

    <button type="submit" class="btn register-btn mt-4">Daftar</button>
</form>

        <p class="login-text mt-3">
            Sudah punya akun?
            <a href="<?= url_to('login') ?>">Masuk di sini</a>
        </p>
    </div>
</div>
<script>
const passwordInput = document.getElementById('password');
const hint = document.getElementById('password-hint');

const rules = {
    length: document.getElementById('rule-length'),
    upper: document.getElementById('rule-upper'),
    lower: document.getElementById('rule-lower'),
    number: document.getElementById('rule-number'),
};

passwordInput.addEventListener('focus', () => {
    hint.style.display = 'block';
});

passwordInput.addEventListener('blur', () => {
    if (passwordInput.value === '') {
        hint.style.display = 'none';
    }
});

passwordInput.addEventListener('input', () => {
    const val = passwordInput.value;

    toggleRule(rules.length, val.length >= 8);
    toggleRule(rules.upper, /[A-Z]/.test(val));
    toggleRule(rules.lower, /[a-z]/.test(val));
    toggleRule(rules.number, /[0-9]/.test(val));
});

function toggleRule(el, valid) {
    el.classList.toggle('valid', valid);
    el.classList.toggle('invalid', !valid);
}
</script>

<script>
const confirmInput = document.getElementById('pass_confirm');
const confirmHint  = document.getElementById('confirm-hint');

confirmInput.addEventListener('input', () => {
    if (confirmInput.value !== passwordInput.value) {
        confirmHint.style.display = 'block';
    } else {
        confirmHint.style.display = 'none';
    }
});
</script>



</body>
</html>
