<?php
require 'Model.php';

if (isset($_GET['hapus'])) {
    $id_peminjaman = $_GET['hapus'];
    if (hapusPeminjaman($id_peminjaman)) {
        header("Location: Peminjaman.php");
        exit;
    }
}

$daftarPeminjaman = getSemuaPeminjaman();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Peminjaman - CuteLibrary</title>
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
    }
    .btn-cute-add {
      background: linear-gradient(45deg, #ff758f, #ff8fab);
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: bold;
      transition: all 0.3s ease;
    }
    .btn-cute-add:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(255, 117, 143, 0.4);
      color: white;
    }
    .table-cute {
      border-radius: 15px;
      overflow: hidden;
    }
    .table-cute thead {
      background: linear-gradient(45deg, #ffb3c1, #ffc2d1);
      color: #c9184a;
    }
    .btn-action-edit {
      background-color: #ffe5ec;
      color: #ff477e;
      border: 1px solid #ffb3c1;
      border-radius: 8px;
      font-weight: 600;
    }
    .btn-action-edit:hover {
      background-color: #ff477e;
      color: white;
    }
    .btn-action-delete {
      background-color: #f8d7da;
      color: #842029;
      border: 1px solid #f5c2c7;
      border-radius: 8px;
      font-weight: 600;
    }
    .btn-action-delete:hover {
      background-color: #842029;
      color: white;
    }
  </style>
</head>
<body>

  <?php require 'Navbar.php'; ?>

  <div class="container">
    <div class="card cute-card p-4">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-danger mb-0">🔄 Transaksi Peminjaman Buku</h2>
        <a href="FormPeminjaman.php" class="btn btn-cute-add px-4 py-2">✨ Catat Pinjaman Baru</a>
      </div>

      <div class="table-responsive table-cute shadow-sm">
        <table class="table table-hover align-middle mb-0 bg-white">
          <thead>
            <tr class="text-center">
              <th width="5%">No</th>
              <th>Nama Peminjam</th>
              <th>Judul Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th width="18%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($daftarPeminjaman)) : ?>
              <tr>
                <td colspan="6" class="text-center text-muted py-4">Belum ada sirkulasi peminjaman buku saat ini... 💕</td>
              </tr>
            <?php else : ?>
              <?php $no = 1; foreach ($daftarPeminjaman as $pinjam) : ?>
                <tr>
                  <td class="text-center fw-bold text-secondary"><?= $no++; ?></td>
                  <td class="fw-bold text-dark">👑 <?= htmlspecialchars($pinjam['nama_member']); ?></td>
                  <td>📖 <em><?= htmlspecialchars($pinjam['judul_buku']); ?></em></td>
                  <td class="text-center"><?= date('d M Y', strtotime($pinjam['tgl_pinjam'])); ?></td>
                  <td class="text-center"><?= date('d M Y', strtotime($pinjam['tgl_kembali'])); ?></td>
                  <td class="text-center">
                    <a href="FormPeminjaman.php?id=<?= $pinjam['id_peminjaman']; ?>" class="btn btn-sm btn-action-edit me-1">✏️ Edit</a>
                    <a href="Peminjaman.php?hapus=<?= $pinjam['id_peminjaman']; ?>" class="btn btn-sm btn-action-delete" onclick="return confirm('Transaksi peminjaman ini mau dihapus/selesai? 🥺');">🗑️ Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>