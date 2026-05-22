<?php
require 'Model.php';

$totalBuku = count(getSemuaBuku());
$totalMember = count(getSemuaMember());
$totalPinjam = count(getSemuaPeminjaman());
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - CuteLibrary</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
  
  <style>
    body {
      font-family: 'Quicksand', sans-serif;
      background: linear-gradient(135deg, #ffe5ec 0%, #ffc2d1 100%);
      background-image: url('https://www.transparenttextures.com/patterns/lined-paper.png'); 
      min-height: 100vh;
    }
    .cute-card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      border: none;
      box-shadow: 0 8px 24px rgba(255, 182, 193, 0.4);
      transition: transform 0.3s ease;
    }
    .cute-card:hover {
      transform: translateY(-5px);
    }
    .welcome-box {
      background: linear-gradient(135deg, #fff0f3, #ffe5ec);
      border-left: 5px solid #ff758f;
      border-radius: 15px;
    }
  </style>
</head>
<body>

  <?php require 'Navbar.php'; ?>

  <div class="container">
    <div class="welcome-box p-4 mb-4 shadow-sm text-center">
      <h1 class="fw-bold text-danger">Selamat Datang di CuteLibrary! ✨</h1>
      <p class="text-muted fs-5 mb-0">Kelola data perpustakaan jadi lebih menyenangkan dan penuh warna~ 💕</p>
    </div>

    <div class="row g-4 text-center">
      <div class="col-md-4">
        <div class="card cute-card p-3">
          <div class="card-body">
            <h1 class="display-4">📚</h1>
            <h4 class="fw-bold text-secondary">Total Buku</h4>
            <h2 class="fw-bold text-danger"><?= $totalBuku ?></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card cute-card p-3">
          <div class="card-body">
            <h1 class="display-4">👑</h1>
            <h4 class="fw-bold text-secondary">Total Member</h4>
            <h2 class="fw-bold text-danger"><?= $totalMember ?></h2>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card cute-card p-3">
          <div class="card-body">
            <h1 class="display-4">🔄</h1>
            <h4 class="fw-bold text-secondary">Peminjaman Aktif</h4>
            <h2 class="fw-bold text-danger"><?= $totalPinjam ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>