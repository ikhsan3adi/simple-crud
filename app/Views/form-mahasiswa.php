<main>
  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h2><?= isset($mahasiswa) ? 'Edit' : 'Tambah' ?> Mahasiswa</h2>
        <a href="<?= base_url('/mahasiswa') ?>" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>

        <?php if (session()->getFlashdata('msg')) : ?>
          <div class="pb-2">
            <div class="alert <?= (session()->getFlashdata('error') ?? false) ? 'alert-danger' : 'alert-success'; ?> alert-dismissible fade show" role="alert">
              <?php if (is_array(session()->getFlashdata('msg'))) : ?>
                <ul class="mb-0">
                  <?php foreach (session()->getFlashdata('msg') as $error) : ?>
                    <li><?= esc($error) ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php else : ?>
                <?= session()->getFlashdata('msg') ?>
              <?php endif; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        <?php endif; ?>

        <form action="<?= isset($mahasiswa) ? base_url('mahasiswa/' . $mahasiswa['nim']) : base_url('mahasiswa') ?>" method="post">

          <?= csrf_field() ?>

          <?php if (isset($mahasiswa)) : ?>
            <input type="hidden" name="_method" value="PUT">
          <?php endif; ?>

          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= isset($mahasiswa) ? $mahasiswa['nama'] : '' ?>" required>
          </div>
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" id="nim" name="nim" value="<?= isset($mahasiswa) ? $mahasiswa['nim'] : '' ?>" required>
          </div>
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
              <option value="L" <?= isset($mahasiswa) && $mahasiswa['jenis_kelamin'] === 'L' ? 'selected' : '' ?>>Laki-laki</option>
              <option value="P" <?= isset($mahasiswa) && $mahasiswa['jenis_kelamin'] === 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= isset($mahasiswa) ? $mahasiswa['tanggal_lahir'] : '' ?>" required>
          </div>
          <button type="submit" class="btn btn-primary"><?= isset($mahasiswa) ? 'Update' : 'Simpan' ?></button>
          <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Batal</a>
        </form>
      </div>
    </div>
  </div>
</main>