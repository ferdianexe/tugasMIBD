<?php
	include ('connection/session.php');
	$query = "
	SELECT doc.nama as namaDokter, user.nama as namaPasien, penanganan.waktuMulai, penanganan.waktuSelesai, penanganan.tanggal, penanganan.catatan
	FROM pekerjaandokter INNER JOIN 
		dokter ON pekerjaandokter.idDokter = dokter.idDokter
		INNER JOIN users as doc ON doc.idUser = dokter.idUser
		INNER JOIN users as user ON pekerjaandokter.idPasien = user.idUser
		INNER JOIN penanganan ON penanganan.idPenanganan = pekerjaandokter.idPenanganan
	WHERE penanganan.isDeleted = 0 AND pekerjaandokter.sudahBertemu = 1
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
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
		include ('navbar/user-navbar.php'); 
		?>
		<div class="my-container">
			<table>
				<tr>
					<th>Dokter</th>
					<th>Waktu Mulai</th>
					<th>Waktu Selesai</th>
					<th>Date</th>
					<th>Catatan</th>
				</tr>
				<?php 	
					if($result){
						if(!mysqli_num_rows($result)){
							echo "<tr><td colspan=5>
								ANDA BELUM MEMILIKI RIWAYAT KESEHATAN TOLONG LAKUKAN PEMESANAN</td>
								</tr>";
						}
						while($row=$result->fetch_array()){
							echo "<tr>
								<td> ".$row['namaDokter']."</td>
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