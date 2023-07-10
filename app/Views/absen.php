<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php (isset($_GET['id'])) ? $id = $_GET['id'] : $id = 0; ?>

<!-- tata tertib -->
<div class="row">
  <p>
    <a class="btn btn-info" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Tata Tertib Absen
    </a>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="alert alert-info" role="alert">
      <ul>
        <li>Jam kerja dimulai setiap hari pukul 08.00 - 16.00 WIB kecuali Hari Jumat (libur)</li>
        <li>absen memiliki batas keterlambatan 15 menit</li>
        <li>Pegawai yang tidak mengganti jam kerja, ketika sampai di akhir bulan akan dikenai pemotongan gaji sebanyak
          Rp10.000 perjamnya</li>
        <li>total jam kerja selama satu minggu adalah 48 jam terhitung 8x6 hari, kelebihan daripada itu dihitung jam
          lembur
        </li>
        <li>pegawai lembur diberikan gaji tambahan sebesar Rp15.000 per jamnya dengan catatan di setujui oleh atasan
        </li>
        <li>dengan catatan lembur yang dilakukan dilakukan di luar jam kerja serta telah melebihi jam kerja mingguan
        </li>
        <li>Setiap pegawai yang mengalami sakit, harus mengajukan surat keterangan sakit ke HRD</li>
        <li>ijin sakit akan diberikan, dan dilakukan pengurangan jam kerja </li>
      </ul>
    </div>
  </div>
</div>
<!-- end tata tertib -->

<div class="row">
  <div class="col-md-4 mx-auto text-center">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Absen Harian</h5>
        <hr>
        <p><span class="tanggal"></span></p>
        <form action="<?= base_url('/absen/presensi'); ?>" method="post" enctype="multipart/form-data" id="form">
          <div class="webcam-capture"></div>
          <!-- $info = masuk, pulang, sudah pulang, sakit -->
          <?php if ($info == 'masuk') : ?>
            <button type="button" onclick="captureimage('0')" class="btn btn-success">Masuk</button>
            <button type="button" onclick="captureimage('sakit')" class="btn btn-danger">Sakit</button>
          <?php elseif ($info == 'pulang') : ?>
            <button type="button" onclick="captureimage('0')" class="btn btn-warning">Pulang</button>
          <?php endif ?>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap my-3 mx-3">
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="" class="img-thumbnail" width="200" alt="">
          <div class="waktu"></div>
        </div>
        <div class="modal-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4 ">
                <button type="button" class="btn btn-danger" disabled>Terlambat : <span class="terlambat"></span></button>
              </div>
              <div class="col-md-4 ms-auto ">
                <button type="button" class="btn btn-warning" disabled>sakit : <span class="sakit"></span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
  <script type="text/javascript">
    // start webcame
    {
      Webcam.set({
        width: 590,
        height: 460,
        image_format: 'jpeg',
        jpeg_quality: 80,
      });

      var cameras = new Array(); //create empty array to later insert available devices
      navigator.mediaDevices.enumerateDevices() // get the available devices found in the machine
        .then(function(devices) {
          devices.forEach(function(device) {
            var i = 0;
            if (device.kind === "videoinput") { //filter video devices only
              cameras[i] = device.deviceId; // save the camera id's in the camera array
              i++;
            }
          });
        })
      Webcam.set('constraints', {
        width: 590,
        height: 460,
        image_format: 'jpeg',
        jpeg_quality: 80,
        sourceId: cameras[0]
      });

      Webcam.attach('.webcam-capture');

      function captureimage(keterangan) {
        let info = '<?= $info ?>';
        if (keterangan == 'sakit') {
          info = 'sakit';
        }
        // jika keterangan = sakit maka keluarkan alert yang bisa input keterangan sakit
        while (keterangan == 'sakit') {
          var ket = prompt('Masukan keterangan sakit');
          // ulangi jika keterangan kosong

          if (ket == null || ket == '') {
            alert('Keterangan sakit tidak boleh kosong');
            continue;
          }
          keterangan = ket;
          break;
        }

        // take snapshot and get image data
        Webcam.snap(function(data_uri) {
          $.ajax({
            type: 'POST',
            url: '/absen/presensi', // Ganti dengan URL endpoint di CodeIgniter 4
            data: {
              imageData: data_uri.split(',')[1],
              info: info,
              ket: keterangan,
            },
            success: function(response) {
              // console.log(data_uri + ' oke nih');
              // Callback setelah pengunggahan selesai
              if (response.status === 'success') {
                // Berhasil, lakukan tindakan yang sesuai
                alert(response.message);
                console.log(response);
              } else {
                // Gagal, tindakan jika diperlukan
                console.error(response.message);
                alert(response.message);
              }
              location.href = '';
            },
            error: function(textStatus, errorThrown) {
              console.log(data_uri + ' gagal nih'),
                console.error('Kesalahan dalam pengunggahan gambar.');
              // console.log(textStatus + errorThrown);
            }
          });
        });
      }
      // end webcame presensi
    }
  </script>
  <script src="js/hrd.js"></script>
  <?= $this->endSection(); ?>