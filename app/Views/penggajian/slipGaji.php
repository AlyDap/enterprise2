<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<script src="https://unpkg.com/@develoka/angka-terbilang-js/index.min.js"> </script>

<div class="row">
  <div class="col">
    <div class="card border-primary">
      <table class="table table-borderless table-sm">
        <tr>
          <td colspan="2">
            <article class=""> <b>BATIK M SARI</b></article>
            <article class="">Jl. Raya Jenggot No 67</article>
            <article class="">Telp. 086498755521</article>
          </td>
          <td class="text-center">
            <article class="text-white"> -</article>
            <article class="fs-5 p-2 "><b>SLIP GAJI KARYAWAN</b></article>
            <article class="fs-6 "><b><?= $bulan ?></b></article>
          </td>
          <td>
            <article>Tanggal</article>
            <article>id Karyawan</article>
            <article>Username</article>
          </td>
          <td>
            <article>: <?= $tgl ?></article>
            <article>: <?= $penggajian['id_user'] ?></article>
            <article>: <?= $penggajian['username'] ?></article>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <hr class="m-0 p-1">
          </td>
        </tr>
        <tr>
          <td>
            <article>Nama</article>
            <article>Jabatan</article>
          </td>
          <td>
            <article>: <?= $penggajian['username'] ?></article>
            <article>: <?= $penggajian['jabatan'] ?></article>
          </td>
          <td></td>
          <td>
            <article>Jenis Kelamin</article>
            <article>Bank</article>
          </td>
          <td>
            <article>: Laki-Laki</article>
            <article>: BRI</article>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <hr class="m-0">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <article>Rincian</article>
            <ul class="my-0">
              <li> Hari Kerja</li>
              <li> Jam Kerja</li>
              <li> Gaji Pokok</li>
            </ul>
          </td>
          <?php $gajiHarian = $penggajian['gaji_pokok'] / $kerja['hari_kerja_sebulan'] * $penggajian['masuk'] ?>
          <td>
            <article class="text-white">-</article>
            <article>: <?= $penggajian['masuk'] ?> Hari / <?= $kerja['hari_kerja_sebulan'] ?> Hari</article>
            <article>: <?= $penggajian['jam_kerja'] ?> Jam / <?= $kerja['hari_kerja_sebulan'] * 8 ?> Jam</article>
            <article>: <?= "Rp " . number_format($gajiHarian, 0, ',', '.') ?> / <?= "Rp " . number_format($penggajian['gaji_pokok'], 0, ',', '.');  ?></article>
          </td>
          <td>

          </td>
          <td>
            <article class="text-white">-</article>
            <article class="text-white">-</article>
            <article class="text-white">-</article>
            <article><?= "Rp " . number_format($gajiHarian, 0, ',', '.');  ?></article>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <hr class="m-0 ">
          </td>
        </tr>
        <tr class="text-center">
          <td colspan="4">
            <article><b>TOTAL</b></article>
          </td>
          <td>
            <article><b><?= "Rp " . number_format($gajiHarian, 0, ',', '.');  ?></b></article>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <hr class="m-0 ">
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <article>Potongan</article>
            <ul class="my-0">
              <li>Terlambat</li>
              <li>Sakit</li>
            </ul>
          </td>
          <td>
            <article class="text-white">-</article>
            <article>: <?= $penggajian['terlambat'] ?> Jam</article>
            <article>: <?= $penggajian['sakit'] ?> Hari</article>
          </td>
          <td>
            <article class="text-white">-</article>
            <article><?= "Rp " . number_format($penggajian['terlambat'] * 10000, 0, ',', '.');  ?></article>
            <article><?= "Rp " . number_format($gajiHarian * $penggajian['sakit'], 0, ',', '.');  ?></article>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="5">
            <hr class="m-0 ">
          </td>
        </tr>
        <tr class="text-center">
          <td colspan="4">
            <article><b>TOTAL DITERIMA</b></article>
          </td>
          <td>
            <article><b><?= "Rp " . number_format($penggajian['gaji'], 0, ',', '.');  ?></b></article>
          </td>
        </tr>
        <tr>
          <td colspan="5">
            <hr class="m-0 ">
          </td>
        </tr>
        <tr>
          <td colspan="5" class="text-center">
            <b><em>
                <article id="terbilang" class="my-0"> terbilang</article>
              </em></b>
          </td>
        </tr>
        <tr class="text-center">
          <td colspan="2">
            <article>Dibuat Oleh,</article>
            <article class="text-white">-</article>
            <article class="text-white">-</article>
            <article class="text-white">-</article>
            <article style="font-weight: bold; text-decoration:underline ;"><?= $pencatat ?></article>
            <article>HRD</article>
          </td>
          <td></td>
          <td colspan="2">
            <article>Penerima</article>
            <article class="text-white">-</article>
            <article class="text-white">-</article>
            <article class="text-white">-</article>
            <article style="font-weight: bold; text-decoration:underline ;"><?= $penggajian['username'] ?></article>
            <article><?= $penggajian['jabatan'] ?>
            </article>
          </td>
        </tr>
      </table>
    </div>
  </div>

</div>
<a href="<?= base_url('dashboard') ?>" class="btn btn-primary">Kembali</a>

<script>
  let gajiDiterima = <?= $penggajian['gaji'] ?>;
  let terbilang = angkaTerbilang(gajiDiterima);
  document.getElementById('terbilang').innerHTML = terbilang + " Rupiah";
</script>
<?= $this->endSection() ?>