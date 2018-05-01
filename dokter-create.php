<?php
	include ('connection/session.php');
	
	  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$_SESSION['formSuccess'] ="true" ;
		$targetPasien = $_POST['username'];
		$date = $_POST['tanggal'];
		$text = $_POST['catatan'];
	  	$query = "SELECT idUser FROM users WHERE username like '$targetPasien'";
		$result = $conn->query($query)->fetch_array();
		$idPasien = $result['idUser'];
		$_SESSION['waktu'] = $date;
		$query = "INSERT INTO penanganan(idDokter,idPasien,waktuMulai,waktuSelesai,tanggal,catatan)
				  VALUES ($id,$idPasien,now(),now()+1800,'$date','$text')
		";
	
		$result= $conn->query($query);
		header("Location:dokter-create.php");
		exit();
		//exit ;
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Buat Catatan</title>
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
				include('navbar/dokter-navmenu.php');
			?>
		</div>		
			<div class="container">
				<h3 style='padding-bottom:10px;'>Buat Catatan</h3>
				<div style='width:500px;'>
					<form method='POST' action="">
						<div class="input-box">
                            <p>Nama</p>
                            <input class="input" type="text" name="nama" placeholder="Nama">
                            <span class="focus-input"></span>
                            <span class="symbol-input">
                                <i class="fa fa-address-card" aria-hidden="true"></i>
                            </span>
                        </div>
						<div class="input-box">
                            <p>Username</p>
                            <input class="input" type="text" name="username" placeholder="Username">
                            <span class="focus-input"></span>
                            <span class="symbol-input">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
						<div class="input-box">
                            <p>Tanggal</p>
                            <input class="input" type="date" name="tanggal" placeholder="Tanggal">
                            <span class="focus-input"></span>
                            <span class="symbol-input">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
						<div class='input-box'>
							<p>Catatan</p>
							<textarea class="form-control" rows="5" name="catatan" id="comment"></textarea>
						</div>
						<div class="login-container-form-btn">
							<button class="login-form-btn">
								Pesan !!
							</button>
						</div>
					</form>
					<div>
						<?php
							if($_SESSION['formSuccess']){
								$_SESSION['formSuccess'] = false ;
								echo "<p> Data Sudah tersubmit </p>";
							}
						?>
					</div>
				</div>
			</div>
	</body>
</html>
