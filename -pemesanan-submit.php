<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemesanan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php
			include('navbar/user-navbar.php'); 
		?>
		<div class='my-container centered-container'>
			<?php
				if($_SERVER['REQUEST_METHOD']=='POST'){
					if (isset($_SESSION['orderErrorId'])) {
						if ($_SESSION['orderErrorId']==4) {
							echo "<h2>PENDAFTARAN SUCCESS</h2>";
							unset($_SESSION['orderErrorId']);
						}
					}
				}else if($_SERVER['REQUEST_METHOD']=='GET'){
					echo "<h2>SUDAH PERNAH MEMESAN</h2>";
				}
				$nowDate = date('Y-m-d');
				$queryForUpdate = "SELECT idPenanganan, idSpesialisasi, dokter.idDokter, waktuTemu FROM pekerjaandokter INNER JOIN dokter 
													ON pekerjaandokter.idDokter = dokter.idDokter
													WHERE idPasien = '$_SESSION[id]' AND DATEDIFF(waktuTemu, '$nowDate') >= 0 AND sudahBertemu=0";
				$result = $conn->query($queryForUpdate);
				$row = $result->fetch_assoc();
				echo mysqli_error($conn);
				$id = $row['idPenanganan'];
				$speciality = $row['idSpesialisasi'];
				$dokter = $row['idDokter'];
				$hari = $row['waktuTemu'];
				$url = 'pemesanan.php?id='.$id.'&speciality='.$speciality.'&dokter='.$dokter.'&hari="'.$hari.'"';
			?>
			<button class="menu-btn" style='padding:0px; margin:auto;'>
				<a style='text-decoration:none; width:100%;' href='<?=$url?>' class='menu-btn'>
					Edit
				</a>       
			</button>
    </div>
	</body>
</html>
