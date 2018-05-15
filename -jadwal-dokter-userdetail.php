<?php
		//no need session : include from daftar-dokter.php 
	include('-mapping-day.php');
    $idDokter = $_GET['dokter'];
    $query = "SELECT *
    FROM jadwalpraktek
    WHERE idDokter = '$idDokter' AND isActive= 1
    ";
    $result = $conn->query($query);
?>
<div class='my-container centered-container'>
	<table>
		<tr>
			<th>Hari</th>
			<th>Jam awal </th>
			<th>Jam Selesai</th>
		</tr>	
		<?php 
				if($result&&mysqli_num_rows($result)){
						while($row=$result->fetch_array()){
								echo "<tr>
								<td>".$mappingDay[$row['hari']]."</td>
								<td>".$row['waktuMulai']."</td>
								<td>".$row['waktuSelesai']."</td>
								</tr>";
						}                            
				}else{
						echo "<tr><td colspan=4>Jadwal Belum Tersedia atau Link tidak tersedia !</td></tr>";

				}
		?>
	</table>
</div>