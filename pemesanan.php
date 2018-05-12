<?php
    include('connection/session.php');
    $id = $_SESSION['id'];
    $nowDate = date('Y-m-d');
    $sqlPenanganan = "SELECT COUNT(idPenanganan) as counter FROM pekerjaandokter
			WHERE idPasien = '$_SESSION[id]' AND DATEDIFF(waktuTemu, '$nowDate') >= 0 AND sudahBertemu=0";
    $result = $conn->query($sqlPenanganan);
    $row = $result->fetch_assoc();
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        //verifikasi pendaftaran menentukan apakah jadwal yang disediakan sudah full atau belum dengan catatan
        // 1 pertemuan berkisar 30 menit
        if (isset($_POST['dokter'])&&$_POST['dokter']!=null) {
			$_SESSION['orderErrorId']=5;
            $tanggalTujuan = $_POST['hari'];
            $tanggal = date_create($tanggalTujuan);
			$hari = date_format($tanggal, "N");
			$debug = date_create($tanggalTujuan);
			$debug2 = date_create($nowDate);
			$perbedaan = date_diff($debug2,$debug)->format("%R%a");
			if($perbedaan>=0){
				$idDokter = $_POST['dokter'];
				$queryforshift = "SELECT ABS(TIMESTAMPDIFF(MINUTE,waktuSelesai,waktuMulai)) as total
								  FROM jadwalPraktek
								  WHERE hari=$hari AND idDokter =$idDokter";
		
		
				$resultshift = $conn->query($queryforshift);
				if (mysqli_num_rows($resultshift)) {
					$rows = $resultshift->fetch_array();
					$limit = $rows['total']/30;
					//check apakah dihari target sudah ada limit orang yang memesan
					//jika sudah keluarkan ERROR
					if (isset($_POST['hari'])&&$_POST['hari']!=null&&$row['counter'] == 0 && isset($_SESSION['id']) && isset($_POST['speciality']) &&$_POST['speciality']!=null&& isset($_POST['dokter']) && $_POST['dokter']!=null) {
						$tanggalPemesanan = $_POST['hari'];
						$limitquery = "SELECT count(idPenanganan) as 'counter'
						FROM pekerjaandokter
						WHERE waktuTemu ='$tanggalPemesanan'";
						$resultLimit = $conn->query($limitquery);
						$currentLimit = $resultLimit->fetch_array()['counter'];
					
						if ($limit>$currentLimit) {
							//masih ada slot , boleh mendaftar
							if ($row['counter'] == 0 && isset($_SESSION['id']) && isset($_POST['speciality']) && isset($_POST['dokter']) && isset($_POST['hari'])) {
								$sql = "INSERT INTO penanganan VALUES()";
								$result = $conn->query($sql);
								$temp = "SELECT idPenanganan FROM penanganan ORDER BY idPenanganan DESC LIMIT 1";
								$result = $conn->query($temp);
								$idPenanganan = $result->fetch_assoc()['idPenanganan'];
								$idDokter = $_POST['dokter'];
								$idPasien = $_SESSION['id'];
								$tanggalTemu = $_POST['hari'];
								$sql = "INSERT INTO pekerjaandokter VALUES('$idDokter', '$idPasien', '$idPenanganan', '$nowDate', '$tanggalTemu',0)";
								$result = $conn->query($sql);
								$_SESSION['orderErrorId'] = 4 ;
							//  header('Location:pemesanan.php');
							} else {
								$_SESSION['orderErrorId'] =3;
							}
						} else {
							$_SESSION['orderErrorId'] = 1;//1 : jadwal penuh , 2: jadwal tidak tersedia , 3: data belum lengkap , 4:success
						}
					} else {
						//WAKTU pemesanan belum diset
						
						$_SESSION['orderErrorId'] =3;
					}
				} else {
					//dokter tidak memiliki jadwal di hari itu...
					//TODO ERROR MESSAGE
					$_SESSION['orderErrorId'] =2;
				}
			}else{
				$_SESSION['orderErrorId']=5;
			}
        }else{
			$_SESSION['orderErrorId'] = 3;
		}
    }
   
    $result = $conn->query($sqlPenanganan);
    $row = $result->fetch_assoc();
    if ($row['counter'] > 0) {
		include('-pemesanan-submit.php');
    } else {
        include('-pemesanan-form.php');
	}
?>
