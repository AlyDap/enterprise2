<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $totalUser ?></h3>
          <p>User Terdaftar</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card ">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fa fa-users"></i>
            Users
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-secondary btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>

        </div>

        <div class="card-body pt-0">
          <h4 id="tanggal-user" class="my-2"> Juli 2029</h4>
          <div class="alert alert-primary d-flex align-items-center" role="alert">
            <i class="fas fa-info-circle me-2"></i>
            <div id="jarak">
              7 days remaining from gajian
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0 ?>
              <?php foreach ($penggajian as $p) : ?>
                <tr>
                  <th scope="row"><?= $no++ ?></th>
                  <td><?= $p['nama'] ?></td>
                  <td>
                    <span class="badge bg-primary rounded-pill"><?= $p['masuk'] ?></span>
                    <span class="badge bg-warning rounded-pill"><?= $p['telat'] ?></span>
                    <span class="badge bg-danger rounded-pill"><?= $p['sakit'] ?></span>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            <caption>
              <span class="badge bg-primary rounded-pill">masuk</span>
              <span class="badge bg-warning rounded-pill">telat</span>
              <span class="badge bg-danger rounded-pill">sakit</span>
            </caption>
          </table>
        </div>

      </div>
    </div>

    <div class="col-md-6">
      <div class="card ">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="far fa-calendar-alt"></i>
            Calendar
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>

        </div>

        <div class="card-body pt-0">

          <div id="calendar" style="width: 100%">
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js" integrity="sha256-u2yoem2HtOCQCnsp3fO9sj5kUrL+7hOAfm8es18AFjw=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/index.global.min.js'></script>
<script>
  {
    // jika id masih undefined maka akan diisi dengan 0
    if (typeof id === 'undefined') {
      id = 0;
    }


    document.addEventListener('DOMContentLoaded', function() {}.bind(this));
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'id',

      // height: 0
    });
    calendar.render();
    // end calendar
  } {
    document.getElementById('tanggal-user').innerHTML = moment().locale('id').format('dddd DD MMMM YYYY');

    document.getElementById('jarak').innerHTML = moment().endOf('month').format('DD') - moment().format('DD') + ' days remaining from approval';
    if (moment().format('dddd') == 'Friday') {
      document.getElementById('jarak').innerHTML = "Today is Friday, libur"
    }
  }
</script>

<?= $this->endSection(); ?>