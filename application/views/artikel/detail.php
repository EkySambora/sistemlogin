<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
</head>
<body>
	<?php $row =  $artikel_detail;?>
	<h1><?= $row->judul; ?></h1>
	<p><?= $row->detail; ?></p>
	<p><?= $row->tanggal; ?></p>
	<a href="<?= site_url('artikel'); ?>">Kembali</a>
</body>
</html>