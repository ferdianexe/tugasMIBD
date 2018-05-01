<?php
	include ('connection/session.php');
	$query = "
	SELECT doc.nama as namaDokter, user.nama as namaPasien, penanganan.waktuMulai, penanganan.waktuSelesai, penanganan.tanggal, penanganan.catatan
	FROM pekerjaandokter INNER JOIN 
		dokter ON pekerjaandokter.idDokter = dokter.idDokter
		INNER JOIN users as doc ON doc.idUser = dokter.idUser
		INNER JOIN users as user ON pekerjaandokter.idPasien = user.idUser
		INNER JOIN penanganan ON penanganan.idPenanganan = pekerjaandokter.idPenanganan
	WHERE penanganan.isDeleted = 0
	";
	$result = $conn->query($query);
	if($result){
	}else{
		echo mysqli_error($conn);
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>History</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<!-- <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class='index-navbar'>
			<?php
			include ('navbar/user-navbar.php'); 
			?>
		</div>
			<div class="container">
				<table class='table table-striped'>
					<tr>
						<th>Dokter</th>
						<th>Waktu Mulai</th>
						<th>Waktu Selesai</th>
						<th>Date</th>
						<th>Catatan</th>
					</tr>
					<?php 
						if($result){
							while($row=$result->fetch_array()){
								echo "<tr>
									<td> ".$row['nama']."</td>
									<td> ".$row['waktuMulai']."</td>
									<td> ".$row['waktuSelesai']."</td>
									<td> ".$row['tanggal']."</td>
									<td>".$row['catatan']."</td>";
							}
						}
					?>
				</table>
			</div>
		
	</body>
</html>