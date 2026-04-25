<?= $this->extend('layout/header.php'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="/css/about.css">

<div class="section about-section">
        <h1>About Us</h1>
        <p>
            Selamat datang di Sturent — platform penyewaan peralatan studio terbaik untuk para kreator modern.  
            Kami hadir untuk membantu para fotografer, videografer, dan konten kreator mendapatkan akses peralatan profesional tanpa harus membeli mahal.  
            Dengan layanan cepat, harga terjangkau, dan peralatan berkualitas, kami ingin menjadi partner perjalanan kreatif Anda.
        </p>
    </div>
</div>


<div class="section why-section">
    <span class="tag">Tentang Kami</span>

    <h1 class="why-title">
        Mitra Terpercaya untuk <span>Produksi Kreatif</span> Anda
    </h1>

    <p class="why-desc">
        Selamat datang di Sturent, platform penyewaan peralatan studio terdepan di Indonesia. 
        Kami hadir untuk mendobrak batasan dalam produksi kreatif dengan menyediakan akses ke 
        peralatan profesional tanpa investasi besar.
    </p>

    <ul class="why-list">
        <li>
            <div class="icon-box">
                <i class="ri-camera-3-line"></i>
            </div>
            <div class="text">
                <h3>Katalog Lengkap</h3>
                <p>Akses ke kamera, lensa, lighting, dan aksesoris audio terbaik di industri.</p>
            </div>
        </li>

        <li>
            <div class="icon-box">
                <i class="ri-flashlight-line"></i>
            </div>
            <div class="text">
                <h3>Proses Anti Ribet</h3>
                <p>Sistem reservasi intuitif dan efisien untuk memudahkan Anda.</p>
            </div>
        </li>

        <li>
            <div class="icon-box">
                <i class="ri-shield-check-line"></i>
            </div>
            <div class="text">
                <h3>Kualitas Terjamin</h3>
                <p>Setiap unit dirawat oleh teknisi ahli dan siap digunakan di proyek Anda.</p>
            </div>
        </li>
    </ul>
</div>

<div class="section team-section">
    <h1>Our Team</h1>
    <div class="team-images">
        <img src="/images/team1.jpeg" alt="Team 1">
        <img src="/images/team2.jpeg" alt="Team 2">
    </div>
</div>

<div class="section partner-section">
    <h1>Our Partner Studio</h1>
    <div class="partner-logos">
        <div class="foto"><img src="/images/inbex.png"></div>
        <div class="foto"><img src="/images/sony.png"></div>
        <div class="foto"><img src="/images/canon.png"></div>
        <div class="foto"><img src="/images/godox.png"></div>
        <div class="foto"><img src="/images/fuji.png"></div>
    </div>

    <p class="partner-text">
        Sebagai penyedia penyewaan alat studio, kami bangga telah dipercaya oleh fotografer,
        videografer, komunitas kreatif, hingga brand ternama. Bersama Sturent, peralatan berkualitas
        menjadi Partner Terbaik untuk Karyamu.
    </p>
</div>

<?= $this->endSection(); ?>
<?= $this->include('user/layout/footer') ?>
