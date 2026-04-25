<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mengalihkan ke WhatsApp...</title>
</head>
<body style="font-family:Arial; text-align:center; padding:40px;">

    <h3>Mengalihkan ke WhatsApp…</h3>
    <p>Jika tidak otomatis, klik tombol di bawah:</p>

    <a href="<?= esc($urlWa) ?>"
       style="
        display:inline-block;
        padding:12px 20px;
        background:#25D366;
        color:white;
        border-radius:8px;
        text-decoration:none;
        font-weight:bold;">
        Buka WhatsApp
    </a>

    <script>
        setTimeout(() => {
            window.location.href = "<?= esc($urlWa) ?>";
        }, 500);
    </script>

</body>
</html>