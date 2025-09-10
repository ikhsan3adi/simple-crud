<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title) ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <div class="min-vh-100 d-flex flex-column">
    <header class="py-3 text-bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-start">
          <a href="/" class="d-flex align-items-center mb-2 text-white text-decoration-none">
            <i class="bi bi-globe2 me-2" style="font-size: 20pt;"></i>
          </a>
          <ul class="nav col-auto me-lg-auto mb-2 justify-content-center">
            <li><a href="<?= base_url('/home') ?>" class="nav-link px-2 text-white">Home</a></li>
            <li><a href="<?= base_url('/berita') ?>" class="nav-link px-2 text-white">Berita</a></li>
            <li><a href="<?= base_url('/mahasiswa') ?>" class="nav-link px-2 text-white">Mahasiswa</a></li>
            <li><a href="<?= base_url('/formulir') ?>" class="nav-link px-2 text-white">Register</a></li>
            <li><a href="<?= base_url('/logout') ?>" class="nav-link px-2 text-white">Logout</a></li>
          </ul>
        </div>
      </div>
    </header>

    <div class="flex-grow-1">
      <?= $content ?>
    </div>

    <!-- Footer -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">
          <span class="mb-3 mb-md-0 text-body-secondary">© 2025 Ikhsan Satriadi</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3">
            <a class="text-body-secondary" href="https://instagram.com/ikhsan3adi" aria-label="Instagram">
              <i class="bi bi-instagram" style="font-size: 24pt;"></i>
            </a>
          </li>
          <li class="ms-3">
            <a class="text-body-secondary" href="https://github.com/ikhsan3adi" aria-label="GitHub">
              <i class="bi bi-github" style="font-size: 24pt;"></i>
            </a>
          </li>
        </ul>
      </footer>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>