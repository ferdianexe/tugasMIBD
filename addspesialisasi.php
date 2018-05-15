<?php
    include('connection/session.php');
    $query = "SELECT *
              FROM Spesialisasi
              ";
	$result = $conn->query($query);
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		 if(isset($_POST['newSpeciality'])){
			 if($_POST['newSpeciality']!=""){
				$newSpeciality = $_POST['newSpeciality'];
				$quer = "INSERT INTO Spesialisasi(namaSpesialisasi)
				VALUES ('$newSpeciality')";
				$conn->query($quer);
				header('Location:addspesialisasi.php');
				exit();
			 }
		 }
	}
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
						<th>Nama Spesialisasi</th>
					</tr>
							<?php
                        if ($result) {
                            while ($row=$result->fetch_array()) {
                                echo "<tr>
									<td>".$row['namaSpesialisasi']."</td>
									</tr>";
							}
						}
                    ?>
				</table>
			</div>
			<div class='centered-container my-container'>
				<h3 style='padding-bottom:10px;'>Tambah Speciality</h3>
				<div>
				<form method='POST' action="">
					<div class="input-box">
						<p>Nama Speciality</p>
						<input type="text" class='my-form' name="newSpeciality" placeholder="Nama Speciality">
					</div>
					<div class="container-menu-btn">
						<button class="menu-btn">
							Tambah
						</button>
					</div>
				</form>
				</div>
			</div>
		
	</body>
</html>