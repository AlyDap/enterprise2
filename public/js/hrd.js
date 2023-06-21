const myModalAlternative = new bootstrap.Modal(document.getElementById('myModal'));
// start calendar
{

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