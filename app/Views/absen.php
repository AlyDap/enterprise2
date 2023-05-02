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
      <p><span class="tanggal"></span></p>
      <form action="<?= base_url('/absen/presensi'); ?>" method="post" enctype="multipart/form-data">
        <!-- input tipe capture untuk foto masuk -->
        <video autoplay="true" id="video-webcam" class="object-fit-md-contain border rounded">
          browser tidak mendukung untuk pengambilan gambar
        </video><br>
        <!-- yang diinputkan : id pegawai, tanggal, waktu masuk, gambar masuk, info, ket -->
        <!-- <input type="text" value="<?= session('username') ?>" name="nama" hidden>
        <input type="file" name="foto" id="foto"> -->
        <button type="button" onclick="sendImage()" class="btn btn-success">Ambil Gambar</button>
        <button type="submit" class="btn btn-primary">Absen Masuk</button>
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


  // nyalakan webcam jika di izinkan
  navigator.mediaDevices.getUserMedia({
      video: true
    })
    .then(stream => {
      video.srcObject = stream;
      const track = stream.getVideoTracks()[0];
      const settings = track.getSettings();
      const aspectRatio = settings.aspectRatio; // nilai aspek rasio


      video.height = 240;

      // atur ukuran elemen video sesuai dengan aspek rasio
      if (aspectRatio > 1) {
        video.width = video.height * aspectRatio;
      } else {
        video.height = video.width / aspectRatio;
      }
    })
    .catch(error => console.log(error));

  // ambil ukuran video
  var width = video.offsetWidth,
    height = video.offsetHeight;

  // buat elemen canvas
  canvas = document.createElement('canvas');
  canvas.width = width;
  canvas.height = height;
  const context = canvas.getContext('2d'); // dapatkan konteks 2D dari canvas

  // fungsi untuk capture gambar dari video dan mengirimkan ke server
  function sendImage() {
    context.drawImage(video, 0, 0, canvas.width, canvas.height); // capture gambar dari video dan gambar di canvas
    canvas.toBlob(function(blob) {
      const formData = new FormData(); // buat objek FormData untuk mengirim data ke server
      formData.append('image', blob, 'image.jpg'); // tambahkan data gambar ke FormData
      formData.append('nama', '<?= session('username') ?>');

      console.log(formData.get('nama'))
      fetch('<?= base_url('/absen/presensi'); ?>', {
        method: 'POST',
        body: formData
      }).then(response => {
        if (response.ok) {
          // window.location.href = "<?= base_url('/absen/presensi'); ?>";
          console.log('Form data berhasil dikirim');
        } else {
          console.log('Form data gagal dikirim');
        }
      }).catch(error => {
        console.error('Terjadi kesalahan saat mengunggah gambar:', error);
      });
    }, 'image/jpeg', 0.9); // konversi gambar ke format jpeg dan kompresi dengan kualitas 90%
  }


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
    //ganti elemen video dengan gambar
    video.parentNode.replaceChild(img, video);

  }






  //ambil tanggal & jam hari ini yang di refresh otomatis per detik
  function jamAbsen() {
    document.querySelector(".tanggal").innerHTML = moment().locale('id').format('dddd, DD MMMM YYYY | hh:mm:ss');
  }

  setInterval(jamAbsen, 1000);
</script>

<?= $this->endSection(); ?>