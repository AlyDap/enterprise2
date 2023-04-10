<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?= $disabled = '' ?>
<div class="row">
  <?php if (session()->get('alert') == 'success') : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-regular fa-badge-check fa-bounce"></i>
    Data user berhasil ditambahkan!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php elseif (session()->get('alert') == 'edit') : ?>
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <i class="fa-regular fa-badge-check fa-bounce"></i>
    Data user berhasil di Update!
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
          <td><?= "Rp " . number_format($user['gaji'], 0, ',', '.');  ?></td>
          <?php ($user['username'] == 'ali') ? $disabled = 'disabled' : $disabled = '' ?>
          <td>
            <a class="btn btn-primary btn-sm <?= $disabled; ?>"
              onclick="editData(<?= $user['id_user']; ?>,`<?= $user['username']; ?>`,`<?= $user['jabatan']; ?>`,`<?= $user['gaji']; ?>`)"
              id="btn-edit">Edit</a>
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
        <h5 class="card-title" id="card-title">Tambah Data</h5>

        <form action="<?= base_url('/hrd/store'); ?>" method="post">
          <input type="hidden" id="id-user" name="id-user" value="">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required value="">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label" id="lbl-pass">Password</label>
            <input type="password" class="form-control" name="password" required value="" id="password">
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
          <button type="submit" class="btn btn-primary" id="btn-form">Simpan</button>
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
const btnEdit = document.querySelector('#btn-edit');
const cardTitle = document.querySelector('#card-title');
const elId = document.querySelector('#id-user');
const elUsername = document.querySelector('#username');
const elPass = document.querySelector('#password');
const lblPass = document.querySelector('#lbl-pass');
const elJabatan = document.querySelector('#jabatan');
const elGaji = document.querySelector('#gaji');
const btnForm = document.querySelector('#btn-form');

btnTambah.addEventListener('click', function() {
  cardForm.style.display = 'block';
});

btnBatal.addEventListener('click', function() {
  btnTambah.style.display = 'block';

  cardTitle.innerHTML = 'Tambah Data';
  elId.value = '';
  elUsername.value = '';
  elPass.setAttribute('placeholder', "Masukkan Password");
  elPass.setAttribute('required', true);
  lblPass.innerHTML = 'Password';
  elJabatan.value = '';
  elGaji.value = '';
  btnForm.innerHTML = 'Simpan';

  cardForm.style.display = 'none';
});

function editData(id, username, jabatan, gaji) {
  cardForm.style.display = 'block';
  btnTambah.style.display = 'none';



  cardTitle.innerHTML = 'Edit Data';
  elId.value = id;
  elUsername.value = username;
  elPass.setAttribute('placeholder', "biarkan kosong jika tidak ingin diubah");
  elPass.removeAttribute('required');
  lblPass.innerHTML = 'Password Baru';
  elJabatan.value = jabatan;
  elGaji.value = gaji;
  btnForm.innerHTML = 'Update';

  if (jabatan == 'hrd') {
    elGaji.setAttribute('readonly', true);
  } else {
    elGaji.removeAttribute('readonly');
  }
}
</script>
<?= $this->endSection(); ?>