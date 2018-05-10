<?php
    include('connection/session.php');
    $query = " SELECT daftarDokter.nama as 'namaDokter',daftarPasien.nama as 'namaPasien',tarif,waktuMulai,waktuSelesai,tanggal,catatan,isDeleted,waktuPengubahan
			   FROM
				(
					SELECT pekerjaanDokter.idPenanganan,tarif,waktuMulai,waktuSelesai,tanggal,catatan,isDeleted,waktuPengubahan,idDokter,idPasien
			   		FROM penanganan
			  		Inner Join pekerjaandokter on pekerjaanDokter.idPenanganan = penanganan.idPenanganan
					WHERE pekerjaandokter.sudahBertemu = 1 

				) as daftarPenanganan
				INNER JOIN 
					(
						SELECT nama,dokter.iddokter
						FROM dokter
						inner join users on users.idUser = dokter.idUser
					) as daftarDokter on daftarDokter.idDokter = daftarPenanganan.idDokter
				INNER JOIN 
				(
					SELECT nama,idUser
					FROM users
				) as daftarPasien on daftarPasien.idUser = daftarPenanganan.idPasien
	";
	$result = $conn->query($query);
	echo mysqli_error($conn);

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
		
			<?php include('navbar/admin-navmenu.php')?>	
				
			<div class="container">
				<table class='table table-striped'>
					<tr>
						<th>Dokter</th>
						<th>Pasien</th>
						<th>Waktu Mulai</th>
						<th>Waktu Selesai</th>
						<th>Date</th>
						<th>Catatan</th>
						<th>Is Deleted</th>
						<th>Waktu Pengubahan</th>
					</tr>
					<?php
                        if ($result) {
                            while ($row=$result->fetch_array()) {
                                echo "<tr>
									<td>".$row['namaDokter']."</td>
									<td>".$row['namaPasien']."</td>
									<td>".$row['waktuMulai']."</td>
									<td>".$row['waktuSelesai']."</td>
									<td>".$row['tanggal']."</td>
									<td>".$row['catatan']."</td>
								";
                                if ($row['isDeleted']) {
                                    echo "<td> Sudah dihapus </td>";
                                } else {
                                    echo "<td> Belum dihapus </td>";
                                }
                                if ($row['waktuPengubahan']) {
                                    echo "<td>".$row['waktuPengubahan']."</td>";
                                } else {
                                    echo "<td> Belum pernah diedit </td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "Belum ada catatan untuk saat ini";
                        }
                    ?>
				</table>
			</div>
		
	</body>
</html>