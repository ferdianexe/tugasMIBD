<?php
	include('connection/session.php');
    $query = " SELECT daftarDokter.nama as 'namaDokter',daftarPasien.nama as 'namaPasien',tarif,waktuMulai,waktuSelesai,tanggal,catatan,isDeleted,waktuPengubahan
			   FROM
				(
					SELECT pekerjaanDokter.idPenanganan,tarif,waktuMulai,waktuSelesai,tanggal,catatan,isDeleted,waktuPengubahan,idDokter,idPasien
			   		FROM penanganan
			  		Inner Join pekerjaandokter on pekerjaanDokter.idPenanganan = penanganan.idPenanganan
					WHERE pekerjaandokter.sudahBertemu = 1 

				) as daftarPenanganan
				INNER JOIN 
					(
						SELECT nama,dokter.iddokter
						FROM dokter
						inner join users on users.idUser = dokter.idUser
					) as daftarDokter on daftarDokter.idDokter = daftarPenanganan.idDokter
				INNER JOIN 
				(
					SELECT nama,idUser
					FROM users
				) as daftarPasien on daftarPasien.idUser = daftarPenanganan.idPasien
	";
	$filter="";
	if($_SERVER['REQUEST_METHOD']=="GET"){
		if(isset($_GET['userID'])&&isset($_GET['pilihan'])){
			if($_GET['userID']!=""&&$_GET['pilihan']!=""){
				$user=$_GET['userID'];
				if($_GET['pilihan']=='dokter'){
					$filter="WHERE daftarDokter.nama like '%$user%'";
				}else{
					$filter= "WHERE daftarPasien.nama like '%$user%'";
				}
			}
			
		}
		if(isset($_GET['sort'])&&isset($_GET['sortby'])){
			if($_GET['sort']!=""&&$_GET['sortby']!=""){
				$sub=$_GET['sort'];
				$ascordesc =$_GET['sortby'];
				$filter.=" ORDER BY $sub ";
				if($ascordesc=='asc'){
					$filter.="ASC";
				}else{
					$filter.="DESC";
				}
			}
			
		}
	}
	$query.=$filter;
	$result = $conn->query($query);
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
			<div class='my-container centered-container'>
				<label for="">Nama </label> 
				<form method="GET" action="">
				<input type="text" name="userID" id="" class='my-form'><br>
				<div class="input-box">
							<p>Dokter / Pasien</p>
							<select id='pilihan' class='my-form' name="pilihan">
								<option value="" disabled selected hidden>Pilih Kategori</option>
								<option value="dokter">Dokter</option>
								<option value="pasien">Pasien</option>
							</select>
				</div>
				<div class="input-box">
							<p>Sort By :</p>
							<select id='pilihan' class='my-form' name="sort">
								<option value="daftarDokter.nama">Dokter</option>
								<option value="daftarPasien.nama">Pasien</option>
								<option value="tanggal">Date</option>
								<option value="isDeleted">dihapus</option>
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
						<th>Dokter</th>
						<th>Pasien</th>
						<th>Waktu Mulai</th>
						<th>Waktu Selesai</th>
						<th>Date</th>
						<th>Catatan</th>
						<th>Is Deleted</th>
						<th>Waktu Pengubahan</th>
					</tr>
					<?php
                        if ($result) {
                            while ($row=$result->fetch_array()) {
                                echo "<tr>
									<td>".$row['namaDokter']."</td>
									<td>".$row['namaPasien']."</td>
									<td>".$row['waktuMulai']."</td>
									<td>".$row['waktuSelesai']."</td>
									<td>".$row['tanggal']."</td>
									<td>".$row['catatan']."</td>
								";
                                if ($row['isDeleted']) {
                                    echo "<td> Sudah dihapus </td>";
                                } else {
                                    echo "<td> Belum dihapus </td>";
                                }
                                if ($row['waktuPengubahan']) {
                                    echo "<td>".$row['waktuPengubahan']."</td>";
                                } else {
                                    echo "<td> Belum pernah diedit </td>";
                                }
                                echo "</tr>";
                            }
                        } else {
                            echo "Belum ada catatan untuk saat ini";
                        }
                    ?>
				</table>
			</div>
		
	</body>
</html>