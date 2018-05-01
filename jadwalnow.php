<table class='table table-striped'>
					<tr>
						<th>Jadwal</th>
						<th>Hari</th>
                        <th>Jam awal </th>
                        <th>Jam Selesai</th>
                    </tr>
                    
                    <?php 
                        if($result){
                            while($row=$result->fetch_array()){
                                echo "<tr>
                                <td> WTF </td>
                                <td>".$row['hari']."</td>
                                <td>".$row['waktuMulai']."</td>
                                <td>".$row['waktuSelesai']."</td>
                                </tr>";
                            }                            
                        }else{
                            echo "<td>Jadwal Belum Tersedia silakan dimasukan !</td>";

                        }
                    ?>
                </table>
                <form method='GET' action="">
						<div class="login-container-form-btn">
							<button class="login-form-btn">
								<a href="dokter-ubah-jadwal.php?edit=1" class="login-form-btn">
                                     Edit
                                </a>       
							</button>
						</div>
					</form>
			           