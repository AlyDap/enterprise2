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

<div class="row">
  <div class="col-md-4 mx-auto text-center">
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
  <div class="col-md-8">
    <div class="card card-primary">
      <div class="card-body p-0">

        <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
        </div>
      </div>

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
    .catch(error => console.error('Error : ', error));

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

      fetch('', {
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

  // menampilkan kalender minggu ini

  // // Mendapatkan tanggal sekarang
  // const today = moment().locale('id');
  // console.log("hari ini : " + today.format('dddd, MMMM Do YYYY'));
  // // Mendapatkan tanggal awal dari minggu ini
  // const startOfWeek = today.startOf('week');
  // console.log("awal minggu ini : " + startOfWeek.format('dddd, MMMM Do YYYY'));
  // // Mendapatkan tanggal akhir dari minggu ini
  // const endOfWeek = today.endOf('week');
  // console.log("akhir minggu ini : " + endOfWeek.format('dddd, MMMM Do YYYY'));

  // // Loop untuk menampilkan tanggal dari awal sampai akhir minggu ini
  // for (let day = startOfWeek; day <= endOfWeek; day = day.clone().add(1, 'd')) {
  //   console.log(day.format('dddd, MMMM Do YYYY'));
  // }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
<script>
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
      events: [
        <?php foreach ($absen as $a) : ?> {
            title: '<?= $a['info'] ?>',
            start: '<?= $a['tanggal_presensi'] ?>',
            color: '<?= $a['info'] == "tepat waktu" ? "green" : "red" ?>',
          },
        <?php endforeach; ?>
      ]
    });
    calendar.render();
  });
  // $(function() {

  //   /* initialize the external events
  //    -----------------------------------------------------------------*/
  //   function ini_events(ele) {
  //     ele.each(function() {

  //       // create an Event Object (https://fullcalendar.io/docs/event-object)
  //       // it doesn't need to have a start or end
  //       var eventObject = {
  //         title: $.trim($(this).text()) // use the element's text as the event title
  //       }

  //       // store the Event Object in the DOM element so we can get to it later
  //       $(this).data('eventObject', eventObject)

  //       // make the event draggable using jQuery UI
  //       $(this).draggable({
  //         zIndex: 1070,
  //         revert: true, // will cause the event to go back to its
  //         revertDuration: 0 //  original position after the drag
  //       })

  //     })
  //   }

  //   ini_events($('#external-events div.external-event'))

  //   /* initialize the calendar
  //    -----------------------------------------------------------------*/
  //   //Date for the calendar events (dummy data)
  //   var date = new Date()
  //   var d = date.getDate(),
  //     m = date.getMonth(),
  //     y = date.getFullYear()

  //   var Calendar = FullCalendar.Calendar;
  //   var Draggable = FullCalendar.Draggable;

  //   var containerEl = document.getElementById('external-events');
  //   var checkbox = document.getElementById('drop-remove');
  //   var calendarEl = document.getElementById('calendar');

  //   // initialize the external events
  //   // -----------------------------------------------------------------

  //   new Draggable(containerEl, {
  //     itemSelector: '.external-event',
  //     eventData: function(eventEl) {
  //       return {
  //         title: eventEl.innerText,
  //         backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
  //         borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
  //         textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
  //       };
  //     }
  //   });

  //   var calendar = new Calendar(calendarEl, {
  //     headerToolbar: {
  //       left: 'prev,next today',
  //       center: 'title',
  //       right: 'dayGridMonth,timeGridWeek,timeGridDay'
  //     },
  //     themeSystem: 'bootstrap',
  //     //Random default events
  //     events: [{
  //         title: 'All Day Event',
  //         start: new Date(y, m, 1),
  //         backgroundColor: '#f56954', //red
  //         borderColor: '#f56954', //red
  //         allDay: true
  //       },
  //       {
  //         title: 'Long Event',
  //         start: new Date(y, m, d - 5),
  //         end: new Date(y, m, d - 2),
  //         backgroundColor: '#f39c12', //yellow
  //         borderColor: '#f39c12' //yellow
  //       },
  //       {
  //         title: 'Meeting',
  //         start: new Date(y, m, d, 10, 30),
  //         allDay: false,
  //         backgroundColor: '#0073b7', //Blue
  //         borderColor: '#0073b7' //Blue
  //       },
  //       {
  //         title: 'Lunch',
  //         start: new Date(y, m, d, 12, 0),
  //         end: new Date(y, m, d, 14, 0),
  //         allDay: false,
  //         backgroundColor: '#00c0ef', //Info (aqua)
  //         borderColor: '#00c0ef' //Info (aqua)
  //       },
  //       {
  //         title: 'Birthday Party',
  //         start: new Date(y, m, d + 1, 19, 0),
  //         end: new Date(y, m, d + 1, 22, 30),
  //         allDay: false,
  //         backgroundColor: '#00a65a', //Success (green)
  //         borderColor: '#00a65a' //Success (green)
  //       },
  //       {
  //         title: 'Click for Google',
  //         start: new Date(y, m, 28),
  //         end: new Date(y, m, 29),
  //         url: 'https://www.google.com/',
  //         backgroundColor: '#3c8dbc', //Primary (light-blue)
  //         borderColor: '#3c8dbc' //Primary (light-blue)
  //       }
  //     ],
  //     editable: true,
  //     droppable: true, // this allows things to be dropped onto the calendar !!!
  //     drop: function(info) {
  //       // is the "remove after drop" checkbox checked?
  //       if (checkbox.checked) {
  //         // if so, remove the element from the "Draggable Events" list
  //         info.draggedEl.parentNode.removeChild(info.draggedEl);
  //       }
  //     }
  //   });

  //   calendar.render();
  //   // $('#calendar').fullCalendar()

  //   /* ADDING EVENTS */
  //   var currColor = '#3c8dbc' //Red by default
  //   // Color chooser button
  //   $('#color-chooser > li > a').click(function(e) {
  //     e.preventDefault()
  //     // Save color
  //     currColor = $(this).css('color')
  //     // Add color effect to button
  //     $('#add-new-event').css({
  //       'background-color': currColor,
  //       'border-color': currColor
  //     })
  //   })
  //   $('#add-new-event').click(function(e) {
  //     e.preventDefault()
  //     // Get value and make sure it is not null
  //     var val = $('#new-event').val()
  //     if (val.length == 0) {
  //       return
  //     }

  //     // Create events
  //     var event = $('<div />')
  //     event.css({
  //       'background-color': currColor,
  //       'border-color': currColor,
  //       'color': '#fff'
  //     }).addClass('external-event')
  //     event.text(val)
  //     $('#external-events').prepend(event)

  //     // Add draggable funtionality
  //     ini_events(event)

  //     // Remove event from text input
  //     $('#new-event').val('')
  //   })
  // })
</script>
<?= $this->endSection(); ?>