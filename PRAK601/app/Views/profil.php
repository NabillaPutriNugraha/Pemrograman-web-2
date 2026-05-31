<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Praktikan - SaaS Portofolio</title>
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
                    <a class="nav-link fw-semibold px-3" href="<?= base_url('/') ?>">Beranda</a>
                    <a class="nav-link active fw-semibold px-3" href="<?= base_url('/profil') ?>">Profil</a>
                    <button class="btn btn-sm btn-light ms-2 rounded-circle shadow-sm" id="themeToggle" style="width: 40px; height: 40px;">
                        <i class="bi bi-moon-stars-fill"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-5 mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="glass-card overflow-hidden">
                    
                    <div style="height: 120px; background: linear-gradient(45deg, var(--primary-pink), var(--pastel-blue));"></div>
                    
                    <div class="p-4 p-md-5 pt-0 text-center text-md-start">
                        <div class="text-center" style="margin-top: -75px;">
                            <div class="profile-img-container rounded-circle bg-white shadow overflow-hidden d-flex align-items-center justify-content-center">
                                <img src="<?= base_url('fotoku.jpeg') ?>" alt="Foto Profil" class="w-100 h-100 style="object-fit: cover;">
                            </div>
                        </div>

                        <div class="text-center mt-3 mb-5">
                            <h2 class="fw-bold m-0 text-gradient"><?= esc($nama) ?></h2>
                            <p class="text-muted fw-medium mt-1"><i class="bi bi-bookmark-star me-2"></i>Mahasiswa</p>
                        </div>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="bg-white bg-opacity-50 p-3 rounded-4 border border-white">
                                    <small class="text-muted d-block mb-1">Nomor Induk Mahasiswa</small>
                                    <span class="fw-semibold fs-5"><i class="bi bi-card-text text-primary me-2"></i><?= esc($nim) ?></span>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="bg-white bg-opacity-50 p-3 rounded-4 border border-white">
                                    <small class="text-muted d-block mb-1">Program Studi</small>
                                    <span class="fw-semibold fs-5"><i class="bi bi-mortarboard text-primary me-2"></i>Teknologi Informasi</span>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="bg-white bg-opacity-50 p-3 rounded-4 border border-white">
                                    <small class="text-muted d-block mb-1">Hobi & Ketertarikan</small>
                                    <span class="fw-semibold fs-5"><i class="bi bi-controller text-primary me-2"></i>Bobo</span>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="bg-white bg-opacity-50 p-3 rounded-4 border border-white">
                                    <small class="text-muted d-block mb-1">Status Praktikan</small>
                                    <span class="fw-semibold fs-5"><i class="bi bi-check2-circle text-success me-2"></i>Aktif Terverifikasi</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-2" data-aos="fade-up" data-aos-delay="500">
                            <h5 class="fw-bold mb-3 text-gradient"><i class="bi bi-cpu me-2"></i>Keahlian Teknologi</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge-custom"><i class="bi bi-filetype-html me-1"></i> HTML5</span>
                                <span class="badge-custom"><i class="bi bi-filetype-css me-1"></i> CSS3</span>
                                <span class="badge-custom"><i class="bi bi-braces me-1"></i> JavaScript</span>
                                <span class="badge-custom"><i class="bi bi-bootstrap me-1"></i> Bootstrap 5</span>
                                <span class="badge-custom"><i class="bi bi-filetype-php me-1"></i> Core PHP</span>
                                <span class="badge-custom"><i class="bi bi-lightning-charge me-1"></i> CodeIgniter 4</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="container text-center py-4 border-top border-light">
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