<?php
	include ('connection/session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lihat Jadwal Praktek</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">

		<!-- connect db -->
		
	</head>
	<body>
		<?php
			include ('navbar/user-navbar.php'); 
		?>
		<div class="my-container centered-container">
			<h3 style='padding-bottom:10px;'>Lihat Jadwal Praktek Dokter</h3>
			<div>
				<form method='POST' action="">
					<div class="input-box">
						<p>Pilih Hari</p>
						<select class='my-form' name="hari">
							<option value="" disabled selected hidden>Pilih Hari</option>
							<option value="1">Senin</option>
							<option value="2">Selasa</option>
							<option value="3">Rabu</option>
							<option value="4">Kamis</option>
							<option value="5">Jumat</option>
							<option value="6">Sabtu</option>
							<option value="7">Minggu</option>
							<!-- belum bisa diaplikasikan -->
						</select>
					</div>
					<div class="input-box">
						<p>Pilih Speciality</p>
						<select class='my-form' name="speciality">
							<option value="" disabled selected hidden>Pilih Speciality</option>
							
							<?php
								$sql = "SELECT * FROM spesialisasi";
								$result = $conn->query($sql);
								while ($row = $result->fetch_assoc()) {
									echo '<option value="'.$row["idSpesialisasi"].'">'.$row["namaSpesialisasi"].'</option>';
								}
							?>
						</select>
					</div>
					<div class="input-box">
						<p>Pilih Dokter</p>
						<select class='my-form' name="dokter">
							<option value="" disabled selected hidden>Pilih Dokter</option>
							<?php
								$sql = "SELECT * FROM dokter INNER JOIN users ON dokter.idUser = users.idUser";
								$result = $conn->query($sql);
								while ($row = $result->fetch_assoc()) {
									echo '<option value="'.$row["idUser"].'">'.$row["nama"].'</option>';
								}
							?>
						</select>
					</div>
					<div class="container-menu-btn">
						<button class="menu-btn">
							Check !!
						</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>