<?php
    include('connection/session.php');
    $query = "	SELECT *
				FROM(
						SELECT COUNT(pekerjaandokter.idPenanganan) as 'total', pekerjaandokter.idDokter  as 'idDokter'
			 			FROM penanganan
						inner join pekerjaandokter on pekerjaandokter.idPenanganan = penanganan.idPenanganan
						WHERE pekerjaandokter.sudahBertemu =1
						GROUP by idDokter
       				 ) as ResultHimpunan
					inner join 
					(
						SELECT nama as 'namaDokter',Dokter.idDokter
						FROM Dokter inner join users on Dokter.idUser = users.idUser
						

					)as namaDokterHimp on namaDokterHimp.idDokter = resultHimpunan.idDokter
				";
	$filter="";
	if($_SERVER['REQUEST_METHOD']=="GET"){
		if(isset($_GET['userID'])){
			if($_GET['userID']!=""){
				$user=$_GET['userID'];
					$filter=" WHERE namaDokter like '%$user%'";
			}
		}
		$filter.=" ORDER BY total ";
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
			<form method="GET" action="">
			<label for="">Nama </label> <input type="text" name="userID" id=""><br>
			<p>Sort :</p>
			<input type="radio" name="sortby" value="desc" checked> Menurun<br>
  			<input type="radio" name="sortby" value="asc"> Menaik<br>
			<div class="container-menu-btn" style="width:">
						<button class="menu-btn">
							Cari
						</button>
					</div>
			</fieldset>
			</form>
			<div class="my-container">
				<table>
					<tr>
						<th>Dokter</th>
						<th>Jumlah Pasien</th>
					</tr>
					<?php
                        if ($result) {
                            while ($row=$result->fetch_array()) {
                                echo "<tr>
									<td>".$row['namaDokter']."</td>
									<td>".$row['total']."</td>
								";

                            }
                        } else {
                            echo "Belum ada catatan untuk saat ini";
                        }
                    ?>
				</table>
			</div>
		
	</body>
</html>