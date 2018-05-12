<?php
	include ('connection/session.php');
	if(isset($_GET['aktif'])){
		$idUser = $_GET['aktif'];
		$query = "UPDATE users
				  SET isActive=1
				  WHERE idUser=$idUser";
		$conn->query($query);
		echo mysqli_error($conn);
		header("Location:notifikasi.php");
		exit();
	}
	$query = " SELECT nama,username,jenisKelamin,Alamat,idUser
	FROM users
	WHERE priviledge=1 AND isActive =0";
    $result =$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Notifikasi</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php include ('navbar/admin-navmenu.php')?>	
		<div class="my-container">
			<table class='table table-striped'>
				<tr>
					<th>Nama</th>
					<th>Username</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Aktifkan</th>
				</tr>
			<?php
				while ($row=$result->fetch_array()) {
						if ($row['jenisKelamin']=='L') {
								$jenisKelamin = "Laki Laki";
						} else {
								$jenisKelamin ="Perempuan";
						}
						echo "<tr>
						<td>". $row["nama"] ."</td>
						<td> ".$row["username"] ."</td>
						<td> ".$jenisKelamin."</td>
						<td> ".$row["Alamat"]."</td>
						<td><a href=notifikasi.php?aktif=".$row['idUser'].">AKTIFKAN</a></td></tr>";
						}
			?>
	</body>
</html>