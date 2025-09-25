<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toll Manufacturing Request</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body{font-family:Inter,system-ui,Arial,sans-serif;background:#f6f7fb;margin:0;padding:0}
        .wrap{max-width:720px;margin:6rem auto;background:#fff;border-radius:12px;box-shadow:0 10px 25px rgba(0,0,0,.06);padding:2rem}
        .title{color:#1e40af;margin:0 0 10px;font-weight:600}
        .muted{color:#64748b}
        .pill{display:inline-block;background:#e0e7ff;color:#1e40af;padding:.25rem .6rem;border-radius:999px;font-size:.85rem}
        .btn{display:inline-block;background:#1d4ed8;color:#fff;text-decoration:none;padding:.6rem 1rem;border-radius:8px;margin-top:1rem}
        .small{font-size:.9rem}
    </style>
    <script>
        function copyLink(){
            navigator.clipboard.writeText(window.location.href).then(()=>{
                alert('Link copied');
            });
        }
    </script>
    </head>
<body>
    <div class="wrap">
        <h1 class="title">TMR Invitation</h1>
        <p class="muted small">Email target: <strong>{{ $invite->email }}</strong></p>
        <p class="muted small">Expired at: <span class="pill">{{ $invite->expires_at }}</span></p>
        <p>Undangan valid. Ini halaman dummy. Form TMR bertahap akan ditempatkan di sini.</p>
        <a class="btn" href="#" onclick="copyLink();return false;">Copy Link</a>
    </div>
</body>
</html>

