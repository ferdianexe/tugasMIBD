<?php
	include ('connection/session.php');
	$query = " SELECT tusers.nama as nama ,tusers.username as username,tusers.jenisKelamin as jenisKelamin,tusers.Alamat as Alamat,tspesial.namaSpesialisasi as spesialisasi,noRuangan
	FROM dokter INNER JOIN spesialisasi as tspesial on tspesial.idSpesialisasi = dokter.idSpesialisasi
				INNER JOIN users as tusers on dokter.idUser = tusers.idUser ";
	$result =$conn->query($query);
	echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lihat daftar Dokter</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	<?php include ('navbar/admin-navmenu.php')?>				
	<div class="my-container">
		<table>
			<tr>
				<th>Nama</th>
				<th>Username</th>
				<th>Jenis Kelamin</th>
				<th>No Ruangan</th>
				<th>Shift Kerja</th>
				<th>Alamat</th>
				<th>Spesialisasi</th>
			</tr>
			<?php
				if($result){
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
								<td> ".$row['noRuangan']."</td>
								<td> SEHARIAN </td>
								<td> ".$row["Alamat"]."</td>
								<td> ".$row["spesialisasi"]."</td>
						";
												}
				}
												
											?>
		</table>
	</div>
	</body>
</html>