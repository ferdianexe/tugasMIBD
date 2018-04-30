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
                $query = "INSERT INTO users(nama,jenisKelamin,priviledge,isActive,username,alamat,password,idSpesialisasi,umur)
					      VALUES ('$nama','$gender',2,1,'$username','$alamat','$password',1,'$umur')";
                $conn->query($query);
                $query = "SELECT idUser 
                          FROM users
                          where username ='$username'";
                $result = $conn->query($query)->fetch_array();
                $idUser = $result['idUser'];
                echo $idUser." ".$noTelp;
                $query = "INSERT INTO nomortelepon(idUser,nomorTelp)
                          values ($idUser, '$noTelp')";
                $conn->query($query);
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
				<h3 style='padding-bottom:10px;'>Daftar Dokter</h3>
				<div style='width:500px;'>
					<form method='POST' action="">
						<div class="input-box">
							<p>Nama Dokter</p>
							<input type="text" class='form-control input' name="namaDokter" placeholder="Nama Dokter">
                        </div>
                        <div class="input-box">
							<p>Username</p>
							<input type="text" class='form-control input' name="username" placeholder="Username">
                        </div>
                        <div class="input-box">
							<p>Password</p>
							<input type="password" class='form-control input' name="password" placeholder="Password">
						</div>
						<div class="input-box">
							<p>Nama Speciality</p>
							<input type="text" class='form-control input' name="speciality" placeholder="nama Speciality">
                        </div>
                        <div class="input-box">
							<p>Nomor Telepon</p>
							<input type="text" class='form-control input' name="telepon" placeholder="Telepon">
                        </div>
                        <div class="input-box">
							<p>Alamat</p>
							<input type="text" class='form-control input' name="Alamat" placeholder="Alamat">
						</div>
						<div class="input-box">
							<p>Masukan Gender</p>
							<input type="radio" name="gender" value="L"> Male
                            <input type="radio" name="gender" value="P"> Female
                        </div>
                        <div class="input-box">
							<p>Umur</p>
							<input type="text" class='form-control input' name="Umur" placeholder="Umur">
                        </div>
						<div class="login-container-form-btn">
							<button class="login-form-btn">
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