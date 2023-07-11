<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- adminlte -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css" integrity="sha256-rhU0oslUDWrWDxTY4JxI2a2OdRtG7YSf3v5zcRbcySE=" crossorigin="anonymous">

  <!-- ionicon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
  <script src="/js/moment.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .time {
      color: #fff;
      margin-top: 7.5px;
      right: 5%;
      position: absolute;
    }

    @media(max-width:991px) {
      .time {
        color: #fff;
        /* margin-top: 110px; */
        /* right: 5%; */
        bottom: 0;
        position: absolute;
      }
    }

    .webcam-capture,
    .webcam-capture video {
      display: inline-block;
      width: 100% !important;
      height: auto !important;
      margin: auto;
      text-align: center;
      border-radius: 15px;
      overflow: hidden;
    }

    @media print {
      .gaprint {
        display: none;
      }

      .total {
        display: inline;
      }
    }
  </style>
</head>

<body onload="updateClock()">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand gaprint" href="/dashboard">M-Sari</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <!-- BOSSSSSS -- ALI -->
          <?php if (session()->get('jabatan') == 'bos') : ?>
            <li class="nav-item">
              <a class="nav-link" href="/produk">Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/mitra">Mitra</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/bahan">Bahan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/penjahit">Penjahit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/chat">Chat</a>
            </li>
          <?php endif; ?>



          <!-- PRODUKSI -- ARYA  -->
          <?php if (session()->get('jabatan') == 'produksi') : ?>
            <li class="nav-item">

            <li class="nav-item">
              <a class="nav-link" href="/produksi/penjahitan">Produksi</a>
            </li>
          <?php endif; ?>


          <!-- GUDANG -- FEBI  -->
          <?php if (session()->get('jabatan') == 'gudang') : ?>
            <li class="nav-item">
              <a class="nav-link" href="/gudang/tampil">Gudang</a>
            </li>
            <!-- bahan -->
            <li class="nav-item">
              <a class="nav-link" href="/gudang/bahan">Bahan</a>
            </li>
            <!-- produk -->
            <li class="nav-item">
              <a class="nav-link" href="/gudang/produk">Produk</a>
            </li>
            <!-- mitra -->
            <li class="nav-item">
              <a class="nav-link" href="/gudang/mitra">Mitra</a>
            </li>
          <?php endif; ?>


          <!-- PENJUALAN -- IAN  -->
          <?php if (session()->get('jabatan') == 'penjualan') : ?>
            <li class="nav-item">
              <a class="nav-link gaprint" href="/penjualan/tampol">Penjualan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/penjualan/produk">Produk</a>
            </li>
          <?php endif; ?>


          <!-- HRD -- RIQQI  -->
          <?php if (session()->get('jabatan') == 'hrd') : ?>
            <li class="nav-item">
              <a class="nav-link" href="/hrd/tampil">User</a>
            </li>
          <?php endif; ?>
          <?php if (session()->get('jabatan') == 'hrd') : ?>
            <li class="nav-item">
              <a class="nav-link" href="/penggajian">Penggajian</a>
            </li>
          <?php endif; ?>


          <!-- FINANCE -- ANONIM  -->
          <?php if (session()->get('jabatan') == 'finance') : ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Finance</a>
            </li>
          <?php endif; ?>
          <?php if (session()->get('jabatan') != 'bos') : ?>
            <li class="nav-item">
              <a class="nav-link" href="/chatAll">Chat</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="/home/logout">Log Out</a>
          </li>
          <?php if (session()->get('jabatan') != 'bos') : ?>
            <li class="nav-item">
              <a class="nav-link" href="/absen">Absen</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <p class="time gaprint"><span id="waktu" class="jam"></p>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section>
    <!-- menampilkan username yang login -->
    <div class="d-flex ">
      <p class="px-4 gaprint"> <span id="tanggal"></span></p>
      <p class="ms-auto px-4 gaprint">Selamat Datang <?= session()->get('username'); ?> (<?= session()->get('jabatan') ?>)</p>
    </div>
  </section>
  <!-- End Navbar -->

  <!-- Main content -->
  <main class="container my-4">
    <?= $this->renderSection('content') ?>
  </main>
  <!-- End Main content -->
  <!-- Bootstrap 5 JavaScript -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>

  <script>
    document.getElementById('tanggal').innerHTML = moment().locale('id').format('dddd DD MMMM YYYY');

    function updateClock() {
      // document.getElementById('waktu').innerHTML = jam + ':' + menit + ':' + detik;
      document.querySelector(".jam").innerHTML = moment().locale('id').format('hh:mm:ss');
      setTimeout(updateClock, 1000);
    };
  </script>

</body>

</html>