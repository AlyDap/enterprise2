<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="row">
  <p>
    <a class="btn btn-info" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
      aria-controls="collapseExample">
      Tata Tertib Absen
    </a>
  </p>
  <div class="collapse" id="collapseExample">
    <div class="alert alert-info" role="alert">
      <ul>
        <li>Jam kerja dimulai setiap hari pukul 08.00 - 16.00 WIB kecuali Hari Jumat (libur)</li>
        <li>Pengabsenan di mulai 15 menit sebelum jam kerja dan memiliki batas keterlambatan 15 menit</li>
        <li>Setiap keterlambatan mewajibkan pegawai mengganti jam kerja sebanyak 1 jam, dan kelipatannya</li>
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



<div class="col-md-5 mx-auto text-center">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Absen Harian</h5>
      <hr>
      <p><span class="tanggal"></span> | <span class="jam"></span></p>
      <form action="" method="post">
        <!-- input tipe capture untuk foto masuk -->
        <video autoplay="true" id="video-webcam" class="object-fit-md-contain border rounded">
          browser tidak mendukung untuk pengambilan gambar
        </video><br>
        <button onclick="takeSnapshot()" class="btn btn-success">Ambil Gambar</button>
      </form>
    </div>
  </div>
</div>




<script type="text/javascript">
// seleksi elemen video
var video = document.querySelector("#video-webcam");

// // minta izin user
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
  navigator.msGetUserMedia || navigator.oGetUserMedia;

function takeSnapshot() {
  // buat elemen img
  var img = document.createElement('img');
  var context;

  // ambil ukuran video
  var width = video.offsetWidth,
    height = video.offsetHeight;

  // buat elemen canvas
  canvas = document.createElement('canvas');
  canvas.width = width;
  canvas.height = height;

  // ambil gambar dari video dan masukan 
  // ke dalam canvas
  context = canvas.getContext('2d');
  context.drawImage(video, 0, 0, width, height);

  // render hasil dari canvas ke elemen img
  img.src = canvas.toDataURL('image/png');
  document.body.appendChild(img);
}

// ini dari chatgpt
navigator.mediaDevices.getUserMedia({
    video: true
  })
  .then(stream => {
    video.srcObject = stream;
    const track = stream.getVideoTracks()[0];
    const settings = track.getSettings();
    const aspectRatio = settings.aspectRatio; // nilai aspek rasio
    console.log(settings);


    video.height = 240;

    // atur ukuran elemen video sesuai dengan aspek rasio
    if (aspectRatio > 1) {
      video.width = video.height * aspectRatio;
    } else {
      video.height = video.width / aspectRatio;
    }
  })
  .catch(error => console.log(error));

//ambil tanggal & jam hari ini yang di refresh otomatis per detik
document.querySelector(".tanggal").innerHTML = moment().locale('id').format('dddd, DD MMMM YYYY');
</script>

<?= $this->endSection(); ?>