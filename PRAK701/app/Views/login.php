<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aesthetic Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url('css/custom.css') ?>" rel="stylesheet">
</head>
<body class="d-flex align-items-center min-vh-100 position-relative overflow-hidden">

    <ul class="bubbles m-0 p-0">
        <li style="left: 25%; width: 80px; height: 80px; animation-delay: 0s;"></li>
        <li style="left: 10%; width: 20px; height: 20px; animation-delay: 2s; animation-duration: 12s;"></li>
        <li style="left: 70%; width: 20px; height: 20px; animation-delay: 4s;"></li>
        <li style="left: 40%; width: 60px; height: 60px; animation-delay: 0s; animation-duration: 18s;"></li>
        <li style="left: 85%; width: 100px; height: 100px; animation-delay: 5s;"></li>
    </ul>

    <div class="container py-5 fade-in">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card glass-card p-4 p-md-5 slide-up">
                    
                    <div class="text-center mb-4">
                        <div class="display-4 text-danger opacity-75 mb-2"><i class="bi bi-book-half"></i></div>
                        <h3 class="fw-bold m-0" style="color: #5c3d44;">Hi, Admin Bunny! ✨</h3>
                        <p class="text-muted small">Silakan masuk ke perpustakaan digitalmu</p>
                    </div>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger border-0 text-center slide-up mb-4" style="background-color: rgba(255, 182, 193, 0.6); border-radius: 16px; color: #851c2c; font-weight: 500;">
                            <i class="bi bi-exclamation-circle-fill me-2"></i> <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('auth/loginProcess') ?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-medium ms-2">Username / Email</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-transparent ps-3 text-muted"><i class="bi bi-person-fill"></i></span>
                                <input type="text" name="username" class="form-control form-control-cute ps-5" placeholder="Masukkan username" style="margin-left: -40px;" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-medium ms-2">Password</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-transparent ps-3 text-muted"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" name="password" class="form-control form-control-cute ps-5" placeholder="••••••••" style="margin-left: -40px;" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-cute btn-pink-grad w-100 shadow-sm py-3"><i class="bi bi-box-arrow-in-right me-2"></i> Masuk Sekarang</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>