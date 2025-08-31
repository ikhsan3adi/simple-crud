<!DOCTYPE html>
<html lang="en">

<?= $this->include('templates/head') ?>

<body>
  <div class="min-vh-100 d-flex flex-column">
    <?= $this->include('templates/navbar') ?>

    <div class="flex-grow-1">
      <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('templates/footer') ?>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>