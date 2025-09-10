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

<body class="d-flex flex-column min-vh-100">
  <main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container d-flex justify-content-center p-5">
      <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
          <h5 class="card-title mb-5">Formulir Pendaftaran</h5>

          <?php if (session()->getFlashdata('msg')) : ?>
            <div class="pb-2">
              <div class="alert <?= (session()->getFlashdata('error') ?? false) ? 'alert-danger' : 'alert-success'; ?> alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('msg') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
          <?php endif; ?>

          <form action="<?= base_url('formulir/create') ?>" method="post">
            <?= csrf_field() ?>

            <!-- <div class="mb-2">
              <input type="text" class="form-control" name="nim" placeholder="2415XXXXX" value="<?= old('nim') ?>" required>
            </div> -->

            <div class="mb-2">
              <input type="text" class="form-control" name="username" placeholder="Your Username" value="<?= old('username') ?>" required>
            </div>

            <div class="mb-2">
              <input type="password" class="form-control" name="password" placeholder="Your Password" required>
            </div>

            <div class="d-grid col-12 mx-auto m-3">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>

            <div class="text-center">
              <span>Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a></span>
            </div>

          </form>
        </div>
      </div>
    </div>
  </main>

  <?= $this->include('templates/footer') ?>
</body>

</html>