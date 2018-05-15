<?php
    include('connection/session.php');
    $query = " SELECT idUser,nama,username,jenisKelamin,isActive,Alamat
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
		if(isset($_GET['sort'])&&isset($_GET['sortby'])){
            if ($_GET['sort']!=""&&$_GET['sortby']!="") {
                $sub=$_GET['sort'];
                $ascordesc =$_GET['sortby'];
                $filter.=" ORDER BY $sub ";
                if ($ascordesc=='asc') {
                    $filter.="ASC";
                } else {
                    $filter.="DESC";
                }
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
		<?php
			if (isset($_GET['id']) && isset($_GET['s'])) {
				if (!is_null($_GET['id']) && !is_null($_GET['s'])) {
					($_GET['s'] == 1)?$val=0:$val=1;
					$idUser = $_GET['id'];
					echo $idUser;
					echo $val;
					$query1 = "UPDATE users SET isActive='$val' WHERE idUser='$idUser'";
					$conn->query($query1);
					echo mysqli_error($conn);
					header("Location:daftar-user.php");
				}
			}
		?>
		<div class='my-container centered-container'>
			<div class='container-menu-btn'>
				<button class='toggle-btn dropdown-btn menu-btn'>Show Search</button>
			</div>
		</div>
			<div class='d-container my-container centered-container'>
				<label for="">Nama </label>
				<form method="GET" action=""> 
					<input type="text" name="userID" id="" class='my-form'><br>
					<div class="input-box">
						<p>Sort By :</p>
						<select id='pilihan' class='my-form' name="sort">
							<option value="nama">Nama</option>
							<option value="username">Username</option>
						</select>
					</div>
					<input type="radio" name="sortby" value="desc" checked> Menurun<br>
						<input type="radio" name="sortby" value="asc"> Menaik<br>
					<div class="container-menu-btn" style="width:">
						<button class="menu-btn">
							Cari
						</button>
					</div>
				</form>
			</div>
		<div class="my-container">
			<table class='table table-striped'>
				<tr>
					<th>Nama</th>
					<th>Username</th>
					<th>Jenis Kelamin</th>
					<th>isActive</th>
					<th>Alamat</th>
					<th>Deaktivasi</th>
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
						if ($row['isActive'] == 1) {
							$x = "Deaktivasi";
						}
						else {
							$x = "Aktivasi";
						}
						echo "<tr>
						<td>". $row["nama"] ."</td>
						<td> ".$row["username"] ."</td>
						<td> ".$jenisKelamin."</td>
						<td> ".$status."</td>
						<td> ".$row["Alamat"]."</td>
						<td> <a href=daftar-user.php?id=".$row["idUser"]."&s=".$row['isActive'].">".
						$x
						."</a></td>
						";
						}
			?>
			</table>
		</div>
	</body>
</html>

<?php include('-dropdown-btn-script.html')?>