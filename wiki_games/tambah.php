<?php 
require 'functions.php';
// cek apakah tombol submit sudah di tekan apa belom
if( isset($_POST["submit"]) ){

	// apakah data berhasil di tambahkan atau tidak
	if ( tambah($_POST) > 0 ){
		echo "
			<script>
			alert('data berhasil ditambahkan!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
		<script>
		alert('data GAGAL ditambahkan!');
		document.location.href = 'index.php';
			</script>
			";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data Hero</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap-reboot.min.css">
</head>
<body>
	<h1>Tambah data Hero</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama"> Name </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<li>
				<label for="type_id"> Type Hero </label>
				<input type="text" name="type_id" id="type_id" required>
			</li>
			<li>
				<label for="photo"> photo </label>
				<input type="file" name="photo" id="photo">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data !</button>
			</li>
		</ul>

	</form>
</body>
</html>