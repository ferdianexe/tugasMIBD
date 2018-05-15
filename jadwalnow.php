<?php include('-mapping-day.php')?>
<table>
	<tr>
		<th>Hari</th>
		<th>Jam awal </th>
		<th>Jam Selesai</th>
	</tr>	
	<?php 
			if($result){
					while($row=$result->fetch_array()){
							echo "<tr>
							<td>".$mappingDay[$row['hari']]."</td>
							<td>".$row['waktuMulai']."</td>
							<td>".$row['waktuSelesai']."</td>
							</tr>";
					}                            
			}else{
					echo "<td>Jadwal Belum Tersedia silakan dimasukan !</td>";

			}
	?>
</table>
<div class='centered-container'>
	<form method='GET' action="">
	<div class="container-menu-btn">
		<button class="menu-btn" style='padding:0px'>
			<a style='text-decoration:none; width:100%;' href="dokter-ubah-jadwal.php?edit=1" class='menu-btn'>
				Edit
			</a>       
		</button>
	</div>
</div>
</form>
			           