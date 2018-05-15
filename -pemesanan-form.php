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
								 inner join  users as tusers on tusers.isActive=1 AND tusers.idUser = dokter.idUser";
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
		</div>		
			<div class="my-container centered-container">
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
							<input class='my-form' id='datePicker' type="date" name='hari'>
						</div>
						<div class="container-menu-btn">
							<button class="menu-btn">
								Pesan !!
							</button>
						</div>
					</form>
					<div>
						<h2>
							<?php
								if(isset($_SESSION['orderErrorId'])){
									if($_SESSION['orderErrorId']==1){
										echo "JADWAL SUDAH PENUH";
									}else if ($_SESSION['orderErrorId']==2){
										echo "DOKTER TIDAK MEMILIKI JADWAL DIHARI ITU";
									}else if($_SESSION['orderErrorId']==3){
										echo "DATA BELUM LENGKAP";
									}else{
										echo "DATA YANG ANDA MASUKAN TIDAK VALID";
									}
									unset($_SESSION['orderErrorId']);
								}
							?>
						</h2>
					</div>
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
				if (value != null) {
					specMenu.append($("<option/>").attr("value",index).text(value));
				}
			}
		})
		<?php
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				if (isset($_GET['id']) && isset($_GET['speciality']) && isset($_GET['dokter']) && isset($_GET['hari'])) {
					if (!is_null($_GET['id']) && !is_null($_GET['speciality']) && !is_null($_GET['dokter']) && !is_null($_GET['hari'])) {
						$_SESSION['IS_UPDATING'] = $_GET['id'];
						?>
							var speciality = <?=$_GET['speciality']?>;
							var dokter = <?=$_GET['dokter']?>;
							var hari = <?=$_GET['hari']?>;
							var options = $('#spec option');
							$.each(options, function(index, option) {
								if (option.value == speciality) {
									$('#spec').prop('selectedIndex', index);
									$('#spec').trigger('change');
								}
							})
							var options = $('#dname option');
							$.each(options, function(index, option) {
								if (option.value == dokter) {
									$('#dname').prop('selectedIndex', index);
								}
							})
							$('#datePicker')[0].value = hari;
						<?php
					}
				}
			}
		?>
})
</script>
