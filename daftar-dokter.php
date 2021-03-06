<?php
	include ('connection/session.php');
	$map = [
		"Tidak Aktif",
		"Aktif"
	];
	$query = " SELECT tusers.nama as nama ,tusers.username as username,tusers.jenisKelamin as jenisKelamin,tusers.Alamat as Alamat,tspesial.namaSpesialisasi as spesialisasi,noRuangan,idDokter,isActive
	FROM dokter 
	INNER JOIN spesialisasi as tspesial on tspesial.idSpesialisasi = dokter.idSpesialisasi
	INNER JOIN users as tusers on dokter.idUser = tusers.idUser ";
	$filter="";
	if($_SERVER['REQUEST_METHOD']=="GET"){
		if(isset($_GET['userID'])){
			if($_GET['userID']!=""){
				$user=$_GET['userID'];
					$filter="WHERE tusers.nama like '%$user%'";
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
	echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lihat daftar Dokter</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	<?php include ('navbar/admin-navmenu.php')?>
	<?php
		if(isset($_GET['idktr']) && !is_null($_GET['idktr'])){
			$idDokter = $_GET['idktr'];
			$selectUser = "SELECT idUser FROM dokter WHERE idDokter = '$idDokter'";
			$resUser = $conn->query($selectUser);
			$idUser = $resUser->fetch_array()['idUser'];
			$getIsActiveQ = "SELECT isActive FROM users WHERE idUser = '$idUser'";
			$isActive = $conn->query($getIsActiveQ)->fetch_array()['isActive'];
			$queryDelete = "UPDATE users SET isActive = 0 WHERE idUser = '$idUser'";
			$queryAddAgain = "UPDATE users SET isActive = 1 WHERE idUser = '$idUser'";
			if (isset($_GET['pecat'])) {
				if (!is_null($_GET['pecat'])) {
					$pecat = $_GET['pecat'];
					if ($pecat == 1) {
						$conn->query($queryDelete);
					}
					else {
						$conn->query($queryAddAgain);
					}
					header("Location:daftar-dokter.php?idktr=$idDokter");
				}
			}
			else {
				include('-jadwal-dokter-details.php');
				exit();
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
					<option value="tusers.nama">Nama</option>
					<option value="tusers.username">Username</option>
					<option value="tspesial.namaSpesialisasi">Spesialisasi</option>
					<option value="noRuangan">no Ruangan</option>
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
		<table>
			<tr>
				<th>Nama</th>
				<th>Username</th>
				<th>Jenis Kelamin</th>
				<th>No Ruangan</th>
				<th>Alamat</th>
				<th>Spesialisasi</th>
				<th>Dokter Aktif?</th>
				<th>Keterangan</th>
			</tr>
			<?php
				if($result){
					while ($row=$result->fetch_array()) 
					{
						if ($row['jenisKelamin']=='L') {
								$jenisKelamin = "Laki Laki";
						} else {
								$jenisKelamin ="Perempuan";
						}
						echo "<tr>
						<td>". $row["nama"] ."</td>
						<td> ".$row["username"] ."</td>
						<td> ".$jenisKelamin."</td>
						<td> ".$row['noRuangan']."</td>
						<td> ".$row["Alamat"]."</td>
						<td> ".$row["spesialisasi"]."</td>
						<td> ".$map[$row['isActive']]."</td>
						<td> <a href=daftar-dokter.php?idktr=".$row['idDokter'].">DETAIL</a></td></tr>";
					}
				}
												
			?>
		</table>
	</div>
	</body>
</html>

<?php include('-dropdown-btn-script.html')?>