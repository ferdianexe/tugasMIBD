<?php
	include('connection/connection.php');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['nama']) &&
			isset($_POST['alamat']) &&
			isset($_POST['noTelp']) &&
			isset($_POST['kota']) &&
			isset($_POST['username']) &&
			isset($_POST['password'])&&
			isset($_POST['gender'])
		) {
			if ($_POST['nama'] != "" &&
				$_POST['alamat'] != "" &&
				$_POST['noTelp'] != "" &&
				$_POST['kota'] != "" &&
				$_POST['username'] != "" &&
				$_POST['password'] != ""&&
				$_POST['gender']!=""
			) {
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$noTelp = $_POST['noTelp'];
				$kota = $_POST['kota'];
				$username = $_POST['username'];
				$password = $_POST['password'];
				if($_POST['gender']==='L'||$_POST['gender']==='Pria'){
					$gender = 'L';
				}else{
					$gender = 'P';
				}
				$query = "INSERT INTO users(nama,jenisKelamin,priviledge,isActive,username,alamat,password)
					VALUES ('$nama','$gender',1,0,'$username','$alamat','$password')";
				$check = $conn->query($query);
				if($check){
					echo "Pendaftaran Sukses silakan menunggu untuk diapprove";
				}
				
			} 
			else {
				header("Location: register.html");
			}
		}
	}
