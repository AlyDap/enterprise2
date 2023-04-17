<!DOCTYPE html>
<html>

<head>
  <title>Absensi Karyawan</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <h1>Absensi Karyawan</h1>
    <form action="submit.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="form-group">
        <label for="foto">Foto:</label>
        <input type="file" accept="image/*" capture="camera" class="form-control-file" id="foto" name="foto" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>