<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SaaS Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <nav class="navbar navbar-expand-lg glass-nav sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-gradient" href="<?= base_url('/') ?>"><i class="bi bi-code-slash me-2"></i>PRAK601</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto align-items-center">
                    <a class="nav-link active fw-semibold px-3" href="<?= base_url('/') ?>">Beranda</a>
                    <a class="nav-link fw-semibold px-3" href="<?= base_url('/profil') ?>">Profil</a>
                    <button class="btn btn-sm btn-light ms-2 rounded-circle shadow-sm" id="themeToggle" style="width: 40px; height: 40px;">
                        <i class="bi bi-moon-stars-fill"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container d-flex align-items-center" style="min-height: 80vh;">
        <div class="row w-100 align-items-center gy-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                <span class="badge bg-white text-dark shadow-sm mb-3 px-3 py-2 rounded-pill border fw-medium">
                    ✨ Welcome to My Creative Space
                </span>
                <h1 class="display-4 fw-bold mb-3">Hi! Selamat Datang di <span class="text-gradient">Website Praktikum</span></h1>
                <p class="fs-5 text-muted mb-4">Website modern ini dibangun berbasis arsitektur MVC menggunakan framework CodeIgniter 4 dan dipercantik dengan gaya desain Glassmorphism ala Startup premium.</p>
                <a href="<?= base_url('/profil') ?>" class="btn btn-pink btn-lg px-4 py-3 text-white"><i class="bi bi-arrow-right-circle me-2"></i>Lihat Profil Lengkap</a>
            </div>
            
            <div class="col-lg-5 offset-lg-1" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                <div class="glass-card p-5 text-center text-lg-start">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-4">
                        <div class="p-3 bg-white rounded-4 shadow-sm border me-3">
                            <i class="bi bi-database-check fs-2 text-gradient"></i>
                        </div>
                        <div>
                            <h5 class="m-0 fw-bold">Data Terintegrasi Model</h5>
                            <small class="text-muted">MVC Architecture</small>
                        </div>
                    </div>
                    <hr class="my-4 opacity-10">
                    <div class="mb-3">
                        <label class="small text-uppercase tracking-wider text-muted fw-semibold">Nama Praktikan</label>
                        <p class="fs-4 fw-bold m-0"><?= esc($nama) ?></p>
                    </div>
                    <div>
                        <label class="small text-uppercase tracking-wider text-muted fw-semibold">Nomor Induk Mahasiswa</label>
                        <p class="fs-5 fw-medium text-gradient m-0"><?= esc($nim) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="container text-center py-4 mt-5 border-top border-light">
        <p class="text-muted small m-0">&copy; 2026 PRAK601. Designed with <i class="bi bi-heart-fill text-danger"></i> & PHP.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="<?= base_url('js/script.js') ?>"></script>
    <script>
        AOS.init({ once: true }); 
    </script>
</body>
</html>