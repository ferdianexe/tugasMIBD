<?php
    include('connection/session.php');
    $query = " SELECT nama,username,jenisKelamin,isActive,Alamat
	FROM users
	WHERE priviledge=1";
	$filter="";
	if($_SERVER['REQUEST_METHOD']=="GET"){
		if(isset($_GET['userID'])){
			if($_GET['userID']!=""){
				$user=$_GET['userID'];
					$filter=" AND nama like '%$user%'";
			}
		}
	}
	$query .=$filter;
    $result =$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lihat Daftar User</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<?php include ('navbar/admin-navmenu.php')?>
		<form method="GET" action="">
			<label for="">Nama </label> <input type="text" name="userID" id=""><br>
			<div class="container-menu-btn" style="width:">
						<button class="menu-btn">
							Cari
						</button>
					</div>
			</fieldset>
			</form>	
		<div class="my-container">
			<table class='table table-striped'>
				<tr>
					<th>Nama</th>
					<th>Username</th>
					<th>Jenis Kelamin</th>
					<th>isActive</th>
					<th>Alamat</th>
				</tr>
			<?php
				while ($row=$result->fetch_array()) {
						if ($row['jenisKelamin']=='L') {
								$jenisKelamin = "Laki Laki";
						} else {
								$jenisKelamin ="Perempuan";
						}
						if ($row['isActive']==0) {
								$status = 'Butuh Aktivasi';
						} else {
								$status = "Aktif";
						}
						echo "<tr>
						<td>". $row["nama"] ."</td>
						<td> ".$row["username"] ."</td>
						<td> ".$jenisKelamin."</td>
						<td> ".$status."</td>
						<td> ".$row["Alamat"]."</td>
						";
						}
			?>
			</table>
		</div>
	</body>
</html>