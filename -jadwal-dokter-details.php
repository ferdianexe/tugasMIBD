<?php
    //no need session : include from daftar-dokter.php 
    $idDokter = $_GET['idktr'];
    $query = "SELECT *
    FROM jadwalpraktek
    WHERE idDokter = '$idDokter'
    ";
    $result = $conn->query($query);
?>

<table>
	<tr>
		<th>Jadwal</th>
		<th>Hari</th>
		<th>Jam awal </th>
		<th>Jam Selesai</th>
	</tr>	
	<?php 
			if($result&&mysqli_num_rows($result)){
					while($row=$result->fetch_array()){
							echo "<tr>
							<td> WTF </td>
							<td>".$row['hari']."</td>
							<td>".$row['waktuMulai']."</td>
							<td>".$row['waktuSelesai']."</td>
							</tr>";
					}                            
			}else{
					echo "<tr><td colspan=4>Jadwal Belum Tersedia atau Link tidak tersedia !</td></tr>";

			}
	?>
</table>