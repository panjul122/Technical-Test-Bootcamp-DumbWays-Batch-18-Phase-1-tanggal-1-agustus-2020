<?php
require 'functions.php';
$id_heroes = $_GET["id"];

if ( hapus($id_heroes) > 0 ){
		echo "
			<script>
			alert('data berhasil dihapus!');
			document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
		<script>
		alert('data GAGAL dihapus!');
		document.location.href = 'index.php';
			</script>
			";
		}
?>