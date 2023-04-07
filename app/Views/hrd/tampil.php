<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="row">
  <?php if (session()->get('alert') == 'success') : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fa-regular fa-badge-check fa-bounce"></i>
      Data user berhasil ditambahkan!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session()->remove('alert')  ?>
  <?php endif ?>


  <div class="col-sm-8">
    <h1 class="mt-2">Daftar User</h1>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">NO</th>
          <th scope="col">Username</th>
          <th scope="col">Jabatan</th>
          <th scope="col">Gaji</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; ?>
        <?php foreach ($users as $user) : ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $user['username']; ?></td>
            <td><?= $user['jabatan']; ?></td>
            <td><?= $user['gaji']; ?></td>
            <td>
              <a href="<?= base_url('/hrd/edit/' . $user['id_user']); ?>" class="btn btn-primary btn-sm">Edit</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
    <button class="btn btn-primary my-2 position-relative" id="btn-tambah">Tambah User</button>
    <div class="card mt-3" id="card-form" style="display: none;">
      <div class="card-body">
        <h5 class="card-title">Tambah User</h5>
        <form action="<?= base_url('/hrd/store'); ?>" method="post">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
              <option value="">-- Pilih Jabatan --</option>
              <option value="produksi">Bag. Produksi</option>
              <option value="gudang">Bag. Gudang</option>
              <option value="penjualan">Bag. Penjualan</option>
              <option value="hrd">Bag. Hrd</option>
              <option value="finance">Bag. Finance</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="gaji" class="form-label">Gaji</label>
            <input type="number" class="form-control" id="gaji" name="gaji" required>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" id="btn-batal">Batal</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  const btnTambah = document.querySelector('#btn-tambah');
  const cardForm = document.querySelector('#card-form');
  const btnBatal = document.querySelector('#btn-batal');

  btnTambah.addEventListener('click', function() {
    cardForm.style.display = 'block';
  });

  btnBatal.addEventListener('click', function() {
    cardForm.style.display = 'none';
  });
</script>
<?= $this->endSection(); ?>