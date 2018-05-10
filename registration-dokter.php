<?php
    include('connection/session.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['namaDokter']) &&isset($_POST['Alamat']) &&isset($_POST['telepon']) &&isset($_POST['username']) &&isset($_POST['password'])&&isset($_POST['gender'])&&isset($_POST['speciality'])&&isset($_POST['Umur']))
		 {
			if ($_POST['namaDokter'] != "" &&$_POST['Alamat'] != "" &&$_POST['telepon'] != ""  &&$_POST['username'] != "" &&$_POST['password'] != ""&&$_POST['gender']!=""&&$_POST['speciality']!=""&&$_POST['Umur']!="") 
            {
                $_SESSION['formSuccess1'] = "true" ;
                $nama = $_POST['namaDokter'];
                $gender = $_POST['gender'];
                $username =$_POST['username'];
                $alamat = $_POST['Alamat'];
                $password=$_POST['password'];
                $noTelp = $_POST['telepon'];
                $umur = $_POST['Umur'];
                $query = "INSERT INTO users(nama,jenisKelamin,priviledge,isActive,username,alamat,password,umur)
					      VALUES ('$nama','$gender',2,1,'$username','$alamat','$password','$umur')";
                $conn->query($query);
                $query = "SELECT idUser 
                          FROM users
                          where username ='$username'";
                $result = $conn->query($query)->fetch_array();
				$idUser = $result['idUser'];
				$speciality = $_POST['speciality'];
                echo $idUser." ".$noTelp;
                $query = "INSERT INTO nomortelepon(idUser,nomorTelp)
                          values ($idUser, '$noTelp')";
				$conn->query($query);
				$query = "INSERT INTO dokter(idUser,idSpesialisasi)
						  VALUES ('$idUser','$speciality')
				";
				$conn->query($query);
				echo mysqli_error($conn);
                  header("Location:registration-dokter.php");
                exit ;
				
			}else{
                header("Location:registration-dokter.php");
                exit ;
            } 
		}else
        {
             header("Location:registration-dokter.php");
            exit;
        }
       
    }
    

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
				
				<div class="centered-container my-container">
				<h3 style='padding-bottom:10px;'>Daftar Dokter</h3>
				<div>
					<form method='POST' action="">
						<div class='my-column'>
							<div class="input-box">
								<p>Nama Dokter</p>
								<input type="text" class='my-form' name="namaDokter" placeholder="Nama Dokter">
							</div>
							<div class="input-box">
								<p>Username</p>
								<input type="text" class='my-form' name="username" placeholder="Username">
							</div>
							<div class="input-box">
								<p>Password</p>
								<input type="password" class='my-form' name="password" placeholder="Password">
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
						</div>
						<div class='my-column'>
							<div class="input-box">
								<p>Nomor Telepon</p>
								<input type="text" class='my-form' name="telepon" placeholder="Telepon">
							</div>
							<div class="input-box">
								<p>Alamat</p>
								<input type="text" class='my-form' name="Alamat" placeholder="Alamat">
							</div>
							<div class="input-box">
								<p>Masukan Gender</p>
								<input type="radio" name="gender" value="L"> Male
								<input type="radio" name="gender" value="P"> Female
							</div>
							<div class="input-box">
								<p>Umur</p>
								<input type="text" class='my-form' name="Umur" placeholder="Umur">
							</div>
						</div>
						<div class="container-menu-btn">
							<button class="menu-btn">
								Check !!
							</button>
                        </div>
                        <?php
                          if($_SESSION['formSuccess1']){
							 $_SESSION['formSuccess1'] = false ;
							echo "<p> Data Sudah tersubmit </p>";
							}
                        ?>
					</form>
				</div>
			
			</div>
		
		
	</body>
</html>