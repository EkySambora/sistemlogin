<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title; ?></title>
</head>
<body>
  <h1>Tambah Data</h1>
  <form action="" method="post">
    <input type="text" name="judul" placeholder="Judul"><br><br>
    <textarea name="detail" placeholder="detail"></textarea><br>
    <input type="submit" value="kirim" name="kirim">
  </form>
  <a href="<?= site_url('artikel/index');?>"> Kembali</a>
</body>
</html>