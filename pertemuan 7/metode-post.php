<!-- POST digunakan untuk mengirim data melalui permintaan HTTP dan cocok untuk mengirim data yang sensitif atau besar yang tidak seharusnya terlihat pada URL. -->
<!-- perbedaan GET dan POST :
 - Data GET terlihat di URL, sedangkan data POST di kelola di belakang layar.
 - GET cocok untuk mengambil data, sedangkan POST cocok untuk mengirim data sensitif
 - Data GET memiliki batasan panjang URL, sedangkan POST tidak -->
<?php
$nama = $_POST['nama'];
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
  <form method="post" action="">
    Nama: <input type="text" name="nama">
    <input type="submit" value="Kirim">
    <br>
    password: <input type="password" name="password">
    <input type="submit" value="send">
  </form>
</body>
</html>