<?php 
require 'functions.php';

// ambil data di URL
$id_heroes = $_GET["id"];
// query data mahasiswa berdasarkan id
$hero = query ("SELECT * FROM heroes_tb WHERE id_heroes = $id_heroes")[0];


// cek apakah tombol submit sudah di tekan apa belom
if( isset($_POST["submit"]) ){



	// apakah data berhasil di ubah atau tidak
	if ( ubah($_POST) > 0 ){
		echo "
			<script>
			alert('data berhasil diubah!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
		<script>
		alert('data GAGAL diubah!');
		document.location.href = 'index.php';
			</script>
			";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data Hero</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap-reboot.min.css">
</head>
<body>
	<h1>Ubah data Hero</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $hero["id_heroes"]; ?>">
		<input type="hidden" name="gambarlama" value="<?= $hero["photo"]; ?>">
		<ul>
			<div class="form-group">
			<li>
				<label for="nama"> Name </label>
				<input type="text" name="nama" id="nama" required value="<?= $hero["nama"]; ?>">
			</li>
		</div>
		<div class="form-group">
			<li>
				<label for="type_id"> Type Hero </label>
				<input type="text" name="type_id" id="type_id" required value="<?= $hero["type_id"]; ?>">
			</li>
		</div>
		<div class="form-group">
			<li>
				<label for="photo"> Gambar </label>
				<img src="img/<?= $hero['photo']; ?>" width="70"><br>
				<input class="form-control-file" type="file" name="photo" id="photo">
			</li>
		</div>
		<div class="form-group">
			<li>
				<button type="submit" name="submit">Ubah Data !</button>
			</li>
		</div>
		</ul>

	</form>
</body>
</html>