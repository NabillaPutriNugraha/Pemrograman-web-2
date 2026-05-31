<?php
date_default_timezone_set('Asia/Makassar');  

require 'Model.php';

$judul_form = "✨ Catat Peminjaman Buku";
$tombol_label = "💾 Simpan Transaksi";
$id_member_selected = "";
$id_buku_selected = "";
$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+7 days')); 
$id_peminjaman = "";

$opsiMember = getSemuaMember();
$opsiBuku = getSemuaBuku();

if (isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];
    $pinjam = getPeminjamanById($id_peminjaman);
    
    if ($pinjam) {
        $judul_form = "✏️ Edit Transaksi Peminjaman";
        $tombol_label = "🔄 Perbarui Transaksi";
        $id_member_selected = $pinjam['id_member'];
        $id_buku_selected = $pinjam['id_buku'];
        $tgl_pinjam = $pinjam['tgl_pinjam'];
        $tgl_kembali = $pinjam['tgl_kembali'];
    }
}

if (isset($_POST['submit'])) {
    $id_member_input = $_POST['id_member'];
    $id_buku_input   = $_POST['id_buku'];
    $tgl_pinjam_input = $_POST['tgl_pinjam'];
    $tgl_kembali_input = $_POST['tgl_kembali'];
    
    if (!empty($_POST['id_peminjaman'])) {
        $id_update = $_POST['id_peminjaman'];
        if (ubahPeminjaman($id_update, $id_member_input, $id_buku_input, $tgl_pinjam_input, $tgl_kembali_input)) {
            header("Location: Peminjaman.php");
            exit;
        }
    } else {
        if (tambahPeminjaman($id_member_input, $id_buku_input, $tgl_pinjam_input, $tgl_kembali_input)) {
            header("Location: Peminjaman.php");
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
    .form-select, .form-control {
      border: 2px solid #ffe5ec;
      border-radius: 12px;
      padding: 10px 15px;
      transition: all 0.3s ease;
    }
    .form-select:focus, .form-control:focus {
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
        <input type="hidden" name="id_peminjaman" value="<?= $id_peminjaman ?>">

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Pilih Member Peminjam</label>
          <select name="id_member" class="form-select" required>
            <option value="">-- Siapa yang mau pinjam? 👑 --</option>
            <?php foreach ($opsiMember as $m) : ?>
              <option value="<?= $m['id_member'] ?>" <?= ($m['id_member'] == $id_member_selected) ? 'selected' : '' ?>>
                <?= htmlspecialchars($m['nama_member']) ?> (<?= htmlspecialchars($m['nomor_member']) ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Pilih Buku yang Dipinjam</label>
          <select name="id_buku" class="form-select" required>
            <option value="">-- Buku apa yang dipinjam? 📖 --</option>
            <?php foreach ($opsiBuku as $b) : ?>
              <option value="<?= $b['id_buku'] ?>" <?= ($b['id_buku'] == $id_buku_selected) ? 'selected' : '' ?>>
                <?= htmlspecialchars($b['judul_buku']) ?> - oleh <?= htmlspecialchars($b['penulis']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold text-secondary">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="form-control" value="<?= $tgl_pinjam ?>" required>
          </div>
          <div class="col-md-6 mb-4">
            <label class="form-label fw-bold text-secondary">Tanggal Batas Kembali</label>
            <input type="date" name="tgl_kembali" class="form-control" value="<?= $tgl_kembali ?>" required>
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="Peminjaman.php" class="btn btn-cute-back">🌸 Kembali</a>
          <button type="submit" name="submit" class="btn btn-cute-submit"><?= $tombol_label ?></button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>