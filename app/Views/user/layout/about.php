<?= $this->include('user/layout/header') ?>

<link rel="stylesheet" href="/css/about.css">
<link rel="stylesheet" href="/css/home.css">

<div class="section about-section">
    <h1>About Us</h1>
    <p>
        Selamat datang di Sturent, platform penyewaan peralatan studio terdepan di Indonesia.
        Kami hadir untuk mendobrak batasan dalam produksi kreatif. Kami mengerti betul bahwa
        memiliki peralatan fotografi dan videografi profesional membutuhkan investasi besar,
        yang sering kali menjadi penghalang bagi para kreator baru maupun yang sudah mapan.
    </p>
</div>

<div class="section why-section">
    <h1 class="why-title">
        Mengapa <span>Sturent</span> Layak Dipilih?
    </h1>

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
        <div class="team-item">
            <img src="/images/team1.jpeg" alt="Team 1">
            <p class="team-name">Proplayer</p>
        </div>

        <div class="team-item">
            <img src="/images/team2.jpeg" alt="Team 2">
            <p class="team-name">Proplayer</p>
        </div>

        <div class="team-item">
            <img src="/images/team2.jpeg" alt="Team 2">
            <p class="team-name">Proplayer</p>
        </div>

    </div>
</div>

<div class="section partner-section">
    <h1>Our Partner Studio</h1>

    <div class="partner-slider">
        <div class="partner-track">
            <img src="/images/partner1.jpg">
            <img src="/images/partner2.jpg">
            <img src="/images/partner3.jpg">
            <img src="/images/partner4.jpg">
            <img src="/images/partner5.jpg">
            <!-- looping -->
            <img src="/images/partner1.jpg">
            <img src="/images/partner2.jpg">
            <img src="/images/partner3.jpg">
            <img src="/images/partner4.jpg">
            <img src="/images/partner5.jpg">
        </div>
    </div>

    <p class="partner-text">
        Sebagai penyedia penyewaan alat studio, kami bangga telah dipercaya oleh fotografer,
        videografer, komunitas kreatif, hingga brand ternama. Bersama Sturent, peralatan berkualitas
        menjadi Partner Terbaik untuk Karyamu.
    </p>
</div>

<?= $this->include('user/layout/footer') ?>