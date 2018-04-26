<?php
	include ('connection/session.php');
	$query = " SELECT nama,username,jenisKelamin,Alamat,tarif,tspesial.namaSpesialisasi
	FROM users INNER JOIN spesialisasi as tspesial
	on tspesial.idSpesialisasi = users.idSpesialisasi
	WHERE priviledge=2";
    $result =$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lihat daftar Dokter</title>
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
		<?php include ('navbar/admin-navmenu.php')?>				
			<div class="container">
				<table class='table table-striped'>
					<tr>
						<th>Nama</th>
						<th>Username</th>
						<th>Jenis Kelamin</th>
						<th>No Ruangan</th>
						<th>Tarif</th>
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
										<td> 9022 </td>
										<td> ".$row['tarif']."</td>
										<td> SEHARIAN </td>
										<td> ".$row["Alamat"]."</td>
										<td> ".$row["namaSpesialisasi"]."</td>
								";
                            }
						}
                           
                         ?>
				</table>
			</div>
		</div>
	</body>
</html>