<?php
// header.php
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title><i>MyContact</i>- Sistem Manajemen Kontak</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root {
      --green: #16a34a;
      --green-soft: #e7f7ed;
      --border: #d4d4d8;
      --text-main: #111827;
      --text-muted: #4b5563;
      --bg: #f9fafb;
    }
    * { box-sizing:border-box; font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif; }
    body { margin:0; background:var(--bg); color:var(--text-main); }
    header {
      background:white;
      border-bottom:1px solid var(--border);
      padding:0.75rem 1.5rem;
      display:flex;
      justify-content:space-between;
      align-items:center;
    }
    .brand { font-weight:700; color:var(--green); font-size:1.1rem; }
    .container { max-width:960px; margin:1.5rem auto; padding:0 1rem; }
    .card {
      background:white;
      border:1px solid var(--border);
      border-radius:0.75rem;
      padding:1.25rem;
      margin-bottom:1.25rem;
    }
    h1,h2,h3 { margin:0; }
    h1 { font-size:1.7rem; margin-bottom:0.25rem; }
    h2 { font-size:1.3rem; margin-bottom:0.25rem; }
    p { margin:0.25rem 0; }
    .muted { color:var(--text-muted); font-size:0.9rem; }

    form label { display:block; font-size:0.85rem; margin-bottom:0.15rem; color:var(--text-muted); }
    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    textarea {
      width:100%;
      padding:0.5rem 0.65rem;
      border-radius:0.5rem;
      border:1px solid #e5e7eb;
      font-size:0.9rem;
    }
    textarea { resize:vertical; min-height:70px; }

    .row { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:0.75rem 1rem; }

    .btn {
      display:inline-block;
      padding:0.45rem 0.9rem;
      border-radius:999px;
      border:1px solid transparent;
      font-size:0.85rem;
      cursor:pointer;
      text-decoration:none;
    }
    .btn-primary { background:var(--green); color:white; border-color:var(--green); }
    .btn-outline { background:white; color:var(--text-main); border-color:var(--border); }
    .btn-danger { background:#dc2626; color:white; border-color:#b91c1c; }
    .btn + .btn { margin-left:0.4rem; }
    .btn-block { width:100%; text-align:center; }

    .message {
      padding:0.55rem 0.8rem;
      border-radius:0.5rem;
      font-size:0.85rem;
      margin-bottom:0.6rem;
    }
    .message.error { background:#fee2e2; color:#991b1b; border:1px solid #fecaca; }
    .message.success { background:#dcfce7; color:#166534; border:1px solid #bbf7d0; }

    table { width:100%; border-collapse:collapse; font-size:0.9rem; }
    th,td { padding:0.5rem 0.4rem; border-bottom:1px solid #e5e7eb; text-align:left; vertical-align:top; }
    th { background:#f3f4f6; font-weight:600; }
    td.actions { text-align:right; white-space:nowrap; }

    .login-box {
      max-width:380px;
      margin:4rem auto;
      background:white;
      border-radius:0.75rem;
      border:1px solid var(--border);
      padding:1.5rem;
    }
    .badge {
      display:inline-block;
      padding:0.25rem 0.6rem;
      border-radius:999px;
      font-size:0.75rem;
      background:var(--green-soft);
      color:var(--green);
    }
    @media (max-width:640px) {
      header { padding:0.5rem 1rem; }
      h1 { font-size:1.5rem; }
    }
  </style>
</head>
<body>

<header>
  <div class="brand"><i>MyContact</i>🌍</div>
  <div>
    <?php if (isset($_SESSION['user'])): ?>
      <span class="muted">Masuk sebagai: <?= h($_SESSION['user']) ?></span>
      <form action="" method="post" style="display:inline">
        <input type="hidden" name="action" value="logout">
        <button type="submit" class="btn btn-outline" style="margin-left:0.5rem;">Keluar</button>
      </form>
    <?php else: ?>
      <span class="muted">Sistem Manajemen Kontak Sederhana</span>
    <?php endif; ?>
  </div>
</header>
