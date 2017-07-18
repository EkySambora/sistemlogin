<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title; ?></title>
</head>
<body>
<?php $row = $artikel_detail; ?>
  <h1>Edit Data <?php echo $row->id;	?></h1>
  	
  <form action="" method="post">
    <input type="text" value="<?php echo $row->judul; ?> " name="judul" placeholder="Judul"><br><br>
    <textarea name="detail" placeholder="detail" ><?php echo $row->detail; ?></textarea><br>
    <input type="hidden" name='id' value="<?php echo $row->id; ?>"><br>
    <input type="submit" value="Edit" name="update">
  </form>
  <a href="<?= site_url('artikel/index');?>"> Kembali</a>
</body>
</html>