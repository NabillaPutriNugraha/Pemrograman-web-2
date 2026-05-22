<?php
require 'Model.php';

$judul_form = "✨ Tambah Koleksi Buku Baru";
$tombol_label = "💾 Simpan Buku";
$judul_buku = "";
$penulis = "";
$penerbit = "";
$tahun_terbit = "";
$id_buku = "";

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    $buku = getBukuById($id_buku);
    
    if ($buku) {
        $judul_form = "✏️ Edit Data Koleksi Buku";
        $tombol_label = "🔄 Perbarui Buku";
        $judul_buku = $buku['judul_buku'];
        $penulis = $buku['penulis'];
        $penerbit = $buku['penerbit'];
        $tahun_terbit = $buku['tahun_terbit'];
    }
}

if (isset($_POST['submit'])) {
    $judul_input   = $_POST['judul_buku'];
    $penulis_input = $_POST['penulis'];
    $penerbit_input = $_POST['penerbit'];
    $tahun_input   = $_POST['tahun_terbit'];
    
    if (!empty($_POST['id_buku'])) {
        $id_update = $_POST['id_buku'];
        if (ubahBuku($id_update, $judul_input, $penulis_input, $penerbit_input, $tahun_input)) {
            header("Location: Buku.php");
            exit;
        }
    } else {
        if (tambahBuku($judul_input, $penulis_input, $penerbit_input, $tahun_input)) {
            header("Location: Buku.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul_form ?> - CuteLibrary</title>
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
      background: rgba(255, 255, 255, 0.95);
      border-radius: 20px;
      border: none;
      box-shadow: 0 8px 24px rgba(255, 182, 193, 0.4);
      max-width: 600px;
      margin: 0 auto;
    }
    .form-control {
      border: 2px solid #ffe5ec;
      border-radius: 12px;
      padding: 10px 15px;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      border-color: #ff758f;
      box-shadow: 0 0 0 0.25rem rgba(255, 117, 143, 0.25);
    }
    .btn-cute-submit {
      background: linear-gradient(45deg, #ff758f, #ff8fab);
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: bold;
      padding: 10px 20px;
      transition: all 0.3s ease;
    }
    .btn-cute-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 117, 143, 0.4);
      color: white;
    }
    .btn-cute-back {
      background-color: #f8f9fa;
      color: #6c757d;
      border: 2px solid #e9ecef;
      border-radius: 12px;
      font-weight: bold;
      padding: 10px 20px;
    }
    .btn-cute-back:hover {
      background-color: #e9ecef;
    }
  </style>
</head>
<body>

  <?php require 'Navbar.php'; ?>

  <div class="container py-2">
    <div class="card cute-card p-4 shadow">
      <h3 class="fw-bold text-danger text-center mb-4"><?= $judul_form ?></h3>
      
      <form action="" method="POST">
        <input type="hidden" name="id_buku" value="<?= $id_buku ?>">

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Judul Buku</label>
          <input type="text" name="judul_buku" class="form-control" placeholder="Contoh: Manusia Setengah Salmon" value="<?= htmlspecialchars($judul_buku) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Nama Penulis</label>
          <input type="text" name="penulis" class="form-control" placeholder="Contoh: Raditya Dika" value="<?= htmlspecialchars($penulis) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Penerbit</label>
          <input type="text" name="penerbit" class="form-control" placeholder="Contoh: GagasMedia" value="<?= htmlspecialchars($penerbit) ?>" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-bold text-secondary">Tahun Terbit</label>
          <input type="number" name="tahun_terbit" class="form-control" placeholder="Contoh: 2011" value="<?= $tahun_terbit ?>" required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="Buku.php" class="btn btn-cute-back">🌸 Kembali</a>
          <button type="submit" name="submit" class="btn btn-cute-submit"><?= $tombol_label ?></button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>