<!DOCTYPE html>
<html lang="en">

<?= $this->include('templates/head') ?>

<body class="d-flex flex-column min-vh-100">
  <main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="container">
      <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold text-body-emphasis mb-3">Hello World!</h1>
        <a href="<?= base_url('/mahasiswa') ?>" class="btn btn-outline-dark">
          <i class="bi bi-arrow-right"></i> mahasiswa/index
        </a>
      </div>
    </div>
  </main>

  <?= $this->include('templates/footer') ?>
</body>

</html>