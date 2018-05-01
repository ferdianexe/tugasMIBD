<?php
	include ('connection/session.php');
	$id = $_SESSION['id'];
	$nowDate = date('Y-m-d');
	$sqlPenanganan = "SELECT COUNT(idPenanganan) as counter FROM pekerjaandokter
			WHERE idPasien = '$_SESSION[id]' AND DATEDIFF(waktuTemu, '$nowDate') >= 0";
	$result = $conn->query($sqlPenanganan);
	$row = $result->fetch_assoc();
	if ($row['counter'] == 0 && isset($_SESSION['id']) && isset($_POST['speciality']) && isset($_POST['dokter']) && isset($_POST['hari'])) {
		$sql = "INSERT INTO penanganan VALUES()";
		$result = $conn->query($sql);
		$temp = "SELECT idPenanganan FROM penanganan ORDER BY idPenanganan DESC LIMIT 1";
		$result = $conn->query($temp);
		$idPenanganan = $result->fetch_assoc()['idPenanganan'];
		$idDokter = $_POST['dokter'];
		$idPasien = $_SESSION['id'];
		$tanggalTemu = $_POST['hari'];
		$sql = "INSERT INTO pekerjaandokter VALUES('$idDokter', '$idPasien', '$idPenanganan', '$nowDate', '$tanggalTemu')";
		$result = $conn->query($sql);
	}
	$result = $conn->query($sqlPenanganan);
	$row = $result->fetch_assoc();
	if ($row['counter'] > 0) {
		include ('-pemesanan-submit.php');
	}
	else {
		include ('-pemesanan-form.php');
	}
?>
