<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
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

<div class="row">
  <div class="col-md-4 mx-auto text-center">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Absen Harian</h5>
        <hr>
        <p><span class="tanggal"></span></p>
        <form action="<?= base_url('/absen/presensi'); ?>" method="post" enctype="multipart/form-data" id="form">
          <div class="webcam-capture"></div>
          <button type="button" onclick="captureimage()" class="btn btn-success">Masuk</button>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card card-primary">
      <div class="card-body p-0">

        <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
        </div>
      </div>

    </div>

  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.js"></script>
<script type="text/javascript">
  // start webcame
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

  function captureimage() {
    // take snapshot and get image data
    Webcam.snap(function(data_uri) {
      // display results in page
      // Webcam.upload(data_uri, '/absen/presensi', function(code, text) {
      //   location.href = './absen/presensi';
      // });
      $.ajax({
        type: 'POST',
        url: '/absen/presensi', // Ganti dengan URL endpoint di CodeIgniter 4
        data: {
          imageData: data_uri.split(',')[1] // Mengirimkan data gambar dalam format base64
        },
        success: function(response) {
          // Callback setelah pengunggahan selesai
          if (response.status === 'success') {
            // Berhasil, lakukan tindakan yang sesuai
            console.log(response.message);
            console.log('Path gambar:', response.image_path);
            alert(response.message);
          } else {
            // Gagal, tindakan jika diperlukan
            console.error(response.message);
            alert(response.message);
          }
          // refresh laman
          location.href = './absen/';
        },
        error: function() {
          // Terjadi kesalahan saat pengunggahan, tindakan jika diperlukan
          console.error('Kesalahan dalam pengunggahan gambar.');
        }
      });
    });
  }
  // end webcame presensi

  // start calendar
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'id',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth'
      },
      eventClick: function(info) {
        info.jsEvent.preventDefault(); // don't let the browser navigate

        alert(info.event.title);
      },
      events: {
        url: '/absen/getAbsen',
        method: 'POST',
        failure: function(textStatus, errorThrown) {
          alert(textStatus + " " + errorThrown);
        },
      }
      // masih jelek ini data event kalau bisa buat json
      // events: [
      //   <?php foreach ($absen as $a) : ?> {
      //       <?php $warna = 'rgb(3, 201, 136)'; ?>
      //       <?php if ($a['ket'] == "terlambat") : $warna = "rgb(237, 43, 42)" ?>
      //       <?php elseif ($a['ket'] == "sakit") : $warna = "rgb(73, 66, 228)" ?>
      //       <?php else : $a['ket'] = "masuk"; ?>
      //       <?php endif; ?>
      //       title: '<?= $a['ket'] ?>',
      //         start: '<?= $a['tanggal_presensi'] ?>',
      //         color: '<?= $warna ?>',
      //     },
      //     <?php if ($a['ket'] != 'sakit') : ?>
      //       <?php $a['ket'] = "pulang"; ?>

      //       <?php $warna = 'rgb(229, 124, 35)' ?> {
      //         title: '<?= $a['ket'] ?>',
      //         start: '<?= $a['tanggal_presensi'] ?>',
      //         color: '<?= $warna ?>',
      //       },
      //     <?php endif; ?>
      //   <?php endforeach; ?>
      //   <?php $awalBulan = date('Y-m-01'); ?>
      //   <?php for ($i = 0; $i < 32; $i++) : ?>
      //     <?php if (date('D', strtotime($awalBulan . '+' . $i . 'days')) == 'Fri') : ?> {
      //         title: 'Libur',
      //         start: '<?= date('Y-m-d', strtotime($awalBulan . '+' . $i . 'days')) ?>',
      //         backgroundColor: 'rgb(22, 255, 0)',
      //         textColor: 'rgb(22, 255, 0)',
      //         display: 'background'
      //       },
      //     <?php endif; ?>
      //   <?php endfor; ?>
      // ]
    });
    calendar.render();
  });
  // end calendar
</script>
<?= $this->endSection(); ?>