<?php
date_default_timezone_set('Asia/Makassar');  

require 'Model.php';

$judul_form = "✨ Registrasi Member Baru";
$tombol_label = "💾 Daftarkan Member";
$nama_member = "";
$nomor_member = "";
$alamat = "";
$tgl_mendaftar = date('Y-m-d\TH:i:s'); 
$tgl_terakhir_bayar = date('Y-m-d');
$id_member = "";

if (isset($_GET['id'])) {
    $id_member = $_GET['id'];
    $member = getMemberById($id_member);
    
    if ($member) {
        $judul_form = "✏️ Edit Data Member";
        $tombol_label = "🔄 Perbarui Member";
        $nama_member = $member['nama_member'];
        $nomor_member = $member['nomor_member'];
        $alamat = $member['alamat'];
        $tgl_mendaftar = date('Y-m-d\TH:i:s', strtotime($member['tgl_mendaftar']));
        $tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
    }
}

if (isset($_POST['submit'])) {
    $nama_input   = $_POST['nama_member'];
    $nomor_input  = $_POST['nomor_member'];
    $alamat_input = $_POST['alamat'];
    $tgl_daftar_input = date('Y-m-d H:i:s', strtotime($_POST['tgl_mendaftar']));
    $tgl_bayar_input  = $_POST['tgl_terakhir_bayar'];
    
    if (!empty($_POST['id_member'])) {
        $id_update = $_POST['id_member'];
        if (ubahMember($id_update, $nama_input, $nomor_input, $alamat_input, $tgl_daftar_input, $tgl_bayar_input)) {
            header("Location: Member.php");
            exit;
        }
    } else {
        if (tambahMember($nama_input, $nomor_input, $alamat_input, $tgl_daftar_input, $tgl_bayar_input)) {
            header("Location: Member.php");
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
        <input type="hidden" name="id_member" value="<?= $id_member ?>">

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Nama Lengkap Member</label>
          <input type="text" name="nama_member" class="form-control" placeholder="Contoh: Naura Oktavia" value="<?= htmlspecialchars($nama_member) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Nomor Member (ID Kartu)</label>
          <input type="text" name="nomor_member" class="form-control" placeholder="Contoh: MBR-001" value="<?= htmlspecialchars($nomor_member) ?>" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold text-secondary">Alamat Rumah</label>
          <textarea name="alamat" class="form-control" rows="3" placeholder="Tulis alamat lengkap disini..." required><?= htmlspecialchars($alamat) ?></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label fw-bold text-secondary">Tanggal Mendaftar</label>
            <input type="datetime-local" name="tgl_mendaftar" class="form-control" value="<?= $tgl_mendaftar ?>" required>
          </div>
          <div class="col-md-6 mb-4">
            <label class="form-label fw-bold text-secondary">Terakhir Bayar Iuran</label>
            <input type="date" name="tgl_terakhir_bayar" class="form-control" value="<?= $tgl_terakhir_bayar ?>" required>
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="Member.php" class="btn btn-cute-back">🌸 Kembali</a>
          <button type="submit" name="submit" class="btn btn-cute-submit"><?= $tombol_label ?></button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>