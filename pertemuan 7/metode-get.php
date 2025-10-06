 <!-- GET digunakan untuk mengirim data melalui url -->
  <!-- data yang dikirim get akan terlihat pada baris alamat URL -->
<?php
$nama = $_GET['nama'];
echo "Halo, $nama!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get dan Post</title>
</head>
<body>
  <form method="get" action="">
    Nama: <input type="text" name="nama">
    <input type="submit" value="Kirim">
    <br>
    password: <input type="password" name="password">
    <input type="submit" value="send">
  </form>
</body>
</html>