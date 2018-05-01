<?php
    include ('connection/session.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemesanan</title>
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
					include('navbar/user-navbar.php'); 
				?>
		</div>		
			<div class="container">
				<h3 style='padding-bottom:10px;'>Pemesanan Praktek Dokter</h3>
				<div style='width:500px;'>
					<form method='POST' action="pemesanan.php">
						<div class="input-box">
							<p>Pilih Speciality</p>
							<select class='form-control input' name="speciality">
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
							<select class='form-control input' name="dokter">
								<option value="" disabled selected hidden>Pilih Dokter</option>
								<?php
									$sql = "SELECT * FROM dokter INNER JOIN users ON dokter.idUser = users.idUser";
									$result = $conn->query($sql);
									while ($row = $result->fetch_assoc()) {
										echo '<option value="'.$row["idDokter"].'">'.$row["nama"].'</option>';
									}
								?>
							</select>
						</div>
						<div class="input-box">
							<p>Pilih Hari</p>
							<input class='form-control' type="date" name='hari'>
						</div>
						<!-- <div class="input-box">
							<p>Pilih Jadwal</p>
							<select class='form-control input' name="dokter">
								<option value="" disabled selected hidden>Pilih Jam</option>
								<option value="A">5.00PM</option>
								<option value="B">6.00PM</option>
								<option value="C">10.00AM</option>
							</select>
						</div> -->
						<div class="login-container-form-btn">
							<button class="login-form-btn">
								Pesan !!
							</button>
						</div>
					</form>
				</div>
			
			</div>
		
	</body>
</html>
