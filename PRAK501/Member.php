<?php
require 'Model.php';

if (isset($_GET['hapus'])) {
    $id_member = $_GET['hapus'];
    if (hapusMember($id_member)) {
        header("Location: Member.php");
        exit;
    }
}

$daftarMember = getSemuaMember();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Member - CuteLibrary</title>
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
        <h2 class="fw-bold text-danger mb-0">👑 Daftar Member Perpustakaan</h2>
        <a href="FormMember.php" class="btn btn-cute-add px-4 py-2">✨ Tambah Member Baru</a>
      </div>

      <div class="table-responsive table-cute shadow-sm">
        <table class="table table-hover align-middle mb-0 bg-white">
          <thead>
            <tr class="text-center">
              <th width="5%">No</th>
              <th>Nama Member</th>
              <th>Nomor Member</th>
              <th>Alamat</th>
              <th>Tgl Mendaftar</th>
              <th>Tgl Terakhir Bayar</th>
              <th width="18%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($daftarMember)) : ?>
              <tr>
                <td colspan="7" class="text-center text-muted py-4">Belum ada member yang bergabung nih.. 🥺</td>
              </tr>
            <?php else : ?>
              <?php $no = 1; foreach ($daftarMember as $member) : ?>
                <tr>
                  <td class="text-center fw-bold text-secondary"><?= $no++; ?></td>
                  <td class="fw-bold text-dark">👑 <?= htmlspecialchars($member['nama_member']); ?></td>
                  <td class="text-center"><span class="badge bg-light text-danger border border-danger-subtle px-2 py-1"><?= htmlspecialchars($member['nomor_member']); ?></span></td>
                  <td><?= htmlspecialchars($member['alamat']); ?></td>
                  <td class="text-center"><small><?= date('d M Y H:i', strtotime($member['tgl_mendaftar'])); ?> WITA</small></td>
                  <td class="text-center"><?= date('d M Y', strtotime($member['tgl_terakhir_bayar'])); ?></td>
                  <td class="text-center">
                    <a href="FormMember.php?id=<?= $member['id_member']; ?>" class="btn btn-sm btn-action-edit me-1">✏️ Edit</a>
                    <a href="Member.php?hapus=<?= $member['id_member']; ?>" class="btn btn-sm btn-action-delete" onclick="return confirm('Beneran mau mengeluarkan member ini? 🥺');">🗑️ Hapus</a>
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