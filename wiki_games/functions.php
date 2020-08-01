<?php 
// koneksi database
$conn = mysqli_connect("localhost","root","","db_wiki_games");
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
} 

function tambah($data){
	global $conn;
	// ambil data dari tiap elemen dalam form
	$nama = htmlspecialchars($data['nama']);
	$type_id = htmlspecialchars($data['type_id']);
	// upload gambar
	$photo = upload();
	if (!$photo){
		return false;
	}
	// query insert data
	$query = "INSERT INTO heroes_tb
				VALUES
				('', '$nama', '$type_id', '$photo')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
function upload(){

	$namafile = $_FILES['photo']['name'];
	$ukuran = $_FILES['photo']['size'];
	$error = $_FILES['photo']['error'];
	$tmpname = $_FILES['photo']['tmp_name'];

	// cek apakah tidak ada gambar yang di upload
	if ($error === 4 ) {
		echo "<script>
		alert('pilih photo terlebih dahulu');
		</script>";
		return false;
	}
	// cek apakah yang di upload adalah gambar
	$ekstensigambarvalid = ['jpg','jpeg', 'png'];
	$ekstensigambar = explode('.', $namafile);
	$ekstensigambar = strtolower(end($ekstensigambar));
	if ( !in_array($ekstensigambar, $ekstensigambarvalid) ) {
		echo "<script>
		alert('yang anda upload bukan photo');
		</script>";
		return false;
	}
	// jika ukurannya terlalu besar
	if ( $ukuran > 2000000 ) {
		echo "<script>
		alert('ukuran photo terlalu besar');
		</script>";
		return false;
	}
	// lolos pengecekan gambar siap di upload
	// generate nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensigambar;

	move_uploaded_file($tmpname,'img/' . $namafilebaru);
	return $namafilebaru;
}

function ubah($data){
		global $conn;
	// ambil data dari tiap elemen dalam form
	$id_heroes = $data["id"];
	$nama = htmlspecialchars($data['nama']);
	$type_id = htmlspecialchars($data['type_id']);
	$gambarlama = htmlspecialchars($data['gambarlama']);
	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['photo']['error'] === 4 ) {
		$photo = $gambarlama;
	} else {
		$photo = upload();
	}

	

	// query insert data
	$query = "UPDATE heroes_tb SET
				nama = '$nama',
				type_id = '$type_id',
				photo = '$photo'
				WHERE id_heroes = $id_heroes
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function hapus($id_heroes){
	global $conn;
	mysqli_query($conn,"DELETE FROM heroes_tb WHERE id_heroes = $id_heroes");
	return mysqli_affected_rows($conn);
}

?>