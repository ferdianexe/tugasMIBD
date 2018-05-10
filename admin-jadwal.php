<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lihat Jadwal Praktek</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		
		<?php include ('navbar/admin-navmenu.php')?>	
	<div class='centered-container'>
	<div class="my-container">
		<h3 style='padding-bottom:10px;'>Lihat Jadwal Praktek Dokter</h3>
		<div>
			<form method='POST' action="pemesanan.php">
				<div class="input-box">
					<p>Pilih Speciality</p>
					<select class='my-form' name="speciality">
						<option value="" disabled selected hidden>Pilih Speciality</option>
						<option value="umum">Umum</option>
						<option value="gigi">Gigi</option>
						<option value="tht">THT</option>
					</select>
				</div>
				<div class="input-box">
					<p>Pilih Dokter</p>
					<select class='my-form' name="dokter">
						<option value="" disabled selected hidden>Pilih Dokter</option>
						<option value="A">Ferdian</option>
						<option value="B">Timot Kahim Online</option>
						<option value="C">Bebas</option>
					</select>
				</div>
				<div class="input-box">
					<p>Pilih Hari</p>
					<select class='my-form' name="hari">
						<option value="" disabled selected hidden>Pilih Hari</option>
						<option value="A">Senin</option>
						<option value="B">Rabu</option>
						<option value="C">Jumat</option>
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
	</div>
	</body>
</html>