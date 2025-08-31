<?= $this->extend('templates/page_layout') ?>
<?= $this->section('content') ?>

<main>
  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h1>Daftar Mahasiswa</h1>
        <div class="row">
          <div class="col-12 col-md-6">
            <a href="<?= base_url('/mahasiswa/new') ?>" class="btn btn-primary mb-3"><i class="bi bi-plus"></i> Tambah Mahasiswa</a>
          </div>
          <div class="col-12 col-md-6">
            <form action="<?= base_url('/mahasiswa') ?>" method="get" class="d-flex" role="search">
              <div class="input-group mb-3">
                <input class="form-control" type="search" name="keyword" placeholder="Cari berdasarkan nama atau NIM" aria-label="Search" value="<?= esc(request()->getVar('keyword') ?? '') ?>">
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
              </div>
            </form>
          </div>
        </div>

        <?php if (session()->getFlashdata('msg')) : ?>
          <div class="pb-2">
            <div class="alert <?= (session()->getFlashdata('error') ?? false) ? 'alert-danger' : 'alert-success'; ?> alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('msg') ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1 + ($perPage * ($currentPage - 1)); ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($mhs['nim']) ?></td>
                <td><?= esc($mhs['nama']) ?></td>
                <td><?= esc($mhs['jenis_kelamin']) == 'L' ? "Laki-laki" : "Perempuan" ?></td>
                <td><?= date('d F Y', strtotime($mhs['tanggal_lahir'])) ?></td>
                <td>
                  <a href="<?= base_url('/mahasiswa/' . $mhs['id']) ?>" class="btn btn-info btn-sm"><i class="bi bi-eye"></i> Detail</a>
                  <a href="<?= base_url('/mahasiswa/' . $mhs['id'] . '/edit') ?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a>
                  <form action="<?= base_url('/mahasiswa/' . $mhs['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?= $pager->links('mahasiswa', 'my_pager'); ?>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection() ?>