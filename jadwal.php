<?php
	include ('connection/session.php');
?>
<?php
	echo "<script>";
	$allSpecialityQuery = "SELECT *
						   FROM spesialisasi
						   ORDER BY idSpesialisasi";
	$result = $conn->query($allSpecialityQuery);
	
	if($result){
		$arrSpeciality = array();
		echo "var arrSpeciality = new Array() \n";
		echo "var arrData = new Array() \n";
		echo "var arrDokterId = new Array() \n";
		while($row =$result->fetch_array()){
			$id = $row['idSpesialisasi'];
			$nama = $row['namaSpesialisasi'];
			$arrSpeciality[$id] = $nama; 
			echo  "arrSpeciality[$id] = '$nama' \n";
			echo  "arrData[$id] =new Array() \n";
		}
		$allDokternSpeciality = "SELECT tusers.nama as nama, dokter.idDokter as idDokter, dokter.idSpesialisasi as spesialisasi
								 FROM dokter
								 inner join  users as tusers on tusers.idUser = dokter.idUser";
		$check = $conn->query($allDokternSpeciality);
		while($row = $check->fetch_array()){
			$id = $row['spesialisasi'];
			$nama = $row['nama'];
			$idDokter = $row['idDokter'];
			echo "arrData[$id].push('$nama') \n";
			echo "arrDokterId[$idDokter] = '$nama' \n";
		}
		$dayQuery = "SELECT idDokter, hari FROM jadwalpraktek";
		$dayResult = $conn->query($dayQuery);
		echo "var arrDay = new Array() \n";
		if ($dayResult) {
			while ($row=$dayResult->fetch_array()) {
				$idDokter = $row['idDokter'];
				$hari = $row['hari'];
				echo "if (typeof arrDay[$idDokter] == 'undefined') {";
				echo "arrDay[$idDokter] = new Array(); arrDay[$idDokter].push('$hari');}";
				echo "else {arrDay[$idDokter].push('$hari');}";
			}
		}
	}
	echo "</script>";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lihat Jadwal Praktek</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">

		<!-- connect db -->
		
	</head>
	<body>
		<?php
			include ('navbar/user-navbar.php'); 
		?>
		<div class="my-container centered-container">
			<h3 style='padding-bottom:10px;'>Lihat Jadwal Praktek Dokter</h3>
			<div>
				<form method='POST' action="jadwal.php">
					<div class="input-box">
						<p>Pilih Speciality</p>
						<select id='specJadwal' class='my-form' name="speciality">
							<option value="" disabled selected hidden>Pilih Speciality</option>
						</select>
					</div>
					<div class="input-box">
						<p>Pilih Dokter</p>
						<select id='dokterJadwal' class='my-form' name="dokter">
							<option value="" disabled selected hidden>Pilih Dokter</option>
						</select>
					</div>
					<div class="input-box">
						<p>Pilih Hari</p>
						<select id='hariJadwal' class='my-form' name="hari">
							<option value="" disabled selected hidden>Pilih Hari</option>
						</select>
					</div>
					<div class="container-menu-btn">
						<button class="menu-btn">
							Check !!
						</button>
					</div>
					<div>
						<h4>
							<?php
								if ($_SERVER['REQUEST_METHOD'] == 'POST') {
									if (isset($_POST['speciality']) && isset($_POST['dokter']) && isset($_POST['hari'])) {
										if (!is_null($_POST['speciality']) && !is_null($_POST['dokter']) && !is_null($_POST['hari'])) {
											echo 'Jadwal ditemukan !';
										}
										else {
											echo 'Jadwal tidak Ditemukan';
										}
									}
									else {
										echo 'Jadwal tidak Ditemukan';
									}
								}
							?>
						</h4>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>

<script>	
	$(document).ready(function(){
		var dktr = $("#dokterJadwal");
		var mappingDay = [
			"null",
			"Senin",
			"Selasa",
			"Rabu",
			"Kamis",
			"Jumat",
			"Sabtu",
			"Minggu",
		];
		$('#specJadwal').on('change',function(){
			$("#dokterJadwal").empty();
			var dataArray = arrData[this.value];
			$.each(dataArray,function(index,val){
				for(var i = 0 ; i<arrDokterId.length;i++){
					if(arrDokterId[i]==val){
						dktr.append($("<option/>").attr("value",i).text(val));
					}
				}
			});
			$('#dokterJadwal').trigger('change');
		});
		var hari = $('#hariJadwal');
		$('#dokterJadwal').on('change',function(){
			$("#hariJadwal").empty();
			var dataArray = arrDay[this.value];
			$.each(dataArray,function(index,val){
				hari.append($("<option/>").attr("value",val).text(mappingDay[val]));
			});
			console.log(dataArray);
		});
		var specMenu = $("#specJadwal");
		$("#specJadwal option:gt(0)").empty();
		$.each(arrSpeciality,function(index,value){
			console.log('masuk');
			if(index!=0){
				if (value != null) {
					specMenu.append($("<option/>").attr("value",index).text(value));
				}
			}
		})
	});
</script>