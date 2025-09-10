<main>
  <div class="container">
    <div class="row mt-3">
      <div class="col">
        <h2>Detail Mahasiswa</h2>
        <a href="<?= base_url('/mahasiswa') ?>" class="btn btn-info mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>

        <table class="table table-bordered">
          <tr>
            <th>NIM</th>
            <td><?= esc($mahasiswa['nim']) ?></td>
          </tr>
          <tr>
            <th>Nama</th>
            <td><?= esc($mahasiswa['nama']) ?></td>
          </tr>
          <tr>
            <th>Jenis Kelamin</th>
            <td><?= esc($mahasiswa['jenis_kelamin']) == 'L' ? "Laki-laki" : "Perempuan" ?></td>
          </tr>
          <tr>
            <th>Tanggal Lahir</th>
            <td><?= date('d F Y', strtotime($mahasiswa['tanggal_lahir'])) ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</main>