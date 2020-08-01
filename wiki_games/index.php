<?php 
require 'functions.php';
$hero = query("SELECT id_heroes, `heroes_tb`.nama, `type_tb`.name AS name_type, photo FROM `heroes_tb`, `type_tb` WHERE`heroes_tb`.`type_id`=`type_tb`.`id_type` GROUP BY id_heroes ORDER BY id_heroes ASC");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tampil Data</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap-grid.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3-dist/css/bootstrap-reboot.min.css">
</head>
<body>
<div class="container-fluid">
	<h4>Daftar Hero</h4>
	<a href="tambah.php" class="btn btn-success" >tambah data Hero</a>
	<div class="row" style="margin-top: 20px;">
		<?php  foreach ($hero as $row ) : ?>
			<div class="col-sm-3" style="display: grid !important; margin-bottom: 10px;">
				<div class="card">
			      <div class="card-body">
			      	<div class="heroes-img">
			      		<img src="img/<?= $row["photo"] ?>" class="rounded mx-auto d-block">
			      	</div>
			      	<div class="wrapper" style="display: grid; text-align: center;">
			      		<span><?= $row["nama"]; ?></span>
				        <span style="margin-top: 4px;"><?= $row["name_type"]; ?></span>
				        <a href="detail.php?id=<?= $row["id_heroes"] ?>" class="btn btn-danger" style="margin-top: 4px; ">
				        	Detail
				        </a>
				       	<span style="font-weight: 500; font-size: 16px; margin-top: 6px;">
				       		<a href="ubah.php?id=<?= $row["id_heroes"] ?>">Ubah</a> |
							<a href="hapus.php?id=<?= $row["id_heroes"] ?>" onclick="return confirm('yakin?');">Hapus</a>
				       	</span>
			      	</div>
			      </div>
			    </div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<script type="text/javascript" href="css/bootstrap-4.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" href="css/bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
</body>
</html>