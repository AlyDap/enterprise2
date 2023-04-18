<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div style="width: fit-content;">
  <video autoplay="true" id="video-webcam">
    browser tidak mendukung untuk pengambilan gambar
  </video>
  <button onclick="takeSnapshot()">Ambil Gambar</button>
</div>
<div style="width: fit-content;">
  <video autoplay="true" id="video" height="320">
    browser tidak mendukung untuk pengambilan gambar
  </video>
</div>

<script type="text/javascript">
// seleksi elemen video
var video = document.querySelector("#video-webcam");

// // minta izin user
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||
  navigator.msGetUserMedia || navigator.oGetUserMedia;

// jika user memberikan izin
// if (navigator.getUserMedia) {
//   // jalankan fungsi handleVideo, dan videoError jika izin ditolak
//   navigator.getUserMedia({
//     video: true
//   }, handleVideo, videoError);
// }

// // fungsi ini akan dieksekusi jika  izin telah diberikan
// function handleVideo(stream) {
//   video.srcObject = stream;
//   const track = stream.getVideoTracks()[0];
//   const settings = track.getSettings();
//   const aspectRatio = settings.aspectRatio; // nilai aspek rasio

//   // set lebar dan tinggi elemen video
//   video.width = 640;
//   video.height = 480;

//   video.offsetHeight = 320;

//   // atur ukuran elemen video sesuai dengan aspek rasio
//   if (aspectRatio > 1) {
//     video.width = video.height * aspectRatio;
//   } else {
//     video.height = video.width / aspectRatio;
//   }
// }

// // fungsi ini akan dieksekusi kalau user menolak izin
// function videoError(e) {
//   // do something
//   alert("Izinkan menggunakan webcam untuk pengambilan gambar")
// }

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
// const video1 = document.getElementById('video');

navigator.mediaDevices.getUserMedia({
    video: true
  })
  .then(stream => {
    video.srcObject = stream;
    const track = stream.getVideoTracks()[0];
    const settings = track.getSettings();
    const aspectRatio = settings.aspectRatio; // nilai aspek rasio
    console.log(settings);


    video.height = 320;

    // atur ukuran elemen video sesuai dengan aspek rasio
    if (aspectRatio > 1) {
      video.width = video.height * aspectRatio;
    } else {
      video.height = video.width / aspectRatio;
    }
  })
  .catch(error => console.log(error));
</script>

<?= $this->endSection(); ?>