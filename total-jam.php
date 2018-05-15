<?php
    include('connection/session.php');
    $query = "SELECT totalJam , kumpulanDokter.idDokter as 'dokterID',nama
				FROM(
						SELECT SUM(jumlah) as 'totalJam', himpunanJumlah.idDokter
							FROM(
									SELECT idDokter,TIMESTAMPDIFF(HOUR,waktuMulai,waktuSelesai) as 'jumlah' 
									FROM jadwalpraktek
								) as himpunanJumlah
						GROUP BY himpunanJumlah.idDokter
        			) as jumlahJamDokter
       			right join 
                	(
                    	SELECT *
                        FROM dokter
                        
					) as kumpulanDokter on kumpulanDokter.idDokter = jumlahJamDokter.idDokter
					inner join 
					(
						SELECT nama,idUser
						from Users	

					)as kumpulanUser on kumpulanUser.idUser = kumpulanDokter.idUser";
	$filter="";
	if($_SERVER['REQUEST_METHOD']=="GET"){
		if(isset($_GET['userID'])){
			if($_GET['userID']!=""){
				$user=$_GET['userID'];
					$filter=" WHERE nama like '%$user%'";
			}
		}
		$filter.=" ORDER BY totalJam ";
		$sortBy =" DESC";
		if(isset($_GET['sortby'])){
            if ($_GET['sortby']!="") {
                $ascordesc =$_GET['sortby'];
                if ($ascordesc=='asc') {
                    $sortBy=" ASC";
                } else {
                    $sortBy=" DESC";
                }
            }
		}
	}
	$query .=$filter;
	$query .=$sortBy;
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
				<div class='container-menu-btn'>
					<button class='toggle-btn dropdown-btn menu-btn'>Show Search</button>
				</div>
			</div>
			<div class='d-container my-container centered-container'>
				<label for="">Nama </label>
				<form method="GET" action="">
					<input type="text" name="userID" id="" class='my-form'><br>
					<p>Sort :</p>
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
						<th>Total Jam Perminggu</th>
					</tr>
							<?php
                        if ($result) {
                            while ($row=$result->fetch_array()) {
                                echo "<tr>
									<td>".$row['nama']."</td>
									";
									if($row['totalJam']){
										echo "<td>".$row['totalJam']."</td>";
									}else{
										echo "<td> 0 </td>";
									}
									echo "</tr>";
									
							}
						}
                    ?>
				</table>
			</div>
		
	</body>
</html>

<?php include('-dropdown-btn-script.html')?>