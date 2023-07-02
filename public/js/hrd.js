const myModalAlternative = new bootstrap.Modal(document.getElementById('myModal'));
// start calendar
{
  // jika id masih undefined maka akan diisi dengan 0
  if (typeof id === 'undefined') {
    id = 0;
  }


  document.addEventListener('DOMContentLoaded', function () {
  }.bind(this));
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'id',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth'
    },
    eventClick: function (info) {
      info.jsEvent.preventDefault(); // don't let the browser navigate
      document.querySelector('.modal-title').innerHTML = info.event.title;
      document.querySelector('.modal-body img').src = 'resource/index/' + info.event.extendedProps.gambar;
      document.querySelector('.modal-body img').alt = info.event.extendedProps.gambar;
      document.querySelector('.waktu').innerHTML = info.event.extendedProps.description;
      document.querySelector('.terlambat').innerHTML = info.event.extendedProps.terlambat;
      document.querySelector('.sakit').innerHTML = info.event.extendedProps.sakit;
      myModalAlternative.show();
    },
    events: {
      url: "/absen/getAbsen/" + id,
      method: 'POST',
      failure: function (textStatus, errorThrown) {
        alert(textStatus + " " + errorThrown);
      },
    },
  });
  calendar.render();
  // end calendar
}
{
  // validasi tanggal akhir bulan untuk approve gaji
  function verify() {
    // cek tanggal hari ini apakah akhir bulan
    var today = new Date();
    var lastDay = new Date(today.getFullYear(), today.getMonth() + 1, 0);
    var lastDayDate = lastDay.getDate();
    var todayDate = today.getDate();
    if (todayDate != todayDate) {
      alert('Hari ini bukan akhir bulan, silahkan cek kembali tanggal hari ini');
      return false;
    } else {
      let oke = confirm('approve gaji akan mengirimkan laporan kepada bos, apakah anda yakin?');
      if (oke) {
        // ambil data dari tabel
        let data = [];
        let table = document.querySelector('#table');
        let rows = table.querySelectorAll('tr');
        for (let i = 1; i < rows.length; i++) {
          let row = rows[i];
          let cells = row.querySelectorAll('td');
          let dataRow = [];
          for (let j = 0; j < cells.length; j++) {
            let cell = cells[j];
            dataRow.push(cell.innerHTML);
          }
          data.push(dataRow);
        }
        // kirim variable data ke server




        // kirim data ke server
        $.ajax({
          type: 'POST',
          url: '/penggajian/approveGaji', // Ganti dengan URL endpoint di CodeIgniter 4
          data: {
            data: data
          },
          success: function (response) {
            alert('berhasil mengirim laporan ke bos');
            console.log(response);
            window.location.href = '';
          },
          error: function (textStatus, errorThrown) {
            alert(textStatus + " " + errorThrown);
            console.error(textStatus + " " + errorThrown);
          }
        });
      }

    }
  }
}
