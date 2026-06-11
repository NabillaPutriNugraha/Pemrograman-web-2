<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Library Aesthetic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url('css/custom.css') ?>" rel="stylesheet">
    <style>
        .stat-card { transition: all 0.3s ease; }
        .stat-card:hover { transform: translateY(-5px) scale(1.02); }
        .table-cute thead { background: var(--pink-gradient); }
        .table-cute tbody tr { transition: background 0.2s; }
        .table-cute tbody tr:hover { background-color: rgba(255, 235, 238, 0.4); }
    </style>
</head>
<body class="fade-in">

    <nav class="navbar navbar-expand-lg glass-card sticky-top m-3 shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold text-dark fs-4" href="#">
                <i class="bi bi-book-half text-danger opacity-75 me-2"></i> PustakaBunny ✨
            </a>
            <div class="d-flex align-items-center">
                <span class="me-3 fw-medium text-secondary d-none d-md-inline">Halo, <b><?= session()->get('username') ?></b> 🐰</span>
                <a href="<?= base_url('auth/logout') ?>" class="btn btn-cute btn-light border-0 shadow-sm text-danger"><i class="bi bi-box-arrow-left me-1"></i> Keluar</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-4 py-3">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold m-0" style="color: #4a3438;">Selamat Datang Kembali! 💕</h2>
                <p class="text-muted">Kelola data buku perpustakaanmu dengan penuh cinta di sini.</p>
            </div>
        </div>

        <div class="row g-4 mb-5 slide-up">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card glass-card stat-card p-4 border-0 d-flex flex-row align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted fw-medium mb-1">Total Koleksi Buku</h6>
                        <h3 class="fw-bold m-0 text-dark"><?= count($buku) ?> Buku</h3>
                    </div>
                    <div class="fs-1 text-danger opacity-50"><i class="bi bi-journals"></i></div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card glass-card stat-card p-4 border-0 d-flex flex-row align-items-center justify-content-between" style="background: rgba(232, 219, 252, 0.5);">
                    <div>
                        <h6 class="text-muted fw-medium mb-1">Penulis Aktif</h6>
                        <h3 class="fw-bold m-0 text-dark">Aesthetic Writers</h3>
                    </div>
                    <div class="fs-1 text-primary opacity-50"><i class="bi bi-feather"></i></div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card glass-card stat-card p-4 border-0 d-flex flex-row align-items-center justify-content-between" style="background: rgba(254, 207, 239, 0.5);">
                    <div>
                        <h6 class="text-muted fw-medium mb-1">Status Server</h6>
                        <h3 class="fw-bold m-0 text-success">Online 🟢</h3>
                    </div>
                    <div class="fs-1 text-success opacity-50"><i class="bi bi-cloud-check"></i></div>
                </div>
            </div>
        </div>

        <div class="row g-4 slide-up" style="animation-delay: 0.2s;">
            <div class="col-12 col-xl-4">
                <div class="card glass-card p-4 border-0">
                    <h5 class="fw-bold mb-4" style="color: #4a3438;"><i class="bi bi-plus-circle-fill me-2 text-danger opacity-50"></i>Tambah Data Buku</h5>
                    
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger border-0 mb-4" style="background-color: rgba(255, 182, 193, 0.5); border-radius: 16px; color: #851c2c; font-size: 0.9rem;">
                            <ul class="m-0 ps-3">
                                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                    <li><?= $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('buku/store') ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Judul Buku</label>
                            <input type="text" name="judul" class="form-control form-control-cute" placeholder="Contoh: Kisah Kelinci Merah Muda" value="<?= old('judul') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Nama Penulis</label>
                            <input type="text" name="penulis" class="form-control form-control-cute" placeholder="Contoh: Bunny Author" value="<?= old('penulis') ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control form-control-cute" placeholder="Contoh: Media Pastel Jaya" value="<?= old('penerbit') ?>">
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-medium">Tahun Terbit</label>
                            <input type="text" name="tahun_terbit" class="form-control form-control-cute" placeholder="Contoh: 2022" value="<?= old('tahun_terbit') ?>">
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-cute btn-pink-grad flex-grow-1"><i class="bi bi-heart-fill me-1"></i> Simpan Buku</button>
                            <button type="reset" class="btn btn-cute btn-light shadow-sm text-secondary">Batal</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-xl-8">
                <div class="card glass-card p-4 border-0 overflow-hidden">
                    <h5 class="fw-bold mb-4" style="color: #4a3438;"><i class="bi bi-collection-fill me-2 text-primary opacity-50"></i>Katalog Buku Terdaftar</h5>
                    
                    <div class="table-responsive" style="border-radius: 20px;">
                        <table class="table table-borderless table-cute align-middle m-0 text-center">
                            <thead class="text-white">
                                <tr>
                                    <th class="py-3 px-3">ID Buku</th>
                                    <th class="py-3">Judul</th>
                                    <th class="py-3">Penulis</th>
                                    <th class="py-3">Penerbit</th>
                                    <th class="py-3">Tahun</th>
                                    <th class="py-3 px-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white bg-opacity-50">
                                <?php if(empty($buku)): ?>
                                    <tr>
                                        <td colspan="6" class="text-muted py-5 fs-6">Belum ada koleksi buku yang terisi di rak. 🌸</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($buku as $b): ?>
                                    <tr>
                                        <td class="fw-bold text-secondary py-3">#<?= $b['id'] ?></td>
                                        <td class="fw-semibold text-dark"><?= esc($b['judul']) ?></td>
                                        <td><span class="badge bg-light text-dark p-2 px-3 shadow-sm" style="border-radius: 12px; font-weight: 500;"><?= esc($b['penulis']) ?></span></td>
                                        <td class="text-secondary"><?= esc($b['penerbit']) ?></td>
                                        <td class="fw-medium text-dark"><?= esc($b['tahun_terbit']) ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-cute shadow-sm mx-1" style="background-color: #bbdefb; color: #0d47a1;" data-bs-toggle="modal" data-bs-target="#editModal<?= $b['id'] ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>

                                            <a href="<?= base_url('buku/delete/'.$b['id']) ?>" class="btn btn-sm btn-cute shadow-sm mx-1" style="background-color: #ffcdd2; color: #b71c1c;" onclick="return confirm('Ingin menghapus buku cantik ini?')">
                                                <i class="bi bi-trash3-fill"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(!empty($buku)): ?>
        <?php foreach($buku as $b): ?>
        <div class="modal fade" id="editModal<?= $b['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $b['id'] ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content glass-card p-4 border-0" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(25px); -webkit-backdrop-filter: blur(25px); border-radius: 28px;">
                    <div class="modal-header border-0">
                        <h5 class="fw-bold m-0" id="editModalLabel<?= $b['id'] ?>" style="color: #4a3438;"><i class="bi bi-pencil-square text-primary opacity-50 me-2"></i>Edit Data Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        <form action="<?= base_url('buku/update/'.$b['id']) ?>" method="POST">
                            <div class="mb-3">
                                <label class="form-label small fw-medium">Judul Buku</label>
                                <input type="text" name="judul" class="form-control form-control-cute" value="<?= esc($b['judul']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-medium">Nama Penulis</label>
                                <input type="text" name="penulis" class="form-control form-control-cute" value="<?= esc($b['penulis']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-medium">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control form-control-cute" value="<?= esc($b['penerbit']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-medium">Tahun Terbit</label>
                                <input type="text" name="tahun_terbit" class="form-control form-control-cute" value="<?= esc($b['tahun_terbit']) ?>" required>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-cute btn-pink-grad flex-grow-1"><i class="bi bi-check-circle-fill me-1"></i> Simpan Perubahan</button>
                                <button type="button" class="btn btn-cute btn-light shadow-sm text-secondary" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>