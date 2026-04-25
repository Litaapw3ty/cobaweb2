<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/log.css') ?>">
</head>

<body>
<div class="register-container">

    <!-- LEFT PANEL -->
    <div class="left-panel">
        <div class="welcome-box">
            <h2 class="logo">Sturent</h2>
            <h1 class="welcome-title">
                Selamat Datang<span> Kembali!</span>
            </h1>
            <p>
                Siap Berkarya Lagi? <br>
                Masuk dan wujudkan produksi visual terbaikmu sekarang.
            </p>
        </div>
    </div>

    <!-- FORM -->
    <div class="form-box">
        <h2 class="form-title">Masuk</h2>

        <?php if (session('error')) : ?>
            <div class="alert alert-danger">
                <?= session('error') ?>
            </div>
        <?php endif ?>

            <form action="<?= url_to('login') ?>" method="post">
            <?= csrf_field() ?>

            <!-- Myth/Auth pakai "login" -->
            <input
                type="text"
                name="login"
                class="form-control mt-3"
                placeholder="Email atau Username"
                required
            >

            <input
                type="password"
                name="password"
                class="form-control mt-3"
                placeholder="Kata Sandi"
                required
            >

            <?php if (config('Auth')->allowRemembering): ?>
                <div class="form-check mt-3 mb-4">
                    <input class="form-check-input" type="checkbox" name="remember">
                    <label class="form-check-label">Ingat Saya</label>
                </div>
            <?php endif; ?>

            <button type="submit" class="register-btn">
                Masuk
            </button>

            <div class="garis">
                <span class="divider-text">atau</span>
            </div>

            <a href="<?= url_to('register') ?>"
               class="btn btn-outline-dark w-100 rounded-pill">
                Buat Akun Baru
            </a>

            <!-- <?php if (config('Auth')->activeResetter): ?>
                <p class="login-text mt-3">
                    Lupa kata sandi?
                    <a href="<?= url_to('forgot') ?>">Klik di sini</a>
                </p>
            <?php endif; ?> -->
        </form>
    </div>
</div>
</body>
</html>
