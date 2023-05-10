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
          <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
            <div class="fc-toolbar-chunk">
              <div class="btn-group"><button type="button" title="Previous month" aria-pressed="false" class="fc-prev-button btn btn-primary"><span class="fa fa-chevron-left"></span></button><button type="button" title="Next month" aria-pressed="false" class="fc-next-button btn btn-primary"><span class="fa fa-chevron-right"></span></button></div><button type="button" title="This month" disabled="" aria-pressed="false" class="fc-today-button btn btn-primary">today</button>
            </div>
            <div class="fc-toolbar-chunk">
              <h2 class="fc-toolbar-title" id="fc-dom-1">May 2023</h2>
            </div>
            <div class="fc-toolbar-chunk">
              <div class="btn-group"><button type="button" title="month view" aria-pressed="true" class="fc-dayGridMonth-button btn btn-primary active">month</button><button type="button" title="week view" aria-pressed="false" class="fc-timeGridWeek-button btn btn-primary">week</button><button type="button" title="day view" aria-pressed="false" class="fc-timeGridDay-button btn btn-primary">day</button></div>
            </div>
          </div>
          <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 436.296px;">
            <div class="fc-daygrid fc-dayGridMonth-view fc-view">
              <table role="grid" class="fc-scrollgrid table-bordered fc-scrollgrid-liquid">
                <thead role="rowgroup">
                  <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                    <th role="presentation">
                      <div class="fc-scroller-harness">
                        <div class="fc-scroller" style="overflow: hidden scroll;">
                          <table role="presentation" class="fc-col-header " style="width: 570px;">
                            <colgroup></colgroup>
                            <thead role="presentation">
                              <tr role="row">
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-sun">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Sunday" class="fc-col-header-cell-cushion ">Sun</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-mon">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Monday" class="fc-col-header-cell-cushion ">Mon</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-tue">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Tuesday" class="fc-col-header-cell-cushion ">Tue</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-wed">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Wednesday" class="fc-col-header-cell-cushion ">Wed</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-thu">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Thursday" class="fc-col-header-cell-cushion ">Thu</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-fri">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Friday" class="fc-col-header-cell-cushion ">Fri</a></div>
                                </th>
                                <th role="columnheader" class="fc-col-header-cell fc-day fc-day-sat">
                                  <div class="fc-scrollgrid-sync-inner"><a aria-label="Saturday" class="fc-col-header-cell-cushion ">Sat</a></div>
                                </th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                    </th>
                  </tr>
                </thead>
                <tbody role="rowgroup">
                  <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                    <td role="presentation">
                      <div class="fc-scroller-harness fc-scroller-harness-liquid">
                        <div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden scroll;">
                          <div class="fc-daygrid-body fc-daygrid-body-unbalanced " style="width: 570px;">
                            <table role="presentation" class="fc-scrollgrid-sync-table" style="width: 570px; height: 404px;">
                              <colgroup></colgroup>
                              <tbody role="presentation">
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other" data-date="2023-04-30" aria-labelledby="fc-dom-2">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-2" class="fc-daygrid-day-number" aria-label="April 30, 2023">30</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2023-05-01" aria-labelledby="fc-dom-4">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-4" class="fc-daygrid-day-number" aria-label="May 1, 2023">1</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past" style="border-color: rgb(245, 105, 84); background-color: rgb(245, 105, 84);">
                                            <div class="fc-event-main">
                                              <div class="fc-event-main-frame">
                                                <div class="fc-event-title-container">
                                                  <div class="fc-event-title fc-sticky">All Day Event</div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="fc-event-resizer fc-event-resizer-end"></div>
                                          </a></div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2023-05-02" aria-labelledby="fc-dom-6">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-6" class="fc-daygrid-day-number" aria-label="May 2, 2023">2</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2023-05-03" aria-labelledby="fc-dom-8">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-8" class="fc-daygrid-day-number" aria-label="May 3, 2023">3</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2023-05-04" aria-labelledby="fc-dom-10">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-10" class="fc-daygrid-day-number" aria-label="May 4, 2023">4</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2023-05-05" aria-labelledby="fc-dom-12">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-12" class="fc-daygrid-day-number" aria-label="May 5, 2023">5</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="top: 0px; left: 0px; right: -81.9155px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-past" style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);">
                                            <div class="fc-event-main">
                                              <div class="fc-event-main-frame">
                                                <div class="fc-event-time">12a</div>
                                                <div class="fc-event-title-container">
                                                  <div class="fc-event-title fc-sticky">Long Event</div>
                                                </div>
                                              </div>
                                            </div>
                                          </a></div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 25px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2023-05-06" aria-labelledby="fc-dom-14">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-14" class="fc-daygrid-day-number" aria-label="May 6, 2023">6</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 25px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-05-07" aria-labelledby="fc-dom-16">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-16" class="fc-daygrid-day-number" aria-label="May 7, 2023">7</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-end fc-event-past" style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);">
                                            <div class="fc-event-main">
                                              <div class="fc-event-main-frame">
                                                <div class="fc-event-time">12a</div>
                                                <div class="fc-event-title-container">
                                                  <div class="fc-event-title fc-sticky">Long Event</div>
                                                </div>
                                              </div>
                                            </div>
                                          </a></div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2023-05-08" aria-labelledby="fc-dom-18">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-18" class="fc-daygrid-day-number" aria-label="May 8, 2023">8</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2023-05-09" aria-labelledby="fc-dom-20">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-20" class="fc-daygrid-day-number" aria-label="May 9, 2023">9</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-today " data-date="2023-05-10" aria-labelledby="fc-dom-22">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-22" class="fc-daygrid-day-number" aria-label="May 10, 2023">10</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(0, 115, 183);"></div>
                                            <div class="fc-event-time">10:30a</div>
                                            <div class="fc-event-title">Meeting</div>
                                          </a></div>
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(0, 192, 239);"></div>
                                            <div class="fc-event-time">12p</div>
                                            <div class="fc-event-title">Lunch</div>
                                          </a></div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-05-11" aria-labelledby="fc-dom-24">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-24" class="fc-daygrid-day-number" aria-label="May 11, 2023">11</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(0, 166, 90);"></div>
                                            <div class="fc-event-time">7p</div>
                                            <div class="fc-event-title">Birthday Party</div>
                                          </a></div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-05-12" aria-labelledby="fc-dom-26">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-26" class="fc-daygrid-day-number" aria-label="May 12, 2023">12</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-05-13" aria-labelledby="fc-dom-28">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-28" class="fc-daygrid-day-number" aria-label="May 13, 2023">13</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-05-14" aria-labelledby="fc-dom-30">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-30" class="fc-daygrid-day-number" aria-label="May 14, 2023">14</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-05-15" aria-labelledby="fc-dom-32">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-32" class="fc-daygrid-day-number" aria-label="May 15, 2023">15</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-05-16" aria-labelledby="fc-dom-34">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-34" class="fc-daygrid-day-number" aria-label="May 16, 2023">16</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-05-17" aria-labelledby="fc-dom-36">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-36" class="fc-daygrid-day-number" aria-label="May 17, 2023">17</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-05-18" aria-labelledby="fc-dom-38">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-38" class="fc-daygrid-day-number" aria-label="May 18, 2023">18</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-05-19" aria-labelledby="fc-dom-40">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-40" class="fc-daygrid-day-number" aria-label="May 19, 2023">19</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-05-20" aria-labelledby="fc-dom-42">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-42" class="fc-daygrid-day-number" aria-label="May 20, 2023">20</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-05-21" aria-labelledby="fc-dom-44">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-44" class="fc-daygrid-day-number" aria-label="May 21, 2023">21</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-05-22" aria-labelledby="fc-dom-46">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-46" class="fc-daygrid-day-number" aria-label="May 22, 2023">22</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-05-23" aria-labelledby="fc-dom-48">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-48" class="fc-daygrid-day-number" aria-label="May 23, 2023">23</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-05-24" aria-labelledby="fc-dom-50">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-50" class="fc-daygrid-day-number" aria-label="May 24, 2023">24</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-05-25" aria-labelledby="fc-dom-52">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-52" class="fc-daygrid-day-number" aria-label="May 25, 2023">25</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-05-26" aria-labelledby="fc-dom-54">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-54" class="fc-daygrid-day-number" aria-label="May 26, 2023">26</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-05-27" aria-labelledby="fc-dom-56">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-56" class="fc-daygrid-day-number" aria-label="May 27, 2023">27</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-05-28" aria-labelledby="fc-dom-58">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-58" class="fc-daygrid-day-number" aria-label="May 28, 2023">28</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future" href="https://www.google.com/">
                                            <div class="fc-daygrid-event-dot" style="border-color: rgb(60, 141, 188);"></div>
                                            <div class="fc-event-time">12a</div>
                                            <div class="fc-event-title">Click for Google</div>
                                          </a></div>
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-05-29" aria-labelledby="fc-dom-60">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-60" class="fc-daygrid-day-number" aria-label="May 29, 2023">29</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-05-30" aria-labelledby="fc-dom-62">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-62" class="fc-daygrid-day-number" aria-label="May 30, 2023">30</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-05-31" aria-labelledby="fc-dom-64">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-64" class="fc-daygrid-day-number" aria-label="May 31, 2023">31</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2023-06-01" aria-labelledby="fc-dom-66">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-66" class="fc-daygrid-day-number" aria-label="June 1, 2023">1</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2023-06-02" aria-labelledby="fc-dom-68">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-68" class="fc-daygrid-day-number" aria-label="June 2, 2023">2</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2023-06-03" aria-labelledby="fc-dom-70">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-70" class="fc-daygrid-day-number" aria-label="June 3, 2023">3</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                                <tr role="row">
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future fc-day-other" data-date="2023-06-04" aria-labelledby="fc-dom-72">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-72" class="fc-daygrid-day-number" aria-label="June 4, 2023">4</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other" data-date="2023-06-05" aria-labelledby="fc-dom-74">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-74" class="fc-daygrid-day-number" aria-label="June 5, 2023">5</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other" data-date="2023-06-06" aria-labelledby="fc-dom-76">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-76" class="fc-daygrid-day-number" aria-label="June 6, 2023">6</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2023-06-07" aria-labelledby="fc-dom-78">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-78" class="fc-daygrid-day-number" aria-label="June 7, 2023">7</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2023-06-08" aria-labelledby="fc-dom-80">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-80" class="fc-daygrid-day-number" aria-label="June 8, 2023">8</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2023-06-09" aria-labelledby="fc-dom-82">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-82" class="fc-daygrid-day-number" aria-label="June 9, 2023">9</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                  <td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2023-06-10" aria-labelledby="fc-dom-84">
                                    <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                      <div class="fc-daygrid-day-top"><a id="fc-dom-84" class="fc-daygrid-day-number" aria-label="June 10, 2023">10</a></div>
                                      <div class="fc-daygrid-day-events">
                                        <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div>
                                      </div>
                                      <div class="fc-daygrid-day-bg"></div>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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
      initialView: 'dayGridMonth'
    });
    calendar.render();
  });
  $(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function() {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0 //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [{
          title: 'All Day Event',
          start: new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor: '#f56954', //red
          allDay: true
        },
        {
          title: 'Long Event',
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor: '#f39c12' //yellow
        },
        {
          title: 'Meeting',
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          backgroundColor: '#0073b7', //Blue
          borderColor: '#0073b7' //Blue
        },
        {
          title: 'Lunch',
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor: '#00c0ef' //Info (aqua)
        },
        {
          title: 'Birthday Party',
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor: '#00a65a' //Success (green)
        },
        {
          title: 'Click for Google',
          start: new Date(y, m, 28),
          end: new Date(y, m, 29),
          url: 'https://www.google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor: '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function(e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color': currColor
      })
    })
    $('#add-new-event').click(function(e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color': currColor,
        'color': '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
<?= $this->endSection(); ?>