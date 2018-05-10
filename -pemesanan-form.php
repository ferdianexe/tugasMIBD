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
	
	}
	echo "</script>";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pemesanan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div class='index-navbar'>
				<?php
					include('navbar/user-navbar.php'); 
				?>
		</div>		
			<div class="my-container">
				<h3 style='padding-bottom:10px;'>Pemesanan Praktek Dokter</h3>
				<div>
					<form method='POST' action="pemesanan.php">
						<div class="input-box">
							<p>Pilih Speciality</p>
							<select class='my-form' id="spec"   name="speciality">
								<option value="" disabled selected hidden >Pilih Speciality</option>
							</select>
						</div>
						<div class="input-box">
							<p>Pilih Dokter</p>
							<select class='my-form' id="dname" name="dokter">
								<option value="" disabled selected hidden >Pilih Dokter</option>
							</select>
						</div>
						<div class="input-box">
							<p>Pilih Hari</p>
							<input class='my-form' type="date" name='hari'>
						</div>
						<div class="container-menu-btn">
							<button class="menu-btn">
								Pesan !!
							</button>
						</div>
					</form>
				</div>
			</div>
	</body>
</html>
<script>	
	$(document).ready(function(){
	var dktr = $("#dname");
	$('#spec').on('change',function(){
	$("#dname").empty();
	var dataArray = arrData[this.value];
		$.each(dataArray,function(index,val){
			for(var i = 0 ; i<arrDokterId.length;i++){
				if(arrDokterId[i]==val){
					dktr.append($("<option/>").attr("value",i).text(val));
				}
				
			}
			
		
		});
	});
	var specMenu = $("#spec");
	$("#spec option:gt(0)").empty();
		$.each(arrSpeciality,function(index,value){
			if(index!=0){
				specMenu.append($("<option/>").attr("value",index).text(value));
			}
		})
	
})
</script>
