<?php
    include('connection/session.php');
    $query = "SELECT totalJam , kumpulanDokter.idDokter as 'dokterID',nama
				FROM(
						SELECT SUM(jumlah) as 'totalJam', himpunanJumlah.idDokter
							FROM(
									SELECT idDokter,TIMESTAMPDIFF(HOUR,waktuMulai,waktuSelesai) as 'jumlah' 
									FROM jadwalpraktek
								) as himpunanJumlah
						GROUP BY himpunanJumlah.idDokter
        			) as jumlahJamDokter
       			right join 
                	(
                    	SELECT *
                        FROM dokter
                        
					) as kumpulanDokter on kumpulanDokter.idDokter = jumlahJamDokter.idDokter
					inner join 
					(
						SELECT nama,idUser
						from Users	

					)as kumpulanUser on kumpulanUser.idUser = kumpulanDokter.idUser";
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
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
			<?php include('navbar/admin-navmenu.php')?>	
			<div class="my-container">
				<table>
					<tr>
						<th>idDokter</th>
						<th>Dokter</th>
						<th>Total Jam Perminggu</th>
					</tr>
							<?php
                        if ($result) {
                            while ($row=$result->fetch_array()) {
                                echo "<tr>
									<td>".$row['dokterID']."</td>
									<td>".$row['nama']."</td>
									";
									if($row['totalJam']){
										echo "<td>".$row['totalJam']."</td>";
									}else{
										echo "<td> 0 </td>";
									}
									echo "</tr>";
									
							}
						}
                    ?>
				</table>
			</div>
		
	</body>
</html>