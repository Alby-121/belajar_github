<?php 
// Koneksi database
$conn = mysqli_connect('localhost','root','','car') or die ('Gagal koneksi');
//  CREATE
if(isset($_POST['save'])){
  $id =(int)$_POST['id'];
  $n = $_POST['nama'];
  $m = $_POST['merk'];
  $h = $_POST['harga'];
  $g = $_POST['gambar'];
  mysqli_query($conn, "INSERT INTO mobil(nama,merk,harga,gambar) VALUES('$n','$m','$h','$g')");
  header('Location: index.php');
}
// DELETE
if(isset($_GET['hapus'])){
  $id = (int)$_GET['hapus'];
  mysqli_query($conn, "DELETE FROM mobil WHERE id=$id");
  header('Location: index.php');
}
// UPDATE
if(isset($_POST['update'])){
  $id = (int)$_POST['id'];
  $n = $_POST['nama'];
  $m = $_POST['merk'];
  $h = $_POST['harga'];
  $g = $_POST['gambar'];
  mysqli_query($conn, "UPDATE mobil SET nama= '$n', merk='$m', harga='$h', gambar='$g' WHERE id=$id");
  header('Location: index.php');
}
// pencarian

$cari = $_GET['cari'] ?? '';
if($cari){
$result = mysqli_query($conn, "SELECT * FROM mobil WHERE nama LIKE '%$cari%' OR merk LIKE '%$cari%' OR harga LIKE '%$cari%'");
} else {
$result = mysqli_query($conn, "SELECT * FROM mobil");
}

$edit = null;
if(isset($_GET['edit'])){
  $id = (Int)$_GET['edit'];
  $edit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mobil WHERE id=$id"));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mobil</title>
    <style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body>
    <h2>Data Pembeli Mobil</h2>
    <form method="get">
      <input type="text" name="cari" placeholder="Cari nama atau merk..." value="<?= htmlspecialchars($cari) ?> ">
      <button type="submit">Cari</button>
    </form> 
    <form method="post">
      <input type="hidden" name="id" value="<?= $edit['id']??' '?>">
        <label for="nama">nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?= $edit['nama']??' '?>"><br>
        <label for="merk">merk:</label><br>
        <input type="text" id="merk" name="merk" value="<?= $edit['merk']??' '?>"><br>
        <label for="harga">harga:</label><br>
        <input type="number" id="harga" name="harga" value="<?= $edit['harga']??' '?>">
        <label for="gambar">gambar:</label><br>
        <input type="file" id="gambar" name="gambar" value="<?= $edit['gambar']??' '?>">
        <?php if($edit): ?>
        <button name="update">Update</button>
        <a href="index.php">Batal</a>
        <?php else: ?>
        <button name="save">Simpan</button><br><br>
        <?php endif; ?>
    </form>
    <br>
    <h3>Table Pembeli</h3>
<table style="width:40%" cellpadding="5" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Merk</th>
    <th>Harga</th>
    <th>Gambar</th>
    <th>Aksi</th>
  </tr>
  <?php $no=1; while($row = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= $no++ ?></td>
    <td><?= $row['nama']?></td>
    <td><?= $row['merk']?></td>
    <td><?= $row['harga']?></td>
    <td><img src="<?= $row['gambar'] ?>" width="120"></td>
    <td> 
        <a href="?edit=<?= $row['id'] ?>">Edit</a> | 
        <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>